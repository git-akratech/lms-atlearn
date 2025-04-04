<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
global $USER, $DB;

try {
    // Check for valid login
    require_login();
    $context = context_system::instance();
    
    // Check permissions
    $isadmin = has_capability('moodle/site:config', $context);
  
    // Get teacher's courses
    $courses = enrol_get_users_courses($USER->id);
    foreach ($courses as $course) {
        $coursecontext = context_course::instance($course->id);
        if (has_capability('moodle/course:viewhiddenactivities', $coursecontext)) {
            $isteacher = true;
            break;
        }
    }

    if (!$isadmin && !$isteacher) {
        throw new moodle_exception('nopermissions', 'error', '', 'view student list');
    }

    // Get page parameters
    $page = optional_param('page', 0, PARAM_INT);
    $search = optional_param('search', '', PARAM_RAW);
    $perpage = optional_param('perpage', 10, PARAM_INT);
    $sort = optional_param('sort', 'id', PARAM_ALPHA);
    $direction = optional_param('direction', 'ASC', PARAM_ALPHA);

    // Page setup
    $PAGE->set_context($context);
    $PAGE->set_url(new moodle_url('/theme/alpha/students.php', array(
        'page' => $page,
        'perpage' => $perpage,
        'sort' => $sort,
        'direction' => $direction,
        'search' => $search
    )));
    $PAGE->set_title(get_string('studentlist', 'theme_alpha'));
    $PAGE->set_heading(get_string('studentlist', 'theme_alpha'));
    $PAGE->requires->js_call_amd('theme_alpha/student_list', 'init');

    // Get student role ID
    $studentrole = $DB->get_record('role', array('shortname' => 'student'), '*', MUST_EXIST);

    // Get students with the student role
    $studentsql = "
        SELECT u.id, u.firstname, u.lastname, u.username, u.email 
        FROM {user} u
        JOIN {role_assignments} ra ON u.id = ra.userid
        JOIN {context} ctx ON ra.contextid = ctx.id
        WHERE ra.roleid = :studentroleid
          AND ctx.contextlevel = :contextlevel 
          $searchsql
    ";

    $params = [
        'studentroleid' => $studentrole->id,
        'contextlevel' => CONTEXT_COURSE
    ];

    $searchsql = '';
    if (!empty($search)) {
        $searchlike = '%' . $DB->sql_like_escape($search) . '%';
        $searchsql = " AND (" . $DB->sql_like('u.firstname', ':search1', false) . " 
                       OR " . $DB->sql_like('u.lastname', ':search2', false) . ")";
        $params['search1'] = $searchlike;
        $params['search2'] = $searchlike;
    }

    // Pagination
    $students = $DB->get_records_sql($studentsql, $params, $page * $perpage, $perpage);

    // Total students
    $totalstudents = $DB->count_records_sql("SELECT COUNT(*) FROM {user} u
        JOIN {role_assignments} ra ON u.id = ra.userid
        JOIN {context} ctx ON ra.contextid = ctx.id
        WHERE ra.roleid = :studentroleid AND ctx.contextlevel = :contextlevel", $params);

    $totalpages = ceil($totalstudents / $perpage);

    // Pagination setup
    $pagination = new stdClass();
    $pagination->pages = array();

    if ($totalstudents > 0) {
        if ($page > 0) {
            $pagination->previousurl = new moodle_url('/theme/alpha/students.php', [
                'page' => $page - 1,
                'perpage' => $perpage,
                'sort' => $sort,
                'direction' => $direction,
                'search' => $search
            ]);
        }

        for ($i = 0; $i < $totalpages; $i++) {
            $pagination->pages[] = [
                'number' => $i + 1,
                'current' => ($i == $page),
                'url' => new moodle_url('/theme/alpha/students.php', [
                    'page' => $i,
                    'perpage' => $perpage,
                    'sort' => $sort,
                    'direction' => $direction,
                    'search' => $search
                ])
            ];
        }

        if ($page < $totalpages - 1) {
            $pagination->nexturl = new moodle_url('/theme/alpha/students.php', [
                'page' => $page + 1,
                'perpage' => $perpage,
                'sort' => $sort,
                'direction' => $direction,
                'search' => $search
            ]);
        }
    }

    // Output starts here
    echo $OUTPUT->header();
    
    echo $OUTPUT->render_from_template('theme_alpha/student_list', [
        'students' => array_values($students),
        'total' => $totalstudents,
        'sort' => $sort,
        'direction' => $direction,
        'search' => $search,
        'pagination' => $pagination,
        'showing_start' => ($page * $perpage) + 1,
        'showing_end' => min(($page + 1) * $perpage, $totalstudents),
        'total_students' => $totalstudents
    ]);

    echo $OUTPUT->footer();

} catch (Exception $e) {
    debugging('Error in students.php: ' . $e->getMessage(), DEBUG_DEVELOPER);
    echo $OUTPUT->header();
    echo $OUTPUT->notification(get_string('error', 'theme_alpha'), 'error');
    echo $OUTPUT->footer();
}

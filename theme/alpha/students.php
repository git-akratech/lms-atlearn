<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');

try {
    // Check for valid login
    require_login();
    $context = context_system::instance();
    
    // Check permissions
    $isadmin = has_capability('moodle/site:config', $context);
    $isteacher = false;
    
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

    // Get students data
    $students = \theme_alpha\util\user_data::get_users_list(
        $page, 
        $perpage, 
        $search, 
        $sort, 
        $direction, 
        $studentrole->id
    );

    // Setup pagination
    $totalstudents = $students['total'];
    $totalpages = ceil($totalstudents / $perpage);

    // Generate pagination data
    $pagination = new stdClass();
    $pagination->pages = array();

    if ($totalstudents > 0) {
        // Previous page
        if ($page > 0) {
            $pagination->previousurl = new moodle_url('/theme/alpha/students.php', array(
                'page' => $page - 1,
                'perpage' => $perpage,
                'sort' => $sort,
                'direction' => $direction,
                'search' => $search
            ));
        }

        // Page numbers
        for ($i = 0; $i < $totalpages; $i++) {
            if ($i == $page) {
                $pagination->pages[] = array(
                    'number' => $i + 1,
                    'current' => true
                );
            } else {
                $pagination->pages[] = array(
                    'number' => $i + 1,
                    'url' => new moodle_url('/theme/alpha/students.php', array(
                        'page' => $i,
                        'perpage' => $perpage,
                        'sort' => $sort,
                        'direction' => $direction,
                        'search' => $search
                    ))
                );
            }
        }

        // Next page
        if ($page < $totalpages - 1) {
            $pagination->nexturl = new moodle_url('/theme/alpha/students.php', array(
                'page' => $page + 1,
                'perpage' => $perpage,
                'sort' => $sort,
                'direction' => $direction,
                'search' => $search
            ));
        }
    }

    // Output starts here
    echo $OUTPUT->header();
    
    echo $OUTPUT->render_from_template('theme_alpha/student_list', array(
        'students' => $students['users'],
        'total' => $students['total'],
        'sort' => $sort,
        'direction' => $direction,
        'search' => $search,
        'pagination' => $pagination,
        'showing_start' => ($page * $perpage) + 1,
        'showing_end' => min(($page + 1) * $perpage, $totalstudents),
        'total_students' => $totalstudents
    ));
    
    echo $OUTPUT->footer();

} catch (Exception $e) {
    debugging('Error in students.php: ' . $e->getMessage(), DEBUG_DEVELOPER);
    echo $OUTPUT->header();
    echo $OUTPUT->notification(get_string('error', 'theme_alpha'), 'error');
    echo $OUTPUT->footer();
}
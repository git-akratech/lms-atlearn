<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->libdir.'/completionlib.php');  // Add this line for completion_info class
require_once($CFG->dirroot . '/theme/alpha/lib.php'); 
// Check for valid login
require_login();
$context = context_system::instance();

// Check permissions
$isadmin = has_capability('moodle/site:config', $context);
$isteacher = false;

$courses = enrol_get_users_courses($USER->id);
foreach ($courses as $course) {
    $coursecontext = context_course::instance($course->id);
    if (has_capability('moodle/course:viewhiddenactivities', $coursecontext)) {
        $isteacher = true;
        break;
    }
}

if (!$isadmin && !$isteacher) {
    throw new moodle_exception('nopermissions', 'error', '', 'view reports');
}

// Get parameters
$page = optional_param('page', 0, PARAM_INT);
$perpage = optional_param('perpage', 10, PARAM_INT);
$search = optional_param('search', '', PARAM_RAW);

// Page setup
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/theme/alpha/index.php'));
$PAGE->set_title(get_string('reports', 'theme_alpha'));
$PAGE->set_heading(get_string('reports', 'theme_alpha'));
$PAGE->set_pagelayout('standard');

// Get visible courses with completion enabled
try {
    $params = array();
    $searchsql = '';
    
    if (!empty($search)) {
        $searchsql = ' AND ' . $DB->sql_like('c.fullname', ':search', false);
        $params['search'] = '%' . $DB->sql_like_escape($search) . '%';
    }

    // Basic course query with completion enabled
    $sql = "SELECT c.id, c.fullname, c.shortname, c.enablecompletion 
            FROM {course} c
            WHERE c.visible = 1 
            AND c.enablecompletion = 1 
            AND c.id != :siteid" . $searchsql;
    
    $params['siteid'] = SITEID;

    // Get total count
    $totalcourses = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);
    
    // Get paginated results
    $courses = $DB->get_records_sql($sql, $params, $page * $perpage, $perpage);

    // Prepare data for display
    $reportdata = array();
    foreach ($courses as $course) {
        // Get enrollment count
        $coursecontext = context_course::instance($course->id);
        $enrolled = count_enrolled_users($coursecontext, '', 0, true);

        // Get completion count
        $completed = $DB->count_records_sql(
            "SELECT COUNT(DISTINCT userid) 
             FROM {course_completions}
             WHERE course = :courseid AND timecompleted IS NOT NULL",
            array('courseid' => $course->id)
        );

        $percentage = $enrolled > 0 ? round(($completed / $enrolled) * 100, 1) : 0;

        $reportdata[] = array(
            'id' => $course->id,
            'fullname' => $course->fullname,
            'shortname' => $course->shortname,
            'enrolled' => $enrolled,
            'completed' => $completed,
            'percentage' => $percentage
        );
    }

    // Calculate pagination data
$showing_start = ($page * $perpage) + 1;
$showing_end = min(($page + 1) * $perpage, $totalcourses);

// In the template context section:
$templatecontext = [
    'reportdata' => $reportdata,
    'search' => $search,
    'pagination' => [
        'totalcount' => $totalcourses,
        'page' => $page,
        'perpage' => $perpage,
        'showing_start' => $showing_start,
        'showing_end' => $showing_end,
        'total' => $totalcourses,
        'pages' => ceil($totalcourses / $perpage),
        'pagelist' => theme_alpha_generate_page_list(
            $page,
            ceil($totalcourses / $perpage),
            $PAGE->url,
            5
        ),
        'previousurl' => $page > 0 ? new moodle_url('/theme/alpha/reports.php', [
            'page' => $page - 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null,
        'nexturl' => $showing_end < $totalcourses ? new moodle_url('/theme/alpha/reports.php', [
            'page' => $page + 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null
    ]
];

    // Output starts here
    echo $OUTPUT->header();

    // Display search form
    $searchform = '
    <form class="mb-3" action="" method="get">
        <div class="input-group">
            <input type="text" name="search" value="' . s($search) . '" 
                   class="form-control" placeholder="' . get_string('searchcourses', 'theme_alpha') . '">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">' . get_string('search') . '</button>
            </div>
        </div>
    </form>';

    echo $searchform;

    // Display results
    if (!empty($reportdata)) {
        $table = new html_table();
        $table->head = array(
            get_string('course'),
            get_string('enrolled', 'theme_alpha'),
            get_string('completed', 'theme_alpha'),
            get_string('completion', 'theme_alpha')
        );
        $table->attributes['class'] = 'generaltable';
        
        foreach ($reportdata as $data) {
            $progressbar = html_writer::div(
                html_writer::div(
                    $data['percentage'] . '%',
                    'progress-bar',
                    array(
                        'role' => 'progressbar',
                        'style' => 'width: ' . $data['percentage'] . '%',
                        'aria-valuenow' => $data['percentage'],
                        'aria-valuemin' => 0,
                        'aria-valuemax' => 100
                    )
                ),
                'progress'
            );
            
            $table->data[] = array(
                html_writer::link(
                    new moodle_url('/course/view.php', array('id' => $data['id'])),
                    $data['fullname']
                ),
                $data['enrolled'],
                $data['completed'],
                $progressbar
            );
        }
        
        echo html_writer::table($table);
        
        // Add pagination
        echo $OUTPUT->paging_bar($totalcourses, $page, $perpage, $PAGE->url);
    } else {
        echo $OUTPUT->notification(get_string('noresults', 'theme_alpha'), 'info');
    }

} catch (Exception $e) {
    debugging('Error in report generation: ' . $e->getMessage(), DEBUG_DEVELOPER);
    echo $OUTPUT->notification(get_string('errorgetreport', 'theme_alpha'), 'error');
}

echo $OUTPUT->footer();
<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->dirroot . '/theme/alpha/lib.php'); 
require_login();
$context = context_system::instance();
require_capability('local/kopere_dashboard:view', $context);
// Get parameters
$page = optional_param('page', 0, PARAM_INT);
$perpage = optional_param('perpage', 10, PARAM_INT);
$search = optional_param('search', '', PARAM_RAW);

// Set up the page
$PAGE->set_url(new moodle_url('/local/kopere_dashboard/users_completed_course.php'));
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('users_completed_course', 'local_kopere_dashboard'));
$PAGE->set_heading(get_string('users_completed_course', 'local_kopere_dashboard'));

// Fetch courses
try {
    $params = [];
    $searchsql = '';

    if (!empty($search)) {
        $searchsql = ' AND ' . $DB->sql_like('c.fullname', ':search', false);
        $params['search'] = '%' . $DB->sql_like_escape($search) . '%';
    }

    // Updated SQL query to include course completions
    $sql = "SELECT c.id AS id, c.fullname AS course_name, c.shortname AS short_name, c.visible,
               (SELECT COUNT(*) FROM {user_enrolments} ue
                JOIN {enrol} e ON e.id = ue.enrolid
                WHERE e.courseid = c.id AND ue.status = 0) AS enrolled_count,
               (SELECT COUNT(*) FROM {course_completions} cc
                WHERE cc.course = c.id AND cc.timecompleted IS NOT NULL) AS completed_count
        FROM {course} c 
        WHERE c.visible = 1" . $searchsql;
    $params['siteid'] = SITEID;
    // Get total count
    $total_courses = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);

    $courses = $DB->get_records_sql($sql, $params, $page * $perpage, $perpage);

    $coursecompletedreportdata = array();
    $no = 1;
    foreach ($courses as $course) {
        
        $coursecompletedreportdata[] = array(
            'id' => $course->id,
            'course_name' => $course->course_name,
            'short_name' => $course->short_name,
            'enrolled_count' => $course->enrolled_count,
            'completed_count' => $course->completed_count,   
        );
    
     }

 // Calculate pagination data
 $showing_start = ($page * $perpage) + 1;
 $showing_end = min(($page + 1) * $perpage, $totalusers);

 $templatecontext = [
    'coursecompletedreportdata' => $coursecompletedreportdata,
    'search' => $search,
    'pagination' => [
        'totalcount' => $total_courses,
        'page' => $page,
        'perpage' => $perpage,
        'showing_start' => $showing_start,
        'showing_end' => $showing_end,
        'total' => $total_courses,
        'pages' => ceil($total_courses / $perpage),
        'pagelist' => theme_alpha_generate_page_list(
            $page,
            ceil($total_courses / $perpage),
            $PAGE->url,
            5
        ),
        'previousurl' => $page > 0 ? new moodle_url('/local/kopere_dashboard/users_completed_course.php', [
            'page' => $page - 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null,
        'nexturl' => $showing_end < $total_courses ? new moodle_url('/local/kopere_dashboard/users_completed_course.php', [
            'page' => $page + 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null
    ]
];
echo $OUTPUT->header();
echo html_writer::tag('h4', get_string('users_completed_course', 'local_kopere_dashboard'));

$searchform = '
<form class="mb-3" action="" method="get">
    <div class="input-group">
        <input type="text" name="search" value="' . s($search) . '" 
               class="form-control" placeholder="' . get_string('search', 'local_kopere_dashboard') . '">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">' . get_string('search') . '</button>
        </div>
    </div>
</form>';

echo $searchform;
// Display the courses in a table
if (!empty($coursecompletedreportdata)) {
    $table = new html_table();
    
    $no_header = new html_table_cell(get_string('no','local_kopere_dashboard'));
    $no_header->attributes['class'] = 'no-header';

    $course_name_header = new html_table_cell(get_string('course_name','local_kopere_dashboard'));
    $course_name_header->attributes['class'] = 'course-name-header';

    $short_name_header = new html_table_cell(get_string('short_name','local_kopere_dashboard'));
    $short_name_header->attributes['class'] = 'short-name-header';

    $enrolled_header = new html_table_cell(get_string('enrolled','local_kopere_dashboard'));
    $enrolled_header->attributes['class'] = 'enrolled-header';

    $completed_header = new html_table_cell(get_string('completed','local_kopere_dashboard'));
    $completed_header->attributes['class'] = 'completed-header';
   
   // Create a table row for headers
   $header_row = new html_table_row();
   $header_row->cells = [$no_header, $course_name_header, $short_name_header, $enrolled_header,$completed_header];
   $table->data = [$header_row];

   
    foreach ($coursecompletedreportdata as $coursecompleted) {
        $row = new html_table_row();
        $row->cells = [
            new html_table_cell($coursecompleted['id']),  // Increment the counter 
            new html_table_cell(
                html_writer::link(
                    new moodle_url('/course/view.php', ['id' => $coursecompleted['id']]),
                    $coursecompleted['course_name'],
                    ['target' => '_blank'] 
                )
            ),
            new html_table_cell($coursecompleted['short_name']), 
            new html_table_cell($coursecompleted['enrolled_count']), 
            new html_table_cell($coursecompleted['completed_count']),
        ];
        $table->data[] = $row; // Add the row to the table
    }

    echo html_writer::table($table);
      // Add pagination
      echo $OUTPUT->paging_bar($total_courses, $page, $perpage, $PAGE->url);
} else {
    echo html_writer::tag('p', get_string('no_courses_found', 'local_kopere_dashboard'));
}
} catch (dml_exception $e) {
    echo $OUTPUT->header();
    echo html_writer::tag('h1', get_string('error', 'local_kopere_dashboard'));
    echo html_writer::tag('p', get_string('error_reading_database', 'local_kopere_dashboard'));
    echo html_writer::tag('p', 'Detailed error: ' . $e->getMessage());
    echo $OUTPUT->footer();
    exit();
}

echo $OUTPUT->footer();

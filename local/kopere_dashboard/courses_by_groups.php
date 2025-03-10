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
$PAGE->set_url(new moodle_url('/local/kopere_dashboard/courses_by_groups.php'));
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('courses_by_groups', 'local_kopere_dashboard'));
$PAGE->set_heading(get_string('courses_by_groups', 'local_kopere_dashboard'));
// Fetch courses with groups enabled
try {
    $params = array();
    $searchsql = '';

    if (!empty($search)) {
        $searchsql = ' AND ' . $DB->sql_like('c.fullname', ':search', false);
        $params['search'] = '%' . $DB->sql_like_escape($search) . '%';
    }

    $sql = "SELECT c.id, c.fullname, g.name AS groupname
        FROM {course} c
        JOIN {groups} g ON g.courseid = c.id". $searchsql;
           
$params['siteid'] = SITEID;
 // Get total count
 $totalcourses = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);
 // Get paginated results
 $courses = $DB->get_records_sql($sql, $params, $page * $perpage, $perpage);
 $groupreportdata = array();

 foreach ($courses as $course) {
   
    $groupreportdata[] = array(
        'id' => $course->id,
        'fullname' => $course->fullname,
        'groupname' => $course->groupname,
      
    );

 }
 // Calculate pagination data
$showing_start = ($page * $perpage) + 1;
$showing_end = min(($page + 1) * $perpage, $totalcourses);

// In the template context section:
$templatecontext = [
    'groupreportdata' => $groupreportdata,
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
        'previousurl' => $page > 0 ? new moodle_url('/local/kopere_dashboard/courses_by_groups.php', [
            'page' => $page - 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null,
        'nexturl' => $showing_end < $totalcourses ? new moodle_url('/local/kopere_dashboard/courses_by_groups.php', [
            'page' => $page + 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null
    ]
];
// Output starts here
echo $OUTPUT->header();
echo html_writer::tag('h3', get_string('courses_by_groups', 'local_kopere_dashboard'));

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


// Display the courses in a table
if (!empty($groupreportdata)) {
    $table = new html_table();

    // Create table header cells with class attributes
    $no_header = new html_table_cell(get_string('no','local_kopere_dashboard'));
    $no_header->attributes['class'] = 'no-header';

    $course_name_header = new html_table_cell(get_string('course_name','local_kopere_dashboard'));
    $course_name_header->attributes['class'] = 'course-name-header';

    $group_name_header = new html_table_cell(get_string('group_name','local_kopere_dashboard'));
    $group_name_header->attributes['class'] = 'group-name-header';

    // Create a table row for headers
    $header_row = new html_table_row();
    $header_row->cells = [$no_header, $course_name_header, $group_name_header];

    // Assign header row correctly
    $table->data = [$header_row];

    // Add course data rows
    foreach ($groupreportdata as $data) {
        $row = new html_table_row();
        $row->cells = [
            new html_table_cell($data['id']),
            new html_table_cell(
                html_writer::link(
                    new moodle_url('/course/view.php', ['id' => $data['id']]),
                    $data['fullname'],
                    ['target' => '_blank'] 
                )
            ),
            new html_table_cell($data['groupname'])
        ];
        $table->data[] = $row; // Correct format
    }

    echo html_writer::table($table);
    // Add pagination
    echo $OUTPUT->paging_bar($totalcourses, $page, $perpage, $PAGE->url);
} else {
    echo html_writer::tag('p', get_string('no_courses_found', 'local_kopere_dashboard'));
}

} catch (dml_exception $e) {
    echo $OUTPUT->header();
    echo html_writer::tag('h1', get_string('error', 'local_kopere_dashboard'));
    echo html_writer::tag('p', get_string('error_reading_database', 'local_kopere_dashboard'));
    echo html_writer::tag('p', 'Detailed error: ' . $e->getMessage()); // Display the error message
    echo $OUTPUT->footer();
    exit();
}

echo $OUTPUT->footer();
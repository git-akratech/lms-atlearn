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
$PAGE->set_url(new moodle_url('/local/kopere_dashboard/disk_usage_report.php'));
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('disk_usage_report', 'local_kopere_dashboard'));
$PAGE->set_heading(get_string('disk_usage_report', 'local_kopere_dashboard'));
// Fetch disk usage data
try {
    $params = array();
    $searchsql = '';

    if (!empty($search)) {
        $searchsql = ' AND ' . $DB->sql_like('c.fullname','c.shortname', ':search', false);
        $params['search'] = '%' . $DB->sql_like_escape($search) . '%';
    }
    // SQL query to fetch course data
    $sql = "SELECT c.id AS course_id, c.fullname AS course_name, c.shortname AS short_name, c.visible,
               (SELECT SUM(filesize) FROM {files} WHERE contextid = c.id) AS course_files,
               (SELECT SUM(filesize) FROM {files} WHERE contextid IN (SELECT id FROM {context} WHERE instanceid = c.id AND contextlevel = 50)) AS module_files
        FROM {course} c
        WHERE c.visible = 1" . $searchsql;
    $params['siteid'] = SITEID;
     // Get total count
    $totalcourses = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);
    $courses = $DB->get_records_sql($sql ,$params, $page * $perpage, $perpage);
    $diskusagereportdata = array();

    foreach ($courses as $course) {
        $no=1;
        $diskusagereportdata[] = array(
            'course_id' => $no++,
            'course_name' => $course->course_name,
            'short_name' => $course->short_name,
            'visible' => $course->visible ? 'Yes' : 'No',
            'course_files' => display_size($course->course_files),
            'module_files' => display_size($course->module_files),
          
        );
    
     }

           // Calculate pagination data
$showing_start = ($page * $perpage) + 1;
$showing_end = min(($page + 1) * $perpage, $totalcourses);

// In the template context section:
$templatecontext = [
    'diskusagereportdata' => $diskusagereportdata,
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
        'previousurl' => $page > 0 ? new moodle_url('/local/kopere_dashboard/disk_usage_report.php', [
            'page' => $page - 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null,
        'nexturl' => $showing_end < $totalcourses ? new moodle_url('/local/kopere_dashboard/disk_usage_report.php', [
            'page' => $page + 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null
    ]
];
echo $OUTPUT->header();
echo html_writer::tag('h4', get_string('disk_usage_report', 'local_kopere_dashboard'));
// Display search form
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
// Display the disk usage data in a table
if (!empty($diskusagereportdata)) {
    $table = new html_table();
    
    $no_header = new html_table_cell(get_string('no','local_kopere_dashboard'));
    $no_header->attributes['class'] = 'no-header';
  
    $course_name_header = new html_table_cell(get_string('course_name','local_kopere_dashboard'));
    $course_name_header->attributes['class'] = 'course-name-header';
    
    $short_name_header = new html_table_cell(get_string('short_name','local_kopere_dashboard'));
    $short_name_header->attributes['class'] = 'short-name-header';
      
    $visible_header = new html_table_cell(get_string('visible','local_kopere_dashboard'));
    $visible_header->attributes['class'] = 'visible-header';
   
    $course_files_header = new html_table_cell(get_string('course_files','local_kopere_dashboard'));
    $course_files_header->attributes['class'] = 'course-files-header';
   
    $module_files_header = new html_table_cell(get_string('module_files','local_kopere_dashboard'));
    $module_files_header->attributes['class'] = 'module-files-header';
     // Create a table row for headers
     $header_row = new html_table_row();
     $header_row->cells = [$no_header, $course_name_header, $short_name_header, $visible_header,$course_files_header,$module_files_header ];
    // Assign header row correctly
    $table->data = [$header_row];

    $no = 1; // Initialize counter for numbering
    foreach ($diskusagereportdata as $disk) {
        $row = new html_table_row();
        $row->cells = [
            new html_table_cell($no++), // Increment the counter
            new html_table_cell(
                html_writer::link(
                    new moodle_url('/course/view.php', ['id' => $disk['course_id']]),
                    $disk['course_name'],
                    ['target' => '_blank'] 
                )
            ),
            new html_table_cell($disk['short_name']),
            new html_table_cell($disk['visible'] ? 'Yes' : 'No'),
            new html_table_cell($disk['course_files']), 
            new html_table_cell($disk['module_files']), 
        ];
        $table->data[] = $row; // Add the row to the table
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
    echo html_writer::tag('p', 'Detailed error: ' . $e->getMessage());
    echo $OUTPUT->footer();
    exit();
}

echo $OUTPUT->footer();
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
$PAGE->set_url(new moodle_url('/local/kopere_dashboard/guest_logins_report.php'));
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('guest_logins_report', 'local_kopere_dashboard'));
$PAGE->set_heading(get_string('guest_logins_report', 'local_kopere_dashboard'));

// Fetch guest login data
try {
    $params = array();
    $searchsql = '';

    if (!empty($search)) {
        $searchsql = ' AND ' . $DB->sql_like('u.firstname', ':search', false);
        $params['search'] = '%' . $DB->sql_like_escape($search) . '%';
    }

    $sql = "SELECT u.id AS id, u.firstname AS student_name, u.lastip AS ip_address, u.lastlogin AS login_time
    FROM {user} u
    WHERE u.username = 'guest'" . $searchsql;

    $params['siteid'] = SITEID;
    // Get total count
    $total_logins = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);

   
    $guest_logins = $DB->get_records_sql($sql, $params, $page * $perpage, $perpage);
    $guestreportdata = array();

   
    foreach ($guest_logins as $login) {
   
        $guestreportdata[] = array(
            'id'=> $login->id,
            'student_name' => $login->student_name,
            'ip_address' => $login->ip_address, 
            'login_time' => $login->login_time
        );
    
     }
      // Calculate pagination data
$showing_start = ($page * $perpage) + 1;
$showing_end = min(($page + 1) * $perpage, $total_logins);

// In the template context section:
$templatecontext = [
    'guestreportdata' => $guestreportdata,
    'search' => $search,
    'pagination' => [
        'totalcount' => $total_logins,
        'page' => $page,
        'perpage' => $perpage,
        'showing_start' => $showing_start,
        'showing_end' => $showing_end,
        'total' => $total_logins,
        'pages' => ceil($total_logins / $perpage),
        'pagelist' => theme_alpha_generate_page_list(
            $page,
            ceil($total_logins / $perpage),
            $PAGE->url,
            5
        ),
        'previousurl' => $page > 0 ? new moodle_url('/local/kopere_dashboard/guest_logins_report.php', [
            'page' => $page - 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null,
        'nexturl' => $showing_end < $total_logins ? new moodle_url('/local/kopere_dashboard/guest_logins_report.php', [
            'page' => $page + 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null
    ]
];
echo $OUTPUT->header();
echo html_writer::tag('h4', get_string('guest_logins_report', 'local_kopere_dashboard'));
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

// Display the guest logins in a table
if (!empty($guestreportdata)) {
    $table = new html_table();

     // Create table header cells with class attributes
     $no_header = new html_table_cell(get_string('no','local_kopere_dashboard'));
     $no_header->attributes['class'] = 'no-header';
     
     $student_name_header = new html_table_cell(get_string('student_name','local_kopere_dashboard'));
     $student_name_header->attributes['class'] = 'student-name-header';
     
     $ip_address_header = new html_table_cell(get_string('ip_address','local_kopere_dashboard'));
     $ip_address_header->attributes['class'] = 'ip-address-header';
    
     $login_time_header = new html_table_cell(get_string('login_time','local_kopere_dashboard'));
     $login_time_header->attributes['class'] = 'login-time-header';
    // Create a table row for headers
    $header_row = new html_table_row();
    $header_row->cells = [$no_header, $student_name_header, $ip_address_header, $login_time_header];
      // Assign header row correctly
    $table->data = [$header_row];


    foreach ($guestreportdata as $login) {
        $row = new html_table_row();
        $row->cells = [
            new html_table_cell($login['id']), 
            new html_table_cell($login['student_name']),
            new html_table_cell($login['ip_address']), 
            new html_table_cell($login['login_time']),
        ];
        $table->data[] = $row; // Add the row to the table
    }

    echo html_writer::table($table);

    // Add pagination
    echo $OUTPUT->paging_bar($total_logins, $page, $perpage, $PAGE->url);
} else {
    echo html_writer::tag('p', get_string('no_guest_logins_found', 'local_kopere_dashboard'));
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
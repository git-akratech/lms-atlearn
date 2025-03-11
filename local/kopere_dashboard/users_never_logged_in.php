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
$PAGE->set_url(new moodle_url('/local/kopere_dashboard/users_never_logged_in.php'));
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('users_never_logged_in', 'local_kopere_dashboard'));
$PAGE->set_heading(get_string('users_never_logged_in', 'local_kopere_dashboard'));
// Fetch users who have never logged in
try {
    $params = array();
    $searchsql = '';
    if (!empty($search)) {
        $searchsql = ' AND ' . $DB->sql_like('u.username', ':search', false);
        $params['search'] = '%' . $DB->sql_like_escape($search) . '%';
    }
    // SQL query to fetch users who have never logged in
    $sql = "SELECT u.id AS userid, u.username AS username, u.email AS useremail, u.city AS usercity, u.timecreated AS registered
        FROM {user} u
        WHERE u.lastlogin = 0" . $searchsql;
  $params['siteid'] = SITEID;
   // Get total count
   $totalusers = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);
    $users = $DB->get_records_sql($sql,$params, $page * $perpage, $perpage);
    $inactivereportdata = array();

    foreach ($users as $user) {
        
        $inactivereportdata[] = array(
            'userid' => $user->userid,
            'username' => $user->username,
            'useremail' => $user->useremail,
            'usercity' => $user->usercity,
            'registered' => userdate($user->registered),
           
          
        );
    
     }
           // Calculate pagination data
           $showing_start = ($page * $perpage) + 1;
           $showing_end = min(($page + 1) * $perpage, $totalusers);

           // In the template context section:
$templatecontext = [
    'inactivereportdata' => $inactivereportdata,
    'search' => $search,
    'pagination' => [
        'totalcount' => $totalusers,
        'page' => $page,
        'perpage' => $perpage,
        'showing_start' => $showing_start,
        'showing_end' => $showing_end,
        'total' => $totalusers,
        'pages' => ceil($totalusers / $perpage),
        'pagelist' => theme_alpha_generate_page_list(
            $page,
            ceil($totalusers / $perpage),
            $PAGE->url,
            5
        ),
        'previousurl' => $page > 0 ? new moodle_url('/local/kopere_dashboard/users_never_logged_in.php', [
            'page' => $page - 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null,
        'nexturl' => $showing_end < $totalusers ? new moodle_url('/local/kopere_dashboard/users_never_logged_in.php', [
            'page' => $page + 1,
            'perpage' => $perpage,
            'search' => $search
        ]) : null
    ]
];
echo $OUTPUT->header();
echo html_writer::tag('h4', get_string('users_never_logged_in', 'local_kopere_dashboard'));
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
// Display the users in a table
if (!empty($inactivereportdata)) {
    $table = new html_table();
    
    $no_header = new html_table_cell(get_string('no','local_kopere_dashboard'));
    $no_header->attributes['class'] = 'no-header';

    $user_name_header = new html_table_cell(get_string('user_name','local_kopere_dashboard'));
    $user_name_header->attributes['class'] = 'user-name-header';

    $email_header = new html_table_cell(get_string('email','local_kopere_dashboard'));
    $email_header->attributes['class'] = 'email-header';

    $city_header = new html_table_cell(get_string('city','local_kopere_dashboard'));
    $city_header->attributes['class'] = 'city-header';

    $registered_header = new html_table_cell(get_string('registered','local_kopere_dashboard'));
    $registered_header->attributes['class'] = 'registered-header';

     // Create a table row for headers
     $header_row = new html_table_row();
     $header_row->cells = [$no_header, $user_name_header, $email_header, $city_header,$registered_header];
    
    $table->data = [$header_row];

    foreach ($inactivereportdata as $inactivereport) {
        $row = new html_table_row();
        $row->cells = [
            new html_table_cell($inactivereport['userid']),
            new html_table_cell($inactivereport['username']),
            new html_table_cell($inactivereport['useremail']),
            new html_table_cell($inactivereport['usercity']),
            new html_table_cell($inactivereport['registered']),
        ];
        $table->data[] = $row; // Add the row to the table
    }

    echo html_writer::table($table);
     // Add pagination
     echo $OUTPUT->paging_bar($totalusers, $page, $perpage, $PAGE->url);
} else {
    echo html_writer::tag('p', get_string('no_users_found', 'local_kopere_dashboard'));
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
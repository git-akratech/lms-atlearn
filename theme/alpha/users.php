<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');

// Check for valid login and capability
require_login();
$context = context_system::instance();
require_capability('moodle/user:viewalldetails', $context);
// Add this before the header output
$PAGE->requires->js_call_amd('theme_alpha/user_list', 'init');
// Get page parameters
$page = optional_param('page', 0, PARAM_INT);
$search = optional_param('search', '', PARAM_RAW);
$perpage = optional_param('perpage', 10, PARAM_INT);
$sort = optional_param('sort', 'id', PARAM_ALPHA); // Default to ID
$direction = optional_param('direction', 'ASC', PARAM_ALPHA);

// Page setup
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/theme/alpha/users.php', array(
    'page' => $page,
    'perpage' => $perpage,
    'sort' => $sort,
    'direction' => $direction,
    'search' => $search
)));
$PAGE->set_title(get_string('userlist', 'theme_alpha'));
$PAGE->set_heading(get_string('userlist', 'theme_alpha'));

// Get users data
$userdata = \theme_alpha\util\user_data::get_users_list($page, $perpage, $search, $sort, $direction);

$totalusers = $userdata['total'];
$totalpages = ceil($totalusers / $perpage);

// Generate pagination links
$pagination = new \stdClass();
$pagination->pages = array();

// Previous page
if ($page > 0) {
    $pagination->previousurl = new moodle_url('/theme/alpha/users.php', array(
        'page' => $page - 1,
        'perpage' => $perpage,
        'sort' => $sort,
        'direction' => $direction
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
            'url' => new moodle_url('/theme/alpha/users.php', array(
                'page' => $i,
                'perpage' => $perpage,
                'sort' => $sort,
                'direction' => $direction
            ))
        );
    }
}

// Next page
if ($page < $totalpages - 1) {
    $pagination->nexturl = new moodle_url('/theme/alpha/users.php', array(
        'page' => $page + 1,
        'perpage' => $perpage,
        'sort' => $sort,
        'direction' => $direction
    ));
}
// Output starts here
echo $OUTPUT->header();
echo $OUTPUT->render_from_template('theme_alpha/kopera_users', array(
    'users' => $userdata['users'],
    'total' => $userdata['total'],
    'sort' => $userdata['sort'],
    'direction' => $userdata['direction'],
    'page' => $userdata['page'],
    'perpage' => $userdata['perpage'],
    'search' => $search, 'pagination' => $pagination,
    'showing_start' => ($page * $perpage) + 1,
    'showing_end' => min(($page + 1) * $perpage, $totalusers),
    'total_users' => $totalusers
));
echo $OUTPUT->footer();
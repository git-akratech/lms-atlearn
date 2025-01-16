<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');

// Check for valid login and capability
require_login();
$context = context_system::instance();
require_capability('moodle/user:viewalldetails', $context);

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

// Output starts here
echo $OUTPUT->header();
echo $OUTPUT->render_from_template('theme_alpha/kopera_users', array(
    'users' => $userdata['users'],
    'total' => $userdata['total'],
    'sort' => $userdata['sort'],
    'direction' => $userdata['direction'],
    'page' => $userdata['page'],
    'perpage' => $userdata['perpage'],
    'search' => $search
));
echo $OUTPUT->footer();
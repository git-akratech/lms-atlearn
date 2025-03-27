<?php
require('../../config.php');
require_once($CFG->dirroot.'/lib/moodlelib.php');
require_once($CFG->libdir.'/formslib.php');
require_once($CFG->dirroot.'/user/lib.php');


if (!isset($_GET['role'])) {
    throw new moodle_exception('Missing role parameter. Please go back and try again.');
}

$role = required_param('role', PARAM_ALPHA);

$issuer = $DB->get_record('oauth2_issuer', ['servicetype' => 'google']);
$googleid = $issuer ? $issuer->id : 1; 
$google_signup_url = $CFG->wwwroot . "/auth/oauth2/login.php?id={$googleid}&sesskey=" . sesskey();
// Redirect to Moodle OAuth2 Google Login

redirect($google_signup_url);

// Assign Role after successful login
if (isloggedin() && !isguestuser() && isset($USER->id)) {
    $roleid = ($role === 'teacher') ? 3 : 5; // Replace with correct role IDs
    role_assign($roleid, $USER->id, context_system::instance());
}
else {
    throw new moodle_exception('User authentication failed.');
}
?>

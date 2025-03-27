<?php
require('../../config.php');
require_once($CFG->dirroot.'/lib/formslib.php');
require_once($CFG->dirroot.'/lib/moodlelib.php');
require_once($CFG->dirroot.'/user/lib.php');

$role = optional_param('role', '', PARAM_ALPHA);
if (empty($role)) {
    redirect(new moodle_url('/auth/customsignup/manual_signup.php?role=teacher'));
    exit;
}

?>

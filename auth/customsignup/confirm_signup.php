<?php
require('../../config.php');
require_once($CFG->dirroot.'/user/lib.php');

$token = required_param('token', PARAM_ALPHANUMEXT);

$record = $DB->get_record('user_email_verification', ['token' => $token], '*', IGNORE_MISSING);

if (!$record) {
    print_error('Invalid or expired token.');
}

$user = $DB->get_record('user', ['id' => $record->userid], '*', MUST_EXIST);
$user->confirmed = 1;
$DB->update_record('user', $user);

// Optional: delete token after confirmation
$DB->delete_records('user_email_verification', ['id' => $record->id]);

echo $OUTPUT->header();
echo '<div style="text-align:center; margin-top:50px;">Your email has been verified. You may now <a href="'.$CFG->wwwroot.'/login/index.php">log in</a>.</div>';
echo $OUTPUT->footer();

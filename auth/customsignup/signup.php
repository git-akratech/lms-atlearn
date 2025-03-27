<?php
require('../../config.php');


$PAGE->set_url(new moodle_url('/auth/customsignup/signup.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Select Your Role');
$PAGE->set_heading('Signup as Teacher or Student');

echo $OUTPUT->header();
echo '<div style="text-align: center;padding:30px;">';
echo '<h2>Sign Up By Role</h2>';
echo '<a href="teacher_signup.php" class="signup-button teacher">Sign up as Teacher</a>';
echo '<br><a href="student_signup.php" class="signup-button student">Sign up as Student</a>';
echo '</div>';
echo $OUTPUT->footer();
?>

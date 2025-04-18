<?php
require('../../config.php');


$PAGE->set_url(new moodle_url('/login/signup.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Select Your Role');
$PAGE->set_heading('Signup as Teacher or Student');

echo $OUTPUT->header();
echo '<div style="text-align: center;padding:30px;">';
echo '<h2 class="mb-4">Sign Up By Role</h2>';
echo '<div class="d-flex justify-content-center gap-1">';
echo '<a href="teacher_signup.php" class="signup-button teacher"><img class="img-fluid" src="' . $CFG->wwwroot . '/theme/alpha/doc/teacher.webp" alt="App Screeshot" title="herobanner icon" /> <span>Sign up as Teacher</span></a>';

echo '<a href="student_signup.php" class="signup-button student">
      <img class="img-fluid" src="' . $CFG->wwwroot . '/theme/alpha/doc/student.webp" alt="App Screeshot" title="herobanner icon" />    
<span>Sign up as Student</span></a>';
echo '</div>';
echo '</div>';
echo $OUTPUT->footer();
?>

<style>
    .signup-button {
        display: flex;
        flex-direction: column;
        gap: 10px;
        background-color: #E1f8dc;
        border-radius: 5px;
    }
    .signup-button span {
        background: #001b48;
        color: #fff;
        padding-top: 10px;
        padding-bottom: 10px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }
    .gap-1 { 
        gap: 10px;
    }
</style>
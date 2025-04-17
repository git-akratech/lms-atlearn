<?php
require('../../config.php');
require_once($CFG->dirroot.'/lib/formslib.php');
require_once($CFG->dirroot.'/lib/moodlelib.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once($CFG->libdir.'/phpmailer/moodle_phpmailer.php');


$role = optional_param('role', '', PARAM_ALPHA);
if (empty($role)) {
    $errors['role'] = 'Missing role parameter. Please go back and try again.';
}

$roleid = ($role === 'teacher') ? 4 : 5;

class manual_signup_form extends moodleform {
    function definition() {
        global $role, $CFG;

        $mform = $this->_form;

        // Google Signup Button
        $google_signup_url = new moodle_url('/auth/customsignup/google_signup.php', ['role' => $role]);
        $mform->addElement('html', '<div style="text-align: center; margin-bottom: 20px;">');
        $mform->addElement('html', '<a href="'.$google_signup_url.'" class="google-signup-button" style="display: flex; align-items: center; justify-content: center; background-color: #001a47ff; color: white; padding: 10px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                                        <img src="https://accounts.google.com/favicon.ico" alt="Google Logo" style="width: 20px; height: 20px; margin-right: 10px;">Sign up with Google
                                    </a>');
        $mform->addElement('html', '</div>');
        
        // Manual Signup Fields
        $mform->addElement('text', 'username', 'Username');
        $mform->setType('username', PARAM_RAW);
        $mform->addRule('username', 'Required', 'required');

        $mform->addElement('password', 'password', 'Password');
        $mform->setType('password', PARAM_RAW);
        $mform->addRule('password', 'Required', 'required');

        $mform->addElement('text', 'email', 'Email');
        $mform->setType('email', PARAM_EMAIL);
        $mform->addRule('email', 'Required', 'required');

        $mform->addElement('hidden', 'role', $role);
        $mform->setType('role', PARAM_ALPHA);

        $buttonarray = array();
        $buttonarray[] = $mform->createElement('submit', 'submitbutton', 'Sign Up');
        $buttonarray[] = $mform->createElement('cancel', 'cancelbutton', 'Cancel');
        $mform->addGroup($buttonarray, 'buttonar', '', ['&nbsp;&nbsp;&nbsp;&nbsp;'], false);

    }
    function validation($data, $files) {
        global $DB;
    
        $errors = [];
    
        if ($DB->record_exists('user', ['username' => $data['username']])) {
            $errors['username'] = 'This username is already taken.';
        }
    
        if ($DB->record_exists('user', ['email' => $data['email']])) {
            $errors['email'] = 'This email is already registered.';
        }
    
        // Check password policy (without throwing an error page)
        if ($errmsg = password_policy_check($data['password'], $data['username'])) {
            $errors['password'] = $errmsg;
        }
    
        return $errors;
    }

}

$mform = new manual_signup_form();

if ($mform->is_cancelled()) {
    redirect(new moodle_url('/index.php'));
} else if ($data = $mform->get_data()) {
    global $DB;
    $data = $mform->get_data();

    $user = new stdClass();
    $user->username = $data->username;
    $user->password = $data->password;
    $user->email = $data->email;
    $user->confirmed = 0;
    $user->mnethostid = $CFG->mnet_localhost_id;
    $user->auth = 'manual';
    $user->timecreated = time();

    try {
        $user->id = $DB->insert_record('user', $user);
    } catch (Exception $e) {
        echo $OUTPUT->header();
        echo '<div style="color:red;text-align:center;margin-top:20px;">Could not create user. Please try again later.</div>';
        $mform->set_data($data);
        $mform->display();
        echo $OUTPUT->footer();
        exit;
    }


    // Confirmation token (you can also use a custom table)
    $token = md5(uniqid(rand(), true));
    $record = new stdClass();
    $record->userid = $user->id;
    $record->token = $token;
    $record->timecreated = time();
    $DB->insert_record('user_email_verification', $record); // Ideally, use a custom table

  // Send confirmation email
  $confirmurl = new moodle_url('/auth/customsignup/confirm_signup.php', ['token' => $token]);
  $subject = "Verify your Moodle account";
  $messagehtml = "<p>Hello {$user->username},</p>
      <p>Please verify your email address by clicking the link below:</p>
      <p><a href='" . $confirmurl->out(false) . "'>Verify my email</a></p>
      <p>If you did not request this account, you can ignore this email.</p>
      <p>Thanks,<br/>Moodle Support</p>";

  $messagetext = "Hello {$user->username},\n\nPlease verify your email address by visiting this link:\n" .
                 $confirmurl->out(false) .
                 "\n\nThanks,\nMoodle Support";

  email_to_user($user, core_user::get_support_user(), $subject, $messagetext, $messagehtml);

  echo $OUTPUT->header();
  echo '<div style="text-align:center; margin-top:50px;">A confirmation email has been sent to your Gmail. Please check it to verify your account.</div>';
  echo $OUTPUT->footer();
  exit;

}

echo $OUTPUT->header();
echo '<div class="signup-card">';
echo '  <div class="card-form">';
echo '      <h2 style="text-align: center; margin-bottom: 10px;">Sign Up</h2>';
$mform->display();
echo '      <p style="text-align: center; margin-top: 15px;">';
echo '          Already have an account? <a href="' . $CFG->wwwroot . '/login/index.php" style="color: #0073ea; text-decoration: none; font-weight: bold;">Log in</a>';
echo '      </p>';
echo '  </div>';
if ($roleid === 4) {
echo ' <div class="card-image"><h2>Signup As Teacher</h2><img class="img-fluid" src="' . $CFG->wwwroot . '/theme/alpha/doc/teacher.webp" alt="App Screeshot" title="herobanner icon" /></div>';
} else {
  echo ' <div class="card-image"><h2>Signup As Student</h2><img class="img-fluid" src="' . $CFG->wwwroot . '/theme/alpha/doc/student.webp" alt="App Screeshot" title="herobanner icon" /></div>';
}
echo '</div>';
echo $OUTPUT->footer();
?>

<style>
  .signup-card {
    display: flex; 
    justify-content: center; 
    align-items: center; 
    margin-top: 20px;
    width: 800px;
    background: #E1f8dc;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
    margin: auto;
  }
  .signup-card .card-form { 
    width: 60%;
    padding: 20px;
    border-radius: 10px;
    background: #f9f9f9; 
      }
  .signup-card .card-image {
    width: 60%;
    text-align: center;
    /* background: #E1f8dc; */
  }

</style>




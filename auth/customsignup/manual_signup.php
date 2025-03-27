<?php
require('../../config.php');
require_once($CFG->dirroot.'/lib/formslib.php');
require_once($CFG->dirroot.'/lib/moodlelib.php');
require_once($CFG->dirroot.'/user/lib.php');


$role = optional_param('role', '', PARAM_ALPHA);
if (empty($role)) {
    throw new moodle_exception('Missing role parameter. Please go back and try again.');
}

$roleid = ($role === 'teacher') ? 3 : 5;

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

        $mform->addElement('submit', 'submitbutton', 'Sign Up');
        $mform->addElement('cancel', 'cancelbutton', 'Cancel');
    }
}

$mform = new manual_signup_form();

if ($mform->is_cancelled()) {
    redirect(new moodle_url('/index.php'));
} else if ($data = $mform->get_data()) {
    global $DB;
    
    $user = new stdClass();
    $user->username = $data->username;
    $user->password = $data->password;
    $user->email = $data->email;
    $user->confirmed = 1;
    $user->mnethostid = $CFG->mnet_localhost_id;
    $user->auth = 'manual';
  
    $user->id = user_create_user($user);
    role_assign($roleid, $user->id, context_system::instance());

    if (!$DB->record_exists('user', ['id' => $user->id])) {
        throw new moodle_exception('User creation failed. Please try again.');
    }

    redirect(new moodle_url('/login/index.php'), 'Signup successful, please log in.');
}

echo $OUTPUT->header();
echo '<div style="display: flex; justify-content: center; align-items: center; height: 79vh;margin-top: 20px;">';
echo '  <div style="width: 435px; padding: 20px; border-radius: 10px; background: #f9f9f9; box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);">';
echo '      <h2 style="text-align: center; margin-bottom: 10px;">Sign Up</h2>';
$mform->display();
echo '      <p style="text-align: center; margin-top: 15px;">';
echo '          Already have an account? <a href="' . $CFG->wwwroot . '/login/index.php" style="color: #0073ea; text-decoration: none; font-weight: bold;">Log in</a>';
echo '      </p>';
echo '  </div>';
echo '</div>';
echo $OUTPUT->footer();
?>

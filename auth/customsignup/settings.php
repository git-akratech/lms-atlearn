<?php
defined('MOODLE_INTERNAL') || die;

$settings->add(new admin_setting_configcheckbox(
    'auth_customsignup/enable',
    get_string('pluginname', 'auth_customsignup'),
    'Enable or disable custom teacher signup.',
    1
));
?>

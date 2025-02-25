<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_externalpage(
        'local_mygrades_settings',
        get_string('pluginname', 'local_mygrades'),
        new moodle_url('/local/mygrades/index.php')
    );
    $ADMIN->add('localplugins', $settings);
}

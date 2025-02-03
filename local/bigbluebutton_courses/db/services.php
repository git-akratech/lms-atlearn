<?php
defined('MOODLE_INTERNAL') || die();

$services = array(
    'get_courses_with_bigbluebutton' => array(
        'classname' => 'local_bigbluebutton_courses_external',
        'methodname' => 'get_courses_with_bigbluebutton',
        'description'  => 'Get Courses by bigbluebutton',
        'type'=> 'read',
        'ajax' => true,
        'enabled' => 1,
    ),
);

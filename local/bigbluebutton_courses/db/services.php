<?php
defined('MOODLE_INTERNAL') || die();

$services = array(
    'local_bigbluebutton_courses' => array(
        'classname' => 'local_bigbluebutton_courses\external',
        'methodname' => 'get_courses_with_bigbluebutton',
        'description'  => 'Get Courses by bigbluebutton',
        'capabilities' => 'moodle/course:view',
        'classpath' => 'local/bigbluebutton_courses/classes/bigbluebutton_courses.php',
        'type'=> 'read',
        'ajax' => true,
        'enabled' => 1,
    ),
);

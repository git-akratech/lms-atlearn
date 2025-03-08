<?php
defined('MOODLE_INTERNAL') || die();

$functions = [
    'local_courseapi_execute' => [
        'classname'   => 'local_courseapi_external',
        'methodname'  => 'execute',
        'classpath'   => 'local/courseapi/classes/external/get_courses.php',
        'description' => 'Returns course category, course details, and creator information.',
        'type'        => 'read',
       
    ],
];
$services = [
    'All Courses API' => [
        'functions' => ['local_courseapi_execute'],
        'requiredcapability' => '',
        'restrictedusers' => 0,
        'enabled' => 1,
    ],
];
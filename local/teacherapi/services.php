<?php
$functions = [
    'local_teacherapi_get_teachers' => [
        'classname'   => 'local_teacherapi_external',
        'methodname'  => 'get_teachers',
        'classpath'   => 'local/teacherapi/externallib.php',
        'description' => 'Retrieve all teacher users with profile image',
        'type'        => 'read',
        'capabilities'=> 'moodle/user:viewalldetails',
    ],
];

$services = [
    'Custom Teacher API' => [
        'functions' => ['local_teacherapi_get_teachers'],
        'restrictedusers' => 0,
        'enabled' => 1,
    ]
];

<?php
$functions = [
    'local_coursezoom_get_meetings' => [
        'classname'   => 'local_coursezoom_external',
        'methodname'  => 'get_meetings',
        'classpath'   => 'local/coursezoom/externallib.php',
        'description' => 'Retrieve Zoom meetings for a course',
        'type'        => 'read',
        'capabilities'=> 'moodle/course:view',
       
    ],
];

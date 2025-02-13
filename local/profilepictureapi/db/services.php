<?php

defined('MOODLE_INTERNAL') || die();

$functions = [
    'local_profilepictureapi_update_profile_picture' => [
        'classname'   => 'local_profilepictureapi_external',
        'methodname'  => 'update_profile_picture',
        'classpath'   => 'local/profilepictureapi/externallib.php',
        'description' => 'Update user profile picture',
        'type'        => 'write',
        'capabilities'=> 'moodle/user:update',
    ],
];

$services = [
    'Profile Picture API' => [
        'functions' => ['local_profilepictureapi_update_profile_picture'],
        'requiredcapability' => 'moodle/user:update',
        'restrictedusers' => 0,
        'enabled' => 1,
    ],
];

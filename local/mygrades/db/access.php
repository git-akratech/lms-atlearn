<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'local/mygrades:view' => [
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'student' => CAP_ALLOW,
        ],
    ],
];

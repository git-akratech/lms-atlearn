<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'local/teacherapi:view' => [
        'captype'   => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW,
        ],
    ],
];

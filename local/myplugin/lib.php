<?php
defined('MOODLE_INTERNAL') || die();

function local_myplugin_observer() {
    return [
        ['eventname' => '\core\event\user_created', 'callback' => 'local_myplugin_user_created'],
    ];
}

function local_myplugin_user_created($event) {
    $data = $event->get_data();
    call_fastapi('/user_created', ['userid' => $data['userid']]);
}

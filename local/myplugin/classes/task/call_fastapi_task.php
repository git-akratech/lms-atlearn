<?php
namespace local_myplugin\task;

defined('MOODLE_INTERNAL') || die();

class call_fastapi_task extends \core\task\scheduled_task {
    public function get_name() {
        return get_string('callfastapi', 'local_myplugin');
    }

    public function execute() {
        global $CFG;
        require_once($CFG->dirroot . '/local/myplugin/curl_client.php');
        // Execute FastAPI call
        call_fastapi('/sync_data', []);
    }
}

<?php
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/curl_client.php');

require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url('/local/myplugin/index.php');
$PAGE->set_title('My Plugin');
$PAGE->set_heading('FastAPI Integration');

echo $OUTPUT->header();

try {
    $result = call_fastapi_endpoint('/process_data', ['key' => 'value']);
    echo '<pre>' . print_r($result, true) . '</pre>';
} catch (Exception $e) {
    echo '<p>Error: ' . $e->getMessage() . '</p>';
}

echo $OUTPUT->footer();

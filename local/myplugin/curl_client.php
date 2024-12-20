<?php

defined('MOODLE_INTERNAL') || die();

function call_fastapi_endpoint($endpoint, $data) {
    $url = 'https://apps.akratech.in:8871/' . $endpoint;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
        throw new Exception('cURL error: ' . curl_error($ch));
    }

    curl_close($ch);

    return json_decode($response, true);
}


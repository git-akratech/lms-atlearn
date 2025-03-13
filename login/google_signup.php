<?php

require('../config.php');
require_once($CFG->libdir . '/authlib.php');

// Load Google API Client Library
require_once __DIR__ . '/path/to/vendor/autoload.php'; // Adjust the path as necessary

$client = new Google_Client();
$client->setClientId('YOUR_GOOGLE_CLIENT_ID'); // Replace with your Client ID
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET'); // Replace with your Client Secret
$client->setRedirectUri($CFG->wwwroot . '/login/google_signup.php');
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    // Exchange authorization code for an access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user info
    $google_service = new Google_Service_Oauth2($client);
    $google_user_info = $google_service->userinfo->get();

    // Process user signup
    $user = new stdClass();
    $user->username = $google_user_info->email; // Use email as username
    $user->email = $google_user_info->email;
    $user->firstname = $google_user_info->givenName;
    $user->lastname = $google_user_info->familyName;
    $user->auth = 'google'; // Set authentication method

    // Here you would typically call a function to create the user in Moodle
    // For example: create_user($user);

    // Redirect to the login page or dashboard
    redirect(new moodle_url('/'));
} else {
    // Generate Google login URL
    $auth_url = $client->createAuthUrl();
    redirect($auth_url);
}

?>
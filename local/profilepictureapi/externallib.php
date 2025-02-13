<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');

class local_profilepictureapi_external extends external_api {

    public static function update_profile_picture_parameters() {
        return new external_function_parameters(
            [
                'userid' => new external_value(PARAM_INT, 'User ID'),
                'file' => new external_value(PARAM_FILE, 'Base64 encoded image file'),
                'filename' => new external_value(PARAM_TEXT, 'Filename of the image'),
            ]
        );
    }

    public static function update_profile_picture($userid, $file, $filename) {
        global $USER, $DB;
        
        // Validate user
        $user = $DB->get_record('user', ['id' => $userid], '*', MUST_EXIST);
        
        // Check if the user has permission to update the profile picture
        if ($USER->id !== $userid && !has_capability('moodle/user:update', context_system::instance())) {
            throw new moodle_exception('nopermission', 'local_profilepictureapi');
        }

        // Decode the base64 file
        $filedata = base64_decode($file);
        if ($filedata === false) {
            throw new moodle_exception('invalidfile', 'local_profilepictureapi');
        }

        // Save the file
        $fs = get_file_storage();
        $context = context_user::instance($userid);
        $fileinfo = [
            'contextid' => $context->id,
            'component' => 'user',
            'filearea' => 'icon',
            'itemid' => $userid,
            'filepath' => '/',
            'filename' => $filename,
        ];

        // Delete existing profile picture
        $fs->delete_area_files($context->id, 'user', 'icon', $userid);

        // Create the new file
        $fs->create_file_from_string($fileinfo, $filedata);

        // Update the user's profile picture
        $user->picture = 1; // Set to 1 to indicate a custom picture
        $DB->update_record('user', $user);

        return 'Profile picture updated successfully.';
    }

    public static function update_profile_picture_returns() {
        return new external_value(PARAM_TEXT, 'Status message');
    }
}
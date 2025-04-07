<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');
require_once($CFG->dirroot . '/user/lib.php');


class local_profilepictureapi_external extends external_api {

    public static function update_profile_picture_parameters() {
        return new external_function_parameters(
            [
                'userid' => new external_value(PARAM_INT, 'User ID'),
                'file' => new external_value(PARAM_TEXT, 'Base64 encoded image file'),
                'filename' => new external_value(PARAM_TEXT, 'Filename of the image'),
            ]
        );
    }

    public static function update_profile_picture($userid, $file, $filename) {
        global $USER, $DB;
        
        // Validate user
        $user = $DB->get_record('user', ['id' => $userid], '*', MUST_EXIST);
        $context = context_user::instance($userid);
        
       // Validate permission: allow if it's the current user or user has update capability
       if ($USER->id != $userid && !has_capability('moodle/user:update', $context)) {
        throw new moodle_exception('nopermission', 'error', '', null, 'You do not have permission to update this profile.');
    }

        // Decode the base64 file
        $filedata = base64_decode($file);
        if ($filedata === false) {
            throw new moodle_exception('invalidfile', 'error');
        }
          // Delete old image
          $fs = get_file_storage();
          $fs->delete_area_files($context->id, 'user', 'icon', 0 );

       
        $fileinfo = [
            'contextid' => $context->id,
            'component' => 'user',
            'filearea' => 'icon',
            'itemid' => 0,
            'filepath' => '/',
            'filename' => $filename,
        ];

        // Create the new file
        $fs->create_file_from_string($fileinfo, $filedata);

        // Update the user's picture field
            $user->picture = 1;
            $user->timemodified = time();
            $DB->update_record('user', $user);
             
          

        return 'Profile picture updated successfully.';
    }

    public static function update_profile_picture_returns() {
        return new external_value(PARAM_TEXT, 'Status message');
    }
}
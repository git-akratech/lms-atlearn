<?php
defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");

class local_teacherapi_external extends external_api {

    public static function get_teachers() {
        global $DB;
    
        // Define the SQL query
        $sql = "
        SELECT 
            u.id AS userid,
            u.firstname,
            u.lastname,
            u.email,
            u.username,
            u.description,
            u.department,
            u.phone1,
            u.address,
            u.city,
            c.id AS courseid,
            c.fullname AS coursename,
            r.name AS rolename,
            u.picture AS profile_picture
        FROM 
            {user} u
        JOIN 
            {role_assignments} ra ON u.id = ra.userid
        JOIN 
            {context} ctx ON ra.contextid = ctx.id
        JOIN 
            {course} c ON ctx.instanceid = c.id
        JOIN 
            {role} r ON ra.roleid = r.id
        WHERE 
            ctx.contextlevel = 50 -- Course-level context
            AND r.id = 3 -- Teacher role (or 'teacher' for non-editing teacher)
            AND u.deleted = 0; -- Exclude deleted users";
    
        // Execute the query
        $teachers = $DB->get_records_sql($sql);
    
        // Moodle default profile image URL
        $default_profile_image = new moodle_url('/pix/u/f1.png');
    
        // Process results
        $users = [];
        foreach ($teachers as $teacher) {
            // Get the user context for profile image
            $user_context = context_user::instance($teacher->userid);
    
            // Construct the profile image URL dynamically
            if ($teacher->profile_picture > 0) {
                $profileimgurl = moodle_url::make_pluginfile_url(
                    $user_context->id, 'user', 'icon', 'alpha', '/', 'f20'
                )->out(false) . '?rev=' . $teacher->profile_picture;
            } else {
                $profileimgurl = $default_profile_image->out(false);
            }
    
            $users[] = [
                'id' => $teacher->userid,
                'firstname' => $teacher->firstname,
                'lastname' => $teacher->lastname,
                'email' => $teacher->email,
                'username' => $teacher->username,
                'description' => $teacher->description,
                'department' => $teacher->department,
                'phone1' => $teacher->phone1,
                'address' => $teacher->address,
                'city' => $teacher->city,
                'profile_image' => $profileimgurl,
            ];
        }
    
        return $users;
    }
    
    
    
    public static function get_teachers_parameters() {
        return new external_function_parameters([]);
    }

    public static function get_teachers_returns() {
        return new external_multiple_structure(
            new external_single_structure([
                'id' => new external_value(PARAM_INT, 'User ID'),
                'firstname' => new external_value(PARAM_TEXT, 'First name'),
                'lastname' => new external_value(PARAM_TEXT, 'Last name'),
                'email' => new external_value(PARAM_EMAIL, 'Email'),
                'username' => new external_value(PARAM_RAW, 'Username'),
                'description' => new external_value(PARAM_RAW, 'Description'),
                'department' => new external_value(PARAM_RAW, 'Department'),
                'phone1' => new external_value(PARAM_RAW, 'Phone'),
                'address' => new external_value(PARAM_RAW, 'Address'),
                'city' => new external_value(PARAM_RAW, 'City'),
                'profile_image' => new external_value(PARAM_URL, 'Profile Image URL'),
            ])
        );
    }
}

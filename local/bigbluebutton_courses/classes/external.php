<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');

class local_bigbluebutton_courses_external extends external_api {

    /**
     * Get all BigBlueButton activities and meeting URLs across all courses.
     *
     * @return array List of BigBlueButton activities with meeting URLs.
     * @throws \dml_exception
     */
    public static function get_courses_with_bigbluebutton($useremail) {
        global $DB;
         // Validate parameters
         $params = self::validate_parameters(self::get_courses_with_bigbluebutton_parameters(), [
            'useremail' => $useremail
        ]);
        // Base URL for BigBlueButton meeting join
        $baseMeetingUrl = 'https://lms.atlearn.in/mod/bigbluebuttonbn/bbb_view.php?action=join';
         // Base URL for BigBlueButton settings page
         $baseSettingsUrl = 'http://localhost/lms.atlearn.in/course/modedit.php?update=';
        
        // SQL query to get all BigBlueButton activities across all courses
        $sql = "SELECT 
                b.id AS bigbluebuttonid, 
                b.name AS onlineclassname, 
                cm.id AS cmid, 
                c.id AS courseid, 
                c.fullname AS coursename, 
                u.id AS userid, 
                u.email AS useremail, 
                ue.id AS userenrollid
            FROM {course} c
            JOIN {bigbluebuttonbn} b ON b.course = c.id
            JOIN {enrol} e ON e.courseid = c.id
            JOIN {user_enrolments} ue ON ue.enrolid = e.id
            JOIN {user} u ON u.id = ue.userid
            JOIN {course_modules} cm ON cm.instance = b.id 
            JOIN {modules} m ON cm.module = m.id AND m.name = 'bigbluebuttonbn'
            WHERE b.id IS NOT NULL AND u.email = ?;";
        
        // Execute the query and fetch results
      
        $results = $DB->get_records_sql($sql, [$useremail]);
        
        // Prepare the response structure
        $activities = [];
        foreach ($results as $result) {
            $meetingurl = $baseMeetingUrl . '&id=' . $result->cmid . '&bn=' . $result->bigbluebuttonid;
            $settingsUrl = $baseSettingsUrl . $result->cmid . '&return=1';

            $activities[] = [
                'courseid' => $result->courseid,
                'coursename' => $result->coursename,               
                'bigbluebuttonid' => $result->bigbluebuttonid,
                'onlineclassname' => $result->onlineclassname,
                'meetingurl' => $meetingurl,
                'settingsurl' => $settingsUrl, // Use the constructed settings URL
               
            ];
        }
        
        // Return the results as an array
        return $activities;
    }

    /**
     * Define the parameters for the get_all_courses_with_bigbluebutton function.
     *
     * @return \external_function_parameters
     */
    public static function get_courses_with_bigbluebutton_parameters() {
        return new \external_function_parameters([
            'useremail' => new \external_value(PARAM_EMAIL, 'User Email')
        ]);
    }

    /**
     * Define the return type for the get_all_courses_with_bigbluebutton function.
     *
     * @return \external_multiple_structure
     */
    public static function get_courses_with_bigbluebutton_returns() {
        return new \external_multiple_structure(
            new \external_single_structure([
                'courseid' => new \external_value(PARAM_INT, 'Course ID'),
                'coursename' => new \external_value(PARAM_TEXT, 'Course Name'),
                'bigbluebuttonid' => new \external_value(PARAM_INT, 'BigBlueButton Activity ID'),
                'onlineclassname' => new \external_value(PARAM_TEXT, 'BigBlueButton Activity Name'),
                'meetingurl' => new \external_value(PARAM_URL, 'BigBlueButton Meeting Join URL'),
                'settingsurl' => new \external_value(PARAM_URL, 'BigBlueButton Settings URL'),
            ])
        );
    }

    public static function get_courses_with_filter_bigbluebutton($courseid) {
        global $DB;
        
        // Validate parameters
        $params = self::validate_parameters(self::get_courses_with_filter_bigbluebutton_parameters(), ['courseid' => $courseid]);

        // Base URL for BigBlueButton meeting join
        $baseMeetingUrl = 'https://lms.atlearn.in/mod/bigbluebuttonbn/bbb_view.php?action=join';
          // Base URL for BigBlueButton settings page
          $baseSettingsUrl = 'http://localhost/lms.atlearn.in/course/modedit.php?update=';
        
        // SQL query to get all BigBlueButton activities for a specific course
        $sql = "SELECT b.id AS bigbluebuttonid, b.name AS onlineclassname, cm.id AS cmid
                FROM {bigbluebuttonbn} b
                JOIN {course_modules} cm ON cm.instance = b.id 
                JOIN {modules} m ON cm.module = m.id 
                WHERE m.name = 'bigbluebuttonbn' AND b.course = ?";
        
        // Execute the query and fetch results
        $results = $DB->get_records_sql($sql, [$courseid]);
        
        // Prepare the response structure
        $activities = [];
        foreach ($results as $result) {
            $meetingurl = $baseMeetingUrl . '&id=' . $result->cmid . '&bn=' . $result->bigbluebuttonid;
            $settingsUrl = $baseSettingsUrl . $result->cmid . '&return=1';

            $activities[] = [
                'bigbluebuttonid' => $result->bigbluebuttonid,
                'onlineclassname' => $result->onlineclassname,
                'meetingurl' => $meetingurl, // Constructed meeting URL
                'settingsurl' => $settingsUrl, // Use the constructed settings URL
            ];
        }
        
        // Return the results as an array
        return $activities;
    }

    /**
     * Define the parameters for the get_courses_with_filter_bigbluebutton function.
     *
     * @return \external_function_parameters
     */
    public static function get_courses_with_filter_bigbluebutton_parameters() {
        return new \external_function_parameters([
            'courseid' => new \external_value(PARAM_INT, 'Course ID')
        ]);
    }

    /**
     * Define the return type for the get_bigbluebutton_activities function.
     *
     * @return \external_multiple_structure
     */
    public static function get_courses_with_filter_bigbluebutton_returns() {
        return new \external_multiple_structure(
            new \external_single_structure([
                'bigbluebuttonid' => new \external_value(PARAM_INT, 'BigBlueButton Activity ID'),
                'onlineclassname' => new \external_value(PARAM_TEXT, 'BigBlueButton Activity Name'),
                'meetingurl' => new \external_value(PARAM_URL, 'BigBlueButton Meeting Join URL'),
                'settingsurl' => new \external_value(PARAM_URL, 'BigBlueButton Settings URL'),
            ])
        );
    }
}

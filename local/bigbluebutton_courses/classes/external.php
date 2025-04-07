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
         $baseSettingsUrl = 'https://lms.atlearn.in/course/modedit.php?update=';
           // Get current time
         $current_time = time();
        
        // SQL query to get all BigBlueButton activities across all courses
        $sql_bbb  = "SELECT 
                b.id AS bigbluebuttonid, 
                b.openingtime,
                b.closingtime,
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
      
        $bbb_results  = $DB->get_records_sql($sql_bbb , [$useremail]);
         // Get current timestamp
         $current_time = time();
        
        // Prepare the response structure
        $activities = [];
        foreach ($bbb_results  as $result) {
            $meetingurl = null;
            if ($current_time >= $result->meetingopeningtime && $current_time <= $result->meetingclosingtime) {
                $meetingurl = $baseMeetingUrl . '&id=' . $result->cmid . '&bn=' . $result->bigbluebuttonid;
            }
            $settingsUrl = $baseSettingsUrl . $result->cmid . '&return=1';

            $activities[] = [
                'type' => 'bigbluebutton',
                'courseid' => $result->courseid,
                'coursename' => $result->coursename,
                'id' => $result->bigbluebuttonid,
                'name' => $result->onlineclassname,
                'meetingurl' => $meetingurl,
                'settingsurl' => $settingsurl,
                'start_time' => date('Y-m-d H:i:s', $result->openingtime),
                'end_time' => date('Y-m-d H:i:s', $result->closingtime),
                'duration' => null,
                'meeting_id' => null,
                'join_url' => $meetingurl,
               
            ];
        }
         // --- Fetch Zoom meetings ---
                $sql_zoom = "SELECT 
                            z.id,
                            z.meeting_id,
                            z.name,
                            z.start_time,
                            z.duration,
                            z.join_url,
                            c.id AS courseid,
                            c.fullname AS coursename
                    FROM {zoom} z
                    JOIN {course} c ON z.course = c.id
                    JOIN {enrol} e ON e.courseid = c.id
                    JOIN {user_enrolments} ue ON ue.enrolid = e.id
                    JOIN {user} u ON u.id = ue.userid
                    WHERE u.email = ?";

            $zoom_results = $DB->get_records_sql($sql_zoom, [$useremail]);

            foreach ($zoom_results as $zoom) {
            $activities[] = [
                'type' => 'zoom',
                'courseid' => $zoom->courseid,
                'coursename' => $zoom->coursename,
                'id' => $zoom->id,
                'name' => $zoom->name,
                'meetingurl' => $zoom->join_url,
                'settingsurl' => null,
                'start_time' => date('Y-m-d H:i:s', $zoom->start_time),
                'end_time' => null,
                'duration' => $zoom->duration,
                'meeting_id' => $zoom->meeting_id,
                'join_url' => $zoom->join_url,
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
            'type' => new external_value(PARAM_TEXT, 'Meeting type: bigbluebutton or zoom'),
            'courseid' => new external_value(PARAM_INT, 'Course ID'),
            'coursename' => new external_value(PARAM_TEXT, 'Course Name'),
            'id' => new external_value(PARAM_INT, 'Meeting internal ID'),
            'name' => new external_value(PARAM_TEXT, 'Meeting Name'),
            'meetingurl' => new external_value(PARAM_URL, 'Meeting Join URL', VALUE_OPTIONAL),
            'settingsurl' => new external_value(PARAM_URL, 'Settings URL (only for BBB)', VALUE_OPTIONAL),
            'start_time' => new external_value(PARAM_TEXT, 'Start Time'),
            'end_time' => new external_value(PARAM_TEXT, 'End Time', VALUE_OPTIONAL),
            'duration' => new external_value(PARAM_INT, 'Duration in minutes', VALUE_OPTIONAL),
            'meeting_id' => new external_value(PARAM_TEXT, 'Zoom Meeting ID (only for Zoom)', VALUE_OPTIONAL),
            'join_url' => new external_value(PARAM_URL, 'Zoom Join URL (only for Zoom)', VALUE_OPTIONAL),
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
          $baseSettingsUrl = 'https://lms.atlearn.in/course/modedit.php?update=';
        
        // SQL query to get all BigBlueButton activities for a specific course
        $sql_bbb  = "SELECT b.id AS bigbluebuttonid, b.openingtime AS meetingopeningtime,
                b.closingtime AS meetingclosingtime, b.name AS onlineclassname, cm.id AS cmid
                FROM {bigbluebuttonbn} b
                JOIN {course_modules} cm ON cm.instance = b.id 
                JOIN {modules} m ON cm.module = m.id 
                WHERE m.name = 'bigbluebuttonbn' AND b.course = ?";
        
        // Execute the query and fetch results
        $results_bbb  = $DB->get_records_sql($sql_bbb , [$courseid]);
          // Get current timestamp
          $current_time = time();
        
        // Prepare the response structure
        $activities = [];
        foreach ($results_bbb  as $result) {
            $meetingurl = null;
            if ($current_time >= $result->meetingopeningtime && $current_time <= $result->meetingclosingtime) {
                $meetingurl = $baseMeetingUrl . '&id=' . $result->cmid . '&bn=' . $result->bigbluebuttonid;
            }
            $settingsUrl = $baseSettingsUrl . $result->cmid . '&return=1';

            $activities[] = [
                'type' => 'bigbluebutton',
                'meetingid' => $result->bigbluebuttonid,
                'meetingname' => $result->onlineclassname,
                'meetingurl' => $meetingurl,
                'settingsurl' => $settingsUrl,
                'starttime' => date('Y-m-d H:i:s', $result->meetingopeningtime),
                'endtime' => date('Y-m-d H:i:s', $result->meetingclosingtime),
            ];
        }
         // ✅ Get Zoom meetings
            $sql_zoom = "SELECT id, name, start_time, duration, join_url 
            FROM {zoom} 
            WHERE course = ?";

        $results_zoom = $DB->get_records_sql($sql_zoom, [$courseid]);

        foreach ($results_zoom as $zoom) {
        $starttime = $zoom->start_time;
        $endtime = $starttime + ($zoom->duration * 60); // duration is in minutes
        $meetingurl = ($current_time >= $starttime && $current_time <= $endtime) ? $zoom->join_url : null;

            $activities[] = [
                'type' => 'zoom',
                'meetingid' => $zoom->id,
                'meetingname' => $zoom->name,
                'meetingurl' => $meetingurl,
                'settingsurl' => null,
                'starttime' => date('Y-m-d H:i:s', $starttime),
                'endtime' => date('Y-m-d H:i:s', $endtime),
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
                'type' => new \external_value(PARAM_TEXT, 'Meeting type: bigbluebutton or zoom'),
                'meetingid' => new \external_value(PARAM_INT, 'Meeting ID'),
                'meetingname' => new \external_value(PARAM_TEXT, 'Meeting Name'),
                'meetingurl' => new \external_value(PARAM_URL, 'Meeting Join URL', VALUE_OPTIONAL),
                'settingsurl' => new \external_value(PARAM_URL, 'Settings URL (for BBT only)', VALUE_OPTIONAL),
                'starttime' => new \external_value(PARAM_TEXT, 'Meeting Start Time'),
                'endtime' => new \external_value(PARAM_TEXT, 'Meeting End Time'),
            ])
        );
    }
}

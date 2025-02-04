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
    public static function get_courses_with_bigbluebutton() {
        global $DB;
        
        // Base URL for BigBlueButton meeting join
        $baseMeetingUrl = 'https://lms.atlearn.in/mod/bigbluebuttonbn/bbb_view.php?action=join';
        
        // SQL query to get all BigBlueButton activities across all courses
        $sql = "SELECT b.id AS bigbluebuttonid, b.name AS onlineclassname, cm.id AS cmid, c.id AS courseid, c.fullname AS coursename
                FROM {bigbluebuttonbn} b
                JOIN {course_modules} cm ON cm.instance = b.id 
                JOIN {modules} m ON cm.module = m.id 
                JOIN {course} c ON c.id = b.course
                WHERE m.name = 'bigbluebuttonbn'";
        
        // Execute the query and fetch results
        $results = $DB->get_records_sql($sql);
        
        // Prepare the response structure
        $activities = [];
        foreach ($results as $result) {
            $meetingurl = $baseMeetingUrl . '&id=' . $result->cmid . '&bn=' . $result->bigbluebuttonid;

            $activities[] = [
                'courseid' => $result->courseid,
                'coursename' => $result->coursename,
                'bigbluebuttonid' => $result->bigbluebuttonid,
                'onlineclassname' => $result->onlineclassname,
                'meetingurl' => $meetingurl,
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
        return new \external_function_parameters([]);
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
            ])
        );
    }

    public static function get_courses_with_filter_bigbluebutton($courseid) {
        global $DB;
        
        // Validate parameters
        $params = self::validate_parameters(self::get_courses_with_filter_bigbluebutton_parameters(), ['courseid' => $courseid]);

        // Base URL for BigBlueButton meeting join
        $baseMeetingUrl = 'https://lms.atlearn.in/mod/bigbluebuttonbn/bbb_view.php?action=join';
        
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

            $activities[] = [
                'bigbluebuttonid' => $result->bigbluebuttonid,
                'onlineclassname' => $result->onlineclassname,
                'meetingurl' => $meetingurl, // Constructed meeting URL
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
            ])
        );
    }
}

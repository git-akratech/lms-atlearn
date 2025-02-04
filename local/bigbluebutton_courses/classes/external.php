<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');

class local_bigbluebutton_courses_external extends external_api {

    /**
     * Get courses with BigBlueButton activities and enrolled users.
     *
     * @return array List of courses with BigBlueButton activities and enrolled users.
     * @throws \dml_exception
     */
    
    public static function get_courses_with_bigbluebutton() {
        global $DB;
        // Base URL for BigBlueButton meeting join
        $baseMeetingUrl = 'http://localhost/lms.atlearn.in/mod/bigbluebuttonbn/bbb_view.php?action=join';
        // SQL query to get all courses with BigBlueButton activities and enrolled users
        $sql = "SELECT c.id AS courseid, c.fullname AS coursename, 
                        b.id AS bigbluebuttonid, cm.id AS cmid
                FROM {course} c
                JOIN {bigbluebuttonbn} b ON b.course = c.id
                JOIN {enrol} e ON e.courseid = c.id
                 JOIN {course_modules} cm ON cm.instance = b.id AND cm.module = (SELECT id FROM {modules} WHERE name = 'bigbluebuttonbn')
                WHERE b.id IS NOT NULL";

        // Execute the query and fetch results
        $results = $DB->get_records_sql($sql);
        
        // Prepare the response structure
        $courses = [];
        foreach ($results as $result) {
            $meetingurl = $baseMeetingUrl . '&id=' . $result->cmid . '&bn=' . $result->bigbluebuttonid;

            $courses[] = [
                'courseid' => $result->courseid,
                'coursename' => $result->coursename,
                'meetingurl' => $meetingurl, // Use the constructed meeting URL             
            ];
        }

        // Return the results as an array of values
        return $courses;
    }

    /**
     * Define the parameters for the get_courses_with_bigbluebutton function.
     *
     * @return \external_function_parameters
     */
    public static function get_courses_with_bigbluebutton_parameters() {
        return new \external_function_parameters(
            []
        );
    }

    /**
     * Define the return type for the get_courses_with_bigbluebutton function.
     *
     * @return \external_multiple_structure
     */
    public static function get_courses_with_bigbluebutton_returns() {
        return new \external_multiple_structure(
            new \external_single_structure(
                [
                    'courseid' => new \external_value(PARAM_INT, 'Course ID'),
                    'coursename' => new \external_value(PARAM_TEXT, 'Course Full Name'),
                    'meetingurl' => new \external_value(PARAM_URL, 'BigBlueButton Meeting Join URL'),
                   
                ]
            )
        );
    }
}

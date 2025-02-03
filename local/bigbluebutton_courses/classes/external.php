<?php

defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/externallib.php');

class local_bigbluebutton_courses_external extends external_api{
    
    public static function get_courses_with_bigbluebutton() {
        global $DB;

        // Get all courses with BigBlueButton activities
        $sql = "SELECT c.id, c.fullname
                FROM {course} c
                JOIN {bigbluebuttonbn} b ON b.course = c.id
                WHERE b.id IS NOT NULL";

        $courses = $DB->get_records_sql($sql);
        
        return array_values($courses);
    }
    public static function get_courses_with_bigbluebutton_parameters() {
        return new \external_function_parameters(
            []
        );
    }
    public static function get_courses_with_bigbluebutton_returns() {
    return new \external_multiple_structure(
        new \external_single_structure(
            [
                'id' => new \external_value(PARAM_INT, 'Course ID'),
                'fullname' => new \external_value(PARAM_TEXT, 'Course Full Name'),
            ]
        )
    );
}
}

<?php
defined('MOODLE_INTERNAL') || die();
require_once("$CFG->libdir/externallib.php");

class local_coursezoom_external extends external_api {

    public static function get_meetings_parameters() {
        return new external_function_parameters([
            'courseid' => new external_value(PARAM_INT, 'Course ID', VALUE_REQUIRED)
        ]);
    }

    public static function get_meetings($courseid) {
        global $DB, $USER;

        // Validate parameters.
        $params = self::validate_parameters(self::get_meetings_parameters(), ['courseid' => $courseid]);

        // Check if user is enrolled.
        if (!is_enrolled(context_course::instance($params['courseid']), $USER->id)) {
            throw new moodle_exception('usernotenrolled', 'local_coursezoom');
        }

        // Check if the 'zoom' table exists.
        $tableExists = $DB->get_manager()->table_exists('zoom');
        if (!$tableExists) {
            throw new moodle_exception('Table "zoom" does not exist. Ensure that the Zoom plugin is installed and configured.');
        }

        // Retrieve Zoom meeting details from the database.
        $sql = "SELECT id, course, meeting_id, name, start_time, duration, join_url
                FROM {zoom}
                WHERE course = :courseid";

        try {
            $meetings = $DB->get_records_sql($sql, ['courseid' => $params['courseid']]);
        } catch (Exception $e) {
            throw new moodle_exception('databaseerror', 'local_coursezoom', '', null, 'Database error: ' . $e->getMessage());
        }

        if (!$meetings) {
            return [];
        }

        // Format response.
        $results = [];
        foreach ($meetings as $meeting) {
            $results[] = [
                'id'         => (int) $meeting->id,
                'meeting_id' => (int) $meeting->meeting_id,
                'name'      => $meeting->name,
                'start_time' => date('Y-m-d H:i:s', strtotime($meeting->start_time)), // Ensure timestamp format
                'duration'   => (int) $meeting->duration,
                'join_url'   => $meeting->join_url,
            ];
        }

        return $results;
    }

    public static function get_meetings_returns() {
        return new external_multiple_structure(
            new external_single_structure([
                'id'         => new external_value(PARAM_INT, 'Meeting ID in Moodle'),
                'meeting_id' => new external_value(PARAM_INT, 'Zoom Meeting ID'),
                'name'      => new external_value(PARAM_TEXT, 'Meeting name'),
                'start_time' => new external_value(PARAM_TEXT, 'Meeting start time (formatted)'),
                'duration'   => new external_value(PARAM_INT, 'Meeting duration in minutes'),
                'join_url'   => new external_value(PARAM_URL, 'Join URL'),
            ])
        );
    }
}

<?php
namespace theme_alpha\controllers;

defined('MOODLE_INTERNAL') || die();

class reports_controller {
    public static function get_course_completion_report($search = '', $page = 0, $perpage = 10) {
        global $DB, $USER;

        try {
            $params = array();
            $where = "WHERE c.visible = 1";
            
            if (!empty($search)) {
                $where .= " AND " . $DB->sql_like('c.fullname', ':search', false);
                $params['search'] = '%' . $DB->sql_like_escape($search) . '%';
            }

            $sql = "SELECT c.id, c.fullname, c.shortname, 
                    COUNT(DISTINCT cc.id) as total_completions,
                    COUNT(DISTINCT e.userid) as total_enrolled
                   FROM {course} c
                   LEFT JOIN {course_completions} cc ON c.id = cc.course
                   LEFT JOIN {enrol} e ON c.id = e.courseid
                   LEFT JOIN {user_enrolments} ue ON e.id = ue.enrolid
                   $where
                   GROUP BY c.id, c.fullname, c.shortname
                   ORDER BY c.fullname ASC";

            $total = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);
            $records = $DB->get_records_sql($sql, $params, $page * $perpage, $perpage);

            $results = array();
            foreach ($records as $record) {
                $completion_percentage = $record->total_enrolled > 0 
                    ? round(($record->total_completions / $record->total_enrolled) * 100, 2) 
                    : 0;

                $results[] = array(
                    'id' => $record->id,
                    'fullname' => $record->fullname,
                    'shortname' => $record->shortname,
                    'total_enrolled' => $record->total_enrolled,
                    'total_completions' => $record->total_completions,
                    'completion_percentage' => $completion_percentage
                );
            }

            return array(
                'status' => true,
                'data' => $results,
                'total' => $total
            );

        } catch (\Exception $e) {
            debugging('Error in course completion report: ' . $e->getMessage(), DEBUG_DEVELOPER);
            return array(
                'status' => false,
                'message' => get_string('errorgetreport', 'theme_alpha')
            );
        }
    }

    public static function get_user_activity_report($search = '', $page = 0, $perpage = 10) {
        global $DB, $USER;

        try {
            $params = array();
            $where = "WHERE u.deleted = 0 AND u.suspended = 0";
            
            if (!empty($search)) {
                $where .= " AND (" . $DB->sql_like('u.firstname', ':searchfirst', false) . 
                         " OR " . $DB->sql_like('u.lastname', ':searchlast', false) . 
                         " OR " . $DB->sql_like('u.email', ':searchemail', false) . ")";
                $params['searchfirst'] = '%' . $DB->sql_like_escape($search) . '%';
                $params['searchlast'] = '%' . $DB->sql_like_escape($search) . '%';
                $params['searchemail'] = '%' . $DB->sql_like_escape($search) . '%';
            }

            $sql = "SELECT u.id, u.firstname, u.lastname, u.email,
                    COUNT(DISTINCT l.id) as total_logins,
                    MAX(l.timecreated) as last_access
                   FROM {user} u
                   LEFT JOIN {logstore_standard_log} l ON u.id = l.userid
                   $where
                   GROUP BY u.id, u.firstname, u.lastname, u.email
                   ORDER BY last_access DESC";

            $total = $DB->count_records_sql("SELECT COUNT(*) FROM ({$sql}) temp", $params);
            $records = $DB->get_records_sql($sql, $params, $page * $perpage, $perpage);

            $results = array();
            foreach ($records as $record) {
                $results[] = array(
                    'id' => $record->id,
                    'fullname' => fullname($record),
                    'email' => $record->email,
                    'total_logins' => $record->total_logins,
                    'last_access' => $record->last_access ? userdate($record->last_access) : get_string('never')
                );
            }

            return array(
                'status' => true,
                'data' => $results,
                'total' => $total
            );

        } catch (\Exception $e) {
            debugging('Error in user activity report: ' . $e->getMessage(), DEBUG_DEVELOPER);
            return array(
                'status' => false,
                'message' => get_string('errorgetreport', 'theme_alpha')
            );
        }
    }

    // Add more report methods as needed...
}
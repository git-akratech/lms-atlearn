<?php
namespace theme_alpha\util;

class user_data {
    public static function get_students_list($page = 0, $perpage = 10, $search = '', $sort = 'id', $direction = 'ASC') {
        global $DB, $USER;

        try {
            // Check user capabilities
            $systemcontext = \context_system::instance();
            $isadmin = has_capability('moodle/site:config', $systemcontext);
            
            // Get all courses where the user is a teacher
            $teachercourses = array();
            if (!$isadmin) {
                $courses = enrol_get_users_courses($USER->id);
                foreach ($courses as $course) {
                    $coursecontext = \context_course::instance($course->id);
                    if (has_capability('moodle/course:viewhiddenactivities', $coursecontext)) {
                        $teachercourses[] = $course->id;
                    }
                }
                
                if (empty($teachercourses)) {
                    return array(
                        'users' => array(),
                        'total' => 0,
                        'error' => get_string('nopermissions', 'error')
                    );
                }
            }

            // Get student role ID
            $studentrole = $DB->get_record('role', array('shortname' => 'student'), '*', MUST_EXIST);

            // Build the base query
            $select = "SELECT DISTINCT u.id, u.firstname, u.lastname, u.username, u.email, u.phone1, u.city";
            $from = "FROM {user} u
                    JOIN {role_assignments} ra ON ra.userid = u.id
                    JOIN {context} ctx ON ra.contextid = ctx.id";
            $where = "WHERE u.deleted = 0 
                     AND u.suspended = 0 
                     AND ra.roleid = :studentroleid
                     AND ctx.contextlevel = :contextlevel";
            
            $params = array(
                'studentroleid' => $studentrole->id,
                'contextlevel' => CONTEXT_COURSE
            );

            // Add course restriction for teachers
            if (!$isadmin && !empty($teachercourses)) {
                $where .= " AND ctx.instanceid IN (" . implode(',', $teachercourses) . ")";
            }

            // Add search conditions if search term provided
            if (!empty($search)) {
                $searchlike = $DB->sql_like('CONCAT(u.firstname, \' \', u.lastname)', ':searchterm', false);
                $where .= " AND ($searchlike OR " . 
                         $DB->sql_like('u.email', ':searchemail', false) . " OR " .
                         $DB->sql_like('u.username', ':searchusername', false) . ")";
                $params['searchterm'] = '%' . $DB->sql_like_escape($search) . '%';
                $params['searchemail'] = '%' . $DB->sql_like_escape($search) . '%';
                $params['searchusername'] = '%' . $DB->sql_like_escape($search) . '%';
            }

            // Get total count
            $countsql = "SELECT COUNT(DISTINCT u.id) FROM {user} u $from $where";
            $total = $DB->count_records_sql($countsql, $params);

            // Add sorting
            $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';
            $allowedSortFields = ['id', 'firstname', 'lastname', 'username', 'email', 'city'];
            $sort = in_array($sort, $allowedSortFields) ? $sort : 'id';
            $orderby = " ORDER BY u.$sort $direction";

            // Add pagination
            $limitfrom = $page * $perpage;
            $limitnum = $perpage;

            // Final query
            $sql = "$select $from $where $orderby";
            $students = $DB->get_records_sql($sql, $params, $limitfrom, $limitnum);

            // Format results
            $result = array();
            foreach ($students as $student) {
                $result[] = array(
                    'id' => $student->id,
                    'fullname' => fullname($student),
                    'username' => $student->username,
                    'email' => $student->email,
                    'phone' => $student->phone1,
                    'city' => $student->city
                );
            }

            return array(
                'users' => $result,
                'total' => $total,
                'sort' => $sort,
                'direction' => $direction,
                'page' => $page,
                'perpage' => $perpage,
                'error' => null
            );

        } catch (\Exception $e) {
            debugging('Error in get_students_list: ' . $e->getMessage(), DEBUG_DEVELOPER);
            return array(
                'users' => array(),
                'total' => 0,
                'error' => get_string('databaseerror', 'error')
            );
        }
    }

    // Helper method to check if user is teacher in any course
    private static function is_teacher() {
        global $USER;
        
        $courses = enrol_get_users_courses($USER->id);
        foreach ($courses as $course) {
            $coursecontext = \context_course::instance($course->id);
            if (has_capability('moodle/course:viewhiddenactivities', $coursecontext)) {
                return true;
            }
        }
        return false;
    }
}

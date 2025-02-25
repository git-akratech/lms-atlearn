<?php
defined('MOODLE_INTERNAL') || die();

function local_mygrades_extend_navigation(global_navigation $nav) {
    global $USER, $DB;

    // Get user roles at the SYSTEM level
    $context = context_system::instance();
    $roles = get_user_roles($context, $USER->id);
    
    // Roles that should NOT see "My Grades"
    $restricted_roles = ['manager', 'teacher', 'editingteacher'];
    $hide_menu = false;

    foreach ($roles as $role) {
        $role_shortname = $DB->get_field('role', 'shortname', ['id' => $role->roleid]);
        if (in_array($role_shortname, $restricted_roles)) {
            $hide_menu = true;
            break;
        }
    }

    // If the user is in a restricted role, do not add the menu
    if ($hide_menu) {
        return;
    }

    // Now check if the user is actually enrolled as a Student
    $is_student = false;
    $enrolled_courses = enrol_get_users_courses($USER->id, true);

    foreach ($enrolled_courses as $course) {
        $course_context = context_course::instance($course->id);
        if (has_capability('moodle/course:view', $course_context, $USER->id) &&
            !has_capability('moodle/course:update', $course_context, $USER->id)) {
            $is_student = true;
            break;
        }
    }

    // Only add the menu if the user is a Student in at least one course
    if ($is_student) {
        $nav->add(
            get_string('mygrades', 'local_mygrades'),
            new moodle_url('/local/mygrades/index.php'),
            navigation_node::TYPE_CUSTOM,
            null,
            'mygrades',
            new pix_icon('i/grades', '')
        );
    }
}
    

function local_mygrades_get_user_grades($userid) {
    global $DB, $USER;

    if (!$userid) {
        $userid = $USER->id;
    }

    $sql = "SELECT q.name, g.grade, g.timemodified
            FROM {quiz} q
            JOIN {quiz_grades} g ON q.id = g.quiz
            JOIN {course} c ON q.course = c.id
            JOIN {user_enrolments} ue ON ue.userid = g.userid
            JOIN {enrol} e ON e.id = ue.enrolid AND e.courseid = c.id
            WHERE g.userid = :userid
            ORDER BY g.timemodified DESC";

    return $DB->get_records_sql($sql, ['userid' => $userid]);
}

<?php
require('../../config.php');
require_once($CFG->dirroot . '/local/mygrades/lib.php');

require_login();

// Check if the user is a student in any enrolled course.
$context = context_system::instance();
$is_student = false;

// Get all courses the user is enrolled in.
$enrolled_courses = enrol_get_users_courses($USER->id, true);
foreach ($enrolled_courses as $course) {
    $course_context = context_course::instance($course->id);
    if (has_capability('moodle/course:view', $course_context, $USER->id) &&
        !has_capability('moodle/course:update', $course_context, $USER->id)) {
        $is_student = true;
        break;
    }
}

// Restrict access if not a student.
if (!$is_student) {
    throw new moodle_exception('nopermissions', 'error', '', 'You do not have permission to view grades.');
}

$PAGE->set_url(new moodle_url('/local/mygrades/index.php'));
$PAGE->set_context($context);
$PAGE->set_title(get_string('mygrades', 'local_mygrades'));
$PAGE->set_heading(get_string('mygrades', 'local_mygrades'));

$grades = local_mygrades_get_user_grades($USER->id);

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('mygrades', 'local_mygrades'));

if (!empty($grades)) {
    echo '<table class="generaltable">';
    echo '<tr><th class="grade-table-bg">Quiz Name</th><th class="grade-table-bg">Grade</th><th class="grade-table-bg">Date</th></tr>';
    foreach ($grades as $grade) {
        echo '<tr>';
        echo '<td>' . format_string($grade->name) . '</td>';
        echo '<td>' . round($grade->grade, 2) . '</td>';
        echo '<td>' . userdate($grade->timemodified) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo get_string('nogrades', 'local_mygrades');
}

echo $OUTPUT->footer();

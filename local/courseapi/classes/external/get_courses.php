<?php

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->dirroot . '/user/lib.php');

use core_course\external\course_summary_exporter;
use external_api;
use external_function_parameters;
use external_single_structure;
use external_multiple_structure;
use external_value;
use external_format_value;

class get_courses_external extends external_api {

    public static function execute_parameters() {
        return new external_function_parameters([]);
    }

    public static function execute() {
        global $OUTPUT, $DB, $CFG;
    
        $sql = "SELECT c.id, c.fullname, c.shortname,c.summary, c.startdate, c.enddate, 
                   c.category, cc.name AS categoryname, c.timecreated,c.timemodified,
                   u.id AS creatorid, u.firstname AS creatorfirstname, 
                   u.lastname AS creatorlastname, u.picture, u.imagealt ,u.description AS creatordescription, u.phone1 AS creatorphone
            FROM {course} c
            JOIN {course_categories} cc ON cc.id = c.category
            JOIN {context} ctx ON ctx.instanceid = c.id AND ctx.contextlevel = 50
            JOIN {role_assignments} ra ON ra.contextid = ctx.id
            JOIN {role} r ON r.id = ra.roleid AND r.shortname = 'editingteacher'
            JOIN {user} u ON u.id = ra.userid
            WHERE c.visible = 1";
    
        $courses = $DB->get_records_sql($sql);
        $default_profile_image = new moodle_url('/pix/u/f1.png');
    
        $result = [];
        foreach ($courses as $course) {
            $context = \context_course::instance($course->id);
            $courseimage = \core_course\external\course_summary_exporter::get_course_image($course);
            if (!$courseimage) {
                $courseimage = $OUTPUT->get_generated_url_for_course($context);
            }

            // Construct the profile image URL dynamically
            $user_context = context_user::instance($course->creatorid);
            if ($course->picture > 0) {
                $profileimgurl = moodle_url::make_pluginfile_url(
                    $user_context->id, 'user', 'icon', 'alpha', '/', 'f20'
                )->out(false) . '?rev=' . $course->picture;
            } else {
                $profileimgurl = $default_profile_image->out(false);
            }
             // 🔍 Check for payment enrolment
            $enrols = $DB->get_records('enrol', ['courseid' => $course->id]);
            $paymentinfo = [
                'type' => 'none',
                'amount' => '0.00',
                'currency' => ''
            ];
            foreach ($enrols as $enrol) {
                if (in_array($enrol->enrol, ['fee', 'razorpay', 'stripe'])) {
                    $paymentinfo = [
                        'type' => $enrol->enrol,
                        'amount' => format_float($enrol->cost, 2),
                        'currency' => $enrol->currency
                    ];
                    break;
                }
            }
             // Check if course has at least one quiz
                $hasquiz = $DB->record_exists_sql("
                SELECT 1
                FROM {course_modules} cm
                JOIN {modules} m ON m.id = cm.module
                WHERE cm.course = ? AND m.name = 'quiz'
            ", [$course->id]) ? 'yes' : 'no';

            $result[] = [
                'id' => $course->id,
                'fullname' => $course->fullname,
                'shortname' => $course->shortname,
                'categoryname' => $course->categoryname,
                'creatorid' => $course->creatorid,
                'creatorname' => $course->creatorfirstname . ' ' . $course->creatorlastname,
                'creatorimage' => $profileimgurl,
                'creatorbio' => $course->creatordescription,
                'creatorphone' => $course->creatorphone,
                'courseimage' => $courseimage,
                'startdate' =>  $course->startdate,
                'enddate' =>  $course->enddate,
                'timemodified' => $course->timemodified,
                'summary' => $course->summary,
                'paymentinfo' => $paymentinfo,
                'hasquiz' => $hasquiz
            ];
        }
    
        return $result;
    }
    public static function execute_returns() {
        return new external_multiple_structure(
            new external_single_structure([
                'id' => new external_value(PARAM_INT, 'Course ID'),
                'fullname' => new external_value(PARAM_TEXT, 'Course Full Name'),
                'shortname' => new external_value(PARAM_TEXT, 'Course Short Name'),
                'categoryname' => new external_value(PARAM_TEXT, 'Category Name'),
                'creatorid' => new external_value(PARAM_INT, 'Creator ID'),
                'creatorname' => new external_value(PARAM_TEXT, 'Creator Name'),
                'creatorbio' => new external_value(PARAM_RAW, 'Creator Description'),
                'creatorphone' => new external_value(PARAM_TEXT, 'Creator Phone Number'),
                'creatorimage' => new external_value(PARAM_URL, 'Creator Image URL'),
                'courseimage' => new external_value(PARAM_URL, 'Course Image URL'),
                'startdate' => new external_value(PARAM_TEXT, 'Start Date'),
                'enddate' => new external_value(PARAM_TEXT, 'End Date'),
                'timemodified' => new external_value(PARAM_INT, 'Time Modified (timestamp)'),
                'summary' => new external_value(PARAM_RAW, 'Course Summary/Description'),
                'paymentinfo' => new external_single_structure([
                    'type' => new external_value(PARAM_TEXT, 'Payment type (razorpay/stripe/fee/none)'),
                    'amount' => new external_value(PARAM_TEXT, 'Payment amount'),
                    'currency' => new external_value(PARAM_TEXT, 'Payment currency'),
                ]),
                'hasquiz' => new external_value(PARAM_TEXT, 'Whether course contains quiz: yes/no'),
            ])
        );
    }
       
}

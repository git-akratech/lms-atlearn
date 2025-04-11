<?php
namespace theme_alpha\util;

class quiz_data {
    public static function get_quiz_list($page = 0, $perpage = 10, $search = '', $sort = 'id', $direction = 'ASC') {
        global $DB, $USER;

        $allowedSorts = ['id', 'name', 'course', 'timeopen', 'timeclose'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id';
        }

        $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';

       

        $params = ['userid' => $USER->id];
        $searchsql = '';
        
        if (!empty($search)) {
            $searchterm = '%' . $search . '%';
            $searchsql = " AND (q.name LIKE :search OR c.fullname LIKE :search2)";     
            $params['search'] = $searchterm;
            $params['search2'] = $searchterm;
        }
         // Modified SQL to include course module ID (cm.id as cmid)
         $sql = "SELECT q.id, q.name, q.timeopen, q.timeclose, c.id as courseid, 
         c.fullname as coursename, c.shortname as courseshortname,
         cm.id as cmid
         FROM {quiz} q
         JOIN {quiz_attempts} qa ON qa.quiz = q.id AND qa.userid = :userid
         JOIN {course} c ON q.course = c.id
         JOIN {course_modules} cm ON cm.instance = q.id
         JOIN {modules} m ON m.id = cm.module AND m.name = 'quiz'
         WHERE q.id > 0 $searchsql";

        $total = $DB->count_records_sql("SELECT COUNT(1) FROM ($sql) temp", $params);

        // Add sorting
        switch($sort) {
            case 'name':
                $sql .= " ORDER BY q.name $direction, q.id ASC";
                break;
            case 'course':
                $sql .= " ORDER BY c.fullname $direction, q.id ASC";
                break;
            case 'timeopen':
                $sql .= " ORDER BY q.timeopen $direction, q.id ASC";
                break;
            case 'timeclose':
                $sql .= " ORDER BY q.timeclose $direction, q.id ASC";
                break;
            default:
                $sql .= " ORDER BY q.id $direction";
        }

        $sql .= " LIMIT $perpage OFFSET " . ($page * $perpage);
        
        $quizzes = $DB->get_records_sql($sql, $params);
        
        $result = array();
        foreach ($quizzes as $quiz) {
            $result[] = array(
                'id' => $quiz->id,
                'name' => $quiz->name,
                'courseid' => $quiz->courseid,
                'coursename' => $quiz->coursename,
                'courseshortname' => $quiz->courseshortname,
                'timeopen' => $quiz->timeopen ? userdate($quiz->timeopen) : '-',
                'timeclose' => $quiz->timeclose ? userdate($quiz->timeclose) : '-',
                'quizurl' => new \moodle_url('/mod/quiz/view.php', array('id' => $quiz->cmid)),
                'courseurl' => new \moodle_url('/course/view.php', array('id' => $quiz->courseid))
            );
        }

        return array(
            'quizzes' => $result,
            'total' => $total,
            'sort' => $sort,
            'direction' => $direction,
            'page' => $page,
            'perpage' => $perpage
        );
    }
}
<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');

try {
    require_login();
    $context = context_system::instance();

    // Get page parameters
    $page = optional_param('page', 0, PARAM_INT);
    $search = optional_param('search', '', PARAM_RAW);
    $perpage = optional_param('perpage', 10, PARAM_INT);
    $sort = optional_param('sort', 'id', PARAM_ALPHA);
    $direction = optional_param('direction', 'ASC', PARAM_ALPHA);

    // Page setup
    $PAGE->set_context($context);
    $PAGE->set_url(new moodle_url('/theme/alpha/quiz.php', array(
        'page' => $page,
        'perpage' => $perpage,
        'sort' => $sort,
        'direction' => $direction,
        'search' => $search
    )));
    $PAGE->set_title(get_string('quizlist', 'theme_alpha'));
    $PAGE->set_heading(get_string('quizlist', 'theme_alpha'));
    $PAGE->requires->js_call_amd('theme_alpha/quiz_list', 'init');

    // Get quiz data
    $quizzes = \theme_alpha\util\quiz_data::get_quiz_list(
        $page, 
        $perpage, 
        $search, 
        $sort, 
        $direction
    );

    // Setup pagination
    $totalquizzes = $quizzes['total'];
    $totalpages = ceil($totalquizzes / $perpage);

    // Generate pagination data
    $pagination = new stdClass();
    $pagination->pages = array();

    if ($totalquizzes > 0) {
        // Previous page
        if ($page > 0) {
            $pagination->previousurl = new moodle_url('/theme/alpha/quiz.php', array(
                'page' => $page - 1,
                'perpage' => $perpage,
                'sort' => $sort,
                'direction' => $direction,
                'search' => $search
            ));
        }

        // Page numbers
        for ($i = 0; $i < $totalpages; $i++) {
            if ($i == $page) {
                $pagination->pages[] = array(
                    'number' => $i + 1,
                    'current' => true
                );
            } else {
                $pagination->pages[] = array(
                    'number' => $i + 1,
                    'url' => new moodle_url('/theme/alpha/quiz.php', array(
                        'page' => $i,
                        'perpage' => $perpage,
                        'sort' => $sort,
                        'direction' => $direction,
                        'search' => $search
                    ))
                );
            }
        }

        // Next page
        if ($page < $totalpages - 1) {
            $pagination->nexturl = new moodle_url('/theme/alpha/quiz.php', array(
                'page' => $page + 1,
                'perpage' => $perpage,
                'sort' => $sort,
                'direction' => $direction,
                'search' => $search
            ));
        }
    }

    echo $OUTPUT->header();
    
    echo $OUTPUT->render_from_template('theme_alpha/quiz_list', array(
        'quizzes' => $quizzes['quizzes'],
        'total' => $quizzes['total'],
        'sort' => $sort,
        'direction' => $direction,
        'search' => $search,
        'pagination' => $pagination,
        'showing_start' => ($page * $perpage) + 1,
        'showing_end' => min(($page + 1) * $perpage, $totalquizzes),
        'total_quizzes' => $totalquizzes
    ));
    
    echo $OUTPUT->footer();

} catch (Exception $e) {
    debugging('Error in quiz.php: ' . $e->getMessage(), DEBUG_DEVELOPER);
    echo $OUTPUT->header();
    echo $OUTPUT->notification(get_string('error', 'theme_alpha'), 'error');
    echo $OUTPUT->footer();
}
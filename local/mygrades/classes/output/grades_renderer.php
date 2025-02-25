<?php
namespace local_mygrades\output;

use renderable;
use renderer_base;
use templatable;
use stdClass;

class grades_renderer implements renderable, templatable {
    protected $grades;

    public function __construct($grades) {
        $this->grades = $grades;
    }

    public function export_for_template(renderer_base $output) {
        return ['grades' => array_values($this->grades)];
    }
}

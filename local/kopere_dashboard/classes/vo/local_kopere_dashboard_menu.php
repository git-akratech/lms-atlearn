<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * local_kopere_dashboard_menu file
 *
 * @package   local_kopere_dashboard
 * @copyright 2017 Eduardo Kraus {@link http://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_kopere_dashboard\vo;

/**
 * Class local_kopere_dashboard_menu
 *
 * @package local_kopere_dashboard\vo
 */
class local_kopere_dashboard_menu extends \stdClass {

    /** @var int */
    public $id;

    /** @var string */
    public $link;

    /** @var string */
    public $title;

    /** @var int */
    public $menuid;

    /**
     * Function create_by_object
     *
     * @param $item
     *
     * @return local_kopere_dashboard_menu
     * @throws \coding_exception
     */
    public static function create_by_object($item) {
        $return = new local_kopere_dashboard_menu();

        $return->id = $item->id;
        $return->link = optional_param("link", $item->link, PARAM_TEXT);
        $return->title = optional_param("title", $item->title, PARAM_TEXT);
        $return->menuid = optional_param("menuid", $item->menuid, PARAM_INT);

        return $return;
    }

    /**
     * Function create_by_default
     *
     * @return local_kopere_dashboard_menu
     * @throws \coding_exception
     */
    public static function create_by_default() {
        $return = new local_kopere_dashboard_menu();

        $return->id = 0;
        $return->link = optional_param("link", '', PARAM_TEXT);
        $return->title = optional_param("title", '', PARAM_TEXT);
        $return->menuid = optional_param("menuid", 0, PARAM_INT);

        return $return;
    }
}

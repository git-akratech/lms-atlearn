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

defined('MOODLE_INTERNAL') || die();

/**
 * @package   theme_alpha
 * @copyright 2022 - 2023 Marcin Czaja (https://rosea.io)
 * @license   Commercial https://themeforest.net/licenses
 */

require_once(__DIR__ . '/libs/admin_confightmleditor.php');

$siteurl = $CFG->wwwroot;
$a = new stdClass;
$a->siteurl = $siteurl;

if ($ADMIN->fulltree) {
    $settings = new theme_alpha_admin_settingspage_tabs('themesettingalpha', get_string('configtitle', 'theme_alpha'));
    require('settings/general.php');
    require('settings/seo.php');
    require('settings/customization.php');
    require('settings/sidebar.php');
    require('settings/sidebar-nav.php');
    require('settings/topbar.php');
    require('settings/login.php');
    require('settings/course-page.php');
    require('settings/course-page-nav.php');
    require('settings/footer.php');
    require('settings/alert.php');
    require('settings/advanced.php');
    require('settings/scb.php');
    require('settings/block1.php');
    require('settings/block2.php');
    require('settings/block3.php');
    require('settings/block4.php');
    require('settings/block5.php');
    require('settings/block6.php');
    require('settings/block7.php');
    require('settings/block8.php');
    require('settings/block9.php');
    require('settings/block10.php');
    require('settings/block11.php');
    require('settings/block12.php');
    require('settings/block13.php');
    require('settings/block14.php');
    require('settings/block15.php');
    require('settings/block16.php');
    require('settings/block17.php');
    require('settings/block18.php');
    require('settings/block19.php');
    require('settings/block20.php');
    require('settings/block21.php');
    require('settings/block22.php');
    require('settings/block23.php');
}
// Add role settings for custom items
$page = new admin_settingpage('theme_alpha_customitems', get_string('customitems', 'theme_alpha'));

// Custom Item 1 Roles
$name = 'theme_alpha/customitem1roles';
$title = get_string('customitem1roles', 'theme_alpha');
$description = get_string('customitem1roles_desc', 'theme_alpha');
$default = 'manager,coursecreator,editingteacher,teacher';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

// Custom Item 3 Roles
$name = 'theme_alpha/customitem3roles';
$title = get_string('customitem3roles', 'theme_alpha');
$description = get_string('customitem3roles_desc', 'theme_alpha');
$default = 'manager,coursecreator,editingteacher';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$page->add($setting);

$settings->add($page);

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
 * Strings for the quizaccess_timelimit plugin.
 *
 * @package    quizaccess
 * @subpackage timelimit
 * @copyright  2011 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


$string['confirmstartheader'] = 'Time limit';
$string['confirmstart'] = 'Your attempt will have a time limit of {$a}. When you start, the timer will begin to count down and cannot be paused. You must finish your attempt before it expires. Are you sure you wish to start now?';
$string['pluginname'] = 'Time limit quiz access rule';
$string['privacy:metadata'] = 'The Time limit quiz access rule plugin does not store any personal data.';
$string['quiztimelimit'] = 'Time limit: {$a}
<p><b>Rules for Taking the Test</b></p>

<p><b>Single Attempt Only:</b> You are allowed only one attempt at the test.</p>
<p><b>Proper Lighting:</b> Sit in a well-lit area to ensure your webcam is properly detected.</p>
<p><b>Webcam Requirement:</b> The webcam must be turned on to take the test. Without it, access will be denied.</p>
<p><b>Eye-Tracking Enabled:</b> The system uses eye-sensitive detection. Ensure you remain focused on the screen throughout the test.</p>
<p><b>Tab Restrictions:</b> Switching to another tab is prohibited and will trigger a warning.</p>
<p><b>Warning Limit:</b> You are allowed up to 15 warnings. Exceeding this limit will result in the test being automatically closed, and you will not be able to continue.</p>
<p><b>Support:</b> If you encounter any issues, please contact us immediately.</p>
<p>Good luck with your test!</p>';

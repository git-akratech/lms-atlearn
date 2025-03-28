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
 *
 * @package   theme_alpha
 * @copyright 2022 - 2024 Marcin Czaja (https://rosea.io)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . "/mod/forum/renderer.php");

/**
 * Forum.
 *
 */
class theme_alpha_mod_forum_renderer extends plugin_renderer_base {
    /**
     * Returns the navigation to the previous and next discussion.
     *
     * @param mixed $prev Previous discussion record, or false.
     * @param mixed $next Next discussion record, or false.
     * @return string The output.
     */
    public function neighbouring_discussion_navigation($prev, $next) {
        $html = '';
        if ($prev || $next) {
            $html .= html_writer::start_tag('div', ['class' => 'discussion-nav clearfix border p-2 rounded']);
            $html .= html_writer::start_tag('ul');
            if ($prev) {
                $url = new moodle_url('/mod/forum/discuss.php', ['d' => $prev->id]);
                $html .= html_writer::start_tag('li', ['class' => 'prev-discussion']);
                $html .= html_writer::link(
                    $url,
                    '<svg class="mr-2"
                        width="16"
                        height="16"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        color="currentColor">
                    <path d="M18.5 12H6m0 0l6-6m-6 6l6 6"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    </svg>' . format_string($prev->name),
                    [
                        'aria-label' => get_string('prevdiscussiona', 'mod_forum', format_string($prev->name)),
                        'class' => 'btn btn-xs btn-secondary text-truncate',
                    ]
                );
                $html .= html_writer::end_tag('li');
            }
            if ($next) {
                $url = new moodle_url('/mod/forum/discuss.php', ['d' => $next->id]);
                $html .= html_writer::start_tag('li', ['class' => 'next-discussion']);
                $html .= html_writer::link(
                    $url,
                    format_string($next->name) .
                        '<svg class="ml-2"
                            width="16"
                            height="16"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            color="currentColor">
                            <path d="M6 12h12.5m0 0l-6-6m6 6l-6 6"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>',
                    [
                        'aria-label' => get_string('nextdiscussiona', 'mod_forum', format_string($next->name)),
                        'class' => 'btn btn-xs btn-secondary text-truncate',
                    ]
                );
                $html .= html_writer::end_tag('li');
            }
            $html .= html_writer::end_tag('ul');
            $html .= html_writer::end_tag('div');
        }
        return $html;
    }

    /**
     * This method is used to generate HTML for a subscriber selection form that
     * uses two user_selector controls
     *
     * @param user_selector_base $existinguc
     * @param user_selector_base $potentialuc
     * @return string
     */
    public function subscriber_selection_form(user_selector_base $existinguc, user_selector_base $potentialuc) {
        $output = '';
        $formattributes = [];
        $formattributes['id'] = 'subscriberform';
        $formattributes['action'] = '';
        $formattributes['method'] = 'post';
        $output .= html_writer::start_tag('form', $formattributes);
        $output .= html_writer::empty_tag('input', ['type' => 'hidden', 'name' => 'sesskey', 'value' => sesskey()]);

        $existingcell = new html_table_cell();
        $existingcell->text = $existinguc->display(true);
        $existingcell->attributes['class'] = 'existing';
        $actioncell = new html_table_cell();
        $actioncell->text = html_writer::start_tag('div', []);
        $actioncell->text .= html_writer::empty_tag('input',
            [
                'type' => 'submit',
                'name' => 'subscribe',
                'value' => get_string('add'),
                'class' => 'actionbutton btn btn-success',
            ]
        );
        $actioncell->text .= html_writer::empty_tag('input',
            [
                'type' => 'submit',
                'name' => 'unsubscribe',
                'value' => get_string('remove'),
                'class' => 'actionbutton btn btn-danger',
            ],
        );
        $actioncell->text .= html_writer::end_tag('div', []);
        $actioncell->attributes['class'] = 'actions px-3';
        $potentialcell = new html_table_cell();
        $potentialcell->text = $potentialuc->display(true);
        $potentialcell->attributes['class'] = 'potential';

        $output .= html_writer::start_tag('fieldset', ['class' => 'w-100']);
        $table = new html_table();
        $table->attributes['class'] = 'subscribertable boxaligncenter mb-2 border-bottom';
        $table->data = [new html_table_row([$existingcell, $actioncell, $potentialcell])];
        $output .= html_writer::table($table);
        $output .= html_writer::end_tag('fieldset');

        $output .= html_writer::end_tag('form');
        return $output;
    }

    /**
     * This function generates HTML to display a subscriber overview, primarily used on
     * the subscribers page if editing was turned off
     *
     * @param array $users
     * @param object $forum
     * @param object $course
     * @return string
     */
    public function subscriber_overview($users, $forum, $course) {
        $output = '';
        $modinfo = get_fast_modinfo($course);
        if (!$users || !is_array($users) || count($users) === 0) {
            $output .= $this->output->notification(
                get_string("nosubscribers", "forum"),
                \core\output\notification::NOTIFY_INFO,
                false
            );
        } else if (!isset($modinfo->instances['forum'][$forum->id])) {
            $output .= $this->output->heading(get_string("invalidmodule", "error"));
        } else {
            $cm = $modinfo->instances['forum'][$forum->id];
            // TODO Does not support custom user profile fields (MDL-70456).
            $canviewemail = in_array('email', \core_user\fields::get_identity_fields(context_module::instance($cm->id), false));
            $strparams = new stdclass();
            $strparams->name = format_string($forum->name);
            $strparams->count = count($users);
            $output .= $this->output->heading(get_string("subscriberstowithcount", "forum", $strparams));
            $table = new html_table();
            $table->cellpadding = 5;
            $table->cellspacing = 5;
            $table->tablealign = 'center';
            $table->data = [];
            foreach ($users as $user) {
                $info = [$this->output->user_picture($user, ['courseid' => $course->id]), fullname($user)];
                if ($canviewemail) {
                    array_push($info, $user->email);
                }
                $table->data[] = $info;
            }
            $output .= html_writer::table($table);
        }
        return $output;
    }

    /**
     * This is used to display a control containing all of the subscribed users so that
     * it can be searched
     *
     * @param user_selector_base $existingusers
     * @return string
     */
    public function subscribed_users(user_selector_base $existingusers) {
        $output = $this->output->box_start('subscriberdiv boxaligncenter');
        $output .= html_writer::tag('p', get_string('forcesubscribed', 'forum'));
        $output .= $existingusers->display(true);
        $output .= $this->output->box_end();
        return $output;
    }

    /**
     * Generate the HTML for an icon to be displayed beside the subject of a timed discussion.
     *
     * @param object $discussion
     * @param bool $visiblenow Indicicates that the discussion is currently
     * visible to all users.
     * @return string
     */
    public function timed_discussion_tooltip($discussion, $visiblenow) {
        $dates = [];
        if ($discussion->timestart) {
            $dates[] = get_string('displaystart', 'mod_forum') . ': ' . userdate($discussion->timestart);
        }
        if ($discussion->timeend) {
            $dates[] = get_string('displayend', 'mod_forum') . ': ' . userdate($discussion->timeend);
        }

        $str = $visiblenow ? 'timedvisible' : 'timedhidden';
        $dates[] = get_string($str, 'mod_forum');

        $tooltip = implode("\n", $dates);
        return $this->pix_icon('i/calendar', $tooltip, 'moodle', ['class' => 'smallicon timedpost']);
    }

    /**
     * Display a forum post in the relevant context.
     *
     * @param \mod_forum\output\forum_post $post The post to display.
     * @return string
     */
    public function render_forum_post_email(\mod_forum\output\forum_post_email $post) {
        $data = $post->export_for_template($this, $this->target === RENDERER_TARGET_TEXTEMAIL);
        return $this->render_from_template('mod_forum/' . $this->forum_post_template(), $data);
    }

    /**
     * The template name for this renderer.
     *
     * @return string
     */
    public function forum_post_template() {
        return 'forum_post';
    }

    /**
     * Create the inplace_editable used to select forum digest options.
     *
     * @param   stdClass    $forum  The forum to create the editable for.
     * @param   int         $value  The current value for this user
     * @return  inplace_editable
     */
    public function render_digest_options($forum, $value) {
        $options = forum_get_user_digest_options();
        $editable = new \core\output\inplace_editable(
            'mod_forum',
            'digestoptions',
            $forum->id,
            true,
            $options[$value],
            $value
        );

        $editable->set_type_select($options);

        return $editable;
    }

    /**
     * Render quick search form.
     *
     * @param \mod_forum\output\quick_search_form $form The renderable.
     * @return string rendered HTML string from the template.
     */
    public function render_quick_search_form(\mod_forum\output\quick_search_form $form) {
        if (strpos($this->page->url->get_path(), "index.php")) {
            return $this->render_from_template('mod_forum/quick_search_form', $form->export_for_template($this));
        }

        return $this->render_from_template('mod_forum/forum_new_discussion_actionbar', $form->export_for_template($this));
    }

    /**
     * Render the view action area.
     *
     * @param \mod_forum\output\forum_actionbar $actionbar forum_actionbar object.
     * @return string rendered HTML string
     */
    public function render_activity_actionbar(\mod_forum\output\forum_actionbar $actionbar): string {
        return $this->render_from_template('mod_forum/forum_actionbar', $actionbar->export_for_template($this));
    }

    /**
     * Render the subscription action area.
     *
     * @param \mod_forum\output\subscription_actionbar $subscriptionactionbar subscription_actionbar object.
     * @return bool|string rendered HTML string.
     */
    public function subscription_actionbar(\mod_forum\output\subscription_actionbar $subscriptionactionbar): string {
        return $this->render_from_template(
            'mod_forum/forum_subscription_action',
            $subscriptionactionbar->export_for_template($this)
        );
    }

    /**
     * Render big search form.
     *
     * @param \mod_forum\output\big_search_form $form The renderable.
     * @return string
     */
    public function render_big_search_form(\mod_forum\output\big_search_form $form) {
        return $this->render_from_template('mod_forum/big_search_form', $form->export_for_template($this));
    }
}

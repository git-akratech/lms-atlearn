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
 * @package    mod_hsuforum
 * @subpackage backup-moodle2
 * @copyright  2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright Copyright (c) 2012 Open LMS (https://www.openlms.net)
 * @author Mark Nielsen
 */

/**
 * Define all the backup steps that will be used by the backup_hsuforum_activity_task
 */

/**
 * Define the complete forum structure for backup, with file and id annotations
 */
class backup_hsuforum_activity_structure_step extends backup_activity_structure_step {

    protected function define_structure() {

        // To know if we are including userinfo
        $userinfo = $this->get_setting_value('userinfo');

        // Define each element separated

        $forum = new backup_nested_element('hsuforum', array('id'), array(
            'type', 'name', 'intro', 'introformat',
            'assessed', 'assesstimestart', 'assesstimefinish', 'scale',
            'maxbytes', 'maxattachments', 'forcesubscribe',
            'rsstype', 'rssarticles', 'timemodified', 'warnafter',
            'blockafter', 'blockperiod', 'completiondiscussions', 'completionreplies',
            'completionposts', 'anonymous', 'gradetype', 'displaywordcount', 'showsubstantive',
            'showbookmark', 'showrecent', 'allowprivatereplies', 'lockdiscussionafter'));

        $discussions = new backup_nested_element('discussions');

        $discussion = new backup_nested_element('discussion', array('id'), array(
            'name', 'firstpost', 'userid', 'groupid',
            'assessed', 'timemodified', 'usermodified', 'timestart',
            'timeend', 'pinned'));

        $discussionsubs = new backup_nested_element('subscriptions_discs');
        $discussionsub  = new backup_nested_element('subscriptions_disc', array('id'), array('userid'));

        $posts = new backup_nested_element('posts');

        $post = new backup_nested_element('post', array('id'), array(
            'parent', 'userid', 'created', 'modified',
            'mailed', 'subject', 'message', 'messageformat',
            'messagetrust', 'attachment', 'totalscore', 'mailnow',
            'reveal', 'flags', 'privatereply'));

        $tags = new backup_nested_element('poststags');
        $tag = new backup_nested_element('tag', array('id'), array('itemid', 'rawname'));

        $ratings = new backup_nested_element('ratings');

        $rating = new backup_nested_element('rating', array('id'), array(
            'component', 'ratingarea', 'scaleid', 'value', 'userid', 'timecreated', 'timemodified'));

        $subscriptions = new backup_nested_element('subscriptions');

        $subscription = new backup_nested_element('subscription', array('id'), array(
            'userid'));

        $digests = new backup_nested_element('digests');

        $digest = new backup_nested_element('digest', array('id'), array(
            'userid', 'maildigest'));

        $readposts = new backup_nested_element('readposts');

        $read = new backup_nested_element('read', array('id'), array(
            'userid', 'discussionid', 'postid', 'firstread',
            'lastread'));

        $trackedprefs = new backup_nested_element('trackedprefs');

        $track = new backup_nested_element('track', array('id'), array(
            'userid'));

        // Build the tree

        $forum->add_child($discussions);
        $discussions->add_child($discussion);

        $forum->add_child($subscriptions);
        $subscriptions->add_child($subscription);

        $forum->add_child($digests);
        $digests->add_child($digest);

        $forum->add_child($readposts);
        $readposts->add_child($read);

        $forum->add_child($trackedprefs);
        $trackedprefs->add_child($track);

        $discussion->add_child($discussionsubs);
        $discussionsubs->add_child($discussionsub);

        $forum->add_child($tags);
        $tags->add_child($tag);

        $discussion->add_child($posts);
        $posts->add_child($post);

        $post->add_child($ratings);
        $ratings->add_child($rating);

        // Define sources

        $forum->set_source_table('hsuforum', array('id' => backup::VAR_ACTIVITYID));

        // All these source definitions only happen if we are including user info
        if ($userinfo) {
            $discussion->set_source_sql('
                SELECT *
                  FROM {hsuforum_discussions}
                 WHERE forum = ?',
                array(backup::VAR_PARENTID));

            $discussionsub->set_source_table('hsuforum_subscriptions_disc', array('discussion' => backup::VAR_PARENTID));

            // Need posts ordered by id so parents are always before childs on restore
            $post->set_source_table('hsuforum_posts', array('discussion' => backup::VAR_PARENTID), 'id ASC');

            $subscription->set_source_table('hsuforum_subscriptions', array('forum' => backup::VAR_PARENTID));

            $digest->set_source_table('hsuforum_digests', array('forum' => backup::VAR_PARENTID));

            $read->set_source_table('hsuforum_read', array('forumid' => backup::VAR_PARENTID));

            $track->set_source_table('hsuforum_track_prefs', array('forumid' => backup::VAR_PARENTID));

            $rating->set_source_table('rating', array('contextid'  => backup::VAR_CONTEXTID,
                                                      'component'  => backup_helper::is_sqlparam('mod_hsuforum'),
                                                      'ratingarea' => backup_helper::is_sqlparam('post'),
                                                      'itemid'     => backup::VAR_PARENTID));
            $rating->set_source_alias('rating', 'value');

            if (core_tag_tag::is_enabled('mod_hsuforum', 'hsuforum_posts')) {
                // Backup all tags for all forum posts in this forum.
                $tag->set_source_sql('SELECT t.id, ti.itemid, t.rawname
                                        FROM {tag} t
                                        JOIN {tag_instance} ti ON ti.tagid = t.id
                                       WHERE ti.itemtype = ?
                                         AND ti.component = ?
                                         AND ti.contextid = ?', array(
                    backup_helper::is_sqlparam('hsuforum_posts'),
                    backup_helper::is_sqlparam('mod_hsuforum'),
                    backup::VAR_CONTEXTID));
            }
        }

        // Define id annotations

        $forum->annotate_ids('scale', 'scale');

        $discussion->annotate_ids('group', 'groupid');

        $discussionsub->annotate_ids('user', 'userid');

        $post->annotate_ids('user', 'userid');

        $rating->annotate_ids('scale', 'scaleid');

        $rating->annotate_ids('user', 'userid');

        $subscription->annotate_ids('user', 'userid');

        $digest->annotate_ids('user', 'userid');

        $read->annotate_ids('user', 'userid');

        $track->annotate_ids('user', 'userid');

        // Define file annotations

        $forum->annotate_files('mod_hsuforum', 'intro', null); // This file area hasn't itemid

        $post->annotate_files('mod_hsuforum', 'post', 'id');
        $post->annotate_files('mod_hsuforum', 'attachment', 'id');

        // Return the root element (forum), wrapped into standard activity structure
        return $this->prepare_activity_structure($forum);
    }

}

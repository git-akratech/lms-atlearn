@mod @mod_hsuforum
Feature: Open Forum discussions can be split
  In order to manage forum discussions in my course
  As a Teacher
  I need to be able to split threads to keep them on topic.

  Background:
    Given the following "users" exist:
      | username | firstname | lastname | email |
      | teacher1 | Teacher | 1 | teacher1@example.com |
      | student1 | Student | 1 | student1@example.com |
    And the following "courses" exist:
      | fullname | shortname | category |
      | Science 101 | C1 | 0 |
    And the following "course enrolments" exist:
      | user | course | role |
      | teacher1 | C1 | editingteacher |
      | student1 | C1 | student |
    And I log in as "teacher1"
    And I am on "Science 101" course homepage with editing mode on
    And I add a "hsuforum" activity to course "Science 101" section "1" and I fill the form with:
      | Forum name | Study discussions |
      | Forum type | Standard forum for general use |
      | Description | Forum to discuss your coursework. |
    And I add a new discussion to "Study discussions" Open Forum with:
      | Subject | Photosynethis discussion |
      | Message | Lets discuss our learning about Photosynethis this week in this thread. |
    And I log out
    And I log in as "student1"
    And I am on "Science 101" course homepage
    And I reply "Photosynethis discussion" post from "Study discussions" Open Forum with:
      | Message | Can anyone tell me which number is the mass number in the periodic table? |
    And I log out

  @javascript
  Scenario: Split a forum discussion
    Given I log in as "teacher1"
    And I am on "Science 101" course homepage
    And I am on the "Study discussions" "hsuforum activity" page
    And I follow "Photosynethis discussion"
    When I follow "Split"
    And  I set the following fields to these values:
        | Discussion name | Mass number in periodic table |
    And I press "Split"
    Then I should see "Mass number in periodic table"
    And I am on the "Study discussions" "hsuforum activity" page
    And I should see "Photosynethis" in the "article[data-author='Teacher 1'] .hsuforum-thread-title" "css_element"
    And I should see "Mass number in periodic table" in the "article[data-author='Student 1'] .hsuforum-thread-title" "css_element"

Feature: Test DrupalContext
  In order to prove that Behat is working correctly in the VM
  As a developer
  I need to run a simple interface test

  Scenario: Viewing content in a region
    Given I am on the homepage
    Then I should see an ".openchurch-homepage-rotator" element

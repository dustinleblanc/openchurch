<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks {
  use \Boedah\Robo\Task\Drush\loadTasks;

  /**
   * Path to Drush executable.
   */
  protected $drushBin;

  /**
   * Path to Drupal root.
   */
  protected $drupalRoot;

  /**
   * RoboFile constructor.
   */
  public function __construct() {
    $this->drushBin = (__DIR__) . '/vendor/bin/drush';
    $this->drupalRoot = '/var/www/openchurch/drupal';
  }

  /**
   * @return mixed
   */
  public function getDrushBin() {
    return $this->drushBin;
  }

  /**
   * @param mixed $drushBin
   */
  public function setDrushBin($drushBin) {
    $this->drushBin = $drushBin;
  }

  /**
   * @return mixed
   */
  public function getDrupalRoot() {
    return $this->drupalRoot;
  }

  /**
   * @param mixed $drupalRoot
   */
  public function setDrupalRoot($drupalRoot) {
    $this->drupalRoot = $drupalRoot;
  }


  /**
   * Builds a Drush task with common arguments.
   *
   * @return $this
   *    A DrushStack task to use in building a task.
   */
  private function buildDrushTask() {
    return $this->taskDrushStack($this->drushBin)
      ->drupalRootDirectory($this->drupalRoot);
  }

  /**
   * Build Drupal for testing.
   */
  public function buildTest() {
    $this->_exec('rm -rf html');
    $this->_exec("./vendor/bin/drush make -y --force-complete build-openchurch.make.yml html");
    $this->taskDrushStack($this->drushBin)
      ->drupalRootDirectory('./html')
      ->siteInstall('openchurch')
      ->mysqlDbUrl('mysql://root@localhost/drupal')
      ->accountName('admin')
      ->accountPass('admin')
      ->run();
  }

}

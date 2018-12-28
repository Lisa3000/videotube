<?php 
require_once("includes/classes/VideoInfoControls.php"); 
class VideoInfoSection {

  private $con, $video, $userLoggedInObj;
  // Takes an object of the Video class in Video.php
  public function __construct($con, $video, $userLoggedInObj) {
    $this->con = $con;
    $this->video = $video;
    $this->userLoggedInObj = $userLoggedInObj;
  }

  public function create() {
    return $this->createPrimaryInfo() . $this->createSecondaryInfo();
  }

  private function createPrimaryInfo() {
    $title = $this->video->getTitle();
    $views = $this->video->getViews();

    $videoInfoControls = new VideoInfoControls($this->video, $this->userLoggedInObj);
    $controls = $videoInfoControls->create();
    return "<div class='videoInfo'>
              <h1>$title</h1>

              <div class='bottomSection'> 
                <span class='viewCount'>$views</span>
                $controls
              </div>
            </div>";
  }

  private function createSecondaryInfo() {
    
  }

}
?>
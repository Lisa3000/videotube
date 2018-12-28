<?php 
require_once("includes/classes/ButtonProvider.php"); 
class VideoInfoControls {
  private $video, $userLoggedInObj;
  // Takes an object of the Video class in Video.php
  public function __construct($video, $userLoggedInObj) {
    $this->video = $video;
    $this->userLoggedInObj = $userLoggedInObj;
  }

  public function create() {

    $likeButton = $this->createLikeButton();
    $dislikeButton = $this->createDislikeButton();

    return "<div class='controls'>
              $likeButton
              $dislikeButton
            </div>";
  }

  private function createLikeButton() {
    $text = $this->video->getLikes();
    $videoId = $this->video->getId();
    $action = "likeVideo(this, $videoId)";
    $class = "likeButton";
    $imageSrc = "assets/images/icons/thumb-up.png";
    // Change button img if video has already been liked

    return ButtonProvider::createButton($text, $imageSrc, $action, $class);
  }

  private function createDislikeButton() {
    $text = $this->video->getDislikes();
    $videoId = $this->video->getId();
    $action = "dislikeVideo(this, $videoId)";
    $class = "dislikeButton";
    $imageSrc = "assets/images/icons/thumb-down.png";
    // Change button img if video has already been disliked

    return ButtonProvider::createButton($text, $imageSrc, $action, $class);
  }
}

?>
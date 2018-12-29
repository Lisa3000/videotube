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
    
    if($this->video->wasLikedBy()) {
      $imageSrc = "assets/images/icons/thumb-up-active.png";
    }
    return ButtonProvider::createButton($text, $imageSrc, $action, $class);
  }

  private function createDislikeButton() {
    $text = $this->video->getDislikes();
    $videoId = $this->video->getId();
    $action = "dislikeVideo(this, $videoId)";
    $class = "dislikeButton";
    $imageSrc = "assets/images/icons/thumb-down.png";
    
    if($this->video->wasDislikedBy()) {
      $imageSrc = "assets/images/icons/thumb-down-active.png";
    }

    return ButtonProvider::createButton($text, $imageSrc, $action, $class);
  }
}

?>
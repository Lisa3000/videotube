<?php

require_once("../includes/config.php");

if(isset($_POST['userTo']) && isset($_POST['userFrom'])) {

  $userTo = $_POST['userTo'];
  $userFrom = $_POST['userFrom'];

  // Check if the user is subbed
  $query = $con->prepare("SELECT * FROM subscribers WHERE userTo=:userTo AND userFrom=:userFrom");
  $query->bindParam(":userTo", $userTo);
  $query->bindParam(":userFrom", $userFrom);
  $query->execute();

  if($query->rowCount() == 0) {
    $query = $con->prepare("INSERT INTO subscribers(userTo, userFrom) VALUES(:userTo, :userFrom)");
    $query->bindParam(":userTo", $userTo);
    $query->bindParam(":userFrom", $userFrom);
    $query->execute();
  } else {
    $query = $con->prepare("DELETE FROM subscribers WHERE userTo=:userTo AND userFrom=:userFrom");
    $query->bindParam(":userTo", $userTo);
    $query->bindParam(":userFrom", $userFrom);
    $query->execute();

    echo $query->rowCount();
  }

  // Return new number of subs
  $query = $con->prepare("SELECT * FROM subscribers WHERE userTo=:userTo");
  $query->bindParam(":userTo", $userTo);
  $query->execute();

} else {
  echo "One or more parameters are not passed into the subscribe.php file";
}

?>
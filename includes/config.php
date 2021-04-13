<?php
  ob_start(); // Turns on output buffering
  session_start();
  // Add your time zone
  date_default_timezone_set('America/Los_Angeles');

  try {
    // Add your connection info 
    $con = new PDO('mysql:host=localhost;dbname=videotube', 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>
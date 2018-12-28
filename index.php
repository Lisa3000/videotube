<?php require_once("includes/header.php"); ?>


<?php 
if(isset($_SESSION["userLoggedIn"])) {
  echo "user is logged in as " . $userLoggedInObj->getName();
} else {
  echo "not logged in";
}
?>

      
<?php require_once("includes/footer.php"); ?>

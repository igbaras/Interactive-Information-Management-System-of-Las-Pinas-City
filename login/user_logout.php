<?php session_start(); ?>
<?php ob_start(); ?>
<?php



$_SESSION['user_id'] = null;
$_SESSION['user_image'] = null;
$_SESSION['cryptedpass'] = null;
$_SESSION['username'] = null;
$_SESSION['user_firstname'] = null;
$_SESSION['user_lastname'] = null;
$_SESSION['user_email'] = null;
$_SESSION['user_role'] = null;

header("Location:index.php");

?>
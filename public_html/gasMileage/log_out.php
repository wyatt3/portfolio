<?php  
require_once("includes/database.php");
require_once("includes/functions.php");
unset($_SESSION['loggedIn']);
setLoginMessage("Logged out successfully");
header('Location:index.php');
?>
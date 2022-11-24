<?php
ob_start();
//Create database connection
$host="localhost";
$user="public_user";
$password="Pub_usr_passw0rd1!";
$database="gasMileage";
$connection = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    $error_message=mysqli_connect_error();  
    header('location:includes/database_error.php');
    exit;
}


?>  

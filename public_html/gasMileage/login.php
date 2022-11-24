<?php
require_once("includes/database.php");
require_once("includes/functions.php");
    $username = strtolower($_POST['username']);
    $password = $_POST['password']; 
    $users = mysqli_query($connection, "SELECT * FROM users");
    foreach($users as $user) {
        if ($username == strtolower($user['username'])) {
            if ($password == $user['password']) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['userID'] = $user['id'];
                header("location:home.php");
            }

            else {
                setLoginMessage("Incorrect Username/Password");
                header("location:index.php");
            } 
        }
        else {
            setLoginMessage("Incorrect Username/Password");
            header("location:index.php");
        }
    }
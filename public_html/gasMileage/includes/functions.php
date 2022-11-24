<?php 
session_start();
$users = mysqli_query($connection, "SELECT * FROM users WHERE id=".$_SESSION['userID']);
if (isset($carID)) {
    $car = mysqli_query($connection, "SELECT * FROM cars WHERE id=".$carID);
}

function confirmLoggedIn($cars) {
    if (!$_SESSION['loggedIn']) {
        setLoginMessage("Please Log In");
        header('Location:index.php');
    }
        
    foreach ($cars as $car) {
        if ($_SESSION['userID'] != $car['userID']) {
            header("location:includes/database_error.php?type=IDError");
        }
    }
}

function findUsername ($user) {
    foreach ($user as $user) {
        if ($_SESSION['userID'] == $user['id']) {
            return $user['username'];
        }
        else {
            return '';
        }
    }
}


function message($type="error") {
    if (isset($_SESSION[$type])) {
        $output = "<div class=\"message\"><p>".$_SESSION[$type]."</p></div>";
        unset($_SESSION[$type]);
        return $output;
    }
    else {
        $output = "";
        return $output;
    }
}
    

function setLoginMessage($message) {
    $_SESSION["loginMess"]=$message;
}


?>
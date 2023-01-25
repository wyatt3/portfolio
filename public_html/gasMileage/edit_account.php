<?php
require_once('includes/database.php');
require_once('includes/functions.php');
$user = mysqli_query($connection, "SELECT * FROM users WHERE id=".$_SESSION["userID"]);
$type = filter_input(INPUT_POST, "type");
$username = filter_input(INPUT_POST, "username");

if ($type == "username") {
    foreach ($user as $us) {
        $orig= $us['username'];
    }
    if ($orig=="guest") {
        header("location:includes/database_error.php?type=guest");
    }
    else {
        $sql = "UPDATE users SET username=? WHERE id=?";
        $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
        mysqli_stmt_bind_param($stmt, 'si', $username, $_SESSION['userID']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:account.php");
    }
}

else if ($type=="password") {
    $oldPass = filter_input(INPUT_POST, "oldPass");
    $newPass = filter_input(INPUT_POST, "newPass");

    foreach ($user as $us) {
        if ($username=="guest") {
            header("location:includes/database_error.php?type=guest");
        }
        else if ($oldPass == $us["password"]) {
            $sql = "UPDATE users SET password=? WHERE id=?";
            $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
            mysqli_stmt_bind_param($stmt, 'si', $newPass, $_SESSION['userID']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location:account.php");
        }
        else {
            header("location:includes/database_error.php?type=passChange");
        }
    }
}

?>

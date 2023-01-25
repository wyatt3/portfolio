<?php 
require_once('includes/database.php');
require_once('includes/functions.php');
    $type = filter_input(INPUT_POST, "type");
    $carID = filter_input(INPUT_POST, "carID");

    if ($type == "gas") {
        $ID = filter_input(INPUT_POST, "fillID");
    
         $sql = "DELETE FROM gasfillup WHERE id=?";
         $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
         mysqli_stmt_bind_param($stmt, 'i', $ID);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_close($stmt);
    
        header("location:gasMileage.php?carID=".$carID);
    }
    else if ($type == "maint") {
        $ID = filter_input(INPUT_POST, "mainID");
    
         $sql = "DELETE FROM maintenance WHERE id=?";
         $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
         mysqli_stmt_bind_param($stmt, 'i', $ID);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_close($stmt);
    
        header("location:maintenance.php?carID=".$carID);
    }

?>
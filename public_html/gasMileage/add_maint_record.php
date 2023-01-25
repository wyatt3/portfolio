<?php
    require_once('includes/database.php');
    require_once('includes/functions.php');
    $carID = filter_input(INPUT_POST, "carID");
    $mileage = filter_input(INPUT_POST, "mileage");
    $cost = filter_input(INPUT_POST, "cost");
    $description = filter_input(INPUT_POST, "description");
    $date = filter_input(INPUT_POST, 'date');

    $sql = "INSERT INTO maintenance (carID, `date`, mileage, cost, `description`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
    mysqli_stmt_bind_param($stmt, 'ssids', $carID, $date, $mileage, $cost, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:maintenance.php?carID=".$carID); 
?>
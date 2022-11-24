<?php 
require_once('includes/database.php');
require_once('includes/functions.php');
    $carID = filter_input(INPUT_POST, "carID");
    $mileage = filter_input(INPUT_POST, "mileage");
    $tripMiles = filter_input(INPUT_POST, "tripMiles");
    $gallons = filter_input(INPUT_POST, "gallons");
    $total = filter_input(INPUT_POST, "total");
    //$date = date("Y-m-d");
    $date = filter_input(INPUT_POST, 'date');
    $PPG = bcdiv($total, $gallons, 2);
    $gasMileage = bcdiv($tripMiles, $gallons, 2);

     $sql = "INSERT INTO gasfillup (carID, `date`, tripMiles, mileage, gallons, pricePerGallon, total, gasMileage) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
     $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
     mysqli_stmt_bind_param($stmt, 'ssdidddd', $carID, $date, $tripMiles, $mileage, $gallons, $PPG, $total, $gasMileage);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

    $cars = mysqli_query($connection, "SELECT * FROM cars WHERE id=". $carID);

    foreach ($cars as $car) {
        if($mileage > $car['mileage']) {
            mysqli_query($connection, "UPDATE cars SET mileage=" . $mileage . " WHERE id=".$carID);
        }
    }

    header("location:gasMileage.php?carID=".$carID);
?>
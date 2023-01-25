<?php 
require_once('includes/database.php');
require_once('includes/functions.php');
$type = filter_input(INPUT_POST, "type");
$carID = filter_input(INPUT_POST, "carID");

if ($type == "gas") {
    $fillID = filter_input(INPUT_POST, "fillID");
    $mileage = filter_input(INPUT_POST, "mileage");
    $tripMiles = filter_input(INPUT_POST, "tripMiles");
    $gallons = filter_input(INPUT_POST, "gallons");
    $total = filter_input(INPUT_POST, "total");
    $date = filter_input(INPUT_POST, 'date');
    $PPG = bcdiv($total, $gallons, 2);
    $gasMileage = bcdiv($tripMiles, $gallons, 2);

    $sql = "UPDATE `gasfillup` SET `date`=?, `tripMiles`=?, `mileage`=?, `gallons`=?, `pricePerGallon`=?, `total`=?, `gasMileage`=? WHERE `id`=?";
    $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
    mysqli_stmt_bind_param($stmt, "sdiddddi", $date, $tripMiles, $mileage, $gallons, $PPG, $total, $gasMileage, $fillID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $cars = mysqli_query($connection, "SELECT * FROM cars WHERE id=". $carID);

    foreach ($cars as $car) {
        if($mileage > $car['mileage']) {
            mysqli_query($connection, "UPDATE cars SET mileage=" . $mileage . " WHERE id=".$carID);
        }
    }

    header("location:gasMileage.php?carID=".$carID);
}

else if ($type == "maint") {
    $ID = filter_input(INPUT_POST, "maintID");
    $mileage = filter_input(INPUT_POST, "mileage");
    $cost = filter_input(INPUT_POST, "cost");
    $description = filter_input(INPUT_POST, "description");
    $date = filter_input(INPUT_POST, 'date');

    $sql = "UPDATE maintenance SET `date`= ?, mileage = ?, cost = ?, `description` = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
    mysqli_stmt_bind_param($stmt, 'sidss', $date, $mileage, $cost, $description, $ID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:maintenance.php?carID=".$carID); 
}


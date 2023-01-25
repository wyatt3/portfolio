<?php
require_once('includes/database.php');
require_once('includes/functions.php');
confirmLoggedIn($car);
$carID = filter_input(INPUT_POST, 'carID');
$cars = mysqli_query($connection, "SELECT * FROM cars where `id`=". $carID);
foreach ($cars as $car) {
    $carName=$car['model'];
}
$ID = filter_input(INPUT_POST, 'fillID');
$date = filter_input(INPUT_POST, "date");
$mileage = filter_input(INPUT_POST, "mileage");
$tripMiles = filter_input(INPUT_POST, 'tripMiles');
$gallons = filter_input(INPUT_POST, 'gallons');
$total = filter_input(INPUT_POST, 'total');
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Cars - Fill Up</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<?php include("includes/js.html")?>
<!-- the body section -->
<body>
<main>
    <div class="body">
    <header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button class="homeButton"><a href="home.php">Home</a></button><input type="submit" value="Log Out"></form><h1>Edit Fill - <?php echo $carName?></h1></header>
    <form class="fillForm" action="edit_entry.php" name="fillUpValidate" method="post" style="padding-left: 30px;">
    <br>
    <input type="hidden" name="type" value="gas">
    <input type='hidden' name='carID' value=<?php echo $carID?>>
    <input type="hidden" name="fillID" value=<?php echo $ID ?>>
    <div class="fillFormDiv">
        <label>Date: </label>
        <input type="date" name="date" value=<?php echo $date ?>>
    </div>
    <div class="fillFormDiv">
        <label>Mileage: </label>
        <input type="text" name="mileage" value=<?php echo $mileage ?>>
    </div>
    <div class="fillFormDiv">
        <label>Trip Miles: </label>
        <input type="text" name="tripMiles" value=<?php echo $tripMiles ?>>
    </div>
    <div class="fillFormDiv">
        <label>Gallons: </label>
        <input type="text" name="gallons" value=<?php echo $gallons ?>>
    </div>
    <div class="fillFormDiv">
        <label>Total: $</label>
        <input type="text" name="total" value=<?php echo $total ?>>
    </div>
    <input style="padding:6px; margin-top: 20px;" class="link" type="submit" value="Submit">
    </form>
    <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>
 </main>
</body>
</html>
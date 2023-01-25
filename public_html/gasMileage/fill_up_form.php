<?php
require_once('includes/database.php');
require_once('includes/functions.php');
confirmLoggedIn($car);
$carID = filter_input(INPUT_POST, 'carID');
$cars = mysqli_query($connection, "SELECT * FROM cars where `id`=". $carID);
foreach ($cars as $car) {
    $carName=$car['model'];
}
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
    <header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button formaction="home.php" class="homeButton">Home</button><input type="submit" value="Log Out"></form><h1>Fill Up - <?php echo $carName?></h1></header>
    <form class="fillForm" action="fill_up.php" name="fillUpValidate" method="post" style="padding-left: 30px;">
    <br>
    <input type="hidden" name="carID" value="<?php echo $carID ?>">
    <div class="fillFormDiv">
        <label>Date: </label>
        <input type="date" name="date" value=<?php echo date("Y-m-d") ?>>
    </div>
    <div class="fillFormDiv">
        <label>Mileage: </label>
        <input type="text" name="mileage">
    </div>
    <div class="fillFormDiv">
        <label>Trip Miles: </label>
        <input type="text" name="tripMiles">
    </div>
    <div class="fillFormDiv">
        <label>Gallons: </label>
        <input type="text" name="gallons">
    </div>
    <div class="fillFormDiv">
        <label>Total: $</label>
        <input type="text" name="total">
    </div>
    <input style="padding:6px; margin-top: 20px;" class="link" type="submit" value="Submit">
    </form>
    <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>
 </main>
</body>
</html>
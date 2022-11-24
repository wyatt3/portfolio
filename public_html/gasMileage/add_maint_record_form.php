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
    <title>My Cars - Add Record</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<?php include("includes/js.html")?>
<!-- the body section -->
<body>
<main>
    <div class="body">
    <header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button formaction="home.php" class="homeButton">Home</button><input type="submit" value="Log Out"></form><h1>Add Maintenance Record - <?php echo $carName?></h1></header>
    <form class="fillForm" action="add_maint_record.php" name="maintValidate" method="post" style="padding-left: 30px;">
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
        <label>Cost: $</label>
        <input type="text" name="cost">
    </div>
    <div class="fillFormDiv">
        <label id="maintDesc">Description:</label>
        <textarea name="description"></textarea>
    </div>
    <input style="padding:6px; margin-top: 20px;" class="link" type="submit" value="Submit">
    </form>
    <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>
 </main>
</body>
</html>
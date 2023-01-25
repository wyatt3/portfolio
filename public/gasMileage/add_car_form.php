<?php
require_once('includes/database.php');
require_once('includes/functions.php');
confirmLoggedIn($car);
$cars = mysqli_query($connection, "SELECT * FROM cars where userID=".$_SESSION['userID']);
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Cars - Add Car</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<?php include("includes/js.html") ?>
<!-- the body section -->
<body>
<main>
    <div class="body">
        
    <header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button formaction="home.php" class="homeButton">Home</button><input type="submit" value="Log Out"></form><h1>Add Car</h1></header>
        <br>
        <?php echo message() ?>
        <form style="float:left; margin-right:50px;" class="logIn" name="addCarValidate" action="add_car.php" method="post" enctype="multipart/form-data">
            <h3 style="margin-top: 0; margin-bottom: 0;">Enter Year</h3>
            <input type="text" name="year" placeholder="Year">
            <h3 style="margin-top: 0; margin-bottom: 0;">Enter Make</h3>
            <input type="text" name="make" placeholder="Make">
            <h3 style="margin-top: 0; margin-bottom: 0;">Enter Model</h3>
            <input type="text" name="model" placeholder="Model">
            <h3 style="margin-top: 0; margin-bottom: 0;">Enter Car's Mileage</h3>
            <input type="text" name="mileage" placeholder="Mileage">
            <h3 style="margin-top: 0; margin-bottom: 0;">Car Image</h3>
            <input type="file" name="fileToUpload">
            <input class="link" type="submit" value="Add Car">
        </form>
        <br>
        <br>
        <div class="carTable">
            <h2>Current Cars in Database</h2>
            <table>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Mileage</th>
            <?php foreach ($cars as $car) {
                ?><tr>
                <td><?php echo $car['year'];?></td>
                <td><?php echo $car['make'];?></td>
                <td><?php echo $car['model'];?></td>
                <td><?php echo $car['mileage'];?></td>
                </tr>
            <?php 
            }?>
            </table>
            <p class="warning"><b>Warning: </b>In order to keep the information of other users safe, you will be unable to remove or edit vehicles from the database. Cars will only be removed or edited by specific request after verification.</p>
        </div>
        <div class="emptySpace"></div>
        <div class="emptySpace"></div>
        <div class="emptySpace"></div>
    <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>


 </main>
</body>
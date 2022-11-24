<?php
require_once('includes/database.php');
require_once('includes/functions.php');
confirmLoggedIn($car);
$cars = mysqli_query($connection, "SELECT * FROM cars WHERE userID=".$_SESSION["userID"]);

?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Cars</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, ">
</head>

<!-- the body section -->
<body>
<main>
    <div class="body">
<header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button formaction="account.php" class="homeButton">Account Settings</button><input type="submit" value="Log Out"></form><h1>Home</h1></header>


    <section>
        <!-- display a table -->
        <?php foreach ($cars as $car) { ?>
        <div class="carName">
            <h2><?php echo $car['model']; ?></h2>
                <form action="gasMileage.php" method="post">
                    <input type="hidden" name='carID' value="<?php echo $car['id'] ?>">
                    <input class="link" type="submit" value="Gas Mileage">
                </form>
            <br>
                <form action="maintenance.php" method="post">
                    <input type="hidden" name='carID' value="<?php echo $car['id'] ?>">
                    <input class="link" type="submit" value="Maintenance Log">
                </form>
        </div>
        <img class="carImage" src="images/uploads/<?php echo $car['photo_name']?>" alt="Car Image">
        <br>
        <?php } ?>
        <p><a href="add_car_form.php"><button class="link" style="margin-left:-15px;">Add Car</button></a></p>
    </section>
    <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>
 </main>
</body>
</html>
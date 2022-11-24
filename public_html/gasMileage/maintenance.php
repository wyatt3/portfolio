<?php
require_once('includes/database.php');
$cars = mysqli_query($connection, "SELECT * FROM cars");
if (!isset($carID)) {
    if ($_POST) {
        $carID = filter_input(INPUT_POST, 'carID');
    }
    else {
    $carID = $_GET['carID'];
    }
}
require_once('includes/functions.php');
confirmLoggedIn($car);

 $sql = "SELECT * FROM cars WHERE id=?";
 $stmt = mysqli_prepare($connection, $sql);
 mysqli_stmt_bind_param($stmt, 'i', $carID);
 mysqli_stmt_execute($stmt);
 $cars = mysqli_stmt_get_result($stmt);
 mysqli_stmt_close($stmt);

 $sql = "SELECT * FROM maintenance WHERE carID=? ORDER BY `date` DESC";
 $stmt = mysqli_prepare($connection, $sql);
 mysqli_stmt_bind_param($stmt, 'i', $carID);
 mysqli_stmt_execute($stmt);
 $maintenance = mysqli_stmt_get_result($stmt);
 mysqli_stmt_close($stmt);

?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Cars - Maintenance</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<main>
    <div class="body">
<header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button formaction="home.php" class="homeButton">Home</button><input type="submit" value="Log Out"></form><h1 class="test">Maintenance</h1></header>
    <section>
        <!-- display a table -->
        <?php foreach ($cars as $car) { ?>
        
        <h2><?php echo $car['model']?></h2>
        <?php } ?>
        <form action="add_maint_record_form.php" method="post" style="float:left; margin-right:50px;">
            <input type="hidden" name='carID' value='<?php echo $carID?>'>
            <input class="link" type="submit" value="Add Record">
        </form>
        <table>
            <tr>
                <th>Date</th>       
                <th>Mileage</th>       
                <th>Description</th>       
                <th>Cost</th>       
                <th>Edit</th>       
                <th>Delete</th>       
            </tr>
            <?php foreach ($maintenance as $main) { ?>
            <tr>
                <td class="dateTab"><?php echo $main['date'] ?></td>
                <td><?php echo $main['mileage'] ?></td>
                <td><?php echo $main['description'] ?></td>
                <td>$<?php echo $main['cost'] ?></td>
                <td>
                    <form action="edit_maint_form.php" method="post">
                    <input type="hidden" name="maintID" value=<?php echo $main['id'] ?>>
                    <input type="hidden" name="carID" value=<?php echo $carID ?>>
                    <input type="hidden" name="date" value=<?php echo $main['date'] ?>>
                    <input type="hidden" name="mileage" value=<?php echo $main['mileage'] ?>>
                    <input type="hidden" name="description" value="<?php echo $main['description'] ?>">
                    <input type="hidden" name="cost" value=<?php echo $main['cost'] ?>>
                    <input class="link" type=submit value="edit">
                    </form>
                </td>
                <td>
                    <form action="delete_entry.php" method="post">
                        <input type="hidden" name="type" value="maint">
                        <input type="hidden" name="mainID" value=<?php echo $main['id'] ?>>
                        <input type="hidden" name="carID" value=<?php echo $carID ?>>
                        <input class="link" type=submit value="delete">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </section>
    <div class="emptySpace"></div>
    <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>


 </main>
</body>
</html>
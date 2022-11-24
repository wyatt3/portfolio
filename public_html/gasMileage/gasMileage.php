<?php
require_once('includes/database.php');
if (!isset($carID)) {
    if ($_POST) {
        $carID = filter_input(INPUT_POST, 'carID');
    }
    else {
    $carID = $_GET['carID'];
    }
}
require_once('includes/functions.php');
$cars = mysqli_query($connection, "SELECT * FROM cars");



confirmLoggedIn($car);

 $sql = "SELECT * FROM cars WHERE id=?";
 $stmt = mysqli_prepare($connection, $sql);
 mysqli_stmt_bind_param($stmt, 'i', $carID);
 mysqli_stmt_execute($stmt);
 $cars = mysqli_stmt_get_result($stmt);
 mysqli_stmt_close($stmt);

 $sql = "SELECT * FROM gasfillup WHERE carID=? ORDER BY `date` DESC";
 $stmt = mysqli_prepare($connection, $sql);
 mysqli_stmt_bind_param($stmt, 'i', $carID);
 mysqli_stmt_execute($stmt);
 $fillUps = mysqli_stmt_get_result($stmt);

 mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Cars - Gas Mileage</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<main>
    <div class="body">
<header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button formaction="home.php" class="homeButton">Home</button><input type="submit" value="Log Out"></form><h1 class="test">Gas Mileage</h1></header>
    <section>
        <!-- display a table -->
        <?php foreach ($cars as $car) { ?>
        
        <h2><?php echo $car['model']; ?></h2>
        <form action="fill_up_form.php" method="post" style="float:left; margin-right:50px;">
            <input type="hidden" name='carID' value='<?php echo $carID?>'>
            <input class="link" type="submit" value="Fill Up">
        </form>
        <?php } 
        $mile = 0;
        $gasMile = 0;
        $price = 0;
        $total = 0;
        $divi = 0;
        foreach ($fillUps as $fill) {
            $mile += $fill['tripMiles'];
            $gasMile += $fill['gasMileage'];
            $price += $fill['pricePerGallon'];
            $total += $fill['total'];
            $divi++;
        }
        $avgMiles = bcdiv($mile, $divi, 2);
        $avgGasMileage = bcdiv($gasMile, $divi, 2);
        $avgPrice = bcdiv($price, $divi, 2);
        $avgTotal = bcdiv($total, $divi, 2);
        ?>
        <table>
            <tr>
                <th colspan="4">Averages</th>
            </tr>
            <tr>
                <th>Miles/Fill Up</th>
                <th>Gas Mileage</th>
                <th>$/Gallon</th>
                <th>Total</th>
            </tr>
            <tr>
                <td><?php echo $avgMiles ?></td>
                <td><?php echo $avgGasMileage ?></td>
                <td>$<?php echo $avgPrice ?></td>
                <td>$<?php echo $avgTotal ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Date</th>
                <th>Mileage</th>`
                <th>Trip Miles</th>
                <th>Gallons</th>
                <th>Gas Mileage</th>
                <th>Price/Gallon</th>
                <th>Total</th>
                <th>Edit</th>
                <th>Delete</th>        
            </tr>
            <?php foreach ($fillUps as $fill) {
                if (strlen($fill['pricePerGallon']) == 1) {
                    $gasLen=4;
                    $PPG = $fill['pricePerGallon'].".";
                } elseif (strlen($fill['pricePerGallon']) == 2) {
                    $gasLen=5;
                    $PPG = $fill['pricePerGallon'].".";
                } 
                 else {
                    $gasLen=5;
                    $PPG = $fill['pricePerGallon'];
                }

                if (strlen($fill['total']) == 1) {
                    $totalLen=4;
                    $TOT = $fill['total'].'.';
                } elseif(strlen($fill['total']) == 2) {
                    $totalLen=5;
                    $TOT = $fill['total'].'.';
                } else {
                    $totalLen=5;
                    $TOT = $fill['total'];
                }
                ?>
            <tr> <?php $date = date_create($fill['date']); ?>
                <td class="dateTab"><?php echo date_format($date, 'n/j/Y'); ?></td>
                <td><?php echo $fill['mileage']; ?></td>
                <td><?php echo $fill['tripMiles']; ?></td>
                <td><?php echo $fill['gallons']; ?></td>
                <td><?php echo $fill['gasMileage']; ?></td>
                <td>$<?php echo str_pad($PPG, 4, 0); ?></td>
                <td>$<?php echo str_pad($TOT, $totalLen, 0); ?></td>
                <td>
                    <form action="edit_entry_form.php" method="post">
                    <input type="hidden" name="fillID" value=<?php echo $fill['id']?>>
                    <input type="hidden" name="carID" value=<?php echo $carID?>>
                    <input type="hidden" name="date" value=<?php echo $fill['date'] ?>>
                    <input type="hidden" name="mileage" value=<?php echo $fill['mileage'] ?>>
                    <input type="hidden" name="tripMiles" value=<?php echo $fill['tripMiles'] ?>>
                    <input type="hidden" name="gallons" value=<?php echo $fill['gallons'] ?>>
                    <input type="hidden" name="total" value=<?php echo $fill['total'] ?>>
                    <input class="link" type=submit value="edit">
                    </form>
                </td>
                <td>
                    <form action="delete_entry.php" method="post">
                        <input type="hidden" name="type" value="gas">
                        <input type="hidden" name="fillID" value=<?php echo $fill['id']?>>
                        <input type="hidden" name="carID" value=<?php echo $carID?>>
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
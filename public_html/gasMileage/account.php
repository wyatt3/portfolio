<?php
require_once('includes/database.php');
require_once('includes/functions.php');
confirmLoggedIn($car);
$user = mysqli_query($connection, "SELECT * FROM users WHERE id=".$_SESSION["userID"]);

?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Cars - Account</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<main>
    <div class="body">
    <header><form class="logOut" action="log_out.php" method="post">User: <?php echo findUsername($users); ?><br><button formaction="home.php" class="homeButton">Home</button><input type="submit" value="Log Out"></form><h1>Account Settings</h1></header>        <br>
    <h2 style="margin: 5px 20px;">Change Username</h2>
        <?php foreach ($user as $us) { ?>
            <form class="logIn" name="editUsername" action="edit_account.php" method="post">
                <input type="hidden" name="type" value="username">
                <h3 style="margin-top:0; margin-bottom:0;">Username</h3>
                <input type="text" name="username" value="<?php echo $us['username']?>">
                <input class="link" type="submit" value="Change Username">
            </form>
        <br>
        <h2 style="margin: 5px 20px;">Change Password</h2>
        <form class="logIn" name="editAccount" action="edit_account.php" method="post">
            <input type="hidden" name="type" value="password">
            <input type="hidden" name="username" value="<?php echo $us['username'] ?>">
            <h3 style="margin-top:0; margin-bottom:0;">Old Password</h3>
            <input type="password" name="oldPass" value="" placeholder="Old Password">
            <h3 style="margin-top:0; margin-bottom:0;">New Password</h3>
            <input type="password" name="newPass" id="newPss" value="" placeholder="New Password">
            <h3 style="margin-top:0; margin-bottom:0;">Confirm Password</h3>
            <input type="password" name="confirmPass" value="" placeholder="New Password Again">
            <input class="link" type="submit" value="Change Password">
        </form>
        <?php } ?>
        <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>
</main>
</body>
</html>
<?php include("includes/js.html"); ?>
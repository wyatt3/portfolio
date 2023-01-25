<?php
require_once('includes/database.php');
require_once('includes/functions.php');
if (isset($_SESSION["loggedIn"])){
    if($_SESSION["loggedIn"]) {
        header("location:home.php");
    }
}
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Cars - Login</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, ">
</head>

<?php include("includes/js.html") ?>
<!-- the body section -->
<body>
<main>
    <div class="body">
<header><h1>Log In</h1></header>
        <br>
        <?php echo message("loginMess") ?>
        <form class="logIn" name="loginValidate" action="login.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input class="link" type="submit" value="Log In">
        
        </form>
    <footer><hr><p>Created by Wyatt Johnson</p></footer>
    </div>


 </main>
</body>
</html>
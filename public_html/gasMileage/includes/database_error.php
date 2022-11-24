<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Cars - Error</title>
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>
<?php 
    if($_GET['type']=="IDError") {?>
    <body>
        <div class="body">
            <header><h1>Error</h1></header>
            <section>
                <h1>Authentication Error</h1>
                <p>It seems you tried to access information that wasn't yours.
                Please return to the previous page and try whatever function you were originally attempting.</p>
                <p>Please be nice. Don't try to access or alter other users' data.</p>
            </section>
<?php
    } else if ($_GET['type']=="UploadError") {?>
        <div class="body">
            <header><h1>Error</h1></header>
            <section>
                <h1>Upload Error</h1>
                <p>There was an error uploading the image you selected. Please return to the previous page and try again.</p>
            </section>
    <?php 
    } else if ($_GET['type']=="guest") {?>
        <div class="body">
            <header><h1>Error</h1></header>
            <section>
                <h1>Password Change Error</h1>
                <p>It looks like you tried to change the username or password of the guest account. Don't do that.</p>
            </section>
    <?php
    } else if ($_GET['type']=="passChange") {?>
        <div class="body">
            <header><h1>Error</h1></header>
            <section>
                <h1>Password Change Error</h1>
                <p>Something went wrong while trying to change your password. Please go back and try again.</p>
            </section>
<?php 
    }
    else {
?>
<!-- the body section -->
<body>
<div class="body">
    <header><h1>ERROR</h1></header>

    <section>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>&nbsp;</p>
    </section>

    <?php } ?>
    <footer>
        <hr>
        <p>Created by Wyatt Johnson</p>
    </footer>
    </div>
</body>
</html>
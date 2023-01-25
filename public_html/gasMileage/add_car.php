<?php 
require_once('includes/database.php');
require_once('includes/functions.php');

$imageName = $_FILES['fileToUpload']['name'];

if(isset($imageName) && !empty($imageName)) {

    $target_dir = "images/uploads/";
    $tempFile = $_FILES['fileToUpload']['tmp_name'];
    

    $target_file = $target_dir . basename($imageName);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // assume the image is okay
    $uploadOk = 1;
    // Check if image file is a actual image or not
    if(!getimagesize($tempFile)) {
        $uploadOk = 0;
    }
    // Check if file already exists in upload file
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
    // if the image is ok...
    if ($uploadOk) {
        // try to upload it
        if(move_uploaded_file($tempFile, $target_file)) {  
            //* if image upload okay, attempt database operations
            $year = filter_input(INPUT_POST, "year");
            $make = filter_input(INPUT_POST, "make");
            $model = filter_input(INPUT_POST, "model");
            $mileage = filter_input(INPUT_POST, "mileage");
            
            $sql = "INSERT INTO cars (userID, year, make, model, mileage, photo_name) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connection, $sql) or die(header("location:includes/database_error.php"));
            mysqli_stmt_bind_param($stmt, 'iissis', $_SESSION['userID'], $year, $make, $model, $mileage, $imageName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
       
           header("location:home.php");

        } else {
            // Failure on upload function
            header("location:includes/database_error.php?type=UploadError#error1");
        }
    } else { // failure to pass image checks
        header("location:includes/database_error.php?type=UploadError#error2");
    }
} else {
    header('Location:includes/database_error.php?type=UploadError#error3');
}
?>
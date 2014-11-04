<?php

session_start();
include('config.php');

//this file can include a function that uploads a user image to 
//the image folder
//it should check if the combination of user_id and image_path  
//already exist in the DB, and return a message if so
$target_dir = "../images/";
$target_dir = $target_dir . basename( $_FILES["imagefile"]["name"]);
$uploadOk=1;

// Check if file already exists
if (file_exists('../images/' . $_FILES["imagefile"]["name"])) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($imagefile_size > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_dir)) {
        echo "The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


//and also a function to upload a user profile image
//which will overwrite a profile photo
/*
$target_dir = "../profile_images/";
$target_dir = $target_dir . basename( $_FILES["imagefile"]["name"]);
$uploadOk=1;

// Check if file already exists
if (file_exists('../profile_images/' . $_FILES["imagefile"]["name"])) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($imagefile_size > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_dir)) {
        echo "The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


*/


//and also a function to overwrite a file with the same name after
//an edit

?>

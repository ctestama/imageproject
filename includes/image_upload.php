<?php

session_start();
include('config.php');

//this file can include a function that uploads a user image to 
//the image folder
//it should check if the combination of user_id and image_path  
//already exist in the DB, and return a message if so

function image_upload()
{
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
    } 
    else {
        if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_dir)) {
        
            $imgData = file_get_contents($filename);
            $size = getimagesize($filename);
            mysql_connect("localhost", "$username", "$password");
            mysql_select_db ("images");
            $sql = sprintf("INSERT INTO images
            (image_type, image, image_size, image_name)
            VALUES
            ('%s', '%s', '%d', '%s')",
            mysql_real_escape_string($size['mime']),
            mysql_real_escape_string($imgData),
            $size[3],
            mysql_real_escape_string($_FILES['imagefile']['name'])
            );
            mysql_query($sql);
        
            echo "The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.";
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


//and also a function to upload a user profile image
//which will overwrite a profile photo
function profile_image()
{
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
    } 
    else {
        if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_dir)) {
            //code to insert image into profile
            $imgData = file_get_contents($filename);
            $size = getimagesize($filename);
            mysql_connect("localhost", "$username", "$password");
            mysql_select_db ("profile_images");
            $sql = sprintf("INSERT INTO profile_images
            (image_type, image, image_size, image_name)
            VALUES
            ('%s', '%s', '%d', '%s')",
            mysql_real_escape_string($size['mime']),
            mysql_real_escape_string($imgData),
            $size[3],
            mysql_real_escape_string($_FILES['imagefile']['name'])
            );
            mysql_query($sql);
            
            echo "The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.";
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function edit_overwrite()
{
    //and also a function to overwrite a file with the same name after
    //an edit
    $target_dir = "../images/";
    $target_dir = $target_dir . basename( $_FILES["imagefile"]["name"]);
    $uploadOk=1;

    // Check if file already exists
    /*  NOT SURE IF YOU CAN JUST CALL $_FILES["name"] TO CHECK IF IT HAS THE SAME NAME... */
    if (file_exists('../images/' . $_FILES["name"]) unlink ('../images/' . $_FILES["name"]));

    // Check file size
    if ($imagefile_size > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_dir)) {
        
            $imgData = file_get_contents($filename);
            $size = getimagesize($filename);
            mysql_connect("localhost", "$username", "$password");
            mysql_select_db ("images");
            $sql = sprintf("INSERT INTO images
            (image_type, image, image_size, image_name)
            VALUES
            ('%s', '%s', '%d', '%s')",
            mysql_real_escape_string($size['mime']),
            mysql_real_escape_string($imgData),
            $size[3],
            mysql_real_escape_string($_FILES['imagefile']['name'])
            );
            mysql_query($sql);
        
            echo "The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.";
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

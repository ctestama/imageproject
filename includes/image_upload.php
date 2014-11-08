<?php

session_start();
include('config.php');

//this file can include a function that uploads a user image to 
//the image folder
//it should check if the combination of user_id and image_path  
//already exist in the DB, and return a message if so
if(isset($_FILES["imagefile"])&&isset($_SESSION['LOGIN_STATUS'])&&$_SESSION['LOGIN_STATUS']) {

    $target_dir = "../images/";
    $target_dir = $target_dir . basename( $_FILES["imagefile"]["name"]);
    $uploadOk=1;

    // Check if file already exists
    if (file_exists('../images/' . $_FILES["imagefile"]["name"])) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    $imagefile_size = $_FILES['imagefile']['size'];
    // Check file size
    if ($imagefile_size > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    //Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<div>Your file was not uploaded. Please try again.<a href='../index.php'>Return</a></div>";
    //if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_dir)) {
            echo "<div>The file ". basename( $_FILES["imagefile"]["name"]). " has been uploaded.    <a class='btn btn-primary'href='../index.php'>Return</a></div>";

            if(isset($_SESSION['uid'])) {
                $username = $_SESSION['uid'];
                
                if($uploadOk !=0) {
                if($query_insert_image = $mysqli->prepare("INSERT INTO images (user_id, image_path) VALUES (?, ?)")) {

                    $query_insert_image->bind_param("ss", $username, $target_dir);

                    $query_insert_image->execute();

                } 

                if (mysqli_affected_rows($mysqli) != 1) { 
                    
                    echo "<div>Query Failure.  Please try to upload your image again.</div>";
            
                } 
            
                } else {
                    echo "<div>Query Failure.  Please try to upload your image again.</div>";
                }
            } else {
                echo "<div>Failed to grab your User Id.  Try logging in again.</div>";
            }
        } else {
            echo "<div>Sorry, there was an error uploading your file.</div>";
        }
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

<?php 

session_start();
include('config.php');


if(isset($_FILES["profileimage"])&&isset($_SESSION['LOGIN_STATUS'])&&$_SESSION['LOGIN_STATUS']) {
	$target_dir = "../profile_images/";

	$output = '';

	
	$target_dir = $target_dir . basename( $_FILES["profileimage"]["name"]);
   	$uploadOk=1;
    // Check if file already exists
    if (file_exists('../profile_images/' . $_FILES["profileimage"]["name"])) {
        $output = $output . "<div>Sorry, file already exists.</div>";
        $uploadOk = 0;
    }

    $profileimage_size = $_FILES['profileimage']['size'];
    // Check file size
    if ($profileimage_size > 500000) {
        $output = $output . "<div>Sorry, your file is too large.</div>";
        $uploadOk = 0;
    }
    //Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $output = $output . "<div>Your file was not uploaded. Please try again.</div>";
        //if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["profileimage"]["tmp_name"], $target_dir)) {
            $output = "<div>The file ". basename( $_FILES["profileimage"]["name"]). " has been uploaded. </div>";

            if(isset($_SESSION['profile_image'])) {
				$delete_path = "../profile_images/" . $_SESSION['profile_image'];
				unlink($delete_path);
				unset($_SESSION['profile_image']);

			}
            
            if(isset($_SESSION['uid'])) {
                $username = $_SESSION['uid'];
                if($uploadOk !=0) {
                	if($res=$mysqli->prepare("SELECT * FROM profile_images WHERE user_id=?")) {

				        $res->bind_param("s", $username);
				        $res->execute();
				        $res->store_result();
				        $checkimgs=$res->num_rows();					    
					   
					} else {
				    	$output = "<div>Failed to insert your image.  Try again.</div>";
				    	$checkUser = 0;
				    }

				    if ($checkimgs >=1) {
				    	if($update=$mysqli->prepare("UPDATE profile_images SET image_path=? WHERE user_id=?")) {

					        $update->bind_param("ss", $target_dir, $username);
					        $update->execute();

					      	if(mysqli_affected_rows($mysqli)!=1) {
					      		$output = "<div>Query Failure. Please try to upload your image again.</div>";
					      	} else {
					      		$_SESSION['profile_image'] = $target_dir;
					      	}
				        } else {
				        	$output = "<div>Failed to insert your image.  Try again.</div>";
				        }

				    } else {
					    	if($query_insert_image = $mysqli->prepare("INSERT INTO profile_images (user_id, image_path) VALUES (?, ?)")) {
                            	$query_insert_image->bind_param("ss", $username, $target_dir);
                            	$query_insert_image->execute();
                        	}

                        	if (mysqli_affected_rows($mysqli) != 1) {
                            	$output = "<div>Query Failure. Please try to upload your image again.</div>";
                        	} else {
					      		$_SESSION['profile_image'] = $target_dir;
					      	}
				    	
					} 
        		} else {"<div>Failed to insert your image.  Try again.</div>";} 
    		} else {$output = "<div>Failed to get your User ID.  Try again.</div>";}
    	} else {$output = "<div>Failed to insert your image.  Try again.</div>";}
	}

	
} else {$output = "<div>You are not logged in.  Try again.</div>";}


echo $output . "<a href='../index.php'>Return</a>";


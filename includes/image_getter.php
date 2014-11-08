<?php
//need to include the database configuration and mysqli object
include('config.php');


if(isset($_SESSION['LOGIN_STATUS'])&&$_SESSION['LOGIN_STATUS']&&isset($_SESSION['uid'])) {
	$user_id = $_SESSION['uid'];
	echo "<div class='col-md-12'><div>Your Images</div>";
	imageGetter($mysqli, $user_id);
	echo "</div>";
} else {
	echo "<div>Sorry! We had trouble retrieving your images.  Try logging in again.</div>";
}



function imageGetter($mysqli, $uid) {
		
		//***MAY NEED FIXING***execute the SQL query and return records,in this case the image data.
	if($res=$mysqli->prepare("SELECT * FROM images WHERE user_id=?")) {

        $res->bind_param("s", $uid);
        $res->execute();
        $res->store_result();
        $checkimgs=$res->num_rows();
        $res->bind_result($image_id, $user_id, $image_path, $date);
   
	} else {
    	$output = "Query failure";
    	$checkUser = 0;
    }

    if ($checkimgs >=1) {
    	for($i=0; $i<$checkimgs; $i++) {
    		$row = $res->fetch();
    		$image_name = substr($image_path, 10);
    		$image_uri = substr($image_path, 3);
    		echo "<div><a class='btn btn-warning' onClick=image_grab('".$image_uri."');>".$image_name."</a></div>";
    	}

    } else {
    	echo "<div>You do not have any images uploaded.</div>";
    }
	
	
}






















?>
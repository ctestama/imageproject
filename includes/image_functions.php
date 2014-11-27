
<?php
//function to return the images
function imageGetter($mysqli, $uid) {
    $image_id=NULL;
    $image_name=NULL;
    $image_uri=NULL;
    $user_id=NULL;
    $image_path="../images/some_test";
    $date=NULL;
		
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
    		echo "<div class='col-md-2'><a id='my_img".$i."' class='btn btn-warning' onClick=image_grab('".$image_uri."');>".$image_name."</a></div>";
    	}

    } else {
    	echo "<div>You do not have any images uploaded.</div>";
    }
}



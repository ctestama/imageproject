<?php
//need to include the database configuration and mysqli object
include('config.php');
include('image_functions.php');

if(isset($_SESSION['LOGIN_STATUS'])&&$_SESSION['LOGIN_STATUS']&&isset($_SESSION['uid'])) {
	$user_id = $_SESSION['uid'];
	echo "<div class='col-md-12'><div>Your Images</div>";
	imageGetter($mysqli, $user_id);
	echo "</div>";
} else {
	echo "<div>Sorry! We had trouble retrieving your images.  Try logging in again.</div>";
}























?>
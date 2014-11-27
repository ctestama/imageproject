<?php
//need to include the database configuration and mysqli object
include('config.php');
include('image_functions.php');

if(isset($_SESSION['LOGIN_STATUS'])&&$_SESSION['LOGIN_STATUS']&&isset($_SESSION['uid'])) {
	$user_id = $_SESSION['uid'];
	echo "<div id='image_panel' class='panel panel-default'><div class='panel-heading'>Your Images</div>
	<div class='panel-body'>";
	imageGetter($mysqli, $user_id);
	echo "</div>
	</div>";
} else {
	echo "<div>Sorry! We had trouble retrieving your images.  Try logging in again.</div>";
}























?>
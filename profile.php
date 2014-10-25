<?php
$greeting = '';

if(isset($_SESSION['LOGIN_STATUS'] )&& $_SESSION['LOGIN_STATUS']) {
	$logged_in = $_SESSION['LOGIN_STATUS'];
	$greeting = 'Welcome ' . $_SESSION['fname'];
	
} else {
	$logged_in = FALSE;
}


?>

<div class="row" id="header">
	
	<div class="col-md-4">
	Capture
	</div>
	<div class="col-md-4">
	<?php 	
		if($logged_in) {
			echo '<a href="upload_an_image.php" class="btn btn-primary">Upload an image</a>';
			echo '<span>' . $greeting . '</span>';
			echo '</div>';
			echo '<div class="col-md-4">';
			echo '<a onclick="logout()" class="btn btn-primary">Logout</a>';			
			echo '</div>';
 		} else {
 			echo '<p>You are not logged in.</p>';
 		}
	?>
	
</div>
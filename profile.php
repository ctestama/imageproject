<?php
$greeting = '';

if(isset($_SESSION['LOGIN_STATUS'] )&& $_SESSION['LOGIN_STATUS']) {
	$logged_in = $_SESSION['LOGIN_STATUS'];
	$greeting = 'Welcome ' . $_SESSION['fname'];
	$uid = $_SESSION['uid'];
} else {
	$logged_in = FALSE;
}


?>

<div class="row">
	<div class="col-md-12" id="header">
		Capture
		<?php 

			if($logged_in) {
				echo '<a id ="logout" onclick="logout()" class="btn btn-primary">Logout</a>';
			}	
		?>
	</div>
	
	<div class="col-md-6">
	<?php 	
		if($logged_in) {
			echo '<a href="upload_an_image.php" id="image_button" class="btn btn-primary">Upload an image</a>';
			
			echo '</div>';
			echo '<div class="col-md-6">';
				echo '<div class = "jumbotron" id="greeting">' . $greeting . '</div>';			
			echo '</div>';
 		} else {
 			echo '<p>You are not logged in.</p>';
 		}
	?>
	
</div>

<div class="row" id="user_images">


<?php 
	if(isset($uid)) {
		include("includes/image_getter.php"); 
	}
?>


</div>
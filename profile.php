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
		The Emerald
		<?php 

			if($logged_in) {
				echo '<a id ="logout" onclick="logout()" class="btn btn-primary">Logout</a>';
			}	
		?>
	</div>
</div>	
<div class="container">
	<div class="col-md-12" id="edit_container">
		<div class="slide_container">
			<input style="width: 250px" type="text" id="img_slide" class="span2" value="" data-slider-min="-50" 
			data-slider-max="50" data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal" data-slider-selection="after"data-slider-tooltip="hide">
			<hr>	
			<input type="text" id="slide_view">
			<a class="btn btn-primary" onclick="saveBright()">Save that sucka</a>
			</div>
			
				<div id="can_wrap">
					<canvas id="image_pop">
					</canvas>
				</div>
		</div>

	<div class="col-md-6">
	<?php 	
		if($logged_in) {
			echo '<a href="upload_an_image.php" id="image_button" class="btn btn-primary">Upload an image</a>';
			
			echo '</div>';
			echo '<div class="col-md-6">';
				echo '<div class ="panel panel-success">';
					echo '<div class="panel-heading" id="greeting">' . $greeting . '</div>';
						echo '<div class="panel-body" id="profile">';
							echo '<div id="profile_image_div">';

							if (isset($_SESSION['profile_image'])) {
								$profile_src = substr($_SESSION['profile_image'], 3);
								echo '<img id="profile_img" src="'.$profile_src.'" />';
							} 

							echo '</div>';
							echo '<form action="includes/profile_image_upload.php" enctype="multipart/form-data" method="post">
										<p>
												 <label>Upload or change your profile image: </label>
												<input class="btn btn-primary" type="file" name="profileimage" size="40">
										</p>
										<div>
												<input class="btn btn-success" id="image_submit" type="submit" value="Upload">
										</div>
									</form>
								</div>';	
					echo '</div>';		
			echo '</div>';
 		} else {
 			echo '<p>You are not logged in.</p>';
 		}
	?>

	<div class="col-md-12" id="user_images">


		<?php 
			if(isset($uid)) {
				include("includes/image_getter.php"); 
			}
		?>


	</div>
</div>
<!DOCTYPE html>

<?php 
    if(!isset($_SESSION)) { 
        session_start(); 
    } 

    if(isset($_SESSION['LOGIN_STATUS'])&&$_SESSION['LOGIN_STATUS']) {
    	$logged_in = TRUE;
    } else {
    	$logged_in = FALSE;
    }

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div id="image_upload" class="container-fluid">
    <div class="row">
    	<div class="col-md-12" id="login_head">
		Capture
		<?php 

			if($logged_in) {
				echo '<a id ="logout" onclick="logout()" class="btn btn-primary">Logout</a>';
			}	
		?>
		</div>
        
		<div class="col-md-12">
		<?php 

			if($logged_in) {
				echo '<form action="includes/image_upload.php" enctype="multipart/form-data" method="post">
						<p>
								Choose an image file:<br>
								<input type="file" name="imagefile" size="40">
						</p>
						<div>
								<input id="image_submit" type="submit" value="Upload">
						</div>
					</form>';
			} else {
				echo '<div class="alert alert-danger">You must log in to see this page.
				<a class="btn btn-warning" href="index.php">Login</a></div>';
			}	
		?>


		</div>

    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom_colton.js"></script>
  </body>
</html>



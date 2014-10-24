<?php

$greeting = '';

if(isset($_SESSION['LOGIN_STATUS']) && isset($_SESSION['EMAIL'])) {
	$logged_in = $_SESSION['LOGIN_STATUS'];
	$email = $_SESSION['EMAIL'];
} else {
	$_SESSION['LOGIN_STATUS'] = FALSE;
}


?>

<div class="row">
	<div class="col-md-12">
	<a onclick="logout()" class="btn btn-primary">Logout</a>
	</div>
</div>
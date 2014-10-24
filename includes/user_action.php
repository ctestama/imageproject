<?php
include('config.php');
include('user_functions.php');

$error = array();

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    
    if($action=='logout') {
    	logout();

    } else if ($action == 'register') {

    	if (empty($_POST['fname'])) {
        	$error[] = 'Please Enter a Firstname ';
    	} else {
        	$fname = $_POST['fname'];
    	}

    	if (empty($_POST['lname'])) { 
        	$error[] = 'Please Enter a Lastname ';
		} else {
		    $lname = $_POST['lname'];
		}

		if (empty($_POST['email'])) {
		    $error[] = 'Please Enter your Email ';
		} else {

        	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
           //regular expression for email validation
            	$email = $_POST['email'];
        	} else {
             	$error[] = 'Your Email Address is invalid  ';
        	}

    	}

	    if (empty($_POST['password'])) {
	        $error[] = 'Please Enter Your Password ';
	    } else {
	        $password = $_POST['password'];
	    }

	    $errorTest = errorCheck($error);
	    if($errorTest=='Success') {
	    	$registration = register($mysqli, $fname, $lname, $email, $password);
	    } else {
	    	echo $errorTest;
	    }

	} else if($action == 'login') {
		
    	if(isset($_POST['email']) && !empty($_POST['email'])){
    		$email=($_POST['email']);

		}else{
    		$error[]='Please enter username';
		}

		if(isset($_POST['password']) && !empty($_POST['password'])){
    		$password=($_POST['password']);

		}else{
    		$error[]='Please enter password';
		}

		$errorTest = errorCheck($error);

		if($errorTest=='Success') {
			$verify = login($mysqli, $email, $password);
			echo $verify;
		} else {
			echo $errorTest;
		}


    }
	


} else {
	
}
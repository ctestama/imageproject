<?php

function errorCheck($error) {
	$output = '';
	if(!empty($error)) {

       	$output .= '<div class="error_messages"> <ol>';
        foreach($error as $key => $values) {
        	$output .= '	<li>'.$values.'</li>';
		}
        $output .= '</ol></div>';
	} else {
		$output = "Success";
	}
	return $output;	
}

/**
 * This returns an encrypted string
 */
function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}


/**
 * Function to return decrypted string
 */
function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}


function register($mysqli, $fname, $lname, $email, $password) {
	$output = '';
	if ($stmt = $mysqli->prepare( "SELECT email FROM users WHERE email = ?")) {

	    $stmt->bind_param("s", $email);
	    $stmt->execute();
	    $stmt->store_result();
        $numba = $stmt->num_rows();

        if ($numba == 0) {
        
        } else {

            $output= "The email already exists.";
        } 
    
    } else {
        $output= 'Email Check Failed';
    }

    //If no errors occurred
    if($output =='') { 
       	
        //encrypt the password.  This function is defined in functions.php
        $pass_encrypt = encrypt($password, ENCRYPTION_KEY);

        if($query_insert_user = $mysqli->prepare("INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)")) {

            $query_insert_user->bind_param("ssss", $fname, $lname, $email, $pass_encrypt);

            $query_insert_user->execute();

        } 
                                                                        
        //if user insertion was successful
        if (mysqli_affected_rows($mysqli) == 1) { 
        	$output = login($mysqli, $email, $password);
        
        } else { 
        	$output = "Failed to insert user.";

        }
        
    }

   	mysqli_close($mysqli);
   	return $output;
}

function login($mysqli, $email, $password) {
	$output = '';
	$pass_encrypted = encrypt($password, ENCRYPTION_KEY);

    if($res= $mysqli->prepare("SELECT * FROM users WHERE email=? AND password=?")) {

        $res->bind_param("ss", $email, $pass_encrypted);
        $res->execute();
        $res->store_result();
        $checkUser=$res->num_rows();

    } else {
    	$output = "Query failure";
    	$checkUser = 0;
    }

    if($checkUser >=1) {
    	$_SESSION['LOGIN_STATUS'] = TRUE;
    	$_SESSION['EMAIL'] = $email;
    	//$row = $res->fetch_assoc();
    	//$_SESSION['UID'] = $row['user_id'];
    	$output = "Success";
    } else {
    	$output= "Authentication Failed";
    }

    mysqli_close($mysqli);
    return $output;	   
}		

function logout() {
	session_start();
  	session_destroy();
  	return "Success";
}



?>
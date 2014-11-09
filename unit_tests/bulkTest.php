<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once "$root/includes/user_functions.php";
require_once "$root/vendor/autoload.php";


class unitTest extends PHPUnit_Framework_TestCase
{
	
	
	//tests the imageGetter() function
	function testImageGetter()
	{
		//This is the function that simply echos back the images.  Again I don't know what to compare
		//or assert here so IDK what to do.
	}
	
	//tests the encrypt($pure_string, $encryption_key) function
	function testEncryptDecrypt()
	{
		$string = '123';
		$encryption_key = "_@#$)^@*&";
		
		$result = encrypt($string, $encryption_key);
		$notexpected = '123';	//we don't want the same string coming back
		$this->assertTrue($result != $notexpected);

		$result2 = decrypt($result, $encryption_key);
		$expected = $string;
		$this->assertTrue($expected == $result2);
		
	}
	

	//tests the register($mysqli, $fname, $lname, $email, $password) function
	function testRegister()
	{
		//havent done this one yet.  What would a failed register be?
	}
	
	//tests the login($mysqli, $email, $password) function
		//this one was made for your login.  I take it you know what your email/pword is.  I do not
		//so this should return false as it will not be your email/pword.
		//The second part is for the correct login email/pword.  I'll need you to fill that in
	function testLogin()
	{	
		
		//test 1 - failed login
		$email = 'thisIsWrong@cox.net';
		$password ='thisIsAlsoWrong';
		
		$result = login($mysqli, $email, $password);
		$expected = 'Authentication Failed';
		$this->assertTrue($result == $expected);
		
		//test 2 - successful login; will need your help to finish
		$email = 'YOUR CORRECT EMAIL HERE';  //add your correct email in place of the string
		$password = 'YOUR CORRECT PASSWORD HERE';  //add your correct password in place of the string
		
		$result = login($mysqli, $email, $password);
		$expected = 'Success';
		$this->assertTrue($result == $expected);
		
	}
	
	//tests the logout() function
	function testLogout()
	{
		$result = logout();
		$expected = 'Success';
		$this->assertTrue($result == $expected);
		
	}
}
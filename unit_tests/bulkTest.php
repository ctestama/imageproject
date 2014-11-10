<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once "$root/includes/user_functions.php";
require_once "$root/vendor/autoload.php";


class unitTest extends PHPUnit_Framework_TestCase
{
	
	
	//tests the imageGetter() function
	function testImageGetter()
	{
		
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
		
	}
	
	//tests the login($mysqli, $email, $password) function
	function testLogin()
	{	
		$host = "localhost";
		//$host = "yourserver.net";
		$username = "root"; //username for database here
		$password = "colt"; //password for database here
		$database =  "capture"; //name of your database here
		$mysqli= new mysqli($host, $username, $password, $database); 
		//test 1 - failed login
		$email = 'thisIsWrong@cox.net';
		$password ='thisIsAlsoWrong';
		
		$result = login($mysqli, $email, $password);
		$expected = 'Authentication Failed';
		$this->assertTrue($result == $expected);
		
		//test 2 - successful login; will need your help to finish
		$email = 'colt@asu.edu';  //add your correct email in place of the string
		$password = 'root';  //add your correct password in place of the string
		
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

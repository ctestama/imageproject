<?php

require_once '../includes/image_getter.php';
require_once '../includes/user_functions.php';;
//require_once 'PHPUnit.php';

class unitTest extends PHPUnit_Framework_TestCase
{
	//object handling?
	
	//(code here) //needs finished
	
	//constructor of the test suite
	function unitTest($name) 
	{
		$this->PHPUnit_TestCase($name);
	}
	
	// called before the test functions will be executed
    // this function is defined in PHPUnit_TestCase and overwritten
    // here
	function setUp() 
	{
		//creates a new instance of variables to be used in the test functions
		
		
	}
	
	// called after the test functions are executed
    // this function is defined in PHPUnit_TestCase and overwritten
    // here
	function tearDown()
	{
		//delete the instance variables
		
	}
	
	//---Tests here---
	
	//tests the imageGetter() function
	function testImageGetter()
	{
		//This is the function that simply echos back the images.  Again I don't know what to compare
		//or assert here so IDK what to do.
	}
	
	//tests the errorCheck($error) function
		//think you said we dont need this one but I added a skeleton for it anyways
		//remove if we dont need.
	function testErrorChecker()
	{
		
	}
	
	//tests the encrypt($pure_string, $encryption_key) function
	function testEncrypt()
	{
		$string = new String('123');
		$encryption_key = "_@#$)^@*&";
		
		$result = encrypt($string, $encryption_key);
		$expected = new String('whatever 123 encrypted is');	//I dont know what 123 would be encrypted so I don't know what to put here!
		$this->assertTrue($result == $expected);
		
	}
	
	//tests the decrypt($encrypted_string, $encryption_key) function
	function testDecrypt()
	{
		$encrypted_string = new String('whatever 123 encrypted is');   //string value needs fixed!
		$encryption_key = "_@#$)^@*&";
		
		$result = decrypt($encrypted_string, $encryption_key);
		$expected = new String('123');
		$this->assertTrue($result == $expected);
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
		$host = "localhost";
		//$host = "yourserver.net";
		$username = "root"; //username for database here
		$password = "colt"; //password for database here
		$database =  "capture"; //name of your database here
		
		$mysqli = new mysqli($host, $username, $password, $database);
		
		//test 1 - failed login
		$email = new String('thisIsWrong@cox.net');
		$password = new String('thisIsAlsoWrong');
		
		$result = login($mysqli, $email, $password);
		$expected = new String('Authentication Failed');
		$this->assertTrue($result == $expected);
		
		//test 2 - successful login; will need your help to finish
		$email = new String('YOUR CORRECT EMAIL HERE');  //add your correct email in place of the string
		$password = new String('YOUR CORRECT PASSWORD HERE');  //add your correct password in place of the string
		
		$result = login($mysqli, $email, $password);
		$expected = new String('Success');
		$this->assertTrue($result == $expected);
		
	}
	
	//tests the logout() function
	function testLogout()
	{
		$results = logout();
		$expected = new String('Success');
		$this->assertTrue($result == $expected);
		
	}
}
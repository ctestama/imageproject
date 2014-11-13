<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/includes/user_functions.php";
require_once "$root/vendor/autoload.php";
require_once "$root/includes/config.php";


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

		$result = encrypt('encryptedpass', ENCRYPTION_KEY);
		$mockedDbConnection = \Mockery::mock('mysqli');
		$mockedStatement = \Mockery::mock('mysqli_stmt');

        $mockedDbConnection
            ->shouldReceive('prepare')
            ->with('SELECT * FROM users WHERE email=? AND password=?')
            ->andReturn($mockedStatement);

        $mockedStatement
            ->shouldReceive('bind_param')
            ->with("ss", 'dummymail@asu.edu', $result)
            ->andReturn(TRUE);

        $mockedStatement
            ->shouldReceive('execute')
            ->andReturn(TRUE);

        $mockedStatement
            ->shouldReceive('store_result')
            ->andReturn(TRUE);

        $mockedStatement
            ->shouldReceive('num_rows')
            ->andReturn(1);

        $mockedStatement
        	->shouldReceive('bind_result')
        	->with($user_id=NULL, $fname=NULL, $lname=NULL, 
        	$email='dummymail@asu.edu', $pword=NULL)
        	->andReturn(TRUE);

        $mockedRows = array(
            array('headline' => 'First headline')
        );

        /*$mockedStatement
            ->shouldReceive('fetch')
            ->andReturnUsing(function () use (&$mockedRows) {
                $row = current($mockedRows);
                next($mockedRows);
                return $row;
            });*/

		//test 1 - failed login
		$email = 'dummymail@asu.edu';
		$password ='encryptedpass';
		
		$result = login($mockedDbConnection, $email, $password);
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

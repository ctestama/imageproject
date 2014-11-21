<?php
define("ENCRYPTION_KEY", "_@#$)^@*&");
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/includes/user_functions.php";
require_once "$root/includes/image_functions.php";
require_once "$root/vendor/autoload.php";


class unitTest extends PHPUnit_Framework_TestCase
{
	
	
	//tests the imageGetter() function
	function testImageGetter()
	{	
		//case 1, successful image get
		$uid ='testid';

		$mockedDbConnection = \Mockery::mock('mysqli');
		$mockedStatement = \Mockery::mock('mysqli_stmt');

        $mockedDbConnection
            ->shouldReceive('prepare')
            ->with('SELECT * FROM images WHERE user_id=?')
            ->andReturn($mockedStatement);

        $mockedStatement
            ->shouldReceive('bind_param')
            ->with("s", $uid)
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
        	->with(NULL, NULL, '../images/some_test', NULL)
        	->andReturn(TRUE);

       	$mockedStatement
        	->shouldReceive('fetch')
        	->andReturn(TRUE);
		$this->expectOutputString("<div><a class='btn btn-warning' onClick=image_grab('images/some_test');>some_test</a></div>");
		imageGetter($mockedDbConnection, $uid);
	}
	
	//tests the encrypt($pure_string, $encryption_key) function
	function testEncryptDecrypt()
	{
		$string = "testpass";
		
		$result = encrypt($string, ENCRYPTION_KEY);
		$notexpected = "testpass";	//we don't want the same string coming back
		$this->assertTrue($result != $notexpected);

		$result2 = decrypt($result, ENCRYPTION_KEY);
		$expected = $string;
		$this->assertTrue($expected == $result2);
		
	}
	

	//tests the register($mysqli, $fname, $lname, $email, $password) function
	function testRegister()
	{	

		//test 1 - failed register (email alread exists)
		$email = 'dummymail@asu.edu';
		$password ='encryptedpass';

		$mockedDbConnection = \Mockery::mock('mysqli');
		$mockedStatement = \Mockery::mock('mysqli_stmt');

        $mockedDbConnection
            ->shouldReceive('prepare')
            ->with("SELECT email FROM users WHERE email = ?")
            ->andReturn($mockedStatement);

        $mockedStatement
            ->shouldReceive('bind_param')
            ->with("s", 'dummymail@asu.edu')
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

        $result = register($mockedDbConnection, 'Colton', 
        	'Testamarck', $email, $password);
        $expected = "The email already exists.";
        $this->assertTrue($result == $expected);

	}
	
	//tests the login($mysqli, $email, $password) function
	function testLogin()
	{	
		
		//test 1 - successful login
		$email = 'dummymail@asu.edu';
		$password ='encryptedpass';

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

        $mockedStatement
        	->shouldReceive('fetch')
        	->andReturn(TRUE);

        $mockedStatement2 = \Mockery::mock('mysqli_stmt');

       	$mockedDbConnection
            ->shouldReceive('prepare')
            ->with('SELECT * FROM profile_images WHERE user_id=?')
            ->andReturn($mockedStatement2);

        $mockedStatement2
            ->shouldReceive('bind_param')
            ->with("s", NULL)
            ->andReturn(TRUE);

        $mockedStatement2
            ->shouldReceive('execute')
            ->andReturn(TRUE);

        $mockedStatement2
            ->shouldReceive('store_result')
            ->andReturn(TRUE);

        $mockedStatement2
            ->shouldReceive('num_rows')
            ->andReturn(1);

        $mockedStatement2
        	->shouldReceive('bind_result')
        	->with(NULL, NULL, NULL, NULL)
        	->andReturn(TRUE);

       	$mockedStatement2
        	->shouldReceive('fetch')
        	->andReturn(TRUE);

        $mockedDbConnection
            ->shouldReceive('close')
            ->andReturn(TRUE);

		
		
		$result = login($mockedDbConnection, $email, $password);
		$expected = 'Success';
		$this->assertTrue($result == $expected);

		//TEST 2-- FAILED LOGIN

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

        $mockedStatement
        	->shouldReceive('fetch')
        	->andReturn(TRUE);

        $mockedStatement2 = \Mockery::mock('mysqli_stmt');

       	$mockedDbConnection
            ->shouldReceive('prepare')
            ->with('SELECT * FROM profile_images WHERE user_id=?')
            ->andReturn($mockedStatement2);

        $mockedStatement2
            ->shouldReceive('bind_param')
            ->with("s", NULL)
            ->andReturn(TRUE);

        $mockedStatement2
            ->shouldReceive('execute')
            ->andReturn(TRUE);

        $mockedStatement2
            ->shouldReceive('store_result')
            ->andReturn(TRUE);

        $mockedStatement2
            ->shouldReceive('num_rows')
            ->andReturn(0);

        $mockedStatement2
        	->shouldReceive('bind_result')
        	->with(NULL, NULL, NULL, NULL)
        	->andReturn(TRUE);

       	$mockedStatement2
        	->shouldReceive('fetch')
        	->andReturn(TRUE);

        $mockedDbConnection
            ->shouldReceive('close')
            ->andReturn(TRUE);

		
		$result = login($mockedDbConnection, $email, $password);
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

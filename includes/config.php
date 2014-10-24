<?php
//config file for database variable
//you'll need to include this file for any PHP scripts which interface with database

if ('config.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Do not load this page directly');

$host = "localhost";
//$host = "yourserver.net";
$username = "root"; //username for database here
$password = "colt"; //password for database here
$database =  "capture"; //name of your database here

$mysqli= new mysqli($host, $username, $password, $database); 
               
if(mysqli_connect_errno()) {
	echo "Connection Failed: " . mysqli_connect_errno();
	exit();
} 

define('WEBSITE_URL', 'http://localhost');
define("ENCRYPTION_KEY", "_@#$)^@*&");





?>
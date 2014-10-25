<?php
session_start();

//need to include the database configuration and mysqli object
include('config.php');


//we need a function in here to grab images for the database and output as a list of links to the images
//will need to get the user_id variable from a post

if(isset($_GET['uid']) {
	$uid = $_GET['uid'];  //this will be the users uid, passed to this document by the url ->  localhost/includes/image_getter?uid=(user id # here)

}

//you'll need to pass in the mysqli database connection to any function that needs to interface with database

function imageGetter($mysqli, $uid)





}





















?>
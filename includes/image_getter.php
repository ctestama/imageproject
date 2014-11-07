<?php
//need to include the database configuration and mysqli object
include('config.php');


//we need a function in here to grab images for the database and output as a list of links to the images
//will need to get the user_id variable from a post

//you'll need to pass in the mysqli database connection to any function that needs to interface with database

function imageGetter($mysqli, $uid) {
	//This checks if the user exists and stores the data in the $result variable if the user exists
		//$hostname = "localhost";
		
		//connection to the DB
		$dbhandle = mysqli_connect($mysqli)
		or die("Unable to connect to MySQLi");
	
		//selects the user DB to work with
		$selected = mysqli_select_db("user", $dbhandle)
		or die("Could not select user database.");
	
		//execute the SQL query and return records
		$result = mysqli_query("SELECT user_id FROM user WHERE user_id='$uid' ");
	
	
	
	if (mysqli_num_rows($result) != 0)
	{
		//selects the image DB to work with
		$imageSelected = mysqli_select_db("image", $dbhandle)
		 or die("Could not select image database.");
		
		//***MAY NEED FIXING***execute the SQL query and return records,in this case the image data.
		$imageresult = mysqli_query("SELECT * FROM image Where user_id='$uid' ");
		
		
		if (mysqli_num_rows($imageresult) != 0)
		{
			//***NEEDS FIXED***code to create a list of images to display here
			/*I need to fix the parameters in the next line and the following lines below it need modified 
			to fit our code but the concept is to create a list from the $imageresults query and then to 
			print the images from the list to the webpage.  I may be wrong with the print part though.  Sorry 
			for not having this done and thanks again for helping me fix this :D.  I will also try to fix it tonight,
			but will check with if you've fixed it before pushing anything first*/
			list($name, $type, $size, $content) =  mysql_fetch_row($imageresult);
			header("Content-Disposition: attachment; filename=\"$name\"");
			header("Content-type: $type");
			header("Content-length: $size");
			print $content;
		}
		else
		{
			echo "The user has no images.";
		}
		
	}
	else
	{
		echo "The user does not exist.";
	}
	
	//closes the connection to the DB
	mysql_close($dbhandle);
	
	//may have the return variable wrong or may not need it.  Thanks again!
	return $list;
	
}




}





















?>
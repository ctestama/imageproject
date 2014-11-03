<?php
function loadUserImages( $UID, $UPW)
{
	//This checks if the user exists and stores the data in the $result variable if the user exists
		$hostname = "localhost";
		
		//connection to the DB
		$dbhandle = mysql_connect($hostname, $UID, $UPW)
		or die("Unable to connect to MySQL");
	
		//selects the user DB to work with
		$selected = mysql_select_db("user", $dbhandle)
		or die("Could not select user database.");
	
		//execute the SQL query and return records
		$result = mysql_query("SELECT id FROM user WHERE id='$UID' ");
	
	
	
	if (mysql_num_rows($result) != 0)
	{
		//selects the image DB to work with
		$imageSelect = mysql_select_db("image", $dbhandle)
		 or die("Could not select image database.");
		
		//execute the SQL query and return records
		$imageresult = mysql_query("SELECT image FROM image Where user_id='$UID' ");
		
		
		if (mysql_num_rows($imageresult) != 0)
		{
			//code to create a list of images to display here
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
	
	return $List;
	
}
?>
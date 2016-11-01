<?php
	$conn;

	error_reporting(-1); // display all faires
	ini_set('display_errors', 1);  // ensure that faires will be seen
	ini_set('display_startup_errors', 1); // display faires that didn't born
	
	function ConnectDB($username, $password, $dbname)
	{
		$servername = "localhost";
		if($dbname == '')
		{
			$dbname = 'hb_web';
		}
		
		// Create connection
		try{
			$GLOBALS["conn"] = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($GLOBALS["conn"]->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
?>
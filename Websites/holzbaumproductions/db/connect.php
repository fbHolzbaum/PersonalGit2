<?php

	error_reporting(-1); // display all faires
	ini_set('display_errors', 1);  // ensure that faires will be seen
	ini_set('display_startup_errors', 1); // display faires that didn't born
	
	$global_conn;
	
	function ConnectDB($username, $password, $dbname)
	{
		$servername = "localhost";
		if($dbname == '')
		{
			$dbname = 'hb_web';
		}
		
		// Create connection
		try{
			$GLOBALS['global_conn'] = new mysqli($servername, $username, $password, $dbname);
		}
		catch(Exception $e)
		{
			throw new Exception($e);
			$GLOBALS['global_conn'] = null;
		}
	}
?>
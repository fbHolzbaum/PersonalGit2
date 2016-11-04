<?php

	error_reporting(-1); // display all faires
	ini_set('display_errors', 1);  // ensure that faires will be seen
	ini_set('display_startup_errors', 1); // display faires that didn't born

	include('/etc/web/dbinf.php');
	include('../db/connect.php');
	
	/*function CheckUserExists($user)
	{	
		$conn_user = ConnectDB($GLOBALS['userWrite'], $GLOBALS['pwWrite'], $GLOBALS['db_web']);
		if($query = $conn_user->prepare("SELECT * FROM web_user WHERE user = ?"))
		{
			$query->bind_param('s', $user);
			
			if (!$stmt->execute()) {
			    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			
			$result = $stmt->get_result();
			mysqli_close($conn_user);
			
			return $result->num_rows;
		}		
	}
	*/

	function CreateUser($user, $pw, $salt, $role_id)
	{
		$conn_user2 = ConnectDB($GLOBALS['userWrite'], $GLOBALS['pwWrite'], $GLOBALS['db_web']);
		$conn_user2->prepare("INSERT INTO web_user (user, password, salt, role_id, active) VALUES (?, ?, ?, ?, 0)");

		
		if (!$stmt->bind_param('sssi', $user, $pw, $salt, $role_id)) {
		    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		
		if (!$stmt->execute()) {
		    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		
		$result = $stmt->get_result();
		echo $result;
	}
?>
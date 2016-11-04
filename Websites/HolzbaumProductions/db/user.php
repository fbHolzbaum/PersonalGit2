<?php

	error_reporting(-1); // display all faires
	ini_set('display_errors', 1);  // ensure that faires will be seen
	ini_set('display_startup_errors', 1); // display faires that didn't born

	
	function CheckUserExists($u)
	{	
		$query = 'SELECT * FROM web_user WHERE user = ?';
		$stmt = mysqli_stmt_init($GLOBAL['global_conn']);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, "s", $u);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_bind_result($stmt, $result);
		mysqli_stmt_fetch($stmt);
		
		return $result;	
	}

	function CreateUser($u, $pw, $salt, $role_id)
	{
		$query = 'INSERT INTO web_user (user, password, salt, role_id, active) VALUES (?, ?, ?, ?, 0)';
		$stmt = mysqli_stmt_init($GLOBAL['global_conn']);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, "sssi", $u, $pw, $salt, $role_id);
		mysqli_stmt_execute($stmt);

		mysqli_stmt_bind_result($stmt, $result);
		mysqli_stmt_fetch($stmt);
	}
?>
<?php

	error_reporting(-1); // display all faires
	ini_set('display_errors', 1);  // ensure that faires will be seen
	ini_set('display_startup_errors', 1); // display faires that didn't born


	function CreateUser($u, $pw, $salt, $role_id)
	{
		$query = 'INSERT INTO web_user (user, password, salt, role_id, active) VALUES (?, ?, ?, ?, 0)';
		$stmt = mysqli_stmt_init($GLOBALS['global_conn']);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, "sssi", $u, $pw, $salt, $role_id);
		if(!mysqli_stmt_execute($stmt))
		{
			echo "User creation didn't work.";
		}
	}
	
	function CheckUser($user)
	{
		$query = 'SELECT COUNT(user) FROM web_user WHERE user = ?';
		$stmt = mysqli_stmt_init($GLOBALS['global_conn']);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, 's', $user);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_bind_result($stmt, $result);
		mysqli_stmt_fetch($stmt);
		return $result;
	}
	
	//Returns the salt of a user
	function GetSalt($user)
	{
		$query = 'SELECT salt FROM web_user WHERE user = ?';
		$stmt = mysqli_stmt_init($GLOBALS['global_conn']);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, 's', $user);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_bind_result($stmt, $result);
		mysqli_stmt_fetch($stmt);
		
		return $result;
	}
	
	function CheckUserAndPassword($user, $pw)
	{
		$query = 'SELECT COUNT(user) FROM web_user WHERE user = ? AND password = ?';
		$stmt = mysqli_stmt_init($GLOBALS['global_conn']);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, 'ss', $user, $pw);
		mysqli_stmt_execute($stmt);
		
		mysqli_stmt_bind_result($stmt, $result);
		mysqli_stmt_fetch($stmt);
		
		return $result;
	}
	
	function LogInSession($user)
	{
		$query = 'SELECT web_roles.role FROM web_roles
					INNER JOIN web_user
					ON web_roles.id=web_user.role_id
					WHERE web_user.user=?';
		$stmt = mysqli_stmt_init($GLOBALS['global_conn']);
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, 's', $user);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $result);
		mysqli_stmt_fetch($stmt);
		
		$_SESSION["user"] = $user;
		$_SESSION["role"] = $result;
	}
	
?>
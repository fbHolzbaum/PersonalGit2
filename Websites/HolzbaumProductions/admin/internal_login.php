<?php
// Start the session
session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css">
		
		<meta name="google-site-verification" content="m_MrwqiGrd2ZeLuK7r3dUZv3cFSUoUbiiLwFD6Dh16I" /> <!-- Used for Google Email -->
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- This line is needed for responsive design to work on mobile phones -->
		<link rel="stylesheet" href="../css/style1800.css" media="screen and (max-width: 1800px)"> 
		<link rel="stylesheet" href="../css/style1600.css" media="screen and (max-width: 1600px)">
		<link rel="stylesheet" href="../css/style1400.css" media="screen and (max-width: 1400px)"> 
		<link rel="stylesheet" href="../css/style1200.css" media="screen and (max-width: 1200px)">
		<link rel="stylesheet" href="../css/style1000.css" media="screen and (max-width: 1000px)">
		<link rel="stylesheet" href="../css/style800.css" media="screen and (max-width: 800px)">
		<link rel="stylesheet" href="../css/style550.css" media="screen and (max-width: 550px)">
		<link rel="stylesheet" href="../css/style400.css" media="screen and (max-width: 400px)"> 
		
		<!-- PHP Head Part -->
		<?php
			/*error_reporting(-1); // display all faires
			ini_set('display_errors', 1);  // ensure that faires will be seen
			ini_set('display_startup_errors', 1); // display faires that didn't born*/
		
			include('../db/password.php');
			include('/etc/web/dbinf.php');
			include('../db/connect.php');
			include('../db/user.php');
		
			if($_SERVER['REQUEST_METHOD']=='POST') //Checks if the submit button is clicked
			{
				if(ISSET($_POST["formsubmit"])){ //If create submit button is pressed
					if(!ISSET($_SESSION['user']))
					{
						LogIn();
					}
					else
					{
						LogOff();
					}
				}
			}
			
			function LogIn()
			{
				$f_user = $_POST["formuser"];
				$f_pw = $_POST["formpw"];
				
				if(ISSET($GLOBALS['global_conn']))
				{
					mysqli_close($GLOBALS['global_conn']);
				}
				ConnectDB($GLOBALS['userRead'], $GLOBALS['pwRead'], $GLOBALS['db_web']);
				
				$value = CheckUser($f_user);
				if($value > 0)
				{
					$salt = GetSalt($f_user);
					$hash = GenerateHash($f_pw, $salt);
					$passwordCheck = CheckUserAndPassword($f_user, $hash);
					if($passwordCheck > 0)
					{
						try
						{
							LogInSession($f_user);
						}
						catch (Exception $e)
						{
							$GLOBALS["notification"] = "Could not log in user.";
						}
					}
					else
					{
						$GLOBALS["notification"] = "User or Password wrong.";
					}
				}
				else
				{				
					$GLOBALS["notification"] = "User or Password wrong.";
				}
				
				mysqli_close($GLOBALS['global_conn']);
			}
			
			function LogOff()
			{
				DestroySession();
			}
		?>
	</head>
		
		
	<header>
		<div id="topcolor"></div>
	</header>
	
	<body id="body" style="background-color:white">
		<?php 
		/*
		error_reporting(-1); // display all faires
			ini_set('display_errors', 1);  // ensure that faires will be seen
			ini_set('display_startup_errors', 1); // display faires that didn't born*/
		

		if(!ISSET($_SESSION['user']))
		{
			echo("
				<form action='internal_login.php' method='POST'> 
					<p> <label for='formname'>USER: </label> </p> <input type='text' required name='formuser' id='formuser' />
					<p> <label for='formpw'>PASSWORD: </label> </p> <input type='password'  required name='formpw' id='formpw' />
					<p> <input type='submit' id='formsubmit' name='formsubmit' value='Sign In'> </p>
				</form>
			");
		}
		else
		{
			echo("
				<form action='internal_login.php' method='POST'>
					<p> <input type='submit' id='formsubmit' name='formsubmit' value='Sign Out'> </p>
				</form>
			");
		}
		
		if(ISSET($GLOBALS["notification"])){echo ("<p id='message'>".$GLOBALS['notification']."</p>");}
		
		?>
		
	</body>
	
</html>
	
	
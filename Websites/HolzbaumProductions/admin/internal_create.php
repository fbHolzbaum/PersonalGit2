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
			error_reporting(-1); // display all faires
			ini_set('display_errors', 1);  // ensure that faires will be seen
			ini_set('display_startup_errors', 1); // display faires that didn't born
			include('../db/user.php');
			include('../db/password.php');
		
			if($_SERVER['REQUEST_METHOD']=='POST') //Checks if the submit button is clicked
			{
				if(ISSET($_POST["formsubmit"])){ //If create submit button is pressed
					
					CreateInternal();
				}
			}
			
			function CreateInternal()
			{
				$user = $_POST["formuser"];
				$pw = $_POST["formpw"];
				$admin = $_POST["formadmin"];
				$pw2 = $_POST["formadminpw"];
				$db = $_POST["formdb"];
				$table = $_POST["formtable"];
								
				$value = CheckUserExists($user);
				if($value > 0)
				{
					$GLOBALS["notification"] = "User already exists.";
				}
				else
				{				
					$salt = GenerateSalt();
					$hash = GenerateHash($pw, $salt);
					
					CreateUser($conn_internal, $user, $hash, $salt, 2);
					
					$GLOBALS["notification"] = "Login failed??.";
				}
			}
		?>
	</head>
		
		
	<header>
		<div id="topcolor"></div>
	</header>
	
	<body id="body" style="background-color:white">
		
		<form action="internal_create.php" method="POST"> <!-- This form calls the php function SendMail -->
			<p> <label for="formname">USER: </label> </p> <input type="text" required name="formuser" id="formuser" />
			<p> <label for="formpassword">PASSWORD: </label> </p> <input type="password"  required name="formpw" id="formpw" />
			<p> <label for="formadmin">ADMIN: </label> </p> <input type="text"  required name="formadmin" id="formadmin" />
			<p> <label for="formadminpassword">PASSWORD: </label> </p> <input type="password"  required name="formadminpw" id="formadminpw" />
			<p> <label for="formdb">DB: </label> </p> <input type="text"  required name="formdb" id="formdb" />
			<p> <label for="formtable">TABLE: </label> </p> <input type="text"  required name="formtable" id="formtable" />
			
			<p> <input type="submit" id="formsubmit" name="formsubmit" value="Create"> </p>
		</form>	
		
		<?php if(ISSET($GLOBALS["notification"])){echo ("<p id='message'>".$GLOBALS['notification']."</p>");}?>
		
	</body>
	
</html>
	
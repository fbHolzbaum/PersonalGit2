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
			include('db/connect.php');
			include('/etc/web/dbinf.php');
		
			if($_SERVER['REQUEST_METHOD']=='POST') //Checks if the submit button is clicked
			{
				if(ISSET($_POST["formsubmit"])){ //If create submit button is pressed
					
					LogIn();
				}
			}
			
			function LogIn()
			{
				$user = $_POST["formuser"];
				$pw = $_POST["formpw"];

				
				$GLOBALS["notification"] = "Login failed??.";
			}
		?>
	</head>
		
		
	<header>
		<div id="topcolor"></div>
	</header>
	
	<body id="body" style="background-color:white">
		
		<form action="internal_login.php" method="POST"> <!-- This form calls the php function SendMail -->
			<p> <label for="formname">USER: </label> </p> <input type="text" required name="formuser" id="formuser" />
			<p> <label for="formemail">PASSWORD: </label> </p> <input type="password"  required name="formpw" id="formpw" />
			<p> <input type="submit" id="formsubmit" name="formsubmit" value="Sign In"> </p>
		</form>	
		
		<?php if(ISSET($GLOBALS["notification"])){echo ("<p id='message'>".$GLOBALS['notification']."</p>");}?>
		
	</body>
	
</html>
	
	
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- This line is needed for responsive design to work on mobile phones -->
		<link rel="stylesheet" href="css/style1800.css" media="screen and (max-width: 1800px)"> 
		<link rel="stylesheet" href="css/style1600.css" media="screen and (max-width: 1600px)">
		<link rel="stylesheet" href="css/style1400.css" media="screen and (max-width: 1400px)"> 
		<link rel="stylesheet" href="css/style1200.css" media="screen and (max-width: 1200px)">
		<link rel="stylesheet" href="css/style1000.css" media="screen and (max-width: 1000px)">
		<link rel="stylesheet" href="css/style800.css" media="screen and (max-width: 800px)">
		<link rel="stylesheet" href="css/style550.css" media="screen and (max-width: 550px)">
		<link rel="stylesheet" href="css/style400.css" media="screen and (max-width: 400px)"> 
		
		<!-- PHP Part -->
		<?php
			$error;
		
			if($_SERVER['REQUEST_METHOD']=='POST') //Checks if the submit button is clicked
			{
				if(ISSET($_POST["formsubmit"])){ //If create submit button is pressed
					
					SendMail();
				}
			}
			
			function SendMail()
			{
				$name = $_POST["formname"];
				$mail = $_POST["formemail"];
				$message = $_POST["formmessage"];
				$subject = 'Contact from user: '. $name .', '. $mail;
				$headers = 'From: support@holzbaumproductions.com'."\r\n".
               'Reply-To: support@holzbaumproductions.com'."\r\n" .
               'X-Mailer: PHP/' . phpversion();
				
				// Send
				mail('holzbaumproductions@gmail.com', $subject, $message, $headers);
				
				$GLOBALS["notification"] = "Your message has been sent.";
			}
		?>
		
		<!-- Javascript Part -->
		<script src="helper/navigation.js"></script>	
	</head>
	
	<header>
		<div id="topcolor"></div>
	</header>
	
	<body id="body" style="background-color:white">
		<!--Navigation-->
		<?php include 'navigation.html';?>
		
		<!-- Main section -->
		<p id="linebreak">&nbsp;</p>
		<div id="teamdiv" >
			<div class="teammember" >
				<div class="memberfoto">
					<img src="images/team/roman.jpg">
				</div>
				<div id="membertext">
					<h2>Roman Martinello</h2>
					<h3>Orange Whale</h3>
					<p>
					Roman is the creativity pool of the team. With his out of the box thinking, he enriches the design and scope of Holzbaum Productions applications.
					The love for his favourite Ice Tea (Migros Original) is only surpassed by the love for his lovely girlfriend 
					and his dream to make a living based on the future success of Holzbaum Productions.
					He's a very cheerful guy and always shares a smile with everyone.
					</p>
				</div>
			</div>
			
			<div class="teammember" id="member2">
				<div class="memberfoto">
					<img src="images/team/felipe.jpg">
				</div>
				<div id="membertext">
					<h2>Felipe Blanco</h2>
					<h3>Tanktop Master</h3>
					<p>
					Felipe is the heart and soul of Holzbaum Productions. As most experienced developer he guides the team through the different design stages, and works passionately on every project.
					With the vision of running his own app development company, he is the strongest driving force behind Holzbaum Productions.
					You have to get to know him, because he is a straight, lovely and interesting guy with multiple talents and great looks.
					</p>
				</div>
			</div>
			
			<div class="teammember" id="member3">
				<div class="memberfoto">
					<img src="images/team/micha.jpg">
				</div>
				<div id="membertext">
					<h2>Micha Brunner</h2>
					<h3>Powerdice</h3>
					<p>
					Micha is the genius brain of the team. With his master's degree in science he develops many algorithms to improve the Holzbaum Productions applications. 
					As an engineer he shares a great admiration for Tesla Motors with his friends.
					In Football, Tennis and Badminton he finds his balance to the challenging tasks of the daily working business.
					He might seem a bit reserverd when your first meet him, but when you get to know him, you discover a warm-hearted, humorous and authentic guy.
					</p>
				</div>
			</div>
		</div>

			
		<div id="contactcontainer">
			<div id="contactdiv">
			&nbsp;
				<h2>Contact Us:</h2>
				
				<?php if(ISSET($GLOBALS["notification"])){echo ("<p id='message'>".$GLOBALS['notification']."</p>");}?>
				
				<form action="about.php" method="POST"> <!-- This form calls the php function SendMail -->
					<p> <label for="formname">NAME: </label> </p> <input type="text" required name="formname" id="formname" />
					<p> <label for="formemail">EMAIL: </label> </p> <input type="email"  required name="formemail" id="formemail" />
					<p> <label for="formmessage">YOUR MESSAGE: </label> </p> <textarea required name="formmessage" id="formmessage" rows="8" cols="80" maxlength="1000"></textarea>
					<p> <input type="submit" id="formsubmit" name="formsubmit" value="Send"> </p>
				</form>	
			</div>
		</div>
	</body>
	<footer>
		<?php include 'footer.html';?>
	</footer>
</html>
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
		<script>
		//<!--
			var menuOpen = false;
			function CallNavigation(){
				//Change navigationbutton background
				if(!menuOpen)
				{
					//Open Menu
					document.getElementById("mobilenavigationOff").id = 'mobilenavigation';
					document.getElementById("mobilenavigationbutton").style.background = "rgb(30, 96, 97)";
					document.getElementById("body").className = "stop-scrolling";
					document.getElementById("navigationbuttonimage").src="images/main/x.jpg";
					menuOpen = true;
				}else
				{
					//Close Menu
					document.getElementById("mobilenavigation").id = 'mobilenavigationOff';
					document.getElementById("mobilenavigationbutton").style.background = "white";
					document.getElementById("body").className = "";
					document.getElementById("navigationbuttonimage").src="images/main/menubutton.png";
					menuOpen = false;
				}
			}
			
			
			var openSubCategory = 0;
			function CallSubNavigation(idNumber)
			{
				DisableAllNavigation(); //Set every open subcategory back
				if(idNumber != openSubCategory)
				{
					//idnumbers: 1 -> news, 2 -> games, 3 -> about				
					var navigationString = "navigation" + idNumber;
					var subNavigationString = "lower" + navigationString;
					var arrowString = "arrow" + idNumber;
					document.getElementById(navigationString).style.background = "rgba(28, 88, 89, 0.98)";
					document.getElementById(subNavigationString).className = "lowernavigation";
					document.getElementById(arrowString).innerHTML = "&#x25B2";
					
					openSubCategory = idNumber;
				}else{
					openSubCategory = 0;
				}
			}
			
			function DisableAllNavigation()
			{
				document.getElementById("navigation1").style.background = "";
				document.getElementById("lowernavigation1").className = "hidden";
				document.getElementById("arrow1").innerHTML = "&#x25BC";
				
				document.getElementById("navigation2").style.background = "";
				document.getElementById("lowernavigation2").className = "hidden";
				document.getElementById("arrow2").innerHTML = "&#x25BC";
				
				document.getElementById("navigation3").style.background = "";
				document.getElementById("lowernavigation3").className = "hidden";
				document.getElementById("arrow3").innerHTML = "&#x25BC";
			}
			
			
		//-->
		</script>
		
	</head>
	
	<header>
		<div id="topcolor"></div>
	</header>
	
	<body id="body" style="background-color:white">
		<div id="navigationbar">
			<div id="logo">
				<a href="index.html"><img src="images/main/hplogo.jpg"></a>
			</div>
			<div id="logomobile">
				<a href="index.html"><img src="images/main/hplogo_mobile.jpg"></a>
			</div>
			<div class="navigationsection" id="firstsection">
				<a href="about.php">ABOUT</a>
			</div>
			<div class="navigationsection">
				<a href="games.html">GAMES</a>
			</div>
			<div class="navigationsection">
				<a href="index.html#newstitel">NEWS</a>
			</div>
			<!-- ONly for mobile -->
			<div id="mobilenavigationbutton"  onclick="CallNavigation()">
				<img src="images/main/menubutton.png" id="navigationbuttonimage">			
			</div>
		</div>
		<!-- ONly for mobile -->
		<div id="mobilenavigationOff">
			<div style="margin-top:10px">
				<a href="index.html">HOME</a>
			</div>
			<div id="navigation1">
				<a href="index.html#mainsection">NEWS</a><p onclick="CallSubNavigation(1)" id="arrow1">&#x25BC;</p>
				<div id="lowernavigation1" class="hidden">
					<a href="index.html#mainsection">Website</a>
					<a href="index.html#twitterwindow">Twitter</a>
				</div>
			</div>
			<div id="navigation2">
				<a href="games.html">GAMES</a><p onclick="CallSubNavigation(2)" id="arrow2">&#x25BC;</p>
				<div id="lowernavigation2" class="hidden">
					<a href="squared.html">Squared</a>
				</div>
			</div>
			<div id="navigation3">
				<a href="about.php" onclick="CallNavigation()">ABOUT</a><p onclick="CallSubNavigation(3)" id="arrow3">&#x25BC;</p>
				<div id="lowernavigation3" class="hidden">
					<a href="about.php#teamdiv" onclick="CallNavigation()">Team</a>
					<a href="about.php#contactcontainer" onclick="CallNavigation()">Contact</a>
				</div>
			</div>
			<div id="mobileSocialMediaDiv">
				<a href="https://www.facebook.com/HolzbaumProductions"><img src="images/main/fblogo_72.png"></a> &nbsp;
				<a href="https://twitter.com/HolzbaumP"><img src="images/main/twitterlogo_white.png" style="background-color:rgb(85,172,238);"></a>
			</div>
		</div>
		
		
		<!-- Main section -->
		<p id="linebreak">&nbsp;</p>
		<div id="teamdiv" >
			<div class="teammember" >
				<div class="memberfoto">
					<img src="images/team/foto.jpg">
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
					<img src="images/team/foto.jpg">
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
					<img src="images/team/foto.jpg">
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
		
		<div id="footercontainer">
			<div class="footerlink" id="firstfooterlink">
				<a href="index.html" style="font-weight:bold;">HOME</a>
			</div>
			
			<div class="footerlink">
				<a href="index.html#mainsection" style="font-weight:bold;">NEWS</a><br>
				<a href="index.html#mainsection">Website News</a><br>
				<a href="index.html#twitterwindow">Twitter News</a>
			</div>
			
			<div class="footerlink">
				<a href="games.html" style="font-weight:bold;">GAMES</a><br>
				<a href="squared.html">Squared</a>
			</div>
			
			<div class="footerlink">
				<a href="about.php" style="font-weight:bold;">ABOUT</a><br>
				<a href="about.php#teamdiv">Team</a><br>
				<a href="about.php#contactcontainer">Contact</a>
			</div>
			
			<div id="socialmediacontainer">
				<a href="https://www.facebook.com/HolzbaumProductions"><img src="images/main/fblogo_72.png"></a>
				<a href="https://twitter.com/HolzbaumP"><img src="images/main/twitterlogo_white.png" style="background-color:rgb(85,172,238);"></a>
			</div>
		</div>
		
	</footer>
	
</html>
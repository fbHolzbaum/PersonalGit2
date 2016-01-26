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
				
				// Send
				mail('holzbaumproductions@gmail.com', $subject, $message, null,'no-reply@holzbaumproductions.com');
				
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
	
	<body id="body">
		<div id="navigationbar">
			<div id="logo">
				<img src="images/main/hplogo.jpg">
			</div>
			<div id="logomobile">
				<img src="images/main/hplogo_mobile.jpg">
			</div>
			<div class="navigationsection" id="firstsection">
				<a href="about.php">ABOUT</a>
			</div>
			<div class="navigationsection">
				<a href="">GAMES</a>
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
				<a href="">GAMES</a><p onclick="CallSubNavigation(2)" id="arrow2">&#x25BC;</p>
				<div id="lowernavigation2" class="hidden">
					<a href="">Squared</a>
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
		<div id="teamdiv" >
			<div class="teammember" >
				<div class="memberfoto">
					<img src="images/team/foto.jpg">
				</div>
				<div id="membertext">
					<h2>Roman Martinello</h2>
					<h3>Orange Whale</h3>
					<p>Well, he is a whale. And orange. An orange whale. A big orange whale. A really really big and very orange whale. He is fat.</p>
				</div>
			</div>
			
			<div class="teammember" id="member2">
				<div class="memberfoto">
					<img src="images/team/foto.jpg">
				</div>
				<div id="membertext">
					<h2>Felipe Blanco</h2>
					<h3>Tanktop Master</h3>
					<p>If Ninjas one day decide to attack the world, is all humanity doomed? Not as long as there are the tank top fighters! Tanktop Master, the one worthy of the tanktop.</p>
				</div>
			</div>
			
			<div class="teammember" id="member3">
				<div class="memberfoto">
					<img src="images/team/foto.jpg">
				</div>
				<div id="membertext">
					<h2>Micha Brunner</h2>
					<h3>Powerdice</h3>
					<p>He loves Tesla. He really does. No, really. If you get to know him, you will see. But he is not rich enough to get a Tesla. That's pretty harsh. I wonder if I should give him some kind of payment once... probably not.</p>
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
				<a href="" style="font-weight:bold;">GAMES</a><br>
				<a href="">Squared</a>
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
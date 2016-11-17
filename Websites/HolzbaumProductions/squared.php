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
				
				document.getElementById("body").className = "";
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
				<a href="index.php"><img src="images/main/hplogo.jpg"></a>
			</div>
			<div id="logomobile">
				<a href="index.php"><img src="images/main/hplogo_mobile.jpg"></a>
			</div>
			<div class="navigationsection" id="firstsection">
				<a href="about.php">ABOUT</a>
			</div>
			<div class="navigationsection">
				<a href="games.php">GAMES</a>
			</div>
			<div class="navigationsection">
				<a href="index.php#newstitel">NEWS</a>
			</div>
			<!-- ONly for mobile -->
			<div id="mobilenavigationbutton"  onclick="CallNavigation()">
				<img src="images/main/menubutton.png" id="navigationbuttonimage">			
			</div>
		</div>
		<!-- ONly for mobile -->
		<div id="mobilenavigationOff">
			<div style="margin-top:10px">
				<a href="index.php" onclick="CallNavigation()">HOME</a>
			</div>
			<div id="navigation1">
				<a href="index.php#mainsection" onclick="CallNavigation()">NEWS</a><p onclick="CallSubNavigation(1)" id="arrow1">&#x25BC;</p>
				<div id="lowernavigation1" class="hidden">
					<a href="index.php#mainsection" onclick="CallNavigation()">Website</a>
					<a href="index.php#twitterwindow" onclick="CallNavigation()">Twitter</a>
				</div>
			</div>
			<div id="navigation2">
				<a href="games.php">GAMES</a><p onclick="CallSubNavigation(2)" id="arrow2">&#x25BC;</p>
				<div id="lowernavigation2" class="hidden">
					<a href="squared.php">Squared</a>
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
		
		
		<!--Content-->
		<p id="linebreak">&nbsp;</p>
		<div id="game">
			<div id="gameinfo" style="background-color:rgb(183,217,242);">
				<img src="images/squared/squared_title2.png">
				<p>Ready for a mind-puzzling game?</p><p>Squared is a tricky puzzle game that puts your mind to the test, in a fun way. It is a game for puzzle solvers that like the feeling of having figured out tricky puzzles.</p>
				<div id="gamestorebutton">
					<a href="https://play.google.com/store/apps/details?id=com.HolzbaumProductions.Squared"><img src="images/main/googleplay.png"></a>
				</div>
				<div id="gamestorebutton">
					<a href="https://itunes.apple.com/us/app/squared-tricky-puzzle-game/id1103383638?mt=8"><img src="images/main/appstore.png"></a>
				</div>
			</div>
			<div id="gametrailer">
				<iframe src="https://www.youtube.com/embed/pT-VU3akc2M" frameborder="0" allowfullscreen></iframe>
			</div>
			<div id="gamescreenshots">
				<img src="images/squared/screenshot1.png">
				<img src="images/squared/screenshot2.png">
				<img src="images/squared/screenshot3.png">
				<img src="images/squared/screenshot4.png">
				<img src="images/squared/screenshot5.png">
				<img src="images/squared/screenshot6.png">
			</div>
		</div>
		
	
	
		
	</body>
	<footer>
		<?php include 'footer.html';?>
	</footer>	
</html>
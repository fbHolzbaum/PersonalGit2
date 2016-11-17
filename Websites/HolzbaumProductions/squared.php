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
		<script src="helper/navigation.js"></script>
	</head>
	
	<header>
		<div id="topcolor"></div>
	</header>
	
	<body id="body">
		<!--Navigation-->
		<?php include 'navigation.html';?>
		
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
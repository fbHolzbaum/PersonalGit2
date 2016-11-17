<?php
// Start the session
session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<meta name="google-site-verification" content="m_MrwqiGrd2ZeLuK7r3dUZv3cFSUoUbiiLwFD6Dh16I" /> <!-- Used for Google Email -->
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- This line is needed for responsive design to work on mobile phones -->
		<link rel="stylesheet" href="css/style1800.css" media="screen and (max-width: 1800px)"> 
		<link rel="stylesheet" href="css/style1600.css" media="screen and (max-width: 1600px)">
		<link rel="stylesheet" href="css/style1400.css" media="screen and (max-width: 1400px)"> 
		<link rel="stylesheet" href="css/style1200.css" media="screen and (max-width: 1200px)">
		<link rel="stylesheet" href="css/style1000.css" media="screen and (max-width: 1000px)">
		<link rel="stylesheet" href="css/style800.css" media="screen and (max-width: 800px)">
		<link rel="stylesheet" href="css/style550.css" media="screen and (max-width: 550px)">
		<link rel="stylesheet" href="css/style400.css" media="screen and (max-width: 400px)"> 
		<link rel="stylesheet" href="css/styleAdmin.css">
		
		<!-- PHP Head Part -->
		<?php
			error_reporting(-1); // display all faires
	ini_set('display_errors', 1);  // ensure that faires will be seen
	ini_set('display_startup_errors', 1); // display faires that didn't born
		
			include('db/connect.php');
			include('/etc/web/dbinf.php');
			try
			{
				ConnectDB($GLOBALS['userRead'], $GLOBALS['pwRead'], $GLOBALS['db_web']);
			}
			catch (Exception $e)
			{
				echo "Can't connect to DB.";
			}
			
			if($_SERVER['REQUEST_METHOD']=='POST') //Checks if the submit button is clicked
			{
				if(ISSET($_POST["submit"])){ //If create submit button is pressed
					
					AddNews();
				}
			}
			
			function AddNews()
			{
				$f_subject = $_POST["formsubject"];
				$f_content = $_POST["formcontent"];
				
				if(ISSET($GLOBALS['global_conn']))
				{
					mysqli_close($GLOBALS['global_conn']);
				}
				ConnectDB($GLOBALS['userWrite'], $GLOBALS['pwWrite'], $GLOBALS['db_web']);
				
				$query = 'INSERT INTO web_news (title, content, author, newsdate) VALUES (?, ?, ?, CURDATE())';
				$stmt = mysqli_stmt_init($GLOBALS['global_conn']);
				mysqli_stmt_prepare($stmt, $query);
				mysqli_stmt_bind_param($stmt, "sss", $f_subject, $f_content, $_SESSION['user']);
				if(!mysqli_stmt_execute($stmt))
				{
					echo "News couldn't be added.";
				}
				
				mysqli_close($GLOBALS['global_conn']);
				
				header("Refresh:0");
			}
		?>
		
		<!-- Javascript Part -->
		<script src="helper/jshelper.js"></script> <!-- Include helper functions -->
		<script src="helper/navigation.js"></script>
		<script>
		//<!--
			function GotoStore(game)
			{
				var device = getMobileOperatingSystem();
				switch(game)
				{
					case "Squared":
					{
						if(device=='Android')
						{
							window.open("https://play.google.com/store/apps/details?id=com.HolzbaumProductions.Squared");
						}
						else if(device=='iOS')
						{
							window.open("https://itunes.apple.com/us/app/squared-tricky-puzzle-game/id1103383638?mt=8");
						}
						else
						{
							window.open("squared.php","_self");
						}
					}
					break;
				}
			}
		//-->
		</script>
		
	</head>
	
	<header>
		<div id="topcolor"></div>
	</header>
	
	<body id="body" style="background-color:white">
		<!--Navigation-->
		<?php include 'navigation.html';?>

		<!--Header-->
		<div id="header">
			<div id="headerimage">
				<img src="images/main/header_squared.jpg">
				<div id="headerinformation">
					<h2>A tricky puzzle game</h2>
					<h1>SQUARED</h1>
					<h3>Can you turn them all? A mind-puzzling game for everyone who likes challenges!</h3>
					<a href="#" class="buttonlink" onclick="GotoStore('Squared')">Download</a>
				</div>
			</div>
		</div>
		
		<!-- This div is only shown on under 800px -->
		<p id="linebreak">&nbsp;</p>
		<div id="mobileheader">
				<img src="images/main/header_squared_mobile.jpg">
				<div>
					&nbsp;
					<h1>SQUARED</h1>
					<p>Can you turn them all? A mind-puzzling game for everyone who likes challenges!</p><br>
					<a href="#" class="buttonlink" onclick="GotoStore('Squared')">Download</a>
				</div>
		</div>
		
		<div id="mainsection">
			<h1 id="newstitel">Holzbaum News</h1>
			<div id="news">
				<?php
					$sql = "SELECT * FROM web_news ORDER BY newsdate DESC LIMIT 4";
					$result = $global_conn->query($sql);
					
					while($row = $result->fetch_assoc()) 
					{
						echo "<div id='newscontainer'>";
						echo "<h3>". $row["title"] ."</h3> <p id='newsdate'>". $row["newsdate"] ."</p>";
						echo "<p>". $row["content"] ."</p>";
						echo "</div>";
					}
					
					mysqli_close($global_conn);
					
					if(ISSET($_SESSION['user']) && $_SESSION['role'] == 'ADMIN')
					{
						echo "<div id='adminnews'>";
							echo '<form id="adminnewsform" action="index.php" method="POST">';
								echo '<p>Subject: <input type="text" required name="formsubject" id="formsubject" /></p>';
								echo '<p>Content: <input type="text" required name="formcontent" id="formcontent" /></p>';
								echo '<p> <input type="submit" id="submit" name="submit" value="Add news"> </p>';
							echo '</form>';
						echo "</div>";
					}
				?>
			</div>
			<div id="twitterwindow">
				<div>
					<a class="twitter-timeline" href="https://twitter.com/HolzbaumP" data-widget-id="686958628738330624">Tweets von @HolzbaumP </a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
		</div>
		
	</body>
	<footer>
		<?php include 'footer.html';?>
	</footer>
</html>
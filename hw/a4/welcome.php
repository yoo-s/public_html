<?php
	session_start();
	
	if (isset($_SESSION['firstName'])){
		$firstName = $_SESSION['firstName'];
		echo " <h3> Welcome back ".$firstName."</h3>"; 
	}	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Scores - yooso's RockPaperScissors</title>
    <link rel="stylesheet" href="a4-style.css">
 </head>
<body>
	<header>
		<center>
		<img src="images/rps_title.png" width="40%" /><br />
		<?php include 'nav.php';?><br />
	  	</center>
	</header>
	<h1> Scoreboard </h1>
	<p>
	<p>
	<a href="logout.php">Logout</a>

	<center>
	<div class="push"></div>
	<div class="footer">
		<p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
	</div>
	</center>
</body>
</html>		
			
		


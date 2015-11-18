<?php session_start() ?>
<?php include 'game.php' ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Game - yooso's RockPaperScissors</title>
    <link rel="stylesheet" href="a4-style.css">
</head>
<body>
	<header>
		<center>
		<img src="images/rps_title.png" width="40%" /><br />
		<?php include 'nav.php';?><br />
	  	</center>
	</header>
	<div>
		<center>
		<?php ?>
			<div id="game">
				<?php game() ?>
			</div>
		<?php ?>
		</center>
		<center>
		<div class="push"></div>
		<div class="footer">
			<p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
		</div>
		</center>
	</div>
</body>
</html>

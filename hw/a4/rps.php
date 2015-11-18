<?php session_start();
	include 'connectvars.php';

		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("Could not connect to MySQL");
		mysqli_select_db($dbc, DB_NAME)
			or die("Error selecting database: " . DB_NAME);
		
function display_items($item = null) {
	$items = array(
		"rock" => '<li><a href="?item=rock"><br><img src="images/rock.png" width="150" alt="rock"></a>',
		"paper" => '<a href="?item=paper"><br><img src="images/paper.png" width="150" alt="paper"></a>',
		"scissors" => '<a href="?item=scissors"><br><img src="images/scissors.png" width="150" alt="scissors"></a></li>'
	);

	if ($item == null) :
		foreach($items as $item => $value) :
			echo $value;
		endforeach;
	else :
		echo str_replace("?item={$item}", "#", $items[$item]);
	endif;

}

?>

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
				<?php 
				if (isset($_GET['item']) == TRUE) :
					// valid options
					$items = array('rock', 'paper', 'scissors');

					// user option
					$item = strtolower($_GET['item']);

					// comp option
					$item2 = $items[rand(0, 2)];

					// user option is valid
					if (in_array($item, $items) == FALSE) :
						echo "Not a valid option";
						die;
					endif;

					// decide winner
					if ($item =='rock' && $item2 == 'scissors' ||
						$item =='paper' && $item2 == 'rock' ||
						$item =='scissors' && $item2 == 'paper') :
							echo '<h2>You Win!</h2><br>';
							$w = "SELECT wins FROM Users WHERE userName= '$userName'";
							$wres = mysqli_query($dbc, $w);
							$won = "UPDATE Users SET wins = wins+1 WHERE userName= '$userName'";
							$res = mysqli_query($dbc, $won);
					endif;

					// decide loser
					if ($item2 =='rock' && $item == 'scissors' ||
						$item2 =='paper' && $item == 'rock' ||
						$item2 =='scissors' && $item == 'paper') :
							echo '<h2>You Lose!</h2><br>';
							$l = "SELECT losses FROM Users WHERE userName= '$userName'";
							$lres = mysqli_query($dbc, $l);
							$lost = "UPDATE Users SET losses = losses+1 WHERE userName= '$userName'";
							$res = mysqli_query($dbc, $lost);
					endif;

					// tie
					if ($item == $item2) :
							echo '<h2>It\'s a tie!</h2><br>';
					endif;

					// display results
					display_items($item);
					display_items($item2);

					// back link
					echo '<div><br><a href="rps.php">Play Again!</a></div>';

				else :
					// display choices
					display_items();
					endif;
				?>

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

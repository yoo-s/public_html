<?php
	session_start();
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

function game() {
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

		$w = $_SESSION['wins'];
		$l = $_SESSION['losses'];

		// decide winner
		if ($item =='rock' && $item2 == 'scissors' ||
			$item =='paper' && $item2 == 'rock' ||
			$item =='scissors' && $item2 == 'paper') :
				echo '<h2>You Win!</h2><br>';
				$won = "SELECT wins
					FROM Users
					UPDATE Users
					SET 'wins' = $w + 1;
					WHERE userName= '" . $_SESSION['userName'] . "'";
				$res = mysqli_query($dbc, $won);
		endif;

		// decide loser
		if ($item2 =='rock' && $item == 'scissors' ||
			$item2 =='paper' && $item == 'rock' ||
			$item2 =='scissors' && $item == 'paper') :
				echo '<h2>You Lose!</h2><br>';
				$lost = "SELECT losses
					FROM Users
					UPDATE Users
					SET 'losses' = $l + 1;
					WHERE userName= '" . $_SESSION['userName'] . "'";
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
		display_items();
	endif;
}

?>

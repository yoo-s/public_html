<?php
session_start();
$id = $_SESSION['id'];
	include 'connectvars.php';
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>yooso's RockPaperScissors</title>
	<link rel="stylesheet" href="a4-style.css">
  </head>
  <body>
	<header>
		<center>
		<img src="images/rps_title.png" width="40%" /><br />
		<?php include 'nav.php';?><br />
	  	</center>
	</header>
	<center>
	<?php ?>
		<div id="game">

<?php
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("Could not connect to MySQL");
		mysqli_select_db($dbc, DB_NAME)
			or die("Error selecting database: " . DB_NAME);
		
		$id = $_SESSION['id'];

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

$query = "SELECT wins FROM Users WHERE id='$id'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$winCount = $_SESSION['wins'];
$_SESSION['wins']++;
$won = "UPDATE Users SET wins = '$winCount' WHERE id = '$id'";
$update = mysqli_query($dbc, $won);
if($update) {
	echo "Success";
	echo "\nsession: " . $_SESSION['wins'];
	echo "\ncount: " . $winCount;
} else {
	echo "Fail";
}

endif;

// decide loser
if ($item2 =='rock' && $item == 'scissors' ||
	$item2 =='paper' && $item == 'rock' ||
	$item2 =='scissors' && $item == 'paper') :
	echo '<h2>You Lose!</h2><br>';

$query2 = "SELECT losses FROM Users WHERE id='$id'";
$result2 = mysqli_query($dbc, $query2);
$row2 = mysqli_fetch_array($result2);
$_SESSION['losses'] = $row2['losses'];
$_SESSION['losses']++;
$lost = "UPDATE Users SET losses ='" . $row2['losses'] . "' WHERE id = '$id'";
$update2 = mysqli_query($dbc, $lost);
if($update2) {
	echo "Success";
	echo "\nsession: " . $_SESSION['losses'];
	echo "\ncount: " . $lossCount;
} else {
	echo "Fail";
}

endif;

// tie
if ($item == $item2) :
	echo '<h2>It\'s a tie!</h2><br>';
endif;

// back link
echo '<div><br><a href="rps.php">Play Again!</a></div>';
print "Wins: " . $_SESSION['wins'];
print "Losses: " . $_SESSION['losses'];

endif;

mysqli_close($dbc);

?>

			</div>
		<?php ?>
		<table>
		<tr>
		<td>
			<img src="http://i.imgur.com/lTtk79W.png" /></td>
		<td colspan="3"></td>
		<td>
			<img src="http://i.imgur.com/NA0ZXLB.png" /></td>
		</tr>
		<tr>
		<td id="side">
		<?php 
			if (isset($_GET['item']) == TRUE) :
				display_items($item);
			else :
				display_items();
			endif;
		?>
		</td>
		<td colspan="3" id="winner">Go for it!</td>
		<td id="side">
			<?php 
			if (isset($_GET['item']) == TRUE) :
				display_items($item2);
			else :
				echo "";
			endif;
		?>
		</td>
		</tr>
	</table>
	<br><br><hr>
	<table id="buttons">
		<tr>
		<td><p>YOU</p></td>
		<td id="sc1">
		<?php
			print $_SESSION['wins'];
		?>
		</td>
		<td><p>|</p></td>
		<td id="sc2">
		<?php
			print $_SESSION['losses'];
		?>
		</td>
		<td><p>COMPUTER</p></td>
		</tr>
	  </table>
	  </center>
	  <div class="push"></div>
	</div>
	<div class="footer">
	  <center>
	  <p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
	  </center>
	</div>
  </body>
</html>

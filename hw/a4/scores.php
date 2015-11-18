<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Signup - yooso's RockPaperScissors</title>
	<link rel="stylesheet" href="a4-style.css">
	<!-- Script for the event handlers    -->
	<script type = "text/javascript"  src = "validateSignUp.js" > </script>	
</head>
<body>
	<header>
		<center>
		<img src="images/rps_title.png" width="40%" /><br />
		<?php include 'nav.php';?><br />
		</center>
	</header>
	<center><h3>Scoreboard</h3></center>

	<?php
	session_start();
	include 'connectvars.php';

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$dbc) {
		die('Could not connect: ');
	}
	mysqli_select_db($dbc, DB_NAME)
		or die("Error selecting database: " . DB_NAME);

	$sql = "SELECT userName, wins, losses
		FROM Users
		ORDER BY wins DESC";
	$res = mysqli_query($dbc, $sql);

	echo "<table>"; // start a table tag in the HTML
	echo "<tr><td>Username</td><td>Wins</td><td>Losses</td></tr>";
	while($row = mysqli_fetch_array($res)){   //Creates a loop to loop through results
		echo "<tr><td>" . $row['userName'] . "</td>
			<td>" . $row['wins'] . "</td>
			<td>" . $row['losses'] . "</td></tr>";
	}
	echo "</table>"; //Close the table in HTML

	mysqli_close(); //Make sure to close out the database connection

	?>

	<center>
	<div class="push"></div>
	<div class="footer">
		<p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
	</div>
	</center>
</body>
</html>


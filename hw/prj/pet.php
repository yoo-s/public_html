<?php
session_start();
include 'connectvars.php';

/*$winCount = $_SESSION['wins'];
$winCount++;
$won = "UPDATE Users SET wins = '$winCount' WHERE id = '$id'";
$update = mysqli_query($dbc, $won);
 */

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Pet - yooso's Project</title>
		<link rel="stylesheet" href="prj-style.css">
		<script type="text/Javascript" src="petaction.js"></script>
	</head>
	<body>
		<header>
			<center>
			<img id="cookie" src="http://i.imgur.com/Gj5Y7Bm.png" width="40%" /><br />
			<?php include 'nav.php';?><br />
			</center>
		</header>
		<center><br>
		<section id="gframe">
		<?php
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("Could not connect to MySQL");
			mysqli_select_db($dbc, DB_NAME)
				or die("Error selecting database: " . DB_NAME);

			$id = $_SESSION['id'];
			$query = "SELECT petPic, petName FROM prj_users WHERE id=$id";
			$result = mysqli_query($dbc, $query);

			if (mysqli_num_rows($result) > 0) {
					// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$petName = $row['petName'];
					echo "<h1>".$petName."</h1>";
					if ($row["petPic"] == "pet1") {
						echo "<div id='petbox'><img width='200px' src='http://i.imgur.com/dDrIAiD.gif' ></div>";
					} else if ($row["petPic"] == "pet2") {
						echo "<div id='petbox'><img width='200px' src='http://i.imgur.com/ygp1Gna.gif' ></div>";
					} else if ($row["petPic"] == "pet3") {
						echo "<div id='petbox'><img width='200px' src='http://i.imgur.com/VKwLAuZ.gif' ></div>";
					}
				}
			} else {
				echo "Error loading pet. :(";
			}

			mysqli_close($dbc);
		?>
		<br>
		<p id="message">What would you like to do with your pet?</p>
		<nav id='menu'>
			<li id='menulinks'>
				<button id='petaction' class='myButton' value="pet" onclick="action(this.value)">Pet</button>
				<button id='petaction' class='myButton' value="feed" onclick="action(this.value)">Feed</button>
				<button id='petaction' class='myButton' value="play" onclick="action(this.value)">Play</button>
			</li>
		</nav>
		</section>
		</center>
		<div class="push"></div>
		<center>
		<div class="footer">
		  <p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
		</div>
		</center>
	</body>
</html>

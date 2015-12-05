<?php
session_start();
include 'connectvars.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile - yooso's Project</title>
		<link rel="stylesheet" href="prj-style.css">
		<script type="text/Javascript" src="cursor.js"></script>
	</head>
	<body>
		<header>
			<center>
			<img id="cookie" src="http://i.imgur.com/Ey2UU8l.png" width="40%" /><br />
			<?php include 'nav.php';?><br />
			</center>
		</header>
		<center><br>
		<section id="gframe">
		<?php
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$dbc) {
				die('Could not connect: ');
			}
			mysqli_select_db($dbc, DB_NAME)
				or die("Error selecting database: " . DB_NAME);

			$id = $_SESSION['id'];
			$sql = "SELECT displayName, petPic, petName
				FROM prj_users
				WHERE id=$id";
			$res = mysqli_query($dbc, $sql);
			while($row = mysqli_fetch_array($res)){   //Creates a loop through results
				$displayName = $row['displayName'];
				$petPic = $row['petPic'];
				$petName = $row['petName'];
			}
		
			echo "<h1>Profile</h1><br>";
			echo "<p>Hi, my name is ".$displayName." and this is my pet, ".$petName.".";
			if ($petPic == "pet1") {
				echo "<div width='100px'><img width='100px' src='http://i.imgur.com/dDrIAiD.gif' ></div>";
			} else if ($petPic == "pet2") {
				echo "<div width='100px'><img width='100px' src='http://i.imgur.com/ygp1Gna.gif' ></div>";
			} else if ($petPic == "pet3") {
				echo "<div width='100px'><img width='100px' src='http://i.imgur.com/VKwLAuZ.gif' ></div>";
			}

			mysqli_close($dbc); //Make sure to close out the database connection

		?>

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

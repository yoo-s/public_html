<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Account - yooso's Project</title>
	<link rel="stylesheet" href="prj-style.css">
	<!-- Script for the event handlers    -->
</head>
<body>
<header>
	<center>
	<img id="cookie" src="http://i.imgur.com/Gj5Y7Bm.png" width="40%" /><br />
	</center>
</header>
<?php include 'homenav.php' ?><br>
<?php 
include 'connectvars.php';
//require_once('connectvars.php');
// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) 
	or die ("Error: Could not connect to database.");
mysqli_select_db($dbc, DB_NAME)
	or die("Error selecting database: " . DB_NAME);

if (isset($_POST['submit'])) {
	// Grab the profile data from the POST
	$userName = mysqli_real_escape_string($dbc, trim($_POST['userName']));
	$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	$displayName = mysqli_real_escape_string($dbc, trim($_POST['displayName']));
	$petPic = $_POST['pet'];
	$petName = mysqli_real_escape_string($dbc, trim($_POST['petName']));

	if (!empty($userName) && !empty($password) && !empty($displayName) && !empty($petPic) && !empty($petName)) {
		// Make sure someone isn't already registered using this username
		$query = "SELECT * FROM prj_users WHERE userName = '$userName'";
		$data = mysqli_query($dbc, $query);
		if (mysqli_num_rows($data) == 0) {
			// The username is unique, so insert the data into the database
			$query = "INSERT INTO prj_users (userName, password, displayName, petPic, petName) VALUES ('$userName', '$password', '$displayName', '$petPic', '$petName')";
			mysqli_query($dbc, $query);

			// Confirm success with the user
			echo '<p>Thank you for registering! You\'re now ready to log in.</p><br>';
			echo '<a href="index.php">Home</a>';

			mysqli_close($dbc);
			exit();
		}
		else {
			// An account already exists for this username, so display an error message
			echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
			$username = "";
		}
	}
	else {
		echo '<p class="error">You didn\'t enter all of the sign-up data!</p>';
	}
}

mysqli_close($dbc);
?>

	<center><br>
	<section id="gframe">
		<h1>Sign Up</h1><br>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
		<label for="username">Username:</label>
		<input type="text" id="userName" name="userName" value="<?php if (!empty($userName)) echo $userName; ?>" /><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" /><br><br>
		<label for="displayname">Display Name:</label>
		<input type="text" id="displayName" name="displayName" /><br><br>
		<!-- pet img select -->
		<br>
		<label for="petpic">Pick a Pet:</label><br>
		<table width="300px">
			<tr><td>
			<input type="radio" id="pet" name="pet"
			<?php if (isset($pet) && $pet=="pet1") echo "checked";?>
			value="pet1"><img width="100px" src="http://i.imgur.com/dDrIAiD.gif" ><br><br></td>
			<td><input type="radio" id="pet" name="pet"
			<?php if (isset($pet) && $pet=="pet2") echo "checked";?>
			value="pet2"><img width="100px" src="http://i.imgur.com/ygp1Gna.gif" ><br><br></td>
			<td><input type="radio" id="pet" name="pet"
			<?php if (isset($pet) && $pet=="pet3") echo "checked";?>
			value="pet3"><img width="100px" src="http://i.imgur.com/VKwLAuZ.gif" ><br><br></td><tr>
		</table>
		<label for="petname">Pet's Name:</label>
		<input type="text" id="petName" name="petName" /><br><br>
		</fieldset>
		<input class="myButton" type="submit" value="Sign Up" name="submit" />
		</form>
	</section>
	</center>
	<center>
	<div class="push"></div>
	<div class="footer">
	<p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
	</div>
	</center>
</body>
</html>

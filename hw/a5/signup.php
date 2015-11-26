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
	<img src="../a4/images/rps_title.png" width="40%" /><br />
	<?php include 'nav.php';?><br />
	  </center>
  </header>

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
	$firstName = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
	$lastName = mysqli_real_escape_string($dbc, trim($_POST['lastName']));


	if (!empty($userName) && !empty($password)) {
		// Make sure someone isn't already registered using this username
		$query = "SELECT * FROM Users WHERE userName = '$userName'";
		$data = mysqli_query($dbc, $query);
		if (mysqli_num_rows($data) == 0) {
			// The username is unique, so insert the data into the database
			$query = "INSERT INTO Users (userName, password, firstName, lastName) VALUES ('$userName', '$password', '$firstName', '$lastName')";
			mysqli_query($dbc, $query);

			// Confirm success with the user
			echo '<p>Thank you for registering! You\'re now ready to log in.</p>';

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
		echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
	}
}

mysqli_close($dbc);
?>

	<section>
		<center>
		<h3>Sign Up</h3><br>
		<h4>Please enter your username and desired password to sign up for an account.</h4>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
		<label for="username">Username:</label>
		<input type="text" id="userName" name="userName" value="<?php if (!empty($userName)) echo $userName; ?>" /><br />
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" /><br />
		<label for="firstname">First Name:</label>
		<input type="text" id="firstName" name="firstName" /><br />
		<label for="lastname">Last Name:</label>
		<input type="text" id="lastName" name="lastName" /><br />
		</fieldset>
		<input class="myButton" type="submit" value="Sign Up" name="submit" />
		</form>
		</center>
	</section>
	<center>
	<div class="push"></div>
	<div class="footer">
	<p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
	</div>
	</center>
</body> 
</html>

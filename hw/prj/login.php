<?php
	session_start();
	include 'connectvars.php';
 
	if ((isset($_POST['userName'])) && (isset($_POST['password'])) ){
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("Error: Could not connect to database.");
		mysqli_select_db($dbc, DB_NAME)
			or die("Error selecting database: " . DB_NAME);
		
		$query = "SELECT * FROM prj_users WHERE userName='$userName' and password='$password'";
		$result = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($result) == 1) {
	
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the pet page
			$row = mysqli_fetch_array($result);
			$_SESSION['id'] = $row['id'];
			$_SESSION['valid_user'] = $row['userName'];
			$_SESSION['displayName'] = $row['displayName'];
			$_SESSION['petPic'] = $row['petPic'];
			$_SESSION['petName'] = $row['petName'];
			header('Location: pet.php');
		} else {
			// The username/password are incorrect so set an error message
			echo "";
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Log In - yooso's Project</title>
	<link rel="stylesheet" href="prj-style.css">
	<!--<script type="text/Javascript" src="loginerror.js"></script>-->
</head>
<body>
<header>
	<center>
	<a href="index.php"><img id="cookie" src="http://i.imgur.com/Ey2UU8l.png" width="40%" /></a><br />
	</center>
</header>
<?php include 'homenav.php' ?><br>
<h4 id='loginfail'></h4>
<?php
	if (isset($_SESSION['valid_user'])) {
		echo " <center><p> You are already logged in! Click the link below to log out and try again.</p><br>"; 
		echo "<a href='logout.php'>Logout</a></center>";
	}
	else {
		if (isset($userName)) {
			// user tried but can't log in
			echo "Invalid username or password.";
		} else {
			// user has not tried
			echo "";
		}
	}
?>
	<center><br>
	<section id="gframe">
		<h1> Log In </h1><br>
		<form id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
			<label for="username">Username:</label>
			<input type='text' name='userName' /><br><br>
			<label for="password">Password:</label>
			<input type='password' name='password' /><br><br><br>
			<input class="myButton" type="submit" value="Log In" name="submit" />
			</fieldset>
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

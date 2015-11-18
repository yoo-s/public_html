<?php
	session_start();
	include 'connectvars.php';
 
	if ((isset($_POST['userName'])) && (isset($_POST['password'])) ){
		$userName = $_POST['userName'];
		$password = $_POST['password'];
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("Could not connect to MySQL");
		mysqli_select_db($dbc, DB_NAME)
			or die("Error selecting database: " . DB_NAME);
		
		$query = "SELECT * FROM Users WHERE userName='$userName' and password='$password'";
		$result = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($result) == 1) {
	
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			  $row = mysqli_fetch_array($result);
			  $_SESSION['firstName'] = $row['firstName'];
			  $_SESSION['valid_user'] = $row['userName'];
			}
		else {
          // The username/password are incorrect so set an error message
			echo "Sorry, you must enter a valid username and password to log in.";
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - yooso's RockPaperScissors</title>
    <link rel="stylesheet" href="a4-style.css">
</head>
<body>
	<header>
		<center>
		<img src="images/rps_title.png" width="40%" /><br />
		<?php include 'nav.php';?><br />
	  	</center>
	</header>
	<center><h3> Log In </h3><br></center>

	<?php

		if (isset($_SESSION['valid_user'])) {
			echo " <h3> You are logged in as </h3><p> User: ".$_SESSION['valid_user']; 
			echo " <p> First Name: ".$_SESSION['firstName']; 
		}
		else {
			if (isset($userName)) {
				// user tried but can't log in
				echo "<h4> *Could not log you in </h4>";
			} else {
				// user has not tried
				echo " <h4> *You need to log in </h4> ";
			}
			// Log in form

			echo " <center><form method='post' action='login.php' > ";
			echo " User name <input type='text' name='userName'> <br /> ";
			echo "  Password <input type='password' name='password' /> <br /><br />";
			echo '<input class="myButton" type="submit" value="Log In" name="submit" />';
			echo "</form></center>";
		}	
	?>

	<section>
		<center>
		<p>
		<p>
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
			
		


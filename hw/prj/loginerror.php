<?php
	if (isset($_SESSION['valid_user'])) {
		echo " <center><p> You are logged in as </p> " . $_SESSION['valid_user'] . "<br><br>"; 
		echo " <br><br><h2> Welcome, " . $_SESSION['displayName'] . "!</h2></center>";
		echo "<a href='logout.php'>Logout</a>";
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

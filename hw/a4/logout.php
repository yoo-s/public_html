<?php
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout - yooso's RockPaperScissors</title>
    <link rel="stylesheet" href="a4-style.css">
</head>
<body>
	<header>
		<center>
		<img src="images/rps_title.png" width="40%" /><br />
		<?php include 'nav.php';?><br />
	  	</center>
	</header>
	<center><h3> Log Out </h3></center><br>

	<?php
		if (!empty($old_user)) {
			echo '<center>' . $old_user . ', you have successfully logged out!</center>';
		} else {
			echo '<center>You were not logged in!</center>';
		}
	?>
	<center>
	<div class="push"></div>
	<div class="footer">
		<p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
	</div>
	</center>
</body>
</html>


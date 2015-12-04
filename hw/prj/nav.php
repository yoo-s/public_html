<?php
	session_start();
	require_once('connectvars.php');
	//  Uploaded file is saved in the database as a BLOB

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
		or die("Error connecting to database server");
	mysqli_select_db($dbc, DB_NAME)
		or die("Error selecting database: " . DB_NAME);

	$id = $_SESSION['id'];
	$sql = "SELECT * FROM prj_users WHERE id=$id";
	$res = mysqli_query($dbc, $sql);
	while($row = mysqli_fetch_array($res)){
		$_SESSION['displayName'] = $row['displayName'];
	}

	echo"<nav id='menu'>";
	echo"	<li id='menulinks'>";
	echo"		<a class='myButton' href='pet.php'>My Pet</a>";
	echo"		<a class='myButton' href='profile.php'>My Profile</a>";
	echo"		<a class='myButton' href='gallery.php'>Pet Gallery</a>";
	echo"		<a class='myButton' href='eprofile.php'>Settings</a>";
	echo"		<a class='myButton' href='help.php'>Help</a>";
	echo"		&nbsp;&nbsp;&nbsp;&nbsp;Welcome, " . $_SESSION['displayName'];
	echo"		<a class='myButton' href='logout.php'>Logout</a>";
	echo"	</li>";
	echo"</nav>";
?>

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
	$displayName = $row['displayName'];
	$password = $row['password'];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Settings - yooso's Project</title>
<link rel="stylesheet" href="prj-style.css">
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
	<h1>User Preferences</h1><br>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
		Display Name: <input type="text" name="displayName" value="<?=$displayName; ?>" /><br><br>
		Password: <input type="password" name="password" value="<?=$password; ?>" /><br><br>
		<input class="myButton" type="submit" value="Update Preferences" name="submit">
	</form>
</section><br>
<?php
if (isset($_POST['submit'])) {
	$displayName = $_POST['displayName'];
	$password = $_POST['password'];
	$upd = "UPDATE prj_users SET displayName='".$displayName."', password='".$password."' WHERE id=$id";
	$updR = mysqli_query($dbc, $upd);
	if ($updR) {
		echo "Settings updated.";
	} else {
		echo "Settings failed to update.";
	}
}
?>
<div class="push"></div>
<center>
  <div class="footer">
    <p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
  </div>
</center>
</body>
</html>



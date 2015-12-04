<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or die("Error connecting to database server");

$id = addslashes($_REQUEST['id']);
$query = "SELECT * FROM imgTable WHERE id=$id";

$result = mysqli_query($dbc, $query) or
	die("Error in querying the database");

$row = mysqli_fetch_assoc($result);
$image = $row['image'];

header("Content-type: image/jpeg");
echo $image;
?>

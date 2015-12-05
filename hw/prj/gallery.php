<?php
	session_start();
	include 'connectvars.php';

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
		or die("Error connecting to database server");

	$file = $_FILES['imageFile']['tmp_name'];

	if (isset($file))  {
		$imageFile = addslashes(file_get_contents($_FILES['imageFile']['tmp_name'])) ;
		$imageName = addslashes($_FILES['imageFile']['name']);

		$imageSize = getimagesize($_FILES['imageFile']['tmp_name']);

		if ($imageSize == FALSE)  {
			echo "That is not an image";
		}
		else {
			$query = "INSERT INTO imgTable (image, name) VALUES ('$imageFile', '$imageName')";
	
			$result = mysqli_query($dbc, $query) 
				or die("Error uploading the image.");
			if (!$result)
				echo "Trouble uploading image.";
			else  {
				$lastId = mysqli_insert_id($dbc);
				//echo "<img src=get.php?id=$lastId>";

			}
		}
	} else {
		echo "";
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pet Gallery - yooso's Project</title>
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
	<p>*Page still undergoing development.</p>
	<section id="gframe">
	<h1>Share your pet pictures!</h1><br>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value = "1000000" />
			<div>
				Select picture to share:
				<input type="file" name="imageFile" id="imageFile">
			</div><br>
			<input type="submit" class="myButton" value="Upload Pic" name="submit">
		</form>
	</section>
	<br>
	<section>
	<?php
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$dbc) {
		die('Could not connect: ');
	}
	mysqli_select_db($dbc, DB_NAME)
		or die("Error selecting database: " . DB_NAME);

	$sql = "SELECT id, image
		FROM imgTable
		ORDER BY id DESC";
	$res = mysqli_query($dbc, $sql);

	echo "<center><section id='gframe'>"; // start a table tag in the HTML
	echo "<h1>Pet Gallery</h1><br>";
	while($row = mysqli_fetch_array($res)){   //Creates a loop through results
		$id = $row['id'];
		$count = 0;
		echo "<div class='gbox'><img class='gimg' src=get.php?id=$id></div>";
		/*$count++;
		if($count == 5) {
			echo "<br>";
		}*/
	}
	echo "</section></center>"; //Close the table in HTML

	mysqli_close($dbc); //Make sure to close out the database connection

	?>
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


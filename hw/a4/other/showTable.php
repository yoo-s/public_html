<!DOCTYPE html>

<html>
	<head>
		<title>MySQL Table Viewer</title>
	</head>
<body>

<?php
// change the value of $dbuser and $dbpass to your username and password
	session_start();
	include '../connectvars.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("Could not connect to MySQL");
	mysqli_select_db($conn, DB_NAME)
		or die("Error selecting database: " . DB_NAME);
	
	$table = $_POST['table'];
	$query = "SELECT * FROM $table ";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
	
	$fields_num = mysqli_num_fields($result);
	echo "<h1>Table: {$table}</h1>";
	echo "<table border='1'><tr>";
	// printing table headers
	for($i=0; $i<$fields_num; $i++) {	
		$field = mysqli_fetch_field($result);	
		echo "<td><b>{$field->name}</b></td>";
	}
	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {	
		echo "<tr>";	
		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable	
		foreach($row as $cell)		
			echo "<td>$cell</td>";	
		echo "</tr>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>

</html>

	

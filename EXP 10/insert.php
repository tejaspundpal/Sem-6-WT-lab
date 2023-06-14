<?php
	// Retrieve form data
	$name = $_POST['name'];
	$email = $_POST['email'];

	// Database connection settings
	$servername = "localhost";
	$username = "your_username";
	$password = "your_password";
	$dbname = "your_database_name";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Insert data into the database
	$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
	if (mysqli_query($conn, $sql)) {
		echo "Data inserted successfully!";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Insertion Form</title>
</head>
<body>
	<h2>Data Insertion Form</h2>
	<form method="post" action="insert.php">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		<br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>

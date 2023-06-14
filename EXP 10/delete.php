<?php
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

	// Retrieve the record ID from the URL parameter
	$id = $_GET['id'];

	// Delete the record from the database
	$sql = "DELETE FROM users WHERE id = '$id'";
	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully!";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>

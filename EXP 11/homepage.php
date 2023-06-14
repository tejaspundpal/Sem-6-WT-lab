<?php
	session_start();

	// Check if the user is logged in
	if (!isset($_SESSION["user_id"])) {
		header("Location: login.php");
		exit();
	}

	$user_id = $_SESSION["user_id"];

	// Database connection configuration
	$servername = "localhost";
	$username = "your_username";
	$password = "your_password";
	$dbname = "your_database_name";

	// Create a new MySQLi instance
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check for connection errors
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Fetch user details from the database
	$query = "SELECT * FROM users WHERE id = '$user_id'";
	$result = $conn->query($query);

	if ($result->num_rows == 1) {
		$user = $result->fetch_assoc();
		$name = $user["name"];
		$email = $user["email"];
	} else {
		header("Location: login.php");
		exit();
	}

	$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
	<h2>Welcome, <?php echo $name; ?>!</h2>
	<p>Your details:</p>
	<p><strong>Name:</strong> <?php echo $name; ?></p>
	<p><strong>Email:</strong> <?php echo $email; ?></p>
	<p><a href="logout.php">Logout</a></p>
</body>
</html>

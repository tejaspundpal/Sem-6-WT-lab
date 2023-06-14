<?php
	session_start();
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

	// Handle the user login
	if (isset($_POST["login"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		// Validate form data
		if (empty($email) || empty($password)) {
			echo "Please enter both email and password.";
		} else {
			// Check if the email and password match a registered user
			$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$result = $conn->query($query);

			if ($result->num_rows == 1) {
				$user = $result->fetch_assoc();
				$_SESSION["user_id"] = $user["id"];
				header("Location: homepage.php");
				exit();
			} else {
				echo "Invalid email or password.";
			}
		}
	}

	$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>
	<h2>User Login</h2>
	<form method="post" action="login.php">
		<label for="email">Email:</label>
		<input type="email" name="email" id="email">
		<br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br><br>
		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>

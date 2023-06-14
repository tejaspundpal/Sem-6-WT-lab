<?php
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

		// Handle the user registration
		if (isset($_POST["register"])) {
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];

			// Validate form data
			if (empty($name) || empty($email) || empty($password)) {
				echo "Please fill in all fields.";
			} else {
				// Check if the email is already registered
				$query = "SELECT * FROM users WHERE email = '$email'";
				$result = $conn->query($query);

				if ($result->num_rows > 0) {
					echo "Email already registered. Please use a different email.";
				} else {
					// Insert the user into the database
					$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
					if ($conn->query($query) === TRUE) {
						echo "Registration successful. You can now <a href='login.php'>login</a>.";
					} else {
						echo "Error: " . $query . "<br>" . $conn->error;
					}
				}
			}
		}

		$conn->close();
	?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
</head>
<body>
	<h2>User Registration</h2>
	<form method="post" action="register.php">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name">
		<br><br>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email">
		<br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br><br>
		<input type="submit" name="register" value="Register">
	</form>
</body>
</html>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database_name";

	$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		if (empty($name)) {
			echo "Please enter your name.";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Please enter a valid email address.";
		} elseif (empty($password)) {
			echo "Please enter a password.";
		} elseif (strlen($password) < 8) {
			echo "Password must be at least 8 characters long.";
		} elseif (!preg_match("#[0-9]+#", $password)) {
			echo "Password must include at least one number.";
		} elseif (!preg_match("#[a-zA-Z]+#", $password)) {
			echo "Password must include at least one letter.";
		} else {

            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

			if ($conn->query($sql) === TRUE) {
				echo "Thank you for registering, " . $name . ".";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		$conn->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple HTML Form</title>
</head>
<body>
	<h2>Enter your details</h2>
	<form method="post" action="index.php">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name">
		<br><br>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email">
		<br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
		<br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html> 
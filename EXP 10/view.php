<!DOCTYPE html>
<html>
<head>
	<title>View Data</title>
</head>
<body>
	<h2>View Data</h2>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
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

			// Retrieve data from the database
			$sql = "SELECT * FROM users";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='3'>No data found!</td></tr>";
			}

			mysqli_close($conn);
		?>
	</table>
</body>
</html>

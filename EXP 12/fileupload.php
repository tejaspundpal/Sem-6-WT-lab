<?php
		// Handle file upload
		if (isset($_POST["upload"])) {
			$file_name = $_FILES['file']['name'];
			$file_tmp_name = $_FILES['file']['tmp_name'];
				if (move_uploaded_file($file_tmp_name,"uploads/" . $file_name)) {
					echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded successfully.";
					// You can perform additional operations here, such as storing the file details in a database.
				} else {
					echo "Sorry, there was an error uploading your file.";
				}	
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
	<h2>Upload a File</h2>
	<form method="post" action="fileupload.php" enctype="multipart/form-data">
		<input type="file" name="file">
		<br><br>
		<input type="submit" name="upload" value="Upload">
	</form>

</body>
</html>

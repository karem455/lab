
<?php
session_start();
include "connect_db.php";




// Connect to the database and process the form data

$result_photo = $_FILES['result_photo']['name'];
$result_photo_tmp = $_FILES['result_photo']['tmp_name'];

// Upload the photo to the server
move_uploaded_file($result_photo_tmp, "uploads/" . $result_photo);

// Insert the photo path into the database
$stmt = $con->prepare("UPDATE test_results SET result_photo = :result_photo WHERE id = 1");
$stmt->execute(array(
	":result_photo" => "uploads/" . $result_photo
));

echo "Test result photo uploaded successfully.";

// Close the database connection
$con = null;
?>




<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>
	<h2>Admin Page</h2>
	<p>Welcome, admin!</p>
	<p>You can upload the test result photo here:</p>
	<form method="POST" action="upload_process.php" enctype="multipart/form-data">
		<label for="result_photo">Test Result Photo:</label>
		<input type="file" id="result_photo" name="result_photo" required>
		<br>
		<button type="submit">Upload</button>
	</form>
</body>
</html>

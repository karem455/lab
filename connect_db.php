<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "shifaa";

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // The PDO extension provides a consistent interface for connecting to and interacting with many 
    //different database types, which makes the code more portable and reusable.
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connected successfully";
} catch(PDOException $e) {
    // Display an error message if the connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>
<!-- In this example, the database connection object is created using PDO and stored in the $con variable. Then, 
the prepare() method is called on the $con object to prepare the SQL statement. If any errors occur during the connection or preparation of the statement,
 they are caught by the catch block and an error message is displayed. -->
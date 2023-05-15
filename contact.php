<?php
// Connect to the database
include "connect_db.php";


// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $tests = $_POST['tests'];
    $test_time = $_POST['test_time'];

    // Check if email or number already exist in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email OR number = :number");
    $stmt->execute(array(
        ":email" => $email,
        ":number" => $number
    ));

    if ($stmt->rowCount() > 0) {
        echo "Error: Email or number already exists choose another one.";
    } else {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, number, email, tests, test_time) VALUES (:name, :number,  :email, :tests, :test_time)");
        if (!empty($tests)) {
            $stmt->execute(array(
                ":name" => $name,
                ":number" => $number,
                ":email" => $email,
                ":tests" => $tests,
                ":test_time" => $test_time
            ));
        } else {
            echo "Please select a value for the 'تحاليل' field.";
        }

        if ($stmt->rowCount() > 0) {
            echo "Data inserted successfully!";
        } else {
            echo "Failed to insert data.";
        }
    }
}

// Close the database connection
$conn = null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Document</title>

    <!-- Include the datetimepicker CSS and JS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
   
    <div class="contact">

        <div class="overlay"></div>
        <div class="container">
            <h2> احجز تحاليلك </h2>
            <p> For any questions or problems contact us immediately </p>
            <br>
            <form method="POST" class="book" action="contact.php">
                <label for="name">Name:</label>
                <input type="text" class="n1" id="name" name="name" required>

                <label for="number">Number:</label>
                <input type="text" id="number" name="number" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="tests">اختار تحاليلك</label>
                <br>

                <select id="tests" name="tests">
                    <option value="تحاليل الدم">تحاليل الدم</option>
                    <option value="تحاليل المناعة">تحاليل المناعة</option>
                    <option value="تحاليل وظائف الكبد">تحاليل وظائف الكبد</option>
                    <option value="تحاليل العظام">تحاليل العظام</option>
                    <option value="تحاليل اسباب السمنة وزيادة الوزن">تحاليل اسباب السمنة وزيادة الوزن</option>
                </select>
                <br>


                <label for="test_time">Choose a Test Time:</label>
                <input type="datetime-local" id="test_time" name="test_time" required>


                <button type="submit">Submit</button>
            </form>
            <br>

            <img src="img/location.png">
            <p class="pp"> Site Bransh:benha Egypt</p>
            <br>
            <img src="img/phone.png">
            <p class="num"> 01202398100</p>
            <br>
            <img src="img/mail.png">
            <p class="p"> sifalap@gmail.com</p>
            <br>
            <img src="img/time.png">
            <p class="pp"> Sat-Fri , 7AM to 11PM</p>
            <img src="img/logo.png" class="logoo">
            <p class="shifa">Good health for better life.</p>
        </div>
    </div>
    
</body>

</html>
<?php 
include "connect_db.php";

if (isset($_GET['from']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $from = $_GET['from'];
    $id = $_GET['id'];

    if ($from == "admins") {
        $stmt = $conn->prepare("DELETE FROM admins WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: all_admins.php");
    } elseif ($from == "doctors") {
        $stmt = $conn->prepare("DELETE FROM doctors WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: all_doctors.php");
    } elseif ($from == "services") {
        $stmt = $conn->prepare("DELETE FROM services WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: all_services.php");
    } else {
        // Handle invalid "from" value
        echo "Invalid 'from' value";
    }
} else {
    // Handle missing or invalid parameters
    echo "Missing or invalid parameters";
}
?>
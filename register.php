<?php 
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query using MySQLi
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    // Execute query
    if ($stmt->execute()) {
        header("Location: dashboard.html");
        exit();
    } else {
        echo "Error: Could not register user.";
    }

    $stmt->close();
    $conn->close();
}
?>

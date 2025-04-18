<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check for empty fields
    if (empty($email) || empty($password)) {
        echo "Please fill in both email and password.";
        exit();
    }

    // Prepare SQL query using MySQLi
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: dashboard.html");
            exit();
        } else {
            echo "Invalid credentials. Password mismatch.";
        }
    } else {
        echo "Invalid credentials. User not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please log in with your credentials.";
}
?>

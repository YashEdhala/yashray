<?php     // Default for local development
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "yasheddb";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

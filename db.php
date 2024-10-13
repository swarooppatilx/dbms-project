<?php
$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "food2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

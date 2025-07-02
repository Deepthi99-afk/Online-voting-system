<?php
$host = "localhost";
$user = "root";         // Default for XAMPP
$password = "";         // Default is empty in XAMPP
$dbname = "voting_system";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
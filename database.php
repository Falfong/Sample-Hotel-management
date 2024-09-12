<?php
// database.php

$servername = "localhost";  // Typically "localhost" for XAMPP
$username = "root";         // Default username for XAMPP is "root"
$password = "";             // Password is usually empty in XAMPP
$dbname = "hotel";          // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

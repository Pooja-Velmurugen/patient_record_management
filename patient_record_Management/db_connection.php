<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Default username for MySQL
$password = "";     // Leave empty if no password is set
$dbname = "patient_management"; // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

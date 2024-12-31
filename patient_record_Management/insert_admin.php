<?php
include 'db_connection.php';

// Hash the password using PHP
$adminPassword = password_hash('admin123', PASSWORD_DEFAULT);

// Insert the admin user into the database
$stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $role);

$username = 'admin';
$password = $adminPassword;
$role = 'admin';

if ($stmt->execute()) {
    echo "Admin user inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}
?>

<?php
include 'db_connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $history = $_POST['medical_history'];

    $stmt = $conn->prepare("INSERT INTO patients (name, age, contact, medical_history) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $age, $contact, $history);
    $stmt->execute();
    header("Location: crud.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
</head>
<body>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name">
        <label>Age:</label>
        <input type="number" name="age">
        <label>Contact:</label>
        <input type="text" name="contact">
        <label>Medical History:</label>
        <textarea name="medical_history"></textarea>
        <button type="submit">Add Patient</button>
    </form>
</body>
</html>

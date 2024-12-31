<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM patients WHERE patient_id = ?");
    $stmt->bind_param("i", $patient_id);

    if ($stmt->execute()) {
        header("Location: crud.php"); // Redirect to the patient management page
    } else {
        echo "Error deleting patient record.";
    }
} else {
    echo "No patient ID provided.";
}
?>

<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM patients WHERE patient_id = ?");
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If patient exists, retrieve their details
    if ($result->num_rows > 0) {
        $patient = $result->fetch_assoc();
    } else {
        echo "Patient not found.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get updated details from the form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $medical_history = $_POST['medical_history'];

    // Update the patient record in the database
    $stmt = $conn->prepare("UPDATE patients SET name = ?, age = ?, contact = ?, medical_history = ? WHERE patient_id = ?");
    $stmt->bind_param("sisss", $name, $age, $contact, $medical_history, $patient_id);

    if ($stmt->execute()) {
        header("Location: crud.php"); // Redirect to the patient management page
    } else {
        echo "Error updating patient record.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background:  linear-gradient(135deg, #43cea2, #185a9d);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .container {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.7s ease-in-out;
            width: 100%;
            max-width: 500px;
        }
        h2 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-control {
            border-radius: 10px;
        }
        .form-control:focus {
            box-shadow: 0 0 8px #66a6ff;
            border-color: #66a6ff;
        }
        button {
            font-size: 1.2rem;
            padding: 7px 25px;
            border-radius: 25px;
            width: 100%;
            font-weight: 600;
            letter-spacing: 1px;
            border-radius: 10px;
            background-color:rgb(138, 228, 156);
        }
        button:hover {
            background-color:rgb(124, 161, 145);
            background: #66a6ff;
            border-color: #66a6ff;
            transition: 0.3s;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Patient Details</h2>
        <center>
        <form method="POST">
            <table>
               
            <div class="form-group mb-3">
            <tr><td><label for="name" class="form-label">Name:</label></td>
                <td><input type="text" name="name" class="form-control" placeholder="Enter patient's full name" value="<?php echo htmlspecialchars($patient['name'] ?? '', ENT_QUOTES); ?>" required></td>
            </tr></div>
            <div class="form-group mb-3">
            <tr><td><label for="age" class="form-label">Age:</label></td>
                <td><input type="number" name="age" class="form-control" placeholder="Enter patient's age" value="<?php echo htmlspecialchars($patient['age'] ?? '', ENT_QUOTES); ?>" required></td>
            </tr></div>
            <div class="form-group mb-3">
                <tr><td><label for="contact" class="form-label">Contact:</label></td>
                <td><input type="text" name="contact" class="form-control" placeholder="Enter contact number" value="<?php echo htmlspecialchars($patient['contact'] ?? '', ENT_QUOTES); ?>" required></td>
            </tr></div>
            <div class="form-group mb-3">
                <tr><td><label for="medical_history" class="form-label">Medical History:</label></td>
                <td><textarea name="medical_history" class="form-control" rows="4" placeholder="Enter brief medical history"><?php echo htmlspecialchars($patient['medical_history'] ?? '', ENT_QUOTES); ?></textarea></td>
            </tr></div>
            <tr><td><button type="submit" class="btn btn-primary mt-3">Update Patient</button></td></tr>
        </form></table>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

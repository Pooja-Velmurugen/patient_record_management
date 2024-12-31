<?php
include 'db_connection.php';
$result = $conn->query("SELECT * FROM patients");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            animation: fadeIn 1.5s ease;
        }

        h2 {
            font-family: 'Roboto', sans-serif;
            font-size: 2.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.4);
            animation: slideDown 1s ease-out;
        }

        .btn {
            font-size: 1.2rem;
            padding: 7px 25px;
            border-radius: 25px;
            text-decoration:none;
            transition: transform 0.3s ease, background-color 0.3s ease;
            font-family: 'Raleway', sans-serif;
        }

        .btn-primary {
            background: #007bff;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            background: #0056b3;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .table {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            animation: fadeInUp 1.5s ease;
            width:750px;
            
        }

        .table thead {
            background: #6c757d;
            color: #fff;
            height:45px
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
            height:45px;
            color: #000000;

        }

        .table tbody tr:hover {
            background-color: #6c757d;
        }

        .btn-warning {
            background: #ffc107;
            border: none;
            color: #fff;
        }

        .btn-warning:hover {
            background: #e0a800;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
            color: #fff;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Patient Records</h2>
        <br>
        <a href="add_patient.php" class="btn btn-primary mb-4">Add Patient</a>
    <br><br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Contact</th>
                    <th>Medical History</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['patient_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['medical_history']; ?></td>
                        <td>
                            <a href="edit_patient.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_patient.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

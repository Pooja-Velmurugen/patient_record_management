<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Patient Management</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #43cea2, #185a9d) no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            color: #333;
            width:100%;
            height:100%;
            
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color:rgb(14, 3, 3);
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            animation: fadeInDown 1s ease-out;
        }

        .btn {
            font-size: 1.2rem;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration:none;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-success {
            background: #28a745;
            border: none;
            color: #fff;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
            color: #fff;
        }

        .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Patient Record Management System</h1>
        <div class="mt-4">
            <a href="crud.php" class="btn btn-success mx-2">Manage Patients</a>
            <a href="logout.php" class="btn btn-danger mx-2">Logout</a>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

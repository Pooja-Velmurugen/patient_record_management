<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: home.php");
        } else {
            echo "<div class='alert alert-danger text-center'>Invalid password.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>User not found.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Patient Management</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
       h1{ font-family: 'Arial', sans-serif;padding: 10px; /* Change to your desired font */ font-size: 36px; /* Adjust size as needed */ color: #98FF98;  /* Change to your preferred color */ } 
        /* Card Styling */
        .card {
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            background-color: rgba(0, 0, 0, 0.5);

            animation: slideIn 0.8s ease-out;
            transition: transform 0.3s ease-in-out;
            height:300px;
            width:350px;
        }

        /* Card Hover Effect */
        .card:hover {
            transform: translateY(-10px);
        }

        .card-header {
            background-color:rgb(136, 255, 0);
            color: white;
            text-transform: uppercase;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-control {
            border-radius: 25px;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color:rgb(138, 228, 156);
            border-radius: 30px;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            width: 50%;
            transition: background-color 0.3s ease-in-out;
        }

        /* Smooth hover effect on button */
        .btn-primary:hover {
            background-color:rgb(124, 161, 145);
        }

        .alert {
            margin-top: 10px;
        }

        /* Slide-in animation */
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div >
                        <h1 style="text-align:center;">Login</h4>
                    </div>
                    <center>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="username" style="font-family: 'Arial', sans-serif; font-size: 20px; color: #98FF98;">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password" style="font-family: 'Arial', sans-serif; font-size: 20px; color: #98FF98;">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Login</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
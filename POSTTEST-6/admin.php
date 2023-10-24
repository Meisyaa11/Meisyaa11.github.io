<?php
session_start();
require 'koneksi.php';

if (isset($_POST['masuk'])) {
    // Get the input values and prevent SQL injection
    $username = $_POST['username_admin'];
    $password = $_POST['password_admin'];
    
    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM admin_login WHERE username_admin = ? AND password_admin = ?");
    $stmt->bind_param("ss", $username, $password); // Note: No password hashing
    $stmt->execute();

    // Get the query result
    $result = $stmt->get_result();

    // Check if there is a matching user
    if ($result->num_rows == 1) {
        $akun = $result->fetch_assoc();

        // Store user data in a session
        $_SESSION["admin_login"] = $akun;

        // Redirect to the dashboard upon successful login
        header("Location: dashboard.php");
        exit;
    } else {
        // Display an error message if login fails
        echo "<script>alert('anda gagal login, periksa akun anda');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 150px;
        }

        .center-panel {
            text-align: center;
        }

        .panel-heading {
            background-color: #666355;
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .panel-title {
            font-size: 24px;
            margin: 0;
        }

        .panel-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #666355;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="center-panel">
                <div class="panel-heading">
                    <h2 class="panel-title">Login</h2>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username_admin">Username</label>
                            <input type="text" class="form-control" name="username_admin" id="username_admin">
                        </div>
                        <div class="form-group">
                            <label for="password_admin">Password</label>
                            <input type="password" class="form-control" name="password_admin" id="password_admin">
                        </div>
                        <button class="btn btn-primary" name="masuk">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

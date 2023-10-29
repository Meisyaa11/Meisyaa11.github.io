<?php
session_start();
require 'koneksi.php'; 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result  = mysqli_query($conn,"SELECT * from user WHERE username = '$username' ");
    if(mysqli_num_rows($result) > 0){
        $row  = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $row['password'])){
            $_SESSION['login'] =true;
            header("location:tambah.php");
            exit;   
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Universitas Mulawarman</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.form {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-container h1 {
    text-align: center;
    margin-bottom: 20px;
}

.textfield {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-btn:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <?php echo isset($row); ?> 
    <div class="form">
        <img src="../assets/rektorat.jpg" alt="">
        <div class="form-container">
            <h1>Masuk</h1><hr>
            <?php
            if(isset($error)){
                echo "<p style='color:red';> username atau password anda salah </p>";
            }?>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" class="textfield">
                <input type="password" name="password" placeholder="Password" class="textfield">
                <button type="submit" name="login" class="login-btn">Masuk</button><br>
                <p><a href="home.html">Kembali ke halaman utama</a></p>
            </form>
        </div>
    </div>
</body>
</html>
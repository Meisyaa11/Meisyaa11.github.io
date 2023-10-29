<?php
require 'koneksi.php';

if(isset($_POST['register'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    if($password == $cpassword){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $result  = mysqli_query($conn,"SELECT username from user WHERE username = '$username' ");
        if(mysqli_fetch_assoc($result)){
            echo "<script> alert('username sudah ada !!!');
            document.location.href='registrasi.php';
            </script>";
        }else{
            $sql = "INSERT INTO user VALUES ('','$username','$password')";
            $result_query = mysqli_query($conn,$sql);

            if(mysqli_affected_rows($conn) > 0){
                echo "<script> alert( 'Registrasi Berhasil!!');
            document.location.href='login.php';
            </script>";
            }else{
                echo "<script> alert( 'Registrasi gagal!!');
                document.location.href='registrasi.php';
                </script>";
            }
        }
    }else{
        echo "<script> alert('password tidak sama !!!');
        document.location.href='registrasi.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrasi</title>
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
    <div class="form">
        <div class="form-container">
            <h1>Buat Akun</h1><hr>
            
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" class="textfield">
                <input type="password" name="password" placeholder="Password" class="textfield">
                <input type="password" name="cpassword" id="cpassword" placeholder="Konfirmasi Password" autocomplete="off" class="textfield" required> <br>
                <button type="submit" name="register" class="login-btn">Register</button>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </form>
        </div>
    </div>
</body>

</html>
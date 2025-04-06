<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Daftar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8d7da;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h2 {
            color: #d63384;
            margin-bottom: 15px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #d63384;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #c2185b;
        }
        .register-link {
            margin-top: 10px;
            display: block;
            color: #d63384;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
if(isset($_POST['username'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi password

    $query = mysqli_query($koneksi, "INSERT INTO user (nama,email,username, password) 
                                 values ('$nama','$email','$username', '$password')");

    
    if($query){
        echo '<script>alert("Selamat, pendaftaran berhasil! Silakan login."); location.href="login.php";</script>';
    } else {
        echo '<script>alert("Pendaftaran gagal, coba lagi!");</script>';
    }
}
?>

    <div class="container">
        <h2>Form Daftar 📝</h2>
        <form method="POST" action="">
            <input type="text" name="nama" placeholder="nama" required>
            <input type="email" name="email" placeholder="email" required>
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Daftar</button>
        </form>
        <a href="login.php" class="register-link">Login</a>
    </div>

</body>
</html>
</div>

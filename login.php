<?php
session_start();
include "koneksi.php";

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);
        // Simpan data user ke session
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['user'] = $data['username']; 
        if ($data['username'] == 'admin') {
            echo '<script>alert("Selamat datang, '.$data['nama'].'"); location.href="admin/index_admin.php";</script>';
        } else {
            echo '<script>alert("Selamat datang, '.$data['nama'].'"); location.href="index.php";</script>';
        }
    } else {
        echo '<script>alert("Username atau password salah, coba lagi!");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
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
        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Login 🔑</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
        <a href="daftar.php" class="register-link">Daftar</a>
    </div>
</body>
</html>

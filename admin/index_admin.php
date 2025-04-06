<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selfitime Photobooth</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            background-color: #d63384;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 15px;
        }

        .logout {
            background-color: white;
            color: #d63384;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        .logout:hover {
            background-color: #c2185b;
            color: white;
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        .button {
            background-color: pink;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body class="bg-pink-100">
    <header class="bg-pink-400 p-4 flex justify-between items-center">
        <h1 class="text-white font-bold text-xl">SELFiTIME PHOTOBOOTH</h1>
        <nav>
            <ul class="flex space-x-4 text-white font-semibold">
                <li><a href="index_admin.php">HOME</a></li>
                <li><a href="booking.php">BOOKINGS</a></li>
                <li><a href="price.php">PRICE LIST</a></li>
            </ul>
        </nav>
        <div>
            <?php if (isset($_SESSION['user'])) : ?>
                <span>👤
                    <?php echo $_SESSION['user'] . $_SESSION['nama']; ?>
                </span>
                <a href="../logout.php" class="logout">Logout</a>
            <?php else : ?>
                <a class="text-white" href="login.php">Login</a>
                <a class="bg-pink-600 text-white px-4 py-2 rounded" href="daftar.php">Daftar</a>
            <?php endif; ?>
        </div>

    </header>

    <section class="flex justify-center mt-10">
        <img src="../img/hero-bg.jpg" alt="Selfitime Photobooth" class="rounded-lg shadow-lg w-3/4 opacity-50">
    </section>

    <!-- OUR SERVICE SECTION -->
    <section class="bg-gray-100 py-10 mt-10">
        <h2 class="text-center text-pink-500 font-bold text-3xl mb-6">OUR SERVICE</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-10">
            <div class="text-center">
                <img src="../img/studio pro.jpg" alt="Studio Pro" class="rounded-lg shadow-lg w-full h-64 object-cover">
                <p class="bg-pink-500 text-white font-semibold py-2 mt-2 rounded-lg">STUDIO PRO</p>
            </div>
            <div class="text-center">
                <img src="../img/photoboo.jpg" alt="Photobooth" class="rounded-lg shadow-lg w-full h-64 object-cover">
                <p class="bg-pink-500 text-white font-semibold py-2 mt-2 rounded-lg">PHOTOBOOTH</p>
            </div>
            <div class="text-center">
                <img src="../img/id.jpg" alt="Poto ID" class="rounded-lg shadow-lg w-full h-64 object-cover">
                <p class="bg-pink-500 text-white font-semibold py-2 mt-2 rounded-lg">POTO ID</p>
            </div>
            <div class="text-center">
                <img src="../img/nikah.jpg" alt="Foto Nikah" class="rounded-lg shadow-lg w-full h-64 object-cover">
                <p class="bg-pink-500 text-white font-semibold py-2 mt-2 rounded-lg">FOTO NIKAH</p>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function goToLogin() {
            window.location.href = "login.html";
        }

        function goToSignup() {
            window.location.href = "signup.html";
        }

        document.addEventListener("DOMContentLoaded", function() {
            let loggedInUser = localStorage.getItem("loggedInUser");
            let navbarUser = document.getElementById("navbar-user");

            if (loggedInUser) {
                navbarUser.innerHTML = `<span class='text-white'>Selamat datang, ${loggedInUser}</span>
                                        <button class='bg-red-500 text-white px-4 py-2 rounded' onclick='logoutUser()'>Logout</button>`;
            }
        });

        function logoutUser() {
            localStorage.removeItem("loggedInUser");
            window.location.reload();
        }
    </script>
</body>

</html>
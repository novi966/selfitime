<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selfitime Photobooth</title>
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
        .pricing-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 200px;
        }

        .card img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .price {
            background-color: #f28b8b;
            padding: 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body class="bg-pink-100">
    <header class="bg-pink-400 p-4 flex justify-between items-center">
        <h1 class="text-white font-bold text-xl">SELFiTIME PHOTOBOOTH</h1>
        <nav>
            <ul class="flex space-x-4 text-white font-semibold">
                <li><a href="index.php">HOME</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
                <li><a href="price.php">PRICE LIST</a></li>
                <li><a href="">SELFI ONLINE</a></li>
                <li><a href="">CONTACT US</a></li>
            </ul>
        </nav>
        <div>
            <?php if(isset($_SESSION['user'])): ?>
            <span>👤
                <?php echo $_SESSION['user'];?>
            </span>
            <a href="logout.php" class="logout">Logout</a>
            <?php else: ?>
            <a class="text-white" href="login.php">Login</a>
            <a class="bg-pink-600 text-white px-4 py-2 rounded" href="daftar.php">Daftar</a>
            <?php endif; ?>
        </div>

    </header>

    <div class="pricing-container">
        <div class="card">
            <img src="collageA.jpg" alt="Photobooth Collage A">
            <h3>Photobooth Collage A</h3>
            <p>8x Shoot,</p>
            <p>All Digital Copies,</p>
            <p>1 Photo Print</p>
            <div class="price" onclick="bookNow(45000)">Rp 45.000</div>
        </div>
        <div class="card">
            <img src="collageB.jpg" alt="Photobooth Collage B">
            <h3>Photobooth Collage B</h3>
            <p>16x Shoot,</p>
            <p>All Digital Copies,</p>
            <p>2 Photo Print</p>
            <div class="price" onclick="bookNow(65000)">Rp 65.000</div>
        </div>
        <div class="card">
            <img src="stripA.jpg" alt="Photobooth Strip A">
            <h3>Photobooth Strip A</h3>
            <p>8x Shoot</p>
            <p>All Digital Copies,</p>
            <p>2 Photo Strip</p>
            <div class="price" onclick="bookNow(45000)">Rp 45.000</div>
        </div>
        <div class="card">
            <img src="stripB.jpg" alt="Photobooth Strip B">
            <h3>Photobooth Strip B</h3>
            <p>16x Shoot,</p>
            <p>All Digital Copies,</p>
            <p>4 Photo Strip</p>
            <div class="price" onclick="bookNow(65000)">Rp 65.000</div>
        </div>
    </div>
    <script>
        function bookNow(price) {
            window.location.href = `booking.php?price=${price}`;
        }
    </script>

    <script>
        function goToLogin() {
            window.location.href = "login.html";
        }

        function goToSignup() {
            window.location.href = "signup.html";
        }

        document.addEventListener("DOMContentLoaded", function () {
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
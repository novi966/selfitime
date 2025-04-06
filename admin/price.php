<?php
session_start();
require_once('../koneksi.php');

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


    <!-- OUR SERVICE SECTION -->
    <section class="py-10 mt-10">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Total Paket</th>
                    <th>Total Soft Copy</th>
                    <th>Total Hard Copy</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Ambil data dari database
                $sql = "SELECT * FROM prices";
                $prices = mysqli_query($koneksi, $sql);

                foreach ($prices as $price) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $price['nama_paket'] ?></td>
                        <td><?= $price['total_foto'] ?></td>
                        <td><?= $price['total_softcopy'] ?></td>
                        <td><?= $price['total_photostrip'] ?></td>
                        <td>
                            <a href="edit_price.php?id_price=<?= $price['id_price'] ?>" type="button" class="btn btn-warning btn-md">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function editPrice(price) {

        }

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
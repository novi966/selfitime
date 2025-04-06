<?php
session_start();
require_once('../koneksi.php');
if (!isset($_SESSION['nama'])) {
    header("Location: ../index.php");
}

if (isset($_POST['editPrice'])) {
    $id = $_POST["id_price"];
    $nama_paket = $_POST['nama_paket'];
    $total_foto = $_POST['total_foto'];
    $total_softcopy = $_POST['total_softcopy'];
    $total_photostrip = $_POST['total_photostrip'];

    // Cek apakah data yang dikirim ada
    $query = "UPDATE prices SET
                nama_paket = '$nama_paket',
                total_foto = '$total_foto',
                total_softcopy = '$total_softcopy',
                total_photostrip = '$total_photostrip'
                WHERE id_price = $id  
                ";

    mysqli_query($koneksi, $query);

    // Apabila query update sukses
    if ($query) {
        echo "<script>
                alert('Data Berhasil Diperbarui');
                document.location.href = 'price.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diperbarui');
                document.location.href = 'price.php';
            </script>";
    }
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
        <div>
            <?php if (isset($_SESSION['user'])) : ?>
                <span>👤
                    <?php echo $_SESSION['user']['nama']; ?>
                </span>
                <a href="../logout.php" class="logout">Logout</a>
            <?php else : ?>
                <a class="text-white" href="login.php">Login</a>
                <a class="bg-pink-600 text-white px-4 py-2 rounded" href="daftar.php">Daftar</a>
            <?php endif; ?>
        </div>

    </header>

    <!-- OUR SERVICE SECTION -->
    <section class="bg-gray-100 py-10 mt-10">
        <div class="container">
            <?php
            $id = $_GET['id_price'];
            $sql = "SELECT * FROM prices WHERE id_price='$id'";
            $edits = mysqli_query($koneksi, $sql);
            foreach ($edits as $edit) {
            ?>
                <form method="post" action="">
                    <input type="hidden" name="id_price" id="id_price" value="<?= $edit['id_price'] ?>">
                    <div class="mb-3 row">
                        <label for="nkb" class="col-sm-2 col-form-label">
                            Nama Paket
                        </label>
                        <div class="col-sm-10">
                            <input required type="text" name="nama_paket" class="form-control" value="<?= $edit['nama_paket']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nkb" class="col-sm-2 col-form-label">
                            Total Foto
                        </label>
                        <div class="col-sm-10">
                            <input required type="text" name="total_foto" class="form-control" value="<?= $edit['total_foto']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nkb" class="col-sm-2 col-form-label">
                            Total Softcopy
                        </label>
                        <div class="col-sm-10">
                            <input required type="text" name="total_softcopy" class="form-control" value="<?= $edit['total_softcopy']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nkb" class="col-sm-2 col-form-label">
                            Total Photo Strip
                        </label>
                        <div class="col-sm-10">
                            <input type="text" required name="total_photostrip" class="form-control" id="nkb" value="<?= $edit['total_photostrip']; ?>">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <a href="javascript:history.back()" type="button" style="float: right;" class="btn btn-danger">
                                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                                Kembali
                            </a>
                            <button class="btn btn-icon btn-3 btn-default btn-primary mx-2" type="submit" style="float: right;" name="editPrice">
                                <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                                <span class="btn-inner--text">Simpan</span>
                            </button>
                        </div>
                    </div>
                <?php }; ?>
                </form>
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
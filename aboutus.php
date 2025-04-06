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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff5f5;
            text-align: center;
        }

        
        .logout {
            background-color: white;
            color: #d63384;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h1 {
            color: #d47f7f;
        }

        p {
            color: #555;
            text-align: justify;
            line-height: 1.6;
        }

        .services {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 20px;
        }

        .service-box {
            position: relative;
            background: #ffdede;
            padding: 20px;
            border-radius: 10px;
            width: 250px;
            text-align: center;
            overflow: hidden;
        }

        .service-box img {
            width: 100%;
            border-radius: 10px;
            transition: opacity 0.3s;
        }

        .service-box .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 10px;
        }

        .service-box:hover .overlay {
            opacity: 1;
        }

        .service-box:hover img {
            opacity: 0.3;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .feature {
            width: 150px;
            padding: 10px;
            background: #ffdede;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .feature img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }

        .footer {
            background-color: #FFC0CB;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .footer div {
            margin: 10px;
        }

        .footer h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer a {
            display: block;
            color: black;
            text-decoration: none;
            margin: 5px 0;
        }

        .footer img {
            width: 120px;
            margin-top: 10px;
        }

        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        .social-icons img {
            width: 30px;
        }

        .copyright {
            text-align: center;
            padding: 10px;
            background-color: #FFD1DC;
            font-size: 14px;
        }

        .about-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .text-content {
            width: 60%;
            text-align: justify;
            line-height: 1.6;
        }

        .logo {
            width: 30%;
            display: flex;
            justify-content: flex-end;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="bg-pink-100">
    <header class="bg-pink-400 p-4 flex justify-between items-center">
        <h1 class="text-white font-bold text-xl">SELFiTIME PHOTOBOOTH</h1>
        <nav>
            <ul class="flex space-x-4 text-white font-semibold">
                <li><a href="index.php">HOME</a></li>
                <li><a href="">ABOUT US</a></li>
                <li><a href="price.php">PRICE LIST</a></li>
                <li><a href="#catalog">FRAME CATALOG</a></li>
                <li><a href="#contact">CONTACT US</a></li>
            </ul>
        </nav>
        <div>
            <?php if(isset($_SESSION['user'])): ?>
            <span>👤
                <?php echo $_SESSION['user']; ?>
            </span>
            <a href="logout.php" class="logout">Logout</a>
            <?php else: ?>
            <a class="text-white" href="login.php">Login</a>
            <a class="bg-pink-600 text-white px-4 py-2 rounded" href="daftar.php">Daftar</a>
            <?php endif; ?>
        </div>
    </header>

    <section class="relative text-center text-pink-500 font-bold text-3xl mt-10">
        <h2>ABOUT US</h2>
    </section>
    <section class="flex justify-center mt-10">
        <img src="img/464279181_18244929391263983_4581912891312375022_n.jpg" alt="Selfitime Photobooth"
            class="rounded-lg shadow-lg w-5/4">
    </section>

    <section class="about-section">
        <div class="text-content">
            <p>Terinspirasi dari trend photobooth yang ada di Korea Selatan, Selfie Time hadir di Indonesia sebagai
                pelopor pertama Photobooth yang mengusung tema 'Korean Photobooth'. Memberikan pengalaman unik kepada
                para
                pengunjung dan selalu mengedepankan kualitas. Berdiri sejak 2022, kini Selfie Time memiliki lebih dari
                40 cabang yang tersebar di seluruh Indonesia.</p>
        </div>
        <div class="logo">
            <img src="img/favicon.png" alt="Selfie Time Logo">
        </div>
    </section>
    <div class="features">
        <div class="feature">
            <img src="img/dslr (1).png" alt="DSLR Camera">
            <p>DSLR CAMERA</p>
        </div>
        <div class="feature">
            <img src="img/acsesories.png" alt="Aksesoris Lengkap">
            <p>AKSESORIS YANG LENGKAP</p>
        </div>
        <div class="feature">
            <img src="img/frame.png" alt="Up To Date Frames">
            <p>UP TO DATE FRAMES</p>
        </div>
        <div class="feature">
            <img src="img/price.png" alt="Harga Terjangkau">
            <p>HARGA TERJANGKAU</p>
        </div>
        <div class="feature">
            <img src="img/sofware.png" alt="Software User-Friendly">
            <p>SOFTWARE USER-FRIENDLY</p>
        </div>
        <div class="feature">
            <img src="img/higth.png" alt="High Quality Prints">
            <p>HIGH QUALITY PRINTS</p>
        </div>
    </div>
    <section class="relative text-center text-pink-500 font-bold text-3xl mt-10">
        <h2>SERVICES</h2>
    </section>
    <div class="services">
        <div class="service-box">
            <img src="img/photoboo.jpg" alt="Photobooth">
            <div class="overlay">
                <h2>PHOTOBOOTH</h2>
                <p>Berkapasitas maksimal 4-5 orang dengan variasi background berbagai warna.</p>
            </div>
        </div>
        <div class="service-box">
            <img src="studiopro.jpg" alt="Studio Pro">
            <div class="overlay">
                <h2>STUDIO PRO</h2>
                <p>Studio profesional untuk foto berkualitas tinggi dengan pencahayaan sempurna.</p>
            </div>
        </div>
        <div class="service-box">
            <img src="photoid.jpg" alt="Photo ID">
            <div class="overlay">
                <h2>PHOTO ID</h2>
                <p>Foto resmi untuk berbagai keperluan seperti KTP, SIM, dan paspor.</p>
            </div>
        </div>
    </div> <!-- Tutup .services lebih awal -->

    <footer> <!-- Pindahkan <footer> ke sini -->
        <div class="footer">
            <div>
                <img src="img/favicon.png" alt="Selfie Time Logo">
            </div>
            <div>
                <h3>Profil Kami</h3>
                <a href="#">Profil</a>
                <a href="#">Outlets</a>
                <a href="#">Kontak</a>
                <a href="#">Blog</a>
            </div>
        </div>
        <div class="social-icons">
            <img src="instagram.png" alt="Instagram">
            <img src="twitter.png" alt="Twitter">
            <img src="youtube.png" alt="YouTube">
            <img src="whatsapp.png" alt="WhatsApp">
        </div>
        <div class="copyright">
            Selfie Time ID 2025 - &copy; PT FOTOBOX KREASI INDONESIA
        </div>
    </footer>


</body>

</html>
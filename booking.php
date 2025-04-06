<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Photobooth</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #d7006d;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
        }
        #qr-code {
            display: none;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulir Booking</h2>
        <form action="process_booking.php" method="POST" enctype="multipart/form-data">
            <label>Harga:</label>
            <input type="text" id="harga" name="harga" readonly>

            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Tanggal Booking:</label>
            <input type="date" name="tanggal" required>

            <label>Warna Background:</label>
            <input type="text" name="background" required>

            <label>Jumlah Orang:</label>
            <input type="number" name="jumlah_orang" required>

            <label>Metode Pembayaran:</label>
            <input type="text" name="metode_pembayaran" id="metode_pembayaran" value="QRIS" readonly onclick="showQR()">

            <div id="qr-code">
                <p>Silakan scan QR Code di bawah untuk melakukan pembayaran:</p>
                <img src="qris_qr_code.png" alt="QR Code QRIS" width="200">
            </div>

            <label>Status Pembayaran:</label>
            <select name="status_pembayaran">
                <option value="DP">DP</option>
                <option value="Lunas">Lunas</option>
            </select>

            <label>Jumlah Pembayaran:</label>
            <input type="number" name="jumlah_pembayaran" required>

            <label>Bukti Pembayaran:</label>
            <input type="file" name="bukti_pembayaran" required>

            <button type="submit">Pesan Sekarang</button>
        </form>
    </div>

    <script>
        function showQR() {
            document.getElementById("qr-code").style.display = "block";
        }
        
        // Mendapatkan harga dari parameter URL
        const params = new URLSearchParams(window.location.search);
        document.getElementById("harga").value = params.get("price") || "";
    </script>
</body>
</html>

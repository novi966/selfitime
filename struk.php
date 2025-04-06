<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "selfitime_db";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    die("ID booking tidak ditemukan.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM bookings WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Data tidak ditemukan.");
}

$data = $result->fetch_assoc();
$conn->close();
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pemesanan</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #000;
            text-align: left;
        }
        h2 {
            text-align: center;
        }
        .qr {
            text-align: center;
        }
        .garis {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2>Struk Pemesanan</h2>
    <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
    <p><strong>Email:</strong> <?php echo $data['email']; ?></p>
    <p><strong>Tanggal Booking:</strong> <?php echo $data['tanggal']; ?></p>
    <p><strong>Jumlah Orang:</strong> <?php echo $data['jumlah_orang']; ?></p>
    <p><strong>Harga:</strong> Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></p>
    <p><strong>Metode Pembayaran:</strong> <?php echo $data['metode_pembayaran']; ?></p>
    <p><strong>Status Pembayaran:</strong> <?php echo $data['status_pembayaran']; ?></p>
    
    <div class="garis"></div>
    <p><strong>Total Bayar:</strong> Rp <?php echo number_format($data['jumlah_pembayaran'], 0, ',', '.'); ?></p>
    <p><strong>Keterangan:</strong> <?php echo ($data['status_pembayaran'] == 'Lunas') ? 'Sudah Lunas' : 'Belum Lunas'; ?></p>
    
    <?php if ($data['metode_pembayaran'] == 'QRIS') { ?>
        <div class="qr">
            <p>Scan QR Code untuk pembayaran:</p>
            <img src="qris_code.png" alt="QR Code" width="200">
        </div>
    <?php } ?>
    <div class="garis"></div>
    <p>Terima kasih telah memesan!</p>
    <div>
    <button class="btn" onclick="window.print()">Cetak Struk</button>
    </div>
    <img src="qrcodes/<?php echo $id; ?>.png" alt="QR Code">

</body>
</html>

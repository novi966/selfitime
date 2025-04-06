<?php
session_start();
require 'vendor/autoload.php'; // Pastikan autoload dipanggil
require 'vendor/phpqrcode/qrlib.php';

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "selfitime_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga = $_POST['harga'];
    $nama = $_POST['nama'];  
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $background = $_POST['background'];
    $jumlah_orang = $_POST['jumlah_orang'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $status_pembayaran = $_POST['status_pembayaran'];
    $jumlah_pembayaran = $_POST['jumlah_pembayaran'];

    // Upload bukti pembayaran
    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($bukti_pembayaran);
    move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $target_file);

    // Simpan ke database
    $sql = "INSERT INTO bookings (harga, nama, email, tanggal, background, jumlah_orang, metode_pembayaran, status_pembayaran, jumlah_pembayaran, bukti_pembayaran) 
            VALUES ('$harga', '$nama', '$email', '$tanggal', '$background', '$jumlah_orang', '$metode_pembayaran', '$status_pembayaran', '$jumlah_pembayaran', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        $booking_id = $conn->insert_id;

        // Generate URL untuk struk
        $url_struk = "http://localhost/mencobs/struk.php?id=" . $booking_id;

        // Folder untuk menyimpan QR Code
        $qr_file = "qrcodes/" . $booking_id . ".png";
        
        // Generate QR Code
        QRcode::png($url_struk, $qr_file, QR_ECLEVEL_L, 5);

        // Redirect ke halaman QR Code
        header("Location: show_qr.php?id=$booking_id");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php
if (!isset($_GET['id'])) {
    die("ID booking tidak ditemukan.");
}

$booking_id = $_GET['id'];
$qr_file = "qrcodes/" . $booking_id . ".png";
$pdf_file = "struk/" . $booking_id . ".pdf";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        img {
            width: 200px;
        }
    </style>
</head>
<body>
    <h2>Scan QR Code untuk Melihat Struk</h2>
    <img src="<?php echo $qr_file; ?>" alt="QR Code">
    <p><a href="<?php echo $pdf_file; ?>" target="_blank">Lihat Struk</a></p>
</body>
</html>

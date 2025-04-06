<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;

header('Content-Type: image/png');


// Tangkap parameter ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : 'default'; 

// Data yang akan dimasukkan ke dalam QR Code
$data = "https://localhost/mencobs/struk.php?id=" . urlencode($id);

// Buat QR Code
$qrCode = QrCode::create($data)
    ->setEncoding(new Encoding('UTF-8'))
    ->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH)
    ->setSize(300)
    ->setMargin(10)
    ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
    ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0])
    ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255]);

// Simpan atau Tampilkan QR Code
$writer = new PngWriter();
$result = $writer->write($qrCode);
echo $result->getString();
?>

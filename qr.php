<?php
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Label\Label;

$qrCode = QrCode::create('https://localhost/mencobs/struk.php?id=')
    ->setSize(300)
    ->setMargin(10)
    ->setForegroundColor(new Color(255, 0, 0)) // Warna QR Code merah
    ->setBackgroundColor(new Color(255, 255, 255)) // Background putih
    ->setWriter(new PngWriter());

// Tambahkan logo
$logo = Logo::create(__DIR__.'/logo.png')->setResizeToWidth(50);
$qrCode->setLogo($logo);

// Tambahkan teks di bawah QR Code
$label = Label::create('Scan Me!')->setTextColor(new Color(0, 0, 255)); // Warna biru
$qrCode->setLabel($label);

// Tampilkan gambar
header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();
?>



-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2025 pada 13.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selfitime_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `background` varchar(50) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `status_pembayaran` enum('DP','Lunas') NOT NULL,
  `jumlah_pembayaran` decimal(10,2) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `harga`, `nama`, `email`, `tanggal`, `background`, `jumlah_orang`, `metode_pembayaran`, `status_pembayaran`, `jumlah_pembayaran`, `bukti_pembayaran`, `created_at`) VALUES
(1, '45000', 'ANASTASYA PUTRI', 'anastasyaaaputrii@gmail.com', '2025-03-25', 'pink', 2, '', 'DP', 250000.00, 'uploads/Story Instagram Produk Kecantikan Struk Kreatif Sage.png', '2025-03-23 12:28:06'),
(2, '45000', 'novita', 'novitaardilla81@smk.belajar.id', '2025-03-31', 'biru', 2, '', 'DP', 25000.00, 'uploads/Story Instagram Produk Kecantikan Struk Kreatif Sage.png', '2025-03-23 13:34:38'),
(3, '45000', 'pajar', 'q@gmail.com', '2025-03-24', 'biru', 3, '', 'DP', 10000.00, 'uploads/WhatsApp Image 2025-02-20 at 20.54.41.jpeg', '2025-03-23 13:58:42'),
(4, '45000', 'muhammad', 'noviy@gmail.com', '2025-03-31', 'pink', 4, '', 'Lunas', 45000.00, 'uploads/Story Instagram Produk Kecantikan Struk Kreatif Sage.png', '2025-03-23 14:01:44'),
(5, '45000', 'fajar', 'noviy@gmail.com', '2025-03-31', 'merah', 3, '', 'Lunas', 45000.00, 'uploads/Story Instagram Produk Kecantikan Struk Kreatif Sage.png', '2025-03-23 14:15:38'),
(6, '45000', 'fajar', 'noviy@gmail.com', '2025-03-31', 'merah', 3, '', 'Lunas', 45000.00, 'uploads/Story Instagram Produk Kecantikan Struk Kreatif Sage.png', '2025-03-23 14:25:11'),
(7, '45000', 'muha', 'neshakilianan@gmail.com', '2025-03-31', 'pink', 2, '', 'DP', 15000.00, 'uploads/Story Instagram Produk Kecantikan Struk Kreatif Sage.png', '2025-03-24 08:53:32'),
(8, '65000', 'psmungkas', 'pamungkas@gmail.com', '2025-03-25', 'hitam', 2, '', 'DP', 50000.00, 'uploads/A.jpg', '2025-03-24 13:55:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `no_telp`, `username`, `password`) VALUES
('', 'admin', 'admin@gmail.com', '08878909', 'administrasi', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`) VALUES
(1, 'administrasi', 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(2, NULL, 'admin12', '202cb962ac59075b964b07152d234b70', 'anastasyaaaputrii@gmail.com'),
(3, 'ANASTASYA PUTRI', 'pamungkaspjr', '1c6b9de42bfda32395ac47576ed4bf1c', 'anastasyaaputrii@gmail.com'),
(4, 'pajar', 'pamungkaspjr', 'b59c67bf196a4758191e42f76670ceba', 'anastasyaaoutrii@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

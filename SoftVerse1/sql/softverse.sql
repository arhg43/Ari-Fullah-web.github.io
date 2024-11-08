-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2024 pada 12.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softverse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id_comments`, `id_user`, `id`, `rating`, `comment`, `comment_date`) VALUES
(1, 1, 1, 5, 'bagus', '2024-11-06 02:14:31'),
(2, 2, 1, 1, 'jelek', '2024-11-06 02:15:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `nama_software` varchar(255) NOT NULL,
  `tanggal_uploads` date NOT NULL,
  `deskripsi` text NOT NULL,
  `versi` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `crud`
--

INSERT INTO `crud` (`id`, `nama_software`, `tanggal_uploads`, `deskripsi`, `versi`, `foto`, `file`) VALUES
(1, 'opera', '2024-11-07', 'Opera adalah peramban web dan paket perangkat lunak Internet lintas platform. Opera terdiri dari kumpulan perangkat lunak untuk Internet seperti peramban web, serta perangkat lunak untuk membaca dan mengirim surat elektronik. Opera dibuat oleh Opera Software yang bermarkas di Oslo, Norwegia. ', '2.2443.7.0', 'unnamed.png', 'OperaSetup.exe'),
(2, 'WhatsApp ', '2024-11-07', 'WhatsApp adalah aplikasi perpesanan instan dan panggilan suara dan video yang memungkinkan penggunanya untuk berkomunikasi dengan orang lain. WhatsApp dapat diunduh secara gratis di berbagai perangkat seluler dan diakses dari komputer.', '2.23.12.75', 'f71ffb7ad7db43ccc7b1466de418f254.jpg', 'WhatsApp Installer.exe'),
(3, 'Vlc Media Player', '2024-11-08', 'VLC media player adalah pemutar multimedia yang dapat memutar berbagai format file, termasuk DVD, CD audio, VCD, dan berbagai protokol streaming. VLC juga dapat melakukan perekaman, penyuntingan, dan pemotongan video dasar.', '3.0.21', '006070100_1613194680-VLC_3.jpg', 'vlc-media-player-3.0.21-installer_Z7L88-1.exe'),
(4, 'avg secure browser', '2024-11-08', 'AVG Browser adalah browser aman tingkat berikutnya dengan alat canggih yang benar-benar menjaga privasi Anda. Fitur seperti VPN bawaan, pemblokir iklan otomatis, enkripsi data total, kunci PIN unik, dan banyak lagi.', '126.0.25735.183', 'AVG-Secure-Browser-2.png', 'avg_secure_browser_setup.exe'),
(5, 'Cloud Mounter', '2024-11-08', 'CloudMounter adalah aplikasi yang bisa digunakan untuk mengakses banyak akun dari beberapa cloud service sekaligus sehingga user tidak perlu repot-repot mengakses file yang sudah dicadangkan dengan download masing-masing layanan cloud tersebut.\r\n\r\nAplikasi ini menawarkan cara baru manajemen file berbasis komputasi awan yang lebih simpel dan ringkas. Dengan begitu, user akan merasakan pengalaman pengelolaan data yang sederhana.', '2.0.1704', 'images (1).jpeg', 'CloudMounter.2.0.1704.NesabaMedia.exe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `age`, `password`) VALUES
(1, 'ari', 'ari@gmail.com', 0, '$2y$10$bhf127coKnBk80Ycf7AKhOTlVy7igveIII.qY2b6/tH2Q.RlrHS1y'),
(2, 'vashih', 'vashih@gmail.com', 0, '$2y$10$4pd/95xwFvpb4qHPNSYIb.g72h5aIhIOIqkp9zjYIqIU3PUO4EVLy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id`) REFERENCES `crud` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

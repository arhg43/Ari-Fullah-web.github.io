-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2024 pada 04.39
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_pengisi_feedback`
--

CREATE TABLE `daftar_pengisi_feedback` (
  `no_hp` int(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `saran` varchar(100) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_pengisi_feedback`
--

INSERT INTO `daftar_pengisi_feedback` (`no_hp`, `nama`, `gmail`, `tanggal`, `saran`, `nama_file`) VALUES
(8232334, 'a2', 'ar@gmail.com', '2024-10-29', 'bdhsddjfbjhbdusnjcd', '2024-10-23 04.38.02.jpg'),
(2147483647, 'ARI FULLAH', 'ari@gmail.com', '2024-10-30', 'jbsbchbhjbdvfhvjhdbvdhfv', '2024-10-23 04.36.01.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'mahasiswa', '$2y$10$5i6YVZuHpSQByEwFRzch3.bYabdKsdKMvD.IhaQmWGUAUKnUBgNe2', 'Admin'),
(2, 'a', '$2y$10$Q.8KQZ9wQstjtzEO62rT2.MByh9CoioXF2bs1J/UY6Wdm/SjSEzqe', 'User'),
(3, 's', '$2y$10$xPROSJ95X7jhzgDOfWReR.O7ABS4l7yxayUKuTiZoftzNbvYtSfru', 'User'),
(4, 'aa', '$2y$10$J2U1tK5Wkf0fhG.EscMzbeozUt4lFw8dClqAvIEvSX.GMtaTFHsAq', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_pengisi_feedback`
--
ALTER TABLE `daftar_pengisi_feedback`
  ADD PRIMARY KEY (`no_hp`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_pengisi_feedback`
--
ALTER TABLE `daftar_pengisi_feedback`
  MODIFY `no_hp` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

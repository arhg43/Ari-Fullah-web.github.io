-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 04:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `daftar_pengisi_feedback`
--

CREATE TABLE `daftar_pengisi_feedback` (
  `no_hp` int(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `saran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_pengisi_feedback`
--

INSERT INTO `daftar_pengisi_feedback` (`no_hp`, `nama`, `gmail`, `tanggal`, `saran`) VALUES
(7, 'ARI FULLAH', 'ari@gmail.com', '2024-10-22', 'z'),
(8, 'ARI FULLAH', 'ari@gmail.com', '2024-10-01', 'a'),
(9, 'ARI FULLAH', 'ari@gmail.com', '2024-10-01', 'z\r\n'),
(8130, '05iyi -078k-8 ', 'ari@gmail.com', '2024-10-24', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_pengisi_feedback`
--
ALTER TABLE `daftar_pengisi_feedback`
  ADD PRIMARY KEY (`no_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_pengisi_feedback`
--
ALTER TABLE `daftar_pengisi_feedback`
  MODIFY `no_hp` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

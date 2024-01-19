-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2024 at 02:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_zero`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pendidikan`
--

CREATE TABLE `data_pendidikan` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(7) NOT NULL,
  `nama_sekolah` varchar(35) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `tahun_mulai` int(4) NOT NULL,
  `tahun_selesai` int(4) NOT NULL,
  `nilai_akhir` float(4,2) NOT NULL,
  `bersertifikat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pendidikan`
--

INSERT INTO `data_pendidikan` (`id`, `tingkat`, `nama_sekolah`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `nilai_akhir`, `bersertifikat`) VALUES
(2, 'S1', 'Universitas BSI BSD', 'Teknologi Informasi', 2022, 2024, 9.80, 'Ya'),
(3, 'S1', 'Universitas Gadjah Mada', 'Manajemen', 2018, 2022, 8.90, 'Ya'),
(6, 'SMA/SMK', 'SMA Negeri 5 Surabaya', 'IPS', 2011, 2014, 8.00, 'Tidak'),
(8, 'SMA/SMK', 'SMK Bisnis Jakarta', 'Administrasi Perkantoran', 2009, 2012, 8.00, 'Tidak'),
(10, 'S1', 'Institut Teknologi Bandung', 'Teknik Elektro', 2015, 2019, 9.00, 'Ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

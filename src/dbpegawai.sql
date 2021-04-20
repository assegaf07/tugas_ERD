-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 10:24 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama`) VALUES
(1, 'HRD'),
(2, 'keuangan'),
(3, 'marketing'),
(4, 'operasional');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fullname`, `username`, `role`, `foto`, `password`) VALUES
(1, 'Iqbal', 'manager1', 'manager', 'foto.jpg', 'dfbaa3b61caa3a319f463cc165085aa8c822d2ce'),
(2, 'Tolib', 'admin1', 'admin', 'foto.jpg', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad'),
(3, 'Jusmen', 'staff', 'staff', 'foto.jpg', '6a91eb6ae9cc8e3a67d32b286c56c3431c1dc980');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `agama` enum('islam','kristen','hindu','budha','katolik','kong hucu') NOT NULL,
  `iddivisi` int(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `email`, `agama`, `iddivisi`, `foto`) VALUES
(1, '01', 'Udin fernandes', 'udin@kantor.com', 'islam', 1, 'hrd.png'),
(2, '02', 'Andre julianto', 'andre@kantor.com', 'kristen', 2, 'keuangan.png'),
(3, '03', 'Hanuman ', 'hanuman@sungokong.com', 'hindu', 3, 'marketing.png'),
(4, '04', 'we khing khong', 'kihingkhong@kantor.com', 'budha', 3, 'keuangan.png'),
(5, '05', 'dadang subur', 'dewakipas@catur.com', 'islam', 4, 'marketing.png'),
(7, '07', 'tjang katjang', 'katjang@garuda.com', 'kong hucu', 2, 'noimage.png'),
(10, '1111', 'jusman kabes siregar', 'j@man.com', 'islam', 2, 'noimage.png'),
(12, '0091', 'Solihun Kabes', 'solih@mihun.com', 'islam', 2, 'noimage.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `iddivisi` (`iddivisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`iddivisi`) REFERENCES `divisi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

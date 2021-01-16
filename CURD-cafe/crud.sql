-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2021 at 05:05 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `id_cafe` int(11) NOT NULL,
  `nama_coffe` varchar(32) NOT NULL,
  `tanggal_cafe` date NOT NULL,
  `penggunjung_cafe` int(255) NOT NULL,
  `hasil_cafe` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`id_cafe`, `nama_coffe`, `tanggal_cafe`, `penggunjung_cafe`, `hasil_cafe`) VALUES
(25188, 'hot americano', '2021-01-10', 15, 250000),
(25189, 'Ristretto', '2021-01-10', 13, 370000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id_cafe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id_cafe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25190;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2021 at 09:25 PM
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
-- Database: `Car Dealer2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'CarDealerSKY.com', 'cardealerSKY', 'SKY Car Dealer');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `id_customers` int(11) NOT NULL,
  `email_customers` text NOT NULL,
  `password_customers` varchar(50) NOT NULL,
  `name_customers` varchar(100) NOT NULL,
  `wish_customers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`id_customers`, `email_customers`, `password_customers`, `name_customers`, `wish_customers`) VALUES
(2, 'faravishah@gmail.com', 'fara17', 'Fara Vishah', 'Hyundai Palaside'),
(6, 'rizaldizerevan@gmail.com', 'riezaldi', 'Riezaldi Zerevan', 'Tesla Model X 2021');

-- --------------------------------------------------------

--
-- Table structure for table `Entry`
--

CREATE TABLE `Entry` (
  `id_new_merk` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Entry`
--

INSERT INTO `Entry` (`id_new_merk`, `id_transaction`, `id_merk`) VALUES
(1, 1, 2),
(2, 2, 5),
(3, 3, 2),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Merk`
--

CREATE TABLE `Merk` (
  `id_merk` int(11) NOT NULL,
  `name_mek` varchar(100) NOT NULL,
  `price_merk` int(11) NOT NULL,
  `weight_merk` int(11) NOT NULL,
  `description_merk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Merk`
--

INSERT INTO `Merk` (`id_merk`, `name_mek`, `price_merk`, `weight_merk`, `description_merk`) VALUES
(1, 'Hyundai Palaside', 877000000, 1820, 'The Hyundai Palisade is a mid-size SUV manufactured by Hyundai Motor Company since late 2018. It debuted at the 2018 Los Angeles Auto Show on November 28, 2018.[5] It replaces the Maxcruz (also known as Santa Fe XL outside of South Korea) as the flagship SUV under the Hyundai brand.'),
(2, 'Hyundai Tucson', 571000000, 1720, 'All New Hyundai Tucson 2016. This South Korean car company launched its first compact crossover in 2014, which is positioned below Veracruz and Santa Fe. Borrowing the name of a city in Arizona, namely Tucson, this latest edition of Tucson will certainly compete with the Honda CR-V.'),
(3, 'Mercedes-Benz C 200', 1230000000, 1505, 'The facelift versions of the Mercedes-Benz C-Class, C200 and C300 products finally came with a variety of changes. Even though there were only minor changes to the exterior, now the C-Class is more feature-rich and completely sophisticated.'),
(4, 'Tesla Model X 2021', 999000000, 2390, 'Officially launched in 2015 with the 60D capacity variant type. Global sales touched 10,000 units until August 2016. Tesla then spawned the Model X P100D variant. The increase is significant, the battery capacity and performance increase'),
(5, 'Toyota New Alphard', 1212650000, 2070, 'he Toyota Alphard (Japanese: トヨタ・アルファード, Toyota Arufādo) is a minivan produced by the Japanese automaker Toyota since 2002. It is available as a seven- or eight-seater with petrol and hybrid engine options. Hybrid variants have been available since 2003, and it incorporates Toyota\'s Hybrid Synergy Drive technology.');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `date_transaction` date NOT NULL,
  `amount_transaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_customers`, `date_transaction`, `amount_transaction`) VALUES
(1, 1, '2020-12-17', 877000000),
(2, 2, '2020-11-30', 877000000),
(3, 2, '2021-01-01', 1230000000),
(4, 3, '2021-01-10', 999000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`id_customers`),
  ADD UNIQUE KEY `hope_customers` (`id_customers`);

--
-- Indexes for table `Entry`
--
ALTER TABLE `Entry`
  ADD PRIMARY KEY (`id_new_merk`);

--
-- Indexes for table `Merk`
--
ALTER TABLE `Merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `id_customers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Entry`
--
ALTER TABLE `Entry`
  MODIFY `id_new_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Merk`
--
ALTER TABLE `Merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

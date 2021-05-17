-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 01:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` int(10) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `socket` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `name`, `price`, `socket`, `icon`) VALUES
(1, 'INTEL_Core_i5-10400F', 4780, 'LGA1200', 'intel'),
(2, 'AMD_Ryzen_5_3600', 6740, 'AM4', 'amd');

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`id`, `name`, `price`, `icon`) VALUES
(1, 'NVIDIA_RTX_3060Ti', 12590, 'rtx'),
(2, 'GIGABYTE_RTX_3060Ti_Eagle', 13900, 'rtx');

-- --------------------------------------------------------

--
-- Table structure for table `mtb`
--

CREATE TABLE `mtb` (
  `id` int(10) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `socket` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtb`
--

INSERT INTO `mtb` (`id`, `name`, `price`, `socket`, `icon`) VALUES
(1, 'GIGABYTE_B450M_AORUS_ELITE', 2615, 'AM4', 'gigabyte'),
(2, 'ASROCK_H470_Steel_Legend', 4340, 'LGA1200', 'asrock');

-- --------------------------------------------------------

--
-- Table structure for table `psu`
--

CREATE TABLE `psu` (
  `id` int(10) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psu`
--

INSERT INTO `psu` (`id`, `name`, `price`, `icon`) VALUES
(1, 'CORSAIR_CX750M', 2790, 'corsair'),
(2, 'SILVERSTONE_ST70F-ES230_700W_80plus', 1660, 'silverstone');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(10) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `name`, `price`, `icon`) VALUES
(1, 'KINGSTON_Hyper-X_Fury_DDR4_16GB_(16GBx1)_2400_Black', 2540, 'kingston'),
(2, 'Apacer_Panther_Rage_RGB_DDR4_16GB_(8GBx2)_2666_Gold', 1890, 'apacer');

-- --------------------------------------------------------

--
-- Table structure for table `savecom`
--

CREATE TABLE `savecom` (
  `id` int(11) NOT NULL,
  `cpu_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gpu_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mtb_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ram_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `psu_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `str_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `com_key` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savecom`
--

INSERT INTO `savecom` (`id`, `cpu_name`, `gpu_name`, `mtb_name`, `ram_name`, `psu_name`, `str_name`, `com_key`) VALUES
(2, 'AMD_Ryzen_5_3600', 'GIGABYTE_RTX_3060Ti_Eagle', 'GIGABYTE_B450M_AORUS_ELITE', 'KINGSTON_Hyper-X_Fury_DDR4_16GB_(16GBx1)_2400_Black', 'CORSAIR_CX750M', 'SAMSUNG_970_EVO_Plus_500GB_NVMe', 'adcb714ec5b74560be4a38800a61569d810187e7'),
(3, 'INTEL_Core_i5-10400F', '', '', '', '', '', '6f53099687c16c363cadb9c4d2cda0f0805e2ed2'),
(8, '', '', 'GIGABYTE_B450M_AORUS_ELITE', '', '', '', 'b7073f49c500612bdb5af246566ca23e09529310'),
(9, 'AMD_Ryzen_5_3600', 'NVIDIA_RTX_3060Ti', 'GIGABYTE_B450M_AORUS_ELITE', 'KINGSTON_Hyper-X_Fury_DDR4_16GB_(16GBx1)_2400_Black', 'SILVERSTONE_ST70F-ES230_700W_80plus', 'SAMSUNG_970_EVO_Plus_500GB_NVMe', '243c8ff49e1df20aefe46018dd9c483a5a0580dc');

-- --------------------------------------------------------

--
-- Table structure for table `str`
--

CREATE TABLE `str` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `str`
--

INSERT INTO `str` (`id`, `name`, `price`, `icon`) VALUES
(1, 'SAMSUNG_970_EVO_Plus_500GB_NVMe', 3420, 'samsung'),
(2, 'Western_Digital_Blue_1TB_WD10EZEX', 1015, 'wd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtb`
--
ALTER TABLE `mtb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psu`
--
ALTER TABLE `psu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savecom`
--
ALTER TABLE `savecom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `str`
--
ALTER TABLE `str`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mtb`
--
ALTER TABLE `mtb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `psu`
--
ALTER TABLE `psu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `savecom`
--
ALTER TABLE `savecom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `str`
--
ALTER TABLE `str`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

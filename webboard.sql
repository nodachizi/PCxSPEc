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
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'เรื่องทั่วไป'),
(2, 'เรื่องเรียน');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(20148) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `post_date`, `user_id`, `post_id`) VALUES
(5, 'เราว่ามันไม่อร่อย มันดูเลี่ยนมาก  แนะนำให้กินผัดผักโร่นี่ราดมัสตาด์', '2020-09-25 12:40:34', 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `post_date`, `cat_id`, `user_id`) VALUES
(0, 'ทดสอบการทำงาน APP Quick Read WBKK', 'กระทู้นี้ไม่มีเนื้อหาใดๆ', '2020-11-03 21:07:56', 1, 3),
(11, 'cat', '', '2020-09-18 18:24:22', 0, 0),
(12, 'qdqwd', '', '2020-09-18 18:24:34', 1, 0),
(14, 'อาหารกลางวัน', 'อาหารเพื่อสุขภาพ\r\nทูน่าสลัดผัก\r\nมาสตอสผัดผัก\r\nโรมานีเซียน', '2020-09-25 12:36:23', 1, 3),
(16, 'บทเรียนความรัก', 'รักทำให้คนตาบอด', '2020-09-25 12:46:12', 2, 5),
(18, 'ชีวิตใหม่', '555', '2020-11-03 21:07:56', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `gender`, `email`, `role`) VALUES
(1, 'jame', '8cb2237d0679ca88db6464eac60da96345513964', 'jame', 'm', 'jame@ho.co', 'm'),
(3, 'admin', '8dc9fa69ec51046b4472bb512e292d959edd2aef', 'admin', 'm', 'admin@admin', 'a'),
(5, 'cat', '8cb2237d0679ca88db6464eac60da96345513964', 'catcat', 'f', 'cat@cat', 'M'),
(6, 'sstfoxide', '9df647b909b1194eed96d1f45114a90323c1b6d1', 'ab', 'm', 'terngfoxid@live.jp', 'M'),
(7, 'sstfoxides', '9df647b909b1194eed96d1f45114a90323c1b6d1', 'N P', 'm', 'terngfoxid@kuy.hee', 'E'),
(8, 'boss', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'bbbb', 'm', 'bbbbb@mail.com', 'M'),
(9, 'boss2', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 'bb2@mail.com', 'E'),
(10, 'black', '8cb2237d0679ca88db6464eac60da96345513964', 'Deack Little', 'm', 'DeackLittle@gmail.com', 'E'),
(11, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', 'm'),
(12, 'terngfoxid', '9df647b909b1194eed96d1f45114a90323c1b6d1', 'fgfdg', 'o', 'g@j.k', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 02:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanden`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_obsolete`
--

CREATE TABLE `tb_obsolete` (
  `id` int(9) NOT NULL,
  `id_wi` int(9) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `notif` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obsolete`
--

INSERT INTO `tb_obsolete` (`id`, `id_wi`, `start_date`, `end_date`, `notif`) VALUES
(31, 38, '2020-11-01', '2020-12-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(9) NOT NULL,
  `nik` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nik`, `name`, `email`, `password`, `position`) VALUES
(2, 213, 'joko', 'joko@gmail.com', '12345', 'super'),
(10, 214, 'ade', 'ade@gmail.com', '12345', 'admin'),
(12, 215, 'budi', 'budi@gmail.com', '12345', 'staff'),
(15, 321, 'tirto', 'tirto@gmail.com', '12345', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wi`
--

CREATE TABLE `tb_wi` (
  `id` int(9) NOT NULL,
  `doc_code` varchar(255) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `revision` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL,
  `notif` int(11) NOT NULL,
  `id_requester` int(9) NOT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_obsolete`
--
ALTER TABLE `tb_obsolete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_wi`
--
ALTER TABLE `tb_wi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_obsolete`
--
ALTER TABLE `tb_obsolete`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_wi`
--
ALTER TABLE `tb_wi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

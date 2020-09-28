-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 10:42 AM
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
(27, 24, '2020-09-25', '2020-10-25', 1);

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
(1, 212, 'Harun', 'harun@gmail.com', '12345', 'staff'),
(2, 213, 'joko', 'joko@gmail.com', '12345', 'super'),
(10, 214, 'ade', 'ade@gmail.com', '12345', 'admin');

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
  `notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wi`
--

INSERT INTO `tb_wi` (`id`, `doc_code`, `doc_name`, `date`, `revision`, `status`, `notif`) VALUES
(24, '1', 'WI_1', '2020-09-23', '1', 'Y', 2),
(25, '2', 'WI_2', '2020-09-23', '12', 'Y', 2),
(26, '3', 'Wi_3', '2020-09-22', '1', 'Y', 2),
(27, '1', 'WI_4', '2020-09-25', '1', 'N', 1);

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_wi`
--
ALTER TABLE `tb_wi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

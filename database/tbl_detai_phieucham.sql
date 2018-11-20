-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2018 at 07:32 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detai_phieucham`
--

CREATE TABLE `tbl_detai_phieucham` (
  `pk_detai_phieucham_id` int(11) NOT NULL,
  `fk_madetai_id` int(11) NOT NULL,
  `fk_khoanmucdiem_id` int(11) NOT NULL,
  `ghi_chu` text NOT NULL,
  `y_kien` text NOT NULL,
  `xep_loai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detai_phieucham`
--
ALTER TABLE `tbl_detai_phieucham`
  ADD PRIMARY KEY (`pk_detai_phieucham_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detai_phieucham`
--
ALTER TABLE `tbl_detai_phieucham`
  MODIFY `pk_detai_phieucham_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

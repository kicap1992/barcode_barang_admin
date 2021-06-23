-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 11:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barcode_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_barang`
--

CREATE TABLE `tb_list_barang` (
  `id` varchar(14) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_list_barang`
--

INSERT INTO `tb_list_barang` (`id`, `nama`, `harga`) VALUES
('4970129000518', 'Snowman Whiteboard Marker Black', '5000'),
('4970129004516', 'Snowman Permanent  Marker Black', '10000'),
('8995757203748', 'asdasd', '4000'),
('8998866610162', 'Nuvo', '40000'),
('8999999502003', 'Teh Sari Murni Isi 6', '2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_list_barang`
--
ALTER TABLE `tb_list_barang`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

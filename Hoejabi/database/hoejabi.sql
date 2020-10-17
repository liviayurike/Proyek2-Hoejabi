-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 11:53 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoejabi`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Nama` varchar(30) NOT NULL,
  `No Telp/Wa` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Product` varchar(50) NOT NULL,
  `Harga` decimal(11,0) NOT NULL,
  `Total Harga` decimal(10,0) NOT NULL,
  `Via Pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Nama`, `No Telp/Wa`, `Alamat`, `Email`, `Product`, `Harga`, `Total Harga`, `Via Pembayaran`) VALUES
('nining', '0816893754', 'btn nyiur permai', 'nining@gmail.com', 'inner', '22', '22', 'atm'),
('nining', '0816893754', 'btn nyiur permai', 'nining@gmail.com', 'inner', '22000', '22000', 'atm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'Livia', '$2y$10$8KgT/zwD5J//zBFVFtoqJOzdalwsNlg2Q45yrX/4bsCaIVvnllXzK', 'Livia Yurike'),
(2, '', '$2y$10$mnZvXUnCDvRIZuXnXjCyq.oUTijylGNfkOt8cnUydBJEPG2QEjrEC', ''),
(3, '', '$2y$10$x.M.ogmRXUo2QxIUwGfsq.RTF/EijDDqkCsDhoCoU.mC6awWrAN1q', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

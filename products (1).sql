-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 01:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `SKU` varchar(20) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `Size` int(11) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `Dimension` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`SKU`, `NAME`, `PRICE`, `TYPE`, `Size`, `Weight`, `Dimension`) VALUES
('BCBCS1', 'finalchk', '100.00', 'DVD', 100, NULL, NULL),
('BJVHJVJH', 'Chai', '10.00', 'DVD', 10, NULL, NULL),
('dvsvds', 'sdf', '1.00', 'DVD', 1, NULL, NULL),
('FHJ45', 'Panchtantra', '45.00', 'Book', NULL, 4, NULL),
('FHJ456', 'devnagri', '45.00', 'Book', NULL, 2, NULL),
('FNVV232', 'Didsd', '234.00', 'DVD', 23, NULL, NULL),
('GGpw0012', 'Ramcnd', '590.00', 'Book', NULL, 3, NULL),
('GGWP0001', 'Jules Verne', '250.00', 'Book', NULL, 2, NULL),
('HEI123', 'Hello', '123.00', 'DVD', 123, NULL, NULL),
('JVC200101', 'Table', '4000.00', 'Furniture', NULL, NULL, '16X12X11'),
('NBMN5', 'DDS', '12.00', 'DVD', 560, NULL, NULL),
('NKK655', 'batt', '435.00', 'Furniture', NULL, NULL, '5X4X3'),
('saksdj', 'chk2', '10.00', 'DVD', 10, NULL, NULL),
('VNB656', 'HFJ', '45.00', 'DVD', 344, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`SKU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

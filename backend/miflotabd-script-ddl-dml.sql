-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 10:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miflotabd`
--
CREATE DATABASE IF NOT EXISTS `miflotabd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `miflotabd`;

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `placa` varchar(16) NOT NULL,
  `marca` varchar(48) NOT NULL,
  `modelo` varchar(10) NOT NULL,
  `agnio` int(11) NOT NULL,
  `color` varchar(32) NOT NULL,
  `consumo` varchar(32) NOT NULL,
  `kilometraje_actual` int(11) NOT NULL,
  `tipo_combustible` varchar(32) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehiculo`
--

INSERT INTO `vehiculo` (`placa`, `marca`, `modelo`, `agnio`, `color`, `consumo`, `kilometraje_actual`, `tipo_combustible`, `observaciones`) VALUES('ABC-123', 'Mazda', '2010', 2010, 'Negro', '100', 0, 'Gasolina', 'Ninguna');
INSERT INTO `vehiculo` (`placa`, `marca`, `modelo`, `agnio`, `color`, `consumo`, `kilometraje_actual`, `tipo_combustible`, `observaciones`) VALUES('ABC-789', 'Toyota', '2014', 2014, 'Negra', '1000', 0, 'Diesel', 'Ninguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`placa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

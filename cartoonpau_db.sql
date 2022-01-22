-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 09:37 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartoonpau_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `regdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`name`, `email`, `phone`, `address`, `regdate`) VALUES
('Farah Farzana', 'zana@gmail.com', '01110102858', 'Bandar Ampang, Ampang, Kuala Lumpur', '2022-01-19'),
('Laili Izzati', 'laili@gmail.com', '01115744542', 'Petaling Jaya Utama, Petaling Jaya, Selangor', '2022-01-19'),
('Hafizatul Aini', 'aini@gmail.com', '01152783799', 'Rantau Panjang, Klang, Selangor', '2022-01-19'),
('Batrisya Liyana', 'batrisya@gmail.com', '01160875693', 'Kg. Gajah, Teluk Intan, Perak', '2022-01-19'),
('Axzly Juni', 'axzly@gmail.com', '01165585092', 'Puchong Utama, Puchong, Selangor', '2022-01-19'),
('Farhana Elysha', 'fahana@gmail.com', '0134745448', 'Putra Perdana, Puchong, Selangor', '2022-01-19'),
('Ain Syahindah', 'ain@gmail.com', '0134935615', 'Seksyen 7, Shah Alam, Selangor', '2022-01-19'),
('Sumayyah ', 'maya@gmail.com', '0136546826', 'Kampung Jabi, Segamat, Johor', '2022-01-19'),
('Zahrah Thohirah', 'zahrah@gmail.com', '0172631617', 'Aman Putra, Puchong, Selangor', '2022-01-19'),
('Farah Liana', 'farah@gmail.com', '0189554982', 'Seri Manjung, Manjung, Perak', '2022-01-19'),
('Nadia', 'nadia@gmail.com', '0196650658', 'Pinggiran USJ, Shah Alam, Selangor', '2022-01-19'),
('Syuhada', 'syu@gmail.com', '0198476255', 'Taman Putra Perdana, Puchong, Selangor', '2022-01-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

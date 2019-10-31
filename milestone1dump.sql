-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2019 at 04:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SearchEngine`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `age` int(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `activation` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `activation2` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `username`, `emailId`, `age`, `country`, `gender`, `activation`, `activation2`) VALUES
(6, 'Alex@4321', 'alex', 'alex@gmail.com', 24, 'USA', 'Female', '', NULL),
(7, 'Sid@1234', 'Sid', 'sid@outlook.com', NULL, NULL, NULL, '', NULL),
(8, 'John@1234', 'John', 'john@gmail.com', NULL, NULL, NULL, '', NULL),
(9, 'Sam@1234', 'Sam', 'sam@gmail.com', NULL, NULL, NULL, '', NULL),
(10, 'Stark@1234', 'Stark', 'stark@gmail.com', 23, 'USA', 'Male', '', NULL),
(72, 'Shreya@1234', 'Shreya', 'shreyalibra22@gmail.com', NULL, NULL, NULL, 'f4dce00d93d895bcb246a17981661997', NULL),
(73, 'Abhi@1234', 'Abhilash', 'abhi158.aa@gmail.com', NULL, NULL, NULL, '3ef5404ffa3d9fc2a6ca07afcc936791', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

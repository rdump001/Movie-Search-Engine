-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2019 at 07:46 AM
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
-- Table structure for table `users`
--
CREATE DATABASE `SearchEngine`;
USE `SearchEngine`;

grant all privileges on *.* to 'root'@'localhost';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `age` int(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `username`, `emailId`, `age`, `country`, `gender`) VALUES
(6, 'Alex@1234', 'alex', 'alex@gmail.com', 24, 'USA', 'Female'),
(7, 'Sid@1234', 'Sid', 'sid@outlook.com', NULL, NULL, NULL),
(8, 'John@1234', 'John', 'john@gmail.com', NULL, NULL, NULL),
(9, 'Sam@1234', 'Sam', 'sam@gmail.com', NULL, NULL, NULL),
(10, 'Stark@1234', 'Stark', 'stark@gmail.com', 23, 'USA', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

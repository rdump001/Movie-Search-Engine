-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2019 at 05:37 PM
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
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `user` varchar(255) NOT NULL,
  `id` int(65) NOT NULL,
  `director_name` varchar(255) NOT NULL,
  `actor_1_name` varchar(255) NOT NULL,
  `genres` varchar(255) NOT NULL,
  `imdb_score` float NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`user`, `id`, `director_name`, `actor_1_name`, `genres`, `imdb_score`, `movie_title`, `time_stamp`) VALUES
('alex@gmail.com', 0, 'James Cameron', 'CCH Pounder', 'Action|Adventure|Fantasy|Sci-Fi', 7.9, 'AvatarÂ ', '2019-11-13 20:19:12'),
('alex@gmail.com', 161, 'Sam Raimi', 'J.K. Simmons', 'Action|Adventure|Fantasy|Romance', 7.3, 'Spider-ManÂ ', '2019-11-14 07:22:34'),
('alex@gmail.com', 3389, 'Will Gluck', 'Emma Stone', 'Comedy|Romance', 7.1, 'Easy AÂ ', '2019-11-13 04:40:07');

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
(72, 'Shreya@1234', 'Shreya', 'shreyalibra22@gmail.com', NULL, NULL, NULL, 'f4dce00d93d895bcb246a17981661997', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `activation` char(32) COLLATE utf8_bin NOT NULL,
  `activation2` char(32) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `activation`, `activation2`) VALUES
(16, 'rahul', 'rdump001@odu.edu', '6b806ab23d527b3473f81062395dda3341a014d742e1c98ddb8e3645c59a46bd', 'bad10d28d38f3809ca86e413d012f879', ''),
(24, 'dinesh', 'dinesh.paladhi@gmail.com', '134563d4e440f0e418b0f382f23a2cf301af6d7f648ccfae9895018345d779a3', 'cd3ddf9bfcd8b42bda8a8392403623cf', NULL),
(25, 'prateek', 'pkeer001@odu.edu', '6b806ab23d527b3473f81062395dda3341a014d742e1c98ddb8e3645c59a46bd', 'c4ef624f555b5261a030abff38a88ebb', NULL),
(26, 'Akshata', 'achal002@odu.edu', '6b806ab23d527b3473f81062395dda3341a014d742e1c98ddb8e3645c59a46bd', '404ac02e076cfc83d44654e72df2095e', NULL),
(27, 'Srishti', 'spram001@odu.edu', '6b806ab23d527b3473f81062395dda3341a014d742e1c98ddb8e3645c59a46bd', '9aa047b7c043df4fa84fac59dc2a314a', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

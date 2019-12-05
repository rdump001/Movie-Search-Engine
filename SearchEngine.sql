-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2019 at 05:53 PM
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
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `movie_imdb_link` varchar(4096) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`user`, `id`, `director_name`, `actor_1_name`, `genres`, `imdb_score`, `movie_title`, `time_stamp`, `movie_imdb_link`) VALUES
('alex@gmail.com', 161, 'Sam Raimi', 'J.K. Simmons', 'Action|Adventure|Fantasy|Romance', 7.3, 'Spider-ManÂ ', '2019-12-05 07:04:57', 'http://www.imdb.com/title/tt0145487/?ref_=fn_tt_tt_1'),
('alex@gmail.com', 1589, 'Jan de Bont', 'Keanu Reeves', 'Action|Adventure|Crime|Thriller', 7.2, 'SpeedÂ ', '2019-12-05 15:29:17', 'http://www.imdb.com/title/tt0111257/?ref_=fn_tt_tt_1'),
('alex@gmail.com', 3389, 'Will Gluck', 'Emma Stone', 'Comedy|Romance', 7.1, 'Easy AÂ ', '2019-12-05 07:08:44', 'http://www.imdb.com/title/tt1282140/?ref_=fn_tt_tt_1');

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
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `username`, `emailId`, `age`, `country`, `gender`) VALUES
(6, 'Alex@4321', 'alex', 'alex@gmail.com', 24, 'USA', 'Female'),
(7, 'Sid@1234', 'Sid', 'sid@outlook.com', NULL, NULL, NULL),
(8, 'John@1234', 'John', 'john@gmail.com', NULL, NULL, NULL),
(9, 'Sam@1234', 'Sam', 'sam@gmail.com', NULL, NULL, NULL),
(10, 'Stark@1234', 'Stark', 'stark@gmail.com', 23, 'USA', 'Male'),
(72, 'Shreya@1234', 'Shreya', 'shreyalibra22@gmail.com', NULL, NULL, NULL);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

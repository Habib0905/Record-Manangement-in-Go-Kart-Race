-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 04:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go-kart race`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participates`
--

CREATE TABLE `participates` (
  `player_id` int(4) NOT NULL,
  `tournament_id` int(4) NOT NULL,
  `points` double(5,2) NOT NULL,
  `time_taken` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(3) NOT NULL,
  `practice_no` int(4) NOT NULL,
  `score` varchar(4) NOT NULL,
  `avg_score` varchar(4) NOT NULL,
  `percent_imp` varchar(4) NOT NULL,
  `lap_time` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `practice_no`, `score`, `avg_score`, `percent_imp`, `lap_time`) VALUES
(3, 18, '7.4', '5.6', '4', 0.00),
(2, 19, '65', '5.6', '4', 20.00),
(1, 18, '65', '17.9', '4', 34.90),
(3, 40, '67', '56', '4', 34.60);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `dob`, `country`, `phone`, `brand`, `sponsor`, `email`, `password`) VALUES
(1, 'Habib Hussain', '2000-05-09', 'Bangladesh', 1814444452, 'BMW', 'Red bull', 'player', 'player'),
(2, 'Samia Akter', '2000-11-30', 'Bangladesh', 1980618595, 'Toyota', 'xyz', 'xyzabc', '123'),
(3, 'Samia Samia', '2001-11-30', 'Maldives', 1980618596, 'Nissan', 'abc', 'asdg', '3456');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `tour_id` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `track` varchar(40) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `participates`
--
ALTER TABLE `participates`
  ADD KEY `player_id` (`player_id`),
  ADD KEY `tournament_id` (`tournament_id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD KEY `id_fk` (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`tour_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `participates_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `participates_ibfk_2` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`tour_id`);

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `player` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 02:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

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
  `admin_id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `participates`
--

CREATE TABLE `participates` (
  `player_id` int(3) NOT NULL,
  `tour_id` int(3) NOT NULL,
  `points` double(4,2) DEFAULT NULL,
  `time_taken` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participates`
--

INSERT INTO `participates` (`player_id`, `tour_id`, `points`, `time_taken`) VALUES
(2, 1, 10.00, '01:01:01'),
(2, 2, 60.00, '01:01:09'),
(2, 3, 60.00, '01:01:09'),
(3, 1, 70.00, '02:02:02'),
(9, 1, 60.00, '20:20:20'),
(9, 2, 60.00, '01:01:09'),
(9, 3, 70.00, '10:10:00'),
(10, 1, 50.00, '01:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(3) NOT NULL,
  `practise_no` int(4) NOT NULL,
  `laptime` time(6) NOT NULL,
  `score` varchar(4) NOT NULL,
  `avg_score` varchar(4) NOT NULL,
  `percent_imp` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `practise_no`, `laptime`, `score`, `avg_score`, `percent_imp`) VALUES
(2, 1, '02:01:14.000000', '34', '56', '80');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `dob`, `country`, `phone`, `brand`, `sponsor`, `email`, `password`) VALUES
(1, 'Habib Hussain', '2001-05-09', 'Bangladesh', '+8801666459282', 'BMW', 'Red bull', 'habib@gmail.com', 'habib'),
(2, 'Akib Rahman', '2000-09-09', 'Bangladesh', '+8801666459282', 'tata', 'michellin', 'akib@gmail.com', 'akib'),
(3, 'Sandra Hussain', '2000-09-08', 'Bangladesh', '+8801818743454', 'mercedes', 'dunlop', 'sandra@gmail.com', 'sandra'),
(4, 'Munif Mahdi', '2000-05-09', 'Bangladesh', '+8801818743459', 'BMW', 'Gfuel', 'munif@gmail.com', 'munif'),
(9, 'Md Saidur Rahman', '2000-09-07', 'Bangladesh', '+880167345875', 'toyota', 'red bull', 'saidurrahman@gmail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `tour_id` int(3) NOT NULL,
  `tour_name` varchar(50) NOT NULL,
  `track_name` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`tour_id`, `tour_name`, `track_name`, `date`) VALUES
(1, 'Banani ', 'Banani Speedway', '2022-01-01'),
(2, 'Gulshan', 'Gulshan Raceway', '2022-01-10'),
(3, 'Uttara ', 'Uttara Circuit', '2022-01-20');

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
  ADD PRIMARY KEY (`player_id`,`tour_id`),
  ADD KEY `tour_id_fk` (`player_id`,`tour_id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`,`practise_no`),
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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `player` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

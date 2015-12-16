-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2015 at 02:21 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taxiapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driver_id` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL,
  `xCornidates` float NOT NULL,
  `yCornidates` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `password`, `name`, `contact_no`, `nic_no`, `availability`, `xCornidates`, `yCornidates`) VALUES
('0001', '1234', 'Saman', '0770000000', '95032151V', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `driverbid`
--

CREATE TABLE IF NOT EXISTS `driverbid` (
  `bid` decimal(9,2) NOT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `request_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hire_request`
--

CREATE TABLE IF NOT EXISTS `hire_request` (
  `request_id` varchar(10) NOT NULL,
  `start_loc_long` float(7,4) NOT NULL,
  `start_loc_lat` float(7,4) NOT NULL,
  `destination_long` float(7,4) NOT NULL,
  `destination_lat` float(7,4) NOT NULL,
  `date` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `num_of_passengers` int(2) NOT NULL,
  `max_bid` decimal(9,2) NOT NULL,
  `contact_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `contact_no` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`contact_no`, `name`, `password`) VALUES
('0771111111', 'p1', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(9,2) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE IF NOT EXISTS `taxi` (
  `reg_no` varchar(10) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `max_passengers` int(2) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `tour_id` varchar(10) NOT NULL,
  `charge` decimal(9,2) NOT NULL,
  `feedback` text,
  `rating` tinyint(4) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `request_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `driverbid`
--
ALTER TABLE `driverbid`
  ADD KEY `driver_id` (`driver_id`), ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `hire_request`
--
ALTER TABLE `hire_request`
  ADD PRIMARY KEY (`request_id`), ADD KEY `contact_no` (`contact_no`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`contact_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`), ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`reg_no`), ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`), ADD KEY `driver_id` (`driver_id`), ADD KEY `request_id` (`request_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driverbid`
--
ALTER TABLE `driverbid`
ADD CONSTRAINT `driverbid_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE SET NULL,
ADD CONSTRAINT `driverbid_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `hire_request` (`request_id`) ON DELETE SET NULL;

--
-- Constraints for table `hire_request`
--
ALTER TABLE `hire_request`
ADD CONSTRAINT `hire_request_ibfk_1` FOREIGN KEY (`contact_no`) REFERENCES `passenger` (`contact_no`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE SET NULL;

--
-- Constraints for table `taxi`
--
ALTER TABLE `taxi`
ADD CONSTRAINT `taxi_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE;

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE SET NULL,
ADD CONSTRAINT `tour_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `hire_request` (`request_id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2016 at 04:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `xCornidates` float DEFAULT NULL,
  `yCornidates` float DEFAULT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `password`, `name`, `contact_no`, `nic_no`, `availability`, `xCornidates`, `yCornidates`) VALUES
('dineth', 'c8d78fff63457ce5acab2630517b3af4', 'dineth', '0713636666', '932390035v', 1, NULL, NULL),
('surani', '9e1a86bf2c4cb7952e4611123558d1be', 'surani', '0123456789', '932390035v', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driverbid`
--

CREATE TABLE IF NOT EXISTS `driverbid` (
  `bid` decimal(9,2) NOT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `request_id` varchar(10) DEFAULT NULL,
  KEY `driver_id` (`driver_id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hire_request`
--

CREATE TABLE IF NOT EXISTS `hire_request` (
  `request_id` varchar(10) NOT NULL DEFAULT '',
  `start_loc_long` float(7,4) NOT NULL,
  `start_loc_lat` float(7,4) NOT NULL,
  `destination_long` float(7,4) NOT NULL,
  `destination_lat` float(7,4) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `num_of_passengers` int(2) NOT NULL,
  `max_bid` decimal(9,2) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `distanceKm` int(11) NOT NULL,
  `distanceM` int(11) NOT NULL,
  `durationHrs` int(11) NOT NULL,
  `durationMins` int(11) NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `contact_no` (`contact_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire_request`
--

INSERT INTO `hire_request` (`request_id`, `start_loc_long`, `start_loc_lat`, `destination_long`, `destination_lat`, `date`, `time`, `num_of_passengers`, `max_bid`, `contact_no`, `distanceKm`, `distanceM`, `durationHrs`, `durationMins`) VALUES
('1', 79.9334, 6.9497, 79.9071, 6.9028, '2016-01-20', '12:00:00', 2, '1200.00', '0713636666', 11, 455, 1, 0),
('2', 79.9457, 6.9491, 79.8746, 6.9503, '2016-01-18', '12:00:00', 2, '1200.00', '0713636666', 10, 830, 0, 0),
('3', 81.3638, 6.7142, 79.8842, 6.9520, '2016-01-22', '12:00:00', 2, '1200.00', '0713636666', 296, 545, 5, 22);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `contact_no` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`contact_no`),
  UNIQUE KEY `contact_no` (`contact_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`contact_no`, `name`, `password`) VALUES
('0713636666', 'nimantha', 'cefc10f1447898c039b1f8e00f41c61c');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(9,2) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `driver_id` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE IF NOT EXISTS `taxi` (
  `reg_no` varchar(10) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `max_passengers` int(2) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`reg_no`),
  KEY `driver_id` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`reg_no`, `type`, `max_passengers`, `driver_id`) VALUES
('wp-1234', '3 Wheeler', 3, 'surani'),
('wp-1235', 'Car', 4, 'dineth');

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
  `request_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`tour_id`),
  KEY `driver_id` (`driver_id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

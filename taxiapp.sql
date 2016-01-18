-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2016 at 03:25 ප.ව.
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxiapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `xCornidates` float DEFAULT NULL,
  `yCornidates` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `password`, `name`, `contact_no`, `nic_no`, `availability`, `xCornidates`, `yCornidates`) VALUES
('0008', '81dc9bdb52d04dc20036dbd8313ed055', 'Hansika', '0773767865', '940263760V', 0, NULL, NULL),
('dineth', 'c8d78fff63457ce5acab2630517b3af4', 'dineth', '0713636666', '932390035v', 1, NULL, NULL),
('surani', '9e1a86bf2c4cb7952e4611123558d1be', 'surani', '0123456789', '932390035v', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driverbid`
--

CREATE TABLE `driverbid` (
  `bid` decimal(9,2) NOT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `request_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driverbid`
--

INSERT INTO `driverbid` (`bid`, `driver_id`, `request_id`) VALUES
('500.00', '0008', '1'),
('100.00', '0008', '3'),
('123.00', '0008', '2');

-- --------------------------------------------------------

--
-- Table structure for table `hire_request`
--

CREATE TABLE `hire_request` (
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
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `vehicle_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire_request`
--

INSERT INTO `hire_request` (`request_id`, `start_loc_long`, `start_loc_lat`, `destination_long`, `destination_lat`, `date`, `time`, `num_of_passengers`, `max_bid`, `contact_no`, `distanceKm`, `distanceM`, `durationHrs`, `durationMins`, `completed`, `vehicle_type`) VALUES
('1', 79.9334, 6.9497, 79.9071, 6.9028, '2016-01-20', '12:00:00', 2, '1200.00', '0713636666', 11, 455, 1, 0, 0, ''),
('10', 79.8999, 6.9133, 79.8707, 6.9507, '2016-01-27', '00:04:00', 3, '500.00', '0713636666', 8, 991, 0, 25, 0, 'Car'),
('2', 79.9457, 6.9491, 79.8746, 6.9503, '2016-01-18', '12:00:00', 2, '1200.00', '0717673721', 10, 830, 0, 0, 1, ''),
('3', 81.3638, 6.7142, 79.8842, 6.9520, '2016-01-22', '12:00:00', 2, '1200.00', '0717673721', 296, 545, 5, 22, 1, ''),
('4', 242.0000, 999.9999, 131.0000, 564.0000, '2016-01-19', '03:16:32', 2, '244.00', '0713636666', 2, 214, 1, 4, 0, ''),
('7', 79.9186, 6.9412, 79.8499, 6.9333, '2016-01-30', '01:59:00', 10, '1500.00', '0713636666', 10, 40, 0, 29, 0, 'Van'),
('9', 79.8999, 6.9133, 79.8707, 6.9507, '2016-01-23', '00:00:00', 3, '123.00', '0713636666', 8, 991, 0, 25, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `contact_no` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`contact_no`, `name`, `password`) VALUES
('0713636666', 'nimantha', 'cefc10f1447898c039b1f8e00f41c61c'),
('0717673721', 'Madushan', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(9,2) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE `taxi` (
  `reg_no` varchar(10) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `max_passengers` int(2) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`reg_no`, `type`, `max_passengers`, `driver_id`) VALUES
('we 3456', 'Car', 2, '0008'),
('wp-1234', '3 Wheeler', 3, 'surani'),
('wp-1235', 'Car', 4, 'dineth');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(10) NOT NULL,
  `charge` decimal(9,2) NOT NULL,
  `feedback` text,
  `rating` tinyint(4) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `request_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `charge`, `feedback`, `rating`, `driver_id`, `request_id`) VALUES
(1, '100.00', NULL, NULL, '0008', '1'),
(2, '100.00', NULL, NULL, '0008', '1'),
(3, '100.00', NULL, NULL, '0008', '1'),
(5, '100.00', NULL, NULL, '0008', '3'),
(6, '100.00', NULL, NULL, '0008', '3'),
(7, '123.00', NULL, NULL, '0008', '3'),
(8, '100.00', NULL, NULL, '0008', '3'),
(10, '100.00', NULL, NULL, '0008', '3'),
(11, '100.00', NULL, NULL, '0008', '3'),
(13, '100.00', NULL, NULL, '0008', '3');

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
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `hire_request`
--
ALTER TABLE `hire_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `contact_no` (`contact_no`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`contact_no`),
  ADD UNIQUE KEY `contact_no` (`contact_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`reg_no`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `request_id` (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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

-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2016 at 05:57 ප.ව.
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
  `password` varchar(32) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT '1',
  `xCornidates` float DEFAULT NULL,
  `yCornidates` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `password`, `name`, `contact_no`, `nic_no`, `availability`, `xCornidates`, `yCornidates`) VALUES
('Dineth', 'c8d78fff63457ce5acab2630517b3af4', 'Dineth', '0713636666', '93628647V', 0, NULL, NULL),
('Hanz', '3796085673e62411995041f3ca4f2321', 'Hansika', '0717673721', '8786583V', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driverbid`
--

CREATE TABLE `driverbid` (
  `bid` decimal(9,2) NOT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `request_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hire_request`
--

CREATE TABLE `hire_request` (
  `request_id` varchar(10) NOT NULL,
  `start_loc_long` float(7,4) NOT NULL,
  `start_loc_lat` float(7,4) NOT NULL,
  `destination_long` float(7,4) NOT NULL,
  `destination_lat` float(7,4) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `num_of_passengers` int(2) NOT NULL,
  `max_bid` decimal(9,2) NOT NULL,
  `contact_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire_request`
--

INSERT INTO `hire_request` (`request_id`, `start_loc_long`, `start_loc_lat`, `destination_long`, `destination_lat`, `date`, `time`, `num_of_passengers`, `max_bid`, `contact_no`) VALUES
('1', 79.8999, 6.9133, 79.8499, 6.9333, '2016-01-16', '00:00:00', 1, '500.00', '0715537995'),
('2', 79.8999, 6.9133, 79.8499, 6.9333, '2016-05-16', '00:00:00', 1, '500.00', '0715537995'),
('3', 79.8999, 6.9133, 79.8499, 6.9333, '2016-08-16', '13:00:00', 1, '500.00', '0715537995'),
('4', 79.8999, 6.9133, 79.8499, 6.9333, '2016-08-16', '16:00:00', 1, '500.00', '0715537995');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `contact_no` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`contact_no`, `name`, `password`) VALUES
('0712282328', 'Heshan', '0186bf338fc6a79be2c29fc1707aa225'),
('0715537995', 'Manesh', '7e20b91fb64d6b3583c83ad71de7df36');

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
('GR8524', 'Car', 4, 'Hanz'),
('KV3492', 'Van', 12, 'Dineth');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
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
  ADD PRIMARY KEY (`contact_no`);

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

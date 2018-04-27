-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 05:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `password`, `contact_no`, `name`, `username`) VALUES
(1, 'uber_db', 9701452298, 'Ashwin', 'ashwin98');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `registration_number` varchar(20) NOT NULL,
  `available_seats` int(11) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `c_model` varchar(20) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `car_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`registration_number`, `available_seats`, `availability`, `c_model`, `ID`, `car_name`) VALUES
('AP099348', 6, 0, 'SUV', 1, 'Reanult Duster'),
('AP099868', 4, 0, 'Sedan', 2, 'Honda Amaze'),
('AP130713', 6, 1, 'SUV', 9, 'Toyota Fortuner'),
('AP159876', 4, 1, 'Sedan', 5, 'Maruti Suzuki Ciaz'),
('TN001234', 3, 1, 'Mini', 4, 'Maruti Sqift'),
('TN098168', 3, 0, 'Mini', 3, 'Maruti 800'),
('TS010908', 3, 1, 'Mini', 7, 'Maruti Baleno'),
('TS070043', 6, 1, 'SUV', 6, 'Jeep Compass'),
('TS070765', 4, 1, 'Sedan', 8, 'Skoda Rapid');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `model` varchar(20) NOT NULL,
  `max_seats` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `speed` float(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`model`, `max_seats`, `price`, `speed`) VALUES
('Mini', 3, 5, 0.66),
('Sedan', 4, 10, 0.73),
('SUV', 6, 15, 0.60);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `contact_no` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`contact_no`, `address`, `password`, `First_Name`, `Last_Name`, `username`) VALUES
('9133234567', 'f20160095@hyderabad.bits-pilani.ac.in', '80f282d1be74b61002b19047fb2f5cde', 'Ashwin', 'Nallan', 'ashwin23'),
('9133313002', 'f20150133@hyderabad.bits-pilani.ac.in', '17c0f3444cac456e592a344cb01e4243', 'Mukund', 'Kothari', 'mukund23'),
('9133234472', 'f20150234@hyderabad.bits-pilani.ac.in', '39e632852175cbb15c5caf5257749c84', 'Piyush', 'kalantri', 'piyush23');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `contact_no` bigint(20) DEFAULT NULL,
  `license_no` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`contact_no`, `license_no`, `password`, `availability`, `ID`, `First_Name`, `Last_Name`) VALUES
(9212612389, 'ADD727', 'password', 0, 1, 'Ramesh', 'Gundam'),
(9826127389, 'ASG2727', 'password', 0, 2, 'Raj', 'Sharma'),
(9876543210, 'MH0786', 'password', 1, 3, 'Tanmay', 'Shrivastava'),
(9988775511, 'ADF123', 'password', 1, 4, 'Laxman', 'Kumar'),
(7756486891, 'BHR987', 'password', 1, 5, 'Nischay', 'Sankhla'),
(6548298456, 'GJF1239', 'password', 1, 6, 'Himanshu', 'Patel'),
(6897848147, 'APD456', 'password', 1, 7, 'Shri', 'Teja'),
(7412589630, 'TSP118', 'password', 1, 8, 'Allu', 'Arjun'),
(9848165646, 'TNP777', 'password', 1, 9, 'C.', 'Rajgopalan');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(11) NOT NULL,
  `mode_of_payment` varchar(20) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `driver_first` varchar(20) DEFAULT NULL,
  `driver_last` varchar(20) DEFAULT NULL,
  `source` varchar(20) DEFAULT NULL,
  `destination` varchar(20) DEFAULT NULL,
  `distance` varchar(20) DEFAULT NULL,
  `est_time` decimal(10,2) DEFAULT NULL,
  `available_seats` int(11) DEFAULT NULL,
  `registration_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `mode_of_payment`, `amount`, `username`, `driver_id`, `driver_first`, `driver_last`, `source`, `destination`, `distance`, `est_time`, `available_seats`, `registration_number`) VALUES
(60, 'Net Banking', '110.00', 'm97', 1, 'Ramesh', 'Gundam', 'BITS Pilani Bus Stop', 'Patny Center', '21.9 km', '33.18', 0, 'TN098168'),
(61, 'Credit Card', '110.00', 'm97', 2, 'Raj', 'Sharma', 'BITS Pilani Bus Stop', 'Patny Center', '21.9 km', '33.18', 0, 'AP099348'),
(62, 'Debit Card', '110.00', 'm97', 2, 'Raj', 'Sharma', 'BITS Pilani Bus Stop', 'Patny Center', '21.9 km', '33.18', 0, 'AP099348'),
(68, 'Net Banking', '296.00', 'mukund23', 2, 'Raj', 'Sharma', 'Hussain Sagar', 'Afzal Gunj', '29.6', '40.55', 0, 'AP099868'),
(69, 'Credit Card', '226.50', 'mukund23', 1, 'Ramesh', 'Gundam', 'Gowliguda', 'Jubilee Hills', '45.3', '68.64', 0, 'AP099348'),
(70, 'PayTm', '226.50', 'mukund23', 1, 'Ramesh', 'Gundam', 'Kondapur', 'Jubilee Hills', '45.3', '68.64', 0, 'AP099348');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `trio_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`registration_number`),
  ADD KEY `c_model` (`c_model`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`model`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `license_no` (`license_no`),
  ADD UNIQUE KEY `contact_no` (`contact_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`c_model`) REFERENCES `car_type` (`model`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

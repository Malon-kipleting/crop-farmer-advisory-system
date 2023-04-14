-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 11:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_details`
--

CREATE TABLE `activity_details` (
  `id` int(11) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity_details`
--

INSERT INTO `activity_details` (`id`, `activity_id`, `activity_name`, `date_added`) VALUES
(1, 'ACT01', 'Planting', '2023-03-31 16:43:04'),
(2, 'ACT02', 'Spraying', '2023-03-31 16:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `county_details`
--

CREATE TABLE `county_details` (
  `id` int(11) NOT NULL,
  `county_id` varchar(20) NOT NULL,
  `county_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `county_details`
--

INSERT INTO `county_details` (`id`, `county_id`, `county_name`) VALUES
(1, 'county001', 'Mombasa'),
(2, 'county002', 'Kilifi');

-- --------------------------------------------------------

--
-- Table structure for table `crop_details`
--

CREATE TABLE `crop_details` (
  `id` int(11) NOT NULL,
  `crop_id` varchar(20) NOT NULL,
  `crop_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `crop_details`
--

INSERT INTO `crop_details` (`id`, `crop_id`, `crop_name`, `date_added`) VALUES
(1, 'CRP01', 'Maize', '2023-03-31 16:45:13'),
(2, 'CRP02', 'Beans', '2023-03-31 16:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `extension_officer`
--

CREATE TABLE `extension_officer` (
  `id` int(11) NOT NULL,
  `officer_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `officer_email` varchar(50) NOT NULL,
  `officer_phone` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `officer_password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `extension_officer`
--

INSERT INTO `extension_officer` (`id`, `officer_id`, `first_name`, `last_name`, `officer_email`, `officer_phone`, `Gender`, `officer_password`, `date_created`) VALUES
(1, 'PF01', 'Justus', 'Sang', 'sangjustus10@blinx.co.ke', '0713447936', 'Male', '3b7d512fc716f4848319d0a0856a2d5f', '2023-04-05 15:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_details`
--

CREATE TABLE `farmer_details` (
  `id` int(11) NOT NULL,
  `farmer_id` varchar(40) NOT NULL,
  `farmer_fname` varchar(100) NOT NULL,
  `farmer_lname` varchar(100) NOT NULL,
  `farmer_email` varchar(50) NOT NULL,
  `farmer_phone` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `farmer_password` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `farmer_details`
--

INSERT INTO `farmer_details` (`id`, `farmer_id`, `farmer_fname`, `farmer_lname`, `farmer_email`, `farmer_phone`, `Gender`, `farmer_password`, `date_added`) VALUES
(1, '37505349', 'Charles', 'Otieno', 'charles.o@blinx.co.ke', '0758413462', 'Male', 'a5410ee37744c574ba5790034ea08f79', '2023-03-04 12:06:21'),
(2, '37756501', 'Malon', 'Kipleting', 'malonkipleting790@gmail.com', '0713447936', 'Male', 'f74d8ed4e85c18a2ecccf397d5a60c33', '2023-03-04 12:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_owner_details`
--

CREATE TABLE `farmer_owner_details` (
  `id` int(11) NOT NULL,
  `farm_id` varchar(100) NOT NULL,
  `owner_id` varchar(100) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `farmer_owner_details`
--

INSERT INTO `farmer_owner_details` (`id`, `farm_id`, `owner_id`, `date_updated`) VALUES
(7, 'FRM-ESY9TW', '37505349', '2023-04-10 13:29:03'),
(8, 'FRM-K9BNEX', '37505349', '2023-04-10 13:29:20'),
(9, 'FRM-Y0RYK1', '37756501', '2023-04-10 13:39:19'),
(10, 'FRM-AGOH65', '37756501', '2023-04-10 13:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_request_advice_details`
--

CREATE TABLE `farmer_request_advice_details` (
  `id` int(11) NOT NULL,
  `request_id` varchar(100) NOT NULL,
  `farmer_id` varchar(100) NOT NULL,
  `farm_id` varchar(100) NOT NULL,
  `crop_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `short_description` varchar(800) NOT NULL,
  `date_of_activity` varchar(250) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `farmer_request_advice_details`
--

INSERT INTO `farmer_request_advice_details` (`id`, `request_id`, `farmer_id`, `farm_id`, `crop_id`, `activity_id`, `short_description`, `date_of_activity`, `date_added`) VALUES
(1, 'n5nHLqX', '37505349', 'FRM-K9BNEX', 'CRP01', 'ACT01', 'which is the best fertilizer to use during planting', '2023-04-17', '2023-04-11 17:12:31'),
(2, 'UCym9te', '37756501', 'FRM-AGOH65', 'CRP02', 'ACT01', 'advice me how i should go about this', '2023-04-20', '2023-04-13 22:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `farm_details`
--

CREATE TABLE `farm_details` (
  `id` int(11) NOT NULL,
  `farm_id` varchar(255) NOT NULL,
  `farm_name` varchar(255) NOT NULL,
  `farm_location` varchar(255) NOT NULL,
  `farm_size` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `farm_details`
--

INSERT INTO `farm_details` (`id`, `farm_id`, `farm_name`, `farm_location`, `farm_size`, `date_added`) VALUES
(4, 'FRM-AGOH65', 'Sugoi Farm', 'county002', '10', '2023-04-10 13:39:41'),
(1, 'FRM-ESY9TW', 'Mwala Farm', 'county002', '4', '2023-04-10 13:29:03'),
(2, 'FRM-K9BNEX', 'Munyiiki Farm', 'county001', '15', '2023-04-10 13:29:19'),
(3, 'FRM-Y0RYK1', 'Yegen Farm', 'county001', '24', '2023-04-10 13:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `farm_soil_details`
--

CREATE TABLE `farm_soil_details` (
  `id` int(11) NOT NULL,
  `soil_id` varchar(255) NOT NULL,
  `farm_id` varchar(255) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farm_soil_details`
--

INSERT INTO `farm_soil_details` (`id`, `soil_id`, `farm_id`, `date_updated`) VALUES
(1, 'soil_02', 'FRM-ESY9TW', '2023-04-13 18:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `request_response_details`
--

CREATE TABLE `request_response_details` (
  `id` int(11) NOT NULL,
  `request_id` varchar(100) NOT NULL,
  `officer_id` varchar(100) DEFAULT NULL,
  `response` longtext,
  `request_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `request_response_details`
--

INSERT INTO `request_response_details` (`id`, `request_id`, `officer_id`, `response`, `request_status`, `date_added`) VALUES
(1, 'n5nHLqX', 'PF01', 'DAP (Diammonium Phosphate) - contains nitrogen and phosphorus and is recommended for planting maize in soils that are deficient in these nutrients.\r\n\r\nCAN (Calcium Ammonium Nitrate) - contains nitrogen and calcium and is recommended for soils that are deficient in nitrogen.\r\n\r\nNPK (Nitrogen, Phosphorus, and Potassium) - contains a balanced ratio of the three major nutrients and is suitable for maize in soils with low nutrient levels.\r\n\r\n', 'Responded', '2023-04-11 14:12:31'),
(2, 'UCym9te', NULL, 'No Response Yet!', 'Pending', '2023-04-13 19:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `soil_details`
--

CREATE TABLE `soil_details` (
  `id` int(11) NOT NULL,
  `soil_id` varchar(255) NOT NULL,
  `soil_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `soil_details`
--

INSERT INTO `soil_details` (`id`, `soil_id`, `soil_name`, `date_added`) VALUES
(1, 'soil_01', 'Loam Soil', '2023-04-13 21:24:06'),
(2, 'soil_02', 'Sandy Soil', '2023-04-13 21:24:06'),
(3, 'soil_03', 'Peat Soil', '2023-04-13 21:25:00'),
(4, 'soil_04', 'Clay Soil', '2023-04-13 21:25:00'),
(5, 'soil_05', 'Silty Soil', '2023-04-13 21:25:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_details`
--
ALTER TABLE `activity_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `act_id` (`activity_id`);

--
-- Indexes for table `county_details`
--
ALTER TABLE `county_details`
  ADD PRIMARY KEY (`county_id`),
  ADD UNIQUE KEY `idd` (`id`);

--
-- Indexes for table `crop_details`
--
ALTER TABLE `crop_details`
  ADD PRIMARY KEY (`crop_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `extension_officer`
--
ALTER TABLE `extension_officer`
  ADD PRIMARY KEY (`officer_id`),
  ADD KEY `id` (`officer_id`),
  ADD KEY `ghhjj` (`id`);

--
-- Indexes for table `farmer_details`
--
ALTER TABLE `farmer_details`
  ADD PRIMARY KEY (`farmer_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `farmer_owner_details`
--
ALTER TABLE `farmer_owner_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frid` (`farm_id`),
  ADD KEY `ownidd` (`owner_id`);

--
-- Indexes for table `farmer_request_advice_details`
--
ALTER TABLE `farmer_request_advice_details`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `fdifif` (`id`),
  ADD KEY `farmerID` (`farmer_id`),
  ADD KEY `crp` (`crop_id`),
  ADD KEY `shamba` (`farm_id`),
  ADD KEY `kitivity` (`activity_id`);

--
-- Indexes for table `farm_details`
--
ALTER TABLE `farm_details`
  ADD PRIMARY KEY (`farm_id`),
  ADD KEY `id` (`id`),
  ADD KEY `farm_location` (`farm_location`);

--
-- Indexes for table `farm_soil_details`
--
ALTER TABLE `farm_soil_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soil_id` (`soil_id`),
  ADD KEY `farm_id` (`farm_id`);

--
-- Indexes for table `request_response_details`
--
ALTER TABLE `request_response_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rqid` (`request_id`),
  ADD KEY `officer_id` (`officer_id`);

--
-- Indexes for table `soil_details`
--
ALTER TABLE `soil_details`
  ADD PRIMARY KEY (`soil_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_details`
--
ALTER TABLE `activity_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `county_details`
--
ALTER TABLE `county_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crop_details`
--
ALTER TABLE `crop_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extension_officer`
--
ALTER TABLE `extension_officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farmer_details`
--
ALTER TABLE `farmer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer_owner_details`
--
ALTER TABLE `farmer_owner_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `farmer_request_advice_details`
--
ALTER TABLE `farmer_request_advice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farm_details`
--
ALTER TABLE `farm_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farm_soil_details`
--
ALTER TABLE `farm_soil_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_response_details`
--
ALTER TABLE `request_response_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soil_details`
--
ALTER TABLE `soil_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer_owner_details`
--
ALTER TABLE `farmer_owner_details`
  ADD CONSTRAINT `farm` FOREIGN KEY (`farm_id`) REFERENCES `farm_details` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owner` FOREIGN KEY (`owner_id`) REFERENCES `farmer_details` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farmer_request_advice_details`
--
ALTER TABLE `farmer_request_advice_details`
  ADD CONSTRAINT `crp` FOREIGN KEY (`crop_id`) REFERENCES `crop_details` (`crop_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farmerID` FOREIGN KEY (`farmer_id`) REFERENCES `farmer_details` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kitivity` FOREIGN KEY (`activity_id`) REFERENCES `activity_details` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shamba` FOREIGN KEY (`farm_id`) REFERENCES `farm_details` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farm_details`
--
ALTER TABLE `farm_details`
  ADD CONSTRAINT `locid` FOREIGN KEY (`farm_location`) REFERENCES `county_details` (`county_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_response_details`
--
ALTER TABLE `request_response_details`
  ADD CONSTRAINT `officer` FOREIGN KEY (`officer_id`) REFERENCES `extension_officer` (`officer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request` FOREIGN KEY (`request_id`) REFERENCES `farmer_request_advice_details` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

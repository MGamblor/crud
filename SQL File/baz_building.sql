-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 05:45 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baz_building`
--

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `featureID` int(10) UNSIGNED NOT NULL,
  `featureDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`featureID`, `featureDescription`) VALUES
(1, 'Entertainers kitchen'),
(2, 'Home theatre'),
(3, 'Study'),
(4, 'Children''s activity room'),
(5, 'Alfresco area'),
(6, 'Butler''s pantry'),
(7, 'Cactus Garden'),
(8, 'Solar Panels'),
(9, 'In-ground lap pool'),
(10, 'Activity area');

-- --------------------------------------------------------

--
-- Table structure for table `joint_type_breed`
--

CREATE TABLE `joint_type_breed` (
  `jointID` int(10) UNSIGNED NOT NULL,
  `typeID` int(11) UNSIGNED NOT NULL,
  `featureID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joint_type_breed`
--

INSERT INTO `joint_type_breed` (`jointID`, `typeID`, `featureID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 6),
(7, 2, 3),
(8, 2, 4),
(9, 3, 3),
(10, 3, 4),
(11, 4, 5),
(12, 4, 3),
(13, 5, 7),
(14, 5, 8),
(15, 5, 5),
(16, 6, 5),
(17, 7, 5),
(18, 7, 3),
(19, 7, 4),
(20, 8, 9),
(21, 8, 10),
(22, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE `name` (
  `nameID` int(10) UNSIGNED NOT NULL,
  `namName` varchar(100) NOT NULL,
  `namTypeID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`nameID`, `namName`, `namTypeID`) VALUES
(1, 'Bottlebrush', 1),
(2, 'Kangaroo Paw', 2),
(3, 'Waratah', 3),
(4, 'Wattle', 4),
(5, 'Sturt Desert Pea', 5),
(6, 'Eucalyptus', 6),
(7, 'Banksia', 7),
(8, 'Boronia', 8);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typeID` int(10) UNSIGNED NOT NULL,
  `typeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `typeName`) VALUES
(1, 'Bungalow'),
(2, 'Detached House'),
(3, 'Two-storey'),
(4, 'Duplex'),
(5, 'Queenslander'),
(6, 'Stilt house'),
(7, 'Split level house'),
(8, 'Kit house');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`featureID`);

--
-- Indexes for table `joint_type_breed`
--
ALTER TABLE `joint_type_breed`
  ADD PRIMARY KEY (`jointID`),
  ADD KEY `typeID` (`typeID`),
  ADD KEY `featureID` (`featureID`);

--
-- Indexes for table `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`nameID`),
  ADD KEY `namTypeID` (`namTypeID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `featureID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `joint_type_breed`
--
ALTER TABLE `joint_type_breed`
  MODIFY `jointID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
  MODIFY `nameID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `joint_type_breed`
--
ALTER TABLE `joint_type_breed`
  ADD CONSTRAINT `featureID` FOREIGN KEY (`featureID`) REFERENCES `feature` (`featureID`),
  ADD CONSTRAINT `typeID` FOREIGN KEY (`typeID`) REFERENCES `type` (`typeID`);

--
-- Constraints for table `name`
--
ALTER TABLE `name`
  ADD CONSTRAINT `namTypeID` FOREIGN KEY (`namTypeID`) REFERENCES `type` (`typeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

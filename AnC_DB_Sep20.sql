-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2021 at 01:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AnC_DB_Sep20`
--

-- --------------------------------------------------------
-- Table structure for table `User`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `User`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
  
  
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
--
--

-- --------------------------------------------------------
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `clientId` varchar(7) NOT NULL,
  `company` varchar(30) NOT NULL,
  `contactFirstName` varchar(100) NOT NULL,
  `contactSurname` varchar(100) NOT NULL,
  `contactPhone` int(30) NOT NULL,
  `contactEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`clientId`);
-- --------------------------------------------------------
--
-- Table structure for table `JobDetails`
--

CREATE TABLE `JobDetails` (
  `jobNumber` varchar(4) NOT NULL,
  `jobStatus` enum('open','closed') NOT NULL,
  `consultantName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `JobDetails`
--
ALTER TABLE `JobDetails`
  ADD PRIMARY KEY (`jobNumber`);

-- --------------------------------------------------------
--
-- Table structure for table `Property`
--

CREATE TABLE `Property` (
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `Property`
--
ALTER TABLE `Property`
  ADD PRIMARY KEY (`address`);

-- --------------------------------------------------------
--
-- Table structure for table `Consent`
--

CREATE TABLE `Consent` (
  `consentReference` varchar(12) NOT NULL,
  `issueDate` date NOT NULL,
  `lapseDate` date NOT NULL,
  `consentDoc` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `Consent`
--
ALTER TABLE `Consent`
  ADD PRIMARY KEY (`consentReference`),
  ADD KEY `consentReference` (`consentReference`);

-- --------------------------------------------------------
--
-- Table structure for table `Conditions`
--

CREATE TABLE `Conditions` (
  `conditionNumber` varchar(4) NOT NULL,
  `consentReference` varchar(12) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `reminderDate` date NOT NULL,
  `condiStatus` enum('open','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `Conditions`
--
ALTER TABLE `Conditions`
  ADD PRIMARY KEY (`conditionNumber`,`consentReference`),
  ADD KEY `consentReference` (`consentReference`);
  
  -- Constraints for table `Conditions`
--
ALTER TABLE `Conditions`
  ADD CONSTRAINT `conditionForeignKey` FOREIGN KEY (`consentReference`) REFERENCES `Consent` (`consentReference`);
COMMIT;

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

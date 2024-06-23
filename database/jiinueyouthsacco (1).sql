-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 09:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jiinueyouthsacco`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `memberID` int(11) NOT NULL,
  `account number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customerloandetails`
--

CREATE TABLE `customerloandetails` (
  `memberID` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mpesanumber` int(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `KRApin` varchar(20) NOT NULL,
  `current occupation` varchar(20) NOT NULL,
  `employer name` varchar(20) NOT NULL,
  `employer address` varchar(30) NOT NULL,
  `guarantor name` varchar(30) NOT NULL,
  `guarantor contacts` varchar(30) NOT NULL,
  `loantype` varchar(15) NOT NULL,
  `loan amount` int(20) NOT NULL,
  `duration` int(20) NOT NULL,
  `interest rate` int(20) NOT NULL,
  `application date` date NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerloandetails`
--

INSERT INTO `customerloandetails` (`memberID`, `name`, `email`, `mpesanumber`, `address`, `KRApin`, `current occupation`, `employer name`, `employer address`, `guarantor name`, `guarantor contacts`, `loantype`, `loan amount`, `duration`, `interest rate`, `application date`, `status`) VALUES
(1, 'wambui@gmail.com', 'grace nderitu', 711122333, '234', 'a12345', 'teacher', 'kimathi', 'nyeri', 'jenn', '0722333444', 'Business', 30000, 12, 0, '2023-04-11', ''),
(2, 'wambui@gmail.com', 'Grace Nderitu', 711122333, '234', 'a12345', 'teacher', 'kimathi', 'nyeri', 'jenn', '0722333444', 'Business', 1000, 12, 0, '2023-04-11', 'pending'),
(3, 'grace@gmail.com', 'Grace Nderitu', 700111222, '23456', 'w2345', 'farmer', 'ktda', 'nyeri', 'ann njeri', '0788999000', 'Business', 10000, 12, 0, '2023-04-11', 'pending'),
(4, 'grace@gmail.com', 'Grace Nderitu', 797880714, '456', 't1234', 'farmer', 'ktda', 'nyeri', 'jenn', '0722333444', 'Emergency ', 1000, 12, 0, '2023-04-12', 'pending'),
(5, 'njoki@gmail.com', 'jane njoki', 744455666, '4568 ', 'a12345', 'farmer', 'ktda', 'nyeri', 'jenn', '0722333444', 'Business', 1000000, 72, 0, '2023-04-13', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loanID` int(20) NOT NULL,
  `memberID` int(20) NOT NULL,
  `loanamount` int(20) NOT NULL,
  `loan date` date NOT NULL,
  `loan status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loanID`, `memberID`, `loanamount`, `loan date`, `loan status`) VALUES
(1, 3, 10000, '2023-04-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `IR` int(11) NOT NULL,
  `Rate Type` varchar(11) NOT NULL,
  `Max Amount` int(11) NOT NULL,
  `Max Time` int(11) NOT NULL,
  `Guarantors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`ID`, `Name`, `IR`, `Rate Type`, `Max Amount`, `Max Time`, `Guarantors`) VALUES
(1, 'Business', 10, 'cumulative', 50000, 12, 1),
(2, 'Emergency ', 10, 'on reducing', 10000, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `IDnumber` int(20) NOT NULL,
  `age` int(11) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'member',
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `name`, `email`, `mobile_no`, `IDnumber`, `age`, `password`, `role`, `status`) VALUES
(1, 'grace nderitu', 'wambui@gmail.com', 711122333, 0, 20, '1234', 'member', 'Active'),
(2, 'Jenn Akinyi', 'jenn@gmail.com', 700111222, 0, 23, '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'Active'),
(3, 'Grace Nderitu', 'grace@gmail.com', 797880714, 0, 23, '81dc9bdb52d04dc20036dbd8313ed055', 'member', 'Active'),
(4, 'Jane Njeri', 'jane@gmail.com', 722333444, 0, 24, '81dc9bdb52d04dc20036dbd8313ed055', 'member', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `memberID` int(20) NOT NULL,
  `savingsamount` int(20) NOT NULL,
  `savings date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `customerloandetails`
--
ALTER TABLE `customerloandetails`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loanID`),
  ADD KEY `test` (`memberID`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`memberID`),
  ADD UNIQUE KEY `memberID` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerloandetails`
--
ALTER TABLE `customerloandetails`
  MODIFY `memberID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `test` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

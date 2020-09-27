-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2019 at 10:38 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `behms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `auid` int(11) NOT NULL,
  `ruid` varchar(50) DEFAULT NULL,
  `logs` varchar(50) DEFAULT NULL,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `patient` varchar(50) DEFAULT NULL,
  `temperature` varchar(20) DEFAULT NULL,
  `bp` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `height` varchar(60) DEFAULT NULL,
  `odepartment` varchar(50) DEFAULT NULL,
  `status` varchar(12) DEFAULT 'new',
  `note` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`auid`, `ruid`, `logs`, `entry`, `modified`, `patient`, `temperature`, `bp`, `weight`, `height`, `odepartment`, `status`, `note`) VALUES
(1, 'j1U9W308100534iSfm815480258825e4', NULL, '2019-01-21 00:11:23', '2019-01-21 00:43:57', '6xeZV553154798DcQJ71548025542uHi', '48', '80/120', '69kg', '5.7 inch', 'doctor', 'new', NULL),
(2, 'RYIlF1398998197qkm7v1548028122iDE', NULL, '2019-01-21 00:48:43', '2019-01-21 00:48:43', 'eMbJq9768157906ckFz15480280808Kn', '30', '90/130', '90Kg', '6.7 inch', 'doctor', 'new', NULL),
(3, 'xKVTN1377990974JAiPh15480297504ap', NULL, '2019-01-21 01:15:51', '2019-01-21 01:54:00', '5EBGX1330268629TQLSc1547993710orA', '32', '80/1205', '59kg', '5.5inch', 'doctor', 'labtest', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `auid` int(11) NOT NULL,
  `ruid` varchar(50) DEFAULT NULL,
  `logs` varchar(50) DEFAULT NULL,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  `cardno` varchar(12) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `occupation` varchar(60) DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `sex` varchar(7) DEFAULT NULL,
  `hiv` varchar(4) DEFAULT 'no',
  `hepatitis` varchar(4) DEFAULT 'no',
  `cancer` varchar(4) DEFAULT 'no',
  `status` varchar(12) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`auid`, `ruid`, `logs`, `entry`, `modified`, `username`, `email`, `phone`, `pin`, `password`, `type`, `cardno`, `firstname`, `lastname`, `address`, `occupation`, `birthdate`, `sex`, `hiv`, `hepatitis`, `cancer`, `status`, `note`) VALUES
(1, '5EBGX1330268629TQLSc1547993710orA', NULL, '2019-01-20 15:15:11', '2019-01-20 15:15:11', NULL, 'john@doe.com', '09098877665', NULL, NULL, 'patient', '2019012033', 'John', 'Doe', NULL, 'Student', 'Tuesday 01 January 2019', 'Male', 'no', 'no', 'no', NULL, NULL),
(2, '6xeZV553154798DcQJ71548025542uHi', NULL, '2019-01-21 00:05:43', '2019-01-21 00:05:43', NULL, 'john@mckane.com', '09033727732', NULL, NULL, 'patient', '2019012087', 'John', 'McKane', NULL, 'Senator', 'Wednesday 16 January 2019', 'Male', 'no', 'no', 'no', NULL, NULL),
(3, 'eMbJq9768157906ckFz15480280808Kn', NULL, '2019-01-21 00:48:01', '2019-01-21 00:48:01', NULL, 'robison@gmail.com', '08028866281', NULL, NULL, 'patient', '2019012013', 'Robison', 'Crusoe', NULL, 'Designer', 'Thursday 05 January 2012', 'Male', 'no', 'no', 'no', NULL, '<p>Robison has <strong>HIV</strong></p>\r\n'),
(4, 'tijbG9174640172Nnhu1548160560Yly', NULL, '2019-01-22 13:36:01', '2019-03-01 12:19:11', 'samson', 'samson@nurse.com', '09063627342', NULL, '11', 'admin', '2019012259', 'Samson', 'Cochella', '23, Ivando Street, Kalvin Lane, Nigeria', NULL, NULL, '10', 'no', 'no', 'no', NULL, NULL),
(5, 'wUMp7454660450Nnz6C1551439089GqF', NULL, '2019-03-01 12:18:10', '2019-03-01 12:18:10', 'user', 'm.mm.m', '080', NULL, '11', 'staff', '2019030188', 'kunle ', 'kelluy', '1 address street', NULL, NULL, 'Male', 'no', 'no', 'no', NULL, NULL),
(6, '0sjam291673718VpOGF1551439209rYy', NULL, '2019-03-01 12:20:10', '2019-03-01 12:20:10', 'opd', 'm@mmm', '090', NULL, '11', 'staff', '2019030142', 'MERIT', 'john', '2 address', NULL, NULL, 'Female', 'no', 'no', 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `auid` int(11) NOT NULL,
  `ruid` varchar(50) DEFAULT NULL,
  `logs` varchar(50) DEFAULT NULL,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  `cardno` varchar(12) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `occupation` varchar(60) DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `sex` varchar(7) DEFAULT NULL,
  `hiv` varchar(4) DEFAULT 'no',
  `hepatitis` varchar(4) DEFAULT 'no',
  `cancer` varchar(4) DEFAULT 'no',
  `status` varchar(12) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `odepartment` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`auid`, `ruid`, `logs`, `entry`, `modified`, `username`, `email`, `phone`, `pin`, `password`, `type`, `cardno`, `firstname`, `lastname`, `address`, `occupation`, `birthdate`, `sex`, `hiv`, `hepatitis`, `cancer`, `status`, `note`, `odepartment`) VALUES
(1, '5EBGX1330268629TQLSc1547993710orA', NULL, '2019-01-20 15:15:11', '2019-01-20 15:15:11', NULL, 'john@doe.com', '09098877665', NULL, NULL, 'patient', '2019012033', 'John', 'Doe', NULL, 'Student', 'Tuesday 01 January 2019', 'Male', 'no', 'no', 'no', NULL, NULL, NULL),
(2, '6xeZV553154798DcQJ71548025542uHi', NULL, '2019-01-21 00:05:43', '2019-01-21 00:05:43', NULL, 'john@mckane.com', '09033727732', NULL, NULL, 'patient', '2019012087', 'John', 'McKane', NULL, 'Senator', 'Wednesday 16 January 2019', 'Male', 'no', 'no', 'no', NULL, NULL, NULL),
(3, 'eMbJq9768157906ckFz15480280808Kn', NULL, '2019-01-21 00:48:01', '2019-01-21 00:48:01', NULL, 'robison@gmail.com', '08028866281', NULL, NULL, 'patient', '2019012013', 'Robison', 'Crusoe', NULL, 'Designer', 'Thursday 05 January 2012', 'Male', 'no', 'no', 'no', NULL, '<p>Robison has <strong>HIV</strong></p>\r\n', NULL),
(4, 'tijbG9174640172Nnhu1548160560Yly', NULL, '2019-01-22 13:36:01', '2019-03-01 12:19:11', 'samson', 'samson@nurse.com', '09063627342', NULL, '11', 'admin', '2019012259', 'Samson', 'Cochella', '23, Ivando Street, Kalvin Lane, Nigeria', NULL, NULL, '10', 'no', 'no', 'no', NULL, NULL, 'ADMIN'),
(5, 'wUMp7454660450Nnz6C1551439089GqF', NULL, '2019-03-01 12:18:10', '2019-03-01 12:18:10', 'user', 'm.mm.m', '080', NULL, '11', 'staff', '2019030188', 'kunle ', 'kelluy', '1 address street', NULL, NULL, 'Male', 'no', 'no', 'no', NULL, NULL, 'DOCTOR'),
(6, '0sjam291673718VpOGF1551439209rYy', NULL, '2019-03-01 12:20:10', '2019-03-01 12:20:10', 'opd', 'm@mmm', '090', NULL, '11', 'staff', '2019030142', 'MERIT', 'john', '2 address', NULL, NULL, 'Female', 'no', 'no', 'no', NULL, NULL, 'OPD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `ruid` (`ruid`),
  ADD KEY `logs` (`logs`),
  ADD KEY `entry` (`entry`),
  ADD KEY `modified` (`modified`),
  ADD KEY `odepartment` (`odepartment`),
  ADD KEY `user` (`patient`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `ruid` (`ruid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `logs` (`logs`),
  ADD KEY `entry` (`entry`),
  ADD KEY `modified` (`modified`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `ruid` (`ruid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `logs` (`logs`),
  ADD KEY `entry` (`entry`),
  ADD KEY `modified` (`modified`),
  ADD KEY `odepartment` (`odepartment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

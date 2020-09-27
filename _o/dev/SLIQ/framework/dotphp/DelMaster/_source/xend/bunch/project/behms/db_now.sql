-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.35 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5453
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for behms
DROP DATABASE IF EXISTS `behms`;
CREATE DATABASE IF NOT EXISTS `behms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `behms`;

-- Dumping structure for table behms.appointment
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
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
  `note` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `ruid` (`ruid`),
  KEY `logs` (`logs`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`),
  KEY `odepartment` (`odepartment`),
  KEY `user` (`patient`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table behms.appointment: 4 rows
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
REPLACE INTO `appointment` (`auid`, `ruid`, `logs`, `entry`, `modified`, `patient`, `temperature`, `bp`, `weight`, `height`, `odepartment`, `status`, `note`) VALUES
	(1, 'j1U9W308100534iSfm815480258825e4', NULL, '2019-01-21 00:11:23', '2019-01-21 00:43:57', '6xeZV553154798DcQJ71548025542uHi', '48', '80/120', '69kg', '5.7 inch', 'doctor', 'new', NULL),
	(2, 'RYIlF1398998197qkm7v1548028122iDE', NULL, '2019-01-21 00:48:43', '2019-01-21 00:48:43', 'eMbJq9768157906ckFz15480280808Kn', '30', '90/130', '90Kg', '6.7 inch', 'doctor', 'new', NULL),
	(3, 'xKVTN1377990974JAiPh15480297504ap', NULL, '2019-01-21 01:15:51', '2019-01-21 01:54:00', '5EBGX1330268629TQLSc1547993710orA', '32', '80/1205', '59kg', '5.5inch', 'doctor', 'labtest', NULL),
	(4, 'bOBYi485542846ZpvEd1548245579lQ9', NULL, '2019-01-23 13:13:00', '2019-01-23 13:13:00', 'M2zjq976223252NWTAY1548245433ma9', '24 deg', '120/80', '75kg', '1.73m', 'doctor', 'new', NULL);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;

-- Dumping structure for table behms.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
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
  `blood` varchar(4) DEFAULT NULL,
  `genotype` varchar(4) DEFAULT NULL,
  `hiv` varchar(4) DEFAULT 'no',
  `hepatitis` varchar(4) DEFAULT 'no',
  `cancer` varchar(4) DEFAULT 'no',
  `status` varchar(12) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `odepartment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `ruid` (`ruid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `logs` (`logs`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`),
  KEY `odepartment` (`odepartment`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table behms.user: 6 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`auid`, `ruid`, `logs`, `entry`, `modified`, `username`, `email`, `phone`, `pin`, `password`, `type`, `cardno`, `firstname`, `lastname`, `address`, `occupation`, `birthdate`, `sex`, `blood`, `genotype`, `hiv`, `hepatitis`, `cancer`, `status`, `note`, `odepartment`) VALUES
	(1, '5EBGX1330268629TQLSc1547993710orA', NULL, '2019-01-20 15:15:11', '2019-01-20 15:15:11', NULL, 'john@doe.com', '09098877665', NULL, NULL, 'patient', '2019012033', 'John', 'Doe', NULL, 'Student', 'Tuesday 01 January 2019', 'Male', 'no', 'no', 'no', 'no', 'no', NULL, NULL, NULL),
	(2, '6xeZV553154798DcQJ71548025542uHi', NULL, '2019-01-21 00:05:43', '2019-01-23 14:22:53', NULL, 'john@mckane.com', '09033727732', NULL, NULL, 'patient', '2019012087', 'John', 'McKane', NULL, 'Senator', 'Wednesday 16 January 2019', 'Male', 'A+', 'AB', 'no', 'no', 'no', NULL, NULL, NULL),
	(3, 'eMbJq9768157906ckFz15480280808Kn', NULL, '2019-01-21 00:48:01', '2019-01-21 00:48:01', NULL, 'robison@gmail.com', '08028866281', NULL, NULL, 'patient', '2019012013', 'Robison', 'Crusoe', NULL, 'Designer', 'Thursday 05 January 2012', 'Male', 'no', 'no', 'no', 'no', 'no', NULL, '<p>Robison has <strong>HIV</strong></p>\r\n', NULL),
	(4, 'tijbG9174640172Nnhu1548160560Yly', NULL, '2019-01-22 13:36:01', '2019-01-23 12:49:43', 'samson', 'samson@nurse.com', '09063627342', NULL, '11', 'staff', '2019012259', 'Samson', 'Cochella', '23, Ivando Street, Kalvin Lane, Nigeria', NULL, NULL, 'Male', 'no', 'no', 'no', 'no', 'no', NULL, NULL, 'admin'),
	(6, 'M2zjq976223252NWTAY1548245433ma9', NULL, '2019-01-23 13:10:34', '2019-01-23 13:10:34', NULL, 'm@mmm', '080', NULL, NULL, 'patient', '2019012349', 'new', 'patient', NULL, 'student', 'Friday 23 January 2015', 'Male', 'no', 'no', 'no', 'no', 'no', NULL, '<p>this is a short note for the patient</p>\r\n', NULL),
	(5, 'DU1mc187149647Bq9ZE1548232828vSL', NULL, '2019-01-23 09:40:29', '2019-01-23 09:40:29', 'toni', 'toni@oneweek.com', '090866632523', NULL, 'toni', 'staff', '2019012351', 'Toni', 'Oneweek', '17 Street, well born', NULL, NULL, 'Male', 'no', 'no', 'no', 'no', 'no', NULL, NULL, 'OPD');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

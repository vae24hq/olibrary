-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.35 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5320
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for medixapi_db
DROP DATABASE IF EXISTS `medixapi_db`;
CREATE DATABASE IF NOT EXISTS `medixapi_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `medixapi_db`;

-- Dumping structure for table medixapi_db.hospital
DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  KEY `entry` (`entry`,`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.hospital: 1 rows
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
REPLACE INTO `hospital` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `address`, `location`, `status`, `update`, `entry`, `modified`) VALUES
	(1, '93485', '2349834', '234567', '47 Hospital', '247Hos', 'hospital', 'sapele road', 'sapele road', 'available', NULL, '2018-12-12 13:29:54', '2018-12-12 13:30:17');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;

-- Dumping structure for table medixapi_db.investigation
DROP TABLE IF EXISTS `investigation`;
CREATE TABLE IF NOT EXISTS `investigation` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `resultis` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  KEY `entry` (`entry`,`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.investigation: 7 rows
/*!40000 ALTER TABLE `investigation` DISABLE KEYS */;
REPLACE INTO `investigation` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `department`, `price`, `resultis`, `status`, `update`, `entry`, `modified`) VALUES
	(1, '74359038', '992495419', '782214161541676011', 'Packed Cell Valum', 'PCV', NULL, 'haematology', '800', 'OS', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
	(2, '74359032', '992495319', '782214161541676052', 'Total White Blood Cell Count', 'WBC', NULL, 'haematology', '1200', 'FC', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
	(3, '45359032', '882495319', '332214161541676052', 'Fasting Blood Glucose', 'FBG/S', NULL, 'chemical pathology', '1000', 'OS', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
	(4, '45359415', '882495001', '332721161541676052', 'Fasting Serum Lipid Profile', 'FSLP', NULL, 'chemical pathology', '2500', 'OS', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
	(5, '45359301', '882495002', '332721161541676053', 'Liver Function Test', 'LFT', NULL, 'chemical pathology', '2500', 'FC', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
	(6, '74359081', '992477319', '142721161541676053', 'Malaria Parasite Test', 'MP', NULL, 'microbiology', '1000', 'OS', 'available', NULL, '2018-11-08 12:49:50', '2018-12-08 13:18:22'),
	(7, '74371081', '192477319', '142724561541676053', 'Microscopy, Culture & Sensitivity', 'MCS', NULL, 'microbiology', '1500', 'FC', 'available', NULL, '2018-11-08 12:49:50', '2018-12-08 13:18:22');
/*!40000 ALTER TABLE `investigation` ENABLE KEYS */;

-- Dumping structure for table medixapi_db.lab
DROP TABLE IF EXISTS `lab`;
CREATE TABLE IF NOT EXISTS `lab` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  KEY `entry` (`entry`,`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.lab: 2 rows
/*!40000 ALTER TABLE `lab` DISABLE KEYS */;
REPLACE INTO `lab` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `address`, `location`, `status`, `update`, `entry`, `modified`) VALUES
	(1, '76868', '867997', '697997', '247 Medical Lab', '247MedLab', 'medlab', 'Sapele Roa', 'sapele road', 'available', NULL, '2018-12-12 12:45:05', '2018-12-12 13:26:14'),
	(2, '34857', '34083845', '234568', 'Raytouch Lab', 'Raytouch', 'medlab', 'Dawson', 'dawson', 'available', NULL, '2018-12-12 13:26:06', '2018-12-12 13:26:27');
/*!40000 ALTER TABLE `lab` ENABLE KEYS */;

-- Dumping structure for table medixapi_db.labtest
DROP TABLE IF EXISTS `labtest`;
CREATE TABLE IF NOT EXISTS `labtest` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `isapp` varchar(30) DEFAULT NULL,
  `isby` varchar(100) DEFAULT NULL COMMENT 'request was made by',
  `author` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `investigation` varchar(100) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'new',
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.labtest: 0 rows
/*!40000 ALTER TABLE `labtest` DISABLE KEYS */;
REPLACE INTO `labtest` (`auid`, `puid`, `suid`, `bind`, `isapp`, `isby`, `author`, `user`, `investigation`, `location`, `period`, `comment`, `result`, `status`, `updated`, `entry`, `modified`) VALUES
	(1, '45223593', '282709472', '7394897331544622901', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-12 14:55:02', '2018-12-12 14:55:02'),
	(2, '71168104', '1427392693', '7082371741544624140', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '332214161541676052', 'king sqaure', '2018-12-15 14:39:36', NULL, NULL, 'new', NULL, '2018-12-12 15:15:41', '2018-12-12 15:15:41');
/*!40000 ALTER TABLE `labtest` ENABLE KEYS */;

-- Dumping structure for table medixapi_db.pharmacy
DROP TABLE IF EXISTS `pharmacy`;
CREATE TABLE IF NOT EXISTS `pharmacy` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  KEY `entry` (`entry`,`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.pharmacy: 2 rows
/*!40000 ALTER TABLE `pharmacy` DISABLE KEYS */;
REPLACE INTO `pharmacy` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `address`, `location`, `status`, `update`, `entry`, `modified`) VALUES
	(1, '329438', '234508', '23480', '247 Pharmacy', '247Pham', 'pharmacy', 'sapele road', 'sapele road', 'available', NULL, '2018-12-12 13:28:21', '2018-12-12 13:28:21'),
	(2, '19389', '83480', '830843', 'Coka Pharmacy', 'Coka', 'pharmacy', 'adesuwa', 'adesuwa', 'available', NULL, '2018-12-12 13:28:50', '2018-12-12 13:29:08');
/*!40000 ALTER TABLE `pharmacy` ENABLE KEYS */;

-- Dumping structure for table medixapi_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(140) DEFAULT NULL,
  `pin` varchar(20) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `practice` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'active',
  `photo` varchar(100) DEFAULT NULL,
  `regvia` varchar(50) DEFAULT NULL,
  `firebasekey` varchar(200) DEFAULT NULL,
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.user: 1 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`auid`, `puid`, `suid`, `bind`, `username`, `email`, `phone`, `password`, `pin`, `firstname`, `surname`, `othername`, `birthday`, `sex`, `location`, `address`, `type`, `practice`, `status`, `photo`, `regvia`, `firebasekey`, `updated`, `entry`, `modified`) VALUES
	(1, '50029926', '30786088', '5114620331544618375', 'QnyRp15446183729fTZO', 'rav@labtest.com', '09097886032', 'Truce', NULL, 'Rav', 'Lexiton', NULL, '1981-04-19', 'female', 'Ikpokpan', NULL, 'patient', NULL, 'active', NULL, 'labtest', NULL, 'yeah', '2018-12-12 13:39:36', '2018-12-12 13:40:30');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table medixapi_db.vericode
DROP TABLE IF EXISTS `vericode`;
CREATE TABLE IF NOT EXISTS `vericode` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `emailcode` varchar(40) DEFAULT NULL,
  `phonecode` varchar(40) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'new',
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  UNIQUE KEY `username` (`user`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.vericode: 2 rows
/*!40000 ALTER TABLE `vericode` DISABLE KEYS */;
REPLACE INTO `vericode` (`auid`, `puid`, `suid`, `bind`, `user`, `emailcode`, `phonecode`, `status`, `updated`, `entry`, `modified`) VALUES
	(1, '38363596', '74102475', '11242758211544618351', '15199367831544618348', 'E15953Qc', 'P26303IN', 'new', NULL, '2018-12-12 13:39:12', '2018-12-12 13:39:12'),
	(2, '39363021', '1921154305', '17340794471544618377', '5114620331544618375', 'E79689xR', 'P23975AE', 'EMAIL', 'yeah', '2018-12-12 13:39:38', '2018-12-12 13:40:01');
/*!40000 ALTER TABLE `vericode` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

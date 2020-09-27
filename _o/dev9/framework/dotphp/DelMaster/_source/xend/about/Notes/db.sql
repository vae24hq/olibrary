-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5320
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for 247medic
DROP DATABASE IF EXISTS `247medic`;
CREATE DATABASE IF NOT EXISTS `247medic` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `247medic`;

-- Dumping structure for table 247medic.call
DROP TABLE IF EXISTS `call`;
CREATE TABLE IF NOT EXISTS `call` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT 'active',
  `user` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(100) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  UNIQUE KEY `username` (`user`),
  KEY `entry` (`entry`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table 247medic.call: 0 rows
/*!40000 ALTER TABLE `call` DISABLE KEYS */;
/*!40000 ALTER TABLE `call` ENABLE KEYS */;

-- Dumping structure for table 247medic.labtest
DROP TABLE IF EXISTS `labtest`;
CREATE TABLE IF NOT EXISTS `labtest` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT 'active',
  `user` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'patient',
  `location` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  UNIQUE KEY `username` (`user`),
  KEY `entry` (`entry`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table 247medic.labtest: 0 rows
/*!40000 ALTER TABLE `labtest` DISABLE KEYS */;
/*!40000 ALTER TABLE `labtest` ENABLE KEYS */;

-- Dumping structure for table 247medic.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT 'active',
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'patient',
  `name` varchar(100) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `specialty` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `entry` (`entry`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table 247medic.user: 3 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`auid`, `puid`, `suid`, `bind`, `entry`, `status`, `username`, `email`, `phone`, `password`, `pin`, `type`, `name`, `dob`, `address`, `location`, `specialty`, `gender`, `photo`, `updated`) VALUES
	(1, '71182938', '1594395166', '1439909811538685611', '2018-10-04 21:40:11', 'active', 'johndoe', 'john@doe.com', '09026636728', '1515', '1515', 'patient', 'John Doe', NULL, NULL, NULL, NULL, NULL, NULL, 'yeah'),
	(2, '11850762', '190954803', '3956023041538729147', '2018-10-05 09:45:47', 'active', 'madu', 'ify@madu.com', '08098058078', '1414', '1987', 'doctor', 'Ify Madu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, '70065253', '1254850155', '10000190951541198296', '2018-11-02 23:38:16', 'active', '897319021', 'jane@doe.com', '09097998930', '1313', 'jane', 'patient', 'Jane Doe', '1957', NULL, 'Benin', NULL, 'female', NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

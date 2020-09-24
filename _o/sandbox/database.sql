-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for aodb
DROP DATABASE IF EXISTS `aodb`;
CREATE DATABASE IF NOT EXISTS `aodb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `aodb`;

-- Dumping structure for table aodb.autho
DROP TABLE IF EXISTS `autho`;
CREATE TABLE IF NOT EXISTS `autho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `oauth` varchar(100) DEFAULT NULL,
  `osms` varchar(100) DEFAULT NULL,
  `omail` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `object` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  UNIQUE KEY `autho` (`oauth`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `type` (`type`),
  KEY `status` (`status`),
  KEY `stage` (`stage`),
  KEY `object` (`object`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.autho: ~0 rows (approximately)
/*!40000 ALTER TABLE `autho` DISABLE KEYS */;
/*!40000 ALTER TABLE `autho` ENABLE KEYS */;

-- Dumping structure for table aodb.harvesto
DROP TABLE IF EXISTS `harvesto`;
CREATE TABLE IF NOT EXISTS `harvesto` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `parisho` varchar(100) DEFAULT NULL,
  `acronym` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `harvest_parish` (`parisho`),
  CONSTRAINT `harvest_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.harvesto: ~0 rows (approximately)
/*!40000 ALTER TABLE `harvesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `harvesto` ENABLE KEYS */;

-- Dumping structure for table aodb.parisho
DROP TABLE IF EXISTS `parisho`;
CREATE TABLE IF NOT EXISTS `parisho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `emblem` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `accbank` varchar(100) DEFAULT NULL,
  `accholder` varchar(100) DEFAULT NULL,
  `accno` varchar(100) DEFAULT NULL,
  `woca_revenue` varchar(100) DEFAULT NULL,
  `woca_payout` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.parisho: ~0 rows (approximately)
/*!40000 ALTER TABLE `parisho` DISABLE KEYS */;
/*!40000 ALTER TABLE `parisho` ENABLE KEYS */;

-- Dumping structure for table aodb.pledgeo
DROP TABLE IF EXISTS `pledgeo`;
CREATE TABLE IF NOT EXISTS `pledgeo` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `userso` varchar(100) DEFAULT NULL,
  `harvesto` varchar(100) DEFAULT NULL,
  `targeto` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `pending` decimal(13,2) DEFAULT NULL,
  `deposit` decimal(13,2) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `target_harvest` (`harvesto`),
  KEY `userso` (`userso`),
  KEY `pledge_target` (`targeto`),
  CONSTRAINT `pledge_harvest` FOREIGN KEY (`harvesto`) REFERENCES `harvesto` (`euid`),
  CONSTRAINT `pledge_target` FOREIGN KEY (`targeto`) REFERENCES `targeto` (`euid`),
  CONSTRAINT `pledge_user` FOREIGN KEY (`userso`) REFERENCES `usero` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.pledgeo: ~0 rows (approximately)
/*!40000 ALTER TABLE `pledgeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `pledgeo` ENABLE KEYS */;

-- Dumping structure for table aodb.targeto
DROP TABLE IF EXISTS `targeto`;
CREATE TABLE IF NOT EXISTS `targeto` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `harvesto` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `target_harvest` (`harvesto`),
  CONSTRAINT `target_harvest` FOREIGN KEY (`harvesto`) REFERENCES `harvesto` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.targeto: ~0 rows (approximately)
/*!40000 ALTER TABLE `targeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `targeto` ENABLE KEYS */;

-- Dumping structure for table aodb.transactiono
DROP TABLE IF EXISTS `transactiono`;
CREATE TABLE IF NOT EXISTS `transactiono` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `userso` varchar(100) DEFAULT NULL,
  `pledgeo` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `deposit` decimal(13,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `target_harvest` (`pledgeo`),
  KEY `userso` (`userso`),
  CONSTRAINT `transaction_pledge` FOREIGN KEY (`pledgeo`) REFERENCES `pledgeo` (`euid`),
  CONSTRAINT `transaction_user` FOREIGN KEY (`userso`) REFERENCES `usero` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.transactiono: ~0 rows (approximately)
/*!40000 ALTER TABLE `transactiono` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactiono` ENABLE KEYS */;

-- Dumping structure for table aodb.usero
DROP TABLE IF EXISTS `usero`;
CREATE TABLE IF NOT EXISTS `usero` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `parisho` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `username` (`username`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `stage` (`stage`),
  KEY `type` (`type`),
  KEY `name` (`firstname`),
  KEY `gender` (`sex`),
  KEY `birthdate` (`dob`),
  KEY `parisho` (`parisho`),
  KEY `surname` (`surname`),
  CONSTRAINT `user_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.usero: ~0 rows (approximately)
/*!40000 ALTER TABLE `usero` DISABLE KEYS */;
/*!40000 ALTER TABLE `usero` ENABLE KEYS */;

-- Dumping structure for table aodb.wocabank
DROP TABLE IF EXISTS `wocabank`;
CREATE TABLE IF NOT EXISTS `wocabank` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `revenue` decimal(13,2) DEFAULT NULL,
  `payout` decimal(13,2) DEFAULT NULL,
  `expense` decimal(13,2) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.wocabank: ~0 rows (approximately)
/*!40000 ALTER TABLE `wocabank` DISABLE KEYS */;
/*!40000 ALTER TABLE `wocabank` ENABLE KEYS */;

-- Dumping structure for table aodb.wocapay
DROP TABLE IF EXISTS `wocapay`;
CREATE TABLE IF NOT EXISTS `wocapay` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `parisho` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `summary` varchar(400) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'payout',
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `parish` (`parisho`),
  CONSTRAINT `wocapay_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='WOCA payout to parish';

-- Dumping data for table aodb.wocapay: ~0 rows (approximately)
/*!40000 ALTER TABLE `wocapay` DISABLE KEYS */;
/*!40000 ALTER TABLE `wocapay` ENABLE KEYS */;

-- Dumping structure for table aodb.wocarev
DROP TABLE IF EXISTS `wocarev`;
CREATE TABLE IF NOT EXISTS `wocarev` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `userso` varchar(100) DEFAULT NULL,
  `pledgeo` varchar(100) DEFAULT NULL,
  `transactiono` varchar(100) DEFAULT NULL,
  `parisho` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `summary` varchar(400) DEFAULT NULL,
  `revenue` decimal(13,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `target_harvest` (`pledgeo`),
  KEY `userso` (`userso`),
  KEY `woca_transaction` (`transactiono`),
  KEY `parish` (`parisho`),
  KEY `revenue` (`revenue`),
  KEY `type` (`type`),
  CONSTRAINT `woca_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`euid`),
  CONSTRAINT `woca_pledge` FOREIGN KEY (`pledgeo`) REFERENCES `pledgeo` (`euid`),
  CONSTRAINT `woca_transaction` FOREIGN KEY (`transactiono`) REFERENCES `transactiono` (`euid`),
  CONSTRAINT `woca_user` FOREIGN KEY (`userso`) REFERENCES `usero` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='WOCA revenue';

-- Dumping data for table aodb.wocarev: ~0 rows (approximately)
/*!40000 ALTER TABLE `wocarev` DISABLE KEYS */;
/*!40000 ALTER TABLE `wocarev` ENABLE KEYS */;

-- Dumping structure for table aodb._sample
DROP TABLE IF EXISTS `_sample`;
CREATE TABLE IF NOT EXISTS `_sample` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(60) DEFAULT NULL,
  `column` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb._sample: ~0 rows (approximately)
/*!40000 ALTER TABLE `_sample` DISABLE KEYS */;
/*!40000 ALTER TABLE `_sample` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

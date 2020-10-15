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

-- Dumping structure for table aodb.apikeyo
DROP TABLE IF EXISTS `apikeyo`;
CREATE TABLE IF NOT EXISTS `apikeyo` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `puid` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
  `oauth` varchar(100) DEFAULT NULL,
  `oapp` varchar(100) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
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
  KEY `status` (`standing`),
  KEY `stage` (`stage`),
  KEY `object` (`object`),
  KEY `oapp` (`oapp`),
  KEY `puid` (`puid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.apikeyo: ~0 rows (approximately)
/*!40000 ALTER TABLE `apikeyo` DISABLE KEYS */;
/*!40000 ALTER TABLE `apikeyo` ENABLE KEYS */;

-- Dumping structure for table aodb.autho
DROP TABLE IF EXISTS `autho`;
CREATE TABLE IF NOT EXISTS `autho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `oauth` varchar(100) DEFAULT NULL,
  `osms` varchar(100) DEFAULT NULL,
  `omail` varchar(100) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
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
  KEY `status` (`standing`),
  KEY `stage` (`stage`),
  KEY `object` (`object`),
  KEY `puid` (`puid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.autho: ~0 rows (approximately)
/*!40000 ALTER TABLE `autho` DISABLE KEYS */;
/*!40000 ALTER TABLE `autho` ENABLE KEYS */;

-- Dumping structure for table aodb.harvesto
DROP TABLE IF EXISTS `harvesto`;
CREATE TABLE IF NOT EXISTS `harvesto` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `parisho` varchar(100) DEFAULT NULL,
  `acronym` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `harvest_parish` (`parisho`),
  KEY `puid` (`puid`),
  CONSTRAINT `harvest_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`euid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.harvesto: ~0 rows (approximately)
/*!40000 ALTER TABLE `harvesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `harvesto` ENABLE KEYS */;

-- Dumping structure for table aodb.logso
DROP TABLE IF EXISTS `logso`;
CREATE TABLE IF NOT EXISTS `logso` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `report` varchar(10) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `user` (`user`),
  KEY `action` (`action`),
  KEY `status` (`report`),
  KEY `platform` (`platform`),
  KEY `ip` (`ip`),
  KEY `logid` (`logid`),
  KEY `puid` (`puid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.logso: ~0 rows (approximately)
/*!40000 ALTER TABLE `logso` DISABLE KEYS */;
REPLACE INTO `logso` (`auid`, `stamp`, `author`, `puid`, `euid`, `suid`, `logid`, `user`, `action`, `report`, `summary`, `ip`, `platform`) VALUES
	(1, '2020-10-05 19:08:18', NULL, '12fNvp8x5KmIXhZTklgQ', 'a30T9SQZ2JY89efr1vA1hLK5pF6oVn1jOkgu6ml4', 'e1KP6co0ghk9s1Z2E7QjADyfzqbNaV42375198061601921298wBrQ0ny7a4obXKWhd3sq', '', 's6T0QMdDNfi1R6ZqUK4LWlAnkm4Xr038245691701601920749xo203W5Za6qdCY1O4vQH', 'login', 'failed', NULL, '127.0.0.1', 'APITEST');
/*!40000 ALTER TABLE `logso` ENABLE KEYS */;

-- Dumping structure for table aodb.parisho
DROP TABLE IF EXISTS `parisho`;
CREATE TABLE IF NOT EXISTS `parisho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `emblem` varchar(100) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
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
  KEY `author` (`author`),
  KEY `puid` (`puid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.parisho: ~5 rows (approximately)
/*!40000 ALTER TABLE `parisho` DISABLE KEYS */;
REPLACE INTO `parisho` (`auid`, `stamp`, `author`, `puid`, `euid`, `suid`, `name`, `country`, `state`, `city`, `suburb`, `summary`, `cover`, `emblem`, `standing`, `stage`, `accbank`, `accholder`, `accno`, `woca_revenue`, `woca_payout`) VALUES
	(1, '2020-10-05 13:03:40', 'HarvestPad\r\n', 'EloC3VL74m61Z8DHNx2T', '8jknJK010z4T1G9iLvOStZBI7RlHWx7CYcfEVwbQ', 'YbuTCLw172SQjlg0o6WrN49i9tEDzU29145608371601899237aYsOu3DHLImPCGW0Rx6r', 'No Parish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'verified', NULL, NULL, NULL, NULL, NULL),
	(2, '2020-10-05 13:04:46', 'HarvestPad\r\n', 'JS81MVna9hCXdI9s5fez', 'xAtYC94g9Us18WP4eSoG7VyOvNbhDjIqM1d8KLkp', 't0F469I9ZVkWysUGTxa3zrcBeHpEAg34965821071601899481hUMH31R7isWd99l6xktE', 'Christ The King (CKC)', 'NGN', 'FCT', 'Abuja', 'Kubwa', NULL, NULL, NULL, 2, 'verified', NULL, NULL, NULL, NULL, NULL),
	(3, '2020-10-05 13:07:20', 'HarvestPad\r\n', '84PgKzaB928df1J9uAM1', 'Zq60QBXJCpAg8T1LNeP8l6i9S9tF87d9RvK4Hmcz', '68eHiWV9JYgTAo79IS8Cn3GE19RLvf86324071951601899988R8ATurj8y1vEkw8zds2o', 'St. John Mary Vianney', 'NGN', 'FCT', 'Abuja', 'Lugbe', NULL, NULL, NULL, 2, 'verified', NULL, NULL, NULL, NULL, NULL),
	(4, '2020-10-05 13:14:04', 'HarvestPad\r\n', 'lAtPLUs0N9Y0eri0adpQ', '9H0xRVB0OJnKl0CdA3607QZ51zTckWpXegbYN0qG', '06cOL24P3iK8mRQrj0yze7ofk1NvU959824617301601900030Q3O9b0v2J0pwyh9AgE1q', 'Our Lady Queen of Nigeria', 'NGN', 'FCT', 'Abuja', 'Garki', NULL, NULL, NULL, 2, 'verified', NULL, NULL, NULL, NULL, NULL),
	(5, '2020-10-05 13:14:37', 'HarvestPad\r\n', 'i0n0op5sxU104k1Nf3cH', '0186NUDRawHkqlb4967QBco503zCAd3OuFZjhnxK', '8I3xRdCLvpB5gc4i90AUr0YW36ySbD97654123801601900133RYsLPIq0bQd1VC6F20Mo', 'Holy Trinity', 'NGN', 'FCT', 'Abuja', 'Maitama', NULL, NULL, NULL, 2, 'verified', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `parisho` ENABLE KEYS */;

-- Dumping structure for table aodb.pledgeo
DROP TABLE IF EXISTS `pledgeo`;
CREATE TABLE IF NOT EXISTS `pledgeo` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `userso` varchar(100) DEFAULT NULL,
  `harvesto` varchar(100) DEFAULT NULL,
  `targeto` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `pending` decimal(13,2) DEFAULT NULL,
  `deposit` decimal(13,2) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
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
  KEY `puid` (`puid`),
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
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `harvesto` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `target_harvest` (`harvesto`),
  KEY `puid` (`puid`),
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
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `userso` varchar(100) DEFAULT NULL,
  `pledgeo` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `deposit` decimal(13,2) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `target_harvest` (`pledgeo`),
  KEY `userso` (`userso`),
  KEY `puid` (`puid`),
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
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'standard',
  `role` varchar(100) DEFAULT 'basic',
  `standing` tinyint(4) DEFAULT '1',
  `stage` varchar(100) DEFAULT 'unverified',
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `parisho` char(70) DEFAULT 'YbuTCLw172SQjlg0o6WrN49i9tEDzU29145608371601899237aYsOu3DHLImPCGW0Rx6r',
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `username` (`username`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`standing`),
  KEY `stage` (`stage`),
  KEY `type` (`type`),
  KEY `name` (`firstname`),
  KEY `gender` (`sex`),
  KEY `birthdate` (`dob`),
  KEY `parisho` (`parisho`),
  KEY `surname` (`surname`),
  KEY `role` (`role`),
  KEY `puid` (`puid`),
  CONSTRAINT `user_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`suid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.usero: ~1 rows (approximately)
/*!40000 ALTER TABLE `usero` DISABLE KEYS */;
REPLACE INTO `usero` (`auid`, `stamp`, `author`, `puid`, `euid`, `suid`, `email`, `phone`, `username`, `password`, `pin`, `type`, `role`, `standing`, `stage`, `surname`, `firstname`, `othername`, `sex`, `dob`, `parisho`) VALUES
	(1, '2020-10-05 18:59:09', NULL, '0jrcUQyv7Tu1a4m1ENd9', 'U21DlEVkbfGMr5Z3siNx2IC7ena9QhSK6j0u1JO9', 's6T0QMdDNfi1R6ZqUK4LWlAnkm4Xr038245691701601920749xo203W5Za6qdCY1O4vQH', 'ao@vae24.co', '09026636728', NULL, '$2y$10$yRiS7TH5D6hrcFSDK3Fjie/UJm.rDsq92/cHNvFJwqtAU022.XmUC', NULL, 'standard', 'basic', 1, 'unverified', 'Osawere', 'Anthony', NULL, NULL, NULL, 'YbuTCLw172SQjlg0o6WrN49i9tEDzU29145608371601899237aYsOu3DHLImPCGW0Rx6r');
/*!40000 ALTER TABLE `usero` ENABLE KEYS */;

-- Dumping structure for table aodb.wocabank
DROP TABLE IF EXISTS `wocabank`;
CREATE TABLE IF NOT EXISTS `wocabank` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `revenue` decimal(13,2) DEFAULT NULL,
  `payout` decimal(13,2) DEFAULT NULL,
  `expense` decimal(13,2) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `puid` (`puid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.wocabank: ~0 rows (approximately)
/*!40000 ALTER TABLE `wocabank` DISABLE KEYS */;
/*!40000 ALTER TABLE `wocabank` ENABLE KEYS */;

-- Dumping structure for table aodb.wocapay
DROP TABLE IF EXISTS `wocapay`;
CREATE TABLE IF NOT EXISTS `wocapay` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `parisho` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `summary` varchar(400) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'payout',
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `parish` (`parisho`),
  KEY `puid` (`puid`),
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
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `userso` varchar(100) DEFAULT NULL,
  `pledgeo` varchar(100) DEFAULT NULL,
  `transactiono` varchar(100) DEFAULT NULL,
  `parisho` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `summary` varchar(400) DEFAULT NULL,
  `revenue` decimal(13,2) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
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
  KEY `puid` (`puid`),
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
  `author` varchar(80) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `standing` tinyint(4) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `Column 9` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `puid` (`puid`),
  KEY `standing` (`standing`),
  KEY `stage` (`stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb._sample: ~0 rows (approximately)
/*!40000 ALTER TABLE `_sample` DISABLE KEYS */;
/*!40000 ALTER TABLE `_sample` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

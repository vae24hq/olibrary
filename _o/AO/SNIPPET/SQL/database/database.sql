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
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
  `oauth` varchar(100) DEFAULT NULL,
  `oapp` varchar(100) DEFAULT NULL,
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
  KEY `object` (`object`),
  KEY `oapp` (`oapp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.apikeyo: ~0 rows (approximately)
/*!40000 ALTER TABLE `apikeyo` DISABLE KEYS */;
/*!40000 ALTER TABLE `apikeyo` ENABLE KEYS */;

-- Dumping structure for table aodb.autho
DROP TABLE IF EXISTS `autho`;
CREATE TABLE IF NOT EXISTS `autho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
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
  `suid` varchar(70) DEFAULT NULL,
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

-- Dumping structure for table aodb.logso
DROP TABLE IF EXISTS `logso`;
CREATE TABLE IF NOT EXISTS `logso` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `user` (`user`),
  KEY `action` (`action`),
  KEY `status` (`status`),
  KEY `platform` (`platform`),
  KEY `ip` (`ip`),
  KEY `logid` (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.logso: ~0 rows (approximately)
/*!40000 ALTER TABLE `logso` DISABLE KEYS */;
/*!40000 ALTER TABLE `logso` ENABLE KEYS */;

-- Dumping structure for table aodb.parisho
DROP TABLE IF EXISTS `parisho`;
CREATE TABLE IF NOT EXISTS `parisho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.parisho: ~1 rows (approximately)
/*!40000 ALTER TABLE `parisho` DISABLE KEYS */;
REPLACE INTO `parisho` (`auid`, `stamp`, `author`, `euid`, `suid`, `name`, `location`, `summary`, `cover`, `emblem`, `status`, `stage`, `accbank`, `accholder`, `accno`, `woca_revenue`, `woca_payout`) VALUES
	(1, '2020-09-21 15:44:15', 'o', '038844', '76837927', 'No Parish', NULL, NULL, NULL, NULL, 'noparish', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `parisho` ENABLE KEYS */;

-- Dumping structure for table aodb.pledgeo
DROP TABLE IF EXISTS `pledgeo`;
CREATE TABLE IF NOT EXISTS `pledgeo` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
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
  `suid` varchar(70) DEFAULT NULL,
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
  `suid` varchar(70) DEFAULT NULL,
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
  `suid` varchar(70) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'standard',
  `role` varchar(100) DEFAULT 'basic',
  `status` varchar(100) DEFAULT 'pending',
  `stage` varchar(100) DEFAULT 'unverified',
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `parisho` varchar(100) DEFAULT '038844',
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
  KEY `role` (`role`),
  CONSTRAINT `user_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`euid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.usero: ~5 rows (approximately)
/*!40000 ALTER TABLE `usero` DISABLE KEYS */;
REPLACE INTO `usero` (`auid`, `stamp`, `author`, `euid`, `suid`, `email`, `phone`, `username`, `password`, `pin`, `type`, `role`, `status`, `stage`, `surname`, `firstname`, `othername`, `sex`, `dob`, `parisho`) VALUES
	(1, '2020-09-22 16:35:42', NULL, '675Cf0kX2Z1Fg0ylQuBeE9hH7xvGR2qjS83YaT4I', 'yUYERVZv9BwWjNHFki4q2ntc09x1sp07962843511600788942McAv9KLw3F612ofHQ00p', 'ao@woca.co', '09026636728', NULL, 'Silk10', NULL, 'standard', 'basic', 'pending', 'unverified', 'Osawere', 'Anthony', NULL, NULL, NULL, '038844'),
	(2, '2020-09-22 16:54:13', NULL, 'WG0QRXM5J8ZAIrp4k0fNdB70ib5ezs36vS1ClL02', 'Xk8nHcZPhILKAxMoJ7fm14jRp20Yt0453172968016007900534DiLYO0qQdynWmUPA3Mw', 'ao2@woca.co', '09026636725', NULL, 'Silk10', NULL, 'standard', 'basic', 'pending', 'unverified', 'Osawere', 'Anthony', NULL, NULL, NULL, '038844'),
	(3, '2020-09-22 17:24:35', NULL, 'R0iaD6VAf50S1386kjshruzqovBwUJ895PyZxYcb', 'dZ1QC1G0H7OXjwVfqvuel0Pz5K7r3679618254031600791875uWg9Rms5YI98AX0rKPJd', 'ao3@woca.co', '09026636723', NULL, 'Silk10', NULL, 'standard', 'basic', 'pending', 'unverified', 'Osawere', 'Anthony', NULL, NULL, NULL, '038844'),
	(4, '2020-09-22 17:25:09', NULL, '5PmySAXZzC197q400rithl7xnsfBFTE280L63guv', 'rmCSByPU4wpNT02e396HcXDOM0tvWg93706514281600791909tEBkPU6yxeJg1q9wWfNo', 'ao4@woca.co', '09026636713', NULL, 'Silk10', NULL, 'standard', 'basic', 'pending', 'unverified', 'Osawere', 'Anthony', NULL, NULL, NULL, '038844'),
	(5, '2020-09-22 17:26:05', NULL, 'XENZ05vHydqQ1u0lg7e63mpGAThK9Cw5RPU1tF8b', 'hKsTF6G0g6y7I4fv0eNulAJOProk6254780916231600791965gPyDzbiqam300VRWY8Ek', 'ao8@woca.co', '09026636773', NULL, 'Silk10', NULL, 'standard', 'basic', 'pending', 'unverified', 'Osawere', 'Anthony', NULL, NULL, NULL, '038844');
/*!40000 ALTER TABLE `usero` ENABLE KEYS */;

-- Dumping structure for table aodb.wocabank
DROP TABLE IF EXISTS `wocabank`;
CREATE TABLE IF NOT EXISTS `wocabank` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
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
  `suid` varchar(70) DEFAULT NULL,
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
  `suid` varchar(70) DEFAULT NULL,
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
  `suid` varchar(70) DEFAULT NULL,
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

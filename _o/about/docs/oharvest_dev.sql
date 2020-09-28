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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.logso: ~11 rows (approximately)
/*!40000 ALTER TABLE `logso` DISABLE KEYS */;
REPLACE INTO `logso` (`auid`, `stamp`, `author`, `euid`, `suid`, `logid`, `user`, `action`, `status`, `ip`, `platform`) VALUES
	(1, '2020-09-24 19:36:34', NULL, 'Tv0QYBtMjUp2nw01HFVzEG4NLsOqAuCPbhKy6lro', '749vtmLf3EdWj8TuHZIMrA5QG1g9x62763081459160097259464ldc3XJY7wZ692fb5PO', '', 'G9Li7ahF1H2rSoWczEIl4qYK6gjs0MAZ3x01OBD9', 'signup', 'success', '127.0.0.1', 'Web'),
	(2, '2020-09-24 20:03:56', NULL, 'QEk0Ur1uv692nf6XJG4HFb6qAw1IyYxmB7s2DS4R', 'MG6AOhKTPnlD7230e1EyI6q4rXjf0402916587341600974236cUGwtg7Jdia6HEDMs5Ah', '', '5ukl4hM2qN339Zg87FbRYm0Hy41JP6rEw17ajdxI', 'signup', 'success', '127.0.0.1', 'Web'),
	(3, '2020-09-24 20:20:26', NULL, '5S1fBN7JruGz6OlCAVWYg50b9KpdDUqX62knjPei', '67VKR8yvn1abJYXUozIi9P2DMg16j6937850621416009752269Cov72HxEZ90I61nDd84', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(4, '2020-09-24 20:20:40', NULL, 'clxZ09emJ7tUEHBXpQ6P6VKG905vj41Ci20NaoDb', 'PKgiEAS7jvw9T27O0NxX64kqLZu5Rr3941572086160097524017ozivI0xtOQq6dD6j8T', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(5, '2020-09-24 20:23:01', NULL, 'RM3nazQ1C4Pxe9l73T8vYu0bDyqf66Lp0oXh8UG2', 'ZAPFW2Q9NLHhMq470v6SXUsnp3536k26519048731600975381zED93W6g50C5X8nrRB0H', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(6, '2020-09-24 20:23:57', NULL, 'TtUBsrFD5kpxEzJcVM3eQ104Lv7ynluf91CmX0IG', 'I3r0z6b91T79ilM4D4PnZashmtwSRL80593742161600975437It2GFBr93KfUbnCP41k0', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(7, '2020-09-24 20:24:05', NULL, 'd4iN3Zf40KcI55nvYRbm0A6lGgUQh1MkEj4CXB1S', 'LnW11dMkJPGx3fI59Tuaj86Eh47cO425803491671600975445dljMfiWLwpq504AB6ot5', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(8, '2020-09-24 20:25:21', NULL, 'pntu27jC2BEz4w0MOgf9vaIVLs9T38Y05ZPbH5DU', 'ak4178YVlhzuo052qJCWw9UHje6r1546709283511600975521zfma162Db9v7Q3ktw5Ae', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(9, '2020-09-24 20:28:20', NULL, 'qhPGU0DSRQ3Y74EbNMsykvu60cpLO92Vw71lKI06', 'hNQ1gs2cPTDbO1U4oXEwz9pA70a0C074125380961600975700V2v0D71ufMpyCbwj0raR', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(10, '2020-09-24 20:28:40', NULL, 'bmO1L24Uz0TpfDS70xEN5lH1AQivaZ7XKdP5FYG8', 'QnK0AcXhVMbL5oi2708NZ9P1uYEx0T31754968201600975720RaLtCp419veWXn1ioF05', '', '', 'signin', 'success', '127.0.0.1', 'Web'),
	(11, '2020-09-24 20:28:53', NULL, 'IZgkoe43At3776iB3hs0UTJX2jEnqmOxvW6FC5fL', 'xiyhH02T7XaP3muL7wk657vceC5sIz37419205861600975733PUJEGFKqc0gVQLH33O5a', '', '5ukl4hM2qN339Zg87FbRYm0Hy41JP6rEw17ajdxI', 'signin', 'success', '127.0.0.1', 'Web'),
	(12, '2020-09-24 20:29:07', NULL, '2OV5h0mGn3607q5pUuMFSyfX7tc44edT0vY7HLWi', 'am7ZvW0M0l9pxzfq5ko0PHVOYhKwRQ96875130421600975747lsLg7zvF15H9KU7Yqd1o', '', '5ukl4hM2qN339Zg87FbRYm0Hy41JP6rEw17ajdxI', 'signin', 'success', '127.0.0.1', 'Web');
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
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
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
REPLACE INTO `parisho` (`auid`, `stamp`, `author`, `euid`, `suid`, `name`, `country`, `state`, `city`, `suburb`, `summary`, `cover`, `emblem`, `status`, `stage`, `accbank`, `accholder`, `accno`, `woca_revenue`, `woca_payout`) VALUES
	(1, '2020-09-21 15:44:15', 'o', '038844', '76837927', 'No Parish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'noparish', NULL, NULL, NULL, NULL, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.usero: ~2 rows (approximately)
/*!40000 ALTER TABLE `usero` DISABLE KEYS */;
REPLACE INTO `usero` (`auid`, `stamp`, `author`, `euid`, `suid`, `email`, `phone`, `username`, `password`, `pin`, `type`, `role`, `status`, `stage`, `surname`, `firstname`, `othername`, `sex`, `dob`, `parisho`) VALUES
	(1, '2020-09-24 19:36:34', NULL, 'G9Li7ahF1H2rSoWczEIl4qYK6gjs0MAZ3x01OBD9', 'o2PxInC0Dl09G6tjShQ0XrkpE9y4sv941286053716009725940uYa7ngGN0e21O4kSLW9', 'lion.king@gmail.com', '08037665421', NULL, 'logmark', NULL, 'standard', 'basic', 'pending', 'unverified', 'King', 'Lion', NULL, NULL, NULL, '038844'),
	(2, '2020-09-24 20:03:55', NULL, '5ukl4hM2qN339Zg87FbRYm0Hy41JP6rEw17ajdxI', '6C4yswoxM27z4BF3OK1HG8tf0Drq9L15349067821600974235DRF4hmKEqzyWcso06l01', 'biran@gmail.com', '09075566127', NULL, 'markus', NULL, 'standard', 'basic', 'pending', 'unverified', 'Brian', 'Mark', NULL, NULL, NULL, '038844');
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

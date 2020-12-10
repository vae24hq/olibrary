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

-- Dumping structure for table aodb.harv_harvest
DROP TABLE IF EXISTS `harv_harvest`;
CREATE TABLE IF NOT EXISTS `harv_harvest` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `parisho` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`),
  KEY `title` (`title`),
  KEY `period` (`period`),
  KEY `FK_HarvestParish` (`parisho`),
  CONSTRAINT `FK_HarvestParish` FOREIGN KEY (`parisho`) REFERENCES `harv_parish` (`suid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.harv_harvest: ~2 rows (approximately)
/*!40000 ALTER TABLE `harv_harvest` DISABLE KEYS */;
REPLACE INTO `harv_harvest` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `parisho`, `title`, `acronym`, `tagline`, `period`) VALUES
	(1, '0Cx4zDawYZLBT1sQ99AG7KIjEg2eOFvmWqrp5tl9', '7p6BUOhsVyA905DCf99vut0eMF2JjT256987130416027049906xIk9XGh2e49D8LrCgNA', 'cITraK03SuLROs5ijD07', '2020-10-14 20:49:50', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', 'Youth', NULL, NULL, NULL),
	(2, '8TJz0P5UkwmXab02pCWYuH5VcE3fqslr0Mi170A6', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', 'I0olEjha0pQg7yG7qi31', '2020-10-14 20:50:34', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', 'Adult', NULL, 'harvest of praise', NULL);
/*!40000 ALTER TABLE `harv_harvest` ENABLE KEYS */;

-- Dumping structure for table aodb.harv_logs
DROP TABLE IF EXISTS `harv_logs`;
CREATE TABLE IF NOT EXISTS `harv_logs` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `report` varchar(10) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `user` (`user`),
  KEY `action` (`action`),
  KEY `report` (`report`),
  KEY `platform` (`platform`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.harv_logs: ~2 rows (approximately)
/*!40000 ALTER TABLE `harv_logs` DISABLE KEYS */;
REPLACE INTO `harv_logs` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `user`, `action`, `report`, `summary`, `platform`, `ip`) VALUES
	(1, '32eObqW16wvPC0sjxd7G2ytJZDNr9uzMoV4RY9il', 'u8tNPKT9l9cQJn32sx76R645I0eCwh74920863511602696929OWKnZhS9l6ojR4bMurm5', 'lPaBxs2XQ2ZEOhAm3YHL', '2020-10-14 18:35:29', 'oHarvest', 'success', '', '', 'ping', 'Initiated', 'HarvestPad - Alpha-0.0.4', 'webapi', '127.0.0.1'),
	(2, 'BqsGuw6Xy30Zz84KQH6UpdeIFgAP2E09NW2SmLOV', '08pcSt4zw0a6nmQ7V8eBlEouTbXKY985934126701602696948Cp9TjHoJX8gmRhY1WPO8', 'p5hXH2Is8i9G8RvEjZCb', '2020-10-14 18:35:48', 'oHarvest', 'failure', '', '', 'ping', 'Initiated', 'A failure response was initiated', 'webapi', '127.0.0.1'),
	(3, 'Ug69Ee270KbmV0RIvcNiy0fojCqY71rzFD1HG6sn', '82OHGX6SzklTC116uBwKJ4dfV7RvoD62718459301602697001ZjT03g5cW1xBdSHEFoJR', 'o0YvnyRwG589eFilfJ0B', '2020-10-14 18:36:41', 'oHarvest', 'success', '', '', 'ping', 'Initiated', 'HarvestPad - Alpha-0.0.4', 'webapi', '127.0.0.1'),
	(4, 'F21b3P58wmpAat6qfiNIrvRB0geJ67d7oj14hXW7', 'xM3UjS455NrXoOVDulAkB1K2Cqd7ve758369102416027727452P1a4rpUGh6zkmXoBZTj', '70op67t1MsCW8fz22Ih6', '2020-10-15 15:39:05', 'oHarvest', 'failure', '', '', 'ping', 'Initiated', 'A failure response was initiated', 'webapi', '127.0.0.1');
/*!40000 ALTER TABLE `harv_logs` ENABLE KEYS */;

-- Dumping structure for table aodb.harv_parish
DROP TABLE IF EXISTS `harv_parish`;
CREATE TABLE IF NOT EXISTS `harv_parish` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `name` varchar(100) DEFAULT NULL,
  `acronym` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `emblem` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `holder` varchar(100) DEFAULT NULL,
  `account` varchar(100) DEFAULT NULL,
  `revenue` decimal(13,2) DEFAULT NULL,
  `payout` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`),
  KEY `name` (`name`),
  KEY `acronym` (`acronym`),
  KEY `country` (`country`),
  KEY `state` (`state`),
  KEY `city` (`city`),
  KEY `suburb` (`suburb`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.harv_parish: ~7 rows (approximately)
/*!40000 ALTER TABLE `harv_parish` DISABLE KEYS */;
REPLACE INTO `harv_parish` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `name`, `acronym`, `country`, `state`, `city`, `suburb`, `address`, `summary`, `cover`, `emblem`, `bank`, `holder`, `account`, `revenue`, `payout`) VALUES
	(1, 'G2ntgVqbKW6SAr80d1HCJkI7MZTRfa17veiNUOQ4', 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG', 'dmZKhslPe7SQn39jvoEq', '2020-10-14 20:19:22', 'oHarvest', NULL, NULL, 'unverified', 'No Parish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'TZk8cdA0qGDxfeYo6WU4P51lLHEa1g2S0CvB24s8', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', 'j0Ryzc4ULXZira007635', '2020-10-14 20:19:44', 'oHarvest', 'active', NULL, 'unverified', 'Christ The King', 'CKC', 'NGN', 'FCT', 'Abuja', 'Kubwa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'Za99soPCuXzFMc3rA6bH1SR4fvkJGtqDNxTV7edO', '1o41uvzIR3CJ0Bi3nAh8YDV2Owaq6E683574920116027032991vsWz3Z7PyKO892ogCrh', 'HfY05tQ7lMJ2c2FL1S0E', '2020-10-14 20:21:39', 'oHarvest', 'active', NULL, 'unverified', 'St. John Mary Vianney', NULL, 'NGN', 'FCT', 'Abuja', 'Lugbe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, '1b20Xy3MWSpE6760gPY9TN3jhOdmJKv5Csn0eR4D', '3aoM3FbTqB2h9z60jQnRiHJO0ZLAS765013298741602703333z7jQwqrM8yPT63KOs0od', '2YCf3xJ6EW9his1Rrpqd', '2020-10-14 20:22:13', 'oHarvest', 'active', NULL, 'unverified', 'Our Lady Queen of Nigeria', NULL, 'NGN', 'FCT', 'Abuja', 'Garki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'TBoE6zVZU5GSCsd26qh19FQabi7Yxu0l4Jfg3KWw', 'UiZtIj1ERTxKg0wzpHl3XBcaOn35PL46359027181602703353mHijdxkvEz0LForZu1Y3', 'F50jIkK7TeLm6uqXySHb', '2020-10-14 20:22:33', 'oHarvest', 'active', NULL, 'unverified', 'Holy Trinity', NULL, 'NGN', 'FCT', 'Abuja', 'Maitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 'pDRQZa1TxvjVES6bfN257mnGrc72d3lt281CMiuO', 'jG2BCuHcgbER2y66dsQS1x0NK5zI5760437589211602751255Bbe5OxNu7UE6J5q602h1', '9N5PZl0k5h2efUiXmQgD', '2020-10-15 09:40:56', 'oHarvest', 'active', NULL, 'unverified', 'St. Luke', NULL, 'NGN', 'FCT', 'Abuja', 'Kubwa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'Hj72UDyX9LROPtKoaZsSE12l03G47mNW5x16hgz0', 'oUt4VYwIgRGFT8q7y5flpa3bcDLE7m70628491531602751475rvM061dA75be30QxRlGT', 'l2a3ubg1LScFjyeiD2K8', '2020-10-15 09:44:35', 'oHarvest', NULL, NULL, 'unverified', 'St. Luke', NULL, 'NGN', 'FCT', 'Abuja', 'Kubwa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `harv_parish` ENABLE KEYS */;

-- Dumping structure for table aodb.harv_target
DROP TABLE IF EXISTS `harv_target`;
CREATE TABLE IF NOT EXISTS `harv_target` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `parisho` varchar(100) DEFAULT NULL,
  `harvesto` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`),
  KEY `title` (`title`),
  KEY `period` (`period`),
  KEY `FK_TargetParish` (`parisho`),
  KEY `FK_TargetHarvest` (`harvesto`),
  CONSTRAINT `FK_TargetHarvest` FOREIGN KEY (`harvesto`) REFERENCES `harv_harvest` (`suid`),
  CONSTRAINT `FK_TargetParish` FOREIGN KEY (`parisho`) REFERENCES `harv_parish` (`suid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.harv_target: ~5 rows (approximately)
/*!40000 ALTER TABLE `harv_target` DISABLE KEYS */;
REPLACE INTO `harv_target` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `parisho`, `harvesto`, `title`, `amount`, `period`) VALUES
	(1, '1CrbLDqB26FiHVxcImZ4JYE97AKN6pOj1P90gdl5', '6tr8VAYFW0OuXl3Za762Dh5mQ6LNTp507642319816027066926fmsVzAE1pWS9jBi98yL', '361xiVFhb2n4S2lqr0OA', '2020-10-14 21:18:12', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', '1 Million', 1000000.00, NULL),
	(2, 'Zc27iJhTArHSV57G2pOt0Inbszf0M1WUwRNqmeYx', 'uRY6zXiLHN71776DZ045fm3Uyq1gOI35147629801602776019l00SZwXyUFWO3d1z1tIg', '80y2bkMcLQ6gTJxm519a', '2020-10-15 16:33:39', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', '1 Hundred Thousand', 100000.00, NULL),
	(3, 'vhEsJiR16FG6zec0BSxrATp82fnVK3OHkNg7IW03', '0sG8fg7va1W6dMoZD7OV3IS366wBnT60389241571602776053CeW7Oh6P5N7rEu1M93L3', 'f6TxBq0nI3tyi0WG2oDk', '2020-10-15 16:34:13', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', '50 Thousand', 50000.00, NULL),
	(4, 'SCHKuFaN1dRPsYh6f8zgXe41V7bpAmi7Uyx5G029', 'eKQ76vVbZ0B1PUWj6H7hd2y6smG1z94067831925160277606261KEP7SN6gAoFW1T962U', 'Az08VI2yv1oGibgxEPq2', '2020-10-15 16:34:22', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', '10 Thousand', 10000.00, NULL),
	(5, 'lb5Ha47VZ2se6i6T7f3cOqAzCKvhL7SdoQ92BEt3', 'tQ0oievm60XuO6H5lKAVb3SqLY9n3N46253187901602776073bO0qJa9edLzREYHp18v0', '7BqCt7gLOhzT6oAi3x7R', '2020-10-15 16:34:33', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', '5 Thousand', 5000.00, NULL);
/*!40000 ALTER TABLE `harv_target` ENABLE KEYS */;

-- Dumping structure for table aodb.harv_user
DROP TABLE IF EXISTS `harv_user`;
CREATE TABLE IF NOT EXISTS `harv_user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `parisho` char(100) DEFAULT 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'standard',
  `role` varchar(100) DEFAULT 'basic',
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `username` (`username`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`),
  KEY `password` (`password`),
  KEY `pin` (`pin`),
  KEY `type` (`type`),
  KEY `role` (`role`),
  KEY `surname` (`surname`),
  KEY `firstname` (`firstname`),
  KEY `othername` (`othername`),
  KEY `gender` (`gender`),
  KEY `birthdate` (`birthdate`),
  KEY `FK_UserParish` (`parisho`),
  CONSTRAINT `FK_UserParish` FOREIGN KEY (`parisho`) REFERENCES `harv_parish` (`suid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table aodb.harv_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `harv_user` DISABLE KEYS */;
REPLACE INTO `harv_user` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `parisho`, `email`, `phone`, `username`, `password`, `pin`, `type`, `role`, `surname`, `firstname`, `othername`, `gender`, `birthdate`) VALUES
	(1, 'I0eQy5qi3TW3zn64jKR6N62agxVAhrm6ptOdPXc3', 'F6gGJ2H563ehDa1b50LS1cPNOdxj4A23980415671602766353xRso9563OeYpk5i3WZTh', 'mxWA3uwH7o26OpTDa4B3', '2020-10-15 13:52:33', 'oHarvest', NULL, NULL, 'unverified', 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG', 'ao@vae24.co', '09026636728', 'ao', '$2y$10$LnEmjsdWa0WV0yT52NSV5.q4Pt86.VZGS/0AWd./bNejZ6HE5raT6', '2240', 'standard', 'basic', 'Osawere', 'Anthony', 'O', 'male', '1987-10-31 13:53:24'),
	(2, 'SCFAINZ8i1KER5Lx0lQdm940g8Jjs07PTqW31O5n', 'cBu26Ea605l7f0Qg50iNRHrDFPKCZJ542876109316028550608u0PVjL1ZXNqH5D6bKpJ', '97S8Y25RnZ40Neg2G6vP', '2020-10-16 14:31:00', 'oHarvest', NULL, NULL, 'unverified', 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG', 'odao@vae24.co', '09097996048', NULL, '$2y$10$U5Y.uGn5519hQpbJH/GKfOuqeWxgrkD8VlbYLjshLx3xHuWjaub4S', NULL, 'standard', 'basic', 'O', 'A', NULL, NULL, NULL);
/*!40000 ALTER TABLE `harv_user` ENABLE KEYS */;

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

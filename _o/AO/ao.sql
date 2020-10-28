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
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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

-- Dumping data for table aodb.harv_parish: ~5 rows (approximately)
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

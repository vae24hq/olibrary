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


-- Dumping database structure for woca_bar
DROP DATABASE IF EXISTS `woca_bar`;
CREATE DATABASE IF NOT EXISTS `woca_bar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `woca_bar`;

-- Dumping structure for table woca_bar.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` char(4) DEFAULT 'OAPP',
  `author_id` varchar(40) DEFAULT 'OAPP17082020',
  `euid` varchar(40) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  KEY `entry` (`entry`),
  KEY `author` (`author`),
  KEY `author_id` (`author_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_bar.category: ~0 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table woca_bar.drink
DROP TABLE IF EXISTS `drink`;
CREATE TABLE IF NOT EXISTS `drink` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` char(4) DEFAULT 'OAPP',
  `author_id` varchar(40) DEFAULT 'OAPP17082020',
  `euid` varchar(40) DEFAULT NULL,
  `categoryid` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `stock` mediumint(9) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  KEY `entry` (`entry`),
  KEY `author` (`author`),
  KEY `author_id` (`author_id`),
  KEY `name` (`name`),
  KEY `price` (`price`),
  KEY `status` (`status`),
  KEY `stock` (`stock`),
  KEY `category` (`categoryid`),
  CONSTRAINT `category` FOREIGN KEY (`categoryid`) REFERENCES `category` (`euid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_bar.drink: ~0 rows (approximately)
/*!40000 ALTER TABLE `drink` DISABLE KEYS */;
REPLACE INTO `drink` (`auid`, `entry`, `author`, `author_id`, `euid`, `categoryid`, `name`, `description`, `price`, `status`, `stock`, `photo`) VALUES
	(1, '2020-08-17 11:05:45', 'OAPP', 'OAPP17082020', NULL, NULL, NULL, NULL, NULL, NULL, 999999, NULL);
/*!40000 ALTER TABLE `drink` ENABLE KEYS */;

-- Dumping structure for table woca_bar.order
DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` char(4) DEFAULT 'OAPP',
  `author_id` varchar(40) DEFAULT 'OAPP17082020',
  `euid` varchar(40) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  KEY `entry` (`entry`),
  KEY `author` (`author`),
  KEY `author_id` (`author_id`),
  KEY `price` (`price`),
  KEY `status` (`status`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_bar.order: ~0 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table woca_bar.order_details
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` char(4) DEFAULT 'OAPP',
  `author_id` varchar(40) DEFAULT 'OAPP17082020',
  `euid` varchar(40) DEFAULT NULL,
  `orderid` varchar(40) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `quantity` mediumint(9) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  KEY `entry` (`entry`),
  KEY `author` (`author`),
  KEY `author_id` (`author_id`),
  KEY `order` (`orderid`),
  KEY `quantity` (`quantity`),
  KEY `type` (`type`),
  KEY `price` (`price`),
  KEY `status` (`status`),
  CONSTRAINT `order` FOREIGN KEY (`orderid`) REFERENCES `order` (`euid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_bar.order_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table woca_bar._sample
DROP TABLE IF EXISTS `_sample`;
CREATE TABLE IF NOT EXISTS `_sample` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` char(4) DEFAULT 'OAPP',
  `author_id` varchar(40) DEFAULT 'OAPP17082020',
  `euid` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  KEY `entry` (`entry`),
  KEY `author` (`author`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table woca_bar._sample: ~0 rows (approximately)
/*!40000 ALTER TABLE `_sample` DISABLE KEYS */;
/*!40000 ALTER TABLE `_sample` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

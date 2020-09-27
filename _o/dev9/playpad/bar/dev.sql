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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_bar.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
REPLACE INTO `category` (`auid`, `entry`, `author`, `author_id`, `euid`, `name`, `description`) VALUES
	(1, '2020-08-17 11:58:29', 'OAPP', 'OAPP17082020', '20200818A', 'mineral', NULL),
	(2, '2020-08-17 11:59:46', 'OAPP', 'OAPP17082020', '20200818B', 'tea', NULL),
	(3, '2020-08-17 12:00:14', 'OAPP', 'OAPP17082020', '20200818C', 'milk', NULL),
	(4, '2020-08-17 12:00:52', 'OAPP', 'OAPP17082020', '20200818D', 'bear', NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for procedure woca_bar.CategoryAll
DROP PROCEDURE IF EXISTS `CategoryAll`;
DELIMITER //
CREATE DEFINER=`woca`@`localhost` PROCEDURE `CategoryAll`()
BEGIN
SELECT category.auid AS RecordID, category.euid AS CategoryID, category.name AS CategoryName FROM `category`;
END//
DELIMITER ;

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
  `type` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_bar.drink: ~10 rows (approximately)
/*!40000 ALTER TABLE `drink` DISABLE KEYS */;
REPLACE INTO `drink` (`auid`, `entry`, `author`, `author_id`, `euid`, `categoryid`, `name`, `description`, `price`, `status`, `stock`, `type`, `photo`) VALUES
	(1, '2020-08-17 12:01:39', 'OAPP', 'OAPP17082020', '20200818D01', '20200818D', 'gulder', NULL, 500.00, NULL, 30, 'bottle', NULL),
	(2, '2020-08-17 12:03:55', 'OAPP', 'OAPP17082020', '20200818D02', '20200818D', 'stout', NULL, 350.00, NULL, 10, 'bottle', NULL),
	(3, '2020-08-17 12:05:53', 'OAPP', 'OAPP17082020', '20200818B01', '20200818B', 'milo', NULL, 100.00, NULL, 20, 'cup', NULL),
	(4, '2020-08-17 12:04:30', 'OAPP', 'OAPP17082020', '20200818D03', '20200818D', 'heineken', NULL, 450.00, NULL, 40, 'bottle', NULL),
	(5, '2020-08-17 12:06:53', 'OAPP', 'OAPP17082020', '20200818B02', '20200818B', 'nescafe', NULL, 50.00, NULL, 50, 'cup', NULL),
	(6, '2020-08-17 12:07:53', 'OAPP', 'OAPP17082020', '20200818A01', '20200818A', 'coke', NULL, 200.00, NULL, 10, 'glass', NULL),
	(7, '2020-08-17 12:08:13', 'OAPP', 'OAPP17082020', '20200818A02', '20200818A', 'fanta', NULL, 200.00, NULL, 10, 'glass', NULL),
	(8, '2020-08-17 12:08:55', 'OAPP', 'OAPP17082020', '20200818A03', '20200818A', 'sprite', NULL, 150.00, NULL, 10, 'glass', NULL),
	(9, '2020-08-17 12:09:29', 'OAPP', 'OAPP17082020', '20200818A04', '20200818A', 'pepsi', NULL, 120.00, NULL, 9, 'glass', NULL),
	(10, '2020-08-17 12:10:20', 'OAPP', 'OAPP17082020', '20200818A05', '20200818A', 'limca', NULL, 220.00, NULL, 14, 'bottle', NULL);
/*!40000 ALTER TABLE `drink` ENABLE KEYS */;

-- Dumping structure for procedure woca_bar.DrinkAll
DROP PROCEDURE IF EXISTS `DrinkAll`;
DELIMITER //
CREATE DEFINER=`woca`@`localhost` PROCEDURE `DrinkAll`()
BEGIN
SELECT drink.auid AS RecordID, drink.euid AS DrinkID, drink.name AS DrinkName, drink.categoryid AS DrinkCategoryID, category.name AS DrinkCategoryName, drink.`description` AS DrinkDescription, drink.`price` AS DrinkPrice FROM `drink`
LEFT JOIN category ON drink.categoryid = category.euid ORDER BY `DrinkCategoryName`, `DrinkName`;
END//
DELIMITER ;

-- Dumping structure for procedure woca_bar.DrinkByCategoryID
DROP PROCEDURE IF EXISTS `DrinkByCategoryID`;
DELIMITER //
CREATE DEFINER=`woca`@`localhost` PROCEDURE `DrinkByCategoryID`(
	IN `CategoryID` VARCHAR(50)
)
BEGIN
SELECT drink.auid AS RecordID, drink.euid AS DrinkID, drink.categoryid AS CategoryID, drink.name AS DrinkName, drink.price AS DrinkPrice FROM `drink` WHERE drink.`categoryid` = CategoryID ORDER BY DrinkName;
END//
DELIMITER ;

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

-- Dumping data for table woca_bar.order: ~1 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
REPLACE INTO `order` (`auid`, `entry`, `author`, `author_id`, `euid`, `summary`, `type`, `price`, `status`) VALUES
	(1, '2020-08-17 12:11:40', 'OAPP', 'OAPP17082020', 'AUG182001', '1 bottle of limca\r\n1 glass of pepsi\r\n', NULL, 340.00, '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table woca_bar.order_details: ~2 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
REPLACE INTO `order_details` (`auid`, `entry`, `author`, `author_id`, `euid`, `orderid`, `summary`, `quantity`, `type`, `price`, `status`) VALUES
	(1, '2020-08-17 12:14:12', 'OAPP', 'OAPP17082020', 'AUG182001A', 'AUG182001', NULL, 1, NULL, 220.00, '0'),
	(2, '2020-08-17 12:14:51', 'OAPP', 'OAPP17082020', 'AUG182001B', 'AUG182001', NULL, 1, NULL, 120.00, '0');
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

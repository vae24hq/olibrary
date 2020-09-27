-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for zernq_hums
DROP DATABASE IF EXISTS `zernq_hums`;
CREATE DATABASE IF NOT EXISTS `zernq_hums` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `zernq_hums`;

-- Dumping structure for table zernq_hums.account
DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `RUID` char(10) NOT NULL,
  `ET` datetime DEFAULT CURRENT_TIMESTAMP,
  `ES` tinyint(2) DEFAULT '1',
  `EA` varchar(50) DEFAULT 'ZQ',
  `Name` varchar(20) DEFAULT NULL,
  `Code` varchar(5) DEFAULT NULL,
  `Income` decimal(13,2) DEFAULT NULL,
  `Expense` decimal(13,2) DEFAULT NULL,
  `Balance` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `RUID` (`RUID`),
  KEY `ET` (`ET`),
  KEY `ES` (`ES`),
  KEY `EA` (`EA`),
  KEY `Name` (`Name`),
  KEY `Code` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table zernq_hums.account: ~5 rows (approximately)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
REPLACE INTO `account` (`AID`, `RUID`, `ET`, `ES`, `EA`, `Name`, `Code`, `Income`, `Expense`, `Balance`) VALUES
	(1, '47632159JF', '2020-03-03 09:01:17', 1, 'ZQ', 'House', 'HA', 0.00, 0.00, 0.00),
	(2, '65129403UL', '2020-03-03 09:02:01', 1, 'ZQ', 'Bolehole', 'WATER', 0.00, 0.00, 0.00),
	(3, '87439152CW', '2020-03-03 09:03:17', 1, 'ZQ', 'Waste Disposal', 'BIN', 0.00, 0.00, 0.00),
	(4, '62483507VX', '2020-03-03 09:16:07', 1, 'ZQ', 'Salary', 'SAL', 0.00, 0.00, 0.00),
	(5, '42597831CG', '2020-03-03 09:16:52', 1, 'ZQ', 'Utility', 'UTIL', 0.00, 0.00, 0.00);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table zernq_hums.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `RUID` char(10) NOT NULL,
  `ET` datetime DEFAULT CURRENT_TIMESTAMP,
  `ES` tinyint(2) DEFAULT '1',
  `EA` varchar(50) DEFAULT 'ZQ',
  `Name` varchar(20) DEFAULT NULL,
  `Code` varchar(5) DEFAULT NULL,
  `Amount` decimal(13,2) DEFAULT NULL,
  `Budget` decimal(13,2) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'Fixed',
  `Kind` varchar(20) DEFAULT 'Recurrent',
  PRIMARY KEY (`AID`),
  UNIQUE KEY `RUID` (`RUID`),
  KEY `ET` (`ET`),
  KEY `ES` (`ES`),
  KEY `EA` (`EA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table zernq_hums.category: ~5 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
REPLACE INTO `category` (`AID`, `RUID`, `ET`, `ES`, `EA`, `Name`, `Code`, `Amount`, `Budget`, `Type`, `Kind`) VALUES
	(1, '94752816VK', '2020-03-02 08:40:06', 1, NULL, 'Borehole', 'WATER', 250.00, 4000.00, 'Fixed', 'Recurrent'),
	(2, '84795026CO', '2020-03-02 08:43:27', 1, NULL, 'Waste Disposal', 'BIN', 250.00, 4000.00, 'Fixed', 'Recurrent'),
	(3, '72813064CV', '2020-03-02 08:46:19', 1, NULL, 'Security', 'GATE', 1000.00, 16000.00, 'Fixed', 'Recurrent'),
	(4, '62480975QI', '2020-03-02 08:48:25', 1, NULL, 'Car Wash', 'CAR', 1500.00, 9000.00, 'Fixed', 'Recurrent'),
	(5, '35496182IB', '2020-03-02 09:05:35', 1, NULL, 'Miscellaneous', 'MISC', 0.00, 0.00, 'Variable', 'Isolated');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table zernq_hums.deposit
DROP TABLE IF EXISTS `deposit`;
CREATE TABLE IF NOT EXISTS `deposit` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `RUID` char(10) NOT NULL,
  `ET` datetime DEFAULT CURRENT_TIMESTAMP,
  `ES` tinyint(2) DEFAULT '1',
  `EA` varchar(50) DEFAULT 'ZQ',
  `TransID` varchar(20) DEFAULT NULL,
  `Person` varchar(10) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'Transfer',
  `Amount` decimal(13,2) DEFAULT NULL,
  `Period` date DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`AID`),
  UNIQUE KEY `RUID` (`RUID`),
  KEY `ET` (`ET`),
  KEY `ES` (`ES`),
  KEY `EA` (`EA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table zernq_hums.deposit: ~0 rows (approximately)
/*!40000 ALTER TABLE `deposit` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposit` ENABLE KEYS */;

-- Dumping structure for table zernq_hums.expense
DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `RUID` char(10) NOT NULL,
  `ET` datetime DEFAULT CURRENT_TIMESTAMP,
  `ES` tinyint(2) DEFAULT '1',
  `EA` varchar(50) DEFAULT 'ZQ',
  `TransID` varchar(20) DEFAULT 'person',
  `Object` varchar(20) DEFAULT 'person' COMMENT 'Person|House',
  `Person` varchar(10) DEFAULT NULL,
  `Category` char(10) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'bill' COMMENT 'Bill | Expense',
  `Amount` decimal(13,2) DEFAULT NULL,
  `Period` date DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`AID`),
  UNIQUE KEY `RUID` (`RUID`),
  KEY `ET` (`ET`),
  KEY `ES` (`ES`),
  KEY `EA` (`EA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table zernq_hums.expense: ~0 rows (approximately)
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;

-- Dumping structure for table zernq_hums.person
DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `RUID` char(10) NOT NULL,
  `ET` datetime DEFAULT CURRENT_TIMESTAMP,
  `ES` tinyint(2) DEFAULT '1',
  `EA` varchar(50) DEFAULT 'ZQ',
  `Status` varchar(2) DEFAULT '1',
  `AccessKey` varchar(100) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `PIN` varchar(10) DEFAULT NULL,
  `SocialName` varchar(100) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `OtherName` varchar(100) DEFAULT NULL,
  `Sex` varchar(6) DEFAULT NULL,
  `Occupation` varchar(500) DEFAULT NULL,
  `Apartment` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Tenancy` date DEFAULT NULL,
  `Bill` decimal(13,2) DEFAULT NULL,
  `Deposit` decimal(13,2) DEFAULT NULL,
  `Balance` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `AccessKey` (`AccessKey`),
  UNIQUE KEY `RUID` (`RUID`),
  KEY `ET` (`ET`),
  KEY `ES` (`ES`),
  KEY `EA` (`EA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table zernq_hums.person: ~1 rows (approximately)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
REPLACE INTO `person` (`AID`, `RUID`, `ET`, `ES`, `EA`, `Status`, `AccessKey`, `Phone`, `Email`, `Username`, `Password`, `PIN`, `SocialName`, `FirstName`, `LastName`, `OtherName`, `Sex`, `Occupation`, `Apartment`, `DOB`, `Tenancy`, `Bill`, `Deposit`, `Balance`) VALUES
	(1, '89316475LG', '2020-03-03 09:37:30', 1, 'ZQ', '9', '10954683HT', '09026636728', 'anthony@osawere.com', 'iamodao', 'DStack2020', 'OD20', 'DERON', 'Anthony', 'Osawere', 'Ogheneochuko', 'Male', 'Software Engineer', 'MT03', '1987-10-31', '2017-04-01', 1500.00, 0.00, 0.00);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

-- Dumping structure for table zernq_hums.zampo
DROP TABLE IF EXISTS `zampo`;
CREATE TABLE IF NOT EXISTS `zampo` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `RUID` char(10) NOT NULL,
  `ET` datetime DEFAULT CURRENT_TIMESTAMP,
  `ES` tinyint(2) DEFAULT '1',
  `EA` varchar(50) DEFAULT 'ZQ',
  `Amount` decimal(13,4) DEFAULT NULL,
  `Label` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `RUID` (`RUID`),
  KEY `ET` (`ET`),
  KEY `ES` (`ES`),
  KEY `EA` (`EA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table zernq_hums.zampo: ~0 rows (approximately)
/*!40000 ALTER TABLE `zampo` DISABLE KEYS */;
/*!40000 ALTER TABLE `zampo` ENABLE KEYS */;

-- Dumping structure for table zernq_hums.zampo_month
DROP TABLE IF EXISTS `zampo_month`;
CREATE TABLE IF NOT EXISTS `zampo_month` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `RUID` char(10) DEFAULT NULL,
  `ET` datetime DEFAULT CURRENT_TIMESTAMP,
  `ES` tinyint(2) DEFAULT '1',
  `EA` varchar(50) DEFAULT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`AID`),
  UNIQUE KEY `RUID` (`RUID`),
  KEY `ET` (`ET`),
  KEY `ES` (`ES`),
  KEY `EA` (`EA`),
  KEY `Name` (`Name`),
  KEY `Code` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table zernq_hums.zampo_month: ~12 rows (approximately)
/*!40000 ALTER TABLE `zampo_month` DISABLE KEYS */;
REPLACE INTO `zampo_month` (`AID`, `RUID`, `ET`, `ES`, `EA`, `Name`, `Code`) VALUES
	(1, '60934587RV', '2020-03-02 05:09:42', 1, 'ZQ', 'january', 'JAN'),
	(2, '75342096YI', '2020-03-02 05:09:54', 1, 'ZQ', 'february', 'FEB'),
	(3, '37564198RM', '2020-03-02 05:10:34', 1, 'ZQ', 'march', 'MAR'),
	(4, '97204631MW', '2020-03-02 05:10:48', 1, 'ZQ', 'april', 'APR'),
	(5, '52941670EL', '2020-03-02 05:11:27', 1, 'ZQ', 'may', 'MAY'),
	(6, '50761842TQ', '2020-03-02 05:11:45', 1, 'ZQ', 'june', 'JUN'),
	(7, '49510732ID', '2020-03-02 05:11:54', 1, 'ZQ', 'july', 'JUL'),
	(8, '48096527BQ', '2020-03-02 05:12:01', 1, 'ZQ', 'august', 'AUG'),
	(9, '45276913RG', '2020-03-02 05:12:10', 1, 'ZQ', 'september', 'SEPT'),
	(10, '03254869GW', '2020-03-02 05:12:19', 1, 'ZQ', 'october', 'OCT'),
	(11, '83051946XP', '2020-03-02 05:12:33', 1, 'ZQ', 'november', 'NOV'),
	(12, '40936857WH', '2020-03-02 05:13:01', 1, 'ZQ', 'december', 'DEC');
/*!40000 ALTER TABLE `zampo_month` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

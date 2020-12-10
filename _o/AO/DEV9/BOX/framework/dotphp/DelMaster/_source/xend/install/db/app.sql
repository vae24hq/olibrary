-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5505
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for app
DROP DATABASE IF EXISTS `app`;
CREATE DATABASE IF NOT EXISTS `app` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `app`;

-- Dumping structure for table app.patient
DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(100) DEFAULT NULL,
  `ruid` varchar(100) DEFAULT NULL,
  `luid` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `entrymode` varchar(15) DEFAULT 'locked',
  `entrystatus` varchar(15) DEFAULT 'created',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `hospitalno` longtext,
  `password` varchar(50) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `privilege` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `account` varchar(20) DEFAULT 'patient',
  `status` varchar(20) DEFAULT 'pending',
  `secQ` varchar(70) DEFAULT NULL,
  `secA` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `tribe` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `hmo` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `nok` varchar(100) DEFAULT NULL,
  `nokrelationship` varchar(100) DEFAULT NULL,
  `nokphone` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `ruid` (`ruid`),
  KEY `luid` (`luid`),
  KEY `author` (`author`),
  KEY `created` (`created`),
  KEY `type` (`type`),
  KEY `category` (`category`),
  KEY `privilege` (`privilege`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `phone` (`phone`),
  KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table app.patient: 1 rows
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
REPLACE INTO `patient` (`aid`, `puid`, `ruid`, `luid`, `author`, `created`, `entrymode`, `entrystatus`, `phone`, `email`, `username`, `hospitalno`, `password`, `pin`, `privilege`, `category`, `type`, `account`, `status`, `secQ`, `secA`, `surname`, `firstname`, `othername`, `occupation`, `nationality`, `tribe`, `religion`, `hmo`, `birthdate`, `sex`, `address`, `city`, `state`, `nok`, `nokrelationship`, `nokphone`, `photo`) VALUES
	(2, '0808', '8070', '7087', 'odao', '2019-04-12 11:18:37', 'locked', 'created', '0909667757', NULL, NULL, '808', NULL, NULL, NULL, NULL, NULL, 'patient', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;

-- Dumping structure for table app.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(100) DEFAULT NULL,
  `ruid` varchar(100) DEFAULT NULL,
  `luid` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `entrymode` varchar(15) DEFAULT 'locked',
  `entrystatus` varchar(15) DEFAULT 'created',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `privilege` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `account` varchar(20) DEFAULT 'staff',
  `status` varchar(20) DEFAULT 'pending',
  `secQ` varchar(70) DEFAULT NULL,
  `secA` varchar(100) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `ruid` (`ruid`),
  KEY `luid` (`luid`),
  KEY `author` (`author`),
  KEY `created` (`created`),
  KEY `type` (`type`),
  KEY `category` (`category`),
  KEY `privilege` (`privilege`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `phone` (`phone`),
  KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table app.user: 1 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`aid`, `puid`, `ruid`, `luid`, `author`, `created`, `entrymode`, `entrystatus`, `phone`, `email`, `username`, `password`, `pin`, `privilege`, `category`, `type`, `account`, `status`, `secQ`, `secA`, `name`, `photo`) VALUES
	(1, 'nc51896685', 'AlVaJ351409425GqsB51554712082ijS', 'P01064397051Q64445911611554712082', 'SELF', '2019-04-08 09:28:02', 'locked', 'created', '09026636728', 'odao@dot.co', 'odao', 'odao', 'odao', 'appmaster', 'appmaster', 'appmaster', 'staff', 'active', 'you are an', 'appmaster', 'Odao Ababio Tony', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `mediplex`;
CREATE DATABASE IF NOT EXISTS `mediplex` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mediplex`;

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `cardno` varchar(1000) DEFAULT NULL,
  `person` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `ruid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `tribe` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `hmo` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `nok` varchar(100) DEFAULT NULL,
  `nokrelationship` varchar(50) DEFAULT NULL,
  `nokphone` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `ruid` (`ruid`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*!40000 ALTER TABLE `person` DISABLE KEYS */;
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `ruid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(140) DEFAULT NULL,
  `pin` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'pending',
  `seen` varchar(100) DEFAULT NULL,
  `person` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `bind` (`bind`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `ruid` (`ruid`),
  KEY `entry` (`entry`),
  KEY `modified` (`modified`),
  KEY `person` (`person`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`auid`, `puid`, `suid`, `ruid`, `bind`, `username`, `email`, `phone`, `password`, `pin`, `type`, `status`, `seen`, `person`, `author`, `updated`, `entry`, `modified`) VALUES
	(1, '765', '565', '0909', '6576', 'odao', 'odao@odao.com', '09097996048', 'odao', '1234', 'appmaster', 'active', NULL, NULL, NULL, NULL, '2019-03-23 01:56:35', '2019-03-26 12:18:36'),
	(2, '7653', '5653', '0908', '65763', 'odaohoc', 'odaohoc@odao.com', '09097996041', 'odao', '1234', 'adhoc', 'active', NULL, NULL, NULL, NULL, '2019-03-23 01:56:35', '2019-03-26 13:27:03'),
	(3, '38724', '973345', '09246', '7834', 'patient', 'patient@odao.com', '09033457712', 'odao', '1234', 'patient', 'pending', NULL, NULL, NULL, NULL, '2019-03-26 13:37:08', '2019-03-26 13:37:08');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

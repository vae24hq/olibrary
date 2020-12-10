-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.35 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5320
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table medixapi_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(140) DEFAULT NULL,
  `pin` varchar(20) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'patient',
  `practice` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'active',
  `photo` varchar(100) DEFAULT NULL,
  `firebasekey` varchar(200) DEFAULT NULL,
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
  KEY `entry` (`entry`),
  KEY `modified` (`modified`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table medixapi_db.user: 3 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`auid`, `puid`, `suid`, `bind`, `username`, `email`, `phone`, `password`, `pin`, `firstname`, `surname`, `othername`, `birthday`, `sex`, `location`, `address`, `type`, `practice`, `status`, `photo`, `firebasekey`, `updated`, `entry`, `modified`) VALUES
	(1, '25504441', '41288314', '17872916521541675090', 'johndoe', 'john.doe@mail.com', '09012345678', 'JDOE2018', '2018', 'John', 'Doe', 'Karl', '1985-12-02', 'male', 'Sapele Road', '188, Sapele Road\r\nOpposite Conoil Petrol Station,\r\nBenin City, Edo State.', 'patient', '', 'active', NULL, 'FIREBASETOKEN', 'yeah', '2018-12-02 13:46:21', '2018-12-03 21:39:17'),
	(2, '25504442', '41288313', '17872916521541675091', 'joedoc', 'john.doc@mail.com', '09012345679', 'JOE2018', '2018', 'Joe', 'Roy', 'Varl', '1987-11-01', 'male', 'Reservation Road', '158, Sapele Road\r\nFlix Station,\r\nBenin City, Edo State.', 'doctor', 'GP', 'active', NULL, 'FIRETOKEN', 'yeah', '2018-12-02 13:46:21', '2018-12-03 21:37:11'),
	(3, '25504444', '41288323', '17872914521541675091', 'maridoc', 'mari.doc@mail.com', '09012345639', 'Mari2018', '2018', 'Mari', 'Wasson', '', '1987-11-01', 'female', 'Reservation Road', '158, Sapele Road\r\nFlix Station,\r\nBenin City, Edo State.', 'doctor', 'GP', 'active', NULL, 'FIRETOKEN', 'yeah', '2018-12-02 13:46:21', '2018-12-03 21:37:03');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5896
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table lapo.loan
DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BIND` char(50) DEFAULT NULL,
  `DOE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Member` char(50) DEFAULT NULL,
  `MemberID` char(50) DEFAULT NULL,
  `Type` char(50) DEFAULT NULL,
  `DisbursedAs` char(50) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `Principal` bigint(20) DEFAULT '0',
  `InterestRate` bigint(20) DEFAULT NULL,
  `Duration` bigint(20) DEFAULT NULL,
  `TotalInterest` bigint(20) DEFAULT NULL,
  `TotalPayment` bigint(20) DEFAULT NULL,
  `InterestPer` bigint(20) DEFAULT NULL,
  `PrincipalPer` bigint(20) DEFAULT NULL,
  `TotalPer` bigint(20) DEFAULT NULL,
  `InterestCount` bigint(20) DEFAULT NULL,
  `PrincipalCount` bigint(20) DEFAULT NULL,
  `Credit` bigint(20) DEFAULT '0',
  `LoanID` char(50) DEFAULT NULL,
  `RepaymentCycle` char(50) DEFAULT NULL,
  `RepaymentCount` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `BIND` (`BIND`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table lapo.loan: ~1 rows (approximately)
/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
REPLACE INTO `loan` (`ID`, `BIND`, `DOE`, `Member`, `MemberID`, `Type`, `DisbursedAs`, `ReleaseDate`, `Principal`, `InterestRate`, `Duration`, `TotalInterest`, `TotalPayment`, `InterestPer`, `PrincipalPer`, `TotalPer`, `InterestCount`, `PrincipalCount`, `Credit`, `LoanID`, `RepaymentCycle`, `RepaymentCount`) VALUES
	(1, 'L99317586', '2020-02-25 09:45:58', 'T62710151', '843', 'Choose Type', 'Cash', '2020-02-25', 20000, 10, 10, 2000, 22000, 200, 2000, 2200, 0, 2, 0, '12564361', 'Monthly', 10);
/*!40000 ALTER TABLE `loan` ENABLE KEYS */;

-- Dumping structure for table lapo.loan_transaction
DROP TABLE IF EXISTS `loan_transaction`;
CREATE TABLE IF NOT EXISTS `loan_transaction` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BIND` char(50) DEFAULT NULL,
  `DOE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Member` char(50) DEFAULT NULL,
  `MemberID` char(50) DEFAULT NULL,
  `LoanID` char(50) DEFAULT NULL,
  `Type` char(50) DEFAULT NULL,
  `Amount` bigint(20) DEFAULT '0',
  `TransID` char(50) DEFAULT NULL,
  `Period` char(50) DEFAULT NULL,
  `TransDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `BIND` (`BIND`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table lapo.loan_transaction: ~0 rows (approximately)
/*!40000 ALTER TABLE `loan_transaction` DISABLE KEYS */;
REPLACE INTO `loan_transaction` (`ID`, `BIND`, `DOE`, `Member`, `MemberID`, `LoanID`, `Type`, `Amount`, `TransID`, `Period`, `TransDate`) VALUES
	(1, 'Y27395724', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '46186612', NULL, '2020-02-25'),
	(2, 'P43861388', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '43339897', NULL, '2020-02-25'),
	(3, 'I51833750', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '77018142', NULL, '2020-02-25'),
	(4, 'V66632347', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '79766102', NULL, '2020-02-25'),
	(5, 'Z69582660', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '16436585', NULL, '2020-02-25'),
	(6, 'C85463049', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '41553563', NULL, '2020-02-25'),
	(7, 'W33549111', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '21434757', NULL, '2020-02-25'),
	(8, 'F43423838', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '60903001', NULL, '2020-02-25'),
	(9, 'C70273074', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '71511117', NULL, '2020-02-25'),
	(10, 'F27735116', '2020-02-25 10:57:15', 'T62710151', '843', '12564361', 'interest', 200, '77193509', NULL, '2020-02-25'),
	(11, 'E39813871', '2020-02-25 10:59:51', 'T62710151', '843', '12564361', 'principal', 2000, '58623109', NULL, '2020-02-25'),
	(12, 'J47314751', '2020-02-25 10:59:51', 'T62710151', '843', '12564361', 'principal', 2000, '49802232', NULL, '2020-02-25'),
	(13, 'T38939757', '2020-02-25 11:00:28', 'T62710151', '843', '12564361', 'principal', 2000, '82148323', NULL, '2020-02-25'),
	(14, 'E10916521', '2020-02-25 11:03:19', 'T62710151', '843', '12564361', 'principal', 2000, '27005951', NULL, '2020-02-25'),
	(15, 'R99033601', '2020-02-25 11:03:55', 'T62710151', '843', '12564361', 'principal', 2000, '94428447', NULL, '2020-02-25'),
	(16, 'U94575973', '2020-02-25 11:03:55', 'T62710151', '843', '12564361', 'principal', 2000, '38210768', NULL, '2020-02-25'),
	(17, 'Q93505505', '2020-02-25 11:06:16', 'T62710151', '843', '12564361', 'principal', 2000, '25851293', NULL, '2020-02-25'),
	(18, 'F27193720', '2020-02-25 11:06:16', 'T62710151', '843', '12564361', 'principal', 2000, '45805599', NULL, '2020-02-25');
/*!40000 ALTER TABLE `loan_transaction` ENABLE KEYS */;

-- Dumping structure for table lapo.transaction
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BIND` char(50) DEFAULT NULL,
  `DOE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Member` char(50) DEFAULT NULL,
  `MemberID` char(50) DEFAULT NULL,
  `Type` char(50) DEFAULT NULL,
  `Amount` bigint(20) DEFAULT '0',
  `TransID` char(50) DEFAULT NULL,
  `TransDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `BIND` (`BIND`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table lapo.transaction: ~3 rows (approximately)
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
REPLACE INTO `transaction` (`ID`, `BIND`, `DOE`, `Member`, `MemberID`, `Type`, `Amount`, `TransID`, `TransDate`) VALUES
	(3, 'F61526135', '2020-02-11 10:26:50', 'P78173466', '121', 'savings', 5000, '41783152', '2020-02-11'),
	(4, 'J48682640', '2020-02-25 07:55:16', 'T62710151', '843', 'savings', 500, '56402586', '2020-02-25'),
	(5, 'U50063539', '2020-02-25 07:56:02', 'T62710151', '843', 'savings', 300, '18963720', '2020-02-25');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

-- Dumping structure for table lapo.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BIND` char(50) DEFAULT NULL,
  `DOE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `MemberID` char(50) DEFAULT NULL,
  `Username` char(50) DEFAULT NULL,
  `Password` char(50) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT '1',
  `Type` tinyint(4) DEFAULT '1',
  `FirstName` char(50) DEFAULT NULL,
  `LastName` char(50) DEFAULT NULL,
  `Email` char(50) DEFAULT NULL,
  `Phone` char(50) DEFAULT NULL,
  `Gender` char(50) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `Savings` bigint(20) DEFAULT '0',
  `Loans` bigint(20) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `BIND` (`BIND`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table lapo.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`ID`, `BIND`, `DOE`, `MemberID`, `Username`, `Password`, `Status`, `Type`, `FirstName`, `LastName`, `Email`, `Phone`, `Gender`, `DoB`, `Savings`, `Loans`) VALUES
	(1, 'A01012012', '2020-02-11 08:36:43', '101', 'admin', 'admin', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'P78173466', '2020-02-11 08:36:43', '121', NULL, NULL, 1, 1, 'John', 'Snow', 'john@snow.com', '09038877672', 'Male', '1950-11-29', 5000, 100000),
	(3, 'F71981370', '2020-02-11 08:36:43', '436', NULL, NULL, 1, 1, 'Richard', 'Priar', 'rich@priar.com', '09038877953', 'Male', '1950-11-16', 750, 0),
	(4, 'U54497406', '2020-02-11 08:36:43', '435', NULL, NULL, 1, 1, 'Zuric', 'Priar', 'zuric@priar.com', '09038877956', 'Male', '1950-04-16', 0, 0),
	(5, 'L15320836', '2020-02-11 08:36:43', '431', NULL, NULL, 1, 1, 'Madelena', 'Priar', 'madelena@priar.com', '09038877951', 'Female', '1950-11-16', 3000, 0),
	(6, 'B86478689', '2020-02-20 09:00:04', '699', NULL, NULL, 1, 1, 'Kelvin', 'Kline', 'kelvin@kline.com', '090909232', 'Male', '2015-01-19', 0, 0),
	(7, 'T62710151', '2020-02-25 07:54:19', '843', NULL, NULL, 1, 1, 'Simone', 'Kesta', 'simone@kesta.com', '080778862713', 'Male', '2020-02-25', 800, 20000);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

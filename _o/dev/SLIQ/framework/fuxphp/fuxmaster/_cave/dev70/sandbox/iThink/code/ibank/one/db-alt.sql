-- --------------------------------------------------------
-- Host:                         lh.ng
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ibdb.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountno` text,
  `pin` text,
  `uname` text,
  `securityhint` text,
  `acctype` text,
  `currency` text,
  `status` text,
  `income` text,
  `outgo` text,
  `accbal` text,
  `fname` text,
  `lname` text,
  `mname` text,
  `title` text,
  `sex` text,
  `email` text,
  `phone` text,
  `birthdate` text,
  `nationality` text,
  `address` text,
  `city` text,
  `state` text,
  `country` text,
  `statement` text,
  `passport` text,
  `passw` text NOT NULL,
  `annual` text,
  `swift` text,
  `trans_1` text,
  `trans_2` text,
  `trans_3` text,
  `trans_4` text,
  `trans_5` text,
  `trans_6` text,
  `trans_7` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ibdb.clients: 1 rows
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `accountno`, `pin`, `uname`, `securityhint`, `acctype`, `currency`, `status`, `income`, `outgo`, `accbal`, `fname`, `lname`, `mname`, `title`, `sex`, `email`, `phone`, `birthdate`, `nationality`, `address`, `city`, `state`, `country`, `statement`, `passport`, `passw`, `annual`, `swift`, `trans_1`, `trans_2`, `trans_3`, `trans_4`, `trans_5`, `trans_6`, `trans_7`) VALUES
	(1, '0022366484', 'john123', 'john', 'JAY1', 'Direct', 'Dollars', 'active', '-', '-', '20000', 'John', 'Doe', 'F.', 'Mr.', 'Male', 'john@jaydoe.com', '+1738400320', '10/11/1962', 'United Kingdom', '14 Vexa Way', 'Florida', 'Texas', 'USA', 'Your account is active', 'none.jpg', '123wax', '2000', NULL, 'Debit Transaction: Your account was debited the sum of $120 on Feb 28th, 2017', 'You have a debit transaction on Jan 4th, 2017', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table ibdb.codes
CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intran` text NOT NULL COMMENT 'International Transfer Code',
  `cot` text NOT NULL,
  `antiteror` text NOT NULL COMMENT 'Anti Terorist Code',
  `eec` text NOT NULL,
  `imf` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ibdb.codes: 1 rows
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
INSERT INTO `codes` (`id`, `intran`, `cot`, `antiteror`, `eec`, `imf`) VALUES
	(1, '09A87351IZ', 'REX9176902IK', 'ANI481701', 'UV9039S3ECx', 'IK78532100IM');
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;

-- Dumping structure for table ibdb.company
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bname` text NOT NULL,
  `email` text,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ibdb.company: 1 rows
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`id`, `bname`, `email`, `address`) VALUES
	(1, 'RelianceGroup', 'info@relianceob.com', 'RelianceGroup\r\nFaith House,\r\n23-24 Lovat Lane,\r\nLondon.\r\nEC3R');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping structure for table ibdb.mails
CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mrg_id` text NOT NULL COMMENT 'mail randomly generated id',
  `msidno` text NOT NULL COMMENT 'sender id',
  `mridno` text NOT NULL COMMENT 'receiver id',
  `msread` text NOT NULL COMMENT 'checks mail read by sender',
  `mrread` text NOT NULL COMMENT 'checks mail read by receiver',
  `msubject` text NOT NULL COMMENT 'subject of the mail',
  `msday` text NOT NULL COMMENT 'the day the mail was sent',
  `msdate` text NOT NULL COMMENT 'the date the mail was sent',
  `msmonth` text NOT NULL COMMENT 'the month the mail was sent',
  `msyear` text NOT NULL COMMENT 'the day the year was sent',
  `msthrs` text NOT NULL COMMENT 'the time the mail was sent in hours',
  `mstmins` text NOT NULL COMMENT 'the time the mail was sent in minutes',
  `mstsecs` text NOT NULL COMMENT 'the time the mail was sent in seconds',
  `mstd` text NOT NULL COMMENT 'the time the mail was sent in period',
  `msclocation` text NOT NULL COMMENT 'mail current location on senders box',
  `mrclocation` text NOT NULL COMMENT 'mail current location on receiver box',
  `mbcontent` text NOT NULL COMMENT 'body content of the mail',
  `macontent` text NOT NULL COMMENT 'attached content of the mail',
  `msfn` text NOT NULL COMMENT 'mail sender first name',
  `msln` text NOT NULL COMMENT 'mail sender last name',
  `mrtrash` text NOT NULL,
  `mstrash` text NOT NULL,
  `dstrash` text NOT NULL,
  `drtrash` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table ibdb.mails: 0 rows
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;

-- Dumping structure for table ibdb.officer
CREATE TABLE IF NOT EXISTS `officer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `officer` text NOT NULL,
  `password` text NOT NULL,
  `fulname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ibdb.officer: 1 rows
/*!40000 ALTER TABLE `officer` DISABLE KEYS */;
INSERT INTO `officer` (`id`, `officer`, `password`, `fulname`, `email`, `phone`) VALUES
	(1, 'admin', 'MastaMind', 'Account Officer', 'support@relianceob.com', '+1 580 825 7031');
/*!40000 ALTER TABLE `officer` ENABLE KEYS */;

-- Dumping structure for table ibdb.transfers
CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `by` text,
  `type` text,
  `amount` text,
  `toaccount` text,
  `toaccholder` text,
  `tobank` text,
  `transdate` text,
  `trasno` text,
  `statement` text,
  `trurl` text,
  `email` text,
  `phone` text,
  `fullname` text,
  `bnkloc` text,
  `trsptitle` text,
  `trsurlset` text,
  `trsptalk` text,
  `trsprequest` text,
  `trsprequestcode` text,
  `trsptitle2` text,
  `trsptalk2` text,
  `trsprequest2` text,
  `trsprequestcode2` text,
  `tdesptitle` text,
  `tdesptalk` text,
  `pera` text,
  `perb` text,
  `perc` text,
  `perd` text,
  `pere` text,
  `perf` text,
  `per` text,
  `process_serial` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ibdb.transfers: 1 rows
/*!40000 ALTER TABLE `transfers` DISABLE KEYS */;
INSERT INTO `transfers` (`id`, `by`, `type`, `amount`, `toaccount`, `toaccholder`, `tobank`, `transdate`, `trasno`, `statement`, `trurl`, `email`, `phone`, `fullname`, `bnkloc`, `trsptitle`, `trsurlset`, `trsptalk`, `trsprequest`, `trsprequestcode`, `trsptitle2`, `trsptalk2`, `trsprequest2`, `trsprequestcode2`, `tdesptitle`, `tdesptalk`, `pera`, `perb`, `perc`, `perd`, `pere`, `perf`, `per`, `process_serial`) VALUES
	(3, 'john', 'a wire transfer', '300', '65767980', 'Auto', 'First Bank', '6th-Jun-2017', '1032211384', NULL, NULL, 'john@jaydoe.com', '+1738400320', 'John F. Doe', 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0101'),
	(4, 'john', 'a wire transfer', '400', '756878p', 'Manual', 'Diamind', '6th-Jun-2017', 'hgdaAk', 'This transfer is currently pending.', 'intertranscode.php', 'john@jaydoe.com', '+1738400320', 'John F. Doe', 'France', 'COT Required', 'transprocess.php', 'Please enter your COT code below', 'COT Code', 'ijjkcAgic', NULL, NULL, NULL, NULL, NULL, NULL, '1', '9', '15', '21', '28', '37', 'COT CODE REQUIRED FOR THIS TRANSFER', NULL);
/*!40000 ALTER TABLE `transfers` ENABLE KEYS */;

-- Dumping structure for table ibdb.trans_process
CREATE TABLE IF NOT EXISTS `trans_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(50) NOT NULL,
  `min_per` text,
  `max_per` text,
  `statement` text,
  `title` text,
  `line` text,
  `label` text,
  `value` text,
  `next` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Serial` (`serial`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ibdb.trans_process: ~5 rows (approximately)
/*!40000 ALTER TABLE `trans_process` DISABLE KEYS */;
INSERT INTO `trans_process` (`id`, `serial`, `min_per`, `max_per`, `statement`, `title`, `line`, `label`, `value`, `next`) VALUES
	(1, '0101', '1', '70', 'COT CODE REQUIRED FOR THIS TRANSFER', 'COT Required', 'Please enter your COT code below', 'COT Code', 'JKI672GiCO2', '0202'),
	(2, '0202', '10', '100', 'TAX CLEARANCE CODE REQUIRED FOR THIS TRANSFER', 'Tax Clearance Required', 'Please enter your Tax Clearance below', 'Tax Clearance', '9927IDB38AF', '0303'),
	(3, '0303', '3', '95', 'IMF CODE REQUIRED FOR THIS TRANSFER', 'IMF Required', 'Please enter your IMF code below', 'IMF Code', 'TYK9222IOH', '0404'),
	(4, '0404', '5', '100', 'DEMURRAGE CODE REQUIRED FOR THIS TRANSFER', 'Demurrage Required', 'Please enter your Demurrage code below', 'Demurrage Code', 'UJH7323TW2', '0505'),
	(5, '0505', '20', '86', 'AUTHORIZATION CODE REQUIRED FOR THIS TRANSFER', 'Authorization Required', 'Please enter your Authorization code below', 'Authorization Code', 'XV623EH9232', 'completed');
/*!40000 ALTER TABLE `trans_process` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

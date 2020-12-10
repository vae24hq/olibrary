-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-02-27 09:34:36
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for shimdb
CREATE DATABASE IF NOT EXISTS `shimdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `shimdb`;


-- Dumping structure for table shimdb.accommodation
CREATE TABLE IF NOT EXISTS `accommodation` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Customer` varchar(40) DEFAULT NULL,
  `Room` varchar(40) DEFAULT 'none',
  `Type` varchar(20) DEFAULT 'checkin' COMMENT '(checkin, reservation)',
  `AccommodationStatus` varchar(30) DEFAULT 'open',
  `CheckInDate` varchar(30) DEFAULT NULL,
  `CheckOutDate` varchar(30) DEFAULT NULL,
  `DateCheckedIn` varchar(30) DEFAULT NULL,
  `DateCheckedOut` varchar(30) DEFAULT NULL,
  `NoOfDays` varchar(10) DEFAULT NULL,
  `ReceiptNo` varchar(10) DEFAULT NULL,
  `DiscountedAmount` varchar(10) DEFAULT NULL,
  `DepositRequired` varchar(10) DEFAULT NULL,
  `UnitCost` varchar(10) DEFAULT NULL,
  `TotalCost` varchar(10) DEFAULT NULL,
  `AmountDeposited` varchar(10) DEFAULT NULL,
  `Balance` varchar(10) DEFAULT NULL,
  `InvoiceStatus` varchar(20) DEFAULT NULL COMMENT '(tabbed, credit, paid)',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_CustomerInfo` (`Customer`),
  KEY `FK_Room` (`Room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.accommodation: ~0 rows (approximately)
/*!40000 ALTER TABLE `accommodation` DISABLE KEYS */;
/*!40000 ALTER TABLE `accommodation` ENABLE KEYS */;


-- Dumping structure for table shimdb.app
CREATE TABLE IF NOT EXISTS `app` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Developer` varchar(600) DEFAULT NULL,
  `DevTime` varchar(30) DEFAULT NULL,
  `AppStatus` varchar(10) DEFAULT 'avaliable',
  `data_status` varchar(10) DEFAULT 'locked',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.app: ~1 rows (approximately)
/*!40000 ALTER TABLE `app` DISABLE KEYS */;
REPLACE INTO `app` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Developer`, `DevTime`, `AppStatus`, `data_status`) VALUES
	(1, 'KR2863PIZ874020860', '1360552385', 'QN9962987171429HB1360552385PX', 'System for Hotel Information Management', 'SHIM', 'Dev360&#176;', '1360552236', 'avaliable', 'locked');
/*!40000 ALTER TABLE `app` ENABLE KEYS */;


-- Dumping structure for table shimdb.app_clients
CREATE TABLE IF NOT EXISTS `app_clients` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `PrimaryEmail` varchar(50) DEFAULT NULL,
  `PrimaryPhone` varchar(20) DEFAULT NULL,
  `ContactInfo` varchar(200) DEFAULT NULL,
  `ServiceProvider` varchar(40) DEFAULT NULL,
  `UserLicense` varchar(40) DEFAULT 'demo',
  `AccountID` varchar(10) DEFAULT 'active',
  `AccountStatus` varchar(10) DEFAULT 'active',
  `data_status` varchar(10) DEFAULT 'locked',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_License` (`UserLicense`),
  KEY `FK_SP` (`ServiceProvider`),
  CONSTRAINT `FK_License` FOREIGN KEY (`UserLicense`) REFERENCES `app_license` (`fuid`),
  CONSTRAINT `FK_SP` FOREIGN KEY (`ServiceProvider`) REFERENCES `app_sp` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='The application''s service providers'' clients';

-- Dumping data for table shimdb.app_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_clients` ENABLE KEYS */;


-- Dumping structure for table shimdb.app_license
CREATE TABLE IF NOT EXISTS `app_license` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Application` varchar(40) DEFAULT NULL,
  `Usage` varchar(4) DEFAULT NULL COMMENT '(no of times the license has been used)',
  `UserQty` varchar(4) DEFAULT NULL COMMENT '(no of users currently using this license)',
  `LicensedOn` varchar(30) DEFAULT NULL,
  `LicenseExpires` varchar(30) DEFAULT NULL,
  `LicenseQty` varchar(4) DEFAULT '1' COMMENT 'multi, or (specific value e.g. 2)',
  `LicenseType` varchar(10) DEFAULT NULL COMMENT '(lifetime, period)',
  `LicenseState` varchar(10) DEFAULT 'new' COMMENT '(new, active, expired)',
  `data_status` varchar(10) DEFAULT 'locked',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_Application` (`Application`),
  CONSTRAINT `FK_Application` FOREIGN KEY (`Application`) REFERENCES `app` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='The application''s service license';

-- Dumping data for table shimdb.app_license: ~1 rows (approximately)
/*!40000 ALTER TABLE `app_license` DISABLE KEYS */;
REPLACE INTO `app_license` (`puid`, `suid`, `tuid`, `fuid`, `Application`, `Usage`, `UserQty`, `LicensedOn`, `LicenseExpires`, `LicenseQty`, `LicenseType`, `LicenseState`, `data_status`) VALUES
	(1, 'demo', 'demo', 'demo', NULL, NULL, NULL, NULL, NULL, 'mult', 'lifetime', 'new', 'locked');
/*!40000 ALTER TABLE `app_license` ENABLE KEYS */;


-- Dumping structure for table shimdb.app_set
CREATE TABLE IF NOT EXISTS `app_set` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `SetOf` varchar(40) DEFAULT 'none',
  `SetType` varchar(20) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'locked',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.app_set: ~13 rows (approximately)
/*!40000 ALTER TABLE `app_set` DISABLE KEYS */;
REPLACE INTO `app_set` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `SetOf`, `SetType`, `data_status`) VALUES
	(1, '0800', '0900', '0AR', 'Read', 'R', NULL, 'none', 'AccessRight', 'locked'),
	(2, '0801', '0901', '1AR', 'Write', 'W', NULL, 'none', 'AccessRight', 'locked'),
	(3, '0802', '0902', '2AR', 'Modify', 'M', NULL, 'none', 'AccessRight', 'locked'),
	(4, '0803', '0903', '3AR', 'Write and Modify', 'RWM', NULL, 'none', 'AccessRight', 'locked'),
	(5, '0804', '0904', '4AR', 'Delete', 'D', NULL, 'none', 'AccessRight', 'locked'),
	(6, '0805', '0905', '5AR', 'Write and Delete', 'WD', NULL, 'none', 'AccessRight', 'locked'),
	(7, '0806', '0906', '6AR', 'Modify and Delete', 'MD', NULL, 'none', 'AccessRight', 'locked'),
	(8, '0807', '0907', '7AR', 'Complete Access', 'WMD', NULL, 'none', 'AccessRight', 'locked'),
	(9, '0600', '0700', '0Priv', 'Regular', NULL, NULL, 'none', 'Privilege', 'locked'),
	(10, '0601', '0701', '1Priv', 'Supervisor', NULL, NULL, 'none', 'Privilege', 'locked'),
	(11, '0602', '0702', '2Priv', 'Manager', NULL, NULL, 'none', 'Privilege', 'locked'),
	(12, '0604', '0704', '4Priv', 'Admin', NULL, NULL, 'none', 'Privilege', 'locked'),
	(13, '0607', '0707', '7Priv', 'Developer', NULL, NULL, 'none', 'Privilege', 'locked');
/*!40000 ALTER TABLE `app_set` ENABLE KEYS */;


-- Dumping structure for table shimdb.app_sp
CREATE TABLE IF NOT EXISTS `app_sp` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Name` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `PrimaryEmail` varchar(50) DEFAULT NULL,
  `PrimaryPhone` varchar(20) DEFAULT NULL,
  `ContactInfo` varchar(200) DEFAULT NULL,
  `WebsiteAddress` varchar(30) DEFAULT NULL,
  `AccountID` varchar(10) DEFAULT NULL,
  `AccountStatus` varchar(10) DEFAULT 'active',
  `data_status` varchar(10) DEFAULT 'locked',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='The application''s service providers';

-- Dumping data for table shimdb.app_sp: ~1 rows (approximately)
/*!40000 ALTER TABLE `app_sp` DISABLE KEYS */;
REPLACE INTO `app_sp` (`puid`, `suid`, `tuid`, `fuid`, `Name`, `Acronym`, `PrimaryEmail`, `PrimaryPhone`, `ContactInfo`, `WebsiteAddress`, `AccountID`, `AccountStatus`, `data_status`) VALUES
	(1, 'KS1923QCX352808518', '1360556503', 'QN1952199098886IC1360556503PW', 'Dynat Future Solution', 'Dynat', 'info@dynat.com.ng', '+234 (0) 802 289 410', NULL, 'www.dynat.com.ng', 'Seamlux', 'active', 'locked');
/*!40000 ALTER TABLE `app_sp` ENABLE KEYS */;


-- Dumping structure for table shimdb.contact_info
CREATE TABLE IF NOT EXISTS `contact_info` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Label` varchar(100) DEFAULT NULL,
  `Information` varchar(600) DEFAULT NULL,
  `Category` varchar(40) DEFAULT NULL,
  `PersonInfo` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_ContactPersonInfo` (`PersonInfo`),
  CONSTRAINT `FK_ContactPersonInfo` FOREIGN KEY (`PersonInfo`) REFERENCES `person_info` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.contact_info: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_info` ENABLE KEYS */;


-- Dumping structure for table shimdb.corporate_info
CREATE TABLE IF NOT EXISTS `corporate_info` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `CustomerID` varchar(40) DEFAULT NULL,
  `Corporation` varchar(80) DEFAULT NULL,
  `Acronym` varchar(20) DEFAULT NULL,
  `CustomerType` varchar(50) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_StaffInfo` (`data_author`),
  CONSTRAINT `FK_CorporateInfoAuthor` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.corporate_info: ~1 rows (approximately)
/*!40000 ALTER TABLE `corporate_info` DISABLE KEYS */;
REPLACE INTO `corporate_info` (`puid`, `suid`, `tuid`, `fuid`, `CustomerID`, `Corporation`, `Acronym`, `CustomerType`, `data_author`, `data_status`) VALUES
	(1, '0545', '7134', '89244', '786214', 'Coca-Cola Bottling Company Plc', 'Coke', 'Regular', NULL, 'fixed');
/*!40000 ALTER TABLE `corporate_info` ENABLE KEYS */;


-- Dumping structure for table shimdb.customer_info
CREATE TABLE IF NOT EXISTS `customer_info` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `CustomerID` varchar(10) DEFAULT NULL,
  `CorporateInfo` varchar(40) DEFAULT 'none',
  `CustomerType` varchar(50) DEFAULT 'new',
  `PersonInfo` varchar(40) DEFAULT 'none',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.customer_info: ~9 rows (approximately)
/*!40000 ALTER TABLE `customer_info` DISABLE KEYS */;
REPLACE INTO `customer_info` (`puid`, `suid`, `tuid`, `fuid`, `CustomerID`, `CorporateInfo`, `CustomerType`, `PersonInfo`, `data_author`, `data_status`) VALUES
	(1, 'GR7837PBZ377565377', '1361876631', 'TP5174382143016GB1361876631RZ', 'RHR76757', '89244', 'new', 'TP5174382143016GB1361876631RZ', NULL, 'fixed'),
	(2, 'ET4084KCY760274391', '1361882928', 'RN2394116609339EB1361882928QZ', 'RHR46793', 'none', 'new', 'RN2394116609339EB1361882928QZ', NULL, 'fixed'),
	(3, 'GS4938PCY103298930', '1361882998', 'UP1231275015236EB1361882998TZ', 'RHR54360', '89244', 'new', 'UP1231275015236EB1361882998TZ', NULL, 'fixed'),
	(4, 'GT1223QDZ300402156', '1361887290', 'RN2459522353469GB1361887290PZ', 'RHR51627', 'none', 'new', 'RN2459522353469GB1361887290PZ', NULL, 'fixed'),
	(5, 'HV2930OCZ975639259', '1361904378', 'RM5557158275338EC1361904378QZ', 'RHR23759', 'none', 'new', 'RM5557158275338EC1361904378QZ', NULL, 'fixed'),
	(6, 'ES7567NBZ913217850', '1361913913', 'UP6303094408756HD1361913913SZ', 'RHR70526', 'none', 'new', 'UP6303094408756HD1361913913SZ', NULL, 'fixed'),
	(7, 'HR5804NEW262251359', '1361913991', 'SM6084815017749HB1361913991QW', 'RHR95682', 'none', 'new', 'SM6084815017749HB1361913991QW', NULL, 'fixed'),
	(8, 'HU4866RDZ129530385', '1361930793', 'SK9816103822919DB1361930793OX', 'RHR30540', 'none', 'new', 'SK9816103822919DB1361930793OX', NULL, 'fixed'),
	(9, 'IS9460PDZ173924433', '1361952626', 'VP9316962994677JD1361952626TZ', 'RHR97409', 'none', 'new', 'VP9316962994677JD1361952626TZ', NULL, 'fixed');
/*!40000 ALTER TABLE `customer_info` ENABLE KEYS */;


-- Dumping structure for table shimdb.expenditure
CREATE TABLE IF NOT EXISTS `expenditure` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(80) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL COMMENT '(diesel, kitchen, drinks, wine,other)',
  `Period` varchar(40) DEFAULT NULL COMMENT '(date)',
  `Amount` varchar(10) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_ExpenditureStaffInfo` (`data_author`),
  CONSTRAINT `FK_ExpenditureStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.expenditure: ~7 rows (approximately)
/*!40000 ALTER TABLE `expenditure` DISABLE KEYS */;
REPLACE INTO `expenditure` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Description`, `Category`, `Period`, `Amount`, `data_author`, `data_status`) VALUES
	(1, 'FR9510PDZ124432325', '1361744104', 'SJ1492793053288DB1361744104NY', 'Payment for Diesel', 'I bought diesel ', 'disel', '1361744104', '45000', NULL, 'fixed'),
	(2, 'FQ3371NCZ260235402', '1361745027', 'SN5075573904305GD1361745027RY', 'Bags of Rice', NULL, 'kitchen', '1361745027', '7000', NULL, 'fixed'),
	(3, 'IT5678OGZ917629956', '1361750494', 'TQ4873763181886JE1361750494SX', 'Drinks', NULL, 'drinks', '1361750494', '5000', NULL, 'fixed'),
	(5, 'IS9220QFZ819928971', '1361750521', 'SN7377463839996ID1361750521QX', 'Drinks', NULL, 'drinks', '1361750521', '4000', NULL, 'fixed'),
	(6, 'IS2746QCY352107032', '1361774384', 'VM5970846029841DB1361774384UZ', 'Balis', NULL, 'wine', '1361774384', '5000', NULL, 'fixed'),
	(7, 'FP7383NBX191948101', '1361774411', 'VO2373651702810FC1361774411UY', 'Beans', NULL, 'kitchen', '1361774411', '7000', NULL, 'fixed'),
	(8, 'DQ7807OBW667057114', '1361774428', 'SK3229201001634DB1361774428QZ', 'Bread', NULL, 'kitchen', '1361774428', '1000', NULL, 'fixed');
/*!40000 ALTER TABLE `expenditure` ENABLE KEYS */;


-- Dumping structure for table shimdb.hr_set
CREATE TABLE IF NOT EXISTS `hr_set` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `IsStore` varchar(10) DEFAULT 'no' COMMENT 'is department also a store (yes or no)',
  `SetOf` varchar(40) DEFAULT 'none' COMMENT '(select fuid of super set)',
  `SetType` varchar(20) DEFAULT NULL COMMENT '(department, role, position)',
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='HR entries for department, role, position';

-- Dumping data for table shimdb.hr_set: ~10 rows (approximately)
/*!40000 ALTER TABLE `hr_set` DISABLE KEYS */;
REPLACE INTO `hr_set` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `IsStore`, `SetOf`, `SetType`, `data_status`) VALUES
	(1, '08091', '08072', '07212', 'Reception', 'RC', NULL, 'no', 'none', NULL, 'fixed'),
	(2, '0721', '5623', '84224', 'Laundry', 'LD', NULL, 'no', 'none', NULL, 'fixed'),
	(3, '0266131', '88272344', '665232', 'Bush Bar', 'BB', NULL, 'yes', 'none', NULL, 'fixed'),
	(4, '823613', '77324', '651331', 'VIP Bar', 'VB', NULL, 'yes', 'none', NULL, 'fixed'),
	(5, '18832', '992832', '52121', 'Restaurant', 'R', NULL, 'yes', 'none', NULL, 'fixed'),
	(6, '987632', '4523672', '29846', 'VIP Restaurant', 'VR', NULL, 'yes', 'none', NULL, 'fixed'),
	(7, '253139', '366231', '3394274216', 'Swimming Pool', 'SP', NULL, 'no', '07212', '', 'fixed'),
	(8, '245313', '567832', '36728', 'Hall', NULL, NULL, 'no', '07212', '', 'fixed'),
	(9, '09134', '201313', '990021', 'Car Hire', NULL, NULL, 'no', '07212', NULL, 'fixed'),
	(10, '000234', '321002', '2003224', 'Gymnasium', 'Gym', NULL, 'no', '07212', NULL, 'fixed');
/*!40000 ALTER TABLE `hr_set` ENABLE KEYS */;


-- Dumping structure for table shimdb.income_carhire
CREATE TABLE IF NOT EXISTS `income_carhire` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Driver` varchar(60) DEFAULT NULL,
  `Destination` varchar(600) DEFAULT NULL,
  `SignOut` varchar(40) DEFAULT NULL,
  `SignIn` varchar(40) DEFAULT NULL,
  `TimeOut` varchar(30) DEFAULT NULL,
  `TimeIn` varchar(30) DEFAULT NULL,
  `StaffOnDuty` varchar(40) DEFAULT NULL,
  `Amount` varchar(10) DEFAULT NULL,
  `InvoiceStatus` varchar(10) DEFAULT 'unpaid',
  `StatusUpdated` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.income_carhire: ~4 rows (approximately)
/*!40000 ALTER TABLE `income_carhire` DISABLE KEYS */;
REPLACE INTO `income_carhire` (`puid`, `suid`, `tuid`, `fuid`, `Driver`, `Destination`, `SignOut`, `SignIn`, `TimeOut`, `TimeIn`, `StaffOnDuty`, `Amount`, `InvoiceStatus`, `StatusUpdated`, `data_status`) VALUES
	(1, 'GR3523PEZ542266609', '1361736246', 'UQ5193803804330IC1361736246SY', 'Osarumen Cason', 'He has paid', NULL, NULL, '12:22pm', '3:00pm', NULL, '5000', 'paid', '1361787083', 'fixed'),
	(2, 'FR5508NCZ754314465', '1361736910', 'SN1348146351371EC1361736910QZ', 'Benford Urhioha', NULL, NULL, NULL, '2:00pm', '3:00pm', NULL, '2000', 'paid', '1361787068', 'fixed'),
	(3, 'DN8193KBV346442598', '1361781935', 'VS1296297327424KB1361781935UZ', 'Johnson Klu', NULL, NULL, NULL, '3:00pm', NULL, NULL, NULL, 'paid', NULL, 'fixed'),
	(4, 'GT6678QEZ597965784', '1361930365', 'VO7827614062341IC1361930365SY', 'Osas', 'Eyean', NULL, NULL, '12:00pm', NULL, NULL, NULL, 'unpaid', NULL, 'fixed');
/*!40000 ALTER TABLE `income_carhire` ENABLE KEYS */;


-- Dumping structure for table shimdb.income_gymn
CREATE TABLE IF NOT EXISTS `income_gymn` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `FullName` varchar(80) DEFAULT NULL,
  `IDCard` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Period` varchar(20) DEFAULT NULL,
  `Duration` varchar(30) DEFAULT NULL,
  `Amount` varchar(10) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  KEY `FK_GymnStaffInfo` (`data_author`),
  CONSTRAINT `FK_GymnStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.income_gymn: ~2 rows (approximately)
/*!40000 ALTER TABLE `income_gymn` DISABLE KEYS */;
REPLACE INTO `income_gymn` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `IDCard`, `Description`, `Period`, `Duration`, `Amount`, `data_author`, `data_status`) VALUES
	(1, 'HU6472SCZ886705519', '1361730776', 'VR4262280373607LI1361730776UZ', 'Anthony O. Isaac', '0803', NULL, '1361730776', '2 weeks', '3000', NULL, 'fixed'),
	(2, 'FV8842OCZ575289594', '1361730994', 'VQ5427201557867IC1361730994UZ', 'Raymond Chang', '79982B', 'For next month', '1361730994', '1 month', '5000', NULL, 'fixed');
/*!40000 ALTER TABLE `income_gymn` ENABLE KEYS */;


-- Dumping structure for table shimdb.income_hall
CREATE TABLE IF NOT EXISTS `income_hall` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `FullName` varchar(80) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Period` varchar(30) DEFAULT NULL,
  `Deposit` varchar(10) DEFAULT NULL,
  `Amount` varchar(10) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  KEY `FK_GymnStaffInfo` (`data_author`),
  CONSTRAINT `FK_HallStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.income_hall: ~2 rows (approximately)
/*!40000 ALTER TABLE `income_hall` DISABLE KEYS */;
REPLACE INTO `income_hall` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `Description`, `Period`, `Deposit`, `Amount`, `data_author`, `data_status`) VALUES
	(1, 'EP6369LBY599623201', '1361728918', 'SO2266824701505EB1361728918RX', 'Anthony O. Isaac', 'The customer paid for the Hall', '1361728918', '5000', '15000', NULL, 'fixed'),
	(2, 'IS4943OCX683359011', '1361930410', 'WT7089785281202IE1361930410VZ', 'dd', 'q', '1361930410', '2000', '2000', NULL, 'fixed');
/*!40000 ALTER TABLE `income_hall` ENABLE KEYS */;


-- Dumping structure for table shimdb.income_pool
CREATE TABLE IF NOT EXISTS `income_pool` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Period` varchar(30) DEFAULT NULL,
  `Amount` varchar(10) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  KEY `FK_GymnStaffInfo` (`data_author`),
  CONSTRAINT `FK_PoolStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.income_pool: ~3 rows (approximately)
/*!40000 ALTER TABLE `income_pool` DISABLE KEYS */;
REPLACE INTO `income_pool` (`puid`, `suid`, `tuid`, `fuid`, `Description`, `Period`, `Amount`, `data_author`, `data_status`) VALUES
	(1, 'IR5000PFX468629074', '1361727709', 'TN5093910757707HD1361727709QZ', 'Swimming Pool and Truck', '1361727709', '2000', NULL, 'fixed'),
	(2, 'HQ1057OEZ553463587', '1361727755', 'TP9604931367169GD1361727755SZ', 'Swimming', '1361727755', '400', NULL, 'fixed'),
	(3, 'GO8924MEY728389467', '1361781849', 'UM7835208193683HE1361781849SZ', 'Swimming', '1361781849', '500', NULL, 'fixed');
/*!40000 ALTER TABLE `income_pool` ENABLE KEYS */;


-- Dumping structure for table shimdb.income_pos
CREATE TABLE IF NOT EXISTS `income_pos` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `BuyerisRoomStay` varchar(10) DEFAULT 'no' COMMENT '(yes or no)',
  `RoomStay` varchar(40) DEFAULT NULL COMMENT '(room stay transaction id)',
  `PosBuyer` varchar(40) DEFAULT NULL,
  `InvItem` varchar(40) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Qty` varchar(30) DEFAULT NULL,
  `UnitPrice` varchar(10) DEFAULT NULL,
  `Amount` varchar(10) DEFAULT NULL,
  `Period` varchar(30) DEFAULT NULL,
  `InvoiceNo` varchar(10) DEFAULT NULL COMMENT '(pos id to track transactions of a particular cart)',
  `InvoiceState` varchar(30) DEFAULT NULL COMMENT '(paid, credit or tabbed)',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  KEY `FK_GymnStaffInfo` (`data_author`),
  KEY `FK_POSInventoryItem` (`InvItem`),
  KEY `FK_POSBuyer` (`PosBuyer`),
  CONSTRAINT `FK_POSBuyer` FOREIGN KEY (`PosBuyer`) REFERENCES `pos_buyer` (`fuid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_POSInventoryItem` FOREIGN KEY (`InvItem`) REFERENCES `inventory_item` (`fuid`),
  CONSTRAINT `FK_POSStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.income_pos: ~0 rows (approximately)
/*!40000 ALTER TABLE `income_pos` DISABLE KEYS */;
/*!40000 ALTER TABLE `income_pos` ENABLE KEYS */;


-- Dumping structure for table shimdb.inventory_category
CREATE TABLE IF NOT EXISTS `inventory_category` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `SubSetOf` varchar(40) DEFAULT 'none' COMMENT '(select fuid of super set)',
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.inventory_category: ~4 rows (approximately)
/*!40000 ALTER TABLE `inventory_category` DISABLE KEYS */;
REPLACE INTO `inventory_category` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `SubSetOf`, `data_status`) VALUES
	(1, 'KV2976QGZ917955988', '1361741799', 'WQ6510858139375GC1361741799TZ', 'Drinks', NULL, NULL, NULL, 'fixed'),
	(2, 'DP1785KBZ311964473', '1361741828', 'UN6116447664223HB1361741828TZ', 'Bear', NULL, NULL, 'WQ6510858139375GC1361741799TZ', 'fixed'),
	(3, 'GQ6458NDZ345662854', '1361780285', 'TL6369958881168GE1361780285RY', 'Gulder', NULL, NULL, 'UN6116447664223HB1361741828TZ', 'fixed'),
	(4, 'EO4158LCZ996300876', '1361780771', 'TM9092445049307HC1361780771SZ', 'Cigar', NULL, NULL, NULL, 'fixed');
/*!40000 ALTER TABLE `inventory_category` ENABLE KEYS */;


-- Dumping structure for table shimdb.inventory_item
CREATE TABLE IF NOT EXISTS `inventory_item` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `ItemType` varchar(20) DEFAULT 'comodity',
  `InvCat` varchar(40) DEFAULT NULL,
  `InvStore` varchar(40) DEFAULT NULL,
  `QtyInStore` varchar(10) DEFAULT NULL,
  `UnitPrice` varchar(10) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_InventoryCategory` (`InvCat`),
  KEY `FK_InventoryStore` (`InvStore`),
  CONSTRAINT `FK_InventoryCategory` FOREIGN KEY (`InvCat`) REFERENCES `inventory_category` (`fuid`),
  CONSTRAINT `FK_InventoryStore` FOREIGN KEY (`InvStore`) REFERENCES `hr_set` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.inventory_item: ~1 rows (approximately)
/*!40000 ALTER TABLE `inventory_item` DISABLE KEYS */;
REPLACE INTO `inventory_item` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `ItemType`, `InvCat`, `InvStore`, `QtyInStore`, `UnitPrice`, `data_status`) VALUES
	(1, 'FP3566MBZ905698032', '1361794709', 'TO9853914782211GD1361794709SZ', 'Stout', NULL, NULL, 'comodity', 'UN6116447664223HB1361741828TZ', '651331', '10', '100', 'fixed');
/*!40000 ALTER TABLE `inventory_item` ENABLE KEYS */;


-- Dumping structure for table shimdb.inventory_log
CREATE TABLE IF NOT EXISTS `inventory_log` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `InvItem` varchar(40) DEFAULT NULL,
  `Qty` varchar(10) DEFAULT NULL COMMENT '(quantity supplied in or out)',
  `logDate` varchar(30) DEFAULT NULL COMMENT '(date of supply)',
  `RecievedBy` varchar(40) DEFAULT NULL,
  `SuppliedBy` varchar(40) DEFAULT NULL,
  `SupplyType` varchar(10) DEFAULT NULL COMMENT '(supplied in or out of the store)',
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_LogInventoryItem` (`InvItem`),
  CONSTRAINT `FK_LogInventoryItem` FOREIGN KEY (`InvItem`) REFERENCES `inventory_item` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.inventory_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `inventory_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_log` ENABLE KEYS */;


-- Dumping structure for table shimdb.person_info
CREATE TABLE IF NOT EXISTS `person_info` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `FullName` varchar(80) DEFAULT NULL,
  `PrimaryPhone` varchar(40) DEFAULT NULL,
  `PrimaryEmail` varchar(40) DEFAULT NULL,
  `PrimaryAddress` varchar(100) DEFAULT NULL,
  `BirthDate` varchar(30) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.person_info: ~10 rows (approximately)
/*!40000 ALTER TABLE `person_info` DISABLE KEYS */;
REPLACE INTO `person_info` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `PrimaryPhone`, `PrimaryEmail`, `PrimaryAddress`, `BirthDate`, `Sex`, `data_status`) VALUES
	(1, '07085', '09083', '0763842', 'Anthony Staff', NULL, NULL, NULL, NULL, NULL, 'fixed'),
	(2, 'GR7837PBZ377565377', '1361876631', 'TP5174382143016GB1361876631RZ', 'Anthony Coke Cleint', '08133798803', 'info@t-isaac.com', 'Dynat Future Solution\r\nUgbowo', '12/10/2012', 'male', 'fixed'),
	(3, 'ET4084KCY760274391', '1361882928', 'RN2394116609339EB1361882928QZ', 'Peter Edike', '0808', NULL, '\r\n', NULL, 'male', 'fixed'),
	(4, 'GS4938PCY103298930', '1361882998', 'UP1231275015236EB1361882998TZ', 'John Ikeba', '08054564', NULL, NULL, NULL, 'male', 'fixed'),
	(5, 'GT1223QDZ300402156', '1361887290', 'RN2459522353469GB1361887290PZ', 'Anthony O. Isaac', '08133798803', 'info@t-isaac.com', 'Ugbowo', '12/12/1203', 'male', 'fixed'),
	(6, 'HV2930OCZ975639259', '1361904378', 'RM5557158275338EC1361904378QZ', 'Tony Isaac', '08037091639', 'caix@gmail.com', 'Ugbowo', '12/10/2091', 'male', 'fixed'),
	(7, 'ES7567NBZ913217850', '1361913913', 'UP6303094408756HD1361913913SZ', 'Imah David Samsom', '080808', NULL, NULL, NULL, 'male', 'fixed'),
	(8, 'HR5804NEW262251359', '1361913991', 'SM6084815017749HB1361913991QW', 'Craig Ian Romeo', NULL, NULL, NULL, NULL, 'male', 'fixed'),
	(9, 'HU4866RDZ129530385', '1361930793', 'SK9816103822919DB1361930793OX', 'Sia-sia Samson', NULL, NULL, NULL, NULL, 'male', 'fixed'),
	(10, 'IS9460PDZ173924433', '1361952626', 'VP9316962994677JD1361952626TZ', 'Kanu Jay Fredson', '07091254878', 'fredi@yahoo.com', NULL, NULL, 'male', 'fixed');
/*!40000 ALTER TABLE `person_info` ENABLE KEYS */;


-- Dumping structure for table shimdb.pos_buyer
CREATE TABLE IF NOT EXISTS `pos_buyer` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `FullName` varchar(80) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_PosBuyerStaffInfo` (`data_author`),
  CONSTRAINT `FK_PosBuyerStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.pos_buyer: ~0 rows (approximately)
/*!40000 ALTER TABLE `pos_buyer` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_buyer` ENABLE KEYS */;


-- Dumping structure for table shimdb.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `RoomType` varchar(40) DEFAULT NULL,
  `Status` varchar(30) DEFAULT 'available' COMMENT '(available, instay, reserved, unavailable)',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `Fuid` (`fuid`),
  KEY `FK_RoomsType` (`RoomType`),
  KEY `FK_RoomsStaffInfo` (`data_author`),
  CONSTRAINT `FK_RoomsStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`),
  CONSTRAINT `FK_RoomsType` FOREIGN KEY (`RoomType`) REFERENCES `room_type` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.rooms: ~0 rows (approximately)
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;


-- Dumping structure for table shimdb.room_type
CREATE TABLE IF NOT EXISTS `room_type` (
  `Puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Price` varchar(10) DEFAULT NULL,
  `Deposit` varchar(10) DEFAULT NULL,
  `Qty` varchar(5) DEFAULT '0',
  `QtyAvaliable` varchar(5) DEFAULT '0',
  `QtyReserved` varchar(5) DEFAULT '0',
  `QtyInStay` varchar(5) DEFAULT '0',
  `Status` varchar(20) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`Puid`),
  UNIQUE KEY `Fuid` (`fuid`),
  KEY `FK_RoomTypeStaffInfo` (`data_author`),
  CONSTRAINT `FK_RoomTypeStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.room_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
REPLACE INTO `room_type` (`Puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `Price`, `Deposit`, `Qty`, `QtyAvaliable`, `QtyReserved`, `QtyInStay`, `Status`, `data_author`, `data_status`) VALUES
	(1, 'FQ2958OCV815043928', '1361953400', 'QN6101682082380HC1361953400PX', 'Junior Double', 'JD', NULL, '6500', '2000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(2, 'IQ4819NCZ887128294', '1361953454', 'VR2841354329447HE1361953454TZ', 'Double', 'D', NULL, '8000', '2000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(3, 'GS4603LBZ807086667', '1361953474', 'TL8543587518372FB1361953474QZ', 'Executive Double Junior', 'ExDJnr', NULL, '10000', '2000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(4, 'EQ9767JBX803628646', '1361953524', 'TN3271432316178FB1361953524SY', 'Executive Double Senior', 'ExDSnr', NULL, '11500', '2000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(5, 'GP6403MBZ439411434', '1361953554', 'VN3949344311683EC1361953554UZ', 'Executive Special', 'ExSp', NULL, '13000', '3000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(6, 'GQ4910MCX173561843', '1361953576', 'TP4851574001754IF1361953576RX', 'King View', 'KV', NULL, '13500', '3000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(7, 'GS6835OBZ721259524', '1361953601', 'UQ3779832505729HE1361953601SY', 'King and Queen Royal Suite', 'KQRS', NULL, '14000', '3000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(8, 'FO7468MDY108294635', '1361953732', 'UM7243048228079GD1361953732RZ', 'Presidential Suite', 'PS', NULL, '16000', '3000', '0', '0', '0', '0', 'available ', NULL, 'fixed'),
	(9, 'GV2302TEZ976963956', '1361953755', 'SN3086369879767FD1361953755RZ', 'Family Apartment', 'FM', NULL, '20000', '3000', '0', '0', '0', '0', 'available ', NULL, 'fixed');
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;


-- Dumping structure for table shimdb.salary
CREATE TABLE IF NOT EXISTS `salary` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `StaffInfo` varchar(40) DEFAULT NULL,
  `SalaryPeriod` varchar(40) DEFAULT NULL COMMENT '(salary for when)',
  `WorkingDays` varchar(10) DEFAULT NULL COMMENT 'no of woking days',
  `DaysAbsent` varchar(10) DEFAULT NULL COMMENT 'no of days absent - cals from salary set and input amount',
  `DaysLate` varchar(10) DEFAULT NULL COMMENT 'no of days late - cals from salary set and input amount',
  `PayableDays` varchar(10) DEFAULT NULL COMMENT 'no of days payable',
  `TaxDeduction` varchar(10) DEFAULT NULL COMMENT 'cals from salary set and input amount',
  `OtherDeductions` varchar(10) DEFAULT NULL COMMENT 'amount',
  `BasicSalary` varchar(10) DEFAULT NULL COMMENT 'collects from staff info salary field',
  `PayOut` varchar(10) DEFAULT NULL COMMENT 'after deductions input amount',
  `SalaryStatus` varchar(10) DEFAULT NULL COMMENT '(prepared, paid, recieved)',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_SalaryStaffInfo` (`StaffInfo`),
  KEY `FK_salary_staff_info` (`data_author`),
  CONSTRAINT `FK_SalaryStaffInfo` FOREIGN KEY (`StaffInfo`) REFERENCES `staff_info` (`fuid`),
  CONSTRAINT `FK_salary_staff_info` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.salary: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;


-- Dumping structure for table shimdb.staff_info
CREATE TABLE IF NOT EXISTS `staff_info` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Department` varchar(40) DEFAULT NULL COMMENT 'department (e.g reception)',
  `Role` varchar(40) DEFAULT NULL COMMENT 'job (e.g receptionist)',
  `Position` varchar(40) DEFAULT NULL COMMENT 'position in department (e.g manager)',
  `AccessRight` varchar(4) DEFAULT NULL COMMENT 'for department',
  `Privilege` varchar(4) DEFAULT NULL COMMENT 'for department',
  `Salary` varchar(20) DEFAULT NULL,
  `PersonInfo` varchar(40) DEFAULT NULL,
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_StaffPersonInfo` (`PersonInfo`),
  KEY `FK_StaffDepartmentHrSet` (`Department`),
  KEY `StaffRoleHrSet` (`Role`),
  KEY `StaffPositonHrSet` (`Position`),
  KEY `FK_StaffPrivilegeAppSet` (`Privilege`),
  KEY `FK_StaffAccessRightAppSet` (`AccessRight`),
  KEY `FK_StaffInfo` (`data_author`),
  CONSTRAINT `FK_StaffAccessRightAppSet` FOREIGN KEY (`AccessRight`) REFERENCES `app_set` (`fuid`),
  CONSTRAINT `FK_StaffDepartmentHrSet` FOREIGN KEY (`Department`) REFERENCES `hr_set` (`fuid`),
  CONSTRAINT `FK_StaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`),
  CONSTRAINT `FK_StaffPersonInfo` FOREIGN KEY (`PersonInfo`) REFERENCES `person_info` (`fuid`),
  CONSTRAINT `FK_StaffPrivilegeAppSet` FOREIGN KEY (`Privilege`) REFERENCES `app_set` (`fuid`),
  CONSTRAINT `StaffPositonHrSet` FOREIGN KEY (`Position`) REFERENCES `hr_set` (`fuid`),
  CONSTRAINT `StaffRoleHrSet` FOREIGN KEY (`Role`) REFERENCES `hr_set` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.staff_info: ~1 rows (approximately)
/*!40000 ALTER TABLE `staff_info` DISABLE KEYS */;
REPLACE INTO `staff_info` (`puid`, `suid`, `tuid`, `fuid`, `Department`, `Role`, `Position`, `AccessRight`, `Privilege`, `Salary`, `PersonInfo`, `data_author`, `data_status`) VALUES
	(1, '0808', '0808', '0808', NULL, NULL, NULL, NULL, NULL, NULL, '0763842', NULL, 'fixed');
/*!40000 ALTER TABLE `staff_info` ENABLE KEYS */;


-- Dumping structure for table shimdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `UserID` varchar(40) DEFAULT NULL,
  `UserPIN` varchar(20) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `SecurityQuestion` varchar(50) DEFAULT NULL,
  `SecurityAnswer` varchar(50) DEFAULT NULL,
  `ConfirmationMsg` varchar(50) DEFAULT NULL,
  `PersonInfo` varchar(40) DEFAULT NULL,
  `AccountType` varchar(20) DEFAULT '0',
  `AccountStatus` varchar(20) DEFAULT 'active',
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_UserPersonInfo` (`PersonInfo`),
  CONSTRAINT `FK_UserPersonInfo` FOREIGN KEY (`PersonInfo`) REFERENCES `person_info` (`fuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT;

-- Dumping data for table shimdb.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`puid`, `suid`, `tuid`, `fuid`, `UserID`, `UserPIN`, `Password`, `SecurityQuestion`, `SecurityAnswer`, `ConfirmationMsg`, `PersonInfo`, `AccountType`, `AccountStatus`, `data_status`) VALUES
	(1, '0813379', '070868', '08133798803', 'caix', NULL, '123a35ab8ceda6f4cebb83dbeafc75ee', NULL, NULL, NULL, '0763842', '7', 'active', 'fixed');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

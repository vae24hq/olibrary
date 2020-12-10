-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2013 at 04:47 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shimdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

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
  `CreditPaid` varchar(30) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=12 ;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`puid`, `suid`, `tuid`, `fuid`, `Customer`, `Room`, `Type`, `AccommodationStatus`, `CheckInDate`, `CheckOutDate`, `DateCheckedIn`, `DateCheckedOut`, `CreditPaid`, `NoOfDays`, `ReceiptNo`, `DiscountedAmount`, `DepositRequired`, `UnitCost`, `TotalCost`, `AmountDeposited`, `Balance`, `InvoiceStatus`, `data_author`, `data_status`) VALUES
(1, 'GV7881NDZ417940678', '1361958873', 'VQ2782158768385JD1361958873TZ', 'QM7221878073633DB1361957446OW', 'UR6311251775323HD1361956239TY', 'check-in', 'checked-out', '1361992380', '1362078780', '1361958895', '1361978750', NULL, '1', '678', NULL, '2000', '8000', '8000', NULL, NULL, 'paid', NULL, 'fixed'),
(2, 'IP6671MEV946161609', '1361789654', 'QN8517317513937FC1361959477PX', 'TO8838236906900ID1361957397QZ', 'NI2150695391670EC1361955607LW', 'check-in', 'checked-out', '1361992380', '1362078780', '1361959502', '1361979070', NULL, '1', '7983', NULL, '3000', '16000', '16000', '16000', '0', 'paid', NULL, 'fixed'),
(3, 'IS7944OCX756847145', '1361959777', 'SP4444800255465HE1361959777RZ', 'UM7968736808217GC1361959746RX', 'WS5228947997991HE1361956014VZ', 'check-in', 'checked-out', '1362165180', '1362337980', '1361962855', '1361978552', NULL, '2', '43535', NULL, '2000', '10000', '20000', NULL, NULL, 'credit', NULL, 'fixed'),
(6, 'GP2266MEY541899258', '1361959855', 'WT3936751861157JD1361959855VZ', 'QJ3217886597580EB1361959831NZ', 'VO1512600898158EC1361956308RZ', 'check-in', 'checked-out', '1362510780', '1362942780', '1361959875', '1361978432', NULL, '5', '67857', NULL, '2000', '8000', '40000', '40000', '0', 'paid', NULL, 'fixed'),
(7, 'LV2566QHZ582525579', '1361963766', 'SN4925862447447GE1361963766PZ', 'QK9470739016993EC1361963755PY', 'TP2597763722645FB1361955862SZ', 'check-in', 'checked-out', '1362078780', '1359832380', '1361963823', '1361978477', NULL, '2', '45355', NULL, '2000', '11500', '23000', '23000', '0', 'paid', NULL, 'fixed'),
(8, 'DQ9061LBX256646539', '1361970978', 'RN5403641051554EC1361970978QZ', 'RN5488256392112FB1361970963PW', 'RL4980222209140HD1361956202QY', 'check-in', 'checked-out', '1362165180', '1362251580', '1361970996', '1361978759', NULL, '1', '983447624', NULL, '2000', '6500', '6500', '0', '0', 'paid', NULL, 'fixed'),
(9, 'GS4127ODZ794324875', '1361971060', 'TQ4432368462323ID1361971060SZ', 'VR5601459769447HE1361971048TZ', 'QM2741803777334EB1361956227OX', 'check-in', 'checked-out', '1364843580', '1364929980', '1361971104', '1361978674', NULL, '1', '3523544', NULL, '2000', '8000', '8000', '8000', '0', 'credit', NULL, 'fixed'),
(11, 'FS7910MCZ622818271', '1361971571', 'UP9103904033646GC1361971571TZ', 'WM5124707699580EC1361971540UZ', 'SN6906765821117FC1361956222PZ', 'check-in', 'checked-out', '1362078780', '1362165180', '1361971627', '1361978764', NULL, '1', '4555', NULL, '2000', '8000', '8000', '0', '0', 'paid', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Developer`, `DevTime`, `AppStatus`, `data_status`) VALUES
(1, 'KR2863PIZ874020860', '1360552385', 'QN9962987171429HB1360552385PX', 'System for Hotel Information Management', 'SHIM', 'Dev360&#176;', '1360552236', 'avaliable', 'locked');

-- --------------------------------------------------------

--
-- Table structure for table `app_clients`
--

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
  KEY `FK_SP` (`ServiceProvider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='The application''s service providers'' clients' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `app_license`
--

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
  KEY `FK_Application` (`Application`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='The application''s service license' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `app_license`
--

INSERT INTO `app_license` (`puid`, `suid`, `tuid`, `fuid`, `Application`, `Usage`, `UserQty`, `LicensedOn`, `LicenseExpires`, `LicenseQty`, `LicenseType`, `LicenseState`, `data_status`) VALUES
(1, 'demo', 'demo', 'demo', NULL, NULL, NULL, NULL, NULL, 'mult', 'lifetime', 'new', 'locked');

-- --------------------------------------------------------

--
-- Table structure for table `app_set`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=14 ;

--
-- Dumping data for table `app_set`
--

INSERT INTO `app_set` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `SetOf`, `SetType`, `data_status`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `app_sp`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='The application''s service providers' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `app_sp`
--

INSERT INTO `app_sp` (`puid`, `suid`, `tuid`, `fuid`, `Name`, `Acronym`, `PrimaryEmail`, `PrimaryPhone`, `ContactInfo`, `WebsiteAddress`, `AccountID`, `AccountStatus`, `data_status`) VALUES
(1, 'KS1923QCX352808518', '1360556503', 'QN1952199098886IC1360556503PW', 'Dynat Future Solution', 'Dynat', 'info@dynat.com.ng', '+234 (0) 802 289 410', NULL, 'www.dynat.com.ng', 'Seamlux', 'active', 'locked');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

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
  KEY `FK_ContactPersonInfo` (`PersonInfo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `corporate_info`
--

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
  KEY `FK_StaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `corporate_info`
--

INSERT INTO `corporate_info` (`puid`, `suid`, `tuid`, `fuid`, `CustomerID`, `Corporation`, `Acronym`, `CustomerType`, `data_author`, `data_status`) VALUES
(1, '0545', '7134', '89244', '786214', 'Coca-Cola Bottling Company Plc', 'Coke', 'Regular', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`puid`, `suid`, `tuid`, `fuid`, `CustomerID`, `CorporateInfo`, `CustomerType`, `PersonInfo`, `data_author`, `data_status`) VALUES
(1, 'DR6541PBZ913606724', '1361957397', 'TO8838236906900ID1361957397QZ', 'RHR40101', 'none', 'new', 'TO8838236906900ID1361957397QZ', NULL, 'fixed'),
(2, 'KT7347REY679942286', '1361957446', 'QM7221878073633DB1361957446OW', 'RHR24785', 'none', 'new', 'QM7221878073633DB1361957446OW', NULL, 'fixed'),
(3, 'HV1266QCZ558043083', '1361959746', 'UM7968736808217GC1361959746RX', 'RHR79588', 'none', 'new', 'UM7968736808217GC1361959746RX', NULL, 'fixed'),
(4, 'HS4927OCZ112502329', '1361959831', 'QJ3217886597580EB1361959831NZ', 'RHR85169', 'none', 'new', 'QJ3217886597580EB1361959831NZ', NULL, 'fixed'),
(5, 'FR7213NDY524199870', '1361962833', 'UK6853958311785DB1361962833PZ', 'RHR59499', 'none', 'new', 'UK6853958311785DB1361962833PZ', NULL, 'fixed'),
(6, 'FO7209MDY173388127', '1361963755', 'QK9470739016993EC1361963755PY', 'RHR57450', 'none', 'new', 'QK9470739016993EC1361963755PY', NULL, 'fixed'),
(7, 'DR1073HBZ936883940', '1361970963', 'RN5488256392112FB1361970963PW', 'RHR94917', 'none', 'new', 'RN5488256392112FB1361970963PW', NULL, 'fixed'),
(8, 'IQ4819NCZ824231117', '1361971048', 'VR5601459769447HE1361971048TZ', 'RHR53519', 'none', 'new', 'VR5601459769447HE1361971048TZ', NULL, 'fixed'),
(9, 'HT7413RFZ220179852', '1361971141', 'RK1702646047301FB1361971141QZ', 'RHR67801', 'none', 'new', 'RK1702646047301FB1361971141QZ', NULL, 'fixed'),
(10, 'GP8430MCY531138192', '1361971226', 'UN5917720144807IE1361971226SZ', 'RHR53408', 'none', 'new', 'UN5917720144807IE1361971226SZ', NULL, 'fixed'),
(11, 'HT3840REZ287923175', '1361971540', 'WM5124707699580EC1361971540UZ', 'RHR62139', 'none', 'new', 'WM5124707699580EC1361971540UZ', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

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
  KEY `FK_ExpenditureStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=9 ;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Description`, `Category`, `Period`, `Amount`, `data_author`, `data_status`) VALUES
(1, 'FR9510PDZ124432325', '1361744104', 'SJ1492793053288DB1361744104NY', 'Payment for Diesel', 'I bought diesel ', 'disel', '1361744104', '45000', NULL, 'fixed'),
(2, 'FQ3371NCZ260235402', '1361745027', 'SN5075573904305GD1361745027RY', 'Bags of Rice', NULL, 'kitchen', '1361745027', '7000', NULL, 'fixed'),
(3, 'IT5678OGZ917629956', '1361750494', 'TQ4873763181886JE1361750494SX', 'Drinks', NULL, 'drinks', '1361750494', '5000', NULL, 'fixed'),
(5, 'IS9220QFZ819928971', '1361750521', 'SN7377463839996ID1361750521QX', 'Drinks', NULL, 'drinks', '1361750521', '4000', NULL, 'fixed'),
(6, 'IS2746QCY352107032', '1361774384', 'VM5970846029841DB1361774384UZ', 'Balis', NULL, 'wine', '1361774384', '5000', NULL, 'fixed'),
(7, 'FP7383NBX191948101', '1361774411', 'VO2373651702810FC1361774411UY', 'Beans', NULL, 'kitchen', '1361774411', '7000', NULL, 'fixed'),
(8, 'DQ7807OBW667057114', '1361774428', 'SK3229201001634DB1361774428QZ', 'Bread', NULL, 'kitchen', '1361774428', '1000', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `hr_set`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='HR entries for department, role, position' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hr_set`
--

INSERT INTO `hr_set` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `IsStore`, `SetOf`, `SetType`, `data_status`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `income_carhire`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=5 ;

--
-- Dumping data for table `income_carhire`
--

INSERT INTO `income_carhire` (`puid`, `suid`, `tuid`, `fuid`, `Driver`, `Destination`, `SignOut`, `SignIn`, `TimeOut`, `TimeIn`, `StaffOnDuty`, `Amount`, `InvoiceStatus`, `StatusUpdated`, `data_status`) VALUES
(1, 'GR3523PEZ542266609', '1361736246', 'UQ5193803804330IC1361736246SY', 'Osarumen Cason', 'He has paid', NULL, NULL, '12:22pm', '3:00pm', NULL, '5000', 'paid', '1361787083', 'fixed'),
(2, 'FR5508NCZ754314465', '1361736910', 'SN1348146351371EC1361736910QZ', 'Benford Urhioha', NULL, NULL, NULL, '2:00pm', '3:00pm', NULL, '2000', 'paid', '1361787068', 'fixed'),
(3, 'DN8193KBV346442598', '1361781935', 'VS1296297327424KB1361781935UZ', 'Johnson Klu', NULL, NULL, NULL, '3:00pm', NULL, NULL, NULL, 'paid', NULL, 'fixed'),
(4, 'GT6678QEZ597965784', '1361930365', 'VO7827614062341IC1361930365SY', 'Osas', 'Eyean', NULL, NULL, '12:00pm', NULL, NULL, NULL, 'unpaid', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `income_gymn`
--

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
  KEY `FK_GymnStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `income_gymn`
--

INSERT INTO `income_gymn` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `IDCard`, `Description`, `Period`, `Duration`, `Amount`, `data_author`, `data_status`) VALUES
(1, 'HU6472SCZ886705519', '1361730776', 'VR4262280373607LI1361730776UZ', 'Anthony O. Isaac', '0803', NULL, '1361730776', '2 weeks', '3000', NULL, 'fixed'),
(2, 'FV8842OCZ575289594', '1361730994', 'VQ5427201557867IC1361730994UZ', 'Raymond Chang', '79982B', 'For next month', '1361730994', '1 month', '5000', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `income_hall`
--

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
  KEY `FK_GymnStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `income_hall`
--

INSERT INTO `income_hall` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `Description`, `Period`, `Deposit`, `Amount`, `data_author`, `data_status`) VALUES
(1, 'EP6369LBY599623201', '1361728918', 'SO2266824701505EB1361728918RX', 'Anthony O. Isaac', 'The customer paid for the Hall', '1361728918', '5000', '15000', NULL, 'fixed'),
(2, 'IS4943OCX683359011', '1361930410', 'WT7089785281202IE1361930410VZ', 'dd', 'q', '1361930410', '2000', '2000', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `income_pool`
--

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
  KEY `FK_GymnStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `income_pool`
--

INSERT INTO `income_pool` (`puid`, `suid`, `tuid`, `fuid`, `Description`, `Period`, `Amount`, `data_author`, `data_status`) VALUES
(1, 'IR5000PFX468629074', '1361727709', 'TN5093910757707HD1361727709QZ', 'Swimming Pool and Truck', '1361727709', '2000', NULL, 'fixed'),
(2, 'HQ1057OEZ553463587', '1361727755', 'TP9604931367169GD1361727755SZ', 'Swimming', '1361727755', '400', NULL, 'fixed'),
(3, 'GO8924MEY728389467', '1361781849', 'UM7835208193683HE1361781849SZ', 'Swimming', '1361781849', '500', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `income_pos`
--

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
  KEY `FK_POSBuyer` (`PosBuyer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_category`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=5 ;

--
-- Dumping data for table `inventory_category`
--

INSERT INTO `inventory_category` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `SubSetOf`, `data_status`) VALUES
(1, 'KV2976QGZ917955988', '1361741799', 'WQ6510858139375GC1361741799TZ', 'Drinks', NULL, NULL, NULL, 'fixed'),
(2, 'DP1785KBZ311964473', '1361741828', 'UN6116447664223HB1361741828TZ', 'Bear', NULL, NULL, 'WQ6510858139375GC1361741799TZ', 'fixed'),
(3, 'GQ6458NDZ345662854', '1361780285', 'TL6369958881168GE1361780285RY', 'Gulder', NULL, NULL, 'UN6116447664223HB1361741828TZ', 'fixed'),
(4, 'EO4158LCZ996300876', '1361780771', 'TM9092445049307HC1361780771SZ', 'Cigar', NULL, NULL, NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--

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
  KEY `FK_InventoryStore` (`InvStore`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inventory_item`
--

INSERT INTO `inventory_item` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `ItemType`, `InvCat`, `InvStore`, `QtyInStore`, `UnitPrice`, `data_status`) VALUES
(1, 'FP3566MBZ905698032', '1361794709', 'TO9853914782211GD1361794709SZ', 'Stout', NULL, NULL, 'comodity', 'UN6116447664223HB1361741828TZ', '651331', '10', '100', 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_log`
--

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
  KEY `FK_LogInventoryItem` (`InvItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `person_info`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=26 ;

--
-- Dumping data for table `person_info`
--

INSERT INTO `person_info` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `PrimaryPhone`, `PrimaryEmail`, `PrimaryAddress`, `BirthDate`, `Sex`, `data_status`) VALUES
(1, '07085', '09083', '0763842', 'Anthony Staff', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(2, 'GR7837PBZ377565377', '1361876631', 'TP5174382143016GB1361876631RZ', 'Anthony Coke Cleint', '08133798803', 'info@t-isaac.com', 'Dynat Future Solution\r\nUgbowo', '12/10/2012', 'male', 'fixed'),
(3, 'ET4084KCY760274391', '1361882928', 'RN2394116609339EB1361882928QZ', 'Peter Edike', '0808', NULL, '\r\n', NULL, 'male', 'fixed'),
(4, 'GS4938PCY103298930', '1361882998', 'UP1231275015236EB1361882998TZ', 'John Ikeba', '08054564', NULL, NULL, NULL, 'male', 'fixed'),
(5, 'GT1223QDZ300402156', '1361887290', 'RN2459522353469GB1361887290PZ', 'Anthony O. Isaac', '08133798803', 'info@t-isaac.com', 'Ugbowo', '12/12/1203', 'male', 'fixed'),
(6, 'HV2930OCZ975639259', '1361904378', 'RM5557158275338EC1361904378QZ', 'Tony Isaac', '08037091639', 'caix@gmail.com', 'Ugbowo', '12/10/2091', 'male', 'fixed'),
(7, 'ES7567NBZ913217850', '1361913913', 'UP6303094408756HD1361913913SZ', 'Imah David Samsom', '080808', NULL, NULL, NULL, 'male', 'fixed'),
(8, 'HR5804NEW262251359', '1361913991', 'SM6084815017749HB1361913991QW', 'Craig Ian Romeo', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(9, 'HU4866RDZ129530385', '1361930793', 'SK9816103822919DB1361930793OX', 'Sia-sia Samson', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(10, 'IS9460PDZ173924433', '1361952626', 'VP9316962994677JD1361952626TZ', 'Kanu Jay Fredson', '07091254878', 'fredi@yahoo.com', NULL, NULL, 'male', 'fixed'),
(11, 'GO1945MBX844989394', '1361957304', 'VP8737395378931KC1361957304SZ', 'Osawere Anthony', '08133798803', 'caix360@gmail.com', 'Dynat,\r\nUgbowo', '10/10/2004', 'male', 'fixed'),
(14, 'DR6541PBZ913606724', '1361957397', 'TO8838236906900ID1361957397QZ', 'Isaac Tony Caix', '08133798803', 'caix360@gmail.com', 'Dynat\r\nUgbowo', '31/10/2013', 'male', 'fixed'),
(15, 'KT7347REY679942286', '1361957446', 'QM7221878073633DB1361957446OW', 'Ikedia Peter', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(16, 'HV1266QCZ558043083', '1361959746', 'UM7968736808217GC1361959746RX', 'Jin Yui Wang', NULL, NULL, NULL, NULL, 'female', 'fixed'),
(17, 'HS4927OCZ112502329', '1361959831', 'QJ3217886597580EB1361959831NZ', 'Irean Yan', NULL, NULL, NULL, NULL, 'female', 'fixed'),
(18, 'FR7213NDY524199870', '1361962833', 'UK6853958311785DB1361962833PZ', 'Samson Irema', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(19, 'FO7209MDY173388127', '1361963755', 'QK9470739016993EC1361963755PY', 'Caix Mate', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(20, 'DR1073HBZ936883940', '1361970963', 'RN5488256392112FB1361970963PW', 'Mike Oje', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(21, 'IQ4819NCZ824231117', '1361971048', 'VR5601459769447HE1361971048TZ', 'Kesta', NULL, NULL, NULL, NULL, 'female', 'fixed'),
(22, 'HT7413RFZ220179852', '1361971141', 'RK1702646047301FB1361971141QZ', 'Samson James', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(23, 'GP8430MCY531138192', '1361971226', 'UN5917720144807IE1361971226SZ', 'Junior  Moore', NULL, NULL, NULL, NULL, 'male', 'fixed'),
(25, 'HT3840REZ287923175', '1361971540', 'WM5124707699580EC1361971540UZ', 'Klevin Kamwe', NULL, NULL, NULL, NULL, 'male', 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `pos_buyer`
--

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
  KEY `FK_PosBuyerStaffInfo` (`data_author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

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
  KEY `FK_RoomsStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=70 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `RoomType`, `Status`, `data_author`, `data_status`) VALUES
(1, 'EO9161LCW956844928', '1361955555', 'VS2441297647424KB1361955555UZ', '503', NULL, NULL, 'SN3086369879767FD1361953755RZ', 'available', NULL, 'fixed'),
(2, 'HT9110QEZ902493589', '1361955568', 'QL8777502346830GD1361955568OZ', '504', NULL, NULL, 'SN3086369879767FD1361953755RZ', 'available', NULL, 'fixed'),
(3, 'GO9742LDW659766433', '1361955578', 'QM1203477263278IB1361955578OY', '505', NULL, NULL, 'SN3086369879767FD1361953755RZ', 'available', NULL, 'fixed'),
(4, 'FP5921JCY757938264', '1361955584', 'UO3528056384528GD1361955584SZ', '506', NULL, NULL, 'SN3086369879767FD1361953755RZ', 'available', NULL, 'fixed'),
(5, 'IR5947PGZ845635480', '1361955607', 'NI2150695391670EC1361955607LW', '116', NULL, NULL, 'UM7243048228079GD1361953732RZ', 'instay', NULL, 'fixed'),
(6, 'HP3127LEW284950267', '1361955616', 'SO8819751941232HD1361955616RZ', '217', NULL, NULL, 'UM7243048228079GD1361953732RZ', 'available', NULL, 'fixed'),
(7, 'IU8704RFZ622385192', '1361955629', 'TN2207809935367FC1361955629SZ', '509', NULL, NULL, 'UM7243048228079GD1361953732RZ', 'available', NULL, 'fixed'),
(8, 'KT7347REY374711199', '1361955643', 'QM9851631913633DB1361955643OW', '112', NULL, NULL, 'UQ3779832505729HE1361953601SY', 'available', NULL, 'fixed'),
(9, 'HP2628LBY980393451', '1361955651', 'TO9013626482603KE1361955651SY', '213', NULL, NULL, 'UQ3779832505729HE1361953601SY', 'available', NULL, 'fixed'),
(10, 'EU4165OCZ427059536', '1361955661', 'TP2060823808510GC1361955661SZ', '227', NULL, NULL, 'TP4851574001754IF1361953576RX', 'available', NULL, 'fixed'),
(11, 'FS7796NCZ441084949', '1361955669', 'VQ2201331361223GD1361955669TZ', '201', NULL, NULL, 'TP4851574001754IF1361953576RX', 'available', NULL, 'fixed'),
(12, 'DP9884MBY220578123', '1361955688', 'WP1130812208958JH1361955688VZ', '218', NULL, NULL, 'VN3949344311683EC1361953554UZ', 'available', NULL, 'fixed'),
(13, 'HP6698NEZ715557618', '1361955703', 'UQ9973361122214IF1361955703SZ', '226', NULL, NULL, 'VN3949344311683EC1361953554UZ', 'available', NULL, 'fixed'),
(14, 'HQ9755OBZ465248530', '1361955715', 'VQ3453430652386GD1361955715UZ', '214', NULL, NULL, 'VN3949344311683EC1361953554UZ', 'available', NULL, 'fixed'),
(15, 'HQ4247OFY125492729', '1361955729', 'VR8418855073089MG1361955729UZ', '113', NULL, NULL, 'VN3949344311683EC1361953554UZ', 'available', NULL, 'fixed'),
(16, 'FR2841ODZ176057839', '1361955742', 'TO8413598181119EC1361955742SZ', '219', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(17, 'GO1503MCY384820821', '1361955754', 'VQ1396690578789GC1361955754UY', '220', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(18, 'FT8800NDZ755702643', '1361955793', 'SN2881853131776JE1361955793RZ', '222', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(19, 'HQ2096OCY226867708', '1361955803', 'PM4972489199553FB1361955803OY', '223', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(20, 'JV1159TEZ595597658', '1361955838', 'TM2135209717942FC1361955838QY', '224', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(21, 'FO5865MDY279133886', '1361955848', 'VQ4169718939765HD1361955848TZ', '225', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(22, 'EP3001NBY499230338', '1361955854', 'TN8203325033171HC1361955854PZ', '507', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(23, 'FQ4303NCW333684547', '1361955862', 'TP2597763722645FB1361955862SZ', '508', NULL, NULL, 'TN3271432316178FB1361953524SY', 'instay', NULL, 'fixed'),
(24, 'IU8111RDZ860327508', '1361955868', 'TK5877363481339EC1361955868RX', '511', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(25, 'EP6993KCY588972522', '1361955880', 'UP3662666348349FD1361955880TX', '202', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(26, 'GS8428QEY407818009', '1361955889', 'QK5245154006419FC1361955889PY', '221', NULL, NULL, 'TN3271432316178FB1361953524SY', 'available', NULL, 'fixed'),
(27, 'GQ4900NEZ108008360', '1361955906', 'RN1525071558225EB1361955906PX', '203', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(28, 'IT8894OEZ146464106', '1361955912', 'RN1582451895755IG1361955912QY', '204', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(29, 'IQ7556NDZ738669939', '1361955918', 'QL6650521899473FB1361955918PX', '205', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(30, 'GQ2375NBY813613497', '1361955926', 'WT8792036298705LC1361955926VZ', '206', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(31, 'HP5872LFY234992182', '1361955934', 'TL5448856841306EC1361955934RY', '207', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(32, 'HR3122MCY506035396', '1361955944', 'VR4047747492822FB1361955944TY', '208', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(34, 'EO2458KBY428125509', '1361955964', 'UQ1257455949860LJ1361955964TZ', '210', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(35, 'ER1766LBW398931605', '1361955971', 'TO1152097592163EB1361955971QZ', '128', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(36, 'HS4151OCZ293309583', '1361955979', 'UQ1048806469111LF1361955979TZ', '215', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(37, 'IQ6746OCZ979148302', '1361955985', 'TO9903662357680IG1361955985SY', '512', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(38, 'FN5528LCW870452473', '1361955990', 'TL6821743422702DB1361955990SZ', '510', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(39, 'GU7437PCZ589398223', '1361955996', 'VP6781949747273HE1361955996TZ', '212', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(40, 'EQ2844MBZ947077175', '1361956004', 'SN8115850355747FB1361956004RZ', '211', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(41, 'EP7261LBZ347982791', '1361956014', 'WS5228947997991HE1361956014VZ', '513', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'instay', NULL, 'fixed'),
(42, 'KQ1725OEY605246822', '1361956152', 'TN1522413331003HD1361956152SZ', '209', NULL, NULL, 'TL8543587518372FB1361953474QZ', 'available', NULL, 'fixed'),
(43, 'ES8113MCZ197954613', '1361956164', 'TM8578493018520EB1361956164SZ', '104', NULL, NULL, 'QN6101682082380HC1361953400PX', 'available', NULL, 'fixed'),
(44, 'IS4830PDY854876605', '1361956173', 'UR5484374364885GD1361956173TZ', '106', NULL, NULL, 'QN6101682082380HC1361953400PX', 'available', NULL, 'fixed'),
(45, 'HV2930OCZ994517662', '1361956184', 'RM8625630625338EC1361956184QZ', '108', NULL, NULL, 'QN6101682082380HC1361953400PX', 'available', NULL, 'fixed'),
(46, 'FU1530ODZ730247043', '1361956202', 'RL4980222209140HD1361956202QY', '110', NULL, NULL, 'QN6101682082380HC1361953400PX', 'instay', NULL, 'fixed'),
(47, 'ER9582MCZ573283683', '1361956210', 'TP1700861372488JH1361956210SZ', '117', NULL, NULL, 'QN6101682082380HC1361953400PX', 'available', NULL, 'fixed'),
(48, 'HR9677NCX795670481', '1361956222', 'SN6906765821117FC1361956222PZ', '101', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'instay', NULL, 'fixed'),
(49, 'HS2516PEX777611639', '1361956227', 'QM2741803777334EB1361956227OX', '102', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'instay', NULL, 'fixed'),
(50, 'HO4319MEZ965033431', '1361956232', 'TL4437415094719DB1361956232SZ', '103', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(51, 'HQ3635NDZ288668727', '1361956239', 'UR6311251775323HD1361956239TY', '105', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'instay', NULL, 'fixed'),
(52, 'EQ5470KCZ327385963', '1361956249', 'QK6633639847857DB1361956249MX', '107', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(53, 'DO3513KBW671554881', '1361956255', 'UQ5120850375287MG1361956255SY', '109', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(54, 'GR8373MCZ208885480', '1361956260', 'UQ6724221716678GE1361956260TZ', '111', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(55, 'GR4335LBZ611272784', '1361956265', 'TN5359567542542FD1361956265SZ', '114', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(56, 'DM1720KBT213605032', '1361956270', 'UP5361617677780EC1361956270SZ', '115', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(57, 'FR6627KBZ443646351', '1361956275', 'TO9678686829742FD1361956275RZ', '118', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(59, 'GT9952REZ959239971', '1361956294', 'UM6528622345732EB1361956294PZ', '119', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(60, 'IU7823QDZ117856604', '1361956302', 'QK5653385816101FB1361956302MW', '120', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(61, 'EN2463LCY474302990', '1361956308', 'VO1512600898158EC1361956308RZ', '121', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'instay', NULL, 'fixed'),
(62, 'GM3933KBZ514076467', '1361956315', 'PK9786890399368FC1361956315OW', '122', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(63, 'ES1119OCZ206929843', '1361956323', 'TL3261431926149FB1361956323OY', '123', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(64, 'JQ9055NDX476680393', '1361956328', 'TM6248823717489FB1361956328SY', '124', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(65, 'GU8789QCY390388010', '1361956333', 'UM4269139642982IC1361956333QZ', '125', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(66, 'GT2135RDY758724831', '1361956358', 'PJ3634194847589DB1361956358OX', '126', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(67, 'JT6212RCZ622293745', '1361956363', 'PL9942852641412DB1361956363OY', '127', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(68, 'HQ9662NCZ980752704', '1361956370', 'VN4124713151469IE1361956370RZ', '501', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed'),
(69, 'EO1102JBX938164217', '1361956375', 'RL4167242924098GE1361956375QY', '502', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'available', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

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
  KEY `FK_RoomTypeStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=10 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`Puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `Price`, `Deposit`, `Qty`, `QtyAvaliable`, `QtyReserved`, `QtyInStay`, `Status`, `data_author`, `data_status`) VALUES
(1, 'FQ2958OCV815043928', '1361953400', 'QN6101682082380HC1361953400PX', 'Junior Double', 'JD', NULL, '6500', '2000', '5', '5', '0', '0', 'available ', NULL, 'fixed'),
(2, 'IQ4819NCZ887128294', '1361953454', 'VR2841354329447HE1361953454TZ', 'Double', 'D', NULL, '8000', '2000', '21', '21', '0', '0', 'available ', NULL, 'fixed'),
(3, 'GS4603LBZ807086667', '1361953474', 'TL8543587518372FB1361953474QZ', 'Executive Double Junior', 'ExDJnr', NULL, '10000', '2000', '15', '15', '0', '0', 'available ', NULL, 'fixed'),
(4, 'EQ9767JBX803628646', '1361953524', 'TN3271432316178FB1361953524SY', 'Executive Double Senior', 'ExDSnr', NULL, '11500', '2000', '11', '11', '0', '0', 'available ', NULL, 'fixed'),
(5, 'GP6403MBZ439411434', '1361953554', 'VN3949344311683EC1361953554UZ', 'Executive Special', 'ExSp', NULL, '13000', '3000', '4', '4', '0', '0', 'available ', NULL, 'fixed'),
(6, 'GQ4910MCX173561843', '1361953576', 'TP4851574001754IF1361953576RX', 'King View', 'KV', NULL, '13500', '3000', '2', '2', '0', '0', 'available ', NULL, 'fixed'),
(7, 'GS6835OBZ721259524', '1361953601', 'UQ3779832505729HE1361953601SY', 'King and Queen Royal Suite', 'KQRS', NULL, '14000', '3000', '2', '2', '0', '0', 'available ', NULL, 'fixed'),
(8, 'FO7468MDY108294635', '1361953732', 'UM7243048228079GD1361953732RZ', 'Presidential Suite', 'PS', NULL, '16000', '3000', '3', '3', '0', '0', 'available ', NULL, 'fixed'),
(9, 'GV2302TEZ976963956', '1361953755', 'SN3086369879767FD1361953755RZ', 'Family Apartment', 'FM', NULL, '20000', '3000', '4', '4', '0', '0', 'available ', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

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
  KEY `FK_salary_staff_info` (`data_author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

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
  KEY `FK_StaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`puid`, `suid`, `tuid`, `fuid`, `Department`, `Role`, `Position`, `AccessRight`, `Privilege`, `Salary`, `PersonInfo`, `data_author`, `data_status`) VALUES
(1, '0808', '0808', '0808', NULL, NULL, NULL, NULL, NULL, NULL, '0763842', NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
  KEY `FK_UserPersonInfo` (`PersonInfo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`puid`, `suid`, `tuid`, `fuid`, `UserID`, `UserPIN`, `Password`, `SecurityQuestion`, `SecurityAnswer`, `ConfirmationMsg`, `PersonInfo`, `AccountType`, `AccountStatus`, `data_status`) VALUES
(1, '0813379', '070868', '08133798803', 'caix', NULL, '123a35ab8ceda6f4cebb83dbeafc75ee', NULL, NULL, NULL, '0763842', '7', 'active', 'fixed');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_clients`
--
ALTER TABLE `app_clients`
  ADD CONSTRAINT `FK_License` FOREIGN KEY (`UserLicense`) REFERENCES `app_license` (`fuid`),
  ADD CONSTRAINT `FK_SP` FOREIGN KEY (`ServiceProvider`) REFERENCES `app_sp` (`fuid`);

--
-- Constraints for table `app_license`
--
ALTER TABLE `app_license`
  ADD CONSTRAINT `FK_Application` FOREIGN KEY (`Application`) REFERENCES `app` (`fuid`);

--
-- Constraints for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD CONSTRAINT `FK_ContactPersonInfo` FOREIGN KEY (`PersonInfo`) REFERENCES `person_info` (`fuid`);

--
-- Constraints for table `corporate_info`
--
ALTER TABLE `corporate_info`
  ADD CONSTRAINT `FK_CorporateInfoAuthor` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD CONSTRAINT `FK_ExpenditureStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `income_gymn`
--
ALTER TABLE `income_gymn`
  ADD CONSTRAINT `FK_GymnStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `income_hall`
--
ALTER TABLE `income_hall`
  ADD CONSTRAINT `FK_HallStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `income_pool`
--
ALTER TABLE `income_pool`
  ADD CONSTRAINT `FK_PoolStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `income_pos`
--
ALTER TABLE `income_pos`
  ADD CONSTRAINT `FK_POSBuyer` FOREIGN KEY (`PosBuyer`) REFERENCES `pos_buyer` (`fuid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_POSInventoryItem` FOREIGN KEY (`InvItem`) REFERENCES `inventory_item` (`fuid`),
  ADD CONSTRAINT `FK_POSStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD CONSTRAINT `FK_InventoryCategory` FOREIGN KEY (`InvCat`) REFERENCES `inventory_category` (`fuid`),
  ADD CONSTRAINT `FK_InventoryStore` FOREIGN KEY (`InvStore`) REFERENCES `hr_set` (`fuid`);

--
-- Constraints for table `inventory_log`
--
ALTER TABLE `inventory_log`
  ADD CONSTRAINT `FK_LogInventoryItem` FOREIGN KEY (`InvItem`) REFERENCES `inventory_item` (`fuid`);

--
-- Constraints for table `pos_buyer`
--
ALTER TABLE `pos_buyer`
  ADD CONSTRAINT `FK_PosBuyerStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `FK_RoomsStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`),
  ADD CONSTRAINT `FK_RoomsType` FOREIGN KEY (`RoomType`) REFERENCES `room_type` (`fuid`);

--
-- Constraints for table `room_type`
--
ALTER TABLE `room_type`
  ADD CONSTRAINT `FK_RoomTypeStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `FK_SalaryStaffInfo` FOREIGN KEY (`StaffInfo`) REFERENCES `staff_info` (`fuid`),
  ADD CONSTRAINT `FK_salary_staff_info` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD CONSTRAINT `FK_StaffAccessRightAppSet` FOREIGN KEY (`AccessRight`) REFERENCES `app_set` (`fuid`),
  ADD CONSTRAINT `FK_StaffDepartmentHrSet` FOREIGN KEY (`Department`) REFERENCES `hr_set` (`fuid`),
  ADD CONSTRAINT `FK_StaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`),
  ADD CONSTRAINT `FK_StaffPersonInfo` FOREIGN KEY (`PersonInfo`) REFERENCES `person_info` (`fuid`),
  ADD CONSTRAINT `FK_StaffPrivilegeAppSet` FOREIGN KEY (`Privilege`) REFERENCES `app_set` (`fuid`),
  ADD CONSTRAINT `StaffPositonHrSet` FOREIGN KEY (`Position`) REFERENCES `hr_set` (`fuid`),
  ADD CONSTRAINT `StaffRoleHrSet` FOREIGN KEY (`Role`) REFERENCES `hr_set` (`fuid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_UserPersonInfo` FOREIGN KEY (`PersonInfo`) REFERENCES `person_info` (`fuid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

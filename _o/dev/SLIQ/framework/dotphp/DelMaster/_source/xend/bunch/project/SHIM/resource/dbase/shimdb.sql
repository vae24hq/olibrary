-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2013 at 04:19 PM
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
  `AccommodationStatus` varchar(30) DEFAULT NULL,
  `CheckInDate` varchar(30) DEFAULT NULL,
  `CheckOutDate` varchar(30) DEFAULT NULL,
  `DateCheckedIn` varchar(30) DEFAULT NULL,
  `DateCheckedOut` varchar(30) DEFAULT NULL,
  `ReceiptNo` varchar(10) DEFAULT NULL,
  `DiscountedAmount` varchar(10) DEFAULT NULL,
  `DepositRequired` varchar(10) DEFAULT NULL,
  `UnitCost` varchar(10) DEFAULT NULL,
  `PayableCost` varchar(10) DEFAULT NULL,
  `AmountDeposited` varchar(10) DEFAULT NULL,
  `Balance` varchar(10) DEFAULT NULL,
  `InvoiceStatus` varchar(20) DEFAULT NULL COMMENT '(tabbed, credit, paid)',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_CustomerInfo` (`Customer`),
  KEY `FK_Room` (`Room`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`puid`, `suid`, `tuid`, `fuid`, `Customer`, `Room`, `Type`, `AccommodationStatus`, `CheckInDate`, `CheckOutDate`, `DateCheckedIn`, `DateCheckedOut`, `ReceiptNo`, `DiscountedAmount`, `DepositRequired`, `UnitCost`, `PayableCost`, `AmountDeposited`, `Balance`, `InvoiceStatus`, `data_author`, `data_status`) VALUES
(1, 'HS3441PDY728488607', '1361889714', 'TM6579391034380FD1361889714SY', 'RN2459522353469GB1361887290PZ', 'TO2099707604951ID1361723635QY', 'checkin', NULL, '26/02/2013', '28/02/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`puid`, `suid`, `tuid`, `fuid`, `CustomerID`, `CorporateInfo`, `CustomerType`, `PersonInfo`, `data_author`, `data_status`) VALUES
(1, 'GR7837PBZ377565377', '1361876631', 'TP5174382143016GB1361876631RZ', 'RHR76757', '89244', 'new', 'TP5174382143016GB1361876631RZ', NULL, 'fixed'),
(2, 'ET4084KCY760274391', '1361882928', 'RN2394116609339EB1361882928QZ', 'RHR46793', 'none', 'new', 'RN2394116609339EB1361882928QZ', NULL, 'fixed'),
(3, 'GS4938PCY103298930', '1361882998', 'UP1231275015236EB1361882998TZ', 'RHR54360', '89244', 'new', 'UP1231275015236EB1361882998TZ', NULL, 'fixed'),
(4, 'GT1223QDZ300402156', '1361887290', 'RN2459522353469GB1361887290PZ', 'RHR51627', 'none', 'new', 'RN2459522353469GB1361887290PZ', NULL, 'fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `income_carhire`
--

INSERT INTO `income_carhire` (`puid`, `suid`, `tuid`, `fuid`, `Driver`, `Destination`, `SignOut`, `SignIn`, `TimeOut`, `TimeIn`, `StaffOnDuty`, `Amount`, `InvoiceStatus`, `StatusUpdated`, `data_status`) VALUES
(1, 'GR3523PEZ542266609', '1361736246', 'UQ5193803804330IC1361736246SY', 'Osarumen Cason', 'He has paid', NULL, NULL, '12:22pm', '3:00pm', NULL, '5000', 'paid', '1361787083', 'fixed'),
(2, 'FR5508NCZ754314465', '1361736910', 'SN1348146351371EC1361736910QZ', 'Benford Urhioha', NULL, NULL, NULL, '2:00pm', '3:00pm', NULL, '2000', 'paid', '1361787068', 'fixed'),
(3, 'DN8193KBV346442598', '1361781935', 'VS1296297327424KB1361781935UZ', 'Johnson Klu', NULL, NULL, NULL, '3:00pm', NULL, NULL, NULL, 'paid', NULL, 'fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `income_hall`
--

INSERT INTO `income_hall` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `Description`, `Period`, `Deposit`, `Amount`, `data_author`, `data_status`) VALUES
(1, 'EP6369LBY599623201', '1361728918', 'SO2266824701505EB1361728918RX', 'Anthony O. Isaac', 'The customer paid for the Hall', '1361728918', '5000', '15000', NULL, 'fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Dumping data for table `person_info`
--

INSERT INTO `person_info` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `PrimaryPhone`, `PrimaryEmail`, `PrimaryAddress`, `BirthDate`, `Sex`, `data_status`) VALUES
(1, '07085', '09083', '0763842', 'Anthony Staff', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(2, 'GR7837PBZ377565377', '1361876631', 'TP5174382143016GB1361876631RZ', 'Anthony Coke Cleint', '08133798803', 'info@t-isaac.com', 'Dynat Future Solution\r\nUgbowo', '12/10/2012', 'male', 'fixed'),
(3, 'ET4084KCY760274391', '1361882928', 'RN2394116609339EB1361882928QZ', 'Peter Edike', '0808', NULL, '\r\n', NULL, 'male', 'fixed'),
(4, 'GS4938PCY103298930', '1361882998', 'UP1231275015236EB1361882998TZ', 'John Ikeba', '08054564', NULL, NULL, NULL, 'male', 'fixed'),
(5, 'GT1223QDZ300402156', '1361887290', 'RN2459522353469GB1361887290PZ', 'Anthony O. Isaac', '08133798803', 'info@t-isaac.com', 'Ugbowo', '12/12/1203', 'male', 'fixed');

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
  `Status` varchar(20) DEFAULT NULL COMMENT '(avaliable, instay, reserved, unavaliable)',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `Fuid` (`fuid`),
  KEY `FK_RoomsType` (`RoomType`),
  KEY `FK_RoomsStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `RoomType`, `Status`, `data_author`, `data_status`) VALUES
(1, 'HS9747OFZ438635178', '1361723635', 'TO2099707604951ID1361723635QY', '105', NULL, NULL, 'TQ9695593944390KD1361722603SZ', 'available', NULL, 'fixed'),
(2, 'HS5946OCZ974662123', '1361723792', 'RM3766751165865FD1361723792OY', '104', NULL, 'Room 104', 'TQ9695593944390KD1361722603SZ', 'available', NULL, 'fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=7 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`Puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `Price`, `Deposit`, `Qty`, `QtyAvaliable`, `QtyReserved`, `QtyInStay`, `Status`, `data_author`, `data_status`) VALUES
(1, 'IU9000SEZ909726463', '1361696356', 'PM1913406214297GE1361696356OZ', 'King View', 'KVG', 'This is king''s view', '8500', NULL, '0', '0', '0', '0', 'available ', NULL, 'fixed'),
(2, 'ER1306LCY356350297', '1361696465', 'UM4060870951787HD1361696465RY', 'Junior Double', 'JD', NULL, '4500', NULL, '0', '0', '0', '0', 'available ', NULL, 'fixed'),
(3, 'IQ5876NCV563680179', '1361696772', 'PK6923289305262FD1361696772NZ', 'Single', 'SR', 'Single room', '3000', NULL, '0', '0', '0', '0', 'available ', NULL, 'fixed'),
(4, 'ER5940OCX161243236', '1361722603', 'TQ9695593944390KD1361722603SZ', 'Double', 'DR', NULL, '4000', '1000', '2', '2', '0', '0', 'available ', NULL, 'fixed'),
(5, 'IS5134NBZ391880246', '1361795691', 'TO7776432199092GE1361795691SZ', 'Queen', 'QR', 'Queen', '12000', NULL, '0', '0', '0', '0', 'available ', NULL, 'fixed'),
(6, 'DP4609KBX925857585', '1361805321', 'RM7733892501021FC1361805321PX', 'Presidential', 'PD', NULL, '19000', '5000', '0', '0', '0', '0', 'available ', NULL, 'fixed');

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
-- Constraints for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `FK_CustomerInfo` FOREIGN KEY (`Customer`) REFERENCES `customer_info` (`fuid`),
  ADD CONSTRAINT `FK_Room` FOREIGN KEY (`Room`) REFERENCES `rooms` (`fuid`);

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

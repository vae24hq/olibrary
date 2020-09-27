-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2013 at 08:04 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
  `SetType` varchar(30) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT COMMENT='HR entries for department, role, position' AUTO_INCREMENT=35 ;

--
-- Dumping data for table `hr_set`
--

INSERT INTO `hr_set` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `IsStore`, `SetOf`, `SetType`, `data_status`) VALUES
(2, '0721', '5623', '84224', 'Laundry', 'LD', NULL, 'no', 'none', NULL, 'fixed'),
(3, '077078', '0770782', '0770783', 'Reception', 'RC', NULL, 'no', 'none', NULL, 'fixed'),
(4, '055078', '0550782', '0550783', 'VIP Bar', 'VB', NULL, 'yes', 'none', NULL, 'fixed'),
(5, '0266131', '88272344', '665232', 'Bush Bar', 'BB', NULL, 'yes', 'none', NULL, 'fixed'),
(6, '044078', '0440782', '0440783', 'VIP Restaurant', 'VR', NULL, 'yes', 'none', NULL, 'fixed'),
(7, '033078', '0330782', '0330783', 'Restaurant', 'Rest', NULL, 'yes', 'none', NULL, 'fixed'),
(31, '0774111', '07741115', '07741114', 'Gymnasium', 'Gymn', NULL, 'no', '0770783', 'service', 'fixed'),
(32, '0774112', '07741125', '07741124', 'Car Hire', 'CH', NULL, 'no', '0770783', 'service', 'fixed'),
(33, '0774113', '07741135', '07741134', 'Hall', 'Hall', NULL, 'no', '0770783', 'service', 'fixed'),
(34, '0774114', '07741145', '07741144', 'Swimming Pool', 'SP', NULL, 'no', '0770783', 'service', 'fixed');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income_pos`
--

CREATE TABLE IF NOT EXISTS `income_pos` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `InvoiceNo` varchar(10) DEFAULT NULL COMMENT '(pos id to track transactions of a particular cart)',
  `InvItem` varchar(40) DEFAULT NULL,
  `ItemFuid` varchar(40) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Qty` varchar(30) DEFAULT NULL,
  `UnitPrice` varchar(10) DEFAULT NULL,
  `Amount` varchar(10) DEFAULT NULL,
  `ItemStatus` varchar(10) DEFAULT 'open',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  KEY `FK_GymnStaffInfo` (`data_author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income_pos_buyer`
--

CREATE TABLE IF NOT EXISTS `income_pos_buyer` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `PosBuyerName` varchar(80) DEFAULT NULL,
  `BuyerisRoomStay` varchar(10) DEFAULT 'no' COMMENT '(yes or no)',
  `PersonalFUID` varchar(40) DEFAULT NULL,
  `RoomStayID` varchar(40) DEFAULT NULL,
  `InvoiceNo` varchar(10) DEFAULT NULL COMMENT '(pos id to track transactions of a particular cart)',
  `InvoiceState` varchar(30) DEFAULT 'empty' COMMENT '(paid, credit or tabbed)',
  `Store` varchar(30) DEFAULT NULL COMMENT '(paid, credit or tabbed)',
  `data_author` varchar(40) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  KEY `FK_GymnStaffInfo` (`data_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `income_pos_buyer`
--

INSERT INTO `income_pos_buyer` (`puid`, `suid`, `tuid`, `fuid`, `PosBuyerName`, `BuyerisRoomStay`, `PersonalFUID`, `RoomStayID`, `InvoiceNo`, `InvoiceState`, `Store`, `data_author`, `data_status`) VALUES
(1, 'JU7296QDZ962993241', '1362927782', 'PK8670864124780FC1362927782OY', 'Solid', 'no', NULL, NULL, '80134', 'empty', '0440783', NULL, 'fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inventory_category`
--

INSERT INTO `inventory_category` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `SubSetOf`, `data_status`) VALUES
(1, 'HQ1791NDZ964025222', '1362928434', 'VJ5917748801774FC1362928434UZ', 'Wine & Spirit', NULL, NULL, NULL, 'fixed'),
(2, 'GS2279NDZ317885020', '1362928458', 'UK3650462408254FB1362928458TX', 'Soft Drinks', NULL, NULL, NULL, 'fixed'),
(3, 'FT3963QBY860729369', '1362928509', 'RM7485836922389FC1362928509OW', 'Bear', NULL, NULL, NULL, 'fixed'),
(4, 'EO4158LCZ796918712', '1362932487', 'TM7359360929307HC1362932487SZ', 'Cigar', NULL, NULL, NULL, 'fixed'),
(5, 'EO4504KCW578307516', '1362938623', 'UP8185332608557GD1362938623TZ', 'Service', NULL, NULL, NULL, 'fixed');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--

CREATE TABLE IF NOT EXISTS `inventory_item` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=267 ;

--
-- Dumping data for table `inventory_item`
--

INSERT INTO `inventory_item` (`puid`, `suid`, `tuid`, `fuid`, `Title`, `Acronym`, `Description`, `ItemType`, `InvCat`, `InvStore`, `QtyInStore`, `UnitPrice`, `data_status`) VALUES
(1, 'GS2464ODY227390681', '1362928712', 'QN6490029385063FD1362928712PZ', 'Chi-Vita', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '0', '600', 'fixed'),
(2, 'FN5115KCY338942741', '1362928832', 'TL3779230579408GC1362928832SX', 'Chi-Exotic', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '0', '600', 'fixed'),
(3, 'FT7258PCZ984808021', '1362928858', 'UM8933992732370IG1362928858OZ', 'Hollandia', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '0', '600', 'fixed'),
(4, 'FT9297RBY926540914', '1362928889', 'TP7488800966405GC1362928889RZ', '5-Alive', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '12', '600', 'fixed'),
(5, 'GT8404PEX512089113', '1362928939', 'VO1664770396009GB1362928939RZ', 'Water (big)', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '18', '250', 'fixed'),
(6, 'FO4617LDZ715925482', '1362929008', 'SO8347098302526HE1362929008RW', 'Water (small)', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '46', '200', 'fixed'),
(7, 'EV7690OBZ180897510', '1362929088', 'TM2965776338510FB1362929088PY', 'Cappy', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '0', '600', 'fixed'),
(8, 'IR1775OGY394674369', '1362929113', 'VQ6099303289109IC1362929113TY', 'Star', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '6', '400', 'fixed'),
(9, 'KS8818QCZ349148177', '1362929165', 'QM2956230422266GE1362929165PY', 'Harp', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '32', '400', 'fixed'),
(10, 'HT3824QDY536063163', '1362929199', 'RN1703179881828FC1362929199QZ', 'Gulder', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '12', '400', 'fixed'),
(11, 'JU5322OFZ785931846', '1362929221', 'VQ4719357247737EC1362929221UZ', 'Stout (big)', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '6', '600', 'fixed'),
(12, 'HR3947OCY640977232', '1362929238', 'UP6438382813726FB1362929238SX', 'Stout (medium)', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '53', '500', 'fixed'),
(13, 'DU6114MBZ329528121', '1362929268', 'RN8499973975081GB1362929268QZ', 'Heneiken', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '66', '600', 'fixed'),
(14, 'HO6633LBX881580556', '1362929303', 'PL5214068636544GE1362929303OW', 'Sminoff Ice', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '38', '400', 'fixed'),
(15, 'FR9510PDZ407591615', '1362929339', 'SJ4003551333288DB1362929339NY', 'Red Bull', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '39', '600', 'fixed'),
(17, 'FR6985KDZ971801859', '1362929392', 'VR1247287455250JD1362929392UY', 'Bullet', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '21', '600', 'fixed'),
(18, 'GO6930KEX996973309', '1362929412', 'SN2848739909565GC1362929412QY', 'Power Horse', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '37', '600', 'fixed'),
(19, 'GN9057LDZ547811222', '1362929434', 'SN8145956518626FB1362929434QX', 'Malt', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '58', '250', 'fixed'),
(20, 'KR9831OCZ919265865', '1362929479', 'SL7669597835875HF1362929479PZ', 'Fayrouz', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '40', '200', 'fixed'),
(21, 'DO6307MBZ794809628', '1362929506', 'WT2395266131858GD1362929506VZ', 'Mineral', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '46', '200', 'fixed'),
(22, 'FQ6918NDZ656007389', '1362929533', 'OI4936100241340DB1362929533MW', 'Legend', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '0550783', '25', '500', 'fixed'),
(23, 'FU2760RDZ718627573', '1362929595', 'VM3013753858113EC1362929595SZ', 'Baron De Vall', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '2000', 'fixed'),
(24, 'JR1802PGZ515844205', '1362929630', 'TP4814881994830ID1362929630SY', 'B&G', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '2500', 'fixed'),
(25, 'FN1088LCZ492423109', '1362929778', 'QL8465150524690HD1362929778PZ', 'Grant', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '5', '4000', 'fixed'),
(26, 'IT7442RFZ413236712', '1362929819', 'RM5193013602562HE1362929819PZ', 'Andre', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '3000', 'fixed'),
(27, 'GP5746KDY436068519', '1362929848', 'UO5759372944528GD1362929848SZ', 'B&B', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '12', '2000', 'fixed'),
(28, 'IU8704RFZ410924067', '1362929909', 'TN4184377405367FC1362929909SZ', 'Best Cream (small)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '5', '800', 'fixed'),
(29, 'HP2628LBY142557501', '1362930195', 'TO5288581812603KE1362930195SY', 'Martini', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '4000', 'fixed'),
(30, 'FS7796NCZ785566078', '1362930221', 'VQ9332062651223GD1362930221TZ', 'Blue Mascedent', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '10000', 'fixed'),
(31, 'FR2841ODZ774646139', '1362930355', 'TO7748813691119EC1362930355SZ', 'Night Train (big)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '4', '1500', 'fixed'),
(32, 'GO1503MCY172961935', '1362930383', 'VQ3292490698789GC1362930383UY', 'Night Train (small)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '11', '800', 'fixed'),
(33, 'GP6094LBX494376865', '1362930406', 'UR2277810302135GD1362930406TY', 'Carlo Rossi (small)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '3', '3000', 'fixed'),
(34, 'GT2337PCZ492239064', '1362930537', 'RN5297862179662HC1362930537QZ', 'Carlo Rossi (big)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '10000', 'fixed'),
(35, 'FQ4303NCW188182836', '1362930921', 'TP1869516642645FB1362930921SZ', 'Yago Wine', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '2', '6000', 'fixed'),
(36, 'EP6993KCY911884693', '1362930970', 'UP6030168188349FD1362930970TX', 'Elliot', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '4', '4000', 'fixed'),
(37, 'GS8428QEY301241710', '1362931036', 'QK8119721906419FC1362931036PY', 'St. Remy', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '4000', 'fixed'),
(38, 'GQ4900NEZ765397327', '1362931062', 'RN6210923998225EB1362931062PX', 'Classic Red', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '3000', 'fixed'),
(39, 'HP5872LFY631027879', '1362931083', 'TL6811334451306EC1362931083RY', 'Mc-Dowell', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '6', '4000', 'fixed'),
(40, 'GU8466NBY440510792', '1362931119', 'RM8426750485338EC1362931119QZ', 'Signature', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '4000', 'fixed'),
(41, 'ER9582MCZ822963262', '1362931135', 'TP2948192602488JH1362931135SZ', 'Royal Challenge', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '2', '4000', 'fixed'),
(42, 'HR9677NCX993218837', '1362931164', 'SN4828180741117FC1362931164PZ', 'Royal Stag', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '1', '4000', 'fixed'),
(43, 'HS2516PEX532803643', '1362931201', 'QM5173214847334EB1362931201OX', 'Red Label', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '6000', 'fixed'),
(44, 'HR3122MCY741622940', '1362931230', 'VR7182320832822FB1362931230TY', 'J&W Cocktail', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '1500', 'fixed'),
(45, 'HT7413RFZ981734704', '1362931352', 'RK9111886927301FB1362931352QZ', 'Baileys (big)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '5000', 'fixed'),
(46, 'HQ3635NDZ826627733', '1362931381', 'UR3752780045323HD1362931381TY', 'Black Label', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '7000', 'fixed'),
(47, 'DO3513KBW311717163', '1362931410', 'UQ2682030205287MG1362931410SY', 'Merlot', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '3000', 'fixed'),
(48, 'GR4335LBZ262711038', '1362931613', 'TN9394805822542FD1362931613SZ', 'Hennessy', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '8000', 'fixed'),
(49, 'FR6627KBZ430102923', '1362931654', 'TO4816327739742FD1362931654RZ', 'Amarula', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '4000', 'fixed'),
(50, 'IU7823QDZ248084844', '1362931767', 'QK6355366786101FB1362931767MW', 'Santissian Mevlot', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '2000', 'fixed'),
(51, 'GR1196OEY210734903', '1362932508', 'SP6016895103522GB1362932508RW', 'White London', NULL, NULL, 'comodity', 'TM7359360929307HC1362932487SZ', '665232', '17', '400', 'fixed'),
(52, 'FS2455NBY983087623', '1362932669', 'QM6995647649850HD1362932669PZ', 'Moet', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '15000', 'fixed'),
(53, 'EO5785KCZ781388552', '1362932755', 'TP6938018174253FC1362932755SY', 'Bnocino', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '7000', 'fixed'),
(54, 'DP8839MBY967522773', '1362932790', 'WP2867257115907HC1362932790VZ', 'Novacorte', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '6000', 'fixed'),
(55, 'FP5434MDZ781242476', '1362932865', 'WS7934808928246HC1362932865VZ', 'Dirty Bottle', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '15000', 'fixed'),
(56, 'GQ6409LCY266688226', '1362933019', 'UQ5602631288414IE1362933019TZ', 'Label 5', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '6000', 'fixed'),
(57, 'ER4837MBW638139157', '1362933089', 'TO2730080782163EB1362933089QZ', 'Remy Martins', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '10000', 'fixed'),
(58, 'FR2440OBZ288246121', '1362933623', 'VR2273735496428EB1362933623TZ', 'St. Crusade', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '4000', 'fixed'),
(59, 'HP1660LEZ868817568', '1362933675', 'UO7850349634740FC1362933675TZ', 'Muscadent', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '10000', 'fixed'),
(60, 'FP5792LCY321998083', '1362933721', 'UN3415846383902EC1362933721SY', 'Courvoisier', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '9000', 'fixed'),
(61, 'EP7261LBZ963551885', '1362933843', 'WS2892304047991HE1362933843VZ', 'Brigadier', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '4000', 'fixed'),
(62, 'KQ1725OEY379310343', '1362933938', 'TN6430737501003HD1362933938SZ', 'Lauzerac', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '4000', 'fixed'),
(63, 'HV2930OCZ550964342', '1362933980', 'RM5323399435338EC1362933980QZ', 'Vecchia Romagina', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '9000', 'fixed'),
(64, 'ER9582MCZ163527396', '1362934045', 'TP7027273242488JH1362934045SZ', 'Alize', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '7000', 'fixed'),
(65, 'FT2933QCZ511230125', '1362934154', 'RO7308578079198EB1362934154QX', 'Rosso', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '2000', 'fixed'),
(66, 'HR9677NCX741932732', '1362934266', 'SN1423771171117FC1362934266PZ', 'Colombello', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '3000', 'fixed'),
(67, 'JQ9055NDX555850014', '1362934474', 'TM4504858377489FB1362934474SY', 'Benson', NULL, NULL, 'comodity', 'TM7359360929307HC1362932487SZ', '665232', '0', '400', 'fixed'),
(68, 'JT6212RCZ682036806', '1362934533', 'PL8588722571412DB1362934533OY', 'Bianco', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '0550783', '0', '2000', 'fixed'),
(69, 'EO1102JBX842925419', '1362934558', 'RL4592455774098GE1362934558QY', 'Star', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '300', 'fixed'),
(70, 'GN4885LCX736611196', '1362934935', 'TO4082572637944IC1362934935SX', 'Gulder', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '300', 'fixed'),
(71, 'IT5717PEY236942607', '1362934966', 'PM8214373421361HE1362934966OZ', 'Harp', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '300', 'fixed'),
(72, 'GQ3072LDZ131524976', '1362934994', 'UO8402327022677EB1362934994SZ', 'Harp Lime', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '300', 'fixed'),
(73, 'GR8301OBY925444557', '1362935065', 'UP8178130504988HB1362935065TZ', 'Stout (big)', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '500', 'fixed'),
(74, 'GP3406LCX942912913', '1362935090', 'RJ4142022777661EC1362935090OY', 'Stout (medium)', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '350', 'fixed'),
(75, 'HS1172OCY606215339', '1362935117', 'TQ5307406485038FB1362935117SW', 'Smirnoff Ice', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '300', 'fixed'),
(76, 'GU4028SBZ821185034', '1362935273', 'RN9035397674347JH1362935273QZ', 'Gordon Spark', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '300', 'fixed'),
(77, 'IQ4933OBX926992063', '1362935337', 'UR3431312003482JH1362935337TX', 'Heineken', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '500', 'fixed'),
(78, 'FS9442OCY810510383', '1362935387', 'MJ4230426083069EC1362935387LY', 'Legend', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '500', 'fixed'),
(79, 'DQ3554NBY531288720', '1362935413', 'QN1219422507699DB1362935413PZ', 'Malt', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '200', 'fixed'),
(80, 'GS6415PCZ613078695', '1362935451', 'QM4525097448991FC1362935451PV', 'Don Simon', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '600', 'fixed'),
(81, 'HT4259OCY940990744', '1362935575', 'QM8513489545022HD1362935575OZ', 'Cappy', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '500', 'fixed'),
(82, 'FQ2070NCZ448192835', '1362935608', 'UN3147054136661GB1362935608SY', 'Hollandia', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '500', 'fixed'),
(83, 'HS8255NCY112638777', '1362935643', 'VQ9807229529066FD1362935643SZ', 'Chi-Vita', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '500', 'fixed'),
(84, 'HQ2164OEX379857420', '1362935682', 'RN7735624189471GD1362935682QZ', 'Red Bull', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '500', 'fixed'),
(85, 'EQ6893NBZ761241261', '1362935748', 'VR2697798801058IC1362935748TZ', 'Bullet', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '500', 'fixed'),
(86, 'GR2784MEZ817034244', '1362935778', 'SN8738030822580FB1362935778RY', 'Power Horse', NULL, NULL, 'comodity', 'RM7485836922389FC1362928509OW', '665232', '0', '500', 'fixed'),
(87, 'HS5322NDZ530611497', '1362935825', 'UQ2794053941795HD1362935825SZ', 'Mineral', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '100', 'fixed'),
(88, 'HN2563LBZ953711547', '1362935844', 'TP1307743854954EC1362935844RZ', 'Water (big)', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '200', 'fixed'),
(89, 'IT4741QEZ884952802', '1362935882', 'TN8190355242917HD1362935882QX', 'Water (small)', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '150', 'fixed'),
(90, 'FS5510NDZ114336102', '1362938761', 'UQ5673529748239LG1362938761TY', 'FRIED PLANTAIN with EGG SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(91, 'EN5060LCZ401972765', '1362938815', 'SO5957612983890FD1362938815QY', 'CUSTARD with MOI-MOI', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(92, 'DP9585KBZ857922638', '1362938850', 'VL2649858309855DB1362938850TZ', 'BOILED PLANTAIN or YAM with GOAT MEAT, CHICKEN or FISH STEW', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1200', 'fixed'),
(93, 'DR6541PBZ846999397', '1362938930', 'TO5324673336900ID1362938930QZ', 'FRIED or BOILED YAM with KIDNEY SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1200', 'fixed'),
(94, 'HU8956NEZ903220337', '1362938980', 'QN3986923717524EB1362938980PZ', 'FRIED PLANTAIN', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '400', 'fixed'),
(95, 'ET1374RBZ978228726', '1362939005', 'UO2965752878333GB1362939005SZ', 'FRIED YAM', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '400', 'fixed'),
(96, 'HS2516PEX667623743', '1362939047', 'QM8521858857334EB1362939047OX', 'PLAIN PANCAKE with JAM (2 pieces)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(97, 'HQ3635NDZ233229177', '1362939087', 'UR3556832745323HD1362939087TY', 'OMELETTE (spanish)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(98, 'DO3513KBW861318151', '1362939151', 'UQ1086371895287MG1362939151SY', 'OMELETTE (tomatoes)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(99, 'GR4335LBZ481197050', '1362939188', 'TN9451179732542FD1362939188SZ', 'OMELETTE (onions)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(100, 'KT2736QCZ928654855', '1362939344', 'TP1202824565567GC1362939344RY', 'OMELETTE (sardine)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(101, 'KU3320SEY854250924', '1362939400', 'VP4664331201087KF1362939400UZ', 'OMELETTE (corned beef)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(102, 'IQ7733ODZ331637742', '1362939565', 'RO1710543678119GD1362939565QX', 'OMELETTE (nigerian)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(103, 'FR6627KBZ831025614', '1362939616', 'TO6776883429742FD1362939616RZ', 'OMELETTE (cheese)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(104, 'EP3453JCZ830499268', '1362939744', 'TJ9411936413799EB1362939744PX', 'SCRAMBLED EGGS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '300', 'fixed'),
(105, 'HO6775MEZ372804182', '1362939854', 'VP6640388229180IB1362939854TZ', 'BOILED EGG (2 pieces)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '300', 'fixed'),
(106, 'LT9614REZ109904042', '1362939891', 'TL5942906394397GD1362939891SY', 'POACHED EGG', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '300', 'fixed'),
(107, 'EP8193LCZ431363117', '1362939930', 'RL7285200399250FC1362939930OZ', 'FRIED EGGS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '300', 'fixed'),
(108, 'ES1742NBZ595179206', '1362939971', 'RN5262368851117DB1362939971PY', 'YAM CHIPS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(109, 'FS2455NBY687431783', '1362940003', 'QM3015460829850HD1362940003PZ', 'POTATO CHIPS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(110, 'EO5785KCZ460700724', '1362940053', 'TP1509659374253FC1362940053SY', 'BAKED BEANS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(111, 'DP8839MBY367757384', '1362940129', 'WP1138453665907HC1362940129VZ', 'SAUSAGE (2 pieces)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(112, 'HO6417MDY648324897', '1362940177', 'RM1693196145860FC1362940177PY', 'HOT DOG (2 pieces)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(113, 'IT2048PCZ595087063', '1362940358', 'VO2599268318119GD1362940358SY', 'CUSTARD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(114, 'HV3383OEZ780732469', '1362940390', 'SP7961269009619HB1362940390RX', 'QUAKER OATH', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(115, 'FN8292JBY260289377', '1362940439', 'RK8672262726463EB1362940439PU', 'CORN FLAKES', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(116, 'FP5434MDZ839990538', '1362940460', 'WS3713022818246HC1362940460VZ', 'GOLDEN MORN', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(117, 'ES7520QCZ460412038', '1362940491', 'VS3089130134719MG1362940491UZ', 'POT of LIPTON with POWERED MILK with BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(118, 'FR6800NCX663558410', '1362940621', 'RN6469218485318IC1362940621QW', 'BOURNVITA with POWDERED MILK with BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(119, 'GP3436NDZ325701732', '1362940709', 'TO5460213707052ID1362940709SY', 'MILO with POWDERED MILK and BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(120, 'IU7823QDZ787634543', '1362940888', 'QK6733743226101FB1362940888MW', 'FRESH or TOAST BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(121, 'GM3933KBZ936257085', '1362941051', 'PK3032335379368FC1362941051OW', 'SANDWICH or FRENCH TOAST', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '400', 'fixed'),
(122, 'JQ9055NDX335775727', '1362941094', 'TM1728641967489FB1362941094SY', 'CHICKEN PEPPER SOUP', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(123, 'JT6212RCZ375962579', '1362941121', 'PL6787160741412DB1362941121OY', 'GOAT MEAT PEPPER SOUP', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(124, 'JU6212QGY933312739', '1362941337', 'VO5748748502605HE1362941337UZ', 'FISH PEPPER SOUP', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(125, 'FR2440OBZ654454685', '1362941356', 'VR7223406876428EB1362941356TZ', 'BUSH MEAT PEPPER SOUP', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1200', 'fixed'),
(126, 'HP1660LEZ208917123', '1362941452', 'UO4822047024740FC1362941452TZ', 'SNAIL PEPPER SOUP', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(127, 'JS4594QCZ374852711', '1362942085', 'RM4841813379508FD1362942085QY', 'TIN MILK', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '300', 'fixed'),
(128, 'GR3739NDW187345906', '1362943816', 'QM7006245742689GB1362943816PV', 'CREAM of CHICKEN SOUP with BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(129, 'HR7767NCX647158566', '1362943858', 'UO7223151887001FC1362943858SZ', 'CREAM of TOMATO SOUP with BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(130, 'EP6388NCX147758840', '1362943883', 'UO7826245352744IE1362943883SZ', 'CREAM of MUSHROOM SOUP with BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(131, 'JT8923OEZ197006449', '1362943908', 'SM1756468266778GB1362943908PX', 'CREAM of CARROT SOUP with BREAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(132, 'DV8725QBZ959697321', '1362943938', 'RO6344994855966DB1362943938QW', 'POUNDED YAM, VEGETABLE SOUP with GOAT MEAT or CHICKEN or TUR', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1800', 'fixed'),
(133, 'GR3477OCY189943175', '1362943985', 'VR2859459701180NI1362943985UZ', 'EBA, EGUSI SOUP with BUSH MEAT', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1700', 'fixed'),
(134, 'HT5600MDZ503370832', '1362944131', 'RO1512293723205JC1362944131QW', 'SEMOVITA, OGBONO SOUP with GOAT MEAT', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1300', 'fixed'),
(135, 'FR3960PCZ649636926', '1362944170', 'WQ1238052513040EC1362944170VZ', 'WHEAT, OGBONO SOUP with BEAF', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1300', 'fixed'),
(136, 'EO1102JBX791023923', '1362944258', 'RL5256576744098GE1362944258QY', 'JOLLOF RICE with CHICKEN', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1300', 'fixed'),
(137, 'GT4729QEZ395215220', '1362944351', 'UP1708920933519FC1362944351RY', 'FRIED RICE with CHICKEN', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1300', 'fixed'),
(138, 'HR1590NEZ745394965', '1362944433', 'VO2942893442890EC1362944433RZ', 'YAM PORRIDGE with GOAT MEAT or CHICKEN or FISH', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '665232', '0', '1500', 'fixed'),
(139, 'DL8146IBS784448921', '1362944492', 'VO9976279182418FC1362944492TZ', 'STARCH and BANGA with FRESH FISH', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1300', 'fixed'),
(140, 'IQ5570NEX576122217', '1362944571', 'SO8855378362783EB1362944571RZ', 'PEPPER RICE with ASSORTED MEAT', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(141, 'JR9983OHZ871228997', '1362944604', 'RO2719927077169DB1362944604QY', 'AMALA, or POUNDED YAM, EDIKAIKONG with BUSH MEAT', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2200', 'fixed'),
(142, 'HT8327NFZ379634308', '1362944705', 'PJ2637239462641EB1362944705OX', 'SPAGHETTI BOLOGNAISE with MISSED VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2500', 'fixed'),
(143, 'GO9521LEV210199794', '1362944830', 'VL8434028099121HB1362944830SZ', 'CHICKEN CURRY with WHITE RICE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2500', 'fixed'),
(144, 'KS9372QFZ479153426', '1362944861', 'TN4486097793199HC1362944861SY', 'OVEN BAKED CHICKEN, CHIPS & FRIED RICE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '3500', 'fixed'),
(145, 'FU6113QBZ147233247', '1362944915', 'VQ8803181371372LF1362944915TZ', 'GRILLED CHICKEN or STEAK in BARBECUE SAUCE with ROASTED POTATOES, ONIONS RING & FRIED RICE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '3500', 'fixed'),
(146, 'DQ5666OBZ782486880', '1362945020', 'UM5441739767115FC1362945020TZ', 'TURKEY in SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(147, 'GS2585PDY122732898', '1362945253', 'UP7080822868356HF1362945253TZ', 'GOAT MEAT in SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(148, 'HU9035RCZ194580798', '1362945362', 'NH3117737307286DB1362945362MW', 'SNAIL in SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(149, 'FR8500LDZ503474023', '1362945429', 'SJ7361696898778EB1362945429OY', 'BEEF in SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(150, 'GR1495MCZ620613922', '1362945474', 'UQ6831658308874FC1362945474SY', 'BUSH MEAT in SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1200', 'fixed'),
(151, 'GS2365PBY859264129', '1362945520', 'SJ2358003415921FC1362945520PY', 'CROAKER FISH in SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(152, 'JT2245QDZ889058267', '1362945556', 'VR2645209498704IF1362945556UZ', 'CATFISH in SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(153, 'HS6356PBZ134259229', '1362945602', 'VR8847887645278KG1362945602UZ', 'PEPPER STEAK with RICE or SHREDDED BEEF with RICE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2500', 'fixed'),
(154, 'FQ3729MCY369188234', '1362945831', 'UP1427673368452GD1362945831TZ', 'CHICKEN ESCALOPE with CHIPS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2500', 'fixed'),
(155, 'FT4208QDZ451289120', '1362945884', 'TP2046418157167GD1362945884SZ', 'BRAISED RICE with VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(156, 'FS7314PCZ439534904', '1362945922', 'WQ8850978295271HE1362945922UZ', 'SWEET-CORN SOUP with SPRING ROLL', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(157, 'JU5934QFZ812938791', '1362945984', 'PL3288000984216FB1362945984OW', 'PERKIN SOUP with SPRING ROLL', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(158, 'HS4511OEY832678065', '1362946027', 'TL8415569642628HB1362946027PY', 'GOLDEN FRIED PRAWNS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(159, 'ET2061NCZ727439468', '1362946101', 'VN8183048137796FC1362946101SZ', 'SPRING ROLLS (2 Pieces)', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(160, 'GP3469NBZ771513600', '1362946149', 'QK8861166649923EC1362946149MZ', 'VEGETARIAN MUSHROOM SOUP', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(161, 'FS4114PDY238474826', '1362946185', 'UP1212577263768GB1362946185TZ', 'CHICKEN MUSHROOM SOUP', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(162, 'HS9296NEZ554201558', '1362946222', 'QK5936795337347EB1362946222OY', 'BUTTERFLY PRAWNS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(163, 'GQ9723ODY201667032', '1362946275', 'RL9590768197850EB1362946275PU', 'CHICKEN with GREEN PEPPER SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(164, 'FP5589LDY788038585', '1362946351', 'RN2346209953001EB1362946351PY', 'CHICKEN in MUSHROOM SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(165, 'HT1873ODZ657352379', '1362946750', 'RN5218193884303FC1362946750QW', 'CHICKEN in CHILLI SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(166, 'FO7209MDY189951363', '1362946786', 'QK1129462826993EC1362946786PY', 'SWEET n SOUR CHICKEN', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(167, 'EN3514JBT348969220', '1362946820', 'TQ9112258158428GE1362946820SY', 'CHICKEN in GARLIC SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(168, 'ET2198QCY382853120', '1362946907', 'RN3368844784900GE1362946907QZ', 'STEAK ONLY', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(169, 'EP9136LBX862863943', '1362946926', 'OL5555783635030GD1362946926NV', 'SHREDDED BEEF ONLY', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(170, 'FN1592LBZ217953113', '1362946954', 'QN8088701872522IG1362946954PZ', 'SOFT CHICKEN ONLY', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(171, 'HU5400MDY101718456', '1362947006', 'VO7812174536398IF1362947006TZ', 'BEEF in TOMATOES SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(172, 'GQ2020ODZ315383513', '1362947030', 'WS9114773348050GC1362947030VZ', 'BEEF in CURRY SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(173, 'FP7320LBZ198086495', '1362947065', 'UN2908652627514IE1362947065RZ', 'BEEF in ONION SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(174, 'FQ2494NBZ880576187', '1362947222', 'VQ8499200825852HC1362947222TZ', 'BEEF in GREEN PEPPER SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(175, 'HS7723OBY920164538', '1362947248', 'PK5548744003066FD1362947248NZ', 'FISH DISH', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(176, 'GS3371ODZ507333367', '1362947302', 'UO3090842508155FD1362947302TY', 'SWEET n SOUR FISH', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(177, 'IQ4781OFZ349791963', '1362947325', 'RJ7840717368237DB1362947325OX', 'CHILLI SAUCE FISH', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(178, 'GU2497QDZ559489664', '1362947370', 'TM1150373029575GB1362947370SZ', 'FISH in GARLIC or GINGER SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(179, 'GR9029OEV423800982', '1362947426', 'VQ6052368092105GC1362947426SZ', 'FISH in CURRY SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(180, 'EO5848LCZ731533219', '1362947450', 'TP6271312495877LE1362947450RZ', 'PRAWNS in CURRY SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(181, 'IS2957NBX549617349', '1362947513', 'TN7887214056050FC1362947513QZ', 'PRAWNS in TOMATOES SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(182, 'JR5910PGX572171126', '1362947648', 'VP2477171689762EC1362947648SZ', 'PRAWNS in MUSHROOM SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(183, 'GQ3023MCZ602852630', '1362947687', 'QL7148815378722EC1362947687OW', 'PRAWNS in GINGER SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(184, 'DQ6081NBZ731055270', '1362947731', 'VQ1616867394619LF1362947731UZ', 'MIX VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(185, 'IR5517OCY331004691', '1362947750', 'UP5844295369684IC1362947750SY', 'VEGETABLE in CURRY SAUCE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(186, 'HU6366QBZ469448109', '1362947776', 'PL8103331425451FB1362947776NU', 'RIALTO SPECIAL RICE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(187, 'IT9712QCZ523940476', '1362947802', 'SK9092001894987GE1362947802QW', 'ASSORTED FRIED RICE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(188, 'HR5688PCX777471891', '1362947827', 'WP1079456678201IB1362947827RZ', 'CHINESE FRIED RICE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(189, 'FS8843LBZ680097335', '1362947903', 'WQ8241738795770HD1362947903VZ', 'EGG NOODLES', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(190, 'ER5213LCZ385329940', '1362947927', 'UM7823913993662FC1362947927QZ', 'EGG with SPAGHETTI', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(191, 'DN7105LBX971065389', '1362947988', 'SN1692993938845HF1362947988RZ', 'SPAGHETTI CABONA', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '2000', 'fixed'),
(192, 'GR9276PCY332865878', '1362948048', 'SO9135145496928GB1362948048RZ', 'SPAGHETTI JOLLOF', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(193, 'MV4741TEZ546623145', '1362948078', 'SL5425180681766EB1362948078RW', 'CHICKEN and CHIPS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1600', 'fixed'),
(194, 'GP6527NDY298553255', '1362948111', 'TO5695427966746IC1362948111QZ', 'FRIED CHICKEN in MIX VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1600', 'fixed'),
(195, 'GP7398MEW569603993', '1362948143', 'VP1220522887437GC1362948143UZ', 'FRIED GOAT MEAT in MIX VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(196, 'ER2762NCZ360892826', '1362948177', 'TL2229059327261EB1362948177PZ', 'FRIED BEEF in MIX VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(198, 'FQ1363MCZ914743167', '1362948207', 'RN8079528643021FC1362948207QZ', 'FRIED BUSH MEAT in MIX VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1700', 'fixed'),
(199, 'HR9651NDW191677753', '1362948249', 'SM7723167214478FC1362948249RY', 'FRIED SNAIL in MIX VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(200, 'EQ7326MCZ532117810', '1362948387', 'TQ5906610547915MJ1362948387SZ', 'CLUB SANDWICH', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(201, 'HS8055PEY942021408', '1362948410', 'VO6266856207142ID1362948410SZ', 'FRIED FISH in MIX VEGETABLE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1500', 'fixed'),
(202, 'HS2196MFZ848428512', '1362948437', 'UR6050256284569GD1362948437TY', 'BEEF BURGER with CHEESE', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1000', 'fixed'),
(203, 'HS2995QEY569821336', '1362948466', 'UP3352493018307GE1362948466TZ', 'DEEP FRIED FISH and CHIPS', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '1600', 'fixed'),
(204, 'EP3453JCZ206083085', '1362948511', 'TJ3162996883799EB1362948511PX', 'POTATO SALAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(205, 'HO6775MEZ788360718', '1362948527', 'VP8008916819180IB1362948527TZ', 'MIXED VEGETABLE SALAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(206, 'LT9614REZ125909723', '1362948546', 'TL5478676974397GD1362948546SY', 'COLE-SLAW', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '800', 'fixed'),
(207, 'EP8193LCZ318501387', '1362948563', 'RL7423731819250FC1362948563OZ', 'FRUIT in SEASON', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '600', 'fixed'),
(208, 'ES1742NBZ364599146', '1362948587', 'RN6412548901117DB1362948587PY', 'FRUIT SALAD', NULL, NULL, 'service', 'UP8185332608557GD1362938623TZ', '0330783', '0', '500', 'fixed'),
(209, 'GS6637QBZ372279919', '1362959705', 'WS5470838396071IF1362959705VZ', 'Mineral', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '100', 'fixed'),
(210, 'FO6076MDY519324400', '1362959724', 'RM7138582403226EB1362959724QZ', 'Malt', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '200', 'fixed'),
(211, 'IS8299QDZ834746415', '1362959965', 'SO5397531048095HF1362959965RW', 'Malt', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '0', '250', 'fixed'),
(212, 'HQ5426NBZ763795218', '1362960008', 'PK3545658636888GB1362960008OY', '5-Alive', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '500', 'fixed'),
(213, 'JP1923NBZ501832843', '1362960157', 'TO1399364335402IF1362960157RZ', '5-Alive', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '500', 'fixed'),
(214, 'JU9594RBZ270920045', '1362960228', 'RN4694994409735FB1362960228QZ', 'Cappy', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '500', 'fixed'),
(215, 'HS8668QCZ552454860', '1362960399', 'UN6123723901624GC1362960399TX', 'Chi-Exotic', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '500', 'fixed'),
(216, 'GT7256OBZ691713429', '1362960410', 'UQ2770820171937FC1362960410TZ', 'Chi-Exotic', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '665232', '0', '500', 'fixed'),
(217, 'KR8511PFZ506829493', '1362960511', 'SK2984755712833EC1362960511MY', 'Chi-Vita', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '500', 'fixed'),
(218, 'EQ1114OBY301229026', '1362960733', 'UN3312695847705FD1362960733TY', 'Hollandia', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '500', 'fixed'),
(219, 'FM7297JBX812665869', '1362960848', 'SM5417742596984EC1362960848OY', 'Mineral', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0550783', '0', '200', 'fixed'),
(220, 'EQ3297OCX134716291', '1362961254', 'QN7497609107700GC1362961254PX', 'Water (big)', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '200', 'fixed'),
(221, 'LR7545PFZ229592849', '1362961272', 'SM6015553725439FD1362961272RZ', 'Water (small)', NULL, NULL, 'comodity', 'UK3650462408254FB1362928458TX', '0330783', '0', '150', 'fixed'),
(222, 'KU8464RIZ324976692', '1362963298', 'VO2009016342811JD1362963298UZ', 'Pool Games', NULL, NULL, 'comodity', 'UP8185332608557GD1362938623TZ', '0550783', '0', '200', 'fixed'),
(223, 'IR4158OFZ588093976', '1362970302', 'SM4827427969689FD1362970302QY', 'Baron De Vall', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '2000', 'fixed'),
(224, 'FO2471LDV909078764', '1362971861', 'VL4115914792419FC1362971861TZ', 'B&G', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '2500', 'fixed'),
(225, 'EO8585MBV970318949', '1362971962', 'WQ8495424001716ID1362971962VZ', 'Grant', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(226, 'FQ1673OBY909421360', '1362972064', 'SK6011673432390DB1362972064NY', 'Andre', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '3000', 'fixed'),
(227, 'HU8589PCY326009891', '1362972111', 'TO9448201821940JD1362972111RZ', 'B&B', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '2000', 'fixed'),
(228, 'ER4399LBV935974254', '1362972207', 'TP9980527837477IC1362972207SX', 'Baileys (big)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '5000', 'fixed'),
(229, 'JT9263PFZ178315866', '1362972251', 'SP9187233651331ID1362972251RX', 'Best Cream (small)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '800', 'fixed'),
(230, 'HR1976OCY968708544', '1362972278', 'SL1905298728297FD1362972278QZ', 'Bianco', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '2000', 'fixed'),
(231, 'FQ7365NDZ940857005', '1362972303', 'PM8299550753296EC1362972303OZ', 'Black Label', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '7000', 'fixed'),
(232, 'ES3351NBY764423457', '1362972324', 'TO9888220662684EC1362972324SZ', 'Blue Mascedent', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '10000', 'fixed'),
(233, 'FR8918LCZ816663083', '1362972364', 'VO8568438929264GE1362972364UZ', 'Bnocino', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '7000', 'fixed'),
(234, 'FV2362QDZ665609398', '1362972387', 'SO7484091469125GD1362972387RZ', 'Brigadier', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(235, 'HQ4546NDX592028550', '1362972402', 'QL4120887213658EB1362972402PY', 'Carlo Rossi (big)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '10000', 'fixed'),
(236, 'FR7507PCZ895162714', '1362972440', 'QN4399940875042FC1362972440PY', 'Carlo Rossi (small)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '3000', 'fixed'),
(237, 'MS2677QGZ486633299', '1362972482', 'UR1379453962568HE1362972482TZ', 'Classic Red', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '3000', 'fixed'),
(238, 'ES7482PCY946911719', '1362972495', 'OL7811468279687FB1362972495NZ', 'Colombello', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '3000', 'fixed'),
(239, 'IR5012NEY210400168', '1362972522', 'UN4123547569511EC1362972522TZ', 'Courvoisier', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '9000', 'fixed'),
(240, 'JR2377PCY119706799', '1362972549', 'SO1315964162701FB1362972549RZ', 'Dirty Bottle', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '15000', 'fixed'),
(241, 'KU4210REZ764999052', '1362972620', 'UL4170435486586HE1362972620QY', 'Elliot', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(242, 'GR1433OBZ254084334', '1362972673', 'UQ3820454739254DB1362972673TY', 'Hennessy', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '8000', 'fixed'),
(243, 'JU9986NEZ285415757', '1362972722', 'WT3857437349113KI1362972722VZ', 'J&W Cocktail', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '1500', 'fixed'),
(244, 'ER4760MCZ360329339', '1362972770', 'SN3719742129210EC1362972770PY', 'Label 5', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '6000', 'fixed'),
(245, 'EP5249LBZ280787197', '1362972803', 'SJ6403564519083FC1362972803QW', 'Martini', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(246, 'GN1856LCZ567668598', '1362972902', 'SO5128380504254HC1362972902QX', 'Mc-Dowell', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(247, 'ES5714PCZ761031645', '1362972926', 'SO1394281906343DB1362972926QZ', 'Merlot', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '3000', 'fixed'),
(248, 'GU7580SCZ508940324', '1362973062', 'VR3773928648433LB1362973062UY', 'Moet', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '15000', 'fixed'),
(249, 'JR4020PGZ645968908', '1362973091', 'WO1434997316913EB1362973091UZ', 'Muscadent', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '10000', 'fixed'),
(250, 'FM8336KBZ158895239', '1362973117', 'SN4590733435953HC1362973117QX', 'Night Train (big)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '1500', 'fixed'),
(251, 'DQ4759KBY787677061', '1362973150', 'UP6836644759709FC1362973150RZ', 'Night Train (small)', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '800', 'fixed'),
(252, 'HS6251PEZ944771594', '1362973166', 'TO1776000304481JB1362973166SZ', 'Novacorte', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '6000', 'fixed'),
(253, 'GT6798PCZ981146078', '1362973189', 'VL4211022201483EC1362973189UZ', 'Red Label', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '6000', 'fixed'),
(254, 'JS8951PCZ322383863', '1362973232', 'RN9897407956131FC1362973232QX', 'Remy Martins', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '10000', 'fixed'),
(255, 'FS2353OCY114953630', '1362973355', 'SO9280067828074HB1362973355RZ', 'Rosso', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '2000', 'fixed'),
(256, 'EQ2124MCX460384978', '1362973374', 'TP7546810026717KB1362973374SY', 'Royal Challenge', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(257, 'EM1107KCY177778264', '1362973399', 'SP1882599851897FC1362973399RZ', 'Royal Stag', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(258, 'GR6442LEZ562315022', '1362973509', 'UQ6556850662107JB1362973509SZ', 'Santissian Mevlot', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '2000', 'fixed'),
(259, 'JS6152PGY297516553', '1362973527', 'TM5506730671029FC1362973527SZ', 'Signature', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(260, 'LT8239QGY995250543', '1362973557', 'TQ5908436885456GC1362973557SY', 'St. Crusade', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(261, 'DT9855LBZ536351649', '1362973582', 'QM3807575905066ID1362973582OY', 'St. Remy', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(262, 'IQ6900ODZ324022633', '1362973606', 'RM2843672479135HD1362973606OY', 'Vecchia Romagina', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '9000', 'fixed'),
(263, 'IT9523PFZ953001095', '1362973641', 'SN7288281375012IE1362973641RY', 'Yago Wine', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '6000', 'fixed'),
(264, 'FS7366OCX552002313', '1362973756', 'TP6687505859535KD1362973756SX', 'Alize', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '7000', 'fixed'),
(265, 'IP3253MDY906504756', '1362973778', 'OL6807113996352DB1362973778NX', 'Amarula', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed'),
(266, 'EP7524NBZ877981241', '1362973951', 'RL3579926888727EC1362973951PX', 'Lauzerac', NULL, NULL, 'comodity', 'VJ5917748801774FC1362928434UZ', '665232', '0', '4000', 'fixed');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=9 ;

--
-- Dumping data for table `person_info`
--

INSERT INTO `person_info` (`puid`, `suid`, `tuid`, `fuid`, `FullName`, `PrimaryPhone`, `PrimaryEmail`, `PrimaryAddress`, `BirthDate`, `Sex`, `data_status`) VALUES
(1, '07085', '09083', '0763842', 'Developer', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(2, '08801', '088012', '088013', 'Administrator', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(3, '07701', '077012', '077013', 'Reception', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(4, '06601', '066012', '066013', 'Bush Bar', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(5, '05501', '055012', '055013', 'VIP Bar', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(6, '04401', '044012', '044013', 'VIP Restaurant', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(7, '03301', '033012', '033013', 'Restaurant', NULL, NULL, NULL, NULL, NULL, 'fixed'),
(8, '02201', '022012', '022013', 'Manager', NULL, NULL, NULL, NULL, NULL, 'fixed');

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
(52, 'EQ5470KCZ327385963', '1361956249', 'QK6633639847857DB1361956249MX', '107', NULL, NULL, 'VR2841354329447HE1361953454TZ', 'instay', NULL, 'fixed'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=9 ;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`puid`, `suid`, `tuid`, `fuid`, `Department`, `Role`, `Position`, `AccessRight`, `Privilege`, `Salary`, `PersonInfo`, `data_author`, `data_status`) VALUES
(1, '0808', '0808', '0808', NULL, NULL, NULL, NULL, NULL, NULL, '0763842', NULL, 'fixed'),
(2, '0880124', '08801241', '08801242', NULL, NULL, NULL, NULL, NULL, NULL, '088013', NULL, 'fixed'),
(3, '0770124', '07701241', '07701242', NULL, NULL, NULL, NULL, NULL, NULL, '077013', NULL, 'fixed'),
(4, '0660124', '06601241', '06601242', NULL, NULL, NULL, NULL, NULL, NULL, '066013', NULL, 'fixed'),
(5, '0550124', '05501241', '05501242', NULL, NULL, NULL, NULL, NULL, NULL, '055013', NULL, 'fixed'),
(6, '0440124', '04401241', '04401242', NULL, NULL, NULL, NULL, NULL, NULL, '044013', NULL, 'fixed'),
(7, '0330124', '03301241', '03301242', NULL, NULL, NULL, NULL, NULL, NULL, '033013', NULL, 'fixed'),
(8, '0220124', '02201241', '02201242', NULL, NULL, NULL, NULL, NULL, NULL, '022013', NULL, 'fixed');

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
  `Store` varchar(50) DEFAULT NULL,
  `SecurityAnswer` varchar(50) DEFAULT NULL,
  `ConfirmationMsg` varchar(50) DEFAULT NULL,
  `PersonInfo` varchar(40) DEFAULT NULL,
  `AccountType` varchar(20) DEFAULT '0',
  `AccountStatus` varchar(20) DEFAULT 'active',
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_UserPersonInfo` (`PersonInfo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`puid`, `suid`, `tuid`, `fuid`, `UserID`, `UserPIN`, `Password`, `SecurityQuestion`, `Store`, `SecurityAnswer`, `ConfirmationMsg`, `PersonInfo`, `AccountType`, `AccountStatus`, `data_status`) VALUES
(1, '0813379', '070868', '08133798803', 'caix', NULL, '123a35ab8ceda6f4cebb83dbeafc75ee', NULL, NULL, NULL, NULL, '0763842', '7', 'active', 'fixed'),
(2, '088011', '0880112', '0880113', 'admin', NULL, '5cc50613f3b6dfcbe79f6c27e043bbe6', NULL, NULL, NULL, NULL, '088013', '7', 'active', 'fixed'),
(3, '077011', '0770112', '0770113', 'reception', NULL, '7c5a13a32f99463488a2c47eeb6afc94', NULL, NULL, NULL, NULL, '077013', '5', 'active', 'fixed'),
(4, '066011', '0660112', '0660113', 'bushbar', NULL, '08c97ece500a39ed8dfc3c326ee5a8e2', NULL, NULL, NULL, NULL, '066013', '5', 'active', 'fixed'),
(5, '055011', '0550112', '0550113', 'vipbar', NULL, 'c5ebfd4dad2a37d53576509a68333208', NULL, NULL, NULL, NULL, '055013', '5', 'active', 'fixed'),
(6, '044011', '0440112', '0440113', 'viprest', NULL, 'c1cf59b11b182ef4f3718b1b933b5ccc', NULL, NULL, NULL, NULL, '044013', '5', 'active', 'fixed'),
(7, '033011', '0330112', '0330113', 'restaurant', NULL, 'fcfe8204a0be7b46f5860b6f3de22730', NULL, NULL, NULL, NULL, '033013', '5', 'active', 'fixed'),
(8, '022011', '0220112', '0220113', 'manager', NULL, '7e9cbe22d4828ff54ec6cedffa19ad46', NULL, NULL, NULL, NULL, '022013', '6', 'active', 'fixed');

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
  ADD CONSTRAINT `FK_POSStaffInfo` FOREIGN KEY (`data_author`) REFERENCES `staff_info` (`fuid`);

--
-- Constraints for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD CONSTRAINT `FK_InventoryCategory` FOREIGN KEY (`InvCat`) REFERENCES `inventory_category` (`fuid`),
  ADD CONSTRAINT `FK_InventoryStore` FOREIGN KEY (`InvStore`) REFERENCES `hr_set` (`fuid`);

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

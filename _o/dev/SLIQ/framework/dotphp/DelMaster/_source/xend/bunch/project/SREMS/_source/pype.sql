-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2014 at 01:08 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pype`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_credit`
--

CREATE TABLE IF NOT EXISTS `academic_credit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MinUnit` varchar(10) DEFAULT NULL,
  `MaxUnit` varchar(10) DEFAULT NULL,
  `Level` varchar(200) DEFAULT NULL,
  `Semester` varchar(200) DEFAULT NULL,
  `Program` varchar(200) DEFAULT NULL,
  `ProgramType` varchar(200) DEFAULT NULL,
  `ProgramDegree` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `academic_level`
--

CREATE TABLE IF NOT EXISTS `academic_level` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Level` varchar(50) DEFAULT NULL,
  `Year` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=10 ;

--
-- Dumping data for table `academic_level`
--

INSERT INTO `academic_level` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Level`, `Year`) VALUES
(1, '548787477', '421317138681987', 'B116143021387692E2959e', '6931417263183AEB124680313115267d708120626ebddcb', '2014-11-24 23:00:15', '1417263183', 'admin', 'locked', '2014-11-29 13:13:50', '100', '1'),
(2, '465479767', '167312243467352', 'e326241481647233E6922d', '3341417263234DEd131344372635234D288831771eabcdd', '2014-11-24 23:00:27', '1417263234', 'admin', 'locked', '2014-11-29 13:14:27', '200', '2'),
(3, '504237858', '302716417256049', 'd301267247431801a1027d', '8121417263270AdA091202435726174E514396037eeCCbe', '2014-11-24 23:00:37', '1417263270', 'admin', 'locked', '2014-11-29 13:15:10', '300', '3'),
(4, '108840066', '117032674316397', 'C703317127048216b2217a', '8731417263307Dac341037125168874A734109977EFAFee', '2014-11-24 23:00:45', '1417263307', 'admin', 'locked', '2014-11-29 13:15:45', '400', '4'),
(5, '595714793', '147431632193531', 'E715321446317426d4164D', '7941417263341daB324717466063119c099781885aABbDe', '2014-11-24 23:00:53', '1417263341', 'admin', 'locked', '2014-11-29 13:16:15', '500', '5'),
(6, '170030606', '781267413370906', 'c126849379732615b4740E', '5671417263378bCB458382377218106D649087552EACcAA', '2014-11-24 23:01:00', '1417263378', 'admin', 'locked', '2014-11-29 13:16:52', '600', '6'),
(7, '160389621', '717411436210207', 'a147173664162252B5993C', '3991417263417deB427411376349713b445270324cceEbD', '2014-11-24 23:01:07', '1417263417', 'admin', 'locked', '2014-11-29 13:17:30', '700', '7'),
(8, '251918494', '462364317119255', 'A613963121640478C5679d', '8811417263463cDD218413467612372a831634625BCaAAD', '2014-11-24 23:01:19', '1417263463', 'admin', 'locked', '2014-11-29 13:18:25', '800', '8'),
(9, '488278790', '483512160772455', 'd215472318060194C3947E', '2691417263508Ddc776591086213043E163105133BDCBbE', '2014-11-24 23:01:30', '1417263508', 'admin', 'locked', '2014-11-29 13:19:09', '900', '9');

-- --------------------------------------------------------

--
-- Table structure for table `academic_semester`
--

CREATE TABLE IF NOT EXISTS `academic_semester` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(20) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `isCurrent` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `academic_semester`
--

INSERT INTO `academic_semester` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`, `isCurrent`) VALUES
(1, '143885877', '719412627614639', 'D652717124296276D1202c', '4061417262796bbD216672416172190B560378564BeEBEa', '2014-11-24 22:58:24', '1417262796', 'admin', 'locked', '2014-11-29 13:07:17', 'first', '1<sup>st</', NULL),
(2, '611648369', '136218742975041', 'b186611222079437E6101d', '6171417262839BbC412261937584529E116783799DDceDA', '2014-11-24 22:58:32', '1417262839', 'admin', 'locked', '2014-11-29 13:07:54', 'second', '2<sup>nd</', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `academic_session`
--

CREATE TABLE IF NOT EXISTS `academic_session` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  `Acronym` varchar(50) DEFAULT NULL,
  `StartSession` date DEFAULT NULL,
  `EndSession` date DEFAULT NULL,
  `isCurrent` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  UNIQUE KEY `isCurrent` (`isCurrent`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `School` varchar(200) DEFAULT '2871417260626Cdd306277267491116b332347966bEbaEd',
  `SchoolFaculty` varchar(200) DEFAULT '6271417260782bcc581702717622495b670765264dBcdAA',
  `Program` varchar(200) DEFAULT NULL,
  `ProgramDegree` varchar(200) DEFAULT NULL,
  `ProgramType` varchar(200) DEFAULT NULL,
  `Department` varchar(200) DEFAULT NULL,
  `DateAdmitted` date DEFAULT NULL,
  `CurrentYear` varchar(200) DEFAULT NULL,
  `Duration` varchar(20) DEFAULT NULL,
  `Statement` varchar(60) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `School`, `SchoolFaculty`, `Program`, `ProgramDegree`, `ProgramType`, `Department`, `DateAdmitted`, `CurrentYear`, `Duration`, `Statement`, `Status`) VALUES
(1, '607964242', '880814480198158', 'd880048428181190c3554A', '2851418407927bec177514082418489d657413201edccbb', '2014-12-12 19:14:48', '1418408088', 'APP', NULL, '2014-12-12 20:00:48', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '5201417261942Add492372142694011a820983832FbCadc', '4201417262150Bed111716110025426C318528723EFACAc', '4651417262403adD824637142901655C574191068DeDeaA', '00494557Op1aNDXHhZFvl', '2014-12-12', '6931417263183AEB124680313115267d708120626ebddcb', '4', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Code` varchar(20) DEFAULT NULL,
  `Unit` varchar(20) DEFAULT NULL,
  `Level` varchar(200) DEFAULT NULL,
  `Semester` varchar(200) DEFAULT NULL,
  `Department` varchar(200) DEFAULT NULL,
  `School` varchar(200) DEFAULT '2871417260626Cdd306277267491116b332347966bEbaEd',
  `SchoolFaculty` varchar(200) DEFAULT '6271417260782bcc581702717622495b670765264dBcdAA',
  `Group` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=22 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`, `Code`, `Unit`, `Level`, `Semester`, `Department`, `School`, `SchoolFaculty`, `Group`) VALUES
(1, '382514298', '919427711868520', 'E574920791882911d5389B', '9351417982971ECC194798751541502d853888268adbeEa', '2014-12-07 21:09:31', '1417982971', 'APP', NULL, '2014-12-07 21:09:31', 'Microprocessor and Microcomputer', 'CPE', '378', '3', '8121417263270AdA091202435726174E514396037eeCCbe', '6171417262839BbC412261937584529E116783799DDceDA', '00494557Op1aNDXHhZFvl', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '8101417262528ade227865281424217C893648595EDeEaB'),
(2, '111467752', '373491018443339', 'c349215171940338B5898C', '6431417983043BAD510744383339421A853397968bcedAE', '2014-12-07 21:10:43', '1417983043', 'APP', NULL, '2014-12-12 19:29:52', 'High Level Programming', 'CPE', '322', '2', '8121417263270AdA091202435726174E514396037eeCCbe', '6171417262839BbC412261937584529E116783799DDceDA', '00494557Op1aNDXHhZFvl', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '8101417262528ade227865281424217C893648595EDeEaB'),
(3, '414134547', '207334181921659', 'D293115047131180a2289d', '9211417983320EAB021389731692784E196602693aeAdFa', '2014-12-07 21:15:20', '1417983320', 'APP', NULL, '2014-12-07 21:15:20', 'Thermal Power Engineering I', 'MEE', '551', '2', '7941417263341daB324717466063119c099781885aABbDe', '4061417262796bbD216672416172190B560378564BeEBEa', '00999359To3WezVZxjU0k', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '8101417262528ade227865281424217C893648595EDeEaB'),
(4, '232856371', '131479738976064', 'b447997913178131A3973F', '5951417983379aAe954018347713939C746821765bacaCd', '2014-12-07 21:16:19', '1417983379', 'APP', NULL, '2014-12-07 21:16:19', 'Engineering Mechanics I', 'MEE', '211', '2', '3341417263234DEd131344372635234D288831771eabcdd', '4061417262796bbD216672416172190B560378564BeEBEa', '00375093MjuDiXoKgQleO', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '6081417262601bcE101672840258186D958947157Cdaaed'),
(6, '628432083', '199347627138013', 'b642767321949771D4977E', '3031417993726acD123976171492697B392115277BAECCB', '2014-12-08 00:08:46', '1417993726', 'APP', NULL, '2014-12-08 00:08:46', 'Engineering Mathematics IV', 'EMA', '382', '4', '8121417263270AdA091202435726174E514396037eeCCbe', '6171417262839BbC412261937584529E116783799DDceDA', '00375093MjuDiXoKgQleO', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '6081417262601bcE101672840258186D958947157Cdaaed'),
(7, '3535', '3535', '35353', '6431417983043BAD510744383339421A853397968', '2014-12-08 01:29:18', '', 'APP', NULL, '2014-12-08 02:09:12', 'Computer Architecture and Organization I', 'CPE', '375', '3', '8121417263270AdA091202435726174E514396037eeCCbe', '6171417262839BbC412261937584529E116783799DDceDA', '00494557Op1aNDXHhZFvl', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '8101417262528ade227865281424217C893648595EDeEaB'),
(19, '115566720', '996179048114396', 'A989161325607294D5004C', '4801417999068cBb491180049636197b670815451acCbbe', '2014-12-08 01:37:48', '1417999068', 'APP', NULL, '2014-12-08 02:05:20', 'Assembly Language Programming', 'CPE', '457', '2', '8731417263307Dac341037125168874A734109977EFAFee', '6171417262839BbC412261937584529E116783799DDceDA', '00494557Op1aNDXHhZFvl', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '8101417262528ade227865281424217C893648595EDeEaB'),
(21, '221962996', '111550404882345', 'A025544051881141B3189A', '9701418400515bab001841051480557d621505422ECcDae', '2014-12-12 17:08:35', '1418400515', 'APP', NULL, '2014-12-12 17:08:35', 'Maths', 'EMA', '101', '3', '6931417263183AEB124680313115267d708120626ebddcb', '4061417262796bbD216672416172190B560378564BeEBEa', '00494557Op1aNDXHhZFvl', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', '8101417262528ade227865281424217C893648595EDeEaB');

-- --------------------------------------------------------

--
-- Table structure for table `course_group`
--

CREATE TABLE IF NOT EXISTS `course_group` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(60) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `School` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`),
  KEY `FK_course_group_school` (`School`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_group`
--

INSERT INTO `course_group` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`, `School`) VALUES
(1, '819589927', '684227151283715', 'd172856431241792D6445E', '8101417262528ade227865281424217C893648595EDeEaB', '2014-11-25 15:14:39', '1417262528', 'admin', 'locked', '2014-12-07 22:41:27', 'Core', 'C', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(2, '374654666', '126702416192941', 'A684122683101279b4513c', '6081417262601bcE101672840258186D958947157Cdaaed', '2014-11-25 15:14:52', '1417262601', 'admin', 'locked', '2014-12-07 22:41:30', 'Elective', 'E', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(3, '929680033', '291763146251880', 'E321902745262176B8194c', '1311417262639baA630180262819487B340251573aCedeE', '2014-11-25 15:14:58', '1417262639', 'admin', 'locked', '2014-12-07 22:41:34', 'Selective', 'S', '2871417260626Cdd306277267491116b332347966bEbaEd');

-- --------------------------------------------------------

--
-- Table structure for table `course_reg`
--

CREATE TABLE IF NOT EXISTS `course_reg` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Course` varchar(200) DEFAULT NULL,
  `Student` varchar(200) DEFAULT NULL,
  `Session` varchar(200) DEFAULT NULL,
  `Score` varchar(20) DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Faculty` varchar(200) DEFAULT '6271417260782bcc581702717622495b670765264dBcdAA',
  `School` varchar(200) DEFAULT '2871417260626Cdd306277267491116b332347966bEbaEd',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`, `Faculty`, `School`) VALUES
(1, '794919126', '113647121426859', 'b247078416131361a2301F', '8481417261431bbA311646641724111A008905242aaBdcc', '2014-11-24 23:04:59', '1417261431', 'admin', 'locked', '2014-12-07 11:33:01', 'Engineering Management', NULL, '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(2, '749221102', '564011142739104', 'e506117402224917C8155a', '6371417261504dbC656913544712310e169158688dcaCEe', '2014-11-24 23:05:26', '1417261504', 'admin', 'locked', '2014-12-07 11:33:14', 'Manufacturing', NULL, '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(3, '970529106', '174565123151768', 'c763616516142825B1629B', '4561417261553bBD457672127151430E991078506cEcBBD', '2014-11-24 23:05:54', '1417261553', 'admin', 'locked', '2014-12-07 11:32:50', 'Industrial', NULL, '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(4, '3456783', '349078907355', '587nn7c8535t', '00375093MjuDiXoKgQleO', '2014-12-07 21:01:45', NULL, NULL, NULL, '2014-12-07 23:51:31', 'General Course', 'BRC', '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(5, '32456767', '434787907934', '434350njcnuu45', '00360751kT4Yye8Ic0rdb', '2014-12-07 21:02:02', NULL, NULL, NULL, '2014-12-07 23:51:36', 'Structural Engineering', 'STE', '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(6, '435634', '24364647677', '438j90nm5466', '001856589H6zsl5EWSBhD', '2014-12-07 21:02:53', NULL, NULL, NULL, '2014-12-07 23:51:39', 'Production Engineering', 'PRE', '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(7, '345566666666666', '464646', '435900389289xs5', '00999359To3WezVZxjU0k', '2014-12-07 21:03:09', NULL, NULL, NULL, '2014-12-07 23:51:45', 'Mechanical Engineering', 'MEE', '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd'),
(8, '34535665', '5464664', '234mj8mxd8n83453', '00494557Op1aNDXHhZFvl', '2014-12-07 21:03:22', NULL, NULL, NULL, '2014-12-07 23:51:50', 'Computer Engineering', 'CPE', '6271417260782bcc581702717622495b670765264dBcdAA', '2871417260626Cdd306277267491116b332347966bEbaEd');

-- --------------------------------------------------------

--
-- Table structure for table `exam_course`
--

CREATE TABLE IF NOT EXISTS `exam_course` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  `Course` varchar(200) DEFAULT NULL,
  `Duration` varchar(20) DEFAULT NULL,
  `TotalMark` varchar(20) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE IF NOT EXISTS `exam_question` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Course` varchar(200) DEFAULT NULL,
  `Question` varchar(80) DEFAULT NULL,
  `OptionA` varchar(50) DEFAULT NULL,
  `OptionB` varchar(50) DEFAULT NULL,
  `OptionC` varchar(50) NOT NULL,
  `OptionD` varchar(50) DEFAULT NULL,
  `Answer` varchar(50) DEFAULT NULL,
  `Mark` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=12 ;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Course`, `Question`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `Answer`, `Mark`) VALUES
(1, '850547796', '381801141096833', 'A081144138010187d4377d', '6121418008131cAa048032551119138c271582547caeBCb', '2014-12-08 04:08:51', '1418008131', 'APP', NULL, '2014-12-08 04:09:37', '4801417999068cBb491180049636197b670815451acCbbe', 'What date is Christmas', 'Dec 25th', 'Jan 1st', 'Feb 29th', 'Feb 14th', 'OptionA', '25'),
(2, '563750394', '258184012378176', 'D422013122548857d9877c', '2231418032285aEc232181844805501a003251604DeaCeA', '2014-12-08 10:51:25', '1418032285', 'APP', NULL, '2014-12-08 10:51:25', '4801417999068cBb491180049636197b670815451acCbbe', 'One of the following is not a web browser', 'Safari', 'iOS', 'Chrome', 'Opere', 'OptionB', '25'),
(3, '353411389', '114428308057751', 'a457482310010183e5680E', '4021418032408Cea181332101841740C912595248EAaDDA', '2014-12-08 10:53:28', '1418032408', 'APP', NULL, '2014-12-08 10:53:28', '4801417999068cBb491180049636197b670815451acCbbe', 'Which of this is a type of Database', 'Orcale', 'SQL', 'MSAccess', 'Ubuntu', 'OptionC', '25'),
(4, '694528520', '521318464076376', 'b441178073625433b2298B', '8181418032546CcE811632494360504d353412154EDecEE', '2014-12-08 10:55:46', '1418032546', 'APP', NULL, '2014-12-08 10:55:46', '4801417999068cBb491180049636197b670815451acCbbe', 'HTML stands for', 'Hyper Text Markup Language', 'Hyper Text Makeup Language', 'Hyper Text Markup Login', 'High Transfer Machine Language', 'OptionA', '25'),
(6, '689403333', '075411845080972', 'F056411555708541F9582E', '4801418400575Cbb601451543007684B848873634dBbEDE', '2014-12-12 17:09:35', '1418400575', 'APP', NULL, '2014-12-12 17:09:35', '9701418400515bab001841051480557d621505422ECcDae', 'The sum of 2 numbers is 10', '5 and 1', '4 and 5', '6 and 5', '5 and 5', 'OptionD', '20'),
(8, '921978765', '456112814060505', 'D676809415116124d1907D', '6831418410256EdC363582449121081b791295036dAccaC', '2014-12-12 19:50:56', '1418410256', 'APP', NULL, '2014-12-12 19:50:56', '9701418400515bab001841051480557d621505422ECcDae', '7 minus 7', '9', '7', '1', '0', 'OptionD', '20'),
(9, '869548329', '481346110189188', 'a600418873411168e8729d', '9841418410361CCA086113236141465C656180246DBdAbB', '2014-12-12 19:52:41', '1418410361', 'APP', NULL, '2014-12-12 19:52:41', '9701418400515bab001841051480557d621505422ECcDae', 'If the sum of X and Y is 20, What is the value of X if Y is 10', '12', '8', '10', '100', 'OptionC', '20'),
(10, '916592373', '048341611474480', 'E047584613811436b5253C', '1471418410436ADa314998441506812a052924371CcBEdd', '2014-12-12 19:53:56', '1418410436', 'APP', NULL, '2014-12-12 19:53:56', '9701418400515bab001841051480557d621505422ECcDae', 'What is the L.C.M of 4', '1', '2', '5', '4', 'OptionB', '20'),
(11, '805826245', '405108114627668', 'C482916490013513c7855a', '6901418410506aed649104714855018e846865148CADeaa', '2014-12-12 19:55:06', '1418410506', 'APP', NULL, '2014-12-12 19:55:06', '9701418400515bab001841051480557d621505422ECcDae', '2 multiplied by 4', '6', '8', '4', '16', 'OptionB', '20');

-- --------------------------------------------------------

--
-- Table structure for table `exam_student`
--

CREATE TABLE IF NOT EXISTS `exam_student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Student` varchar(200) DEFAULT NULL,
  `ExamCourse` varchar(200) DEFAULT NULL,
  `Start` datetime DEFAULT CURRENT_TIMESTAMP,
  `End` datetime DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `ScoreCompute` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `School` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`),
  KEY `FK_faculty_school` (`School`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`, `School`) VALUES
(1, '748896889', '621247807171388', 'c472574872186018b8916A', '6271417260782bcc581702717622495b670765264dBcdAA', '2014-11-29 12:34:05', '1417260782', 'admin', 'locked', '2014-12-07 16:20:54', 'Engineering', 'ENGR', '2871417260626Cdd306277267491116b332347966bEbaEd');

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE IF NOT EXISTS `grading` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Letter` varchar(60) DEFAULT NULL,
  `Score` varchar(60) DEFAULT NULL,
  `Point` varchar(60) DEFAULT NULL,
  `School` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Letter`, `Score`, `Point`, `School`) VALUES
(1, NULL, NULL, NULL, NULL, '2014-12-09 20:48:17', NULL, NULL, 'okay', '2014-12-09 21:00:40', NULL, '44', '3', NULL),
(2, NULL, NULL, NULL, '34', '2014-12-09 20:48:39', NULL, NULL, 'okay', '2014-12-09 21:00:40', NULL, '45', '4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `OtherName` varchar(50) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `OriginLGA` varchar(100) DEFAULT NULL,
  `OriginState` varchar(100) DEFAULT NULL,
  `OriginCountry` varchar(100) DEFAULT NULL,
  `ContactAddress` varchar(100) DEFAULT NULL,
  `EmailAddress` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(100) DEFAULT NULL,
  `Passport` varchar(100) DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'ok',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `FirstName`, `LastName`, `OtherName`, `BirthDate`, `Sex`, `OriginLGA`, `OriginState`, `OriginCountry`, `ContactAddress`, `EmailAddress`, `PhoneNumber`, `Passport`, `Status`) VALUES
(1, '815650839', '448101042818629', 'c861242434010825F6018D', '1631418407927aca401714973288191b268417144dcbddb', '2014-12-12 19:14:02', '1418408042', 'APP', 'okay', '2014-12-12 20:01:09', 'Anthony', 'Isaac', 'O.', '1920-10-31', 'male', 'Ethiope-East', 'Delta', 'Nigeria', '9, Upper S&T,\r\nOff Uselu - Lagos Road,\r\nUselu Quaters,\r\nBenin City.', 'erku360@gmail.com', '09097996048', '1418408067604394030.jpg', 'active'),
(2, '333576645', '818448018177081', 'D458980121888418B3535e', '6461418408107bcb400018141814478b254776029ebaadd', '2014-12-12 19:16:28', '1418408188', 'APP', 'okay', '2014-12-12 20:01:11', 'Kelvin', 'Brian', '', '1981-12-14', 'male', 'Oredo', 'Edo', 'Nigeria', 'Brian Lane,\r\nG.R.A.', 'k.brian@yahoo.com', '08080000000', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`) VALUES
(1, '226841172', '271941126499467', 'D421732167194173d3794A', '5201417261942Add492372142694011a820983832FbCadc', '2014-11-24 22:54:25', '1417261942', 'admin', 'locked', '2014-11-30 10:58:31', 'under graduate'),
(2, '658483208', '174698811286084', 'C671441840918721E6823E', '6321417261988CEb827156741998181A297212048ACCdaF', '2014-11-24 22:54:58', '1417261988', 'admin', 'locked', '2014-11-30 10:58:33', 'post graduate');

-- --------------------------------------------------------

--
-- Table structure for table `program_degree`
--

CREATE TABLE IF NOT EXISTS `program_degree` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=5 ;

--
-- Dumping data for table `program_degree`
--

INSERT INTO `program_degree` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`) VALUES
(1, '866392815', '210215146721190', 'D712091674265191E8397B', '4201417262150Bed111716110025426C318528723EFACAc', '2014-11-24 22:56:08', '1417262150', 'admin', 'locked', '2014-11-29 12:59:23', NULL, 'BSc'),
(2, '738124713', '271213419616055', 'B327198192431611E3458d', '1041417262193DeC362975211223413B494378741bBaBbB', '2014-11-24 22:56:12', '1417262193', 'admin', 'locked', '2014-11-29 12:59:23', NULL, 'MENG'),
(3, '475680102', '227643128155465', 'B776382442241614A2380b', '7171417262238cdc124817326882208e574754087BCaAdC', '2014-11-24 22:56:47', '1417262238', 'admin', 'locked', '2014-11-29 12:59:23', NULL, 'MSc'),
(4, '521320717', '122768482178381', 'd888065122722174d5678e', '6651417262288DdC662481748226119d674707368bAdeeD', '2014-11-24 22:56:54', '1417262288', 'admin', 'locked', '2014-11-29 12:59:23', NULL, 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `program_type`
--

CREATE TABLE IF NOT EXISTS `program_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `program_type`
--

INSERT INTO `program_type` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`) VALUES
(1, '799355273', '246347211033475', 'd294677623914701d9056E', '4651417262403adD824637142901655C574191068DeDeaA', '2014-11-25 13:24:26', '1417262403', 'admin', 'locked', '2014-11-29 13:00:57', 'full time', 'FT'),
(2, '804302678', '471962621456442', 'd065421926176141e7851c', '6441417262469cec585116274249673A273331459aeACDb', '2014-11-25 13:24:39', '1417262469', 'admin', 'locked', '2014-11-29 13:01:52', 'part time', 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT NULL,
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(50) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Title`, `Acronym`) VALUES
(1, '503105356', '642617026153450', 'E246172216612001b8384C', '2871417260626Cdd306277267491116b332347966bEbaEd', '2014-11-29 12:31:44', '1417260626', 'admin', 'locked', '2014-11-29 12:31:51', 'University of Benin', 'UNIBEN');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `User` varchar(200) DEFAULT NULL,
  `School` varchar(200) DEFAULT '2871417260626Cdd306277267491116b332347966bEbaEd',
  `Faculty` varchar(200) DEFAULT '6271417260782bcc581702717622495b670765264dBcdAA',
  `Department` varchar(200) DEFAULT NULL,
  `StaffIsA` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `User`, `School`, `Faculty`, `Department`, `StaffIsA`) VALUES
(1, '121454701', '071488431866063', 'b814781480638315B4595b', '5461418407883DeB118181468704873B215792813aACEdA', '2014-12-12 19:11:23', '1418407883', 'APP', NULL, '2014-12-12 19:11:23', '5461418407883DeB118181468704873B215792813aACEdA', '2871417260626Cdd306277267491116b332347966bEbaEd', '6271417260782bcc581702717622495b670765264dBcdAA', 'general', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MatNo` varchar(60) DEFAULT NULL,
  `User` varchar(200) DEFAULT NULL,
  `Person` varchar(200) DEFAULT NULL,
  `Admission` varchar(200) DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'new',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `MatNo`, `User`, `Person`, `Admission`, `Status`) VALUES
(1, '409384199', '271819044710348', 'C444637804719126B1438A', '4411418407927BDc067298214174162C188024457cedCBd', '2014-12-12 19:12:07', '1418407927', 'APP', 'okay', '2014-12-12 20:01:26', '0101', '1501418408239DCa338249841361805d826336251dCDBba', '1631418407927aCa401714973288191B268417144dcBddB', '2851418407927bEc177514082418489D657413201EdCcBb', 'active'),
(2, '950085881', '801144718030720', 'b411808811074389a6403E', '4921418408107EEE310170188144138A889522084DEAdbD', '2014-12-12 19:15:07', '1418408107', 'APP', 'okay', '2014-12-12 20:01:29', '0202', '3801418408259beB800422144594811a460471363dcBBDe', '6461418408107Bcb400018141814478b254776029eBAADD', '9421418408107dCc417010808143241D556743725dABAbb', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Username` varchar(60) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `SecurityQuestion` varchar(100) DEFAULT NULL,
  `SecurityAnswer` varchar(100) DEFAULT NULL,
  `UserType` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Statement` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `PUID`, `SUID`, `TUID`, `BindID`, `EntryTime`, `EntryStamp`, `EntryAuthor`, `EntryIs`, `EntryUpdated`, `Username`, `Password`, `SecurityQuestion`, `SecurityAnswer`, `UserType`, `Status`, `Statement`) VALUES
(1, '121454701', '071488431866063', 'b814781480638315B4595b', '5461418407883DeB118181468704873B215792813aACEdA', '2014-12-12 19:11:23', '1418407883', 'APP', NULL, '2014-12-12 19:11:36', 'erku', 'erku', 'erku', 'erku', 'staff', 'active', NULL),
(2, '355462818', '149148283089566', 'D317581169528440B2801D', '1501418408239DCa338249841361805d826336251dCDBba', '2014-12-12 19:17:19', '1418408239', 'APP', 'okay', '2014-12-12 19:17:19', 'iamerku', 'erku', 'erku', 'erku', 'student', 'active', NULL),
(3, '515649206', '488295104189828', 'D510860847493281E8232E', '3801418408259beB800422144594811a460471363dcBBDe', '2014-12-12 19:17:39', '1418408259', 'APP', 'okay', '2014-12-12 19:17:39', 'iamcaix', 'caix', 'caix', 'xaix', 'student', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wyre`
--

CREATE TABLE IF NOT EXISTS `wyre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUID` varchar(20) DEFAULT NULL,
  `SUID` varchar(50) DEFAULT NULL,
  `TUID` varchar(100) DEFAULT NULL,
  `BindID` varchar(200) DEFAULT NULL,
  `EntryTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `EntryStamp` varchar(100) DEFAULT NULL,
  `EntryAuthor` varchar(100) DEFAULT 'APP',
  `EntryIs` tinytext,
  `EntryUpdated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BindTo` varchar(200) DEFAULT NULL,
  `Title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TUID` (`TUID`),
  UNIQUE KEY `SUID` (`SUID`),
  UNIQUE KEY `PUID` (`PUID`),
  KEY `BindID` (`BindID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_group`
--
ALTER TABLE `course_group`
  ADD CONSTRAINT `FK_course_group_school` FOREIGN KEY (`School`) REFERENCES `school` (`BindID`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `FK_faculty_school` FOREIGN KEY (`School`) REFERENCES `school` (`BindID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

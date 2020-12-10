-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2019 at 01:31 PM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medixapi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `auid` int(11) NOT NULL,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `address`, `location`, `status`, `update`, `entry`, `modified`) VALUES
(1, '93485', '2349834', '234567', '47 Hospital', '247Hos', 'hospital', 'sapele road', 'sapele road', 'available', NULL, '2018-12-12 13:29:54', '2018-12-12 13:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `auid` int(11) NOT NULL,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `resultis` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `department`, `price`, `resultis`, `status`, `update`, `entry`, `modified`) VALUES
(1, '74359038', '992495419', '782214161541676011', 'Packed Cell Valum', 'PCV', NULL, 'haematology', '800', 'OS', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
(2, '74359032', '992495319', '782214161541676052', 'Total White Blood Cell Count', 'WBC', NULL, 'haematology', '1200', 'FC', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
(3, '45359032', '882495319', '332214161541676052', 'Fasting Blood Glucose', 'FBG/S', NULL, 'chemical pathology', '1000', 'OS', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
(4, '45359415', '882495001', '332721161541676052', 'Fasting Serum Lipid Profile', 'FSLP', NULL, 'chemical pathology', '2500', 'OS', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
(5, '45359301', '882495002', '332721161541676053', 'Liver Function Test', 'LFT', NULL, 'chemical pathology', '2500', 'FC', 'available', NULL, '2018-11-08 12:39:19', '2018-12-08 13:18:22'),
(6, '74359081', '992477319', '142721161541676053', 'Malaria Parasite Test', 'MP', NULL, 'microbiology', '1000', 'OS', 'available', NULL, '2018-11-08 12:49:50', '2018-12-08 13:18:22'),
(7, '74371081', '192477319', '142724561541676053', 'Microscopy, Culture & Sensitivity', 'MCS', NULL, 'microbiology', '1500', 'FC', 'available', NULL, '2018-11-08 12:49:50', '2018-12-08 13:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `auid` int(11) NOT NULL,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `address`, `location`, `status`, `update`, `entry`, `modified`) VALUES
(1, '76868', '867997', '697997', '247 Medical Lab', '247MedLab', 'medlab', 'Sapele Roa', 'sapele road', 'available', NULL, '2018-12-12 12:45:05', '2018-12-12 13:26:14'),
(2, '34857', '34083845', '234568', 'Raytouch Lab', 'Raytouch', 'medlab', 'Dawson', 'dawson', 'available', NULL, '2018-12-12 13:26:06', '2018-12-12 13:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE `labtest` (
  `auid` int(11) NOT NULL,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `isapp` varchar(30) DEFAULT NULL,
  `isby` varchar(100) DEFAULT NULL COMMENT 'request was made by',
  `author` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `scientist` varchar(100) DEFAULT NULL,
  `investigation` varchar(100) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'new',
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`auid`, `puid`, `suid`, `bind`, `isapp`, `isby`, `author`, `user`, `scientist`, `investigation`, `location`, `period`, `comment`, `result`, `status`, `updated`, `entry`, `modified`) VALUES
(1, '45223593', '282709472', '7394897331544622901', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-12 14:55:02', '2018-12-12 14:55:02'),
(2, '71168104', '1427392693', '7082371741544624140', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332214161541676052', 'king sqaure', '2018-12-15 14:39:36', NULL, NULL, 'new', NULL, '2018-12-12 15:15:41', '2018-12-12 15:15:41'),
(3, '53415917', '1484819426', '12706731511544792205', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 07:56:45', '2018-12-14 07:56:45'),
(4, '28790242', '140666484', '746606261544799161', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 09:52:41', '2018-12-14 09:52:41'),
(5, '23979974', '1173674441', '11269659181544799801', 'labtest', 'paient', 'umiKt1544709765STBRI', 'umiKt1544709765STBRI', '', '332721161541676053', 'jjj', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-14 10:03:21', '2018-12-14 10:03:21'),
(6, '58921387', '665518317', '1096433221544800173', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:09:33', '2018-12-14 10:09:33'),
(7, '98858773', '1133681155', '19588209731544800173', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:09:33', '2018-12-14 10:09:33'),
(8, '37328556', '754610296', '15071394601544800174', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:09:34', '2018-12-14 10:09:34'),
(9, '33652848', '262974718', '7765020161544800206', 'labtest', 'patient', '5114620331544618375', '5114620331544618375', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:10:06', '2018-12-14 10:10:06'),
(10, '29826388', '1124055554', '21455220751544800452', 'labtest', 'patient', '21276844331544709765', '21276844331544709765', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:14:12', '2018-12-14 10:14:12'),
(11, '28877737', '1726806503', '13722053251544801525', 'labtest', 'patient', '21276844331544709765', '21276844331544709765', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:32:05', '2018-12-14 10:32:05'),
(12, '64775396', '1998624696', '399680371544801530', 'labtest', 'patient', '21276844331544709765', '21276844331544709765', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:32:10', '2018-12-14 10:32:10'),
(13, '67584723', '292808671', '6435564431544801653', 'labtest', 'patient', '21276844331544709765', '21276844331544709765', '', '332721161541676053', 'king sqaure', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-14 10:34:13', '2018-12-14 10:34:13'),
(14, '45991420', '1144261082', '16755378431544801867', 'labtest', 'paient', 'umiKt1544709765STBRI', 'umiKt1544709765STBRI', '', '332721161541676053', 'slase', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-14 10:37:47', '2018-12-14 10:37:47'),
(15, '64776249', '1791860234', '19648894371544802350', 'labtest', 'paient', 'umiKt1544709765STBRI', 'umiKt1544709765STBRI', '', '332214161541676052', 'airport', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-14 10:45:50', '2018-12-14 10:45:50'),
(16, '95732052', '1157262139', '4499441691544802641', 'labtest', 'paient', 'umiKt1544709765STBRI', 'umiKt1544709765STBRI', '', '332214161541676052', 'ddd', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-14 10:50:41', '2018-12-14 10:50:41'),
(17, '89047280', '1086809704', '17478234741544891963', 'labtest', 'paient', 'umiKt1544709765STBRI', 'umiKt1544709765STBRI', '', '782214161541676052', 'hyy', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 11:39:23', '2018-12-15 11:39:23'),
(18, '34760918', '2044061216', '15340297511544899999', 'labtest', 'paient', 'RwVhu15448999220aZ6f', 'RwVhu15448999220aZ6f', '', '782214161541676011', 'sapele', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 13:53:19', '2018-12-15 13:53:19'),
(19, '73895649', '374565631', '8771579981544900019', 'labtest', 'paient', 'RwVhu15448999220aZ6f', 'RwVhu15448999220aZ6f', '', '782214161541676011', 'ringroad', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 13:53:39', '2018-12-15 13:53:39'),
(20, '32355140', '1290248371', '2025469891544900248', 'labtest', 'paient', 'RwVhu15448999220aZ6f', 'RwVhu15448999220aZ6f', '', '782214161541676011', 'sapp', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 13:57:28', '2018-12-15 13:57:28'),
(21, '65932459', '322023194', '5020645771544900346', 'labtest', 'paient', 'RwVhu15448999220aZ6f', 'RwVhu15448999220aZ6f', '', '332214161541676052', 'dd', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 13:59:06', '2018-12-15 13:59:06'),
(22, '17919107', '108155413', '5795985261544900375', 'labtest', 'paient', 'RwVhu15448999220aZ6f', 'RwVhu15448999220aZ6f', '', '332721161541676052', 'gg', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 13:59:35', '2018-12-15 13:59:35'),
(23, '64237554', '326928366', '15762501181544900570', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '782214161541676011', 'uhhu', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 14:02:50', '2018-12-15 14:02:50'),
(24, '17700971', '435799507', '6569887121544900948', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '782214161541676011', 'jijiihui', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 14:09:08', '2018-12-15 14:09:08'),
(25, '37317020', '13981679', '5820424771544901103', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '782214161541676052', 'jji', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 14:11:43', '2018-12-15 14:11:43'),
(26, '91012315', '1923293255', '4301035131544901834', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '782214161541676052', 'jj', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 14:23:54', '2018-12-15 14:23:54'),
(27, '94804956', '1800083854', '1491079651544902557', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '782214161541676052', 'gghj', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 14:35:57', '2018-12-15 14:35:57'),
(28, '76327281', '199708438', '18227545821544902984', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '782214161541676011', 'nnssnn', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 14:43:04', '2018-12-15 14:43:04'),
(29, '72234984', '1767004293', '5074838611544903130', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '782214161541676052', 'google hq', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-15 14:45:30', '2018-12-15 14:45:30'),
(30, '10938064', '1888700964', '4198824331544945054', 'labtest', 'paient', '15320933761544944421', '15320933761544944421', '', '332214161541676052', 'ICE Hub', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 02:24:14', '2018-12-16 02:24:14'),
(31, '98455035', '851833857', '1387267241544947121', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '142724561541676053', 'ring road', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 02:58:41', '2018-12-16 02:58:41'),
(32, '16373456', '1198123188', '8283846331544947322', 'labtest', 'paient', '7833875981544899922', '7833875981544899922', '', '332721161541676052', 'ring road', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 03:02:02', '2018-12-16 03:02:02'),
(33, '59801825', '1444808943', '10264234771544947741', 'labtest', 'paient', '12173099441544947648', '12173099441544947648', '', '332214161541676052', 'ring road', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 03:09:01', '2018-12-16 03:09:01'),
(34, '22246631', '140590620', '20879090241544947801', 'labtest', 'paient', '12173099441544947648', '12173099441544947648', '', '332721161541676053', 'sapele', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 03:10:01', '2018-12-16 03:10:01'),
(35, '51157458', '879142930', '7657519161544948627', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '782214161541676011', 'ehej', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 03:23:47', '2018-12-16 03:23:47'),
(36, '43664942', '1036948213', '11615249261544948669', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '782214161541676011', 'hhh', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 03:24:29', '2018-12-16 03:24:29'),
(37, '42382684', '636998878', '18209796011544961717', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332214161541676052', 'sapele', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 07:01:57', '2018-12-16 07:01:57'),
(38, '17874933', '560548399', '4761054651544961771', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '142721161541676053', 'Ring road', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 07:02:51', '2018-12-16 07:02:51'),
(39, '24626628', '1783763545', '20570665301544961954', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332721161541676052', 'tt', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 07:05:54', '2018-12-16 07:05:54'),
(40, '16653827', '221100290', '12199734541544962100', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332214161541676052', 'ansn', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 07:08:20', '2018-12-16 07:08:20'),
(41, '67176864', '1555030595', '10954054881544962367', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332214161541676052', 'ring road', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 07:12:47', '2018-12-16 07:12:47'),
(42, '70851415', '2071081819', '16112092751544962494', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332214161541676052', 'zjgdiy', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 07:14:54', '2018-12-16 07:14:54'),
(43, '20060168', '272808574', '9188333841544964550', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332721161541676052', 'jssj', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 07:49:10', '2018-12-16 07:49:10'),
(44, '89658685', '916637080', '12948237811544965442', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332721161541676052', 'gy', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 08:04:02', '2018-12-16 08:04:02'),
(45, '95335786', '659605909', '9927891341544965679', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332721161541676052', 'uuu', '0000-00-00 00:00:00', NULL, NULL, 'new', NULL, '2018-12-16 08:07:59', '2018-12-16 08:07:59'),
(46, '40532046', '1970979438', '9129044001544965777', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332721161541676052', 'ttt', '2018-12-29 14:09:00', NULL, NULL, 'new', NULL, '2018-12-16 08:09:37', '2018-12-16 08:09:37'),
(47, '31851289', '1064348571', '1686671871544965831', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '142724561541676053', 'ggy', '2018-12-16 14:10:00', NULL, NULL, 'new', NULL, '2018-12-16 08:10:31', '2018-12-16 08:10:31'),
(48, '67623743', '662985961', '1575598521544966260', 'labtest', 'paient', '17527738021544947941', '17527738021544947941', '', '332721161541676053', 'ggu', '2018-12-16 14:17:00', NULL, NULL, 'new', NULL, '2018-12-16 08:17:40', '2018-12-16 08:17:40'),
(49, '42775894', '135735246', '10317431091544971654', 'labtest', 'paient', '15320933761544944421', '15320933761544944421', '', '782214161541676011', 'New Benin', '2018-12-13 03:47:00', NULL, NULL, 'new', NULL, '2018-12-16 09:47:34', '2018-12-16 09:47:34'),
(50, '44853718', '865236722', '7050995311544972653', 'labtest', 'paient', '10991720181544971863', '10991720181544971863', '', '332721161541676053', 'Cambridge', '2018-12-16 04:04:00', NULL, NULL, 'new', NULL, '2018-12-16 10:04:13', '2018-12-16 10:04:13'),
(51, '24128015', '1527029543', '19508125121544973038', 'labtest', 'paient', '10991720181544971863', '10991720181544971863', '', '332721161541676052', 'Cambridge', '2018-12-04 23:10:00', NULL, NULL, 'new', NULL, '2018-12-16 10:10:38', '2018-12-16 10:10:38'),
(52, '60443988', '1674260390', '11992698781545039445', 'labtest', 'paient', '9288170731545039316', '9288170731545039316', '', '332214161541676052', 'new benin', '2018-12-17 10:37:00', NULL, NULL, 'new', NULL, '2018-12-17 04:37:25', '2018-12-17 04:37:25'),
(53, '27958342', '2125478983', '20889635801545039528', 'labtest', 'paient', '9288170731545039316', '9288170731545039316', '', '332214161541676052', 'ugbowo', '2018-12-17 10:38:00', NULL, NULL, 'new', NULL, '2018-12-17 04:38:48', '2018-12-17 04:38:48'),
(54, '82244387', '168785760', '12627438651545062242', 'labtest', 'paient', '20012617971544876427', '20012617971544876427', '', '782214161541676011', 'Innovation Hub', '2018-12-18 08:00:00', NULL, NULL, 'new', NULL, '2018-12-17 10:57:22', '2018-12-17 10:57:22'),
(55, '43418850', '977801141', '2001922651545151106', 'labtest', 'paient', '3292959891545144457', '3292959891545144457', '', '332214161541676052', 'sjjsj', '2018-12-18 17:38:00', NULL, NULL, 'new', NULL, '2018-12-18 11:38:26', '2018-12-18 11:38:26'),
(56, '57505008', '482943738', '5387463491545151135', 'labtest', 'paient', '3292959891545144457', '3292959891545144457', '', '332721161541676053', 'znmz', '2018-12-18 17:38:00', NULL, NULL, 'new', NULL, '2018-12-18 11:38:55', '2018-12-18 11:38:55'),
(57, '57923222', '1426258949', '19182068161545172850', 'labtest', 'paient', '10991720181544971863', '10991720181544971863', '', '782214161541676052', 'Lucky way', '2018-12-18 17:40:00', NULL, NULL, 'new', NULL, '2018-12-18 17:40:50', '2018-12-18 17:40:50'),
(58, '81867033', '617137314', '11797551281545214569', 'labtest', 'paient', '18340753391545214468', '18340753391545214468', '', '782214161541676011', 'ring road', '2018-12-19 11:15:00', NULL, NULL, 'new', NULL, '2018-12-19 05:16:09', '2018-12-19 05:16:09'),
(59, '68937350', '239023789', '13422248181545214595', 'labtest', 'paient', '18340753391545214468', '18340753391545214468', '', '332721161541676052', 'ghhj', '2018-12-19 11:16:00', NULL, NULL, 'new', NULL, '2018-12-19 05:16:35', '2018-12-19 05:16:35'),
(60, '67079107', '513449073', '15174712041545214604', 'labtest', 'paient', '18340753391545214468', '18340753391545214468', '', '332721161541676052', 'ghji', '2018-12-19 11:16:00', NULL, NULL, 'new', NULL, '2018-12-19 05:16:44', '2018-12-19 05:16:44'),
(61, '76041585', '1800045037', '1429336571545219927', 'labtest', 'paient', '20515626601545219714', '20515626601545219714', '', '782214161541676052', 'Benin City', '2018-12-15 15:45:00', NULL, NULL, 'new', NULL, '2018-12-19 06:45:27', '2018-12-19 06:45:27'),
(62, '16595906', '2085873447', '8481299051545393037', 'medic', 'patient', '5114620331544618375', '5114620331544618375', '', '142721161541676053', 'ikeja', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-21 06:50:37', '2018-12-21 06:50:37'),
(63, '70471472', '1755312036', '17999075361545398891', 'medic', 'patient', '5114620331544618375', '5114620331544618375', '', '142724561541676053', 'ikeja', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-21 08:28:11', '2018-12-21 08:28:11'),
(64, '49697255', '873612203', '2300174351545398898', 'medic', 'patient', '5114620331544618375', '5114620331544618375', '', '142724561541676053', 'ikeja', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2018-12-21 08:28:18', '2018-12-21 08:28:18'),
(65, '98045622', '1328295268', '9107180961545724942', 'medic', 'patient', '3057349371545214923', '3057349371545214923', '', '332214161541676052', 'Abuja', '2018-12-25 20:20:20', NULL, NULL, 'new', NULL, '2018-12-25 03:02:22', '2018-12-25 03:02:22'),
(66, '77832971', '385664464', '18193129841545725288', 'medic', 'patient', '3057349371545214923', '3057349371545214923', '', '782214161541676052', 'Abuja', '2018-12-27 00:00:00', NULL, NULL, 'new', NULL, '2018-12-25 03:08:08', '2018-12-25 03:08:08'),
(67, '90681392', '1584403222', '9990424161545726031', 'medic', 'patient', '3057349371545214923', '3057349371545214923', '', '332721161541676052', 'Abuja', '2018-12-29 20:10:20', NULL, NULL, 'new', NULL, '2018-12-25 03:20:31', '2018-12-25 03:20:31'),
(68, '24215623', '762801088', '19039897771545736810', 'medic', 'patient', '3057349371545214923', '3057349371545214923', '', '142724561541676053', 'Benin', '2018-12-28 19:30:00', NULL, NULL, 'new', NULL, '2018-12-25 06:20:10', '2018-12-25 06:20:10'),
(69, '15820550', '861780991', '5187898611545737775', 'medic', 'doctor', '20491334071545737663', '20491334071545737663', '', '782214161541676052', 'Sapele Road ', '2018-12-26 12:36:00', NULL, NULL, 'new', NULL, '2018-12-25 06:36:15', '2018-12-25 06:36:15'),
(70, '93862179', '673905969', '16910253761545744229', 'medic', 'doctor', '6190624021545206797', '6190624021545206797', '', '142721161541676053', 'Ago Lagos', '2018-12-25 16:30:00', NULL, NULL, 'new', NULL, '2018-12-25 08:23:49', '2018-12-25 08:23:49'),
(71, '52575228', '224535478', '7491178441545745426', 'medic', 'doctor', '6190624021545206797', '6190624021545206797', '', '332721161541676052', 'Lagos', '2018-12-27 05:43:00', NULL, NULL, 'new', NULL, '2018-12-25 08:43:46', '2018-12-25 08:43:46'),
(72, '56282950', '88700643', '15091869281545746214', 'medic', 'doctor', '20491334071545737663', '20491334071545737663', '', '332721161541676052', 'Benin', '2018-12-26 15:56:00', NULL, NULL, 'new', NULL, '2018-12-25 08:56:54', '2018-12-25 08:56:54'),
(73, '39856115', '2009554380', '15059081571549825835', 'medic', 'patient', '8439998721549825756', '8439998721549825756', NULL, '782214161541676052', 'Airport Road, Benin City', '2019-02-11 20:10:00', NULL, NULL, 'new', NULL, '2019-02-10 14:10:35', '2019-02-10 14:10:35'),
(74, '71128513', '1382766654', '883986941549834673', 'medic', 'patient', '5114620331544618375', '5114620331544618375', NULL, '332721161541676053', 'ikeja', '2018-12-14 13:39:36', NULL, NULL, 'new', NULL, '2019-02-10 16:37:53', '2019-02-10 16:37:53'),
(75, '98081794', '1162468526', '5003319881549837635', 'labtest', 'paient', '7102037161549837575', '7102037161549837575', NULL, '782214161541676052', 'jssjj', '2019-02-10 23:26:00', NULL, NULL, 'new', NULL, '2019-02-10 17:27:15', '2019-02-10 17:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `auid` int(11) NOT NULL,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(30) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'available',
  `update` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`auid`, `puid`, `suid`, `bind`, `title`, `acronym`, `type`, `address`, `location`, `status`, `update`, `entry`, `modified`) VALUES
(1, '329438', '234508', '23480', '247 Pharmacy', '247Pham', 'pharmacy', 'sapele road', 'sapele road', 'available', NULL, '2018-12-12 13:28:21', '2018-12-12 13:28:21'),
(2, '19389', '83480', '830843', 'Coka Pharmacy', 'Coka', 'pharmacy', 'adesuwa', 'adesuwa', 'available', NULL, '2018-12-12 13:28:50', '2018-12-12 13:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `auid` int(11) NOT NULL,
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
  `type` varchar(50) DEFAULT NULL,
  `practice` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'active',
  `photo` varchar(100) DEFAULT NULL,
  `lastseen` varchar(100) DEFAULT NULL,
  `isonline` varchar(10) DEFAULT NULL,
  `regvia` varchar(50) DEFAULT NULL,
  `firebasekey` varchar(200) DEFAULT NULL,
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`auid`, `puid`, `suid`, `bind`, `username`, `email`, `phone`, `password`, `pin`, `firstname`, `surname`, `othername`, `birthday`, `sex`, `location`, `address`, `type`, `practice`, `status`, `photo`, `lastseen`, `isonline`, `regvia`, `firebasekey`, `updated`, `entry`, `modified`) VALUES
(1, '50029926', '30786088', '5114620331544618375', 'QnyRp15446183729fTZO', 'rav@labtest.com', '09097886032', 'Truce', NULL, 'Rave', 'Lexiton', NULL, '1981-04-19', 'female', 'Ikpokpan', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-12 13:39:36', '2019-01-10 08:51:41'),
(2, '44279811', '1367423453', '15440086831544682765', 'W1P731544682765cGrhl', 'odao.ai@gmail.com', '+2349026636728', 'denmark', NULL, 'Anthony', 'Osawere', NULL, '1995-12-29', 'Male', 'Sapele Road', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-13 01:32:45', '2018-12-13 01:37:16'),
(3, '16756017', '1077088212', '1880295151544693104', '54Gyc1544693104YUdRj', 'proscarco@gmail.com', '+10888118633277', 'vvvvvvvv', NULL, 'jsjsjsjk', 'mskskzk', NULL, '2018-12-13', 'Female', 'hsjsjjs', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-13 04:25:04', '2018-12-13 04:25:41'),
(4, '58746110', '1169812545', '21276844331544709765', 'umiKt1544709765STBRI', 'victonnr_agbenro@yahoo.com', '+10811863327749494', 'snsjjsks', NULL, 'sjnsmzms', 'jsjsjs', NULL, '2018-12-17', 'Female', 'nsmsksk', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-13 09:02:45', '2018-12-13 09:03:07'),
(5, '65398443', '222339862', '13075807591544868123', 'IHgXL15448681238jOp5', 'osakuejohn@yahoo.com', '08060362070', 'gen.5 10', NULL, 'John', 'Osakue', NULL, '1981-08-31', 'male', 'Benin', NULL, 'doctor', 'General Practice', 'active', NULL, NULL, NULL, 'medic', 'dVoosGJQEk8:APA91bGfThDEzZ-G-0NSNWIDdVqV1EKZu8NBgTQfVvK9WfYn27SvB2Mr7rUyVHoojBdjHv8jfEG6moiqa-ljC0wfn-7kMVG_SnMnSHjhsO5oOgRPVs_-0VoQrslptHAoCXda31raIzxn', 'yeah', '2018-12-15 05:02:03', '2018-12-25 12:48:49'),
(6, '51253827', '1104718393', '7626355191544868801', 'Ohi1q1544868801v3tdA', 'lanre.ogedengbe@outlook.com', ' 2347035332971', 'musician', NULL, 'Lanre', 'Ogedengbe ', NULL, '1985-04-12', 'male', 'Benin City', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'medic', 'cuSmrbezSaE:APA91bGN_KeCrDRA3h2Dk2Z-ha2szhmP-R9bPLhyfz4D9AxKCNg5zuD_f36LvaWZQhadz0dehCFtxQyCDhkpbcCsFDuaKoySPpgjOrLFkekdQy5i9q-BhlJG33W6tgaHFf1S0pLvcbS2', 'yeah', '2018-12-15 05:13:21', '2018-12-15 05:14:17'),
(7, '90241444', '474868723', '20012617971544876427', 'HbUt51544876427pojig', 'osawaru.eloghosa@gmail.com', '08022894103', 'thank2289', NULL, 'Stephen', 'Osawaru', NULL, '1983-09-23', 'male', 'benin', NULL, 'doctor', 'Neurology', 'active', NULL, NULL, NULL, 'medic', 'fWbrECp9T1E:APA91bFTOLS4GG-9KSnKXiHeGEC980XCXomm8wpGt6LYGrx2he-nUOzHr55wTBEz66RDywrYH8852-biL7oozQlz4hJxu81FcaGxMWT8YCGBPcF2GNWrbLEwUsQ4jYOW1H-KYJ2Ve8O1', 'yeah', '2018-12-15 07:20:27', '2019-02-12 08:44:37'),
(8, '94256273', '1579012746', '7833875981544899922', 'RwVhu15448999220aZ6f', 'segun@gmail.com', '+2348118633277', 'victor2018', NULL, 'victor', 'segun', NULL, '2018-12-15', 'Male', 'sepele', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-15 13:52:02', '2018-12-15 13:52:56'),
(9, '20498521', '1851500397', '15320933761544944421', 'QUDJ21544944421Pl6cd', 'anthony@osawere.com', '+109026636721', 'reckard', NULL, 'Romeo', 'Abacus', NULL, '2018-12-02', 'Male', 'Lagos', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-16 02:13:41', '2018-12-16 02:22:08'),
(10, '16159458', '1703994442', '12173099441544947648', 'wc1dF1544947648nraho', 'segun1@gmail.com', '+1081186332777', '12345678', NULL, 'cyiboy', 'segun', NULL, '2018-12-16', 'Male', 'ring road', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-16 03:07:28', '2018-12-16 03:08:40'),
(11, '34533155', '986645329', '17527738021544947941', 'g3wzT15449479414U9pG', 'poscarco@gmail.com', '+1081863327777', 'nsnsns', NULL, 'snjsjs', 'nsnznnd', NULL, '2018-12-16', 'Male', 'msmsms', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-16 03:12:21', '2018-12-16 03:23:22'),
(12, '84383337', '1916742510', '10991720181544971863', 'SGym715449718632cM6C', 'brux@brux.com', '+2349026655371', 'crowell', NULL, 'Simon', 'Crowell', NULL, '2018-12-01', 'Female', 'London', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', 'et3bsUycQ2E:APA91bFz2TzfyqFd06OCn15u_SFoeKUJegpV2cLuoQxWAIrdiOR8Nw6AElB1Bmvl_IY1mMQShViheSHEWjWnm8YLH9R14DAVSgTSEwDSDcYrxqqzzxDsS_PPBVg4Hf1khcWcfp7ce8mp', 'yeah', '2018-12-16 09:51:03', '2018-12-16 10:14:01'),
(13, '84517882', '793271696', '16304235621544981522', 'uKOne1544981522lmtRb', 'afroscientist@gmail.com', '08032604456', 'jupiter007', NULL, 'Ehijie ', 'Iyamah ', NULL, '2018-12-20', 'male', 'Benin', NULL, 'doctor', 'Pediatrics', 'active', NULL, NULL, NULL, 'medic', 'dH32i7pwXuo:APA91bHsCh4YBu8Ky7_45tEzUeCwf_D5hXbx89zgJcxa5UHmBR9pXrl9CKayeM1H_RfGoqVxmmEikMZDV-kaLNmbu_UITQ-4x2bn-yHBtLGpfenaoyR-4TsaFZjyubuDa99DrWsEB0yU', 'yeah', '2018-12-16 12:32:02', '2018-12-25 13:49:28'),
(14, '31313063', '358190712', '995989951545038592', 'SGT5N1545038592Dk9VI', 'kelvanonudo4@yahoo.com', '+109090337542', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-17 04:23:12', '2018-12-17 04:23:12'),
(15, '55393620', '581840465', '9288170731545039316', 'lkHNL1545039316oEt8i', 'kelvanonud4@yahoo.com', '+1089057689979798', 'kelv', NULL, 'Kelvin', 'Clesanc', NULL, '2018-12-17', 'Male', 'slope', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-17 04:35:16', '2018-12-17 04:36:58'),
(16, '63539850', '996702993', '16015847431545058977', '6E9Uy154505897778dAe', 'iredomaxg@gmail.com', '+2347068211516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-17 10:02:57', '2018-12-17 10:02:57'),
(17, '95607015', '787652143', '3292959891545144457', 'mfCtl1545144457RTx2Q', 'vahhgbenro@gmail.com', '+108118633277', 'nsnsn', NULL, 'cyiboy', 'hwjwwj', NULL, '2018-12-18', 'Female', 'snsnns', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-18 09:47:37', '2018-12-18 09:49:48'),
(18, '98520537', '813120687', '20219263381545151644', '7z0SG1545151644OWuEr', 'segunn@gmail.com', '+108118533277', 'qwerty12', NULL, 'firstname', 'suremane', NULL, '2018-12-18', 'Male', 'sepele', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-18 11:47:24', '2018-12-18 11:48:11'),
(19, '12759640', '24612931', '2265303991545152999', '2DZ911545152999XkUJG', 'prscarco@gmail.com', '+10811863327', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-18 12:09:59', '2018-12-18 12:09:59'),
(20, '71394713', '924418668', '19233604681545153448', 'VtcrD1545153448R2QH4', 'vabenro@gmail.com', '+18118633277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-18 12:17:28', '2018-12-18 12:17:28'),
(21, '55283097', '1364970785', '15633186921545160221', 'tM0RF1545160221l3UC2', 'proscaro@gmail.com', '+10811863277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-18 14:10:21', '2018-12-18 14:10:21'),
(22, '17981989', '1924709685', '6190624021545206797', 'CiOLa1545206797P2Hvy', 'johndoe@email.com', '08011111111', 'userpass', NULL, 'Doe', 'John', 'Thomas', '2018-12-12', 'female', 'Lagos', NULL, 'doctor', 'General Practice', 'active', NULL, '{.sv=timestamp}', 'no', 'medic', 'dgY9xwS70NQ:APA91bG6dyhM0-JGT5zEJ28Pcl9M8v47p5nMVM8CKM9huZGQvMZi0giNxtJGOrtkSGN-AFiEe9nuddZyfNN7fyngnKBBDDeNkSzFN4CsxuSEp1qODe4er8rj9VI3tux_5yS7bBtHXmUS', 'yeah', '2018-12-19 03:06:37', '2018-12-25 06:27:01'),
(23, '98240440', '999916013', '10549105121545214444', 'iExus1545214444MrFyO', 'vagbero@gmail.com', '108118633277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-19 05:14:04', '2018-12-19 05:14:04'),
(24, '60289199', '499820864', '16365098061545214458', '01CXL1545214458EGYre', 'vagbeo@gmail.com', '10811863327', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-19 05:14:18', '2018-12-19 05:14:18'),
(25, '11793782', '1189007588', '18340753391545214468', 'hX2af1545214468dvAIg', 'vagbeo@gmil.com', '1081186332', '111111111', NULL, 'victoe', 'agbeneo', NULL, '2018-12-19', 'Female', 'ring road', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-19 05:14:28', '2018-12-19 05:15:22'),
(26, '54295469', '1354388555', '3057349371545214923', 'ohqw31545214923vSLgC', 'mikemudock@gmail.com', '08022222222', 'userpass', NULL, 'Mike', 'Murdock', 'Boseman', '2018-12-22', 'male', 'Abuja', NULL, 'patient', NULL, 'active', NULL, '{.sv=timestamp}', 'yes', 'medic', 'edwcB_0KT7E:APA91bFKnj1GvS3OUEqGQRwSPzL8Mr8fwsMJXWZ2fn1OUN9my6XFcvDibEqM5vlvJPoBLcQhcPmCnC5JOrwm45cxjeBvMPKm16SNkf2wkXjaekI-YqJ5pO692GSJ1XvgNcvqORmV8KNP', 'yeah', '2018-12-19 05:22:03', '2019-01-22 04:25:46'),
(27, '29527566', '433107595', '6180732461545219248', 'wR7fF1545219248oNdKH', 'ese@ese.com', '09096844', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-19 06:34:08', '2018-12-19 06:34:08'),
(28, '52061371', '1813882957', '19581190971545219434', 'b2XGm1545219434BHasJ', 'esa@ese.com', '09096842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2018-12-19 06:37:14', '2018-12-19 06:37:14'),
(29, '18963050', '1526408230', '20515626601545219714', '5O3N41545219714G1kpI', 'rexo@mo.com', '999764658', 'welcome', NULL, 'Camilia', 'Rose', NULL, '2018-12-03', 'Female', 'Ring road', NULL, 'Dispatch', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-19 06:41:54', '2018-12-19 06:43:47'),
(30, '81859673', '457318066', '6841987491545327024', 'bMLAq1545327024Fx8ap', 'jsjsj@gmail.com', '08088866', 'nznsm', NULL, 'cyiboy', 'nszmm', NULL, '2018-12-20', 'Female', 'nsmsms', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-20 12:30:24', '2018-12-20 12:31:25'),
(31, '78711862', '496359091', '16849385821545545021', 'VRxHt1545545021lk9uO', 'poscaro@gmail.com', '818633277', 'ojeyvictory', NULL, 'victoey', 'ojey', NULL, '1967-12-23', 'Male', 'ring road', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-23 01:03:41', '2018-12-23 01:04:35'),
(32, '38019804', '909531985', '17933729811545546658', 'JEYaW1545546658bICpM', 'swg@gmail.com', '0811166338', 'egosa2018', NULL, 'edosa', 'swgun', NULL, '2018-12-15', 'Female', 'ring road', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2018-12-23 01:30:58', '2018-12-23 01:32:40'),
(33, '97077311', '881326050', '20491334071545737663', 'nwXbV1545737663RtU8j', 'doctor@osawere.com', '09026636728', 'doctor', NULL, 'Tony', 'Doctor', NULL, '2018-12-25', 'male', 'Benin', NULL, 'doctor', NULL, 'active', NULL, NULL, NULL, 'medic', 'eRn_wPVQN9g:APA91bE0NqQt-_10OelEBHnr8LQ0eTtJe2fuaxuwlXhXZBVd0-KDxz-x00Oh4ADqlopbLrqjDAwnObITfM4Dc-t-2Wf5j3ebw6aHjditHQopg_HpVW-eytD3GiE2cKdSUwE_ZBLNLo97', 'yeah', '2018-12-25 06:34:23', '2018-12-25 06:34:26'),
(34, '77633570', '1723754091', '18741988101545744240', '2SGLg1545744240xrEfU', 'patient@osawere.com', '09036636728', 'patient', NULL, 'Tony', 'Patient ', NULL, '2018-12-26', 'male', 'Ekpoma', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'medic', 'eIfud24CKjE:APA91bE2zHIqx7DE72xm84ypZGzn5jFbcLPBOoRf2hMnWDDpfS15NGhvv2tMZ6C4urdfM-Jq8axuGuu6G4qMPCynq6Vl7-VLO31cY0mbDzYk5sGMLnR2nynIAQpimdUqGIPkeZROw-xw', 'yeah', '2018-12-25 08:24:00', '2018-12-25 08:24:03'),
(35, '46556436', '293596665', '6520277131545762173', 'Bifbu1545762173nJ581', 'a.osueni@gmail.com', ' 15163095357', 'Gastro1@1', NULL, 'azeberoje ', 'Osueni ', NULL, '1984-05-12', 'male', 'Brooklyn ', NULL, 'doctor', NULL, 'active', NULL, NULL, NULL, 'medic', 'fu-PVqKkZqE:APA91bEDcuY9N_2F8AG-gJU2wi8X5nEyY3H0rF5ZonMl-oNdXwJWav7xLWukUE0Pb-05AuuXxgIiflC8iJ8a54WU9AIZiFT1DqOjPVdYoDPeT0DtAdHHYoVNZ1RmFxoYudvjTJAnM9_7', 'yeah', '2018-12-25 13:22:53', '2018-12-25 13:22:56'),
(36, '59585492', '1704474706', '5293525501545891467', 'RyaA21545891467Xjwn5', 'preciousodiahi@gmail.com', '08033925290', 'odiahi1576', NULL, 'Precious', 'Odiahi', NULL, '1982-09-14', 'female', 'benin', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'medic', 'fenNOVIS03Q:APA91bEFsvUX4TulPZ5v36XcuhDRI_oTHmpiSmI2KvpPDn6Yn0k8oy-r6t5qQUNSX0x0kUqzOGQqCKvM28lIlf7jPrsGuiKlxhDz4G7MT-EMcb9zU6ImeffMUdVIbFlGPkOH7oZUZy4m', 'yeah', '2018-12-27 01:17:47', '2018-12-27 01:17:55'),
(37, '70197540', '1256010606', '9919395831546015728', 'VUdSF1546015728iWGPs', 'amazinhart@yahoo.com', '08036876416', 'tonia2018', NULL, 'Tonia', 'Tilije', NULL, '2018-12-11', 'female', 'Portharcourt ', NULL, 'doctor', NULL, 'active', NULL, NULL, NULL, 'medic', 'cvRpBa6SQCg:APA91bGfAcVNsYH3b88eoxsWzvZqaPnaHygkPaXIJAwJAlYcot1MhmDG1ObPTxTuLeQYfBT2ls-uI09iJAYSCXQgTc9RxHA-xARnO5X-RtLW3x5Kn2zgQunLXtphpo1RdEyzJY5v0hbi', 'yeah', '2018-12-28 11:48:48', '2018-12-28 11:52:21'),
(38, '21384676', '2121990312', '6549033091546092955', 'AdKke1546092955TZSV9', 'oghenewaire.olowu@uniben.edu', '08037763658', 'treasure@9616', NULL, 'owin', 'olowu', NULL, '1978-05-11', 'male', 'Benin City', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'medic', 'fkE8LbDeu8s:APA91bHKf20nFcrG5qPSHPRKf94pMHDOC2Aet0YYpVRCs5Sp2TkjBigmzG97yN5C9fzkmCq4U8X--SoTaJnVt3Uz17m3YKG-_SpXgmh-NW228ljN6KMjCbac1oVL0On2yhPJgpwZQMUu', 'yeah', '2018-12-29 09:15:55', '2018-12-29 09:16:09'),
(39, '73418889', '544394136', '8751370031547050099', '1TDnb1547050099FL5lZ', 'victr_agbenro@hoo.com', '0811863327557', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2019-01-09 11:08:19', '2019-01-09 11:08:19'),
(40, '30547577', '242383549', '9365331481547050566', 'uwAvO1547050566KzqPR', 'rav@labtest.netm', '08066641902', 'Truce', NULL, 'Rav', 'Lexiton', NULL, '1981-04-19', 'female', 'Ikpokpan', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-09 11:16:06', '2019-01-09 13:41:20'),
(41, '88314978', '525210631', '13303299211547060087', 'gnt061547060087DeQf2', 'vv@gmail.com', '08118633255', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2019-01-09 13:54:47', '2019-01-09 13:54:47'),
(42, '22417137', '59272668', '11142480261547060428', 'eytMH1547060428B9n3z', 'voaa@gmail.com', '108186332', NULL, NULL, 'cyiboy', 'ugxigxg', NULL, '2019-01-10', 'male', 'hchcoch', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-09 14:00:28', '2019-01-10 04:16:35'),
(43, '24821344', '329102337', '19802234051547112075', 'UTZJ21547112075PWHl6', 'dav@labtest.netm', '0987654321', 'Truce', NULL, 'Rav', 'Lexiton', NULL, '1981-04-19', 'female', 'Ikpokpan', NULL, 'scientist', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 04:21:15', '2019-01-10 04:23:42'),
(44, '65655536', '1551053814', '16164412371547112244', 'M1Uuq1547112244QT64f', 'dv@labtest.netm', '987654321', 'Truce', NULL, 'Rav', 'Lexiton', NULL, '1981-04-19', 'female', 'Ikpokpan', NULL, 'scientist', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 04:24:04', '2019-01-10 04:25:16'),
(45, '72500486', '367529160', '4456850531547113553', '3o2HZ1547113553GTzit', 'vvs@gmail.com', '+108118633', NULL, NULL, 'nsmaj', 'nsnwn', NULL, '2019-01-10', 'male', 'snsj', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 04:45:53', '2019-01-10 04:46:20'),
(46, '59447608', '1240392921', '8305994181547114485', '6q31X1547114485jvYlc', 'fhhf@gmail.com', '0885522', NULL, NULL, 'fhlfhkclh', 'kgsgjsksykys', NULL, '2019-01-10', 'female', 'Hocus-Pocus lhc', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 05:01:25', '2019-01-10 05:02:25'),
(47, '67569811', '1621137062', '12128507701547114976', 'Z3YOL1547114976UuoKR', 'vagbenro@gmail.con', '8118633277', NULL, NULL, 'yidiydiyd', 'oyfofuof', NULL, '2019-01-10', 'female', 'oydoyfofoyfoy', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 05:09:36', '2019-01-10 05:10:13'),
(48, '48786811', '1706282579', '1709521131547115274', 'W9eiY154711527407wbx', 'vagbenro@gmail.coll', '6669', NULL, NULL, 'bybyb', 'hyhyuhy', NULL, '2019-01-10', 'male', 'hhyhhy', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 05:14:34', '2019-01-10 05:15:08'),
(49, '91797564', '854754601', '16717071361547115586', 'vaiOH15471155867Y6XA', 'r@gmail.com', '2', NULL, NULL, 'cyiboy', 'gygyy', NULL, '2019-01-10', 'male', 'yvvv', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 05:19:46', '2019-01-10 05:20:22'),
(50, '81893502', '911894324', '12281020211547116094', 'YfX6y15471160943lLWt', 'm@gmail.com', '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2019-01-10 05:28:14', '2019-01-10 05:28:14'),
(51, '19146012', '405279575', '585677011547116119', '6pJE41547116119BRyVZ', 'nm@gmail.com', '99', NULL, NULL, 'nnn', 'nnnnn', NULL, '2019-01-10', 'male', 'nn', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 05:28:39', '2019-01-10 05:29:15'),
(52, '45632020', '64052571', '20293772031547116190', '2GWw81547116190KfzUV', 'hjj@gmail.com', '52', NULL, NULL, 'f', 'r', NULL, '2019-01-10', 'male', 'g', NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 05:29:50', '2019-01-10 05:30:19'),
(53, '53990121', '41163656', '17579143051547118710', '7O8FV1547118710QHnY3', 'b@gmail.com', '3', 'nsnsn', NULL, 'cyiboy', 'mzmsm', NULL, '2019-01-10', 'Male', 'nsnsj', NULL, 'scientist', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-10 06:11:50', '2019-01-10 06:12:25'),
(54, '42717328', '290921708', '19815590461547303836', 'fEKIj1547303836FHzxo', 'vgbenro@gmail.com', '08118633277', 'sehsj', NULL, 'cyiboy', 'suremabe', NULL, '2019-01-12', 'Female', 'saple', NULL, 'dispatch', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-12 09:37:16', '2019-01-12 09:37:52'),
(55, '70015692', '1299300363', '7257163711547304072', 'VxoQO1547304072LKCfu', 'pbroscarco@gmail.com', '08520888', 'jaaj', NULL, 'cyiboy', 'jwwjj', NULL, '2019-01-12', 'Male', 'sjsjjs', NULL, 'dispatch', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-12 09:41:12', '2019-01-12 09:41:41'),
(56, '69003587', '1680510676', '17002027201547304122', '52OhX1547304122DjsNR', 'vagbenrob@gmail.com', '081186363277', 'sjjsjs', NULL, 'cyiboy', 'sjjw', NULL, '2019-01-12', 'Male', 'sjjs', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-12 09:42:02', '2019-01-12 09:42:24'),
(57, '26707818', '451295534', '16711708481547305220', 'MFC5t1547305220WeVDs', 'proscarco@gmahil.com', '5565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, NULL, '2019-01-12 10:00:20', '2019-01-12 10:00:20'),
(58, '86064147', '517790782', '5118109741547305251', 'ALokU1547305251YQ5GF', 'victoragbenro@yahoo.com', '080008008', 'victtor', NULL, 'segun', 'victor', NULL, '2019-01-12', 'Female', 'selee', NULL, 'dispatch', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-12 10:00:51', '2019-01-12 10:01:30'),
(59, '44828591', '1643201327', '19443036831547305321', 'J6zow1547305321auH4m', 'proscmmarco@gmail.com', '908635', 'ajjajw', NULL, 'dde', 'nwjw', NULL, '2019-01-12', 'Male', 'nsnska', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-12 10:02:01', '2019-01-12 10:02:31'),
(60, '66726219', '1251600799', '1562671961547305593', 'B0wRX1547305593zrmgT', 'vvbs@gmail.com', '0808632541', 'dnnsj', NULL, 'jxjsj', 'nsnsj', NULL, '2019-01-12', 'Male', 'ndnsmw', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-12 10:06:33', '2019-01-12 10:07:04'),
(61, '93906678', '123634117', '9413351101547371697', 'Ucvuf1547371697yrdYj', '123@gmail.com', '1234567890', '1234567890', NULL, '123', '456', NULL, '2019-01-13', 'Female', '1234567890', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-01-13 04:28:17', '2019-01-13 04:29:16'),
(62, '24009420', '396931390', '8715200471548970416', 'sch6K1548970416Eb9YZ', 'pauledugbo@gmail.com', '08060780297', '12345678', NULL, 'Oronana Paul', 'Edugbo', NULL, '1973-07-16', 'male', 'Lagos', NULL, 'doctor', NULL, 'active', NULL, NULL, NULL, 'medic', 'c6weivj1I7o:APA91bFUwGyrhF-RBarJTn_aQRWLQhIaOjLSI62UiIPokgr99OtyYfnsLVdRku6CdIMEbYircRi11XnVMIQi51cz2XAn4NDEqJfzm-C2b8fHfp68F9Gj4kA-5zYkO55NJLM8vrBJ0WOK', 'yeah', '2019-01-31 16:33:36', '2019-01-31 16:37:02'),
(63, '53439191', '41225522', '5825518111549733678', 'MLIyS1549733678PxvTE', 'vva@gmail.com', '0822322632', 'smsms', NULL, 'cyiboy', 'swgun', NULL, '2019-02-09', 'Female', 'zmsms', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-02-09 12:34:38', '2019-02-09 12:35:19'),
(64, '39293505', '1115339850', '8439998721549825756', 'vj28Z1549825756t7l4h', 'oimagbenikaro@yahoo.com', '8133866402', 'goodnessij', NULL, 'Osarumwense', 'Imagbenikato', NULL, '1992-05-20', 'male', 'Benin', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'medic', 'dzsNZZPWfLs:APA91bF5L3U-V2DhXDZf0PldzNO0Q6ArxCUmaEBZCj8uD_W0J0Cd0juYaFcKsNDVQteAM2eZxLYbyQg2ywuA_DAhz7sK1MVlcw3zMa_L2WrrvoAqsosVgxwjJPySepNQrKme6J34GcW4', 'yeah', '2019-02-10 14:09:16', '2019-02-10 14:09:20'),
(65, '12319932', '895443558', '13536720981549834302', 'wpfaT1549834302BJbl0', 'user@user.com', '08118633222', 'useruser', NULL, 'user', 'user', NULL, '2000-02-10', 'Female', 'ring road', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-02-10 16:31:42', '2019-02-10 16:33:01'),
(66, '87861352', '11593194', '7102037161549837575', 'cYhBX1549837575uC4Ka', 'hwjwj@gg.con', '18633277', 'wjsjwj', NULL, 'cyiboy', 'jwjwsj', NULL, '2019-02-10', 'Male', 'sjsksk', NULL, 'patient', NULL, 'active', NULL, NULL, NULL, 'labtest', NULL, 'yeah', '2019-02-10 17:26:15', '2019-02-10 17:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `vericode`
--

CREATE TABLE `vericode` (
  `auid` int(11) NOT NULL,
  `puid` varchar(50) DEFAULT NULL,
  `suid` varchar(100) DEFAULT NULL,
  `bind` varchar(100) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `emailcode` varchar(40) DEFAULT NULL,
  `phonecode` varchar(40) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'new',
  `updated` varchar(30) DEFAULT NULL,
  `entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vericode`
--

INSERT INTO `vericode` (`auid`, `puid`, `suid`, `bind`, `user`, `emailcode`, `phonecode`, `status`, `updated`, `entry`, `modified`) VALUES
(1, '38363596', '74102475', '11242758211544618351', '15199367831544618348', 'E15953Qc', 'P26303IN', 'new', NULL, '2018-12-12 13:39:12', '2018-12-12 13:39:12'),
(2, '39363021', '1921154305', '17340794471544618377', '5114620331544618375', 'E79689xR', 'P23975AE', 'EMAIL', 'yeah', '2018-12-12 13:39:38', '2018-12-12 13:40:01'),
(3, '72128425', '991251558', '13931528121544682765', '15440086831544682765', 'E39044nG', 'P45592cC', 'PHONE', 'yeah', '2018-12-13 01:32:45', '2018-12-13 01:34:42'),
(4, '20443769', '643620284', '8284811101544693104', '1880295151544693104', 'E64399rI', 'P39880cs', 'BOTH', 'yeah', '2018-12-13 04:25:04', '2018-12-13 04:25:20'),
(5, '51352900', '1955851018', '1902619231544709765', '21276844331544709765', 'E66599Xt', 'P92581mh', 'BOTH', 'yeah', '2018-12-13 09:02:45', '2018-12-13 09:02:54'),
(6, '23517974', '119645124', '1293843131544899922', '7833875981544899922', 'E28883wt', 'P14918Ql', 'BOTH', 'yeah', '2018-12-15 13:52:02', '2018-12-15 13:52:22'),
(7, '28464943', '1317247322', '11060248901544944421', '15320933761544944421', 'E96225Tm', 'P95178nN', 'PHONE', 'yeah', '2018-12-16 02:13:41', '2018-12-16 02:21:13'),
(8, '35946349', '450646564', '14478555531544947648', '12173099441544947648', 'E51350LJ', 'P84085WB', 'BOTH', 'yeah', '2018-12-16 03:07:28', '2018-12-16 03:08:08'),
(9, '89520118', '1801279122', '4381446811544947941', '17527738021544947941', 'E84161GQ', 'P19455fI', 'BOTH', 'yeah', '2018-12-16 03:12:21', '2018-12-16 03:23:09'),
(10, '66536483', '797158099', '13427900551544971863', '10991720181544971863', 'E41719sU', 'P81362BZ', 'EMAIL', 'yeah', '2018-12-16 09:51:03', '2018-12-16 10:01:29'),
(11, '49474468', '971416133', '17835609251545038592', '995989951545038592', 'E82687np', 'P88924Sm', 'new', NULL, '2018-12-17 04:23:12', '2018-12-17 04:23:12'),
(12, '52888139', '775999922', '4102399411545039316', '9288170731545039316', 'E76227Da', 'P11980js', 'BOTH', 'yeah', '2018-12-17 04:35:16', '2018-12-17 04:35:42'),
(13, '43938158', '690368916', '9410380951545058977', '16015847431545058977', 'E67874Dz', 'P40541NT', 'new', NULL, '2018-12-17 10:02:57', '2018-12-17 10:02:57'),
(14, '90764684', '2118895248', '20367905811545144457', '3292959891545144457', 'E57404Qi', 'P89482Hk', 'BOTH', 'yeah', '2018-12-18 09:47:37', '2018-12-18 09:47:54'),
(15, '50871926', '1316456714', '9595441761545151644', '20219263381545151644', 'E25035ks', 'P83244TE', 'BOTH', 'yeah', '2018-12-18 11:47:24', '2018-12-18 11:47:38'),
(16, '32512519', '2096284116', '10684053271545152999', '2265303991545152999', 'E11848Uk', 'P67860vy', 'BOTH', 'yeah', '2018-12-18 12:09:59', '2018-12-18 12:10:18'),
(17, '45659455', '127169719', '16500704441545153448', '19233604681545153448', 'E76659yB', 'P32238xO', 'BOTH', 'yeah', '2018-12-18 12:17:28', '2018-12-18 12:17:47'),
(18, '65553271', '419011058', '8354122311545160221', '15633186921545160221', 'E69633JR', 'P34251bL', 'BOTH', 'yeah', '2018-12-18 14:10:21', '2018-12-18 14:10:45'),
(19, '31270650', '38320392', '16773397951545214444', '10549105121545214444', 'E76142QK', 'P68344TN', 'new', NULL, '2018-12-19 05:14:04', '2018-12-19 05:14:04'),
(20, '90799243', '150956251', '1258825461545214458', '16365098061545214458', 'E96601eJ', 'P78644WS', 'new', NULL, '2018-12-19 05:14:18', '2018-12-19 05:14:18'),
(21, '61242305', '1552734747', '2801820651545214468', '18340753391545214468', 'E26924LJ', 'P65214jv', 'BOTH', 'yeah', '2018-12-19 05:14:28', '2018-12-19 05:14:47'),
(22, '36991789', '1055074547', '18345868751545219248', '6180732461545219248', 'E36211Zp', 'P83026gr', 'BOTH', 'yeah', '2018-12-19 06:34:08', '2018-12-19 06:36:10'),
(23, '16509727', '1471468028', '15230696811545219434', '19581190971545219434', 'E28561Dd', 'P62481CT', 'EMAIL', 'yeah', '2018-12-19 06:37:14', '2018-12-19 06:41:21'),
(24, '82494380', '278680995', '13739325911545219714', '20515626601545219714', 'E11423Wy', 'P18636CG', 'PHONE', 'yeah', '2018-12-19 06:41:54', '2018-12-19 06:42:35'),
(25, '34373596', '1042749155', '1937878901545327024', '6841987491545327024', 'E62471cg', 'P82765fs', 'BOTH', 'yeah', '2018-12-20 12:30:24', '2018-12-20 12:30:40'),
(26, '46883106', '787564374', '17113325801545545022', '16849385821545545021', 'E14922qb', 'P22146kW', 'BOTH', 'yeah', '2018-12-23 01:03:42', '2018-12-23 01:03:57'),
(27, '51564966', '1850059690', '20900740671545546658', '17933729811545546658', 'E29455FE', 'P20052ZR', 'BOTH', 'yeah', '2018-12-23 01:30:58', '2018-12-23 01:31:30'),
(28, '47623660', '49029116', '18713692871547050099', '8751370031547050099', 'E25563xS', 'P47064IJ', 'new', NULL, '2019-01-09 11:08:19', '2019-01-09 11:08:19'),
(29, '26367101', '1350892014', '20482870401547050566', '9365331481547050566', 'E15554Xv', 'P66952uw', 'EMAIL', 'yeah', '2019-01-09 11:16:06', '2019-01-09 13:39:47'),
(30, '60155423', '1355029489', '7913304781547060087', '13303299211547060087', 'E78229Ik', 'P41715iu', 'new', NULL, '2019-01-09 13:54:47', '2019-01-09 13:54:47'),
(31, '72842589', '1185887111', '495895191547060428', '11142480261547060428', 'E92611CJ', 'P39424zk', 'BOTH', 'yeah', '2019-01-09 14:00:28', '2019-01-09 14:00:41'),
(32, '46013769', '1906324400', '7303816911547112075', '19802234051547112075', 'E43641IQ', 'P83521cW', 'EMAIL', 'yeah', '2019-01-10 04:21:15', '2019-01-10 04:22:07'),
(33, '69674215', '1584577408', '20017855841547112244', '16164412371547112244', 'E98599FM', 'P32432qu', 'EMAIL', 'yeah', '2019-01-10 04:24:04', '2019-01-10 04:24:41'),
(34, '70012646', '743403189', '14927175141547113553', '4456850531547113553', 'E33495Qh', 'P33451Ax', 'BOTH', 'yeah', '2019-01-10 04:45:53', '2019-01-10 04:46:04'),
(35, '35136575', '181568337', '20855256311547114485', '8305994181547114485', 'E42914jh', 'P59867pf', 'BOTH', 'yeah', '2019-01-10 05:01:25', '2019-01-10 05:01:51'),
(36, '86818322', '799861837', '20313533791547114976', '12128507701547114976', 'E96247TY', 'P15663KY', 'BOTH', 'yeah', '2019-01-10 05:09:36', '2019-01-10 05:09:51'),
(37, '82315523', '712839425', '2356770901547115274', '1709521131547115274', 'E91070ei', 'P71679xR', 'BOTH', 'yeah', '2019-01-10 05:14:34', '2019-01-10 05:14:52'),
(38, '19305120', '1636355644', '6814516021547115586', '16717071361547115586', 'E79631id', 'P85964tq', 'BOTH', 'yeah', '2019-01-10 05:19:46', '2019-01-10 05:20:04'),
(39, '27370926', '149234523', '10103111511547116094', '12281020211547116094', 'E57037KV', 'P28732ls', 'new', NULL, '2019-01-10 05:28:14', '2019-01-10 05:28:14'),
(40, '81667286', '1414381839', '1279984901547116119', '585677011547116119', 'E96722Hj', 'P95330se', 'BOTH', 'yeah', '2019-01-10 05:28:39', '2019-01-10 05:28:54'),
(41, '33318719', '1818553587', '17189048471547116190', '20293772031547116190', 'E97976SE', 'P91456jH', 'BOTH', 'yeah', '2019-01-10 05:29:50', '2019-01-10 05:30:05'),
(42, '37379810', '598616826', '215475891547118710', '17579143051547118710', 'E95241lo', 'P98357Pt', 'BOTH', 'yeah', '2019-01-10 06:11:50', '2019-01-10 06:12:08'),
(43, '11401489', '554797088', '34468541547303836', '19815590461547303836', 'E43909NG', 'P26979kZ', 'BOTH', 'yeah', '2019-01-12 09:37:16', '2019-01-12 09:37:30'),
(44, '69351285', '1235266886', '6452303221547304072', '7257163711547304072', 'E97731Iw', 'P12366ng', 'BOTH', 'yeah', '2019-01-12 09:41:12', '2019-01-12 09:41:25'),
(45, '35759248', '1751716645', '9517551621547304122', '17002027201547304122', 'E14046dO', 'P63176wo', 'BOTH', 'yeah', '2019-01-12 09:42:02', '2019-01-12 09:42:12'),
(46, '13729148', '580505518', '2493802581547305220', '16711708481547305220', 'E46760Kh', 'P35658Xg', 'new', NULL, '2019-01-12 10:00:20', '2019-01-12 10:00:20'),
(47, '83469668', '1868043715', '3198674611547305251', '5118109741547305251', 'E90074dr', 'P54533VM', 'BOTH', 'yeah', '2019-01-12 10:00:51', '2019-01-12 10:01:04'),
(48, '84089803', '1911441483', '2241303391547305321', '19443036831547305321', 'E13502Nu', 'P44568By', 'BOTH', 'yeah', '2019-01-12 10:02:01', '2019-01-12 10:02:13'),
(49, '25889445', '1377767183', '20195493591547305593', '1562671961547305593', 'E59930gc', 'P52359Yr', 'BOTH', 'yeah', '2019-01-12 10:06:33', '2019-01-12 10:06:51'),
(50, '41120465', '190634778', '6072849721547371697', '9413351101547371697', 'E38664bK', 'P71896cW', 'BOTH', 'yeah', '2019-01-13 04:28:17', '2019-01-13 04:28:36'),
(51, '87067001', '955951607', '4344973941549733679', '5825518111549733678', 'E30246ku', 'P67533wH', 'BOTH', 'yeah', '2019-02-09 12:34:39', '2019-02-09 12:34:53'),
(52, '72596998', '1747497179', '11442799031549834302', '13536720981549834302', 'E15755ih', 'P50804Ui', 'BOTH', 'yeah', '2019-02-10 16:31:42', '2019-02-10 16:32:04'),
(53, '65412793', '2134520970', '21152839171549837575', '7102037161549837575', 'E35133NS', 'P75314iv', 'BOTH', 'yeah', '2019-02-10 17:26:15', '2019-02-10 17:26:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `puid` (`puid`),
  ADD UNIQUE KEY `suid` (`suid`),
  ADD UNIQUE KEY `bind` (`bind`),
  ADD KEY `entry` (`entry`,`modified`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `puid` (`puid`),
  ADD UNIQUE KEY `suid` (`suid`),
  ADD UNIQUE KEY `bind` (`bind`),
  ADD KEY `entry` (`entry`,`modified`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `puid` (`puid`),
  ADD UNIQUE KEY `suid` (`suid`),
  ADD UNIQUE KEY `bind` (`bind`),
  ADD KEY `entry` (`entry`,`modified`);

--
-- Indexes for table `labtest`
--
ALTER TABLE `labtest`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `puid` (`puid`),
  ADD UNIQUE KEY `suid` (`suid`),
  ADD UNIQUE KEY `bind` (`bind`),
  ADD KEY `entry` (`entry`),
  ADD KEY `modified` (`modified`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `puid` (`puid`),
  ADD UNIQUE KEY `suid` (`suid`),
  ADD UNIQUE KEY `bind` (`bind`),
  ADD KEY `entry` (`entry`,`modified`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `puid` (`puid`),
  ADD UNIQUE KEY `suid` (`suid`),
  ADD UNIQUE KEY `bind` (`bind`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `entry` (`entry`),
  ADD KEY `modified` (`modified`);

--
-- Indexes for table `vericode`
--
ALTER TABLE `vericode`
  ADD PRIMARY KEY (`auid`),
  ADD UNIQUE KEY `puid` (`puid`),
  ADD UNIQUE KEY `suid` (`suid`),
  ADD UNIQUE KEY `bind` (`bind`),
  ADD UNIQUE KEY `username` (`user`),
  ADD KEY `entry` (`entry`),
  ADD KEY `modified` (`modified`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labtest`
--
ALTER TABLE `labtest`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `vericode`
--
ALTER TABLE `vericode`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.23 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5538
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mediq
DROP DATABASE IF EXISTS `mediq`;
CREATE DATABASE IF NOT EXISTS `mediq` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mediq`;

-- Dumping structure for table mediq.history
DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) NOT NULL,
  `ruid` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'native',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revised` varchar(5) NOT NULL DEFAULT 'N',
  `entry` varchar(5) NOT NULL DEFAULT 'L',
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `page` int(11) DEFAULT NULL,
  `record` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `ruid` (`ruid`),
  KEY `author` (`author`),
  KEY `created` (`created`),
  KEY `modified` (`revised`),
  KEY `entry` (`entry`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

-- Dumping data for table mediq.history: ~11 rows (approximately)
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
REPLACE INTO `history` (`auid`, `puid`, `ruid`, `author`, `created`, `revised`, `entry`, `status`, `page`, `record`, `date`, `description`, `fee`) VALUES
	(1, '3939n0031508143H16233J53O0612533', '242030966Q7p4v5522258053ZJ05S33RE6d205nT1', '05655727832q56B17u870102231d010043', '2019-04-23 15:38:52', 'N', 'L', 'new', 1, '196Z02919I226451937362T6535142180h', '2019-04-12 00:00:00', 'Just Relax', 300),
	(2, '7f10q73065666444888I4316115113400', '1787567799vyOBu257759351h061W8Y5760oc33R5s', '05655727832q56B17u870102231d010043', '2019-04-23 15:39:38', 'N', 'L', 'new', 1, '196Z02919I226451937362T6535142180h', '2019-04-18 00:00:00', 'I said rest a while', 700),
	(3, '06r81534315737024R357033685671073', '1378280203hLdWG7835465161914K55e3S35048V60', '05655727832q56B17u870102231d010043', '2019-04-23 15:40:18', 'N', 'L', 'new', 1, '196Z02919I226451937362T6535142180h', '2019-04-05 00:00:00', 'Another entry on same card 1', 400),
	(4, '1U0161r341F5v867115306763292697610', '1784157756PmId215059143155EOW0Cq601M6364j54', '05655727832q56B17u870102231d010043', '2019-04-23 15:41:06', 'N', 'L', 'new', 2, '196Z02919I226451937362T6535142180h', '2019-04-08 00:00:00', 'A different card entry on same treatment history', 500),
	(5, '2592725K28C2310T585181412431030246', '14615324855K1yT301174548Z1p24085Yq261bh350', '05655727832q56B17u870102231d010043', '2019-04-23 15:46:52', 'N', 'L', 'new', 2, '196Z02919I226451937362T6535142180h', '2019-04-05 00:00:00', 'The 2nd Entry on card 2', 400),
	(6, '05151Y45m11v33165228538790778067J', '2145591730MOUW56036541532316056pw30J5hP831', '05655727832q56B17u870102231d010043', '2019-04-23 16:03:23', 'N', 'L', 'new', 1, '6B09952v9551692529571308G62A7213', '2019-04-11 00:00:00', 'Nothing on page one just one', 200),
	(7, '8353160923B454942620231186350882x', '1893167452O2Mav910015044b85W613510H237dCzy', '05655727832q56B17u870102231d010043', '2019-04-23 16:03:43', 'N', 'L', 'new', 1, '6B09952v9551692529571308G62A7213', '2019-04-12 00:00:00', 'qwdefesgd', 41),
	(8, '4510351922w2750t12626440322811q70O', '252475231hrcNe7195841262GV5k8434R156lXU01', '05655727832q56B17u870102231d010043', '2019-04-23 16:04:02', 'N', 'L', 'new', 2, '6B09952v9551692529571308G62A7213', '2019-04-25 00:00:00', '344344', 45),
	(9, '91994e11851953301798k72677686z591', '235333611x4jwv19698561966o7q6951D5t10380Md', '05655727832q56B17u870102231d010043', '2019-04-23 16:04:39', 'N', 'L', 'new', 3, '6B09952v9551692529571308G62A7213', '2019-04-11 00:00:00', 'retryrtytyht', 300),
	(10, '081C63751589260V86963081m025219454', '1519404926nVzy098779049351927d6N8695Ko0I45', '05655727832q56B17u870102231d010043', '2019-04-24 08:04:29', 'N', 'L', 'new', 1, '3z600355561457820K782061nT994843', '2018-02-24 00:00:00', 'I believe this is a single case of malaria but he has been refered for testing at our sister facility', 80000),
	(11, '51856v7605558E42788179504006l8045', '1759685845wdI7E16045291730555168tin91G658A4', '05655727832q56B17u870102231d010043', '2019-04-24 08:06:08', 'N', 'L', 'new', 1, '3z600355561457820K782061nT994843', '2018-02-25 00:00:00', 'Test results came back but patient still needs additional tests so I can fully determine this is an isolated case of malaria. I will need further tests to determine the root cause of the incessant malaria.', 20000);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

-- Dumping structure for table mediq.hmo
DROP TABLE IF EXISTS `hmo`;
CREATE TABLE IF NOT EXISTS `hmo` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) NOT NULL,
  `ruid` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'native',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revised` varchar(5) NOT NULL DEFAULT 'N',
  `entry` varchar(5) NOT NULL DEFAULT 'L',
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT 'basic',
  `logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `ruid` (`ruid`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  KEY `author` (`author`),
  KEY `created` (`created`),
  KEY `modified` (`revised`),
  KEY `entry` (`entry`),
  KEY `status` (`status`),
  KEY `password` (`name`),
  KEY `pin` (`brand`),
  KEY `privilege` (`address`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

-- Dumping data for table mediq.hmo: ~5 rows (approximately)
/*!40000 ALTER TABLE `hmo` DISABLE KEYS */;
REPLACE INTO `hmo` (`auid`, `puid`, `ruid`, `author`, `created`, `revised`, `entry`, `status`, `phone`, `email`, `name`, `brand`, `address`, `logo`) VALUES
	(1, '36465', '65656', 'native', '2019-04-21 19:10:35', 'N', 'L', 'new', NULL, NULL, 'Hygeia HMO Limited\r\n', 'Hygeia', 'basic', NULL),
	(2, '32424', '42424', 'native', '2019-04-21 19:15:06', 'N', 'L', 'new', NULL, NULL, 'Total Health Trust Limited', 'THT', 'basic', NULL),
	(3, '24424', '52424', 'native', '2019-04-21 19:15:43', 'N', 'L', 'new', NULL, NULL, 'Integrated Healthcare Limited', 'Integrated', 'basic', NULL),
	(4, '23435', '32435', 'native', '2019-04-21 19:16:33', 'N', 'L', 'new', NULL, NULL, 'AIICO Multi-Shield Nigeria Limited', 'AIICO', 'basic', NULL),
	(5, '24252', '25664', 'native', '2019-04-21 19:17:15', 'N', 'L', 'new', NULL, NULL, 'Princeton Health Limited', 'Princeton', 'basic', NULL);
/*!40000 ALTER TABLE `hmo` ENABLE KEYS */;

-- Dumping structure for table mediq.record
DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) NOT NULL,
  `ruid` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'native',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revised` varchar(5) NOT NULL DEFAULT 'N',
  `entry` varchar(5) NOT NULL DEFAULT 'L',
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `privilege` varchar(100) DEFAULT 'basic',
  `type` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `hospitalno` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `tribe` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `hmo` varchar(100) DEFAULT 'nohmo',
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `ruid` (`ruid`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `hospitalno` (`hospitalno`),
  KEY `author` (`author`),
  KEY `created` (`created`),
  KEY `modified` (`revised`),
  KEY `entry` (`entry`),
  KEY `status` (`status`),
  KEY `password` (`password`),
  KEY `pin` (`pin`),
  KEY `privilege` (`privilege`),
  KEY `type` (`type`),
  KEY `hmo` (`hmo`),
  KEY `sex` (`sex`),
  KEY `firstname` (`firstname`),
  KEY `surname` (`surname`),
  KEY `othername` (`othername`),
  KEY `birthdate` (`birthdate`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

-- Dumping data for table mediq.record: ~14 rows (approximately)
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
REPLACE INTO `record` (`auid`, `puid`, `ruid`, `author`, `created`, `revised`, `entry`, `status`, `phone`, `email`, `username`, `password`, `pin`, `privilege`, `type`, `surname`, `firstname`, `othername`, `sex`, `question`, `answer`, `photo`, `hospitalno`, `birthdate`, `address`, `occupation`, `tribe`, `religion`, `hmo`) VALUES
	(1, '71l726854123695U17015619213018x3z8', '1815431617Gvmeq23587183517sZ71556I878w75f8', '087370877952tU535122161478c43275', '2019-04-21 21:14:38', 'N', 'L', 'new', '09026636728', NULL, NULL, NULL, NULL, 'basic', NULL, 'Osawere', 'Anthony', NULL, 'female', NULL, NULL, NULL, 1, '1960-10-31', '33, Victoria Island, Asokoro', 'UI/UX Developer', 'Urhobo', 'Christian', '24424'),
	(2, '95475817515S0917681F1509X5o5494261', '167951182z0ibq7468595J051C4Pd955f5V12T1', '087370877952tU535122161478c43275', '2019-04-22 07:36:54', 'N', 'L', 'new', '0908877362', NULL, NULL, NULL, NULL, 'basic', NULL, 'Benard', 'Lee', NULL, 'male', NULL, NULL, NULL, 2, '2001-10-12', 'Benard Lee Street', 'Designer', NULL, NULL, 'nohmo'),
	(3, '5980618929125gB05421329152X85468', '1990661682joCSh1686935296N9Y1155a8u95485b1O', '087370877952tU535122161478c43275', '2019-04-22 07:44:58', 'N', 'L', 'new', NULL, NULL, NULL, NULL, NULL, 'basic', NULL, 'Kelly', 'Hansong', NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'Z944785754154z3931i4537409587711', '1903331405ytxXZ674307755E15KQpzlY53551945b', '087370877952tU535122161478c43275', '2019-04-22 07:45:34', 'N', 'L', 'new', NULL, NULL, NULL, NULL, NULL, 'basic', NULL, 'Brad', 'Pitt', NULL, NULL, NULL, NULL, NULL, 3, '2019-04-25', NULL, NULL, NULL, NULL, NULL),
	(5, '1201595093s7510h10915814596j290461', '1225931929eTcOL3950534905hM5Fj5Y9d13U55418', '087370877952tU535122161478c43275', '2019-04-22 07:45:48', 'N', 'L', 'new', NULL, NULL, NULL, NULL, NULL, 'basic', NULL, 'Pique', 'Gerrad', NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, '10559e411H875296962f42610j66545', '12293852574CuYv157871621545rs515Bh6a159697I', '087370877952tU535122161478c43275', '2019-04-22 07:47:26', 'N', 'L', 'new', NULL, NULL, NULL, NULL, NULL, 'basic', NULL, 'Felix', 'Liberty', NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, '455802165585O58128324939155C49K188', '151683201145iVm18794009306823951Y95eFh5lx5N', '087370877952tU535122161478c43275', '2019-04-22 18:14:58', 'Y', 'L', 'new', NULL, NULL, NULL, NULL, NULL, 'basic', NULL, 'Jumag', 'Kelly', NULL, 'male', NULL, NULL, NULL, 6, NULL, NULL, 'Marketer', NULL, NULL, '23435'),
	(8, '4351o4y622h5895q43095006515128728', '336983230LD7n5188829098896l10s365559BSg5PU', '087370877952tU535122161478c43275', '2019-04-22 18:21:00', 'Y', 'L', 'new', '080802845', NULL, NULL, NULL, NULL, 'basic', NULL, 'Bella', 'Marksoni', NULL, 'female', NULL, NULL, NULL, 61, '2018-04-04', '14 Markson Street', 'Student', NULL, NULL, '36465'),
	(9, '5Q441931770575785D14p456001678107', '1858799386Yi2TR24571874570Km5MP870X6C1Q09', '05655727832q56B17u870102231d010043', '2019-04-23 09:39:39', 'Y', 'L', 'new', '08099773621', NULL, NULL, NULL, NULL, 'basic', NULL, 'Rio', 'Fedinard', NULL, 'male', NULL, NULL, NULL, 15, '2010-04-12', '14, Fedinardo Estate', 'Footballer', 'English', 'Christian', '36465'),
	(10, '691026539246499370d2rK756131y036', '624874547tyFWQ1290869417cK5L016153E6Z3744g', '05655727832q56B17u870102231d010043', '2019-04-23 11:13:57', 'N', 'L', 'new', NULL, NULL, NULL, NULL, NULL, 'basic', NULL, 'Omas', 'Kelly', NULL, NULL, NULL, NULL, NULL, 545, NULL, NULL, NULL, NULL, NULL, '32424'),
	(11, '1061L001065p6443316B3881g34354', '1142864668IS0UE1137886004H61F178f065G4W581A', '05655727832q56B17u870102231d010043', '2019-04-23 11:16:58', 'Y', 'L', 'new', '09097991234', NULL, NULL, NULL, NULL, 'basic', NULL, 'Omokha', 'Emmanuel', NULL, 'male', NULL, NULL, NULL, 14, '1982-04-14', '47 Etete Street, Benin City', 'Manager', 'Bini', 'Christian', '24424'),
	(12, '6B09952v9551692529571308G62A7213', '1822563872dhD5J18540977535vp621N3Bl656052P2', '05655727832q56B17u870102231d010043', '2019-04-23 13:30:53', 'Y', 'L', 'new', NULL, NULL, NULL, NULL, NULL, 'basic', NULL, 'Gregory', NULL, NULL, NULL, NULL, NULL, NULL, 53, NULL, NULL, NULL, NULL, NULL, '32424'),
	(13, '196Z02919I226451937362T6535142180h', '1748184465sHhMj470430271YG549n61UaP260V557', '05655727832q56B17u870102231d010043', '2019-04-23 14:26:16', 'Y', 'L', 'new', '080223355', NULL, NULL, NULL, NULL, 'basic', NULL, 'Ose', 'Oselu', NULL, 'male', NULL, NULL, NULL, 70, '2017-10-21', '14 Ugbor, GRA Benin City', 'Developer', 'Esan', 'Christian', '36465'),
	(14, '3z600355561457820K782061nT994843', '2610123776tH0L93974956208lpb1510G96sQ5h4', '05655727832q56B17u870102231d010043', '2019-04-24 08:03:21', 'N', 'L', 'new', '07025368957', NULL, NULL, NULL, NULL, 'basic', NULL, 'Emeka', 'Dennis', NULL, 'male', NULL, NULL, NULL, 5214879, '2019-04-12', 'UNIT NG1885\r\n12011 Westbrae Parkway #B', 'Manager', NULL, NULL, '36465');
/*!40000 ALTER TABLE `record` ENABLE KEYS */;

-- Dumping structure for table mediq.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) NOT NULL,
  `ruid` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'native',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revised` varchar(5) NOT NULL DEFAULT 'N',
  `entry` varchar(5) NOT NULL DEFAULT 'L',
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `privilege` varchar(100) DEFAULT 'basic',
  `type` varchar(100) DEFAULT 'Wfc3RhcnRlcg==',
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `ruid` (`ruid`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `author` (`author`),
  KEY `created` (`created`),
  KEY `modified` (`revised`),
  KEY `entry` (`entry`),
  KEY `status` (`status`),
  KEY `password` (`password`),
  KEY `pin` (`pin`),
  KEY `privilege` (`privilege`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

-- Dumping data for table mediq.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`auid`, `puid`, `ruid`, `author`, `created`, `revised`, `entry`, `status`, `phone`, `email`, `username`, `password`, `pin`, `privilege`, `type`, `surname`, `firstname`, `othername`, `sex`, `question`, `answer`, `photo`) VALUES
	(1, '087370877952tU535122161478c43275', '2080503514LvyxU211417212383r6X1ut04W5851cN5', 'native', '2019-04-21 09:26:30', 'Y', 'L', 'new', NULL, NULL, 'b2RhbzM2MA==', '$2y$10$M/qeVtOBKhoVb/DFHavZxuiwY3vxcTMN0CRUSuFICl/vwIx1jX.YG', NULL, 'basic', 'YWRob2M=', 'Odao', 'Toni', NULL, NULL, NULL, NULL, NULL),
	(2, '005465779510181368168265J4L4025042', '280686022zcf2q12971084195J540Ar06o1O016Ge5', 'native', '2019-04-23 09:03:01', 'N', 'L', 'new', NULL, NULL, 'YWRtaW4=', '$2y$10$S8O3gAZjPNNC4tP0F9XhS.skzJ2BWc97z1e9De50x6QJXgHn4qxmu', NULL, 'basic', 'YWRtaW4=', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, '1R636490k55203536461297H51176K60', '1070847769FelBT899888946E2051605265H6P0dNS', 'native', '2019-04-23 09:04:37', 'N', 'L', 'new', NULL, NULL, 'cmVjb3Jk', '$2y$10$CFXCqNdvZujAVYmR6B7swOsMFHrzWKOyIZ/CxhezHG1Gv25IObULu', NULL, 'basic', 'cmVjb3Jk', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, '05655727832q56B17u870102231d010043', '154458988SG8To717517483Q02E7DeIR0165c4506', 'native', '2019-04-23 09:06:05', 'Y', 'L', 'new', NULL, NULL, 'YWRob2M=', '$2y$10$wTR1xn2H2Kr295LFgaT8U.H7fk93f2qnOPPUxT9cCQIjT89z7eabG', NULL, 'basic', 'YWRob2M=', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, '508541686270a9k26B019209191g41711', '108969300328JEo1818266505QIp461012506051Hwl', 'native', '2019-04-24 11:44:41', 'N', 'L', 'new', NULL, NULL, 'c3VhZGhvYw==', '$2y$10$jFBYkf8rhiji/6hpQAReAuoGbPfVdEwBzEP9bhgPM.hTmneV.T2MW', NULL, 'basic', 'c3VhZGhvYw==', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table mediq._sample
DROP TABLE IF EXISTS `_sample`;
CREATE TABLE IF NOT EXISTS `_sample` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `puid` varchar(50) NOT NULL,
  `ruid` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'native',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revised` varchar(5) NOT NULL DEFAULT 'N',
  `entry` varchar(5) NOT NULL DEFAULT 'L',
  `status` varchar(10) NOT NULL DEFAULT 'new',
  `Column` varchar(10) NOT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `puid` (`puid`),
  UNIQUE KEY `ruid` (`ruid`),
  KEY `author` (`author`),
  KEY `created` (`created`),
  KEY `modified` (`revised`),
  KEY `entry` (`entry`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

-- Dumping data for table mediq._sample: ~0 rows (approximately)
/*!40000 ALTER TABLE `_sample` DISABLE KEYS */;
/*!40000 ALTER TABLE `_sample` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

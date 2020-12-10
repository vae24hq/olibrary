-- phpMiniAdmin dump 1.9.170730
-- Datetime: 2018-09-20 22:34:35
-- Host: localhost
-- Database: jhgdb

/*!40030 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

DROP TABLE IF EXISTS `billing`;
CREATE TABLE `billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) NOT NULL,
  `min_per` text,
  `max_per` text,
  `statement` text,
  `title` text,
  `acronym` text,
  `line` text,
  `label` text,
  `value` text,
  `next` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Serial` (`buid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `billing` DISABLE KEYS */;
INSERT INTO `billing` VALUES ('1','16935354','1','20','OTP is required for this transaction','OTP Required','OTP','Please enter your OTP code below','OTP','O621680TP','30180993'),('2','30180993','19','53','COT code is required for this transaction','COT Required','COT','Please enter your COT code below','COT Code','C775732TX','70744111'),('3','70744111','53','91','TAX code is required for this transaction','TAX Required','TAX','Please enter your TAX code below','TAX Code','T913264AX','85210963'),('4','85210963','91','97','FSA code is required for this transaction','FSA Required','FSA','Please enter your FSA code below','FSA Code','F696441SA','71746312'),('5','71746312','95','99','IMF code is required for this transaction','IMF Required','IMF','Please enter your IMF code below','IMF Code','I749688MF','completed');
/*!40000 ALTER TABLE `billing` ENABLE KEYS */;

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) DEFAULT NULL,
  `accountno` text,
  `pin` text,
  `uname` text,
  `securityhint` text,
  `acctype` varchar(100) DEFAULT 'Savings',
  `currency` varchar(50) DEFAULT 'dollar',
  `status` varchar(10) DEFAULT 'inactive',
  `income` varchar(300) DEFAULT '-None',
  `outgo` varchar(300) DEFAULT '-None',
  `accbal` varchar(300) DEFAULT '0',
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
  `passport` varchar(100) DEFAULT 'none.jpg',
  `passw` text,
  `annual` text,
  `swift` varchar(50) DEFAULT '-',
  `idtype` text,
  `idnumber` text,
  `idexpiration` text,
  `billing` varchar(60) DEFAULT 'default',
  `service` varchar(300) DEFAULT NULL,
  `asset` varchar(300) DEFAULT NULL,
  `assetworth` varchar(30) DEFAULT NULL,
  `creditworth` varchar(30) DEFAULT NULL,
  `occupation` varchar(40) DEFAULT NULL,
  `calltime` varchar(20) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `nok` text,
  `nokphone` text,
  `nokemail` text,
  `nokaddress` text,
  `nokrelationship` text,
  `lang` varchar(50) NOT NULL DEFAULT 'default',
  `iscond` varchar(50) NOT NULL DEFAULT 'okay',
  PRIMARY KEY (`id`),
  UNIQUE KEY `buid` (`buid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 CHECKSUM=1;

/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('1','19339618','1256292092','JDOE','john','JAYTHOUGH','Current','dollar','active','-None','5000','60500','John','Doe','K.','Mr.','Male','john@doe.com','08037483681','18-10-1958','America','182 Luke Estate, Miavgu','Miami','Florida','USA','Your Account Has Been Setup And Active','none.jpg','johndoe','$10,000+','SW0931','Driver License','77288DF72','JUNE - 2019','nobill','Banking\r\n\r\nTrustFund Management','Cash\r\n\r\nInsurance','$100,000+','$50,000+','Medical Practitioner','Weekday 8am - 12pm','No Comment','Damian K. Doe','+1 827  82912','damian@gmail.com','12A Rexingon Mark,\r\n\r\nBrush Street,\r\n\r\nUS','Sister','default','okay'),('2','56459221','2703683984','901677763','leo1964','901677763','Savings','euro','active','-None','-None','780973','Leo ','Julia','Tammy ','Engr.','Male','leo_tammy@engineer.com','+16626179981','27-07-1964','USA','Greenpoint Avenue, Brooklyn, New York','Milford','Connecticut','USA','Your Account Is Active\r\n\r\nGHB Target\r\n\r\nTurn Your Goals Into Milestones.\r\n\r\nGHB-Target Is A High Interest Bearing Account That Encourages Financial Discipline Through Savings. The Account Is Designed To Enable You Save Towards A Specific Target.\r\n\r\nWhether You Are Saving Towards Your Dream Wedding, Or Have Set Sight On A New Car, With GHB Target, You Are Guaranteed To Achieve Your Financial Goals. \r\n\r\nTo Sign Up To GHB Target, All You Need Is To Have An Existing GHBVBank_Account.','DHJ4109LXYz605bnu.jpg','901677763','$900,000+','-','Driver License','K080861377','JUNE - 2020','nobill','Private Equity','Private Equity','$900,000+','$0,000+','Engineer','Weekday 8am - 12pm','No Comment','Sydney','+16626179981','sydney_101@usa.com','Greenpoint Avenue, Brooklyn, New York','Daughter','default','TransLimit'),('3','68450505','7613491926','901001763','leomontero','901001763','Savings','euro','active','-None','160755','749595','Leo ','Montero','Maria','Engr.','Male','leomontero101@gmail.com','+16626179981','27-07-1964','USA','Greenpoint Avenue, Brooklyn, New York','Milford','Connecticut','USA','Your Account Is Active\r\n\r\nGHB Target\r\n\r\nTurn Your Goals Into Milestones.\r\n\r\nGHB-Target Is A High Interest Bearing Account That Encourages Financial Discipline Through Savings. The Account Is Designed To Enable You Save Towards A Specific Target.\r\n\r\nWhether You Are Saving Towards Your Dream Wedding, Or Have Set Sight On A New Car, With GHB Target, You Are Guaranteed To Achieve Your Financial Goals. \r\n\r\nTo Sign Up To GHB Target, All You Need Is To Have An Existing GHBVBank_Account.','EIJ8713KPRv205VYn.jpg','901001763','$500,000+','-','Driver License','K080861127','JUNE - 2020','nobill','Wealth Planning','Art Jewelry','$500,000+','$50,000+','Engineer','Weekday 8am - 12pm','No Comment','Sydney','+16626179981','sydney_101@usa.com','Greenpoint Avenue, Brooklyn, New York','Daughter','de','TransLimit'),('4','59493525','3359756265','908101763','leotammy ','908101763','Savings','euro','active','-None','-None','1231543','Leo','Julia ','Tammy ','Engr.','Male','leo@engineer.com','+16626179981','27-07-1964','USA','Greenpoint Avenue, Brooklyn, New York','Milford','Connecticut','USA','Your Account Is Active\r\n\r\nGHB Target\r\n\r\nTurn Your Goals Into Milestones.\r\n\r\nGHB-Target Is A High Interest Bearing Account That Encourages Financial Discipline Through Savings. The Account Is Designed To Enable You Save Towards A Specific Target.\r\n\r\nWhether You Are Saving Towards Your Dream Wedding, Or Have Set Sight On A New Car, With GHB Target, You Are Guaranteed To Achieve Your Financial Goals. \r\n\r\nTo Sign Up To GHB Target, All You Need Is To Have An Existing GHB Bank_Account.','STb6407dlox34psu.jpg','908101763','$200,000+','-','Driver License','K080861389','JUNE - 2020','nobill','Investment_Services','Real Estate','$500,000+','$50,000+','Engineer','Weekday 8am - 12pm','No Comment','Sydney','+16626179981','sydney_101@usa.com','Greenpoint Avenue, Brooklyn, New York','Daughter','default','okay'),('5','43432692','7564184530','904101763','leoamodt','904101763','Savings','euro','active','-None','-None','785095','Leo','Maria','Aamodt','Dr.','Male','leoamodt@engineer.com','+16626179981','27-07-1964','USA','Greenpoint Avenue, Brooklyn, New York','Milford','Connecticut','USA','Your Account Is Active\r\n\r\nGHB Target\r\n\r\nTurn Your Goals Into Milestones.\r\n\r\nGHB-Target Is A High Interest Bearing Account That Encourages Financial Discipline Through Savings. The Account Is Designed To Enable You Save Towards A Specific Target.\r\n\r\nWhether You Are Saving Towards Your Dream Wedding, Or Have Set Sight On A New Car, With GHB Target, You Are Guaranteed To Achieve Your Financial Goals. \r\n\r\nTo Sign Up To GHB Target, All You Need Is To Have An Existing GHB Bank_Account.','AIL2454RZez69jrv.jpg','904101763','$500,000+','-','Driver License','K080861321','JUNE - 2020','nobill','TrustFund Management','Insurance','$50,000+','$500,000+','Engineer','Weekday 8am - 12pm','No Comment','Sydney','+16626179981','sydney_101@usa.com','Greenpoint Avenue, Brooklyn, New York','Daughter','de','TransLimit'),('6','29432576','2652874764','901028763','leoamodt01','901677763','Savings','euro','active','-None','-None','1147543','Leo','Maria ','Aamodt','Engr.','Male','leoamodt01@engineer.com','+16626179981','27-07-1964','USA','Greenpoint Avenue, Brooklyn, New York','Milford','Connecticut','USA','Your Account Is Active\r\n\r\nGHB Target\r\n\r\nTurn Your Goals Into Milestones.\r\n\r\nGHB-Target Is A High Interest Bearing Account That Encourages Financial Discipline Through Savings. The Account Is Designed To Enable You Save Towards A Specific Target.\r\n\r\nWhether You Are Saving Towards Your Dream Wedding, Or Have Set Sight On A New Car, With GHB Target, You Are Guaranteed To Achieve Your Financial Goals. \r\n\r\nTo Sign Up To GHB Target, All You Need Is To Have An Existing GHB Bank_Account.','ADG8516JRUu700ajp.jpg','901677763','$200,000+','-','Driver License','K080861082','JUNE - 2020','nobill','Wealth Planning','Insurance','$500,000+','$200,000+','Engineer','Weekday 8am - 12pm','No Comment','Sydney','+16626179981','sydney_101@usa.com','Greenpoint Avenue, Brooklyn, New York','Daughter','de','okay'),('7','48479620',NULL,'2244488','86728628','davyswalker','investment','pound','inactive','-None','-None','0','DAVYS','walker','SMITH','Mr.','Male','davyswalker10@gmail.com','+447480047048','22/02/1973','UK','Cavendish Avenue,London,United Kingdom','LONDON','LONDON','GBR','Your account has been setup','none.jpg','davyswalker','$500,000+','-','Passport','645277828','22/2/2024','default','Private Equity','Cash','$500,000+','$500,000+','BUSINESS','Weekend from 6pm','No comment','Evans davys','+447405002791','davyswalker10@gmail.com','Cavendish Avenue,London,United Kingdom','son','default','okay');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

DROP TABLE IF EXISTS `firm`;
CREATE TABLE `firm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `email` text,
  `phone` text,
  `address` text,
  `webmail` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `firm` DISABLE KEYS */;
INSERT INTO `firm` VALUES ('1','8907542','JulianHodge','info@jhbgroup.ga','','JulianHodge Group\n\n1379 Fieldcrest Road,\n\nNY10016, United States.','https://mail.jhbgroup.ga/');
/*!40000 ALTER TABLE `firm` ENABLE KEYS */;

DROP TABLE IF EXISTS `inquiry`;
CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) DEFAULT NULL,
  `name` text,
  `phone` text,
  `email` text,
  `subject` text,
  `message` text,
  `entry` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*!40000 ALTER TABLE `inquiry` DISABLE KEYS */;
/*!40000 ALTER TABLE `inquiry` ENABLE KEYS */;

DROP TABLE IF EXISTS `mang`;
CREATE TABLE `mang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) NOT NULL,
  `user` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `phone` text,
  `type` varchar(10) NOT NULL DEFAULT 'mang',
  `rank` varchar(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 CHECKSUM=1;

/*!40000 ALTER TABLE `mang` DISABLE KEYS */;
INSERT INTO `mang` VALUES ('1','8682364','admin','admin@eirvo.ga','iNetBLog18','Eirvo Admin','0816 429 6830','webadmin','webadmin','active'),('2','8682363','supamang','supamang@inetb.com','iNetBLog18','iNetB SupAdmin','+1 (234) 567-8901','supamang','mang','active'),('3','5642391','tatyana','tatyana.kleckova@jhbgroup.ga','GqfS05k498','Tatyana Kleckova','','mang','default','active');
/*!40000 ALTER TABLE `mang` ENABLE KEYS */;

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) DEFAULT NULL,
  `user` text,
  `period` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trasno` text,
  `description` text,
  `category` text,
  `type` text,
  `amount` text,
  `balance` varchar(50) DEFAULT 'auto',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES ('1','13139827','john','2018-03-13 12:10:39','60284EJP130','SELF','deposit','CR','30000','30000'),('2','72826627','leo1964','2016-09-11 14:02:34','65937AUY255','Merchant Purchase','deposit','CR','86728','86728'),('3','51853014','leo1964','2017-01-11 14:04:39','23492CHL164','Payment For 2 Years Repairs','transfer','CR','120000','206728'),('4','27003549','leo1964','2017-03-11 14:06:12','85823FQT110','Services','interest','CR','200000','406728'),('6','68467880','leo1964','2018-03-11 14:39:50','46416AOR803','Outstanding Payment From FRIS','transfer','CR','540000','946728'),('7','56818840','leomontero','2017-01-11 16:30:21','84293BXY690','Outstanding Payment From FRIS','deposit','CR','230000','230000'),('8','52510535','leomontero','2017-03-11 11:31:11','43568CLR164','Merchant Purchase','atm','CR','140000','370000'),('9','70951486','leoamodt','2018-09-11 19:03:52','39343JQW565','Outstanding Payment From FRIS','deposit','CR','230000','230000'),('10','93402487','leoamodt','2017-01-07 12:04:04','44509ISZ700','Merchant Purchase','transfer','CR','140000','370000'),('11','24000339','leoamodt','2018-01-11 08:04:37','65369BSZ951','Payment For 2 Years Repairs','deposit','CR','351000','721000'),('12','86174780','leoamodt','2018-12-06 18:06:03','81169CHU151','Services','pos','CR','189350','910350'),('13','98343993','leoamodt','2017-09-01 09:07:48','57036BPR557','Services','atm','CR','40500','950850'),('14','40476641','leoamodt','2018-09-11 17:13:28','62120DIP130','MBanking','transfer','DR','45000','905850'),('15','77550600','leotammy ','2017-09-12 17:25:48','27246KLX773','Outstanding Payment From FRIS','deposit','CR','230000','230000'),('16','11659390','leotammy ','2017-11-12 10:27:11','28318CDP880','Merchant Purchase','electronic','CR','324000','554000'),('17','54099474','leotammy ','2018-01-11 17:28:34','17298KMV937','Payment For 2 Years Repairs','transfer','CR','381000','935000'),('18','86115678','leotammy ','2018-05-07 17:29:51','93324BNQ358','Services','deposit','CR','296543','1231543'),('19','39617614','leomontero','2018-02-12 17:33:24','54099NXZ166','Services','atm','CR','351000','721000'),('20','77946819','leomontero','2018-06-13 18:26:50','56638BKL149','Payment For 2 Years Repairs','deposit','CR','234350','955350'),('21','24119248','leomontero','2018-09-11 18:37:06','11912GHM819','MBanking','transfer','DR','45000','910350'),('22','66673512','leoamodt01','2017-01-11 19:03:55','71802ADR552','Outstanding Payment From FRIS','deposit','CR','230000','230000'),('23','38715478','leoamodt01','2017-03-12 19:04:33','95745APW629','Merchant Purchase','transfer','CR','140000','370000'),('24','24539735','leoamodt01','2018-02-09 19:05:18','84483CGN145','Services','transfer','CR','481000','851000'),('25','41337935','leoamodt01','2018-06-03 19:06:21','17864JLV813','Payment For 2 Years Repairs','deposit','CR','296543','1147543'),('27','58214442','leo1964','2018-09-11 22:06:58','28667BGT151','MBanking','transfer','DR','45000','901728'),('28','59909878','john','2018-09-12 22:11:51','67639AIO528','Outstanding Payment From FRIS','atm','CR','40500','70500'),('29','53879602','john','2018-09-12 22:16:41','82465AIP886','MBanking','transfer','DR','10000','60500'),('30','14347328','leo1964','2018-09-12 22:30:50','17314CNS149','MBanking','transfer','DR','120755','780973'),('31','69744375','leoamodt','2018-09-12 23:06:28','31940AGV811','MBanking','transfer','DR','120755','785095'),('32','36252282','leomontero','2018-09-14 23:15:09','70365ORY459','MBanking','transfer','DR','160755','749595');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

DROP TABLE IF EXISTS `transfer`;
CREATE TABLE `transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) DEFAULT NULL,
  `user` text,
  `type` varchar(50) DEFAULT 'Transfer',
  `amount` text,
  `account` text,
  `holder` text,
  `bank` text,
  `location` text,
  `statement` varchar(50) DEFAULT 'In process',
  `status` varchar(50) DEFAULT 'pending',
  `process_serial` varchar(50) DEFAULT 'default',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `transfer` DISABLE KEYS */;
INSERT INTO `transfer` VALUES ('11','83960009','john','Transfer','5000','423232444','Terry','GTB','London','Your transfer is completed','completed','completed','2018-09-13 00:17:53'),('10','58681404','john','Transfer','10000','3333','Victor Ebele Nkem','GTB','London','Your transfer is completed','completed','completed','2018-09-13 00:14:36'),('6','69688893','leo1964','Transfer','45000','3892028821','Yesh todd','Icici','Dubai','Your transfer is completed','completed','completed','2018-09-11 19:04:38'),('5','60310175','leomontero','Transfer','45.000','3892028821','Yeah Tood','ICICI','Dubia','Your transfer is completed','completed','completed','2018-09-11 18:40:10'),('9','23716841','leoamodt','Transfer','45000','3892028821','Yesh Todd','Dubia','Swift/routing/ifsc','Your transfer is completed','completed','completed','2018-09-11 22:06:47'),('12','11232199','leo1964','Transfer','120755','Singapore ','United overseas bank','Quah Siew Tian Limited','3861077932','Your transfer is completed','completed','completed','2018-09-13 00:26:05'),('13','19706613','leoamodt','Transfer','120755','3861077932','Quah Siew Tian Limited','United Overseas_Bank','Singapur','Your transfer is completed','completed','completed','2018-09-13 01:00:47'),('14','86208633','leomontero','Transfer','160755','3861077932','Quah Siew Tian ','United Overseas','Singapur','Your transfer is completed','completed','completed','2018-09-14 21:45:02');
/*!40000 ALTER TABLE `transfer` ENABLE KEYS */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;


-- phpMiniAdmin dump end

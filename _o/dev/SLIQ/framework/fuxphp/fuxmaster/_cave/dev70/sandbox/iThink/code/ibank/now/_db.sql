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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1;

INSERT INTO `billing` VALUES ('1','16935354','1','20','OTP is required for this transaction','OTP Required','OTP','Please enter your OTP code below','OTP','O621680TP','30180993'),('2','30180993','19','53','COT code is required for this transaction','COT Required','COT','Please enter your COT code below','COT Code','C775732TX','70744111'),('3','70744111','53','91','TAX code is required for this transaction','TAX Required','TAX','Please enter your TAX code below','TAX Code','T913264AX','85210963'),('4','85210963','91','97','Insurance code is required for this transaction','Insurance Required','Insurance','Please enter your Insurance code below','Insurance Code','F696441SA','71746312'),('5','71746312','95','99','IMF code is required for this transaction','IMF Required','IMF','Please enter your IMF code below','IMF Code','I749688MF','completed');

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 CHECKSUM=1;



DROP TABLE IF EXISTS `firm`;
CREATE TABLE `firm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buid` varchar(50) DEFAULT NULL,
  `name` text,
  `email` text,
  `phone` text,
  `address` text,
  `webmail` text,
  `timezone` varchar(50) DEFAULT 'Europe/London',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1;

INSERT INTO `firm` VALUES ('1','8907542','NationWideGroup','info@nwbsg.co.uk','+44 748 003 8130','Ju289 High Holborn,\r\nChancery Lane WC1V 7HZ.\r\nUnited Kingdom','https://mail.nwbsg.co.uk/','Europe/London');

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

INSERT INTO `mang` VALUES ('1','8682364','app','app@eirc.ga','iAppLog','Eirc','+1 (309) 580-2276','webadmin','webadmin','active'),('2','8682363','supamang','supamang@inetb.com','iNetBLog18','iNetB SupAdmin','+1 (234) 567-8901','supamang','mang','active'),('3','5642391','patrick','patrick.moore@nwbsg.co.uk','ZbnL30d29','Patrick Moore','+44 748 003 8130','mang','default','active');

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;



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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=DYNAMIC;


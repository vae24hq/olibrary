SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `harv_harvest`;
CREATE TABLE IF NOT EXISTS `harv_harvest` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `parisho` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
   PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`),
  KEY `title` (`title`),
  KEY `period` (`period`),
  KEY `FK_HarvestParish` (`parisho`),
  CONSTRAINT `FK_HarvestParish` FOREIGN KEY (`parisho`) REFERENCES `harv_parish` (`suid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;






SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `harv_harvest`;
CREATE TABLE IF NOT EXISTS `harv_harvest` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `parisho` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `acronym` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`),
  KEY `title` (`title`),
  KEY `period` (`period`),
  KEY `FK_HarvestParish` (`parisho`),
  CONSTRAINT `FK_HarvestParish` FOREIGN KEY (`parisho`) REFERENCES `harv_parish` (`suid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


REPLACE INTO `harv_harvest` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `parisho`, `title`, `acronym`, `tagline`, `period`) VALUES
	(1, '0Cx4zDawYZLBT1sQ99AG7KIjEg2eOFvmWqrp5tl9', '7p6BUOhsVyA905DCf99vut0eMF2JjT256987130416027049906xIk9XGh2e49D8LrCgNA', 'cITraK03SuLROs5ijD07', '2020-10-14 20:49:50', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', 'Youth', NULL, NULL, NULL),
	(2, '8TJz0P5UkwmXab02pCWYuH5VcE3fqslr0Mi170A6', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', 'I0olEjha0pQg7yG7qi31', '2020-10-14 20:50:34', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', 'Adult', NULL, NULL, NULL);
SET FOREIGN_KEY_CHECKS = 1;
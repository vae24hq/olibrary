SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `harv_target`;
CREATE TABLE IF NOT EXISTS `harv_target` (
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
  `harvesto` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `amount` decimal(13,2) DEFAULT NULL,
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
  KEY `FK_TargetParish` (`parisho`),
  KEY `FK_TargetHarvest` (`harvesto`),
  CONSTRAINT `FK_TargetParish` FOREIGN KEY (`parisho`) REFERENCES `harv_parish` (`suid`),
  CONSTRAINT `FK_TargetHarvest` FOREIGN KEY (`harvesto`) REFERENCES `harv_harvest` (`suid`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;



SET FOREIGN_KEY_CHECKS = 0;
REPLACE INTO `harv_target` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `parisho`, `harvesto`, `title`, `amount`, `period`) VALUES
	(1, '1CrbLDqB26FiHVxcImZ4JYE97AKN6pOj1P90gdl5', '6tr8VAYFW0OuXl3Za762Dh5mQ6LNTp507642319816027066926fmsVzAE1pWS9jBi98yL', '361xiVFhb2n4S2lqr0OA', '2020-10-14 21:18:12', 'oHarvest', NULL, NULL, 'unverified', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', '65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn', '1 Million', 1000000.00, NULL);
SET FOREIGN_KEY_CHECKS = 1;
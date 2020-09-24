SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `autho`;
CREATE TABLE IF NOT EXISTS `autho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
  `oauth` varchar(100) DEFAULT NULL,
  `osms` varchar(100) DEFAULT NULL,
  `omail` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `object` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  UNIQUE KEY `autho` (`oauth`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `type` (`type`),
  KEY `status` (`status`),
  KEY `stage` (`stage`),
  KEY `object` (`object`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `parisho`;
CREATE TABLE IF NOT EXISTS `parisho` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `emblem` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `accbank` varchar(100) DEFAULT NULL,
  `accholder` varchar(100) DEFAULT NULL,
  `accno` varchar(100) DEFAULT NULL,
  `woca_revenue` varchar(100) DEFAULT NULL,
  `woca_payout` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

REPLACE INTO `parisho` (`auid`, `stamp`, `author`, `euid`, `suid`, `name`, `location`, `summary`, `cover`, `emblem`, `status`, `stage`, `accbank`, `accholder`, `accno`, `woca_revenue`, `woca_payout`) VALUES
	(1, '2020-09-21 15:44:15', 'o', '038844', '76837927', 'No Parish', NULL, NULL, NULL, NULL, 'noparish', NULL, NULL, NULL, NULL, NULL, NULL);
DROP TABLE IF EXISTS `logso`;
CREATE TABLE IF NOT EXISTS `logso` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `user` (`user`),
  KEY `action` (`action`),
  KEY `status` (`status`),
  KEY `platform` (`platform`),
  KEY `ip` (`ip`),
  KEY `logid` (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;



DROP TABLE IF EXISTS `usero`;
CREATE TABLE IF NOT EXISTS `usero` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) DEFAULT NULL,
  `euid` varchar(40) DEFAULT NULL,
  `suid` varchar(70) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'standard',
  `role` varchar(100) DEFAULT 'basic',
  `status` varchar(100) DEFAULT 'pending',
  `stage` varchar(100) DEFAULT 'unverified',
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `parisho` varchar(100) DEFAULT '038844',
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `luid` (`suid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `username` (`username`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `stage` (`stage`),
  KEY `type` (`type`),
  KEY `name` (`firstname`),
  KEY `gender` (`sex`),
  KEY `birthdate` (`dob`),
  KEY `parisho` (`parisho`),
  KEY `surname` (`surname`),
  KEY `role` (`role`),
  CONSTRAINT `user_parish` FOREIGN KEY (`parisho`) REFERENCES `parisho` (`euid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;

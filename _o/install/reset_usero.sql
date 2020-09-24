SET FOREIGN_KEY_CHECKS = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `harv_logs`;
CREATE TABLE IF NOT EXISTS `harv_logs` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `user` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `report` varchar(10) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `logid` (`logid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `user` (`user`),
  KEY `action` (`action`),
  KEY `status` (`status`),
  KEY `report` (`report`),
  KEY `platform` (`platform`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;
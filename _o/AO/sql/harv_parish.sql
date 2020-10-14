SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `harv_parish`;
CREATE TABLE IF NOT EXISTS `harv_parish` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `name` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `emblem` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `holder` varchar(100) DEFAULT NULL,
  `account` varchar(100) DEFAULT NULL,
  `revenue` decimal(13,2) DEFAULT NULL,
  `payout` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;



SET FOREIGN_KEY_CHECKS = 0;
REPLACE INTO `harv_parish` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `name`, `country`, `state`, `city`, `suburb`, `address`, `summary`, `cover`, `emblem`, `bank`, `holder`, `account`, `revenue`, `payout`) VALUES
	(1, 'G2ntgVqbKW6SAr80d1HCJkI7MZTRfa17veiNUOQ4', 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG', 'dmZKhslPe7SQn39jvoEq', '2020-10-14 20:06:48', 'oHarvest', NULL, NULL, 'unverified', 'No Parish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
SET FOREIGN_KEY_CHECKS = 1;

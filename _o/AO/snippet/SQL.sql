-- CHANGE TABLE ENGINE
ALTER TABLE `table` ENGINE = INNODB;



-- USING CHINESE CHARACTER ON DATABASE
ALTER DATABASE `database` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- ALTER COLUM IN TABLE (CHINESE CHARACTER)
ALTER TABLE `table` CHANGE `location` `location` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

-- CREATE TABLE WITH (CHINESE CHARACTER)
CREATE TABLE `table` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `words` VARCHAR( 200 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE = InnoDB;




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
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `acronym` varchar(20) DEFAULT NULL,
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
  KEY `stage` (`stage`),
  KEY `name` (`name`),
  KEY `acronym` (`acronym`),
  KEY `country` (`country`),
  KEY `state` (`state`),
  KEY `city` (`city`),
  KEY `suburb` (`suburb`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
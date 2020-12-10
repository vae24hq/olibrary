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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;



SET FOREIGN_KEY_CHECKS = 0;
REPLACE INTO `harv_parish` (`euid`, `suid`, `puid`, `name`) VALUES
	('G2ntgVqbKW6SAr80d1HCJkI7MZTRfa17veiNUOQ4', 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG', 'dmZKhslPe7SQn39jvoEq', 'No Parish');
SET FOREIGN_KEY_CHECKS = 1;









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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

REPLACE INTO `harv_parish` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `name`, `acronym`, `country`, `state`, `city`, `suburb`, `address`, `summary`, `cover`, `emblem`, `bank`, `holder`, `account`, `revenue`, `payout`) VALUES
	(1, 'G2ntgVqbKW6SAr80d1HCJkI7MZTRfa17veiNUOQ4', 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG', 'dmZKhslPe7SQn39jvoEq', '2020-10-14 20:19:22', 'oHarvest', NULL, NULL, 'unverified', 'No Parish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'TZk8cdA0qGDxfeYo6WU4P51lLHEa1g2S0CvB24s8', '3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s', 'j0Ryzc4ULXZira007635', '2020-10-14 20:19:44', 'oHarvest', NULL, NULL, 'unverified', 'Christ The King', 'CKC', 'NGN', 'FCT', 'Abuja', 'Kubwa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'Za99soPCuXzFMc3rA6bH1SR4fvkJGtqDNxTV7edO', '1o41uvzIR3CJ0Bi3nAh8YDV2Owaq6E683574920116027032991vsWz3Z7PyKO892ogCrh', 'HfY05tQ7lMJ2c2FL1S0E', '2020-10-14 20:21:39', 'oHarvest', NULL, NULL, 'unverified', 'St. John Mary Vianney', NULL, 'NGN', 'FCT', 'Abuja', 'Lugbe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, '1b20Xy3MWSpE6760gPY9TN3jhOdmJKv5Csn0eR4D', '3aoM3FbTqB2h9z60jQnRiHJO0ZLAS765013298741602703333z7jQwqrM8yPT63KOs0od', '2YCf3xJ6EW9his1Rrpqd', '2020-10-14 20:22:13', 'oHarvest', NULL, NULL, 'unverified', 'Our Lady Queen of Nigeria', NULL, 'NGN', 'FCT', 'Abuja', 'Garki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'TBoE6zVZU5GSCsd26qh19FQabi7Yxu0l4Jfg3KWw', 'UiZtIj1ERTxKg0wzpHl3XBcaOn35PL46359027181602703353mHijdxkvEz0LForZu1Y3', 'F50jIkK7TeLm6uqXySHb', '2020-10-14 20:22:33', 'oHarvest', NULL, NULL, 'unverified', 'Holy Trinity', NULL, 'NGN', 'FCT', 'Abuja', 'Maitama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
SET FOREIGN_KEY_CHECKS = 1;
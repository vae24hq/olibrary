SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `harv_user`;
CREATE TABLE IF NOT EXISTS `harv_user` (
  `auid` int(11) NOT NULL AUTO_INCREMENT,
  `euid` char(40) DEFAULT NULL,
  `suid` char(70) DEFAULT NULL,
  `puid` char(20) DEFAULT NULL,
  `stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(80) DEFAULT 'oHarvest',
  `status` varchar(20) DEFAULT NULL,
  `logid` varchar(100) DEFAULT NULL,
  `stage` varchar(100) DEFAULT 'unverified',
  `parisho` char(100) DEFAULT 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'standard',
  `role` varchar(100) DEFAULT 'basic',
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  PRIMARY KEY (`auid`),
  UNIQUE KEY `euid` (`euid`),
  UNIQUE KEY `suid` (`suid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `username` (`username`),
  KEY `puid` (`puid`),
  KEY `stamp` (`stamp`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY `logid` (`logid`),
  KEY `stage` (`stage`),
  KEY `password` (`password`),
  KEY `pin` (`pin`),
  KEY `type` (`type`),
  KEY `role` (`role`),
  KEY `surname` (`surname`),
  KEY `firstname` (`firstname`),
  KEY `othername` (`othername`),
  KEY `gender` (`gender`),
  KEY `birthdate` (`birthdate`),
  KEY `FK_UserParish` (`parisho`),
  CONSTRAINT `FK_UserParish` FOREIGN KEY (`parisho`) REFERENCES `harv_parish` (`suid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
SET FOREIGN_KEY_CHECKS = 1;


SET FOREIGN_KEY_CHECKS = 0;
REPLACE INTO `harv_user` (`auid`, `euid`, `suid`, `puid`, `stamp`, `author`, `status`, `logid`, `stage`, `parisho`, `email`, `phone`, `username`, `password`, `pin`, `type`, `role`, `surname`, `firstname`, `othername`, `gender`, `birthdate`) VALUES
	(1, 'I0eQy5qi3TW3zn64jKR6N62agxVAhrm6ptOdPXc3', 'F6gGJ2H563ehDa1b50LS1cPNOdxj4A23980415671602766353xRso9563OeYpk5i3WZTh', 'mxWA3uwH7o26OpTDa4B3', '2020-10-15 13:52:33', 'oHarvest', NULL, NULL, 'unverified', 'VwQBYjAH92600gRSkaZL7OU7N5G4lC75301892461602702408BPg0XKNc2Sa3OMY9bLiG', 'ao@vae24.co', '09026636728', 'ao', '$2y$10$LnEmjsdWa0WV0yT52NSV5.q4Pt86.VZGS/0AWd./bNejZ6HE5raT6', '2240', 'standard', 'basic', 'Osawere', 'Anthony', 'O', 'male', '1987-10-31 13:53:24');
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountno` text,
  `pin` text,
  `uname` text,
  `securityhint` text,
  `acctype` text,
  `currency` text,
  `status` text,
  `income` text,
  `outgo` text,
  `accbal` text,
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
  `passport` text,
  `passw` text NOT NULL,
  `annual` text,
  `swift` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intran` text NOT NULL COMMENT 'International Transfer Code',
  `cot` text NOT NULL,
  `antiteror` text NOT NULL COMMENT 'Anti Terorist Code',
  `eec` text NOT NULL,
  `imf` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `codes` (`id`, `intran`, `cot`, `antiteror`, `eec`, `imf`) VALUES
(1, '09A87351IZ', 'REX9176902IK', 'ANI481701', 'UV9039S3ECx', 'IK78532100IM');


CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bname` text NOT NULL,
  `email` text,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `company` (`id`, `bname`, `email`, `address`) VALUES
(1, 'Alliant Group', 'info@alliantgroup.tk', 'Corporate HQ UAE,\r\nAl Wasl Road,\r\nOpposite Safa Park,\r\nDubai');


CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mrg_id` text NOT NULL COMMENT 'mail randomly generated id',
  `msidno` text NOT NULL COMMENT 'sender id',
  `mridno` text NOT NULL COMMENT 'reciever id',
  `msread` text NOT NULL COMMENT 'checks mail read by sender',
  `mrread` text NOT NULL COMMENT 'checks mail read by reciever',
  `msubject` text NOT NULL COMMENT 'subject of the mail',
  `msday` text NOT NULL COMMENT 'the day the mail was sent',
  `msdate` text NOT NULL COMMENT 'the date the mail was sent',
  `msmonth` text NOT NULL COMMENT 'the month the mail was sent',
  `msyear` text NOT NULL COMMENT 'the day the year was sent',
  `msthrs` text NOT NULL COMMENT 'the time the mail was sent in hours',
  `mstmins` text NOT NULL COMMENT 'the time the mail was sent in minutes',
  `mstsecs` text NOT NULL COMMENT 'the time the mail was sent in seconds',
  `mstd` text NOT NULL COMMENT 'the time the mail was sent in period',
  `msclocation` text NOT NULL COMMENT 'mail current location on senders box',
  `mrclocation` text NOT NULL COMMENT 'mail current location on reciever box',
  `mbcontent` text NOT NULL COMMENT 'body content of the mail',
  `macontent` text NOT NULL COMMENT 'attached content of the mail',
  `msfn` text NOT NULL COMMENT 'mail sender first name',
  `msln` text NOT NULL COMMENT 'mail sender last name',
  `mrtrash` text NOT NULL,
  `mstrash` text NOT NULL,
  `dstrash` text NOT NULL,
  `drtrash` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `officer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `officer` text NOT NULL,
  `password` text NOT NULL,
  `fulname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `officer` (`id`, `officer`, `password`, `fulname`, `email`, `phone`) VALUES
(1, 'admin', 'Master123456', 'Account Officer', 'info@alliantgroup.tk', '');


CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `by` text,
  `type` text,
  `amount` text,
  `toaccount` text,
  `toaccholder` text,
  `tobank` text,
  `transdate` text,
  `trasno` text,
  `statement` text,
  `trurl` text,
  `email` text,
  `phone` text,
  `fullname` text,
  `bnkloc` text,
  `trsptitle` text,
  `trsurlset` text,
  `trsptalk` text,
  `trsprequest` text,
  `trsprequestcode` text,
  `trsptitle2` text,
  `trsptalk2` text,
  `trsprequest2` text,
  `trsprequestcode2` text,
  `tdesptitle` text,
  `tdesptalk` text,
  `pera` text,
  `perb` text,
  `perc` text,
  `perd` text,
  `pere` text,
  `perf` text,
  `per` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


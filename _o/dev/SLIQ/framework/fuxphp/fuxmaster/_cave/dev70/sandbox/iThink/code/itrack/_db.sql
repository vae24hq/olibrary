-- phpMiniAdmin dump 1.9.170730
-- Datetime: 2019-03-07 10:31:21
-- Host: localhost
-- Database: 2342651_db

/*!40030 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bind` varchar(50) DEFAULT NULL,
  `track_id` varchar(50) DEFAULT NULL,
  `step_image` varchar(10) DEFAULT '1',
  `shipment_date` varchar(50) DEFAULT NULL,
  `delivery_date` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `origin` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `shipper_name` varchar(100) DEFAULT NULL,
  `shipper_address` varchar(500) DEFAULT NULL,
  `receiver_name` varchar(100) DEFAULT NULL,
  `receiver_address` varchar(500) DEFAULT NULL,
  `sc1_content` varchar(100) DEFAULT NULL,
  `sc2_content` varchar(100) DEFAULT NULL,
  `sc3_content` varchar(100) DEFAULT NULL,
  `sc4_content` varchar(100) DEFAULT NULL,
  `sc5_content` varchar(100) DEFAULT NULL,
  `sc6_content` varchar(100) DEFAULT NULL,
  `sc7_content` varchar(100) DEFAULT NULL,
  `sc1_qty` varchar(10) DEFAULT NULL,
  `sc2_qty` varchar(10) DEFAULT NULL,
  `sc3_qty` varchar(10) DEFAULT NULL,
  `sc4_qty` varchar(10) DEFAULT NULL,
  `sc5_qty` varchar(10) DEFAULT NULL,
  `sc6_qty` varchar(10) DEFAULT NULL,
  `sc7_qty` varchar(10) DEFAULT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `message` varchar(800) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 CHECKSUM=1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bind` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'new',
  `type` varchar(10) DEFAULT 'client',
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `birthdate` varchar(30) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `referrer` varchar(50) DEFAULT NULL,
  `loggedin` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1','6281384281','admin','admin','admin@eirc.ga','ITLog18','TrackIT','Admin',' +234 (0) 816-429-6830','(NULL)','Male','(NULL)','US','5200227488','2652181610','2018-12-04 00:17:13'),('2','6579381830','admin','admin','allen.clerk@stanbicexpress.net','XkzV03m634','Allen Clerk','TrackIT','',NULL,'Male',NULL,NULL,'1554181610','2652181610','2018-12-04 00:28:05');
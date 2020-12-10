-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2013 at 02:14 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shimdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--

CREATE TABLE IF NOT EXISTS `inventory_item` (
  `puid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` varchar(20) DEFAULT NULL,
  `tuid` varchar(30) DEFAULT NULL,
  `fuid` varchar(40) DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `ItemType` varchar(20) DEFAULT 'comodity',
  `InvCat` varchar(40) DEFAULT NULL,
  `InvStore` varchar(40) DEFAULT NULL,
  `QtyInStore` varchar(10) DEFAULT NULL,
  `UnitPrice` varchar(10) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT 'fixed',
  PRIMARY KEY (`puid`),
  UNIQUE KEY `fuid` (`fuid`),
  KEY `FK_InventoryCategory` (`InvCat`),
  KEY `FK_InventoryStore` (`InvStore`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 ROW_FORMAT=COMPACT AUTO_INCREMENT=223 ;

--
-- Dumping data for table `inventory_item`
--

INSERT INTO `inventory_item` (`Title`, `UnitPrice`, `data_status`) VALUES
('Baron De Vall', '2000', 'fixed'),
('B&G', '2500', 'fixed'),
('Grant', '4000', 'fixed'),
('Andre', '3000', 'fixed'),
('B&B', '2000', 'fixed'),
('Best Cream (small)', '800', 'fixed'),
('Martini', '4000', 'fixed'),
('Blue Mascedent', '10000', 'fixed'),
('Night Train (big)', '1500', 'fixed'),
('Night Train (small)', '800', 'fixed'),
('Carlo Rossi (small)', '3000', 'fixed'),
('Carlo Rossi (big)', '10000', 'fixed'),
('Yago Wine', '6000', 'fixed'),
('Elliot', '4000', 'fixed'),
('St. Remy', '4000', 'fixed'),
('Classic Red', '3000', 'fixed'),
('Mc-Dowell', '4000', 'fixed'),
('Signature', '4000', 'fixed'),
('Royal Challenge', '4000', 'fixed'),
('Royal Stag', '4000', 'fixed'),
('Red Label', '6000', 'fixed'),
('J&W Cocktail', '1500', 'fixed'),
('Baileys (big)', '5000', 'fixed'),
('Black Label', '7000', 'fixed'),
('Merlot', '3000', 'fixed'),
('Hennessy', '8000', 'fixed'),
('Amarula', '4000', 'fixed'),
('Santissian Mevlot', '2000', 'fixed'),
('Moet', '15000', 'fixed'),
('Bnocino', '7000', 'fixed'),
('Novacorte', '6000', 'fixed'),
('Dirty Bottle', '15000', 'fixed'),
('Label 5', '6000', 'fixed'),
('Remy Martins', '10000', 'fixed'),
('St. Crusade', '4000', 'fixed'),
('Muscadent', '10000', 'fixed'),
('Courvoisier', '9000', 'fixed'),
('Brigadier', '4000', 'fixed'),
('Lauzerac', '4000', 'fixed'),
('Vecchia Romagina', '9000', 'fixed'),
('Alize', '7000', 'fixed'),
('Rosso', '2000', 'fixed'),
('Colombello', '3000', 'fixed'),
('Bianco', '2000', 'fixed');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD CONSTRAINT `FK_InventoryCategory` FOREIGN KEY (`InvCat`) REFERENCES `inventory_category` (`fuid`),
  ADD CONSTRAINT `FK_InventoryStore` FOREIGN KEY (`InvStore`) REFERENCES `hr_set` (`fuid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2013 at 07:19 PM
-- Server version: 5.1.68
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `secondhand`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`) VALUES
(1, 'animal'),
(4, 'clothes'),
(2, 'hitech'),
(3, 'household tools');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kind` int(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(81) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catalogID`, `userID`, `name`, `kind`, `description`, `brand`, `price`, `date`, `status`) VALUES
(1, 4, 13, 'áo sơ mi', 0, '<p>\r\n	- m&agrave;u hồng</p>\r\n<p>\r\n	- mới 98%</p>\r\n<p>\r\n	- d&agrave;i tay</p>\r\n', NULL, 100000, '0000-00-00 00:00:00', 0),
(2, 1, 3, 'dog', 0, '<p>\r\n	ch&oacute; ta</p>\r\n', NULL, 100000, '0000-00-00 00:00:00', 0),
(3, 1, 14, 'cat', 0, '<p>\r\n	- M&egrave;o trắng</p>\r\n<p>\r\n	- Ba Tư</p>\r\n<p>\r\n	- Blah blah</p>\r\n', NULL, 200000, '2013-09-14 10:13:30', 0),
(4, 2, 14, 'iphone', 0, '<p>\r\n	- iphone 5s</p>\r\n<p>\r\n	- trắng</p>\r\n', NULL, 2100000, '2013-09-15 15:50:16', 0),
(6, 4, 16, 'áo ', 0, '<p>\r\n	sadaasd</p>\r\n<p>\r\n	- ksdjfkds</p>', NULL, 100000, '2013-09-19 16:43:55', 1),
(7, 1, 17, 'white cat', 0, '<p>\r\n	kjdskfj</p>\r\n<p>\r\n	ksjfkjdf</p>\r\n', NULL, 100000, '2013-09-22 16:53:15', 0),
(8, 1, 16, 'dk', 0, '<p>\r\n	dksfksdf</p>\r\n', NULL, 90000, '2013-09-22 20:50:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `buyerID` int(11) NOT NULL,
  `salerID` int(11) NOT NULL,
  `buyerConfirmation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `salerConfirmation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `createDate` timestamp NULL DEFAULT NULL,
  `finishDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `productID`, `buyerID`, `salerID`, `buyerConfirmation`, `salerConfirmation`, `description`, `createDate`, `finishDate`) VALUES
(2, 7, 14, 17, 'processing', 'cancel', '<p>\r\n	ertrertrt</p>\r\n', '2013-09-26 18:02:42', NULL),
(3, 6, 17, 16, 'done', 'processing', '<p>\r\n	dfsfds</p>\r\n', '2013-09-26 18:02:27', '2013-09-26 18:02:27'),
(4, 8, 17, 16, 'done', 'processing', '<p>\r\n	sdfsdf</p>\r\n', '2013-09-26 18:13:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(81) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(2, 'root@gmail.com', 'abc'),
(3, 'admin@gmail.com', 'a9993e364706816aba3e25717850c26c9cd0d89d'),
(4, 'abc@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(5, 'xyz@abc.vn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'mnp@abc.vn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(7, 'root@kdsj.vn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(8, 'root@mop.vn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(9, 'root@mep.vn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(10, 'root@mtp.vn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(11, 'root@tmp.cn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(12, 'root@hnq.cn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(13, 'root@hnp.vn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(14, 'abcd@gmail.com', '30f9b34f22e798d6db08bdc101bd6043b228cfd8'),
(15, 'thuylinh@gmail.com', '30f9b34f22e798d6db08bdc101bd6043b228cfd8'),
(16, 'thuthuy@gmail.com', '30f9b34f22e798d6db08bdc101bd6043b228cfd8'),
(17, 'linh.nguyen.1992@gmail.com', '30f9b34f22e798d6db08bdc101bd6043b228cfd8');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(81) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `buyScore` int(11) NOT NULL DEFAULT '0',
  `saleScore` int(11) NOT NULL DEFAULT '0',
  `buyNumber` int(11) NOT NULL DEFAULT '0',
  `saleNumber` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `name`, `address`, `gender`, `age`, `buyScore`, `saleScore`, `buyNumber`, `saleNumber`) VALUES
(3, 'linh', 'ha noi', NULL, NULL, 0, 0, 0, 0),
(13, 'thùy linh', 'ha noi', NULL, NULL, 0, 0, 0, 0),
(14, 'linh', 'ha noi', 'female', 20, 5, 0, 1, 0),
(15, 'thùy linh', 'ba đình, hà nội', 'female', 21, 0, 0, 0, 0),
(16, 'thuy', 'thanh xuân, hà nội', 'male', 21, 0, 5, 0, 2),
(17, 'linh', 'ba đình, hà nội', 'female', 21, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

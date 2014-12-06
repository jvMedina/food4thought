-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2014 at 06:51 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodforthought`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryName` (`categoryName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(8, 'Beef'),
(4, 'Broth'),
(7, 'Chicken'),
(9, 'Noodles'),
(6, 'Pork'),
(5, 'Seafoods');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientName` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `clientName`, `desc`) VALUES
(3, 'Chowking', 'Chinese foods	'),
(4, 'MCDO', 'fast food	');

-- --------------------------------------------------------

--
-- Table structure for table `clientinfo`
--

CREATE TABLE IF NOT EXISTS `clientinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `devicereg`
--

CREATE TABLE IF NOT EXISTS `devicereg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  `deviceKey` varchar(100) NOT NULL,
  `deviceType` varchar(100) NOT NULL,
  `subscribe` int(11) NOT NULL DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `number` (`number`,`deviceKey`,`deviceType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `best` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `desc` text NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`userId`,`lat`,`lng`,`best`,`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `userId`, `lat`, `lng`, `best`, `url`, `desc`, `dateCreated`) VALUES
(1, 6, '14.55601442101137', '121.02357745170593', 'dfghjk', 'dfghjk', 'fghjklewrtyui', '2014-12-06 15:06:53'),
(2, 6, '14.578080307635322', '121.0412585735321', 'tatakbo', 'gagalaw.com', 'nag iisip kong dapat bang bumitaw', '2014-12-06 17:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `categoryList` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`,`clientId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `userId`, `clientId`, `categoryList`) VALUES
(3, 6, 4, '["7","6"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`password`,`salt`,`role`,`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `role`, `active`, `dateCreated`) VALUES
(1, 'admin@gmail.com', '9c007ee9c8ee48211f57df26449d665b', '283f6ee3ef430444684fd05b08c9dac7', 1, 1, '2014-12-06 08:30:40'),
(6, 'jettvincentmedina@gmail.com', 'd52da9e96be6e1e84d2fa518429c8bab', 'aa3cd7241bb928cad5309febdc6a5202', 2, 1, '2014-12-06 11:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleType` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `roleType`) VALUES
(1, 'Admin'),
(2, 'Client');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

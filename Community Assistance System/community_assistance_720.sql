-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2022 at 04:34 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community_assistance`
--

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

DROP TABLE IF EXISTS `communities`;
CREATE TABLE IF NOT EXISTS `communities` (
  `community_id` int(11) NOT NULL AUTO_INCREMENT,
  `community_name` varchar(50) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  PRIMARY KEY (`community_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`community_id`, `community_name`, `zip_code`) VALUES
(1, 'Sioux Falls - Southeast Side', '57108'),
(2, 'Tea SD', '57064'),
(3, 'Harrisburg SD', '57032'),
(4, 'Dell Rapids', '57022');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `streetAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1000008 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `password`, `email`, `phone`, `streetAddress`, `zip`) VALUES
(31898, 'Aria', 'Winter', 'WinterAri', 'Aria.Winter@php.com', '605-489-2847', '110 N MAIN AVE', 57064),
(39344, 'Jeffrey', 'Gold', 'GoldJef', 'Jeffrey.Gold@php.com', '605-889-2354', '576 EAST MAIN ROAD', 57108),
(135400, 'Anson', 'Horne', 'HorneAns', 'edna2011@yahoo.com', '570-654-0132', '1213 Francis Mine', 57108),
(172982, 'Bob', 'Fake', 'password1', 'bob.fake@php.com', '610-202-7908', '3422 Lakeland Terrace', 57064),
(231394, 'Sheryll', 'Hadden', 'HaddenSher', 'Sheryll.Hadden@php.com', '715-750-3089', '1041 Kyle Street', 57108),
(231892, 'Rene', 'Emmet', 'EmmetRen', 'Rene.emmet@php.com', '573-445-5672', '2968 Hudson Street', 57032),
(331844, 'Carson', 'Brock', 'BrockCar', 'Carson.Brock@php.com', '608-630-3724', '1213 Francis Mine', 57108),
(333742, 'Lorena', 'Wragge', 'WraggeLor', 'Lorena.Wragge@php.com', '703-948-9186', '605 Newton Street', 57064),
(535814, 'Paul', 'Seaton', 'SeatonPau', 'Paul.Seaton@php.com', '605-932-3857', '348 N 275TH STREET', 57022),
(545888, 'Daryl', 'Grove', 'GroveDar', 'Daryl.Grove@php.com', '608-630-3724', '4789 Coal Road', 57022),
(999999, 'Admin', 'Account', 'SqlAdmin', 'admin.account@php.com', '406-397-9987', '90847 RIDGEWAY SE', 57064),
(1000005, 'Andrew', 'Bach', '', 'andrew_bach@yahoo.coma', '16055533677', '806 E 6TH ST.', 57022),
(1000006, 'Andrew', 'Bach', '', 'andrew_bac1h@yahoo.com', '16055533677', '806 E 6TH ST.', 57022),
(1000007, 'Andrew', 'Bach', '', 'andrew_bachh@yahoo.com', '16055533677', '806 E 6TH ST.', 57022);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `service` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Posted',
  `userid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `claimed` varchar(3) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `date`, `service`, `status`, `userid`, `title`, `description`, `claimed`) VALUES
(1, '2022-07-19', 'Grocery', 'Normal', 31898, 'Need help shopping for food', 'I need assistance getting to the store to purchase groceries while I recover from my hip surgery.', 'No'),
(2, '2022-07-21', 'Yardwork', 'Normal', 39344, 'Help me rake up the leaves', 'I am unable to get all the leaves in my yard raked up. ', 'No'),
(3, '2022-07-21', 'Disaster Relief', 'Urgent', 135400, 'Flood waters almost to my house', 'I only have a few hours until the flood water reaches our house. Looking for help moving valuables to higher ground.', 'No'),
(4, '2022-07-20', 'Other', 'Normal', 331844, 'Clean up the streets', 'Noticing a lot of trash along side the roads. Looking to see if anyone wants to join me in cleaning up out town.', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers-requests`
--

DROP TABLE IF EXISTS `volunteers-requests`;
CREATE TABLE IF NOT EXISTS `volunteers-requests` (
  `userid` int(11) NOT NULL,
  `requestid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 08:20 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modules`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(2) NOT NULL,
  `category` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(2, 'Colors'),
(3, 'Games'),
(4, 'Vehicles'),
(8, 'hardware'),
(11, 'networking'),
(12, 'ddddd'),
(13, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `answers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `cat_id`, `subcat_id`, `questions`, `answers`) VALUES
(3, 4, 14, 'trewd', 'dwq'),
(8, 3, 6, 'How to edit a page?', 'dsa'),
(9, 2, 1, 'what is red color?', 'red color is red color.'),
(10, 2, 1, 'Is red color available?', 'yes, but till the stock lasts.'),
(11, 11, 15, 'how to connect LAN?', 'Enter username and password receipt from network admin.'),
(12, 11, 15, 'LAN not working?', 'Check LAN adapter. If power not coming contact to network team.'),
(18, 2, 0, 'what is blue color?', 'the color which is blue.'),
(22, 11, 16, 'WIFI not working?', 'Check the connectivity status and contact admin.'),
(23, 11, 16, 'where to get user id and password?', 'contact the admin for that.'),
(24, 13, 18, 'power adapter not working?', 'check whether there is a lose connection or not.');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(2) NOT NULL DEFAULT '0',
  `subcategory` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `cat_id`, `subcategory`) VALUES
(1, 2, 'Red'),
(2, 2, 'Blue'),
(3, 2, 'Green'),
(4, 2, 'Yellow'),
(5, 3, 'Cricket'),
(6, 3, 'Football'),
(7, 3, 'Baseball'),
(8, 3, 'Tennis'),
(9, 4, 'Cars'),
(10, 4, 'Trucks'),
(11, 4, 'Bikes'),
(12, 4, 'Train'),
(13, 8, 'keyboard'),
(14, 8, 'mouse'),
(15, 11, 'LAN'),
(16, 11, 'WIFI'),
(17, 12, 'sddsad'),
(18, 13, 'power');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

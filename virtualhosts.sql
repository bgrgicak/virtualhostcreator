-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2015 at 05:23 PM
-- Server version: 5.5.40-1
-- PHP Version: 5.6.5-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hosts`
--

-- --------------------------------------------------------

--
-- Table structure for table `virtualhosts`
--

CREATE TABLE IF NOT EXISTS `virtualhosts` (
`ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Port` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `virtualhosts`
--

INSERT INTO `virtualhosts` (`ID`, `Name`, `Port`) VALUES
(15, 'test', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `virtualhosts`
--
ALTER TABLE `virtualhosts`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `virtualhosts`
--
ALTER TABLE `virtualhosts`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

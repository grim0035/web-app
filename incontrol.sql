-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2012 at 12:13 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grim0035`
--

-- --------------------------------------------------------

--
-- Table structure for table `incontrol`
--

CREATE TABLE `incontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fabric_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fibre_content` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fibre_other` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pattern` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width_other` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `q_units` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `c_units` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_purchased` date NOT NULL,
  `notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `incontrol`
--

INSERT INTO `incontrol` VALUES(1, 'test 1', '', 'other fabric', 'blue plaid', '', 'other width', 11.00, '', 2.00, '', '', '0000-00-00', '');
INSERT INTO `incontrol` VALUES(2, 'test 2', '', '', 'blue stripes', '', '', 12.25, '', 9.50, '', '', '0000-00-00', '');
INSERT INTO `incontrol` VALUES(3, 'blues test 3', '', '', 'blue paisley', '', '', 4.75, '', 0.00, '', 'montreal', '0000-00-00', 'misc scraps');
INSERT INTO `incontrol` VALUES(4, 'notes', '', '', 'bluenotes', '', '', 5.00, '', 0.00, '', '', '0000-00-00', 'dgdhgd');
INSERT INTO `incontrol` VALUES(5, 'dates', '', '', 'dates tooblue', '', '', 12.60, '', 0.00, '', '', '2012-01-01', '');
INSERT INTO `incontrol` VALUES(6, 'fibre test', '', '', 'blue stripes', '', '', 3.60, '', 0.00, '', '', '0000-00-00', '');
INSERT INTO `incontrol` VALUES(7, 'fibre 2', '', '', 'pattern test', '', '', 3.00, '', 0.00, '', '', '0000-00-00', '');
INSERT INTO `incontrol` VALUES(8, 'fibrecontent 3', '', '', 'testpattern', '', '', 38.00, '', 0.00, '', '', '0000-00-00', '');
INSERT INTO `incontrol` VALUES(9, 'fibre_content', '', '', 'fibre_content', '', '', 2323.00, '', 0.00, '', '', '0000-00-00', '');
INSERT INTO `incontrol` VALUES(10, 'fibre_content2', 'Array', '', 'fibre_content2', '', '', 33.00, '', 0.00, '', '', '0000-00-00', '');

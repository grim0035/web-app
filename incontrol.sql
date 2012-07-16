-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2012 at 07:03 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

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

CREATE TABLE IF NOT EXISTS `incontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fabric_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fibre_content` int(1) NOT NULL,
  `fibre_other` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `pattern` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `width_other` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `q_units` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(5,2) NOT NULL,
  `c_units` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_purchased` date NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `incontrol`
--

INSERT INTO `incontrol` (`id`, `fabric_name`, `fibre_content`, `fibre_other`, `pattern`, `width`, `width_other`, `quantity`, `q_units`, `cost`, `c_units`, `location`, `date_purchased`, `notes`) VALUES
(2, 'yellow polkadots', 0, '', 'dots changed', '', '', '0.00', '', '0.00', '', '', '0000-00-00', 'polkadots notes'),
(3, 'red stripes', 0, '', 'red', '', '', '0.00', '', '0.00', '', '', '0000-00-00', ''),
(4, 'blue', 0, 'cotton wool blend', 'blue', '', '', '0.00', '', '0.00', '', '', '0000-00-00', ''),
(5, 'blue 3', 0, '', 'dots work 2', '', 'really wide', '0.00', '', '0.00', '', '', '0000-00-00', ''),
(6, 'blue3333333', 0, '', 'test works', '', 'test2', '10.02', '', '2.00', '', 'toronto', '1984-02-18', 'notes'),
(7, 'blurple', 0, 'other fibre 2', 'bluish purple', '', 'other width', '14.14', '', '2.43', '', 'new york city', '2112-02-02', 'my notes for blurple'),
(8, 'fabric name1', 0, 'blend', 'fabric colour', '', 'wider', '15.00', '', '4.00', '', 'new york', '1977-01-01', 'very bold unpopular leopard print'),
(9, 'float test', 0, '', 'paisley', '', '', '12.00', '', '0.00', '', 'ottawa', '0000-00-00', 'ottawa market'),
(10, 'test', 0, '', 'dots', '', '', '12.80', '', '0.00', '', '', '0000-00-00', 'test'),
(11, 'new fabric name', 0, 'silk blend', 'black print', '', 'scraps', '2.00', '', '2.50', '', 'tokyo', '1999-09-01', 'dragonskin print from japan'),
(12, 'drop test', 3, '', 'my new fibre', '', '', '122.55', '', '6.66', '', '', '0000-00-00', ''),
(13, 'fibres test', 1, '', 'bluefibre', '', '', '3.50', '', '0.00', '', '', '0000-00-00', 'test for dropdown fibre_content');

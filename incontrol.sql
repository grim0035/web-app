-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2012 at 03:27 PM
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
  `fibre_content` int(2) NOT NULL,
  `fibre_other` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `pattern` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(2) NOT NULL,
  `width_other` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `q_units` int(2) NOT NULL,
  `cost` decimal(5,2) NOT NULL,
  `c_units` int(2) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_purchased` date NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `preview` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `incontrol`
--

INSERT INTO `incontrol` (`id`, `fabric_name`, `fibre_content`, `fibre_other`, `pattern`, `width`, `width_other`, `quantity`, `q_units`, `cost`, `c_units`, `location`, `date_purchased`, `notes`, `preview`) VALUES
(2, 'yellow polkadots', 1, '', 'dots changed', 0, '', '0.00', 0, '0.00', 0, '', '0000-00-00', 'polkadots notes', ''),
(3, 'red stripes', 1, '', 'red', 0, '', '0.00', 0, '0.00', 0, '', '0000-00-00', '', ''),
(4, 'blue', 1, 'cotton wool blend', 'blue', 0, '', '0.00', 0, '0.00', 0, '', '0000-00-00', '', ''),
(5, 'blue 3', 7, '', 'dots work 2', 0, '', '0.00', 0, '0.00', 0, '', '0000-00-00', '', ''),
(6, 'blue3333333', 0, '', 'test works', 0, 'test2', '10.02', 0, '2.00', 0, 'toronto', '1984-02-18', 'notes', ''),
(7, 'blurple', 7, 'other fibre 2', 'bluish purple', 0, 'other width', '14.14', 0, '2.43', 0, 'new york city', '2112-02-02', 'my notes for blurple', ''),
(8, 'fabric name1', 0, '', 'fabric colour', 0, 'wider', '15.00', 0, '4.00', 0, 'new york', '1977-01-23', 'very bold unpopular leopard print', ''),
(9, 'float test', 0, '', 'paisley 2', 0, '', '12.00', 0, '0.00', 0, 'ottawa', '0000-00-00', 'ottawa market', ''),
(10, 'test', 1, '', 'dots', 0, '', '12.80', 0, '0.00', 0, '', '0000-00-00', 'test', ''),
(11, 'new fabric name', 4, 'silk blend', 'black print', 0, 'scraps', '2.00', 0, '2.50', 0, 'tokyo', '1999-09-01', 'dragonskin print from japan', ''),
(12, 'drop tester', 0, '', 'my new fibre', 0, '', '122.55', 0, '6.66', 0, '', '0000-00-00', '', ''),
(13, 'fibres test', 3, '', 'bluefibre', 0, '', '3.50', 0, '0.00', 0, '', '0000-00-00', 'test for dropdown fibre_content', ''),
(14, 'select test', 3, '', 'blue', 0, '', '6.00', 0, '0.00', 0, '', '0000-00-00', '', ''),
(15, 'new select test', 2, '', 'yellow', 0, '', '7.00', 0, '0.00', 0, '', '0000-00-00', '', ''),
(16, 'select test3', 2, '', 'red', 0, '', '8.00', 0, '0.00', 0, '', '0000-00-00', '', ''),
(17, 'Kaftan', 0, 'Ashoke', 'Red', 0, '', '5.00', 0, '50.00', 1, 'Ottawa', '0000-00-00', '', ''),
(18, 'linen', 0, '', 'plain', 0, '', '2.00', 0, '25.00', 1, 'Ottawa', '0000-00-00', 'nice', ''),
(19, 'my fabric', 1, '', 'black', 1, '', '12.00', 0, '0.00', 0, '', '0000-00-00', '', ''),
(20, 'preview test', 0, '', 'blue', 0, '', '6.00', 0, '0.00', 0, '', '0000-00-00', '', 'sg-icon.jpg'),
(21, 'preview test', 0, '', 'blue', 0, '', '6.00', 0, '0.00', 0, '', '0000-00-00', '', 'sg-icon.jpg'),
(22, 'new image test', 2, '', 'green red', 0, '', '21.00', 0, '0.00', 0, '', '0000-00-00', '', 'photo6.jpg');

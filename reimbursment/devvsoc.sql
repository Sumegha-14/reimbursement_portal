-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2019 at 08:41 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devvsoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prodname` varchar(50) NOT NULL,
  `top` int(10) NOT NULL,
  `prodprice` int(50) NOT NULL,
  `bought` tinyint(1) NOT NULL,
  `prodid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`prodid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodname`, `top`, `prodprice`, `bought`, `prodid`) VALUES
('RedMi', 1, 10000, 0, 1),
('Vivo', 1, 11500, 0, 2),
('Samsung', 1, 17000, 0, 3),
('OnePlus', 1, 37000, 0, 4),
('Dell inspiron i5', 2, 58000, 0, 5),
('Dell Vostro', 2, 48000, 0, 6),
('Macbook Air', 2, 80000, 0, 7),
('Lenovo G50', 2, 30000, 0, 8),
('Samsung', 3, 13000, 0, 9),
('LG', 3, 9570, 0, 10),
('Whirlpool 245', 3, 17490, 0, 11),
('Apple Ipad', 4, 27500, 0, 12),
('Apple ipad pro', 4, 48260, 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `prodid` int(11) NOT NULL,
  `tid` varchar(100) NOT NULL,
  `return` tinyint(1) NOT NULL,
  `date_1` date NOT NULL,
  `prodprice` int(50) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(50) NOT NULL,
  `employeeid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `employeeid`, `email`, `phonenumber`, `password`) VALUES
('sam', '17bci0048', 'samarasimhareddy.mohan@gmail.com', 9100, 'c4ca4238a0b923820dcc509a6f75849b'),
('sumegha sawa', '17BCI0102', 'attunurumohana.2017@vitstudent.ac.in', 123456789, '006d2143154327a64d86a264aea225f3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

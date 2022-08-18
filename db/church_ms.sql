-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2018 at 08:23 PM
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
-- Database: `church_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contibutions`
--

DROP TABLE IF EXISTS `contibutions`;
CREATE TABLE IF NOT EXISTS `contibutions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `code` text,
  `method` varchar(300) NOT NULL,
  `function` text NOT NULL,
  `amount` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contibutions`
--

INSERT INTO `contibutions` (`id`, `user_id`, `name`, `date`, `code`, `method`, `function`, `amount`) VALUES
(1, 756476, 'Mercy Kiptui', '2018-04-15', 'MFP94CAW13', 'MPESA', 'Public Address System', 1000),
(2, 460058, 'Clinton Ngotta', '2018-04-22', NULL, 'CASH', 'Public Address System', 1000),
(3, 460058, 'Clinton Ngotta', '2018-04-22', 'MFP94CAW13', 'MPESA', 'Public Address System', 500);

-- --------------------------------------------------------

--
-- Table structure for table `converts`
--

DROP TABLE IF EXISTS `converts`;
CREATE TABLE IF NOT EXISTS `converts` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` text NOT NULL,
  `prof_url` text NOT NULL,
  `prof_pic` text NOT NULL,
  `date` date NOT NULL,
  `account_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `converts`
--

INSERT INTO `converts` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `username`, `password`, `prof_url`, `prof_pic`, `date`, `account_status`) VALUES
(1, 756476, 'Mercy', 'Kiptui', 'mercykiptui@gmail.com', '0724825788', 'mercy', 'mercy', 'images/profiles/', 'mercy.jpg', '2016-06-23', 'active'),
(2, 460058, 'clinton', 'ngotta', 'clintonngotta@gmail.com', '0713229184', 'clintonngotta', 'cliciib', 'images/profiles/', 'clinton.jpg', '2018-05-11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `notification_id` int(11) NOT NULL,
  `notification_title` text NOT NULL,
  `message` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_title`, `message`, `date_sent`, `status`) VALUES
(1, 'Acount Notice', ' <p>Hey this is how notice text will look like , ignore this becoause its \n			 just a sample Hey this is how message text will look like ,\n			 ignore this becoause its just a sample ...</p>', '2018-06-24 07:14:11', 'new'),
(2, 'Message Notice', ' <p>Hey this is how notice text will look like , ignore this becoause its \n		 just a sample Hey this is how message text will look like ,\n		 ignore this becoause its just a sample ...</p>', '2018-06-23 07:14:11', 'old'),
(3, 'Blog analytics notice ', '<p>Hey this is how notice text will look like , ignore this becoause its \r\n			 just a sample Hey this is how message text will look like ,\r\n			 ignore this becoause its just a sample ...</p>', '2018-06-23 07:14:11', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `position` varchar(200) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` text NOT NULL,
  `prof_url` text NOT NULL,
  `prof_pic` text NOT NULL,
  `date_joined` date NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'convert'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `position`, `username`, `password`, `prof_url`, `prof_pic`, `date_joined`, `status`) VALUES
(1, 756476, 'Mercy', 'Kiptui', 'mercykiptui@gmail.com', '0724825788', 'member', 'mercy', 'mercy', 'images/profiles/', 'mercy.jpg', '2016-06-23', 'active'),
(2, 460058, 'clinton', 'ngotta', 'clintonngotta@gmail.com', '0713229184', 'member', 'clintonngotta', 'cliciib', 'images/profiles/', 'clinton.jpg', '2018-05-11', 'convert');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

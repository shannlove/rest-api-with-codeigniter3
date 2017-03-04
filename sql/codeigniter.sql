-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2017 at 01:00 PM
-- Server version: 5.6.31-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `link`, `date_added`) VALUES
(3, 'minakshi_kumari', 'asdfasddsa@dssfdasf_com', 'http://shankar_com', '2017-03-04 07:43:31'),
(4, 'rohit_kumar_surys', 'ramusingh@dmchealthcare_co_uk', 'http://www_shakar_com', '2017-03-04 07:43:31'),
(5, 'shankar_kumar_singh', 'shannlove@gmail_com', 'http://www_shakar_com', '2017-03-04 07:45:56'),
(7, 'rohit_kumar_suryavanshi', 'rajesh@dmc_com', 'http://www_shankar_com', '2017-03-04 07:46:17'),
(11, 'minakshi kumari1', 'shannlove@gmail.com1', 'http://shankar.com1', '2017-03-04 10:06:49'),
(12, 'minakshi kumari2', 'umesh.upadhyay@dmchealthcare.com3', 'http://shankar.com', '2017-03-04 10:18:56'),
(13, 'minakshi kumari1', 'shannlove@gmail.com', 'http://shankar.com', '2017-03-04 10:25:30'),
(14, 'dsafads', 'asdfasddsa@dssfdasf.com', 'http://shankar.com', '2017-03-04 10:27:08'),
(15, 'dsafads', 'asdfasddsa@dssfdasf.com', 'http://shankar.com', '2017-03-04 10:29:55'),
(16, 'dsafads', 'asdfasddsa@dssfdasf.com', 'http://shankar.com', '2017-03-04 10:30:27'),
(17, 'dsafads', 'asdfasddsa@dssfdasf.com', 'http://shankar.com', '2017-03-04 10:33:49'),
(18, 'dsafads', 'asdfasddsa@dssfdasf.com', 'http://shankar.com', '2017-03-04 10:34:57'),
(19, 'dsafads', 'asdfasddsa@dssfdasf.com', 'http://shankar.com', '2017-03-04 10:35:19'),
(22, 'minakshi kumari1', 'shannlove@gmail.com1', 'http://shankar.com1', '2017-03-04 10:43:48'),
(23, 'rajeev singh', 'rajevsingh@gmail.com', 'http://www.shakar.com', '2017-03-04 11:11:00'),
(24, 'rohit kumar suryavanshi1', 'shannlove@gmail.com1', 'http://shankar.com1', '2017-03-04 11:18:49'),
(25, 'minakshi kumari1', 'shannlove@gmail.com1', 'http://shankar.com1', '2017-03-04 11:21:15'),
(27, 'rama shankar singh', 'gaurishankar@abc.com', 'http://www.shakar.com', '2017-03-04 12:04:42'),
(28, 'final test1', 'shankar.kumar@rupeepower.com1', 'http://www.shakar.com1', '2017-03-04 12:41:21'),
(29, 'minakshi kumari1', 'loverajeev24@gmail.com', 'http://shankar.com', '2017-03-04 12:59:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

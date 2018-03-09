-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2018 at 02:19 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bvn_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `acc_num` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_acc` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acc_num`, `balance`, `user_id`) VALUES
(1, 2222, 10000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bank_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bank_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `bank_address`, `bank_phone`) VALUES
(1, 'hjgjh', 'kjhkj', 'hjlj');

-- --------------------------------------------------------

--
-- Table structure for table `bvn`
--

DROP TABLE IF EXISTS `bvn`;
CREATE TABLE IF NOT EXISTS `bvn` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bvn_num` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `bank_id` int(255) NOT NULL,
  `acc_id` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acc_id` (`acc_id`),
  KEY `bank_bvn` (`bank_id`),
  KEY `user_bvn` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `amount` int(255) NOT NULL,
  `type` int(255) NOT NULL DEFAULT '0' COMMENT 'type of transaction (0):deposeit , (1) withdraw',
  `acc_id` int(255) NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `nat_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acc_transaction` (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=517 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

DROP TABLE IF EXISTS `transfer`;
CREATE TABLE IF NOT EXISTS `transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acc_transfer` (`sender_id`),
  KEY `acc_transaction2` (`reciever_id`)
) ENGINE=InnoDB AUTO_INCREMENT=383 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'picture of user',
  `auth` int(255) NOT NULL DEFAULT '0' COMMENT 'user authorization:- (0)client_auth, (1)Emp_auth (2)Bank_manager_auth, (3)Central_bank_manager',
  `bank_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_user` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `password`, `national_id`, `birthday`, `gender`, `address`, `phone`, `thumb`, `auth`, `bank_id`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '231233', '2018-03-17', 'male', 'gsfdgdfgsdf', 'fgsdfgsdfgdsf', 'fsdfsdfsdf', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `user_acc` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bvn`
--
ALTER TABLE `bvn`
  ADD CONSTRAINT `acc_bvn` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_bvn` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_bvn` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `acc_transaction` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `acc_transaction2` FOREIGN KEY (`reciever_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acc_transfer` FOREIGN KEY (`sender_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `bank_user` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

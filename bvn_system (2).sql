-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2018 at 01:53 AM
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
(1, 2222, 2500, 1),
(2, 5555, 2700, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=518 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `type`, `acc_id`, `sender_name`, `nat_id`) VALUES
(517, 100, 0, 1, 'ahmedKhaled', '101010101010');

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
) ENGINE=InnoDB AUTO_INCREMENT=395 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `amount`, `sender_id`, `reciever_id`) VALUES
(384, 100, 1, 2),
(385, 100, 1, 2),
(386, 100, 1, 2),
(387, 100, 1, 2),
(388, 100, 1, 2),
(389, 100, 1, 2),
(390, 100, 1, 2),
(391, 200, 1, 2),
(392, 1000, 1, 2),
(393, 100, 1, 2),
(394, 100, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `national_id` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `auth` int(255) NOT NULL DEFAULT '0' COMMENT 'user authorization:- (0)client_auth, (1)Emp_auth (2)Bank_manager_auth, (3)Central_bank_manager',
  `bank_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_user` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `password`, `national_id`, `birthday`, `gender`, `address`, `phone`, `thumb`, `auth`, `bank_id`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '231233', '2018-03-17', 'male', 'gsfdgdfgsdf', 'fgsdfgsdfgdsf', NULL, 1, 1),
(2, '0321315', '55654', '464464@email.com', '56c21d0305442115fdc9dffeafbdb8e5', '46544654654654', '2018-04-04', '1', '11111', '0111', NULL, 1, 1),
(3, '032131', NULL, '10000', NULL, '23', '2015-11-11', 'Male', '10000', '1000', NULL, 0, 1),
(4, 'ahmedKhaled', NULL, 'admin@admin.com', NULL, '10101010101010101010', '1111-10-11', 'Male', 'admin', '01111216938', NULL, 0, 1),
(5, '032131', 'admin', '', 'e10adc3949ba59abbe56e057f20f883e', '23', '2018-03-09', '1', '', '', NULL, 0, 1),
(6, '032131', 'admin', '', 'e10adc3949ba59abbe56e057f20f883e', '23', '2018-03-09', '0', '', '', NULL, 0, 1),
(7, '032131', 'admin', '464464@email.com', 'd8e71dbd1afc289a4b102eeadeb6f363', '23', '1000-10-10', '0', '', '0111', NULL, 1, 1),
(8, '032131', 'admin', '464464@email.com', '562b530cff1f5bca3b1a4c1ad4ad9962', '23', '1000-11-10', '1', '5546464', '0111', NULL, 1, 1),
(9, '032131', 'admin', '464464@email.com', '562b530cff1f5bca3b1a4c1ad4ad9962', '23', '1000-11-10', '1', '5546464', '0111', NULL, 1, 1),
(10, '032131', 'admin', '1313213213', '6ba6d474726237a28877b3f78938b9de', 'hjk;m', '2018-03-03', '1', '11111', '0111', '', 1, 1),
(11, '032131', 'admin', '1313213213', '6ba6d474726237a28877b3f78938b9de', 'hjk;m', '2018-03-03', '1', '11111', '', '', 1, 1),
(12, '032131', 'admin', '', '6ba6d474726237a28877b3f78938b9de', 'hjk;m', '2018-03-03', '0', '', '', '', 0, 1),
(13, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2018-03-08', '0', '', '', '', 0, 1),
(14, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2018-03-16', '0', '', '', '', 0, 1),
(15, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2018-03-09', '0', '', '', '', 0, 1),
(16, '032131', NULL, '', NULL, '31321', '2018-03-01', 'Male', '', '', NULL, 0, 1),
(17, '032131', NULL, '464464@email.com', NULL, '31321', '2018-03-01', 'Male', '', '', NULL, 0, 1);

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

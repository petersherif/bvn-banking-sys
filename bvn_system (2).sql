-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2018 at 01:00 PM
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
  `acc_num` varchar(6) NOT NULL,
  `balance` int(255) DEFAULT '0',
  `user_id` int(255) NOT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_num` (`acc_num`),
  KEY `user_acc` (`user_id`),
  KEY `C1` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acc_num`, `balance`, `user_id`, `bank_id`) VALUES
(6, '10000', 9800, 135, 1),
(18, '10011', 0, 135, 1),
(19, '10012', 0, 135, 1),
(20, '10013', 0, 135, 1),
(21, '10014', 0, 135, 1),
(22, '10015', 0, 135, 1),
(23, '10016', 0, 135, 1),
(24, '10017', 0, 135, 1),
(25, '10018', 0, 135, 1),
(26, '10019', 0, 135, 1),
(27, '10020', 0, 135, 1),
(28, '10021', 0, 135, 1),
(29, '10022', 0, 135, 1),
(61, '10028', 0, 181, NULL),
(62, '10029', 0, 183, 1),
(64, '10030', 0, 185, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`) VALUES
(1, 'Bvn Bank'),
(2, 'Alahly Bank');

-- --------------------------------------------------------

--
-- Table structure for table `bvn`
--

DROP TABLE IF EXISTS `bvn`;
CREATE TABLE IF NOT EXISTS `bvn` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bvn_num` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_bvn` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bvn`
--

INSERT INTO `bvn` (`id`, `bvn_num`, `user_id`) VALUES
(61, '100000000', 135),
(69, '100000008', 153),
(102, '100000018', 181),
(103, '100000019', 182),
(105, '100000020', 185);

-- --------------------------------------------------------

--
-- Table structure for table `bvn_acc`
--

DROP TABLE IF EXISTS `bvn_acc`;
CREATE TABLE IF NOT EXISTS `bvn_acc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bvn_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bvn` (`bvn_id`),
  KEY `acc` (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bvn_acc`
--

INSERT INTO `bvn_acc` (`id`, `bvn_id`, `acc_id`) VALUES
(23, 61, 6),
(34, 61, 18),
(35, 61, 19),
(36, 61, 20),
(37, 61, 21),
(38, 61, 22),
(39, 61, 23),
(42, 61, 24),
(43, 61, 25),
(44, 61, 26),
(45, 61, 27),
(46, 61, 28),
(47, 61, 29),
(58, 102, 61),
(60, 105, 64);

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `acc_transaction` (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `type`, `acc_id`, `sender_name`, `nat_id`, `date`) VALUES
(55, 10000, 0, 6, NULL, NULL, '2018-06-05 23:39:33'),
(56, 100, 1, 6, NULL, NULL, '2018-06-06 01:40:31'),
(57, 100, 1, 6, NULL, NULL, '2018-06-06 01:40:38');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `password`, `national_id`, `birthday`, `gender`, `address`, `phone`, `thumb`, `auth`) VALUES
(134, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '556646465', '2018-06-06', 'maile', 'admib', 'admin', NULL, 2),
(135, 'ahmed khaled2', NULL, 'admin@najd.com', NULL, 'admin', '9111-06-11', 'Male', 'admin', '011111216938', NULL, 0),
(153, '123', NULL, 'omnia_mna2002@yahoo.com', NULL, '123', '1995-12-11', 'Male', 'dfasdfasdfasdfasdfasdf', '011111216938222', NULL, 0),
(181, 'admin313213131321', NULL, '65465464646@4646.CCC', NULL, 'admin', '1111-11-11', 'Female', '64465465', '46465464654', NULL, 0),
(182, '646465464', NULL, '646@s446554465.com', NULL, '646464654654', '4444-04-04', 'Female', '646546546546', '565464654', NULL, 0),
(183, '56466544654', NULL, '64654@5465.DDD', NULL, '4654564654654', '0446-06-05', 'Male', '6465464654', '465464654564', NULL, 0),
(185, 'admin', NULL, 'admin@admin.comddsdssdd', NULL, '46546546546', '5464-04-06', 'Male', '64645465465', '44654654', NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `C1` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_acc` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bvn`
--
ALTER TABLE `bvn`
  ADD CONSTRAINT `user_bvn` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bvn_acc`
--
ALTER TABLE `bvn_acc`
  ADD CONSTRAINT `acc` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bvn` FOREIGN KEY (`bvn_id`) REFERENCES `bvn` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

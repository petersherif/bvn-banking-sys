-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2018 at 10:04 PM
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
  `acc_num` varchar(225) NOT NULL,
  `card_num` varchar(225) DEFAULT NULL,
  `pin_code` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `balance` int(255) DEFAULT '0',
  `user_id` int(255) NOT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_num` (`acc_num`),
  KEY `user_acc` (`user_id`),
  KEY `C1` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acc_num`, `card_num`, `pin_code`, `balance`, `user_id`, `bank_id`) VALUES
(154, '6400843948', '5200728968869059', '11111', 250, 354, 1),
(155, '6475013306', '5200725868991183', '1111', 900, 355, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`) VALUES
(1, 'Bvn Bank'),
(2, 'Alahly Bank'),
(3, 'Banque Misr'),
(4, 'Auda Bank'),
(5, 'Bank Du Cairo');

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
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bvn`
--

INSERT INTO `bvn` (`id`, `bvn_num`, `user_id`) VALUES
(263, '1352309463', 354),
(264, '1686521753', 355);

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
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bvn_acc`
--

INSERT INTO `bvn_acc` (`id`, `bvn_id`, `acc_id`) VALUES
(211, 263, 154),
(212, 264, 155);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `type`, `acc_id`, `sender_name`, `nat_id`, `date`) VALUES
(1, 2546465, 0, 155, NULL, NULL, '2018-06-23 23:20:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `amount`, `sender_id`, `reciever_id`) VALUES
(19, 100, 354, 355),
(20, 100, 354, 355);

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
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `password`, `national_id`, `birthday`, `gender`, `address`, `phone`, `thumb`, `auth`) VALUES
(134, 'Khalifa', 'admin', '5alifa@ogh.co', '21232f297a57a5a743894a0e4a801fc3', '556646465', '2017-01-08', 'maile', 'Alex', '4333343333', NULL, 2),
(354, 'Peter', NULL, 'peter@p.co', NULL, '3422020', '2018-01-31', 'Male', '6th of October City', '3493439', NULL, 0),
(355, 'ahmed khaled', NULL, '111111111111@1211.com', NULL, '1321321321321', '1111-11-11', 'Male', '1111111', '1111111111', NULL, 0);

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
  ADD CONSTRAINT `acc_transaction2` FOREIGN KEY (`reciever_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acc_transfer` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

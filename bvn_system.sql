-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 07:04 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

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

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `acc_num` varchar(225) NOT NULL,
  `card_num` varchar(225) DEFAULT NULL,
  `pin_code` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `balance` int(255) DEFAULT '0',
  `user_id` int(255) NOT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acc_num`, `card_num`, `pin_code`, `balance`, `user_id`, `bank_id`) VALUES
(151, '1010098107', '5200729468937276', '1234', 327313, 354, 1),
(152, '1010094207', '5200729468934321', '1234', 1815568, 355, 4),
(153, '1114819364', '5200721768689861', '5213', 6300, 355, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `bvn` (
  `id` int(255) NOT NULL,
  `bvn_num` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bvn`
--

INSERT INTO `bvn` (`id`, `bvn_num`, `user_id`) VALUES
(263, '1352309463', 354),
(272, '1177965790', 355);

-- --------------------------------------------------------

--
-- Table structure for table `bvn_acc`
--

CREATE TABLE `bvn_acc` (
  `id` int(11) NOT NULL,
  `bvn_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bvn_acc`
--

INSERT INTO `bvn_acc` (`id`, `bvn_id`, `acc_id`) VALUES
(210, 263, 151),
(224, 272, 152),
(225, 272, 153);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `type` int(255) NOT NULL DEFAULT '0' COMMENT 'type of transaction (0):deposeit , (1) withdraw',
  `acc_id` int(255) NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `nat_id` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `type`, `acc_id`, `sender_name`, `nat_id`, `date`) VALUES
(4, 158879, 0, 151, NULL, NULL, '2018-06-22 22:12:12'),
(5, 500, 1, 151, NULL, NULL, '2018-06-22 22:12:31'),
(6, 1005, 0, 151, NULL, NULL, '2018-06-22 22:26:18'),
(7, 158879, 0, 151, NULL, NULL, '2018-06-22 22:48:04'),
(8, 1005, 0, 151, NULL, NULL, '2018-06-22 22:53:37'),
(9, 100, 1, 151, NULL, NULL, '2018-06-22 22:56:56'),
(10, 1005, 0, 151, NULL, NULL, '2018-06-22 23:00:00'),
(11, 300, 1, 151, NULL, NULL, '2018-06-22 23:36:16'),
(12, 1000, 0, 151, NULL, NULL, '2018-06-22 23:38:38'),
(13, 100, 1, 151, NULL, NULL, '2018-06-22 23:49:59'),
(14, 1000, 0, 151, NULL, NULL, '2018-06-23 00:04:18'),
(15, 1005, 0, 151, NULL, NULL, '2018-06-23 00:07:06'),
(16, 1005, 0, 151, NULL, NULL, '2018-06-23 00:12:42'),
(17, 1000, 1, 151, NULL, NULL, '2018-06-23 00:13:37'),
(18, 1005, 0, 151, NULL, NULL, '2018-06-23 00:15:36'),
(19, 1005, 0, 151, NULL, NULL, '2018-06-23 00:27:09'),
(20, 1005, 0, 151, NULL, NULL, '2018-06-23 00:33:17'),
(21, 1005, 0, 151, NULL, NULL, '2018-06-23 00:36:05'),
(22, 1000, 1, 151, NULL, NULL, '2018-06-23 03:30:09'),
(23, 1005, 0, 151, NULL, NULL, '2018-06-23 03:30:33'),
(24, 300, 1, 151, NULL, NULL, '2018-06-23 03:34:37'),
(25, 100, 1, 151, NULL, NULL, '2018-06-23 03:37:28'),
(26, 100, 1, 151, NULL, NULL, '2018-06-23 03:38:28'),
(27, 1005, 0, 151, NULL, NULL, '2018-06-23 03:38:54'),
(28, 1504555, 0, 152, NULL, NULL, '2018-06-24 05:03:57'),
(29, 5000, 1, 152, NULL, NULL, '2018-06-24 05:04:28'),
(30, 5000, 1, 152, NULL, NULL, '2018-06-24 05:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
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
  `auth` int(255) NOT NULL DEFAULT '0' COMMENT 'user authorization:- (0)client_auth, (1)Emp_auth (2)Bank_manager_auth, (3)Central_bank_manager'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `password`, `national_id`, `birthday`, `gender`, `address`, `phone`, `thumb`, `auth`) VALUES
(134, 'Khalifa', 'admin', '5alifa@ogh.co', '21232f297a57a5a743894a0e4a801fc3', '556646465', '2017-01-08', 'maile', 'Alex', '4333343333', NULL, 2),
(354, 'Peter', NULL, 'peter@p.co', NULL, '3422020', '2018-01-31', 'Male', '6th of October City', '3493439', NULL, 0),
(355, 'Hola', NULL, 'petddddswer@p.co', NULL, '443221111123444', '2018-01-31', 'Male', '6th of October City', '349343944', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acc_num` (`acc_num`),
  ADD KEY `user_acc` (`user_id`),
  ADD KEY `C1` (`bank_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bvn`
--
ALTER TABLE `bvn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_bvn` (`user_id`);

--
-- Indexes for table `bvn_acc`
--
ALTER TABLE `bvn_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bvn` (`bvn_id`),
  ADD KEY `acc` (`acc_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_transaction` (`acc_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_transfer` (`sender_id`),
  ADD KEY `acc_transaction2` (`reciever_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bvn`
--
ALTER TABLE `bvn`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `bvn_acc`
--
ALTER TABLE `bvn_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

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

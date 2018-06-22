-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 07:12 AM
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
  `acc_num` varchar(6) NOT NULL,
  `card_num` varchar(14) DEFAULT NULL,
  `pin_code` varchar(4) DEFAULT NULL,
  `balance` int(255) DEFAULT '0',
  `user_id` int(255) NOT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acc_num`, `card_num`, `pin_code`, `balance`, `user_id`, `bank_id`) VALUES
(6, '10000', '12345678912345', '1234', 106400, 135, 1),
(72, '10001', '01234567891234', '2255', 100, 135, 1);

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
(61, '100000000', 135),
(103, '100000019', 182),
(105, '100000020', 185),
(107, '100000021', 187);

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
(23, 61, 6),
(64, 61, 72);

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
(55, 10000, 0, 6, NULL, NULL, '2018-06-05 23:39:33'),
(56, 100, 1, 6, NULL, NULL, '2018-06-06 01:40:31'),
(57, 100, 1, 6, NULL, NULL, '2018-06-06 01:40:38'),
(58, 800, 1, 6, NULL, NULL, '2018-06-11 12:17:51'),
(59, 800, 0, 6, NULL, NULL, '2018-06-11 12:18:03'),
(60, 2000, 1, 6, NULL, NULL, '2018-06-19 02:57:57'),
(61, 500, 1, 6, NULL, NULL, '2018-06-19 03:01:45'),
(62, 300, 1, 6, NULL, NULL, '2018-06-19 03:02:13'),
(63, 9000, 1, 6, NULL, NULL, '2018-06-19 03:05:11'),
(64, 9000, 1, 6, NULL, NULL, '2018-06-19 03:15:34'),
(65, 6999, 1, 6, NULL, NULL, '2018-06-19 03:15:43'),
(66, 100, 1, 6, NULL, NULL, '2018-06-19 03:15:59'),
(67, 1, 1, 6, NULL, NULL, '2018-06-19 03:16:05'),
(68, 15000, 0, 6, NULL, NULL, '2018-06-19 03:17:59'),
(69, 300, 1, 6, NULL, NULL, '2018-06-19 03:46:33'),
(70, 500, 1, 6, NULL, NULL, '2018-06-19 03:48:58'),
(71, 300, 1, 6, NULL, NULL, '2018-06-19 03:52:47'),
(72, 2147483647, 1, 6, NULL, NULL, '2018-06-22 02:29:23'),
(73, 2147483647, 1, 6, NULL, NULL, '2018-06-22 02:36:49'),
(74, 2147483647, 1, 6, NULL, NULL, '2018-06-22 02:37:10'),
(75, 100000, 0, 6, NULL, NULL, '2018-06-22 02:38:54'),
(76, 500, 1, 6, NULL, NULL, '2018-06-22 02:41:08'),
(77, 1000, 1, 6, NULL, NULL, '2018-06-22 02:44:58'),
(78, 2000, 1, 6, NULL, NULL, '2018-06-22 02:49:11'),
(79, 1000, 1, 6, NULL, NULL, '2018-06-22 02:49:28'),
(80, 1000, 1, 6, NULL, NULL, '2018-06-22 04:40:45'),
(81, 100, 1, 6, NULL, NULL, '2018-06-22 05:10:11'),
(82, 100, 1, 6, NULL, NULL, '2018-06-22 05:19:32'),
(83, 100, 1, 6, NULL, NULL, '2018-06-22 05:20:15'),
(84, 300, 1, 6, NULL, NULL, '2018-06-22 05:22:53'),
(85, 100, 1, 6, NULL, NULL, '2018-06-22 06:44:28'),
(86, 100, 1, 6, NULL, NULL, '2018-06-22 06:45:19'),
(87, 100, 1, 6, NULL, NULL, '2018-06-22 06:46:43'),
(88, 100, 1, 6, NULL, NULL, '2018-06-22 06:49:33'),
(89, 1000, 1, 6, NULL, NULL, '2018-06-22 07:02:43');

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
(135, 'ahmed khaled', NULL, 'arabi@najd.com', NULL, 'admin', '1996-01-17', 'Male', 'shobra', '5577777777777', NULL, 0),
(182, '646465464', NULL, '646@s446554465.com', NULL, '646464654654', '4444-04-04', 'Female', '646546546546', '565464654', NULL, 0),
(185, 'admin', NULL, 'admin@admin.comddsdssdd', NULL, '46546546546', '5464-04-06', 'Male', '64645465465', '44654654', NULL, 0),
(187, 'Ashraf', NULL, 'ash@g.coo', NULL, '4545454545', '2018-12-31', 'Male', '6th Of October City', '344433333', NULL, 0);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bvn`
--
ALTER TABLE `bvn`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `bvn_acc`
--
ALTER TABLE `bvn_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

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

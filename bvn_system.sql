-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 01:12 AM
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
  `balance` int(255) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `acc_num`, `balance`, `user_id`) VALUES
(19, '10001', -200, 33),
(21, '10003', NULL, 35),
(22, '10004', NULL, 36),
(23, '10005', NULL, 37),
(24, '10006', NULL, 38),
(25, '10007', NULL, 42),
(26, '10008', NULL, 45),
(27, '10009', NULL, 55),
(28, '10010', NULL, 83),
(29, '10011', NULL, 87),
(30, '10012', NULL, 87),
(31, '10013', NULL, 93),
(32, '10014', NULL, 93),
(33, '10015', NULL, 93),
(34, '10016', NULL, 93),
(36, '10018', NULL, 103),
(37, '10019', NULL, 105),
(38, '10020', NULL, 113);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(255) NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bank_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bank_phone` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `bank_address`, `bank_phone`) VALUES
(1, 'hjgjh', 'kjhkj', 'hjlj');

-- --------------------------------------------------------

--
-- Table structure for table `bvn`
--

CREATE TABLE `bvn` (
  `id` int(255) NOT NULL,
  `bvn_num` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bvn_acc`
--

CREATE TABLE `bvn_acc` (
  `id` int(11) NOT NULL,
  `bvn_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 800, 0, 19, NULL, NULL, '2018-06-02 23:55:34'),
(2, 7000, 0, 19, NULL, NULL, '2018-06-02 23:55:48'),
(3, 8000, 1, 19, NULL, NULL, '2018-06-02 23:55:57');

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
  `auth` int(255) NOT NULL DEFAULT '0' COMMENT 'user authorization:- (0)client_auth, (1)Emp_auth (2)Bank_manager_auth, (3)Central_bank_manager',
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `password`, `national_id`, `birthday`, `gender`, `address`, `phone`, `thumb`, `auth`, `bank_id`) VALUES
(4, 'ahmedKhaled', NULL, 'admin@admin.com', NULL, '10101010101010101010', '1111-10-11', 'Male', 'admin', '01111216938', NULL, 1, 1),
(21, 'Mark', NULL, 'sdff@adf.fd', NULL, '123123123123', '2015-11-30', 'Male', 'gfjhfj', '454646546', NULL, 0, 1),
(22, 'perter s', NULL, 'petershreif@gmail.comaaa', NULL, '1234567', '2018-03-08', 'Male', '6 october', '0100000000', NULL, 0, 1),
(33, 'mnkhjhkg', NULL, 'jgkgkkjgkjf', NULL, 'jhfhfjh', '2018-04-05', 'Male', 'ljhkhkjhjk', '646546546', 'avatar-placeholder.png', 0, 1),
(35, 'sahfkshdkfh', NULL, 'fsdfasdfasdf', NULL, 'hkasjhdfkdkfhh', '0014-05-04', 'Male', 'adsfasdfasdf', 'fsdfasdfasdfasd', NULL, 0, 1),
(36, 'kshgfaskgj', NULL, '65465464', NULL, 'fgjfgjsagjgfjg', '6546-04-04', 'Male', '4646654', '46464654', NULL, 0, 1),
(37, 'fhsakgf', NULL, '654544', NULL, 'gkjadjgfkgh', '0564-04-16', 'Male', '146545654', '646464654', NULL, 0, 1),
(38, '465', NULL, '4654', NULL, '464', '0654-05-04', 'Male', '4654', '64', NULL, 0, 1),
(39, '465', NULL, '4654', NULL, '464', '0654-05-04', 'Male', '4654', '64', NULL, 0, 1),
(40, '465', NULL, '4654', NULL, '464', '0654-05-04', 'Male', '4654', '64', NULL, 0, 1),
(41, '465', NULL, '4654', NULL, '464', '0654-05-04', 'Male', '4654', '64', NULL, 0, 1),
(42, 'fdsagdjfj', NULL, '64464', NULL, 'fhf', '0545-12-05', 'Male', '46546', '65464646', NULL, 0, 1),
(43, 'fdsagdjfj', NULL, '64464', NULL, 'fhf', '0545-12-05', 'Male', '46546', '65464646', NULL, 0, 1),
(44, 'fdsagdjfj', NULL, '64464', NULL, 'fhf', '0545-12-05', 'Male', '46546', '65464646', NULL, 0, 1),
(45, 'asdDADASDa', NULL, '4646464644654', NULL, 'sadfasdfasdf', '0464-04-06', 'Male', '46546465464', '6546544646546', NULL, 0, 1),
(46, 'asdDADASDa', NULL, '4646464644654', NULL, 'sadfasdfasdf', '0464-04-06', 'Male', '46546465464', '6546544646546', NULL, 0, 1),
(47, 'asdDADASDa', NULL, '4646464644654', NULL, 'sadfasdfasdf', '0464-04-06', 'Male', '46546465464', '6546544646546', NULL, 0, 1),
(48, 'dddd', NULL, '646546546546', NULL, 'dfsdfasdfas', '0045-04-04', 'Male', '6465446546', '654646464654', NULL, 0, 1),
(49, 'dddd', NULL, '646546546546', NULL, 'dfsdfasdfas', '0045-04-04', 'Male', '6465446546', '654646464654', NULL, 0, 1),
(50, 'dddd', NULL, '646546546546', NULL, 'dfsdfasdfas', '0045-04-04', 'Male', '6465446546', '654646464654', NULL, 0, 1),
(51, 'sssss', NULL, 'ssssssssss', NULL, 'sssssss', '0011-11-11', 'Male', 'ssssssssss', 'sssssssssssss', NULL, 0, 1),
(52, 'sssss', NULL, 'ssssssssss', NULL, 'sssssss', '0011-11-11', 'Male', 'ssssssssss', 'sssssssssssss', NULL, 0, 1),
(53, 'mnkhjhkg', NULL, '321d32131', NULL, 'kfhkahdheqw`', '0001-11-11', 'Male', 'd1dsa21', '311321313213', NULL, 0, 1),
(54, 'mnkhjhkg', NULL, '321d32131', NULL, 'kfhkahdheqw`', '0001-11-11', 'Male', 'd1dsa21', '311321313213', NULL, 0, 1),
(55, 'sdfasdfasd', NULL, '464646546544564', NULL, 'fdasfasdf', '6464-05-04', 'Male', '465465465', '465454665465456', NULL, 0, 1),
(56, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(57, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(58, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(59, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(60, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(61, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(62, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(63, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(64, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(65, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(66, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(67, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(68, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(69, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(70, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(71, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(72, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(73, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(74, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(75, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(76, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(77, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(78, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(79, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(80, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(81, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(82, '132123', NULL, '64645465464', NULL, '1323232', '0446-04-15', 'Male', '65456546', '465456465464654', NULL, 0, 1),
(83, '123', NULL, '123', NULL, '123', '0013-12-03', 'Female', '123', '123', NULL, 0, 1),
(84, 'adasdasdas', NULL, '132131321321', NULL, 'sadsdasdasd', '0013-04-13', 'Female', '1321321321', '132132132131321', NULL, 0, 1),
(85, 'adasdasdas', NULL, '132131321321', NULL, 'sadsdasdasd', '0013-04-13', 'Female', '1321321321', '132132132131321', NULL, 0, 1),
(86, 'asdasdasdasd', NULL, '465465464654654', NULL, 'dasdasdasda', '0464-04-06', 'Male', '654654', '646646546564564', NULL, 0, 1),
(87, 'asdasdasdasd', NULL, '465465464654654', NULL, 'dasdasdasda', '0464-04-06', 'Male', '654654', '646646546564564', NULL, 0, 1),
(88, '121', NULL, '1231123', NULL, '1321', '0003-12-31', 'Male', '13213', '32131', NULL, 0, 1),
(89, '121', NULL, '1231123', NULL, '1321', '0003-12-31', 'Male', '13213', '32131', NULL, 0, 1),
(90, '1111', NULL, '12213132', NULL, '11111', '0011-11-11', 'Female', '11123', '13213213131', NULL, 0, 1),
(91, '1111', NULL, '12213132', NULL, '11111', '0011-11-11', 'Female', '11123', '13213213131', NULL, 0, 1),
(92, '1111', NULL, '12213132', NULL, '11111', '0011-11-11', 'Female', '11123', '13213213131', NULL, 0, 1),
(93, '1111', NULL, '12213132', NULL, '11111', '0011-11-11', 'Female', '11123', '13213213131', NULL, 0, 1),
(95, '121321321321', NULL, '151515151512', NULL, '321', '0321-03-21', 'Male', '313', '1213132', NULL, 0, 1),
(96, '121321321321', NULL, '151515151512', NULL, '321', '0321-03-21', 'Male', '313', '1213132', NULL, 0, 1),
(97, '4444', NULL, '4444', NULL, '44444', '0044-04-04', 'Male', '4444', '4444', NULL, 0, 1),
(98, '4444', NULL, '4444', NULL, '44444', '0044-04-04', 'Male', '4444', '4444', NULL, 0, 1),
(99, 'asdDADASDasdf', NULL, '65465@dddd.com', NULL, 'SDDFSDFSDsdff', '1555-12-05', 'Female', '4964644654', '4646465465465465', NULL, 0, 1),
(100, 'asdDADASDasdf', NULL, '65465@dddd.com', NULL, 'SDDFSDFSDsdff', '1555-12-05', 'Female', '4964644654', '4646465465465465', NULL, 0, 1),
(101, 'asdDADASDasdf', NULL, '65465@dddd.com', NULL, 'SDDFSDFSDsdff', '1555-12-05', 'Female', '4964644654', '4646465465465465', NULL, 0, 1),
(102, 'asdDADASDasdf', NULL, '65465@dddd.com', NULL, 'SDDFSDFSDsdff', '1555-12-05', 'Female', '4964644654', '4646465465465465', NULL, 0, 1),
(103, 'adasdasdasd', NULL, '464646546546', NULL, 'dasdasdasdasd', '6546-04-05', 'Female', '1654465465', '54564654654654', NULL, 0, 1),
(104, 'adasdasdasd', NULL, '464646546546', NULL, 'dasdasdasdasd', '6546-04-05', 'Female', '1654465465', '54564654654654', NULL, 0, 1),
(105, 'kshgfaskgj', NULL, '4646546546', NULL, 'sdfsdfasdf', '0646-05-04', 'Male', '641654565', '4646465', NULL, 0, 1),
(106, 'kshgfaskgj', NULL, '4646546546', NULL, 'sdfsdfasdf', '0646-05-04', 'Male', '641654565', '4646465', NULL, 0, 1),
(107, 'kshgfaskgj', NULL, '4646546546', NULL, 'sdfsdfasdf', '0646-05-04', 'Male', '641654565', '4646465', NULL, 0, 1),
(108, '564654654', NULL, '64654654654', NULL, '4654664654', '0464-06-06', 'Male', '4654654654654', '65465465465465', NULL, 0, 1),
(109, '564654654', NULL, '64654654654', NULL, '4654664654', '0464-06-06', 'Male', '4654654654654', '65465465465465', NULL, 0, 1),
(110, 'kshgfaskgj', NULL, '4465654', NULL, '46564', '0004-06-05', 'Male', '65465', '654654654', NULL, 0, 1),
(111, 'kshgfaskgj', NULL, '4465654', NULL, '46564', '0004-06-05', 'Male', '65465', '654654654', NULL, 0, 1),
(112, 'kshgfaskgj', NULL, '4465654', NULL, '46564', '0004-06-05', 'Male', '65465', '654654654', NULL, 0, 1),
(113, 'sadsdfasdf', NULL, '3132132131321321', NULL, '1000000', '3132-12-21', 'Female', '313213121321', '31321321321231', NULL, 0, 1),
(114, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '132132132131321', '2018-05-08', 'dadasas', 'dasdadad', '465466546546', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acc_num` (`acc_num`),
  ADD KEY `user_acc` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_user` (`bank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bvn`
--
ALTER TABLE `bvn`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bvn_acc`
--
ALTER TABLE `bvn_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

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

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `bank_user` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 05:16 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldof_wow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `id` int(11) NOT NULL,
  `f_name` varchar(150) DEFAULT NULL,
  `l_name` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`id`, `f_name`, `l_name`, `email`, `phone`, `status`, `date_added`, `last_edited`, `pass`) VALUES
(1, 'chidiebere', 'ekennia', 'chidiebereekennia@gmail.com', '07012454621', 'enabled', '2020-06-05 20:13:11', '2020-06-07 23:57:58', '$2y$10$v9Inri6QOHyY1hPzyM/G9OwShp3t/jkOJZGfxfTz31gKooiq/FX/y');

-- --------------------------------------------------------

--
-- Table structure for table `investment_list`
--

CREATE TABLE `investment_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `iv_no` varchar(20) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `current_u_cost` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions_list`
--

CREATE TABLE `questions_list` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `answer` varchar(300) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `up_votes` int(11) DEFAULT 0,
  `down_votes` int(11) DEFAULT 0,
  `status` varchar(20) DEFAULT 'enabled',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions_list`
--

INSERT INTO `questions_list` (`id`, `question`, `type`, `answer`, `admin_id`, `up_votes`, `down_votes`, `status`, `date_added`, `last_edited`) VALUES
(1, 'How do i make an Investment ?', 'Basics', 'Scroll down to the bottom of your dashboard and click the invest button. \r\nSet an amount of your choosing, but be sure that it is an amount you can &#34;recommit&#34;. \r\nSee our useful info on recommitment for more info', 1, 0, 0, 'enabled', '2020-06-16 14:04:35', '2020-06-17 00:37:31'),
(9, 'How do you find your guider\'s contact ?', 'Useful Info', 'Click the account button in the menu.\r\nIn this section, click on referrals.\r\nScroll down to find your guider\'s contact on the page', 2, 0, 0, 'enabled', '2020-06-16 14:04:35', '2020-06-16 14:51:04'),
(10, 'How do i know when to confirm a payment ?', 'Transactions', 'The following are rules to follow when confirming payments:\r\n1. When you are notified of a payment via proof of payment or by a user calling to indicate, check if the money is in your account before confirming any payments.\r\n2. Do not confirm payments until the money enters your account, regardless ', 1, 0, 0, 'enabled', '2020-06-17 03:05:03', '2020-06-17 03:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_list`
--

CREATE TABLE `transaction_list` (
  `id` int(11) NOT NULL,
  `transaction_type` varchar(20) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `updates_list`
--

CREATE TABLE `updates_list` (
  `id` int(11) NOT NULL,
  `topic` varchar(150) DEFAULT NULL,
  `info` varchar(1000) DEFAULT NULL,
  `up_votes` int(11) DEFAULT NULL,
  `down_votes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_list`
--

CREATE TABLE `users_list` (
  `id` int(11) NOT NULL,
  `f_name` varchar(150) DEFAULT NULL,
  `l_name` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `subscription_type` varchar(20) DEFAULT NULL,
  `subscription_status` varchar(20) DEFAULT 'disabled',
  `status` varchar(20) DEFAULT 'enabled',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_list`
--

INSERT INTO `users_list` (`id`, `f_name`, `l_name`, `email`, `phone`, `user_type`, `subscription_type`, `subscription_status`, `status`, `date_added`, `last_edited`, `pass`) VALUES
(10, 'Chidiebere', 'Ekennia', 'chidiebereekennia@gmail.com', '+2347012454621', NULL, NULL, 'disabled', 'enabled', '2020-06-12 05:17:06', '2020-06-12 05:17:06', '$2y$10$4ureUisv8ByoPseO2YpPl.xyjTBzeKp7PYJPWW5daUf8rJSNL1F/.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `investment_list`
--
ALTER TABLE `investment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_list`
--
ALTER TABLE `questions_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates_list`
--
ALTER TABLE `updates_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_list`
--
ALTER TABLE `users_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investment_list`
--
ALTER TABLE `investment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions_list`
--
ALTER TABLE `questions_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_list`
--
ALTER TABLE `transaction_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `updates_list`
--
ALTER TABLE `updates_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_list`
--
ALTER TABLE `users_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

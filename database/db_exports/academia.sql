-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 07:56 AM
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
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Table structure for table `academia_metrics`
--

CREATE TABLE `academia_metrics` (
  `id` int(11) NOT NULL,
  `metric_name` varchar(100) DEFAULT NULL,
  `metric_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `accepted_invitation_list`
--

CREATE TABLE `accepted_invitation_list` (
  `id` int(11) NOT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `inviter_id` int(11) DEFAULT NULL,
  `inviter_role` varchar(20) DEFAULT NULL,
  `time_accepted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accepted_invitation_list`
--

INSERT INTO `accepted_invitation_list` (`id`, `identity`, `role`, `group_id`, `inviter_id`, `inviter_role`, `time_accepted`, `status`) VALUES
(1, 'michelleangelo@gmail.com', 'student', 1, 6, 'teacher', '2020-05-06 19:36:00', 'enabled'),
(2, 'kizitoekebo@gmail.com', 'student', 1, 6, 'teacher', '2020-05-06 19:36:02', 'enabled'),
(3, 'brownie@gmail.com', 'student', 1, 3, 'teacher', '2020-05-06 19:36:25', 'enabled'),
(4, 'kizitoekebo@gmail.com', 'student', 3, 6, 'teacher', '2020-05-06 19:36:07', 'enabled'),
(5, 'kizitoekebo@gmail.com', 'student', 7, 6, 'teacher', '2020-05-06 19:36:09', 'enabled'),
(7, 'christianken@gmail.com', 'teacher', 1, 1, 'admin', '2020-05-07 20:43:05', 'enabled'),
(18, '08147284532', 'teacher', 8, 1, 'admin', '2020-05-07 21:50:43', 'enabled'),
(20, 'ikenna@gmail.com', 'student', 6, 6, 'teacher', '2020-05-08 03:24:31', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `f_name` varchar(150) DEFAULT NULL,
  `l_name` varchar(150) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`id`, `school_id`, `f_name`, `l_name`, `gender`, `file_name`, `email`, `phone`, `pass`, `status`) VALUES
(1, 1, 'Chidiebere', 'Ekennia', 'Male', NULL, 'chidi4@gmail.com', '07012454621', '$2y$10$mGTaO4tlLd/wXtrB.tEJT.YzoEld9FXO8/STVtGyYgTtc6fFsC/Eq', 'enabled'),
(9, 13, 'Kingsley', 'Madueke', 'Male', NULL, 'madonna@gmail.com', '+2349045342135', '$2y$10$er2eOo1NKR7x12wSB/vumeqc6sY6nu8JMUbeNjcs1CbXXIHeM7tNu', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_list`
--

CREATE TABLE `assignment_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `lesson_id` varchar(255) NOT NULL,
  `remark` varchar(20) NOT NULL DEFAULT 'published',
  `teacher_attach` varchar(255) DEFAULT 'none',
  `deadline` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_list`
--

INSERT INTO `assignment_list` (`id`, `school_id`, `teacher_id`, `group_id`, `title`, `details`, `lesson_id`, `remark`, `teacher_attach`, `deadline`, `status`) VALUES
(1, 1, 6, 1, 'Business Studies', 'Solve this before i slap you', '', '', 'dets.txt', NULL, 'enabled'),
(2, 1, 6, 3, 'Mathematics', 'Find the missing equation', '', '', 'none', NULL, 'enabled'),
(25, 1, 6, 1, 'English', 'This is the english assignment', '', 'published', '(119) [Official Video] Daft Punk - Pentatonix - YouTube.mp4', '2020-05-28', 'enabled'),
(26, 1, 6, 1, 'Biology Testing', 'This is the first biology assignment ever. Take advantage or the lesson to solve it', '1', 'published', 'Afro Vibes(1).mp3', '2020-05-19', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submissions`
--

CREATE TABLE `assignment_submissions` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_attach` varchar(255) DEFAULT 'none',
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher_remark` varchar(20) NOT NULL DEFAULT 'submitted',
  `student_remark` varchar(20) NOT NULL DEFAULT 'submitted',
  `grade` varchar(10) NOT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_submissions`
--

INSERT INTO `assignment_submissions` (`id`, `school_id`, `teacher_id`, `group_id`, `assignment_id`, `answer`, `student_id`, `student_attach`, `submission_time`, `teacher_remark`, `student_remark`, `grade`, `status`) VALUES
(1, 1, 6, 1, 25, 'I don\'t really have an answer oh', 3, 'bitnami.css', '2020-05-08 11:31:11', 'graded', 'graded', '70', 'enabled'),
(4, 1, 6, 1, 25, 'I submitted the answers oh', 5, '39957925_1959609437665005_1686874495930715928_n(1)(14).jpg', '2020-05-08 11:12:27', 'graded', 'graded', '76', 'enabled'),
(5, 1, 6, 1, 2, 'submit 3', 5, '39957925_1959609437665005_1686874495930715928_n(1)(14).jpg', '2020-05-08 11:33:33', 'submitted', 'submitted', 'none', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

CREATE TABLE `group_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `student_pop` int(11) DEFAULT 0,
  `teacher_pop` int(11) NOT NULL,
  `fee` varchar(20) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`id`, `school_id`, `name`, `student_pop`, `teacher_pop`, `fee`, `duration`, `description`, `status`) VALUES
(1, 1, 'Oluaka Institute', -5, -5, '', '', '', 'enabled'),
(2, 1, 'SchoolSuite', 0, 0, '', '', '', 'enabled'),
(3, 1, 'RAD5 Tech Hub', 0, 0, '', '', '', 'enabled'),
(6, 2, 'Moon Warriors', 1, 0, '2000', '1 Week', 'We fight for the moon!', 'enabled'),
(7, 1, 'refft', 0, 0, '', '', '', 'enabled'),
(8, 1, 'Algorithms', 0, 1, '1000', '1 Week', 'This is for the mathematicians', 'enabled'),
(9, 1, 'Syntax', 0, 0, '2000', 'Bi-Weekly', 'Fix all syntax errors for students', 'disabled'),
(10, 1, 'Triads', 0, 0, '5000', '60 Days', 'mafia joor', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_list`
--

CREATE TABLE `lesson_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `remark` varchar(25) NOT NULL DEFAULT 'published',
  `teacher_attach` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson_list`
--

INSERT INTO `lesson_list` (`id`, `school_id`, `teacher_id`, `group_id`, `title`, `details`, `remark`, `teacher_attach`, `status`) VALUES
(1, 1, 6, 1, 'Biology fundamentals', 'Nothing much', 'published', 'Gold-vivian-Ekennia.pdf', 'enabled'),
(2, 1, 6, 1, 'English Synonymns', 'The names of all the english synonymns', 'published', '26632-Article Text-96131-1-10-20160128(8).pdf', 'enabled'),
(3, 1, 6, 1, 'English Synonymns', 'The names of all the english synonymns 2', 'published', 'none', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `group_id` varchar(100) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `question_count` int(11) DEFAULT 1,
  `time_in_mins` int(11) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `quiz_status` varchar(20) DEFAULT 'unscheduled',
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_list`
--

INSERT INTO `quiz_list` (`id`, `school_id`, `teacher_id`, `group_id`, `title`, `description`, `question_count`, `time_in_mins`, `deadline`, `quiz_status`, `status`) VALUES
(1, 1, 6, '1', 'Physics', 'Nothing much, just physics quiz', 1, 10, '2000-12-31', 'unscheduled', 'enabled'),
(26, 1, 6, '1', 'English', 'This is the first test', 6, 5, '2020-05-13', 'scheduled', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `question_no` int(11) NOT NULL,
  `question_data` longtext DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `school_id`, `quiz_id`, `group_id`, `question_no`, `question_data`, `status`) VALUES
(24, 1, 26, 1, 1, '{\"question\":\"What is my name children?\",\"option-a\":\"Christian Ken\",\"option-b\":\"onima\",\"option-c\":\"nimo\",\"option-d\":\"ben\",\"correct-option\":\"A\"}', 'enabled'),
(26, 1, 26, 1, 2, '{\"question\":\"What is the oppostite of love?\",\"option-a\":\"hate\",\"option-b\":\"greed\",\"option-c\":\"freak\",\"option-d\":\"sex\",\"correct-option\":\"A\"}', 'enabled'),
(28, 1, 26, 1, 3, '{\"question\":\"What is the moon?\",\"option-a\":\"Shone\",\"option-b\":\"hiuih\",\"option-c\":\"uuh\",\"option-d\":\"hj\",\"correct-option\":\"A\"}', 'enabled'),
(29, 1, 26, 1, 4, '{\"question\":\"What is the sunshine?\",\"option-a\":\"bright\",\"option-b\":\"warm sku\",\"option-c\":\"danger\",\"option-d\":\"hate\",\"correct-option\":\"A\"}', 'enabled'),
(31, 1, 26, 1, 5, '{\"question\":\"How do you love?\",\"option-a\":\"small\",\"option-b\":\"big\",\"option-c\":\"fast\",\"option-d\":\"slow\",\"correct-option\":\"B\"}', 'enabled'),
(39, 1, 26, 1, 6, '{\"question\":\"what is my full name?\",\"option-a\":\"chidiebere ekennia\",\"option-b\":\"daniel\",\"option-c\":\"cyprian\",\"option-d\":\"boniface\",\"correct-option\":\"A\"}', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_submissions`
--

CREATE TABLE `quiz_submissions` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher_remark` varchar(20) DEFAULT 'graded',
  `student_remark` varchar(20) NOT NULL DEFAULT 'graded',
  `question_count` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_submissions`
--

INSERT INTO `quiz_submissions` (`id`, `school_id`, `student_id`, `teacher_id`, `quiz_id`, `score`, `group_id`, `title`, `submission_time`, `teacher_remark`, `student_remark`, `question_count`, `status`) VALUES
(1, 1, 1, 6, 26, 5, 1, 'English', '2020-05-08 12:00:45', 'graded', 'graded', 6, 'enabled'),
(20, 1, 5, 6, 26, 0, 1, 'English', '2020-05-09 05:52:25', 'graded', 'graded', 6, 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_invitation_list`
--

CREATE TABLE `rejected_invitation_list` (
  `id` int(11) NOT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `inviter_id` int(11) DEFAULT NULL,
  `inviter_role` varchar(20) DEFAULT NULL,
  `time_rejected` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejected_invitation_list`
--

INSERT INTO `rejected_invitation_list` (`id`, `identity`, `role`, `group_id`, `inviter_id`, `inviter_role`, `time_rejected`, `status`) VALUES
(1, 'kizitoekebo@gmail.com', 'student', 8, 1, 'admin', '2020-05-08 01:56:03', 'enabled'),
(2, 'ikenna@gmail.com', 'student', 6, 6, 'teacher', '2020-05-08 03:58:38', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `school_list`
--

CREATE TABLE `school_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subscription` varchar(100) DEFAULT 'basic',
  `student_pop` int(11) NOT NULL,
  `teacher_pop` int(11) NOT NULL,
  `group_no` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_list`
--

INSERT INTO `school_list` (`id`, `name`, `email`, `subscription`, `student_pop`, `teacher_pop`, `group_no`, `status`) VALUES
(1, 'Kings College', '', 'Basic', 0, 0, 0, 'enabled'),
(2, 'Madonna High School', 'madonna@gmail.com', 'basic', 0, 0, 0, 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `student_attachments`
--

CREATE TABLE `student_attachments` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attachment_name` varchar(255) DEFAULT NULL,
  `attachment_group` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `entry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attachments`
--

INSERT INTO `student_attachments` (`id`, `school_id`, `student_id`, `attachment_name`, `attachment_group`, `file_name`, `entry_time`, `status`) VALUES
(1, 1, 5, 'English', 'submitted-assignment', '39957925_1959609437665005_1686874495930715928_n(1)(2).jpg', '2020-05-08 08:44:48', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `student_invite_tokens`
--

CREATE TABLE `student_invite_tokens` (
  `id` int(11) NOT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `fee` varchar(20) DEFAULT NULL,
  `duration` varchar(30) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `token` int(11) DEFAULT NULL,
  `inviter_id` int(11) NOT NULL,
  `inviter_role` varchar(20) NOT NULL,
  `time_invited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_invite_tokens`
--

INSERT INTO `student_invite_tokens` (`id`, `identity`, `fee`, `duration`, `group_id`, `token`, `inviter_id`, `inviter_role`, `time_invited`, `status`) VALUES
(1, 'michelleangelo@gmail.com', '', '', 8, 8747942, 6, 'teacher', '2020-05-08 01:32:18', 'enabled'),
(15, 'code-invite', NULL, NULL, 6, 2885144, 6, 'teacher', '2020-05-08 03:22:05', 'enabled'),
(16, 'code-invite', NULL, NULL, 6, 8751320, 6, 'teacher', '2020-05-08 03:22:35', 'enabled'),
(17, 'code-invite', NULL, NULL, 6, 3174805, 6, 'teacher', '2020-05-08 03:23:38', 'enabled'),
(18, 'code-invite', NULL, NULL, 6, 4161074, 6, 'teacher', '2020-05-08 03:24:08', 'enabled'),
(19, 'code-invite', NULL, NULL, 6, 7875722, 6, 'teacher', '2020-05-08 03:24:10', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(11) NOT NULL,
  `groups` varchar(500) DEFAULT NULL,
  `f_name` varchar(150) DEFAULT NULL,
  `l_name` varchar(150) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `groups`, `f_name`, `l_name`, `gender`, `email`, `phone`, `pass`, `status`) VALUES
(1, 'Oluaka Institute | 1,RAD5 Tech Hub | 1', 'Kizito', 'Ekebo', 'Male', 'kizitoekebo@gmail.com', '07012554621', '$2y$10$LBjkeRYP8cH0S0wr5DgZVu4yPZvuqcsZJSwg7aGM6b8BTc6MKxXNW', 'enabled'),
(3, 'Oluaka Institute | 1', 'Sandra', 'Michelle', 'Female', 'michelleangelo@gmail.com', '08012554621', '$2y$10$LBjkeRYP8cH0S0wr5DgZVu4yPZvuqcsZJSwg7aGM6b8BTc6MKxXNW', 'enabled'),
(4, 'RAD5 Tech Hub | 1', 'James', 'Brown', 'Male', 'brownie@gmail.com', '08122554621', '$2y$10$LBjkeRYP8cH0S0wr5DgZVu4yPZvuqcsZJSwg7aGM6b8BTc6MKxXNW', 'enabled'),
(5, 'Oluaka Institute | 1,RAD5 Tech Hub | 1,Moon Warriors | 2', 'Ikenna', 'Ikeagbo', 'Male', 'ikenna@gmail.com', '07012458273', '$2y$10$LBjkeRYP8cH0S0wr5DgZVu4yPZvuqcsZJSwg7aGM6b8BTc6MKxXNW', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attachments`
--

CREATE TABLE `teacher_attachments` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `attachment_name` varchar(255) DEFAULT NULL,
  `attachment_group` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `entry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_attachments`
--

INSERT INTO `teacher_attachments` (`id`, `school_id`, `teacher_id`, `attachment_name`, `attachment_group`, `file_name`, `entry_time`, `status`) VALUES
(1, 1, 6, 'Basic Science', 'given-assignment', 'dee.jpg', '2020-05-04 21:50:38', 'enabled'),
(40, 1, 6, 'English', 'given-assignment', '(119) [Official Video] Daft Punk - Pentatonix - YouTube.mp4', '2020-05-05 03:05:28', 'enabled'),
(42, 1, 6, 'Biology Testing', 'given-assignment', 'Afro Vibes(1).mp3', '2020-05-05 03:58:15', 'enabled'),
(54, 1, 6, 'English Synonymns', 'given-lesson', '26632-Article Text-96131-1-10-20160128(8).pdf', '2020-05-05 04:54:20', 'enabled'),
(55, 1, NULL, 'English', 'submitted-assignment', '39957925_1959609437665005_1686874495930715928_n(1).jpg', '2020-05-08 08:41:34', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_commissions`
--

CREATE TABLE `teacher_commissions` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `commission` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_commissions`
--

INSERT INTO `teacher_commissions` (`id`, `teacher_id`, `group_id`, `commission`, `status`) VALUES
(1, 6, 6, '15000', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_invite_tokens`
--

CREATE TABLE `teacher_invite_tokens` (
  `id` int(11) NOT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `commission` varchar(20) NOT NULL,
  `duration` varchar(30) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `inviter_id` int(11) NOT NULL,
  `inviter_role` varchar(20) NOT NULL DEFAULT 'admin',
  `token` int(11) DEFAULT NULL,
  `time_invited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_invite_tokens`
--

INSERT INTO `teacher_invite_tokens` (`id`, `identity`, `commission`, `duration`, `group_id`, `inviter_id`, `inviter_role`, `token`, `time_invited`, `status`) VALUES
(20, 'code-invite', '20000', '30 Days', 2, 1, 'admin', 8968189, '2020-05-07 19:50:58', 'enabled'),
(21, 'code-invite', '20000', '30 Days', 2, 1, 'admin', 802773, '2020-05-07 19:50:57', 'enabled'),
(22, 'code-invite', '', '', 2, 1, 'admin', 9019879, '2020-05-07 19:50:55', 'enabled'),
(24, 'christianken@gmail.com', '20000', '90 days', 3, 1, 'admin', 3084821, '2020-05-07 19:50:52', 'enabled'),
(25, 'christianken@gmail.com', '10000', '90 days', 7, 1, 'admin', 9844821, '2020-05-07 21:18:30', 'enabled'),
(49, 'ike@gmail.com', '', '', 8, 1, 'admin', 8070470, '2020-05-07 22:56:58', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_list`
--

CREATE TABLE `teacher_list` (
  `id` int(11) NOT NULL,
  `groups` varchar(1000) DEFAULT NULL,
  `f_name` varchar(150) DEFAULT NULL,
  `l_name` varchar(150) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_list`
--

INSERT INTO `teacher_list` (`id`, `groups`, `f_name`, `l_name`, `gender`, `file_name`, `email`, `phone`, `pass`, `status`) VALUES
(1, 'Oluaka Institute | 1,refft | 11', 'Chukwuemeka', 'Ike', 'Male', '', 'ike@gmail.com', '08031677719', NULL, 'enabled'),
(3, 'Oluaka Institute | 1,SchoolSuite | 1', 'Kindness', 'Ibrahim', 'Male', '', 'kindness@gmail.com', '08033677719', NULL, 'enabled'),
(4, 'RAD5 Tech Hub | 1', 'Gideon', 'Amaka', 'Female', '', 'amaka@gmail.com', '07012554621', NULL, 'enabled'),
(6, 'Moon Warriors | 2,RAD5 Tech Hub | 1,Oluaka Institute | 1,Algorithms | 1', 'Christian', 'Kenneth', 'Male', '', 'christianken@gmail.com', '08147284532', '$2y$10$RvBRS41pf4JOyde1adAyouFO9w6N9VLD9NExzmR5e4dkzaGZaXN1q', 'enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academia_metrics`
--
ALTER TABLE `academia_metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accepted_invitation_list`
--
ALTER TABLE `accepted_invitation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `assignment_list`
--
ALTER TABLE `assignment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_list`
--
ALTER TABLE `group_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_list`
--
ALTER TABLE `lesson_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_list`
--
ALTER TABLE `quiz_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_submissions`
--
ALTER TABLE `quiz_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_invitation_list`
--
ALTER TABLE `rejected_invitation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_list`
--
ALTER TABLE `school_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_attachments`
--
ALTER TABLE `student_attachments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_name` (`file_name`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `student_invite_tokens`
--
ALTER TABLE `student_invite_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `teacher_attachments`
--
ALTER TABLE `teacher_attachments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_name` (`file_name`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `teacher_commissions`
--
ALTER TABLE `teacher_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_invite_tokens`
--
ALTER TABLE `teacher_invite_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `teacher_list`
--
ALTER TABLE `teacher_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academia_metrics`
--
ALTER TABLE `academia_metrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accepted_invitation_list`
--
ALTER TABLE `accepted_invitation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assignment_list`
--
ALTER TABLE `assignment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group_list`
--
ALTER TABLE `group_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lesson_list`
--
ALTER TABLE `lesson_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_list`
--
ALTER TABLE `quiz_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `quiz_submissions`
--
ALTER TABLE `quiz_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rejected_invitation_list`
--
ALTER TABLE `rejected_invitation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_list`
--
ALTER TABLE `school_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_attachments`
--
ALTER TABLE `student_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_invite_tokens`
--
ALTER TABLE `student_invite_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_attachments`
--
ALTER TABLE `teacher_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `teacher_commissions`
--
ALTER TABLE `teacher_commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_invite_tokens`
--
ALTER TABLE `teacher_invite_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `teacher_list`
--
ALTER TABLE `teacher_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_attachments`
--
ALTER TABLE `student_attachments`
  ADD CONSTRAINT `student_attachments_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_list` (`id`);

--
-- Constraints for table `teacher_attachments`
--
ALTER TABLE `teacher_attachments`
  ADD CONSTRAINT `teacher_attachments_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 03:46 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miet`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branches` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branches`, `course_id`) VALUES
(1, 'CS', 'B.TECH'),
(2, 'ME', 'B.TECH'),
(3, 'CIVIL', 'B.TECH'),
(4, 'EE', 'B.TECH'),
(5, 'EC', 'B.TECH');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `Courses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `Courses`) VALUES
(1, 'B.TECH'),
(2, 'M.TECH'),
(3, 'MCA'),
(4, 'MBA');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `Courses` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Notes` varchar(255) DEFAULT NULL,
  `subject_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `subject_name`, `Branch`, `course`, `Semester`, `teacher_name`, `Date`, `Notes`, `subject_code`, `status`, `date_time`) VALUES
(47, 'math', 'EE', 'M.TECH', '5', 'rajeev kashyap', '2018-08-10', 'java_tutorial (1) (1) (1).pdf', '2w3', 0, '2018-08-10 12:30:13'),
(49, 'science', 'CS', 'B.TECH', '4', 'mohan', '2018-08-08', 'java_tutorial (1) (1).pdf', 'fd34', 0, '2018-08-10 14:49:59'),
(50, 'physics', 'CS', 'B.TECH', '2', 'sachin', '2018-08-10', 'java_tutorial (1) (4).pdf', 'fd34', 0, '2018-08-10 15:07:35'),
(51, 'java programing', 'CS', 'B.TECH', '2', 'mukesh kumar', '2018-08-10', 'java_tutorial (1) (5) (3).pdf', 'dcs213', 0, '2018-08-10 16:51:06'),
(52, 'microprocesser', 'EC', 'B.TECH', '3', 'lokesh kumar', '2018-08-10', 'java_tutorial (2) (9).pdf', 'ctd12', 0, '2018-08-10 16:52:07'),
(53, 'networking', 'CS', 'B.TECH', '4', 'vikrant rana', '2018-08-10', 'java_tutorial (14).pdf', 'nt21', 0, '2018-08-10 16:53:03'),
(54, 'database', 'CS', 'B.TECH', '6', 'harsh kumar', '2018-08-11', 'java_tutorial (1) (5).pdf', 'das34', 0, '2018-08-10 16:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created`, `modified`, `status`) VALUES
(1, 'rajeev', 'this is good but not good', '2018-08-27 00:00:00', '2018-08-27 00:00:00', 1),
(2, 'rajeev', 'this is good but not good', '2018-08-27 00:00:00', '2018-08-27 00:00:00', 1),
(3, 'asdf', 'asdsafsafsafsafsafsafasf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'asdfasfd', 'asdfasfdasdfsaf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'asdf', 'asdsafsafsafsafsafsafasf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'asdfasfd', 'asdfasfdasdfsaf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'adfasdfasdf', 'asdfasfsadfasdfasfasdfasf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'asdfasdf', 'asdfasfasdfffffffffffffffffffffffffaasdfasfasdfasdfasdffasf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'adfasdfasdf', 'asdfasfsadfasdfasfasdfasf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'asdfasdf', 'asdfasfasdfffffffffffffffffffffffffaasdfasfasdfasdfasdffasf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` blob NOT NULL,
  `status` int(11) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_no`, `status`, `position`) VALUES
(1, 'rajeev', 'rajeevkashyap002@gmail.com', 'kashyap', 0x3231333739373839, 0, 'Teacher'),
(11, 'rajeev', 'rajeevkashyvap002@gmail.com', 'gh', 0x3231333739373839, 0, 'student'),
(12, 'rajeev', 'rajeevkashyap.xantatech@gmail.com', 'adf', 0x3231333739373839, 0, 'Teacher'),
(13, 'rajeev', 'rajeevkashyattrp002@gmail.com', '45435', 0x3231333739373839, 0, 'Teacher'),
(14, 'rajeev', 'rajeevkafvgshyap002@gmail.com', 'sdaasdf', 0x3231333739373839, 0, 'Teacher'),
(15, 'admin', '', 'admin', '', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

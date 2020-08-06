-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 07:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbss_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `imported_csv_files`
--

CREATE TABLE `imported_csv_files` (
  `id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded` datetime NOT NULL DEFAULT current_timestamp(),
  `imported` datetime DEFAULT NULL,
  `data_info` varchar(255) DEFAULT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `imported_csv_files`
--

INSERT INTO `imported_csv_files` (`id`, `file_name`, `uploaded`, `imported`, `data_info`, `hash`) VALUES
(37, '20200530_1590776440_234b4e.csv', '2020-05-30 00:20:40', '2020-05-31 23:02:54', 'eyJ0b3RhbF9udW1fcm93cyI6MiwiYWNjZXB0YWJsZV9yb3dzIjoxfQ==', '6461bb7eb9af78706'),
(38, '20200530_1590776486_23dc3f.csv', '2020-05-30 00:21:26', NULL, 'eyJ0b3RhbF9udW1fcm93cyI6MiwiYWNjZXB0YWJsZV9yb3dzIjoxfQ==', '2255abd1f27991a3a');

-- --------------------------------------------------------

--
-- Table structure for table `student_info_for_testimonial`
--

CREATE TABLE `student_info_for_testimonial` (
  `sl_id` int(11) NOT NULL,
  `tcert_id` varchar(20) DEFAULT NULL,
  `stu_name` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `village` varchar(50) NOT NULL,
  `post_office` varchar(50) NOT NULL,
  `post_code` int(10) NOT NULL,
  `upazilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `exam_name` varchar(150) NOT NULL,
  `borad_name` varchar(255) NOT NULL,
  `exam_year` int(10) NOT NULL,
  `group_tread` varchar(100) NOT NULL,
  `result` varchar(10) NOT NULL,
  `result_status` varchar(10) DEFAULT NULL,
  `roll_no` int(10) NOT NULL,
  `exam_centre` varchar(100) NOT NULL,
  `reg_no` bigint(16) NOT NULL,
  `session` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `last_printed` datetime DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `student_info_for_testimonial`
--

INSERT INTO `student_info_for_testimonial` (`sl_id`, `tcert_id`, `stu_name`, `father`, `mother`, `gender`, `village`, `post_office`, `post_code`, `upazilla`, `district`, `exam_name`, `borad_name`, `exam_year`, `group_tread`, `result`, `result_status`, `roll_no`, `exam_centre`, `reg_no`, `session`, `date_of_birth`, `last_printed`, `phone_number`) VALUES
(1, NULL, 'Ariful Islam', 'Md. Abdus Salam Molla', 'Beauty Begum', '', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jessore', 2015, 'Science', '4.50', 'passed', 120068, 'Senhati', 1213588637, '2013-14', '1999-02-11', NULL, NULL),
(3, NULL, 'Mahfuja', 'Joynal', 'Hasina', 'Female', 'Khalishpur', 'Khulna GPO', 9000, 'Khalishpur', 'Khulna', 'SSC', 'Jashore', 2015, 'Business', '3.50', 'passed', 126582, 'Senhati', 1235926589, '2013-14', '1998-12-06', NULL, NULL),
(4, NULL, 'Habijabi', 'Khabikha', 'Besikha', 'Male', 'hjiga', 'hajiga', 0, 'up', 'khl', 'SSC', 'Jashore', 2018, 'Business', '4.10', 'passed', 125587, 'Dighalia', 1231564865, '2016-2017', '1998-07-08', NULL, NULL),
(9, NULL, '', '', '', 'Male', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', 0, '', '0000-00-00', NULL, NULL),
(10, NULL, '', '', '', 'Male', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', 0, '', '0000-00-00', NULL, NULL),
(11, NULL, '', '', '', 'Male', '', '', 0, '', '', '', '', 0, '', '', '', 0, '', 0, '', '0000-00-00', NULL, NULL),
(12, 'S-1415120068', 'Arman Arif', 'Abdus Salam', 'Beauty Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2015, 'Science', '4.50', 'passed', 120068, 'Senhati', 1213588637, '2013-2014', '1998-03-17', NULL, '01755900055');

-- --------------------------------------------------------

--
-- Table structure for table `temp_list_for_testimonial`
--

CREATE TABLE `temp_list_for_testimonial` (
  `temp_id` int(11) NOT NULL,
  `stu_name` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `village` varchar(50) NOT NULL,
  `post_office` varchar(50) NOT NULL,
  `post_code` int(10) NOT NULL,
  `upazilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `exam_name` varchar(150) NOT NULL,
  `borad_name` varchar(255) NOT NULL,
  `exam_year` int(10) NOT NULL,
  `group_tread` varchar(100) NOT NULL,
  `result` varchar(10) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `exam_center` varchar(100) NOT NULL,
  `reg_no` bigint(16) NOT NULL,
  `session` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `user_role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `fullname`, `email`, `passwd`, `user_role`) VALUES
(1, 'admin', 'Administrator', 'mail@armanarif.com', '21232f297a57a5a743894a0e4a801fc3', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imported_csv_files`
--
ALTER TABLE `imported_csv_files`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `student_info_for_testimonial`
--
ALTER TABLE `student_info_for_testimonial`
  ADD PRIMARY KEY (`sl_id`) USING BTREE;

--
-- Indexes for table `temp_list_for_testimonial`
--
ALTER TABLE `temp_list_for_testimonial`
  ADD PRIMARY KEY (`temp_id`) USING BTREE;

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imported_csv_files`
--
ALTER TABLE `imported_csv_files`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student_info_for_testimonial`
--
ALTER TABLE `student_info_for_testimonial`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `temp_list_for_testimonial`
--
ALTER TABLE `temp_list_for_testimonial`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

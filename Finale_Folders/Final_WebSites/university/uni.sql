-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 11:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `se_id` int(25) NOT NULL,
  `en_num` int(25) NOT NULL,
  `e_id` int(25) NOT NULL,
  `e_num` int(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`se_id`, `en_num`, `e_id`, `e_num`) VALUES
(2, 4001, 2876, 0),
(2, 4002, 2877, 12183);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `m_id` int(11) NOT NULL,
  `se_id` int(11) NOT NULL,
  `en_num` int(11) NOT NULL,
  `su_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `e_num` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`m_id`, `se_id`, `en_num`, `su_id`, `mark`, `grade`, `e_num`) VALUES
(33, 2, 4001, 7, 30, '', 12022),
(34, 2, 4001, 8, 31, '', 12022),
(35, 2, 4001, 9, 55, '', 12022),
(36, 2, 4001, 10, 58, '', 12022),
(37, 2, 4001, 11, 65, '', 12022),
(38, 2, 4001, 12, 40, '', 12022),
(39, 2, 4001, 13, 44, '', 12022),
(40, 2, 4001, 14, 34, '', 12022),
(41, 2, 4002, 7, 32, '', 0),
(42, 2, 4002, 8, 33, '', 0),
(43, 2, 4002, 9, 60, '', 0),
(44, 2, 4002, 10, 63, '', 0),
(45, 2, 4002, 11, 69, '', 0),
(46, 2, 4002, 12, 43, '', 0),
(47, 2, 4002, 13, 45, '', 0),
(48, 2, 4002, 14, 35, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `se_id` int(11) NOT NULL,
  `semester_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`se_id`, `semester_name`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2'),
(3, 'Semester 3'),
(4, 'Semester 4'),
(5, 'Semester 5'),
(6, 'Semester 6'),
(7, 'Graduation');

-- --------------------------------------------------------

--
-- Table structure for table `studen`
--

CREATE TABLE `studen` (
  `st_id` int(11) NOT NULL,
  `fname` varchar(2552) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(23) NOT NULL,
  `en_num` int(25) NOT NULL,
  `se_id` int(25) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studen`
--

INSERT INTO `studen` (`st_id`, `fname`, `sname`, `lname`, `full_name`, `gender`, `en_num`, `se_id`) VALUES
(34, 'Ritik', '', 'Aed', 'Ritik  Aed', 'male', 4001, 2),
(35, 'Rudra', '', 'Kapdiya', 'Rudra  Kapdiya', 'male', 4002, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `su_id` int(25) NOT NULL,
  `se_id` int(25) NOT NULL,
  `su_name` varchar(255) NOT NULL,
  `su_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`su_id`, `se_id`, `su_name`, `su_code`) VALUES
(7, 2, 'PDL', '201'),
(8, 2, 'PC', '202'),
(9, 2, 'DBMS-I', '204'),
(10, 2, 'PROGRAMMING WITH C', '203'),
(11, 2, 'SAD', '205'),
(12, 2, 'DBMS-I(P)', '206'),
(13, 2, 'PROGRAMMING WITH C(P)', '207'),
(14, 2, 'CONT', '208');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD UNIQUE KEY `e_id` (`e_id`),
  ADD KEY `exam_fk` (`en_num`),
  ADD KEY `exam1_fk` (`se_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `unique_marks` (`se_id`,`en_num`,`su_id`),
  ADD KEY `fk_marks_subject` (`su_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `studen`
--
ALTER TABLE `studen`
  ADD PRIMARY KEY (`en_num`),
  ADD UNIQUE KEY `st_id` (`st_id`),
  ADD KEY `semester_fk` (`se_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`su_id`),
  ADD KEY `subject_fk` (`se_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `e_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2878;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `studen`
--
ALTER TABLE `studen`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `su_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exam1_fk` FOREIGN KEY (`se_id`) REFERENCES `studen` (`se_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_fk` FOREIGN KEY (`en_num`) REFERENCES `studen` (`en_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `fk_marks_student` FOREIGN KEY (`se_id`,`en_num`) REFERENCES `studen` (`se_id`, `en_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_marks_subject` FOREIGN KEY (`su_id`) REFERENCES `subjects` (`su_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studen`
--
ALTER TABLE `studen`
  ADD CONSTRAINT `semester_fk` FOREIGN KEY (`se_id`) REFERENCES `semester` (`se_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subject_fk` FOREIGN KEY (`se_id`) REFERENCES `semester` (`se_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

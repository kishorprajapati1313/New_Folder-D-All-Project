-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 03:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inovation`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `se_id` int(25) NOT NULL,
  `en_num` int(25) NOT NULL,
  `e_id` int(25) NOT NULL,
  `e_num` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`se_id`, `en_num`, `e_id`, `e_num`) VALUES
(1, 214, 2783, 0),
(1, 1112, 2784, 0),
(4, 1, 2785, 0),
(4, 2, 2786, 0),
(4, 3, 2787, 0),
(4, 4, 2788, 0),
(4, 5, 2789, 0),
(4, 6, 2790, 0),
(4, 9, 2791, 0),
(4, 10, 2792, 0),
(4, 11, 2793, 0),
(4, 12, 2794, 0),
(4, 13, 2795, 0),
(4, 14, 2796, 0),
(4, 15, 2797, 0),
(4, 16, 2798, 0),
(4, 17, 2799, 0),
(4, 18, 2800, 0),
(4, 190, 2801, 0),
(4, 123421, 2802, 0),
(4, 126789, 2803, 0),
(5, 19, 2804, 0),
(6, 191, 2805, 0);

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
  `grade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 'oerg', 'iuergieu', 'eiurg', 'oerg iuergieu eiurg', 'male', 1, 4),
(10, 'durg', 'eruhg', 'erhg', 'durg eruhg erhg', 'female', 2, 4),
(11, 'nweh', 'mhjwebf', 'hewb', 'nweh mhjwebf hewb', 'female', 3, 4),
(12, 'eufh', 'hqef', 'jheqa', 'eufh hqef jheqa', 'female', 4, 4),
(13, '3eh', '', '', '3eh  ', 'male', 5, 4),
(14, '', '', '', '  ', 'female', 6, 4),
(15, 'wkjsf', '', '', 'wkjsf  ', 'female', 9, 4),
(16, 'kjrfkj', '', '', 'kjrfkj  ', 'male', 10, 4),
(17, 'jwhfju', 'wuefh', 'wuef', 'jwhfju wuefh wuef', 'male', 11, 4),
(19, 'hfb', '', '', 'hfb  ', 'male', 12, 4),
(21, 'qwjd', 'jewnd', 'wjend', 'qwjd jewnd wjend', 'male', 13, 4),
(22, 'wme,f', '', '', 'wme,f  ', 'male', 14, 4),
(23, 'kwdf', '', '', 'kwdf  ', 'male', 15, 4),
(25, '13', '', '', '13  ', 'male', 16, 4),
(26, '', '', '', '  ', 'male', 17, 4),
(27, '12e', 'wdc', 'sdc', '12e wdc sdc', 'male', 18, 4),
(28, 'wsdfwew', '', '', 'wsdfwew  ', 'male', 19, 5),
(20, 'wf', '', '', 'wf  ', 'male', 190, 4),
(29, '', '', '', '  ', 'female', 191, 6),
(31, '', '', '', '  ', 'male', 214, 1),
(30, '', '', '', '  ', 'male', 1112, 1),
(8, 'ufh', 'ikurf', 'iswrhf', 'ufh ikurf iswrhf', 'male', 123421, 4),
(4, 'kisu', 'j', 'prajapati', 'kisu j prajapati', 'male', 126789, 4);

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
(1, 3, 'uhwe', 'jwrhf'),
(2, 1, 'wjhfhg', '101'),
(4, 1, 'wjhrygf', '102'),
(5, 1, 'wirubf12', '12'),
(6, 2, 'ee', '123');

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
  MODIFY `e_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2814;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studen`
--
ALTER TABLE `studen`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `su_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

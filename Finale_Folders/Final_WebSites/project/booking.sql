-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 03:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(54, '', 'dp', '95687afb5d9a2a9fa39038f991640b0c'),
(55, '', 'kp', '26b568e4192a164d5b3eacdbd632bc2e'),
(56, '', 'bp', '5cfdb867e96374c7883b31d6928cc4cb'),
(58, 'jn', 'jn', '17cedeccc3a6555b9a5826e4d726eae3'),
(59, 'kishor', 'kp', '26b568e4192a164d5b3eacdbd632bc2e');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `fectured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `description`, `price`, `category_id`, `fectured`, `active`, `image_name`, `c_id`) VALUES
(50, 'tumar', '   jhrfrcwcccecuech                 ', '90', 39, 'yes', 'yes', 'category5219.jpg', 0),
(51, 'chkali', '                    ', '19', 39, 'yes', 'yes', 'category6154.jpg', 0),
(52, 'popat', '                    ', '29', 39, 'yes', 'yes', 'book-name4562.jpg', 0),
(53, 'vandaro', '                    ', '34', 0, 'yes', 'yes', 'book-name5878.jpg', 0),
(54, 'gorila', '                    ', '0', 0, 'no', 'no', '', 0),
(60, 'sdc', '                    ', '55', 0, 'yes', 'yes', 'book-name23.png', 0),
(61, 'efhohe', '                    ', '0', 42, 'no', 'yes', '', 0),
(62, 'h', '                    ', '87', 39, 'yes', 'yes', 'category6235.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ca`
--

CREATE TABLE `ca` (
  `id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ca`
--

INSERT INTO `ca` (`id`, `featured`, `active`, `title`, `image_name`) VALUES
(39, 'yes', 'yes', 'Actions', 'category4450.jpg'),
(40, 'yes', 'yes', 'Advenctred', 'category6215.jpg'),
(41, 'yes', 'yes', 'Horror', 'category7524.jpg'),
(42, 'no', 'yes', 'Science', 'category7977.jpg'),
(44, 'yes', 'yes', 'Devloping', ''),
(47, 'yes', 'yes', 'si\"hbvueuyv\"', 'category6224.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `book` varchar(150) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(10) NOT NULL,
  `customer_contect` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `book`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contect`, `customer_email`, `customer_address`) VALUES
(10, 'tumar', '90', '5', '450', '2022-12-20 12:16:48', 'On-Deliver', 'jh', '678', 'abc@gmail.com', 'hhhhhh'),
(11, 'sdc', '55', '3', '165', '2022-12-21 02:59:05', 'order', 'bfvhvhfv', 'jshdfbe', 'abc@gmail.com', 'sndbv '),
(12, 'tumar', '90', '1', '90', '2023-03-05 08:02:44', 'Delivered', 'sdf', '234567890', 'sdytcf@gmai.com', 'ertyuio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca`
--
ALTER TABLE `ca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `ca`
--
ALTER TABLE `ca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

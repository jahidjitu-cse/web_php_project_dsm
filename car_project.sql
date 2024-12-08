-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 04:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name`, `email`, `phone`, `message`) VALUES
(3, 'Md. Jahid Hasan Jitu', ' jahidjitu095@gmail.com', 1644409544, ' hello'),
(4, 'Jahid Hasan Jitu', ' jahidjitu05@gmail.com', 1644409556, ' hiiii'),
(5, 'Jahid Hasan', ' jahidjitu66@gmail.com', 1644409558, ' hiiii helo'),
(8, 'Jitu', ' jitu095@gmail.com', 1644409544, ' hello'),
(9, 'Jitu Hasan', ' jituhasan88@gmail.com', 1997745187, ' heyyyy'),
(11, 'shrabon rani', ' shrabonrani@gmail.com', 1644409588, ' hello');

-- --------------------------------------------------------

--
-- Table structure for table `package_list`
--

CREATE TABLE `package_list` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `training_duration` varchar(100) NOT NULL,
  `cost` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_list`
--

INSERT INTO `package_list` (`id`, `name`, `description`, `training_duration`, `cost`) VALUES
(1, 'Automatic Car Training', 'This package is a sample car training package for automatic  transmission.', '30 Days', 4200),
(2, 'Manual Car Training', 'This is a sample car driving training package for manual transmission.', '30 Days', 5200);

-- --------------------------------------------------------

--
-- Table structure for table `result_info`
--

CREATE TABLE `result_info` (
  `id` int(10) DEFAULT NULL,
  `result_type` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_info`
--

INSERT INTO `result_info` (`id`, `result_type`) VALUES
(1, 'Passed - Successfully cleared the requirements'),
(2, 'Failed - Could not completed the necessary criteria'),
(3, 'Running - Currently in progress');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `email`, `phone`) VALUES
(6, 'Md. Jahid Hasan Jitu', 'very good', 'jahidjitu095@gmail.com', 1644409544),
(7, 'Jahid Hasan Jitu', ' very good', 'jahidjitu095@gmail.com', 1644409544),
(10, 'Shrabon Rani', 'vary good teacher', 'shrabonrani@gmail.com', 1997745187);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `package_no` int(11) DEFAULT NULL,
  `result_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`, `package_no`, `result_status`) VALUES
(1, 'admin', 1997745738, 'admin@gmail.com', 'admin', '1234', NULL, NULL),
(2, 'student', 1997745187, 'student@gmail.com', 'student', '1234', 1, 1),
(9, 'Jitu', 1644409544, 'jahidjitu095@gmail.com', 'student', '1234', 2, 1),
(13, 'Jahid', 1644409556, 'jahidjitu095@gmail.com', 'student', '1234', 2, 3),
(18, 'shrabon rani', 1644409544, 'shrabonrani@gmail.com', 'student', '1234', 2, 1),
(19, 'Jahid1', 1997745738, 'jahid@example.com', 'student', '1234', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_list`
--
ALTER TABLE `package_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package_list`
--
ALTER TABLE `package_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

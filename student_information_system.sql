-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 12:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_information_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_phone_number` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone_number`) VALUES
(1, 'abod', 'abod@gmail.com', '123', 774029471);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cour_no` int(3) NOT NULL,
  `cour_name` int(30) NOT NULL,
  `t_no` int(2) NOT NULL,
  `sec_no` int(2) NOT NULL,
  `cour_level` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cour_term` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_no` int(4) NOT NULL,
  `s_no` int(3) NOT NULL,
  `cour_no` int(3) NOT NULL,
  `e_date` date NOT NULL,
  `e_degree` double NOT NULL,
  `s_degree` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_no` int(2) NOT NULL,
  `f_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_no` int(2) NOT NULL,
  `sec_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sec_date` date NOT NULL,
  `f_no` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_no` int(3) NOT NULL,
  `s_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_id` int(15) NOT NULL,
  `s_sex` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `s_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_dob` date NOT NULL,
  `s_phone_number` int(15) NOT NULL,
  `s_nationality` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sec_no` int(2) NOT NULL,
  `s_level` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teatcher`
--

CREATE TABLE `teatcher` (
  `t_no` int(2) NOT NULL,
  `t_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `t_phone_number` int(15) NOT NULL,
  `t_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `t_salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cour_no`),
  ADD KEY `sec_no` (`sec_no`),
  ADD KEY `t_no` (`t_no`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_no`),
  ADD KEY `exam_ibfk_1` (`s_no`),
  ADD KEY `cour_no` (`cour_no`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_no`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_no`),
  ADD KEY `f_no` (`f_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `sec_no` (`sec_no`);

--
-- Indexes for table `teatcher`
--
ALTER TABLE `teatcher`
  ADD PRIMARY KEY (`t_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cour_no` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `e_no` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_no` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_no` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_no` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teatcher`
--
ALTER TABLE `teatcher`
  MODIFY `t_no` int(2) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`sec_no`) REFERENCES `section` (`sec_no`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`t_no`) REFERENCES `teatcher` (`t_no`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`s_no`) REFERENCES `students` (`s_no`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`cour_no`) REFERENCES `courses` (`cour_no`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`f_no`) REFERENCES `faculty` (`f_no`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`sec_no`) REFERENCES `section` (`sec_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 08:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpin_tb`
--

CREATE TABLE `adminpin_tb` (
  `id` int(11) NOT NULL,
  `pin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminpin_tb`
--

INSERT INTO `adminpin_tb` (`id`, `pin`) VALUES
(12, 231999);

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `pin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `Name`, `Email`, `Password`, `pin`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin123', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `declared_res_tb`
--

CREATE TABLE `declared_res_tb` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sroll` varchar(255) NOT NULL,
  `ssemester` varchar(255) NOT NULL,
  `marksdata` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `declared_res_tb`
--

INSERT INTO `declared_res_tb` (`id`, `sname`, `sroll`, `ssemester`, `marksdata`) VALUES
(20, 'pranay kalita', 'BSIT40', '1st', '[[{\"srno\":\"1\",\"subjects\":\"Web Technology\",\"total\":\"100\",\"obtained\":\"85\"},{\"srno\":\"2\",\"subjects\":\"Embedded System\",\"total\":\"100\",\"obtained\":\"86\"},{\"srno\":\"3\",\"subjects\":\"Software Engineering\",\"total\":\"100\",\"obtained\":\"90\"},{\"srno\":\"4\",\"subjects\":\"Artificial Intelligence\",\"total\":\"100\",\"obtained\":\"65\"}]]'),
(22, 'dummy ac', '41', '1st', '[[{\"srno\":\"1\",\"subjects\":\"Web Technology\",\"total\":\"100\",\"obtained\":\"88\"},{\"srno\":\"2\",\"subjects\":\"Embedded System\",\"total\":\"100\",\"obtained\":\"73\"},{\"srno\":\"3\",\"subjects\":\"Software Engineering\",\"total\":\"100\",\"obtained\":\"65\"},{\"srno\":\"4\",\"subjects\":\"Artificial Intelligence\",\"total\":\"70\",\"obtained\":\"24\"}]]'),
(23, 'dummy ac', '41', '3rd', '[[{\"srno\":\"1\",\"subjects\":\"Web Technology\",\"total\":\"100\",\"obtained\":\"50\"},{\"srno\":\"2\",\"subjects\":\"Software Engineering\",\"total\":\"100\",\"obtained\":\"70\"},{\"srno\":\"3\",\"subjects\":\"Software Engineering\",\"total\":\"100\",\"obtained\":\"77\"},{\"srno\":\"4\",\"subjects\":\"Artificial Intelligence\",\"total\":\"100\",\"obtained\":\"44\"}]]');

-- --------------------------------------------------------

--
-- Table structure for table `semester_tb`
--

CREATE TABLE `semester_tb` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester_tb`
--

INSERT INTO `semester_tb` (`id`, `semester`) VALUES
(6, '1st'),
(7, '2nd'),
(8, '3rd'),
(9, '4th'),
(10, '5th'),
(11, '6th');

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

CREATE TABLE `student_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `sem` varchar(255) NOT NULL,
  `rstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`id`, `name`, `roll`, `dob`, `sem`, `rstatus`) VALUES
(8, 'pranay kalita', 'BSIT40', '1999-07-14', '1st', 1),
(10, 'dummy ac', '41', '1999-07-14', '2nd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_tb`
--

CREATE TABLE `subjects_tb` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_tb`
--

INSERT INTO `subjects_tb` (`id`, `subject`, `semester`) VALUES
(11, 'Web Technology', '5th'),
(12, 'Embedded System', '5th'),
(13, 'Software Engineering', '5th'),
(14, 'Artificial Intelligence', '5th');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpin_tb`
--
ALTER TABLE `adminpin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declared_res_tb`
--
ALTER TABLE `declared_res_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_tb`
--
ALTER TABLE `semester_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tb`
--
ALTER TABLE `student_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects_tb`
--
ALTER TABLE `subjects_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpin_tb`
--
ALTER TABLE `adminpin_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `declared_res_tb`
--
ALTER TABLE `declared_res_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `semester_tb`
--
ALTER TABLE `semester_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects_tb`
--
ALTER TABLE `subjects_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

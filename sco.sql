-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 01:11 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sco`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `acadamic_code` int(11) NOT NULL,
  `academic_year` varchar(20) NOT NULL,
  `semester` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_code` char(10) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_code`, `department_name`) VALUES
('BSBA', 'BUSINESS Administration Department'),
('EDUC', 'EDUCATION DEPARTMENT'),
('IT', 'INFORMATION TECHNOLOGY department');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_code` varchar(100) NOT NULL,
  `event_name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_code`, `event_name`, `date`) VALUES
('gen ass', 'general assembly', '2019-02-28'),
('symposium', 'anti-drugs', '2019-02-14'),
('workshop', 'resume WRITING', '2019-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id_number` varchar(50) NOT NULL,
  `event_code` varchar(100) NOT NULL,
  `penalty` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`id_number`, `event_code`, `penalty`, `date`) VALUES
('000000', 'symposium', '100.00', '2019-03-12'),
('44444', 'gen ass', '50.00', '2019-03-23'),
('5555', 'workshop', '45.00', '2019-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_code` varchar(50) NOT NULL,
  `organization_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_code`, `organization_name`) VALUES
('CodEn', 'CODING Enthusiast'),
('LGDC', 'LIKHANG Galaw Dance Company'),
('RCY', 'Green Cross Youth');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `department_code` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`course_code`, `course_name`, `department_code`) VALUES
('BSBA', 'Bachelor of Science in Business Administration BSBA', 'EDUC'),
('Educ', 'Bachelor of Science in SECONDARY EDUCATION 34234', 'EDUC'),
('IT', 'Bachelor of Science in Information Technology', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `year`) VALUES
('1a', '1st YEAR'),
('1b', '1st YEAR'),
('1c', '1st YEAR'),
('1d', '1st year'),
('2a', '2nd year'),
('2c', '2nd year'),
('2d', '2nd year'),
('2f', '2nd year'),
('3a', '3rd year');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_number` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `section_id` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_number`, `last_name`, `first_name`, `middle_name`, `course_code`, `section_id`, `status`) VALUES
('000000', 'tamad', 'juan', 'baba', 'Educ', '2f', 'currently Enrolled'),
('111111', 'baluyos', 'john michael', '', 'IT', '3a', 'currently Enrolled'),
('22222', 'dfdsafs', 'dfdsfdsfd', 'f', 'Educ', '2a', 'currently enrolled'),
('33333', 'sd', 'bbbb', 'xz', 'IT', '1d', 'dropped'),
('44444', 'penduko', 'pedro', 'none', 'BSBA', '1c', 'dropped'),
('5555', 'xxx', 'wwww', 'gfg', 'Educ', '1a', 'currently enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`acadamic_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_code`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_code`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD KEY `id_number` (`id_number`),
  ADD KEY `event_code` (`event_code`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_code`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `department_code` (`department_code`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `student_ibfk_1` (`section_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `student` (`id_number`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fines_ibfk_2` FOREIGN KEY (`event_code`) REFERENCES `event` (`event_code`) ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `department` (`department_code`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `program` (`course_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

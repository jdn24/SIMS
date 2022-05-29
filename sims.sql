-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 29, 2022 at 07:13 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sims`
--
CREATE DATABASE IF NOT EXISTS `sims` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sims`;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mid` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `std_fname` varchar(250) CHARACTER SET latin1 NOT NULL,
  `std_lname` varchar(250) CHARACTER SET latin1 NOT NULL,
  `cid` int(11) NOT NULL,
  `cname` varchar(250) CHARACTER SET latin1 NOT NULL,
  `sub1` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `mark1` decimal(5,2) DEFAULT NULL,
  `sub2` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `mark2` decimal(5,2) DEFAULT NULL,
  `sub3` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `mark3` decimal(5,2) DEFAULT NULL,
  `sub4` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `mark4` decimal(5,2) DEFAULT NULL,
  `sub5` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `mark5` decimal(5,2) DEFAULT NULL,
  `sub6` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `mark6` decimal(5,2) DEFAULT NULL,
  `sub7` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `mark7` decimal(5,2) DEFAULT NULL,
  `updated_by` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mid`, `std_id`, `std_fname`, `std_lname`, `cid`, `cname`, `sub1`, `mark1`, `sub2`, `mark2`, `sub3`, `mark3`, `sub4`, `mark4`, `sub5`, `mark5`, `sub6`, `mark6`, `sub7`, `mark7`, `updated_by`) VALUES
(10, 11, 'Venkat', 'Karanam', 12032, 'BACHELOR OF COMMERCE', 'Accountancy', '90.00', 'Business Studies', '98.00', 'Economics', '95.00', 'Mathematics', '90.00', 'Management', '50.00', 'Marketing', '80.00', 'Human Resource', '68.00', 'jdn');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `cid` int(11) DEFAULT NULL,
  `course` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) DEFAULT NULL,
  `lname` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `gname` varchar(250) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `mobno` varchar(50) NOT NULL,
  `emailid` varchar(250) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `board` varchar(50) DEFAULT NULL,
  `roll` varchar(50) DEFAULT NULL,
  `pyear` varchar(50) DEFAULT NULL,
  `marks` varchar(10) DEFAULT NULL,
  `board1` varchar(250) DEFAULT NULL,
  `roll1` varchar(250) DEFAULT NULL,
  `pyear1` varchar(250) DEFAULT NULL,
  `marks1` varchar(10) DEFAULT NULL,
  `regdate` varchar(250) NOT NULL,
  `regno` varchar(250) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `sub1` varchar(250) DEFAULT NULL,
  `sub2` varchar(250) DEFAULT NULL,
  `sub3` varchar(250) DEFAULT NULL,
  `sub4` varchar(250) DEFAULT NULL,
  `sub5` varchar(250) DEFAULT NULL,
  `sub6` varchar(250) DEFAULT NULL,
  `sub7` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`cid`, `course`, `fname`, `mname`, `lname`, `gender`, `gname`, `nationality`, `mobno`, `emailid`, `country`, `state`, `board`, `roll`, `pyear`, `marks`, `board1`, `roll1`, `pyear1`, `marks1`, `regdate`, `regno`, `id`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`) VALUES
(14202, 'BACHELOR OF TECHNOLOGY', 'Jaden', '', 'Ade', 'Male', 'Joseph', 'Indian', '0589129702', '', 'UAE', 'Dubai', '', '', '', '', '', '', '', '', '29-05-2022', '', 9, 'Engineering Drawing', 'Computer Programming', 'Computer Science Essentials', 'Operating Systems', 'Data Structures', 'Computer Networks', 'Applied Thermodynamics'),
(12032, 'BACHELOR OF COMMERCE', 'Venkat', 'Sai', 'Karanam', 'Male', 'Sai', 'Indian', '0583253656', 'venkatK@amitydubai.ae', 'UAE', 'DUBAI', '', '', '', '', '', '', '', '', '29-05-2022', 'A2345346', 11, 'Accountancy', 'Business Studies', 'Economics', 'Mathematics', 'Management', 'Marketing', 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `cid` int(11) NOT NULL,
  `cshort` varchar(50) DEFAULT NULL,
  `cfull` varchar(250) DEFAULT NULL,
  `sub1` varchar(250) DEFAULT NULL,
  `sub2` varchar(250) DEFAULT NULL,
  `sub3` varchar(250) DEFAULT NULL,
  `sub4` varchar(250) DEFAULT NULL,
  `sub5` varchar(250) DEFAULT NULL,
  `sub6` varchar(250) DEFAULT NULL,
  `sub7` varchar(250) DEFAULT NULL,
  `sdate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`cid`, `cshort`, `cfull`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sdate`) VALUES
(12032, 'B.COM', 'BACHELOR OF COMMERCE', 'Accountancy', 'Business Studies', 'Economics', 'Mathematics', 'Management', 'Marketing', 'Human Resource', '23-05-2022'),
(14202, 'B.TECH', 'BACHELOR OF TECHNOLOGY', 'Engineering Drawing', 'Computer Programming', 'Computer Science Essentials', 'Operating Systems', 'Data Structures', 'Computer Networks', 'Applied Thermodynamics', '22-05-2022'),
(15323, 'M.S.C', 'MASTER OF SCIENCE', 'Mathematics', 'Physics', 'Chemistry', 'Biology', 'Computer Science', 'Biotechnology', 'Life Sciences', '22-05-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `cid` int(11) NOT NULL,
  `cshort` varchar(250) DEFAULT NULL,
  `cfull` varchar(250) DEFAULT NULL,
  `cdate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`cid`, `cshort`, `cfull`, `cdate`) VALUES
(12032, 'B.COM', 'BACHELOR OF COMMERCE', '21-05-2022'),
(13206, 'B.SC', 'BACHELOR OF SCIENCE', '21-05-2022'),
(14202, 'B.TECH', 'BACHELOR OF TECHNOLOGY', '22-05-2022'),
(15320, 'M.C.A', 'MASTER OF COMPUTER APPLICATION', '14-05-2022'),
(15323, 'M.S.C', 'MASTER OF SCIENCE', '16-05-2022'),
(18231, 'M.B.A', 'MASTER OF BUSINESS ADMINISTRATION', '17-05-2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`) VALUES
(1, 'admin', 'Administrator', 'root'),
(2, 'jdn', 'Jaden Ade', 'Jaden123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `std_id` (`std_id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `cname` (`cname`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `country` (`country`),
  ADD KEY `course` (`course`),
  ADD KEY `nationality` (`nationality`),
  ADD KEY `sub1` (`sub1`,`sub2`,`sub3`,`sub4`,`sub5`,`sub6`,`sub7`),
  ADD KEY `sub1_2` (`sub1`,`sub2`,`sub3`,`sub4`,`sub5`,`sub6`,`sub7`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cshort` (`cshort`,`cfull`),
  ADD UNIQUE KEY `cfull` (`cfull`),
  ADD KEY `sub1_2` (`sub1`,`sub2`,`sub3`,`sub4`,`sub5`,`sub6`,`sub7`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cshort` (`cshort`,`cfull`),
  ADD UNIQUE KEY `cfull` (`cfull`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15324;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18232;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `registration` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_4` FOREIGN KEY (`cname`) REFERENCES `registration` (`course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_4` FOREIGN KEY (`cid`) REFERENCES `subject` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_ibfk_5` FOREIGN KEY (`course`) REFERENCES `subject` (`cfull`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`cshort`) REFERENCES `tbl_course` (`cshort`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `tbl_course` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_4` FOREIGN KEY (`cfull`) REFERENCES `tbl_course` (`cfull`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

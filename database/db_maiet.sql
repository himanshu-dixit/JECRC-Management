-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2017 at 12:32 PM
-- Server version: 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_maiet`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `batch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`batch_id`, `teacher_id`, `student_id`, `date`) VALUES
(11, 2, 795, '2017-03-13 18:23:04'),
(11, 2, 795, '2017-03-13 18:28:54'),
(11, 2, 796, '2017-03-13 18:28:54'),
(11, 2, 795, '2017-03-13 18:31:11'),
(11, 2, 796, '2017-03-13 18:31:11'),
(13, 2, 795, '2017-03-13 18:34:27'),
(13, 2, 796, '2017-03-13 18:34:27'),
(11, 2, 795, '2017-03-13 18:40:35'),
(11, 2, 796, '2017-03-13 18:40:35'),
(11, 2, 794, '2017-03-13 18:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_complete`
--

CREATE TABLE `attendance_complete` (
  `batch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_complete`
--

INSERT INTO `attendance_complete` (`batch_id`, `teacher_id`, `date`) VALUES
(11, 2, '2017-03-13 18:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblbatch`
--

CREATE TABLE `tblbatch` (
  `BatchId` int(5) NOT NULL,
  `BatchName` varchar(500) NOT NULL,
  `BrId` int(11) NOT NULL,
  `year` int(10) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbatch`
--

INSERT INTO `tblbatch` (`BatchId`, `BatchName`, `BrId`, `year`, `start`, `end`, `teacher_id`) VALUES
(11, 'Himanshu', 1, 2, 23, 1000, 2),
(19, 'Dance', 2, 2, 789, 900, 22),
(18, 'Jumba', 2, 2, 793, 894, 21),
(13, 'test', 1, 2015, 21, 999, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblbranch`
--

CREATE TABLE `tblbranch` (
  `BrId` int(20) NOT NULL,
  `BrName` varchar(30) NOT NULL,
  `Sid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbranch`
--

INSERT INTO `tblbranch` (`BrId`, `BrName`, `Sid`) VALUES
(1, 'Civil', 1),
(2, 'CS', 1),
(3, 'EE', 1),
(4, 'E & C', 1),
(5, 'I T', 1),
(6, 'ME', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblday`
--

CREATE TABLE `tblday` (
  `DayId` int(3) NOT NULL,
  `DayName` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblday`
--

INSERT INTO `tblday` (`DayId`, `DayName`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `tbldept`
--

CREATE TABLE `tbldept` (
  `DeptId` int(11) NOT NULL,
  `DeptName` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldept`
--

INSERT INTO `tbldept` (`DeptId`, `DeptName`) VALUES
(1, 'Civil'),
(2, 'CS'),
(3, 'EE'),
(4, 'E & C'),
(5, 'IT'),
(6, 'ME'),
(7, 'Applied Science');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `FId` int(50) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `FDesignation` varchar(30) NOT NULL,
  `DeptId` int(10) NOT NULL,
  `doj` date NOT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`FId`, `FName`, `FDesignation`, `DeptId`, `doj`, `dob`, `doa`) VALUES
(1, 'Ankit Goyal', 'Lecturer', 2, '2013-08-01', '1991-08-08', '0000-00-00'),
(2, 'Deepak Gupta', 'Lecturer', 2, '2012-12-06', '1988-03-27', '0000-00-00'),
(3, 'Kunj Bihari Tiwari', 'Lecturer', 2, '2012-12-06', '1992-10-20', '0000-00-00'),
(4, 'Pramod Gupta', 'Lecturer', 2, '2011-07-12', '1980-08-07', '2010-01-20'),
(5, 'Rishabh Sharma', 'Lecturer', 2, '2013-08-01', '1992-02-22', '0000-00-00'),
(6, 'Rohita Gupta', 'Lecturer', 2, '2012-12-10', '1990-03-14', '0000-00-00'),
(7, 'Priyanka Bansal', 'Lecturer', 2, '2012-12-06', '1989-09-04', '0000-00-00'),
(8, 'Sagar Khandelwal', 'Lecturer', 2, '2011-08-11', '1985-11-15', '2012-12-05'),
(9, 'Saroj Agarwal', 'Lecturer', 2, '2013-07-22', '1980-03-09', '2008-11-19'),
(10, 'Sonal Shukla', 'Lecturer', 2, '2013-08-01', '1991-01-19', '0000-00-00'),
(11, 'Varsha Hemrajani', 'Lecturer', 2, '2012-12-06', '1987-04-03', '2009-10-30'),
(12, 'Rizwan Khan', 'Lecturer', 2, '2009-09-05', '1985-07-10', '2013-05-02'),
(13, 'Prashant Sharma', 'Lecturer', 2, '2012-12-14', '1993-09-14', '0000-00-00'),
(14, 'Pooja Pankaj', 'Lecturer', 2, '2013-08-01', '1992-11-29', '0000-00-00'),
(15, 'Azad Bhagat Singh', 'Lecturer', 2, '2007-02-23', '1978-08-15', '2007-05-07'),
(16, 'Dilip Gupta', 'Lecturer', 2, '2003-09-01', '1977-04-21', '2004-04-22'),
(17, 'Garima Bajla', 'Lecturer', 2, '2006-05-16', '1978-09-09', '2003-05-12'),
(18, 'Anshul Goyal', 'Lecturer', 4, '0000-00-00', '0000-00-00', '0000-00-00'),
(19, 'Saurabh Jain', 'Lecturer', 4, '0000-00-00', '0000-00-00', '0000-00-00'),
(20, 'Devender Dhaked', 'Lecturer', 2, '2014-09-01', '0000-00-00', '0000-00-00'),
(21, 'Sameep N. Sinha', 'Lecturer', 2, '2013-07-27', '1990-12-24', '0000-00-00'),
(22, 'Lakhita Arora', 'Lecturer', 2, '2013-08-01', '1992-01-03', '0000-00-00'),
(23, 'Neeraj P. Shrivastava', 'Lecturer', 2, '2002-07-01', '1975-07-27', '2002-04-21'),
(24, 'Pratibha Sharma', 'Lecturer', 2, '2013-08-01', '1991-07-14', '0000-00-00'),
(25, 'Kirti Gupta', 'Lecturer', 2, '2014-09-01', '1992-09-20', '0000-00-00'),
(26, 'Amit Yadav', 'Lecturer', 2, '2013-08-12', '1992-01-14', '0000-00-00'),
(27, 'Neha Sharma', 'Lecturer', 2, '2014-09-01', '1992-11-13', '0000-00-00'),
(28, 'Aayushi Mishra', 'Lecturer', 2, '2014-09-01', '1993-01-11', '0000-00-00'),
(29, 'Man Mohan Sahu', 'Lecturer', 2, '2014-09-01', '1991-06-09', '0000-00-00'),
(30, 'Gopal Ram', 'Lecturer', 2, '2014-09-01', '1991-11-14', '0000-00-00'),
(31, 'Rohit Chhabra', 'Lecturer', 2, '2010-08-01', '1986-02-14', '0000-00-00'),
(32, 'Lokesh Sharma', 'Lecturer', 2, '2013-09-01', '1990-11-30', '0000-00-00'),
(33, 'Etti Mathur', 'Lecturer', 2, '2014-09-01', '0000-00-00', '0000-00-00'),
(34, 'D. K. Singh Meel', 'Professor', 6, '2009-04-23', '1947-04-02', '0000-00-00'),
(35, 'Mandeep Singh', 'Lecturer', 6, '2011-10-10', '1989-09-10', '0000-00-00'),
(36, 'Siddharth Sharma', 'Lecturer', 6, '2011-01-01', '1988-09-04', '0000-00-00'),
(37, 'Nalin Sharma', 'Lecturer', 6, '2011-07-18', '1990-10-27', '2013-11-28'),
(38, 'Lokesh Jain', 'Lecturer', 6, '2012-02-01', '1993-03-12', '0000-00-00'),
(39, 'Manish Sharma', 'Lecturer', 6, '2013-08-01', '1990-08-16', '0000-00-00'),
(40, 'Puran Mal Kumawat', 'Lecturer', 6, '2014-10-11', '1991-04-10', '0000-00-00'),
(41, 'Devendra Kumar', 'Lecturer', 6, '2014-09-01', '1990-08-04', '0000-00-00'),
(42, 'Durga Lal Saini', 'Lecturer', 6, '2013-08-01', '1989-01-01', '2012-01-28'),
(43, 'Umesh Kumar Amberiya', 'Lecturer', 6, '2013-02-11', '1988-11-26', '0000-00-00'),
(44, 'Himanshu Rathore', 'Asst. Professor', 6, '2011-07-18', '1984-07-20', '0000-00-00'),
(45, 'Nikita Agarwal', 'Lecturer', 6, '2014-10-05', '1991-02-22', '0000-00-00'),
(46, 'Vikas Payal', 'Lecturer', 6, '2014-09-01', '1991-09-28', '0000-00-00'),
(47, 'Piyush Thori', 'Lecturer', 6, '2012-08-17', '1991-09-15', '0000-00-00'),
(48, 'Nirana Ram Suthar', 'Lecturer', 6, '2014-08-07', '1989-11-25', '2013-07-11'),
(49, 'Ankur Singh', 'Lecturer', 6, '2011-08-17', '1986-02-06', '2013-11-25'),
(50, 'Pawan Singh Shekhawat', 'Asst. Professor', 4, '2011-08-01', '1982-07-09', '2011-02-22'),
(51, 'Umesh Kumar Sharma', 'Lecturer', 4, '2006-10-01', '1982-07-06', '2006-02-07'),
(52, 'Gaurav Sharma', 'Lecturer', 4, '2009-08-01', '1986-08-08', '0000-00-00'),
(53, 'Mahesh Sharma', 'Lecturer', 4, '2010-03-01', '1983-02-11', '2010-12-12'),
(54, 'Kapil Avasthi', 'Lecturer', 4, '2011-08-01', '1984-05-06', '2001-12-05'),
(55, 'Pawan Kumar Sharma', 'Lecturer', 4, '2007-09-01', '1986-01-14', '2007-11-30'),
(56, 'Saurabh Jain II', 'Lecturer', 4, '2012-08-08', '1985-01-13', '0000-00-00'),
(57, 'Suman Verma', 'Lecturer', 4, '2013-08-12', '1985-09-11', '2010-06-30'),
(58, 'Sachin Jangir', 'Lecturer', 4, '2013-08-02', '1991-03-31', '0000-00-00'),
(59, 'Akanksha Sharma', 'Lecturer', 4, '2014-10-09', '1992-10-05', '0000-00-00'),
(60, 'Mamta Sharma', 'Lecturer', 4, '2014-09-01', '1992-07-09', '0000-00-00'),
(61, 'Kriti Parashar', 'Lecturer', 4, '2013-08-12', '1992-05-16', '0000-00-00'),
(62, 'Iti Sharma', 'Lecturer', 4, '2014-09-01', '1989-12-10', '0000-00-00'),
(63, 'Vijendra Singh', 'Lecturer', 4, '2011-09-01', '1986-12-02', '0000-00-00'),
(64, 'Ashutosh Roy', 'Lecturer', 4, '2013-08-01', '1990-01-12', '0000-00-00'),
(65, 'Poonam Sharma', 'Lecturer', 4, '2012-07-16', '1989-11-06', '0000-00-00'),
(66, 'Rakesh Sharma', 'Lecturer', 4, '2011-09-26', '1984-10-15', '2014-02-18'),
(67, 'Sheetal Verma', 'Lecturer', 4, '2013-08-01', '1984-07-11', '2009-04-21'),
(68, 'Kriti M Sharda', 'Lecturer', 4, '2013-07-16', '1972-02-27', '1996-02-22'),
(69, 'Varun Sharma', 'Lecturer', 4, '2013-08-31', '1989-09-12', '0000-00-00'),
(70, 'K. K. Bhargava', 'Professor', 4, '2007-08-07', '1947-07-06', '1967-11-27'),
(71, 'Rakesh Patria', 'Lecturer', 3, '2014-06-03', '1962-10-19', '1990-02-01'),
(72, 'Lav Saxena', 'Lecturer', 3, '2013-07-25', '1987-07-02', '2012-04-30'),
(73, 'Ashish Dandotia', 'Lecturer', 3, '2014-03-05', '1985-12-11', '2014-02-04'),
(74, 'Suresh Prajapa', 'Lecturer', 3, '2013-12-04', '1990-06-21', '2013-11-25'),
(75, 'Anand Kumar', 'Lecturer', 3, '2013-08-01', '1991-07-25', '0000-00-00'),
(76, 'Sanjay Kumar', 'Lecturer', 3, '2013-08-01', '1990-10-10', '0000-00-00'),
(77, 'Neha Gupta', 'Lecturer', 3, '2014-02-01', '1991-05-16', '0000-00-00'),
(78, 'Anshul Heda', 'Lecturer', 6, '2014-09-01', '1993-02-11', '0000-00-00'),
(79, 'Bijendra Kr Meena', 'Lecturer', 6, '2014-08-23', '1988-10-24', '0000-00-00'),
(80, 'Anil Pathak', 'Lecturer', 6, '2013-08-01', '1990-01-16', '0000-00-00'),
(81, 'Vikas Kumawat', 'Lecturer', 6, '2012-12-17', '1990-05-08', '0000-00-00'),
(82, 'Harsha Ramanand', 'Lecturer', 6, '2014-02-11', '1984-06-03', '2009-11-27'),
(83, 'Shraddha Arya', 'Lecturer', 6, '2013-04-01', '1990-05-02', '0000-00-00'),
(84, 'P.N. Gupta', 'Lecturer', 6, '2011-09-10', '1945-01-22', '1968-12-03'),
(85, 'S.K. Mathur', 'Lecturer', 6, '2012-03-19', '1951-02-01', '1978-12-03'),
(86, 'Neeraj Dhaked', 'Lecturer', 6, '2013-08-01', '1992-01-12', '0000-00-00'),
(87, 'R. P. Choudhary', 'Lecturer', 1, '2013-11-01', '1953-03-20', '1972-05-25'),
(88, 'Laxmi Sharma', 'Lecturer', 1, '2014-07-14', '1992-06-09', '0000-00-00'),
(89, 'Rahul Godara', 'Lecturer', 1, '2014-07-16', '1990-08-18', '0000-00-00'),
(90, 'Ishita Soni', 'Lecturer', 1, '2014-07-14', '1991-08-29', '0000-00-00'),
(91, 'Madan Mohan Jangir', 'Lecturer', 1, '2014-10-01', '1992-08-14', '0000-00-00'),
(92, 'Drishan Sharma', 'Lecturer', 1, '2014-07-08', '1990-10-27', '0000-00-00'),
(93, 'Ekta Mittal', 'Lecturer', 7, '2013-03-11', '1980-08-01', '2006-02-15'),
(94, 'Mudita Menon', 'Lecturer', 7, '2013-09-21', '1983-08-01', '2010-02-12'),
(95, 'Aditi Sharma', 'Lecturer', 7, '2014-07-24', '1984-12-07', '2008-04-27'),
(96, 'Meeta Singh', 'Lecturer', 7, '2014-05-10', '1990-02-15', '2013-01-23'),
(97, 'Sarita Garg', 'Asso. Professor', 7, '2000-11-08', '1970-09-27', '1997-12-08'),
(98, 'Sumit Kumar Gupta', 'Asso. Professor', 7, '2008-07-01', '1977-08-08', '0000-00-00'),
(99, 'Dinesh Verma', 'Lecturer', 7, '2009-02-10', '1982-10-27', '2007-11-25'),
(100, 'Chanchal Madaan', 'Lecturer', 7, '2012-03-08', '1988-05-13', '0000-00-00'),
(101, 'Archana Sharma', 'Lecturer', 7, '2012-03-19', '1986-05-08', '0000-00-00'),
(102, 'Dimple Bansal', 'Lecturer', 2, '2014-09-01', '1992-02-02', '0000-00-00'),
(103, 'Rakesh Kumar Agarwal', 'Lecturer', 2, '2014-09-01', '1991-08-15', '0000-00-00'),
(104, 'Test', 'Lecturer', 2, '0000-00-00', '0000-00-00', '0000-00-00'),
(105, 'Ambika Bagri', 'Lecturer', 2, '2014-09-01', '1992-01-10', '0000-00-00'),
(108, 'Vipin Patidar', 'Lecturer', 3, '0000-00-00', '0000-00-00', '0000-00-00'),
(107, 'Vandana Kaushik', 'Lecturer', 6, '0000-00-00', '0000-00-00', '0000-00-00'),
(109, 'K. C. Modi', 'Lecturer', 3, '0000-00-00', '0000-00-00', '0000-00-00'),
(110, 'Rohini Singhvi', 'Lecturer', 6, '0000-00-00', '0000-00-00', '0000-00-00'),
(111, 'Ayush Sharma', 'Lecturer', 2, '0000-00-00', '0000-00-00', '0000-00-00'),
(112, 'Neha Shrotriya', 'Lecturer', 2, '2014-09-01', '1994-06-03', '0000-00-00'),
(113, 'Yogita Singh', 'Lecturer', 7, '2015-02-26', '1992-02-20', '0000-00-00'),
(114, 'Nitika Ajmera', 'Lecturer', 7, '2015-03-09', '1990-07-10', '0000-00-00'),
(115, 'K. P. Saxena', 'Lecturer', 7, '2015-03-02', '1952-04-21', '0000-00-00'),
(116, 'Arpita Verma', 'Lecturer', 7, '2015-02-23', '1982-01-09', '2010-02-16'),
(117, 'Namrata Sharma', 'Lecturer', 2, '0000-00-00', '0000-00-00', '0000-00-00'),
(118, 'Hemant Kumar', 'Lecturer', 3, '2015-02-19', '1989-12-16', '0000-00-00'),
(119, 'Ankur Dutt Shrama', 'Lecturer', 6, '0000-00-00', '0000-00-00', '0000-00-00'),
(120, 'Maninder Singh', 'Lecturer', 6, '0000-00-00', '0000-00-00', '0000-00-00'),
(121, 'Kamendra Singh', 'Lecturer', 6, '0000-00-00', '0000-00-00', '0000-00-00'),
(122, 'Ayub', 'Lecturer', 6, '0000-00-00', '0000-00-00', '0000-00-00'),
(123, 'Chandra Mohan Roy', 'Lecturer', 1, '0000-00-00', '0000-00-00', '0000-00-00'),
(124, 'Arun Josi', 'Lecturer', 1, '0000-00-00', '0000-00-00', '0000-00-00'),
(125, 'Tayyab Husain', 'Lecturer', 1, '0000-00-00', '0000-00-00', '0000-00-00'),
(126, 'Roshan Kumar', 'Lecturer', 2, '2015-02-18', '1993-05-10', '0000-00-00'),
(127, 'Narender Kumar', 'Lecturer', 2, '2015-02-23', '1989-12-25', '0000-00-00'),
(128, 'Lokvijay Singh', 'Lecturer', 2, '2015-03-02', '1989-03-11', '0000-00-00'),
(129, 'Arti Bhardwaj', 'Lecturer', 2, '2015-03-02', '1991-07-22', '0000-00-00'),
(130, 'Garima Gupta', 'Lecturer', 2, '2015-03-02', '1990-09-18', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `student_id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`student_id`, `name`) VALUES
(795, 'Utkarsh\r\n'),
(796, 'Rajan'),
(794, 'Him');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `LoginId` int(30) NOT NULL,
  `FId` int(10) NOT NULL,
  `Name` varchar(900) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`LoginId`, `FId`, `Name`, `UserName`, `Password`) VALUES
(131, 2, 'Himanshu ', 'root', 'root'),
(32, 12, 'himanshu', 'new', 'manudixc0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbatch`
--
ALTER TABLE `tblbatch`
  ADD PRIMARY KEY (`BatchId`);

--
-- Indexes for table `tblbranch`
--
ALTER TABLE `tblbranch`
  ADD PRIMARY KEY (`BrId`);

--
-- Indexes for table `tblday`
--
ALTER TABLE `tblday`
  ADD PRIMARY KEY (`DayId`);

--
-- Indexes for table `tbldept`
--
ALTER TABLE `tbldept`
  ADD PRIMARY KEY (`DeptId`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`FId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`LoginId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbatch`
--
ALTER TABLE `tblbatch`
  MODIFY `BatchId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblbranch`
--
ALTER TABLE `tblbranch`
  MODIFY `BrId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblday`
--
ALTER TABLE `tblday`
  MODIFY `DayId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbldept`
--
ALTER TABLE `tbldept`
  MODIFY `DeptId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `FId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `LoginId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

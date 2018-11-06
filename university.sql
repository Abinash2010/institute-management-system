-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2018 at 02:31 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `Admin_id` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `User_Name` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`Admin_id`, `Email`, `User_Name`, `Password`) VALUES
('123', 'as@jbh', 'a12', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `Assignment`
--

CREATE TABLE `Assignment` (
  `Assignment_id` varchar(15) NOT NULL,
  `Faculty_id` varchar(15) NOT NULL,
  `Subject_Code` varchar(15) NOT NULL,
  `Dept_id` varchar(15) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `File_Name` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Assignment`
--

INSERT INTO `Assignment` (`Assignment_id`, `Faculty_id`, `Subject_Code`, `Dept_id`, `Title`, `Description`, `File_Name`, `Date`, `Due_date`) VALUES
('BCA-101-191297', '123', 'BCA-101', 'CCS', 'tutorial 1', 'what is C ?', 'attendence.xlsx', '2018-04-29', '2018-04-30'),
('BCA-101-997195', 'CCS-153', 'BCA-101', 'CCS', 'tutorial 2', 'what is a progrram?', '', '2018-04-29', '2018-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `Assignment_Student`
--

CREATE TABLE `Assignment_Student` (
  `Assignment_id` varchar(15) NOT NULL,
  `Student_id` varchar(15) NOT NULL,
  `Answer` varchar(10000) NOT NULL,
  `Files` varchar(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Assignment_Student`
--

INSERT INTO `Assignment_Student` (`Assignment_id`, `Student_id`, `Answer`, `Files`, `Date`) VALUES
('BCA-101-191297', 'BCA0115', 'It is a programming language', '', '2018-04-29'),
('BCA-101-997195', 'BCA0115', 'it is a set of instruction', '', '2018-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `Attendence`
--

CREATE TABLE `Attendence` (
  `Attendence_id` varchar(15) NOT NULL,
  `Faculty_id` varchar(15) NOT NULL,
  `Dept_id` varchar(15) NOT NULL,
  `Subject_code` varchar(15) NOT NULL,
  `Class_code` varchar(15) NOT NULL,
  `Date` date NOT NULL,
  `day` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Attendence`
--

INSERT INTO `Attendence` (`Attendence_id`, `Faculty_id`, `Dept_id`, `Subject_code`, `Class_code`, `Date`, `day`) VALUES
('BCA-101-940791', 'CCS-153', 'CCS', 'BCA-101', 'BCA-1', '2018-04-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Attendence_student`
--

CREATE TABLE `Attendence_student` (
  `Attendence_id` varchar(15) NOT NULL,
  `Student_id` varchar(15) NOT NULL,
  `Faculty_id` varchar(15) NOT NULL,
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Attendence_student`
--

INSERT INTO `Attendence_student` (`Attendence_id`, `Student_id`, `Faculty_id`, `Status`) VALUES
('BCA-101-940791', 'BCA0115', 'CCS-153', 1),
('BCA-101-940791', 'BCA0215', 'CCS-153', 0),
('BCA-101-940791', '', 'CCS-153', 0),
('BCA-101-940791', '', 'CCS-153', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `Dept_id` varchar(15) NOT NULL,
  `Class_Code` varchar(15) NOT NULL,
  `Class_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`Dept_id`, `Class_Code`, `Class_name`) VALUES
('CSE', 'CSE-03', 'CSE 3rd sem'),
('CSE', 'CSE-04', 'CSE 4th sem'),
('CSE', 'CSE-05', 'CSE 5th sem'),
('CSE', 'CSE-06', 'CSE 6th sem');

-- --------------------------------------------------------

--
-- Table structure for table `Class_scedule`
--

CREATE TABLE `Class_scedule` (
  `Dept_id` varchar(15) NOT NULL,
  `Class_Code` varchar(15) NOT NULL,
  `Subject_Code` varchar(15) NOT NULL,
  `Faculty_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Class_scedule`
--

INSERT INTO `Class_scedule` (`Dept_id`, `Class_Code`, `Subject_Code`, `Faculty_id`) VALUES
('CSE', 'CSE-06', 'CSE-601', 'CSE-878'),
('CSE', 'CSE-06', 'CSE-602', 'CSE-995'),
('CSE', 'CSE-06', 'CSE-603', 'CSE-878'),
('CSE', 'CSE-06', 'CSE-604', 'CSE-995'),
('CSE', 'CSE-06', 'CSE-605', 'CSE-878'),
('CSE', 'CSE-05', 'CSE-501', 'CSE-878'),
('CSE', 'CSE-05', 'CSE-502', 'CSE-995'),
('CSE', 'CSE-05', 'CSE-503', 'CSE-995'),
('CSE', 'CSE-05', 'CSE-504', 'CSE-878'),
('CSE', 'CSE-05', 'CSE-505', 'CSE-878'),
('CSE', 'CSE-04', 'CSE-401', 'CSE-995'),
('CSE', 'CSE-04', 'CSE-402', 'CSE-995'),
('CSE', 'CSE-04', 'CSE-403', 'CSE-878'),
('CSE', 'CSE-04', 'CSE-404', 'CSE-878'),
('CSE', 'CSE-04', 'CSE-405', 'CSE-995'),
('CSE', 'CSE-03', 'CSE-301', 'CSE-878'),
('CSE', 'CSE-03', 'CSE-302', 'CSE-995'),
('CSE', 'CSE-03', 'CSE-303', 'CSE-995'),
('CSE', 'CSE-03', 'CSE-304', 'CSE-878'),
('CSE', 'CSE-03', 'CSE-305', 'CSE-995'),
('CSE', 'CSE-03', 'CSE-306', 'CSE-878');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `Dept_id` varchar(15) NOT NULL,
  `Dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`Dept_id`, `Dept_name`) VALUES
('CSE', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `Exam`
--

CREATE TABLE `Exam` (
  `Exam_id` int(10) NOT NULL,
  `Exam_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Exam`
--

INSERT INTO `Exam` (`Exam_id`, `Exam_name`) VALUES
(1, '1st Insem'),
(2, '2nd Insem'),
(3, 'End Semester');

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE `Faculty` (
  `Faculty_id` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Joining_date` varchar(10) NOT NULL,
  `Contact_no` varchar(11) NOT NULL,
  `Post` varchar(15) NOT NULL,
  `Dept_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`Faculty_id`, `Name`, `Email`, `Address`, `DOB`, `Joining_date`, `Contact_no`, `Post`, `Dept_id`) VALUES
('CCS-153', 'Hari', 'hari@gmail.com', 'Dibrugarh', '1983-02-02', '2016-03-01', '1234567890', 'Asst Prof', 'CCS'),
('CCS-429', 'Rama', 'rama@gmail.com', 'Jorhat', '2018-03-25', '2018-04-23', '987654321', 'Asst Prof', 'CCS'),
('CSE-878', 'Rahul Saikia ', 'rahul@gmail.com', 'Jorhat', '1987-01-11', '2015-02-09', '0987654321', 'Assistant Prof.', 'CSE'),
('CSE-995', 'Bidyut Bora', 'bidyut@gmail.com', 'Dibrugarh', '1984-12-31', '2014-03-01', '1234567890', 'HOD', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `Faculty_Login`
--

CREATE TABLE `Faculty_Login` (
  `Faculty_id` varchar(15) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `User_Name` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Faculty_Login`
--

INSERT INTO `Faculty_Login` (`Faculty_id`, `Email`, `User_Name`, `Password`) VALUES
('CCS-153', 'hari@gmail.com', 'hari1', 'CCS-153'),
('CCS-429', 'rama@gmail.com', 'rama9', 'CCS-429'),
('CSE-878', 'rahul@gmail.com', 'rahul1', 'CSE-878'),
('CSE-995', 'bidyut@gmail.co', 'bidyut1', 'CSE-995');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `Grade` varchar(3) NOT NULL,
  `point` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`Grade`, `point`) VALUES
('O', 10),
('A+', 9),
('A', 8),
('B+', 7),
('B', 6),
('C+', 5),
('C', 4),
('F', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` varchar(15) NOT NULL,
  `uploader_id` varchar(15) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `uploader_id`, `Title`, `Description`, `file`, `date`) VALUES
('2018-04-29-6860', '123', 'notification 1', 'today classes are cancelled', '', '2018-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `Result`
--

CREATE TABLE `Result` (
  `Student_id` varchar(15) NOT NULL,
  `Subject_Code` varchar(15) NOT NULL,
  `first` varchar(3) NOT NULL,
  `second` varchar(3) NOT NULL,
  `end` varchar(3) NOT NULL,
  `grade` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Result`
--

INSERT INTO `Result` (`Student_id`, `Subject_Code`, `first`, `second`, `end`, `grade`) VALUES
('CSE-01/15', 'CSE-301', '19', '19', '59', 'O'),
('CSE-02/15', 'CSE-301', '16', '16', '56', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Student_id` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Guardien` varchar(100) NOT NULL,
  `Admission_date` date NOT NULL,
  `Dept_id` varchar(15) NOT NULL,
  `Class_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Student_id`, `Name`, `Email`, `Address`, `DOB`, `Guardien`, `Admission_date`, `Dept_id`, `Class_code`) VALUES
('BCA0115', 'Arup', 'arup@gmail.com', 'Dibrugarh', '2018-04-02', 'Bipul', '2018-03-26', 'CCS', 'BCA-1'),
('BCA0215', 'Apurba', 'apu@gmail.com', 'Dibrugarh', '2018-04-09', 'Bimal', '2018-04-05', 'CCS', 'BCA-1'),
('CSE-01/14', 'Akash Saikia', 'akash@gmail.com', 'Tinisukia', '1997-12-31', 'Pranab Das', '0000-00-00', 'CSE', 'CSE-05'),
('CSE-01/15', 'Adi Sekhar', 'adi@gmail.com', 'Dibrugarh', '1996-04-23', 'Bipin Sekhar', '2015-06-16', 'CSE', 'CSE-06'),
('CSE-01/17', 'Bipul', 'bp@gmail.com', 'Dibrugarh', '1997-11-24', 'Bimal Das', '2017-06-30', 'CSE', 'CSE-03'),
('CSE-01/18', 'Kalyan Lahan', 'kl@gmail.com', 'Golaghat', '1997-05-16', 'Bibek Lahan', '2017-06-09', 'CSE', 'CSE-04'),
('CSE-02/14', 'Sekhar Boruah', 'sb@gmail.com', 'Marghertita', '1997-05-31', 'Sun Boruah', '2016-07-05', 'CSE', 'CSE-05'),
('CSE-02/15', 'Abhimonyu', 'Abhi@gmail.com', 'Dibrugarh', '1996-04-15', 'Himangshu', '2015-06-17', 'CSE', 'CSE-06'),
('CSE-02/17', 'Arup Bora', 'arup@gmail.com', 'Jorhat', '1996-12-31', 'Apurba Bora', '2017-06-13', 'CSE', 'CSE-03'),
('CSE-02/18', 'Amlan  Das', 'amlan@gmail.com', 'Sibsagar', '1997-03-11', 'Amar Das', '2017-06-01', 'CSE', 'CSE-04');

-- --------------------------------------------------------

--
-- Table structure for table `Student_Login`
--

CREATE TABLE `Student_Login` (
  `Student_id` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `User_Name` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student_Login`
--

INSERT INTO `Student_Login` (`Student_id`, `Email`, `User_Name`, `Password`) VALUES
('BCA0115', 'arup@gmail.com', 'arup1', 'BCA0115'),
('BCA0215', 'apu@gmail.com', 'apu8', 'BCA0215'),
('CSE-01/14', 'akash@gmail.com', '', 'CSE-01/14'),
('CSE-01/15', 'adi@gmail.com', 'adi2', 'CSE-01/15'),
('CSE-01/17', 'bp@gmail.com', 'bipul1', 'CSE-01/17'),
('CSE-01/18', 'kl@gmail.com', 'kl1', 'CSE-01/18'),
('CSE-02/14', 'sb@gmail.com', '', 'CSE-02/14'),
('CSE-02/15', 'Abhi@gmail.com', '', 'CSE-02/15'),
('CSE-02/17', 'arup@gmail.com', '', 'CSE-02/17'),
('CSE-02/18', 'amlan@gmail.com', '', 'CSE-02/18');

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

CREATE TABLE `Subject` (
  `Dept_id` varchar(15) NOT NULL,
  `Class_Code` varchar(15) NOT NULL,
  `Subject_Code` varchar(15) NOT NULL,
  `Subject_name` varchar(50) NOT NULL,
  `Credit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subject`
--

INSERT INTO `Subject` (`Dept_id`, `Class_Code`, `Subject_Code`, `Subject_name`, `Credit`) VALUES
('CSE', 'CSE-03', 'CSE-301', 'Objective C++', 3),
('CSE', 'CSE-03', 'CSE-302', 'Computer Organization', 4),
('CSE', 'CSE-03', 'CSE-303', 'Humanities', 1),
('CSE', 'CSE-03', 'CSE-304', 'Mathematics', 3),
('CSE', 'CSE-03', 'CSE-305', 'System Software', 2),
('CSE', 'CSE-03', 'CSE-306', 'Data Structure', 3),
('CSE', 'CSE-04', 'CSE-401', 'Data Communication', 3),
('CSE', 'CSE-04', 'CSE-402', 'Operating System', 4),
('CSE', 'CSE-04', 'CSE-403', 'JAVA', 3),
('CSE', 'CSE-04', 'CSE-404', 'Database', 4),
('CSE', 'CSE-04', 'CSE-405', 'Web Technology', 3),
('CSE', 'CSE-05', 'CSE-501', 'FLAT', 4),
('CSE', 'CSE-05', 'CSE-502', 'Microprocessor', 3),
('CSE', 'CSE-05', 'CSE-503', 'Microcontroller', 3),
('CSE', 'CSE-05', 'CSE-504', 'DAA', 4),
('CSE', 'CSE-05', 'CSE-505', 'Operation Research', 4),
('CSE', 'CSE-06', 'CSE-601', 'Softwear Engineering', 3),
('CSE', 'CSE-06', 'CSE-602', 'Computer Graphics', 3),
('CSE', 'CSE-06', 'CSE-603', 'Compiler Design', 3),
('CSE', 'CSE-06', 'CSE-604', 'Economics', 2),
('CSE', 'CSE-06', 'CSE-605', 'Computer Network', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Admin_id`,`Email`,`User_Name`);

--
-- Indexes for table `Assignment`
--
ALTER TABLE `Assignment`
  ADD PRIMARY KEY (`Assignment_id`) USING BTREE;

--
-- Indexes for table `Attendence`
--
ALTER TABLE `Attendence`
  ADD PRIMARY KEY (`Attendence_id`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`Class_Code`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`Dept_id`);

--
-- Indexes for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD PRIMARY KEY (`Faculty_id`,`Email`) USING BTREE;

--
-- Indexes for table `Faculty_Login`
--
ALTER TABLE `Faculty_Login`
  ADD PRIMARY KEY (`Faculty_id`,`Email`,`User_Name`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Student_id`,`Email`);

--
-- Indexes for table `Student_Login`
--
ALTER TABLE `Student_Login`
  ADD PRIMARY KEY (`Student_id`,`Email`,`User_Name`);

--
-- Indexes for table `Subject`
--
ALTER TABLE `Subject`
  ADD PRIMARY KEY (`Subject_Code`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

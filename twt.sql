-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2016 at 01:01 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twt`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Year` int(1) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `Year`, `Password`) VALUES
('1234567890', 'Beta student', 1, 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
('2345678901', 'Gamma student', 2, 'b920b68e218aed8c6cac6ba183816fd660079c2e2ec881a274efed5e771ace54e976c85c9ad5e771e3aa2c593c75b5dd5c607a92b5d36ce4fb64a7c42a2ea4bc'),
('3456789012', 'Delta Student', 3, 'a24d59298bf15dcbcd568bff8e03222e8f2e491820489441c47c2422f62949b09cf5a6a105450ddfcbf6396e5e65cad48587bbdff9471bfecb7929a93544c876');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `StudentID` varchar(10) NOT NULL,
  `SubjectID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`StudentID`, `SubjectID`) VALUES
('1234567890', 'TCP1121'),
('1234567890', 'TMA1211'),
('2345678901', 'THI2211'),
('2345678901', 'TTV2161'),
('2345678901', 'TCS2251'),
('3456789012', 'TAC3121');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` varchar(7) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `YearOffered` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `Name`, `YearOffered`) VALUES
('COO4135', 'Cookies', 3),
('TAC3121', 'Applied Cryptography', 3),
('TAO1221', 'Computer Architecture & Organisation', 1),
('TCN2141', 'Computer Networks', 2),
('TCP1121', 'Computer Programming', 1),
('TCP3151', 'Integrative Programming & Technologies', 3),
('TCS2251', 'Computer Security', 2),
('TDB1131', 'Database Systems', 1),
('TDC1231', 'Data Communications & Networking', 1),
('TDF3241', 'Digital Forensics', 3),
('TDS2111', 'Data Structures & Algorithms', 2),
('TEH3221', 'Ethical Hacking & Security Assessment', 3),
('TEP1241', 'Ethics & Professional Conducts', 1),
('THI2211', 'Human Computer Interaction', 2),
('TIA2221', 'Information Assurance & Security', 2),
('TIT3131', 'Information Theory', 3),
('TMA1111', 'Mathematical Techniques', 1),
('TMA1211', 'Discrete Mathematics & Probability', 1),
('TMI3231', 'Malware & Intrusion Detection', 3),
('TOP2121', 'Object-Oriented Programming', 2),
('TOS1141', 'Operating Systems', 1),
('TPB3141', 'Password Authentication & Biometrics', 3),
('TSA2131', 'System Analysis & Design', 2),
('TSA2151', 'System Administration & Maintenance', 2),
('TSI2241', 'System Integration & Architecture', 2),
('TTV2161', 'Technopreneur Venture', 2),
('TWT2231', 'Web Techniques & Application', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

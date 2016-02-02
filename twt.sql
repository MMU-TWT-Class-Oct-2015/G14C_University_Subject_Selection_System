-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2016 at 06:06 PM
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
('1234567890', 'Beta student', 1, ''),
('2345678901', 'Gamma student', 2, ''),
('3456789012', 'Delta Student', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Year offered` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `Name`, `Year offered`) VALUES
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
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

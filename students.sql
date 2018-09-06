-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 04:08 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `assigned` date NOT NULL,
  `submission` date NOT NULL,
  `subject` varchar(10) COLLATE utf8_bin NOT NULL,
  `no.` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assigned`, `submission`, `subject`, `no.`) VALUES
('2018-08-10', '2018-09-10', 'CN', 1),
('2018-09-01', '2018-09-30', 'MP', 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(25) COLLATE utf8_bin NOT NULL,
  `event_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `time`, `venue`, `event_name`) VALUES
(1, '2018-09-01', '09:00:00', 'sakec', 'workshop on html'),
(4, '2018-10-02', '10:00:00', 'd.j sanghvi', 'workshop on python'),
(5, '2018-10-01', '09:00:00', 'sakec', 'workshop on webdevelopment');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `UserId` varchar(15) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `RegNo` int(5) NOT NULL,
  `Class` varchar(2) NOT NULL,
  `Division` int(1) NOT NULL,
  `RollNo` int(2) NOT NULL,
  `MobNo` bigint(10) NOT NULL,
  `Addr` varchar(50) NOT NULL,
  `Pass` varchar(32) NOT NULL DEFAULT 'sakec',
  `S1` int(2) NOT NULL DEFAULT '0',
  `S1t` int(2) NOT NULL DEFAULT '0',
  `S2` int(2) NOT NULL DEFAULT '0',
  `S2t` int(2) NOT NULL DEFAULT '0',
  `S3` int(2) NOT NULL DEFAULT '0',
  `S3t` int(2) NOT NULL DEFAULT '0',
  `S4` int(2) NOT NULL DEFAULT '0',
  `S4t` int(2) NOT NULL DEFAULT '0',
  `S5` int(2) DEFAULT '0',
  `S5t` int(2) NOT NULL DEFAULT '0',
  `Attended` int(2) AS (S1+S2+S3+S4+S5) VIRTUAL,
  `Total` int(2) AS (S1t+S2t+S3t+S4t+S5t) VIRTUAL,
  `Percent` decimal(4,2) AS ((S1+S2+S3+S4+S5)*100/(S1t+S2t+S3t+S4t+S5t)) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`UserId`, `Fname`, `Lname`, `RegNo`, `Class`, `Division`, `RollNo`, `MobNo`, `Addr`, `Pass`, `S1`, `S1t`, `S2`, `S2t`, `S3`, `S3t`, `S4`, `S4t`, `S5`, `S5t`) VALUES
('0', 'Admin', 'Admin', 0, '0', 0, 0, 0, '0', 'root', 0, 27, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1071', 'Deep', 'Mehta', 13070, 'TE', 4, 60, 9870000393, 'Blablabla', 'sakec', 1, 27, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1072', 'Deep', 'Mehta', 51422, 'TE', 2, 12, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 27, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1073', 'Deep', 'Mehta', 13024, 'TE', 3, 57, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 27, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1074', 'Deep', 'Mehta', 12312, 'TE', 1, 42, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 27, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1075', 'Deep', 'Mehta', 12424, 'TE', 4, 32, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1076', 'Deep', 'das', 12325, 'TE', 1, 31, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 27, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1077', 'Hello', 'World', 82421, 'TE', 1, 55, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 27, 0, 0, 0, 0, 0, 0, 0, 0),
('M2016CM1080', 'Deep', 'Mehta', 31235, 'TE', 1, 32, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 27, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `SrNo` int(1) NOT NULL,
  `Time` varchar(15) NOT NULL,
  `Monday` varchar(15) NOT NULL,
  `Tuesday` varchar(15) NOT NULL,
  `Wednesday` varchar(15) NOT NULL,
  `Thrusday` varchar(15) NOT NULL,
  `Friday` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`SrNo`, `Time`, `Monday`, `Tuesday`, `Wednesday`, `Thrusday`, `Friday`) VALUES
(1, '09:15 - 10:15', 'TCS', 'WD', 'MP', 'CN', 'MP'),
(2, '10:15 - 11:15', 'DBMS', 'DBMS', 'DBMS', 'ABCD', 'TCS'),
(3, '11:15 - 12:15', 'AA', 'AA', 'TCS(P)', 'ABCD', 'BCE'),
(4, '01:00 - 02:00', 'AA', 'ABCD', 'BCE', 'ABCD', 'AA'),
(5, '02:00 - 03:00', 'DBMS', 'ABCD', 'BCE', 'ABCD', 'CN'),
(6, '03:00 - 04:00', 'BCE(P)', 'CN', 'WD', 'MP', 'ABCD'),
(7, '04:00 - 05:00', 'BCE(P)', 'MP', 'WD', 'CN', 'ABCD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `RegNo` (`RegNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 10:58 AM
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
  `no.` int(10) NOT NULL,
  `link` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assigned`, `submission`, `subject`, `no.`, `link`) VALUES
('2018-08-10', '2018-09-10', 'CN', 1, 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV'),
('2018-09-01', '2018-09-30', 'MP', 2, 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV'),
('2018-07-01', '2018-07-02', 'WD', 3, 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(25) COLLATE utf8_bin NOT NULL,
  `event_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `link` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `time`, `venue`, `event_name`, `link`) VALUES
(1, '2018-09-01', '09:00:00', 'SAKEC', 'Workshop on html', 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV'),
(4, '2018-10-02', '10:00:00', 'D.J. Sanghvi', 'Workshop on python', 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV'),
(5, '2018-10-01', '09:00:00', 'SAKEC', 'Workshop on Web - Development', 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV'),
(6, '0000-00-00', '04:02:00', 'sak', 'Worskhop', 'https://drive.google.com/open?id=1YY763oGXnj1WJQUkwZq3fTi2Ezk0HUqV');

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
  `Percent` decimal(4,2) AS ((S1+S2+S3+S4+S5)*100/(S1t+S2t+S3t+S4t+S5t)) VIRTUAL,
  `Notifications` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`UserId`, `Fname`, `Lname`, `RegNo`, `Class`, `Division`, `RollNo`, `MobNo`, `Addr`, `Pass`, `S1`, `S1t`, `S2`, `S2t`, `S3`, `S3t`, `S4`, `S4t`, `S5`, `S5t`, `Notifications`) VALUES
('0', 'Admin', 'Admin', 0, '0', 0, 0, 0, '0', 'root', 0, 21, 0, 18, 0, 15, 0, 16, 0, 15, NULL),
('C2016CM1027', 'Mithil', 'Jain', 12935, 'TE', 4, 57, 9619020626, 'Borivali East Mumbai-400066', 'sakec', 15, 21, 10, 18, 11, 15, 14, 16, 12, 15, NULL),
('C2016CM1029', 'Riya', 'Shetty', 12937, 'TE', 4, 17, 7400189303, 'gaon East', 'sakec', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL),
('C2016EX1222', 'Milan', 'Odedra', 13075, 'TE', 1, 45, 7977304556, 'B 13,Vrindavan CHS,Kasturba, Borivali East', 'sakec', 13, 21, 12, 18, 10, 15, 11, 16, 10, 15, NULL),
('I2016CM1006', 'Jaspreet', 'Chima', 12879, 'TE', 4, 47, 7718008554, 'GTB', 'sakec', 15, 21, 12, 18, 12, 15, 12, 16, 10, 15, NULL),
('I2016CM1007', 'Ashish', 'Ghadigaonkar', 12880, 'TE', 3, 29, 9664359034, 'Sairaj building, Datar Colony, Kanjur Marg East\r\n', 'sakec', 14, 21, 13, 18, 11, 15, 10, 16, 11, 15, NULL),
('M2016CM1071', 'Deep', 'Mehta', 13070, 'TE', 4, 60, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 17, 21, 14, 18, 9, 15, 16, 16, 11, 15, NULL),
('M2016CM1077', 'Hello', 'World', 82421, 'TE', 1, 55, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 0, 21, 0, 18, 0, 15, 0, 16, 0, 15, NULL),
('M2016CM1080', 'Deep', 'Mehta', 31235, 'TE', 1, 32, 9870000393, 'B/204,Pooja Enclave, Ganesh Nagar', 'sakec', 1, 19, 0, 18, 0, 15, 10, 16, 0, 3, NULL);

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
  `Thursday` varchar(15) DEFAULT NULL,
  `Friday` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`SrNo`, `Time`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`) VALUES
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

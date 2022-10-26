# Sport_Management_System
ระบบยิมคืนอุปกรณ์กีฬา
mysql code 


-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 26, 2022 at 05:40 PM
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
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `sports_equipment`
--

CREATE TABLE `sports_equipment` (
  `sport_id` int(10) NOT NULL COMMENT 'รหัสอุปกรณ์กีฬา',
  `sport_name` varchar(255) NOT NULL COMMENT 'ชื่ออุปกรณ์กีฬา',
  `typesport_id` int(10) NOT NULL COMMENT 'รหัสประเภทอุปกรณ์กีฬา',
  `balance` int(10) NOT NULL COMMENT 'ยอดคงเหลือ',
  `number` int(10) NOT NULL COMMENT 'จำนวนทั้งหมด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sports_equipment`
--

INSERT INTO `sports_equipment` (`sport_id`, `sport_name`, `typesport_id`, `balance`, `number`) VALUES
(1, '11', 4, 1, 1),
(2, '11', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_sport`
--

CREATE TABLE `type_sport` (
  `typesport_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_sport`
--

INSERT INTO `type_sport` (`typesport_id`, `name`, `status`) VALUES
(1, 'บอล', 1),
(4, 'ooo', 1),
(5, 'ปิงปอง', 0),
(6, 'sql', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Userlevel` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Firstname`, `Lastname`, `Userlevel`) VALUES
(1, 'aaa@g', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'aaa', 'A'),
(2, 'bbb', '08f8e0260c64418510cefb2b06eee5cd', 'bbbb', 'bbbb', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sports_equipment`
--
ALTER TABLE `sports_equipment`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `type_sport`
--
ALTER TABLE `type_sport`
  ADD PRIMARY KEY (`typesport_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sports_equipment`
--
ALTER TABLE `sports_equipment`
  MODIFY `sport_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอุปกรณ์กีฬา', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `type_sport`
--
ALTER TABLE `type_sport`
  MODIFY `typesport_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

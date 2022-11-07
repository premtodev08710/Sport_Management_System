-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 07, 2022 at 06:32 AM
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
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `student_id` int(13) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `number` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `student_id`, `sport_id`, `start_date`, `end_date`, `number`, `status`) VALUES
(1, 9, 1, '2022-11-07', '2022-11-08', 1, 0),
(2, 9, 1, '2022-11-07', '2022-11-08', 1, 1);

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
(1, 'บอลเล่', 4, 9, 9);

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
(5, 'ปิงปอง', 1),
(6, 'sql', 0),
(8, 'e', 1),
(9, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `student_id` int(13) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Userlevel` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `student_id`, `Username`, `Password`, `Firstname`, `Lastname`, `Userlevel`) VALUES
(1, 0, 'aaa@g', 'c6f057b86584942e415435ffb1fa93d4', 'aa', 'aa', 'A'),
(16, 9, '9@gmail', '45c48cce2e2d7fbdea1afc51c7c6ad26', '10', '9', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`);

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
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sports_equipment`
--
ALTER TABLE `sports_equipment`
  MODIFY `sport_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอุปกรณ์กีฬา', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_sport`
--
ALTER TABLE `type_sport`
  MODIFY `typesport_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

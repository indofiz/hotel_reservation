-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 12:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `image`, `password`, `last_login`) VALUES
(2, 'admin', 'avatar-big-01.jpg', '$2y$10$e40C1YpGVPtBcOWnVyF8HenuUVbxUx342OGZsc6Bb5vHYGSx4YpBK', 1585090439),
(3, 'calvin', 'default.jpg', '$2y$10$uxSpdcQfQ3mlbw8Htd4K7.p.MPL1y/AWcVsVoJ51tkh9KZG1mygHy', 1584679491);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `type` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `check_in` varchar(128) NOT NULL,
  `cost` varchar(128) NOT NULL,
  `check_out` varchar(128) DEFAULT NULL,
  `total_people` int(2) DEFAULT NULL,
  `ruangan` varchar(100) DEFAULT NULL,
  `range_day` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `telpon`, `type`, `deskripsi`, `check_in`, `cost`, `check_out`, `total_people`, `ruangan`, `range_day`, `status`) VALUES
(51, 'Juliansyah', '083175087363', '2', '', '24-Mar-2020', '440000', '27-Mar-2020', 1, '205', 1, 0),
(52, 'Arjuna', '102424312321', '2', 'Windows 10', '26-Mar-2020', '440000', '28-Mar-2020', 2, '212', 1, 0),
(53, 'Madani', '124309271312', '1', 'Mikrotik', '24-Mar-2020', '0', '27-Mar-2020', 2, '206', 1, 0),
(54, 'Rana', '1239807213', '2', '', '26-Mar-2020', '1100000', '31-Mar-2020', 2, '303', 1, 0),
(55, 'Juli', '12389213123', '2', '', '24-Mar-2020', '660000', '27-Mar-2020', 2, '223', 1, 0),
(56, 'Valir', '1239807213', '2', '', '24-Mar-2020', '660000', '27-Mar-2020', 1, '203', 1, 0),
(57, 'Rudi', '213902321', '2', '', '27-Mar-2020', '220000', '27-Mar-2020', 1, '202', 1, 0),
(61, 'Gusion', '12321323124', '2', '', '25-Mar-2020', '1100000', '30-Mar-2020', 2, '204', 1, 0),
(64, 'Silvana', '021371283718293', '2', '', '30-Mar-2020', '440000', '01-Apr-2020', 2, '303', 1, 0),
(65, 'Karina', '12432143213', '1', '', '25-Mar-2020', '0', '25-Mar-2020', 1, '209', 1, 0),
(66, 'Selena', '1234213213123', '1', '', '26-Mar-2020', '0', '27-Mar-2020', 1, '209', 1, 0),
(67, 'Maman', '1323213', '1', '', '29-Mar-2020', '0', '30-Mar-2020', 2, '201', 1, 1),
(68, 'Ruby', '12312312312321', '2', '', '30-Mar-2020', '220000', '31-Mar-2020', 1, '202', 1, 1),
(69, 'Roger', '123213213213', '1', '', '28-Mar-2020', '0', '30-Mar-2020', 1, '202', 2, 1),
(70, 'Badang', '12321312321', '1', '', '29-Mar-2020', '0', '31-Mar-2020', 1, '203', 3, 1),
(71, 'Belerick', '123123213', '1', '', '28-Mar-2020', '', '', 1, '203', 1, 1),
(72, 'Kucai', '124124124', '1', '', '28-Mar-2020', 'NaN', '31-Mar-2020', 2, '204', 3, 1),
(73, 'Ling', '123123123', '1', '', '30-Mar-2020', '', '', 1, '206', 1, 1),
(74, 'Kaja', '213123123123', '1', '', '30-Mar-2020', '0', '', 1, '206', 1, 1),
(75, 'Ruby Stefani', '123214124124', '1', '', '30-Mar-2020', '', '', 1, '205', 1, 1),
(77, 'Maldiv', '1243123213', '2', '', '30-Mar-2020', '220000', '31-Mar-2020', 1, '304', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guest_category`
--

CREATE TABLE `guest_category` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL,
  `harga` int(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_category`
--

INSERT INTO `guest_category` (`id`, `category`, `harga`) VALUES
(1, 'Trainer', 0),
(2, 'Member', 220000);

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id` int(100) NOT NULL,
  `lantai_label` varchar(128) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sub` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id`, `lantai_label`, `parent_id`, `sub`) VALUES
(1, 'Lantai 2', 0, 0),
(2, 'Lantai 3', 0, 0),
(3, 'A1', 3, 1),
(4, 'A2', 3, 0),
(5, 'A3', 3, 0),
(6, 'A4', 3, 0),
(7, 'A5', 3, 0),
(8, 'A6', 3, 0),
(9, 'A7', 3, 0),
(10, 'A8', 3, 0),
(11, 'A9', 3, 0),
(12, 'A10', 3, 0),
(13, 'B1', 13, 1),
(14, 'B2', 13, 0),
(15, 'B3', 13, 0),
(16, 'B4', 13, 0),
(17, 'B5', 13, 0),
(18, 'B6', 13, 0),
(19, 'B7', 13, 0),
(20, 'B8', 13, 0),
(21, 'B9', 13, 0),
(22, 'B10', 13, 0),
(23, 'C1', 23, 1),
(24, 'C2', 23, 0),
(25, 'C3', 23, 0),
(26, 'C4', 23, 0),
(27, 'C5', 23, 0),
(28, 'C6', 23, 0),
(29, 'C7', 23, 0),
(30, 'C8', 23, 0),
(31, 'C9', 23, 0),
(32, 'C10', 23, 0),
(33, 'D1', 33, 1),
(34, 'D2', 33, 0),
(35, 'D3', 33, 0),
(36, 'D4', 33, 0),
(37, 'D5', 33, 0),
(38, 'D6', 33, 0),
(39, 'D7', 33, 0),
(40, 'D8', 33, 0),
(41, 'D9', 33, 0),
(42, 'D10', 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(20) NOT NULL,
  `number` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lantai` int(10) NOT NULL,
  `max_people` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `number`, `status`, `lantai`, `max_people`) VALUES
(1, '201', 2, 1, 2),
(2, '202', 2, 1, 2),
(3, '203', 2, 1, 2),
(4, '204', 2, 1, 2),
(5, '205', 1, 1, 2),
(6, '206', 2, 1, 2),
(7, '207', 0, 1, 2),
(8, '208', 0, 1, 2),
(9, '209', 0, 1, 2),
(10, '210', 0, 1, 2),
(11, '211', 0, 1, 2),
(12, '212', 0, 1, 2),
(13, '213', 0, 1, 2),
(14, '214', 0, 1, 2),
(15, '215', 0, 1, 2),
(16, '216', 0, 1, 2),
(17, '217', 0, 1, 2),
(18, '218', 0, 1, 2),
(19, '219', 0, 1, 2),
(20, '220', 0, 1, 2),
(21, '221', 0, 1, 2),
(22, '222', 0, 1, 2),
(23, '223', 0, 1, 2),
(24, '224', 0, 1, 2),
(25, '301', 0, 2, 2),
(32, '302', 0, 2, 2),
(33, '303', 0, 2, 2),
(34, '304', 1, 2, 2),
(35, '305', 0, 2, 2),
(36, '306', 0, 2, 2),
(37, '307', 0, 2, 2),
(38, '308', 0, 2, 2),
(39, '309', 0, 2, 2),
(40, '310', 0, 2, 2),
(41, '311', 0, 2, 2),
(42, '312', 0, 2, 2),
(43, '313', 0, 2, 2),
(44, '314', 0, 2, 2),
(45, '315', 0, 2, 2),
(46, '316', 0, 2, 2),
(47, '317', 0, 2, 2),
(48, '318', 0, 2, 2),
(49, '319', 0, 2, 2),
(50, '310', 0, 2, 2),
(51, '321', 0, 2, 2),
(52, '322', 0, 2, 2),
(53, '323', 0, 2, 2),
(54, '324', 0, 2, 2),
(55, '325', 0, 2, 2),
(56, '326', 0, 2, 2),
(57, '327', 0, 2, 2),
(58, '328', 0, 2, 2),
(59, '329', 0, 2, 2),
(60, '225', 0, 1, 2),
(61, '226', 0, 1, 2),
(62, '227', 0, 1, 2),
(63, 'A1-1', 0, 3, 2),
(64, 'A1-2', 0, 3, 2),
(65, 'A2-1', 0, 4, 2),
(66, 'A2-2', 0, 4, 2),
(67, 'A3-1', 0, 5, 2),
(68, 'A3-2', 0, 5, 2),
(69, 'A4-1', 0, 6, 2),
(70, 'A4-2', 0, 6, 2),
(71, 'A5-1', 0, 7, 2),
(72, 'A5-2', 0, 7, 2),
(73, 'A6-1', 0, 8, 2),
(74, 'A6-2', 0, 8, 2),
(75, 'A7-1', 0, 9, 2),
(76, 'A7-2', 0, 9, 2),
(77, 'A8-1', 0, 10, 2),
(78, 'A8-2', 0, 10, 2),
(79, 'A9-1', 0, 11, 2),
(80, 'A9-2', 0, 11, 2),
(81, 'A10-1', 0, 12, 2),
(82, 'A10-2', 0, 12, 2),
(83, 'B1-1', 0, 13, 2),
(84, 'B1-2', 0, 13, 2),
(85, 'B2-1', 0, 14, 2),
(86, 'B2-2', 0, 14, 2),
(87, 'B3-1', 0, 15, 2),
(88, 'B3-2', 0, 15, 2),
(89, 'B4-1', 0, 16, 2),
(90, 'B4-2', 0, 16, 2),
(91, 'B5-1', 0, 17, 2),
(92, 'B5-2', 0, 17, 2),
(93, 'B6-1', 0, 18, 2),
(94, 'B6-2', 0, 18, 2),
(95, 'B7-1', 0, 19, 2),
(96, 'B7-2', 0, 19, 2),
(97, 'B8-1', 0, 20, 2),
(98, 'B8-2', 0, 20, 2),
(99, 'B9-1', 0, 21, 2),
(100, 'B9-2', 0, 21, 2),
(101, 'B10-1', 0, 22, 2),
(102, 'B10-2', 0, 22, 2),
(103, 'C1-1', 0, 23, 2),
(104, 'C1-2', 0, 23, 2),
(105, 'C2-1', 0, 24, 2),
(106, 'C2-2', 0, 24, 2),
(107, 'C3-1', 0, 25, 2),
(108, 'C3-2', 0, 25, 2),
(109, 'C4-1', 0, 26, 2),
(110, 'C4-2', 0, 26, 2),
(111, 'C5-1', 0, 27, 2),
(112, 'C5-2', 0, 27, 2),
(113, 'C6-1', 0, 28, 2),
(114, 'C6-2', 0, 28, 2),
(115, 'C7-1', 0, 29, 2),
(116, 'C7-2', 0, 29, 2),
(117, 'C8-1', 0, 30, 2),
(118, 'C8-2', 0, 30, 2),
(119, 'C9-1', 0, 31, 2),
(120, 'C9-2', 0, 31, 2),
(121, 'C10-1', 0, 32, 2),
(122, 'C10-2', 0, 32, 2),
(123, 'D1-1', 0, 33, 2),
(124, 'D1-2', 0, 33, 2),
(125, 'D2-1', 0, 34, 2),
(126, 'D2-2', 0, 34, 2),
(127, 'D3-1', 0, 35, 2),
(128, 'D3-2', 0, 35, 2),
(129, 'D4-1', 0, 36, 2),
(130, 'D4-2', 0, 36, 2),
(131, 'D5-1', 0, 37, 2),
(132, 'D5-2', 0, 37, 2),
(133, 'D6-1', 0, 38, 2),
(134, 'D6-2', 0, 38, 2),
(135, 'D7-1', 0, 39, 2),
(136, 'D7-2', 0, 39, 2),
(137, 'D8-1', 0, 40, 2),
(138, 'D8-2', 0, 40, 2),
(139, 'D9-1', 0, 41, 2),
(140, 'D9-2', 0, 41, 2),
(141, 'D10-1', 0, 42, 2),
(142, 'D10-2', 0, 42, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_category`
--
ALTER TABLE `guest_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `guest_category`
--
ALTER TABLE `guest_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

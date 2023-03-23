-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 01:56 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_krishana`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_rooms`
--

CREATE TABLE `add_rooms` (
  `id` int(11) NOT NULL,
  `apart_id` int(12) NOT NULL,
  `room_no` int(12) NOT NULL,
  `room_type_id` int(12) NOT NULL,
  `description` text NOT NULL,
  `charges` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_rooms`
--

INSERT INTO `add_rooms` (`id`, `apart_id`, `room_no`, `room_type_id`, `description`, `charges`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 101, 11, '101', '300', 1, '2023-03-01 12:08:15', '2023-03-01 12:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `add_sources`
--

CREATE TABLE `add_sources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_sources`
--

INSERT INTO `add_sources` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(39, 'MMT/GoIBIB1', 1, '2023-01-30 05:49:06', '2023-01-30 05:49:06'),
(41, 'Calsoft Pvt Ltd', 1, '2023-01-31 07:58:02', '2023-01-31 07:58:02'),
(42, 'Facebook', 1, '2023-02-07 05:03:06', '2023-02-07 05:03:06'),
(45, 'Oyo Rooms', 1, '2023-02-15 06:33:48', '2023-02-15 06:33:48'),
(46, 'Insta', 1, '2023-02-27 05:27:35', '2023-02-27 05:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(25) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `password`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(8, 'admin', '$2y$10$RnDwpen5c8.gtZLaxHEHDOKWY77t/20A4RRkWBsjlPuu7Wmy0HyBu', 'MyG5Xw2I12EWdJeD', '$2y$10$XL/RhpCz.uQoWE1xV77Wje4I4ker.gtg7YV4yqNwLZfzIYnP7E8Na', '2019-08-22 01:12:33', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(12, '1st floor', 1, '2023-02-15 05:44:45', '2023-02-15 05:44:45'),
(13, '2nd Floor', 1, '2023-02-15 05:45:10', '2023-02-15 05:45:10'),
(14, '3rd Floor', 1, '2023-02-15 05:45:17', '2023-02-15 05:45:17'),
(15, '4th Floor', 1, '2023-02-15 05:45:30', '2023-02-15 05:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `booking_types`
--

CREATE TABLE `booking_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_types`
--

INSERT INTO `booking_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Corporate', 1, '2023-01-31 08:01:06', '2023-01-31 08:01:06'),
(7, 'Walk-in', 1, '2023-01-31 08:01:29', '2023-01-31 08:01:29'),
(8, 'OTA', 1, '2023-01-31 08:01:53', '2023-01-31 08:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phoneno` int(10) DEFAULT NULL,
  `email` text,
  `cdate` date DEFAULT NULL,
  `approval` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cutomer`
--

CREATE TABLE `cutomer` (
  `guestid` int(11) NOT NULL,
  `email` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `guest_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `usname` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usname`, `pass`) VALUES
(1, 'Admin', '1234'),
(2, 'Prasath', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `newsletterlog`
--

CREATE TABLE `newsletterlog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(52) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `news` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletterlog`
--

INSERT INTO `newsletterlog` (`id`, `title`, `subject`, `news`) VALUES
(1, 'ABC', 'HEllo', 'err'),
(2, 'ABC', 'HEllo', 'err');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `troom` varchar(30) DEFAULT NULL,
  `tbed` varchar(30) DEFAULT NULL,
  `nroom` int(11) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `ttot` double(8,2) DEFAULT NULL,
  `fintot` double(8,2) DEFAULT NULL,
  `mepr` double(8,2) DEFAULT NULL,
  `meal` varchar(30) DEFAULT NULL,
  `btot` double(8,2) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_rooms`
--

CREATE TABLE `reserve_rooms` (
  `id` int(11) NOT NULL,
  `guest_id` varchar(200) DEFAULT NULL,
  `guest` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `booking_source` varchar(100) NOT NULL,
  `total_guest` varchar(1) NOT NULL,
  `total_apart` varchar(1) NOT NULL,
  `companion` varchar(255) NOT NULL,
  `charges` varchar(50) NOT NULL,
  `card` varchar(300) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkin_time` varchar(255) NOT NULL,
  `checkout_date` date NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `room_no` varchar(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalamount` varchar(50) NOT NULL,
  `paidamount` varchar(50) NOT NULL,
  `remainamount` varchar(50) NOT NULL,
  `ckeckoutamt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve_rooms`
--

INSERT INTO `reserve_rooms` (`id`, `guest_id`, `guest`, `email`, `address`, `phone`, `booking_source`, `total_guest`, `total_apart`, `companion`, `charges`, `card`, `checkin_date`, `checkin_time`, `checkout_date`, `payment_mode`, `room_type`, `room_no`, `status`, `created_at`, `updated_at`, `totalamount`, `paidamount`, `remainamount`, `ckeckoutamt`) VALUES
(5, 'gue-31-Mar2023', 'sayali', 'srijantechit@gmail.com', 'aasds', '7058685664', '46', '3', '3', '1', '300', 'dbms 5.PNG', '2023-03-01', '13:57', '2023-03-02', '8', 'AC', '101', 0, '2023-03-01 07:26:57', '2023-03-01 07:26:57', '300', '300', '0', ' 0  '),
(6, 'gue-23-Mar2023', 'sayali', 'myospaz@gmail.com', 'baner', '7058685664', '42', '3', '2', '1', '300', 'card.jpg', '2023-02-01', '16:52', '2023-02-02', '8', 'AC', '101', 1, '2023-03-01 10:22:15', '2023-03-01 10:22:15', '300', '300', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `bedding` varchar(10) DEFAULT NULL,
  `place` varchar(10) DEFAULT NULL,
  `cusid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `FName` text,
  `LName` text,
  `Email` varchar(50) DEFAULT NULL,
  `National` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Phone` text,
  `TRoom` varchar(20) DEFAULT NULL,
  `Bed` varchar(10) DEFAULT NULL,
  `NRoom` varchar(2) DEFAULT NULL,
  `Meal` varchar(15) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `stat` varchar(15) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`, `stat`, `nodays`) VALUES
(2, 'Miss.', 'Poonam', 'Khatri', 'khatri_poonam@hotmail.com', 'Non Sri Lankan ', 'Pakistan', '12345567', 'Superior Room', 'Double', '1', 'Room only', '2023-01-06', '2023-01-13', 'Not Conform', 7);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(11, 'AC', 1, '2023-02-15 06:12:05', '2023-02-15 06:12:05'),
(12, 'non Ac', 1, '2023-02-15 06:14:23', '2023-02-15 06:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `bookingtid` varchar(50) NOT NULL,
  `tdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalamount` varchar(50) NOT NULL,
  `paidamount` varchar(50) NOT NULL,
  `remainammount` varchar(50) NOT NULL,
  `roomnumber` varchar(50) NOT NULL,
  `roomtype` varchar(50) NOT NULL,
  `charges` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `bookingtid`, `tdate`, `totalamount`, `paidamount`, `remainammount`, `roomnumber`, `roomtype`, `charges`) VALUES
(2, '0', '2023-02-28 11:29:45', '300', '100', '200', '37', 'AC', '300'),
(3, '0', '2023-02-28 11:30:09', '300', '100', '200', '37', 'AC', '300'),
(4, '0', '2023-02-28 11:38:55', '100', '50', '50', '38', 'AC', '100'),
(5, 'gue-49-Feb2023', '2023-02-28 11:42:16', '500', '200', '300', '39', 'AC', '500'),
(6, 'gue-29-Feb2023', '2023-02-28 15:29:12', '300', '200', '100', '1', 'AC', '300'),
(7, 'gue-29-Feb2023', '2023-02-28 19:25:55', '300', '300', '0', '2', 'AC', '300'),
(8, 'gue-49-Mar2023', '2023-03-01 11:24:31', '300', '200', '100', '3', 'AC', '300'),
(9, 'gue-31-Mar2023', '2023-03-01 11:34:32', '1200', '300', '900', '4', 'AC', '300'),
(10, 'gue-43-Mar2023', '2023-03-01 11:45:56', '300', '300', '0', '5', 'AC', '300'),
(11, 'gue-7-Mar2023', '2023-03-01 11:47:14', '300', '300', '0', '6', 'non Ac', '300'),
(12, 'gue-7-Mar2023', '2023-03-01 11:56:20', '300', '300', '0', '7', 'AC', '300'),
(13, 'gue-10-Mar2023', '2023-03-01 12:04:59', '300', '100', '200', '8', 'AC', '300'),
(14, 'gue-42-Mar2023', '2023-03-01 12:06:25', '300', '300', '', '8', 'AC', '300'),
(15, 'gue-50-Mar2023', '2023-03-01 12:09:19', '300', '300', '0', '1', 'AC', '300'),
(16, 'gue-7-Mar2023', '2023-03-01 12:14:04', '1800', '300', '1500', '1', 'AC', '300'),
(17, 'gue-15-Mar2023', '2023-03-01 12:21:16', '300', '300', '0', '1', '11', '300'),
(18, 'gue-34-Mar2023', '2023-03-01 12:22:57', '300', '100', '200', '1', 'AC', '300'),
(19, 'gue-12-Mar2023', '2023-03-01 12:50:21', '300', '100', '200', '101', 'AC', '300'),
(20, 'gue-17-Mar2023', '2023-03-01 12:54:27', '1800', '100', '1700', '101', '', '300'),
(21, 'gue-31-Mar2023', '2023-03-01 12:56:56', '300', '300', '0', '101', 'AC', '300'),
(22, 'gue-23-Mar2023', '2023-03-01 15:52:14', '300', '300', '0', '101', 'AC', '300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_rooms`
--
ALTER TABLE `add_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_sources`
--
ALTER TABLE `add_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_types`
--
ALTER TABLE `booking_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cutomer`
--
ALTER TABLE `cutomer`
  ADD PRIMARY KEY (`guestid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_rooms`
--
ALTER TABLE `reserve_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_rooms`
--
ALTER TABLE `add_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_sources`
--
ALTER TABLE `add_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `booking_types`
--
ALTER TABLE `booking_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cutomer`
--
ALTER TABLE `cutomer`
  MODIFY `guestid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reserve_rooms`
--
ALTER TABLE `reserve_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

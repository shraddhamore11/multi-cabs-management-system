-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 02:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_cabs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminroute_tbl`
--

CREATE TABLE `adminroute_tbl` (
  `sr_no` int(20) NOT NULL,
  `Pick_Up_Point` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `Ola_Rate` varchar(50) NOT NULL,
  `Uber_Rate` varchar(50) NOT NULL,
  `Red_Bus_Rate` varchar(50) NOT NULL,
  `Go_Green_Bus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminroute_tbl`
--

INSERT INTO `adminroute_tbl` (`sr_no`, `Pick_Up_Point`, `Destination`, `Ola_Rate`, `Uber_Rate`, `Red_Bus_Rate`, `Go_Green_Bus`) VALUES
(1, 'Nashik', 'Chakan', 'Rs.3500', 'Rs.4200', 'Rs.390', 'Rs.340'),
(2, 'Nashik', 'malegaon', 'Rs.3500', 'Rs.4200', 'Rs.390', 'Rs.340'),
(3, 'Nashik', 'Sinnar', 'Rs.1200', 'Rs.1500', 'Rs.200', 'Rs.170'),
(4, 'Nashik', 'pune', 'Rs.4500', 'Rs.5000', 'Rs.520', 'Rs.480'),
(5, 'Nashik', 'Amalner', 'Rs.3500', 'Rs.4200', 'Rs.420', 'Rs.380'),
(6, 'Nashik', 'Alephata', 'Rs.2400', 'Rs.3000', 'Rs.250', 'Rs.210'),
(7, 'Nashik', 'Vani', 'Rs.1600', 'Rs.2000', 'Rs.240', 'Rs.210'),
(10, 'Nashik', 'Chandori', 'Rs.600', 'Rs.800', 'Rs.20', 'Rs.40');

-- --------------------------------------------------------

--
-- Table structure for table `booking_tbl`
--

CREATE TABLE `booking_tbl` (
  `sr_no` int(20) NOT NULL,
  `Pick_Up_Point` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mob` varchar(50) NOT NULL,
  `Cab_Name` varchar(100) NOT NULL,
  `Rate` varchar(100) NOT NULL,
  `Staff_Email` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_tbl`
--

INSERT INTO `booking_tbl` (`sr_no`, `Pick_Up_Point`, `Destination`, `Email`, `Name`, `Mob`, `Cab_Name`, `Rate`, `Staff_Email`, `Date`) VALUES
(3, 'Nashik', 'Chakan', 'purva@gmail.com', 'Purva Khairnar', '5467898765', 'Red Bus', 'Rs.390', 'yash@gmail.com', '2023-07-11'),
(4, 'Nashik', 'Alephata', 'sayali@gmail.com', 'Sayali Jagtap', '7498745612', 'OLA', 'Rs.2400', 'darshan@gmail.com', '2023-07-10'),
(5, 'Nashik', 'Sinnar', 'shraddha@gmail.com', 'Shraddha', '9922564574', 'OLA', 'Rs.1200', 'darshan@gmail.com', '2023-07-11'),
(6, 'Nashik', 'Narayangaon', 'komal@gmail.com', 'Komal Godse', '7494784152', 'Go-Green Bus', 'Rs.350', 'mayank@gmail.com', '2023-07-10'),
(7, 'Nashik', 'Sinnar', 'aditi@gmail.com', 'Aditi Patil', '9922564574', 'OLA', 'Rs.1200', 'darshan@gmail.com', '2023-07-10'),
(8, 'Nashik', 'Narayangaon', 'shiwani@gmail.com', 'shiwani Nanaware', '7498041212', 'Uber', 'Rs.3000', 'kartik@gmail.com', '2023-07-09'),
(10, 'Nashik', 'Amalner', 'shiwani@gmail.com', 'shiwani Nanaware', '7498041212', 'Go-Green_Bus', 'Rs.380', 'mayank@gmail.com', '2023-07-11'),
(11, 'Nashik', 'Vani', 'shiwani@gmail.com', 'shiwani Nanaware', '7498041212', 'OLA', 'Rs.1600', 'darshan@gmail.com', '2023-07-11'),
(12, 'Nashik', 'Alephata', 'sayali@gmail.com', 'Sayali Jagtap', '7498745612', 'Red_Bus', 'Rs.250', 'yash@gmail.com', '2023-07-11'),
(13, 'Nashik', 'Vani', 'sayali@gmail.com', 'Sayali Jagtap', '7498745612', 'OLA', 'Rs.1600', 'darshan@gmail.com', '2023-07-11'),
(14, 'Nashik', 'Chandori', 'komal@gmail.com', 'Komal Godse', '7494784152', 'Uber', 'Rs.4200', 'kartik@gmail.com', '2023-07-11'),
(15, 'Nashik', 'pune', 'purva@gmail.com', 'Purva Khairnar', '5467898765', 'Uber', 'Rs.5000', 'kartik@gmail.com', '2023-07-12'),
(16, 'Nashik', 'pune', 'purva@gmail.com', 'Purva Khairnar', '5467898765', 'Uber', 'Rs.5000', 'kartik@gmail.com', '2023-07-12'),
(17, 'Nashik', 'Chakan', 'purva@gmail.com', 'Purva Khairnar', '5467898765', 'Red_Bus', 'Rs.390', 'yash@gmail.com', '2023-07-12'),
(19, 'Nashik', 'Vani', 'sayali@gmail.com', 'Sayali Jagtap', '7498745612', 'Red_Bus', 'Rs.240', 'yash@gmail.com', '2023-07-14'),
(21, 'Nashik', 'Chandori', 'amruta@gmail.com', 'Amruta Chavan', '7687654323', 'Red_Bus', 'Rs.390', 'yash@gmail.com', '2023-07-14'),
(22, 'Nashik', 'Vani', 'aditi@gmail.com', 'Aditi Patil', '9922564574', 'OLA', 'Rs.1600', 'darshan@gmail.com', '2023-07-14'),
(23, 'Nashik', 'Sinnar', 'shraddha@gmail.com', 'Shraddha', '9922564574', 'Go-Green_Bus', 'Rs.170', 'mayank@gmail.com', '2023-07-18'),
(24, 'Nashik', 'Chakan', 'purva@gmail.com', 'Purva Khairnar', '5467898765', 'Uber', 'Rs.4200', 'kartik@gmail.com', '2023-07-17'),
(25, 'Nashik', 'Sinnar', 'purva@gmail.com', 'Purva Khairnar', '5467898765', 'OLA', 'Rs.1200', 'darshan@gmail.com', '2023-07-17'),
(26, 'Nashik', 'Sinnar', 'purva@gmail.com', 'Purva Khairnar', '5467898765', 'OLA', 'Rs.1200', 'darshan@gmail.com', '2023-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `staff_info_tbl`
--

CREATE TABLE `staff_info_tbl` (
  `sr_no` int(20) NOT NULL,
  `Cab_Name` varchar(100) NOT NULL,
  `Staff_Name` varchar(100) NOT NULL,
  `Staff_Email` varchar(100) NOT NULL,
  `Mob` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_info_tbl`
--

INSERT INTO `staff_info_tbl` (`sr_no`, `Cab_Name`, `Staff_Name`, `Staff_Email`, `Mob`, `Pass`) VALUES
(1, 'OLA', 'Darshan Jadhav', 'darshan@gmail.com', '9874854152', '123456'),
(2, 'Uber', 'Kartik Deore', 'kartik@gmail.com', '9852147896', '123456'),
(3, 'Red_Bus', 'Yash Shelar', 'yash@gmail.com', '9921759623', '123456'),
(4, 'Go-Green_Bus', 'Mayank Patil', 'mayank@gmail.com', '7497051323', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_info_tbl`
--

CREATE TABLE `user_info_tbl` (
  `sr_no` int(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `Mob` varchar(50) NOT NULL,
  `City` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info_tbl`
--

INSERT INTO `user_info_tbl` (`sr_no`, `Name`, `Email`, `Pass`, `Mob`, `City`) VALUES
(1, 'shiwani Nanaware', 'shiwani@gmail.com', '123456', '7498041212', 'Nashik'),
(2, 'Komal Godse', 'komal@gmail.com', '123456', '7494784152', 'Nashik'),
(3, 'Purva Khairnar', 'purva@gmail.com', '123456', '5467898765', 'Nashik'),
(4, 'Amruta Chavan', 'amruta@gmail.com', '123456', '7687654323', 'Nashik'),
(5, 'Apurva Jadhav', 'apurva@gmail.com', '123456', '5467876545', 'Nashik'),
(6, 'Sayali Jagtap', 'sayali@gmail.com', '123456', '7498745612', 'Nashik'),
(7, 'Shraddha', 'shraddha@gmail.com', '123456', '9922564574', 'Nashik'),
(8, 'Aditi Patil', 'aditi@gmail.com', '123456', '9922564574', 'Nashik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminroute_tbl`
--
ALTER TABLE `adminroute_tbl`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `staff_info_tbl`
--
ALTER TABLE `staff_info_tbl`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_info_tbl`
--
ALTER TABLE `user_info_tbl`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminroute_tbl`
--
ALTER TABLE `adminroute_tbl`
  MODIFY `sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  MODIFY `sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `staff_info_tbl`
--
ALTER TABLE `staff_info_tbl`
  MODIFY `sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info_tbl`
--
ALTER TABLE `user_info_tbl`
  MODIFY `sr_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 05:36 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buskaro`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_details`
--

CREATE TABLE `bus_details` (
  `id` int(10) NOT NULL,
  `owner_id` varchar(13) NOT NULL,
  `busname` varchar(20) NOT NULL,
  `frommm` varchar(20) NOT NULL,
  `tooo` varchar(30) NOT NULL,
  `price` varchar(10) NOT NULL,
  `locn` varchar(30) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`id`, `owner_id`, `busname`, `frommm`, `tooo`, `price`, `locn`, `status`) VALUES
(1, '1', 'MyBus1', 'keonjhar', 'bhubhaneswar', '200', 'uploads/buses-gallery04.jpg', 'y'),
(2, '1', 'MyBus2', 'balasore', 'bhubhaneswar', '200', 'uploads/buses-gallery04.jpg', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `bus_owners`
--

CREATE TABLE `bus_owners` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(3) NOT NULL,
  `ukey` varchar(50) NOT NULL,
  `servicename` varchar(40) NOT NULL,
  `adhar` varchar(30) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_owners`
--

INSERT INTO `bus_owners` (`id`, `fname`, `lname`, `password`, `email`, `status`, `ukey`, `servicename`, `adhar`, `addr`, `phone`) VALUES
(1, 'Akash', 'Swain', '54a2bf8c09ace67d3513aaa1aa7aa0f3', 'aakashswain001@gmail.com', 'N', '48ed177e4fdceba1befb81e18180e5fb', 'akky', '1234', 'at/po-keonjhar', '7327884690');

-- --------------------------------------------------------

--
-- Table structure for table `bus_users`
--

CREATE TABLE `bus_users` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(3) NOT NULL,
  `ukey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_users`
--

INSERT INTO `bus_users` (`id`, `fname`, `lname`, `password`, `email`, `status`, `ukey`) VALUES
(1, 'Akash', 'Swain', 'efc559751d100923dd6746f4d733f7cc', 'aakashswain001@gmail.com', 'N', '48ed177e4fdceba1befb81e18180e5fb'),
(2, 'Akash', 'Swain', '4fe9dfe784a2be25dd8aec3b403c3654', 'sleepygamers2017@gmail.com', 'N', 'ff3e137e56e85766d1c4ec957489cca5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_details`
--
ALTER TABLE `bus_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_owners`
--
ALTER TABLE `bus_owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bus_users`
--
ALTER TABLE `bus_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_details`
--
ALTER TABLE `bus_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bus_owners`
--
ALTER TABLE `bus_owners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bus_users`
--
ALTER TABLE `bus_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

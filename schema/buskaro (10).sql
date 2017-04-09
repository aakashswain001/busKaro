-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 08:30 PM
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
  `status` varchar(3) NOT NULL,
  `dep` varchar(15) NOT NULL,
  `arr` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`id`, `owner_id`, `busname`, `frommm`, `tooo`, `price`, `locn`, `status`, `dep`, `arr`) VALUES
(1, '2', 'Alvina', '2', '3', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(2, '3', 'Tourist', '3', '4', '100', 'uploads/b.jpg', 'y', '10:00', '12:00'),
(3, '2', 'Parth', '2', '4', '250', 'uploads/p.jpg', 'y', '13:00', '18:30'),
(4, '3', 'Binapani', '3', '2', '200', 'uploads/t.jpg', 'y', '8:00', '12:00'),
(5, '2', 'Alvina', '3', '2', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(6, '3', 'Tourist', '4', '2', '100', 'uploads/b.jpg', 'y', '10:00', '12:00'),
(7, '2', 'Parth', '4', '2', '250', 'uploads/p.jpg', 'y', '13:00', '18:30'),
(8, '3', 'Binapani', '2', '3', '200', 'uploads/t.jpg', 'y', '8:00', '12:00'),
(9, '2', 'Panis', '4', '3', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(10, '3', 'Panis', '3', '4', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(11, '2', 'Raj', '2', '3', '200', 'uploads/r.jpg', 'y', '10:00', '15:00'),
(12, '3', 'kumar', '3', '4', '100', 'uploads/q.jpg', 'y', '10:00', '12:00'),
(13, '2', 'swarna', '2', '4', '250', 'uploads/a.jpg', 'y', '13:00', '18:30'),
(14, '2', 'raghunath', '3', '2', '200', 'uploads/l.jpg', 'y', '10:00', '15:00'),
(15, '2', 'Raj', '3', '2', '200', 'uploads/r.jpg', 'y', '10:00', '15:00'),
(16, '3', 'kumar', '4', '3', '100', 'uploads/q.jpg', 'y', '10:00', '12:00'),
(17, '2', 'swarna', '4', '2', '250', 'uploads/a.jpg', 'y', '13:00', '18:30'),
(18, '2', 'raghunath', '2', '3', '200', 'uploads/p.jpg', 'y', '10:00', '15:00'),
(19, '3', 'angel', '3', '4', '100', 'uploads/b.jpg', 'y', '10:00', '12:00'),
(20, '3', 'angel', '4', '3', '100', 'uploads/b.jpg', 'y', '10:00', '12:00'),
(21, '3', 'Green Apple', '3', '4', '100', 'uploads/p.jpg', 'y', '10:00', '12:00'),
(22, '3', 'Green Apple', '4', '3', '100', 'uploads/p.jpg', 'y', '10:00', '12:00'),
(23, '2', 'thunder', '3', '2', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(24, '2', 'thunder', '2', '3', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(25, '3', 'Dildar', '2', '4', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(26, '2', 'Dildar', '4', '2', '200', 'uploads/a.jpg', 'y', '10:00', '15:00'),
(27, '3', 'Das', '4', '3', '100', 'uploads/t.jpg', 'y', '10:00', '12:00'),
(28, '2', 'Dilkhus', '2', '4', '200', 'uploads/p.jpg', 'y', '10:00', '15:00'),
(29, '3', 'Das', '3', '4', '100', 'uploads/t.jpg', 'y', '10:00', '12:00'),
(30, '2', 'Dilkhus', '4', '2', '200', 'uploads/p.jpg', 'y', '10:00', '15:00');

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
(1, 'Akash', 'Swain', '54a2bf8c09ace67d3513aaa1aa7aa0f3', 'aakashswain001@gmail.com', 'N', '48ed177e4fdceba1befb81e18180e5fb', 'akky', '1234', 'at/po-keonjhar', '7327884690'),
(2, 'akky', 'Master', '03c7c0ace395d80182db07ae2c30f034', 'aakashswain002@gmail.com', 'N', '6a4224ac7b53c7573f1828589f1dd40e', 'Hero Bus', '1234', 'cet', '9937579'),
(3, 'Sanghamitra', 'hota', '03c7c0ace395d80182db07ae2c30f034', 'sanghota4567@gmail.com', 'N', '5c41dede6ffee68ca76e3e3b004c895c', '', '', '', '');

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
  `ukey` varchar(50) NOT NULL,
  `addr` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_users`
--

INSERT INTO `bus_users` (`id`, `fname`, `lname`, `password`, `email`, `status`, `ukey`, `addr`, `phone`) VALUES
(1, 'Akash', 'Swain', '03c7c0ace395d80182db07ae2c30f034', 'aakashswain001@gmail.com', 'N', '48ed177e4fdceba1befb81e18180e5fb', 'bhubaneswar', '12345'),
(2, 'Akash', 'Swain', '4fe9dfe784a2be25dd8aec3b403c3654', 'sleepygamers2017@gmail.com', 'N', 'ff3e137e56e85766d1c4ec957489cca5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Select city'),
(2, 'bhubaneswar'),
(3, 'balasore'),
(4, 'keonjhar');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `bus_id` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `seat_no` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `bus_id`, `date`, `seat_no`) VALUES
(1, '5', '14/04/2017', '1A'),
(2, '5', '14/04/2017', '1B'),
(3, '5', '14/04/2017', '6F'),
(4, '5', '14/04/2017', '5B'),
(6, '1', '28/04/2017', '3D'),
(7, '4', '27/04/2017', '5B'),
(8, '3', '24/04/2017', '1A'),
(9, '3', '24/04/2017', '1B'),
(10, '3', '24/04/2017', '5E'),
(11, '3', '24/04/2017', '6B'),
(12, '3', '24/04/2017', '8B'),
(13, '3', '24/04/2017', '8E'),
(14, '1', '2017-04-19', '3B'),
(15, '1', '2017-04-19', '4E'),
(16, '1', '2017-04-19', '7A'),
(17, '1', '2017-04-19', '7D'),
(18, '3', '10/04/2017', '2B'),
(19, '3', '10/04/2017', '3B'),
(20, '3', '10/04/2017', '4B'),
(21, '3', '10/04/2017', '5B'),
(23, '3', '10/04/2017', '8E'),
(24, '13', '10/04/2017', '4B'),
(25, '13', '10/04/2017', '4D'),
(26, '13', '10/04/2017', '6F'),
(27, '13', '10/04/2017', '7A'),
(28, '13', '10/04/2017', '7B'),
(29, '3', '25/04/2017', '5B'),
(30, '3', '25/04/2017', '6B'),
(31, '2', '25/04/2017', '5D'),
(32, '2', '25/04/2017', '6D'),
(33, '', '', '5D');

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_details`
--
ALTER TABLE `bus_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `bus_owners`
--
ALTER TABLE `bus_owners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bus_users`
--
ALTER TABLE `bus_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

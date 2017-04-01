-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 06:56 PM
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
-- Table structure for table `bus_owners`
--

CREATE TABLE `bus_owners` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `password` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(3) NOT NULL,
  `ukey` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_owners`
--

INSERT INTO `bus_owners` (`id`, `fname`, `lname`, `password`, `email`, `status`, `ukey`) VALUES
(1, 'Akash', 'Swain', '45c9a6614fccd', 'aakashswain001@gmail.com', 'N', '0ca70dfda8538');

-- --------------------------------------------------------

--
-- Table structure for table `bus_users`
--

CREATE TABLE `bus_users` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `password` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(3) NOT NULL,
  `ukey` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_users`
--

INSERT INTO `bus_users` (`id`, `fname`, `lname`, `password`, `email`, `status`, `ukey`) VALUES
(1, 'Akash', 'Swain', '5e0cf7bd1dfa3', 'aakashswain003@gmail.com', 'N', '3e14f1115bb6e'),
(2, 'Akash', 's', 'e3b0c44298fc1', '', 'N', '6b51d431df5d7'),
(3, 'Akash', 'SAD', 'c38777d1619a8', 'aakashswain0012@gmail.com', 'N', '9b9195a0fdd58'),
(5, 'Akash', 'Swain', '5e0cf7bd1dfa3', 'aakashswain0031@gmail.com', 'N', '4e8936e899626'),
(7, 'Akash', 'Swain', '8dc8c84012c87', 'aakashswain003d@gmail.com', 'N', 'd9321ead101bb'),
(9, 'Akash', 'skn', '6783e4bc3c3fc', 'lshj@kjc', 'N', '399d13908b94f'),
(10, 'Akash', 'Swain', 'd5972647735e0', 'aakashswain005@gmail.com', 'N', '4e8936e899626'),
(11, 'Akash', 'Swain', '5e0cf7bd1dfa3', 'aakashswain001@gmail.com', 'N', '4e8936e899626');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `bus_owners`
--
ALTER TABLE `bus_owners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bus_users`
--
ALTER TABLE `bus_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

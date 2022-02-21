-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2022 at 09:57 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_softgrid_computers`
--

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `api_access_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `email`, `api_access_key`) VALUES
(1, 'Partner A', 'partner_a1@gmail.com', 'd2f5a00f447dc7561a2944db932b89db'),
(2, 'Partner B', 'partner_b1@gmail.com', '73e933b2132b4f806201be6cfb73118a');

-- --------------------------------------------------------

--
-- Table structure for table `partners_api_request_count`
--

CREATE TABLE `partners_api_request_count` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners_api_request_count`
--

INSERT INTO `partners_api_request_count` (`id`, `partner_id`, `date_time`) VALUES
(3, 1, '2022-02-21 02:28:19'),
(4, 1, '2022-02-21 02:29:13'),
(5, 1, '2022-02-21 02:29:24'),
(6, 1, '2022-02-21 02:29:25'),
(7, 2, '2022-02-21 02:29:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners_api_request_count`
--
ALTER TABLE `partners_api_request_count`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `partners_api_request_count`
--
ALTER TABLE `partners_api_request_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2019 at 10:45 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialid`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(4) NOT NULL,
  `social_id` int(4) NOT NULL,
  `acc_name` varchar(50) NOT NULL,
  `acc_url` varchar(100) NOT NULL,
  `visibility` int(1) NOT NULL DEFAULT 0 COMMENT '0 - private, 1 - public'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `social_id`, `acc_name`, `acc_url`, `visibility`) VALUES
(1, 1, 'FB', 'fb.com/jgeorge97', 1),
(1, 2, 'IG', 'ig.com/george.m.jose', 1),
(1, 3, 'TG', 't.me/georgemj', 0),
(1, 4, 'MicroId', 'jgeorge97.microid.in', 1),
(1, 5, 'Gmail', 'jgeorge97@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `f_id` int(4) NOT NULL,
  `id_1` int(4) NOT NULL,
  `id_2` int(4) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 - pending, 1- accepted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`f_id`, `id_1`, `id_2`, `status`) VALUES
(1, 1, 2, 1),
(2, 1, 4, 0),
(3, 1, 5, 0),
(4, 2, 1, 0),
(5, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'jgeorge97', '81dc9bdb52d04dc20036dbd8313ed055', 'George'),
(2, 'albin', '81dc9bdb52d04dc20036dbd8313ed055', 'Albin'),
(3, 'tessa', 'd93591bdf7860e1e4ee2fca799911215', 'Tessa'),
(4, 'jose', 'cfcd208495d565ef66e7dff9f98764da', 'Jose KM'),
(5, 'marina', '827ccb0eea8a706c4c34a16891f84e7b', 'Marina Jose'),
(6, 'marina', '827ccb0eea8a706c4c34a16891f84e7b', 'Marina Jose'),
(7, 'thomas', '46d045ff5190f6ea93739da6c0aa19bc', 'Thomas MK'),
(8, 'cyriac', '46d045ff5190f6ea93739da6c0aa19bc', 'Cyriac MJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`social_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `id_1` (`id_1`),
  ADD KEY `id_2` (`id_2`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `social_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`id_1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_ibfk_2` FOREIGN KEY (`id_2`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

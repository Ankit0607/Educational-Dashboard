-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 07:13 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampletest`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`id`, `user_id`, `user_password`, `email`, `fname`, `lname`, `address`, `city`, `country`, `image`) VALUES
(1, 'Ankit@uit', 'Ankit@123', 'ankit.mishra06072000@gmail.com', 'Ankit', 'Mishra', '', '', '', 'IMG-20200502-WA0009.jpg'),
(2, 'Safalta@uit', 'Safalta@uit', 'safalsingh.as@gmail.com', 'Safalta', 'Singh', 'ADA Prayagraj', 'Prayagraj', 'India', 'IMG_20190927_213421.jpg'),
(3, 'Nikhat@uit', 'Nikhat@uit', 'nikkubano786@gmail.com', 'Nikhta', 'Bano', 'Phoolpur Prayagraj', 'Prayagraj', 'India', NULL),
(4, 'Ankita@uit', 'Ankita@uit', 'ankit123@gmail.com', 'Ankita', 'Prasad', 'CIvil Lines Prayagraj', 'Prayagraj', 'India', 'Hacker-Wallpaper-Full-HD.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher_login`
--
ALTER TABLE `teacher_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

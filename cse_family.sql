-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 11:56 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse_family`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `semester` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursename`, `semester`) VALUES
(1, 'Algoritthm', '4th'),
(2, 'Web engineering', '4th'),
(3, 'Software Engineering', '5th'),
(4, 'Microcontrolller ', '5th');

-- --------------------------------------------------------

--
-- Table structure for table `formfillup`
--

CREATE TABLE `formfillup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formfillup`
--

INSERT INTO `formfillup` (`id`, `name`, `roll`, `session`, `semester`, `sid`) VALUES
(4, 'Sadia Rahman', '18CSE032', '2017-18', '4th', 25),
(18, 'Shazia Ahmed Tanjila', '18CSE037', '2018-19', '5th', 16);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `currentsemester` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`, `phone`, `email`, `session`, `address`, `currentsemester`, `photo`) VALUES
(15, 'Sadia Afrin Tarin', '18CSE039', '01903153065', 'tarin.cse5.bu@gmail.com', '2017-18', 'Rupatoli,Barishal', '5th', '0a8a1024eb.jpg'),
(16, 'Shazia Ahmed Tanjila', '18CSE037', '01903153066', 'shazia.cse5.bu@gmail.com', '2017-18', 'Rupatoli,Barishal', '5th', '0f12cb698f.jpg'),
(25, 'Sadia Rahman', '18CSE032', '01903153045', 'sadia@gmail.com', '2017-18', 'Rupatoli,Barishal', '4th', '41bc0c5190.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `sid`) VALUES
(4, 'admin', 'admin@gmail.com', '01903153062', '12345', NULL),
(8, 'Sadia Afrin Tarin', 'tarin.cse5.bu@gmail.com', '01903153065', '', 15),
(9, 'Shazia Ahmed Tanjila', 'shazia.cse5.bu@gmail.com', '01903153066', '', 16),
(16, 'Sadia Rahman', 'sadia@gmail.com', '01903153045', '', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formfillup`
--
ALTER TABLE `formfillup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`,`email`,`phone`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `roll_2` (`roll`),
  ADD UNIQUE KEY `phone` (`phone`,`email`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`email`,`phone`),
  ADD KEY `sid` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formfillup`
--
ALTER TABLE `formfillup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

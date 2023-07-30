-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 04:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fee` int(11) NOT NULL,
  `sco` varchar(100) NOT NULL,
  `scon` int(11) NOT NULL,
  `staffco` varchar(100) NOT NULL,
  `staffcon` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `fee`, `sco`, `scon`, `staffco`, `staffcon`, `date`, `img`) VALUES
(15, 'Quiz', 100, 'PRATHAMESH', 914685665, 'MR PATIL', 2147483647, '23/08/2023', 'quiz.jpeg'),
(16, 'Coding Competition', 100, 'ADITYA RAYTE', 789465465, 'MR JADHAV', 2147483647, '12/05/2023', 'code.jpg'),
(17, 'DANCE COMPETITION', 100, 'KUNAL SHEWALE', 914685665, 'MR JOSHI', 989566626, '01/06/2023', 'dance.jpeg'),
(18, 'SINGING', 100, 'OM PATIL', 784546563, 'MR PATIL', 2147483647, '25/07/2023', 'singing.jpeg'),
(19, 'DRAWING', 200, 'ABHI ', 989553131, 'MR PAGAR', 2147483647, '12/09/2023', 'draw.webp'),
(20, 'PHOTGRAPHY CONTEST', 300, 'DHIRAJ BAGUL', 989553131, 'MR MAHAJAN', 2147483647, '10/10/2023', 'photo.jpeg'),
(21, 'RANGOLI COMPETITION', 100, 'OM KAPADNIS', 989553131, 'MR KHAIRNAR', 989566626, '15/07/2023', 'rangoli.jpeg'),
(22, 'CRICKET ', 100, 'ROHIT DAHATONDE', 986533221, 'MR KARE', 2147483647, '25/10/2023', 'CRICKET.jpg'),
(23, 'BASKET BALL', 100, 'om', 989553131, 'MR PATIL', 2147483647, '31/10/2023', 'BASKET.jpg'),
(24, 'FOOTBALL', 200, 'HarshKoshti', 989553131, 'MR BHALEROA', 2147483647, '14/09/2023', 'FOOTBALL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `kbtug` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `mob` decimal(65,0) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `sco` varchar(20) NOT NULL,
  `scon` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`kbtug`, `name`, `year`, `branch`, `mob`, `event_id`, `date`, `sco`, `scon`) VALUES
('kbtug21102', 'Harsh Koshti', 'FE', 'IT', '9146856365', 22, '25/10/2023', 'ROHIT DAHATONDE', '986533221'),
('kbtug21102', 'Harsh Koshti', 'FE', 'IT', '9146856365', 15, '23/08/2023', 'PRATHAMESH', '914685665'),
('kbtug21102', 'Harsh Koshti', 'FE', 'IT', '9146856365', 16, '12/05/2023', 'ADITYA RAYTE', '789465465');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kbtug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `mob` decimal(20,0) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kbtug`, `name`, `year`, `branch`, `mob`, `pass`) VALUES
('kbtug21102', 'Harsh Koshti', 'FE', 'IT', '9146856365', '$2y$10$it56QuZZxN38NNP2OviIIe9PRDYFEoKd8rFZagzPnfJNbYpUvZrl2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

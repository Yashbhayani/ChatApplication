-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 07:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_table`
--

CREATE TABLE `chat_table` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_table`
--

INSERT INTO `chat_table` (`id`, `sender_id`, `receiver_id`, `message`, `date`, `time`) VALUES
(1, 1, 2, 'hii', '2022-06-19', '08:42:02'),
(2, 1, 2, 'Hii', '2022-06-19', '08:43:52'),
(3, 1, 2, 'Hello', '2022-06-19', '08:45:05'),
(4, 1, 2, 'How are you?', '2022-06-19', '08:49:25'),
(5, 1, 2, 'Hello', '2022-06-19', '09:26:46'),
(6, 1, 2, 'Hello Bro', '2022-06-19', '09:27:46'),
(7, 1, 4, 'hii', '2022-06-19', '09:36:32'),
(8, 1, 2, 'hii', '2022-06-19', '10:25:51'),
(9, 2, 1, 'hii', '2022-06-19', '10:35:34'),
(10, 1, 2, 'hii', '2022-06-19', '10:42:28'),
(11, 1, 2, 'Hey Bro', '2022-06-19', '11:01:38'),
(12, 2, 1, 'i am good', '2022-06-19', '11:01:49'),
(13, 1, 2, 'good', '2022-06-19', '11:08:45'),
(14, 3, 2, 'hii', '2022-06-19', '11:10:02'),
(15, 2, 3, 'hii', '2022-06-19', '11:10:06'),
(16, 3, 2, 'How are You?', '2022-06-19', '11:10:15'),
(17, 2, 3, 'I am Good.', '2022-06-19', '11:10:23'),
(18, 3, 4, 'hii', '2022-06-19', '11:11:01'),
(19, 4, 3, 'hii', '2022-06-19', '11:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `registration_table`
--

CREATE TABLE `registration_table` (
  `id` int(11) NOT NULL,
  `first_Name` varchar(30) NOT NULL,
  `last_Name` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `birthday_date` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `image` mediumtext NOT NULL,
  `regi_date` date NOT NULL,
  `mobile_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_table`
--

INSERT INTO `registration_table` (`id`, `first_Name`, `last_Name`, `username`, `email`, `password`, `birthday_date`, `gender`, `image`, `regi_date`, `mobile_number`) VALUES
(1, 'Yash', 'Bhayani', 'Yash', 'yash12@gmail.com', 'Yash@1234', '2001-07-30', 'male', 'images/sfsddsf.jpg', '2022-06-17', '9974183203'),
(2, 'Rajat', 'Patel', 'Rajat', 'rajat12@gmail.com', 'Rajat@1234', '2012-12-12', 'male', 'images/Untitled-2.jpg', '2022-06-18', '9977886655'),
(3, 'Keyur', 'Patel', 'Keyur', 'keyur12@gmail.com', 'Keyur@1234', '2005-03-31', 'male', 'images/pexels-ray-bilcliff-2055389.jpg', '2022-06-19', '6655443322'),
(4, 'Raj', 'Thummar', 'Raj', 'raj12@gmail.com', 'Raj@1234', '2000-12-30', 'male', 'images/wallpaperflare.com_wallpaper.jpg', '2022-06-19', '8866554422');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_table`
--
ALTER TABLE `chat_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_table`
--
ALTER TABLE `registration_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_table`
--
ALTER TABLE `chat_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `registration_table`
--
ALTER TABLE `registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

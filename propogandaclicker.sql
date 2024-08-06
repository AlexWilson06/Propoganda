-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 12:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propogandaclicker`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `lastname`, `email`, `message`, `created_at`) VALUES
(2, 'Test2', 'Tester2', 'test2@gmail.com', 'testing2', '2024-07-25 23:57:16'),
(3, 'keir', 'finnin', 'finnink@student.waihekehigh.school.nz', 'hello guys', '2024-07-26 00:02:58'),
(6, 'Adam', 'stinton', 'year13balls@gmail.com', 'Dont do physics at 3 am challenge (we failed) D:<', '2024-07-26 00:27:18'),
(7, 'brent ', 'ssimpsun', 'simp@simp.com', 'im a simp', '2024-07-29 01:22:40'),
(9, 'Alex', 'Wilson', 'terabit@gmail.com', '', '2024-07-29 06:20:15'),
(10, '', '', '', '', '2024-07-29 06:52:15'),
(11, 'Taylor', 'Childs', 'minecraft@roblox.gov', 'I like the premise of the Clicker Game and the visual functionality of the country\'s propaganda being spread made me feel more engaged and that the clicking was doing something. I\'d like to see how the upgrade/leveling system would work when completed, I think that would add a level of depth to the basic clicker-game concept.', '2024-07-30 20:29:43'),
(12, 'hello', '', '', '', '2024-07-30 21:00:18'),
(13, 'monty', 'todd', 'montygaming@hotmail.com', 'rfhiiwhfiuhewiufjijfarfresngceurnesurfhf hurfehfoiudsa fahrefb', '2024-08-01 03:03:18'),
(14, 'alex', 'wilson', 'qurtx@doof.com', 'fork spinach in the world', '2024-08-02 00:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `text1` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `text2` text DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `text3` text DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title1`, `text1`, `image1`, `title2`, `text2`, `image2`, `title3`, `text3`, `image3`) VALUES
(1, 'Top 10 Leader board', 'Top Players By Clicks (all time)', '/Propoganda/media/list.png', 'Top players by score', 'This is a list of the top players, and their scores. They are the cream of the crop. The very best of the best. ', '/Propoganda/media/list.png', 'Fastest Clickers', 'This is a list of the fastest clickers. They are the players that have inputted the highest cps. Although most of them have probably used an auto clicker.', '/Propoganda/media/list.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

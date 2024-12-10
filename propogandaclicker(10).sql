-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 09:36 PM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com'),
(2, 'tester', '$2y$10$hK4mUMJHXbFClJ4l2Tkd/eeqAv3QEtWydJ/P.CmCoJHN5K9XbBbxi', 'test@gmail.com'),
(3, 'Alex', '$2y$10$SmPDAA1FCA6ZWHzs6E6PV.5xP171Yl9Unl5frl0OpZxBNTTLGUoAG', 'aw.waiheke@gmail.com'),
(4, 'DaStupidJuice', '$2y$10$PuCErymR0fi/Rq0EoYV10OiihvBJW6a8AmW0LeZd76QWVyknrhOC2', 'aw.waiheke@gmail.com'),
(5, 'DaStupidJuices', '$2y$10$MsW947FxYyq/7tr/UnNGw.R7YPKOu.ecps9tJm/vu7bfelHC84cH2', 'wilsona@student.waihekehigh.school.nz'),
(6, 'admin', '$2y$10$DtE9Ov8K3hWJrTr/Lu773OcEESoZao3bUITNvm7/eLhO6sY2FItg.', 'admin@null.com'),
(7, 'Alex2', '$2y$10$Q6GxIt1AVmOHSvlDAg2gye/U1XAwPAlwJ8NLM0QDq1K/CwQyO/Ed2', 'Alex2@mail.com'),
(8, 'Alex3', '$2y$10$Q6GxIt1AVmOHSvlDAg2gye/U1XAwPAlwJ8NLM0QDq1K/CwQyO/Ed2', 'Alex3@mail.com'),
(9, 'testacc', '$2y$10$DtE9Ov8K3hWJrTr/Lu773OcEESoZao3bUITNvm7/eLhO6sY2FItg.', 'testacc@mail.com'),
(10, 'newuser', '$2y$10$B0myiFKl0mGAI5xWulbfr.jWvmznqg4BCxwwRMXZICTwnm4zEvcEi', 'newuser@mail.com'),
(11, 'newuseragain', '$2y$10$TPgm02VP1THw6Vj4q5M7g.1xKXzuNWBkEQU/phkjmSbvWSG6mLG0G', 'newuseragain@mail.com');

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
(1, 'Test2', 'Tester2', 'test2@gmail.com', 'testing2', '2024-07-25 23:57:16'),
(3, 'keir', 'finnin', 'finnink@student.waihekehigh.school.nz', 'hello guys', '2024-07-26 00:02:58'),
(11, 'Taylor', 'Childs', 'minecraft@roblox.gov', 'I like the premise of the Clicker Game and the visual functionality of the country\'s propaganda being spread made me feel more engaged and that the clicking was doing something. I\'d like to see how the upgrade/leveling system would work when completed, I think that would add a level of depth to the basic clicker-game concept.', '2024-07-30 20:29:43'),
(13, 'monty', 'todd', 'montygaming@hotmail.com', 'rfhiiwhfiuhewiufjijfarfresngceurnesurfhf hurfehfoiudsa fahrefb', '2024-08-01 03:03:18'),
(15, 'alex', 'wilson', 'aw.waiheke@gmail.com', 'testing feedback', '2024-10-22 20:19:57');

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

-- --------------------------------------------------------

--
-- Table structure for table `trackeduserinformation`
--

CREATE TABLE `trackeduserinformation` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `TopScore` int(11) NOT NULL,
  `TopRebirths` int(11) NOT NULL,
  `TopClicks` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trackeduserinformation`
--

INSERT INTO `trackeduserinformation` (`ID`, `userid`, `TopScore`, `TopRebirths`, `TopClicks`, `Date`) VALUES
(1, 3, 4030, 12, 593, '2024-11-17 20:13:37'),
(2, 7, 42223, 32, 4543, '2024-11-17 20:13:42'),
(3, 1, 1324543, 15, 4132423, '2024-11-17 20:13:47'),
(4, 7, 4234, 443, 221232, '2024-11-17 21:58:24'),
(6, 7, 100, 0, 50, '2024-12-08 09:15:40'),
(7, 7, 10, 0, 10, '2024-12-08 09:34:29'),
(8, 7, 10, 0, 10, '2024-12-08 09:43:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `trackeduserinformation`
--
ALTER TABLE `trackeduserinformation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trackeduserinformation`
--
ALTER TABLE `trackeduserinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

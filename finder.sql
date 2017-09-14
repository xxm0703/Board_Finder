-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 септ 2017 в 22:40
-- Версия на сървъра: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finder`
--

-- --------------------------------------------------------

--
-- Структура на таблица `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `langitude` decimal(10,0) NOT NULL,
  `longitude` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `event_games`
--

CREATE TABLE `event_games` (
  `eventID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `games`
--

CREATE TABLE `games` (
  `ID` int(11) NOT NULL,
  `game_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `games`
--

INSERT INTO `games` (`ID`, `game_name`) VALUES
(1, 'monopoly'),
(2, 'concept'),
(4, 'catan'),
(5, 'dixit');

-- --------------------------------------------------------

--
-- Структура на таблица `info_games`
--

CREATE TABLE `info_games` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `info_games`
--

INSERT INTO `info_games` (`ID`, `userID`, `gameID`, `type`) VALUES
(1, 1, 5, 1),
(2, 1, 1, 2),
(3, 1, 1, 1),
(4, 1, 2, 3);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `names` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `names`, `email`, `image`) VALUES
(1, 'martin', 'martin16', 'Martin Jordanov', 'xxm0703@abv.bg', 'picture1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_games`
--
ALTER TABLE `info_games`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `info_games`
--
ALTER TABLE `info_games`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

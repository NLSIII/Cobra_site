-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 05:24 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobra`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `player_id` int(11) NOT NULL,
  `gamer_tag` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `current_room` varchar(5) NOT NULL DEFAULT 'rm_01',
  `hp` int(4) NOT NULL DEFAULT '100',
  `money` int(11) NOT NULL,
  `weapon` varchar(5) NOT NULL DEFAULT 'none',
  `head` varchar(5) NOT NULL DEFAULT 'none',
  `chest` varchar(5) NOT NULL DEFAULT 'none',
  `hands` varchar(5) NOT NULL DEFAULT 'none',
  `legs` varchar(5) NOT NULL DEFAULT 'none',
  `ci_array` varchar(16) NOT NULL DEFAULT '0,0,0,0,0,0,0',
  `pi_array` varchar(32) NOT NULL,
  `hi_array` varchar(32) NOT NULL,
  `rm_array` varchar(64) NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
  `dracula` varchar(1) NOT NULL DEFAULT '0',
  `moves` varchar(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`player_id`, `gamer_tag`, `email`, `password`, `current_room`, `hp`, `money`, `weapon`, `head`, `chest`, `hands`, `legs`, `ci_array`, `pi_array`, `hi_array`, `rm_array`, `dracula`, `moves`) VALUES
(1, 'test', 'trip.soucie@tciwireless.com', '123', 'rm_01', 100, 0, 'none', 'none', 'none', 'none', 'none', '0,0,0,0,0,0,0', '', '', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0', '0'),
(2, 'Venom H3', 'venomh3@hotmail.com', '1234', 'rm_01', 100, 0, 'none', 'none', 'none', 'none', 'none', '0,0,0,0,0,0,0', '', '', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` varchar(5) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `cmd` varchar(1024) NOT NULL,
  `image` varchar(64) NOT NULL,
  `do` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monsters`
--

CREATE TABLE `monsters` (
  `monster_id` varchar(5) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `img` varchar(16) NOT NULL,
  `cmd` varchar(1024) NOT NULL,
  `hp` int(4) NOT NULL,
  `attack` int(4) NOT NULL,
  `item` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` varchar(5) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `img` varchar(16) NOT NULL,
  `cmds` varchar(2048) NOT NULL,
  `doors` varchar(20) NOT NULL,
  `monster` varchar(5) NOT NULL,
  `item` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `name`, `description`, `img`, `cmds`, `doors`, `monster`, `item`) VALUES
('rm_01', '', 'this is a description of the first room', 'F4R1.png', '', 'rm_02', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `monsters`
--
ALTER TABLE `monsters`
  ADD PRIMARY KEY (`monster_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

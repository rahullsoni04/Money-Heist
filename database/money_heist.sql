-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 09:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money heist`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `fictional_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `description`, `image`, `fictional_name`) VALUES
(3, 'Sergio Marquina', 'The Professor is a fictional character in the Netflix series Money Heist, portrayed by Álvaro Morte. He is the mastermind of the heist who assembled the group, as well as Berlin\'s brother', 'professor1.jpg', 'professor'),
(4, 'Raquel Murillo Fuentes', 'Raquel Murillo (Lisbon) is a fictional character in the Netflix series Money Heist, portrayed by Itziar Ituño.', 'lisbon.jpg', 'lisbon'),
(5, 'Andrés de Fonollosa', 'Berlin (Andrés de Fonollosa) is a fictional character in the Netflix series Money Heist, portrayed by Pedro Alonso.[1] A terminally ill jewel thief, he is the Professor\'s second-in-command and brother.', 'berlin.jpg', 'berlin'),
(6, 'Martín Berrote', 'Martín Berrote, also known by his alias, Palermo, is one of the main characters in the Netflix series Money Heist, portrayed by actor Rodrigo de la Serna.', 'pallermo.jpg', 'Palermo'),
(7, 'Aníbal Cortés,', 'Aníbal Cortés, also known by his alias, Rio (  es.  Río ), is one of the main characters in the Netflix series Money Heist, portrayed by actor Miguel Herrán.', 'rio3.jpg', 'rio'),
(8, 'Silene Oliveira', 'Tokyo is a thief on the run from the police after a failed robbery in which her boyfriend was killed. She was hired by the Professor to help in carrying out a heist of the Royal Mint in Madrid.', 'tokyo1.jpg', 'Tokyo');

-- --------------------------------------------------------

--
-- Table structure for table `char_img`
--

CREATE TABLE `char_img` (
  `id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `char_img`
--

INSERT INTO `char_img` (`id`, `char_id`, `image`) VALUES
(1, 3, 'professor1.jpg'),
(2, 3, 'professor2.jpg'),
(3, 3, 'professor3.jpg'),
(4, 3, 'professor4.jpg'),
(6, 4, 'lisbon1.jpg'),
(7, 4, 'lisbon2.jpg'),
(8, 4, 'lisbon3.jpg'),
(9, 5, 'berlin1.jpg'),
(10, 5, 'berlin2.jpg'),
(11, 5, 'berlin3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `char_img`
--
ALTER TABLE `char_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `char_id` (`char_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `char_img`
--
ALTER TABLE `char_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `char_img`
--
ALTER TABLE `char_img`
  ADD CONSTRAINT `char_img_ibfk_1` FOREIGN KEY (`char_id`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

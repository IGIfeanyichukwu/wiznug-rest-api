-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 05:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiznug-rest-api-dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `author`) VALUES
(1, 'Capital punishment is as fundamentally wrong as for crime as charity is wrong as cure for poverty.', 'Henry Ford'),
(2, 'Always give without remembering and always receive without forgetting.', 'Brian Tracy'),
(3, 'Success is not final, failure is not fatal but it is the desire to continue that counts', 'Winston Churchill'),
(4, 'Blessing are never given solely for the benefit of the one who receives them.', 'Dr. Myles Munroe'),
(5, 'In imagination, there is no limitation', 'Mark Victor Hansen'),
(7, 'Everything you want is on the other side of fear', 'Jack Canfield'),
(8, 'Most of the things that your want are just outside your \'Comfort Zone\'.', 'Jack Canfield'),
(9, 'Don\'t worry about failure, worry about the chances you miss when you don\'t try.', 'Jack Canfield'),
(10, 'If you love your work, if you enjoy it, you have already a success.', 'Jack Canfield'),
(11, 'Practise random acts of kindness and senseless acts of beauty', 'Jack Canfield'),
(12, 'The only true wisdom is knowing you know nothing', 'Socrates'),
(13, 'By all means, Marry. If you get a good wife, you will become happy, if you get a bad one, you will become a philosopher.', 'Socrates'),
(14, 'An honest man is always a child.', 'Socrates'),
(15, 'Be slow to fall into friendship; but when thou art in, continue firm and constant.', 'Socrates'),
(16, 'Wisdom begins in wonders.', 'Socrates'),
(17, 'From the deepest desires often come the deadliest waste.', 'Socrates'),
(18, 'Happiness depends upon ourselves.', 'Aristotles'),
(19, 'We are what we repeatedly do. Excellence then is not an art, but a habit.', 'Aristotles'),
(20, 'Hope is a waking dream.', 'Aristotles'),
(21, 'I count him braver who overcomes his desires than him who conquers his enemies; for the hardest victory is over self.', 'Aristotles');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

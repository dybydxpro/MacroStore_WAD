-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 08:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wadproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartdb`
--

CREATE TABLE `cartdb` (
  `cartID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `cartqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartdb`
--

INSERT INTO `cartdb` (`cartID`, `itemID`, `userID`, `cartqty`) VALUES
(1, 3, 1, 10),
(2, 1, 1, 25),
(3, 4, 2, 2),
(4, 5, 1, 0),
(5, 5, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartdb`
--
ALTER TABLE `cartdb`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `items_to_cart` (`itemID`),
  ADD KEY `user_to_cart` (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartdb`
--
ALTER TABLE `cartdb`
  ADD CONSTRAINT `items_to_cart` FOREIGN KEY (`itemID`) REFERENCES `itemsdb` (`itemNo`),
  ADD CONSTRAINT `user_to_cart` FOREIGN KEY (`userID`) REFERENCES `userdb` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

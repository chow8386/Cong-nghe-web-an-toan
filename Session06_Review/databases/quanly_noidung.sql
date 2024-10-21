-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2024 at 06:15 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanly_noidung`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ID` int NOT NULL,
  `ARTICLENAME` varchar(255) NOT NULL,
  `CATEGORYID` int NOT NULL,
  `ARTICLESUM` text,
  `CONTENT` text,
  `NOTE` text,
  `DAYCREATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DAYMODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AUTHORID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID`, `ARTICLENAME`, `CATEGORYID`, `ARTICLESUM`, `CONTENT`, `NOTE`, `DAYCREATE`, `DAYMODIFIED`, `AUTHORID`) VALUES
(1, 'Dolan Horton', 1, 'Excepturi inventore ', 'Eos repellendus In', 'Earum aut architecto', '2024-10-20 14:14:17', '2024-10-20 14:42:07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

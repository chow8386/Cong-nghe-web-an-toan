-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2024 at 06:14 PM
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
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoso`
--

CREATE TABLE `hoso` (
  `MaHs` char(8) NOT NULL,
  `HoTen` char(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` char(150) DEFAULT NULL,
  `Lop` char(6) DEFAULT NULL,
  `DiemToan` float DEFAULT NULL,
  `DiemLy` float DEFAULT NULL,
  `DiemHoa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hoso`
--

INSERT INTO `hoso` (`MaHs`, `HoTen`, `NgaySinh`, `DiaChi`, `Lop`, `DiemToan`, `DiemLy`, `DiemHoa`) VALUES
('1', 'LMC', '2003-07-01', 'Ha Noi', 'AT18B', 10, 10, 10),
('HS001', 'Nguyễn Văn B', '2000-02-01', 'Hà Nội', '10B', 8, 9, 7),
('HS002', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10', 8, 9, 7),
('HS003', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS004', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS005', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS006', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS007', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS008', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS009', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS010', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7),
('HS011', 'Nguyễn Văn A', '2000-01-01', 'Hà Nội', '10A', 8, 9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MaLop` int NOT NULL,
  `TenLop` char(50) DEFAULT NULL,
  `KhoaHoc` int DEFAULT NULL,
  `Gvcn` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`, `KhoaHoc`, `Gvcn`) VALUES
(1, 'AT18A', 18, 'Nguyễn Văn A'),
(7, 'AT18C', 18, 'Lê Minh C'),
(8, 'AT18B', 18, 'Mai Thị B'),
(9, 'AT18B', 18, 'Mai Thị B'),
(10, 'AT18B', 18, 'Mai Thị B'),
(11, 'AT18B', 18, 'Mai Thị B'),
(12, 'AT18B', 18, 'Mai Thị B'),
(13, 'AT18B', 18, 'Mai Thị B'),
(14, 'AT18B', 18, 'Mai Thị B'),
(15, 'AT18B', 18, 'Mai Thị B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoso`
--
ALTER TABLE `hoso`
  ADD PRIMARY KEY (`MaHs`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `MaLop` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

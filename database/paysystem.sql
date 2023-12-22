-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 09:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(255) NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `delete_status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch`, `address`, `detail`, `delete_status`) VALUES
(1, '6', '560.000 VND', '80.000VND/Tháng (20.000VND/Môn)', '0'),
(2, '7', '700.000 VND', '100.000VND/Tháng (25.000VND/Môn)', '0'),
(3, '8', '1.050.000 VND', '150.000VND/Tháng (30.000VND/Môn)', '0'),
(4, '9', '1.400.000 VND', '200.000VND/Tháng (40.000VND/Môn)', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fees_transaction`
--

CREATE TABLE `fees_transaction` (
  `id` int(255) NOT NULL,
  `stdid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paid` int(255) NOT NULL,
  `submitdate` datetime NOT NULL,
  `transcation_remark` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fees_transaction`
--

INSERT INTO `fees_transaction` (`id`, `stdid`, `paid`, `submitdate`, `transcation_remark`) VALUES
(1, '1', 480000, '2023-12-15 00:00:00', 'trả tiền'),
(2, '4', 480000, '2023-12-15 00:00:00', 'oke'),
(3, '0', 150000, '2023-12-20 00:00:00', 'thanh toán học phí'),
(4, '0', 200000, '2023-12-20 00:00:00', 'Hi'),
(5, '1', 100000, '2023-12-20 00:00:00', 'trả trước, chưa có tiền đủ'),
(6, '3', 50000, '2023-12-20 00:00:00', 'trả bớt'),
(7, '5', 100000, '2023-12-22 00:00:00', 'đã trả'),
(8, '5', 900000, '2023-12-22 00:00:00', 'abc'),
(9, '5', 100000, '2023-12-12 00:00:00', '23432'),
(10, '3', 200000, '2023-12-22 00:00:00', 'trả trước 200k'),
(11, '2', 100000, '2023-12-22 00:00:00', 'chưa nhận lương nên đóng trước'),
(12, '7', 200000, '2023-12-22 00:00:00', 'done nhé'),
(13, '8', 400000, '2023-12-22 00:00:00', 'done'),
(14, '8', 300000, '2023-12-23 00:00:00', ''),
(15, '10', 530000, '2023-12-22 00:00:00', ''),
(16, '6', 200000, '2023-12-22 00:00:00', ''),
(17, '12', 100000, '2023-12-22 00:00:00', ''),
(18, '10', 205000, '2023-12-22 00:00:00', 'done nhé'),
(19, '0', 100000, '2023-12-22 00:00:00', 'đóng trước 100k');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `emailid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `joindate` datetime NOT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fees` int(255) NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(255) NOT NULL,
  `delete_status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `emailid`, `sname`, `joindate`, `about`, `contact`, `fees`, `branch`, `balance`, `delete_status`) VALUES
(1, 'kha27407@gmail.com', 'Lê Anh Kha', '2023-12-20 00:00:00', 'KHÁ ', '0852548099', 580000, '3', 0, '0'),
(2, 'khang@gmail.com', 'Chí Khang', '2023-12-20 10:32:54', 'Yếu Anh', '023432341', 1050000, '3', 950000, '0'),
(3, 'Linh@gmail.com', 'Phương Linh', '2023-12-20 10:32:54', 'Giỏi đều', '023432341', 500000, '1', 250000, '0'),
(4, 'phuc@gmail.com', 'Phúc', '2023-12-21 10:37:17', '', '011123232', 1000000, '2', 315000, '0'),
(5, 'huyen@gmail.com', 'Huyền', '2023-12-21 10:37:17', '', '011123232', 1100000, '2', 120000, '0'),
(6, 'B@gmail.com', 'Văn B', '2023-12-21 10:37:17', '', '011123232', 550000, '2', 350000, '0'),
(7, 'C@gmail.com', 'Anh C', '2023-12-21 10:37:17', '', '011123232', 900000, '2', 700000, '1'),
(8, 'D@gmail.com', 'Anh D', '2023-12-21 10:37:17', '', '011123232', 700000, '2', 0, '0'),
(9, 'lam3131@gmail.com', 'Lâm', '2023-12-22 06:52:35', 'Nhà có điều kiện', '012345678', 850000, '1', 850000, '0'),
(10, 'haha131@gmail.com', 'HAHA', '2023-12-22 06:52:35', 'kém Anh', '032323111', 735000, '3', 0, '0'),
(11, 'Edison131@gmail.com', 'Nguyễn Thị B', '2023-12-22 06:52:35', 'hơi quậy', '024434321', 365000, '1', 365000, '0'),
(12, 'thaovy123@gmail.com', 'Vy', '2023-12-22 06:52:35', 'Yếu toán', '033434321', 898000, '3', 798000, '0'),
(13, 'Troinguyen111@gmail.com', 'Nguyễn Văn Trỗi', '2023-12-22 00:00:00', 'Có công với đất nước', '0368342321', 1000000, '4', 900000, '0'),
(14, 'khale@gmail.com', 'Kha Lê', '2023-12-20 00:00:00', '', '0852548099', 1300000, '4', 700000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emailid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `emailid`, `lastlogin`) VALUES
(1, 'khale', 'b8058401fced349a5cb3d09be096cbaf', 'kha', 'kha27407@gmail.com', '2023-12-22 08:22:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

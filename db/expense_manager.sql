-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 10:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `type_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `type_category`) VALUES
(1, 'Allowance', 1),
(2, 'Food', 2),
(3, 'Selling', 1),
(4, 'Sallary', 1),
(5, 'Education', 2),
(6, 'Award', 1),
(7, 'Gift', 1),
(8, 'Other', 1),
(9, 'Other', 2),
(10, 'Electricity', 2),
(11, 'Gas', 2),
(12, 'Internet', 2),
(13, 'Phone', 2),
(14, 'Water', 2),
(15, 'Games', 2),
(16, 'Movies', 2),
(17, 'Child & Baby', 2),
(18, 'Home', 2),
(19, 'Pets', 2),
(20, 'Fee & Tax', 2),
(21, 'Charity', 2),
(22, 'Health', 2),
(23, 'Insurance', 2),
(24, 'Shopping', 2),
(25, 'Transportation', 2);

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `id_manage` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `ammount_in` int(11) NOT NULL DEFAULT 0,
  `ammount_ex` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`id_manage`, `id_user`, `names`, `ammount_in`, `ammount_ex`, `category`, `date`) VALUES
(1, 1, 'Uang Jajan ', 1000, 0, 1, '2021-02-24'),
(2, 1, 'Uang Jajan ', 10000, 0, 1, '2021-02-24'),
(3, 1, 'Beli Roti', 500, 0, 1, '2021-02-24'),
(8, 1, 'Beli Minum', 0, 2345, 2, '2021-02-10'),
(9, 1, 'Beli Teh', 0, 2345, 2, '2021-02-05'),
(10, 1, 'Beli Baju', 0, 555, 2, '2021-02-18'),
(11, 1, 'Uang Jajan', 6450, 0, 1, '2021-02-11'),
(12, 1, 'Bayar SPP', 0, 100, 5, '2021-02-18'),
(13, 1, 'Jualan Kunci', 1234, 0, 3, '2021-02-23'),
(14, 1, 'Ulangan Dapat 75', 2345, 0, 6, '2021-02-16'),
(15, 1, 'Jualan Permen', 1, 0, 3, '2021-02-16'),
(17, 1, 'Ang Pao', 2000, 0, 7, '2021-02-24'),
(18, 1, 'Nemu Uang', 3, 0, 8, '2021-02-24'),
(19, 1, 'Bayar Listrik', 0, 4000, 10, '2021-02-24'),
(20, 1, 'Uang Jajan', 111, 0, 1, '2021-02-24'),
(21, 1, 'Gajian', 4353, 0, 4, '2021-02-24'),
(22, 1, 'Gajian', 6540, 0, 4, '2021-02-24'),
(23, 1, 'Jualan Sendok', 1000, 0, 3, '2021-02-24'),
(24, 1, 'Jualan Kartu', 3453, 0, 3, '2021-02-23'),
(25, 1, 'Jualan Ikan Cupang', 53453, 0, 3, '2021-02-22'),
(26, 1, '5345', 34534, 0, 3, '2021-02-24'),
(27, 1, 'Uang Jajan', 5345, 0, 1, '2021-02-24'),
(28, 1, 'Jualan Baju', 8680, 0, 3, '2021-02-24'),
(29, 1, 'Jualan Celana', 45654, 0, 3, '2021-02-24'),
(30, 1, 'Bayar Sekolah', 0, 3345, 5, '2021-02-24'),
(31, 1, 'Bayar Les', 0, 45654, 5, '2021-02-23'),
(32, 1, 'Beli Popok', 0, 5600, 17, '2021-02-24'),
(33, 1, 'Bayar Internet', 0, 6570, 12, '2021-02-24'),
(34, 1, 'Listrik Lagi', 0, 5677, 10, '2021-02-24'),
(35, 1, 'Bayar Extrakulikuler', 0, 6867, 5, '2021-02-24'),
(36, 1, 'Bayar Les Bahasa C', 0, 7698, 5, '2021-02-24'),
(37, 1, 'Pengobatan Sakit Batuk', 0, 15000, 23, '2021-02-24'),
(38, 1, 'Beli Permen', 0, 1, 2, '2021-02-24'),
(39, 1, 'Jualan Kartu', 1, 0, 3, '2021-02-24'),
(40, 1, 'Uang Jajan', 567, 0, 1, '2021-02-24'),
(41, 1, 'Uang Jajan', 1237, 0, 1, '2021-02-26'),
(42, 1, 'Uang Jajan', 12345, 0, 1, '2021-02-26'),
(47, 1, 'Donasi Bencana Banjir', 0, 25000, 21, '2021-02-27'),
(50, 1, 'Uang Bulanan', 12300, 0, 1, '2021-02-27'),
(52, 1, 'Donasi Bencana Banjir', 0, 12300, 21, '2021-02-27'),
(53, 1, 'Donasi Bencana Longsor', 0, 1234, 21, '2021-02-27'),
(62, 1, 'Uang Bulan Maret', 50000, 0, 7, '2021-03-01'),
(63, 1, 'Beli Nasi Kuning', 0, 5000, 2, '2021-03-01'),
(76, 1, 'Jual Sesuatu', 12300, 0, 3, '2021-03-02'),
(77, 1, 'Bayar Internet Februari', 0, 1000, 12, '2021-03-02'),
(78, 1, 'Nemu Uang', 10000, 0, 8, '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_note` varchar(50) NOT NULL,
  `note_text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_note`, `id_user`, `name_note`, `note_text`, `date`) VALUES
(1, 1, 'note 1', 'Bayar listrik sebesar 10.000 rupiah untuk bulan februari', '2021-03-02'),
(2, 1, 'note 2', 'Bayar SPP sebesar 20.000 untuk bulan februari', '2021-03-02'),
(3, 1, 'note 3 large', 'Beli Permen sebesar 100 rupiah', '2021-03-02'),
(4, 1, 'note 4', 'beli kentang sebesar 5.000 rupiah', '2021-03-02'),
(5, 1, 'note 5', 'bayar gas sebesar 2.500 rupiah', '2021-03-02'),
(6, 1, 'note 6', '-beli roti<br>-beli daging<br>-beli selada<br>-beli saus tomat<br><br>total : 8.000 rupiah', '2021-03-02'),
(7, 1, 'note 7', 'bayar les sebesar 5.000 rupiah', '2021-03-02'),
(8, 1, 'note 8', 'beli fanta sebesar 500 rupiah', '2021-03-02'),
(14, 1, 'note 9', 'beli sprite, coca cola<br><br>total : 750 rupiah', '2021-03-02'),
(15, 1, 'note 10', 'a<br>i<br>u<br>e<br>o<br>o<br>o<br>o<br>o', '2021-03-02'),
(16, 1, 'note 11', 'o<br>i<br>u<br>e<br>abc', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id_report` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_report` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `report_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id_report`, `id_user`, `name_report`, `filename`, `report_created_at`) VALUES
(9, 1, 'Data from 2021-03-01 until 2021-03-01', '2021-03-01 035207-1.csv', '2021-03-01 03:52:07'),
(10, 1, 'Data from 2021-03-01 until 2021-03-01', '2021-03-01 035711-1.csv', '2021-03-01 03:57:11'),
(11, 1, 'Data from 2021-03-01 until 2021-03-01', '2021-03-01 035740-1.csv', '2021-03-01 03:57:40'),
(12, 1, 'Data from 2021-03-01 until 2021-03-01', '2021-03-01 035855-1.csv', '2021-03-01 03:58:55'),
(13, 1, 'Data from 2021-03-01 until 2021-03-02', '2021-03-01 035947-1.csv', '2021-03-01 03:59:47'),
(14, 1, 'Data Category Allowance from 2021-02-01 until 2021', '2021-03-01 043902-1.csv', '2021-03-01 04:39:02'),
(15, 1, 'Data Category Allowance from 2021-02-01 until 2021', '2021-03-01 044127-1.csv', '2021-03-01 04:41:27'),
(16, 1, 'Data Category Allowance from 2021-03-01 until 2021', '2021-03-01 044203-1.csv', '2021-03-01 04:42:03'),
(17, 1, 'Data Category Charity from 2021-02-01 until 2021-03-01', '2021-03-01 044243-1.csv', '2021-03-01 04:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `pin` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `name_user`, `pin`) VALUES
(1, 'user1@user.com', '$2y$10$E4wtalZeVDlhEBeiJdubduJXYDBsoxdppJVPBk4LUc6nUgKhtisWe', 'User 1', '123456'),
(7, 'user2@user.com', '$2y$10$E4wtalZeVDlhEBeiJdubduJXYDBsoxdppJVPBk4LUc6nUgKhtisWe', 'User 2', '000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`id_manage`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `manage`
--
ALTER TABLE `manage`
  MODIFY `id_manage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

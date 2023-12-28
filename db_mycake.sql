-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 03:34 PM
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
-- Database: `db_mycake`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cake`
--

CREATE TABLE `tb_cake` (
  `id_cake` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `rasa` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cake`
--

INSERT INTO `tb_cake` (`id_cake`, `nama`, `jumlah`, `harga`, `rasa`, `jenis`) VALUES
(1, 'Kue Coklat', 10, 20000, 'Coklat', 'Kue Manis'),
(2, 'Kue Keju', 8, 18000, 'Keju', 'Kue Manis'),
(3, 'Kue Strawberry', 15, 22000, 'Strawberry', 'Kue Manis'),
(4, 'Kue Pandan', 12, 19000, 'Pandan', 'Kue Manis'),
(5, 'Kue Red Velvet', 9, 25000, 'Red Velvet', 'Kue Manis'),
(6, 'Kue Nanas', 20, 15000, 'Nanas', 'Kue Manis'),
(7, 'Kue Pisang', 18, 17000, 'Pisang', 'Kue Manis'),
(8, 'Kue Durian', 5, 30000, 'Durian', 'Kue Manis'),
(9, 'Kue Mocca', 14, 21000, 'Mocca', 'Kue Manis'),
(10, 'Kue Blueberry', 7, 23000, 'Blueberry', 'Kue Manis'),
(11, 'Kue Leci', 16, 16000, 'Leci', 'Kue Manis'),
(12, 'Kue Mangga', 11, 24000, 'Mangga', 'Kue Manis'),
(13, 'Kue Vanilla', 8, 18000, 'Vanilla', 'Kue Manis'),
(14, 'Kue Stroberi', 13, 20000, 'Stroberi', 'Kue Manis'),
(15, 'Kue Lemon', 9, 22000, 'Lemon', 'Kue Manis'),
(16, 'Kue Kacang', 17, 17000, 'Kacang', 'Kue Manis'),
(17, 'Kue Anggur', 12, 19000, 'Anggur', 'Kue Manis'),
(18, 'Kue Alpukat', 8, 25000, 'Alpukat', 'Kue Manis'),
(19, 'Kue Salak', 10, 21000, 'Salak', 'Kue Manis'),
(20, 'Kue Melon', 15, 23000, 'Melon', 'Kue Manis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_cake` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT 0,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `id_cake`, `jumlah`, `tanggal_pembelian`, `status`) VALUES
(61, 1, 1, 2, '2023-07-08 19:24:11', 'order'),
(62, 2, 3, 1, '2023-07-08 19:24:11', 'sampai'),
(63, 1, 2, 3, '2023-07-08 19:24:11', 'order'),
(64, 3, 4, 2, '2023-07-08 19:24:11', 'sampai'),
(65, 2, 5, 1, '2023-07-08 19:24:11', 'order'),
(66, 4, 6, 4, '2023-07-08 19:24:11', 'sampai'),
(67, 3, 7, 3, '2023-07-08 19:24:11', 'order'),
(68, 1, 8, 2, '2023-07-08 19:24:11', 'sampai'),
(69, 4, 9, 1, '2023-07-08 19:24:11', 'order'),
(70, 2, 10, 3, '2023-07-08 19:24:11', 'sampai'),
(71, 1, 11, 2, '2023-07-08 19:24:11', 'order'),
(72, 3, 12, 1, '2023-07-08 19:24:11', 'sampai'),
(73, 4, 13, 2, '2023-07-08 19:24:11', 'order'),
(74, 2, 14, 1, '2023-07-08 19:24:11', 'sampai'),
(75, 3, 15, 4, '2023-07-08 19:24:11', 'order'),
(76, 4, 16, 3, '2023-07-08 19:24:11', 'sampai'),
(77, 1, 17, 2, '2023-07-08 19:24:11', 'order'),
(78, 2, 18, 1, '2023-07-08 19:24:11', 'sampai'),
(79, 3, 19, 3, '2023-07-08 19:24:11', 'order'),
(80, 4, 20, 2, '2023-07-08 19:24:11', 'sampai'),
(81, 1, 1, 1, '2023-07-08 19:24:11', 'order'),
(82, 2, 3, 4, '2023-07-08 19:24:11', 'sampai'),
(83, 1, 2, 2, '2023-07-08 19:24:11', 'order'),
(84, 3, 4, 1, '2023-07-08 19:24:11', 'sampai'),
(85, 2, 5, 3, '2023-07-08 19:24:11', 'order'),
(86, 4, 6, 2, '2023-07-08 19:24:11', 'sampai'),
(87, 3, 7, 1, '2023-07-08 19:24:11', 'order'),
(88, 1, 8, 4, '2023-07-08 19:24:11', 'sampai'),
(89, 4, 9, 3, '2023-07-08 19:24:11', 'order'),
(90, 2, 10, 2, '2023-07-08 19:24:11', 'sampai'),
(91, 1, 11, 3, '2023-07-08 19:24:11', 'order'),
(92, 3, 12, 1, '2023-07-08 19:24:11', 'sampai'),
(93, 4, 13, 2, '2023-07-08 19:24:11', 'order'),
(94, 2, 14, 1, '2023-07-08 19:24:11', 'sampai'),
(95, 3, 15, 4, '2023-07-08 19:24:11', 'order'),
(96, 4, 16, 3, '2023-07-08 19:24:11', 'sampai'),
(97, 1, 17, 2, '2023-07-08 19:24:11', 'order'),
(98, 2, 18, 1, '2023-07-08 19:24:11', 'sampai'),
(99, 3, 19, 3, '2023-07-08 19:24:11', 'order'),
(100, 4, 20, 2, '2023-07-08 19:24:11', 'sampai'),
(101, 1, 1, 2, '2023-07-08 19:24:11', 'order'),
(102, 2, 3, 1, '2023-07-08 19:24:11', 'sampai'),
(103, 1, 2, 3, '2023-07-08 19:24:11', 'order'),
(104, 3, 4, 2, '2023-07-08 19:24:11', 'sampai'),
(105, 2, 5, 1, '2023-07-08 19:24:11', 'order'),
(106, 4, 6, 4, '2023-07-08 19:24:11', 'sampai'),
(107, 3, 7, 3, '2023-07-08 19:24:11', 'order'),
(108, 1, 8, 2, '2023-07-08 19:24:11', 'sampai'),
(109, 4, 9, 1, '2023-07-08 19:24:11', 'order'),
(110, 2, 10, 3, '2023-07-08 19:24:11', 'sampai'),
(111, 1, 11, 2, '2023-07-08 19:24:11', 'order'),
(112, 3, 12, 1, '2023-07-08 19:24:11', 'sampai'),
(113, 4, 13, 2, '2023-07-08 19:24:11', 'order'),
(114, 2, 14, 1, '2023-07-08 19:24:11', 'sampai'),
(115, 3, 15, 4, '2023-07-08 19:24:11', 'order'),
(116, 4, 16, 3, '2023-07-08 19:24:11', 'sampai'),
(117, 1, 17, 2, '2023-07-08 19:24:11', 'order'),
(118, 2, 18, 1, '2023-07-08 19:24:11', 'sampai'),
(119, 3, 19, 3, '2023-07-08 19:24:11', 'order'),
(120, 4, 20, 2, '2023-07-08 19:24:11', 'sampai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_number` varchar(20) DEFAULT NULL,
  `log_user` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `user_number`, `log_user`) VALUES
(1, 'JohnDoe', '1234567890', '2023-07-09 02:24:01'),
(2, 'JaneSmith', '9876543210', '2023-07-09 02:24:01'),
(3, 'MikeJohnson', '5555555555', '2023-07-09 02:24:01'),
(4, 'EmilyDavis', '9999999999', '2023-07-09 02:24:01'),
(5, 'DavidBrown', '1111111111', '2023-07-09 02:24:01'),
(6, 'SarahWilson', '2222222222', '2023-07-09 02:24:01'),
(7, 'ChrisTaylor', '3333333333', '2023-07-09 02:24:01'),
(8, 'AmyRobinson', '4444444444', '2023-07-09 02:24:01'),
(9, 'MichaelLee', '6666666666', '2023-07-09 02:24:01'),
(10, 'JenniferClark', '7777777777', '2023-07-09 02:24:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cake`
--
ALTER TABLE `tb_cake`
  ADD PRIMARY KEY (`id_cake`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cake` (`id_cake`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`id_cake`) REFERENCES `tb_cake` (`id_cake`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

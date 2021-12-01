-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 01, 2021 at 04:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin1`
--

CREATE TABLE `tbl_admin1` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin1`
--

INSERT INTO `tbl_admin1` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Allen Cabansag', 'Lentucky', 'e22c231f2a1faf3e921af180d53c31bc'),
(4, 'ElmoWorld', 'lalala', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'Jayzel Dieter', 'Dieter', '1a1dc91c907325c69271ddf0c944bc72'),
(7, 'Joshua Neo Sevillio', 'Neomatrix', '2e315dcaa77983999bf11106c65229dc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category1`
--

CREATE TABLE `tbl_category1` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category1`
--

INSERT INTO `tbl_category1` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Filipino Sweets', 'Food_Category_88.jpg', 'yes', 'yes'),
(5, 'Cupcakes', 'Food_Category_492.jpg', 'yes', 'yes'),
(6, 'Cookies', 'Food_Category_408.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food1`
--

CREATE TABLE `tbl_food1` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food1`
--

INSERT INTO `tbl_food1` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Polvoron', 'A sweet and flaky shortbread', '50.00', 'Food-Name-4320.jpg', 4, 'Yes', 'Yes'),
(3, 'Yema', 'A sweet custard confectionery', '150.00', 'Food-Name-6556.jpg', 4, 'Yes', 'Yes'),
(4, 'Pastillas', 'Creamy and sweet confectionary snack', '50.00', 'Food-Name-1521.jpg', 4, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order1`
--

CREATE TABLE `tbl_order1` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(155) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUsername` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`usersId`, `usersName`, `usersEmail`, `usersUsername`, `usersPwd`) VALUES
(1, 'Allen Cabansag', 'meme@yahoo.com', 'lol', '$2y$10$eqMuGvkwHYj58LVhVkK4dOb9/rC8DcvTX/BOlBtb.W/o0wEe3fDXy'),
(2, 'admin admin', 'moelester62@yahoo.com', 'admin', '$2y$10$8REaP4dNyXuUPJPmC6JUSeLT7ZYlG5KK1pLKfZ6e1ALRjv0g6vxya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin1`
--
ALTER TABLE `tbl_admin1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category1`
--
ALTER TABLE `tbl_category1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food1`
--
ALTER TABLE `tbl_food1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin1`
--
ALTER TABLE `tbl_admin1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category1`
--
ALTER TABLE `tbl_category1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_food1`
--
ALTER TABLE `tbl_food1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order1`
--
ALTER TABLE `tbl_order1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

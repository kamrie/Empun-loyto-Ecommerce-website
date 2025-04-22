-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 11:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirabella_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@email.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 763.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-18 03:07:24'),
(2, 763.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije, Independence layout', '2025-02-18 03:52:20'),
(3, 3159.00, 'shipped', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-18 03:53:53'),
(4, 3159.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-18 03:56:34'),
(5, 638.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-18 12:06:14'),
(6, 793.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-18 12:14:37'),
(7, 620.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-19 03:07:20'),
(8, 620.00, 'delivered', 1, 2147483647, 'fini', 'Unije 56', '2025-02-19 03:10:51'),
(9, 164.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-26 21:36:17'),
(10, 164.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-26 21:58:35'),
(11, 328.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-26 21:59:59'),
(12, 328.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-26 22:11:53'),
(13, 328.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-26 22:12:16'),
(14, 492.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-27 08:19:04'),
(15, 492.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-27 08:19:29'),
(16, 299.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije, Independence layout', '2025-02-27 09:55:18'),
(17, 328.00, 'not paid', 1, 2147483647, 'Newyork', 'Unije 56', '2025-02-28 22:46:24'),
(18, 599.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije 56', '2025-02-28 22:57:00'),
(19, 2128.00, 'not paid', 1, 2147483647, 'Enugu', 'Unije, Independence layout', '2025-03-12 16:51:19'),
(20, 2128.00, 'not paid', 2, 401234567, 'Espoo', 'Mannerheimintie 10', '2025-03-13 09:54:58'),
(21, 90.00, 'not paid', 2, 401234567, 'Espoo', 'Mannerheimintie 10', '2025-03-22 12:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,0) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 4, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 1, 1, '2025-02-18 03:56:34'),
(2, 4, '3', 'Butterfly Pendant Necklace', 'necklace 1.webp', 299, 10, 1, '2025-02-18 03:56:34'),
(3, 5, '1', 'Crystal Beaded Bracelet', 'featured 1.webp', 155, 2, 1, '2025-02-18 12:06:14'),
(4, 5, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 2, 1, '2025-02-18 12:06:14'),
(5, 6, '1', 'Crystal Beaded Bracelet', 'featured 1.webp', 155, 3, 1, '2025-02-18 12:14:37'),
(6, 6, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 2, 1, '2025-02-18 12:14:37'),
(7, 7, '1', 'Crystal Beaded Bracelet', 'featured 1.webp', 155, 4, 1, '2025-02-19 03:07:20'),
(8, 8, '1', 'Crystal Beaded Bracelet', 'featured 1.webp', 155, 4, 1, '2025-02-19 03:10:51'),
(9, 9, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 1, 1, '2025-02-26 21:36:17'),
(10, 10, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 1, 1, '2025-02-26 21:58:35'),
(11, 11, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 2, 1, '2025-02-26 21:59:59'),
(12, 12, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 2, 1, '2025-02-26 22:11:53'),
(13, 13, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 2, 1, '2025-02-26 22:12:16'),
(14, 14, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 3, 1, '2025-02-27 08:19:04'),
(15, 15, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 3, 1, '2025-02-27 08:19:29'),
(16, 16, '3', 'Butterfly Pendant Necklace', 'necklace 1.webp', 299, 1, 1, '2025-02-27 09:55:18'),
(17, 17, '2', 'Gold-Plated Earrings', 'earring 1.webp', 164, 2, 1, '2025-02-28 22:46:24'),
(18, 18, '3', 'Butterfly Pendant Necklace', 'necklace 1.webp', 299, 2, 1, '2025-02-28 22:57:00'),
(19, 19, '4', 'Heart Shape Stainless Steel Bangle', 'bangle 1.webp', 709, 3, 1, '2025-03-12 16:51:19'),
(20, 20, '4', 'Heart Shape Stainless Steel Bangle', 'bangle 1.webp', 709, 3, 2, '2025-03-13 09:54:58'),
(21, 21, '24', 'Chain', 'featured 5.webp ', 30, 1, 2, '2025-03-22 12:48:21'),
(22, 21, '23', 'Earring', 'earring 1.webp ', 30, 2, 2, '2025-03-22 12:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_image5` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_image5`, `product_price`, `product_special_offer`, `product_color`) VALUES
(3, 'tie Pendant Necklace', 'necklaces', 'Delicate butterfly pendant necklace with a gold chain.', 'necklace 1.webp', 'necklace 1.webp', 'necklace 1.webp', 'necklace 1.webp', 'necklace 1.webp', 679.50, 1, 'gold'),
(4, 'Heart Shape Stainless Steel Bangle', 'bangles', ' heart shape bangle made from stainless steel.', 'bangle 1.webp', 'bangle 1.webp', 'bangle 1.webp', 'bangle 1.webp', 'bangle 1.webp', 709.43, 0, 'red'),
(5, 'love Crystal Ring', 'rings', 'Beautiful crystal-embedded ring for special occasions.', '1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '3.jpeg', 35.00, 0, 'red'),
(8, 'Bangles', 'bangles', 'Red bangles', 'Bangles1.jpeg', 'Bangles2.jpeg', 'Bangles3.jpeg', 'Bangles4.jpeg', 'Bangles3.jpeg', 10.00, 0, 'gold'),
(23, 'Earring', 'earrings', 'Iron steel earrings made ', 'earring 1.webp ', 'earring 2.webp ', 'earring 3.webp ', 'earring 4.webp ', 'earring 2.webp ', 30.00, 0, 'gold'),
(24, 'Chain', 'chains', 'Steel chains made to your desired fit', 'featured 5.webp ', 'featured 5.webp ', 'featured 5.webp ', 'featured 5.webp ', 'featured 5.webp ', 30.00, 0, 'gold'),
(25, 'Bracelet', 'bracelets', 'Light weighted golden yellow bracelet', 'featured 3.webp', 'featured 3.webp', 'featured 3.webp', 'featured 3.webp', 'featured 3.webp', 15.00, 0, 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Chibuzor Ezeokoli', 'deze@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 'Matti Virtanen', 'matti.virtanen@gmail.com', '2ae5648857acd44ed27a26da8db59243');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

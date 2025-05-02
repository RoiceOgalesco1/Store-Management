-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 07:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `cname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cname`) VALUES
(12, 'Bedsheet'),
(9, 'Demo Unit'),
(3, 'Finished Goods'),
(5, 'Machinery'),
(14, 'OIKOS'),
(4, 'Packing Materials'),
(2, 'Raw Materials'),
(8, 'Stationery Items'),
(6, 'Work in Progress');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) UNSIGNED NOT NULL,
  `bname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `bname`) VALUES
(1, 'Rimadesio Inc'),
(2, 'Bespoke Inc.'),
(3, 'SuperSalone'),
(4, 'Frette'),
(5, 'Chi Cha');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(1, 'viber_image_2024-07-11_12-52-54-724.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `onumber` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `brand` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `shipnumber` int(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `dreceived` date NOT NULL DEFAULT current_timestamp(),
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT 0,
  `date` datetime NOT NULL,
  `ar_id` int(11) NOT NULL,
  `ar_date` datetime NOT NULL DEFAULT current_timestamp(),
  `branch_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `onumber`, `quantity`, `brand`, `location`, `shipnumber`, `colour`, `dreceived`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`, `ar_id`, `ar_date`, `branch_id`) VALUES
(7, 'Life Breakfast Cereal-3 Pk', '0', '82', '', '', 0, '', '2024-11-07', '3.00', '7.00', 3, 0, '2021-04-04 19:15:38', 0, '2025-01-21 10:27:23', NULL),
(8, 'Chicken of the Sea Sardines W', '0', '10', '', '', 0, '', '2024-11-07', '13.00', '20.00', 3, 0, '2021-04-04 19:17:11', 1, '2025-01-21 10:27:23', NULL),
(12, 'Classic Desktop Tape Dispenser 38', '0', '130', '', '', 0, '', '2024-11-07', '5.00', '10.00', 8, 0, '2021-04-04 19:48:01', 1, '2025-01-21 10:27:23', NULL),
(13, 'Small Bubble Cushioning Wrap', '0', '199', '', '', 0, '', '2024-11-07', '8.00', '19.00', 4, 0, '2021-04-04 19:49:00', 1, '2025-01-21 10:27:23', NULL),
(49, 'Demo product 1', '2172025', '-29', 'Cloth', 'Podium', 2172025, 'Blue', '2025-02-17', '1000.00', '2000.00', 9, 1, '2025-02-17 10:20:16', 0, '2025-02-17 17:20:16', 4),
(65, 'test2', '31320251', '3', 'test2', 'frette', 3132025, 'Blue', '2025-03-13', '1.00', '1.00', 6, 1, '2025-03-13 08:44:21', 0, '2025-03-13 15:44:21', 4),
(66, 'test2', '31320251', '18', 'test2', 'chicha', 313202503, 'Blue', '2025-03-14', '1.00', '1.00', 6, 1, '2025-03-14 07:13:07', 0, '2025-03-14 14:13:07', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL,
  `coms_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`, `coms_id`) VALUES
(5, 12, 15, '150.00', '2021-04-04', 0),
(6, 13, 21, '399.00', '2021-04-04', 0),
(7, 7, 25, '175.00', '2021-04-04', 0),
(10, 8, 10, '200.00', '2025-02-20', 0),
(11, 8, 10, '200.00', '2025-02-20', 0),
(12, 8, 20, '400.00', '2025-02-20', 0),
(13, 49, 15, '30000.00', '2025-02-20', 4),
(14, 8, 50, '1000.00', '2025-02-20', 0),
(15, 8, 10, '200.00', '2025-02-20', 0),
(22, 12, 10, '100.00', '2025-03-10', 0),
(23, 12, 5, '50.00', '2025-03-10', 0),
(27, 65, 1, '1.00', '2025-03-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_exchange`
--

CREATE TABLE `stock_exchange` (
  `id` int(11) NOT NULL,
  `products_id` int(11) UNSIGNED NOT NULL,
  `qty` decimal(25,2) NOT NULL,
  `price` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `product_transfer` varchar(255) NOT NULL,
  `transfer_branch` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_exchange`
--

INSERT INTO `stock_exchange` (`id`, `products_id`, `qty`, `price`, `date`, `product_transfer`, `transfer_branch`, `status`) VALUES
(9, 65, '2.00', 2, 2025, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'AdminIT', 'AdminIT', '5ad73bae8c7dd7907c69381b0156315c56103c35', 1, 'hyhf8rui1.jpg', 1, '2025-03-17 03:34:27'),
(2, 'John Walker', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.png', 1, '2024-11-08 06:16:27'),
(3, 'Christopher', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.png', 1, '2024-11-08 06:17:01'),
(4, 'Natie Williams', 'natie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'no_image.png', 1, NULL),
(5, 'Kevin', 'kevin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'no_image.png', 1, '2021-04-04 19:54:29'),
(6, 'Sample Employee', 'SEmployee@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 3, 'no_image.jpg', 1, '2025-02-03 02:38:00'),
(7, 'Supervisor', 'Supervisor@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 2, 'no_image.jpg', 1, '2025-02-03 02:39:40'),
(8, 'John Dela Cruz Jr.', 'JDelacruz', '7c222fb2927d828af22f592134e8932480637c0d', 2, 'r1gecge78.png', 1, '2025-02-26 10:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'special', 2, 1),
(3, 'User', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`cname`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `FK_products1` (`branch_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `stock_exchange`
--
ALTER TABLE `stock_exchange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SEK` (`products_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stock_exchange`
--
ALTER TABLE `stock_exchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_products1` FOREIGN KEY (`branch_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_exchange`
--
ALTER TABLE `stock_exchange`
  ADD CONSTRAINT `SEK` FOREIGN KEY (`products_id`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2021 at 07:24 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`) VALUES
(1, 'Electronics', 'electronics'),
(2, 'Handphones', 'handphones'),
(3, 'Computers', 'computers'),
(4, 'Men Fashion', 'men-fashion'),
(5, 'Women Fashion', 'women-fashion'),
(6, 'Shoes', 'shoes'),
(7, 'Furniture', 'furniture');

-- --------------------------------------------------------

--
-- Table structure for table `checkoutdetails`
--

CREATE TABLE `checkoutdetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `checkout_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `total_order` int(11) UNSIGNED NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `deadline_payment` datetime DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `order_completed` datetime DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(67, '2021-09-24-094033', 'App\\Database\\Migrations\\Users', 'default', 'App', 1634964861, 1),
(68, '2021-09-25-085416', 'App\\Database\\Migrations\\Product', 'default', 'App', 1634964861, 1),
(69, '2021-09-30-151233', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1634964862, 1),
(70, '2021-09-30-151249', 'App\\Database\\Migrations\\Carts', 'default', 'App', 1634964862, 1),
(71, '2021-09-30-151309', 'App\\Database\\Migrations\\Favorites', 'default', 'App', 1634964862, 1),
(72, '2021-09-30-151356', 'App\\Database\\Migrations\\Reviews', 'default', 'App', 1634964863, 1),
(73, '2021-10-23-035407', 'App\\Database\\Migrations\\CheckoutDetail', 'default', 'App', 1634964863, 1),
(74, '2021-10-23-035412', 'App\\Database\\Migrations\\Checkout', 'default', 'App', 1634964863, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `product_image` varchar(255) DEFAULT 'default_product.png',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `user_id`, `category_id`, `description`, `price`, `product_image`, `created_at`, `updated_at`) VALUES
(18, 'Earphone', 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?', 30000, 'default_product.png', NULL, NULL),
(19, 'Laptop', 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?', 50000, 'default_product.png', NULL, NULL),
(20, 'Sneakers', 2, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?', 50000, 'default_product.png', NULL, NULL),
(21, 'T-Shirt', 1, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?', 50000, 'default_product.png', NULL, NULL),
(22, 'Dress', 2, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?', 50000, 'default_product.png', NULL, NULL),
(23, 'Iphone', 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?', 50000, 'default_product.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_num` int(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT 'default_user.png',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkoutdetails`
--
ALTER TABLE `checkoutdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkout_id` (`checkout_id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkoutdetails`
--
ALTER TABLE `checkoutdetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkoutdetails`
--
ALTER TABLE `checkoutdetails`
  ADD CONSTRAINT `checkoutdetails_ibfk_1` FOREIGN KEY (`checkout_id`) REFERENCES `checkouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

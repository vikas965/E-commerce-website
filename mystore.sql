-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 01:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_ipaddress` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_mobile` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_ipaddress`, `admin_address`, `admin_mobile`) VALUES
(1, 'vikas', 'vikas@gmail.com', 'bebe68374a49cb41b7c9219e97250044', 'IMG_20220113_123336.jpg', '::1', 'kateera street,srikakulam', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Gucci'),
(3, 'swiggy'),
(4, 'zomato'),
(6, 'skybags'),
(8, 'hp'),
(9, 'redmi');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'fruits'),
(2, 'vegetables'),
(3, 'games '),
(5, 'book'),
(6, 'shoes'),
(7, 'bags'),
(10, 'mobiles');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 2031924472, 3, 1, 'pending'),
(2, 1, 1649010393, 3, 1, 'pending'),
(3, 1, 2141318583, 3, 1, 'pending'),
(4, 1, 392194659, 3, 1, 'pending'),
(5, 1, 49997658, 3, 1, 'pending'),
(6, 2, 1461864484, 3, 1, 'pending'),
(7, 2, 1814819001, 2, 1, 'pending'),
(8, 2, 131259481, 3, 1, 'pending'),
(9, 2, 1161999539, 1, 1, 'pending'),
(10, 2, 999781616, 3, 1, 'pending'),
(11, 2, 94575465, 2, 1, 'pending'),
(12, 2, 1075770339, 3, 1, 'pending'),
(13, 2, 306072628, 3, 1, 'pending'),
(14, 2, 50846580, 4, 1, 'pending'),
(15, 2, 463234756, 3, 1, 'pending'),
(16, 2, 1858385515, 4, 1, 'pending'),
(17, 2, 1517696998, 5, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product-id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `product_keyword` varchar(250) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(250) NOT NULL,
  `product_image2` varchar(250) NOT NULL,
  `product_image3` varchar(250) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product-id`, `product_title`, `product_description`, `product_keyword`, `cat_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Mangoes', 'mangoes are tasty. mangoes are with good quality.', 'greenmangoes,zomato,swiggy,tasty,new,summer,swiggy', 1, 3, 'mango2.jpg', ' mango3.jpg', ' mango5.avif', '     599', '2023-04-12 08:26:26', 'true'),
(3, 'Bags', 'Make your style statement with bag as a part of your outfit. ', 'menbags,womenbags,stylishbags,schoolbags,collgebags', 7, 6, 'bag2.avif', ' bag1.jpg', ' bag3.avif', ' 1999', '2023-04-11 14:24:50', 'true'),
(4, 'shoes', 'Shop from the latest collection of shoes available in various brands', 'shoes,men shoes,stylish shoes, college shoes', 6, 1, 'shoe1.avif', 'shoe3.avif', 'shoe2.avif', '2999', '2023-04-11 15:19:42', 'true'),
(5, 'Redmi', 'Xiaomi India official store helps you to discover Mi and Redmi mobiles, accessories, ecosystem products', 'mobile,smartphone,redmi,mi', 10, 9, 'mi2.avif', 'mi3.avif', 'mi1.avif', '15999', '2023-04-14 10:56:16', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ipaddress` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ipaddress`, `user_address`, `user_mobile`) VALUES
(2, 'vikas', 'mahanthivikas965@gmail.com', 'bebe68374a49cb41b7c9219e97250044', 'vikas.jpg', '::1', 'kateera street,srikakulam', '9652021978');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `due_amount` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `due_amount`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 4598, 2031924472, 2, '2023-04-09 15:35:06', 'complete'),
(2, 1, 4598, 1649010393, 2, '2023-04-09 06:28:50', 'pending'),
(3, 1, 4598, 2141318583, 2, '2023-04-09 06:30:01', 'pending'),
(4, 1, 2999, 392194659, 1, '2023-04-09 15:26:04', 'complete'),
(5, 1, 3599, 49997658, 2, '2023-04-09 12:29:42', 'pending'),
(6, 2, 4598, 1461864484, 2, '2023-04-09 16:09:56', 'complete'),
(7, 2, 2199, 1814819001, 2, '2023-04-10 11:09:18', 'complete'),
(8, 2, 3599, 131259481, 2, '2023-04-10 11:09:49', 'complete'),
(9, 2, 600, 1161999539, 1, '2023-04-10 14:56:15', 'complete'),
(10, 2, 2999, 999781616, 1, '2023-04-10 15:01:54', 'complete'),
(11, 2, 1599, 94575465, 1, '2023-04-10 15:08:05', 'complete'),
(12, 2, 3599, 1075770339, 2, '2023-04-11 09:54:56', 'complete'),
(13, 2, 5198, 306072628, 3, '2023-04-11 11:16:41', 'complete'),
(14, 2, 3598, 50846580, 2, '2023-04-12 09:10:42', 'complete'),
(15, 2, 1999, 463234756, 1, '2023-04-12 10:30:59', 'complete'),
(16, 2, 4998, 1858385515, 2, '2023-04-14 10:48:01', 'complete'),
(17, 2, 15999, 1517696998, 1, '2023-04-14 11:03:11', 'pending'),
(18, 2, 0, 1208095733, 0, '2023-04-14 11:03:34', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 4, 392194659, 2999, '', '2023-04-09 15:23:53'),
(2, 4, 392194659, 2999, '', '2023-04-09 15:26:04'),
(3, 1, 2031924472, 4598, '', '2023-04-09 15:35:06'),
(4, 6, 1461864484, 4598, '', '2023-04-09 16:09:56'),
(5, 7, 1814819001, 2199, '', '2023-04-10 11:09:18'),
(6, 8, 131259481, 3599, '', '2023-04-10 11:09:49'),
(7, 9, 1161999539, 600, '', '2023-04-10 14:56:15'),
(14, 10, 999781616, 2999, '', '2023-04-10 15:01:54'),
(15, 11, 94575465, 1599, 'Debit Card', '2023-04-10 15:08:05'),
(16, 11, 94575465, 1599, 'Cash on delivery', '2023-04-10 15:08:48'),
(17, 12, 1075770339, 3599, 'Credit Card', '2023-04-11 09:54:56'),
(18, 13, 306072628, 5198, 'UPI', '2023-04-11 11:16:41'),
(19, 14, 50846580, 3598, 'Select Payment Mode', '2023-04-12 09:10:42'),
(20, 15, 463234756, 1999, 'Cash on delivery', '2023-04-12 10:30:59'),
(21, 16, 1858385515, 4998, 'Select Payment Mode', '2023-04-14 10:48:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product-id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

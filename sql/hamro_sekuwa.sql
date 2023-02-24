-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 04:45 PM
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
-- Database: `hamro_sekuwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image_name`, `featured`, `status`) VALUES
(10, 'PIZZa', 'Category_5430.jpg', 'No', 'Yes'),
(19, 'Burger', 'Category_9701.jpg', 'Yes', 'Yes'),
(20, 'MOMO', 'Category_1413.jpg', 'Yes', 'Yes'),
(28, 'Chicken ', 'Category_2255.jpg', 'No', 'Yes'),
(29, 'Sausage', 'Category_2749.jpg', 'No', 'Yes'),
(30, 'Ice cream', 'Category_8162.jpg', 'No', 'Yes'),
(31, 'Fish', 'Category_6227.jpg', 'No', 'Yes'),
(32, 'Sandwich', 'Category_3552.jpg', 'No', 'Yes'),
(33, 'Steak', 'Category_8907.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_contact` varchar(15) NOT NULL,
  `customer_feedback` text NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `price`, `quantity`, `total`, `customer_name`, `customer_address`, `customer_email`, `customer_contact`, `customer_feedback`, `order_date`, `product`) VALUES
(8, 7, '150.00', 474, '71100.00', 'Mara Brown', 'Nihil saepe voluptat', 'zebexaq@mailinator.com', '9887736664', 'Nihil facilis repreh', '2022-11-21 09:07:37', 'chicken pizza'),
(22, 8, '120.00', 2, '240.00', 'name', 'address', 'sallukhw@gmail.com', '9841558311', '', '2023-02-04 14:53:57', 'chicken '),
(23, 7, '150.00', 4, '600.00', 'prashant kasula', 'Bhaktapur', 'prashantkasula22@gmail.com', '9805321013', 'hffcg', '2023-02-06 15:00:38', 'chicken pizza'),
(24, 8, '120.00', 1, '120.00', 'handman', 'Gothatar', 'drake1@gmail.com', '9000000000', 'Good', '2023-02-24 16:03:15', 'pizza');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `category_id`, `featured`, `status`, `image_name`) VALUES
(18, 'Ice cream', '150.00', 'Freezy Cold', 30, 'Yes', 'Yes', 'Product_5712.jpg'),
(19, 'Burger', '200.00', 'made with 100% pure beef patty, topped with melted cheddar cheese. ', 19, 'Yes', 'Yes', 'Product_7639.jpg'),
(20, 'Chicken Drumstick', '180.00', 'Drooly Drumstick !', 28, 'Yes', 'Yes', 'Product_9071.jpg'),
(21, 'Grilled Fish', '200.00', 'Super Grilled', 31, 'Yes', 'Yes', 'product_1646.jpg'),
(22, 'Sausage', '160.00', '', 0, 'Yes', 'Yes', 'product_4759.jpg'),
(23, 'Pizza', '200.00', 'Crispy Pizza', 10, 'Yes', 'Yes', 'Product_5019.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `password`) VALUES
(35, 'sam', 'sam', '332532dcfaa1cbf61e2a266bd723612c'),
(37, 'Prashant Kasula', 'prashant', '1d97f8ce34a1e53a4c96dea0a2527ac8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

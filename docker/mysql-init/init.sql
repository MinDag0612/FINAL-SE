-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 06:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_se_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `name` varchar(50) NOT NULL,
  `id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`name`, `id`, `password`) VALUES
('User 1', 'U1', '$2y$10$w1duWRA5IW9qyi7B57lkXORwB3E28y.AEVm.tISqjSpMXDGW2yULi'),
('User 2', 'U2', '$2y$10$5kszB0YuXqCjoURGpcUDouR4IjmLXZYuVT.0WPTcvmA8U5jEMG7UG');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `items` text DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `items`, `total_price`, `status`, `created_at`) VALUES
(13, 'guest', 'Matcha Milk Tea x 3', 126000.00, 'Pending', '2025-05-14 20:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `style` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`style`, `name`, `price`, `img`) VALUES
('Topping', 'Black Pearl', 5, 'topping_black_pearl.jpg'),
('Topping', 'Fruit Jelly', 6, 'topping_fruit_jelly.jpg'),
('Topping', 'Egg Pudding', 7, 'topping_egg_pudding.jpg'),
('Topping', 'White Pearl', 6, 'topping_white_pearl.jpg'),
('Topping', 'Cheese Foam', 8, 'topping_cheese_foam.jpg'),
('Dessert', 'Flan Cake', 15, 'dessert_flan.jpg'),
('Dessert', 'Thai Sweet Soup', 18, 'dessert_che_thai.jpg'),
('Dessert', 'Panna Cotta', 20, 'dessert_panna_cotta.jpg'),
('Dessert', 'Mochi', 12, 'dessert_mochi.jpg'),
('Dessert', 'Tiramisu', 22, 'dessert_tiramisu.jpg'),
('Ice-blended', 'Chocolate Ice Blend', 35, 'ice_choco_blend.jpg'),
('Ice-blended', 'Matcha Ice Blend', 38, 'ice_matcha_blend.jpg'),
('Ice-blended', 'Blueberry Ice Blend', 37, 'ice_blueberry_blend.jpg'),
('Ice-blended', 'Strawberry Ice Blend', 36, 'ice_strawberry_blend.jpg'),
('Ice-blended', 'Caramel Ice Blend', 39, 'ice_caramel_blend.jpg'),
('Coffee', 'Espresso', 25, 'coffee_espresso.jpg'),
('Coffee', 'Vietnamese Milk Coffee', 28, 'coffee_suada.jpg'),
('Coffee', 'Americano', 27, 'coffee_americano.jpg'),
('Coffee', 'Cappuccino', 32, 'coffee_cappuccino.jpg'),
('Coffee', 'Latte', 33, 'coffee_latte.jpg'),
('Fruit tea', 'Peach Lemongrass Tea', 30, 'fruittea_peach_lemon.jpg'),
('Fruit tea', 'Lychee Tea', 29, 'fruittea_lychee.jpg'),
('Fruit tea', 'Pink Guava Tea', 31, 'fruittea_guava.jpg'),
('Fruit tea', 'Watermelon Tea', 30, 'fruittea_watermelon.jpg'),
('Fruit tea', 'Honey Lemon Tea', 28, 'fruittea_lemon_honey.jpg'),
('Milk tea', 'Pearl Milk Tea', 32, 'milktea_pearl.jpg'),
('Milk tea', 'Matcha Milk Tea', 34, 'milktea_matcha.jpg'),
('Milk tea', 'Thai Green Milk Tea', 31, 'milktea_thai_green.jpg'),
('Milk tea', 'Hokkaido Milk Tea', 35, 'milktea_hokkaido.jpg'),
('Milk tea', 'Caramel Milk Tea', 36, 'milktea_caramel.jpg'),
('milk-tea', 'Classic Milk Tea', 35000, 'classic-milk-tea.jpg'),
('milk-tea', 'Thai Milk Tea', 40000, 'thai-milk-tea.jpg'),
('milk-tea', 'Matcha Milk Tea', 42000, 'matcha-milk-tea.jpg'),
('milk-tea', 'Hokkaido Milk Tea', 45000, 'hokkaido-milk-tea.jpg'),
('milk-tea', 'Brown Sugar Milk Tea', 45000, 'brown-sugar.jpg'),
('milk-tea', 'Taro Milk Tea', 38000, 'taro-milk-tea.jpg'),
('fruit-tea', 'Peach Fruit Tea', 35000, 'peach-fruit-tea.jpg'),
('fruit-tea', 'Passion Fruit Tea', 35000, 'passion-fruit.jpg'),
('fruit-tea', 'Lychee Tea', 34000, 'lychee-tea.jpg'),
('fruit-tea', 'Apple Fruit Tea', 36000, 'apple-tea.jpg'),
('fruit-tea', 'Mango Fruit Tea', 37000, 'mango-fruit-tea.jpg'),
('fruit-tea', 'Strawberry Fruit Tea', 38000, 'strawberry-fruit-tea.jpg'),
('coffee', 'Americano', 30000, 'americano.jpg'),
('coffee', 'Latte', 35000, 'latte.jpg'),
('coffee', 'Cappuccino', 36000, 'cappuccino.jpg'),
('coffee', 'Mocha', 37000, 'mocha.jpg'),
('coffee', 'Vietnamese Iced Coffee', 25000, 'vietnamese-coffee.jpg'),
('coffee', 'Espresso', 32000, 'espresso.jpg'),
('ice-blended', 'Chocolate Ice Blended', 45000, 'chocolate-blended.jpg'),
('ice-blended', 'Mocha Ice Blended', 47000, 'mocha-blended.jpg'),
('ice-blended', 'Matcha Ice Blended', 46000, 'matcha-blended.jpg'),
('ice-blended', 'Caramel Ice Blended', 48000, 'caramel-blended.jpg'),
('ice-blended', 'Cookie Ice Blended', 49000, 'cookie-blended.jpg'),
('ice-blended', 'Taro Ice Blended', 44000, 'taro-blended.jpg'),
('dessert', 'Pudding', 25000, 'pudding.jpg'),
('dessert', 'Cheesecake', 35000, 'cheesecake.jpg'),
('dessert', 'Chocolate Cake', 34000, 'chocolate-cake.jpg'),
('dessert', 'Crepe Cake', 36000, 'crepe-cake.jpg'),
('dessert', 'Fruit Parfait', 38000, 'fruit-parfait.jpg'),
('dessert', 'Macaron', 20000, 'macaron.jpg'),
('topping', 'Pearl', 5000, 'pearl.jpg'),
('topping', 'Grass Jelly', 5000, 'grass-jelly.jpg'),
('topping', 'Pudding', 6000, 'pudding-topping.jpg'),
('topping', 'Aloe Vera', 5000, 'aloe-vera.jpg'),
('topping', 'Red Bean', 5000, 'red-bean.jpg'),
('topping', 'Cheese Foam', 7000, 'cheese-foam.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

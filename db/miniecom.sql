-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 10:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `regularPrice` int(5) NOT NULL,
  `sellingPrice` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `brandName` varchar(200) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` varchar(30) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(30) DEFAULT NULL,
  `trash` varchar(30) NOT NULL DEFAULT 'false',
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `regularPrice`, `sellingPrice`, `category`, `brandName`, `tag`, `description`, `status`, `created_at`, `updated_at`, `trash`, `photo`) VALUES
(15, 'High Quality Cotton Lungi', 1200, 890, 'Mans', 'Deshi Lungi', 'Dresses', 'Brand :- Deshi Lungi.Size :- 6 hand.100% moisturized, 100% color guarantee, 100% cotton, colorful, processed, advanced quality yarn, more durable, extremely comfortable to wear, long lasting continuous wear.', 'active', '2021-04-06 14:01:10', '2021-04-06 10:13:10', 'false', '8694df0018e86c75569a2f9ac0247f8a.jpg'),
(16, 'Unstitched Embroidered Tissue Party Dress For Women', 2800, 2600, 'Womens', 'RH Distribution', 'Dresses', 'Unstitched Embroidered Tissue Party Dress for Women', 'active', '2021-04-06 14:10:14', '2021-04-06 10:20:10', 'false', 'd66abb7df3bba85ee9ae624b4923f379.jpg'),
(17, '64 GB Pendrive ', 1200, 890, 'Electronics', 'HP', 'Gadgets', 'Dual Plug- 32 GB Pendrive USB OTG Metal USB Flash Drive', 'active', '2021-04-06 14:25:13', '2021-04-06 10:25:10', 'false', '3abd64d0c856c44c5266e25452189a22.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

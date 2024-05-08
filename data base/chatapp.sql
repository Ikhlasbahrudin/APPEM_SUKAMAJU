-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 06:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `iv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `iv`) VALUES
(45, 828399840, 1289969755, 'tFCus7bt1HhriCLHtjQ4', '71851a8e5a3facc6bd7263482962bb8f'),
(46, 1289969755, 828399840, 'wYuDgcKTL+K/H6Isu1cp', '6b030498cfd6ae914ee521a1cb796585'),
(47, 828399840, 1289969755, 'hCJ3h7yaWMqH+3rnOHr5', 'f7def5b52e9904c62ed07a45f0f3353e'),
(48, 1289969755, 828399840, 'MELECTgXlTMC9n1BUxl4', 'e6e938303af7b4999de99ef8987be6db'),
(49, 828399840, 1289969755, 'IA5a', 'b3315df4d45aae381abb357ce9cf904f'),
(50, 828399840, 1289969755, '2pEmmZMo', '04c5d7b7984addbc4da18fbee7f5211b'),
(51, 1289969755, 828399840, 'LDOx3qdm', 'd6f4d9381eef9279c4fc8f68a2b127a1'),
(52, 195696361, 1289969755, 'Rw==', '3f7fff7ec3b1fcc84a5eeca0cfaf5fa5'),
(53, 195696361, 1289969755, 'ageyVg==', '08307f0da202a5c7bdb51f623c07b8bd'),
(54, 1289969755, 828399840, 'MLY3', '425da245ab01454c961d62585cc0fa23'),
(55, 195696361, 1289969755, '2w==', '2e4467009810a31b2e3e0ddb80e4a3aa'),
(56, 1289969755, 828399840, 'jQ==', '4ea323d069f229445ab5770817e37e8e'),
(57, 195696361, 1289969755, 'LA==', '86828436ef35a27967f05af5fa68bed0'),
(58, 195696361, 1289969755, 'udLyjg==', '540c3def9b88b62b0c2336283085aba4'),
(59, 828399840, 1289969755, 'a38QdfD331sTQZ0=', 'aa1321b12c1fa8b7dde0279b8627f6c3'),
(60, 1289969755, 828399840, 'vCjj', '689b47e4e6e5fc45e3bf9edc874fafe0'),
(61, 828399840, 1289969755, 'MtaYHAzh', '00a7421f228cb63dad63cd246c617d87'),
(62, 1289969755, 828399840, 'ApcI72mqdPI=', '0732290d9f00227ae7973cd6c4c50a27'),
(63, 1289969755, 828399840, 'Qn++ygDz', 'd0b5fc2db0a6fcdb046e24b758bfe191'),
(64, 1289969755, 828399840, '3rj5c5Ko+8Vjh9Kb3kiyNjU=', '1d9e3641993eb4047f10f60d0d029fc8'),
(65, 828399840, 1289969755, 'cT/mmwJNbpj1rSUQL5M=', 'a936420a1b0a06b1b93b13afc0626471'),
(66, 1289969755, 828399840, '4tIg0/zOFeHvCod1zNhxwieRS9U9PxBx+RcoqOyxyQqCfUB0de8l/uLZL4CM+35Y8y+gWv7wXtjaOsn7i2OVUHQW0OmCq1RyGAP5JB7TvudxJw==', '829e56aaab1b317f2e58c084e1e7e9d4'),
(67, 195696361, 828399840, 'fg==', 'f04df03fb153f8266e70cb52f0ebbc8f'),
(68, 828399840, 1289969755, 'EQ==', 'eacf415c43a80700dfc469019abe40ba');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `theme`) VALUES
(6, 828399840, 'sanjaya', 'obet', 'sanjaya@gmail.con', '202cb962ac59075b964b07152d234b70', '1711734867317389817_3312854845691296_5240640062877847666_n.jpg', 'Offline', 'dark'),
(7, 195696361, 'yasir ', 'senja', 'yasir@gmail.com', '202cb962ac59075b964b07152d234b70', '1711734969272089085_3066347540342029_17132076547701413_n.jpg', 'Offline', ''),
(8, 1289969755, 'hary', 'c', 'hary@gmail.com', '202cb962ac59075b964b07152d234b70', '1712761234Jabir-bin-Hayyan-Foto-Anchor-P72d5bcd44e98b94d.md.jpg', 'Offline', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

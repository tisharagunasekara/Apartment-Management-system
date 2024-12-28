-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 12:28 PM
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
-- Database: `apartment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_nic` varchar(20) NOT NULL,
  `a_phone` varchar(20) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_image` varchar(255) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_nic`, `a_phone`, `a_email`, `a_image`, `a_username`, `a_password`) VALUES
(2, 'dulina', '200130300095', '0774749055', 'Dulina@2001', '66327b533a92e_Screenshot 2024-04-08 225603.png', 'dulina', '2001'),
(4, 'efnifr', '12456789', '0750273901', 'emp1@gmail.com', '66356b542b616_219969.png', 'uvindupramuditha', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`id`, `userid`, `name`, `address`, `city`, `price`, `available`, `image`, `description`) VALUES
(1, 0, 'Cozy Studio Apartment', '123 Main St', 'Anytown', 1000.00, 1, '', ''),
(2, 0, 'Modern Loft Downtown', '456 Elm St', 'Big City', 1500.00, 1, '', ''),
(3, 0, 'Spacious Family Home', '789 Oak St', 'Suburbia', 2000.00, 0, '', ''),
(4, 0, 'Charming Beachfront Condo', '321 Ocean Blvd', 'Seaside', 1800.00, 1, '', ''),
(6, 5, 'dhfuhfnfkbfk qnafdeonoir', 'no 42, hampton villege, gurullawala', 'galle', 235566.00, 1, 'apartment_image/66355d417df59_mantis-tillers-7940-64_1000.jpg', '30 Miles Solar Fence Charger, 0.53 Joule Solar Electric Fence Charger for Livestock, Horses, Cattle Sheep, Solar Electric Fence Energizer with Dual Input, Easy Installation'),
(7, 5, 'dhfuhfnfkbfk', 'no 42, hampton villege, gurullawala', 'galle', 235566.00, 1, 'apartment_image/663513e2bddb3_download.jpeg', '30 Miles Solar Fence Charger, 0.53 Joule Solar Electric Fence Charger for Livestock, Horses, Cattle Sheep, Solar Electric Fence Energizer with Dual Input, Easy Installation'),
(8, 5, 'dhfuhfnfkbfk', 'no 42, hampton villege, gurullawala', 'galle', 235566.00, 1, 'apartment_image/663513ef4697e_OIP.jpeg', '30 Miles Solar Fence Charger, 0.53 Joule Solar Electric Fence Charger for Livestock, Horses, Cattle Sheep, Solar Electric Fence Energizer with Dual Input, Easy Installation'),
(9, 5, 'Uvindu Pramuditha', 'no 42, hampton villege, gurullawala', 'galle', 6522.00, 1, 'apartment_image/66355f7c55c92_mantis-tillers-7940-64_1000.jpg', '30 Miles Solar Fence Charger, 0.53 Joule Solar Electric Fence Charger for Livestock, Horses, Cattle Sheep, Solar Electric Fence Energizer with Dual Input, Easy Installation'),
(13, 0, 'wbsiirghaui', 'no 42, hampton villege, gurullawala', 'galle', 56228.00, 1, 'apartment_image/66354cf991830_download.jpeg', '30 Miles Solar Fence Charger, 0.53 Joule Solar Electric Fence Charger for Livestock, Horses, Cattle Sheep, Solar Electric Fence Energizer with Dual Input, Easy Installation'),
(14, 5, 'wbsiirghaui', 'no 42, hampton villege, gurullawala', 'galle', 85996.00, 1, 'apartment_image/66355dbd7197f_download.jpeg', '30 Miles Solar Fence Charger, 0.53 Joule Solar Electric Fence Charger for Livestock, Horses, Cattle Sheep, Solar Electric Fence Energizer with Dual Input, Easy Installation');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `complaint` text NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `u_id`, `u_email`, `complaint`, `reply`) VALUES
(1, 5, 'wupu0327@gmail.com', 'gyhuifwe', 'fajenlj');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `user_name`, `user_image`, `email`, `comment`, `created_at`) VALUES
(2, 5, 'Uvindu Pramuditha', '66352f040bdce_219969.png', 'wupu0327@gmail.com', 'dausfjoi fnnornrdw afcuh', '2024-05-03 22:19:07'),
(3, 5, 'Uvindu Pramuditha', '66352f040bdce_219969.png', 'wupu0327@gmail.com', 'djanjkfnkja jafnajnoia', '2024-05-03 22:19:13'),
(4, 5, 'Uvindu Pramuditha', '66352f040bdce_219969.png', 'wupu0327@gmail.com', 'djanjkfnkja jafnajnoia', '2024-05-03 22:19:21'),
(5, 5, 'Uvindu Pramuditha', '66352f040bdce_219969.png', 'wupu0327@gmail.com', 'ajenfjkae', '2024-05-03 22:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('buyer','seller') NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nic`, `phone`, `address`, `dob`, `email`, `username`, `password`, `role`, `profile_image`, `created_at`) VALUES
(1, 'dulina hejitha', '200130300095', '0774749055', 'Berawaldeniyawaththa Thunthota', '2024-05-23', 'Dulina@2001', 'dulinasexy', '1234', 'seller', '12.png', '2024-05-03 07:39:23'),
(3, 'dulina hejitha', '123456789', '0774749', 'Berawaldeniyawaththa Thunthota', '2024-05-29', 'Dulina@2001', 'dulina', '2001lll', 'buyer', '6634a8ffec372_12.png', '2024-05-03 08:56:16'),
(4, 'kukka', '123456789V', '0774749055', 'Berawaldeniyawaththa Thunthota', '2024-05-21', 'kukka@gmail.com', 'kukka', '1234', 'seller', '6634e104eb446_13.png', '2024-05-03 13:04:09'),
(5, 'Uvindu Pramuditha', '12456789', '0750273901', 'no 42, hampton villege, gurullawala', '2024-05-24', 'wupu0327@gmail.com', 'uvindupramuditha', '123456', 'seller', '66352f040bdce_219969.png', '2024-05-03 16:16:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

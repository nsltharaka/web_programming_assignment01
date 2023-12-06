-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 09:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rental_id` varchar(40) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `pickup_location` varchar(50) DEFAULT NULL,
  `return_location` varchar(50) DEFAULT NULL,
  `total_bill` decimal(10,0) DEFAULT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `vehicle_number` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(40) NOT NULL DEFAULT uuid_short(),
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `nic`, `contact`, `password`) VALUES
('100610261257289731', 'Nisal', 'Tharaka', 'nisal@gmail.com', '199933606064', '0769130401', '$2y$10$M6diweq213ODjb6ZXnwMx.cmV13EANB3s');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_number` varchar(10) NOT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL,
  `seats` int(2) DEFAULT NULL,
  `transmission_type` varchar(20) DEFAULT NULL,
  `fuel_type` varchar(20) DEFAULT NULL,
  `daily_rate` decimal(10,0) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `owner` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_number`, `brand`, `model`, `seats`, `transmission_type`, `fuel_type`, `daily_rate`, `description`, `category`, `image_url`, `status`, `owner`) VALUES
('AAW-5945', 'TOYOTA', 'KDH', 12, 'manual', 'diesel', 40000, 'A/C, high roof.', 'van', '1701894088_3bcb7e9d0bd0fd8f6a30.jpg', 1, '100610261257289731'),
('ABC-0001', 'Audi', 'R8 Spider', 2, 'manual', 'petrol', 30000, 'an audi r8, green color, alloy wheel', 'car', '1701893221_eaa3e8d06f56d7f59fe2.jpg', 1, '100610261257289731'),
('DEF-2020', 'Honda', 'Dio', 2, 'auto', 'petrol', 10000, 'red dio, new tires, mint condition', 'motorbike', '1701893471_776fd5541d37d660a16b.png', 1, '100610261257289731'),
('DFG-9769', 'Tesla', 'model 3', 7, 'auto', 'electric', 60000, 'full charged, new batteries.', 'car', '1701893816_736dc673989a25ad828a.jpg', 1, '100610261257289731'),
('FGJ-7878', 'Land Rover', 'RangeRover', 8, 'manual', 'diesel', 50000, 'white range rover, mint condition', 'car', '1701893740_3f712312806cd87d3b96.jpg', 1, '100610261257289731'),
('GFT-4545', 'HINO', 'double decker', 70, 'manual', 'diesel', 60000, 'suitable for trips, air conditioned.', 'bus', '1701893990_328e87d97631ac06c2ca.jpg', 1, '100610261257289731');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

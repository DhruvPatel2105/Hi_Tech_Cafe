-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2023 at 03:46 AM
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
-- Database: `foodorder_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mobile` varchar(250) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Name`, `Email`, `Mobile`, `Subject`, `Message`) VALUES
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('BIRJU KUMAR', 'ckj40856@gmail.com', '8903079750', 'asd', 'asdasdasd'),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'asd', 'hfgdsfsx');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `U_ID` int(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token_hash` varchar(255) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`U_ID`, `fullname`, `email`, `contact`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'BIRJU KUMAR', 'bkm123r@gmail.com', '8903079750', 'Birju123@', NULL, NULL),
(2, 'CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'Ckumar123@', NULL, NULL),
(3, 'nidha', 'nidha@gmail.com', '998696572', 'suhail', NULL, NULL),
(4, 'Pratheek Shiri', 'pratheek@gmail.com', '8779546521', 'pratheek', NULL, NULL),
(5, 'Rakshith Kotian', 'rakshith@gmail.com', '9547123658', 'rakshith', NULL, NULL),
(81, 'Jasmin Patel', 'js@gmail.com', '6093102148', '$2y$10$AR6PmgUXGmka.V6NttdWY.hJlZQ7JXdiWZqaiLZxLuwlrQ5AyCJXu', NULL, NULL),
(82, 'Sani', 'sani@gmail.com', '', '$2y$10$fLcDFgZn4NB8.1gNpYGAnuY51dXROzueuxteXT79Au75VrHH0vAJe', '432523246504bffd11ade630e85ffaed12faf1b337e35ce93948db4ba2b4604a', '2023-08-02 21:14:10'),
(84, 'Dhruv Patel', 'dhruvpatel10890@gmail.com', '12269232105', '$2y$10$Y28bfscof3VRUbHxC/ArqOBfpllf7Nd9ReEzDNs38/mci2KES7NKa', '20b1408fa2343e53262ab113223fc0c8aba93f4cda14bbf33be97df4e757e2eb', '2023-08-02 23:25:40'),
(85, 'magan', 'magan@gmail.com', '13065022515', '$2y$10$SNihrwwm4WP0N80yRZQ8p.PooF6BfCo8Qkqj6.9MjTReBRx14KZPG', NULL, NULL),
(86, 'dikesh', 'dk@gmail.com', '12269232105', '$2y$10$aO25pXL4g3YfaLbzSmaGkOhFFqC6ndoEP1dsfRGesxOvO/vaBmKuu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `customize` varchar(255) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'ENABLE',
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `name`, `price`, `description`, `customize`, `R_ID`, `images_path`, `options`, `quantity`) VALUES
(58, 'Juicy Masala Paneer Kathi Roll', 40, 'Juicy Masala Paneer Kathi Roll loaded with Masala Paneer chunks, onion & Mayo.', 'cheese, spicy, salty', 1, 'Assets/images/Masala_Paneer_Kathi_Roll.jpg', 'ENABLE', 10),
(59, 'Meurig Fish', 60, 'Try Meurig - A whole Pomfret fish grilled with tangy marination & served with grilled onions and tomatoes.', 'cheese, spicy, salty', 2, 'Assets/images/Meurig.jpg', 'ENABLE', 0),
(60, 'Chocolate Hazelnut Truffle', 99, 'Lose all senses over this very delicious chocolate hazelnut truffle.', 'cheese, spicy, salty', 3, 'Assets/images/Chocolate_Hazelnut_Truffle.jpg', 'ENABLE', 5),
(61, 'Happy Happy Choco Chip Shake', 80, 'Happy Happy Choco Chip Shake - a perfect party sweet treat.', 'cheese, spicy, salty', 1, 'Assets/images/Happy_Happy_Choco_Chip_Shake.jpg', 'ENABLE', 8),
(62, 'Spring Rolls', 65, 'Delicious Spring Rolls by Dragon Hut, Delhi. Order now!!!', 'Long, spicy, Short', 2, 'Assets/images/Spring_Rolls.jpg', 'ENABLE', 1),
(63, 'Baahubali Thali', 75, 'Baahubali Thali is accompanied by Kattapa Biriyani, Devasena Paratha, Bhalladeva Patiala Lassi', 'cheese, spicy, salty', 3, 'Assets/images/Baahubali_Thali.jpg', 'ENABLE', 68),
(65, 'Coffee', 25, 'concentrated coffee made by forcing pressurized water through finely ground coffee beans.', 'Sugar, Cream, Milk', 4, 'Assets/images/coffee.jpg', 'DISABLE', 30),
(66, 'Tea', 20, 'The simple elixir of tea is of our natural world.', 'Sugar, Cream, Milk', 4, 'Assets/images/tea.jpg', 'DISABLE', 20),
(68, 'Paneer', 85, 'it', 'cheese, spicy, salty', 6, 'Assets/images/paneer pakora.jpg', 'DISABLE', 10),
(69, 'Coffee', 25, 'concentrated coffee made by forcing pressurized water through finely ground coffee beans.', 'cheese, spicy, salty', 2, 'Assets/images/coffee.jpg', 'ENABLE', 20),
(70, 'Tea', 20, 'The simple elixir of tea is of our natural world.', 'cheese, spicy, salty', 2, 'Assets/images/tea.jpg', 'ENABLE', 20),
(71, 'Samosa', 40, 'Cocktail Crispy Samosa..', 'cheese, spicy, salty', 2, 'Assets/images/samosa.jpg', 'ENABLE', 30),
(72, 'Paneer Pakora', 45, 'it gives whole new dimension even to the most boring or dull vegetable', 'cheese, spicy, salty', 2, 'Assets/images/paneer pakora.jpg', 'ENABLE', 20),
(73, 'Puff', 35, 'Vegetable Puff, a snack with crisp-n-flaky outer layer and mixed vegetables stuffing', 'cheese, spicy, salty', 2, 'Assets/images/puff.jpg', 'ENABLE', 27),
(74, 'Pizza', 200, 'Good and Tasty ', 'Large, medium, Short', 2, 'Assets/images/Pizza.jpg', 'DISABLE', 29),
(75, 'French Fries', 60, 'Pure Veg and Tasty.', 'cheese, spicy, salty', 2, 'Assets/images/frenchfries.jpg', 'DISABLE', 30),
(76, 'Pakora', 35, 'Pure Vegetable and Tasty.', 'cheese, spicy, salty', 2, 'Assets/images/Pakora.jpg', 'DISABLE', 10),
(77, 'Pizza', 200, 'Pure Vegetable and Tasty.', 'cheese, spicy, salty', 2, 'Assets/images/Pizza.jpg', 'ENABLE', 14),
(78, 'French Fries', 75, 'Pure Veg and Tasty.', 'cheese, spicy, salty', 2, 'Assets/images/frenchfries.jpg', 'ENABLE', 20),
(79, 'Pakora', 45, 'TASTY', 'cheese, spicy, salty', 2, 'Assets/images/Pakora.jpg', 'ENABLE', 26),
(80, 'testing', 122, 'testing', 'Tosted,', 3, 'Assets/images/Chocolate_Hazelnut_Truffle.jpg12', 'ENABLE', 26);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `M_ID` int(30) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`M_ID`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
(1, 'Aditi Naik', 'aditi@gmail.com', '8654751259', 'Goa', '$2y$10$C9JoLz3OI7XIfL22/lWTMunjIiR57s7oCOLJ7L.lLb2m572xjyd8y'),
(2, 'Nikhil Amin', 'aminnikhil073@gmail.com', '9632587412', 'Karnataka', '$2y$10$C9JoLz3OI7XIfL22/lWTMunjIiR57s7oCOLJ7L.lLb2m572xjyd8y'),
(3, 'Chandan Kumar', 'ckj40856@gmail.com', '9487810674', 'Pondicherry University, SRK HOSTEL ROOM NUMBER-59,', '$2y$10$C9JoLz3OI7XIfL22/lWTMunjIiR57s7oCOLJ7L.lLb2m572xjyd8y'),
(4, 'DHIRAJ kUMAR', 'dk123@gmail.com', '8903079750', 'Pondicherry. Le cafe', '$2y$10$C9JoLz3OI7XIfL22/lWTMunjIiR57s7oCOLJ7L.lLb2m572xjyd8y'),
(5, 'Roshan Raj', 'roshan@gmail.com', '9541258761', 'Bihar', '$2y$10$C9JoLz3OI7XIfL22/lWTMunjIiR57s7oCOLJ7L.lLb2m572xjyd8y'),
(87, 'Dhruv Patel', 'dhruvpatel10890@gmail.com', '777888', '137 Wilson Ave', '$2y$10$fDQXMK8TnPx8kTN1/uEWB.DvIMbakKG4iNbjKaA6dvR3CQxjEp61S'),
(90, 'Binniben chetankumar patel', 'Patelbinni2202@gmail.com', '8401819514', '35 new maruti opp d mart motera ahmedabad', '$2y$10$C9JoLz3OI7XIfL22/lWTMunjIiR57s7oCOLJ7L.lLb2m572xjyd8y');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `F_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` date NOT NULL,
  `U_ID` int(30) NOT NULL,
  `R_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `F_ID`, `foodname`, `price`, `quantity`, `order_date`, `U_ID`, `R_ID`) VALUES
(1, 58, 'Juicy Masala Paneer Kathi Roll', 40, 1, '2019-03-03', 3, 1),
(2, 61, 'Happy Happy Choco Chip Shake', 80, 2, '2019-03-03', 3, 1),
(3, 61, 'Happy Happy Choco Chip Shake', 80, 2, '2019-03-03', 3, 1),
(4, 65, 'Coffee', 25, 4, '2019-03-03', 3, 4),
(5, 58, 'Juicy Masala Paneer Kathi Roll', 40, 7, '2019-03-03', 3, 1),
(6, 65, 'Coffee', 25, 2, '2019-03-03', 3, 4),
(7, 58, 'Juicy Masala Paneer Kathi Roll', 40, 7, '2019-03-03', 3, 1),
(8, 65, 'Coffee', 25, 2, '2019-03-03', 3, 4),
(9, 60, 'Chocolate Hazelnut Truffle', 99, 1, '2019-03-03', 3, 3),
(10, 59, 'Meurig Fish', 60, 1, '2019-03-05', 3, 2),
(11, 60, 'Chocolate Hazelnut Truffle', 99, 1, '2019-03-05', 3, 3),
(12, 65, 'Coffee', 25, 1, '2019-03-05', 3, 4),
(13, 59, 'Meurig Fish', 60, 4, '2019-03-05', 3, 2),
(14, 58, 'Juicy Masala Paneer Kathi Roll', 40, 1, '2019-03-05', 3, 1),
(15, 60, 'Chocolate Hazelnut Truffle', 99, 4, '2019-03-05', 3, 3),
(16, 65, 'Coffee', 25, 1, '2019-03-05', 3, 4),
(17, 66, 'Tea', 20, 7, '2019-03-05', 3, 4),
(18, 59, 'Meurig Fish', 60, 5, '2019-03-05', 1, 2),
(19, 63, 'Baahubali Thali', 75, 1, '2019-03-05', 1, 3),
(20, 68, 'Paneer Pakora', 75, 1, '2019-03-05', 1, 6),
(21, 62, 'Spring Rolls', 65, 1, '2019-03-05', 1, 2),
(22, 68, 'Paneer Pakora', 75, 1, '2019-03-05', 1, 6),
(23, 62, 'Spring Rolls', 65, 1, '2019-03-05', 1, 2),
(24, 65, 'Coffee', 25, 1, '2019-03-05', 1, 4),
(25, 68, 'Paneer Pakora', 75, 1, '2019-03-05', 1, 6),
(26, 59, 'Meurig Fish', 60, 6, '2019-03-05', 1, 2),
(27, 58, 'Juicy Masala Paneer Kathi Roll', 40, 1, '2019-03-05', 1, 1),
(28, 59, 'Meurig Fish', 60, 1, '2019-03-05', 1, 2),
(29, 58, 'Juicy Masala Paneer Kathi Roll', 40, 1, '2019-03-05', 1, 1),
(30, 60, 'Chocolate Hazelnut Truffle', 99, 1, '2019-03-15', 3, 3),
(31, 59, 'Meurig Fish', 60, 1, '2019-03-15', 3, 2),
(32, 61, 'Happy Happy Choco Chip Shake', 80, 1, '2019-03-15', 3, 1),
(33, 60, 'Chocolate Hazelnut Truffle', 99, 1, '2019-03-15', 3, 3),
(34, 59, 'Meurig Fish', 60, 1, '2019-03-15', 3, 2),
(35, 61, 'Happy Happy Choco Chip Shake', 80, 1, '2019-03-15', 3, 1),
(36, 62, 'Spring Rolls', 65, 1, '2019-03-15', 3, 2),
(37, 72, 'Paneer Pakora', 45, 6, '2019-03-15', 3, 2),
(38, 78, 'French Fries', 75, 7, '2019-03-15', 3, 2),
(39, 78, 'French Fries', 75, 1, '2019-03-15', 3, 2),
(40, 73, 'Puff', 35, 1, '2019-03-15', 3, 2),
(41, 77, 'Pizza', 200, 2, '2019-03-16', 3, 2),
(42, 70, 'Tea', 20, 1, '2019-03-16', 3, 2),
(43, 60, 'Chocolate Hazelnut Truffle', 99, 2, '2019-03-16', 3, 3),
(44, 70, 'Tea', 20, 1, '2019-03-16', 3, 2),
(45, 60, 'Chocolate Hazelnut Truffle', 99, 2, '2019-03-16', 3, 3),
(46, 70, 'Tea', 20, 1, '2019-03-16', 3, 2),
(47, 60, 'Chocolate Hazelnut Truffle', 99, 2, '2019-03-16', 3, 3),
(48, 60, 'Chocolate Hazelnut Truffle', 99, 4, '2019-03-25', 3, 3),
(49, 62, 'Spring Rolls', 65, 6, '2019-03-25', 3, 2),
(50, 70, 'Tea', 20, 5, '2019-03-25', 3, 2),
(51, 73, 'Puff', 35, 3, '2019-03-25', 3, 2),
(52, 70, 'Tea', 20, 1, '2019-03-30', 3, 2),
(53, 60, 'Chocolate Hazelnut Truffle', 99, 5, '2019-03-30', 3, 3),
(54, 69, 'Coffee', 25, 7, '2019-03-30', 3, 2),
(55, 62, 'Spring Rolls', 65, 1, '2019-04-01', 3, 2),
(56, 70, 'Tea', 20, 4, '2019-04-01', 3, 2),
(57, 70, 'Tea', 20, 1, '2019-04-01', 3, 2),
(58, 60, 'Chocolate Hazelnut Truffle', 99, 1, '2019-04-01', 3, 3),
(59, 59, 'Meurig Fish', 60, 6, '2019-04-02', 3, 2),
(60, 61, 'Happy Happy Choco Chip Shake', 80, 1, '2019-04-02', 3, 1),
(61, 71, 'Samosa', 40, 3, '2019-04-17', 3, 2),
(62, 70, 'Tea', 20, 4, '2019-04-17', 3, 2),
(63, 72, 'Paneer Pakora', 45, 2, '2019-04-17', 3, 2),
(64, 71, 'Samosa', 40, 3, '2019-04-17', 3, 2),
(65, 70, 'Tea', 20, 4, '2019-04-17', 3, 2),
(66, 72, 'Paneer Pakora', 45, 2, '2019-04-17', 3, 2),
(67, 60, 'Chocolate Hazelnut Truffle', 99, 1, '2019-04-18', 3, 3),
(68, 71, 'Samosa', 40, 1, '2019-04-18', 3, 2),
(72, 63, 'Baahubali Thali', 75, 1, '2023-08-09', 84, 3),
(73, 63, 'Baahubali Thali', 75, 1, '2023-08-09', 84, 3),
(74, 63, 'Baahubali Thali', 75, 1, '2023-08-09', 84, 3),
(75, 63, 'Baahubali Thali', 75, 1, '2023-08-09', 84, 3),
(76, 63, 'Baahubali Thali', 75, 1, '2023-08-09', 84, 3),
(77, 63, 'Baahubali Thali', 75, 1, '2023-08-09', 84, 3),
(78, 63, 'Baahubali Thali', 75, 1, '2023-08-09', 84, 3),
(79, 62, 'Spring Rolls', 65, 1, '2023-08-09', 84, 2),
(80, 69, 'Coffee', 25, 1, '2023-08-09', 84, 2),
(81, 69, 'Coffee', 25, 1, '2023-08-09', 84, 2),
(82, 70, 'Tea', 20, 1, '2023-08-09', 84, 2),
(83, 59, 'Meurig Fish', 60, 3, '2023-08-09', 84, 2),
(84, 63, 'Baahubali Thali', 75, 4, '2023-08-09', 84, 3),
(85, 60, 'Chocolate Hazelnut Truffle', 99, 4, '2023-08-09', 84, 3),
(86, 77, 'Pizza', 200, 1, '2023-08-09', 84, 2),
(87, 59, 'Meurig Fish', 60, 1, '2023-08-09', 84, 2),
(88, 69, 'Coffee', 25, 1, '2023-08-09', 84, 2),
(89, 62, 'Spring Rolls', 65, 2, '2023-08-09', 84, 2),
(90, 70, 'Tea', 20, 3, '2023-08-09', 84, 2),
(91, 63, 'Baahubali Thali', 75, 1, '2023-08-15', 84, 3),
(92, 60, 'Chocolate Hazelnut Truffle', 99, 1, '2023-08-15', 84, 3),
(93, 62, 'Spring Rolls', 65, 3, '2023-08-15', 84, 2),
(94, 59, 'Meurig Fish', 60, 2, '2023-08-15', 84, 2),
(95, 70, 'Tea', 20, 3, '2023-08-15', 84, 2),
(96, 62, 'Spring Rolls', 65, 2, '2023-08-15', 84, 2),
(97, 62, 'Spring Rolls', 65, 2, '2023-08-15', 84, 2),
(98, 62, 'Spring Rolls', 65, 2, '2023-08-15', 84, 2),
(99, 62, 'Spring Rolls', 65, 2, '2023-08-15', 84, 2),
(100, 59, 'Meurig Fish', 60, 1, '2023-09-08', 84, 2),
(101, 69, 'Coffee', 25, 1, '2023-09-08', 84, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `R_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `M_ID` int(30) NOT NULL,
  `images_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`R_ID`, `name`, `email`, `contact`, `address`, `M_ID`, `images_path`) VALUES
(1, 'Nikhil\'s Restaurant', 'nikhil@restaurant.com', '7998562145', 'Karnataka', 2, 'assets/images/restaurant.jpg'),
(2, 'Roshan\'s Restaurant', 'roshan@restaurant.com', '9887546821', 'Bihar', 3, 'assets/images/restaurant.jpg'),
(3, 'Aditi\'s Restaurant', 'aditi@restaurant.com', '7778564231', 'Goa', 1, 'assets/images/restaurant.jpg'),
(4, 'Food Exploria', 'ckj40856@gmail.com', '09487810674', 'Ahmedabad', 4, 'assets/images/restaurant.jpg'),
(6, 'Le Cafe', 'lecafepondi234@gmail.com', '9443369040', 'Pondicherry,rock beach Near,Le cafe', 5, 'assets/images/restaurant.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`,`R_ID`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `U_ID` (`U_ID`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`R_ID`),
  ADD UNIQUE KEY `M_ID_2` (`M_ID`),
  ADD KEY `M_ID` (`M_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `U_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `F_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `M_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `R_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `food` (`F_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`U_ID`) REFERENCES `customer` (`U_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`M_ID`) REFERENCES `manager` (`M_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

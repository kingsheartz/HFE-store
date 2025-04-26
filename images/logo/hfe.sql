-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 08:24 AM
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
-- Database: `hfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `activation_code` varchar(200) NOT NULL,
  `password_reset` varchar(200) DEFAULT NULL,
  `attempt` int(10) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `activation_code`, `password_reset`, `attempt`) VALUES
(2, 'admin', '$2y$10$b/nCaYQ82u0Ttxx.WdRwf.rBhEkz96hdQptZNV5aaxF5L58HtCge6', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `category_id`) VALUES
(1, 'Vaseline', 1),
(2, 'Dettol', 1),
(3, 'Nivea', 1),
(4, 'DABUR', 1),
(5, 'Nova', 1),
(6, 'SYSKA', 1),
(7, 'WOW', 1),
(8, 'VWash', 1),
(9, 'Gillete Venus', 1),
(10, 'Maggi', 2),
(11, 'Happilo', 2),
(12, 'DABUR', 2),
(13, 'Quaker', 2),
(14, 'Nestle', 2),
(15, 'Sunfeast', 2),
(16, 'Samsung', 3),
(17, 'Redmi', 3),
(18, 'Oppo', 3),
(19, 'Apple', 3),
(20, 'Vivo', 3),
(21, 'Panasonic', 3),
(22, 'Oneplus', 3),
(23, 'Nokia', 3),
(24, 'IKALL', 3),
(25, 'Tecno', 3),
(26, 'Kanget', 6),
(27, 'MIOS', 6),
(28, 'Lenovo', 6),
(29, 'Electrobot Budget', 6),
(30, 'HP', 6),
(31, 'ZEBRONICS', 6),
(32, 'Feroc', 8),
(33, 'SMT', 8),
(49, 'JBL', 6),
(35, 'YONEX', 8),
(50, 'boAt', 4),
(37, 'Nivia', 8),
(38, 'RASON', 8),
(39, 'Cosco', 8),
(40, 'Puma', 8),
(41, 'VOODANIA', 8),
(42, 'NSS', 8),
(43, 'Vector X', 8),
(44, 'ALKA', 8),
(45, 'Neulife', 8),
(46, 'CSI Cannon Sports', 8),
(47, 'Perfly', 8),
(51, 'Realme', 3),
(52, 'honor', 3),
(53, 'CASIO', 4),
(54, 'SONY', 6),
(55, 'Canon', 6),
(56, 'NIKON', 6),
(57, 'Infinix', 6),
(58, 'iFFALCON', 6),
(59, 'Mi', 6),
(60, 'ZEBRONICS', 6),
(61, 'PHILIPS', 6),
(62, 'MOTOROLA', 6),
(63, 'intex', 6),
(64, 'BULLAR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_description_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amt` bigint(20) NOT NULL,
  `order_type` varchar(70) DEFAULT '0',
  `date_of_order` date NOT NULL,
  `time_of_order` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `product_description_id`, `store_id`, `quantity`, `total_amt`, `order_type`, `date_of_order`, `time_of_order`) VALUES
(32, 67, 668, 5, 2, 5500, 'booking', '2025-04-24', '08:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Strength Training Sets'),
(2, 'Dumbbells'),
(3, 'Resistance Bands'),
(4, 'Strength Training Adjustable Benches'),
(5, 'Push-Up Stands'),
(6, 'Home Gym Systems '),
(7, 'Strength Training Grip Strengtheners');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `uname` varchar(50) NOT NULL,
  `msg` varchar(50) NOT NULL,
  `dt` varchar(50) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`uname`, `msg`, `dt`, `rname`, `id`, `stat`) VALUES
('KRISHNENDU RG', 'helo', '21-06-26 06:51pm', 'admin', 1, 1),
('admin', 'hi', '21-06-26 06:51pm', 'KRISHNENDU RG', 2, 1),
('KRISHNENDU RG', 'how are you\r\nAre you fine', '21-06-26 06:51pm', 'admin', 3, 1),
('Govind', 'hai', '21-06-28 04:25pm', 'admin', 4, 1),
('KRISHNENDU RG', 'HELO', '21-07-01 11:40am', 'admin', 5, 1),
('admin', 'HI', '21-07-01 11:40am', 'KRISHNENDU RG', 6, 1),
('KRISH', 'hlo', '21-07-03 09:35am', 'admin', 7, 1),
('admin', 'hi', '21-07-03 10:36am', 'KRISH', 8, 1),
('admin', 'jkgj', '21-07-17 09:05pm', 'KRISHNENDU RG', 9, 1),
('admin', 'helo', '21-07-18 07:28pm', 'Govind', 10, 0),
('admin', 'ninakentha reply thanna', '21-07-18 07:28pm', 'Govind', 11, 0),
('admin', 'hlolooooo', '21-07-18 07:29pm', 'Govind', 12, 0),
('admin', 'hi', '21-07-18 07:36pm', 'KRISH', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cookie`
--

CREATE TABLE `cookie` (
  `cookie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `strictly_necessary` int(11) NOT NULL DEFAULT 0,
  `performance` int(11) NOT NULL DEFAULT 0,
  `functional` int(11) NOT NULL DEFAULT 0,
  `targeting` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` bigint(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `location` varchar(150) NOT NULL,
  `latitude` varchar(150) DEFAULT NULL,
  `longitude` varchar(150) DEFAULT NULL,
  `address` varchar(120) NOT NULL,
  `newsletter_status` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `activation_code` varchar(200) NOT NULL,
  `password_reset` varchar(100) DEFAULT NULL,
  `attempt` int(20) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone`, `pincode`, `location`, `latitude`, `longitude`, `address`, `newsletter_status`, `email`, `password`, `activation_code`, `password_reset`, `attempt`) VALUES
(66, 'GOVIND', 'A S', 8113990368, 680312, 'Chengallur', '0', '0', 'ARAKKAPARAMBIL (H), P.O CHENGALOOR, VALANJUPADAM, THRISSUR - 680 312', 1, 'krishnendurg055@gmail.com', '$2y$10$QZkhHxGTz48tUBzxbstteeJEhrathtDCYWrRMcoEdWZ6g6GOSXy6G', 'activated', NULL, 0),
(67, 'Krish', 'rg', 8589024973, 680312, 'Chengallur', '0', '0', 'ARAKKAPARAMBIL (H), P.O CHENGALOOR, VALANJUPADAM, THRISSUR - 680 312', 1, 'krishnendugopi8592@gmail.com', '$2y$10$1ao/WtRoYL5PnQ4rhYwu9evvx5jKdBtHkdU4GDWZXySgbm1mVQAUu', 'activated', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_delivery_details`
--

CREATE TABLE `customer_delivery_details` (
  `customer_delivery_details_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `alternative_phone` bigint(20) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_delivery_details`
--

INSERT INTO `customer_delivery_details` (`customer_delivery_details_id`, `customer_id`, `first_name`, `last_name`, `address`, `phone`, `alternative_phone`, `pincode`, `type`) VALUES
(1, 66, 'krish', 'gov', 'adsdasds', 2232323, 56675, 8788, 'ddsd');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `feedback` varchar(550) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `name`, `email`, `feedback`) VALUES
(1, 'Anumol', 'anumol456789@gmail.com', 'Hi....your service is awesome???? really good');

-- --------------------------------------------------------

--
-- Table structure for table `new_ordered_products`
--

CREATE TABLE `new_ordered_products` (
  `new_ordered_products_id` int(11) NOT NULL,
  `new_orders_id` int(11) DEFAULT NULL,
  `product_details_id` int(11) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `total_amt` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_ordered_products`
--

INSERT INTO `new_ordered_products` (`new_ordered_products_id`, `new_orders_id`, `product_details_id`, `order_type`, `item_quantity`, `total_amt`, `delivery_date`, `delivery_status`) VALUES
(1, 1, 136, 'booking', 1, 20, '2025-04-17', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `new_orders`
--

CREATE TABLE `new_orders` (
  `new_orders_id` int(11) NOT NULL,
  `order_delivery_details_id` int(11) NOT NULL,
  `order_quantity` varchar(50) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_orders`
--

INSERT INTO `new_orders` (`new_orders_id`, `order_delivery_details_id`, `order_quantity`, `sub_total`, `order_date`) VALUES
(1, 1, '1', '240', '2025-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_details`
--

CREATE TABLE `order_delivery_details` (
  `order_delivery_details_id` int(11) NOT NULL,
  `customer_delivery_details_id` int(11) NOT NULL DEFAULT 0,
  `order_notes` varchar(250) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_delivery_details`
--

INSERT INTO `order_delivery_details` (`order_delivery_details_id`, `customer_delivery_details_id`, `order_notes`) VALUES
(1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(400) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `added_date` date DEFAULT NULL,
  `permission` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `price`, `category_id`, `added_date`, `permission`) VALUES
(2, 'Symactive PVC 10 Kg Home Gym Set with Accessories & Gym Bag (10 Kg PVC Weight, 3 Ft Curl Rod, 14\'\' Dumbbell Rods Pair, 2 Locks/Clippers, Skipping Rope, Gloves, Gripper, Bag), Black', 'Symactive PVC 10 Kg Home Gym Set with Accessories & Gym Bag (10 Kg PVC Weight, 3 Ft Curl Rod, 14\'\' Dumbbell Rods Pair, 2 Locks/Clippers, Skipping Rope, Gloves, Gripper, Bag), Black', 949, '1', '2025-04-22', 1),
(3, 'PRO365 Tummy Trimmer, Pushup Bar, Toning Tube with Abdominal Ab Wheel Exerciser Home Gym Exercise Equipment (6 Months Replacement Warranty, Full Set, 4 Pack)', 'PRO365 Tummy Trimmer, Pushup Bar, Toning Tube with Abdominal Ab Wheel Exerciser Home Gym Exercise Equipment (6 Months Replacement Warranty, Full Set, 4 Pack)', 799, '1', '2025-04-22', 1),
(4, 'Gym24 Functional Trainer with Smith Machine Home Gym Set-up G24FTS501 (Yellow Black) PVC Weight', 'Gym24 Functional Trainer with Smith Machine Home Gym Set-up G24FTS501 (Yellow Black) PVC Weight', 11699, '1', '2025-04-22', 1),
(5, 'Kore PVC 20-50 Kg Home Gym Set with One Plain + One Curl and One Pair Dumbbell Rods with Gym Accessories and PVC Dumbbells', 'Kore PVC 20-50 Kg Home Gym Set with One Plain + One Curl and One Pair Dumbbell Rods with Gym Accessories and PVC Dumbbells', 2199, '1', '2025-04-22', 1),
(6, 'Toyshine Fitness Combo - 6 pc Hurdles, 6 pc Stacking Cones, 10 Pc Space Markers and 1 Pc Agility Ladder ((SSTP)', 'Toyshine Fitness Combo - 6 pc Hurdles, 6 pc Stacking Cones, 10 Pc Space Markers and 1 Pc Agility Ladder ((SSTP)', 1587, '1', '2025-04-22', 1),
(7, 'S-LOCK for SUPPORT GYM EQUIPMENTS (PACK of 4).', 'S-LOCK for SUPPORT GYM EQUIPMENTS (PACK of 4).', 149, '1', '2025-04-22', 1),
(8, 'Premium Gym Accessories Combo for Man and Woman Gym Kit for Home Workout with Gym Bag, Shaker, Rope, Wrist Band, Towel, Gloves, Deadlift Straps & Belt. Different Combos. (Pack of 5, Black)', 'Premium Gym Accessories Combo for Man and Woman Gym Kit for Home Workout with Gym Bag, Shaker, Rope, Wrist Band, Towel, Gloves, Deadlift Straps & Belt. Different Combos. (Pack of 5, Black)', 698, '1', '2025-04-22', 1),
(9, 'HASHTAG FITNESS Abs Tower With 20In1 Incline Gym Bench,Gym Cable Attachments For Gym & Ground Pulley Handle, Black', 'HASHTAG FITNESS Abs Tower With 20In1 Incline Gym Bench,Gym Cable Attachments For Gym & Ground Pulley Handle, Black', 16799, '1', '2025-04-22', 1),
(10, 'Multipurpose Steel Squat Bicep Chest Stand with Adjustable Height ( Black )', 'Multipurpose Steel Squat Bicep Chest Stand with Adjustable Height ( Black )', 4599, '1', '2025-04-22', 1),
(11, 'Watson Home Gym Set, Home Gym Equipment, 8kg Rubber Weight Plates with Iron Fitness Rods (2kgx4 Plates + 14inch Dumbbell Rods + 3ft Curl Rod + 5ft Straight Rod), Home Gym Combo', 'Watson Home Gym Set, Home Gym Equipment, 8kg Rubber Weight Plates with Iron Fitness Rods (2kgx4 Plates + 14inch Dumbbell Rods + 3ft Curl Rod + 5ft Straight Rod), Home Gym Combo', 5399, '1', '2025-04-22', 1),
(12, 'HASHTAG FITNESS Metal Integrated Rubber Plates, Gym Equipment Set For Home Workout With 5Ft Rod, 3Ft Curl Rod And Star Nut Dumbbell Set For Home 10Kg To 100Kg, Black', 'HASHTAG FITNESS Metal Integrated Rubber Plates, Gym Equipment Set For Home Workout With 5Ft Rod, 3Ft Curl Rod And Star Nut Dumbbell Set For Home 10Kg To 100Kg, Black', 4299, '1', '2025-04-22', 1),
(13, 'Kore PVC 20-50 Kg Home Gym Set with One Plain + One Curl and One Pair Dumbbell Rods with Gym Accessories and PVC Dumbbells', 'Kore PVC 20-50 Kg Home Gym Set with One Plain + One Curl and One Pair Dumbbell Rods with Gym Accessories and PVC Dumbbells', 2359, '2', '2025-04-22', 1),
(14, 'Burnlab 6 in 1 multifunctional weight training kit - Dumbbells, Kettlebells, Barbells & Push up brackets in 1 | Adjustable Weights | Perfect for Full Body Workout for Men & Women', 'Burnlab 6 in 1 multifunctional weight training kit - Dumbbells, Kettlebells, Barbells & Push up brackets in 1 | Adjustable Weights | Perfect for Full Body Workout for Men & Women', 1499, '2', '2025-04-22', 1),
(15, 'PowerBells 5lbs - 52.5lbs | 2 x Adjustable Dumbbells for Men & Women for Fitness and Home Workout (2.5kg to 24kg) | Designed In USA | Alloy Steel & Plastic | Black', 'PowerBells 5lbs - 52.5lbs | 2 x Adjustable Dumbbells for Men & Women for Fitness and Home Workout (2.5kg to 24kg) | Designed In USA | Alloy Steel & Plastic | Black\r\nALL IN ONE: The lightning-fast adjustable dial mechanism lets you instantly switch between 15 different weights from 5 lbs to 52.5 lbs.\r\nSPACE-EFFICIEN: The compact design of the dumbbells makes them easy-to-store and use at anytime, anywhere at your home.\r\nLONG LASTING: Made from the highest quality materials that do not rust, last longer and are more durable than the average dumbbells.\r\nPREMIUM QUALITY: The ergonomic design with superior rubber grip and high-quality interlocking system makes the shifts very smooth and easy.\r\nTRULY MULTIFUNCTIONA: Can be used for a variety of exercises and adapts to your increasing fitness levels.', 2750, '2', '2025-04-22', 1),
(16, 'Powerbells Set Of 2 Iron Dumbbells(4.5-40 Kg)|17 In 1 Adjustable Dumbbell Weights With Anti-Slip Metal Handle For Fitness Full Body Workout Gym Equipment With 1 Year Warranty,Black', 'Powerbells Set Of 2 Iron Dumbbells(4.5-40 Kg)|17 In 1 Adjustable Dumbbell Weights With Anti-Slip Metal Handle For Fitness Full Body Workout Gym Equipment With 1 Year Warranty,Black', 2333, '2', '2025-04-22', 1),
(17, 'Rubber Coated Hexa Dumbbell Set For Men&Women Professional Exercise Hex Dumbbells For Full Body Workout,Upper&Lower Body Strength Training,Home Gym Exercise.(7.5 Kg Pair)Multi-coloured', 'Rubber Coated Hexa Dumbbell Set For Men&Women Professional Exercise Hex Dumbbells For Full Body Workout,Upper&Lower Body Strength Training,Home Gym Exercise.(7.5 Kg Pair)Multi-coloured', 2089, '2', '2025-04-22', 1),
(18, 'Premium Cast Iron Neoprene Coated Dumbbell Combo with Stand (15 Kg (1.5kg + 2kg + 4kg Set))', 'Premium Cast Iron Neoprene Coated Dumbbell Combo with Stand (15 Kg (1.5kg + 2kg + 4kg Set))', 3009, '2', '2025-04-22', 1),
(19, 'Lifelong Rubber Dumbbells Set of 2 (5Kg*2) for Home Gym - Dumbbell Set of 2 with Rubber Coating - Hexa Dumbbell Set for Men & Women - Home Gym Exercise Equipment - Dumbbell Weights (Black)', 'Lifelong Rubber Dumbbells Set of 2 (5Kg*2) for Home Gym - Dumbbell Set of 2 with Rubber Coating - Hexa Dumbbell Set for Men & Women - Home Gym Exercise Equipment - Dumbbell Weights (Black)', 2589, '2', '2025-04-22', 1),
(20, 'Lifelong PVC Hex Fixed Dumbbells Pack of 2 (1kg*2) Black Color for Home Gym Equipment Fitness Barbell|Gym Exercise|Home Workout Dumbbells Weights for Men & Women (6 Months Warranty)', 'Lifelong PVC Hex Fixed Dumbbells Pack of 2 (1kg*2) Black Color for Home Gym Equipment Fitness Barbell|Gym Exercise|Home Workout Dumbbells Weights for Men & Women (6 Months Warranty)', 169, '2', '2025-04-22', 1),
(21, 'Lifelong Adjustable Dumbbells Set for Home Gym Quick Change Weights with Anti-Slip Stainless Steel Handles - Durable Gym Equipment with Safety Locks- Gym Dumbbell Set for Men & Women', 'Lifelong Adjustable Dumbbells Set for Home Gym Quick Change Weights with Anti-Slip Stainless Steel Handles - Durable Gym Equipment with Safety Locks- Gym Dumbbell Set for Men & Women', 1999, '2', '2025-04-22', 1),
(22, 'Now in INDIA Exclusive range of Neoprene Dumbbells 0.5KG to 10KG (1.5KG PURPLE)', 'Now in INDIA Exclusive range of Neoprene Dumbbells 0.5KG to 10KG (1.5KG PURPLE)', 789, '2', '2025-04-22', 1),
(23, 'Burnlab Resistance Bands (Choose from 8 Different Sizes from 8Kg - 116Kg), Pull Up Assistance Bands for Exercise, Chin Ups, Powerlifting, Training, Gyms, Home Fitness - for Men and Women', 'Burnlab Resistance Bands (Choose from 8 Different Sizes from 8Kg - 116Kg), Pull Up Assistance Bands for Exercise, Chin Ups, Powerlifting, Training, Gyms, Home Fitness - for Men and Women', 2899, '3', '2025-04-22', 1),
(24, 'Resistance Bands Set for Exercise, Stretching and Workout Toning Tube Kit with Foam Handles, Door Anchor, Ankle Strap and Carry Bag for Men, Women', 'Resistance Bands Set for Exercise, Stretching and Workout Toning Tube Kit with Foam Handles, Door Anchor, Ankle Strap and Carry Bag for Men, Women', 659, '3', '2025-04-22', 1),
(25, 'Pull Reducer Training Bands 4 Tubes Body Trimmer Pedal Exerciser Yoga Crossfit Exercise, Arm Exercise, Tummy Body Building Training Men and Women (Multicolor)', 'Pull Reducer Training Bands 4 Tubes Body Trimmer Pedal Exerciser Yoga Crossfit Exercise, Arm Exercise, Tummy Body Building Training Men and Women (Multicolor)', 389, '3', '2025-04-22', 1),
(26, 'Boldfit Resistance Tube with Foam Handles, Door Anchor for Exercise & Stretching, Suitable in Home & Gym Workout for Men & Women-15kg-Black', 'Boldfit Resistance Tube with Foam Handles, Door Anchor for Exercise & Stretching, Suitable in Home & Gym Workout for Men & Women-15kg-Black', 229, '3', '2025-04-22', 1),
(27, 'SLOVIC Resistance Tube for Men and Women(Red 15Kg) | Resistance Band Set & Exercise Bands for Workout | Resistance Band for Pull Up | Gym Equipment for Home Workout| Natural and Unbreakable Rubber', 'SLOVIC Resistance Tube for Men and Women(Red 15Kg) | Resistance Band Set & Exercise Bands for Workout | Resistance Band for Pull Up | Gym Equipment for Home Workout| Natural and Unbreakable Rubber', 229, '3', '2025-04-22', 1),
(28, 'Resistance Bands Set for Men and Women, Pack of 5 Different Levels Elastic Band for Home Gym Long Exercise Workout – Great Fitness Equipment for Training, Yoga – Free Carrying Bag', 'Resistance Bands Set for Men and Women, Pack of 5 Different Levels Elastic Band for Home Gym Long Exercise Workout – Great Fitness Equipment for Training, Yoga – Free Carrying Bag', 399, '3', '2025-04-22', 1),
(29, 'Boldfit Natural Rubber Heavy Resistance Band For Workout Set Exercise&Stretching Pull Up Bands For Home Exercise For Gym Men&Women Resistance Bands Loop Bands Toning Bands Resistance,Yellow (3-7 Kg)', 'Boldfit Natural Rubber Heavy Resistance Band For Workout Set Exercise&Stretching Pull Up Bands For Home Exercise For Gym Men&Women Resistance Bands Loop Bands Toning Bands Resistance,Yellow (3-7 Kg)', 189, '3', '2025-04-22', 1),
(30, 'Lifelong Tummy Trimmer with Double Suction Cup Sit-Up Bar for Abdominal Exercise, Leg Muscle Training Arm Muscles Exercise with Door Attachment, Ankle Straps and 2 Resistance Tubes (Yellow/Black)', 'Lifelong Tummy Trimmer with Double Suction Cup Sit-Up Bar for Abdominal Exercise, Leg Muscle Training Arm Muscles Exercise with Door Attachment, Ankle Straps and 2 Resistance Tubes (Yellow/Black)', 1299, '3', '2025-04-22', 1),
(31, '11 in 1 Resistance Bands/Toning Tube Double and Single/Tummy Trimmer/Large & Standered Springs Combo Pack for Man & Women (STANDERED Spring with 11 in ONE, Black)', '11 in 1 Resistance Bands/Toning Tube Double and Single/Tummy Trimmer/Large & Standered Springs Combo Pack for Man & Women (STANDERED Spring with 11 in ONE, Black)', 799, '3', '2025-04-22', 1),
(32, 'Resistance Bands Set for Exercise, Stretching and Workout Toning Tube Kit with Foam Handles, Door Anchor, Ankle Strap and Carrying Bag Set of 11 in 1 for Men,Women/-* (1)', 'Resistance Bands Set for Exercise, Stretching and Workout Toning Tube Kit with Foam Handles, Door Anchor, Ankle Strap and Carrying Bag Set of 11 in 1 for Men,Women/-* (1)', 499, '3', '2025-04-22', 1),
(33, 'Bodyfit 60KG SET with 8-in-1 Blend Multi Bench for Home Gym', 'Bodyfit 60KG SET with 8-in-1 Blend Multi Bench for Home Gym', 5990, '4', '2025-04-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE `product_description` (
  `product_description_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` int(11) DEFAULT 0,
  `weight` varchar(150) DEFAULT '0',
  `brand` int(11) DEFAULT 0,
  `img_count` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_description`
--

INSERT INTO `product_description` (`product_description_id`, `product_id`, `size`, `weight`, `brand`, `img_count`) VALUES
(647, 2, 0, '10 kg', 64, 0),
(648, 2, 0, '0', 0, 0),
(649, 2, 0, '0', 0, 0),
(650, 2, 0, '16 kg', 0, 0),
(651, 3, 0, '0', 0, 0),
(652, 4, 0, '2 kg', 0, 0),
(653, 5, 0, '5 kg', 0, 0),
(657, 6, 0, '0', 0, 0),
(658, 7, 0, '0', 0, 0),
(659, 8, 0, '0', 0, 0),
(660, 9, 0, '0', 0, 0),
(661, 10, 0, '0', 0, 0),
(662, 11, 0, '0', 0, 0),
(663, 12, 0, '0', 0, 0),
(664, 13, 0, '10 kg', 0, 0),
(665, 13, 0, '20 kg', 0, 0),
(666, 13, 0, '40 kg', 0, 0),
(667, 14, 0, '20 kg', 0, 0),
(668, 15, 0, '0', 0, 4),
(669, 16, 0, '30 kg', 0, 0),
(670, 17, 0, '15 kg', 0, 0),
(671, 18, 0, '15 kg', 0, 0),
(672, 19, 0, '10 kg', 0, 0),
(673, 20, 0, '2 kg', 0, 0),
(674, 21, 0, '0', 0, 0),
(675, 22, 0, '10 kg', 0, 0),
(676, 23, 0, '116 kg', 0, 0),
(677, 24, 0, '0', 0, 0),
(678, 25, 0, '0', 0, 0),
(679, 26, 0, '15 kg', 0, 0),
(680, 27, 0, '15 kg', 0, 0),
(681, 28, 0, '0', 0, 0),
(682, 29, 0, '7 kg', 0, 0),
(683, 30, 0, '0', 0, 0),
(684, 31, 0, '0', 0, 0),
(685, 32, 0, '0', 0, 0),
(686, 33, 0, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_description_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_details_id` int(11) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT 0,
  `availability` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_preference` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_description_id`, `store_id`, `product_details_id`, `permission`, `availability`, `price`, `quantity`, `order_preference`) VALUES
(686, 5, 136, 0, 'yes', '5990', 7, 1),
(668, 5, 135, 0, 'yes', '2750', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_keys`
--

CREATE TABLE `product_keys` (
  `product_keys_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `views` int(11) DEFAULT NULL,
  `ordered_cnt` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `product_description_id` int(11) DEFAULT NULL,
  `date_of_review` date DEFAULT NULL,
  `date_of_preview` date DEFAULT NULL,
  `review` varchar(250) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_keys`
--

INSERT INTO `product_keys` (`product_keys_id`, `rating`, `views`, `ordered_cnt`, `customer_id`, `product_description_id`, `date_of_review`, `date_of_preview`, `review`) VALUES
(151, 0, 61, 0, 66, 668, NULL, '2025-04-24', '0'),
(152, 0, 3, 0, 66, 664, NULL, '2025-04-23', '0'),
(153, 0, 1, 0, 66, 651, NULL, '2025-04-23', '0'),
(154, 0, 1, 0, 66, 652, NULL, '2025-04-23', '0'),
(155, 0, 1, 0, 66, 685, NULL, '2025-04-23', '0'),
(156, 0, 1, 0, 66, 660, NULL, '2025-04-23', '0'),
(157, 0, 10, 0, 66, 646, NULL, '2025-04-23', '0'),
(158, 0, 10, 0, 66, 647, NULL, '2025-04-23', '0'),
(159, 0, 47, 0, 65, 668, NULL, '2025-04-24', '0'),
(160, 0, 39, 0, 67, 668, NULL, '2025-04-24', '0'),
(161, 0, 5, 0, 5, 668, NULL, '2025-04-24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `opening_hours` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `longitude` varchar(150) NOT NULL,
  `latitude` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `opening_hours`, `address`, `status`, `longitude`, `latitude`) VALUES
(1, 'shop 1', '12:00AM to 11:59PM', 'asaas', 'open', '991.32', '991.32'),
(2, 'shop 3', '12:00AM to 11:59PM', 'dsddsas', 'open', '991.32', '991.32'),
(3, 'shop 1', '12:00AM to 11:59PM', 'Valanjupadam', 'open', '991.32', '991.32'),
(4, 'shop 1', '12:00AM to 11:59PM', 'TRENSER TECHNOLOGY SOLUTIONS\r\nTECHNOPARK CAMPUS PH', 'open', '991.32', '991.32'),
(5, 'shop 1', '', 'Valanjupadam', 'open', '991.32', '991.32');

-- --------------------------------------------------------

--
-- Table structure for table `store_admin`
--

CREATE TABLE `store_admin` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `activation_code` varchar(200) NOT NULL,
  `password_reset` varchar(200) DEFAULT NULL,
  `attempt` int(20) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_admin`
--

INSERT INTO `store_admin` (`id`, `store_id`, `username`, `email`, `phone`, `password`, `activation_code`, `password_reset`, `attempt`) VALUES
(8, 5, 'krish', 'krishnendurg055@gmail.com', 8113990368, '$2y$10$QZkhHxGTz48tUBzxbstteeJEhrathtDCYWrRMcoEdWZ6g6GOSXy6G', 'activated', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list`
--

CREATE TABLE `to_do_list` (
  `list_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list_store`
--

CREATE TABLE `to_do_list_store` (
  `list_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `list_name` varchar(50) DEFAULT NULL,
  `share_link` varchar(500) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `wishlist_description` varchar(250) DEFAULT NULL,
  `privacy` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `wishlist_items_id` int(11) NOT NULL,
  `wishlist_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) DEFAULT 0,
  `total_amt` int(11) DEFAULT 0,
  `product_description_id` int(11) DEFAULT 0,
  `store_id` int(11) DEFAULT 0,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`cookie_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `user_id` (`customer_id`);

--
-- Indexes for table `customer_delivery_details`
--
ALTER TABLE `customer_delivery_details`
  ADD PRIMARY KEY (`customer_delivery_details_id`) USING BTREE;

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `new_ordered_products`
--
ALTER TABLE `new_ordered_products`
  ADD PRIMARY KEY (`new_ordered_products_id`);

--
-- Indexes for table `new_orders`
--
ALTER TABLE `new_orders`
  ADD PRIMARY KEY (`new_orders_id`);

--
-- Indexes for table `order_delivery_details`
--
ALTER TABLE `order_delivery_details`
  ADD PRIMARY KEY (`order_delivery_details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_description`
--
ALTER TABLE `product_description`
  ADD PRIMARY KEY (`product_description_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_details_id`);

--
-- Indexes for table `product_keys`
--
ALTER TABLE `product_keys`
  ADD PRIMARY KEY (`product_keys_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_admin`
--
ALTER TABLE `store_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `to_do_list_store`
--
ALTER TABLE `to_do_list_store`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- Indexes for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD PRIMARY KEY (`wishlist_items_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cookie`
--
ALTER TABLE `cookie`
  MODIFY `cookie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `customer_delivery_details`
--
ALTER TABLE `customer_delivery_details`
  MODIFY `customer_delivery_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_ordered_products`
--
ALTER TABLE `new_ordered_products`
  MODIFY `new_ordered_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `new_orders`
--
ALTER TABLE `new_orders`
  MODIFY `new_orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_delivery_details`
--
ALTER TABLE `order_delivery_details`
  MODIFY `order_delivery_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `product_description`
--
ALTER TABLE `product_description`
  MODIFY `product_description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=687;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `product_keys`
--
ALTER TABLE `product_keys`
  MODIFY `product_keys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_admin`
--
ALTER TABLE `store_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `to_do_list_store`
--
ALTER TABLE `to_do_list_store`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  MODIFY `wishlist_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

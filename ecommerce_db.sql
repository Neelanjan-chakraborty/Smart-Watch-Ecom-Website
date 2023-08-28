-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 12:10 AM
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
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_id`, `user_id`, `product_id`, `quantity`, `total_price`, `order_date`) VALUES
(23, 3, 36, 1, 15999.00, '2023-08-07 21:51:38'),
(24, 3, 8, 1, 2099.00, '2023-08-07 21:52:35'),
(25, 3, 2, 2, 7697.00, '2023-08-08 17:15:58'),
(26, 13, 2, 1, 2799.00, '2023-08-22 04:04:49'),
(27, 13, 11, 1, 1699.00, '2023-08-22 04:05:16'),
(28, 13, 19, 1, 2599.00, '2023-08-22 04:05:43'),
(29, 3, 2, 1, 4898.00, '2023-08-23 03:15:15'),
(30, 4, 4, 1, 1999.00, '2023-08-23 03:41:52'),
(31, 13, 16, 1, 1999.00, '2023-08-25 03:39:01'),
(32, 13, 16, 1, 1999.00, '2023-08-25 03:39:38'),
(33, 3, 3, 4, 11196.00, '2023-08-27 18:57:15'),
(34, 3, 3, 4, 11196.00, '2023-08-27 18:57:15'),
(35, 3, 6, 5, 11995.00, '2023-08-27 18:57:15'),
(36, 3, 32, 4, 47996.00, '2023-08-27 18:57:15'),
(37, 3, 18, 2, 4598.00, '2023-08-27 18:57:15'),
(38, 3, 18, 2, 4598.00, '2023-08-27 18:57:15'),
(39, 3, 3, 2, 5598.00, '2023-08-27 18:58:15'),
(40, 27, 3, 4, 11196.00, '2023-08-27 19:52:08'),
(41, 27, 3, 4, 11196.00, '2023-08-27 19:56:48'),
(42, 27, 3, 4, 11196.00, '2023-08-27 19:56:48'),
(43, 27, 3, 4, 11196.00, '2023-08-27 19:57:55'),
(44, 27, 12, 1, 2299.00, '2023-08-27 20:01:02'),
(45, 27, 17, 1, 1699.00, '2023-08-27 20:01:02'),
(46, 27, 3, 4, 11196.00, '2023-08-27 20:20:32'),
(47, 27, 17, 1, 1699.00, '2023-08-27 21:01:14'),
(48, 27, 17, 1, 1699.00, '2023-08-27 21:01:14'),
(49, 27, 13, 2, 5198.00, '2023-08-27 21:01:14'),
(50, 27, 13, 2, 5198.00, '2023-08-27 21:01:58'),
(51, 27, 3, 4, 11196.00, '2023-08-27 21:03:41'),
(52, 27, 16, 2, 3998.00, '2023-08-27 21:20:17'),
(53, 27, 34, 2, 27998.00, '2023-08-27 21:20:17'),
(54, 27, 17, 2, 3398.00, '2023-08-27 21:20:17'),
(55, 27, 11, 4, 6796.00, '2023-08-27 21:23:38'),
(56, 27, 8, 4, 8396.00, '2023-08-27 21:26:50'),
(57, 27, 8, 4, 8396.00, '2023-08-27 21:26:50'),
(58, 27, 18, 1, 2299.00, '2023-08-27 21:29:11'),
(59, 3, 3, 2, 5598.00, '2023-08-28 16:58:59'),
(60, 3, 3, 2, 5598.00, '2023-08-28 16:58:59'),
(61, 3, 36, 4, 63996.00, '2023-08-28 17:04:04'),
(62, 3, 36, 4, 63996.00, '2023-08-28 17:11:57'),
(63, 3, 3, 2, 5598.00, '2023-08-28 17:12:45'),
(64, 3, 8, 2, 4198.00, '2023-08-28 17:19:14'),
(65, 3, 12, 4, 9196.00, '2023-08-28 17:21:00'),
(66, 3, 12, 2, 4598.00, '2023-08-28 17:34:38'),
(67, 3, 12, 2, 4598.00, '2023-08-28 17:41:15'),
(68, 3, 18, 2, 4598.00, '2023-08-28 17:42:36'),
(69, 3, 18, 2, 4598.00, '2023-08-28 17:43:22'),
(70, 3, 2, 2, 5598.00, '2023-08-28 17:48:00'),
(71, 3, 2, 2, 5598.00, '2023-08-28 17:49:53'),
(72, 3, 2, 2, 5598.00, '2023-08-28 17:50:17'),
(73, 3, 36, 1, 15999.00, '2023-08-28 17:51:00'),
(74, 3, 8, 1, 2099.00, '2023-08-28 17:53:11'),
(75, 3, 36, 2, 31998.00, '2023-08-28 17:54:22'),
(76, 3, 12, 2, 4598.00, '2023-08-28 17:58:28'),
(77, 33, 8, 4, 8396.00, '2023-08-28 18:21:12'),
(78, 33, 13, 4, 10396.00, '2023-08-28 18:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `rating_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `battery_life` tinyint(4) DEFAULT NULL,
  `display_quality` tinyint(4) DEFAULT NULL,
  `look_and_feel` tinyint(4) DEFAULT NULL,
  `product_quality` tinyint(4) DEFAULT NULL,
  `value_for_money` tinyint(4) DEFAULT NULL,
  `ease_for_use` tinyint(4) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`rating_id`, `product_id`, `user_id`, `battery_life`, `display_quality`, `look_and_feel`, `product_quality`, `value_for_money`, `ease_for_use`, `timestamp`) VALUES
(1, 1, 3, 5, 5, 4, 5, 4, 4, '2023-08-08 03:48:21'),
(2, 2, 3, 4, 5, 4, 4, 5, 4, '2023-08-08 03:48:21'),
(3, 1, 4, 4, 4, 5, 4, 4, 4, '2023-08-08 03:48:21'),
(4, 2, 4, 4, 4, 4, 4, 4, 4, '2023-08-08 03:48:21'),
(5, 1, 13, 5, 5, 5, 5, 5, 4, '2023-08-08 03:48:21'),
(6, 1, 13, 4, 4, 4, 4, 5, 4, '2023-08-08 03:48:21'),
(7, 1, 14, 4, 5, 4, 4, 4, 5, '2023-08-08 03:48:21'),
(8, 2, 14, 5, 5, 5, 4, 5, 4, '2023-08-08 03:48:21'),
(9, 1, 15, 5, 5, 5, 5, 5, 5, '2023-08-08 03:48:21'),
(10, 1, 15, 4, 4, 4, 4, 5, 4, '2023-08-08 03:48:21'),
(11, 2, 16, 4, 5, 4, 4, 4, 4, '2023-08-08 03:48:21'),
(12, 2, 16, 4, 4, 4, 4, 4, 4, '2023-08-08 03:48:21'),
(13, 1, 17, 4, 4, 5, 4, 4, 4, '2023-08-08 03:48:21'),
(14, 1, 17, 4, 4, 4, 4, 4, 4, '2023-08-08 03:48:21'),
(15, 2, 18, 5, 5, 5, 5, 5, 5, '2023-08-08 03:48:21'),
(16, 2, 18, 4, 4, 4, 4, 5, 4, '2023-08-08 03:48:21'),
(17, 1, 19, 5, 5, 4, 5, 4, 4, '2023-08-08 03:48:21'),
(18, 2, 19, 4, 5, 4, 4, 5, 4, '2023-08-08 03:48:21'),
(19, 1, 20, 5, 5, 4, 5, 4, 4, '2023-08-08 03:48:21'),
(20, 2, 20, 4, 5, 4, 4, 5, 4, '2023-08-08 03:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `upload_image` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`review_id`, `product_id`, `user_id`, `review_text`, `upload_image`, `timestamp`) VALUES
(17, 1, 3, 'Great watch! I love the design and the battery life is impressive.', 'res/reviews/watch1_review1.jpg', '2023-08-08 03:47:05'),
(18, 2, 3, 'This watch is a game-changer. It\'s stylish and comfortable to wear.', 'res/reviews/watch2_review1.jpg', '2023-08-08 03:47:05'),
(19, 1, 4, 'The watch looks elegant and it\'s worth every penny.', 'res/reviews/watch1_review2.jpg', '2023-08-08 03:47:05'),
(20, 2, 4, 'Impressed with the quality and features of this watch.', 'res/reviews/watch2_review2.jpg', '2023-08-08 03:47:05'),
(21, 1, 13, 'This watch is amazing! The battery life is excellent and it looks very stylish.', 'res/reviews/watch1_review3.jpg', '2023-08-08 03:47:05'),
(22, 1, 13, 'I\'m really happy with this watch. The display quality is impressive and it\'s comfortable to wear.', 'res/reviews/watch1_review4.jpg', '2023-08-08 03:47:05'),
(23, 1, 14, 'The watch is fantastic. It\'s lightweight and the strap is comfortable.', 'res/reviews/watch1_review5.jpg', '2023-08-08 03:47:05'),
(24, 2, 14, 'I\'m satisfied with the purchase. The watch functions perfectly.', 'res/reviews/watch2_review3.jpg', '2023-08-08 03:47:05'),
(25, 1, 15, 'This watch is worth every rupee. The build quality is top-notch.', 'res/reviews/watch1_review6.jpg', '2023-08-08 03:47:05'),
(26, 1, 15, 'I\'ve been using this watch for a month and I\'m impressed.', 'res/reviews/watch1_review7.jpg', '2023-08-08 03:47:05'),
(27, 2, 16, 'The watch looks great on my wrist. The display is sharp and clear.', 'res/reviews/watch2_review4.jpg', '2023-08-08 03:47:05'),
(28, 2, 16, 'The watch arrived on time and it\'s as described.', 'res/reviews/watch2_review5.jpg', '2023-08-08 03:47:05'),
(29, 1, 17, 'I\'m happy with the purchase. The watch is sleek and stylish.', 'res/reviews/watch1_review8.jpg', '2023-08-08 03:47:05'),
(30, 1, 17, 'Good watch with useful features. Value for money.', 'res/reviews/watch1_review9.jpg', '2023-08-08 03:47:05'),
(31, 2, 18, 'The watch exceeded my expectations. It\'s a great value for money.', 'res/reviews/watch2_review6.jpg', '2023-08-08 03:47:05'),
(32, 2, 18, 'Impressed with the quality and features of this watch.', 'res/reviews/watch2_review7.jpg', '2023-08-08 03:47:05'),
(33, 1, 19, 'The watch is impressive. The battery life is excellent and it looks stylish.', 'res/reviews/watch1_review10.jpg', '2023-08-08 03:47:05'),
(34, 2, 19, 'Satisfied with the purchase. The watch functions well.', 'res/reviews/watch2_review8.jpg', '2023-08-08 03:47:05'),
(35, 1, 20, 'Great watch! I love the design and the battery life is impressive.', 'res/reviews/watch1_review11.jpg', '2023-08-08 03:47:05'),
(36, 2, 20, 'This watch is a game-changer. It\'s stylish and comfortable to wear.', 'res/reviews/watch2_review9.jpg', '2023-08-08 03:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `total_mrp` decimal(10,2) DEFAULT NULL,
  `money_saved` decimal(10,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `is_saved_for_later` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `user_image`, `verification_token`, `is_verified`) VALUES
(3, 'neelanjanchakraborty231@gmail.com', 'password', 'Neelanjan', 'Chakraborty', NULL, NULL, 1),
(4, 'kastletutorial@gmail.com', 'password', 'Knowledge', 'Castle', NULL, NULL, 1),
(13, 'user1@example.com', 'password1', 'Aarav', 'Kumar', 'res/images/user1.jpg', NULL, 1),
(14, 'user2@example.com', 'password2', 'Sanya', 'Sharma', 'res/images/user2.jpg', NULL, 1),
(15, 'user3@example.com', 'password3', 'Rahul', 'Patel', 'res/images/user3.jpg', NULL, 0),
(16, 'user4@example.com', 'password4', 'Neha', 'Gupta', 'res/images/user4.jpg', NULL, 0),
(17, 'user5@example.com', 'password5', 'Aryan', 'Singh', 'res/images/user5.jpg', NULL, 0),
(18, 'user6@example.com', 'password6', 'Pooja', 'Verma', 'res/images/user6.jpg', NULL, 0),
(19, 'user7@example.com', 'password7', 'Vikram', 'Rajput', 'res/images/user7.jpg', NULL, 0),
(20, 'user8@example.com', 'password8', 'Kriti', 'Mishra', 'res/images/user8.jpg', NULL, 0),
(27, 'hamishhanjan@gmail.com', 'Hamish@357', 'Hamish', 'Hanjan', NULL, NULL, 0),
(33, 'lopit44651@synclane.com', 'Password@123', 'Amir', 'Sidiqui', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `product_id`) VALUES
(5, 27, 17),
(6, 27, 17),
(7, 27, 2),
(8, 27, 2),
(9, 27, 2),
(10, 27, 17),
(11, 27, 17),
(12, 33, 8);

-- --------------------------------------------------------

--
-- Table structure for table `wrist_watch_products`
--

CREATE TABLE `wrist_watch_products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price_mrp` decimal(10,2) NOT NULL,
  `price_list` decimal(10,2) NOT NULL,
  `thumbnail_image` varchar(255) NOT NULL,
  `product_images` text NOT NULL,
  `reviews` text DEFAULT NULL,
  `ratings` decimal(2,1) DEFAULT 0.0,
  `colour_options` varchar(255) DEFAULT NULL,
  `materials` varchar(255) DEFAULT NULL,
  `display` varchar(100) DEFAULT NULL,
  `connectivity` varchar(100) DEFAULT NULL,
  `battery_life` varchar(100) DEFAULT NULL,
  `health_features` text DEFAULT NULL,
  `water_resistance` varchar(100) DEFAULT NULL,
  `compatibility` varchar(255) DEFAULT NULL,
  `additional_features` text DEFAULT NULL,
  `warranty` text DEFAULT NULL,
  `return_policy` text DEFAULT NULL,
  `customer_reviews` text DEFAULT NULL,
  `size_and_dimensions` varchar(100) DEFAULT NULL,
  `packaging` text DEFAULT NULL,
  `shipping_delivery` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wrist_watch_products`
--

INSERT INTO `wrist_watch_products` (`product_id`, `title`, `description`, `category`, `price_mrp`, `price_list`, `thumbnail_image`, `product_images`, `reviews`, `ratings`, `colour_options`, `materials`, `display`, `connectivity`, `battery_life`, `health_features`, `water_resistance`, `compatibility`, `additional_features`, `warranty`, `return_policy`, `customer_reviews`, `size_and_dimensions`, `packaging`, `shipping_delivery`) VALUES
(1, 'Quarts Smart Watch', 'High-quality Quarts Smart Watch for your active lifestyle. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2499.00, 1999.00, 'res/thumbnails/thumbnail1.jpg', 'image1.png,image2.png,image3.png', '15\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.5, 'Black, Silver, Gold', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '2 days', 'Heart rate monitor, Sleep tracking', 'IP68', 'iOS, Android', 'Call & message notifications', '1 year warranty', '30 days return', 'Positive reviews praising design and features', '45mm case size, Adjustable band', 'Box packaging', 'Free standard shipping within the country'),
(2, 'Pears Smart Watch', 'Experience the elegance of Pears Smart Watch on your wrist. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 3199.00, 2799.00, 'res/thumbnails/thumbnail2.jpg', 'image4.png,image5.png,image6.png', '12\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.3, 'Black, Blue, Red', 'Plastic', 'LCD', 'Bluetooth', '3 days', 'Step counter, GPS', 'IP67', 'iOS, Android', 'Music control', '2 years warranty', '45 days return', 'Users appreciate long battery life', '42mm case size, Silicone band', 'Minimalist packaging', 'Standard and expedited shipping available'),
(3, 'Hamsung Smart Watch', 'Stay connected with Hamsung Smart Watch, your perfect companion. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 3199.00, 2799.00, 'res/thumbnails/thumbnail3.jpg', 'image7.png,image8.png,image9.png', '10\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.2, 'Silver, Rose Gold', 'Aluminum', 'AMOLED', 'Bluetooth, LTE', '2 days', 'Health tracker, Voice assistant', 'IP68', 'iOS, Android', 'Customizable watch faces', '1 year warranty', '30 days return', 'Mixed reviews about strap comfort', '40mm case size, Leather band', 'Eco-friendly packaging', 'Ships in recyclable materials'),
(4, 'Pixelate Smart Watch', 'Experience high resolution with the Pixelate Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2299.00, 1999.00, 'res/thumbnails/thumbnail4.jpg', 'image10.png,image11.png,image12.png', '18\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.8, 'Black, White', 'Stainless Steel', 'OLED', 'Bluetooth, Wi-Fi', '1.5 days', 'Fitness tracker, Sleep analysis', 'IP67', 'iOS, Android', 'Weather updates', '2 years warranty', '60 days return', 'Customers love the sleek design', '44mm case size, Metal band', 'Premium packaging', 'Global shipping available'),
(5, 'Citrus Smart Watch', 'Refresh your style with the Citrus Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 1999.00, 1699.00, 'res/thumbnails/thumbnail5.jpg', 'image13.png,image14.png,image15.png', '8\nNew Review: I love this watch! It looks stylish and feels comfortable.', 3.9, 'Green, Orange', 'Plastic', 'LCD', 'Bluetooth', '2 days', 'Step counter, Heart rate monitor', 'IP65', 'iOS, Android', 'Fitness challenges', '1 year warranty', '30 days return', 'Mixed reviews about battery life', '38mm case size, Silicone band', 'Simple packaging', 'Free local shipping'),
(6, 'Nexa Smart Watch', 'Experience the next level of smartness with Nexa Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2699.00, 2399.00, 'res/thumbnails/thumbnail6.jpg', 'image16.png,image17.png,image18.png', '14\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.6, 'Black, Silver', 'Aluminum', 'AMOLED', 'Bluetooth', '2.5 days', 'Fitness tracker, Sleep insights', 'IP68', 'iOS, Android', 'Custom watch faces', '2 years warranty', '45 days return', 'Users praise the comfortable fit', '42mm case size, Metal mesh band', 'Sturdy packaging', 'International shipping available'),
(7, 'Astral Smart Watch', 'Reach for the stars with the Astral Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2999.00, 2599.00, 'res/thumbnails/thumbnail7.jpg', 'image19.png,image20.png,image21.png', '20\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.9, 'Black, Blue', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '3 days', 'Heart health monitor, Sleep tracking', 'IP67', 'iOS, Android', 'Voice commands', '2 years warranty', '30 days return', 'Customers love the accurate sensors', '46mm case size, Leather band', 'Elegant packaging', 'Worldwide shipping available'),
(8, 'Aqua Smart Watch', 'Dive into the world of possibilities with Aqua Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2499.00, 2099.00, 'res/thumbnails/thumbnail8.jpg', 'image22.png,image23.png,image24.png', '9\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.1, 'Blue, Teal', 'Plastic', 'LCD', 'Bluetooth', '2 days', 'Swim tracking, Fitness coach', 'IP68', 'iOS, Android', 'Weather updates', '1 year warranty', '30 days return', 'Mixed reviews about app interface', '40mm case size, Silicone band', 'Minimal packaging', 'Domestic shipping available'),
(9, 'Nova Smart Watch', 'Experience innovation with the Nova Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2799.00, 2399.00, 'res/thumbnails/thumbnail9.jpg', 'image25.png,image26.png,image27.png', '11\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.4, 'Black, Silver', 'Aluminum', 'AMOLED', 'Bluetooth', '2 days', 'Sleep analysis, Voice commands', 'IP67', 'iOS, Android', 'Customizable watch faces', '1 year warranty', '30 days return', 'Users appreciate the stylish design', '42mm case size, Metal band', 'Sleek packaging', 'Nationwide shipping available'),
(10, 'Mystic Smart Watch', 'Unveil the mysteries of smartness with the Mystic Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2399.00, 1999.00, 'res/thumbnails/thumbnail10.jpg', 'image28.png,image29.png,image30.png', '13\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.3, 'Black, Purple', 'Stainless Steel', 'OLED', 'Bluetooth, Wi-Fi', '2 days', 'Health tracker, Sleep insights', 'IP68', 'iOS, Android', 'Fitness challenges', '2 years warranty', '45 days return', 'Customers love the vibrant display', '44mm case size, Silicone band', 'Stylish packaging', 'Countrywide shipping available'),
(11, 'Flora Smart Watch', 'Blossom your style with the Flora Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 1999.00, 1699.00, 'res/thumbnails/thumbnail11.jpg', 'image31.png,image32.png,image33.png', '7\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.0, 'Pink, White', 'Plastic', 'LCD', 'Bluetooth', '1.5 days', 'Step counter, Heart rate monitor', 'IP65', 'iOS, Android', 'Fitness challenges', '1 year warranty', '30 days return', 'Mixed reviews about strap comfort', '38mm case size, Silicone band', 'Simple packaging', 'Free local shipping'),
(12, 'Zephyr Smart Watch', 'Feel the breeze of technology with the Zephyr Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2699.00, 2299.00, 'res/thumbnails/thumbnail12.jpg', 'image34.png,image35.png,image36.png', '15\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.6, 'Black, Silver', 'Aluminum', 'AMOLED', 'Bluetooth', '2.5 days', 'Fitness tracker, Sleep insights', 'IP68', 'iOS, Android', 'Custom watch faces', '2 years warranty', '45 days return', 'Users praise the comfortable fit', '42mm case size, Metal mesh band', 'Sturdy packaging', 'International shipping available'),
(13, 'Solaris Smart Watch', 'Harness the power of the sun with the Solaris Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2999.00, 2599.00, 'res/thumbnails/thumbnail13.jpg', 'image37.png,image38.png,image39.png', '18\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.8, 'Black, Blue', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '3 days', 'Heart health monitor, Sleep tracking', 'IP67', 'iOS, Android', 'Voice commands', '2 years warranty', '30 days return', 'Customers love the accurate sensors', '46mm case size, Leather band', 'Elegant packaging', 'Worldwide shipping available'),
(14, 'Oceanic Smart Watch', 'Dive into the depths of technology with the Oceanic Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2499.00, 2099.00, 'res/thumbnails/thumbnail14.jpg', 'image40.png,image41.png,image42.png', '10\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.1, 'Blue, Teal', 'Plastic', 'LCD', 'Bluetooth', '2 days', 'Swim tracking, Fitness coach', 'IP68', 'iOS, Android', 'Weather updates', '1 year warranty', '30 days return', 'Mixed reviews about app interface', '40mm case size, Silicone band', 'Minimal packaging', 'Domestic shipping available'),
(15, 'Zenith Smart Watch', 'Experience the pinnacle of innovation with the Zenith Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2799.00, 2399.00, 'res/thumbnails/thumbnail15.jpg', 'image43.png,image44.png,image45.png', '12\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.4, 'Black, Silver', 'Aluminum', 'AMOLED', 'Bluetooth', '2 days', 'Sleep analysis, Voice commands', 'IP67', 'iOS, Android', 'Customizable watch faces', '1 year warranty', '30 days return', 'Users appreciate the stylish design', '42mm case size, Metal band', 'Sleek packaging', 'Nationwide shipping available'),
(16, 'Mystique Smart Watch', 'Unveil the enigma of smartness with the Mystique Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2399.00, 1999.00, 'res/thumbnails/thumbnail16.jpg', 'image46.png,image47.png,image48.png', '14\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.3, 'Black, Purple', 'Stainless Steel', 'OLED', 'Bluetooth, Wi-Fi', '2 days', 'Health tracker, Sleep insights', 'IP68', 'iOS, Android', 'Fitness challenges', '2 years warranty', '45 days return', 'Customers love the vibrant display', '44mm case size, Silicone band', 'Stylish packaging', 'Countrywide shipping available'),
(17, 'EcoSmart Watch', 'Embrace sustainability with the EcoSmart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 1999.00, 1699.00, 'res/thumbnails/thumbnail17.jpg', 'image49.png,image50.png,image51.png', '6\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.0, 'Green, Brown', 'Recycled Plastic', 'LCD', 'Bluetooth', '1.5 days', 'Step counter, Heart rate monitor', 'IP65', 'iOS, Android', 'Fitness challenges', '1 year warranty', '30 days return', 'Mixed reviews about strap comfort', '38mm case size, Silicone band', 'Simple packaging', 'Free local shipping'),
(18, 'Terra Smart Watch', 'Connect with the earth through the Terra Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2699.00, 2299.00, 'res/thumbnails/thumbnail18.jpg', 'image52.png,image53.png,image54.png', '16\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.6, 'Black, Silver', 'Aluminum', 'AMOLED', 'Bluetooth', '2.5 days', 'Fitness tracker, Sleep insights', 'IP68', 'iOS, Android', 'Custom watch faces', '2 years warranty', '45 days return', 'Users praise the comfortable fit', '42mm case size, Metal mesh band', 'Sturdy packaging', 'International shipping available'),
(19, 'Nebula Smart Watch', 'Explore the depths of the cosmos with the Nebula Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2999.00, 2599.00, 'res/thumbnails/thumbnail19.jpg', 'image55.png,image56.png,image57.png', '20\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.8, 'Black, Blue', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '3 days', 'Heart health monitor, Sleep tracking', 'IP67', 'iOS, Android', 'Voice commands', '2 years warranty', '30 days return', 'Customers love the accurate sensors', '46mm case size, Leather band', 'Elegant packaging', 'Worldwide shipping available'),
(20, 'Ember Smart Watch', 'Ignite your style with the Ember Smart Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Smart Watches', 2499.00, 2099.00, 'res/thumbnails/thumbnail20.jpg', 'image58.png,image59.png,image60.png', '10\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.1, 'Red, Orange', 'Plastic', 'LCD', 'Bluetooth', '2 days', 'Swim tracking, Fitness coach', 'IP68', 'iOS, Android', 'Weather updates', '1 year warranty', '30 days return', 'Mixed reviews about app interface', '40mm case size, Silicone band', 'Minimal packaging', 'Domestic shipping available'),
(29, 'Elegance Gemstone Watch', 'Experience unparalleled luxury with the Elegance Gemstone Watch, a masterpiece adorned with exquisite gems and diamonds. Crafted to perfection, this timepiece is a true reflection of opulence and sophistication. Its shimmering display showcases a mesmerizing array of colors, capturing the essence of elegance with every glance. With enhanced health features, seamless connectivity, and an extended battery life, the Elegance Gemstone Watch is not just a watch; it\'s a statement of timeless beauty and technological excellence. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 9999.00, 8999.00, 'res/thumbnails/costly_thumbnail1.jpg', 'costly_image1.png,costly_image2.png,costly_image3.png', '25\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.9, 'Gold with Sapphire, Rose Gold with Ruby', '18K Gold, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '5 days', 'Advanced health tracking, Virtual personal assistant', 'IP68', 'iOS, Android', 'Customizable watch faces, Exclusive app experiences', '3 years warranty', '60 days return', 'Astonishingly beautiful and exquisite, a true work of art', '42mm case size, Diamond-studded band', 'Luxury wooden box', 'Global shipping available'),
(30, 'Diamond Brilliance Watch', 'Indulge in the unmatched radiance of the Diamond Brilliance Watch, a symbol of sophistication and prestige. Immaculately designed with precision-cut diamonds and gleaming gems, this timepiece captures the essence of luxury in every facet. Its vivid and lifelike display showcases vibrant colors and detailed graphics, offering a feast for the eyes. Enhanced health monitoring, seamless connectivity, and an extended battery life make the Diamond Brilliance Watch a fusion of high-end style and cutting-edge technology. Elevate your presence with a watch that speaks volumes of your discerning taste. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 10999.00, 9999.00, 'res/thumbnails/costly_thumbnail2.jpg', 'costly_image4.png,costly_image5.png,costly_image6.png', '30\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.9, 'Platinum with Diamonds, White Gold with Emerald', 'Platinum, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '7 days', 'Comprehensive health suite, AI-powered assistant', 'IP68', 'iOS, Android', 'Immersive watch face library, Bespoke app experiences', '5 years warranty', '90 days return', 'Exquisite craftsmanship that radiates sheer brilliance', '40mm case size, Diamond-encrusted band', 'Premium jewelry box', 'International shipping available'),
(31, 'Royal Gemstone Watch', 'Step into a world of royalty and extravagance with the Royal Gemstone Watch, a masterpiece adorned with regal gemstones and sparkling diamonds. Immerse yourself in the allure of its stunning AMOLED display, which showcases rich and vibrant visuals like never before. Seamlessly integrating with your lifestyle, this watch offers advanced health insights, seamless connectivity, and an extended battery life that keeps pace with your ambitions. Elevate your status with the Royal Gemstone Watch, an embodiment of prestige and power. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 11999.00, 10999.00, 'res/thumbnails/costly_thumbnail3.jpg', 'costly_image7.png,costly_image8.png,costly_image9.png', '40\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.8, 'Yellow Gold with Diamonds, White Gold with Sapphire', '18K Gold, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '7 days', 'Comprehensive health suite, AI-powered assistant', 'IP68', 'iOS, Android', 'Exquisite watch face collection, Premium app experiences', '5 years warranty', '90 days return', 'A true testament to luxury and grandeur', '44mm case size, Diamond-encrusted band', 'Luxury leather box', 'Worldwide shipping available'),
(32, 'Opulent Diamond Watch', 'Step into a realm of opulence with the Opulent Diamond Watch, a true masterpiece that embodies extravagance and refinement. Crafted with meticulous attention to detail, this watch boasts an array of pristine diamonds and gemstones that create a captivating mosaic of light and brilliance. Its vibrant and high-definition display brings your world to life with stunning clarity and depth. Seamlessly fusing luxury with technology, the Opulent Diamond Watch offers advanced health insights, seamless connectivity, and an extended battery life that keeps pace with your lifestyle. Elevate your presence with a watch that exudes unparalleled magnificence. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 12999.00, 11999.00, 'res/thumbnails/costly_thumbnail4.jpg', 'costly_image10.png,costly_image11.png,costly_image12.png', '35\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.9, 'Platinum with Diamonds, Rose Gold with Ruby', 'Platinum, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '6 days', 'Comprehensive health suite, AI-powered assistant', 'IP68', 'iOS, Android', 'Exquisite watch face collection, Premium app experiences', '5 years warranty', '90 days return', 'A masterpiece of grandeur and sophistication', '42mm case size, Diamond-studded band', 'Luxury wooden box', 'International shipping available'),
(33, 'Diamond Majesty Watch', 'Experience the majesty of diamonds with the Diamond Majesty Watch, an extraordinary timepiece that captures the essence of luxury and brilliance. Adorned with a dazzling array of diamonds and precious gemstones, this watch is a true work of art that radiates opulence from every angle. Its stunning AMOLED display offers a visual spectacle that brings your world to life with vivid colors and intricate details. Seamlessly integrating advanced health tracking, seamless connectivity, and an extended battery life, the Diamond Majesty Watch is a symbol of status and sophistication. Elevate your presence with a watch that reflects your unique and refined taste. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 13999.00, 12999.00, 'res/thumbnails/costly_thumbnail5.jpg', 'costly_image13.png,costly_image14.png,costly_image15.png', '28\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.8, 'White Gold with Diamonds, Yellow Gold with Sapphire', '18K Gold, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '6 days', 'Comprehensive health suite, AI-powered assistant', 'IP68', 'iOS, Android', 'Exquisite watch faces, Premium app experiences', '5 years warranty', '90 days return', 'A masterpiece that radiates unparalleled luxury', '44mm case size, Diamond-encrusted band', 'Luxury leather box', 'Worldwide shipping available');
INSERT INTO `wrist_watch_products` (`product_id`, `title`, `description`, `category`, `price_mrp`, `price_list`, `thumbnail_image`, `product_images`, `reviews`, `ratings`, `colour_options`, `materials`, `display`, `connectivity`, `battery_life`, `health_features`, `water_resistance`, `compatibility`, `additional_features`, `warranty`, `return_policy`, `customer_reviews`, `size_and_dimensions`, `packaging`, `shipping_delivery`) VALUES
(34, 'Gleaming Gemstone Watch', 'Illuminate your world with the Gleaming Gemstone Watch, a dazzling masterpiece that celebrates the beauty of precious gemstones and diamonds. Meticulously designed and exquisitely crafted, this watch is a testament to your refined taste and unwavering style. Its breathtaking AMOLED display showcases vibrant colors and intricate details, immersing you in a visual experience like no other. Seamlessly integrating advanced health tracking, seamless connectivity, and an extended battery life, the Gleaming Gemstone Watch is more than a timepiece; it\'s a statement of prestige and magnificence. Elevate your presence with a watch that reflects your opulent lifestyle. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 14999.00, 13999.00, 'res/thumbnails/costly_thumbnail6.jpg', 'costly_image16.png,costly_image17.png,costly_image18.png', '22\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.9, 'Platinum with Diamonds, White Gold with Sapphire', '18K Gold, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '5 days', 'Comprehensive health suite, AI-powered assistant', 'IP68', 'iOS, Android', 'Exquisite watch face collection, Premium app experiences', '5 years warranty', '90 days return', 'A masterpiece of timeless beauty and technological excellence', '42mm case size, Diamond-encrusted band', 'Luxury wooden box', 'Worldwide shipping available'),
(35, 'Regal Gemstone Watch', 'Experience unparalleled luxury with the Regal Gemstone Watch, a true marvel of artistry and luxury. Impeccably adorned with an array of precious gems and diamonds, this watch evokes a sense of grandeur and prestige. Its breathtaking AMOLED display delivers stunning visuals that immerse you in a world of opulence and refinement. Seamlessly fusing advanced health tracking, seamless connectivity, and an extended battery life, the Regal Gemstone Watch is a testament to your discerning taste and uncompromising style. Elevate your presence with a watch that illuminates your world with sheer brilliance. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 15999.00, 14999.00, 'res/thumbnails/costly_thumbnail7.jpg', 'costly_image19.png,costly_image20.png,costly_image21.png', '18\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.9, 'Rose Gold with Diamonds, Platinum with Ruby', '18K Gold, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '6 days', 'Comprehensive health suite, AI-powered assistant', 'IP68', 'iOS, Android', 'Exquisite watch face collection, Premium app experiences', '5 years warranty', '90 days return', 'A watch that defines grandeur and prestige', '44mm case size, Diamond-studded band', 'Elegant jewelry box', 'International shipping available'),
(36, 'Glimmering Diamond Watch', 'Embrace the allure of the Glimmering Diamond Watch, a stunning masterpiece that radiates beauty and extravagance. Exquisitely adorned with a mesmerizing array of diamonds and gems, this watch is a true work of art that captures the essence of opulence. Its vibrant and lifelike AMOLED display showcases vivid colors and intricate details, offering a visual feast that tantalizes the senses. Seamlessly fusing luxury with technology, the Glimmering Diamond Watch offers advanced health insights, seamless connectivity, and an extended battery life that keeps pace with your dynamic lifestyle. Elevate your presence with a watch that illuminates your world with sheer brilliance. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Luxury Collection', 16999.00, 15999.00, 'res/thumbnails/costly_thumbnail8.jpg', 'costly_image22.png,costly_image23.png,costly_image24.png', '20\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.9, 'White Gold with Sapphire, Yellow Gold with Diamonds', '18K Gold, Diamonds', 'AMOLED', 'Bluetooth, Wi-Fi, LTE', '6 days', 'Advanced health monitoring, AI-powered assistant', 'IP68', 'iOS, Android', 'Exquisite watch faces, Premium app experiences', '5 years warranty', '90 days return', 'A true masterpiece that shimmers with elegance', '42mm case size, Diamond-encrusted band', 'Luxury wooden box', 'Global shipping available'),
(41, 'Elegant Gold-Silver Smart Watch', 'Experience the epitome of elegance with the Elegant Gold-Silver Smart Watch. Crafted with a perfect blend of gold and silver, this watch exudes a royal charm that complements your distinctive style. Its vibrant AMOLED display delivers stunning visuals that captivate your senses. Seamlessly integrating health tracking, seamless connectivity, and an extended battery life, this watch is your ideal companion for both work and leisure. Elevate your look with the Elegant Gold-Silver Smart Watch, a perfect blend of sophistication and innovation. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Metal Smart Watches', 6999.00, 5999.00, 'res/thumbnails/thumbnail30.jpg', 'image73.png,image74.png,image75.png', '15\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.5, 'Gold-Silver Mix', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '2.5 days', 'Health monitoring, Voice commands', 'IP67', 'iOS, Android', 'Customizable watch faces', '2 years warranty', '45 days return', 'Users love the elegant design', '40mm case size, Metal band', 'Stylish packaging', 'Global shipping available'),
(42, 'Royal Silver-Gold Smart Watch', 'Indulge in the regal elegance of the Royal Silver-Gold Smart Watch. With a striking silver-gold strap and a mesmerizing AMOLED display, this watch reflects your refined taste and uncompromising style. Seamlessly integrating health insights, seamless connectivity, and an extended battery life, it keeps up with your dynamic lifestyle. Elevate your presence with the Royal Silver-Gold Smart Watch, a true masterpiece that brings a touch of royalty to your everyday moments. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Metal Smart Watches', 7499.00, 6499.00, 'res/thumbnails/thumbnail31.jpg', 'image76.png,image77.png,image78.png', '12\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.3, 'Silver-Gold Mix', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '2 days', 'Health tracking, Call & message notifications', 'IP68', 'iOS, Android', 'Customizable watch faces', '2 years warranty', '45 days return', 'Customers praise the royal appearance', '42mm case size, Metal band', 'Premium packaging', 'International shipping available'),
(43, 'Regal Gold-Silver Smart Watch', 'Step into a world of sophistication with the Regal Gold-Silver Smart Watch. Designed with a harmonious fusion of gold and silver, this watch radiates an air of regality that sets you apart. Its vivid AMOLED display showcases vibrant colors and intricate details, captivating your senses with every glance. Seamlessly integrating advanced health tracking, seamless connectivity, and an extended battery life, the Regal Gold-Silver Smart Watch is a symbol of elegance and innovation. Elevate your style with a watch that embodies your royal essence. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Metal Smart Watches', 7999.00, 6999.00, 'res/thumbnails/thumbnail32.jpg', 'image79.png,image80.png,image81.png', '18\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.6, 'Gold-Silver Mix', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '2.5 days', 'Advanced health monitoring, Virtual assistant', 'IP68', 'iOS, Android', 'Custom watch faces', '2 years warranty', '45 days return', 'Customers love the elegant and royal look', '44mm case size, Metal band', 'Luxury packaging', 'Worldwide shipping available'),
(44, 'Majestic Silver-Gold Smart Watch', 'Experience the majesty of the Majestic Silver-Gold Smart Watch, a true masterpiece that combines silver and gold in a harmonious design. Impeccably crafted with attention to detail, this watch radiates a sense of majesty and elegance that captivates your every glance. Its vibrant AMOLED display offers stunning visuals that immerse you in a world of luxury and sophistication. Seamlessly integrating advanced health tracking, seamless connectivity, and an extended battery life, the Majestic Silver-Gold Smart Watch is a testament to your discerning taste and style. Elevate your presence with a watch that exudes timeless elegance and regal allure. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Metal Smart Watches', 8499.00, 7499.00, 'res/thumbnails/thumbnail33.jpg', 'image82.png,image83.png,image84.png', '20\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.8, 'Silver-Gold Mix', 'Stainless Steel', 'AMOLED', 'Bluetooth, Wi-Fi', '3 days', 'Comprehensive health suite, AI-powered assistant', 'IP68', 'iOS, Android', 'Exquisite watch faces, Premium app experiences', '2 years warranty', '45 days return', 'A watch that combines elegance and innovation', '42mm case size, Metal band', 'Elegant packaging', 'International shipping available'),
(45, 'Neon Fusion Watch', 'Experience the vibrant energy with the Neon Fusion Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2799.00, 2399.00, 'res/thumbnails/neon_thumbnail1.jpg', 'neon_image1.png,neon_image2.png,neon_image3.png', '12\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.4, 'Neon Green, Neon Pink', 'Stainless Steel', 'AMOLED', 'Bluetooth', '2.5 days', 'Fitness tracker, Sleep insights', 'IP68', 'iOS, Android', 'Custom watch faces', '2 years warranty', '45 days return', 'Limited edition design with positive feedback', '42mm case size, Silicone band', 'Stylish packaging', 'International shipping available'),
(46, 'Luminous Neon Watch', 'Radiate with the Luminous Neon Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2999.00, 2599.00, 'res/thumbnails/neon_thumbnail2.jpg', 'neon_image4.png,neon_image5.png,neon_image6.png', '15\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.8, 'Neon Blue, Neon Orange', 'Aluminum', 'AMOLED', 'Bluetooth, Wi-Fi', '3 days', 'Health tracker, Sleep tracking', 'IP67', 'iOS, Android', 'Voice commands', '2 years warranty', '30 days return', 'Customers appreciate the vibrant and unique design', '44mm case size, Metal band', 'Elegant packaging', 'Worldwide shipping available'),
(47, 'Vivid Neon Watch', 'Live life in full color with the Vivid Neon Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2399.00, 1999.00, 'res/thumbnails/neon_thumbnail3.jpg', 'neon_image7.png,neon_image8.png,neon_image9.png', '14\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.3, 'Neon Yellow, Neon Purple', 'Plastic', 'LCD', 'Bluetooth', '2 days', 'Step counter, Heart rate monitor', 'IP65', 'iOS, Android', 'Fitness challenges', '1 year warranty', '30 days return', 'Mixed reviews about strap comfort', '38mm case size, Silicone band', 'Simple packaging', 'Free local shipping'),
(48, 'Glowing Neon Watch', 'Illuminate your style with the Glowing Neon Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2599.00, 2199.00, 'res/thumbnails/neon_thumbnail4.jpg', 'neon_image10.png,neon_image11.png,neon_image12.png', '18\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.6, 'Neon Red, Neon Cyan', 'Stainless Steel', 'OLED', 'Bluetooth, Wi-Fi', '2 days', 'Fitness tracker, Sleep analysis', 'IP67', 'iOS, Android', 'Weather updates', '2 years warranty', '45 days return', 'Customers love the vibrant and eye-catching design', '40mm case size, Silicone band', 'Minimal packaging', 'Domestic shipping available'),
(49, 'Radiant Neon Watch', 'Shine bright with the Radiant Neon Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2199.00, 1799.00, 'res/thumbnails/neon_thumbnail5.jpg', 'neon_image13.png,neon_image14.png,neon_image15.png', '10\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.0, 'Neon Orange, Neon Green', 'Plastic', 'LCD', 'Bluetooth', '1.5 days', 'Step counter, Heart rate monitor', 'IP65', 'iOS, Android', 'Fitness challenges', '1 year warranty', '30 days return', 'Mixed reviews about strap comfort', '42mm case size, Silicone band', 'Simple packaging', 'Free local shipping'),
(50, 'Luminous Fusion Watch', 'A fusion of light and style with the Luminous Fusion Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2999.00, 2599.00, 'res/thumbnails/neon_thumbnail6.jpg', 'neon_image16.png,neon_image17.png,neon_image18.png', '12\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.4, 'Neon Pink, Neon Blue', 'Aluminum', 'AMOLED', 'Bluetooth', '2.5 days', 'Fitness tracker, Sleep insights', 'IP68', 'iOS, Android', 'Custom watch faces', '2 years warranty', '45 days return', 'Users praise the unique and captivating design', '44mm case size, Metal mesh band', 'Sturdy packaging', 'International shipping available'),
(51, 'Neon Blaze Watch', 'Ignite your look with the Neon Blaze Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2799.00, 2399.00, 'res/thumbnails/neon_thumbnail7.jpg', 'neon_image19.png,neon_image20.png,neon_image21.png', '14\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.3, 'Neon Cyan, Neon Red', 'Stainless Steel', 'OLED', 'Bluetooth, Wi-Fi', '2 days', 'Health tracker, Sleep insights', 'IP68', 'iOS, Android', 'Fitness challenges', '2 years warranty', '45 days return', 'Customers love the energetic and lively design', '42mm case size, Silicone band', 'Stylish packaging', 'Nationwide shipping available'),
(52, 'Vivid Fusion Watch', 'Experience vibrant fusion with the Vivid Fusion Watch. Introducing our latest collection of wrist watches that redefine style and functionality. Crafted with precision, these watches showcase a perfect blend of modern design and timeless elegance. Whether you\'re dressing up for a formal occasion or adding a touch of sophistication to your everyday look, our wrist watches are the ultimate choice. Explore the intricate dial designs that capture attention from every angle. The durable materials ensure longevity, while the vibrant color options allow you to express your personal style effortlessly. Stay connected with the latest technology through seamless connectivity features. Our watches are equipped with advanced health tracking to monitor your well-being, and the water-resistant build ensures you\'re ready to take on any adventure. With a long-lasting battery life, you can count on your watch to be your reliable companion throughout your day. Enhance your lifestyle with these watches that not only keep you on time but also elevate your fashion game. Experience the future of timekeeping with our wrist watches. Order now and enjoy free shipping and hassle-free returns. Join the ranks of satisfied customers who have made our watches a part of their everyday journey.', 'Special Edition', 2499.00, 2099.00, 'res/thumbnails/neon_thumbnail8.jpg', 'neon_image22.png,neon_image23.png,neon_image24.png', '16\nNew Review: I love this watch! It looks stylish and feels comfortable.', 4.6, 'Neon Purple, Neon Yellow', 'Plastic', 'LCD', 'Bluetooth', '2 days', 'Step counter, Heart rate monitor', 'IP65', 'iOS, Android', 'Fitness challenges', '1 year warranty', '30 days return', 'Mixed reviews about strap comfort', '38mm case size, Silicone band', 'Simple packaging', 'Free local shipping');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- Indexes for table `wrist_watch_products`
--
ALTER TABLE `wrist_watch_products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wrist_watch_products`
--
ALTER TABLE `wrist_watch_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `wrist_watch_products` (`product_id`);

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `wrist_watch_products` (`product_id`);

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `wrist_watch_products` (`product_id`),
  ADD CONSTRAINT `product_ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `wrist_watch_products` (`product_id`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `wrist_watch_products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

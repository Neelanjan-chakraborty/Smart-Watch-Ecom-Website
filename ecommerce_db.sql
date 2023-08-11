-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 05:16 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(3, 'neelanjanchakraborty231@gmail.com', 'password', 'Neelanjan', 'Chakraborty', NULL),
(4, 'kastletutorial@gmail.com', 'password0', 'Knowledge', 'Castle', NULL),
(13, 'user1@example.com', 'password1', 'Aarav', 'Kumar', 'res/images/user1.jpg'),
(14, 'user2@example.com', 'password2', 'Sanya', 'Sharma', 'res/images/user2.jpg'),
(15, 'user3@example.com', 'password3', 'Rahul', 'Patel', 'res/images/user3.jpg'),
(16, 'user4@example.com', 'password4', 'Neha', 'Gupta', 'res/images/user4.jpg'),
(17, 'user5@example.com', 'password5', 'Aryan', 'Singh', 'res/images/user5.jpg'),
(18, 'user6@example.com', 'password6', 'Pooja', 'Verma', 'res/images/user6.jpg'),
(19, 'user7@example.com', 'password7', 'Vikram', 'Rajput', 'res/images/user7.jpg'),
(20, 'user8@example.com', 'password8', 'Kriti', 'Mishra', 'res/images/user8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

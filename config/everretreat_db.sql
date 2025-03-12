-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 01:12 PM
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
-- Database: `everretreat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `id` int(11) NOT NULL,
  `right_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `right_name`) VALUES
(12, 'create_account'),
(8, 'dashboard'),
(2, 'farmer_milk_report'),
(1, 'orders_approval'),
(11, 'orders_registration'),
(3, 'orders_reports'),
(4, 'set_prices'),
(6, 'users_assign_rights'),
(5, 'users_manage'),
(7, 'user_profile'),
(9, 'view_collection'),
(10, 'view_collection_reports');

-- --------------------------------------------------------

--
-- Table structure for table `role_rights`
--

CREATE TABLE `role_rights` (
  `id` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `right_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `startingDate` varchar(100) NOT NULL,
  `roleid` int(9) DEFAULT 3,
  `photo` varchar(1000) NOT NULL DEFAULT 'profile.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `phone`, `email`, `password`, `username`, `address`, `status`, `startingDate`, `roleid`, `photo`, `created_at`) VALUES
(13, 'Emmy', 'NSENGIMANA', '07877756483', 'emmynsengi2020@gmail.com', '$2y$10$e04TKyX.M2QOvnjXJf9atueV0Wqe6Ox8oyiSwlF4pn5d4m4GixXc6', 'emmy', 'Nyanza, Gasoro', 'Pending', '2020-07-19', 2, 'profile.png', '2025-01-30 21:24:16'),
(14, 'Nteziryayo', 'Martin', '07832524929', 'martin@gmail.com', '$2y$10$3QyjR0eV4riu9yB9NaVJDu0X0Mu9PPLQeXFRYSEiQ9Voq74JfWfLy', 'martin', 'Kigali', 'Pending', '2020-05-12', 3, 'profile.png', '2025-01-30 23:42:16'),
(24, 'Byiringiro', 'divin', '212121212', 'emmynsengi202e0@gmail.com', '$2y$10$HfCu46qGA.2K7TM4PfrJ0OF8/qxFMXhfL6blnWWK91ZzvDFZ9sqEK', 'divin', 'gikondo', 'Active', '2020-07-19', 1, 'profile.png', '2025-02-15 20:06:47'),
(26, 'MUKWAYA', 'Remy', '0787254815', 'info.abaremy@gmail.com', '$2y$10$dDwC1keyqxAiu.B.04p7KuBfbT9iuFfXhE75tlLLezKjAFKgdhPS2', 'remy', 'Muhanga', 'Active', '2025-08-18', 2, 'profile.png', '2025-02-25 22:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `roleid` int(11) NOT NULL,
  `role_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`roleid`, `role_name`) VALUES
(1, 'SUPER ADMIN'),
(2, 'ADMIN'),
(3, 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `right_name` (`right_name`);

--
-- Indexes for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleid` (`roleid`),
  ADD KEY `right_id` (`right_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `role_fk` (`roleid`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role_rights`
--
ALTER TABLE `role_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD CONSTRAINT `role_rights_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `user_roles` (`roleid`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_rights_ibfk_2` FOREIGN KEY (`right_id`) REFERENCES `rights` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `user_roles` (`roleid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

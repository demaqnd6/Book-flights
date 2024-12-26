-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 07:46 PM
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
-- Database: `project_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('confirmed','cancelled') DEFAULT 'confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `trip_id`, `booking_date`, `status`) VALUES
(18, 1, 2, '2024-12-10 21:12:29', 'confirmed'),
(19, 1, 3, '2024-12-10 21:12:30', 'confirmed'),
(20, 1, 1, '2024-12-10 21:12:31', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `trip_name` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `trip_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `trip_name`, `destination`, `description`, `price`, `seats_available`, `trip_date`) VALUES
(1, 'فلسطين الأبية', 'القدس الشريف', 'رحله تحرير باذن الله.', 522.00, 16, '2025-01-01'),
(2, 'السعودية', 'مكة المكرمة', 'رحله للحج و العمره', 3000.00, 105, '2025-01-03'),
(3, 'اليمن', 'صنعاء', 'سياحه', 300.00, 15, '2024-12-31'),
(4, 'الإمارات', 'دبي', 'ترفيه', 1000.00, 25, '2024-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `date`, `phone`) VALUES
(1, 'Kazem', '$2y$10$GpKsF8lkcBqCpDsqa2W04uRjWBQX00/DMT8LXGRT1rPKQNQa2rv3C', '2001-05-09', '0592897412');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

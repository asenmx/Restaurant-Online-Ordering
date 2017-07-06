-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2016 at 10:59 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(150) COLLATE utf8_bin NOT NULL,
  `password` varchar(150) COLLATE utf8_bin NOT NULL,
  `name` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`, `name`) VALUES
(2, 'asen', '$2y$10$izFKpAcJ4DthAEtQruvvQOxugUIPGmSkCW90Po7V8N7WikBfAdakO', 'Асен'),
(4, 'pepi', '$2y$10$bx2D4iERirD8fAeIR0k7ruPvhLWrz8Ln28i86i.4hnYFdl98/Gb8y', 'Петър'),
(5, 'ivan', '$2y$10$TcHdhb5rt2KWlb/Y9OYd3OOIEsI1/JCsT.bjJOJ2m6nQnlJkKQW1.', 'Иван');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `image` varchar(150) COLLATE utf8_bin NOT NULL,
  `description` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`) VALUES
(14, 'Безалкохолни напитки', '1472736910ban_image.jpg', 'Сокове, газирани напитки, чай.'),
(15, 'Алкохол', '1472737256alcohol.jpg', 'Вино, уиски, бира.'),
(16, 'Супи', '1472737743img_soups.jpg', 'Топли и студени супи.'),
(17, 'Пици', '14727633116-pizza_pepperoni_main_6.png', 'Пици за всеки вкус.');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `image` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` mediumtext COLLATE utf8_bin NOT NULL,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `image`, `description`, `price`, `category_id`) VALUES
(14, 'Пиринско', '1472738274img_pirinsko.jpg', 'бира - 500 мл.', 2, 15),
(15, 'Загорка', '1472738428img_zagorka.jpg', 'Бира - 500 мл.', 2, 15),
(16, 'Туборг', '1472738532img_tuborg.jpg', 'Бира - 500 мл.', 3, 15),
(17, 'Кока кола', '1472738929img_coca-cola.jpg', '500 мл, стъклена бутилка  ', 2, 14),
(18, 'Таратор', '1472739526img_tarator.jpg', 'Студена супа', 3, 16),
(19, 'Пилешка супа', '1472739721img_chicken-soup.jpg', 'Топла пилешка супа с пресен магданоз.', 5, 16),
(20, 'Шкембе чорба', '1472739937img_shkembe-chorba.png', 'Българска шкембе чорба с прясно мляко.', 4, 16),
(21, 'Червено вино', '1472741216img_red-wine.jpg', 'Червено мелнишко вино 750мл.', 15, 15),
(22, 'Бяло вино', '1472741471img_shardone.jpg', 'Шардоне 750мл.', 20, 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `price` double NOT NULL,
  `adress` mediumtext COLLATE utf8_bin NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `price`, `adress`, `datetime`, `status`) VALUES
(12, 'Асен Марикостенлиев', '0894634013', 101, 'Алеко Константинов 14', '2016-09-01 03:31:55', 1),
(13, 'Иван Иванов', '0894433221', 26, 'Пиротска 8', '2016-09-01 03:33:06', 1),
(14, 'Петър Петров', '0894613123', 94, 'Искър 25', '2016-09-01 07:55:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_foods`
--

CREATE TABLE `orders_foods` (
  `id` int(11) NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders_foods`
--

INSERT INTO `orders_foods` (`id`, `food_id`, `order_id`, `price`, `quantity`) VALUES
(23, 19, 12, 70, 14),
(24, 20, 12, 12, 3),
(25, 16, 12, 9, 3),
(26, 14, 12, 10, 5),
(27, 18, 13, 12, 4),
(28, 20, 13, 8, 2),
(29, 17, 13, 6, 3),
(30, 15, 14, 2, 1),
(31, 16, 14, 15, 5),
(32, 22, 14, 60, 3),
(33, 20, 14, 8, 2),
(34, 18, 14, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `reservation_date` datetime NOT NULL,
  `people_number` int(11) NOT NULL,
  `phone` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `reservation_date`, `people_number`, `phone`, `status`) VALUES
(6, 'Асен', 'Марикостенлиев', '2016-09-23 13:55:00', 4, '0894634013', 0),
(7, 'Ивайло', 'Велев', '2016-09-24 12:40:00', 5, '0894521463', 0),
(8, 'Митко', 'Митков', '2016-09-27 20:30:00', 7, '0895332211', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_foods`
--
ALTER TABLE `orders_foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `orders_foods`
--
ALTER TABLE `orders_foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_foods`
--
ALTER TABLE `orders_foods`
  ADD CONSTRAINT `orders_foods_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_foods_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

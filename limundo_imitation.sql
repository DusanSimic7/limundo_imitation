-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 11:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limundo_imitation`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bid_price` int(11) NOT NULL,
  `bid_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `buyer_id`, `seller_id`, `name`, `bid_price`, `bid_date`) VALUES
(59, 1, 1, 'Jakna', 0, '2020-12-11 10:42:39'),
(60, 1, 1, 'Jakna', 8000, '2020-12-11 10:42:51'),
(61, 5, 1, 'skije Elan', 6000, '2020-12-11 10:46:55'),
(62, 5, 1, 'skije Elan', 13000, '2020-12-11 10:47:05'),
(63, 5, 1, 'jakna2', 15000, '2020-12-11 10:49:06'),
(64, 1, 1, 'Jakna', 8010, '2020-12-11 14:09:58'),
(66, 5, 1, 'Jakna', 8020, '2020-12-11 14:45:20'),
(67, 5, 1, 'Jakna', 9222, '2020-12-11 14:45:55'),
(69, 1, 5, 'zenska jakna', 10000, '2020-12-12 09:12:23'),
(70, 1, 5, 'Majica', 1450, '2020-12-12 09:15:37'),
(71, 1, 5, 'zenska jakna', 10010, '2020-12-12 09:18:29'),
(72, 1, 5, 'Majica', 2000, '2020-12-12 09:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `bought_sold_subjects`
--

CREATE TABLE `bought_sold_subjects` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `final_price` int(20) NOT NULL,
  `time_of_purchase` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bought_sold_subjects`
--

INSERT INTO `bought_sold_subjects` (`id`, `buyer_id`, `seller_id`, `name`, `final_price`, `time_of_purchase`) VALUES
(22, 6, 6, 'Klima LG', 15000, '2020-06-01 17:45:21'),
(23, 6, 6, 'Klima LG', 30000, '2020-06-01 17:48:16'),
(24, 12, 6, 'Klima LG', 15000, '2020-06-01 17:52:24'),
(25, 13, 1, 'Klima LG', 23000, '2020-06-01 18:02:09'),
(26, 1, 13, 'Whisky Balantines', 3000, '2020-06-01 18:49:38'),
(27, 5, 5, 'viski', 3500, '2020-06-01 18:56:24'),
(28, 12, 5, 'viski broj3', 3500, '2020-06-01 19:00:06'),
(29, 15, 1, 'iphone 8 64gb', 11000, '2020-12-11 10:33:39'),
(30, 6, 18, 'Televizor ORION', 13000, '2020-12-11 10:33:39'),
(31, 5, 1, 'arsenal', 20010, '2020-12-12 08:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'tehnika'),
(2, 'garderoba'),
(3, 'obuca'),
(4, 'sportska oprema'),
(5, 'namestaj'),
(6, 'ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `starting_price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `method_of_payment` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) NOT NULL,
  `duration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `seller_id`, `name`, `description`, `starting_price`, `image`, `category`, `method_of_payment`, `delivery`, `duration`) VALUES
(61, 1, 'Jakna', 'Nova jakna', 6000, 'jakna.jpg', 2, 'Pouzecem,Licno', 'City Express,Posta', '2020-12-16'),
(62, 1, 'skije Elan', 'Nove skije, garancija 5 godina', 12000, 'skije.jpg', 4, 'Tekuci racun(pre slanja)', 'Posta', '2020-12-22'),
(63, 1, 'jakna2', 'nova jakna broj2', 9500, 'jakna2.jpg', 2, 'Tekuci racun(pre slanja)', 'BEKS', '2020-12-18'),
(65, 5, 'zenska jakna', 'Nova zenska jakna iz italije', 8500, 'zenska jakna.jpg', 2, 'Tekuci racun(pre slanja)', 'City Express,Posta', '2020-12-16'),
(66, 5, 'Majica', 'Na prodaju majica uvezena iz Turske', 600, 'majica.jpg', 2, 'Tekuci racun(pre slanja)', 'Posta', '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Dusan', 'Simic', 'dusansimic202@gmail.com', '0644001351', 'simke', '2020-12-11 10:35:25'),
(5, 'Djurdjija', 'Jankovic', 'djuki@gmail.com', '062322655', 'djuki', '2020-12-11 10:35:25'),
(6, 'Lazar', 'Milenkovic', 'laki@gmail.com', '0649287412', 'laki', '2020-12-11 10:35:25'),
(12, 'Jovana', 'Simic', 'jovana@gmail.com', '0637412335', 'jovana', '2020-12-11 10:35:25'),
(13, 'Milan', 'Simic', 'milan@gmail.com', '060232114', 'milan', '2020-12-11 10:35:25'),
(15, 'Nikola', 'Vujanic', 'vuja@gmail.com', '0611215488', 'vuja', '2020-12-11 10:35:25'),
(17, 'Nikola', 'Dobrosavljevic', 'kica@gmail.com', '0648526542', 'kica', '2020-12-11 10:35:25'),
(18, 'Mirjana ', 'Simic', 'mira@gmail.com', '0633214563', 'mira123', '2020-12-11 10:35:25'),
(19, 'Stefan', 'Milosavljevic', 'stefan@gmail.com', '0655562321', 'stefan', '2020-12-11 10:35:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bought_sold_subjects`
--
ALTER TABLE `bought_sold_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `bought_sold_subjects`
--
ALTER TABLE `bought_sold_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

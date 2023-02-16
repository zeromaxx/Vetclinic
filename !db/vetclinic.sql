-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 09:03 PM
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
-- Database: `vetclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Σκύλος', '2023-01-25 06:21:00', '2023-01-25 06:21:00', NULL),
(2, 'Γάτα', '2023-01-25 06:21:00', '2023-01-25 06:21:00', NULL),
(3, 'Πτηνό', '2023-01-25 06:21:00', '2023-01-25 06:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `schedule_date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `status` enum('confirmed','pending','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `pet_id`, `schedule_date`, `time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 1, '2023-02-13', '08:00-08:30', 'cancelled', '2023-02-12 11:31:15', '2023-02-13 13:56:23', NULL),
(7, 1, 1, '2023-02-14', '08:30-09:30', 'pending', '2023-02-12 11:31:25', '2023-02-13 08:39:22', NULL),
(8, 2, 3, '2023-02-22', '11:30-12:00', 'cancelled', '2023-02-12 16:53:08', '2023-02-13 11:57:53', NULL),
(9, 2, 3, '2023-02-22', '08:30-09:35', 'confirmed', '2023-02-13 14:31:28', '2023-02-13 15:00:14', NULL),
(10, 2, 3, '2023-02-22', '12:00-12:40', 'pending', '2023-02-13 14:56:19', '2023-02-13 14:57:57', NULL),
(11, 2, 3, '2023-02-12', '08:00-08:30', 'pending', '2023-02-13 17:20:39', '2023-02-13 17:20:39', NULL),
(12, 2, 3, '2023-02-03', '15:30-16:00', 'pending', '2023-02-13 17:27:29', '2023-02-13 17:27:29', NULL),
(13, 2, 6, '2023-02-02', '12:30-13:00', 'pending', '2023-02-13 17:47:13', '2023-02-13 17:47:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `price`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 250, 'Ενδοπαρασίτωση', NULL, NULL, NULL),
(2, 50, 'Εξετάσεις Αίματος', NULL, NULL, NULL),
(3, 165, 'Στείρωση', NULL, NULL, NULL),
(4, 35, 'Αντιλυσσικό Εμβόλιο', NULL, NULL, NULL),
(5, 95, 'Εξέταση T4', NULL, NULL, NULL),
(6, 125, 'Βιοχημικός Έλεγχος', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `userId`, `name`, `animal_id`, `weight`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Charlie', 1, 10, '2023-02-11 10:05:12', '2023-02-13 13:40:19', '2023-02-13 13:40:19'),
(2, 1, 'Mikey', 2, 20, '2023-02-11 10:17:03', '2023-02-11 10:17:03', NULL),
(3, 2, 'Azor', 3, 15, '2023-02-11 10:20:42', '2023-02-13 18:02:43', NULL),
(4, 5, 'Max', 3, 2, '2023-02-11 19:07:20', '2023-02-11 19:07:20', NULL),
(5, 1, 'Johnny', 1, 45, '2023-02-12 13:28:10', '2023-02-13 13:39:15', '2023-02-13 13:39:15'),
(6, 2, 'Maxim', 2, 5, '2023-02-13 17:20:20', '2023-02-13 17:20:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pets_examinations`
--

CREATE TABLE `pets_examinations` (
  `id` int(11) NOT NULL,
  `petId` int(11) DEFAULT NULL,
  `examinationId` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets_examinations`
--

INSERT INTO `pets_examinations` (`id`, `petId`, `examinationId`, `comments`, `appointment_id`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, 1, 'Τα ζωτικά σημεία είναι σταθερά και εντός φυσιολογικών ορίων', 6, 250, '2023-02-12 11:32:11', '2023-02-12 11:32:11', NULL),
(8, 1, 2, 'ιστορικό υψηλής αρτηριακής πίεσης και αυξημένα επίπεδα χοληστερόλης', 7, 50, '2023-02-12 11:33:31', '2023-02-12 11:33:31', NULL),
(11, 1, 1, 'Συνταγογραφήθηκε μια σειρά αντιβιοτικών για τη θεραπεία της λοίμωξης κόλπων', 7, 250, '2023-02-12 12:15:22', '2023-02-12 12:15:22', NULL),
(12, 3, 4, 'Παραπέμφθηκε ο ασθενής σε ειδικό για περαιτέρω αξιολόγηση του επίμονου βήχα.', 8, 35, '2023-02-12 16:53:32', '2023-02-13 11:41:46', NULL),
(13, 3, 2, 'βελτίωση στον πόνο στις αρθρώσεις μετά την έναρξη νέας φαρμακευτικής αγωγής.', 8, 50, '2023-02-13 12:09:43', '2023-02-13 12:09:43', NULL),
(16, 3, 5, 'βελτίωση στον πόνο στις αρθρώσεις μετά την έναρξη νέας φαρμακευτικής αγωγής.', 11, 95, '2023-02-13 17:26:50', '2023-02-13 17:26:50', NULL),
(17, 6, 6, 'Συνταγογραφήθηκε μια σειρά αντιβιοτικών για τη θεραπεία της λοίμωξης κόλπων', 13, 125, '2023-02-13 17:48:07', '2023-02-13 17:48:07', NULL),
(18, 3, 4, 'ιστορικό υψηλής αρτηριακής πίεσης και αυξημένα επίπεδα χοληστερόλης', 12, 35, '2023-02-13 17:48:43', '2023-02-13 17:48:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `afm` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--


INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `afm`, `email`, `telephone`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mario', '$2y$10$mB63lSKN8/0ZlPplwNpHTeWmntMn8BLjx8eSPuTvdYu5Czqq9qUq6', 'Μάριος Ευθυμίου', 123456789, 'mario@ninja.co.uk', '995574550', 'customer', '2023-02-09 17:33:15', '2023-02-13 13:56:31', '2023-02-13 13:56:31'),
(2, 'Απλός Χρήστης', '$2y$10$a1ssa4avQoIN5QeSBs2rROIisqv6FhnOJL3Z0mJCHeq4hDnWw3JVq', 'Γιώργος Αναστόπουλος', 123456788, 'user@yahoo.com', '145255444', 'customer', '2023-02-09 17:33:32', '2023-02-13 14:54:16', NULL),
(3, 'Γραμματεία', '$2y$10$mW.gvnrJ4D9W1i28SpRDfuyfRy3wWVCD2Z9elz31xHFlcU5W2Qxv6', 'Γραμματεία', 123456784, 'secretary@yahoo.com', '458855511', 'secretary', '2023-02-09 17:33:46', '2023-02-13 14:47:02', NULL),
(4, 'Ιατρός', '$2y$10$Phbo724GCzSWXcneO97VR.iDmq8ga5ijD4e5yBlOOYndHVBkW6oge', 'Ιατρός', 987654321, 'doctor@doctor.com', '458251456', 'doctor', '2023-02-09 17:34:13', '2023-02-13 15:06:13', NULL),
(5, 'Anna', '$2y$10$1C9ddWDtrZyswnuG/5sWROXb.xIaPW5/qhrGIiTZzV6q/QzPw/Q2S', 'Άννα Κωτσιάκη', 321456789, 'anna@anna.gmail.com', '1115555255', 'customer', '2023-02-09 17:34:31', '2023-02-09 17:34:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets_examinations`
--
ALTER TABLE `pets_examinations`
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
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pets_examinations`
--
ALTER TABLE `pets_examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

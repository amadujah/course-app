-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2020 at 04:26 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companies_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `libelle`, `etat`, `date`, `amount`, `user_id`, `created_at`, `updated_at`, `receipt`) VALUES
(27, 'Achat de denrées', 'en attente', '2020-01-10', NULL, 2, '2020-01-10 09:44:33', '2020-01-10 09:44:33', NULL),
(28, 'Achat d\'une montre', 'en attente', '2020-01-11', NULL, 2, '2020-01-10 09:45:46', '2020-01-10 09:45:46', NULL),
(8, 'course 1', 'en attente', '2020-01-30', NULL, 1, '2020-01-02 14:57:24', '2020-01-02 14:57:24', NULL),
(30, 'test', 'en attente', '2020-01-14', NULL, 7, '2020-01-10 10:39:47', '2020-01-10 10:39:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_product`
--

DROP TABLE IF EXISTS `course_product`;
CREATE TABLE IF NOT EXISTS `course_product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_product`
--

INSERT INTO `course_product` (`id`, `course_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 7, 3, NULL, NULL),
(2, 8, 3, NULL, NULL),
(3, 9, 3, NULL, NULL),
(4, 10, 1, NULL, NULL),
(5, 10, 2, NULL, NULL),
(6, 10, 3, NULL, NULL),
(7, 11, 2, NULL, NULL),
(8, 12, 2, NULL, NULL),
(9, 12, 3, NULL, NULL),
(10, 13, 2, NULL, NULL),
(11, 13, 3, NULL, NULL),
(12, 14, 1, NULL, NULL),
(13, 14, 2, NULL, NULL),
(14, 14, 3, NULL, NULL),
(15, 11, 2, NULL, NULL),
(16, 15, 16, NULL, NULL),
(17, 15, 15, NULL, NULL),
(18, 16, 19, NULL, NULL),
(19, 17, 19, NULL, NULL),
(20, 17, 20, NULL, NULL),
(21, 18, 19, NULL, NULL),
(22, 23, 19, NULL, NULL),
(23, 23, 20, NULL, NULL),
(24, 24, 19, NULL, NULL),
(25, 24, 20, NULL, NULL),
(26, 25, 19, NULL, NULL),
(27, 25, 20, NULL, NULL),
(28, 25, 22, NULL, NULL),
(29, 26, 37, NULL, NULL),
(30, 27, 44, NULL, NULL),
(31, 27, 46, NULL, NULL),
(32, 27, 47, NULL, NULL),
(33, 27, 49, NULL, NULL),
(34, 28, 48, NULL, NULL),
(35, 29, 44, NULL, NULL),
(36, 29, 44, NULL, NULL),
(37, 30, 46, NULL, NULL),
(38, 30, 49, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2019_12_26_140000_create_products_table', 1),
(34, '2019_12_27_143618_create_companies_table', 1),
(35, '2019_12_27_143700_create_courses_table', 1),
(36, '2019_12_27_180000_create_users_table', 1),
(37, '2020_01_02_154210_create_course_product_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('amad@gmail.com', '$2y$10$AbHOLJkVAJ2Gs10bGe/k3uKoU4TMCAnLfC8SjGJZAd6ZFpH7/HjTm', '2020-01-09 19:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disponibilite` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `price`, `libelle`, `categorie`, `image`, `disponibilite`, `quantity`, `created_at`, `updated_at`) VALUES
(44, 3, 'Lait de corps', 'ago', '2020-01-10-10-23-46-mon-lait-corps-unifiant-hydratant.jpg', 1, 12, '2020-01-10 09:23:46', '2020-01-10 09:23:46'),
(46, 4, 'Lait entier', 'ago', '2020-01-10-10-25-05-lait.jpg', 1, 1, '2020-01-10 09:25:05', '2020-01-10 09:25:05'),
(47, 2, 'Yaourt', 'ago', '2020-01-10-10-26-11-yaourt.jpg', 1, 2, '2020-01-10 09:26:11', '2020-01-10 09:26:11'),
(48, 520, 'Montre', 'multimedia', '2020-01-10-10-26-50-montre.jpg', 1, 1, '2020-01-10 09:26:50', '2020-01-10 09:26:50'),
(49, 5, 'Carottes', 'ago', '2020-01-10-10-27-21-carotte.jpeg', 1, 26, '2020-01-10 09:27:21', '2020-01-10 09:27:21'),
(50, 200, 'Laptop', 'multimedia', '2020-01-10-10-28-06-ordinateur1.jpg', 1, 1, '2020-01-10 09:28:06', '2020-01-10 09:28:06'),
(51, 350, 'Clean Laptop', 'multimedia', '2020-01-10-10-29-07-ordinateur.jpg', 1, 1, '2020-01-10 09:29:07', '2020-01-10 09:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `telephone`, `admin`, `name`, `adresse`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'amadoud.dia@test.com', '$2y$10$0MRuHrIMZDyP1ZA9sFBw8OTa1g.F71g.lgLcV9MkN.9/US32AP3VG', '0766712632', 0, 'Amadou Dia', '4 Avenue Gabriel Péri', '1bRL1kLd3nbZrS7iwSJEi1iZ0BsmYLYYzykUPW57mgHsimzMYx0FwpdA3IlQ', '2020-01-02 14:28:00', '2020-01-03 00:38:09'),
(2, 'amad@gmail.com', '$2y$10$cEz9QwYV.FWimvXlQny8guZJx80juC7eE4SHnpb.LvLO/OKvZ./Ru', '0766712632', 1, 'Amadou Dia', '14 square du docteur guerin', 'qThDGMyBa9gf6vIQ4uO1KXxhbg8vUBnXgifEefWZIdnJNaF1Ws9rabb42drM', '2020-01-05 19:32:31', '2020-01-08 10:52:30'),
(3, 'amadourou@tes.com', '$2y$10$sMXzsDVXnKPK.P58fDbrw.C.8JofJ6MwfnFau6IJyOxNGCJCPk6.i', NULL, 0, 'amadou', NULL, 'PdBdimxGwZ1d3H38mz7Y9vm7PUAvEmTOWx3JKbrvX7NvnGJ71cCVF99yy47K', '2020-01-07 10:38:06', '2020-01-07 10:38:06'),
(4, 'amadourou@test.com', '$2y$10$8scy05gtsYJPzjd.3RSeE.IIV4S7X2WGZAE8OZib4K4H59YSzByeq', NULL, 0, 'amadou', NULL, 'qCHGzNE1dkhHwZAwE3es7QyPvlwfzIspUuuCDeMi5SjuRheV9LLGnQzjKmeL', '2020-01-07 17:35:22', '2020-01-07 17:35:22'),
(5, 'amadou@gmail.com', '$2y$10$MEpyL3w.RZP4DuBrTX7Ih./U8zrk7sCLrBWhHzj/DFYtC/tM9WY66', NULL, 0, 'sadou barry', NULL, 'HIlJs8WqeVXQEO7bUFfNamYIHEDWQ6rBtMc8VNqOxwRYuC9X28F7aP5fccey', '2020-01-09 14:19:45', '2020-01-09 14:19:45'),
(6, 'stan@gmail.com', '$2y$10$6tHX2m3CJc3bCgGYXSAiDuY8rRntPUqPy1Z2ki5It1XKK1qLYNMay', NULL, 0, 'Stanilas Maco', NULL, 'TWsUbTTSIAZkssOHHfJbO0RW9xUEd1yCFFcChrtnNGDBEFHVzKxBgOA1F59u', '2020-01-10 10:24:53', '2020-01-10 10:24:53'),
(7, 'safi@gmail.com', '$2y$10$jcUbRLA92ADknh./YKHl6udAkMolDQs7kEeO2iGo0txncehKhtAI6', '0666712631', 0, 'Safiatou DIALLO', '14 square du docteur guerin', 'jPDz1m7A8uIjSSCLZO5EYHLFECoVraBeM4jsVUPhHYQv7ADdAFsNpeU2xEVx', '2020-01-10 10:33:24', '2020-01-10 10:38:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

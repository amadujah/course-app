-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2020 at 02:23 PM
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
  PRIMARY KEY (`id`),
  KEY `courses_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `libelle`, `etat`, `date`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 'course de safiatou', 'en attente', '2020-01-07', NULL, 2, '2020-01-07 10:22:48', '2020-01-07 10:22:48'),
(12, 'course 3', 'effectue', '2020-01-18', NULL, 2, '2020-01-05 20:36:10', '2020-01-05 20:36:10'),
(11, 'Seconde course modifiée', 'effectue', '2020-01-11', NULL, 2, '2020-01-05 20:35:37', '2020-01-07 10:40:16'),
(8, 'course 1', 'en attente', '2020-01-30', NULL, 1, '2020-01-02 14:57:24', '2020-01-02 14:57:24');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, 11, 2, NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `price`, `libelle`, `categorie`, `image`, `disponibilite`, `created_at`, `updated_at`) VALUES
(19, 1200, 'montre', 'Alimentation', '2020-01-07-12-54-11-MU9M2_AV2.jfif', 1, '2020-01-07 11:54:11', '2020-01-07 11:54:11'),
(18, 1000, 'test1', 'Loisirs', '2020-01-07-12-32-23-empt.PNG', 1, '2020-01-07 11:32:23', '2020-01-07 11:32:23'),
(17, 1250, 'test', 'Alimentation', '2020-01-07-12-31-02-konel.PNG', 1, '2020-01-07 11:31:02', '2020-01-07 11:31:02'),
(16, 1000, 'produit 1', 'Alimentation', '2020-01-07-12-30-39-konel.PNG', 1, '2020-01-07 11:30:39', '2020-01-07 11:30:39'),
(15, 1000, 'produit 1', 'Alimentation', '2020-01-07-12-29-03-konel.PNG', 1, '2020-01-07 11:29:03', '2020-01-07 11:29:03'),
(14, 1000, 'produit 1', 'Alimentation', '2020-01-07-12-27-58-konel.PNG', 1, '2020-01-07 11:27:58', '2020-01-07 11:27:58'),
(13, 1000, 'produit 1', 'Alimentation', '2020-01-07-12-27-54-konel.PNG', 1, '2020-01-07 11:27:54', '2020-01-07 11:27:54');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `telephone`, `admin`, `name`, `adresse`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'amadoud.dia@test.com', '$2y$10$0MRuHrIMZDyP1ZA9sFBw8OTa1g.F71g.lgLcV9MkN.9/US32AP3VG', '0766712632', 0, 'Amadou Dia', '4 Avenue Gabriel Péri', NULL, '2020-01-02 14:28:00', '2020-01-03 00:38:09'),
(2, 'amad@gmail.com', '$2y$10$cEz9QwYV.FWimvXlQny8guZJx80juC7eE4SHnpb.LvLO/OKvZ./Ru', '0766712631', 1, 'Amadou Dia', '14 square du docteur', '5zYgOj3SQuUEEB5LTPvmEa3FWUz3qJ3dUZXfPAHRMVTY9Crrsz6gDotKJQa6', '2020-01-05 19:32:31', '2020-01-07 10:29:29'),
(3, 'amadourou@tes.com', '$2y$10$sMXzsDVXnKPK.P58fDbrw.C.8JofJ6MwfnFau6IJyOxNGCJCPk6.i', NULL, 0, 'amadou', NULL, 'PdBdimxGwZ1d3H38mz7Y9vm7PUAvEmTOWx3JKbrvX7NvnGJ71cCVF99yy47K', '2020-01-07 10:38:06', '2020-01-07 10:38:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

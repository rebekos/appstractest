-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for appstractor
DROP DATABASE IF EXISTS `appstractor`;
CREATE DATABASE IF NOT EXISTS `appstractor` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `appstractor`;

-- Dumping structure for table appstractor.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table appstractor.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(5, '2020_03_10_144453_create_trips_table', 2),
	(6, '2020_03_12_195548_add_soft_delete_to_trips_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table appstractor.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table appstractor.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table appstractor.trips
DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table appstractor.trips: ~31 rows (approximately)
/*!40000 ALTER TABLE `trips` DISABLE KEYS */;
INSERT INTO `trips` (`id`, `user_id`, `country_name`, `departure_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 'United States', '2020-03-12', '2020-03-12 19:53:15', '2020-03-12 19:53:15', NULL),
	(6, 2, 'Israel', '2020-02-15', '2020-03-12 20:44:56', '2020-03-12 20:44:56', NULL),
	(7, 2, 'Israel', '2020-03-26', '2020-03-12 20:48:05', '2020-03-12 20:48:05', NULL),
	(8, 2, 'United States', '2020-03-19', '2020-03-12 21:31:03', '2020-03-12 21:31:03', NULL),
	(9, 2, 'United Kingdom', '2020-03-20', '2020-03-12 23:37:45', '2020-03-12 23:37:45', NULL),
	(24, 1, 'United States', '2020-03-18', '2020-03-13 00:13:35', '2020-03-13 00:13:35', NULL),
	(39, 1, 'Israel', '2020-03-23', '2020-03-13 00:29:51', '2020-03-13 02:52:00', '2020-03-13 02:52:00'),
	(47, 1, 'United Kingdom', '2020-04-15', '2020-03-13 00:37:48', '2020-03-13 03:01:01', '2020-03-13 03:01:01'),
	(48, 1, 'Israel', '2020-02-14', '2020-03-13 00:39:32', '2020-03-13 00:39:32', NULL),
	(49, 1, 'United States', '2020-03-14', '2020-03-13 00:41:33', '2020-03-13 00:41:33', NULL),
	(50, 1, 'Israel', '2020-03-28', '2020-03-13 02:52:18', '2020-03-13 02:52:24', '2020-03-13 02:52:24'),
	(51, 1, 'Israel', '2020-03-31', '2020-03-13 03:02:47', '2020-03-13 03:06:44', '2020-03-13 03:06:44'),
	(52, 1, 'United Kingdom', '2020-05-14', '2020-03-13 03:02:57', '2020-03-14 22:33:41', '2020-03-14 22:33:41'),
	(53, 1, 'United Kingdom', '2020-03-27', '2020-03-13 03:08:29', '2020-03-14 22:29:20', '2020-03-14 22:29:20'),
	(54, 1, 'Israel', '2020-03-28', '2020-03-13 03:08:48', '2020-03-14 21:01:59', '2020-03-14 21:01:59'),
	(55, 3, 'Israel', '2020-03-26', '2020-03-13 03:10:09', '2020-03-13 03:10:09', NULL),
	(56, 3, 'United Kingdom', '2020-06-29', '2020-03-13 03:10:17', '2020-03-13 03:13:01', '2020-03-13 03:13:01'),
	(57, 3, 'United Kingdom', '2020-06-29', '2020-03-13 03:10:17', '2020-03-13 03:22:10', '2020-03-13 03:22:10'),
	(58, 3, 'Israel', '2020-03-28', '2020-03-13 03:13:11', '2020-03-13 04:13:38', '2020-03-13 04:13:38'),
	(59, 3, 'Israel', '2020-03-24', '2020-03-13 04:13:50', '2020-03-13 04:13:50', NULL),
	(60, 3, 'United Kingdom', '2020-03-26', '2020-03-13 04:13:55', '2020-03-13 04:13:55', NULL),
	(61, 1, 'United States', '2020-03-28', '2020-03-14 20:50:59', '2020-03-14 21:41:03', '2020-03-14 21:41:03'),
	(62, 1, 'United States', '2020-03-28', '2020-03-14 21:46:52', '2020-03-14 22:28:46', '2020-03-14 22:28:46'),
	(63, 1, 'Israel', '2020-04-08', '2020-03-14 21:47:07', '2020-03-14 22:25:49', '2020-03-14 22:25:49'),
	(64, 1, 'Israel', '2020-03-26', '2020-03-14 22:35:59', '2020-03-14 22:38:02', '2020-03-14 22:38:02'),
	(65, 1, 'United States', '2020-03-31', '2020-03-14 22:36:06', '2020-03-14 22:36:10', '2020-03-14 22:36:10'),
	(66, 1, 'Israel', '2020-03-20', '2020-03-14 22:39:15', '2020-03-14 22:39:18', '2020-03-14 22:39:18'),
	(67, 1, 'United States', '2020-03-21', '2020-03-14 22:42:41', '2020-03-14 22:42:45', '2020-03-14 22:42:45'),
	(68, 1, 'United States', '2020-03-20', '2020-03-14 22:59:34', '2020-03-14 22:59:49', '2020-03-14 22:59:49'),
	(69, 1, 'United States', '2020-03-26', '2020-03-14 22:59:42', '2020-03-14 23:02:31', '2020-03-14 23:02:31'),
	(70, 1, 'Israel', '2020-03-25', '2020-03-14 23:03:46', '2020-03-14 23:03:49', '2020-03-14 23:03:49'),
	(71, 1, 'Israel', '2020-03-21', '2020-03-14 23:05:42', '2020-03-14 23:05:45', '2020-03-14 23:05:45'),
	(72, 1, 'Israel', '2020-03-20', '2020-03-14 23:11:11', '2020-03-14 23:11:15', '2020-03-14 23:11:15');
/*!40000 ALTER TABLE `trips` ENABLE KEYS */;

-- Dumping structure for table appstractor.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table appstractor.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'yossef partouche', 'ym.partouche@gmail.com', NULL, '$2y$10$jqYKZn2tNzCPyJG5yke8yOWHvA2/sJbsbwp2ofVniUMD/9KZerL4W', NULL, '2020-03-07 20:32:33', '2020-03-07 20:32:33'),
	(2, 'test toto', 'titi@titi.com', NULL, '$2y$10$RHlt9e//DpNAqBSJfY53b.V5fgoIsOJx.wrh0wI/zVqqryZjQX4my', NULL, '2020-03-07 20:34:26', '2020-03-07 20:34:26'),
	(3, 'David Israel', 't2@t.com', NULL, '$2y$10$8tIr7VsQpIfZz7w/0LMxIeYALluauzsOc2lebkLPyDGg9Pt4axuky', NULL, '2020-03-07 22:05:46', '2020-03-07 22:05:46'),
	(4, 'test 3', 't3@t.com', NULL, '$2y$10$pcTkXmz06qEVVQpjNdtIVuOykmHGOSVI7ZkD8maKdg.vGSIz/Ns/q', NULL, '2020-03-10 12:55:21', '2020-03-10 12:55:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

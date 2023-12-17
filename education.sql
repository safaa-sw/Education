-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2021 at 03:23 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `teacherId` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_ibfk_1` (`teacherId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `content`, `teacherId`, `photo`, `created_at`, `updated_at`) VALUES
(7, 'php course', 'learn php programing', 6, 'uploads/1616849779download (1).png', '2021-03-25 10:54:08', '2021-03-27 10:56:19'),
(8, 'hardware course', 'network', 6, 'uploads/1616849789download.jpg', '2021-03-26 13:07:38', '2021-03-27 10:56:29'),
(9, 'hardware course', 'network', 4, 'uploads/1616849727download (1).jpg', '2021-03-26 13:08:49', '2021-03-27 10:55:27'),
(10, 'hardware course', 'teeeeee', 6, 'uploads/1616849804download (6).jpg', '2021-03-26 13:11:11', '2021-03-27 10:56:44'),
(11, 'asp.net', 'asp.net mvc', 4, 'uploads/1616849737download (4).jpg', '2021-03-27 09:59:02', '2021-03-27 10:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_24_193016_create_courses_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2021_03_26_092749_add_type_to_users_table', 2),
(6, '2021_03_27_130238_create_profiles_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_userid_foreign` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `gender`, `address`, `photo`, `userId`, `created_at`, `updated_at`) VALUES
(3, 'female', 'my address editted', 'profile/16168580232.jpg', 6, '2021-03-27 13:07:21', '2021-03-27 13:13:43'),
(4, 'male', 'damascus', 'profile/16168584896.jpg', 7, '2021-03-27 13:21:29', '2021-03-27 13:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

DROP TABLE IF EXISTS `teacher_courses`;
CREATE TABLE IF NOT EXISTS `teacher_courses` (
  `id` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_courses_ibfk_1` (`courseId`),
  KEY `teacher_courses_ibfk_2` (`teacherId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`id`, `courseId`, `teacherId`) VALUES
(1, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(4, 'amani', 'amani@hotmail.com', NULL, '$2y$10$ovWhxASz9zzctHIQYTU1beGVTcR/VTPZ/WGdpyHrIrPUac3F4u8EC', NULL, '2021-03-26 08:55:42', '2021-03-26 08:55:42', 1),
(5, 'manal', 'manal@hotmail.com', NULL, '$2y$10$XMkQY9cUCIJL//JnBmwyfOJaukdeUVBv/Sfmnmk3HVj51Cs2xgGkS', NULL, '2021-03-26 09:21:47', '2021-03-26 09:21:47', 0),
(6, 'safaa khaled', 'safaa@hotmail.com', NULL, '$2y$10$zt0wBqsFDHZYqmWVtTXQX.bUUid9Rq390k2r354jEja2BNU3mdFuG', NULL, '2021-03-26 09:24:03', '2021-03-27 13:13:43', 1),
(7, 'bilal', 'bilal@hotmail.com', NULL, '$2y$10$8Zk919Hko1oyFo/AHYsDp.gowNJr/ISlFfnFClznusGngIaoXjvBy', NULL, '2021-03-26 09:26:13', '2021-03-26 09:26:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_courses`
--

DROP TABLE IF EXISTS `users_courses`;
CREATE TABLE IF NOT EXISTS `users_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_courses_ibfk_1` (`courseId`),
  KEY `users_courses_ibfk_2` (`studentId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_courses`
--

INSERT INTO `users_courses` (`id`, `courseId`, `studentId`) VALUES
(2, 7, 6),
(3, 7, 7),
(4, 8, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `users` (`id`);

--
-- Constraints for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD CONSTRAINT `teacher_courses_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `teacher_courses_ibfk_2` FOREIGN KEY (`teacherId`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD CONSTRAINT `users_courses_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `users_courses_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

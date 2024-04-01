-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 fév. 2024 à 18:06
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `schoolmanagement`
--

-- --------------------------------------------------------

--
-- Structure de la table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `stream_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `stream_id`, `year_id`, `class_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 4, 2, 1, NULL, '2024-01-15 23:47:49'),
(2, 3, NULL, 4, 5, 4, 3, '2024-01-11 07:09:02', '2024-01-15 23:47:17'),
(3, 2, NULL, 2, 3, 1, 1, '2024-01-11 07:14:33', '2024-01-11 07:14:33'),
(4, 3, NULL, 3, 4, 3, 3, '2024-01-12 11:58:42', '2024-01-12 11:58:42'),
(5, 1, 1, 4, 5, 2, 3, '2024-01-12 12:25:14', '2024-01-15 15:14:57'),
(6, 3, 3, 1, 1, 1, 1, '2024-01-15 01:58:35', '2024-01-15 23:50:09'),
(7, 12, NULL, 3, 3, 2, 3, '2024-01-15 23:42:15', '2024-01-15 23:42:15'),
(8, 10, 5, 2, 3, 6, 5, '2024-01-15 23:51:10', '2024-01-17 14:34:23'),
(9, 2, NULL, 3, 1, 1, 1, '2024-01-15 23:57:32', '2024-01-15 23:57:32'),
(10, 8, 6, 2, 2, 2, 3, '2024-01-15 23:58:52', '2024-01-16 00:04:38'),
(11, 11, NULL, 3, 3, 4, 4, '2024-01-16 00:00:06', '2024-01-16 00:00:06'),
(12, 25, NULL, 4, 4, 5, 4, '2024-01-16 00:01:18', '2024-01-16 00:01:18'),
(13, 9, NULL, 1, 2, 1, 1, '2024-01-16 13:46:15', '2024-01-16 13:46:15'),
(14, 3, 32, 3, 3, 1, 1, '2024-01-17 01:04:10', '2024-01-17 01:04:10'),
(15, 4, NULL, 2, 2, 4, 1, '2024-01-17 01:30:27', '2024-01-17 01:30:27'),
(16, 5, NULL, 2, 3, 2, 3, '2024-01-17 01:37:36', '2024-01-17 01:37:36'),
(17, 6, 5, 2, 3, 4, 1, '2024-01-17 01:44:07', '2024-01-17 01:44:07'),
(18, 10, 9, 3, 2, 4, 1, '2024-01-17 14:15:36', '2024-01-17 14:24:52'),
(19, 11, NULL, 1, 1, 1, 1, '2024-01-17 14:42:39', '2024-01-17 14:42:39'),
(20, 12, 60, 2, 2, 2, 3, '2024-01-17 14:44:54', '2024-01-17 14:44:54'),
(21, 13, NULL, 3, 3, 4, 5, '2024-01-17 14:46:42', '2024-01-17 14:46:42'),
(22, 14, 34, 1, 1, 1, 1, '2024-01-18 06:57:38', '2024-01-18 06:57:38'),
(23, 15, 12, 1, 1, 1, 1, '2024-01-18 06:59:56', '2024-01-18 07:17:41'),
(24, 16, 6, 3, 3, 4, 5, '2024-01-18 07:05:19', '2024-01-18 07:05:19'),
(25, 17, 8, 1, 1, 1, 1, '2024-01-18 09:50:44', '2024-01-18 09:50:44'),
(26, 20, 2101, 2, 4, 4, 3, '2024-01-18 10:30:25', '2024-01-18 10:54:23'),
(27, 21, NULL, 3, 8, 6, 5, '2024-01-18 10:32:34', '2024-01-18 10:32:34'),
(28, 22, 2100, 7, 8, 6, 5, '2024-01-18 10:34:16', '2024-01-18 10:52:42'),
(29, 23, NULL, 3, 1, 1, 1, '2024-01-18 10:35:57', '2024-01-18 10:35:57'),
(30, 28, NULL, 1, 1, 1, 1, '2024-01-18 21:54:49', '2024-01-18 21:54:49');

-- --------------------------------------------------------

--
-- Structure de la table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stream_id` int(11) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `stream_id`, `term_id`, `subject_id`, `class_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 2, 100, 50, 50, '2023-11-22 12:06:12', '2023-11-22 12:06:12'),
(2, 3, 1, 7, 1, 100, 50, 50, '2023-11-22 13:01:13', '2023-11-22 13:17:10'),
(3, NULL, NULL, 4, 1, 100, 50, 50, '2024-01-15 17:05:58', '2024-01-15 17:05:58'),
(4, NULL, NULL, 12, 4, 100, 50, 40, '2024-01-15 18:52:54', '2024-01-15 18:52:54'),
(87, NULL, NULL, 11, 4, 90, 40, 35, '2024-01-15 18:52:54', '2024-01-15 18:52:54'),
(88, NULL, NULL, 8, 6, 100, 60, 40, '2024-01-18 10:47:11', '2024-01-18 10:47:11'),
(89, NULL, NULL, 9, 4, 100, 60, 40, '2024-01-18 10:48:18', '2024-01-18 10:48:18'),
(90, NULL, NULL, 8, 4, 100, 60, 40, '2024-01-18 10:48:53', '2024-01-18 10:48:53'),
(91, NULL, NULL, 4, 1, 100, 50, 50, '2024-01-18 10:49:42', '2024-01-18 10:49:42'),
(92, NULL, NULL, 7, 1, 100, 50, 50, '2024-01-18 10:49:42', '2024-01-18 10:49:42'),
(93, NULL, NULL, 8, 1, 100, 50, 50, '2024-01-18 10:49:42', '2024-01-18 10:49:42'),
(94, NULL, NULL, 8, 6, 100, 60, 40, '2024-01-18 10:50:40', '2024-01-18 10:50:40'),
(95, NULL, NULL, 7, 6, 100, 60, 50, '2024-01-18 10:50:40', '2024-01-18 10:50:40'),
(96, NULL, NULL, 4, 1, 100, 50, 50, '2024-01-18 10:50:55', '2024-01-18 10:50:55'),
(97, NULL, NULL, 4, 1, 100, 50, 50, '2024-01-18 10:50:55', '2024-01-18 10:50:55'),
(98, NULL, NULL, 7, 1, 100, 50, 50, '2024-01-18 10:50:55', '2024-01-18 10:50:55'),
(99, NULL, NULL, 7, 1, 100, 50, 50, '2024-01-18 10:50:55', '2024-01-18 10:50:55'),
(100, NULL, NULL, 8, 1, 100, 50, 50, '2024-01-18 10:50:55', '2024-01-18 10:50:55'),
(101, NULL, NULL, 8, 4, 100, 60, 40, '2024-01-18 10:51:03', '2024-01-18 10:51:03'),
(102, NULL, NULL, 9, 4, 100, 60, 40, '2024-01-18 10:51:03', '2024-01-18 10:51:03'),
(103, NULL, NULL, 11, 4, 90, 40, 35, '2024-01-18 10:51:03', '2024-01-18 10:51:03'),
(104, NULL, NULL, 12, 4, 100, 50, 40, '2024-01-18 10:51:03', '2024-01-18 10:51:03');

-- --------------------------------------------------------

--
-- Structure de la table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Head Teacher', '2023-11-14 08:59:14', '2023-11-14 08:59:14'),
(3, 'Assistant Teacher', '2023-11-14 08:59:31', '2023-11-14 08:59:31'),
(5, 'Teacher', '2023-11-14 09:01:55', '2023-11-14 09:01:55');

-- --------------------------------------------------------

--
-- Structure de la table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2000, '2023-11-23 14:40:11', '2023-11-23 14:40:11'),
(2, 3, 1, 200000, '2023-11-23 14:47:33', '2023-11-23 14:47:33'),
(3, 3, 1, 50, '2023-11-25 05:05:11', '2023-11-25 05:05:11'),
(4, 4, 1, 60, '2023-11-25 05:06:46', '2023-11-25 05:06:46'),
(5, 5, 1, 40, '2023-11-25 05:08:41', '2023-11-25 05:08:41'),
(6, 6, 1, 30, '2023-11-25 05:10:49', '2023-11-25 05:10:49'),
(7, 7, 1, 3000, '2024-01-09 10:41:20', '2024-01-09 10:41:20'),
(8, 8, 1, 506, '2024-01-10 10:57:17', '2024-01-17 14:35:09'),
(9, 2, 1, 60000, '2024-01-11 07:09:02', '2024-01-15 23:47:17'),
(10, 3, 1, 500, '2024-01-11 07:14:33', '2024-01-11 07:14:33'),
(11, 4, 1, 6000, '2024-01-12 11:58:42', '2024-01-12 11:58:42'),
(12, 5, 1, 6000, '2024-01-12 12:25:14', '2024-01-12 12:25:14'),
(13, 6, 1, 50, '2024-01-15 01:58:35', '2024-01-15 01:58:35'),
(14, 7, 1, 30, '2024-01-15 23:42:15', '2024-01-15 23:42:15'),
(15, 8, 1, 506, '2024-01-15 23:51:10', '2024-01-15 23:51:10'),
(16, 9, 1, 30, '2024-01-15 23:57:32', '2024-01-15 23:57:32'),
(17, 10, 1, 50, '2024-01-15 23:58:52', '2024-01-15 23:58:52'),
(18, 11, 1, 60, '2024-01-16 00:00:06', '2024-01-16 00:00:06'),
(19, 12, 1, 30, '2024-01-16 00:01:18', '2024-01-16 00:01:18'),
(20, 13, 1, 60, '2024-01-16 13:46:15', '2024-01-16 13:46:15'),
(21, 14, 1, 200, '2024-01-17 01:04:10', '2024-01-17 01:04:10'),
(22, 15, 1, 400, '2024-01-17 01:30:27', '2024-01-17 01:30:27'),
(23, 16, 1, 4, '2024-01-17 01:37:36', '2024-01-17 01:37:36'),
(24, 17, 1, 43, '2024-01-17 01:44:07', '2024-01-17 01:44:07'),
(25, 18, 1, 25, '2024-01-17 14:15:36', '2024-01-17 14:15:36'),
(26, 19, 1, 40, '2024-01-17 14:42:39', '2024-01-17 14:42:39'),
(27, 20, 1, 90, '2024-01-17 14:44:54', '2024-01-17 14:44:54'),
(28, 21, 1, 80, '2024-01-17 14:46:42', '2024-01-17 14:46:42'),
(29, 22, 1, 50, '2024-01-18 06:57:38', '2024-01-18 06:57:38'),
(30, 23, 1, 400, '2024-01-18 06:59:56', '2024-01-18 07:00:32'),
(31, 24, 1, 30, '2024-01-18 07:05:19', '2024-01-18 07:05:19'),
(32, 25, 1, 0, '2024-01-18 09:50:44', '2024-01-18 09:50:44'),
(33, 26, 1, 0, '2024-01-18 10:30:25', '2024-01-18 10:30:25'),
(34, 27, 1, 30, '2024-01-18 10:32:34', '2024-01-18 10:32:34'),
(35, 28, 1, 0, '2024-01-18 10:34:16', '2024-01-18 10:34:16'),
(36, 29, 1, 0, '2024-01-18 10:35:57', '2024-01-18 10:35:57'),
(37, 30, 1, 50, '2024-01-18 21:54:49', '2024-01-18 21:54:49');

-- --------------------------------------------------------

--
-- Structure de la table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mock exam', '2023-11-14 05:30:12', '2023-11-18 11:19:19'),
(2, 'Final Exam', '2023-11-14 08:20:31', '2023-11-14 08:20:31'),
(4, 'Quiz', '2023-11-18 11:18:08', '2023-11-18 11:18:20');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', '2023-11-14 05:29:37', '2023-11-18 11:16:15'),
(2, 'Admission Fees', '2023-11-14 05:56:25', '2023-11-14 05:56:25'),
(3, 'Textbook fees', '2023-11-14 05:57:41', '2023-11-15 11:16:30'),
(4, 'Developpment fees', '2023-11-15 11:16:55', '2023-11-15 11:16:55'),
(5, 'Exam fee', '2024-01-17 11:29:09', '2024-01-17 11:29:09');

-- --------------------------------------------------------

--
-- Structure de la table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 2099, '2023-11-18 11:17:11', '2023-11-18 11:17:11'),
(6, 5, 2, 290000, '2023-11-18 11:17:11', '2023-11-18 11:17:11'),
(10, 5, 1, 2000, '2024-01-07 22:59:16', '2024-01-07 22:59:16'),
(12, 1, 1, 29090, '2024-01-17 11:36:08', '2024-01-17 11:36:08'),
(13, 1, 1, 30000, '2024-01-17 11:36:08', '2024-01-17 11:36:08'),
(14, 2, 1, 400000, '2024-01-17 11:37:16', '2024-01-17 11:37:16'),
(15, 2, 2, 200000, '2024-01-17 11:37:16', '2024-01-17 11:37:16'),
(16, 2, 3, 200000, '2024-01-17 11:37:16', '2024-01-17 11:37:16'),
(17, 3, 2, 200000, '2024-01-17 11:37:40', '2024-01-17 11:37:40');

-- --------------------------------------------------------

--
-- Structure de la table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `grade_point` varchar(255) NOT NULL,
  `start_marks` varchar(255) NOT NULL,
  `end_marks` varchar(255) NOT NULL,
  `start_point` varchar(255) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 'A+', '5.00', '80', '100', '5.00', '5.00', 'Excellent', '2024-01-16 12:58:35', '2024-01-16 13:27:39'),
(3, 'A', '4.00', '70', '79', '4.00', '4.00', 'very Good', '2024-01-16 13:29:13', '2024-01-16 13:29:13'),
(4, 'A-', '3.50', '60', '69', '3.50', '3.50', 'Good', '2024-01-16 13:29:54', '2024-01-16 13:29:54'),
(5, 'B', '3.00', '50', '59', '3.00', '3.00', 'Average', '2024-01-16 13:30:41', '2024-01-16 13:30:41'),
(6, 'C', '2.00', '40', '49', '2.00', '2.00', 'Fair Good', '2024-01-16 13:31:47', '2024-01-16 13:31:47');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_21_143501_create_sessions_table', 1),
(7, '2023_10_22_180509_create_student_classes_table', 1),
(8, '2023_10_23_171114_create_student_years_table', 1),
(9, '2023_10_23_185352_create_student_departments_table', 1),
(10, '2023_10_24_103243_create_student_shifts_table', 1),
(11, '2023_10_25_112018_create_fee_categories_table', 1),
(12, '2023_10_28_174413_create_fee_category_amounts_table', 1),
(13, '2023_10_31_115510_create_exam_types_table', 1),
(14, '2023_10_31_122518_create_school_subjects_table', 1),
(15, '2023_10_31_125547_create_assign_subjects_table', 1),
(16, '2023_10_31_191039_semester', 1),
(17, '2023_11_01_164340_create_designations_table', 1),
(18, '2023_11_14_083351_add_mobile_field_to_users', 2),
(19, '2023_11_14_083845_add_address_field_to_users', 3),
(20, '2023_11_14_084343_add_gender_field_to_users', 3),
(21, '2023_11_14_085046_add_images_field_to_users', 4),
(22, '2023_11_14_112331_add_images_field_to_users', 5),
(23, '2023_11_15_154932_create_student_streams_table', 6),
(25, '2014_10_12_000000_create_users_table', 7),
(26, '2023_11_15_190053_create_terms_table', 7),
(27, '2023_11_21_214107_create_assign_students_table', 8),
(28, '2023_11_21_220634_create_discount_students_table', 8),
(29, '2024_01_13_231244_create_teacher_sallary_logs_table', 9),
(30, '2024_01_15_154153_create_student_marks_table', 10),
(31, '2024_01_15_214425_create_student_marks_table', 11),
(32, '2024_01_16_122854_create_marks_grades_table', 12),
(33, '2024_01_16_125619_create_student_marks_table', 13),
(34, '2024_02_10_195734_create_account_student_fees_table', 14);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Biology', '2023-11-14 06:18:08', '2023-11-18 11:37:40'),
(2, 'Chemistry', '2023-11-14 06:20:03', '2023-11-18 11:38:03'),
(3, 'Commerce', '2023-11-18 11:36:17', '2023-11-18 11:36:17'),
(4, 'Economics', '2023-11-18 11:36:35', '2023-11-18 11:36:35'),
(5, 'Accounting', '2023-11-18 11:36:43', '2023-11-18 11:36:43'),
(6, 'General Science', '2023-11-18 11:36:58', '2023-11-18 11:36:58'),
(7, 'English Language', '2023-11-18 11:37:28', '2023-11-18 11:37:28'),
(8, 'Mathematics', '2023-11-18 11:38:19', '2023-11-18 11:38:19'),
(9, 'ICT', '2023-11-18 11:38:51', '2023-11-18 11:38:51'),
(10, 'Islamic Staudies', '2023-11-18 11:39:20', '2023-11-18 11:39:20'),
(11, 'French', '2023-11-18 11:39:29', '2023-11-18 11:39:29'),
(12, 'Home Science', '2023-11-18 11:40:15', '2023-11-18 11:40:15');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AKApAh9yNV4bVG5MhKfnsQyxKFXibRNYoszpqpkH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZTlocmkyUXVaV3JNaVpLbnA0TEVoVUxtbnp1SDdNWFRCMm1VdnBCYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy9yZWcvZmVlL3ZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHBlT0NXM004bTN3cGNBMU9JYkRtcHVPaVR5LnFGZXdUcjRSbERaUVNVS2xYOUJvUzJJbzFLIjt9', 1707670569);

-- --------------------------------------------------------

--
-- Structure de la table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'class 1', NULL, NULL),
(2, 'class 2', '2024-01-15 11:00:35', '2024-01-15 11:00:35'),
(4, 'class 3', NULL, NULL),
(6, 'class 4', '2024-01-17 11:25:28', '2024-01-17 11:25:28');

-- --------------------------------------------------------

--
-- Structure de la table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id=user_id',
  `id_number` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stream_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) NOT NULL,
  `examTyp_id` int(11) NOT NULL,
  `marks` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_number`, `year_id`, `class_id`, `stream_id`, `assign_subject_id`, `examTyp_id`, `marks`, `created_at`, `updated_at`) VALUES
(1, 19, 20190017, 1, 1, NULL, 2, 2, 90, '2024-01-16 06:59:35', '2024-01-16 06:59:35'),
(2, 22, 20190022, 1, 1, NULL, 2, 2, 90, '2024-01-16 06:59:35', '2024-01-16 06:59:35'),
(3, 21, 20210020, 3, 2, NULL, 1, 1, 90, '2024-01-16 07:00:13', '2024-01-16 07:00:13'),
(4, 24, 20210024, 3, 4, NULL, 86, 1, 60, '2024-01-16 07:00:51', '2024-01-16 07:00:51'),
(5, 19, 20190017, 1, 1, NULL, 2, 1, 90, '2024-01-16 07:20:09', '2024-01-16 07:20:09'),
(6, 22, 20190022, 1, 1, NULL, 2, 1, 90, '2024-01-16 07:20:09', '2024-01-16 07:20:09'),
(7, 8, 2005010003, 2, 2, NULL, 1, 1, 90, '2024-01-17 14:48:42', '2024-01-17 14:48:42'),
(8, 12, 20200012, 2, 2, NULL, 1, 1, 80, '2024-01-17 14:48:42', '2024-01-17 14:48:42'),
(9, 8, 2005010003, 2, 2, NULL, 1, 1, 70, '2024-01-17 14:49:22', '2024-01-17 14:49:22'),
(10, 12, 20200012, 2, 2, NULL, 1, 1, 65, '2024-01-17 14:49:22', '2024-01-17 14:49:22'),
(11, 1, 1978010001, 4, 2, NULL, 1, 1, 90, '2024-01-17 14:55:04', '2024-01-17 14:55:04'),
(12, 21, 20240021, 8, 6, NULL, 94, 1, 20, '2024-01-18 21:53:21', '2024-01-18 21:53:21'),
(13, 22, 20240022, 8, 6, NULL, 94, 1, 50, '2024-01-18 21:53:21', '2024-01-18 21:53:21');

-- --------------------------------------------------------

--
-- Structure de la table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', '2023-11-14 06:01:19', '2023-11-22 08:59:01'),
(3, 'Shift B', '2023-11-14 06:01:45', '2023-11-22 08:59:10'),
(5, 'Shift C', '2024-01-17 11:28:04', '2024-01-17 11:28:04');

-- --------------------------------------------------------

--
-- Structure de la table `student_streams`
--

CREATE TABLE `student_streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student_streams`
--

INSERT INTO `student_streams` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Arts/Humanities', NULL, '2023-11-15 11:00:51', '2023-11-23 11:05:03'),
(2, 'Social Science', NULL, '2023-11-15 11:03:32', '2023-11-15 12:30:54'),
(3, 'Maths', NULL, '2023-11-18 11:15:46', '2023-11-18 11:15:55'),
(7, 'Commmerce', NULL, '2024-01-17 11:27:15', '2024-01-17 11:27:15');

-- --------------------------------------------------------

--
-- Structure de la table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2019', '2023-11-14 05:25:31', '2023-11-24 13:36:44'),
(2, '2020', '2023-11-14 06:04:55', '2023-11-24 13:36:56'),
(3, '2021', '2023-11-14 06:06:12', '2023-11-24 13:37:04'),
(4, '2022', '2023-11-18 11:14:54', '2023-11-24 13:37:12'),
(8, '2024', '2024-01-17 11:26:28', '2024-01-17 11:26:28');

-- --------------------------------------------------------

--
-- Structure de la table `teacher_sallary_logs`
--

CREATE TABLE `teacher_sallary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL COMMENT 'teacher_id=User_id',
  `stream_id` int(11) NOT NULL COMMENT 'stream_id=User_id',
  `subject_id` int(11) DEFAULT NULL COMMENT 'subject_id=User_id',
  `term_id` int(11) DEFAULT NULL COMMENT 'term__id=User_id',
  `privious_salary` int(11) NOT NULL,
  `present_salary` int(11) NOT NULL,
  `increment_salary` int(11) NOT NULL,
  `effected_salary` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teacher_sallary_logs`
--

INSERT INTO `teacher_sallary_logs` (`id`, `teacher_id`, `stream_id`, `subject_id`, `term_id`, `privious_salary`, `present_salary`, `increment_salary`, `effected_salary`, `created_at`, `updated_at`) VALUES
(1, 7, 3, NULL, NULL, 2330, 2330, 0, '2024-01-08', '2024-01-14 06:34:55', '2024-01-14 06:34:55'),
(6, 15, 4, NULL, NULL, 20000, 20000, 0, '1976-12-01', '2024-01-14 09:21:30', '2024-01-14 09:21:30'),
(7, 16, 2, NULL, NULL, 2330, 2330, 0, '2024-01-14', '2024-01-14 10:35:16', '2024-01-14 10:35:16'),
(8, 17, 3, NULL, NULL, 49, 49, 0, '2024-01-16', '2024-01-14 11:13:15', '2024-01-14 11:13:15'),
(9, 2, 2, NULL, NULL, 2100, 2100, 0, '1978-01-10', '2024-01-16 23:50:28', '2024-01-16 23:50:28'),
(10, 8, 3, NULL, NULL, 200, 200, 0, '2005-01-03', '2024-01-17 12:04:52', '2024-01-17 12:04:52'),
(11, 9, 3, NULL, NULL, 200, 200, 0, '2024-01-10', '2024-01-17 12:09:07', '2024-01-17 12:09:07'),
(12, 18, 2, NULL, NULL, 2500, 2500, 0, '2016-11-15', '2024-01-18 10:00:36', '2024-01-18 10:00:36'),
(13, 24, 1, NULL, NULL, 3500, 3500, 0, '2021-11-13', '2024-01-18 10:38:40', '2024-01-18 10:38:40'),
(14, 25, 2, NULL, NULL, 4500, 4500, 0, '2022-02-12', '2024-01-18 10:40:44', '2024-01-18 10:40:44'),
(15, 26, 3, NULL, NULL, 3000, 3000, 0, '2024-01-01', '2024-01-18 10:42:41', '2024-01-18 10:42:41'),
(16, 27, 7, NULL, NULL, 3000, 3000, 0, '2024-01-01', '2024-01-18 10:45:29', '2024-01-18 10:45:29');

-- --------------------------------------------------------

--
-- Structure de la table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `terms`
--

INSERT INTO `terms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '3rd terms', '2024-01-15 10:36:35', '2024-01-15 10:36:35'),
(2, '1st term', NULL, NULL),
(3, '2rd term', '2023-11-22 12:05:26', '2023-11-22 12:05:26');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) DEFAULT NULL COMMENT 'Admin,Student,Parents,Teacher',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `mothername` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT 'Admin=head of software,Teacher=teachers,user =Student,Parents= parents',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `images`, `fathername`, `mothername`, `religion`, `id_number`, `birthday`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'ceesay', 'admin@gmail.com', NULL, '$2y$10$peOCW3M8m3wpcA1OIbDmpuOiTy.qFewTr4RlDZQSUKlX9BoS2Io1K', '2693200809', NULL, 'Male', '202401171748202012112307patrick2.jpg', 'Youssouf', 'Hadjira', NULL, '1978010001', NULL, '26092', 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-16 23:39:14', '2024-01-17 11:18:03'),
(2, 'Teacher', 'Aliou', 'hassan@gmail.com', NULL, '$2y$10$mXl/Pkith8/ycY6gUFSfde5kNiMLgXSlfgcjWdPsdDWn35/de6n7W', '428435680', 'Bazard', 'Male', '202401171748202012112307patrick2.jpg', 'wurry', 'FATIMA', 'Islam', '1978010001', '1970-01-01', '549815', 'Teacher', '1978-01-10', 3, 3500, 1, NULL, NULL, NULL, '2024-01-16 23:50:28', '2024-01-17 11:48:38'),
(14, 'Student', 'Isoimi', 'nasser@gmail.com', NULL, '$2y$10$zZMgcaawkroCxJv6j.wXCuWuw0lfiCJ12kHaUcmxWsFj.epRUcWxK', '394406575', 'Morni', 'Female', '202401181257202012022202Kevin-website.jpg', 'Ali', 'Fatima', 'Islam', '20190001', '2024-01-10', '65352', 'Student', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 06:57:38', '2024-01-18 06:57:38'),
(15, 'Student', 'Barry', 'cessey@gmail.com', NULL, '$2y$10$60gc7cQcTU6tmIKZa2le.O6giKUdM1UmjqVMwlkg8kB//f04mrsAi', '2049656', 'Gamia Borad Bazar', 'Male', '202401181259202012022210Stan1.jpg', 'Ebra', 'Mariama', 'Islam', '20200015', '1990-01-09', '40', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 06:59:56', '2024-01-18 06:59:56'),
(16, 'Student', 'Nsam', 'nairia@gmail.com', NULL, '$2y$10$K7gOjNo6gJhoIbQaHkah/eOo1ltHdnaIqhunPCreOVmFjmhZMgDHK', '302030', 'Comoroes', 'Male', '202401181305202012031937student-profile.jpg', 'Youssouf', 'Nairia', 'Christan', '20210016', '1997-11-05', '4417', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 07:05:19', '2024-01-18 07:05:19'),
(17, 'Student', 'Alhaji Bah', 'alhajbah@gmail.com', NULL, '$2y$10$lssXT1rZ5BewDNYONzcwBum0q2.1.kzvgBDhpwP3f0s.1m1SLeu9C', '01575766', 'Gazipur', 'Male', '202401181550202012032017tobinsouth_vrs_2017-18.jpeg', 'Moudu Bah', 'Hawa Bah', 'Islam', '20190017', '1995-11-07', '65582', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 09:50:44', '2024-01-18 09:50:44'),
(18, 'Teacher', 'Ramu', 'ramu@gmail.com', NULL, '$2y$10$h6DGLclOwJAJLH/nC.WbZeF3PnjRUMW3eZkobwz76KSu533ctCIMy', '01575444', 'Banjul', 'Female', '202401181600202012031950IMG_9991-1200x800.jpg', 'Ismaila', 'Soffie', 'Islam', '2016110003', '1970-01-01', '76213', 'Teacher', '2016-11-15', 2, 2500, 1, NULL, NULL, NULL, '2024-01-18 10:00:36', '2024-01-18 10:12:32'),
(20, 'Student', 'hassan khan', 'hassankhan@gmail.com', NULL, '$2y$10$17pQp9Z7NDhZ3EDaAJY.uuLX1/m1xwFjxSMQLohqWw5qlBymXVizq', '015757444', 'Bakau', 'Male', '202401181630WhatsApp Image 2024-01-18 at 22.19.25_38ae57b4.jpg', 'momodou khan', 'isa jaw', 'Islam', '20220018', '1998-12-12', '26986', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 10:30:25', '2024-01-18 10:30:25'),
(21, 'Student', 'isa manneh', 'manneh@gamil.com', NULL, '$2y$10$CKbKXbUyZJ.0gyhPjDsAx.bQ/3mRJ07WGmd5b11LfeyXgM2nU6HBO', '015755443', 'bansang', 'Female', '202401181632WhatsApp Image 2024-01-18 at 22.24.34_9f476c2b.jpg', 'abdou manneh', 'manda ceesay', 'Islam', '20240021', '1995-12-04', '98124', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 10:32:34', '2024-01-18 10:32:34'),
(22, 'Student', 'fatou jatta', 'jatta@gmail.com', NULL, '$2y$10$56OYDT7ERT.hdl2PUVDLReGkZR2AchW2uinBSEPTlmguWWivxKc6q', '014545766', 'basse', 'Female', '202401181634WhatsApp Image 2024-01-18 at 22.19.26_3e6337f0.jpg', 'lai jatta', 'mam jatta', 'Islam', '20240022', '1994-12-13', '94142', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 10:34:16', '2024-01-18 10:34:16'),
(23, 'Student', 'ebrima ceesay', 'eceesay@gmail.com', NULL, '$2y$10$/sRtyjl57DYOT2ZrC581M.ONFhHlVymWKJPXKU2ZnStVMq3BvxsJu', '015656444', 'sambel', 'Male', '202401181635WhatsApp Image 2024-01-18 at 22.19.23_41c49212.jpg', 'jabang ceesay', 'ousman ceesay', 'Islam', '20190023', '1999-12-14', '45526', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 10:35:57', '2024-01-18 10:35:57'),
(24, 'Teacher', 'ousman sanyang', 'sanyang@gmail.com', NULL, '$2y$10$52jQm1LSU/dg.WLuBL0Zm.xUa/gRC2YV5JbSFo4cUHX5JnSJPJ0vG', '015656544', 'soma', 'Male', '202401181638WhatsApp Image 2024-01-18 at 22.22.41_d4c880c1.jpg', 'malamin sanyang', 'penda sow', 'Islam', '2021110019', '1970-01-01', '59371', NULL, '2021-11-13', 3, 3500, 1, NULL, NULL, NULL, '2024-01-18 10:38:40', '2024-01-18 10:38:40'),
(25, 'Teacher', 'haruna bah', 'haruna@gmail.com', NULL, '$2y$10$uMI7fMu84N7ab/ztNSUbgu5ewjRAH1PKAr.GHfo4eEQXftzEqFEp6', '015656588', 'yundum', 'Male', '202401181640WhatsApp Image 2024-01-18 at 22.23.18_7a0f3255.jpg', 'mamadou bah', 'isatou jallow', 'Islam', '2022020025', '1970-01-01', '26732', NULL, '2022-02-12', 2, 4500, 1, NULL, NULL, NULL, '2024-01-18 10:40:44', '2024-01-18 10:40:44'),
(26, 'Teacher', 'Bintou sowe', 'bintou@gmail.com', NULL, '$2y$10$ySiCfMtWpRPV.wO.aFuQB.h6dLmpemaJ6t7IM.bQFDs4QycRc8d5e', '015656599', 'soma', 'Female', '202401181642WhatsApp Image 2024-01-18 at 22.23.03_ebe98953.jpg', 'buba sowe', 'matta bah', 'Islam', '2024010026', '1970-01-01', '53517', NULL, '2024-01-01', 3, 3000, 1, NULL, NULL, NULL, '2024-01-18 10:42:41', '2024-01-18 10:42:41'),
(27, 'Teacher', 'lamin ceesay', 'laminceesay@gmail.com', NULL, '$2y$10$SyNC0mgLUc8xPbpu9Cy5U.dhS6qpoZ7Y.fvv1FyU2j2gP0WxWSpDi', '015457444', 'santato', 'Male', '202401181645WhatsApp Image 2024-01-18 at 22.19.25_38ae57b4.jpg', 'malang ceesay', 'jabou ceesay', 'Islam', '2024010027', '1970-01-01', '21072', NULL, '2024-01-01', 3, 3000, 1, NULL, NULL, NULL, '2024-01-18 10:45:29', '2024-01-18 10:45:29'),
(28, 'Student', 'Amadu', 'amdue@gmail.com', NULL, '$2y$10$iVG.raMU2eL7E9xBGVNdTe6/W1.G0G0fDkZwyajJuocdQeF5PnGSy', '3058558u', 'Moromi', 'Male', '202401190354202012022210Stan1.jpg', 'Ali', 'Mariam', 'Islam', '20190024', '2024-01-16', '52614', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-18 21:54:49', '2024-01-18 21:54:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Index pour la table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Index pour la table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Index pour la table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Index pour la table `student_streams`
--
ALTER TABLE `student_streams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_streams_name_unique` (`name`);

--
-- Index pour la table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

--
-- Index pour la table `teacher_sallary_logs`
--
ALTER TABLE `teacher_sallary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `terms_name_unique` (`name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `student_streams`
--
ALTER TABLE `student_streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `teacher_sallary_logs`
--
ALTER TABLE `teacher_sallary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

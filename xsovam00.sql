-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 30. lis 2020, 23:11
-- Verze serveru: 5.6.40
-- Verze PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `xsovam00`
--

-- --------------------------------------------------------

DROP TABLE IF EXiSTS `answers`;
DROP TABLE IF EXiSTS `migrations`;
DROP TABLE IF EXiSTS `password_resets`;
DROP TABLE IF EXiSTS `questions`;
DROP TABLE IF EXiSTS `student_answers`;
DROP TABLE IF EXiSTS `tests`;
DROP TABLE IF EXiSTS `test_instances`;
DROP TABLE IF EXiSTS `users`;
--
-- Struktura tabulky `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `true` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_index` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=18 ;

--
-- Vypisuji data pro tabulku `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `true`, `created_at`, `updated_at`) VALUES
(1, 1, 'true', 1, NULL, NULL),
(2, 2, 'false', 0, NULL, NULL),
(3, 3, 'true', 1, NULL, NULL),
(4, 4, 'true', 1, NULL, NULL),
(5, 5, 'true', 1, NULL, NULL),
(6, 3, 'false', 0, NULL, NULL),
(7, 4, 'false', 0, NULL, NULL),
(8, 5, 'false', 0, NULL, NULL),
(9, 6, 'true', 1, NULL, NULL),
(10, 7, 'true', 1, NULL, NULL),
(11, 8, 'true', 1, NULL, NULL),
(12, 6, 'false', 0, NULL, NULL),
(13, 7, 'true', 1, NULL, NULL),
(14, 8, 'false', 0, NULL, NULL),
(15, 6, 'false', 0, NULL, NULL),
(16, 7, 'false', 0, NULL, NULL),
(17, 8, 'false', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Vypisuji data pro tabulku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_24_123642_create_tests_table', 1),
(4, '2020_11_24_123714_create_questions_table', 1),
(5, '2020_11_24_123817_create_answers_table', 1),
(6, '2020_11_28_134024_create_test_instances_table', 1),
(7, '2020_11_29_124628_create_student_answers_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagePath` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scoreMax` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_test_id_index` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Vypisuji data pro tabulku `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `name`, `task`, `imagePath`, `scoreMax`, `created_at`, `updated_at`) VALUES
(1, 1, 'otazka 1', 'task 1', NULL, 5, NULL, NULL),
(2, 1, 'otazka 2', 'task 2', NULL, 4, NULL, NULL),
(3, 2, 'otazka 1', 'task 1', NULL, 5, NULL, NULL),
(4, 2, 'otazka 2', 'task 2', NULL, 4, NULL, NULL),
(5, 2, 'otazka 3', 'task 3', NULL, 6, NULL, NULL),
(6, 3, 'otazka 1', 'bla bla bla', NULL, 5, NULL, NULL),
(7, 3, 'otazka 2', 'bla bla bla bla', NULL, 4, NULL, NULL),
(8, 3, 'otazka 3', 'bla bla bla bla bla', NULL, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `student_answers`
--

CREATE TABLE IF NOT EXISTS `student_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_instance_id` bigint(20) unsigned NOT NULL,
  `question_id` bigint(20) unsigned NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `score` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_answers_test_instance_id_index` (`test_instance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Vypisuji data pro tabulku `student_answers`
--

INSERT INTO `student_answers` (`id`, `test_instance_id`, `question_id`, `answer`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '', 0, NULL, NULL),
(2, 1, 4, '', 0, NULL, NULL),
(3, 1, 5, '', 0, NULL, NULL),
(4, 2, 6, '9 12', 0, NULL, NULL),
(5, 2, 7, '10', 0, NULL, NULL),
(6, 2, 8, '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `creator_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `configuration` int(10) unsigned NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tests_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `tests`
--

INSERT INTO `tests` (`id`, `creator_id`, `name`, `configuration`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 2, 'test-future', 1, '2021-06-12 12:00:00', '2021-06-12 13:00:00', NULL, NULL),
(2, 1, 'test-present', 2, '2020-11-29 12:00:00', '2021-01-29 12:00:00', NULL, NULL),
(3, 1, 'test-past', 3, '2020-11-29 12:00:00', '2020-11-29 20:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `test_instances`
--

CREATE TABLE IF NOT EXISTS `test_instances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `evaluated` tinyint(1) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `test_instances`
--

INSERT INTO `test_instances` (`id`, `test_id`, `user_id`, `approved`, `finished`, `evaluated`, `score`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 0, 0, 0, NULL, NULL),
(2, 3, 1, 1, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `asistent` tinyint(1) NOT NULL DEFAULT '0',
  `profesor` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `asistent`, `profesor`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$r1tKoUiVJUhIGQHA3CgMLOs7UlWWWw/G0CnhE2w0jfdETSuNMpReq', 1, 0, 0, NULL, NULL, NULL),
(2, 'profesor', 'profesor@example.com', '$2y$10$sRkhdh.dUllSLrg4aa3XXufwsp2GzDZa1npkz7u6h/6w6yxREjKTm', 0, 0, 1, NULL, NULL, NULL),
(3, 'asistent', 'asistent@example.com', '$2y$10$T/s2lQH3BKoc6txqIG0BgeHdQBBMO01CHmK4AN7oxGHzSd3AU6mge', 0, 1, 0, NULL, NULL, NULL),
(4, 'student', 'student@example.com', '$2y$10$LRG0QiyWSJlJfK4xG0a7zOtFbHpQkOiBpZCWzvj2u3aTou21iichm', 0, 0, 0, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

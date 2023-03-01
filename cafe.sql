-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2023 年 3 月 01 日 09:41
-- サーバのバージョン： 5.7.39
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `cafe`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '村上莉圭子', '44@gmail.com', NULL, '$2y$10$0l7gd77oVbEbQckIDjsvFeyYWA6Aq9FBgRTANKq6MwHZM.qKNmUC6', NULL, '2023-02-22 07:19:53', '2023-02-22 07:19:53');

-- --------------------------------------------------------

--
-- テーブルの構造 `adminss`
--

CREATE TABLE `adminss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `adminss`
--

INSERT INTO `adminss` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '村上莉圭子', '44@gmail.com', NULL, '$2y$10$OXU3E6vV/4n4gT4pdL3rZOLdD9arkqGmHNQEBfFuySSwqYRu1UsTi', NULL, '2023-02-21 17:25:26', '2023-02-21 17:25:26');

-- --------------------------------------------------------

--
-- テーブルの構造 `appls`
--

CREATE TABLE `appls` (
  `id` int(11) NOT NULL,
  `appls_name` varchar(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `appls`
--

INSERT INTO `appls` (`id`, `appls_name`, `updated_at`, `created_at`) VALUES
(1, 'メルカリ', NULL, NULL),
(2, 'ラクマ', NULL, NULL),
(3, 'ヤフオク', NULL, NULL),
(4, 'PayPayフリマ', NULL, NULL),
(5, '利用していない', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, '村上莉圭子', 'ima@gmail.com', '1', '2023-02-16 22:07:45', '2023-02-16 22:07:45'),
(2, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 22:11:28', '2023-02-16 22:11:28'),
(3, '村上莉圭子', 'r.m.19971110@gmail.com', '2', '2023-02-16 22:12:47', '2023-02-16 22:12:47'),
(4, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:25:04', '2023-02-16 23:25:04'),
(5, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:25:44', '2023-02-16 23:25:44'),
(6, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:26:33', '2023-02-16 23:26:33'),
(7, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:26:45', '2023-02-16 23:26:45'),
(8, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:26:54', '2023-02-16 23:26:54'),
(9, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:32', '2023-02-16 23:29:32'),
(10, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:34', '2023-02-16 23:29:34'),
(11, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:35', '2023-02-16 23:29:35'),
(12, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:35', '2023-02-16 23:29:35'),
(13, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:37', '2023-02-16 23:29:37'),
(14, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:43', '2023-02-16 23:29:43'),
(15, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:48', '2023-02-16 23:29:48'),
(16, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:48', '2023-02-16 23:29:48'),
(17, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:52', '2023-02-16 23:29:52'),
(18, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:54', '2023-02-16 23:29:54'),
(19, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:55', '2023-02-16 23:29:55'),
(20, '村上莉圭子', 'r.m.19971110@gmail.com', 'ｄ', '2023-02-16 23:29:57', '2023-02-16 23:29:57'),
(21, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:31:11', '2023-02-16 23:31:11'),
(22, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:33:23', '2023-02-16 23:33:23'),
(23, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:33:56', '2023-02-16 23:33:56'),
(24, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:33:59', '2023-02-16 23:33:59'),
(25, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:34:06', '2023-02-16 23:34:06'),
(26, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:34:32', '2023-02-16 23:34:32'),
(27, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:34:40', '2023-02-16 23:34:40'),
(28, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:34:41', '2023-02-16 23:34:41'),
(29, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:34:47', '2023-02-16 23:34:47'),
(30, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:34:47', '2023-02-16 23:34:47'),
(31, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:35:03', '2023-02-16 23:35:03'),
(32, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:35:04', '2023-02-16 23:35:04'),
(33, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:35:07', '2023-02-16 23:35:07'),
(34, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:35:14', '2023-02-16 23:35:14'),
(35, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:35:14', '2023-02-16 23:35:14'),
(36, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:35:14', '2023-02-16 23:35:14'),
(37, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:35:53', '2023-02-16 23:35:53'),
(38, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:09', '2023-02-16 23:36:09'),
(39, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:12', '2023-02-16 23:36:12'),
(40, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:14', '2023-02-16 23:36:14'),
(41, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:17', '2023-02-16 23:36:17'),
(42, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:24', '2023-02-16 23:36:24'),
(43, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:27', '2023-02-16 23:36:27'),
(44, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:31', '2023-02-16 23:36:31'),
(45, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:34', '2023-02-16 23:36:34'),
(46, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:37', '2023-02-16 23:36:37'),
(47, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:37', '2023-02-16 23:36:37'),
(48, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:39', '2023-02-16 23:36:39'),
(49, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:41', '2023-02-16 23:36:41'),
(50, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:36:53', '2023-02-16 23:36:53'),
(51, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:37:18', '2023-02-16 23:37:18'),
(52, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:37:33', '2023-02-16 23:37:33'),
(53, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:37:39', '2023-02-16 23:37:39'),
(54, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:38:01', '2023-02-16 23:38:01'),
(55, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:38:11', '2023-02-16 23:38:11'),
(56, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:38:23', '2023-02-16 23:38:23'),
(57, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:38:35', '2023-02-16 23:38:35'),
(58, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:39:00', '2023-02-16 23:39:00'),
(59, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:39:08', '2023-02-16 23:39:08'),
(60, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-16 23:39:18', '2023-02-16 23:39:18'),
(61, '村上莉圭子', 'r.m.19971110@gmail.com', 'あ', '2023-02-19 10:55:03', '2023-02-19 10:55:03'),
(62, '村上莉圭子', 'r.m.19971110@gmail.com', 'あ', '2023-02-19 10:55:15', '2023-02-19 10:55:15'),
(63, '村上莉圭子', 'r.m.19971110@gmail.com', 'あ', '2023-02-19 10:59:52', '2023-02-19 10:59:52'),
(64, '村上莉圭子', 'r.m.19971110@gmail.com', 'あ', '2023-02-19 11:06:52', '2023-02-19 11:06:52'),
(65, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:49:23', '2023-02-20 09:49:23'),
(66, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:50:49', '2023-02-20 09:50:49'),
(67, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:51:21', '2023-02-20 09:51:21'),
(68, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:51:31', '2023-02-20 09:51:31'),
(69, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:51:39', '2023-02-20 09:51:39'),
(70, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:51:47', '2023-02-20 09:51:47'),
(71, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:52:18', '2023-02-20 09:52:18'),
(72, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:52:21', '2023-02-20 09:52:21'),
(73, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:52:39', '2023-02-20 09:52:39'),
(74, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:52:43', '2023-02-20 09:52:43'),
(75, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:52:47', '2023-02-20 09:52:47'),
(76, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:52:55', '2023-02-20 09:52:55'),
(77, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:53:14', '2023-02-20 09:53:14'),
(78, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:53:18', '2023-02-20 09:53:18'),
(79, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:53:18', '2023-02-20 09:53:18'),
(80, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:53:18', '2023-02-20 09:53:18'),
(81, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:53:57', '2023-02-20 09:53:57'),
(82, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:54:18', '2023-02-20 09:54:18'),
(83, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:54:29', '2023-02-20 09:54:29'),
(84, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:55:31', '2023-02-20 09:55:31'),
(85, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:55:40', '2023-02-20 09:55:40'),
(86, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:55:44', '2023-02-20 09:55:44'),
(87, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:56:00', '2023-02-20 09:56:00'),
(88, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:56:09', '2023-02-20 09:56:09'),
(89, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:58:23', '2023-02-20 09:58:23'),
(90, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:58:28', '2023-02-20 09:58:28'),
(91, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:58:30', '2023-02-20 09:58:30'),
(92, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:58:30', '2023-02-20 09:58:30'),
(93, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:58:33', '2023-02-20 09:58:33'),
(94, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:59:13', '2023-02-20 09:59:13'),
(95, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 09:59:21', '2023-02-20 09:59:21'),
(96, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:04:20', '2023-02-20 10:04:20'),
(97, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:04:25', '2023-02-20 10:04:25'),
(98, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:04:30', '2023-02-20 10:04:30'),
(99, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:05:05', '2023-02-20 10:05:05'),
(100, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:05:13', '2023-02-20 10:05:13'),
(101, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:05:36', '2023-02-20 10:05:36'),
(102, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:06:19', '2023-02-20 10:06:19'),
(103, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:06:45', '2023-02-20 10:06:45'),
(104, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:06:48', '2023-02-20 10:06:48'),
(105, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:07:14', '2023-02-20 10:07:14'),
(106, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:07:17', '2023-02-20 10:07:17'),
(107, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:07:41', '2023-02-20 10:07:41'),
(108, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:08:03', '2023-02-20 10:08:03'),
(109, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:08:04', '2023-02-20 10:08:04'),
(110, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:08:14', '2023-02-20 10:08:14'),
(111, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:08:46', '2023-02-20 10:08:46'),
(112, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:08:48', '2023-02-20 10:08:48'),
(113, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:08:48', '2023-02-20 10:08:48'),
(114, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-20 10:09:16', '2023-02-20 10:09:16'),
(115, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:47:10', '2023-02-22 15:47:10'),
(116, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:57:42', '2023-02-22 15:57:42'),
(117, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:58:26', '2023-02-22 15:58:26'),
(118, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:58:34', '2023-02-22 15:58:34'),
(119, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:59:34', '2023-02-22 15:59:34'),
(120, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:59:35', '2023-02-22 15:59:35'),
(121, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:59:40', '2023-02-22 15:59:40'),
(122, '村上莉圭子', 'r.m.19971110@gmail.com', 'a', '2023-02-22 15:59:42', '2023-02-22 15:59:42'),
(123, '村上莉圭子', 'r.m.19971110@gmail.com', 'あ', '2023-02-22 10:50:17', '2023-02-22 10:50:17');

-- --------------------------------------------------------

--
-- テーブルの構造 `deliverys`
--

CREATE TABLE `deliverys` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` text NOT NULL,
  `image` text NOT NULL,
  `box_flag` int(11) NOT NULL DEFAULT '0',
  `track_flag` int(11) NOT NULL DEFAULT '0',
  `anonymous_flag` int(11) NOT NULL DEFAULT '0',
  `safety_flag` int(11) NOT NULL DEFAULT '0',
  `height` float NOT NULL,
  `width` float NOT NULL,
  `profound` int(11) NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `deliverys`
--

INSERT INTO `deliverys` (`id`, `name`, `url`, `image`, `box_flag`, `track_flag`, `anonymous_flag`, `safety_flag`, `height`, `width`, `profound`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'ネコポス', 'https://www.kuronekoyamato.co.jp/ytc/business/send/services/nekoposu/', 'https://www.kuronekoyamato.co.jp/banner/nekoposu.jpg', 1, 1, 1, 1, 31.2, 22.8, 3, '薄手の衣類、アクセサリー、コスメ、本、CDなど', '2023-02-24 09:27:09', '2023-02-23 05:15:33'),
(2, 'ゆうパケット', 'https://www.post.japanpost.jp/service/yu_packet/', 'http://localhost:8888/storage/JPimg.jpeg', 1, 1, 1, 1, 34, 34, 3, '薄手の衣類、アクセサリー、コスメ、本、CDなど', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(3, 'ゆうパケットポスト', 'https://www.post.japanpost.jp/service/yu_packetpost/index.html', 'http://localhost:8888/storage/JPimg.jpeg', 1, 1, 1, 1, 32.7, 22.8, 3, '薄手の衣類、アクセサリー、コスメ、本、CDなど', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(4, '定形郵便', 'https://www.post.japanpost.jp/service/standard/one_price.html', 'http://localhost:8888/storage/JPimg.jpeg', 0, 0, 0, 0, 23.5, 12, 1, 'トレーディングカードなど薄くて軽いもの', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(5, '定形外郵便', 'https://www.post.japanpost.jp/service/standard/one_price.html', 'http://localhost:8888/storage/JPimg.jpeg', 0, 0, 0, 0, 34, 25, 3, '定形封筒に入らないもので、軽いもの・ポスターなど筒状のものもOK', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(6, 'クイックポスト', 'https://clickpost.jp/', 'http://localhost:8888/storage/JPimg.jpeg', 1, 1, 0, 0, 34, 25, 3, '本、CD、コスメ、アクセサリー、文房具など', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(7, 'スマートレター', 'https://www.post.japanpost.jp/service/smartletter/', 'http://localhost:8888/storage/JPimg.jpeg', 0, 0, 0, 0, 25, 17, 2, '本、CD、コスメ、アクセサリー、文房具など', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(8, 'レターパックライト', 'https://www.post.japanpost.jp/service/letterpack/', 'http://localhost:8888/storage/JPimg.jpeg', 0, 1, 0, 0, 34, 24.8, 3, '本、CD、コスメ、アクセサリー、文房具など', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(9, 'レターパックプラス', 'https://www.post.japanpost.jp/service/letterpack/', 'http://localhost:8888/storage/JPimg.jpeg', 0, 1, 0, 0, 34, 24.8, 1000, '本、CD、コスメ、アクセサリー、文房具など', '2023-02-24 09:27:09', '2023-02-18 19:19:03'),
(405, 'クロネコ', 'http://localhost:8888/custom_delivery_bottom', 'unnamed.jpg', 1, 1, 1, 1, 5, 2, 2, '222', '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(406, 'a', 'a', 'unnamed.jpg', 0, 0, 0, 0, 1, 1, 1, '1', '2023-02-28 09:16:54', '2023-02-28 09:16:54'),
(408, '3', 'http://localhost:8888/custom_delivery_bottom', 'unnamed.jpg', 0, 0, 0, 0, 3, 3, 3, '3', '2023-02-28 09:26:44', '2023-02-28 09:26:44'),
(410, '4', '4', 'unnamed-1.jpg', 0, 0, 0, 0, 4, 4, 4, '4', '2023-02-28 09:32:59', '2023-02-28 09:32:59'),
(411, '7', '7', 'スクリーンショット 2023-02-12 11.10.58.png', 0, 0, 0, 0, 7, 7, 7, '7', '2023-02-28 09:38:31', '2023-02-28 09:38:31'),
(413, '2', '2', 'スクリーンショット 2023-02-09 20.25.42.png', 0, 0, 0, 0, 2, 2, 2, '2', '2023-02-28 09:40:23', '2023-02-28 09:40:23'),
(414, '1', '1', 'スクリーンショット 2023-02-12 14.21.59.png', 0, 0, 0, 0, 1, 1, 1, '1', '2023-02-28 09:45:02', '2023-02-28 09:45:02'),
(415, 'ssssd', '3', 'スクリーンショット 2023-02-11 17.33.38.png', 0, 0, 0, 0, 3, 3, 3, '3', '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(423, '4yui', '5', 'unnamed.jpg', 0, 0, 0, 0, 5, 5, 5, '5', '2023-02-28 11:32:28', '2023-02-28 11:32:28'),
(440, 'vvb', '3', 'スクリーンショット 2023-02-11 17.33.22.png', 0, 0, 0, 0, 3, 3, 3, '3', '2023-02-28 11:40:41', '2023-02-28 11:40:41'),
(441, '1x', '1', 'unnamed.jpg', 0, 0, 0, 0, 1, 1, 1, '1', '2023-02-28 11:42:00', '2023-02-28 11:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `deliverys_appls`
--

CREATE TABLE `deliverys_appls` (
  `id` int(11) NOT NULL,
  `deliverys_id` int(11) NOT NULL,
  `appls_id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `deliverys_appls`
--

INSERT INTO `deliverys_appls` (`id`, `deliverys_id`, `appls_id`, `money`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 210, NULL, NULL),
(2, 1, 2, 200, NULL, NULL),
(3, 1, 3, 170, NULL, NULL),
(4, 1, 4, 170, NULL, NULL),
(8, 2, 1, 230, NULL, NULL),
(9, 2, 2, 180, NULL, NULL),
(10, 2, 3, 175, NULL, NULL),
(11, 2, 4, 175, NULL, NULL),
(12, 3, 1, 220, NULL, NULL),
(13, 3, 2, 175, NULL, NULL),
(14, 3, 3, 180, NULL, NULL),
(15, 3, 4, 180, NULL, NULL),
(16, 4, 1, 94, NULL, NULL),
(17, 4, 2, 94, NULL, NULL),
(18, 4, 3, 94, NULL, NULL),
(19, 4, 4, 94, NULL, NULL),
(20, 5, 1, 140, NULL, NULL),
(21, 5, 2, 140, NULL, NULL),
(22, 5, 3, 140, NULL, NULL),
(23, 5, 4, 140, NULL, NULL),
(24, 6, 1, 185, NULL, NULL),
(25, 6, 2, 185, NULL, NULL),
(26, 6, 3, 185, NULL, NULL),
(27, 6, 4, 185, NULL, NULL),
(28, 7, 1, 180, NULL, NULL),
(29, 7, 2, 180, NULL, NULL),
(30, 7, 3, 180, NULL, NULL),
(31, 7, 4, 180, NULL, NULL),
(32, 8, 1, 370, NULL, NULL),
(33, 8, 2, 370, NULL, NULL),
(34, 8, 3, 370, NULL, NULL),
(35, 8, 4, 370, NULL, NULL),
(36, 9, 1, 520, NULL, NULL),
(37, 9, 2, 520, NULL, NULL),
(38, 9, 3, 520, NULL, NULL),
(39, 9, 4, 520, NULL, NULL),
(71, 2, 5, 360, NULL, NULL),
(72, 4, 5, 94, NULL, NULL),
(73, 5, 5, 140, NULL, NULL),
(74, 6, 5, 185, NULL, NULL),
(75, 7, 5, 180, NULL, NULL),
(76, 8, 5, 370, NULL, NULL),
(77, 9, 5, 520, NULL, NULL),
(118, 405, 1, 220, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(119, 405, 5, 110, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(120, 406, 5, 3, '2023-02-28 09:16:54', '2023-02-28 09:16:54'),
(121, 408, 5, 33, '2023-02-28 09:26:44', '2023-02-28 09:26:44'),
(122, 410, 5, 4, '2023-02-28 09:32:59', '2023-02-28 09:32:59'),
(123, 411, 5, 4, '2023-02-28 09:38:31', '2023-02-28 09:38:31'),
(124, 413, 5, 2, '2023-02-28 09:40:23', '2023-02-28 09:40:23'),
(125, 414, 5, 4, '2023-02-28 09:45:02', '2023-02-28 09:45:02'),
(126, 415, 5, 4, '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(127, 423, 5, 4, '2023-02-28 11:32:28', '2023-02-28 11:32:28'),
(128, 440, 5, 2, '2023-02-28 11:40:41', '2023-02-28 11:40:41'),
(129, 441, 5, 1, '2023-02-28 11:42:00', '2023-02-28 11:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `deliverys_getspots`
--

CREATE TABLE `deliverys_getspots` (
  `id` int(11) NOT NULL,
  `deliverys_id` int(11) NOT NULL,
  `getspots_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `deliverys_getspots`
--

INSERT INTO `deliverys_getspots` (`id`, `deliverys_id`, `getspots_id`, `updated_at`, `created_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 2, 5, NULL, NULL),
(7, 3, 1, NULL, NULL),
(8, 3, 2, NULL, NULL),
(9, 3, 3, NULL, NULL),
(10, 3, 5, NULL, NULL),
(11, 4, 1, NULL, NULL),
(12, 4, 5, NULL, NULL),
(13, 5, 1, NULL, NULL),
(14, 5, 5, NULL, NULL),
(15, 6, 1, NULL, NULL),
(16, 6, 5, NULL, NULL),
(17, 7, 1, NULL, NULL),
(18, 7, 5, NULL, NULL),
(19, 8, 1, NULL, NULL),
(20, 8, 5, NULL, NULL),
(21, 9, 4, NULL, NULL),
(22, 9, 5, NULL, NULL),
(35, 405, 2, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(36, 405, 4, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(37, 405, 5, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(38, 406, 5, '2023-02-28 09:16:54', '2023-02-28 09:16:54'),
(39, 408, 1, '2023-02-28 09:26:44', '2023-02-28 09:26:44'),
(40, 408, 5, '2023-02-28 09:26:44', '2023-02-28 09:26:44'),
(41, 410, 5, '2023-02-28 09:32:59', '2023-02-28 09:32:59'),
(42, 411, 5, '2023-02-28 09:38:31', '2023-02-28 09:38:31'),
(43, 413, 5, '2023-02-28 09:40:23', '2023-02-28 09:40:23'),
(44, 414, 5, '2023-02-28 09:45:02', '2023-02-28 09:45:02'),
(45, 415, 1, '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(46, 415, 3, '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(47, 415, 5, '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(48, 423, 1, '2023-02-28 11:32:28', '2023-02-28 11:32:28'),
(49, 423, 5, '2023-02-28 11:32:28', '2023-02-28 11:32:28'),
(50, 440, 1, '2023-02-28 11:40:41', '2023-02-28 11:40:41'),
(51, 440, 5, '2023-02-28 11:40:41', '2023-02-28 11:40:41'),
(52, 441, 1, '2023-02-28 11:42:00', '2023-02-28 11:42:00'),
(53, 441, 5, '2023-02-28 11:42:00', '2023-02-28 11:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `deliverys_sendspots`
--

CREATE TABLE `deliverys_sendspots` (
  `id` int(11) NOT NULL,
  `deliverys_id` int(11) NOT NULL,
  `sendspots_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `deliverys_sendspots`
--

INSERT INTO `deliverys_sendspots` (`id`, `deliverys_id`, `sendspots_id`, `updated_at`, `created_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 8, NULL, NULL),
(5, 1, 9, NULL, NULL),
(6, 1, 10, NULL, NULL),
(7, 2, 2, NULL, NULL),
(8, 2, 6, NULL, NULL),
(9, 2, 7, NULL, NULL),
(10, 2, 10, NULL, NULL),
(11, 3, 3, NULL, NULL),
(12, 3, 10, NULL, NULL),
(13, 4, 2, NULL, NULL),
(14, 4, 3, NULL, NULL),
(17, 4, 10, NULL, NULL),
(18, 5, 3, NULL, NULL),
(19, 5, 2, NULL, NULL),
(22, 5, 10, NULL, NULL),
(23, 6, 2, NULL, NULL),
(24, 6, 3, NULL, NULL),
(27, 6, 10, NULL, NULL),
(28, 7, 2, NULL, NULL),
(29, 7, 3, NULL, NULL),
(32, 7, 10, NULL, NULL),
(33, 8, 2, NULL, NULL),
(34, 8, 3, NULL, NULL),
(37, 8, 10, NULL, NULL),
(38, 9, 2, NULL, NULL),
(39, 9, 3, NULL, NULL),
(42, 9, 10, NULL, NULL),
(73, 405, 1, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(74, 405, 5, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(75, 405, 6, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(76, 405, 10, '2023-02-28 07:04:57', '2023-02-28 07:04:57'),
(77, 406, 10, '2023-02-28 09:16:54', '2023-02-28 09:16:54'),
(78, 408, 1, '2023-02-28 09:26:44', '2023-02-28 09:26:44'),
(79, 408, 10, '2023-02-28 09:26:44', '2023-02-28 09:26:44'),
(80, 410, 10, '2023-02-28 09:32:59', '2023-02-28 09:32:59'),
(81, 411, 10, '2023-02-28 09:38:31', '2023-02-28 09:38:31'),
(82, 413, 10, '2023-02-28 09:40:23', '2023-02-28 09:40:23'),
(83, 414, 10, '2023-02-28 09:45:02', '2023-02-28 09:45:02'),
(84, 415, 1, '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(85, 415, 2, '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(86, 415, 10, '2023-02-28 11:03:26', '2023-02-28 11:03:26'),
(87, 423, 8, '2023-02-28 11:32:28', '2023-02-28 11:32:28'),
(88, 423, 10, '2023-02-28 11:32:28', '2023-02-28 11:32:28'),
(89, 440, 1, '2023-02-28 11:40:41', '2023-02-28 11:40:41'),
(90, 440, 10, '2023-02-28 11:40:41', '2023-02-28 11:40:41'),
(91, 441, 1, '2023-02-28 11:42:00', '2023-02-28 11:42:00'),
(92, 441, 10, '2023-02-28 11:42:00', '2023-02-28 11:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `getspots`
--

CREATE TABLE `getspots` (
  `id` int(11) NOT NULL,
  `getspot_name` varchar(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `getspots`
--

INSERT INTO `getspots` (`id`, `getspot_name`, `updated_at`, `created_at`) VALUES
(1, '郵便受け', NULL, NULL),
(2, 'コンビニ', NULL, NULL),
(3, '郵便局', NULL, NULL),
(4, '対面受取', NULL, NULL),
(5, 'どこでも良い', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_21_184524_create_managers_table', 2),
(6, '2023_02_21_191134_create_admins_table', 2),
(7, '2023_02_22_044727_create_admins_table', 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `sendspots`
--

CREATE TABLE `sendspots` (
  `id` int(11) NOT NULL,
  `sendspot_name` varchar(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sendspots`
--

INSERT INTO `sendspots` (`id`, `sendspot_name`, `updated_at`, `created_at`) VALUES
(1, 'ヤマト営業所', NULL, NULL),
(2, '郵便局', NULL, NULL),
(3, '郵便ポスト', NULL, NULL),
(4, 'セブン-イレブン', NULL, NULL),
(5, 'ファミリーマート', NULL, NULL),
(6, 'ローソン', NULL, NULL),
(7, 'スマリボックス', NULL, NULL),
(8, '宅急便ロッカーPUDO', NULL, NULL),
(9, 'メルカリポスト', NULL, NULL),
(10, 'どこでも良い', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(13, '村上莉圭子', '11@gmail.com', '$2y$10$/ubiefMgnhUt6ukSudbs7.fjsGfmVl29RUhFaiIOrWGsrJlJXzaNu', NULL, '2023-02-28 13:29:47', '2023-02-28 13:29:47', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- テーブルのインデックス `adminss`
--
ALTER TABLE `adminss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- テーブルのインデックス `appls`
--
ALTER TABLE `appls`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `deliverys`
--
ALTER TABLE `deliverys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- テーブルのインデックス `deliverys_appls`
--
ALTER TABLE `deliverys_appls`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `deliverys_getspots`
--
ALTER TABLE `deliverys_getspots`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `deliverys_sendspots`
--
ALTER TABLE `deliverys_sendspots`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `getspots`
--
ALTER TABLE `getspots`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `sendspots`
--
ALTER TABLE `sendspots`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`email`(40)) USING BTREE;

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `adminss`
--
ALTER TABLE `adminss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `appls`
--
ALTER TABLE `appls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- テーブルの AUTO_INCREMENT `deliverys`
--
ALTER TABLE `deliverys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;

--
-- テーブルの AUTO_INCREMENT `deliverys_appls`
--
ALTER TABLE `deliverys_appls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- テーブルの AUTO_INCREMENT `deliverys_getspots`
--
ALTER TABLE `deliverys_getspots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- テーブルの AUTO_INCREMENT `deliverys_sendspots`
--
ALTER TABLE `deliverys_sendspots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `getspots`
--
ALTER TABLE `getspots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `sendspots`
--
ALTER TABLE `sendspots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

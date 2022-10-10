-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 09:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_assigned` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `task_assigned`, `email_verified_at`, `is_email_verified`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin_A', 'admina@gmail.com', 0, NULL, 1, '$2y$10$J.6Bth9N2urKhJDM3P83N.6AZ8yOfsSOQMOPHKYbbdzHOeJmD2enq', NULL, '2022-10-10 00:51:53', '2022-10-10 00:53:03'),
(2, 'Admin_B', 'adminb@gmail.com', 0, NULL, 1, '$2y$10$J.6Bth9N2urKhJDM3P83N.6AZ8yOfsSOQMOPHKYbbdzHOeJmD2enq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_verifies`
--

CREATE TABLE `admin_verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_verifies`
--

INSERT INTO `admin_verifies` (`id`, `admin_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 1, '$2y$10$0q61vaTjGjfFPooq3QxWVusirezYetl/i1g7e1kIX2V9rCyDEhHwu', '2022-10-10 00:51:53', '2022-10-10 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE `bloggers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`id`, `name`, `email`, `email_verified_at`, `is_email_verified`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Blogger_A', 'bloggera@gmail.com', NULL, 1, '$2y$10$J.6Bth9N2urKhJDM3P83N.6AZ8yOfsSOQMOPHKYbbdzHOeJmD2enq', NULL, '2022-10-10 00:55:43', '2022-10-10 00:58:13'),
(2, 'Blogger_B', 'bloggerb@gmail.com', NULL, 1, '$2y$10$J.6Bth9N2urKhJDM3P83N.6AZ8yOfsSOQMOPHKYbbdzHOeJmD2enq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogger_verifies`
--

CREATE TABLE `blogger_verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogger_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogger_verifies`
--

INSERT INTO `blogger_verifies` (`id`, `blogger_id`, `token`, `created_at`, `updated_at`) VALUES
(2, 1, '$2y$10$n3zWL/7lmtHPE2dJRZK76uQwrU1NMqYv/iKjpZ9aL/iZ6ErmeBkZq', '2022-10-10 00:56:21', '2022-10-10 00:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_16_140758_create_admins_table', 1),
(6, '2022_02_16_141159_create_bloggers_table', 1),
(7, '2022_02_24_061242_create_posts_table', 1),
(8, '2022_04_05_064342_create_admin_verifies_table', 1),
(9, '2022_04_07_102728_create_blogger_verifies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_approved` tinyint(1) NOT NULL DEFAULT 0,
  `update_approved` tinyint(1) NOT NULL DEFAULT 0,
  `post_pending` tinyint(1) NOT NULL DEFAULT 1,
  `blogger_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `post_approved`, `update_approved`, `post_pending`, `blogger_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(62, 'Title 0', 'Body 0 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:31:58', '2022-10-10 01:31:58'),
(63, 'Title 1', 'Body 1 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 2, 2, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(64, 'Title 2', 'Body 2 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 2, 2, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(65, 'Title 3', 'Body 3 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high', 0, 0, 1, 1, 1, '2022-10-10 01:31:59', '2022-10-10 01:49:23'),
(66, 'Title 4', 'Body 4 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking.', 0, 0, 1, 1, 2, '2022-10-10 01:31:59', '2022-10-10 01:51:58'),
(67, 'Title 5', 'Body 5 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 1, 2, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(68, 'Title 6', 'Body 6 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 1, 1, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(69, 'Title 7', 'Body 7 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 2, 2, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(70, 'Title 8', 'Body 8 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 2, 2, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(71, 'Title 9', 'Body 9 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 1, 1, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(72, 'Title 10', 'Body 10 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 1, 2, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(73, 'Title 11', 'Body 11 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 1, 1, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(74, 'Title 12', 'Body 12 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(75, 'Title 13', 'Body 13 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(76, 'Title 14', 'Body 14 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 2, 2, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(77, 'Title 15', 'Body 15 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high', 0, 0, 1, 1, 1, '2022-10-10 01:31:59', '2022-10-10 01:50:01'),
(78, 'Title 16', 'Body 16 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:31:59', '2022-10-10 01:31:59'),
(79, 'Title 17', 'Body 17 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color', 0, 0, 1, 1, 1, '2022-10-10 01:31:59', '2022-10-10 01:49:38'),
(80, 'Title 18', 'Body 18 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 1, 1, '2022-10-10 01:32:00', '2022-10-10 01:32:00'),
(81, 'Title 19', 'Body 19 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 1, 1, '2022-10-10 01:32:00', '2022-10-10 01:32:00'),
(82, 'Title 0', 'Body 0 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 1, 2, '2022-10-10 01:35:28', '2022-10-10 01:35:28'),
(83, 'Title 1', 'Body 1 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 1, 1, 2, '2022-10-10 01:35:29', '2022-10-10 01:35:29'),
(84, 'Title 2', 'Body 2 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(85, 'Title 3', 'Body 3 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:35:29', '2022-10-10 01:35:29'),
(86, 'Title 4', 'Body 4 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:35:29', '2022-10-10 01:35:29'),
(87, 'Title 5', 'Body 5 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(88, 'Title 6', 'Body 6 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:35:29', '2022-10-10 01:35:29'),
(89, 'Title 7', 'Body 7 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(90, 'Title 8', 'Body 8 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(91, 'Title 9', 'Body 9 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 1, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(92, 'Title 10', 'Body 10 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But king.', 1, 0, 0, 1, 2, '2022-10-10 01:35:29', '2022-10-10 01:51:29'),
(93, 'Title 11', 'Body 11 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 1, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(94, 'Title 12', 'Body 12 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 1, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(95, 'Title 13', 'Body 13 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 1, 1, '2022-10-10 01:35:29', '2022-10-10 01:35:29'),
(96, 'Title 14', 'Body 14 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 1, 2, '2022-10-10 01:35:29', '2022-10-10 01:40:07'),
(97, 'Title 15', 'Body 15 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:35:29', '2022-10-10 01:35:29'),
(98, 'Title 16', 'Body 16 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:35:30', '2022-10-10 01:35:30'),
(99, 'Title 17', 'Body 17 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 2, 1, '2022-10-10 01:35:30', '2022-10-10 01:35:30'),
(100, 'Title 18', 'Body 18 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:35:30', '2022-10-10 01:40:07'),
(101, 'Title 19', 'Body 19 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 1, 1, 1, '2022-10-10 01:35:30', '2022-10-10 01:35:30'),
(102, 'Title 0', 'Body 0 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 1, 2, '2022-10-10 01:36:34', '2022-10-10 01:40:13'),
(103, 'Title 1', 'Body 1 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 2, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(104, 'Title 2', 'Body 2 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 2, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(105, 'Title 3', 'Body 3 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:36:34', '2022-10-10 01:40:13'),
(106, 'Title 4', 'Body 4 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 1, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(107, 'Title 5', 'Body 5 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 1, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(108, 'Title 6', 'Body 6 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 2, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(109, 'Title 7', 'Body 7 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 1, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(110, 'Title 8', 'Body 8 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 1, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(111, 'Title 9', 'Body 9 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 1, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(112, 'Title 10', 'Body 10 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 2, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:34'),
(113, 'Title 11', 'Body 11 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better.', 1, 0, 0, 2, 1, '2022-10-10 01:36:34', '2022-10-10 01:55:55'),
(114, 'Title 12', 'Body 12 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 1, 1, 0, 1, 1, '2022-10-10 01:36:34', '2022-10-10 01:39:16'),
(115, 'Title 13', 'Body 13 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future.', 1, 0, 0, 2, 1, '2022-10-10 01:36:34', '2022-10-10 01:54:18'),
(116, 'Title 14', 'Body 14 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future.', 1, 0, 0, 1, 1, '2022-10-10 01:36:34', '2022-10-10 01:52:46'),
(117, 'Title 15', 'Body 15 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:36:34', '2022-10-10 01:40:13'),
(118, 'Title 16', 'Body 16 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:36:35', '2022-10-10 01:40:13'),
(119, 'Title 17', 'Body 17 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better.', 1, 0, 0, 2, 1, '2022-10-10 01:36:35', '2022-10-10 01:53:48'),
(120, 'Title 18', 'Body 18 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 1, 1, 0, 2, 2, '2022-10-10 01:36:35', '2022-10-10 01:40:13'),
(121, 'Title 19', 'Body 19 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better.', 1, 0, 0, 1, 1, '2022-10-10 01:36:35', '2022-10-10 01:52:25'),
(122, 'Title 0', 'Body 0 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:41:19'),
(123, 'Title 1', 'Body 1 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:41:19'),
(124, 'Title 2', 'Body 2 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:41:19'),
(125, 'Title 3', 'Body 3 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 1, 2, '2022-10-10 01:36:38', '2022-10-10 01:41:19'),
(126, 'Title 4', 'Body 4 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high', 1, 0, 0, 1, 1, '2022-10-10 01:36:38', '2022-10-10 01:51:01'),
(127, 'Title 5', 'Body 5 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:41:19'),
(128, 'Title 6', 'Body 6 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:40:59'),
(129, 'Title 7', 'Body 7 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:40:59'),
(130, 'Title 8', 'Body 8 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:40:59'),
(131, 'Title 9', 'Body 9 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:40:59'),
(132, 'Title 10', 'Body 10 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 0, 1, 1, '2022-10-10 01:36:38', '2022-10-10 01:43:05'),
(133, 'Title 11', 'Body 11 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 0, 1, 1, '2022-10-10 01:36:38', '2022-10-10 01:43:05'),
(134, 'Title 12', 'Body 12 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 0, 1, 1, '2022-10-10 01:36:38', '2022-10-10 01:43:05'),
(135, 'Title 13', 'Body 13 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 2, 2, '2022-10-10 01:36:38', '2022-10-10 01:40:59'),
(136, 'Title 14', 'Body 14 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 1, 2, '2022-10-10 01:36:39', '2022-10-10 01:40:59'),
(137, 'Title 15', 'Body 15 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 0, 1, 1, '2022-10-10 01:36:39', '2022-10-10 01:43:05'),
(138, 'Title 16', 'Body 16 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 0, 2, 1, '2022-10-10 01:36:39', '2022-10-10 01:42:48'),
(139, 'Title 17', 'Body 17 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 0, 1, 1, '2022-10-10 01:36:39', '2022-10-10 01:42:48'),
(140, 'Title 18', 'Body 18 Everyone has a hobby and so do I. My hobby is cooking. I love to cook. At first, I used to help my mom in her cooking. But later I found that I really enjoy cooking. I asked my mom to teach me that, and she was really happy about this.\r\n                Then she teaches me and I learned pretty much everything about cooking.', 0, 0, 0, 1, 2, '2022-10-10 01:36:39', '2022-10-10 01:40:59'),
(141, 'Title 19', 'Body 19 My hobby is drawing, I love to draw. When I was a kid, I loved playing with color pencils and oil pastels. Now I am a high school student and I am still trying to draw better. I hope that I will be an artist in the future. My parents are really supportive and they always inspire me to draw.', 0, 0, 0, 2, 1, '2022-10-10 01:36:39', '2022-10-10 01:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_verifies`
--
ALTER TABLE `admin_verifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_verifies_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bloggers_email_unique` (`email`);

--
-- Indexes for table `blogger_verifies`
--
ALTER TABLE `blogger_verifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogger_verifies_blogger_id_foreign` (`blogger_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_blogger_id_foreign` (`blogger_id`),
  ADD KEY `posts_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_verifies`
--
ALTER TABLE `admin_verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogger_verifies`
--
ALTER TABLE `blogger_verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_verifies`
--
ALTER TABLE `admin_verifies`
  ADD CONSTRAINT `admin_verifies_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `blogger_verifies`
--
ALTER TABLE `blogger_verifies`
  ADD CONSTRAINT `blogger_verifies_blogger_id_foreign` FOREIGN KEY (`blogger_id`) REFERENCES `bloggers` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `posts_blogger_id_foreign` FOREIGN KEY (`blogger_id`) REFERENCES `bloggers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2020 at 05:20 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwpadmashop_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_role` tinyint(4) DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_merchant` tinyint(1) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `admin_role`, `photo`, `password`, `is_merchant`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@gmail.com', 'superadmin', 1, NULL, '$2y$10$tQVwD5VequDrZsgg5NUaHexmp3fGf.XI7zylpDEqSxf9WJITYiRWO', 0, 1, 'sIkYF29CVltPI9wb62zGbUEjMxBIXFYAyoJmcCpn5h0c34ueRwYHGiT3PqZk', '2019-03-24 12:00:00', '2019-03-24 12:00:00'),
(2, 'Admin', 'admin@gmail.com', 'admin', 2, NULL, '$2y$10$xUzI8qVWmg9Rrpx2yAGkC.zBJ2mC7C9ND0OUeUTG.YGtJ3odj3WpO', 1, 9, 'r6NCPHJV5YSpQfyG3Q9yjRfkmMNQxjOEox9m7Z6RIwvZmI7UV2jeeWoK6vXT', '2019-03-24 12:00:00', '2020-02-15 05:04:22'),
(3, 'developer', 'jahangiralomshamim3@gmail.com', 'developer', 2, NULL, '$2y$10$tQVwD5VequDrZsgg5NUaHexmp3fGf.XI7zylpDEqSxf9WJITYiRWO', 1, 9, 'ELXJoJDL8jDtOKX6pSaySh0POv0Bk5napnABIxmjMNB7xqyjkRYVjdhcAFQA', '2019-04-11 03:07:51', '2020-07-09 04:26:43'),
(4, 'Merchant 1', 'merchant1@gmail.com', 'merchant1', 3, NULL, '$2y$10$RdCqxwB/3PipN6MByJN/IuRjLwTIUyDogKImH.YgZkhhH3Pfhak9C', 0, 9, 'XkPvVTkbBdLxRgDxmunPBBTDbZ1EfJlLfMZAgYmgAeZzoTKv1UXtx2LTmh58', '2019-05-18 02:42:22', '2020-02-15 05:03:59'),
(6, 'Test Admin', 'a@b.c', 'test-2', 2, NULL, '$2y$10$nI7z/ALW7GufACf0oLJQbuRpm4G6Y8dnIrisMEJwHR/dZMxMsGf/.', 1, 9, 'L0UtYr7PIANxoyXBjgHGSwmSPKySaftASWbeJUVqwugRomRstkzPL04olPw3', '2019-06-26 15:03:33', '2020-02-15 05:03:54'),
(7, 'BBBBBB', 'bbb@bbb.bbb', 'bbbbbb', 2, NULL, '$2y$10$nI7z/ALW7GufACf0oLJQbuRpm4G6Y8dnIrisMEJwHR/dZMxMsGf/.', 1, 9, 'Yk3LV8isYxChrjKRXoWx9LDhIHO59854mu85zUIibLRSyXL5JjMtqzdquW7P', '2019-06-27 15:47:15', '2020-01-09 00:08:49'),
(8, 'Padma shop', 'nasrullah_spn@yahoo.com', 'Padma123', 2, NULL, '$2y$10$uwRVfvE0zLuAc6Eyw5Aon..kIhWYwFR8Mnxg0AfpwfOHyTeWzfY3O', 1, 9, '5zqUWp4lUEcg7slwUhVxsGkY40RaNuEglDF536nrioPNksaar9OCC6t0zc5s', '2019-06-30 19:19:42', '2020-01-09 00:08:53'),
(9, 'hafiz', 'use@yahoo.com', 'hafiz', 3, NULL, '$2y$10$YtOHlag9OmloCGuwyYZL0.3UqKo..T.Ih7ETtherN9w9HGq/3OfuG', 0, 9, 'noDhqtCJHwNgSvV8mJcXocnBNcnnPr1mfUKkRQjFtIH4Hn6cI9nXpDoKO5s6', '2019-06-30 20:46:27', '2020-01-09 00:08:44'),
(10, 'Sujon', 'fsslfjsf@yahoo.com', 'Sujon', 2, NULL, '$2y$10$zenD068VIpvAaOdGyOj5g.FFUaepwt3V5snTmWTOkW.7EWMl7kgOK', 1, 9, NULL, '2019-12-16 01:52:46', '2020-01-09 00:08:40'),
(11, 'sajeeb', 'ffrfr@f', 'sajeeb', 2, NULL, '$2y$10$zHnwv3baGJSu.TBaw7LIWuwLdxqvQmh2g/8gkGHgCwode5J6pH0Au', NULL, 9, 'qnPgAgUnTFlPhyGYuDBVdMiCbeY9ZcLh5C64g2HNt24h2ax5Nf7wQcF1soLZ', '2020-01-19 20:44:11', '2020-07-09 04:26:37'),
(12, 'nasrullah', 'bhgugu@fhgj', 'nasrullah', 2, NULL, '$2y$10$tQVwD5VequDrZsgg5NUaHexmp3fGf.XI7zylpDEqSxf9WJITYiRWO', 1, 9, 'mSpFgQKzB3aK91zjh3lfAGjV1OHBJnIVDVnriLB7HCwatha9IDXaDwuf9Xx0', '2020-01-19 20:45:16', '2020-02-15 05:03:48'),
(13, 'Nasrullah20', 'gsgs.agjsa@yahoo.com', 'Nasrullah20', 1, NULL, '$2y$10$ejzP8FVpE57cC8wOuXMs0ee6iHuFtSZh9aScNYnLIfUjg0KpDyTQy', 0, 9, 'lnsCz1CYrL7YxbN8KUuFyR7WsMt4dqi6g6GuXhJdNB0a1vxhQyVALTbVGnms', '2020-01-27 19:45:06', '2020-02-15 05:03:42'),
(14, 'Nasrullah2', 'vfdgdsr@et', 'Nasrullah2', 3, NULL, '$2y$10$BUagfRiWci/oRos2pUkPD.9B.S.vQsnNQgdXO5.QlSnkylCly0fRO', 0, 9, 'f3QcxTaitCULDiiD5TguRcUkqus2mfuueNUG60oDFnmwHMrNYT26dNK2inLG', '2020-01-27 19:49:20', '2020-02-15 05:03:36'),
(15, 'nasrullah', 'mlnjbhug@yghnb', 'nasrullah21', 3, NULL, '$2y$10$79BWAgREeeakzM3TWEIZUuRNFI4SPDK7GPbc78wlSLjXZjQWlHo4W', NULL, 9, '9R7CLXCuHnluXCHYKZ1C91ND23ejQMNPTkNIx5bjD45vxowSZpHwFb2S17y0', '2020-02-15 05:09:49', '2020-07-09 04:26:52'),
(16, 'meherab', 'vufkihoijijoij@yahoo.com', 'meherab', 3, NULL, '$2y$10$N2iByK74F0CcFgYLZec4Nu4gAC6lSNxGUzW7vJfJ4ZDhscPwW4Ogi', 0, 9, '4Wxz6gM7DxTzqZ5BP7Wb3q0h99wajZtxoovxC1ApAyi1kXD00heY2bpF6HIv', '2020-04-07 21:13:06', '2020-07-09 04:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_access_infos`
--

CREATE TABLE `admin_access_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin_access_infos`
--

INSERT INTO `admin_access_infos` (`id`, `admin_id`, `ip`, `country`, `device`, `browser`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '178.128.104.139', 'US', 'PC', 'Chrome', 1, '2020-07-06 14:12:23', '2020-07-06 14:12:23'),
(2, 1, '203.89.120.5', 'US', 'PC', 'Firefox', 1, '2020-07-06 14:43:22', '2020-07-06 14:43:22'),
(3, 1, '103.107.162.28', 'US', 'PC', 'Firefox', 1, '2020-07-06 19:18:23', '2020-07-06 19:18:23'),
(4, 1, '103.107.162.28', 'US', 'PC', 'Firefox', 1, '2020-07-07 00:25:43', '2020-07-07 00:25:43'),
(5, 1, '103.107.162.28', 'US', 'PC', 'Chrome', 1, '2020-07-07 14:17:47', '2020-07-07 14:17:47'),
(6, 1, '203.89.120.5', 'US', 'PC', 'Firefox', 1, '2020-07-07 15:26:32', '2020-07-07 15:26:32'),
(7, 1, '178.128.82.122', 'US', 'PC', 'Firefox', 1, '2020-07-07 15:45:55', '2020-07-07 15:45:55'),
(8, 1, '103.107.162.28', 'US', 'PC', 'Firefox', 1, '2020-07-07 22:56:01', '2020-07-07 22:56:01'),
(9, 1, '103.107.162.28', 'US', 'PC', 'Firefox', 1, '2020-07-08 23:48:06', '2020-07-08 23:48:06'),
(10, 1, '103.107.162.28', 'US', 'PC', 'Chrome', 1, '2020-07-09 03:59:16', '2020-07-09 03:59:16'),
(11, 1, '103.107.162.28', 'US', 'PC', 'Firefox', 1, '2020-07-10 00:39:40', '2020-07-10 00:39:40'),
(12, 1, '103.107.162.28', 'US', 'PC', 'Chrome', 1, '2020-07-10 23:53:50', '2020-07-10 23:53:50'),
(13, 1, '203.89.120.5', 'US', 'PC', 'Chrome', 1, '2020-07-11 17:37:07', '2020-07-11 17:37:07'),
(14, 2, '203.89.120.5', 'US', 'PC', 'Chrome', 1, '2020-07-11 18:18:11', '2020-07-11 18:18:11'),
(15, 1, '203.89.120.5', 'US', 'PC', 'Chrome', 1, '2020-07-11 18:19:11', '2020-07-11 18:19:11'),
(16, 1, '203.89.120.5', 'US', 'PC', 'Firefox', 1, '2020-07-11 18:26:22', '2020-07-11 18:26:22'),
(17, 1, '203.89.120.5', 'US', 'PC', 'Firefox', 1, '2020-07-11 18:27:06', '2020-07-11 18:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'slider',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `image`, `description`, `type`, `status`, `created_at`, `updated_at`) VALUES
(3, 'What is Lorem Ipsum?', 'public/images/advertisement/1578571661.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>test</p>\r\n</body>\r\n</html>', 'slider', 1, '2020-01-10 04:07:41', '2020-01-10 04:07:41'),
(4, 'What is Lorem Ipsum?', 'public/images/advertisement/1578571771.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>b</p>\r\n</body>\r\n</html>', 'slider', 1, '2020-01-10 04:09:31', '2020-01-10 04:09:31'),
(5, 'D', 'public/images/advertisement/1585573833.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Z</p>\r\n</body>\r\n</html>', 'slider', 1, '2020-03-31 03:10:33', '2020-03-31 03:10:33'),
(6, 'Adv 1', 'public/images/advertisement/1594273794.png', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Adv 1</p>\r\n</body>\r\n</html>', 'ad', 1, '2020-07-09 09:49:54', '2020-07-09 09:52:17'),
(7, 'Adv 2', 'public/images/advertisement/1594273812.png', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Adv 2</p>\r\n</body>\r\n</html>', 'ad', 1, '2020-07-09 09:50:12', '2020-07-09 09:52:25'),
(8, 'Adv 3', 'public/images/advertisement/1594273846.png', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Adv 3</p>\r\n</body>\r\n</html>', 'ad', 1, '2020-07-09 09:50:46', '2020-07-09 09:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title_en`, `title_bn`, `slug`, `image`, `category_id`, `sub_category_id`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Est elit quas deser', 'Consectetur recusand', 'est-elit-quas-deser', 'public/images/brand/1594011805.jpg', 1, 1, NULL, 9, '2020-07-06 15:03:25', '2020-07-06 19:18:40'),
(2, 'Samsung', 'স‌্যামস‌্যাং', 'samsung', 'public/images/brand/1594096658.jpg', 4, 2, NULL, 1, '2020-07-07 14:37:38', '2020-07-07 14:37:38'),
(3, 'Sony', 'সনি', 'sony', 'public/images/brand/1594099548.jpg', 4, 2, NULL, 1, '2020-07-07 15:25:48', '2020-07-09 04:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` smallint(6) UNSIGNED DEFAULT 9999,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `position`, `title_en`, `title_bn`, `image`, `slug`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 9999, 'Incidunt corporis l', 'In vel omnis rerum a', 'public/images/category/1594011755.jpg', 'incidunt-corporis-l', NULL, 9, '2020-07-06 15:02:35', '2020-07-06 19:18:40'),
(2, 9999, 'Electronic Devicesn', 'ইলেক্ট্রনিক ডিভাইস', 'public/images/category/1594096034.jpg', 'electronic-devicesn', NULL, 1, '2020-07-07 14:27:14', '2020-07-07 14:27:14'),
(3, 9999, 'Electronic Accessories', 'ইলেক্ট্রনিক এক্সেসরিজ', 'public/images/category/1594096195.jpg', 'electronic-accessories', NULL, 1, '2020-07-07 14:29:55', '2020-07-07 14:29:55'),
(4, 9999, 'TV & Home Appliances', 'টিভি ও হোম অ্যাপ্লায়েন্স', 'public/images/category/1594096415.jpg', 'tv-and-home-appliances', NULL, 1, '2020-07-07 14:31:04', '2020-07-07 14:33:35'),
(5, 9999, 'grocery products', 'নিত‌্যপ্রয়েোজনীয় পন‌্য', 'public/images/category/1594098325.jpg', 'grocery-products', NULL, 1, '2020-07-07 15:05:25', '2020-07-07 15:05:25'),
(6, 9999, 'Fish Item', 'মাছ আইটেম', 'public/images/category/1594390980.jpg', 'fish-item', NULL, 1, '2020-07-11 00:03:03', '2020-07-11 00:23:00'),
(7, 9999, 'Bagerhat Bazar', 'বাগেরহাট বাজার', 'public/images/category/1594394013.jpg', 'bagerhat-bazar', NULL, 1, '2020-07-11 01:13:33', '2020-07-11 01:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'White', 1, '2019-04-10 05:47:34', '2019-04-10 05:47:34'),
(2, 'Red', 1, '2019-04-10 05:47:43', '2019-04-10 05:47:43'),
(3, 'Blue', 1, '2019-04-10 05:47:51', '2019-04-10 05:47:51'),
(4, 'Black', 1, '2019-04-10 05:48:01', '2019-04-10 05:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'General',
  `cost_field_id` int(10) UNSIGNED DEFAULT NULL,
  `cost_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Other',
  `pickdate` date NOT NULL,
  `quantity` double(8,2) DEFAULT 1.00,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cost_fields`
--

CREATE TABLE `cost_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` tinyint(2) DEFAULT NULL COMMENT '0 Fresh Customer | 1 Regular Customer',
  `discount` double(8,2) DEFAULT NULL,
  `taka` int(10) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` int(10) UNSIGNED NOT NULL,
  `d_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `country`, `shipping_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(2, 'Faridpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(3, 'Gazipur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(4, 'Gopalganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(5, 'Jamalpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(6, 'Kishoreganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(7, 'Madaripur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(8, 'Manikganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(9, 'Munshiganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(10, 'Mymensingh', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(11, 'Narayanganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(12, 'Narsingdi', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(13, 'Netrokona', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(14, 'Rajbari', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(15, 'Shariatpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(16, 'Sherpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(17, 'Tangail', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(18, 'Bogra', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(19, 'Joypurhat', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(20, 'Naogaon', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(21, 'Natore', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(22, 'Nawabganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(23, 'Pabna', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(24, 'Rajshahi', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(25, 'Sirajgonj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(26, 'Dinajpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(27, 'Gaibandha', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(28, 'Kurigram', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(29, 'Lalmonirhat', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(30, 'Nilphamari', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(31, 'Panchagarh', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(32, 'Rangpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(33, 'Thakurgaon', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(34, 'Barguna', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(35, 'Barisal', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(36, 'Bhola', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(37, 'Jhalokati', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(38, 'Patuakhali', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(39, 'Pirojpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(40, 'Bandarban', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(41, 'Brahmanbaria', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(42, 'Chandpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(43, 'Chittagong', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(44, 'Comilla', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(45, 'Coxs Bazar', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(46, 'Feni', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(47, 'Khagrachari', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(48, 'Lakshmipur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(49, 'Noakhali', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(50, 'Rangamati', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(51, 'Habiganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(52, 'Maulvibazar', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(53, 'Sunamganj', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(54, 'Sylhet', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(55, 'Bagerhat', 'Bangladesh', 22.00, 1, '2019-04-05 06:00:00', '2019-04-09 22:30:00'),
(56, 'Chuadanga', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(57, 'Jessore', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(58, 'Jhenaidah', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(59, 'Khulna', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(60, 'Kushtia', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(61, 'Magura', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(62, 'Meherpur', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(63, 'Narail', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-05 06:00:00'),
(64, 'Satkhira', 'Bangladesh', 0.00, 1, '2019-04-05 06:00:00', '2019-04-09 10:49:04'),
(66, 'q', 'Bangladesh', 1212.00, 0, '2019-04-09 22:23:13', '2019-04-09 22:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `d_commissions`
--

CREATE TABLE `d_commissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'here set up the percent of commission',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d_payments`
--

CREATE TABLE `d_payments` (
  `id` tinyint(4) NOT NULL,
  `d_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` float(8,2) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_position` int(10) UNSIGNED DEFAULT NULL COMMENT '0 - Left | 1 - Top | 2 - Dropdown',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu`, `menu_bn`, `parent_id`, `menu_position`, `icon`, `url`, `route`, `order`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Menu Permission', 'মেনু পারমিশন', NULL, 0, 'fa fa-diamond', '/admin/role', 'admin.role.index', 240, 1, '2019-03-24 22:44:32', '2019-06-16 03:10:53'),
(4, 'Log Activity', 'লগ এক্টিভিটি', NULL, 0, 'fa fa-history', '/admin/log', 'admin.log.index', 230, 1, '2019-03-24 22:46:37', '2019-06-16 03:11:03'),
(5, 'Assign', 'অনুমতি প্রদান', 88, 1, 'fa fa-pencil', '/admin/role/assign', 'admin.role.assign', 1, 1, '2019-03-24 22:48:50', '2019-04-23 18:16:18'),
(6, 'Dashboard', 'ড্যাশবোর্ড', NULL, 0, 'fa fa-dashboard', '/admin', 'admin.home', 1, 1, '2019-03-24 23:02:05', '2019-03-24 23:02:05'),
(8, 'Color', 'রং', 89, 0, 'fa fa-paint-brush', '/admin/color', 'admin.color.index', 0, 1, '2019-03-26 16:46:15', '2019-04-23 18:43:42'),
(9, 'Unit', 'একক', 89, 0, 'fa fa-balance-scale', '/admin/unit', 'admin.unit.index', 1, 1, '2019-03-26 17:53:06', '2019-04-23 18:52:36'),
(10, 'Size', 'আকার', 89, 0, 'fa fa-arrows', '/admin/size', 'admin.size.index', 3, 1, '2019-03-26 18:16:45', '2019-04-23 18:58:33'),
(11, 'Payment Method', 'পরিশোধ পদ্ধতি', NULL, 0, 'fa fa-money', '/admin/payment_method', 'admin.payment_method.index', 60, 1, '2019-03-26 18:37:38', '2019-04-23 21:13:17'),
(12, 'Coupon', 'কুপন', NULL, 0, 'fa fa-ticket', '/admin/coupon', 'admin.coupon.index', 70, 1, '2019-03-26 20:34:51', '2019-04-23 21:13:35'),
(13, 'Advertisement', 'বিজ্ঞাপন', NULL, 0, 'fa fa-cloud', NULL, NULL, 85, 1, '2019-03-27 15:50:54', '2019-04-23 21:14:13'),
(14, 'Page Content', 'পৃষ্ঠা বিষয়বস্তু', NULL, 0, 'fa fa-cubes', NULL, NULL, 80, 1, '2019-03-27 15:53:50', '2019-04-23 21:13:53'),
(15, 'Add New', 'নতুন যোগ করুন', 14, 0, 'fa fa-plus', '/admin/page_content/add', 'admin.page_content.add', 0, 1, '2019-03-27 19:35:59', '2019-04-25 10:52:23'),
(16, 'Content List', 'বিষয়বস্তু তালিকা', 14, 0, 'fa fa-list-ul', '/admin/page_content', 'admin.page_content.index', 1, 1, '2019-03-27 19:37:17', '2019-03-27 19:37:17'),
(18, 'Edit', 'এডিট', 16, 1, 'fa fa-pencil', NULL, 'admin.page_content.edit', 1, 1, '2019-03-27 19:43:38', '2019-03-29 15:54:06'),
(19, 'Delete', 'ডিলিট', 16, 1, 'fa fa-trash', NULL, 'admin.page_content.delete', 2, 1, '2019-03-27 19:45:10', '2019-03-29 17:02:39'),
(20, 'Advertisement List', 'বিজ্ঞাপন তালিকা', 13, 0, 'fa fa-list-ul', '/admin/advertisement', 'admin.advertisement.index', 1, 1, '2019-03-27 21:21:56', '2019-03-27 21:25:46'),
(21, 'Add New', 'নতুন যোগ করুন', 13, 0, 'fa fa-plus', '/admin/advertisement/add', 'admin.advertisement.add', 0, 1, '2019-03-27 21:22:44', '2019-04-25 10:52:19'),
(22, 'Edit', 'এডিট', 20, 1, 'fa fa-pencil', NULL, 'admin.advertisement.edit', 1, 1, '2019-03-27 21:24:14', '2019-03-29 17:02:50'),
(23, 'Delete', 'ডিলিট', 20, 1, 'fa fa-trash', NULL, 'admin.advertisement.delete', 2, 1, '2019-03-27 21:25:34', '2019-03-29 17:02:17'),
(24, 'District', 'জেলা', 89, 0, 'fa fa-share-alt', '/admin/district', 'admin.district.index', 4, 1, '2019-03-29 15:34:58', '2019-04-23 19:07:56'),
(33, 'Product', 'পণ্য', NULL, 0, 'fa fa-archive', NULL, NULL, 20, 1, '2019-03-29 15:43:47', '2019-04-24 06:15:57'),
(34, 'Product List', 'পণ্য তালিকা', 33, 0, 'fa fa-list-ul', '/admin/product', 'admin.product.index', 1, 1, '2019-03-29 15:45:03', '2019-03-29 15:45:03'),
(35, 'Add New', 'নতুন যোগ করুন', 33, 0, 'fa fa-plus', '/admin/product/add', 'admin.product.create', 0, 1, '2019-03-29 15:47:44', '2019-04-25 10:52:15'),
(36, 'Edit', 'এডিট', 34, 1, 'fa fa-pencil', NULL, 'admin.product.edit', 2, 1, '2019-03-29 15:48:20', '2019-04-05 17:27:38'),
(37, 'Delete', 'ডিলিট', 34, 1, 'fa fa-trash', NULL, 'admin.product.delete', 3, 1, '2019-03-29 15:49:55', '2019-04-05 17:27:26'),
(38, 'Category', 'ক্যাটাগরি', NULL, 0, 'fa fa-pie-chart', NULL, NULL, 40, 1, '2019-03-29 15:51:15', '2019-04-23 21:12:40'),
(39, 'Category List', 'ক্যাটাগরি তালিকা', 38, 0, 'fa fa-list-ul', '/admin/category', 'admin.category.index', 1, 1, '2019-03-29 15:51:59', '2019-03-29 15:51:59'),
(40, 'Add New', 'নতুন যোগ করুন', 38, 0, 'fa fa-plus', '/admin/category/add', 'admin.category.create', 0, 1, '2019-03-29 15:52:31', '2019-04-25 10:52:12'),
(41, 'Edit', 'এডিট', 39, 1, 'fa fa-pencil', NULL, 'admin.category.edit', 1, 1, '2019-03-29 15:53:02', '2019-03-29 16:55:28'),
(42, 'Delete', 'ডিলিট', 39, 1, 'fa fa-trash', NULL, 'admin.category.delete', 2, 1, '2019-03-29 15:53:33', '2019-03-29 17:01:25'),
(43, 'Subcategory', 'সাবক্যাটাগরি', NULL, 0, 'fa fa-yelp', NULL, NULL, 50, 1, '2019-03-29 15:55:21', '2019-04-23 21:12:56'),
(44, 'Subcategory List', 'সাবক্যাটাগরি তালিকা', 43, 0, 'fa fa-list-ul', '/admin/subcategory', 'admin.subcategory.index', 1, 1, '2019-03-29 15:56:04', '2019-03-29 15:56:04'),
(45, 'Add New', 'নতুন যোগ করুন', 43, 0, 'fa fa-plus', '/admin/subcategory/add', 'admin.subcategory.create', 0, 1, '2019-03-29 15:56:42', '2019-04-25 10:52:08'),
(46, 'Edit', 'এডিট', 44, 1, 'fa fa-pencil', NULL, 'admin.subcategory.edit', 1, 1, '2019-03-29 15:58:08', '2019-03-29 15:58:08'),
(47, 'Delete', 'ডিলিট', 44, 1, 'fa fa-trash', NULL, 'admin.subcategory.delete', 2, 1, '2019-03-29 15:58:53', '2019-03-29 15:58:53'),
(48, 'User', 'ইউজার', NULL, 0, 'fa fa-user', NULL, NULL, 110, 1, '2019-03-29 16:00:02', '2020-03-03 15:19:37'),
(49, 'Action', 'একশন', 48, 0, 'fa fa-dashboard', '/admin/user', 'admin.user.index', 1, 0, '2019-03-29 16:00:42', '2019-03-29 16:16:12'),
(50, 'Ban', 'ব্যান', 141, 1, 'fa fa-edit', NULL, 'admin.user.ban', 1, 1, '2019-03-29 16:01:45', '2020-03-03 15:27:35'),
(52, 'Edit', 'এডিট', 8, 1, 'fa fa-pencil', NULL, 'admin.color.edit', 1, 1, '2019-03-29 18:54:03', '2019-04-23 18:49:09'),
(53, 'Delete', 'ডিলিট', 8, 1, 'fa fa-trash', NULL, 'admin.color.delete', 2, 1, '2019-03-29 18:54:35', '2019-04-23 18:50:43'),
(54, 'Action', 'একশন', 12, 0, 'fa fa-edit', '/admin/coupon', 'admin.coupon.index', 1, 1, '2019-03-29 20:14:52', '2019-03-29 20:14:52'),
(55, 'Edit', 'এডিট', 54, 1, 'fa fa-pencil', NULL, 'admin.coupon.edit', 1, 1, '2019-03-29 20:16:24', '2019-03-29 20:17:18'),
(56, 'Delete', 'ডিলিট', 54, 1, 'fa fa-trash', NULL, 'admin.coupon.delete', 2, 1, '2019-03-29 20:17:09', '2019-03-29 20:17:09'),
(58, 'Edit', 'এডিট', 9, 1, 'fa fa-pencil', NULL, 'admin.unit.edit', 1, 1, '2019-03-29 20:51:18', '2019-04-23 18:53:24'),
(59, 'Delete', 'ডিলিট', 9, 1, 'fa fa-trash', NULL, 'admin.unit.delete', 2, 1, '2019-03-29 20:51:49', '2019-04-23 18:56:56'),
(61, 'Edit', 'এডিট', 10, 1, 'fa fa-pencil', NULL, 'admin.size.edit', 1, 1, '2019-03-29 21:21:57', '2019-04-23 19:01:18'),
(62, 'Delete', 'ডিলিট', 10, 1, 'fa fa-trash', NULL, 'admin.size.delete', 2, 1, '2019-03-29 21:22:49', '2019-04-23 18:59:52'),
(63, 'Action', 'একশন', 11, 0, 'fa fa-edit', '/admin/payment_method', 'admin.payment_method.index', 1, 1, '2019-03-29 23:28:20', '2019-03-29 23:28:36'),
(64, 'Edit', 'এডিট', 63, 1, 'fa fa-pencil', NULL, 'admin.payment_method.edit', 1, 1, '2019-03-29 23:29:57', '2019-03-29 23:29:57'),
(65, 'Delete', 'ডিলিট', 63, 1, 'fa fa-trash', NULL, 'admin.payment_method.dalete', 2, 1, '2019-03-29 23:31:16', '2019-03-29 23:31:16'),
(66, 'Brand', 'ব্রান্ড', NULL, 0, 'fa fa-briefcase', NULL, NULL, 30, 1, '2019-04-02 21:29:14', '2019-04-23 21:12:23'),
(67, 'Brand List', 'ব্রান্ড তালিকা', 66, 0, 'fa fa-list-ul', '/admin/brand', 'admin.brand.index', 1, 1, '2019-04-03 17:00:57', '2019-04-03 17:03:50'),
(68, 'Add Brand', 'নতুন যোগ করুন', 66, 0, 'fa fa-plus', '/admin/brand/add', 'admin.brand.create', 0, 1, '2019-04-03 17:03:10', '2019-04-25 10:52:04'),
(70, 'Edit', 'এডিট', 67, 1, 'fa fa-pencil', NULL, 'admin.brand.edit', 1, 1, '2019-04-03 17:06:54', '2019-04-03 17:10:28'),
(71, 'Delete', 'ডিলিট', 67, 1, 'fa fa-trash', NULL, 'admin.brand.delete', 2, 1, '2019-04-03 17:07:45', '2019-04-03 17:10:35'),
(72, 'Order', 'আদেশ', NULL, 0, 'fa fa-shopping-basket', NULL, NULL, 10, 1, '2019-04-05 17:05:10', '2019-04-24 06:15:42'),
(73, 'Completed Order', 'সম্পন্ন আদেশ', 72, 0, 'fa fa-thumbs-up', '/admin/order/completed', 'admin.order.completed', 2, 1, '2019-04-05 17:07:47', '2019-04-05 18:16:26'),
(74, 'Pending Order', 'অসম্পন্ন আদেশ', 72, 0, 'fa fa-hand-rock-o', '/admin/order/pending', 'admin.order.pending', 1, 1, '2019-04-05 17:09:33', '2019-04-05 18:15:26'),
(75, 'View', 'দৃষি্টপাত', 34, 1, 'fa fa-eye', NULL, 'admin.product.view', 1, 1, '2019-04-05 17:26:40', '2019-04-05 17:26:40'),
(76, 'View', 'দৃষি্টপাত', 74, 1, 'fa fa-eye', NULL, 'admin.order.pending-view', 1, 1, '2019-04-05 18:05:20', '2019-04-05 21:54:25'),
(77, 'View', 'দৃষি্টপাত', 73, 1, 'fa fa-eye', NULL, 'admin.order.completed-view', 1, 1, '2019-04-05 21:36:04', '2019-04-05 21:54:47'),
(80, 'Edit', 'এডিট', 24, 1, 'fa fa-pencil', NULL, 'admin.district.edit', 1, 1, '2019-04-09 02:38:16', '2019-04-23 19:09:29'),
(81, 'Delete', 'ডিলিট', 24, 1, 'fa fa-trash', NULL, 'admin.district.delete', 2, 1, '2019-04-09 02:39:30', '2019-04-23 19:09:07'),
(82, 'Site Settings', 'সাইট সেটিংস', NULL, 0, 'fa fa-sliders', '/admin/setting', 'admin.setting.index', 220, 1, '2019-04-10 16:30:44', '2019-04-23 21:15:02'),
(88, 'Action', 'একশন', 3, 0, 'fa fa-edit', '/admin/role', 'admin.role.index', 0, 1, '2019-04-23 18:15:10', '2019-04-23 18:20:54'),
(89, 'Others', 'অন্যান্য', NULL, 0, 'fa fa-object-ungroup', NULL, NULL, 150, 1, '2019-04-23 18:37:09', '2019-04-23 21:14:30'),
(90, 'Upazilla', 'উপজেলা', 89, 0, 'fa fa-usb', '/admin/upazilla', 'admin.upazilla.index', 5, 1, '2019-04-23 20:52:35', '2019-04-23 20:52:35'),
(93, 'Delete', 'ডিলিট', 90, 1, 'fa fa-trash', NULL, 'admin.upazilla.delete', 2, 1, '2019-04-25 10:32:12', '2019-04-25 10:40:56'),
(94, 'Edit', 'এডিট', 90, 1, 'fa fa-pencil', NULL, 'admin.upazilla.edit', 1, 1, '2019-04-25 10:34:34', '2019-04-25 10:40:27'),
(95, 'Delete', 'ডিলিট', 141, 1, 'fa fa-trash', NULL, 'admin.user.delete', 2, 1, '2019-05-15 23:34:58', '2020-03-03 15:27:20'),
(96, 'Cost', 'খরচ', NULL, 0, 'fa fa-dollar', NULL, NULL, 90, 1, '2019-04-16 18:05:39', '2019-06-16 03:15:10'),
(97, 'Cost List', 'খরচ তালিকা', 96, 0, 'fa fa-list-ul', '/admin/cost', 'admin.cost.index', 2, 1, '2019-04-16 18:29:35', '2019-04-16 18:29:35'),
(98, 'Add New', 'নতুন যোগ করুন', 96, 0, 'fa fa-plus', '/admin/cost/add', 'admin.cost.add', 1, 1, '2019-04-16 18:30:27', '2019-04-16 18:30:27'),
(99, 'Edit', 'এডিট', 97, 1, 'fa fa-edit', NULL, 'admin.cost.edit', 1, 1, '2019-04-16 18:31:30', '2019-04-16 18:31:30'),
(100, 'Delete', 'ডিলিট', 97, 1, 'fa fa-trash', NULL, 'admin.cost.delete', 2, 1, '2019-04-16 18:33:15', '2019-04-16 18:33:15'),
(101, 'Cost Field', 'খরচ ক্ষেত্র', 96, 0, 'fa fa-euro', '/admin/cost_field', 'admin.cost_field.index', 0, 1, '2019-04-20 16:10:13', '2019-06-16 03:16:35'),
(102, 'Edit', 'এডিট', 101, 1, 'fa fa-pencil', NULL, 'admin.cost_field.edit', 1, 1, '2019-04-20 16:12:17', '2019-04-22 18:04:37'),
(103, 'Delete', 'ডিলিট', 101, 1, 'fa fa-trash', NULL, 'admin.cost_field.delete', 2, 1, '2019-04-20 16:13:04', '2019-04-22 18:04:46'),
(104, 'Slider', 'স্লাইডার', NULL, 0, 'fa fa-picture-o', '/admin/slider', 'admin.slider.index', 215, 1, '2019-05-18 00:25:31', '2019-05-18 00:26:48'),
(105, 'Review', 'পর্যালোচনা', NULL, 0, 'fa fa-star-half-o', '/admin/review', 'admin.review.index', 95, 1, '2019-05-18 16:29:35', '2019-05-18 16:29:35'),
(106, 'Action', 'একশন', 105, 0, 'fa fa-edit', '/admin/review', 'admin.review.index', 1, 1, '2019-05-18 16:44:10', '2019-05-18 16:47:10'),
(107, 'Delete', 'ডিলিট', 105, 1, 'fa fa-minus-circle', NULL, 'admin.review.delete', 3, 1, '2019-05-18 16:46:07', '2019-06-16 03:09:28'),
(108, 'Distributor', 'ডিস্ট্রিবিউটর', NULL, 0, 'fa fa-random', NULL, NULL, 75, 1, '2019-07-03 14:27:44', '2019-07-03 14:27:44'),
(109, 'Add New', 'নতুন যোগকরুন', 108, 0, 'fa fa-plus', '/admin/distributor/add', 'admin.distributor.add', 1, 1, '2019-07-03 14:46:00', '2019-07-03 14:46:00'),
(110, 'Distributor List', 'ডিস্ট্রিবিউটর তালিকা', 108, 0, 'fa fa-list-ul', '/admin/distributor', 'admin.distributor.index', 2, 1, '2019-07-03 14:48:36', '2019-07-03 14:48:36'),
(111, 'Edit', 'এডিট', 110, 1, 'fa fa-pencil', '/admin/distributor/edit', 'admin.distributor.edit', 1, 1, '2019-07-03 14:50:57', '2019-07-03 14:52:16'),
(112, 'Delete', 'ডিলিট', 110, 1, 'fa fa-trash', '/admin/distributor/delete', 'admin.distributor.delete', 2, 1, '2019-07-03 14:52:00', '2019-07-03 14:52:00'),
(113, 'Referral Balance', 'রেফেরাল ব্যালেন্স', NULL, 0, 'fa fa-credit-card-alt', '/admin/referral_balance', 'admin.referral_balance.index', 76, 1, '2019-07-03 19:28:10', '2019-07-03 19:58:55'),
(114, 'Action', 'একশন', 113, 0, 'fa fa-edit', '/admin/referral_balance', 'admin.referral_balance.index', 1, 1, '2019-07-04 16:54:44', '2019-07-04 16:54:44'),
(115, 'Details', 'ডিটেইলস', 114, 1, 'fa fa-list-alt', '/admin/referral_balance/details', 'admin.referral_balance.details', 1, 1, '2019-07-04 16:57:05', '2019-07-04 16:57:05'),
(117, 'Trash', 'ট্রেস', 66, 0, 'fa fa-recycle', '/admin/brand/recovery', 'admin.brand.recovery', 4, 1, '2019-07-10 04:41:43', '2019-07-10 08:08:00'),
(118, 'Trash', 'ট্রেস', 117, 1, 'fa fa-recycle', '/admin/brand/recover', 'admin.brand.recover', 1, 1, '2019-07-10 04:49:54', '2019-07-10 08:07:50'),
(119, 'Trash', 'ট্রেস', 38, 0, 'fa fa-recycle', '/admin/category/recovery', 'admin.category.recovery', 4, 1, '2019-07-10 05:33:44', '2019-07-10 08:07:41'),
(120, 'Trash', 'ট্রেস', 119, 1, 'fa fa-recycle', '/admin/category/recover', 'admin.category.recover', 0, 1, '2019-07-10 05:35:08', '2019-07-10 08:07:21'),
(121, 'Trash', 'ট্রেস', 43, 0, 'fa fa-recycle', '/admin/subcategory/recovery', 'admin.subcategory.recovery', 4, 1, '2019-07-10 06:24:31', '2019-07-10 08:07:08'),
(122, 'Trash', 'ট্রেস', 121, 1, 'fa fa-recycle', '/admin/subcategory/recover', 'admin.subcategory.recover', 0, 1, '2019-07-10 06:25:41', '2019-07-10 08:06:54'),
(123, 'Trash', 'ট্রেস', 33, 0, 'fa fa-recycle', '/admin/product/recovery', 'admin.product.recovery', 4, 1, '2019-07-10 07:06:31', '2019-07-10 08:06:41'),
(124, 'Trash', 'ট্রেস', 123, 1, 'fa fa-recycle', '/admin/product/recover', 'admin.product.recover', 0, 1, '2019-07-10 07:07:37', '2019-07-10 08:06:21'),
(125, 'D-Commission', 'ডি-কমিশন', NULL, 0, 'fa fa-certificate', NULL, NULL, 111, 1, '2019-07-13 14:57:45', '2019-07-13 14:57:45'),
(126, 'Commission List', 'কমিশনের তালিকা', 125, 0, 'fa fa-list-ul', '/admin/d_commission', 'admin.d_commission.index', 2, 1, '2019-07-13 14:59:50', '2019-07-13 16:05:19'),
(127, 'Add New', 'নতুন কমিশন', 125, 0, 'fa fa-plus', '/admin/d_commission/add', 'admin.d_commission.add', 1, 1, '2019-07-13 15:02:38', '2019-07-13 15:34:57'),
(128, 'Edit', 'সম্পাদন করুন', 126, 1, 'fa fa-pencil', '/admin/d_commission/edit', 'admin.d_commission.edit', 1, 1, '2019-07-13 15:32:54', '2019-07-13 15:32:54'),
(129, 'Delete', 'ডিলিট', 126, 1, 'fa fa-trash', '/admin/d_commission/delete', 'admin.d_commission.delete', 2, 1, '2019-07-13 15:34:38', '2019-07-13 15:34:38'),
(130, 'Subscriber', 'সাবস্ক্রিবার', NULL, 0, 'fa fa-envelope-o', NULL, 'admin.subscriber.index', 9999, 1, '2019-08-07 16:54:08', '2019-08-07 16:54:08'),
(131, 'Delete', 'ডিলিট', 123, 1, 'fa fa-trash-o', 'admin/product/recovery/delete', 'admin.product.recovery.delete', 1, 1, '2020-01-11 17:13:09', '2020-01-11 17:13:09'),
(132, 'Payment', 'পেয়মেন্ট', 108, 0, 'fa fa-money', '/admin/distributor/payment', 'admin.distributor.payment', 3, 1, '2020-01-11 23:29:05', '2020-01-11 23:29:05'),
(133, 'Payment List', 'পেমেন্ট লিস্ট', 108, 0, 'fa fa-list-ul', 'admin/distributor/payment/all', 'admin.distributor.payment.list', 4, 1, '2020-01-27 16:25:19', '2020-01-27 16:25:19'),
(134, 'SMS', 'এসমএস', NULL, 0, 'fa fa-envelope-o', NULL, NULL, 230, 1, '2020-02-02 15:06:00', '2020-02-02 15:06:00'),
(135, 'Send', 'পাঠান', 134, 0, 'fa fa-arrow-right', '/admin/sms/send', 'admin.sms.send', 1, 1, '2020-02-02 15:09:38', '2020-02-02 15:09:38'),
(136, 'Report', 'রিপোর্ট', 134, 0, 'fa fa-clipboard', '/admin/sms/report', 'admin.sms.report', 2, 1, '2020-02-02 15:13:06', '2020-02-02 15:13:06'),
(137, 'Return Items', 'ফেরত মালামাল', NULL, 0, 'fa fa-history', '/admin/return/items', 'admin.return.items', 240, 1, '2020-02-15 22:59:51', '2020-02-15 22:59:51'),
(139, 'Return Items', 'অর্ডার দেখুন', 140, 1, 'fa fa-eye', '/admin/return/items/view', 'admin.return.items.view', 1, 1, '2020-02-16 16:58:26', '2020-02-16 17:08:48'),
(140, 'action', 'একশন', 137, 1, 'fa fa-500px', '/admin/return/items', 'admin.return.items', 1, 1, '2020-02-16 17:08:40', '2020-02-16 17:15:07'),
(141, 'all', 'সকল', 48, 0, 'fa fa-list-ol', '/admin/user', 'admin.user.index', 1, 1, '2020-03-03 15:24:07', '2020-03-03 15:24:07'),
(142, 'Trash', 'ত্রাশ', 48, 0, 'fa fa-trash-o', '/admin/user/trash', 'admin.user.trash', 2, 1, '2020-03-03 15:31:42', '2020-03-03 15:32:39'),
(143, 'Restore', 'restore', 142, 1, 'fa fa-history', '/admin/user/restore', 'admin.user.restore', 0, 1, '2020-03-03 15:50:49', '2020-03-03 15:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(51, '2018_03_26_200821_create_admins_table', 1),
(52, '2019_03_04_084037_create_menus_table', 1),
(53, '2019_03_05_074453_create_roles_table', 1),
(54, '2019_03_06_090310_create_admin_access_infos_table', 1),
(55, '2019_03_25_140006_create_sizes_table', 1),
(56, '2019_03_25_140016_create_colors_table', 1),
(57, '2019_03_25_140029_create_payment_methods_table', 1),
(58, '2019_03_25_140140_create_units_table', 1),
(59, '2019_03_25_140157_create_categories_table', 1),
(60, '2019_03_25_140207_create_sub_categories_table', 1),
(61, '2019_03_25_140231_create_brands_table', 1),
(63, '2019_03_25_140235_create_upazillas_table', 1),
(64, '2019_03_25_140240_create_password_resets_table', 1),
(65, '2019_03_25_140240_create_users_table', 1),
(66, '2019_03_25_140403_create_products_table', 1),
(67, '2019_03_25_140419_create_coupons_table', 1),
(68, '2019_03_25_140433_create_orders_table', 1),
(69, '2019_03_25_140449_create_order_items_table', 1),
(70, '2019_03_25_140507_create_wish_lists_table', 1),
(71, '2019_03_25_140524_create_page_contents_table', 1),
(72, '2019_03_25_140536_create_user_histories_table', 1),
(73, '2019_03_25_162000_create_advertisements_table', 1),
(74, '2019_03_25_140233_create_districts_table', 2),
(75, '2019_04_10_152431_create_contacts_table', 3),
(76, '2019_04_10_152516_create_settings_table', 3),
(77, '2019_05_18_105748_create_product_ratings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `alt_mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `upazilla_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_quantity` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `grand_total` double(8,2) DEFAULT NULL,
  `payment_gateway_id` int(10) UNSIGNED DEFAULT NULL,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `coupon_discount` double(8,2) DEFAULT NULL,
  `txnid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'transaction_id',
  `is_paid` tinyint(3) UNSIGNED NOT NULL,
  `order_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 - processing | 1 - in godown | 2 - on the way | 3 - delivered',
  `is_return` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 - pending | 2 - completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `size` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - processing | 1 - in godown | 2 - on the way | 3 - delivered',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_return` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `name_en`, `name_bn`, `title_en`, `title_bn`, `description_en`, `description_bn`, `image`, `route`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'হোম', 'E-Com Home', 'ই-কম হোম', 'lorem lorem lorem lorem lorem lorem lorem lorem', 'লরেম  লরেম  লরেম  লরেম   লরেম  লরেম  লরেম  লরেম', 'public/images/page-content/1554982019.jpg', 'index', NULL, 1, '2019-04-11 05:24:57', '2019-04-11 05:26:59'),
(2, 'Shop', 'দোকান', 'E-Com Shop', 'ই-কম দোকান', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem', 'লরেম  লরেম  লরেম  লরেম   লরেম  লরেম  লরেম  লরেম   লরেম  লরেম  লরেম  লরেম', 'public/images/page-content/1554982096.jpg', 'shop', NULL, 1, '2019-04-11 05:28:16', '2019-04-11 05:28:16'),
(3, 'Contact', 'যোগাযোগ', 'E-Com Contact', 'ই-কম যোগাযোগ', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', 'লরেম লরেম লরেম লরেম লরেম লরেম লরেম লরেম লরেম লরেম লরেম', 'public/images/page-content/1554982156.jpg', 'contact', NULL, 1, '2019-04-11 05:29:16', '2019-04-11 05:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jahangiralomshamim3@gmail.com', '$2y$10$kxuziiWsx/YN/phoP4EbCuRif9BWTmi0TSvwSUvAbag9vK7g/cEw.', '2019-08-07 22:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `title`, `payment_mobile_no`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'P-Kash', '01721854751', NULL, 1, '2019-04-10 05:44:34', '2020-03-30 23:15:34'),
(2, 'DBBL', '01721571954', 'public/images/paymentgetway/1594291034_DBBL.jpg', 1, '2019-04-10 05:44:57', '2019-06-29 18:44:46'),
(3, 'Cash on Delivery', NULL, 'public/images/paymentgetway/1594454793_CashonDelivery.png', 1, '2019-04-10 05:45:27', '2020-07-11 18:06:33'),
(4, 'bkash', '01821854751', 'public/images/paymentgetway/1594291047_bKas.png', 1, '2020-01-08 23:59:56', '2020-07-11 18:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `size_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `purchase_price` double(8,2) NOT NULL,
  `regular_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_return` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `discount_time` date DEFAULT NULL,
  `hit_count` bigint(11) UNSIGNED DEFAULT 0,
  `total_sale` bigint(11) UNSIGNED DEFAULT 0,
  `rating` float(8,2) DEFAULT NULL,
  `is_offer` smallint(1) NOT NULL DEFAULT 0 COMMENT '1: Offer | 0: No Offer',
  `is_feature_product` int(11) NOT NULL DEFAULT 0,
  `d_commission` int(1) DEFAULT 0 COMMENT '1=true | 0=false',
  `admin_id` int(10) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `product_area` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `image`, `original_image`, `category_id`, `sub_category_id`, `brand_id`, `size_id`, `color_id`, `unit_id`, `purchase_price`, `regular_price`, `sale_price`, `delivery`, `product_return`, `warranty`, `description`, `quantity`, `discount`, `discount_time`, `hit_count`, `total_sale`, `rating`, `is_offer`, `is_feature_product`, `d_commission`, `admin_id`, `status`, `product_area`, `created_at`, `updated_at`) VALUES
(1, 'Consectetur vel con', 'consectetur-vel-con', '[\"public\\/images\\/products\\/15940118370.jpg\"]', '[\"public\\/images\\/products\\/original\\/15940118370.jpg\"]', 1, NULL, 1, NULL, NULL, 2, 584.00, 583.00, NULL, 'Quia nihil necessita', 'Non accusamus aute s', 'Sint rerum ea dignis', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Eum aliquip quam ali.</p>\r\n</body>\r\n</html>', 248, 58.00, '2020-07-06', 0, 0, NULL, 1, 1, 1, 1, '9', 'bagerhat', '2020-07-06 15:03:57', '2020-07-06 19:18:40'),
(2, 'শুকনা মরিচের গুড়া   (১কেজি)', 'শুকনা-মরিচের-গুড়া-(১কেজি)', '[\"public\\/images\\/products\\/15940287410.jpg\",\"public\\/images\\/products\\/15940287411.jpg\"]', '[\"public\\/images\\/products\\/original\\/15940287410.jpg\",\"public\\/images\\/products\\/original\\/15940287411.jpg\"]', NULL, NULL, NULL, NULL, NULL, 1, 200.00, 420.00, NULL, '1 - 3 days', 'No', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\"><span class=\"q9uorilb tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me fgm26odu gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/taa/1.5/16/1f449.png\" alt=\"👉\" width=\"16\" height=\"16\" /></span>শুকনো মরিচের উপকারীতাগুলো জানেন তো?</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\"><span class=\"q9uorilb tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me fgm26odu gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t10/1.5/16/1f917.png\" alt=\"🤗\" width=\"16\" height=\"16\" /></span>রান্নায় শুকনো মরিচের ব্যবহার সেই প্রাচীন কাল থেকেই। রান্নায় যতই কাঁচা মরিচ ব্যবহার করা হোক না কেন, শুকনো মরিচ ছাড়া যেন স্বাদই পাওয়া যায় না। আসলে শুকনো মরিচ আমাদের রান্নার একটি খুবই গুরুত্বপূর্ন অংশ। প্রায় প্রতিটি রান্নায় এটি ব্যবহার করা হয়ে থাকে। তবে অনেকেই বলে থাকেন, শুকনো মরিচ বেশি খেলে নাকি পাকস্থলীতে ক্যান্সার হয়। এটা কিন্তু পুরোটাই একটি ভুল ধারণা। এটি আমাদের কোনো ক্ষতি তো করেই না, বরং এটি আমাদের বেশ কিছু উপকার করে থাকে। কি শুনে অবাক হলেন? শুকনো মরিচ খেলে আবার উপকার! আসুন আজ জেনে নিই শুকনো মরিচ খেলে আমাদের কী কী উপকার হয়ে থাকে।</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\"><span class=\"q9uorilb tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me fgm26odu gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t69/1.5/16/270d.png\" alt=\"✍️\" width=\"16\" height=\"16\" /></span>উপকারীতাঃ</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\">১। শুকনো মরিচে থাকা ক্যাপসাইসিন আমাদের বিভিন্ন কার্ডিওভ্যাস্কুলার রোগ দূরে থাকে। একই সাথে শুকনো মরিচ খেলে আমাদের দেহে জমে থাকা খারাপ কোলেস্টেরল কমে যায়। আর এর ফলেই আমাদের হৃদপিণ্ড সুস্থ থাকে। এছাড়াও শুকনো মরিচে ক্যাপসেইসিনের পরিমাণ বেশী থাকায় এবং অ্যান্টিইনফ্লেমেটরি উপাদান থাকায় এটি আমাদের শরীরে বিভিন্ন স্থানে হওয়া ব্যাথা খুব দ্রুত কমাতে সাহায্য করে।</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\">২। শুকনো মরিচ আমাদের হাইপারটেনশন কমিয়ে থাকে। ফলে উচ্চ রক্তচাপ বা হাই ব্লাড প্রেসারের সমস্যা অনেক কমে যায়।শুকনো মরিচ খেলে আমাদের রক্তের শিরা এবং উপশিরা নমনীয় হয়ে থাকে।এটি প্লেটলেট বা অনুচক্রিকাকে জমাট বাঁধতে দেয় না। ফলে রক্তে ট্রাইগ্লিসারাইডের মাত্রা কমায়।একই সাথে শুকনো মরিচ আমাদের ধমনীকে প্রসারিত করে।</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\">৩। শুকনো মরিচে প্রচুর পরিমাণে ভিটামিন এ এবং সি থাকে। যা আমাদের চোখ এবং ত্বকের জন্য বেশ উপকারী। একই সাথে শুকনো মরিচ নাসিকাপথ একদম পরিষ্কার থাকে। একইসাথে এটি আমাদের অন্ত্র, মূত্রনালী ও ফুসফুসে কোনো সংক্রমণ হতে দেয় না। এছাড়াও শুকনো মরিচ খেলে সাধারণ সর্দি কাশি দূরে থাকে এবং স্ট্রোক হওয়ার সম্ভাবনা কমে যায়।</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\">৪। শুকনো মরিচে থাকে ক্যাপসেইসিন নামক যৌগ। যা আমাদের থার্মোজেনিক ইফেক্টের জন্য দায়ী। এই থার্মোজেনিক ইফেক্ট আমাদের দেহের ক্যালরি ক্ষয় করে অতিরিক্ত ওজন কমিয়ে থাকে।একই সাথে ক্যাপসেইসিন আমাদের দেহের ক্যান্সার কোষ ধ্বংস করে দেয়।ফলে ক্যান্সারের মত রোগে আক্রান্ত হওয়ার আশঙ্কা অনেক কমে যায় । এছাড়াও ঝাল খেলে সাধারণ সর্দি কাশি দূরে থাকে এবং স্ট্রোক হওয়ার সম্ভাবনা কমে যায়।</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\">৫। শুকনো মরিচে থাকা ক্যাপসাইসিন আর্থারাইটিস বা বাতের ব্যথায় দারুণ কাজে দেয়। এটি যেকোনো ধরনের মাসল্ পেইন, জয়েন্ট পেইন, অস্টিওআর্থারাইটিসের যন্ত্রণা কমায়।একই সাথে এটি এন্ডোরফিনের ক্ষরণ বাড়িয়ে, যৌন চাহিদা বাড়ায়।এছাড়াও শুকনো মরিচ রাতকানা রোগ প্রতিরোধ করে। রেটিনার কোষের ক্ষয় রোধে সাহায্যে করে।</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\"><span class=\"q9uorilb tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me fgm26odu gl3lb2sf hhz5lgdu\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t43/1.5/16/1f970.png\" alt=\"🥰\" width=\"16\" height=\"16\" /></span>তাই আর দেরি না করে শতভাগ খাঁটি মরিচের গুঁড়ো পেতে আমাদের কাছে অডার করুন ।</div>\r\n</div>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\">\r\n<div dir=\"auto\" style=\"text-align: start;\"><span class=\"q9uorilb tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me fgm26odu gl3lb2sf hhz5lgdu\">&nbsp;</span></div>\r\n</div>\r\n</body>\r\n</html>', 100, 14.00, '2020-07-06', 3, 0, NULL, 1, 0, 0, 1, '1', 'bagerhat', '2020-07-06 19:45:41', '2020-07-07 14:58:08'),
(3, 'Samsung 32 in  HD TV', 'samsung-32-in-hd-tv-1', '[\"public\\/images\\/products\\/15940977970.jpg\"]', '[\"public\\/images\\/products\\/original\\/15940977970.jpg\"]', 4, 2, 2, NULL, NULL, 4, 7500.00, 11500.00, NULL, '3-7 Day', '7days', '1 Year Local seller warranty', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h2 class=\"pdp-mod-section-title outer-title\" style=\"margin: 0px; padding: 0px 24px; font-weight: 500; font-family: Roboto-Medium; font-size: 16px; line-height: 52px; color: #212121; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; height: 52px; background: #fafafa;\" data-spm-anchor-id=\"a2a0e.pdp.0.i1.430c399bLykTZt\">Product details of Samsung HD LED TV -32 inch</h2>\r\n<div class=\"pdp-product-detail\" style=\"margin: 0px; padding: 0px; position: relative; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px;\" data-spm=\"product_detail\">\r\n<div class=\"pdp-product-desc height-limit\" style=\"margin: 0px; padding: 5px 14px 5px 24px; height: 780px; overflow-y: hidden; box-sizing: border-box;\">\r\n<div class=\"html-content pdp-product-highlights\" style=\"margin: 0px; padding: 11px 0px 16px; word-break: break-word; border-bottom: 1px solid #eff0f5; overflow: hidden;\">\r\n<ul class=\"\" style=\"margin: 0px; padding: 0px; list-style: none; overflow: hidden; columns: auto 2; column-gap: 32px;\">\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">\r\n<h2 class=\"pdp-mod-section-title outer-title\" style=\"margin: 0px; padding: 0px 24px; font-weight: 500; font-family: Roboto-Medium; font-size: 16px; line-height: 52px; color: #212121; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; height: 52px; background: #fafafa;\" data-spm-anchor-id=\"a2a0e.pdp.0.i1.430c399bLykTZt\">Samsung</h2>\r\n&nbsp;32\'\' HD LED TV</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Brand :&nbsp;\r\n<h2 class=\"pdp-mod-section-title outer-title\" style=\"margin: 0px; padding: 0px 24px; font-weight: 500; font-family: Roboto-Medium; font-size: 16px; line-height: 52px; color: #212121; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; height: 52px; background: #fafafa;\" data-spm-anchor-id=\"a2a0e.pdp.0.i1.430c399bLykTZt\">Samsung</h2>\r\n</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Aspect Ratio : 16:9, 4:3</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Resolution : 1366 x 768P</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Viewing Angle : H 1780/V 1780</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\"></li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Brightness : 230 cd/m2</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Response Time : 8.5 ms</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Backlight Type : DLED</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Display Device : LED</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Dynamic Backlight Adjust : YES</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Noise Reduction : Standard</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Picture Improvement : CTI/ LTI</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">De- Interlace : 3D</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Weak signal Enhancement : Yes</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Input &amp; Output Ports : HDMI,VGA,USB</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\"></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 100, 33.00, '2020-07-07', 11, 0, NULL, 0, 0, 0, 1, '1', 'general', '2020-07-07 14:49:09', '2020-07-11 18:42:25'),
(4, 'Autem iure non sit', 'autem-iure-non-sit', '[\"public\\/images\\/products\\/15940996300.jpeg\"]', '[\"public\\/images\\/products\\/original\\/15940996300.jpeg\"]', 2, NULL, 2, NULL, NULL, 3, 70.00, 38.00, NULL, 'Ipsa tempor laborio', 'Est non dolorem dol', 'Quis iusto autem off', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Est illum, qui asper.</p>\r\n</body>\r\n</html>', 859, 11.00, '2020-07-07', 0, 0, NULL, 1, 1, 1, 1, '9', 'bagerhat', '2020-07-07 15:27:10', '2020-07-07 15:27:10'),
(5, 'Expedita corporis nu', 'expedita-corporis-nu-1', '[\"public\\/images\\/products\\/15940996740.jpeg\"]', '[\"public\\/images\\/products\\/original\\/15940996740.jpeg\"]', 5, 3, 3, NULL, NULL, 4, 659.00, 295.00, NULL, 'Quasi mollit nihil e', 'Cupidatat temporibus', 'Rerum vitae consequu', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Ab qui duis est, cor.</p>\r\n</body>\r\n</html>', 111, 34.00, '2020-07-07', 0, 0, NULL, 1, 1, 1, 1, '9', 'bagerhat', '2020-07-07 15:27:54', '2020-07-07 15:28:41'),
(6, '32\'\' Sony Plus HD LED TV', '32\'\'-sony-plus-hd-led-tv', '[\"public\\/images\\/products\\/15941001000.jpg\"]', '[\"public\\/images\\/products\\/original\\/15941001000.jpg\"]', 4, 2, 3, NULL, NULL, 1, 7500.00, 11500.00, NULL, '1-7 Day', '7days', '1 Year Local seller warranty', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h2 class=\"pdp-mod-section-title outer-title\" style=\"margin: 0px; padding: 0px 24px; font-weight: 500; font-family: Roboto-Medium; font-size: 16px; line-height: 52px; color: #212121; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; height: 52px; background: #fafafa;\" data-spm-anchor-id=\"a2a0e.pdp.0.i4.32c22d13Osuf03\">Product details of 32\'\' Sony Plus HD LED TV</h2>\r\n<div class=\"pdp-product-detail\" style=\"margin: 0px; padding: 0px; position: relative; font-family: Roboto, -apple-system, BlinkMacSystemFont, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px;\" data-spm=\"product_detail\">\r\n<div class=\"pdp-product-desc \" style=\"margin: 0px; padding: 5px 14px 5px 24px; height: auto; overflow-y: hidden; box-sizing: border-box;\">\r\n<div class=\"html-content pdp-product-highlights\" style=\"margin: 0px; padding: 11px 0px 16px; word-break: break-word; border-bottom: 1px solid #eff0f5; overflow: hidden;\">\r\n<ul class=\"\" style=\"margin: 0px; padding: 0px; list-style: none; overflow: hidden; columns: auto 2; column-gap: 32px;\">\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Brand Name: SONY PLUS</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">1 Year Display pannel and All Parts Replacement Warranty.</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">10 Years Service Warranty</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Display Size: 23.5</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Resolution 1366p x 768p HD</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Supported Resoulation 1920p x 1080p ( Full HD )</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Aspect Ratio: 16.9 Format</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Display Color: 16.7 M</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Body Color: Black</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Sound system 2 Speaker Build in.</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Computer Monitor হিসেবে ব্যবহার করা যাবে।</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">CC Camera Monitor হিসাবে ব্যবহার করা যাবে।</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Wall Mount এর সাহায্যে দেয়ালে ঝুলানো যাবে।</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">কোন সাইড নেগেটিভ নাই। যেকোন সাইড থেকে দেখতে পারবেন।</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">USB Port-1</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">VGA Port-1</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">HDMI Port-1</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Multimedia Port - Yes</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">CD/DVD Port - Yes</li>\r\n<li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; box-sizing: border-box; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Made in China</li>\r\n</ul>\r\n</div>\r\n<div class=\"pdp-mod-specification\" style=\"margin: 16px 0px 0px; padding: 0px 0px 10px; border-bottom: 1px solid #eff0f5; font-size: 14px;\">\r\n<h2 class=\"pdp-mod-section-title \" style=\"margin: 0px; padding: 0px; font-weight: 500; font-family: Roboto-Medium; font-size: 16px; line-height: 19px; color: #212121; letter-spacing: 0px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\">Specifications of 32\'\' Sony Plus HD LED TV</h2>\r\n</div>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 1000000000, 18.00, '2020-07-07', 2, 0, NULL, 0, 0, 0, 1, '1', 'others', '2020-07-07 15:35:01', '2020-07-11 17:42:12'),
(7, 'হলুদের গুড়া (১কেজি)', 'হলুদের-গুড়া-(১কেজি)-1', '[\"public\\/images\\/products\\/15941007790.jpg\"]', '[\"public\\/images\\/products\\/original\\/15941007790.jpg\"]', 5, 3, NULL, NULL, NULL, 4, 300.00, 300.00, NULL, '1 - 3 days', NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 1000000, 18.00, '2020-07-07', 5, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-07 15:46:19', '2020-07-09 04:43:28'),
(8, 'টাইগার জিরা (১কেজি)', 'টাইগার-জিরা-(১কেজি)-1', '[\"public\\/images\\/products\\/15942315380.jpg\",\"public\\/images\\/products\\/15942315381.jpg\"]', '[\"public\\/images\\/products\\/original\\/15942315380.jpg\",\"public\\/images\\/products\\/original\\/15942315381.jpg\"]', 5, 3, NULL, NULL, NULL, 4, 290.00, 400.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class=\"w20 fl\" style=\"margin: 0px; padding: 0px; width: 160.859px; display: inline-block; vertical-align: top; zoom: 1; float: left; color: #323232; font-family: solaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">&nbsp;</div>\r\n<div class=\"w80\" style=\"margin: 0px; padding: 0px; width: 635.406px; display: inline-block; vertical-align: top; zoom: 1; color: #323232; font-family: solaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">\r\n<h1 class=\"title\" style=\"margin: 0px 0px 5px; padding: 0px; font-size: 32px; font-weight: normal; line-height: 40px;\">জিরা ভেজানো পানিপানে ডায়াবেটিস নিয়ন্ত্রণ!</h1>\r\n<div id=\"media\" class=\"media\" style=\"margin: 20px 0px; padding: 0px; position: relative;\"><img id=\"mediaphoto\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: auto;\" src=\"https://www.somoynews.tv/img/upload/medium/jira-pani-1-140369.jpg\" alt=\"জিরা ভেজানো পানিপানে ডায়াবেটিস নিয়ন্ত্রণ! \" /></div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div class=\"spc_d\" style=\"margin: 10px 0px 0px; padding: 10px 0px 0px; color: #303030; font-size: 20px; line-height: 30px; font-family: solaimanLipi, Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">ডায়াবেটিসের কথা এখন কমবেশি সবার মুখে শোনা যায়। ডায়াবেটিস একটি হরমোন সংশ্লিষ্ট রোগ। রক্তে চিনি বা শকর্রার উপস্থিতিজনিত অসামঞ্জস্য দেখা দিলে অর্থাৎ শরীরে ইনসুলিনের ঘাটতিই হল এ রোগের মূল কথা।</strong><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" />ডায়াবেটিস পুরোপুরি নিরাময় করা না গেলেও একে নিয়ন্ত্রণে রাখার নানা উপায় জানান চিকিৎসকরা। তাদের পরামর্শ মেনে নিয়মিত শরীরচর্চা ও ওষুধ গ্রহণ করেই থাকেন অনেকে। তবে, পুষ্টিবিদ ও চিকিৎসকদের মতে, ওষুধের পাশাপাশি কিছু পথ্যও রাখা উচিৎ প্রতিদিনের খাদ্য তালিকায়।<br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" />ডায়াবেটিস ও মেদ কমাতে জিরার জুড়ি নেই। জিরায় থাকা অ্যান্টিইনফ্ল্যামেটরি অ্যান্টিঅক্সিডেন্ট মেদ ঝরাতে কাজে করে এবং রক্তে শর্করার পরিমাণ নিয়ন্ত্রণে রাখে। এছাড়া পরিপাকতন্ত্রকে পরিষ্কার রাখা, বমি ভাব ও কোষ্ঠকাঠিন্য দূর করে জিরা।<br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" />ডায়াবেটিস আক্রান্তদের ক্ষেত্রে জিরা ভিজানো পানি খাওয়ার পরামর্শ দেন চিকিৎসকরা। জিরা রক্তের ক্ষতিকারক শর্করা ট্রাইগ্লিসারাইড ও কোলেস্টরলের মাত্রা কমিয়ে ফেলতে সক্ষম। জিরা ভেজানো পানি যদি কেউ খালি পেটে খেতে পারেন, তবে মেদ কমার সঙ্গে ডায়াবেটিসও কমে।<br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" />যেভাবে খাবেন জিরা: রাতে ঘুমোতে যাওয়ার আগে একটি গ্লাসে পানি নিয়ে তাতে কয়েকটি জিরার দানা ফেলে চাপা দিয়ে রেখে দিন। পরের দিন সকালে সেই পানি ছেঁকে তা ফুটিয়ে খান। খালি পেটে প্রতিদিন এই পানি খাওয়ার অভ্যাস করুন।</div>\r\n</body>\r\n</html>', 10000, 12.00, '2020-07-08', 2, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-09 04:05:38', '2020-07-09 04:06:54'),
(9, 'শুকনা দেশী হলুদ  (১কেজি)', 'শুকনা-দেশী-হলুদ-(১কেজি)-1', '[\"public\\/images\\/products\\/15942321450.jpg\",\"public\\/images\\/products\\/15942321451.jpg\"]', '[\"public\\/images\\/products\\/original\\/15942321450.jpg\",\"public\\/images\\/products\\/original\\/15942321451.jpg\"]', 5, 3, NULL, NULL, NULL, 4, 125.00, 160.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><span style=\"color: #222222; font-family: SolaimanLipi; font-size: 15px;\">বাঙালি রান্নার এক অনন্য উপকরণ হলুদ। যার ব্যবহার প্রাচীনকাল থেকেই এ পর্যন্ত হয়ে আসছে। নিত্য দিনের রান্নায় হলুদ ব্যবহার করে না এমন মানুষ খুঁজেই পাওয়া যাবে না। রান্নায় এই মসলাজাতিও দ্রব্য শুধু রঙ তৈরি করে না বরং এর স্বাদও দ্বিগুণ বাড়িয়ে দেয়।&nbsp;হলুদের এমন অনেক গুনাগুণ আছে যা বলে শেষ করা যাবে না। দিনদিন হলুদের জনপ্রিয়তা বাড়ার কারণ- গবেষণায় হলুদের ইতিবাচক প্রভাব। হলুদের মধ্যে থাকা কারকুমিন বিভিন্ন অসুখ বিসুখের বিরুদ্ধে লড়াইয়ের এক অন্যতম হাতিয়ার।&nbsp;</span></p>\r\n</body>\r\n</html>', 100000, 12.00, '2020-07-09', 1, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-09 04:15:45', '2020-07-10 23:56:07'),
(10, 'শুকনা ইন্ডিয়ান হলুদ  (১কেজি)', 'শুকনা-ইন্ডিয়ান-হলুদ-(১কেজি)', '[\"public\\/images\\/products\\/15942321491.jpg\"]', '[\"public\\/images\\/products\\/original\\/15942321491.jpg\"]', 5, 3, NULL, NULL, NULL, 4, 125.00, 145.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><span style=\"color: #222222; font-family: SolaimanLipi; font-size: 15px;\">বাঙালি রান্নার এক অনন্য উপকরণ হলুদ। যার ব্যবহার প্রাচীনকাল থেকেই এ পর্যন্ত হয়ে আসছে। নিত্য দিনের রান্নায় হলুদ ব্যবহার করে না এমন মানুষ খুঁজেই পাওয়া যাবে না। রান্নায় এই মসলাজাতিও দ্রব্য শুধু রঙ তৈরি করে না বরং এর স্বাদও দ্বিগুণ বাড়িয়ে দেয়।&nbsp;হলুদের এমন অনেক গুনাগুণ আছে যা বলে শেষ করা যাবে না। দিনদিন হলুদের জনপ্রিয়তা বাড়ার কারণ- গবেষণায় হলুদের ইতিবাচক প্রভাব। হলুদের মধ্যে থাকা কারকুমিন বিভিন্ন অসুখ বিসুখের বিরুদ্ধে লড়াইয়ের এক অন্যতম হাতিয়ার।&nbsp;</span></p>\r\n</body>\r\n</html>', 100000, 12.00, '2020-07-09', 1, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-09 04:15:49', '2020-07-11 18:25:06'),
(11, 'শুকনা মরিচ  (১কেজি)', 'শুকনা-মরিচ-(১কেজি)-1', '[\"public\\/images\\/products\\/15942330730.jpg\",\"public\\/images\\/products\\/15942330731.jpg\"]', '[\"public\\/images\\/products\\/original\\/15942330730.jpg\",\"public\\/images\\/products\\/original\\/15942330731.jpg\"]', 5, 3, NULL, NULL, NULL, 4, 200.00, 320.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div style=\"box-sizing: border-box; color: #212529; font-family: solaimanlipi; font-size: 16px; text-align: justify;\"><span style=\"box-sizing: border-box; font-size: 18px;\"><span style=\"box-sizing: border-box; color: #006400;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">শুকনা মরিচের&nbsp;উপকারিতা :</span></span></span></div>\r\n<div style=\"box-sizing: border-box; color: #212529; font-family: solaimanlipi; font-size: 16px; text-align: justify;\">&nbsp;</div>\r\n<div style=\"box-sizing: border-box; color: #212529; font-family: solaimanlipi; font-size: 16px; text-align: justify;\"><span style=\"box-sizing: border-box; color: #008000;\"><span style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">টিস (Diabetes)</span></span></span></div>\r\n<div style=\"box-sizing: border-box; color: #212529; font-family: solaimanlipi; font-size: 16px; text-align: justify;\">মরিচের প্রধান রাসায়নিক উপাদানের নাম ক্যাপসিসিন,যা&nbsp; তীব্র ঝাল লাগার অনুভুতি সৃষ্টি করে থাকে।ক্যাপসিসিন নামক এই উপাদানটি&nbsp; রক্তে সুগারের মাত্রা কমায়।</div>\r\n<div style=\"box-sizing: border-box; color: #212529; font-family: solaimanlipi; font-size: 16px; text-align: justify;\">&nbsp;</div>\r\n<div style=\"box-sizing: border-box; color: #212529; font-family: solaimanlipi; font-size: 16px; text-align: justify;\"><span style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; color: #008000;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">স্থূলতা (Obesity)</span></span></span></div>\r\n<div style=\"box-sizing: border-box; color: #212529; font-family: solaimanlipi; font-size: 16px; text-align: justify;\">ক্যাপসিসিন হলো এক ধরনের থার্মোজেনিক উপাদান যা বিপাক ক্রিয়াকে বৃদ্ধি করে এবং চর্বি ভাঙ্গন প্রক্রিয়াতে বিশেষ উপকরন হিসাবে কাজ করে।</div>\r\n</body>\r\n</html>', 180000, 18.00, '2020-07-09', 0, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-09 04:31:13', '2020-07-10 23:55:38'),
(12, 'এসি আই লবন (১কেজি)', 'এসি-আই-লবন-(১কেজি)-1', '[\"public\\/images\\/products\\/15942337230.jpg\",\"public\\/images\\/products\\/15942337231.jpg\"]', '[\"public\\/images\\/products\\/original\\/15942337230.jpg\",\"public\\/images\\/products\\/original\\/15942337231.jpg\"]', 5, 3, NULL, NULL, NULL, 4, 35.00, 40.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-bottom: 10px; font-size: 18px; line-height: 26px; font-family: SolaimanLipi; text-align: justify;\">লবণ ছাড়া যে কোনো খাবার মুখে তোলা কঠিন। কারণ লবণ ছাড়া খাবারে কোনো স্বাদ পাওয়া যায় না। তবে অতিরিক্ত লবণ খাওয়া শরীরের জন্য বিপত্তির কারণ হতে পারে। হতে পারে নানা অসুখ।</p>\r\n<div class=\"advertisement_inner  hidden-print\" style=\"box-sizing: border-box; overflow: hidden; padding: 7px 0px 7px 7px; float: right; font-family: SolaimanLipi; font-size: 18px; text-align: justify;\">&nbsp;</div>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-bottom: 10px; font-size: 18px; line-height: 26px; font-family: SolaimanLipi; text-align: justify;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-bottom: 10px; font-size: 18px; line-height: 26px; font-family: SolaimanLipi; text-align: justify;\">অতিরিক্ত লবণ খাওয়ার ফলে উচ্চ রক্তচাপ, হার্টের সমস্যা, কিডনির সমস্যাসহ নানা অসুখ শরীরে বাসা বাঁধে। তাই কী পরিমাণ লবণ খাবেন, তার পরিমাণ ঠিক করতে হবে। আপনি জানেন কী কতটুকু পরিমাণ লবণ খাবেন?</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-bottom: 10px; font-size: 18px; line-height: 26px; font-family: SolaimanLipi; text-align: justify;\">আসুন জেনে নেই কতটুকু পরিমাণ লবণ খাবেন? কী পরিমাণ লবণ খাবেন তা নিয়ে বিশ্ব স্বাস্থ্য সংস্থার একটি নির্দেশিকা রয়েছে।</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-bottom: 10px; font-size: 18px; line-height: 26px; font-family: SolaimanLipi; text-align: justify;\">লবণ নিয়ে সাম্প্রতিক গবেষণাগুলো বিভিন্ন ধরনের সতর্কবার্তা দিচ্ছে। আমেরিকান হেলথ অ্যাসোসিয়েশন&rsquo;-এর গবেষকদের দাবি, লবণে বিভিন্ন ধরনের সমস্যা হতে পারে। অতিরিক্ত লবণ খাওয়ার ফলে শরীরের পানি কমে যেতে পারে। ফলে ব্রেন স্ট্রোকের শঙ্কা বাড়ে। এছাড়া ক্ষয়ে যেতে থাকে হাড়ের ক্যালসিয়াম</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-bottom: 10px; font-size: 18px; line-height: 26px; font-family: SolaimanLipi; text-align: justify;\">এছাড়া অতিরিক্ত লবণ খাওয়ার ফলে, মস্তিষ্কের নিউরোনকেও প্রভাবিত করে। কোলন ক্যানসার, পাকস্থলীর ক্যানসার ও শরীরে হরমোনের ভারসাম্য নষ্ট হওয়ারসহ মারাত্মক ক্ষতি হতে পারে।</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-bottom: 10px; font-size: 18px; line-height: 26px; font-family: SolaimanLipi; text-align: justify;\">কী পরিমাণ লবণ খাবেন, সে ব্যাপারে তথ্য জানিয়েছে বিশ্ব স্বাস্থ্য সংস্থা।বিশ্ব স্বাস্থ্য সংস্থা বলছে, লবণ অতিরিক্ত বা খুব কম খাওয়া ঠিক নয়। তবে প্রতিদিন দুই গ্রাম বা হাফ চা চামচের মধ্যেই সীমাবদ্ধ রাখুন লবণের পরিমাণ।&nbsp;</p>\r\n</body>\r\n</html>', 10000, 5.00, '2020-07-09', 1, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-09 04:42:03', '2020-07-10 23:55:24'),
(13, 'বাগদা চিংড়ি মাছ ( ১কেজি)', 'বাগদা-চিংড়ি-মাছ-(-১কেজি)-1', '[\"public\\/images\\/products\\/15943904010.jpg\",\"public\\/images\\/products\\/15943904011.jpg\"]', '[\"public\\/images\\/products\\/original\\/15943904010.jpg\",\"public\\/images\\/products\\/original\\/15943904011.jpg\"]', 6, 4, NULL, NULL, NULL, 4, 450.00, 580.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong style=\"box-sizing: border-box; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\">যদিও চিংড়ি একটি মাছ নয়, একটি পোকা, তবুও আমরা একে চিংড়ি মাছ হিসেবেই চিনে থাকি। যারা মাছ খেতে পছন্দ করেন না তারাও চিংড়িমাছ বেশ মজা করেই খেয়ে থাকেন। সকলের কাছেই চিংড়ির তৈরি খাবার অনেক পছন্দের। চিংড়ি দিয়ে তৈরি করা হরেক পদের রেসিপি। তবে শুধু স্বাদের নয় চিংড়ির রয়েছে স্বাস্থ্য উপকারীতাও।</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong style=\"box-sizing: border-box; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\"><strong style=\"box-sizing: border-box; color: #0000ff;\">(১) চিংড়ি মাছ আমাদের দেহের ভিটামিন বি১২ এর চাহিদা প্রায় ২৫% দূর করে। এবং দেহের রক্তের হিমোগ্লোবিনের মাত্রা অর্থাৎ রক্তের লাল কণিকা বৃদ্ধিতে সহায়তা করে। এতে করে রক্তস্বল্পতা দূর হয়।<br style=\"box-sizing: border-box;\" />(২) চিংড়ি মাছের মধ্যে রয়েছে প্রায় ১৪% ফসফরাস। চিংড়ি মাছ খাওয়ার অভ্যাস দেহের ফসসরাসের চাহিদা পূরণ করে যা হাড়ের ক্ষয় রোধ করে ও হাড়কে মজবুত করতে বিশেষভাবে কাজ করে।<br style=\"box-sizing: border-box;\" />(৩) আমাদের মুটিয়ে যাওয়ার প্রথম ও প্রধান কারণ দেহে ফ্যাট জমা। চিংড়ি মাছের মধ্যে রয়েছে প্রায় ১৩% নিয়াসিন যা ফ্যাট, কার্বোহাইড্রেট ও প্রোটিনকে এনার্জিতে পরিবর্তন করে এবং দেহে ফ্যাট জমতে বাঁধা দেয়।<br style=\"box-sizing: border-box;\" />(৪) মাত্র ১০০ গ্রাম চিংড়ি মাছে রয়েছে প্রায় ৩৪৭ মিলিগ্রাম ওমেগা৩ ফ্যাটি অ্যাসিড। গবেষকদের মতে এই ওমেগা৩ ফ্যাটি অ্যাসিড মস্তিষ্কে সেরেটেনিন উৎপন্ন করে যা বিষণ্ণতা দূর করতে বিশেষভাবে সহায়ক।<br style=\"box-sizing: border-box;\" />(৫) চিংড়িমাছের প্রায় ১০% কপার আমাদের থাইরয়েড গ্রন্থির কর্মক্ষমতা বৃদ্ধি করে এবং থাইরয়েড হরমোনের মাত্রা ঠিক রাখতে সহায়তা করে।</strong></strong></p>\r\n</body>\r\n</html>', 10, 4.00, '2020-07-10', 2, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 00:13:21', '2020-07-11 03:15:19'),
(14, 'গলদা চিংড়ি মাছ (১কেজি)', 'গলদা-চিংড়ি-মাছ-(১কেজি)', '[\"public\\/images\\/products\\/15943907690.jpg\",\"public\\/images\\/products\\/15943907691.jpg\"]', '[\"public\\/images\\/products\\/original\\/15943907690.jpg\",\"public\\/images\\/products\\/original\\/15943907691.jpg\"]', 6, 5, NULL, NULL, NULL, 1, 550.00, 700.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-family: Rubik, sans-serif; line-height: 1.7; text-align: justify;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-weight: bolder; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\">যদিও চিংড়ি একটি মাছ নয়, একটি পোকা, তবুও আমরা একে চিংড়ি মাছ হিসেবেই চিনে থাকি। যারা মাছ খেতে পছন্দ করেন না তারাও চিংড়িমাছ বেশ মজা করেই খেয়ে থাকেন। সকলের কাছেই চিংড়ির তৈরি খাবার অনেক পছন্দের। চিংড়ি দিয়ে তৈরি করা হরেক পদের রেসিপি। তবে শুধু স্বাদের নয় চিংড়ির রয়েছে স্বাস্থ্য উপকারীতাও।</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-family: Rubik, sans-serif; line-height: 1.7; text-align: justify;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-family: Rubik, sans-serif; line-height: 1.7; text-align: justify;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-weight: bolder; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-weight: bolder; color: #0000ff;\">(১) চিংড়ি মাছ আমাদের দেহের ভিটামিন বি১২ এর চাহিদা প্রায় ২৫% দূর করে। এবং দেহের রক্তের হিমোগ্লোবিনের মাত্রা অর্থাৎ রক্তের লাল কণিকা বৃদ্ধিতে সহায়তা করে। এতে করে রক্তস্বল্পতা দূর হয়।<br style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px;\" />(২) চিংড়ি মাছের মধ্যে রয়েছে প্রায় ১৪% ফসফরাস। চিংড়ি মাছ খাওয়ার অভ্যাস দেহের ফসসরাসের চাহিদা পূরণ করে যা হাড়ের ক্ষয় রোধ করে ও হাড়কে মজবুত করতে বিশেষভাবে কাজ করে।<br style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px;\" />(৩) আমাদের মুটিয়ে যাওয়ার প্রথম ও প্রধান কারণ দেহে ফ্যাট জমা। চিংড়ি মাছের মধ্যে রয়েছে প্রায় ১৩% নিয়াসিন যা ফ্যাট, কার্বোহাইড্রেট ও প্রোটিনকে এনার্জিতে পরিবর্তন করে এবং দেহে ফ্যাট জমতে বাঁধা দেয়।<br style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px;\" />(৪) মাত্র ১০০ গ্রাম চিংড়ি মাছে রয়েছে প্রায় ৩৪৭ মিলিগ্রাম ওমেগা৩ ফ্যাটি অ্যাসিড। গবেষকদের মতে এই ওমেগা৩ ফ্যাটি অ্যাসিড মস্তিষ্কে সেরেটেনিন উৎপন্ন করে যা বিষণ্ণতা দূর করতে বিশেষভাবে সহায়ক।<br style=\"box-sizing: border-box; margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px;\" />(৫) চিংড়িমাছের প্রায় ১০% কপার আমাদের থাইরয়েড গ্রন্থির কর্মক্ষমতা বৃদ্ধি করে এবং থাইরয়েড হরমোনের মাত্রা ঠিক রাখতে সহায়তা করে।</span></span></p>\r\n</body>\r\n</html>', 10, 5.00, '2020-07-10', 0, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 00:19:29', '2020-07-11 00:19:29'),
(15, 'ট‌্যাংরা মাছ (১কেজি)', 'ট‌্যাংরা-মাছ-(১কেজি)-1', '[\"public\\/images\\/products\\/15943931990.jpg\",\"public\\/images\\/products\\/15943931991.jpg\"]', '[\"public\\/images\\/products\\/original\\/15943931990.jpg\",\"public\\/images\\/products\\/original\\/15943931991.jpg\"]', 7, 6, NULL, NULL, NULL, 4, 480.00, 550.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>k</p>\r\n</body>\r\n</html>', 10, 3.00, '2020-07-10', 2, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 00:59:59', '2020-07-11 02:47:09'),
(16, 'গরুর মাংশ (১কেজি)', 'গরুর-মাংশ-(১কেজি)-1', '[\"public\\/images\\/products\\/15943995130.jpg\",\"public\\/images\\/products\\/15943995131.jpg\"]', '[\"public\\/images\\/products\\/original\\/15943995130.jpg\",\"public\\/images\\/products\\/original\\/15943995131.jpg\"]', 7, 7, NULL, NULL, NULL, 4, 550.00, 580.00, NULL, NULL, NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #222222; font-family: SolaimanLipi, arial, sans-serif; font-size: 18px;\">গরুর মাংস অনেক স্বাদের এবং প্রায় সবার কাছেই খুব প্রিয় একটি খাবার।&nbsp; তবে বেশ কিছু স্বাস্থ্যঝুঁকির কারণ চিহ্নিত হওয়ায় খাবারটি প্রিয় হলেও অনেকে এড়িয়েও চলেন। কারণ গরুর মাংসে অনেক পুষ্টি থাকার পরেও অতিরিক্ত খেলে তা স্বাস্থ্যের জন্য ক্ষতিকর হয়ে থাকে। তাই গরুর মাংস গ্রহণ করার পূর্বে এর উপকারিতা ও অপকারিতা সম্পর্কে জানা অনেক গুরুত্বপূর্ণ। তাই চলুন এবার জেনে নিই এই খাদ্যের সুফল ও কুফলগুলো।</span></p>\r\n</body>\r\n</html>', 100, 0.00, '2020-07-10', 1, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 02:43:38', '2020-07-11 02:46:29'),
(17, 'কালোজাম মিস্টি (১কেজি)', 'কালোজাম-মিস্টি-(১কেজি)', '[\"public\\/images\\/products\\/15944004340.jpg\",\"public\\/images\\/products\\/15944004341.jpg\",\"public\\/images\\/products\\/15944004342.jpg\"]', '[\"public\\/images\\/products\\/original\\/15944004340.jpg\",\"public\\/images\\/products\\/original\\/15944004341.jpg\",\"public\\/images\\/products\\/original\\/15944004342.jpg\"]', 7, 8, NULL, NULL, NULL, 1, 120.00, 140.00, NULL, '1Day', NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 100, 5.00, '2020-07-10', 0, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 03:00:34', '2020-07-11 03:00:34'),
(18, 'পনস রসগোল্লা (১০পিছ)', 'পনস-রসগোল্লা-(১০পিছ)', '[\"public\\/images\\/products\\/15944007060.jpg\",\"public\\/images\\/products\\/15944007061.jpg\"]', '[\"public\\/images\\/products\\/original\\/15944007060.jpg\",\"public\\/images\\/products\\/original\\/15944007061.jpg\"]', 7, 8, NULL, NULL, NULL, 1, 100.00, 100.00, NULL, '1-3 Day', NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 10000, 0.00, '2020-07-10', 0, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 03:05:06', '2020-07-11 03:05:06'),
(19, 'রসোমালাই (৫০০গ্রাম)', 'রসোমালাই-(৫০০গ্রাম)', '[\"public\\/images\\/products\\/15944009030.jpg\",\"public\\/images\\/products\\/15944009031.jpg\",\"public\\/images\\/products\\/15944009032.jpg\"]', '[\"public\\/images\\/products\\/original\\/15944009030.jpg\",\"public\\/images\\/products\\/original\\/15944009031.jpg\",\"public\\/images\\/products\\/original\\/15944009032.jpg\"]', 7, 8, NULL, NULL, NULL, 1, 100.00, 120.00, NULL, '1-3 Day', NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 100, 0.00, '2020-07-10', 0, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 03:08:23', '2020-07-11 03:08:23'),
(20, 'রসোমালাই (১কেজি)', 'রসোমালাই-(১কেজি)-1', '[\"public\\/images\\/products\\/15944011130.jpg\",\"public\\/images\\/products\\/15944010081.jpg\"]', '[\"public\\/images\\/products\\/original\\/15944011130.jpg\",\"public\\/images\\/products\\/original\\/15944010081.jpg\"]', 7, 8, NULL, NULL, NULL, 4, 200.00, 240.00, NULL, '1-3 Day', NULL, NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 1000000, 0.00, '2020-07-10', 1, 0, NULL, 0, 0, 0, 1, '1', 'bagerhat', '2020-07-11 03:10:08', '2020-07-11 17:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) NOT NULL,
  `rate_value` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `referral_balances`
--

CREATE TABLE `referral_balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `d_code` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` float(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=complete/active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_menu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `menu`, `sub_menu`, `in_body`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, '[\"6\",\"72\",\"33\",\"66\",\"38\",\"43\",\"11\",\"12\",\"108\",\"113\",\"14\",\"13\",\"96\",\"105\",\"48\",\"125\",\"89\",\"104\",\"82\",\"4\",\"134\",\"3\",\"137\",\"130\"]', '[\"88\",\"140\",\"73\",\"135\",\"8\",\"123\",\"136\",\"127\",\"117\",\"9\",\"126\",\"119\",\"10\",\"141\",\"101\",\"106\",\"132\",\"142\",\"34\",\"15\",\"109\",\"133\",\"21\",\"40\",\"74\",\"67\",\"63\",\"20\",\"114\",\"44\",\"54\",\"45\",\"35\",\"97\",\"16\",\"110\",\"68\",\"121\",\"107\",\"98\",\"39\",\"24\",\"90\"]', '[\"143\",\"122\",\"120\",\"139\",\"5\",\"37\",\"95\",\"47\",\"94\",\"100\",\"41\",\"93\",\"118\",\"103\",\"81\",\"77\",\"23\",\"62\",\"19\",\"59\",\"111\",\"53\",\"112\",\"55\",\"129\",\"56\",\"50\",\"65\",\"42\",\"46\",\"70\",\"36\",\"75\",\"99\",\"102\",\"71\",\"124\",\"76\",\"128\",\"64\",\"52\",\"131\",\"58\",\"115\",\"61\",\"18\",\"80\",\"22\"]', 1, 1, '2019-03-24 06:00:00', '2020-03-03 15:54:42'),
(2, '[\"6\",\"72\",\"33\",\"96\"]', '[\"101\",\"98\",\"73\",\"34\",\"74\",\"35\",\"97\"]', '[\"76\",\"77\",\"75\",\"36\",\"37\"]', 2, 1, '2019-03-24 23:12:32', '2020-01-19 20:51:03'),
(3, '[\"6\",\"72\",\"33\",\"66\"]', '[\"68\",\"74\",\"35\",\"34\",\"67\"]', '[\"76\",\"75\"]', 3, 1, '2019-05-18 02:43:34', '2020-04-07 20:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lazy_loader` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `favicon`, `offer`, `lazy_loader`, `email`, `mobile`, `facebook`, `twitter`, `youtube`, `linkedin`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Padma Shop', 'logo-1581432089.png', 'favicon-1561798620.png', 'offer-1581432105.png', 'lazyload.svg', 'superadmin@ecom.com', '01721854751', 'https://fb.com/ecom', 'twitter', 'youtube', 'linkedin', 'Bagerhat Sador', '1', '2019-04-10 12:00:00', '2020-07-11 18:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'M', 0, '2019-04-10 05:46:12', '2019-04-11 05:13:04'),
(2, 'S', 1, '2019-04-10 05:46:20', '2019-04-10 05:46:20'),
(3, 'L', 1, '2019-04-10 05:46:26', '2019-04-10 05:46:26'),
(4, 'XL', 1, '2019-04-10 05:46:43', '2019-04-10 05:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'public/images/slider/1557985802.jpg', 0, NULL, '2019-06-30 21:54:16'),
(2, 'Title', NULL, 'public/images/slider/1557985840.jpg', 0, NULL, '2019-12-15 23:13:14'),
(3, 'Title', NULL, 'public/images/slider/1557985847.jpg', 0, NULL, '2019-12-15 23:13:26'),
(4, 'Title', NULL, 'public/images/slider/1557985857.jpg', 0, NULL, '2019-12-15 23:13:20'),
(6, 'Title', NULL, 'public/images/slider/1557985871.jpg', 0, NULL, '2019-06-30 19:41:29'),
(7, 'test', NULL, 'public/images/slider/1562155845.png', 0, '2019-07-03 22:10:45', '2019-07-06 15:42:58'),
(10, 'g', 'g', 'public/images/slider/1562234906.jpg', 0, '2019-07-04 20:08:26', '2019-07-04 20:08:59'),
(11, 'v', 'PUP', 'public/images/slider/1562666645.jpg', 0, '2019-07-09 20:04:05', '2019-12-15 23:10:42'),
(12, 'p', 'p', 'public/images/slider/1576411936.jpg', 0, '2019-12-15 23:12:17', '2020-01-28 07:19:29'),
(13, 'p', 'p', 'public/images/slider/1576412175.jpeg', 0, '2019-12-15 23:16:15', '2020-01-28 07:19:25'),
(14, 'walton', 'w', 'public/images/slider/1580156656.jpg', 0, '2020-01-28 07:24:17', '2020-01-28 22:16:01'),
(16, 'Slide-1', NULL, 'public/images/slider/1594453110.jpg', 1, '2020-07-11 17:38:30', '2020-07-11 17:38:30'),
(17, 'Slide-2', NULL, 'public/images/slider/1594453120.jpg', 1, '2020-07-11 17:38:41', '2020-07-11 17:38:41'),
(18, 'Slide-3', NULL, 'public/images/slider/1594453130.jpg', 1, '2020-07-11 17:38:50', '2020-07-11 17:38:50'),
(19, 'Slide-4', NULL, 'public/images/slider/1594453140.jpg', 1, '2020-07-11 17:39:00', '2020-07-11 17:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `sms_records`
--

CREATE TABLE `sms_records` (
  `id` int(11) NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sms` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `sending_date` date DEFAULT NULL,
  `sms_count` tinyint(3) DEFAULT 1,
  `send_by` int(11) DEFAULT NULL,
  `is_send` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sms_records`
--

INSERT INTO `sms_records` (`id`, `mobile`, `sms`, `sending_date`, `sms_count`, `send_by`, `is_send`) VALUES
(1, '24324', 'Your \"www.padmashop.com\" OTP code is 448259', '2020-07-08', 1, NULL, 0),
(2, '01723276177', 'An account has been opened on your \"www.padmashop.com\" ', '2020-07-09', 1, NULL, 1),
(3, '01723276177', 'Your \"www.padmashop.com\" OTP code is 668390', '2020-07-09', 1, NULL, 1),
(4, '01711873226', 'Your \"www.padmashop.com\" OTP code is 418553', '2020-07-10', 1, 1, 0),
(5, '01721854751', 'Your \"www.padmashop.com\" OTP code is 953321', '2020-07-10', 1, 1, 0),
(6, '01765200050', 'Your \"www.padmashop.com\" OTP code is 248546', '2020-07-10', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `mail` varchar(191) NOT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title_en`, `title_bn`, `slug`, `image`, `category_id`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Est exercitation con', 'Enim voluptatem veni', 'est-exercitation-con', 'public/images/subcategory/1594011778.jpg', 1, NULL, 9, '2020-07-06 15:02:58', '2020-07-06 19:18:40'),
(2, 'Television', 'টেলিভিশন', 'television', 'public/images/subcategory/1594096565.jpg', 4, NULL, 1, '2020-07-07 14:36:05', '2020-07-07 14:36:05'),
(3, 'Cooking Mashala', 'রান্না করার মসলা', 'cooking-mashala', 'public/images/subcategory/1594098618.jpg', 5, NULL, 1, '2020-07-07 15:10:18', '2020-07-07 15:10:18'),
(4, 'বাগদা চিংড়ি মাছ', 'বাগদা চিংড়ি মাছ', 'বাগদা-চিংড়ি-মাছ', 'public/images/subcategory/1594389983.jpg', 6, NULL, 1, '2020-07-11 00:06:23', '2020-07-11 00:17:07'),
(5, 'গলদা চিংড়ি মাছ', 'গলদা চিংড়ি মাছ', 'গলদা-চিংড়ি-মাছ-(১কেজি)', 'public/images/subcategory/1594390532.jpg', 6, NULL, 1, '2020-07-11 00:15:32', '2020-07-11 00:16:50'),
(6, 'Fish Item', 'মাছ আইটেম', 'ট‌্যাংরা-মাছ', 'public/images/subcategory/1594392342.jpg', 7, NULL, 1, '2020-07-11 00:45:42', '2020-07-11 02:49:56'),
(7, 'মাংশ আইটেম', 'মাংশ আইটেম', 'মাংশ-আইটেম', 'public/images/subcategory/1594399017.jpg', 7, NULL, 1, '2020-07-11 02:36:57', '2020-07-11 02:36:57'),
(8, 'মিস্টি আইটেম/রসোমালাই', 'মিস্টি আইটেম/রসোমালাই', 'মিস্টি-আইটেম-রসোমালাই', 'public/images/subcategory/1594400049.jpg', 7, NULL, 1, '2020-07-11 02:54:09', '2020-07-11 02:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pcs', 1, '2019-04-10 05:47:02', '2019-04-10 05:47:02'),
(2, 'KG', 1, '2019-04-10 05:47:09', '2019-04-10 05:47:09'),
(3, 'M', 1, '2019-04-10 05:47:15', '2019-04-10 05:47:15'),
(4, 'L', 1, '2019-04-10 05:47:20', '2019-04-10 05:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `upazillas`
--

CREATE TABLE `upazillas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `upazillas`
--

INSERT INTO `upazillas` (`id`, `name`, `country`, `district_id`, `shipping_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhamrai', 'Bangladesh', 1, 20.00, 1, '2019-04-09 00:24:28', '2019-04-25 10:41:43'),
(2, 'Dohar', 'Bangladesh', 1, 0.00, 1, '2019-04-09 00:24:28', '2019-04-25 10:42:00'),
(3, 'Keraniganj', 'Bangladesh', 1, 50.00, 1, '2019-04-09 00:24:28', '2019-04-25 10:42:20'),
(4, 'Nawabganj ', 'Bangladesh', 1, 0.00, 0, '2019-04-09 00:24:28', '2019-04-25 10:37:42'),
(5, 'Savar ', 'Bangladesh', 1, 0.00, 1, '2019-04-09 00:24:28', '2019-04-09 00:24:28'),
(6, 'Faridpur Sodar ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(7, 'Boalmari ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(8, 'Alfadanga ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(9, 'Madhukhali ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(10, 'Bhanga ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(11, 'Nagarkanda ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(12, 'Charbhadrasan ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(13, 'Sodarpur ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(14, 'Shaltha ', 'Bangladesh', 2, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(15, 'Gazipur Sodar-Joydebpur', 'Bangladesh', 3, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(16, 'Kaliakior', 'Bangladesh', 3, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(17, 'Kapasia', 'Bangladesh', 3, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(18, 'Sripur', 'Bangladesh', 3, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(19, 'Kaliganj', 'Bangladesh', 3, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(20, 'Tongi', 'Bangladesh', 3, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(21, 'Gopalganj Sodar ', 'Bangladesh', 4, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(22, 'Kashiani ', 'Bangladesh', 4, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(23, 'Kotalipara ', 'Bangladesh', 4, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(24, 'Muksudpur ', 'Bangladesh', 4, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(25, 'Tungipara ', 'Bangladesh', 4, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(26, 'Dewanganj ', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(27, 'Baksiganj ', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(28, 'Islampur ', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(29, 'Jamalpur Sodar ', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(30, 'Madarganj ', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(31, 'Melandaha ', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(32, 'Sarishabari ', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:29', '2019-04-09 00:24:29'),
(33, 'Narundi Police I.C', 'Bangladesh', 5, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(34, 'Astagram ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(35, 'Bajitpur ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(36, 'Bhairab ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(37, 'Hossainpur ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(38, 'Itna ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(39, 'Karimganj ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(40, 'Katiadi ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(41, 'Kishoreganj Sodar ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(42, 'Kuliarchar ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(43, 'Mithamain ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(44, 'Nikli ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(45, 'Pakundia ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(46, 'Tarail ', 'Bangladesh', 6, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(47, 'Madaripur Sodar', 'Bangladesh', 7, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(48, 'Kalkini', 'Bangladesh', 7, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(49, 'Rajoir', 'Bangladesh', 7, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(50, 'Shibchar', 'Bangladesh', 7, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(51, 'Manikganj Sodar ', 'Bangladesh', 8, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(52, 'Singair ', 'Bangladesh', 8, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(53, 'Shibalaya ', 'Bangladesh', 8, 0.00, 1, '2019-04-09 00:24:30', '2019-04-09 00:24:30'),
(54, 'Saturia ', 'Bangladesh', 8, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(55, 'Harirampur ', 'Bangladesh', 8, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(56, 'Ghior ', 'Bangladesh', 8, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(57, 'Daulatpur ', 'Bangladesh', 8, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(58, 'Lohajang ', 'Bangladesh', 9, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(59, 'Sreenagar ', 'Bangladesh', 9, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(60, 'Munshiganj Sodar ', 'Bangladesh', 9, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(61, 'Sirajdikhan ', 'Bangladesh', 9, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(62, 'Tongibari ', 'Bangladesh', 9, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(63, 'Gazaria ', 'Bangladesh', 9, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(64, 'Bhaluka', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(65, 'Trishal', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(66, 'Tarakanda', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(67, 'Haluaghat', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(68, 'Muktagachha', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(69, 'Dhobaura', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(70, 'Fulbaria', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(71, 'Gaffargaon', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(72, 'Gauripur', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(73, 'Ishwarganj', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(74, 'Mymensingh Sodar', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(75, 'Nandail', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(76, 'Phulpur', 'Bangladesh', 10, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(77, 'Araihazar ', 'Bangladesh', 11, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(78, 'Sonargaon ', 'Bangladesh', 11, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(79, 'Bandar', 'Bangladesh', 11, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(80, 'Naryanganj Sodar ', 'Bangladesh', 11, 0.00, 1, '2019-04-09 00:24:31', '2019-04-09 00:24:31'),
(81, 'Rupganj ', 'Bangladesh', 11, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(82, 'Siddirgonj ', 'Bangladesh', 11, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(83, 'Belabo ', 'Bangladesh', 12, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(84, 'Monohardi ', 'Bangladesh', 12, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(85, 'Narsingdi Sodar ', 'Bangladesh', 12, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(86, 'Palash ', 'Bangladesh', 12, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(87, 'Raipura , Narsingdi', 'Bangladesh', 12, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(88, 'Shibpur ', 'Bangladesh', 12, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(89, 'Kendua', 'Bangladesh', 13, 10.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(90, 'Atpara', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(91, 'Barhatta', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(92, 'Durgapur', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(93, 'Kalmakanda', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(94, 'Madan', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(95, 'Mohanganj', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(96, 'Netrakona-S', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(97, 'Purbadhala', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(98, 'Khaliajuri', 'Bangladesh', 13, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(99, 'Baliakandi ', 'Bangladesh', 14, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(100, 'Goalandaghat ', 'Bangladesh', 14, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(101, 'Pangsha ', 'Bangladesh', 14, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(102, 'Kalukhali ', 'Bangladesh', 14, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(103, 'Rajbari Sodar ', 'Bangladesh', 14, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(104, 'Shariatpur Sodar -Palong', 'Bangladesh', 15, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(105, 'Damudya ', 'Bangladesh', 15, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(106, 'Naria ', 'Bangladesh', 15, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(107, 'Jajira ', 'Bangladesh', 15, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(108, 'Bhedarganj ', 'Bangladesh', 15, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(109, 'Gosairhat ', 'Bangladesh', 15, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(110, 'Jhenaigati ', 'Bangladesh', 16, 0.00, 1, '2019-04-09 00:24:32', '2019-04-09 00:24:32'),
(111, 'Nakla ', 'Bangladesh', 16, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(112, 'Nalitabari ', 'Bangladesh', 16, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(113, 'Sherpur Sodar ', 'Bangladesh', 16, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(114, 'Sreebardi ', 'Bangladesh', 16, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(115, 'Tangail Sodar ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(116, 'Sakhipur ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(117, 'Basail ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(118, 'Madhupur ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(119, 'Ghatail ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(120, 'Kalihati ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(121, 'Nagarpur ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(122, 'Mirzapur ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(123, 'Gopalpur ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(124, 'Delduar ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(125, 'Bhuapur ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(126, 'Dhanbari ', 'Bangladesh', 17, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(127, 'Adamdighi', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(128, 'Bogra Sodar', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(129, 'Sherpur', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(130, 'Dhunat', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(131, 'Dhupchanchia', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(132, 'Gabtali', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(133, 'Kahaloo', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(134, 'Nandigram', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(135, 'Sahajanpur', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(136, 'Sariakandi', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(137, 'Shibganj', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(138, 'Sonatala', 'Bangladesh', 18, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(139, 'Joypurhat S', 'Bangladesh', 19, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(140, 'Akkelpur', 'Bangladesh', 19, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(141, 'Kalai', 'Bangladesh', 19, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(142, 'Khetlal', 'Bangladesh', 19, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(143, 'Panchbibi', 'Bangladesh', 19, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(144, 'Naogaon Sodar ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(145, 'Mohadevpur ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(146, 'Manda ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(147, 'Niamatpur ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:33', '2019-04-09 00:24:33'),
(148, 'Atrai ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(149, 'Raninagar ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(150, 'Patnitala ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(151, 'Dhamoirhat ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(152, 'Sapahar ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(153, 'Porsha ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(154, 'Badalgachhi ', 'Bangladesh', 20, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(155, 'Natore Sodar ', 'Bangladesh', 21, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(156, 'Baraigram ', 'Bangladesh', 21, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(157, 'Bagatipara ', 'Bangladesh', 21, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(158, 'Lalpur ', 'Bangladesh', 21, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(159, 'Natore Sodar ', 'Bangladesh', 21, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(160, 'Baraigram ', 'Bangladesh', 21, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(161, 'Bholahat ', 'Bangladesh', 22, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(162, 'Gomastapur ', 'Bangladesh', 22, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(163, 'Nachole ', 'Bangladesh', 22, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(164, 'Nawabganj Sodar ', 'Bangladesh', 22, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(165, 'Shibganj ', 'Bangladesh', 22, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(166, 'Atgharia ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:34', '2019-04-09 00:24:34'),
(167, 'Bera ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(168, 'Bhangura ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(169, 'Chatmohar ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(170, 'Faridpur ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(171, 'Ishwardi ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(172, 'Pabna Sodar ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(173, 'Santhia ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(174, 'Sujanagar ', 'Bangladesh', 23, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(175, 'Bagha', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(176, 'Bagmara', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(177, 'Charghat', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(178, 'Durgapur', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(179, 'Godagari', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(180, 'Mohanpur', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(181, 'Paba', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(182, 'Puthia', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(183, 'Tanore', 'Bangladesh', 24, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(184, 'Sirajganj Sodar ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(185, 'Belkuchi ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(186, 'Chauhali ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(187, 'Kamarkhanda ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(188, 'Kazipur ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(189, 'Raiganj ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(190, 'Shahjadpur ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(191, 'Tarash ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(192, 'Ullahpara ', 'Bangladesh', 25, 0.00, 1, '2019-04-09 00:24:35', '2019-04-09 00:24:35'),
(193, 'Birampur ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(194, 'Birganj', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(195, 'Biral ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(196, 'Bochaganj ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(197, 'Chirirbandar ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(198, 'Phulbari ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(199, 'Ghoraghat ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(200, 'Hakimpur ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(201, 'Kaharole ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(202, 'Khansama ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(203, 'Dinajpur Sodar ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(204, 'Nawabganj', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(205, 'Parbatipur ', 'Bangladesh', 26, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(206, 'Fulchhari', 'Bangladesh', 27, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(207, 'Gaibandha Sodar', 'Bangladesh', 27, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(208, 'Gobindaganj', 'Bangladesh', 27, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(209, 'Palashbari', 'Bangladesh', 27, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(210, 'Sadullapur', 'Bangladesh', 27, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(211, 'Saghata', 'Bangladesh', 27, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(212, 'Sundarganj', 'Bangladesh', 27, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(213, 'Kurigram Sodar', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(214, 'Nageshwari', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(215, 'Bhurungamari', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(216, 'Phulbari', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(217, 'Rajarhat', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(218, 'Ulipur', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(219, 'Chilmari', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(220, 'Rowmari', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(221, 'Char Rajibpur', 'Bangladesh', 28, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(222, 'Lalmanirhat Sodar', 'Bangladesh', 29, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(223, 'Aditmari', 'Bangladesh', 29, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(224, 'Kaliganj', 'Bangladesh', 29, 0.00, 1, '2019-04-09 00:24:36', '2019-04-09 00:24:36'),
(225, 'Hatibandha', 'Bangladesh', 29, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(226, 'Patgram', 'Bangladesh', 29, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(227, 'Nilphamari Sodar', 'Bangladesh', 30, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(228, 'Saidpur', 'Bangladesh', 30, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(229, 'Jaldhaka', 'Bangladesh', 30, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(230, 'Kishoreganj', 'Bangladesh', 30, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(231, 'Domar', 'Bangladesh', 30, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(232, 'Dimla', 'Bangladesh', 30, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(233, 'Panchagarh Sodar', 'Bangladesh', 31, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(234, 'Debiganj', 'Bangladesh', 31, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(235, 'Boda', 'Bangladesh', 31, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(236, 'Atwari', 'Bangladesh', 31, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(237, 'Tetulia', 'Bangladesh', 31, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(238, 'Badarganj', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(239, 'Mithapukur', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(240, 'Gangachara', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(241, 'Kaunia', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(242, 'Rangpur Sodar', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(243, 'Pirgachha', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(244, 'Pirganj', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(245, 'Taraganj', 'Bangladesh', 32, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(246, 'Thakurgaon Sodar ', 'Bangladesh', 33, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(247, 'Pirganj ', 'Bangladesh', 33, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(248, 'Baliadangi ', 'Bangladesh', 33, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(249, 'Haripur ', 'Bangladesh', 33, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(250, 'Ranisankail ', 'Bangladesh', 33, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(251, 'Amtali ', 'Bangladesh', 34, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(252, 'Bamna ', 'Bangladesh', 34, 0.00, 1, '2019-04-09 00:24:37', '2019-04-09 00:24:37'),
(253, 'Barguna Sodar ', 'Bangladesh', 34, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(254, 'Betagi ', 'Bangladesh', 34, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(255, 'Patharghata ', 'Bangladesh', 34, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(256, 'Taltali ', 'Bangladesh', 34, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(257, 'Muladi ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(258, 'Babuganj ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(259, 'Agailjhara ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(260, 'Barisal Sodar ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(261, 'Bakerganj ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(262, 'Banaripara ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(263, 'Gaurnadi ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(264, 'Hizla ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(265, 'Mehendiganj ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(266, 'Wazirpur ', 'Bangladesh', 35, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(267, 'Bhola Sodar ', 'Bangladesh', 36, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(268, 'Burhanuddin ', 'Bangladesh', 36, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(269, 'Char Fasson ', 'Bangladesh', 36, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(270, 'Daulatkhan ', 'Bangladesh', 36, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(271, 'Lalmohan ', 'Bangladesh', 36, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(272, 'Manpura ', 'Bangladesh', 36, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(273, 'Tazumuddin ', 'Bangladesh', 36, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(274, 'Jhalokati Sodar ', 'Bangladesh', 37, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(275, 'Kathalia ', 'Bangladesh', 37, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(276, 'Nalchity ', 'Bangladesh', 37, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(277, 'Rajapur ', 'Bangladesh', 37, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(278, 'Bauphal ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(279, 'Dashmina ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(280, 'Galachipa ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(281, 'Kalapara ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(282, 'Mirzaganj ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(283, 'Patuakhali Sodar ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(284, 'Dumki ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(285, 'Rangabali ', 'Bangladesh', 38, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(286, 'Bhandaria', 'Bangladesh', 39, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(287, 'Kaukhali', 'Bangladesh', 39, 0.00, 1, '2019-04-09 00:24:38', '2019-04-09 00:24:38'),
(288, 'Mathbaria', 'Bangladesh', 39, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(289, 'Nazirpur', 'Bangladesh', 39, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(290, 'Nesarabad', 'Bangladesh', 39, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(291, 'Pirojpur Sodar', 'Bangladesh', 39, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(292, 'Zianagar', 'Bangladesh', 39, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(293, 'Bandarban Sodar', 'Bangladesh', 40, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(294, 'Thanchi', 'Bangladesh', 40, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(295, 'Lama', 'Bangladesh', 40, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(296, 'Naikhongchhari', 'Bangladesh', 40, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(297, 'Ali kadam', 'Bangladesh', 40, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(298, 'Rowangchhari', 'Bangladesh', 40, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(299, 'Ruma', 'Bangladesh', 40, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(300, 'Brahmanbaria Sodar ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(301, 'Ashuganj ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(302, 'Nasirnagar ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(303, 'Nabinagar ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(304, 'Sarail ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(305, 'Shahbazpur Town', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(306, 'Kasba ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(307, 'Akhaura ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(308, 'Bancharampur ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(309, 'Bijoynagar ', 'Bangladesh', 41, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(310, 'Chandpur Sodar', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(311, 'Faridganj', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(312, 'Haimchar', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(313, 'Haziganj', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:39', '2019-04-09 00:24:39'),
(314, 'Kachua', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(315, 'Matlab Uttar', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(316, 'Matlab Dakkhin', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(317, 'Shahrasti', 'Bangladesh', 42, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(318, 'Anwara ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(319, 'Banshkhali ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(320, 'Boalkhali ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(321, 'Chandanaish ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(322, 'Fatikchhari ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(323, 'Hathazari ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(324, 'Lohagara ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(325, 'Mirsharai ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(326, 'Patiya ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(327, 'Rangunia ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(328, 'Raozan ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(329, 'Sandwip ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(330, 'Satkania ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(331, 'Sitakunda ', 'Bangladesh', 43, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(332, 'Barura ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(333, 'Brahmanpara ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(334, 'Burichong ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(335, 'Chandina ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(336, 'Chauddagram ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(337, 'Daudkandi ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(338, 'Debidwar ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(339, 'Homna ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(340, 'Comilla Sodar ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(341, 'Laksam ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(342, 'Monohorgonj ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(343, 'Meghna ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(344, 'Muradnagar ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(345, 'Nangalkot ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(346, 'Comilla Sodar South ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(347, 'Titas ', 'Bangladesh', 44, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(348, 'Chakaria', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(349, 'Coxs Bazar Sodar', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(350, 'Kutubdia', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:40', '2019-04-09 00:24:40'),
(351, 'Maheshkhali', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(352, 'Ramu', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(353, 'Teknaf', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(354, 'Ukhia', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(355, 'Pekua', 'Bangladesh', 45, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(356, 'Feni Sodar', 'Bangladesh', 46, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(357, 'Chagalnaiya', 'Bangladesh', 46, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(358, 'Daganbhyan', 'Bangladesh', 46, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(359, 'Parshuram', 'Bangladesh', 46, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(360, 'Fhulgazi', 'Bangladesh', 46, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(361, 'Sonagazi', 'Bangladesh', 46, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(362, 'Dighinala', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(363, 'Khagrachhari', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(364, 'Lakshmichhari', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(365, 'Mahalchhari', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(366, 'Manikchhari', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(367, 'Matiranga', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(368, 'Panchhari', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(369, 'Ramgarh', 'Bangladesh', 47, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(370, 'Lakshmipur Sodar', 'Bangladesh', 48, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(371, 'Raipur', 'Bangladesh', 48, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(372, 'Ramganj', 'Bangladesh', 48, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(373, 'Ramgati', 'Bangladesh', 48, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(374, 'Komol Nagar', 'Bangladesh', 48, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(375, 'Noakhali Sodar', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(376, 'Begumganj', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(377, 'Chatkhil', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(378, 'Companyganj', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(379, 'Shenbag', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(380, 'Hatia', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(381, 'Kobirhat', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:41', '2019-04-09 00:24:41'),
(382, 'Sonaimuri', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(383, 'Suborno Char', 'Bangladesh', 49, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(384, 'Rangamati Sodar', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(385, 'Belaichhari', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(386, 'Bagaichhari', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(387, 'Barkal', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(388, 'Juraichhari', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(389, 'Rajasthali', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(390, 'Kaptai', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(391, 'Langadu', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(392, 'Nannerchar', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(393, 'Kaukhali', 'Bangladesh', 50, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(394, 'Ajmiriganj', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(395, 'Baniachang', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(396, 'Bahubal', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(397, 'Chunarughat', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(398, 'Habiganj Sodar', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(399, 'Lakhai', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(400, 'Madhabpur', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(401, 'Nabiganj', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(402, 'Shaistagonj Upazila', 'Bangladesh', 51, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(403, 'Moulvibazar Sodar', 'Bangladesh', 52, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(404, 'Barlekha', 'Bangladesh', 52, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(405, 'Juri', 'Bangladesh', 52, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(406, 'Kamalganj', 'Bangladesh', 52, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(407, 'Kulaura', 'Bangladesh', 52, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(408, 'Rajnagar', 'Bangladesh', 52, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(409, 'Sreemangal', 'Bangladesh', 52, 0.00, 1, '2019-04-09 00:24:42', '2019-04-09 00:24:42'),
(410, 'Bishwamvarpur', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(411, 'Chhatak', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(412, 'Derai', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(413, 'Dharampasha', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(414, 'Dowarabazar', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(415, 'Jagannathpur', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(416, 'Jamalganj', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(417, 'Sulla', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(418, 'Sunamganj Sodar', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(419, 'Shanthiganj', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(420, 'Tahirpur', 'Bangladesh', 53, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(421, 'Sylhet Sodar', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(422, 'Beanibazar', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(423, 'Bishwanath', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(424, 'Dakshin Surma Upazila', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(425, 'Balaganj', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(426, 'Companiganj', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(427, 'Fenchuganj', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(428, 'Golapganj', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(429, 'Gowainghat', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(430, 'Jaintiapur', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(431, 'Kanaighat', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(432, 'Zakiganj', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(433, 'Nobigonj', 'Bangladesh', 54, 0.00, 1, '2019-04-09 00:24:43', '2019-04-09 00:24:43'),
(434, 'Bagerhat Sodar', 'Bangladesh', 55, 20.00, 1, '2019-04-09 00:24:43', '2020-06-11 23:56:20'),
(435, 'Chitalmari', 'Bangladesh', 55, 0.00, 1, '2019-04-09 00:24:43', '2019-04-23 20:58:19'),
(436, 'Fakirhat', 'Bangladesh', 55, 0.00, 1, '2019-04-09 00:24:43', '2019-04-23 20:58:31'),
(437, 'Kachua', 'Bangladesh', 55, 0.00, 0, '2019-04-09 00:24:43', '2019-04-09 16:21:24'),
(438, 'Mollahat', 'Bangladesh', 55, 0.00, 1, '2019-04-09 00:24:43', '2019-04-23 20:59:26'),
(439, 'Mongla', 'Bangladesh', 55, 0.00, 1, '2019-04-09 00:24:43', '2019-04-23 20:59:38'),
(440, 'Morrelganj', 'Bangladesh', 55, 0.00, 1, '2019-04-09 00:24:43', '2019-04-23 21:00:34'),
(441, 'Rampal', 'Bangladesh', 55, 0.00, 1, '2019-04-09 00:24:44', '2019-04-23 20:59:52'),
(442, 'Sarankhola', 'Bangladesh', 55, 0.00, 1, '2019-04-09 00:24:44', '2019-04-23 21:00:44'),
(443, 'Damurhuda', 'Bangladesh', 56, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(444, 'Chuadanga-S', 'Bangladesh', 56, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(445, 'Jibannagar', 'Bangladesh', 56, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(446, 'Alamdanga', 'Bangladesh', 56, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(447, 'Abhaynagar', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(448, 'Keshabpur', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(449, 'Bagherpara', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(450, 'Jessore Sodar', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(451, 'Chaugachha', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(452, 'Manirampur', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(453, 'Jhikargachha', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(454, 'Sharsha', 'Bangladesh', 57, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(455, 'Jhenaidah Sodar', 'Bangladesh', 58, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(456, 'Maheshpur', 'Bangladesh', 58, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(457, 'Kaliganj', 'Bangladesh', 58, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(458, 'Kotchandpur', 'Bangladesh', 58, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(459, 'Shailkupa', 'Bangladesh', 58, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(460, 'Harinakunda', 'Bangladesh', 58, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(461, 'Terokhada', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(462, 'Batiaghata', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(463, 'Dacope', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(464, 'Dumuria', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(465, 'Dighalia', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(466, 'Koyra', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(467, 'Paikgachha', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(468, 'Phultala', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(469, 'Rupsa', 'Bangladesh', 59, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(470, 'Kushtia Sodar', 'Bangladesh', 60, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(471, 'Kumarkhali', 'Bangladesh', 60, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(472, 'Daulatpur', 'Bangladesh', 60, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(473, 'Mirpur', 'Bangladesh', 60, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(474, 'Bheramara', 'Bangladesh', 60, 0.00, 1, '2019-04-09 00:24:44', '2019-04-09 00:24:44'),
(475, 'Khoksa', 'Bangladesh', 60, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(476, 'Magura Sodar', 'Bangladesh', 61, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(477, 'Mohammadpur', 'Bangladesh', 61, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(478, 'Shalikha', 'Bangladesh', 61, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(479, 'Sreepur', 'Bangladesh', 61, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(480, 'angni', 'Bangladesh', 62, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(481, 'Mujib Nagar', 'Bangladesh', 62, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(482, 'Meherpur-S', 'Bangladesh', 62, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(483, 'Narail-S', 'Bangladesh', 63, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(484, 'Lohagara', 'Bangladesh', 63, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(485, 'Kalia', 'Bangladesh', 63, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 00:24:45'),
(486, 'Satkhira Sodar', 'Bangladesh', 64, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 04:16:13'),
(487, 'Assasuni', 'Bangladesh', 64, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 04:16:13'),
(488, 'Debhata', 'Bangladesh', 64, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 04:16:13'),
(489, 'Tala', 'Bangladesh', 64, 50.00, 1, '2019-04-09 00:24:45', '2019-04-09 15:40:56'),
(490, 'Kalaroa', 'Bangladesh', 64, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 04:16:13'),
(491, 'Kaliganj', 'Bangladesh', 64, 0.00, 1, '2019-04-09 00:24:45', '2019-04-09 04:16:13'),
(492, 'Shyamnagar', 'Bangladesh', 64, 1.00, 1, '2019-04-09 00:24:45', '2019-04-09 05:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_code` int(10) DEFAULT NULL COMMENT 'Distributor Code',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` tinyint(4) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(195) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `upazilla_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_is_used` tinyint(50) NOT NULL DEFAULT 0,
  `is_merhcant` tinyint(1) DEFAULT 0,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_code` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `username`, `d_code`, `image`, `user_role`, `password`, `country`, `village`, `district_id`, `upazilla_id`, `address`, `coupon_is_used`, `is_merhcant`, `status`, `remember_token`, `reset_code`, `otp_code`, `code_status`, `created_at`, `updated_at`) VALUES
(1, 'Md Neloy Sk', NULL, '01956139771', 'neloysk', NULL, 'public/images/user/1581675417.jpeg', NULL, '$2y$10$I5exdV1XPBfz7YAPt2pO.ufrZPWHVXJ.Vyw7oCesJo.4gL1WaX12y', NULL, 'kharder', 55, 434, NULL, 0, 0, '9', NULL, NULL, '456818', '0', '2020-02-14 21:15:01', '2020-06-04 15:27:04'),
(2, '01721854751', NULL, '01721854751', '01721854751', NULL, 'public/images/user/1581705641.jpeg', NULL, '$2y$10$.XV0JlFxtdQgFD3LAnAvHeHG08E3tJC5iVEHr5VGGkEz0nIwAjedm', NULL, 'N/A', NULL, NULL, 'N/A', 1, 0, '9', 'VkQQ8dthcewh3jWV0Yu5hJedU9p7BVMLvPRnGLQ2xenacUVtNbXcbFjG5jd8', NULL, '953321', '0', NULL, '2020-03-03 15:58:29'),
(3, 'Nasrullah', NULL, '01711873226', 'nasrullah20', NULL, 'public/images/user/1591345649.jpeg', NULL, '$2y$10$X/BdseGPd/NOEkq5TxM06exkZPPWllM9SPc6JiTCbEgGveyhuRZYu', NULL, 'Bagerhat', 55, 434, NULL, 1, 0, '9', 'pUF8Y9TBi78JOKoOWm87WiYCx3S57eIvvWfJ9UNGsO7YL2WyP4RY9QMfl34c', NULL, '418553', '0', '2020-02-15 05:51:07', '2020-06-05 18:27:29'),
(4, 'Sumi', NULL, '01765200050', 'Sumi', NULL, NULL, NULL, '$2y$10$6sVsMIjNVpgkLpkE7e/zQO6PO71v4UIOw3VOPFA2KblkDU5PdzOHi', NULL, 'Bagerhat', 55, 434, NULL, 0, 0, '1', NULL, NULL, '248546', '0', '2020-03-26 21:14:07', '2020-03-26 21:14:07'),
(4, 'Developer', NULL, '01983667657', '01983667657', NULL, 'public/images/user/1581739007.jpeg', NULL, '$2y$10$Eu2yaiqAHr1v14DP4PD77Op3Uvv5FLXkiZWeH6zGozJ0z9MmIayUm', NULL, 'N/A', NULL, NULL, 'N/A', 1, 0, '9', NULL, NULL, '982239', '0', NULL, '2020-03-03 15:59:36'),
(5, '01937476716', NULL, '01937476716', '01937476716', NULL, NULL, NULL, '$2y$10$4dydwr70GJRRDKzAsR0co.UXGTtRSFd/4Xy/FfNNxIECO7T4dYoIW', NULL, 'N/A', NULL, NULL, 'N/A', 0, 0, '1', NULL, NULL, '989296', '0', NULL, NULL),
(6, 'Xavier Buckkk', NULL, '24324', 'techbosh', NULL, NULL, NULL, '$2y$10$w7cZwkr.NJmedS4lwF7LaOVDgqgAimQvbPdu80OyB.U1y/siHJNT.', NULL, 'dwed', 1, 1, NULL, 0, 0, '1', NULL, NULL, '448259', '0', '2020-07-08 17:18:56', '2020-07-08 17:18:56'),
(7, '01723276177', NULL, '01723276177', '01723276177', NULL, NULL, NULL, '$2y$10$okxnlczyMqRyd4hpvRdtP.dfYeAzxoypecEpWLdgeAXJDs9ChFeHS', NULL, 'N/A', NULL, NULL, 'N/A', 0, 0, '1', NULL, NULL, '668390', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_histories`
--

CREATE TABLE `user_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_mac` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_histories`
--

INSERT INTO `user_histories` (`id`, `user_mac`, `product_id`, `category_id`, `sub_category_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 2, NULL, NULL, NULL, 1, '2020-07-06 19:45:55', '2020-07-10 22:15:59'),
(2, '', 3, NULL, NULL, NULL, 1, '2020-07-07 14:49:36', '2020-07-11 18:42:21'),
(3, '', 6, NULL, NULL, NULL, 1, '2020-07-07 22:05:18', '2020-07-11 17:42:08'),
(4, '', 7, NULL, NULL, NULL, 1, '2020-07-08 01:04:54', '2020-07-11 13:04:05'),
(5, '', 5, NULL, NULL, NULL, 1, '2020-07-08 01:37:24', '2020-07-08 01:41:56'),
(6, '', 8, NULL, NULL, NULL, 1, '2020-07-09 04:05:53', '2020-07-09 14:07:24'),
(7, '', 9, NULL, NULL, NULL, 1, '2020-07-09 04:17:02', '2020-07-10 21:49:12'),
(8, '', 12, NULL, NULL, NULL, 1, '2020-07-09 12:01:25', '2020-07-10 21:49:44'),
(9, '', 11, NULL, NULL, NULL, 1, '2020-07-09 12:39:28', '2020-07-10 22:03:24'),
(10, '', 10, NULL, NULL, NULL, 1, '2020-07-09 12:43:46', '2020-07-11 18:25:02'),
(11, '', 13, NULL, NULL, NULL, 1, '2020-07-11 00:14:15', '2020-07-11 03:15:16'),
(12, '', 15, NULL, NULL, NULL, 1, '2020-07-11 01:00:16', '2020-07-11 01:00:16'),
(13, '', 16, NULL, NULL, NULL, 1, '2020-07-11 02:46:26', '2020-07-11 02:46:26'),
(14, '', 18, NULL, NULL, NULL, 1, '2020-07-11 14:43:56', '2020-07-11 14:43:56'),
(15, '', 20, NULL, NULL, NULL, 1, '2020-07-11 14:43:58', '2020-07-11 17:43:50'),
(16, '', 19, NULL, NULL, NULL, 1, '2020-07-11 14:44:00', '2020-07-11 14:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_mac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admins_email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `admins_username_unique` (`username`) USING BTREE;

--
-- Indexes for table `admin_access_infos`
--
ALTER TABLE `admin_access_infos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `admin_access_infos_admin_id_foreign` (`admin_id`) USING BTREE;

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `brands_slug_unique` (`slug`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `categories_slug_unique` (`slug`) USING BTREE;

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cost_fields`
--
ALTER TABLE `cost_fields`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `cost_fields_title_unique` (`title`) USING BTREE;

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `d_commissions`
--
ALTER TABLE `d_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d_payments`
--
ALTER TABLE `d_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `referral_balances`
--
ALTER TABLE `referral_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `sms_records`
--
ALTER TABLE `sms_records`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`) USING BTREE;

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`coupon_is_used`) USING BTREE,
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`) USING BTREE,
  ADD UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `user_histories`
--
ALTER TABLE `user_histories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_access_infos`
--
ALTER TABLE `admin_access_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cost_fields`
--
ALTER TABLE `cost_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `d_commissions`
--
ALTER TABLE `d_commissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d_payments`
--
ALTER TABLE `d_payments`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_balances`
--
ALTER TABLE `referral_balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sms_records`
--
ALTER TABLE `sms_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upazillas`
--
ALTER TABLE `upazillas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_histories`
--
ALTER TABLE `user_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

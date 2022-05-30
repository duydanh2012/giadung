-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 10:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vanhung`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'postpaid',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `code`, `name`, `address`, `email`, `paymentMethod`, `total`, `phone`, `user_id`, `created_at`, `updated_at`, `delivery_date`) VALUES
(1, '260522014030', 'Người Dùng', 'Nha Trang', 'user@gmail.com', 'postpaid', '3699', '0123456789', 23, '2022-05-25 18:40:30', '2022-05-25 18:42:08', '2022-05-26'),
(2, '270522075811', 'Admin', '101 Mai Xuân Thưởng', 'admin@gmail.com', 'postpaid', '79969', '0123456789', 21, '2022-05-27 00:58:11', '2022-05-27 00:58:11', NULL),
(3, '270522081240', 'Admin', '101 Mai Xuân Thưởng', 'admin@gmail.com', 'postpaid', '1620019', '0132456789', 21, '2022-05-27 01:12:40', '2022-05-27 01:12:40', NULL),
(4, '270522081804', '234234', '101 Mai Xuân Thưởng', 'admin1@gmail.com', 'postpaid', '180019', '0123456789', 21, '2022-05-27 01:18:04', '2022-05-27 01:18:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `product_id`, `number`, `price`) VALUES
(1, 1, 3, '1', '80'),
(2, 1, 1, '2', '1800'),
(3, 2, 2, '123', '650'),
(4, 3, 1, '900', '1800'),
(5, 4, 1, '100', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\Models\\Product',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `reference_id`, `reference_type`, `created_at`, `updated_at`) VALUES
(1, '16535276429011.jpeg', '1', 'App\\Models\\Product', '2022-05-25 18:14:04', '2022-05-25 18:17:15'),
(2, '16535276429062.jpeg', '1', 'App\\Models\\Product', '2022-05-25 18:14:05', '2022-05-25 18:17:15'),
(3, '16535276429083.jpeg', '1', 'App\\Models\\Product', '2022-05-25 18:14:05', '2022-05-25 18:17:15'),
(4, '16535276429114.jpeg', '1', 'App\\Models\\Product', '2022-05-25 18:14:06', '2022-05-25 18:17:15'),
(5, '16535281693551.jpeg', '2', 'App\\Models\\Product', '2022-05-25 18:22:50', '2022-05-25 18:25:14'),
(6, '16535281693602.jpeg', '2', 'App\\Models\\Product', '2022-05-25 18:22:50', '2022-05-25 18:25:14'),
(7, '16535281693623.jpeg', '2', 'App\\Models\\Product', '2022-05-25 18:22:51', '2022-05-25 18:25:14'),
(8, '16535281693644.jpeg', '2', 'App\\Models\\Product', '2022-05-25 18:22:51', '2022-05-25 18:25:14'),
(9, '16535285307302.jpeg', '3', 'App\\Models\\Product', '2022-05-25 18:28:51', '2022-05-25 18:29:34'),
(10, '16535285307271.jpeg', '3', 'App\\Models\\Product', '2022-05-25 18:28:51', '2022-05-25 18:29:34'),
(11, '16535285307323.jpeg', '3', 'App\\Models\\Product', '2022-05-25 18:28:52', '2022-05-25 18:29:34'),
(12, '16535285307364.jpeg', '3', 'App\\Models\\Product', '2022-05-25 18:28:52', '2022-05-25 18:29:34');

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_12_084000_create_trademarks_table', 2),
(9, '2022_04_13_014838_create_products_table', 3),
(10, '2022_04_13_065611_create_type_products_table', 4),
(13, '2022_04_14_095756_create_media_table', 5),
(14, '2022_04_21_031925_create_bills_table', 6),
(15, '2022_04_21_032425_create_bill_details_table', 7),
(16, '2022_04_22_024802_add_columns_to_bills_table', 8),
(17, '2022_05_27_024729_create_ogirins_table', 9),
(18, '2022_05_27_032011_add_slug_to_trademarks_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Bahrain', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'bahrain'),
(2, 'Mozambique', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'mozambique'),
(3, 'Czech Republic', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'czech-republic'),
(4, 'Finland', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'finland'),
(5, 'Niue', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'niue'),
(6, 'Niue', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'niue'),
(7, 'Isle of Man', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'isle-of-man'),
(8, 'Pakistan', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'pakistan'),
(9, 'Saint Kitts and Nevis', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'saint-kitts-and-nevis'),
(10, 'Iran', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'iran'),
(11, 'Kiribati', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'kiribati'),
(12, 'Heard Island and McDonald Islands', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'heard-island-and-mcdonald-islands'),
(13, 'Saint Barthelemy', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'saint-barthelemy'),
(14, 'Sierra Leone', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'sierra-leone'),
(15, 'Spain', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'spain'),
(16, 'Antarctica (the territory South of 60 deg S)', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'antarctica-the-territory-south-of-60-deg-s'),
(17, 'Australia', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'australia'),
(18, 'Cuba', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'cuba'),
(19, 'Tokelau', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'tokelau'),
(20, 'Paraguay', '2022-05-26 20:40:25', '2022-05-26 20:40:25', 'paraguay'),
(21, 'China', '2022-05-26 20:40:55', '2022-05-26 20:40:55', 'china'),
(22, 'Việt Nam', '2022-05-26 20:41:04', '2022-05-26 20:41:04', 'viet-nam');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT 0,
  `new` tinyint(4) NOT NULL DEFAULT 0,
  `price` decimal(12,0) DEFAULT NULL,
  `promotion` decimal(12,0) DEFAULT NULL,
  `thumbnail` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) NOT NULL DEFAULT 0,
  `trademark_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_import` decimal(12,0) DEFAULT NULL,
  `origin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `content`, `hot`, `new`, `price`, `promotion`, `thumbnail`, `images`, `quantity`, `trademark_id`, `created_at`, `updated_at`, `price_import`, `origin_id`) VALUES
(1, '2628ed51bb3f73', 'Kệ Úp Chén Bát Đĩa Thông Minh Inox 304 Cao Cấp Ráo Nước Bên Bồn Rửa SINOART', 'Kệ úp chén đĩa ráo nước để bên bồn rửa chén đa năng SINOART được làm từ inox 304 cao cấp chống gỉ & trầy xước, chống bám bẩn và dễ dàng vệ sinh.', '<ul>\r\n	<li><strong>Kệ &uacute;p ch&eacute;n đĩa r&aacute;o nước để b&ecirc;n bồn rửa ch&eacute;n đa năng SINOART</strong>&nbsp;được l&agrave;m từ inox 304 cao cấp chống gỉ &amp; trầy xước, chống b&aacute;m bẩn v&agrave; dễ d&agrave;ng vệ sinh.</li>\r\n	<li>C&oacute; khay hứng nước v&agrave; v&ograve;i dẫn nước chảy ra bồn rửa b&ecirc;n cạnh tiện lợi v&agrave; giữ vệ sinh bếp - gi&uacute;p bếp v&agrave; ch&eacute;n đĩa lu&ocirc;n kh&ocirc; tho&aacute;ng.</li>\r\n	<li>K&iacute;ch thước lớn rộng 53cm, s&acirc;u 35cm, cao 42cm gi&uacute;p đựng được nhiều ch&eacute;n đĩa với kết cấu 2 tầng - ph&ugrave; hợp cho mọi gia đ&igrave;nh Việt.</li>\r\n</ul>', 1, 1, '1800', '1100', 'uploads/products/202205260117155FyA.jpeg', NULL, 2000, 2, '2022-05-25 18:17:15', '2022-05-27 01:19:35', '900', 21),
(2, '1628ed6fadbd70', 'Kệ Để Lò Vi Sóng Hai Tầng Co Giãn Thông Minh INOX, Sơn Tĩnh Điện', 'Kệ để lò vi sóng hai tầng đa năng Tiggang được làm từ INOX, sơn tĩnh điện màu đen với thiết kế sang trọng và thẫm mỹ phù hợp với nhiều loại lò vi sóng khác nhau.', '<ul>\r\n	<li><strong>Kệ để l&ograve; vi s&oacute;ng hai tầng đa năng Tiggang</strong>&nbsp;được l&agrave;m từ INOX, sơn tĩnh điện m&agrave;u đen với thiết kế sang trọng v&agrave; thẫm mỹ ph&ugrave; hợp với nhiều loại l&ograve; vi s&oacute;ng kh&aacute;c nhau.</li>\r\n	<li>Kệ c&oacute; thể thay đổi chiều d&agrave;i từ 36cm đến 57cm ph&ugrave; hợp với c&aacute;c nhu cầu đựng đồ đa năng &amp; k&iacute;ch thước của l&ograve; vi s&oacute;ng.</li>\r\n	<li>Kệ c&oacute; hai tầng để đựng đồ đa năng gi&uacute;p nh&agrave; bếp th&ecirc;m gọn g&agrave;ng. Được tặng th&ecirc;m 4 m&oacute;c treo đa năng cho nh&agrave; bếp.</li>\r\n</ul>', 0, 0, '650', '450', 'uploads/products/20220526012514eAR3.jpeg', NULL, 1000, 1, '2022-05-25 18:25:14', '2022-05-25 18:25:14', '300', 21),
(3, '1628ed7fe039e1', 'Bộ Kệ Phòng Bếp [INOX 304, Sơn Tĩnh Điện] Dán Tường - Giải Phóng Không Gian Nhà Bếp', 'Bộ kệ phòng bếp dán tường bao gồm 8 loại kệ khác nhau: Kệ đựng bát, kệ đĩa, kệ gia vị dài 40cm, kệ chai lọ dài 35cm, kệ đựng đũa, kệ đựng vung thớt và thanh treo móc gồm 6 móc.', '<ul>\r\n	<li>Bộ kệ ph&ograve;ng bếp d&aacute;n tường&nbsp;bao gồm&nbsp;<strong>8 loại kệ kh&aacute;c nhau</strong>: Kệ đựng b&aacute;t, kệ đĩa, kệ gia vị d&agrave;i 40cm, kệ chai lọ d&agrave;i 35cm, kệ đựng đũa, kệ đựng vung thớt v&agrave; thanh treo m&oacute;c gồm 6 m&oacute;c.</li>\r\n	<li>Tất cả đều được&nbsp;<strong>d&aacute;n tường chắc chắn</strong>&nbsp;m&agrave; kh&ocirc;ng cần khoan tường, lắp đặt dễ d&agrave;ng kh&ocirc;ng tốn nhiều c&ocirc;ng sức.</li>\r\n	<li>L&agrave;m từ&nbsp;<strong>INOX 304 + sơn tĩnh điện&nbsp;</strong>kh&ocirc;ng gỉ</li>\r\n</ul>', 1, 1, '80', '60', 'uploads/products/20220526012934jYU0.jpeg', NULL, 120, 1, '2022-05-25 18:29:34', '2022-05-25 18:29:34', '20', 21);

-- --------------------------------------------------------

--
-- Table structure for table `trademarks`
--

CREATE TABLE `trademarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trademarks`
--

INSERT INTO `trademarks` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'TIGGANG', '2022-05-25 18:04:43', '2022-05-25 18:04:43', 'tiggang'),
(2, 'SINOART', '2022-05-25 18:05:20', '2022-05-25 18:05:20', 'sinoart');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Đồ dùng bếp & phòng ăn', 'do-dung-bep-phong-an', '2022-05-25 18:02:06', '2022-05-25 18:02:06'),
(2, 'Đồ gia dụng phòng tắm', 'do-gia-dung-phong-tam', '2022-05-25 18:02:25', '2022-05-25 18:02:25'),
(3, 'Đồ dùng gọn gàng nhà cửa', 'do-dung-gon-gang-nha-cua', '2022-05-25 18:03:00', '2022-05-25 18:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `product_id`, `type_id`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `avatar`, `phone`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Prof. Amani Kiehn', 'bbechtelar@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'KZpvDCb8lK', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(3, 'Meda Wiegand', 'yadira70@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'fnjQFRHs1F', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(4, 'Prof. Jensen Aufderhar', 'declan.kunze@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'nNhoQXgfpM', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(5, 'Osvaldo Schneider DVM', 'jdubuque@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'mwA7Blz8L7', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(6, 'Izabella Wiegand DVM', 'pkoepp@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'fTX5ohJG4S', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(7, 'Felipa Okuneva', 'yschroeder@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'fXzhAIymT0', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(8, 'Dr. Adriel Raynor I', 'pfannerstill.hank@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'ggTiBHYNQj', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(9, 'Meagan Witting', 'berenice.blanda@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'iuoXhfSd3n', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(10, 'Martin Bosco', 'agislason@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'dDKmCPgbQi', '2022-04-11 23:39:44', '2022-04-11 23:39:44'),
(11, 'Dr. Buck Reynolds', 'perry.lueilwitz@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, '7gYkrdPjNL', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(12, 'Dr. Dell Littel', 'jschmidt@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'c9ecle5ftN', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(13, 'Prof. Cara Hintz', 'greenholt.everette@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'u2Y69szGZ5', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(15, 'Shad Stamm DVM', 'afay@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'jODm7c5W4a', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(16, 'Bert Wilkinson', 'andreanne91@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, '3RhtwRUumF', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(17, 'Bill Boyle', 'gmonahan@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'FTdAWWqZjg', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(18, 'Gregorio Will', 'rowan.schinner@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'I1Bwh3CAxZ', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(19, 'Lazaro Batz', 'sienna27@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'zBTrnQgYHL', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(20, 'Flossie Bode', 'retta94@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 0, 'K2ZCFZGSKE', '2022-04-11 23:40:14', '2022-04-11 23:40:14'),
(21, 'Admin', 'admin@gmail.com', '$2y$10$.7qetz2s6BPcLazhqu1hLOcinsBSkos6kZp5DM3WEx7tZknDyQxGq', NULL, NULL, NULL, 1, NULL, '2022-04-11 23:43:58', '2022-04-20 21:21:01'),
(22, '234234', 'bayby22237@gmail.com', '$2y$10$pLTBOxYUaDPyOJ8kLRZE.OolLEMRAS/2IrwiXcRfAhcudTI3/avmG', NULL, NULL, '0123456789', 0, NULL, '2022-04-15 01:27:26', '2022-04-15 01:46:53'),
(23, 'Người Dùng', 'user@gmail.com', '$2y$10$SXxbBcLZ3w2/S2Sm68Tma.Et1WdKctrgTO1bFFBy6iwmSzIjYcYhy', 'Nha Trang', NULL, '0123456789', 0, NULL, '2022-05-25 18:39:37', '2022-05-25 18:39:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

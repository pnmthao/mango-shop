-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 11:53 AM
-- Server version: 10.3.15-MariaDB
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
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_image`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(2, 'thao73.jpg', 'pnmthao@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Phan Nguyễn Minh Thảo', '0949422936', '2020-03-03 15:02:42', '2020-03-03 15:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_status` int(2) DEFAULT 1,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'COD' COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `id_status`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(51, 30, 1, '2020-05-02', 34000, 'COD', NULL, '2020-05-02 02:41:37', '2020-05-02 02:41:37'),
(41, 29, 2, '2020-04-10', 3845000, 'COD', NULL, '2020-05-01 08:28:58', '2020-04-28 15:03:10'),
(50, 30, 1, '2020-05-02', 44000, 'COD', NULL, '2020-05-02 02:22:46', '2020-05-02 02:22:46'),
(49, 30, 1, '2020-05-02', 500000, 'COD', NULL, '2020-05-02 02:20:26', '2020-05-02 02:20:26'),
(48, 30, 2, '2020-05-01', 495000, 'COD', NULL, '2020-05-01 08:30:22', '2020-05-01 07:25:58'),
(45, 30, 1, '2020-04-30', 450000, 'COD', NULL, '2020-04-30 11:25:31', '2020-04-30 11:25:31'),
(52, 30, 1, '2020-05-02', 345000, 'COD', NULL, '2020-05-02 02:44:18', '2020-05-02 02:44:18'),
(53, 30, 1, '2020-05-02', 45000, 'COD', NULL, '2020-05-02 03:06:55', '2020-05-02 03:06:55'),
(54, 30, 1, '2020-05-02', 70000, 'COD', NULL, '2020-05-02 03:08:03', '2020-05-02 03:08:03'),
(55, 30, 1, '2020-05-02', 1035000, 'COD', NULL, '2020-05-02 03:12:50', '2020-05-02 03:12:50'),
(56, 30, 1, '2020-05-02', 1245000, 'COD', NULL, '2020-05-02 03:17:44', '2020-05-02 03:17:44'),
(57, 30, 1, '2020-05-02', 1445000, 'COD', NULL, '2020-05-02 03:24:26', '2020-05-02 03:24:26'),
(58, 30, 1, '2020-05-02', 2088000, 'COD', NULL, '2020-05-02 03:24:50', '2020-05-02 03:24:50'),
(59, 30, 1, '2020-05-02', 1895000, 'COD', NULL, '2020-05-02 05:29:56', '2020-05-02 05:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `id_unit`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(40, 40, 110, 1, 2, 500000, '2020-03-22 14:05:57', '2020-03-22 14:05:57'),
(39, 40, 117, 1, 1, 7000000, '2020-03-22 14:05:57', '2020-03-22 14:05:57'),
(38, 40, 105, 1, 1, 50000, '2020-03-22 14:05:57', '2020-03-22 14:05:57'),
(41, 41, 116, 1, 4, 9500000, '2020-04-10 14:29:43', '2020-04-10 14:29:43'),
(42, 41, 105, 1, 1, 50000, '2020-04-10 14:29:43', '2020-04-10 14:29:43'),
(43, 42, 118, 1, 3, 300000, '2020-04-19 13:51:41', '2020-04-19 13:51:41'),
(44, 42, 105, 1, 3, 50000, '2020-04-19 13:51:41', '2020-04-19 13:51:41'),
(45, 44, 105, 1, 1, 50000, '2020-04-30 11:24:46', '2020-04-30 11:24:46'),
(46, 45, 108, 1, 1, 500000, '2020-04-30 11:25:31', '2020-04-30 11:25:31'),
(47, 48, 108, 1, 1, 500000, '2020-05-01 07:25:58', '2020-05-01 07:25:58'),
(48, 48, 105, 1, 1, 50000, '2020-05-01 07:25:58', '2020-05-01 07:25:58'),
(49, 49, 105, 1, 1, 50000, '2020-05-02 02:20:26', '2020-05-02 02:20:26'),
(50, 49, 110, 1, 1, 500000, '2020-05-02 02:20:26', '2020-05-02 02:20:26'),
(51, 50, 122, 2, 1, 15000, '2020-05-02 02:22:46', '2020-05-02 02:22:46'),
(52, 50, 121, 2, 1, 35000, '2020-05-02 02:22:46', '2020-05-02 02:22:46'),
(53, 51, 122, 2, 1, 15000, '2020-05-02 02:41:37', '2020-05-02 02:41:37'),
(54, 52, 105, 1, 1, 50000, '2020-05-02 02:44:18', '2020-05-02 02:44:18'),
(55, 52, 133, 2, 1, 350000, '2020-05-02 02:44:18', '2020-05-02 02:44:18'),
(56, 53, 105, 1, 1, 50000, '2020-05-02 03:06:55', '2020-05-02 03:06:55'),
(57, 54, 105, 1, 1, 50000, '2020-05-02 03:08:03', '2020-05-02 03:08:03'),
(58, 55, 105, 1, 2, 50000, '2020-05-02 03:12:50', '2020-05-02 03:12:50'),
(59, 55, 108, 1, 1, 500000, '2020-05-02 03:12:50', '2020-05-02 03:12:50'),
(60, 55, 110, 1, 1, 500000, '2020-05-02 03:12:50', '2020-05-02 03:12:50'),
(61, 56, 105, 1, 1, 50000, '2020-05-02 03:17:44', '2020-05-02 03:17:44'),
(62, 56, 108, 1, 2, 500000, '2020-05-02 03:17:44', '2020-05-02 03:17:44'),
(63, 57, 105, 1, 1, 50000, '2020-05-02 03:24:26', '2020-05-02 03:24:26'),
(64, 57, 110, 1, 1, 500000, '2020-05-02 03:24:26', '2020-05-02 03:24:26'),
(65, 57, 116, 1, 1, 9500000, '2020-05-02 03:24:26', '2020-05-02 03:24:26'),
(66, 58, 105, 1, 1, 50000, '2020-05-02 03:24:50', '2020-05-02 03:24:50'),
(67, 58, 110, 1, 1, 500000, '2020-05-02 03:24:50', '2020-05-02 03:24:50'),
(68, 58, 117, 1, 1, 7000000, '2020-05-02 03:24:50', '2020-05-02 03:24:50'),
(69, 58, 116, 1, 1, 9500000, '2020-05-02 03:24:50', '2020-05-02 03:24:50'),
(70, 58, 122, 2, 1, 15000, '2020-05-02 03:24:50', '2020-05-02 03:24:50'),
(71, 58, 121, 2, 1, 35000, '2020-05-02 03:24:50', '2020-05-02 03:24:50'),
(72, 59, 105, 1, 1, 50000, '2020-05-02 05:29:56', '2020-05-02 05:29:56'),
(73, 59, 108, 1, 1, 500000, '2020-05-02 05:29:56', '2020-05-02 05:29:56'),
(74, 59, 110, 1, 1, 500000, '2020-05-02 05:29:56', '2020-05-02 05:29:56'),
(75, 59, 116, 1, 1, 9500000, '2020-05-02 05:29:56', '2020-05-02 05:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `name_en`, `description`, `description_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(2, 'BigC', 'BigC Super', 'Siêu thị BigC', 'Supermarket BigC', 0, 'bigC95.png', '2020-02-09 04:15:28', '2020-02-09 04:15:28'),
(3, 'CoopMart', 'Coop Super', 'Siêu thị CoopMart', 'Supermarket Coop', 0, 'coop_mart35.jpg', '2020-02-09 04:15:35', '2020-02-09 04:15:35'),
(4, 'Mega', 'Mega Super', 'Siêu thị Mega', 'Supermarket Mega', 1, 'mega.jpg', '2020-02-08 14:32:56', '2020-02-08 14:32:56'),
(5, 'VinMart', 'VinMart Super', 'Siêu thị VinMart', 'Supermarket Vin', 1, 'vinmart65.jpg', '2020-02-09 04:15:44', '2020-02-09 04:15:44'),
(6, 'VinatexMart', 'Vinatex Super', 'Siêu thị VinatexMart', 'Supermarket Vinatex', 0, 'vinatex.jpg', '2020-02-08 03:41:23', '2020-02-08 03:41:23'),
(7, 'Metro', 'Metro Super', 'Siêu thị Metro', 'Supermarket Metro', 1, 'metro.png', '2020-02-08 03:53:34', '2020-02-08 03:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_customer`, `id_product`, `comment`, `created_at`, `updated_at`, `status`) VALUES
(1, 29, 105, 'ngon ghê hông', '2020-04-23', '2020-04-23', 0),
(2, 30, 105, 'ngon ghê hông', '2020-05-02', '2020-05-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `percent_of` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `percent_of`) VALUES
(1, 'ABC', 'fixed', 10000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `gender`, `image`, `email`, `address`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(29, 'PHAN NGUYEN MINH THAO', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'pnmthaoct@gmail.com', 'Nguyen Van Cu Street, An Hoa Ward, Ninh Kieu District, Can Tho City, Viet Nam', '0949422936', NULL, '2020-03-22 02:33:34', '2020-03-22 02:33:34'),
(30, 'Huỳnh Thanh Phúc', '2241de9a7b2e0e61532daecab5103b62', NULL, NULL, 'danhuynh98@gmail.com', '18b vo thi sau', '0907026987', NULL, '2020-04-29 11:05:42', '2020-04-29 11:05:42');

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
(1, '2020_02_06_153302_create_tbl_admin_table', 1),
(2, '2020_02_06_154649_create_password_resets_table', 2),
(3, '2020_02_07_113003_create_brand_product', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `id_brand` int(10) UNSIGNED DEFAULT NULL,
  `id_unit` int(10) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `new` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_en`, `id_type`, `id_brand`, `id_unit`, `description`, `description_en`, `quantity`, `unit_price`, `promotion_price`, `image`, `created_at`, `updated_at`, `status`, `new`) VALUES
(105, 'Táo đỏ Mỹ', 'Red Apple', 4, 5, 1, 'Táo đỏ Mỹ', '', 10, 50000, 45000, 'apple85.jpg', '2020-02-10 02:10:33', '2020-02-10 02:10:33', 1, 0),
(106, 'Thịt heo', 'Pork', 20, 7, 1, 'Thịt heo ngon', '', 10, 100000, NULL, 'pork58.jpg', '2020-03-07 19:50:57', '2020-03-07 19:50:57', 1, NULL),
(107, 'Thịt bò', 'Beef', 20, 6, 1, 'Thịt bò bò bò', '', 35, 200000, NULL, 'beef78.png', '2020-03-07 19:51:25', '2020-03-07 19:51:25', 1, NULL),
(108, 'Thịt cừu', 'Sheep ', 20, 5, 1, 'Thịt cừu healthy', '', 50, 500000, 450000, 'sheep11.jpg', '2020-03-07 19:51:59', '2020-03-07 19:51:59', 1, NULL),
(109, 'Rau muống', 'Vegetables muong', 5, 3, 1, 'Rau muống sạch', 'Clean Vegetables', 1, 5000, NULL, 'rau-muong50.jpg', '2020-03-10 01:59:29', '2020-03-10 01:59:29', 1, NULL),
(110, 'Kiwi', 'Kiwi123', 4, 6, 1, 'Kiwi healthy', '', 35, 500000, 450000, 'kiwi38.jpg', '2020-03-07 19:59:31', '2020-03-07 19:59:31', 1, NULL),
(111, 'Chuối', 'Banana', 4, 4, 1, 'Chuối tốt cho sức khỏe', '', 30, 45000, NULL, 'banana72.jpg', '2020-03-07 20:00:05', '2020-03-07 20:00:05', 1, NULL),
(112, 'Nho xanh', 'Green grape', 4, 5, 1, 'Nho xanh Mỹ', '', 35, 120000, 110000, 'grapes_green17.jpg', '2020-03-07 20:02:39', '2020-03-07 20:02:39', 1, NULL),
(113, 'Nho đen', 'Black grape', 4, 5, 1, 'Nho đen Mỹ', '', 35, 150000, NULL, 'grapes_black42.jpg', '2020-03-07 20:03:10', '2020-03-07 20:03:10', 1, NULL),
(114, 'Dâu tây', 'Strawberry', 4, 3, 1, 'Dâu tây Đà Lạt', 'DL', 35, 120000, NULL, 'strawbery29.png', '2020-03-10 01:59:09', '2020-03-10 01:59:09', 1, NULL),
(115, 'Cam', 'Orange', 4, 6, 1, 'Cam Mỹ', '', 50, 300000, NULL, 'orange71.jpg', '2020-03-07 20:04:30', '2020-03-07 20:04:30', 1, NULL),
(116, 'Bò Wagyu Nhật', 'Wagyu Beef', 20, 7, 1, 'Bò Wagyu Nhật A5', '', 30, 9500000, 950000, 'bo-wagyu74.jpg', '2020-03-08 05:38:21', '2020-03-08 05:38:21', 1, 1),
(117, 'Bò Kobe', 'Kobe Beef', 20, 6, 1, 'Bò kobe', '', 30, 7000000, 599000, 'bo-kobe77.jpg', '2020-03-07 20:08:29', '2020-03-07 20:08:29', 1, 1),
(118, 'Nấm bào ngư', 'Fish Mushroom', 21, 5, 1, 'Nấm bào ngư', '', 30, 300000, NULL, 'nam-bao-ngu0.jpg', '2020-03-07 20:09:19', '2020-03-07 20:09:19', 1, 1),
(119, 'Nấm kim châm', 'Cham Mushroom ', 21, 7, 1, 'Nấm kim châm ngon', '', 40, 300000, NULL, 'nam-kim-cham37.jpg', '2020-03-07 20:11:02', '2020-03-07 20:11:02', 1, NULL),
(120, 'Dọc mùng', 'Colocasia gigantea', 5, 6, 2, NULL, NULL, 50, 20000, 0, 'doc-mung74.png', '2020-05-03 02:27:17', '2020-05-03 02:27:17', 1, NULL),
(122, 'Ngọn Bí', 'The Secret tops', 5, 3, 2, 'Rau bí bao gồm lá non, ngọn và bông hoa bí đực của cây bí đỏ...', 'Pumpkin vegetables include young leaves, tops and pumpkin flowers of the pumpkin ...', 50, 15000, 14000, 'ngon-bi59.jpg', '2020-05-03 02:29:56', '2020-05-03 02:29:56', 1, NULL),
(123, 'Rau Cải Ngọt', 'Sweet Vegetables', 5, 7, 2, 'Cải ngọt có nguồn gốc từ Ấn Độ, Trung Quốc. Cây thảo, cao tới 50 - 100 cm, thân tròn, không lông, lá có phiến xoan ngược tròn dài,...', 'Choysum is native to India and China. Herbaceous plant, up to 50 - 100 cm tall, round body, hairless, leaves have long round inverted oval plates,...', 50, 17000, NULL, 'rau-cai-ngot99.jpg', '2020-05-03 02:34:38', '2020-05-03 02:34:38', 1, NULL),
(124, 'Ớt Chuông', 'Bell pepper', 5, 5, 2, NULL, NULL, 50, 60000, 50000, 'ot-chuong16.jpg', '2020-05-03 02:34:58', '2020-05-03 02:34:58', 1, NULL),
(125, 'Thì Là', 'fennel', 5, 7, 2, 'Thì là hay thìa là là một loài cây lấy lá làm gia vị và lấy hạt làm thuốc được sử dụng rất phổ biến ở châu Á và vùng Địa Trung Hải.', 'Fennel or fennel is a leafy, spice, and medicinal plant that is commonly used in Asia and the Mediterranean.', 50, 8000, NULL, 'thi-la94.jpg', '2020-05-03 02:35:20', '2020-05-03 02:35:20', 1, NULL),
(126, 'Rau răm', 'Laksa leaves', 5, 7, 2, 'Cây rau dăm sống hàng năm, toàn thân rễ và lá vỏ đều có mùi thơm đặc biệt dễ chịu.', 'The tree leaves live annually, the whole body and leaves of the bark have a particularly pleasant aroma.', 50, 5000, NULL, 'rau-ram77.jpg', '2020-05-03 02:35:56', '2020-05-03 02:35:56', 1, NULL),
(127, 'Lá lốt', 'Piper lolot', 5, 3, 2, 'Theo Wikipedia, Lá lốt là cây thân thảo đa niên, có tên khoa học Piper sarmentosum, thuộc họ Hồ tiêu.', 'According to Wikipedia, Betel leaf is a perennial herbaceous plant, scientific name Piper sarmentosum, of the Pepper family.', 50, 5000, NULL, 'la-lot23.jpg', '2020-05-03 02:36:29', '2020-05-03 02:36:29', 1, NULL),
(129, 'Sườn thăn heo', 'Pork ribs', 20, 7, 2, NULL, NULL, 50, 100000, NULL, 'suon-heo50.jpg', '2020-05-03 02:38:23', '2020-05-03 02:38:23', 1, NULL),
(131, 'Chân Giò Heo', 'Pork Legs', 20, 7, 2, 'Sản phẩm được chọn lựa rất kỹ từ những bắp heo ( lợn) tươi ngon được tẩm ướp theo hương vị truyền thống Châu Âu.', 'The product is carefully selected from the fresh pork (pork) that is marinated according to traditional European flavors.', 50, 55000, 50000, 'gio-heo35.jpg', '2020-05-03 02:39:48', '2020-05-03 02:39:48', 1, NULL),
(133, 'Sườn dê tươi', 'Fresh goat chops', 20, 7, 2, 'Thịt dê cung cấp nhiều đạm, ít béo hơn thịt bò và ít calo hơn thịt gà. Thịt dê thúc đẩy lưu thông máu, tăng thân nhiệt, làm tăng các enzym giúp hỗ trợ tiêu hóa thức ăn.', 'Goat meat provides more protein, less fat than beef and fewer calories than chicken. Goat meat promotes blood circulation, increases body temperature, raises enzymes that help digest food.', 50, 350000, 300000, 'suon-de95.jpg', '2020-05-03 02:40:37', '2020-05-03 02:40:37', 1, NULL),
(134, 'Ba Chỉ Bò Thái Cuộn', 'Thai Beef Rolls', 20, 5, 2, 'phẩm tươi sống\r\nBán theo giá / kg', 'fresh produce\r\nSold by price / kg', 50, 160000, NULL, 'ba-chi-bo31.jpg', '2020-05-03 02:40:53', '2020-05-03 02:40:53', 1, NULL),
(135, 'Chân gà ', 'Roasted chicken legs with salt', 20, 5, 2, NULL, NULL, 50, 60000, 50000, 'chan-ga21.jpg', '2020-05-03 02:41:08', '2020-05-03 02:41:08', 1, NULL),
(136, 'Cá Hồi Tươi Nauy fillet', 'Fresh Norwegian Salmon fillet', 23, 7, 2, 'Cá hồi tươi Nauy fillet\r\n- Đơn vị: kg\r\n- Xuất xứ: Nauy', 'Fresh Norwegian salmon fillet\r\n- Unit: kg\r\n- Origin: Norway', 50, 590000, 500000, 'ca-hoi-nauy85.png', '2020-05-03 02:42:12', '2020-05-03 02:42:12', 1, NULL),
(138, 'Cua Thịt', 'Ca Mau Crab Meat', 23, 7, 2, '+ Chắc thịt, ngon tuyệt\r\n+ Dây trói trọng lượng không đáng kể', '+ Sure meat, delicious\r\n+ The rope is not significant', 50, 600000, NULL, 'cua-thit23.jpg', '2020-05-03 02:42:59', '2020-05-03 02:42:59', 1, NULL),
(139, 'Cá Thu ', 'Fresh Mackerel Ly Son Quang Ngai Sea', 23, 7, 2, 'Cá thu tươi tại thuyền bay mỗi ngày\r\nKhông hoá chất không ure\r\nCá sạch ngon\r\nCắt theo yêu cầu khách', 'Fresh mackerel in the flying boat every day\r\nNo chemicals do not urea\r\nDelicious clean fish\r\nCut according to customer requirements', 50, 22000, 20000, 'ca-thu46.png', '2020-05-03 02:43:24', '2020-05-03 02:43:24', 1, NULL),
(140, 'Tôm ', 'Natural Prawns', 23, 7, 2, NULL, NULL, 50, 400000, NULL, 'tom-he18.jpg', '2020-05-03 02:43:44', '2020-05-03 02:43:44', 1, NULL),
(141, 'Cá Hồng', '1 sunny snapper', 23, 7, 2, '- Cá hồng được đánh bắt ở vùng biển Vân Đồn, Quảng Ninh. Cá sau khi đánh bắt bỏ đầu và ruột, phơi 1 nắng, đóng hộp.', '- Snapper was caught in Van Don, Quang Ninh waters. After catching the fish head and intestines, sun exposure, canned.', 50, 100000, NULL, 'ca-hong61.jpg', '2020-05-03 02:44:14', '2020-05-03 02:44:14', 1, NULL),
(142, 'Tôm hùm', 'Lobster', 23, 7, 2, NULL, NULL, 50, 320000, NULL, 'tom-hum33.jpg', '2020-05-03 02:45:09', '2020-05-03 02:45:09', 1, NULL),
(144, 'Dâu tằm Đà Lạt', 'Dalat mulberry', 4, 5, 2, NULL, NULL, 50, 35000, NULL, 'dau-tam-da-lat45.jpg', '2020-05-03 02:45:31', '2020-05-03 02:45:31', 1, NULL),
(145, 'Bưởi Đỏ ', 'Tan Lac Red Pomelo Type 2', 4, 7, 2, 'Bưởi Giang Lộc tốt cho sức khoẻ', 'Giang Loc grapefruit is good for health', 50, 22000, NULL, 'buoi-do19.jpg', '2020-05-03 02:45:48', '2020-05-03 02:45:48', 1, NULL),
(146, 'Nấm Rơm ', 'Fresh Straw Mushrooms', 21, 7, 2, NULL, NULL, 50, 200000, NULL, 'nam-rom67.jpg', '2020-05-03 02:46:12', '2020-05-03 02:46:12', 1, NULL),
(147, 'Nấm Sò Nâu', 'Brown Oyster Mushrooms', 21, 7, 2, NULL, NULL, 50, 30000, NULL, 'nam-so31.jpg', '2020-05-03 02:46:28', '2020-05-03 02:46:28', 1, NULL),
(148, 'Nấm Hương Tươi', 'Fresh Mushrooms', 21, 7, 2, NULL, NULL, 50, 150000, NULL, 'nam-huong74.jpg', '2020-05-03 02:46:42', '2020-05-03 02:46:42', 1, NULL),
(149, 'Nấm Đùi Gà', 'Chicken Drumstick Mushroom', 21, 5, 2, NULL, NULL, 50, 70000, NULL, 'nam-dui-ga2.jpg', '2020-05-03 02:46:54', '2020-05-03 02:46:54', 1, NULL),
(150, 'Nấm Mộc Nhĩ ', 'Black Iron Mushroom Thinh Phat', 21, 5, 2, NULL, NULL, 50, 15000, NULL, 'nam-moc-nhi33.jpg', '2020-05-03 02:47:05', '2020-05-03 02:47:05', 1, NULL),
(152, 'Nấm Linh Chi', 'Ganoderma Thinh Phat', 21, 7, 2, NULL, NULL, 50, 2500000, NULL, 'nam-linh-chi90.jpg', '2020-05-03 02:47:21', '2020-05-03 02:47:21', 1, NULL),
(157, 'Sữa gạo rang', 'Roasted rice milk', 22, 7, 3, NULL, NULL, 50, 300000, NULL, 'sua_gao_rang6.jpg', '2020-05-03 02:48:40', '2020-05-03 02:48:40', 1, NULL),
(158, 'Thùng 48 Hộp Sữa Tươi Tiệt Trùng socola', '48 True Milk Th True Milk Socola', 22, 7, 3, NULL, NULL, 50, 250000, NULL, 'sua_socola68.jpg', '2020-05-03 02:48:32', '2020-05-03 02:48:32', 1, NULL),
(159, 'Thùng 48 Hộp Sữa Tươi Tiệt Trùng it đường', '48 True Milk Th True Milk', 22, 5, 3, NULL, NULL, 50, 250000, NULL, 'sua_tuoi_co_duong81.jpg', '2020-05-03 02:48:24', '2020-05-03 02:48:24', 1, NULL),
(161, 'Bơ', 'avocado', 4, 7, 2, NULL, NULL, 50, 85000, NULL, 'bo68.jpg', '2020-05-03 02:51:35', '2020-05-03 02:51:35', 1, NULL),
(162, 'Cam', 'orange', 4, 7, 2, 'Cam tươi', 'Fresh oranges', 50, 20000, NULL, 'cam40.jpg', '2020-05-03 02:52:50', '2020-05-03 02:52:50', 1, NULL),
(163, 'Cherry', 'Cherry', 4, 7, 2, NULL, NULL, 50, 300000, 280000, 'cherry21.png', '2020-05-03 02:53:44', '2020-05-03 02:53:44', 1, NULL),
(164, 'Đào', 'Peach', 4, 7, 2, NULL, NULL, 50, 150000, 100000, 'dao18.jpg', '2020-05-03 02:54:40', '2020-05-03 02:54:40', 1, NULL),
(165, 'Dứa', 'pineapple', 4, 7, 2, NULL, NULL, 50, 150000, NULL, 'dua39.jpg', '2020-05-03 02:55:35', '2020-05-03 02:55:35', 1, NULL),
(166, 'dưa gang', 'pickle', 4, 7, 2, NULL, NULL, 50, 60000, NULL, 'dua-gang20.jpg', '2020-05-03 02:56:09', '2020-05-03 02:56:09', 1, NULL),
(167, 'Dưa Hấu', 'watermelon', 4, 7, 2, NULL, NULL, 50, 40000, NULL, 'dua-hau46.jpg', '2020-05-03 02:56:54', '2020-05-03 02:56:54', 1, NULL),
(168, 'Dừa', 'dry coconut', 4, 7, 2, NULL, NULL, 50, 30000, NULL, 'dua-kho11.jpeg', '2020-05-03 02:57:26', '2020-05-03 02:57:26', 1, NULL),
(169, 'Đu đủ', 'papaya', 4, 3, 2, NULL, NULL, 50, 50000, NULL, 'du-du45.jpg', '2020-05-03 02:58:04', '2020-05-03 02:58:04', 1, NULL),
(170, 'Lê', 'pear', 4, 7, 2, NULL, NULL, 50, 30000, NULL, 'le90.jpg', '2020-05-03 02:58:32', '2020-05-03 02:58:32', 1, NULL),
(171, 'Lựu Đỏ', 'Pomegranate red', 4, 5, 2, NULL, NULL, 50, 60000, NULL, 'luu-do50.jpg', '2020-05-03 02:59:05', '2020-05-03 02:59:05', 1, NULL),
(172, 'Mãng Cầu', 'Asparagus', 23, 7, 4, 'măng cầu tươi', 'Fresh asparagus', 50, 40000, NULL, 'mang-cau77.jpg', '2020-05-03 02:59:50', '2020-05-03 02:59:50', 1, NULL),
(173, 'Xoài', 'Mango', 4, 7, 2, 'xoài tươi', 'fresh mango', 50, 60000, NULL, 'xoai33.jpg', '2020-05-03 07:34:23', '2020-05-03 07:34:23', 1, NULL),
(174, 'Bạch Tuộc', 'Octopus', 23, 7, 2, NULL, NULL, 50, 120000, NULL, 'bach-tuot32.jpg', '2020-05-03 03:03:11', '2020-05-03 03:03:11', 1, NULL),
(175, 'Bào Ngư', 'Abalone', 23, 7, 2, NULL, NULL, 50, 300000, NULL, 'bao-ngu34.jpg', '2020-05-03 03:03:05', '2020-05-03 03:03:05', 1, NULL),
(176, 'Hàu', 'Oysters', 23, 7, 2, NULL, NULL, 50, 100000, 60000, 'hau37.jpg', '2020-05-03 03:03:55', '2020-05-03 03:03:55', 1, NULL),
(177, 'Mực', 'cuttle', 23, 7, 2, 'Mực tươi', 'Fresh squid', 50, 240000, 200000, 'muc63.jpg', '2020-05-03 03:05:07', '2020-05-03 03:05:07', 1, NULL),
(178, 'Ốc', 'screw', 23, 7, 2, NULL, NULL, 50, 30000, NULL, 'oc95.jpg', '2020-05-03 03:06:39', '2020-05-03 03:06:39', 1, NULL),
(179, 'Sò Huyết', 'Oysters', 23, 7, 2, NULL, NULL, 50, 60000, 50000, 'so-huyet25.gif', '2020-05-03 03:07:16', '2020-05-03 03:07:16', 1, NULL),
(180, 'Trai', 'Pearl', 23, 7, 2, NULL, NULL, 50, 100000, NULL, 'trai88.jpg', '2020-05-03 03:08:28', '2020-05-03 03:08:28', 1, NULL),
(181, '7 up', '7 up', 22, 7, 4, NULL, NULL, 50, 12000, NULL, '7up75.jpg', '2020-05-03 03:19:11', '2020-05-03 03:19:11', 1, NULL),
(182, 'C2 Chanh', 'C2 lemon', 22, 7, 4, 'C2 canh', 'C2 lemon', 50, 12000, NULL, 'c2-chanh47.jpg', '2020-05-03 03:20:15', '2020-05-03 03:20:15', 1, NULL),
(183, 'Cocacola ', 'Cocacola', 22, 7, 4, NULL, NULL, 50, 150000, NULL, 'coca75.jpg', '2020-05-03 03:21:30', '2020-05-03 03:21:30', 1, NULL),
(184, 'Cocacola chai', 'Cocacola bottle', 22, 4, 4, NULL, NULL, 50, 15000, NULL, 'coca-chai46.jpg', '2020-05-03 03:22:11', '2020-05-03 03:22:11', 1, NULL),
(185, 'Sữa cô gái Hà Lan', 'Ducth Lady Milk', 22, 7, 1, NULL, NULL, 50, 12000, NULL, 'co-gai-hl82.jpg', '2020-05-03 03:23:03', '2020-05-03 03:23:03', 1, NULL),
(186, 'Dew', 'Dew', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'dew79.jpg', '2020-05-03 03:23:49', '2020-05-03 03:23:49', 1, NULL),
(187, 'Fanta', 'Fanta', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'fanta71.jpg', '2020-05-03 03:24:26', '2020-05-03 03:24:26', 1, NULL),
(188, 'Trà Latte', 'Latte tea', 22, 7, 4, 'Trà đóng chai', 'Bottled tea', 50, 15000, NULL, 'latte92.jpg', '2020-05-03 03:25:23', '2020-05-03 03:25:23', 1, NULL),
(189, 'Trà Olong', 'Oolong tea', 22, 7, 4, 'Trà đóng chai', 'Bottled tea', 50, 15000, NULL, 'olong30.jpg', '2020-05-03 03:26:20', '2020-05-03 03:26:20', 1, NULL),
(190, 'Pessi', 'Pessi', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'pepsi46.jpg', '2020-05-03 03:27:01', '2020-05-03 03:27:01', 1, NULL),
(191, 'Soda', 'soda', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'soda86.jpg', '2020-05-03 03:27:31', '2020-05-03 03:27:31', 1, NULL),
(192, 'Sprite', 'Sprite', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'sprite82.jpg', '2020-05-03 03:28:09', '2020-05-03 03:28:09', 1, NULL),
(193, 'Sprite chai lớn', 'Sprite large bottles', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 35000, NULL, 'sprite-chai19.jpg', '2020-05-03 03:29:05', '2020-05-03 03:29:05', 1, NULL),
(194, 'Sữa đậu nành', 'Soymilk', 22, 7, 1, 'Sữa đậu nành đóng hộp', 'Canned soy milk', 50, 15000, NULL, 'sua-dau-nanh14.jpg', '2020-05-03 03:30:07', '2020-05-03 03:30:07', 1, NULL),
(195, 'Bột nêm', 'Seasoning', 24, 7, 3, NULL, NULL, 50, 150000, NULL, 'bot-nem56.jpg', '2020-05-03 03:53:16', '2020-05-03 03:53:16', 1, NULL),
(196, 'Bột ngọt', 'MSG', 24, 7, 3, 'MSG', 'MSG', 50, 150000, NULL, 'bot-ngot50.jpg', '2020-05-03 03:54:02', '2020-05-03 03:54:02', 1, NULL),
(197, 'Đường', 'Street', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'duong82.jpg', '2020-05-03 03:54:43', '2020-05-03 03:54:43', 1, NULL),
(198, 'Muối', 'Salt', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'muoi33.jpg', '2020-05-03 03:55:14', '2020-05-03 03:55:14', 1, NULL),
(199, 'Muối ớt', 'Salt and pepper', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'muoi-ot62.jpg', '2020-05-03 03:55:56', '2020-05-03 03:55:56', 1, NULL),
(200, 'Mùi tạt', 'Mustard', 24, 7, 4, NULL, NULL, 50, 15000, NULL, 'mu-tat79.jpg', '2020-05-03 03:56:28', '2020-05-03 03:56:28', 1, NULL),
(201, 'Nước mắn', 'Fish sauce', 24, 7, 4, NULL, NULL, 50, 60000, NULL, 'nuoc-nam19.jpg', '2020-05-03 03:57:03', '2020-05-03 03:57:03', 1, NULL),
(202, 'Ớt bột', 'Paprika', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'ot-bot73.jpg', '2020-05-03 03:57:35', '2020-05-03 03:57:35', 1, NULL),
(203, 'Tiêu hạt', 'Pepper seeds', 24, 7, 2, NULL, NULL, 50, 30000, NULL, 'tieu-hat12.jpg', '2020-05-03 03:58:04', '2020-05-03 03:58:04', 1, NULL),
(204, 'Chanh', 'Lemon', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'chanh86.jpg', '2020-05-03 03:59:20', '2020-05-03 03:59:20', 1, NULL),
(205, 'Chanh vàng', 'Lime', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'chanh-vang70.jpg', '2020-05-03 03:59:46', '2020-05-03 03:59:46', 1, NULL),
(206, 'Gừng', 'Ginger', 5, 7, 2, NULL, NULL, 50, 60000, NULL, 'gung21.jpg', '2020-05-03 04:00:15', '2020-05-03 04:00:15', 1, NULL),
(207, 'Tắc', 'kumquat', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'hanh67.jpg', '2020-05-03 04:01:09', '2020-05-03 04:01:09', 1, NULL),
(208, 'Hành Lá', 'Onions', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'hanh-la37.jpg', '2020-05-03 04:01:49', '2020-05-03 04:01:49', 1, NULL),
(209, 'Hàng Tây', 'Western restaurant', 5, 7, 2, NULL, NULL, 50, 30000, NULL, 'hanh-tay44.jpg', '2020-05-03 04:04:58', '2020-05-03 04:04:58', 1, NULL),
(210, 'Hành Tím', 'Shallots', 5, 7, 2, NULL, NULL, 50, 30000, NULL, 'hanh-tim57.jpg', '2020-05-03 04:16:13', '2020-05-03 04:16:13', 1, NULL),
(211, 'Tỏi', 'Garlic', 5, 7, 2, NULL, NULL, 50, 30000, NULL, 'toi97.jpg', '2020-05-03 04:05:49', '2020-05-03 04:05:49', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `name_en`) VALUES
(1, 'Đang xử lý', NULL),
(2, 'Hoàn thành', NULL),
(3, 'Trả hàng', NULL),
(4, 'Đã thanh toán', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `name_en`, `description`, `description_en`, `image`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Trái cây ', 'Fruits', 'Trái cây tươi cung cấp vitamin tốt cho sức khỏe', 'Fruits healthy', 'trai-cay85.jpg', '2020-02-10 09:06:11', '2020-02-10 09:06:11', 1),
(5, 'Rau củ', 'Vegetables', 'Rau củ cung cấp chất xơ', 'Vegetables healthy', 'rau-cu-qua59.jpg', '2020-02-10 09:06:34', '2020-02-10 09:06:34', 1),
(20, 'Thịt', 'Meat', 'Thịt ngon quá đi', 'Meat healthy', 'meet57.jpg', '2020-03-08 02:49:21', '2020-03-08 02:49:21', 1),
(21, 'Nấm', 'Mushroom', 'Nấm ngon', 'Mushroom healthy', 'mushroom78.jpg', '2020-03-08 02:58:02', '2020-03-08 02:58:02', 1),
(22, 'Thức uống', 'Drinks', 'thức uống', 'Drinks', 'dm-thuc-uong27.jpg', '2020-05-03 03:18:23', '2020-05-03 03:18:23', 1),
(23, 'Hải sản', 'Seafood', 'Hải sản tươi sống', 'Fresh seafood', 'seafood69.jpg', '2020-05-03 07:33:17', '2020-05-03 07:33:17', 1),
(24, 'Gia vị', 'Spice', 'Gia vị', 'Spice', 'dm-gia-vi76.jpg', '2020-05-03 03:55:26', '2020-05-03 03:55:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(10) NOT NULL,
  `unit_name` varchar(100) DEFAULT NULL,
  `unit_name_en` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `unit_name_en`) VALUES
(1, 'Hộp', 'Box(es)'),
(2, 'Kg', 'Kg'),
(3, 'Thùng', 'Bucket(s)'),
(4, 'Chai', 'Bottle(s)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`),
  ADD KEY `products_id_brand_foreign` (`id_brand`),
  ADD KEY `products_id_unit_foreign` (`id_unit`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

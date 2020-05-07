-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 05:44 AM
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
  `admin_image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id_customer` int(11) NOT NULL DEFAULT 0,
  `id_status` int(2) DEFAULT 1,
  `id_coupon` int(11) DEFAULT 0,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'COD' COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `id_status`, `id_coupon`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(60, 29, 1, 0, '2020-05-03', 255000, 'COD', NULL, '2020-05-03 13:59:37', '2020-05-03 13:59:37'),
(61, 29, 1, 0, '2020-05-03', 100000, 'COD', NULL, '2020-05-03 14:00:20', '2020-05-03 14:00:20'),
(62, 29, 3, 0, '2020-05-03', 2857000, 'COD', NULL, '2020-05-06 12:22:33', '2020-05-03 14:00:34'),
(63, 31, 1, 0, '2020-05-03', 1060000, 'COD', NULL, '2020-05-03 14:01:34', '2020-05-03 14:01:34'),
(64, 32, 4, 0, '2020-05-03', 265000, 'COD', NULL, '2020-05-07 02:18:47', '2020-05-03 14:04:47'),
(65, 29, 1, 5, '2020-05-07', 445000, 'COD', NULL, '2020-05-07 02:26:08', '2020-05-07 02:21:44'),
(66, 29, 1, 0, '2020-05-07', 445000, 'COD', NULL, '2020-05-07 02:26:35', '2020-05-07 02:26:35'),
(67, 29, 1, 0, '2020-05-07', 895000, 'COD', NULL, '2020-05-07 02:29:06', '2020-05-07 02:29:06'),
(72, 33, 1, NULL, '2020-05-07', 495000, 'COD', NULL, '2020-05-07 03:01:42', '2020-05-07 03:01:42'),
(73, 33, 1, NULL, '2020-05-07', 900000, 'COD', NULL, '2020-05-07 03:02:06', '2020-05-07 03:02:06'),
(74, 33, 1, NULL, '2020-05-07', 560000, 'COD', NULL, '2020-05-07 03:10:18', '2020-05-07 03:10:18');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `id_unit`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(76, 60, 105, 1, 3, 50000, '2020-05-03 13:59:37', '2020-05-03 13:59:37'),
(77, 60, 114, 1, 1, 120000, '2020-05-03 13:59:37', '2020-05-03 13:59:37'),
(78, 61, 124, 2, 1, 60000, '2020-05-03 14:00:20', '2020-05-03 14:00:20'),
(79, 61, 131, 2, 1, 55000, '2020-05-03 14:00:20', '2020-05-03 14:00:20'),
(80, 62, 112, 1, 1, 120000, '2020-05-03 14:00:34', '2020-05-03 14:00:34'),
(81, 62, 116, 1, 1, 9500000, '2020-05-03 14:00:34', '2020-05-03 14:00:34'),
(82, 62, 117, 1, 3, 7000000, '2020-05-03 14:00:34', '2020-05-03 14:00:34'),
(83, 63, 112, 1, 1, 120000, '2020-05-03 14:01:34', '2020-05-03 14:01:34'),
(84, 63, 116, 1, 1, 9500000, '2020-05-03 14:01:34', '2020-05-03 14:01:34'),
(85, 64, 111, 1, 1, 45000, '2020-05-03 14:04:47', '2020-05-03 14:04:47'),
(86, 64, 114, 1, 1, 120000, '2020-05-03 14:04:47', '2020-05-03 14:04:47'),
(87, 64, 129, 2, 1, 100000, '2020-05-03 14:04:47', '2020-05-03 14:04:47'),
(88, 65, 105, 1, 1, 50000, '2020-05-07 02:21:44', '2020-05-07 02:21:44'),
(89, 65, 108, 1, 1, 500000, '2020-05-07 02:21:44', '2020-05-07 02:21:44'),
(90, 66, 105, 1, 1, 50000, '2020-05-07 02:26:35', '2020-05-07 02:26:35'),
(91, 66, 110, 1, 1, 500000, '2020-05-07 02:26:35', '2020-05-07 02:26:35'),
(92, 67, 105, 1, 1, 50000, '2020-05-07 02:29:06', '2020-05-07 02:29:06'),
(93, 67, 108, 1, 1, 500000, '2020-05-07 02:29:06', '2020-05-07 02:29:06'),
(94, 67, 110, 1, 1, 500000, '2020-05-07 02:29:06', '2020-05-07 02:29:06'),
(95, 68, 105, 1, 1, 50000, '2020-05-07 02:32:48', '2020-05-07 02:32:48'),
(96, 68, 108, 1, 1, 500000, '2020-05-07 02:32:48', '2020-05-07 02:32:48'),
(97, 69, 105, 1, 1, 50000, '2020-05-07 02:38:29', '2020-05-07 02:38:29'),
(98, 69, 108, 1, 1, 500000, '2020-05-07 02:38:29', '2020-05-07 02:38:29'),
(99, 70, 105, 1, 1, 50000, '2020-05-07 02:39:23', '2020-05-07 02:39:23'),
(100, 70, 108, 1, 1, 500000, '2020-05-07 02:39:23', '2020-05-07 02:39:23'),
(101, 71, 108, 1, 1, 500000, '2020-05-07 02:41:31', '2020-05-07 02:41:31'),
(102, 71, 105, 1, 1, 50000, '2020-05-07 02:41:31', '2020-05-07 02:41:31'),
(103, 72, 105, 1, 1, 50000, '2020-05-07 03:01:42', '2020-05-07 03:01:42'),
(104, 72, 110, 1, 1, 500000, '2020-05-07 03:01:42', '2020-05-07 03:01:42'),
(105, 73, 110, 1, 1, 500000, '2020-05-07 03:02:06', '2020-05-07 03:02:06'),
(106, 73, 108, 1, 1, 500000, '2020-05-07 03:02:06', '2020-05-07 03:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `name_en`, `description`, `description_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(2, 'BigC', 'BigC Super', 'Siêu thị BigC', 'Supermarket BigC', 1, 'bigC95.png', '2020-02-09 04:15:28', '2020-02-09 04:15:28'),
(3, 'CoopMart', 'Coop Super', 'Siêu thị CoopMart', 'Supermarket Coop', 1, 'coop_mart35.jpg', '2020-02-09 04:15:35', '2020-02-09 04:15:35'),
(4, 'Mega', 'Mega Super', 'Siêu thị Mega', 'Supermarket Mega', 1, 'mega.jpg', '2020-02-08 14:32:56', '2020-02-08 14:32:56'),
(5, 'VinMart', 'VinMart Super', 'Siêu thị VinMart', 'Supermarket Vin', 1, 'vinmart65.jpg', '2020-02-09 04:15:44', '2020-02-09 04:15:44'),
(6, 'VinatexMart', 'Vinatex Super', 'Siêu thị VinatexMart', 'Supermarket Vinatex', 1, 'vinatex.jpg', '2020-02-08 03:41:23', '2020-02-08 03:41:23'),
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
(2, 30, 105, 'Sạch và ngon', '2020-05-02', '2020-05-02', 1),
(3, 32, 108, 'ngon thật!!!!', '2020-05-03', '2020-05-03', 1),
(4, 31, 116, 'Hơi đắt nha hihi', '2020-05-03', '2020-05-03', 1),
(5, 33, 105, 'hi', '2020-05-07', '2020-05-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `percent_of` int(11) DEFAULT NULL,
  `apply_at` date NOT NULL,
  `end_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `percent_of`, `apply_at`, `end_at`) VALUES
(0, 'không có khuyến mãi', 'null', 0, 0, '0000-00-00', '0000-00-00'),
(5, 'MT50', 'fixed', 50000, NULL, '2020-05-07', '2020-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `gender`, `image`, `email`, `address`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(29, 'Phan Nguyễn Minh Thảo', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'thao.jpg', 'pnmthaoct@gmail.com', 'Nguyen Van Cu Street, An Hoa Ward, Ninh Kieu District, Can Tho City, Viet Nam', '0949422936', NULL, '2020-05-03 14:07:52', '2020-05-03 14:07:52'),
(30, 'Huỳnh Thanh Phúc', '2241de9a7b2e0e61532daecab5103b62', NULL, 'thao.jpg', 'danhuynh98@gmail.com', '18b vo thi sau', '0907026987', NULL, '2020-05-03 14:07:20', '2020-04-29 11:05:42'),
(31, 'Minh Thảo', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'thao.jpg', 'pnmthao98@gmail.com', 'Cần Thơ', '093304485', NULL, '2020-05-03 14:07:24', '2020-05-03 14:01:11'),
(32, 'Thảo Phan', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'thao.jpg', 'minhthao123@gmail.com', 'Hà Nội', '123456789', NULL, '2020-05-03 14:08:09', '2020-05-03 14:08:09'),
(33, 'phúc huỳnh', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'htphuc@gmail.com', 'Can Tho City', '123456789', NULL, '2020-05-07 03:01:03', '2020-05-07 03:01:03'),
(34, 'dan huynh', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'htphuc123@gmail.com', 'Can Tho City', '123456789', NULL, '2020-05-07 03:03:59', '2020-05-07 03:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `id_brand` int(10) UNSIGNED DEFAULT NULL,
  `id_unit` int(10) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `new` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_en`, `id_type`, `id_brand`, `id_unit`, `description`, `description_en`, `quantity`, `unit_price`, `promotion_price`, `image`, `created_at`, `updated_at`, `status`, `new`) VALUES
(105, 'Táo đỏ Mỹ', 'Red Apple', 4, 5, 1, 'Táo đỏ Mỹ', 'Clean', 10, 50000, 45000, 'apple85.jpg', '2020-02-10 02:10:33', '2020-02-10 02:10:33', 1, 0),
(106, 'Thịt heo', 'Pork', 20, 7, 1, 'Thịt heo ngon', 'Clean', 10, 100000, NULL, 'pork58.jpg', '2020-03-07 19:50:57', '2020-03-07 19:50:57', 1, 1),
(107, 'Thịt bò', 'Beef', 20, 6, 1, 'Thịt bò bò bò', 'Clean', 35, 200000, NULL, 'beef78.png', '2020-03-07 19:51:25', '2020-03-07 19:51:25', 1, 1),
(108, 'Thịt cừu', 'Sheep ', 20, 5, 1, 'Thịt cừu healthy', 'Clean', 50, 500000, 450000, 'sheep11.jpg', '2020-03-07 19:51:59', '2020-03-07 19:51:59', 1, 1),
(109, 'Rau muống', 'Vegetables muong', 5, 3, 1, 'Rau muống sạch', 'Clean ', 1, 5000, NULL, 'rau-muong5.png', '2020-05-03 12:56:53', '2020-05-03 12:56:53', 1, 1),
(110, 'Kiwi', 'Kiwi123', 4, 6, 1, 'Kiwi healthy', 'Clean', 35, 500000, 450000, 'kiwi38.jpg', '2020-03-07 19:59:31', '2020-03-07 19:59:31', 1, 1),
(111, 'Chuối', 'Banana', 4, 4, 1, 'Chuối tốt cho sức khỏe', 'Clean', 30, 45000, NULL, 'banana72.jpg', '2020-03-07 20:00:05', '2020-03-07 20:00:05', 1, 1),
(112, 'Nho xanh', 'Green grape', 4, 5, 1, 'Nho xanh Mỹ', 'Clean', 35, 120000, 110000, 'grapes_green17.jpg', '2020-03-07 20:02:39', '2020-03-07 20:02:39', 1, 1),
(113, 'Nho đen', 'Black grape', 4, 5, 1, 'Nho đen Mỹ', 'Clean', 35, 150000, NULL, 'grapes_black42.jpg', '2020-03-07 20:03:10', '2020-03-07 20:03:10', 1, 1),
(114, 'Dâu tây', 'Strawberry', 4, 3, 1, 'Dâu tây Đà Lạt', 'Clean', 35, 120000, NULL, 'strawbery29.png', '2020-03-10 01:59:09', '2020-03-10 01:59:09', 1, 1),
(116, 'Bò Wagyu Nhật', 'Wagyu Beef', 20, 7, 1, 'Bò Wagyu Nhật A5', 'Clean', 30, 9500000, 950000, 'bo-wagyu74.jpg', '2020-03-08 05:38:21', '2020-03-08 05:38:21', 1, 1),
(117, 'Bò Kobe', 'Kobe Beef', 20, 6, 1, 'Bò kobe', 'Clean', 30, 7000000, 599000, 'bo-kobe77.jpg', '2020-03-07 20:08:29', '2020-03-07 20:08:29', 1, 1),
(119, 'Nấm kim châm', 'Cham Mushroom ', 21, 7, 1, 'Nấm kim châm ngon', 'Clean', 40, 300000, NULL, 'nam-kim-cham37.jpg', '2020-03-07 20:11:02', '2020-03-07 20:11:02', 1, 1),
(120, 'Dọc mùng', 'Colocasia gigantea', 5, 6, 2, NULL, NULL, 50, 20000, 0, 'doc-mung74.png', '2020-05-03 02:27:17', '2020-05-03 02:27:17', 1, 1),
(122, 'Ngọn Bí', 'The Secret tops', 5, 3, 2, 'Rau bí bao gồm lá non', 'Pumpkin vegetables', 50, 15000, 14000, 'ngon-bi59.jpg', '2020-05-03 02:29:56', '2020-05-03 02:29:56', 1, 1),
(123, 'Rau Cải Ngọt', 'Sweet Vegetables', 5, 7, 2, 'Cải ngọt có nguồn gốc từ Ấn Độ, Trung Quốc.', 'Choysum is native to India and China. ', 50, 17000, NULL, 'rau-cai-ngot99.jpg', '2020-05-03 02:34:38', '2020-05-03 02:34:38', 1, 1),
(124, 'Ớt Chuông', 'Bell pepper', 5, 5, 2, 'Sạch', 'Clean', 50, 60000, 50000, 'ot-chuong16.jpg', '2020-05-03 02:34:58', '2020-05-03 02:34:58', 1, 1),
(125, 'Thì Là', 'fennel', 5, 7, 2, 'Thì là hay thìa là là một loài cây lấy lá làm gia vị và lấy hạt làm thuốc được sử dụng rất phổ biến ở châu Á và vùng Địa Trung Hải.', 'Fennel or fennel is a leafy, spice, and medicinal plant that is commonly used in Asia and the Mediterranean.', 50, 8000, NULL, 'thi-la94.jpg', '2020-05-03 02:35:20', '2020-05-03 02:35:20', 1, 1),
(126, 'Rau răm', 'Laksa leaves', 5, 7, 2, 'Cây rau dăm sống hàng năm, toàn thân rễ và lá vỏ đều có mùi thơm đặc biệt dễ chịu.', 'The tree leaves live annually, the whole body and leaves of the bark have a particularly pleasant aroma.', 50, 5000, NULL, 'rau-ram77.jpg', '2020-05-03 02:35:56', '2020-05-03 02:35:56', 1, 1),
(127, 'Lá lốt', 'Piper lolot', 5, 3, 2, 'Theo Wikipedia, Lá lốt là cây thân thảo đa niên, có tên khoa học Piper sarmentosum, thuộc họ Hồ tiêu.', 'According to Wikipedia, Betel leaf is a perennial herbaceous plant, scientific name Piper sarmentosum, of the Pepper family.', 50, 5000, NULL, 'la-lot23.jpg', '2020-05-03 02:36:29', '2020-05-03 02:36:29', 1, 1),
(129, 'Sườn thăn heo', 'Pork ribs', 20, 7, 2, NULL, NULL, 50, 100000, NULL, 'suon-heo50.jpg', '2020-05-03 02:38:23', '2020-05-03 02:38:23', 1, 1),
(131, 'Chân Giò Heo', 'Pork Legs', 20, 7, 2, 'Sản phẩm được chọn lựa rất kỹ từ những bắp heo ( lợn) tươi ngon được tẩm ướp theo hương vị truyền thống Châu Âu.', 'The product is carefully selected from the fresh pork (pork) that is marinated according to traditional European flavors.', 50, 55000, 50000, 'gio-heo35.jpg', '2020-05-03 02:39:48', '2020-05-03 02:39:48', 1, 1),
(133, 'Sườn dê tươi', 'Fresh goat chops', 20, 7, 2, 'Thịt dê cung cấp nhiều đạm, ít béo hơn thịt bò và ít calo hơn thịt gà. Thịt dê thúc đẩy lưu thông máu, tăng thân nhiệt, làm tăng các enzym giúp hỗ trợ tiêu hóa thức ăn.', 'Goat meat provides more protein, less fat than beef and fewer calories than chicken. Goat meat promotes blood circulation, increases body temperature, raises enzymes that help digest food.', 50, 350000, 300000, 'suon-de95.jpg', '2020-05-03 02:40:37', '2020-05-03 02:40:37', 1, 1),
(134, 'Ba Chỉ Bò Thái Cuộn', 'Thai Beef Rolls', 20, 5, 2, 'phẩm tươi sống\r\nBán theo giá / kg', 'fresh produce\r\nSold by price / kg', 50, 160000, NULL, 'ba-chi-bo31.jpg', '2020-05-03 02:40:53', '2020-05-03 02:40:53', 1, 1),
(135, 'Chân gà ', 'Roasted chicken legs with salt', 20, 5, 2, NULL, NULL, 50, 60000, 50000, 'chan-ga21.jpg', '2020-05-03 02:41:08', '2020-05-03 02:41:08', 1, 1),
(136, 'Cá Hồi Tươi Nauy fillet', 'Fresh Norwegian Salmon fillet', 23, 7, 2, 'Cá hồi tươi Nauy fillet\r\n- Đơn vị: kg\r\n- Xuất xứ: Nauy', 'Fresh Norwegian salmon fillet\r\n- Unit: kg\r\n- Origin: Norway', 50, 590000, 500000, 'ca-hoi-nauy85.png', '2020-05-03 02:42:12', '2020-05-03 02:42:12', 1, 1),
(138, 'Cua Thịt', 'Ca Mau Crab Meat', 23, 7, 2, '+ Chắc thịt, ngon tuyệt\r\n+ Dây trói trọng lượng không đáng kể', '+ Sure meat, delicious\r\n+ The rope is not significant', 50, 600000, NULL, 'cua-thit23.jpg', '2020-05-03 02:42:59', '2020-05-03 02:42:59', 1, 1),
(139, 'Cá Thu ', 'Fresh Mackerel Ly Son Quang Ngai Sea', 23, 7, 2, 'Cá thu tươi tại thuyền bay mỗi ngày\r\nKhông hoá chất không ure\r\nCá sạch ngon\r\nCắt theo yêu cầu khách', 'Fresh mackerel in the flying boat every day\r\nNo chemicals do not urea\r\nDelicious clean fish\r\nCut according to customer requirements', 50, 22000, 20000, 'ca-thu46.png', '2020-05-03 02:43:24', '2020-05-03 02:43:24', 1, 1),
(140, 'Tôm ', 'Natural Prawns', 23, 7, 2, NULL, NULL, 50, 400000, NULL, 'tom-he18.jpg', '2020-05-03 02:43:44', '2020-05-03 02:43:44', 1, 1),
(141, 'Cá Hồng', '1 sunny snapper', 23, 7, 2, '- Cá hồng được đánh bắt ở vùng biển Vân Đồn, Quảng Ninh. Cá sau khi đánh bắt bỏ đầu và ruột, phơi 1 nắng, đóng hộp.', '- Snapper was caught in Van Don, Quang Ninh waters. After catching the fish head and intestines, sun exposure, canned.', 50, 100000, NULL, 'ca-hong61.jpg', '2020-05-03 02:44:14', '2020-05-03 02:44:14', 1, 1),
(142, 'Tôm hùm', 'Lobster', 23, 7, 2, NULL, NULL, 50, 320000, NULL, 'tom-hum33.jpg', '2020-05-03 02:45:09', '2020-05-03 02:45:09', 1, 1),
(144, 'Dâu tằm Đà Lạt', 'Dalat mulberry', 4, 5, 2, NULL, NULL, 50, 35000, NULL, 'dau-tam-da-lat45.jpg', '2020-05-03 02:45:31', '2020-05-03 02:45:31', 1, 1),
(145, 'Bưởi Đỏ ', 'Tan Lac Red Pomelo Type 2', 4, 7, 2, 'Bưởi Giang Lộc tốt cho sức khoẻ', 'Giang Loc grapefruit is good for health', 50, 22000, NULL, 'buoi-do19.jpg', '2020-05-03 02:45:48', '2020-05-03 02:45:48', 1, 1),
(146, 'Nấm Rơm ', 'Fresh Straw Mushrooms', 21, 7, 2, NULL, NULL, 50, 200000, NULL, 'nam-rom67.jpg', '2020-05-03 02:46:12', '2020-05-03 02:46:12', 1, 1),
(147, 'Nấm Sò Nâu', 'Brown Oyster Mushrooms', 21, 7, 2, NULL, NULL, 50, 30000, NULL, 'nam-so31.jpg', '2020-05-03 02:46:28', '2020-05-03 02:46:28', 1, 1),
(148, 'Nấm Hương Tươi', 'Fresh Mushrooms', 21, 7, 2, NULL, NULL, 50, 150000, NULL, 'nam-huong74.jpg', '2020-05-03 02:46:42', '2020-05-03 02:46:42', 1, 1),
(149, 'Nấm Đùi Gà', 'Chicken Drumstick Mushroom', 21, 5, 2, NULL, NULL, 50, 70000, NULL, 'nam-dui-ga2.jpg', '2020-05-03 02:46:54', '2020-05-03 02:46:54', 1, 1),
(150, 'Nấm Mộc Nhĩ ', 'Black Iron Mushroom Thinh Phat', 21, 5, 2, NULL, NULL, 50, 15000, NULL, 'nam-moc-nhi33.jpg', '2020-05-03 02:47:05', '2020-05-03 02:47:05', 1, 1),
(152, 'Nấm Linh Chi', 'Ganoderma Thinh Phat', 21, 7, 2, NULL, NULL, 50, 2500000, NULL, 'nam-linh-chi90.jpg', '2020-05-03 02:47:21', '2020-05-03 02:47:21', 1, 1),
(161, 'Bơ', 'avocado', 4, 7, 2, NULL, NULL, 50, 85000, NULL, 'bo68.jpg', '2020-05-03 02:51:35', '2020-05-03 02:51:35', 1, 1),
(162, 'Cam', 'orange', 4, 7, 2, 'Cam tươi', 'Fresh oranges', 50, 20000, NULL, 'cam40.jpg', '2020-05-03 02:52:50', '2020-05-03 02:52:50', 1, 1),
(163, 'Cherry', 'Cherry', 4, 7, 2, NULL, NULL, 50, 300000, 280000, 'cherry21.png', '2020-05-03 02:53:44', '2020-05-03 02:53:44', 1, 1),
(164, 'Đào', 'Peach', 4, 7, 2, NULL, NULL, 50, 150000, 100000, 'dao18.jpg', '2020-05-03 02:54:40', '2020-05-03 02:54:40', 1, 1),
(165, 'Dứa', 'pineapple', 4, 7, 2, NULL, NULL, 50, 150000, NULL, 'dua39.jpg', '2020-05-03 02:55:35', '2020-05-03 02:55:35', 1, 1),
(166, 'dưa gang', 'pickle', 4, 7, 2, NULL, NULL, 50, 60000, NULL, 'dua-gang20.jpg', '2020-05-03 02:56:09', '2020-05-03 02:56:09', 1, 1),
(167, 'Dưa Hấu', 'watermelon', 4, 7, 2, NULL, NULL, 50, 40000, NULL, 'dua-hau46.jpg', '2020-05-03 02:56:54', '2020-05-03 02:56:54', 1, 1),
(168, 'Dừa', 'dry coconut', 4, 7, 2, NULL, NULL, 50, 30000, NULL, 'dua-kho11.jpeg', '2020-05-03 02:57:26', '2020-05-03 02:57:26', 1, 1),
(169, 'Đu đủ', 'papaya', 4, 3, 2, NULL, NULL, 50, 50000, NULL, 'du-du45.jpg', '2020-05-03 02:58:04', '2020-05-03 02:58:04', 1, 1),
(170, 'Lê', 'pear', 4, 7, 2, NULL, NULL, 50, 30000, NULL, 'le90.jpg', '2020-05-03 02:58:32', '2020-05-03 02:58:32', 1, 1),
(171, 'Lựu Đỏ', 'Pomegranate red', 4, 5, 2, NULL, NULL, 50, 60000, NULL, 'luu-do50.jpg', '2020-05-03 02:59:05', '2020-05-03 02:59:05', 1, 1),
(172, 'Mãng Cầu', 'Asparagus', 23, 7, 4, 'măng cầu tươi', 'Fresh asparagus', 50, 40000, NULL, 'mang-cau77.jpg', '2020-05-03 02:59:50', '2020-05-03 02:59:50', 1, 1),
(173, 'Xoài', 'Mango', 4, 7, 2, 'xoài tươi', 'fresh mango', 50, 60000, NULL, 'xoai33.jpg', '2020-05-03 07:34:23', '2020-05-03 07:34:23', 1, 1),
(174, 'Bạch Tuộc', 'Octopus', 23, 7, 2, NULL, NULL, 50, 120000, NULL, 'bach-tuot32.jpg', '2020-05-03 03:03:11', '2020-05-03 03:03:11', 1, 1),
(175, 'Bào Ngư', 'Abalone', 23, 7, 2, NULL, NULL, 50, 300000, NULL, 'bao-ngu34.jpg', '2020-05-03 03:03:05', '2020-05-03 03:03:05', 1, 1),
(176, 'Hàu', 'Oysters', 23, 7, 2, NULL, NULL, 50, 100000, 60000, 'hau37.jpg', '2020-05-03 03:03:55', '2020-05-03 03:03:55', 1, 1),
(177, 'Mực', 'cuttle', 23, 7, 2, 'Mực tươi', 'Fresh squid', 50, 240000, 200000, 'muc63.jpg', '2020-05-03 03:05:07', '2020-05-03 03:05:07', 1, 1),
(178, 'Ốc', 'screw', 23, 7, 2, NULL, NULL, 50, 30000, NULL, 'oc95.jpg', '2020-05-03 03:06:39', '2020-05-03 03:06:39', 1, 1),
(179, 'Sò Huyết', 'Oysters', 23, 7, 2, NULL, NULL, 50, 60000, 50000, 'so-huyet25.gif', '2020-05-03 03:07:16', '2020-05-03 03:07:16', 1, 1),
(180, 'Trai', 'Pearl', 23, 7, 2, NULL, NULL, 50, 100000, NULL, 'trai88.jpg', '2020-05-03 03:08:28', '2020-05-03 03:08:28', 1, 1),
(181, '7 up', '7 up', 22, 7, 4, NULL, NULL, 50, 12000, NULL, '7up75.jpg', '2020-05-03 03:19:11', '2020-05-03 03:19:11', 1, 1),
(182, 'C2 Chanh', 'C2 lemon', 22, 7, 4, 'C2 canh', 'C2 lemon', 50, 12000, NULL, 'c2-chanh47.jpg', '2020-05-03 03:20:15', '2020-05-03 03:20:15', 1, 1),
(183, 'Cocacola ', 'Cocacola', 22, 7, 4, NULL, NULL, 50, 150000, NULL, 'coca75.jpg', '2020-05-03 03:21:30', '2020-05-03 03:21:30', 1, 1),
(184, 'Cocacola chai', 'Cocacola bottle', 22, 4, 4, NULL, NULL, 50, 15000, NULL, 'coca-chai46.jpg', '2020-05-03 03:22:11', '2020-05-03 03:22:11', 1, 1),
(185, 'Sữa cô gái Hà Lan', 'Ducth Lady Milk', 22, 7, 1, NULL, NULL, 50, 12000, NULL, 'co-gai-hl82.jpg', '2020-05-03 03:23:03', '2020-05-03 03:23:03', 1, 1),
(186, 'Dew', 'Dew', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'dew79.jpg', '2020-05-03 03:23:49', '2020-05-03 03:23:49', 1, 1),
(187, 'Fanta', 'Fanta', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'fanta71.jpg', '2020-05-03 03:24:26', '2020-05-03 03:24:26', 1, 1),
(188, 'Trà Latte', 'Latte tea', 22, 7, 4, 'Trà đóng chai', 'Bottled tea', 50, 15000, NULL, 'latte92.jpg', '2020-05-03 03:25:23', '2020-05-03 03:25:23', 1, 1),
(189, 'Trà Olong', 'Oolong tea', 22, 7, 4, 'Trà đóng chai', 'Bottled tea', 50, 15000, NULL, 'olong30.jpg', '2020-05-03 03:26:20', '2020-05-03 03:26:20', 1, 1),
(190, 'Pessi', 'Pessi', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'pepsi46.jpg', '2020-05-03 03:27:01', '2020-05-03 03:27:01', 1, 1),
(191, 'Soda', 'soda', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'soda86.jpg', '2020-05-03 03:27:31', '2020-05-03 03:27:31', 1, 1),
(192, 'Sprite', 'Sprite', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 15000, NULL, 'sprite82.jpg', '2020-05-03 03:28:09', '2020-05-03 03:28:09', 1, 1),
(193, 'Sprite chai lớn', 'Sprite large bottles', 22, 7, 4, 'nước uống có gas', 'gassed drink', 50, 35000, NULL, 'sprite-chai19.jpg', '2020-05-03 03:29:05', '2020-05-03 03:29:05', 1, 1),
(194, 'Sữa đậu nành', 'Soymilk', 22, 7, 1, 'Sữa đậu nành đóng hộp', 'Canned soy milk', 50, 15000, NULL, 'sua-dau-nanh14.jpg', '2020-05-03 03:30:07', '2020-05-03 03:30:07', 1, 1),
(195, 'Bột nêm', 'Seasoning', 24, 7, 3, NULL, NULL, 50, 150000, NULL, 'bot-nem56.jpg', '2020-05-03 03:53:16', '2020-05-03 03:53:16', 1, 1),
(196, 'Bột ngọt', 'MSG', 24, 7, 3, 'MSG', 'MSG', 50, 150000, NULL, 'bot-ngot50.jpg', '2020-05-03 03:54:02', '2020-05-03 03:54:02', 1, 1),
(197, 'Đường', 'Street', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'duong82.jpg', '2020-05-03 03:54:43', '2020-05-03 03:54:43', 1, 1),
(198, 'Muối', 'Salt', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'muoi33.jpg', '2020-05-03 03:55:14', '2020-05-03 03:55:14', 1, 1),
(199, 'Muối ớt', 'Salt and pepper', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'muoi-ot62.jpg', '2020-05-03 03:55:56', '2020-05-03 03:55:56', 1, 1),
(200, 'Mùi tạt', 'Mustard', 24, 7, 4, NULL, NULL, 50, 15000, NULL, 'mu-tat79.jpg', '2020-05-03 03:56:28', '2020-05-03 03:56:28', 1, 1),
(201, 'Nước mắn', 'Fish sauce', 24, 7, 4, NULL, NULL, 50, 60000, NULL, 'nuoc-nam19.jpg', '2020-05-03 03:57:03', '2020-05-03 03:57:03', 1, 1),
(202, 'Ớt bột', 'Paprika', 24, 7, 2, NULL, NULL, 50, 60000, NULL, 'ot-bot73.jpg', '2020-05-03 03:57:35', '2020-05-03 03:57:35', 1, 1),
(203, 'Tiêu hạt', 'Pepper seeds', 24, 7, 2, NULL, NULL, 50, 30000, NULL, 'tieu-hat12.jpg', '2020-05-03 03:58:04', '2020-05-03 03:58:04', 1, 1),
(204, 'Chanh', 'Lemon', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'chanh86.jpg', '2020-05-03 03:59:20', '2020-05-03 03:59:20', 1, 1),
(205, 'Chanh vàng', 'Lime', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'chanh-vang70.jpg', '2020-05-03 03:59:46', '2020-05-03 03:59:46', 1, 1),
(206, 'Gừng', 'Ginger', 5, 7, 2, NULL, NULL, 50, 60000, NULL, 'gung21.jpg', '2020-05-03 04:00:15', '2020-05-03 04:00:15', 1, 1),
(207, 'Tắc', 'kumquat', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'hanh67.jpg', '2020-05-03 04:01:09', '2020-05-03 04:01:09', 1, 1),
(208, 'Hành Lá', 'Onions', 5, 7, 2, NULL, NULL, 50, 15000, NULL, 'hanh-la37.jpg', '2020-05-03 04:01:49', '2020-05-03 04:01:49', 1, 1),
(209, 'Hàng Tây', 'Western restaurant', 5, 7, 2, NULL, NULL, 50, 30000, NULL, 'hanh-tay44.jpg', '2020-05-03 04:04:58', '2020-05-03 04:04:58', 1, 1),
(210, 'Hành Tím', 'Shallots', 5, 7, 2, NULL, NULL, 50, 30000, NULL, 'hanh-tim57.jpg', '2020-05-03 04:16:13', '2020-05-03 04:16:13', 1, 1),
(211, 'Tỏi', 'Garlic', 5, 7, 2, NULL, NULL, 50, 30000, NULL, 'toi97.jpg', '2020-05-03 04:05:49', '2020-05-03 04:05:49', 1, 1),
(212, 'abc', NULL, 24, 7, 4, NULL, NULL, 3, 14000, NULL, 'review16.png', '2020-05-03 13:02:18', '2020-05-03 13:02:18', 1, NULL),
(213, 'abc', 'abc', 24, 7, 4, NULL, NULL, 30, 14000, NULL, '', '2020-05-07 02:57:50', '2020-05-07 02:57:50', 1, NULL);

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
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `bills_ibfk_1` (`id_customer`),
  ADD KEY `bills_idcoupon_1` (`id_coupon`);

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
  ADD PRIMARY KEY (`id`) USING BTREE;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_idcoupon_1` FOREIGN KEY (`id_coupon`) REFERENCES `coupons` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

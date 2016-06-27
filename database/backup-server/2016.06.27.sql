-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2016 at 08:44 PM
-- Server version: 10.0.26-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cuahangb_sieuthidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE IF NOT EXISTS `chitiethoadon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ma_hoa_don` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_san_pham` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL DEFAULT '0',
  `don_gia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `ma_hoa_don`, `ma_san_pham`, `so_luong`, `don_gia`, `created_at`, `updated_at`) VALUES
(1, 'HD01', 'SP01', 2, '30', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(2, 'HD01', 'SP02', 2, '25', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(3, 'HD02', 'SP01', 3, '30', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(4, 'HD03', 'SP02', 3, '25', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(5, 'HD03', 'SP03', 1, '90', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(6, 'HD03', 'SP01', 3, '90', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(7, 'HD04', 'SP04', 1, '2400', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(8, 'HD05', 'SP06', 1, '2000', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(9, 'HD05', 'SP01', 5, '30', '2016-06-25 08:13:22', '2016-06-25 08:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE IF NOT EXISTS `hinhanh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ma_hoa_don` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_lap` date DEFAULT NULL,
  `ma_khach_hang` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hoadon_ma_hoa_don_unique` (`ma_hoa_don`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `ma_hoa_don`, `ngay_lap`, `ma_khach_hang`, `created_at`, `updated_at`) VALUES
(1, 'HD01', '2011-03-20', 'KH01', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(2, 'HD02', '2011-02-15', 'KH02', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(3, 'HD03', '2011-01-18', 'KH05', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(4, 'HD04', '2010-09-16', 'KH01', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(5, 'HD05', '2011-02-27', 'KH02', '2016-06-25 08:13:22', '2016-06-25 08:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ma_khach_hang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam_sinh` int(11) DEFAULT NULL,
  `gioi_tinh` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `khachhang_ma_khach_hang_unique` (`ma_khach_hang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ma_khach_hang`, `ho_ten`, `dia_chi`, `so_dien_thoai`, `nam_sinh`, `gioi_tinh`, `created_at`, `updated_at`) VALUES
(1, 'KH01', 'Nguyễn Thanh Tùng', 'Hồ Chí Minh', '9-0991-2233', 1984, 1, '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(2, 'KH02', 'Lê Nhật Nam', 'Hồ Chí Minh', '9-1234-2134', 1972, 0, '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(3, 'KH03', 'Nguyễn Thị Thanh', 'Cà Mau', '9-2222-3333', 1981, 0, '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(4, 'KH04', 'Lê Thị Lan', 'Bình Dương', '9-1111-1111', 1984, 0, '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(5, 'KH05', 'Trần Minh Quang', 'Đồng Nai', '9-2222-5555', 1984, 1, '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(6, 'KH06', 'Lê Văn Hải', 'Hồ Chí Minh', '9-1234-4321', 1970, 1, '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(7, 'KH07', 'Dương Văn Hai', 'Đồng Nai', '9-1111-0000', 1988, 1, '2016-06-25 08:13:22', '2016-06-25 08:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ma_loai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loaisanpham_ma_loai_unique` (`ma_loai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `ma_loai`, `ten_loai`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Đồ Dùng', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(2, 'B', 'Nồi Cơm Điện', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(3, 'C', 'Đèn Điện', '2016-06-25 08:13:22', '2016-06-25 08:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_18_144733_create_sanpham_table', 1),
('2016_06_18_144757_create_loaisanpham_table', 1),
('2016_06_18_144814_create_khachhang_table', 1),
('2016_06_18_144836_create_hoadon_table', 1),
('2016_06_18_155813_create_hinhanh_table', 1),
('2016_06_18_160621_create_chitiethoadon_table', 1),
('2016_06_24_034112_create_user_activations_table', 1),
('2016_06_25_150256_create_social_accounts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ma_san_pham` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia_tien` bigint(20) NOT NULL DEFAULT '0',
  `don_vi_tinh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_luong_ton` int(11) NOT NULL DEFAULT '0',
  `ma_loai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sanpham_ma_san_pham_unique` (`ma_san_pham`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ma_san_pham`, `ten_san_pham`, `gia_tien`, `don_vi_tinh`, `so_luong_ton`, `ma_loai`, `created_at`, `updated_at`) VALUES
(1, 'SP01', 'Bột Giặt ÔMÔ', 30, 'Túi', 70, 'A', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(2, 'SP02', 'Bột Giặt Tide', 25, 'Túi', 200, 'A', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(3, 'SP03', 'Đèn Bàn Rạng Đông', 100, 'cái', 90, 'C', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(4, 'SP04', 'Nồi cơm điện SHARP 3041', 2500, 'Cái', 10, 'B', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(5, 'SP05', 'Bàn chải đánh răng PS', 12, 'Cái', 12, 'A', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(6, 'SP06', 'Nồi cơm điện PANASONIC 2097', 2000, 'Cái', 8, 'B', '2016-06-25 08:13:22', '2016-06-25 08:13:22'),
(7, 'SP07', 'Bàn chải đánh răng Colgate', 16, 'Cái', 100, 'A', '2016-06-25 08:13:22', '2016-06-25 08:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE IF NOT EXISTS `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_accounts`
--

INSERT INTO `social_accounts` (`user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, '1055752747806127', 'facebook', '2016-06-25 08:36:47', '2016-06-25 08:36:47'),
(2, '922706534542421', 'facebook', '2016-06-27 00:23:24', '2016-06-27 00:23:24'),
(3, '568624166641715', 'facebook', '2016-06-27 00:55:20', '2016-06-27 00:55:20'),
(4, '827480527384475', 'facebook', '2016-06-27 01:08:41', '2016-06-27 01:08:41'),
(5, '1340346919326197', 'facebook', '2016-06-27 02:09:26', '2016-06-27 02:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE IF NOT EXISTS `user_activations` (
  `user_id` int(10) unsigned NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `user_activations_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `activated`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Tài Hạnh', 'nguyentai.hanh@yahoo.com.vn', '', 0, 'dSlvwPPIiXfwGYgPT9gwKv35wH8RUgoeWbmYOElbWVrUvpCS4vxF1BRTU8oW', '2016-06-25 08:36:47', '2016-06-27 06:28:53'),
(2, 'Po Cong Anh', 'hoalybuon90@yahoo.com.vn', '', 0, 'EHrRlLf0SrtJicTgEQ6uLKLU5B4B3UpWJ2ucTtDKPmyL82d2mx2CicAQiuFH', '2016-06-27 00:23:24', '2016-06-27 00:32:16'),
(3, 'Quốc Tỉnh', 'phamquoctinh1995@gmail.com', '', 0, NULL, '2016-06-27 00:55:20', '2016-06-27 00:55:20'),
(4, 'Mạnh Lê', NULL, '', 0, NULL, '2016-06-27 01:08:41', '2016-06-27 01:08:41'),
(5, 'Thuy Pham', 'thuthuy_dieua1@yahoo.com', '', 0, NULL, '2016-06-27 02:09:26', '2016-06-27 02:09:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

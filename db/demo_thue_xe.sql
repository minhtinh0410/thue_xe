-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_thue_xe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_dichs`
--

CREATE TABLE `giao_dichs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `xe_bien_so` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_cmnd` int(11) NOT NULL,
  `ngay_nhan_xe` date NOT NULL,
  `ngay_tra_xe` date NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `tinh_trang` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giao_dichs`
--

INSERT INTO `giao_dichs` (`id`, `xe_bien_so`, `user_cmnd`, `ngay_nhan_xe`, `ngay_tra_xe`, `thanh_tien`, `tinh_trang`, `created_at`, `updated_at`) VALUES
(1, '92A-9999', 018035741, '2022-05-10', '2022-05-10', 18000000, 1, '2022-05-10 10:39:32', '2022-05-10 15:23:41'),
(2, '92A-123789', 018035741, '2022-05-10', '2022-05-10', 8000000, 1, '2022-05-10 10:40:03', '2022-05-10 15:20:43'),
(4, '92A-9999', 018035741, '2022-05-10', '2022-05-10', 6000000, 1, '2022-05-10 17:00:19', '2022-05-10 05:00:53'),
(5, '92A-9999', 018035741, '2022-05-10', '2022-05-10', 6000000, 1, '2022-05-10 04:09:11', '2022-05-10 05:00:53'),
(6, '43A-9999', 018035741, '2022-05-10', '2022-05-10', 6200000, 1, '2022-05-10 02:33:31', '2022-05-10 02:33:50'),
(7, '43A-9999', 018035741, '2022-05-10', '2022-05-10', 12400000, 1, '2022-05-10 03:38:56', '2022-05-10 03:39:07'),
(8, '75A-5656', 018035741, '2022-05-10', '2022-05-10', 12000000, 1, '2022-05-10 03:40:09', '2022-05-10 03:44:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_xes`
--

CREATE TABLE `loai_xes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_loai_xe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_xes`
--

INSERT INTO `loai_xes` (`id`, `ten_loai_xe`, `created_at`, `updated_at`) VALUES
(1, '4 chỗ', '2022-05-10 03:41:45', '2022-05-10 03:41:45'),
(2, '16 chỗ', '2022-05-10 03:41:45', '2022-05-10 03:41:45'),
(3, '24 chỗ', '2022-05-10 03:41:45', '2022-05-10 03:41:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2022-05-10_032206_create_quyens_table', 1),
(7, '2022-05-10_032207_create_users_table', 1),
(8, '2022-05-10_034123_create_loai_xes_table', 1),
(9, '2022-05-10_034251_create_xes_table', 1),
(10, '2022-05-10_035522_create_giao_diches_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyens`
--

CREATE TABLE `quyens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_quyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyens`
--

INSERT INTO `quyens` (`id`, `ten_quyen`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', '2022-05-10 01:43:06', '2022-05-10 01:43:06'),
(2, 'Khách hàng', '2022-05-10 01:43:06', '2022-05-10 01:43:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `ho_ten`, `cmnd`, `ngay_sinh`, `so_dien_thoai`, `dia_chi`, `quyen_id`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$pSIP6isJzC6U2cPbu8kI0eBoIsWmYFSaiCiSTSAQDvOYc67mjmIcW', 'Admin', 018035741, '2000-10-04', '090909888', 'Binh Thuan', 1, '2022-05-10 01:43:09', '2022-05-10 03:37:25'),
(4, 'khach1@gmail.com', '$2y$10$JZdcQtXNDpCFp/iR9GTK7OoldD2dDzq/K5seU7sJpZ55GmllgAFEi', 'Nguyễn Gia Huy', 012345678, '2000-06-12', '0935010102', 'TPHCM', 2, '2022-05-10 01:45:54', '2022-05-10 01:45:54'),
(5, 'khach2@gmail.com', '$2y$10$6iYbrnVNwR7xDXRxKchRHuUwOyF6Z.HkWIqSPGR3jZfgYCRTEMC0q', 'Đào Hữu Minh Tĩnh', 123456789, '2000-06-15', '0935010010', 'Ha Noi', 2, '2022-05-10 21:14:44', '2022-05-10 21:57:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xes`
--

CREATE TABLE `xes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_xe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bien_so` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_thue` int(11) NOT NULL,
  `loaixe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xes`
--

INSERT INTO `xes` (`id`, `ten_xe`, `bien_so`, `hinh`, `mo_ta`, `gia_thue`, `loaixe_id`, `created_at`, `updated_at`) VALUES
(4, 'Mazda 6', '92A-4949', 'ENxT02V2Zpr9AhV.jpg', NULL, 3500000, 1, '2022-05-10 06:37:15', '2022-05-10 06:37:15'),
(5, 'Hyundai Solati', '43D-1234', 'CAV43jZftuwmYa8.jpg', NULL, 4300000, 2, '2022-05-10 06:39:03', '2022-05-10 06:39:03'),
(6, 'Ford Transit', '75A-5656', '3bmAHbnVxaLXX33.jpg', NULL, 6000000, 2, '2022-05-10 06:40:46', '2022-05-10 06:40:46'),
(7, 'Thaco', '92A-123789', 'bYLrgU3tpJIicf9.jpg', NULL, 8000000, 3, '2022-05-10 06:43:10', '2022-05-10 06:43:10'),
(8, 'Hyundai County', '43D-45678', 'YbywOMuyAxRhwfN.jpg', 'Mô tả mới cập nhật', 2500000, 2, '2022-05-10 06:47:48', '2022-05-10 07:31:16'),
(10, 'Audi A5', '92A-9999', 'qOKmf9QPSPAqwcl.webp', 'Xe Audi A5 Vip lắm!', 6000000, 1, '2022-05-10 07:55:32', '2022-05-10 07:55:32'),
(12, 'Mercedes C200', '43A-9999', 'ltvUdAMGgWh9LLf.jpg', NULL, 6200000, 1, '2022-05-10 07:59:31', '2022-05-10 07:59:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giao_dichs`
--
ALTER TABLE `giao_dichs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giao_diches_xe_bien_so_foreign` (`xe_bien_so`),
  ADD KEY `giao_diches_user_cmnd_foreign` (`user_cmnd`);

--
-- Chỉ mục cho bảng `loai_xes`
--
ALTER TABLE `loai_xes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyens`
--
ALTER TABLE `quyens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_cmnd_unique` (`cmnd`),
  ADD KEY `users_quyen_id_foreign` (`quyen_id`);

--
-- Chỉ mục cho bảng `xes`
--
ALTER TABLE `xes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `xes_bien_so_unique` (`bien_so`),
  ADD KEY `xes_loaixe_id_foreign` (`loaixe_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giao_dichs`
--
ALTER TABLE `giao_dichs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loai_xes`
--
ALTER TABLE `loai_xes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `quyens`
--
ALTER TABLE `quyens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `xes`
--
ALTER TABLE `xes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giao_dichs`
--
ALTER TABLE `giao_dichs`
  ADD CONSTRAINT `giao_diches_user_cmnd_foreign` FOREIGN KEY (`user_cmnd`) REFERENCES `users` (`cmnd`) ON DELETE CASCADE,
  ADD CONSTRAINT `giao_diches_xe_bien_so_foreign` FOREIGN KEY (`xe_bien_so`) REFERENCES `xes` (`bien_so`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_quyen_id_foreign` FOREIGN KEY (`quyen_id`) REFERENCES `quyens` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `xes`
--
ALTER TABLE `xes`
  ADD CONSTRAINT `xes_loaixe_id_foreign` FOREIGN KEY (`loaixe_id`) REFERENCES `loai_xes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

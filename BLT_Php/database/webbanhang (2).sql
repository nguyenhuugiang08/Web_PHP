-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2022 lúc 04:28 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nam', '2022-05-23 13:33:59', '2022-05-23 13:33:59'),
(2, 'Nữ', '2022-05-23 13:33:59', '2022-05-23 13:33:59'),
(3, 'Sản phẩm khác', '2022-05-23 13:33:59', '2022-05-23 13:33:59'),
(5, 'Trẻ em', '2022-05-23 17:46:19', '2022-06-05 21:04:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `subject_name` varchar(350) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:44:59', '2022-06-02 23:44:59'),
(5, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:47:23', '2022-06-02 23:47:23'),
(6, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:48:34', '2022-06-02 23:48:34'),
(7, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:48:43', '2022-06-02 23:48:43'),
(8, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:48:44', '2022-06-02 23:48:44'),
(9, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:50:05', '2022-06-02 23:50:05'),
(10, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:57:01', '2022-06-02 23:57:01'),
(11, 'Nguyễn Hữu', 'Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Sản Phẩm tốt 5 sao', NULL, 0, '2022-06-02 23:57:16', '2022-06-02 23:57:16'),
(12, 'Nguyễn Hữu', 'Giang', 'nguyentam27011974@gmail.com', '0354417493', 'sản phẩm 10 điểm', NULL, 0, '2022-06-07 23:43:18', '2022-06-07 23:43:18'),
(13, 'nguyễn tiến ', 'đạt', 'nguyentam27011974@gmail.com', '0354417493', 'jdjdkasd', NULL, 0, '2022-06-18 21:12:10', '2022-06-18 21:12:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `total_money` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(48, 26, 'Nguyễn Hữu Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'đông hải quỳnh phụ thái bình', 'hàng cần đóng gói cẩn thận', '2022-06-21 16:21:43', 4, 900000),
(49, 26, 'Nguyễn Hữu Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'đông hải quỳnh phụ thái bình', 'hàng cần gói cẩn thận', '2022-06-21 17:24:35', 3, 3300000),
(50, 26, 'Nguyễn Tiến Đạt', 'dat@gmail.com', '0982422322', 'đông hải quỳnh phụ thái bình', '', '2022-06-21 17:28:40', 3, 750000),
(51, 23, 'Hoàng Đình Nam', 'hoangdn@gmail.com', '0934247592', 'đông hải quỳnh phụ thái bình', 'Hàng cần gói cẩn thận', '2022-06-21 17:36:26', 3, 770000),
(52, 23, 'Hoàng Đình Nam', 'hoangdn@gmail.com', '0934247592', 'đông hải quỳnh phụ thái bình', '', '2022-06-21 17:38:38', 2, 600000),
(53, 26, 'Nguyễn Hữu Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'hau loc thanh hoa', '', '2022-06-21 19:54:19', 3, 900000),
(54, 26, 'Nguyễn Hữu Giang', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'xóm 4, đồng kỷ ,đông hải, quỳnh phụ ,thái bình', '', '2022-06-22 00:28:29', 3, 800000),
(55, 26, 'Nguyễn Hữu Giang', 'nguyenvandung@gmail.com', '0354417493', 'đông hải quỳnh phụ thái bình', '', '2022-06-22 17:07:15', 4, 9400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total`) VALUES
(44, 48, 21, 950000, 1, 900000),
(45, 49, 21, 950000, 1, 900000),
(46, 49, 22, 1400000, 2, 2400000),
(47, 50, 45, 900000, 1, 750000),
(48, 51, 25, 770000, 1, 650000),
(49, 52, 24, 600000, 1, 400000),
(50, 53, 21, 950000, 1, 900000),
(51, 54, 28, 1000000, 1, 800000),
(52, 55, 26, 700000, 2, 1200000),
(53, 55, 43, 1400000, 2, 2400000),
(54, 55, 44, 1600000, 4, 5800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  `quantility` int(11) NOT NULL DEFAULT 10000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`, `quantility`) VALUES
(21, 3, 'Converse Star Chevron Jogger', 950000, 900000, 'jogger.jpg', 'qqq', '2022-06-01 11:17:31', '2022-06-01 11:17:31', 0, 9999),
(22, 3, 'Converse “Metal CONS” Pull Over Hoodie', 1400000, 1200000, 'T-shirt-2.jpg', 'áo hoodie', '2022-06-01 11:20:50', '2022-06-01 11:20:50', 0, 9998),
(23, 3, 'Converse X Suicidal Tendencies Long Sleeve Tee', 700000, 500000, 'T-shirt-1.jpg', 'áo', '2022-06-01 11:21:29', '2022-06-01 11:21:29', 0, 10000),
(24, 3, 'Converse Collegiate Text SS Tee', 600000, 400000, 'T-shirt.jpg', 'áo ngắn', '2022-06-01 11:21:56', '2022-06-01 11:21:56', 0, 9999),
(25, 3, 'Poly Chuck Plus 1.0', 770000, 650000, 'balo-4.jpg', 'balo ', '2022-06-02 09:14:00', '2022-06-02 09:14:00', 0, 9999),
(26, 3, 'Speed 2 Backpack', 700000, 600000, 'balo-3.jpg', 'Túi', '2022-06-02 09:14:37', '2022-06-02 09:14:37', 0, 9998),
(27, 3, 'Lil Duffel', 700000, 600000, 'balo-2.jpg', 'túi converse', '2022-06-02 09:15:13', '2022-06-02 09:15:13', 0, 10000),
(28, 3, 'Sport Duffel', 1000000, 800000, 'balo-1.jpg', 'Túi converse', '2022-06-02 09:17:18', '2022-06-02 09:17:18', 0, 9999),
(30, 2, 'Chuck 70 Psy-Kicks Ox', 1800000, 1600000, 'women-psy-2-1-300x225.jpg', 'Chuck 70 Psy-Kicks Ox', '2022-06-03 12:07:44', '2022-06-03 12:07:44', 0, 10000),
(31, 2, 'Chuck 70 Psy-Kicks Ox', 2800000, 2750000, 'women-psy-1-1-300x225.jpg', 'Chuck 70 Psy-Kicks Ox', '2022-06-03 12:08:22', '2022-06-03 12:08:22', 0, 10000),
(32, 2, 'Chuck Taylor All Star 70 Full Gator Hi', 2100000, 2000000, 'women-chuck-07-1-300x225.jpg', 'Chuck Taylor All Star 70 Full Gator Hi', '2022-06-03 12:08:59', '2022-06-03 12:08:59', 0, 10000),
(33, 2, 'Chuck Taylor All Star 70 Pastel Leather', 1900000, 1800000, 'women-chuck-07-3-300x225.jpg', 'Chuck Taylor All Star 70 Pastel Leather', '2022-06-03 12:09:28', '2022-06-03 12:09:28', 0, 10000),
(34, 2, 'Chuck Taylor All Star 70 Poplin Shirt', 1120000, 1000000, 'women-chuck-07-2-1-300x225.jpg', 'Chuck Taylor All Star 70 Poplin Shirt', '2022-06-03 12:10:04', '2022-06-03 12:10:04', 0, 10000),
(35, 2, 'Chuck Taylor Classic', 1250000, 1200000, 'women-classic-8-1-300x225.jpg', 'Chuck Taylor Classic', '2022-06-03 12:10:34', '2022-06-03 12:10:34', 0, 10000),
(36, 2, 'Chuck Taylor Classic', 1250000, 1100000, 'women-classic-7-1-300x225.jpg', 'Chuck Taylor Classic', '2022-06-03 12:11:07', '2022-06-03 12:11:07', 0, 10000),
(37, 2, 'Chuck 70 Archive Prints Hi', 1800000, 1650000, 'women-chuck-07-300x225.jpg', 'Chuck 70 Archive Prints Hi', '2022-06-03 18:32:12', '2022-06-03 18:32:12', 0, 10000),
(38, 2, 'Chuck Taylor Classic', 1250000, 1100000, 'women-classic-6-1-300x225.jpg', 'Chuck Taylor Classic', '2022-06-03 18:33:48', '2022-06-03 18:33:48', 0, 10000),
(39, 2, 'Chuck Taylor Classic', 1250000, 1200000, 'women-classic-5-1-300x225.jpg', 'Chuck Taylor Classic', '2022-06-03 18:34:19', '2022-06-03 18:34:19', 0, 10000),
(40, 2, 'Chuck Taylor Classic', 1250000, 1000000, 'women-classic-4-1-300x225.jpg', 'Chuck Taylor Classic', '2022-06-03 18:34:52', '2022-06-03 18:34:52', 0, 10000),
(41, 2, 'Chuck Taylor Classic', 1250000, 1200000, 'women-classic-3-1-300x225.jpg', 'Chuck Taylor Classic', '2022-06-03 18:35:31', '2022-06-03 18:35:31', 0, 10000),
(42, 2, 'One Star Sunbaked', 1250000, 1200000, 'women-sunbaked-4-300x225.jpg', 'One Star Sunbaked', '2022-06-03 18:35:31', '2022-06-03 18:35:31', 0, 10000),
(43, 1, 'Giày Converse Chuck Taylor All Star Stargazer', 1400000, 1200000, '565200c-5.webp', 'Mẫu Chuck Taylor All Star Stargazer là một trong những mẫu sneakers mới nhất vừa ra mắt của nhà Converse. Chuck Taylor All Star Stargazer có phần trên giày có chất liệu hoàn toàn là vải dệt. Phần lót giày được làm bằng vải cũng cung cấp cho người sử dụng một sự thoải mái tuyệt vời. Chuck Taylor All Star Stargazer còn có khối đế làm từ cao su cho độ bền bỉ và độ bám dính tốt với các bề mặt. Chuck Taylor All Star Stargazer là một item hoàn hảo để hoàn thiện outfit casual hàng ngày cho bạn.Sản phẩm Chuck Taylor All Star Stargaze ra mắt bao gồm cả mẫu thấp cổ và cao cổ cùng nhiều phối màu khác nhau cho khách hàng dễ dàng chọn lựa tuỳ theo phong cách và sở thích riêng của mình. \r\n\r\n', '2022-06-04 09:11:51', '2022-06-04 09:11:51', 0, 9998),
(44, 1, 'Giày Converse Chuck Taylor All Star Archival Camo', 1600000, 1450000, '166714c-1.webp', 'Có thể nói rằng những năm gần đây việc đưa các họa tiết camo vào trong các thiết kế thời trang càng ngày phổ biến & được hầu hết các hãng thời trang danh tiếng sử dụng. Không nằm ngoài xu hướng đó Converse đã sử dụng các họa tiết rằn ri vào các thiết kế của mình vừa phóng khoáng, phá cách và có phần bụi bặm nhưng vẫn giữ được những bản sắc đặc trưng làm nên tên tuổi của thương hiệu Converse Chuck Taylor, Giày Converse Chuck Taylor All Star Archival Camo là một ví dụ điển hình', '2022-06-04 09:14:00', '2022-06-04 09:14:00', 0, 9996),
(45, 5, 'Giày Converse Chuck Taylor Lo-fi Craft Ox', 900000, 750000, 'a00479c-4.webp', 'Thương hiệu Converse Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam ...', '2022-06-16 09:11:38', '2022-06-16 09:11:38', 0, 9999);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT 2,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `phone_number`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Nguyễn Hữu Giang', 'NguyenHuuGiang17', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', '08012001gG@', 1, '2022-05-23 13:03:51', '2022-05-23 13:03:51', 0),
(23, 'Hoang Dinh Nam', '2021F694093', 'hoangdn@gmail.com', '098757444', 'Huyduc12@', 2, '2022-05-23 17:56:35', '2022-06-05 20:56:55', 0),
(24, 'Nguyễn văn dũng', '2021F809230', 'nguyentam27011974@gmail.com', '0354417493', 'Huyduc12@', 2, '2022-06-05 20:51:25', '2022-06-05 20:51:25', 0),
(25, 'Nguyễn Hữu Giang', 'teamcaothu123aa', 'nguyenhuugiangtb08012001@gmail.com', '0354417493', 'Huyduc12@', 2, '2022-06-07 23:44:33', '2022-06-07 23:44:33', 0),
(26, 'Nguyễn Tiến Đạt', 'NguyenTienDat', 'dat@gmail.com', '0354417493', 'Huyduc12@', 2, '2022-06-16 00:03:15', '2022-06-16 00:03:15', 0),
(27, 'hoang dinh nam', 'ghgadsew', 'hoangdinhnam@gmail.com', '0354417444', 'Huyduc12@', 2, '2022-06-18 21:20:00', '2022-06-18 21:20:00', 1),
(28, 'Nguyễn Hữu Giang', 'giangdeptrai69a', 'hoangdn1@gmail.com', '035441711', 'Huyduc12@', 2, '2022-06-22 18:27:00', '2022-06-22 18:27:00', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

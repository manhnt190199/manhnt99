-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2020 lúc 11:34 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvc_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(44, 'Iphone', '1594358027-iphone_xr_64gb.jpg', 'Iphone ', 0, '2020-07-10 05:13:47', '2020-07-10 12:19:09'),
(48, 'Samsung', '1594360342-xanh_78l4-a2_1_2_1.jpg', 'Samsung', 1, '2020-07-10 05:52:22', '2020-07-10 12:52:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text DEFAULT NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_id` int(11) DEFAULT NULL COMMENT 'Id của product tương ứng, là khóa ngoại liên kết với bảng products',
  `quality` int(11) DEFAULT NULL COMMENT 'Số sản phẩm đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `avatar`, `price`, `summary`, `content`, `status`, `created_at`, `updated_at`) VALUES
(33, 44, 'Iphone 11 ProMax', '1594358313-product-iphone-11-pro-max-space-select-2019.jpg', 25000000, 'iPhone 11 Pro Max – Bộ ba camera sau chụp ảnh đỉnh cao', 'Ra mắt cùng với iPhone 11 và 11 Pro là iPhone 11 Pro Max, đây mẫu smartphone cao cấp nhất của iPhone 11 Series được ra mắt năm 2019. Với thiết kế cao cấp, hệ thống camera 3 camera cùng cấu hình siêu mạnh mẽ thì đây chính là một chiếc smartphone đáp ứng mọi trải nghiệm của người dùng.', 1, '2020-07-10 05:18:33', NULL),
(34, 44, 'Iphone Xr', '1594358390-product-iphone_xr_64gb.jpg', 24500000, 'iPhone XR 64GB - Smartphone sang trọng, trẻ trung với nhiều màu sắc', 'Được ra mắt cùng Apple iPhone XS và XS Max, iPhone XR 64GB không chỉ được thừa kế những tính năng đặc trưng nổi trội của người tiền nhiệm iPhone X được ra mắt một năm trước đó và còn có những cải tiến nhằm mang lại trải nghiệm mới lạ và thú vị cho người dùng.', 1, '2020-07-10 05:19:50', NULL),
(35, 44, 'Iphone 11 Purple', '1594358450-product-iphone11-purple-select-2019.jpg', 19000000, 'iPhone 11 Purple 64GB - Smartphone sang trọng, trẻ trung với nhiều màu sắc', 'Được ra mắt cùng Apple iPhone XS và XS Max, iPhone XR 64GB không chỉ được thừa kế những tính năng đặc trưng nổi trội của người tiền nhiệm iPhone X được ra mắt một năm trước đó và còn có những cải tiến nhằm mang lại trải nghiệm mới lạ và thú vị cho người dùng.', 1, '2020-07-10 05:20:50', NULL),
(38, 44, 'Iphone 8 Plus', '1594358693-product-iphone8-plus-silver-select-2018.jpg', 15900000, 'iPhone 8 Plus 64GB', 'Trong thời buổi hiện đại ngày nay, smartphone là một trong những thiết bị di động không thể thiếu đối với bất kì người dùng nào. Nổi bật và thịnh hành trong các thương hiệu trên thị trường hiện nay không thể nào không kể đến hãng Apple. Các sản phẩm đến từ Apple đều mang lại chất lượng hoàn hảo. Như thường lệ, iPhone 8 Plus 64GB ra đời với thiết kế cùng tính năng tuyệt vời sẽ mang đến cho người dùng những trải nghiệm thú vị nhất.', 1, '2020-07-10 05:24:53', NULL),
(39, 44, 'Iphone X', '1594358729-product-iphone_x_64gb.jpg', 25100000, 'iPhone X 64GB', 'Sản phẩm kỷ niệm 10 năm ra mắt của Apple nên iPhone X 64GB có sự thay đổi so với bộ đôi iPhone 8, 8 Plus trước đó từ tính năng đến thiết kế khiến nhiều người dùng smartphone khao khát. Ngoài ra, bạn có thể tham khảo phiên bản dung lượng bộ nhớ trong cao hơn là iPhone X 256GB', 1, '2020-07-10 05:25:29', NULL),
(40, 44, 'Iphone Xs', '1594359061-product-iphone_xs_64gb.jpg', 26050000, 'iPhone XS 64GB - Mẫu điện thoại đầu bảng mang lại trải nghiệm tuyệt vời', 'iPhone XS 64GB chính hãng VN/A là bản nâng cấp từ iPhone X, mang trong mình sức mạnh phần cứng vượt trội được tối ưu hóa bởi hệ điều hành iOS nhằm đem lại trải nghiệm mượt mà và tuyệt vời nhất cho người dùng.', 1, '2020-07-10 05:31:01', NULL),
(41, 44, 'Iphone Xr ', '1594359129-product-iphone_xr_128gb.jpg', 26000000, 'iPhone XR 128GB - Smartphone thiết kế tinh tế, nhiều màu sắc\r\n', 'Bạn đang cần một chiếc iPhone thế hệ mới, với những tính năng mới nhất, thiết kế tinh tế, cấu hình mạnh nhất, nhưng với một mức giá tốt hơn rất nhiều? Hãy để tâm đến iPhone XR 128GB. Đây là một thiết bị iPhone không thể bỏ qua với những nhu cầu thiết yếu trên.\r\n\r\n', 1, '2020-07-10 05:32:09', NULL),
(42, 48, 'Samsung A72', '1594360384-product-xanh_78l4-a2_1_2_1.jpg', 1000000, 'Samsung A71 – Smartphone tầm trung của Samsung', 'Samsung Galaxy A71 sẽ là điện thoại giá cả phải chăng của Samsung với mục đích tiếp cận đối tượng rộng hơn. Samsung A71 là sản phẩm thuộc series Samsung Galaxy A với màn hình đục lỗ, cấu hình mạnh mẽ, cụm bốn camera sau chất lượng cao và cùng nhiều công nghệ thời thượng.\r\n\r\nSau Galaxy A51 và A71, rất có thể Galaxy A01 sẽ là sản phẩm tiếp theo thuộc dòng Galaxy A 2020 được Samsung trình làng trong thời gian sắp tới.', 1, '2020-07-10 05:53:04', NULL),
(43, 48, 'Samsung Galaxy Note 10 Red', '1594360429-product-637148757998466143_ss-note-10-do-1.jpg', 26000000, 'Samsung Galaxy Note 10 – Trải nghiệm máy tính trong chính smartphone của bạn', 'Với hàng loạt những siêu phẩm từng tung ra thị trường, điện thoại Samsung lại một lần nữa làm cộng đồng người yêu công nghệ phải đứng ngồi không yên khi trình làng bộ đôi Samsung Galaxy Note 10 và Samsung Galaxy Note 10 Plus mang đến những trải nghiệm tuyệt đỉnh như máy tính ngay từ chính chiếc smartphone của bạn, giúp bạn có thể làm mọi thứ chỉ bằng một chiếc điện thoại. Ngoài ra, bạn cũng có thể tham khảo phiên bản rút gọn với giá bán phải chăng hơn là Samsung Note 10 Lite.', 1, '2020-07-10 05:53:49', '2020-07-10 14:00:28'),
(44, 48, 'Samsung Galaxy S20 Plus', '1594360471-product-637170945536714482_ss-s20-plus-den-1.jpg', 23000000, 'Samsung S20 Plus - Flagship màn hình lớn, cấu hình cao', 'Galaxy S20 Plus được biết là phiên bản có cấu hình mạnh hơn của Samsung S20 và Samsung S20 Ultra. Samsung S20 Plus có kính thước màn hình lớn hơn và cấu hình khá tương đồng với người anh em Galaxy S20.', 1, '2020-07-10 05:54:31', NULL),
(45, 48, 'Samsung Galaxy Note 10 Lite', '1594360515-product-note_10_plus_xanh.jpg', 19000000, 'Samsung Note 10 Plus – Màn hình lớn cho trải nghiệm tuyệt đỉnh, S-Pen tiện dụng', 'Là phiên bản nâng cấp đáng giá ra đời cùng thời điểm với Samsung Galaxy Note 10, Samsung Galaxy Note 10 Plus là sự lựa chọn tuyệt vời cho người dùng đam mê công nghệ có nhu cầu sở hữu một chiếc điện thoại hoàn hảo về mọi mặt. Với Note 10 Plus, Samsung đã thật sự mang đến một chiếc điện thoại có sức mạnh vượt trội, đáp ứng toàn diện các nhu cầu về làm việc và giải trí của người dùng. Ngoài ra, bạn có thể tham khảo phiên bản rút gọn Note 10 Lite với giá bán phải chăng hơn.', 1, '2020-07-10 05:55:15', NULL),
(46, 44, 'Samsung Galaxy Note 10 Lite', '1594360560-product-2026427.jpg', 21000000, 'Samsung Note 10 Lite - Phiên bản nhỏ gọn, đa năng của siêu phẩm Note 10\r\n', 'Galaxy Note 10 Lite (ra mắt cùng với Galaxy S10 Lite) là phiên bản nhỏ gọn hơn, giá rẻ hơn bộ đôi siêu phẩm Note 10 / Note 10+ nhưng vẫn giữ nguyên những tinh hoa của người tiền nhiệm. Smartphone dự kiến sẽ được Samsung ra mắt vào đầu năm sau, hứa hẹn sẽ mang đến những trải nghiệm tuyệt vời cho người dùng với mức giá dễ tiếp cận hơn.\r\n\r\n', 1, '2020-07-10 05:56:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL COMMENT 'Id của tin tức sẽ hiển thị trong slide, là khóa ngoại liên kết với bảng news',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh slide',
  `position` tinyint(3) DEFAULT NULL COMMENT 'Vị trí hiển thị của slide, ví dụ: = 0 hiển thị đầu tiên...',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `first_name` varchar(255) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'Last name',
  `phone` int(11) DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(255) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `updated_at`) VALUES
(1, 'edumall', '398e060a763f10c5d46a41ae5dad4005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-06-28 11:22:57', NULL),
(2, 'manh', '6ba872367bccbb3efb2c8f992f8eacff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-06-28 12:00:24', NULL),
(3, 'manh1', '6ba872367bccbb3efb2c8f992f8eacff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-06-28 12:07:08', NULL),
(4, 'manhnt99', '6ba872367bccbb3efb2c8f992f8eacff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-07-05 03:36:31', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

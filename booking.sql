-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2019 lúc 09:04 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `booking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `path_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `path_img`) VALUES
(1, 'Căn hộ', 'canho.jpg'),
(2, 'Biệt thự', 'bietthu.jpg'),
(3, 'Nhà riêng', 'nharieng.jpg'),
(4, 'Studio', 'studio.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `file`, `room_id`, `user_id`) VALUES
(13, 'oke', '', 42, 1),
(14, 'phòng oke!', 'huyphong(khachhang).jpg', 42, 1),
(15, '123', '', 42, 1),
(16, '456', 'op-lung-honor-4a-nhua-deo-day-x-mobile-3-190x190.jpg', 42, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datebooking`
--

CREATE TABLE `datebooking` (
  `date_booking_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `datebooking`
--

INSERT INTO `datebooking` (`date_booking_id`, `date_start`, `date_end`, `room_id`) VALUES
(39, '2019-12-17', '2019-12-20', 41),
(40, '2019-12-25', '2019-12-30', 42);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_booking`
--

CREATE TABLE `detail_booking` (
  `detail_booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `number_date_booking` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_booking`
--

INSERT INTO `detail_booking` (`detail_booking_id`, `room_id`, `user_id`, `payment_id`, `date_start`, `date_end`, `number_date_booking`, `price`) VALUES
(39, 42, 1, 1, '2019-12-02', '2019-12-05', 4, 7560000),
(40, 42, 1, 1, '2019-12-10', '2019-12-15', 6, 11340000),
(43, 42, 1, 1, '2019-12-25', '2019-12-30', 6, 11340000),
(45, 32, 3, 4, '2019-12-20', '2019-12-23', 0, 0),
(46, 41, 1, 3, '2019-12-17', '2019-12-20', 4, 1160000),
(47, 42, 1, 1, '2020-01-05', '2020-01-10', 6, 11340000),
(48, 32, 1, 1, '2020-01-02', '2020-01-05', 4, 76000000),
(50, 42, 1, 3, '2020-01-12', '2020-01-14', 3, 5670000),
(51, 41, 4, 1, '2019-12-26', '2019-12-30', 5, 1450000),
(52, 38, 4, 1, '2019-12-25', '2019-12-27', 3, 1050000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_room`
--

CREATE TABLE `img_room` (
  `img_id` int(11) NOT NULL,
  `path_img` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `img_room`
--

INSERT INTO `img_room` (`img_id`, `path_img`, `room_id`) VALUES
(77, 'room_37069_2_1574059026.jpg', 32),
(78, 'room_37069_3_1574059027.jpg', 32),
(79, 'room_37069_4_1574059029.jpg', 32),
(80, 'room_37069_5_1574059031.jpg', 32),
(81, 'room_37069_6_1574059032.jpg', 32),
(89, '1539070634_32708075_671211109877237_8664674822611009536_n - Copy.jpg', 37),
(90, 'room_17894_16_1564777697.jpg', 37),
(92, 'IMG_0253.jpg', 38),
(93, 'IMG_0283.jpg', 38),
(94, 'room_20664_20_1559740573.jpg', 38),
(96, 'room_20664_22_1559740582.jpg', 38),
(102, 'room_22304_23_1553002782.jpg', 40),
(103, 'room_22304_26_1553002791.jpg', 40),
(104, 'room_22304_28_1553002795.jpg', 40),
(105, 'room_22304_29_1553002797.jpg', 40),
(106, 'room_22304_30_1553002799.jpg', 40),
(107, 'room_33463_1_1571081584.jpg', 41),
(108, 'room_33463_2_1571081586.jpg', 41),
(109, 'room_33463_3_1571081588.jpg', 41),
(110, 'room_33463_4_1571081767.jpg', 41),
(111, 'room_33463_5_1571081769.jpg', 41),
(112, 'IMG_1575026624225_1575029617080.jpg', 42),
(113, 'IMG_1575026625935_1575029616314.jpg', 42),
(114, 'IMG_1575026643210_1575029625376.jpg', 42),
(115, 'IMG_1575026661640_1575029619186.jpg', 42),
(116, 'IMG_1575026662254_1575029618632.jpg', 42);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `location`
--

INSERT INTO `location` (`location_id`, `city`, `district`, `street`) VALUES
(28, 'Đà lạt', 'Phường 3', 'Bá Thăng Tú'),
(29, 'Đà lạt', 'Phường 8', 'Trần Nhân Tông'),
(30, 'Đà lạt', 'Phường 8', 'Trần Nhân Tông'),
(31, 'Hà Nội', 'Hai Bà Trưng', 'Phố Minh Khai'),
(32, 'Đà lạt', 'Phường 3', 'Đường Bá Thăng Tú'),
(33, 'Đà Lạt', 'Phường 3', 'Bá Thăng Tú'),
(34, 'Đà Lạt', 'Phường 8', 'Hà Huy Tập'),
(35, 'Hồ Chí Minh', 'Bình Thạnh', 'Nguyễn Hữu Cảnh'),
(36, 'Đà Nẵng', 'Sơn Trà', 'Ngô Quyền'),
(37, '1', 'sa', '3'),
(38, 'Hà Nội', 'asad', 'Phố Minh Khai'),
(39, 'Đà Nẵng', 'fdsf', 'Ngô Quyền'),
(40, 'Đà Lạt', 'Phường 2', 'Ngô Gia Tự'),
(41, 'Đà Lạt', 'Phường 3', 'Nguyễn Thái Học'),
(42, 'Đà Lạt', 'Phường 9', 'Ngô Quyền'),
(43, 'Đà Lạt', 'Phường 6', 'Hà Huy Tập'),
(44, 'Hà Nội', 'Cầu Giấy', 'Phố Minh Khai'),
(45, 'Hà Nội', 'Mỹ Đình', 'Tô Hiến Thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_name`) VALUES
(1, 'Thanh toán bằng thẻ quốc tế Visa,Master,JBC'),
(2, 'OnePay Visa,Master,JBC'),
(3, 'Thẻ ATM nội địa / Internet Banking'),
(4, 'Chuyển khoản ngân hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_price` double NOT NULL,
  `room_desc` text NOT NULL,
  `number_people` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_price`, `room_desc`, `number_people`, `status`, `category_id`, `location_id`, `user_id`) VALUES
(32, 'LUXURY 1BR Landmark81', 19000000, 'Sweethost Luxury 1BR nằm tại tầng 9 của tòa nhà cao nhất Việt Nam - Landmark 81, với diện tích 50m2 bao gồm 1 phòng khách, 1 phòng ngủ với ban công thoáng mát, 1 phòng tắm. Căn hộ được trang trí nội thất hiện đại, trang nhã với view hồ bơi. Tại đây, bạn sẽ được trải nghiệm cuộc sống thượng lưu, đẳng cấp, với đầy đủ trang thiết bị tiện nghi và hiện đại cho kì nghỉ hay chuyến công tác tại Sài Gòn.', 6, 0, 1, 35, 1),
(37, 'Hồ Hoàng House', 229000, '- Nằm ở trung tâm thành phố Đà Lạt\r\n\r\n- Single Room - Hồ Hoàng House cung cấp Wi-Fi miễn phí cũng như dịch vụ nhận phòng/trả phòng cấp tốc\r\n\r\n- Được xây dựng vào năm 2018\r\n\r\n- Cách Núi Lang Biang 6,8 km\r\n\r\n- Trung tâm Thành phố Đà Lạt chỉ 2,5 km\r\n\r\n- Cách Hồ Xuân Hương 2,7 km', 2, 0, 1, 40, 1),
(38, 'Harmony Villa ', 350000, 'Biệt thự Harmony nằm trên một ngọn đồi nhỏ bên gần bến xe Phương Trang. Thật thú vị khi mỗi sáng ta thức giấc trong tiếng chim hót, và ngắm những chú sóc nhỏ tung tăng đùa giỡn trong khu vườn hồng dưới thung lũng với tiêu chí dịch vụ: Sạch sẽ, yên tĩnh và thân thiện. Đặc biệt, có không gian uống cà phê, ăn sáng, chụp hình view đẹp, tổ chức nướng barbecue ngoài trời.Có bãi đậu xe máy, xe hơi an toàn. Và dịch vụ thuê xe hơi, xe máy, tour…', 2, 0, 3, 41, 1),
(40, 'Bébys Homestay', 1200000, 'Đến với Bébys sẽ mang đến cho bạn cảm giác ấm cúng như tại ngôi nhà của bạn vậy. Có diện tích 120m2. Gồm 1 phòng khách, 3 phòng ngủ (hai phòng có một giường đôi và một phòng có hai giường đôi) và 2 hai phòng tắm. Được chúng tôi trang bị đầy đủ các thiết bị tiện nghi, hiện đại.', 8, 0, 2, 43, 1),
(41, 'San\'s Home', 290000, 'Một căn phòng tràn ngập ánh nắng, cây và sách. Vô cùng thoáng đãng và thoải mái. Bạn có thể ngắm hoàng hôn tím lịm phía chân trời, giữa những tòa nhà, nghe tiếng rao văng vẳng của những người bán dạo. Đúng chất Hà Nội. San\'s Homestay nằm trong một khu chung cư cũ nhưng căn hộ được tự tay San chăm bẵm, trang trí. Bạn có thể tìm thấy nhiều điều thú vị xung quanh khu nhà và hàng xóm là những người già tốt bụng.', 2, 0, 1, 44, 1),
(42, 'Vinhomes Metropolis', 1890000, 'Căn hộ trong dự ăn Vimhomes Metropolis cao cấp nhất Hà Nội. Căn hộ có diện tích 80m2 gồm 2 phòng ngủ, 2 phòng tắm, phòng khách rộng, bếp với đầy đủ trang thiết bị. Căn hộ được trang bị tiện ích như khách sạn 5 sao, với lễ tân, bảo vệ 24/24h.', 4, 0, 1, 45, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `email`, `address`, `user_key`) VALUES
(1, 'dangkhoa', '123', 'Trần Đăng Khoa', 'dangkhoa122@gmail.com', '254 Nguyễn Thái Học', 1),
(2, 'kimcuong', '123', 'Lê Kim Cường', 'kimcuong730@gmail.com', 'Phu Yen', 1),
(3, '3951050161', 'f', 'aaaaaaaa', 'sadad@gmail.com', 'sdfsf', 0),
(4, 'vu123', '123', 'Vu', 'dkhoa2213@gmail.com', 'Nguyễn Hữu Cảnh', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `datebooking`
--
ALTER TABLE `datebooking`
  ADD PRIMARY KEY (`date_booking_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Chỉ mục cho bảng `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD PRIMARY KEY (`detail_booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Chỉ mục cho bảng `img_room`
--
ALTER TABLE `img_room`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Chỉ mục cho bảng `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `datebooking`
--
ALTER TABLE `datebooking`
  MODIFY `date_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `detail_booking`
--
ALTER TABLE `detail_booking`
  MODIFY `detail_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `img_room`
--
ALTER TABLE `img_room`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Các ràng buộc cho bảng `datebooking`
--
ALTER TABLE `datebooking`
  ADD CONSTRAINT `datebooking_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Các ràng buộc cho bảng `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD CONSTRAINT `detail_booking_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `detail_booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `detail_booking_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Các ràng buộc cho bảng `img_room`
--
ALTER TABLE `img_room`
  ADD CONSTRAINT `img_room_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `room_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

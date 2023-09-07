-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2022 lúc 02:56 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `reservation`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `annouce_name` varchar(100) NOT NULL,
  `annouce_place` varchar(100) NOT NULL,
  `annouce_date` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Bữa Tối'),
(7, 'Bữa Trưa'),
(8, 'Bữa Sáng'),
(9, 'Đồ Uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `combo`
--

CREATE TABLE `combo` (
  `combo_id` int(11) NOT NULL,
  `combo_name` varchar(100) NOT NULL,
  `combo_price` decimal(10,3) NOT NULL,
  `combo_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `combo`
--

INSERT INTO `combo` (`combo_id`, `combo_name`, `combo_price`, `combo_image`) VALUES
(1, 'Combo 81K', '81.000', NULL),
(2, 'Combo 2A', '129.000', NULL),
(3, 'Combo 2B', '175.000', NULL),
(4, 'Combo 2C', '185.000', NULL),
(5, 'Combo 3A', '279.000', NULL),
(6, 'Combo 3B', '289.000', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `combo_details`
--

CREATE TABLE `combo_details` (
  `combo_details_id` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `combo_details`
--

INSERT INTO `combo_details` (`combo_details_id`, `combo_id`, `menu_id`) VALUES
(1, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 2),
(6, 3, 4),
(7, 1, 1),
(8, 1, 5),
(9, 2, 2),
(10, 2, 5),
(12, 3, 3),
(13, 3, 5),
(14, 3, 6),
(15, 4, 1),
(16, 4, 2),
(17, 4, 3),
(18, 4, 4),
(19, 4, 5),
(20, 5, 2),
(21, 5, 3),
(22, 5, 4),
(23, 5, 5),
(24, 5, 6),
(25, 6, 1),
(26, 6, 2),
(27, 6, 3),
(28, 6, 4),
(29, 6, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_what` varchar(500) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_where` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `event`
--

INSERT INTO `event` (`event_id`, `event_what`, `event_date`, `event_time`, `event_where`) VALUES
(1, 'Company Christmas Party', '2017-12-15', '10:39:00', 'Gym');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_last` varchar(15) NOT NULL,
  `member_first` varchar(15) NOT NULL,
  `member_status` varchar(10) NOT NULL,
  `member_contact` varchar(30) NOT NULL,
  `member_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`member_id`, `member_last`, `member_first`, `member_status`, `member_contact`, `member_address`) VALUES
(1, 'Lương Kim', 'Thiện', 'active', '284804941', 'Phố Viên'),
(2, 'Lê Mậu', 'Toàn', 'active', '735599458', 'Cổ Nhuế'),
(3, 'Vũ Ngọc', 'Đại', 'active', '531348416', 'Đức Thắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `cat_id` int(30) NOT NULL,
  `subcat_name` varchar(30) NOT NULL,
  `menu_desc` varchar(100) NOT NULL,
  `menu_price` decimal(10,3) NOT NULL,
  `menu_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `cat_id`, `subcat_name`, `menu_desc`, `menu_price`, `menu_pic`) VALUES
(1, 'Hamburger', 0, '', 'Hamburger', '0.000', ''),
(2, 'Đùi Gà', 0, '', 'Đùi Gà', '0.000', ''),
(3, 'Cánh Gà', 0, '', 'Cánh Gà', '0.000', ''),
(4, 'Khoai Tây Chiên', 0, '', 'Khoai Tây Chiên', '0.000', ''),
(5, 'Coca Cola', 0, '', 'Coca Cola', '0.000', ''),
(6, 'Ức Gà', 0, '', 'Ức Gà', '0.000', ''),
(10, 'Phở', 6, 'Bữa Sáng', 'Phở', '50.000', 'pho.jpg'),
(11, 'Bún bò Huế', 6, 'Bữa Sáng', 'Bún bò Huế', '40.000', 'bunbohue.jpg'),
(13, 'Bún chả', 6, 'Bữa Sáng', 'Bún chả', '30.000', 'buncha.png'),
(14, 'Bánh mì', 6, 'Bữa Sáng', 'Bánh mì', '15.000', 'banhmi.jpg'),
(15, 'Bánh xèo', 7, 'Bữa Trưa', 'Bánh xèo', '25.000', 'banhxeo.jpg'),
(16, 'Bún cá chấm', 7, 'Bữa Trưa', 'Bún cá chấm', '35.000', 'buncacham.jpg'),
(17, 'Cơm tấm', 7, 'Bữa Trưa', 'Cơm tấm', '45.000', 'comtam.jpg'),
(18, 'Cơm rang dưa bò', 7, 'Bữa Trưa', 'Cơm rang dưa bò', '30.000', 'comrangduabo.jpg'),
(19, 'Tôm Hùm', 8, 'Bữa Tối', 'Tôm Hùm', '100.000', 'tomhum.jpg'),
(20, 'Cua Hoàng đế', 8, 'Bữa Tối', 'Cua Hoàng đế', '90.000', 'cuahoangde.jpg'),
(21, 'Vi cá hải sâm', 8, 'Bữa Tối', 'Vi cá hải sâm', '80.000', 'vicahaisam.jpg'),
(22, 'Mỳ Ý', 8, 'Bữa Tối', 'Mỳ Ý', '70.000', 'myy.jpg'),
(23, 'Pepsi', 9, 'Đồ Uống', 'Pepsi', '20.000', 'pepsi.jpeg'),
(24, 'Bia Hà Nội', 9, 'Đồ Uống', 'Bia Hà Nội', '30.000', 'biahanoi.jpg'),
(25, 'Rượu Whisky', 9, 'Đồ Uống', 'Rượu Whisky', '150.000', 'ruouwhisky.jpg'),
(26, 'Rượu Vodka', 9, 'Đồ Uống', 'Rượu Vodka', '200.000', 'vodka.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `rid`, `payment_date`) VALUES
(1, 2000, 42, '2017-04-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation`
--

CREATE TABLE `reservation` (
  `rid` int(11) NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `r_last` varchar(30) NOT NULL,
  `r_first` varchar(30) NOT NULL,
  `r_contact` varchar(30) NOT NULL,
  `r_email` varchar(50) NOT NULL,
  `r_address` varchar(100) NOT NULL,
  `r_type` varchar(30) NOT NULL,
  `r_ocassion` varchar(50) NOT NULL,
  `r_motif` varchar(30) NOT NULL,
  `team_id` int(11) NOT NULL,
  `r_venue` varchar(100) NOT NULL,
  `payable` decimal(10,3) NOT NULL,
  `balance` decimal(10,3) NOT NULL,
  `r_status` varchar(10) NOT NULL,
  `date_reserved` date NOT NULL,
  `r_code` varchar(10) NOT NULL,
  `pax` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `modeofpayment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `reservation`
--

INSERT INTO `reservation` (`rid`, `r_date`, `r_time`, `r_last`, `r_first`, `r_contact`, `r_email`, `r_address`, `r_type`, `r_ocassion`, `r_motif`, `team_id`, `r_venue`, `payable`, `balance`, `r_status`, `date_reserved`, `r_code`, `pax`, `combo_id`, `price`, `modeofpayment`) VALUES
(42, '2022-12-12', '10:05:49', 'Lionel', 'Messi', '28064031\n', 'messi@gmail.com', '06 Phố Viên', 'buffet', 'Đám Cưới', 'White', 0, 'Paris', '2500.000', '500.000', 'Approved', '2017-04-28', '5xkKxwWasn', 50, 3, '50.000', 'Chuyển khoản'),
(45, '2022-12-12', '01:00:00', 'Cristinao', 'Ronaldo', '70125056\n', 'ronaldo@gmail.com', '521 Cổ Nhuế', 'buffet', 'Sinh Nhật', 'Red', 0, 'Madrid', '1500.000', '1500.000', 'pending', '2017-04-28', 'Bg0GueD1Vg', 10, 1, '150.000', 'Chuyển khoản'),
(46, '2022-12-12', '01:00:00', 'Paul', 'Pogba', '64159985', 'pogba@gmail.com', '27 Lê Văn Hiến', 'buffet', 'Tiệc', 'Pink', 0, 'Manchester', '1500.000', '1500.000', 'Approved', '2017-04-28', 'Bg0GuezJd8', 10, 1, '150.000', 'Chuyển khoản'),
(47, '0000-00-00', '00:00:00', 'Kylian', 'Mbappe', '925045037', 'mbappe@gmail.com', '163 Hoàng Công Chất', '', '', '', 0, '', '0.000', '0.000', '', '2022-12-11', 'vNgLYGkhwM', 0, 0, '0.000', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `r_combo`
--

CREATE TABLE `r_combo` (
  `r_combo_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `r_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `r_details`
--

CREATE TABLE `r_details` (
  `r_details_id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `r_nop` int(10) NOT NULL,
  `r_total` decimal(10,3) NOT NULL,
  `r_price` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `r_details`
--

INSERT INTO `r_details` (`r_details_id`, `rid`, `combo_id`, `r_nop`, `r_total`, `r_price`) VALUES
(23, 1, 1, 0, '0.000', '0.000'),
(24, 1, 2, 0, '0.000', '0.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `r_noncombo`
--

CREATE TABLE `r_noncombo` (
  `r_non_id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `serve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcat_name`) VALUES
(2, 'Bữa Sáng'),
(3, 'Bữa Trưa'),
(4, 'Bữa Tối'),
(10, 'Đồ Uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `team`
--

INSERT INTO `team` (`team_id`, `team_name`) VALUES
(1, 'Nhóm Chạy bàn'),
(2, 'Nhóm Thu ngân'),
(3, 'Nhóm Tạp vụ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team_member`
--

CREATE TABLE `team_member` (
  `team_member_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `team_member`
--

INSERT INTO `team_member` (`team_member_id`, `team_id`, `member_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `username`, `password`, `status`) VALUES
(1, 'Vương Đắc Bắc', 'vuongdacbac', '123456', 'active'),
(2, 'Nguyễn Văn Cầu', 'nguyenvancau', '123456', 'active'),
(3, 'Hoàng Quốc Đại', 'hoangquocdai', '123456', 'active'),
(4, 'Lê Hải Đang', 'lehaidang', '123456', 'active');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`combo_id`);

--
-- Chỉ mục cho bảng `combo_details`
--
ALTER TABLE `combo_details`
  ADD PRIMARY KEY (`combo_details_id`);

--
-- Chỉ mục cho bảng `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rid`);

--
-- Chỉ mục cho bảng `r_combo`
--
ALTER TABLE `r_combo`
  ADD PRIMARY KEY (`r_combo_id`);

--
-- Chỉ mục cho bảng `r_details`
--
ALTER TABLE `r_details`
  ADD PRIMARY KEY (`r_details_id`);

--
-- Chỉ mục cho bảng `r_noncombo`
--
ALTER TABLE `r_noncombo`
  ADD PRIMARY KEY (`r_non_id`);

--
-- Chỉ mục cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Chỉ mục cho bảng `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Chỉ mục cho bảng `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`team_member_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `combo`
--
ALTER TABLE `combo`
  MODIFY `combo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `combo_details`
--
ALTER TABLE `combo_details`
  MODIFY `combo_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `r_combo`
--
ALTER TABLE `r_combo`
  MODIFY `r_combo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `r_details`
--
ALTER TABLE `r_details`
  MODIFY `r_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `r_noncombo`
--
ALTER TABLE `r_noncombo`
  MODIFY `r_non_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `team_member`
--
ALTER TABLE `team_member`
  MODIFY `team_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

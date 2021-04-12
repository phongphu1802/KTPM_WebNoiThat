-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2021 lúc 05:36 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl_ban_hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idbinhluan` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `mauser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `danhgia` int(11) NOT NULL DEFAULT 5,
  `trangthaibl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idbinhluan`, `masp`, `mauser`, `noidung`, `danhgia`, `trangthaibl`) VALUES
(1, 2, 'phongphu1822', 'fhdhejtejgf', 5, 0),
(2, 1, 'hong123', 'hfietfxcbxyrsy', 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(20) NOT NULL,
  `created` date NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_username`, `total_price`, `created`, `address`, `status`) VALUES
(1, 'phongphu1826', 5980000, '2020-05-10', 'A1/20', 1),
(2, 'phongphu1826', 10560000, '2020-04-15', 'A1/20Q ấp 1 Xã Vĩnh Lộc A, H.Bình Chánh', 1),
(3, 'phongphu1826', 52730000, '2020-06-01', '365 An Dương Vương', 1),
(4, 'phongphu1826', 170070000, '2020-06-15', '123 Phạm Văn Hai', 1),
(5, 'phongphu1822', 199000000, '2020-06-15', '123 Vĩnh Lộc', 0),
(6, 'phongphu1822', 144890000, '2020-06-15', '12 Lý Thường Kiệt', 1),
(7, 'phongphu1828', 3290000, '2020-06-15', 'A1/20', 0),
(8, 'phongphu1826', 5480000, '2020-06-15', 'A1/20', 1),
(9, 'phongphu1826', 2990000, '2020-06-15', 'A1/20', 1),
(10, 'phongphu1826', 6750000, '2020-06-15', '123 An Duong Vuong', 0),
(11, 'phongphu1822', 5980000, '2020-11-26', 'A1/20', 1),
(12, 'phongphu1826', 170070000, '2020-11-26', '123 Phạm Văn Hai', 2),
(13, 'phongphu1822', 590000, '2020-11-26', 'ffffffffffffffffffffffff', 2),
(14, 'phongphu1826', 5480000, '2020-11-26', 'A1/20', 2),
(15, 'phongphu1822', 5980000, '2020-11-26', 'A1/20', 2),
(16, 'phongphu1822', 2380000, '2020-11-26', 'A1/20', 2),
(17, 'phongphu1826', 6750000, '2020-11-26', '123 An Duong Vuong', 2),
(18, 'phongphu1822', 2990000, '2020-11-26', 'A1/20ázdxfcgvbn', 2),
(19, 'phongphu1822', 3290000, '2020-11-26', 'A1/20', 2),
(20, 'phongphu1822', 1990000, '2020-11-26', 'A1/20', 2),
(21, 'phongphu1822', 1190000, '2020-11-26', 'A1/20', 2),
(22, 'phongphu1822', 3490000, '2020-11-26', 'A1/20', 1),
(23, 'hong123', 6490000, '2020-11-26', '273 An Dương Vương', 1),
(24, 'phongphu1826', 14950000, '2021-04-05', 'A1/20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `amout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `product_id`, `price`, `amout`) VALUES
(1, 1, 2990000, 1),
(1, 2, 2990000, 1),
(2, 75, 3990000, 1),
(2, 132, 2190000, 3),
(3, 4, 3490000, 7),
(3, 131, 179000, 20),
(3, 101, 4990000, 4),
(3, 10, 1190000, 4),
(4, 2, 2990000, 1),
(4, 3, 1990000, 1),
(4, 5, 2990000, 1),
(4, 10, 1190000, 1),
(4, 23, 2490000, 1),
(4, 33, 3990000, 1),
(4, 70, 750000, 1),
(4, 133, 499000, 20),
(4, 132, 2190000, 20),
(4, 95, 9990000, 10),
(5, 3, 1990000, 100),
(6, 135, 999000, 10),
(6, 103, 9990000, 10),
(6, 73, 3500000, 10),
(7, 8, 3290000, 1),
(8, 3, 1990000, 1),
(8, 4, 3490000, 1),
(9, 1, 2990000, 1),
(10, 3, 1990000, 1),
(10, 9, 1190000, 4),
(11, 2, 2990000, 2),
(12, 2, 2990000, 1),
(12, 3, 1990000, 1),
(12, 5, 2990000, 1),
(12, 10, 1190000, 1),
(12, 23, 2490000, 1),
(12, 33, 3990000, 1),
(12, 70, 750000, 1),
(12, 133, 499000, 20),
(12, 132, 2190000, 20),
(12, 95, 9990000, 10),
(13, 7, 590000, 1),
(14, 3, 1990000, 1),
(14, 4, 3490000, 1),
(15, 2, 2990000, 2),
(16, 9, 1190000, 2),
(17, 3, 1990000, 1),
(17, 9, 1190000, 4),
(18, 2, 2990000, 1),
(19, 8, 3290000, 1),
(20, 3, 1990000, 1),
(21, 10, 1190000, 1),
(22, 4, 3490000, 1),
(23, 12, 6490000, 1),
(24, 1, 2990000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`) VALUES
(1, 'Bàn'),
(2, 'Ghế'),
(3, 'Giường'),
(4, 'Tủ'),
(5, 'Đèn'),
(6, 'Gương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `macv` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `luong` int(15) DEFAULT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`macv`, `chucvu`, `luong`, `trangthai`) VALUES
('cv0', 'NULL', NULL, 1),
('cv1', 'Admin', 0, 1),
('cv2', 'Quản lý', 0, 1),
('cv3', 'Nhân viên', 0, 1),
('cv5', 'Phu', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdathang`
--

CREATE TABLE `ctdathang` (
  `madh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(15) NOT NULL,
  `tonggia` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `madh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `manv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mancc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ngaytao` date NOT NULL,
  `tongtiennhap` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsquyen`
--

CREATE TABLE `dsquyen` (
  `maq` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tenq` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dsquyen`
--

INSERT INTO `dsquyen` (`maq`, `tenq`, `trangthai`) VALUES
('q1', 'Quản lý thống kê báo cáo', 1),
('q10', 'Quản lý khuyến mãi', 1),
('q11', 'Quản lý bảo hành', 1),
('q12', 'Quản lý phân quyền', 1),
('q13', 'Quản lý tài khoản', 1),
('q2', 'Quản lý bình luận', 1),
('q3', 'Quản lý đặt hàng', 1),
('q4', 'Quản lý hàng hóa', 1),
('q5', 'Quản lý nhân viên', 1),
('q6', 'Quản lý thành viên', 1),
('q7', 'Quản lý hóa đơn', 1),
('q8', 'Quản lý nhập hàng', 1),
('q9', 'Quản lý nhà cung cấp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhachhang`
--

CREATE TABLE `loaikhachhang` (
  `malkh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tenlkh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dieukien` int(25) NOT NULL,
  `sotiengian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaikhachhang`
--

INSERT INTO `loaikhachhang` (`malkh`, `tenlkh`, `dieukien`, `sotiengian`) VALUES
('lkh1', 'Khách vãng lai', 0, 0),
('lkh2', 'Khách hàng Bạc', 7000000, 1),
('lkh3', 'Khách hàng Vàng', 15000000, 3),
('lkh4', 'Khách hàng Kim Cương', 25000000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaccungcap`
--

CREATE TABLE `nhaccungcap` (
  `mancc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tenncc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdtncc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaccungcap`
--

INSERT INTO `nhaccungcap` (`mancc`, `tenncc`, `sdtncc`, `diachi`, `gmail`) VALUES
('ncc1', 'Công ty TNHH đồ nội thất phố xuân', '0367945523', '321 Hàm Xuân, Hà Nội', 'phoxuan@dogo.com'),
('ncc2', 'Công ty nội thất An Khang', '0367854224', '234 An Dương Vương', 'dogoankhang@gmail.com'),
('ncc3', 'Công ty đồ gỗ Lộc Phát', '0367854224', '235 Lạc Long Quân', 'phatlocnoithat@gmail.com'),
('ncc4', 'Công ty đồ gỗ Vạn Lộc', '0367854795', '23 Cống Quỳnh', 'vanlocgroup@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `macv` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `maq` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomquyen`
--

INSERT INTO `nhomquyen` (`macv`, `maq`) VALUES
('cv1', 'q12'),
('cv1', 'q13'),
('cv2', 'q1'),
('cv2', 'q2'),
('cv2', 'q3'),
('cv2', 'q4'),
('cv2', 'q5'),
('cv2', 'q6'),
('cv2', 'q7'),
('cv2', 'q8'),
('cv2', 'q9'),
('cv2', 'q10'),
('cv2', 'q11'),
('cv3', 'q1'),
('cv3', 'q2'),
('cv3', 'q4'),
('cv3', 'q7'),
('cv3', 'q8'),
('cv5', 'q1'),
('cv5', 'q10'),
('cv5', 'q11'),
('cv5', 'q2'),
('cv5', 'q3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id` int(11) NOT NULL,
  `user_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `created` date NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`id`, `user_username`, `total_price`, `created`, `address`, `status`) VALUES
(1, 'phongphu1826', 5980000, '2020-06-15', 'A1/20', 5),
(2, 'phongphu1826', 10560000, '2020-06-15', 'A1/20Q ấp 1 Xã Vĩnh Lộc A, H.Bình Chánh', 5),
(3, 'phongphu1826', 52730000, '2020-05-15', '365 An Dương Vương', 5),
(4, 'phongphu1826', 5980000, '2020-05-20', 'A1/20', 5),
(5, 'phongphu1826', 170070000, '2020-06-15', '123 Phạm Văn Hai', 5),
(6, 'phongphu1822', 199000000, '2020-04-20', '123 Vĩnh Lộc', 5),
(7, 'phongphu1822', 144890000, '2020-05-30', '12 Lý Thường Kiệt', 5),
(8, 'phongphu1828', 3290000, '2020-06-15', 'A1/20', 5),
(9, 'phongphu1826', 5480000, '2020-06-15', 'A1/20', 5),
(10, 'phongphu1826', 2990000, '2020-06-15', 'A1/20', 5),
(11, 'phongphu1826', 6750000, '2020-06-15', '123 An Duong Vuong', 3),
(12, 'phongphu1822', 2380000, '2020-10-21', 'A1/20', 3),
(13, 'phongphu1822', 5980000, '2020-11-26', 'A1/20', 5),
(14, 'phongphu1822', 2990000, '2020-11-26', 'A1/20', 5),
(15, 'phongphu1822', 590000, '2020-11-26', '12456 abc', 3),
(16, 'phongphu1822', 590000, '2020-11-26', 'ffffffffffffffffffffffff', 5),
(17, 'phongphu1822', 2990000, '2020-11-26', 'A1/20ázdxfcgvbn', 3),
(18, 'phongphu1822', 3290000, '2020-11-26', 'A1/20', 3),
(19, 'phongphu1822', 1990000, '2020-11-26', 'A1/20', 5),
(20, 'phongphu1822', 1190000, '2020-11-26', 'A1/20', 3),
(21, 'phongphu1822', 3490000, '2020-11-26', 'A1/20', 5),
(22, 'hong123', 6490000, '2020-11-26', '273 An Dương Vương', 3),
(23, 'hong123', 3490000, '2020-11-27', '273 An Dương Vương', 3),
(24, 'phongphu1826', 14950000, '2021-04-05', 'A1/20', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_details`
--

CREATE TABLE `oder_details` (
  `oder_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oder_details`
--

INSERT INTO `oder_details` (`oder_id`, `product_id`, `price`, `amout`) VALUES
(1, 1, 2990000, 1),
(1, 2, 2990000, 1),
(2, 75, 3990000, 1),
(2, 132, 2190000, 3),
(3, 4, 3490000, 7),
(3, 131, 179000, 20),
(3, 101, 4990000, 4),
(3, 10, 1190000, 4),
(4, 1, 2990000, 1),
(4, 2, 2990000, 1),
(5, 2, 2990000, 1),
(5, 3, 1990000, 1),
(5, 5, 2990000, 1),
(5, 10, 1190000, 1),
(5, 23, 2490000, 1),
(5, 33, 3990000, 1),
(5, 70, 750000, 1),
(5, 133, 499000, 20),
(5, 132, 2190000, 20),
(5, 95, 9990000, 10),
(6, 3, 1990000, 100),
(7, 135, 999000, 10),
(7, 103, 9990000, 10),
(7, 73, 3500000, 10),
(8, 8, 3290000, 1),
(9, 3, 1990000, 1),
(9, 4, 3490000, 1),
(10, 1, 2990000, 1),
(11, 3, 1990000, 1),
(11, 9, 1190000, 4),
(12, 9, 1190000, 2),
(13, 2, 2990000, 2),
(14, 2, 2990000, 1),
(15, 7, 590000, 1),
(16, 7, 590000, 1),
(17, 2, 2990000, 1),
(18, 8, 3290000, 1),
(19, 3, 1990000, 1),
(20, 10, 1190000, 1),
(21, 4, 3490000, 1),
(22, 12, 6490000, 1),
(23, 4, 3490000, 1),
(24, 1, 2990000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `amout` int(11) NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(50) NOT NULL,
  `detail` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `price`, `amout`, `color`, `image`, `view`, `detail`, `status`) VALUES
(1, 1, 'Bàn cà phê 1', 2990000, 4, 'Vàng', 'picture/Bàn/1.jpg', 18, '                Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.                ', 1),
(2, 1, 'Bàn ăn 1', 2990000, 0, 'yellow', 'picture/Bàn/2.jpg', 20, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(3, 1, 'Bàn ăn 2', 1990000, 10, 'yellow', 'picture/Bàn/3.jpg', 17, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(4, 1, 'Bàn ăn 3', 3490000, 9, 'brown', 'picture/Bàn/4.jpg', 6, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(5, 1, 'Bàn ăn 4', 2990000, 10, 'yellow', 'picture/Bàn/5.jpg', 4, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(6, 1, 'Bàn cà phê 2', 3490000, 10, 'brown', 'picture/Bàn/6.jpg', 0, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(7, 1, 'Bàn ngoài trời 1', 590000, 10, 'yellow', 'picture/Bàn/7.jpg', 2, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(8, 1, 'Bàn cà phê 3', 3290000, 0, 'yellow', 'picture/Bàn/8.jpg', 5, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(9, 1, 'Bàn góc', 1190000, 10, 'yellow', 'picture/Bàn/9.jpg', 4, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(10, 1, 'Bàn cà phê 4', 1190000, 10, 'yellow', 'picture/Bàn/10.jpg', 4, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(11, 1, 'Bàn cà phê 5', 1190000, 10, 'brown', 'picture/Bàn/11.jpg', 0, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(12, 1, 'Bàn ăn 5', 6490000, 9, 'brown', 'picture/Bàn/12.jpg', 1, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(13, 1, 'Bàn ăn 6', 3990000, 10, 'brown', 'picture/Bàn/13.jpg', 0, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(14, 1, 'Bàn cà phê 6', 2990000, 10, 'yellow', 'picture/Bàn/14.jpg', 0, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(15, 1, 'Bàn cao 1', 2690000, 10, 'brown', 'picture/Bàn/15.jpg', 0, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(16, 1, 'Bàn cà phê 7', 2990000, 10, 'yellow', 'picture/Bàn/16.jpg', 0, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(17, 1, 'Bàn cà phê 8', 2990000, 10, 'brown', 'picture/Bàn/17.jpg', 0, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(18, 1, 'Bàn ăn 7', 6990000, 10, 'yellow', 'picture/Bàn/18.jpg', 0, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(19, 1, 'Bàn cà phê 9', 2890000, 10, 'yellow', 'picture/Bàn/19.jpg', 0, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(20, 1, 'Bàn ăn 8', 2690000, 10, 'yellow', 'picture/Bàn/20.jpg', 0, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(21, 1, 'Bàn ngoài trrời 2', 1390000, 10, 'white', 'picture/Bàn/21.jpg', 0, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(22, 1, 'Bàn ăn mở rộng', 3990000, 10, 'yellow', 'picture/Bàn/22.jpg', 0, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(23, 1, 'Bàn trang điểm 1', 2490000, 10, 'brown', 'picture/Bàn/23.jpg', 2, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(24, 1, 'Bàn trang điểm 2', 1690000, 10, 'brown', 'picture/Bàn/24.jpg', 1, 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt.', 1),
(25, 1, 'Bàn cà phê 10', 4790000, 10, 'brown', 'picture/Bàn/25.jpg', 3, 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 1),
(26, 2, 'Ghế bành 1', 7490000, 10, 'blue', 'picture/Ghế/1.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(27, 2, 'Ghế bành 2', 2990000, 10, 'brown', 'picture/Ghế/2.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(28, 2, 'Ghế bành 3', 7490000, 10, 'black', 'picture/Ghế/3.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(29, 2, 'Ghế bành 4', 3990000, 10, 'blue', 'picture/Ghế/4.jpg', 1, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(30, 2, 'Ghế bành 5', 4990000, 10, 'blue', 'picture/Ghế/5.jpg', 1, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(31, 2, 'Ghế bành 6', 4990000, 10, 'blue', 'picture/Ghế/6.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(32, 2, 'Ghế bành 7', 4990000, 10, 'gray', 'picture/Ghế/7.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(33, 2, 'Ghế bành 8', 3990000, 10, 'brown', 'picture/Ghế/8.jpg', 1, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(34, 2, 'Ghế bành 9', 9990000, 10, 'black', 'picture/Ghế/9.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(35, 2, 'Ghế bành 10', 7490000, 10, 'black', 'picture/Ghế/10.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(36, 2, 'Ghế bập bênh 1', 1990000, 10, 'yellow', 'picture/Ghế/11.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(37, 2, 'Ghế bập bênh 2', 4990000, 10, 'black', 'picture/Ghế/12.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(38, 2, 'Ghế thư giản Rcliner', 7990000, 10, 'black', 'picture/Ghế/13.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(39, 2, 'Ghế bành 11', 3990000, 10, 'blue', 'picture/Ghế/14.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(40, 2, 'Ghế bập bênh 3', 2490000, 10, 'blue', 'picture/Ghế/15.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(41, 2, 'Ghế bành 12', 990000, 10, 'red', 'picture/Ghế/16.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(42, 2, 'Đệm ngồi', 1190000, 10, 'brown', 'picture/Ghế/17.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(43, 2, 'Ghế bành 13', 1490000, 10, 'red', 'picture/Ghế/18.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(44, 2, 'Ghế bành 14', 5990000, 10, 'blue', 'picture/Ghế/19.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(45, 2, 'Ghế đôn cao', 8990000, 10, 'yellow', 'picture/Ghế/20.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(46, 2, 'Ghế đôn 1', 499000, 10, 'blue', 'picture/Ghế/21.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(47, 2, 'Ghế đôn 2', 199000, 10, 'yellow', 'picture/Ghế/22.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(48, 2, 'Ghế đôn 3', 499000, 10, 'white', 'picture/Ghế/23.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(49, 2, 'Ghế đôn 4', 499000, 10, 'black', 'picture/Ghế/24.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(50, 2, 'Ghế ăn 1', 699000, 10, 'yellow', 'picture/Ghế/25.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(51, 2, 'Ghế ăn 2', 1490000, 10, 'yellow', 'picture/Ghế/26.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(52, 2, 'Ghế ăn 3', 699000, 10, 'white', 'picture/Ghế/27.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(53, 2, 'Ghế ăn 4', 499000, 10, 'yellow', 'picture/Ghế/28.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(54, 2, 'Ghế ăn 5', 699000, 10, 'black', 'picture/Ghế/29.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(55, 2, 'Ghế ăn 6', 749000, 10, 'white', 'picture/Ghế/30.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(56, 2, 'Ghế ăn 7', 749000, 10, 'black', 'picture/Ghế/31.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(57, 2, 'Ghế ngoài trời', 399000, 10, 'brown', 'picture/Ghế/32.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(58, 2, 'Ghế ăn 8', 895000, 10, 'white', 'picture/Ghế/33.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(59, 2, 'Ghế ăn 9', 1390000, 10, 'brown', 'picture/Ghế/34.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(60, 2, 'Ghế ăn 10', 1090000, 10, 'black', 'picture/Ghế/35.jpg', 0, 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA.', 1),
(61, 6, 'Gương treo tường Catch', 250000, 10, 'yellow', 'picture/Gương/1.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(62, 6, 'Gương đứng Ali', 1690000, 10, 'yellow', 'picture/Gương/2.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(63, 6, 'Gương treo tường Bernie', 350000, 10, 'yellow', 'picture/Gương/3.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(64, 6, 'Gương treo tường Albany', 1590000, 10, 'brown', 'picture/Gương/4.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(65, 6, 'Gương treo tường Guardia', 449000, 10, 'white', 'picture/Gương/5.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(66, 6, 'Gương đứng Guardia', 1590000, 10, 'yellow', 'picture/Gương/6.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(67, 6, 'Gương đứng Guardia', 1590000, 10, 'white', 'picture/Gương/7.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(68, 6, 'Gương treo tường Kitka', 900000, 10, 'brown', 'picture/Gương/8.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(69, 6, 'Gương bàn trang điểm Ann-Louise', 900000, 10, 'white', 'picture/Gương/9.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(70, 6, 'Gương treo tường Mitford', 750000, 10, 'white', 'picture/Gương/10.jpg', 1, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(71, 6, 'Gương bàn trang điểm Ali', 600000, 10, 'yellow', 'picture/Gương/11.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(72, 6, 'Gương treo tường Rebel', 1190000, 10, 'white', 'picture/Gương/12.jpg', 1, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(73, 6, 'Gương đứng Akio', 3500000, 10, 'brown', 'picture/Gương/13.jpg', 1, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(74, 3, 'Giường Akio', 12900000, 10, 'brown', 'picture/Giường/1.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(75, 3, 'Giường Yokohama', 3990000, 10, 'white', 'picture/Giường/2.jpg', 2, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(76, 3, 'Giường tầng Grafitti', 4490000, 10, 'black', 'picture/Giường/3.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(77, 3, 'Giường cơ bản', 3000000, 10, 'yellow', 'picture/Giường/4.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(78, 3, 'Giường Atila', 7990000, 10, 'yellow', 'picture/Giường/5.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(79, 3, 'Giường Albany', 6490000, 10, 'brown', 'picture/Giường/6.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(80, 3, 'Giường Bernie', 5490000, 10, 'yellow', 'picture/Giường/8.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(81, 3, 'Giường Rally', 6490000, 10, 'white', 'picture/Giường/9.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(82, 3, 'Giường Harris', 5990000, 10, 'yellow', 'picture/Giường/10.jpg', 1, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(83, 3, 'Giường Harris 2', 7990000, 10, 'yellow', 'picture/Giường/11.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(84, 3, 'Giường Keiko', 9490000, 10, 'yellow', 'picture/Giường/12.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(85, 3, 'Giường Ali 1', 5500000, 10, 'yellow', 'picture/Giường/13.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(86, 3, 'Giường Ali 2', 4500000, 10, 'yellow', 'picture/Giường/14.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(89, 3, 'Giường Ali 3', 3500000, 10, 'yellow', 'picture/Giường/15.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(90, 3, 'Giường Kitka', 7500000, 10, 'black', 'picture/Giường/17.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(91, 3, 'Giường Ali 1', 5500000, 10, 'yellow', 'picture/Giường/18.jpg', 0, 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 1),
(94, 4, 'Tủ kính 1', 3990000, 10, 'white', 'picture/Tủ/1.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(95, 4, 'Tủ kính 2', 9990000, 10, 'black', 'picture/Tủ/2.jpg', 1, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(96, 4, 'Tủ kính 3', 7490000, 10, 'grown', 'picture/Tủ/3.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(97, 4, 'Tủ bát đĩa 1', 8490000, 10, 'yellow', 'picture/Tủ/4.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(98, 4, 'Tủ bát đĩa 2', 7990000, 10, 'yellow', 'picture/Tủ/5.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(99, 4, 'Tủ bát đĩa 3', 7990000, 10, 'yellow', 'picture/Tủ/6.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(100, 4, 'Tủ quần áo 1', 6490000, 10, 'yellow', 'picture/Tủ/7.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(101, 4, 'Tủ quần áo 2', 4990000, 10, 'yellow', 'picture/Tủ/8.jpg', 1, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(102, 4, 'Tủ quần áo 3', 3490000, 10, 'yellow', 'picture/Tủ/9.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(103, 4, 'Tủ bát đĩa 4', 9990000, 10, 'yellow', 'picture/Tủ/10.jpg', 1, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(104, 4, 'Tủ bát đĩa 5', 3990000, 10, 'white', 'picture/Tủ/11.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(105, 4, 'Tủ quần áo 4', 21900000, 10, 'brown', 'picture/Tủ/12.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(106, 4, 'Tủ quần áo 5', 3290000, 10, 'brown', 'picture/Tủ/13.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(107, 4, 'Tủ quần áo 6', 5490000, 10, 'yellow', 'picture/Tủ/14.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(108, 4, 'Tủ quần áo 7', 6990000, 10, 'yellow', 'picture/Tủ/15.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(109, 4, 'Tủ quần áo 8', 12900000, 10, 'yellow', 'picture/Tủ/16.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(110, 4, 'Tủ quần áo 9', 3990000, 10, 'yellow', 'picture/Tủ/17.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(111, 4, 'Tủ ngăn kéo 1', 3990000, 10, 'brown', 'picture/Tủ/18.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(112, 4, 'Tủ ngăn kéo 2', 2990000, 10, 'yellow', 'picture/Tủ/19.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(113, 4, 'Tủ ngăn kéo 3', 4990000, 10, 'yellow', 'picture/Tủ/20.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(114, 4, 'Tủ ngăn kéo 4', 7990000, 10, 'brown', 'picture/Tủ/21.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(115, 4, 'Tủ ngăn kéo 5', 6490000, 10, 'black', 'picture/Tủ/22.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(116, 4, 'Tủ ngăn kéo 6', 6990000, 10, 'brown', 'picture/Tủ/23.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(117, 4, 'Tủ kệ tv 1', 5990000, 10, 'brown', 'picture/Tủ/24.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(118, 4, 'Tủ kệ tv 2', 3990000, 10, 'brown', 'picture/Tủ/25.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(119, 4, 'Tủ kệ tv 3', 7990000, 10, 'yellow', 'picture/Tủ/26.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(120, 4, 'Tủ kệ tv 4', 3990000, 10, 'white', 'picture/Tủ/27.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(121, 4, 'Tủ kệ tv 5', 5490000, 10, 'brown', 'picture/Tủ/28.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(122, 4, 'Tủ kệ tv 6', 6490000, 10, 'yellow', 'picture/Tủ/29.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(123, 4, 'Tủ kệ tv 7', 3990000, 10, 'white', 'picture/Tủ/30.jpg', 0, 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 1),
(124, 5, 'Đèn kẹp', 179000, 10, 'blue', 'picture/Đèn/1.jpg', 0, 'Đèn kẹp HECTOR là giải pháp mang đến thêm ánh sáng cho bất kỳ không gian nào bởi tính năng kẹp gọn gàng ở bất cứ đâu. Sản phẩm được làm từ kim loại phủ sơn nhiều màu bắt mắt. Lưu ý, sản phẩm không bao gồm bóng đèn.', 1),
(125, 5, 'Đèn kẹp', 159000, 10, 'silver', 'picture/Đèn/2.jpg', 1, 'Đèn kẹp HECTOR là giải pháp mang đến thêm ánh sáng cho bất kỳ không gian nào bởi tính năng kẹp gọn gàng ở bất cứ đâu. Sản phẩm được làm từ kim loại phủ sơn nhiều màu bắt mắt. Lưu ý, sản phẩm không bao gồm bóng đèn.', 1),
(126, 5, 'Đèn bàn TESTA', 1290000, 10, 'black', 'picture/Đèn/3.jpg', 0, 'Đèn bàn TESTA sở hữu thiết kế đặc biệt gắn được 2 bóng đèn cùng lúc cho bạn tùy thích thay đổi màu sắc và mức độ của ánh sáng đèn. Chao đèn hình trụ bằng vải lụa màu đen mang lại vẻ đẹp sang trọng và ấn tượng. Phần chân đèn hình tròn làm từ chất liệu thép đúc bền chắc và vững chãi.', 1);
INSERT INTO `product` (`id`, `catalog_id`, `name`, `price`, `amout`, `color`, `image`, `view`, `detail`, `status`) VALUES
(127, 5, 'Đèn bàn TESTA 1', 1290000, 10, 'black', 'picture/Đèn/4.jpg', 1, 'Đèn bàn TESTA là lựa chọn hoàn hảo cho không gian nội thất của gia đình bạn. Chân đèn được làm từ cement đúc vững chãi với chi tiết màu vàng kim loại sáng bóng mang lại vẻ đẹp sang trọng và ấm áp. Phần chao đèn hình trụ bằng vải lụa màu đen ấn tượng. Kết hợp đèn cùng các sản phẩm khác trong bộ sưu tập TESTA để hoàn thiện việc bày trí ngôi nhà hiện đại.', 1),
(128, 5, 'Đèn kẹp PUNK', 429000, 10, 'white', 'picture/Đèn/5.jpg', 0, 'Đèn kẹp PUNK là giải pháp mang đến thêm ánh sáng cho bất kỳ không gian nào bởi tính năng kẹp gọn gàng ở bất cứ đâu. Sản phẩm được làm từ kim loại phủ sơn nhiều màu bắt mắt. Lưu ý, sản phẩm không bao gồm bóng đèn.', 1),
(129, 5, 'Đèn sàn ARENA', 699000, 10, 'white', 'picture/Đèn/6.jpg', 0, 'Đèn đứng ARENA của BAYA là nét chấm phá cho không gian phòng khách hiện đại. Kiểu dáng đơn giản, chất liệu kim loại sơn xám sang trọng, nổi bật cùng chiều cao 121cm, đem lại ánh sáng tự nhiên ấm áp cho căn phòng.', 1),
(130, 5, 'Đèn bàn PRISCA', 1590000, 10, 'black', 'picture/Đèn/7.jpg', 0, 'Đèn bàn PRISCA từ nội thất BAYA mang phong cách hiện đại, tối giản. Thân đèn làm từ gỗ cho đèn phom dáng lạ mắt. Phần chụp đèn màu sáng thanh lịch giúp tôn lên vẻ sang trọng, đặc biệt đế làm từ đá mable tinh tế. Đèn mang đến ánh sáng ấm áp lan tỏa không gian phòng khách, phòng ngủ gia đình.', 1),
(131, 5, 'Bóng đèn led OCTO', 179000, 10, 'white', 'picture/Đèn/8.jpg', 1, 'Bóng đèn Led OCTO không chỉ giúp chiếu sáng cho không gian sống của bạn mà còn tiết kiệm điện năng đáng kể. Chuôi đèn E27 phát ra ánh sáng trắng, công suất 4W. Đèn có tuổi thọ lên đến 15000 giờ.', 1),
(132, 5, 'Đèn sàn ELLIOT', 2190000, 10, 'white', 'picture/Đèn/9.jpg', 2, 'Bóng đèn Led OCTO không chỉ giúp chiếu sáng cho không gian sống của bạn mà còn tiết kiệm điện năng đáng kể. Chuôi đèn E27 phát ra ánh sáng trắng, công suất 4W. Đèn có tuổi thọ lên đến 15000 giờ.', 1),
(133, 5, 'Đèn trần PUNK', 499000, 10, 'white', 'picture/Đèn/10.jpg', 1, 'Là một thiết kế sang trọng từ nội thất BAYA, đèn trần PUNK nổi bật với gam màu trắng sang trọng. Chất liệu kim loại sáng bóng, phủ ánh sáng tự nhiên cho không gian hiện đại. Kết hợp đèn cùng các sản phẩm trong cùng bộ sưu tập PUNK để hoàn thiện nội thất cho căn nhà. Lưu ý, sản phẩm không bao gồm bóng đèn.', 1),
(134, 5, 'Đèn trần PAKKER', 399000, 10, 'black', 'picture/Đèn/11.jpg', 0, 'Kết hợp giữa vẻ truyền thống và nét chấm phá hiện đại, đèn trần PARKER được làm từ kim loại sơn đen của BAYA sẽ là lựa chọn hoàn hảomảng chiếu sáng không gian gia đình. Đèn có thiết kế đơn giản, tinh tế đầy sang trọng, dễ dàng kết hợp cùng các phong cách nội thất khác nhau. Lưu ý, sản phẩm bán không bao gồm bóng đèn.', 1),
(135, 5, 'Đèn bàn làm việc SCOLARS', 999000, 10, 'white', 'picture/Đèn/11.jpg', 1, 'Sự lựa chọn hoàn hảo cho không gian học tập và làm việc chính là đèn bàn SCOLARS từ BAYA. Sản phẩm nổi bật với kiểu dáng hiện đại từ kim loại viền gỗ trang nhã, cung cấp ánh sáng tập trung, tốt cho mắt. Đèn thích hợp với các không gian nội thất theo phong cách hiện đại, trẻ trung. Lưu ý, sản phẩm không bao gồm bóng đèn.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'khachhang',
  `ngaysinh` date DEFAULT NULL,
  `chucvu` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `phonenumber`, `name`, `gioitinh`, `email`, `address`, `created`, `position`, `ngaysinh`, `chucvu`) VALUES
('admin', 'admin', 367945523, 'Nguyễn Phong Phú', 'male', 'PhongPhuNguyen7575@gmail.com', 'A1/20Q', '2000-02-18', 'admin', NULL, 'cv1'),
('admin1', 'admin', 367945523, 'Nguyễn Phong Phú', 'male', 'phongphunguyen7575@gmail.com', 'A1/20Q', '2020-05-30', 'admin', '2000-02-18', 'cv2'),
('admin2', 'admin', 367945523, 'Nguyễn Phong Phú', 'male', 'phongphunguyen7575@gmail.com', 'A1/20Q', '2020-05-30', 'admin', '2000-02-18', 'cv3'),
('hong123', '#Hongminh123', 773689235, 'Võ Thị Tuyết Hồng', 'female', 'huongvu2xxxxx@gmail.com', '273 An Dương Vương', '2020-11-26', 'Khách hàng', NULL, NULL),
('phongphu1822', 'Phu123456', 367945523, 'Nguyễn Phong Phú', 'male', 'phongphunguyen7575@gmail.com', 'A1/20', '2020-05-27', 'khách hàng', NULL, NULL),
('phongphu1826', 'Phu123456', 367945523, 'Nguyễn Phong Phú', 'female', 'phongphunguyen7575@gmail.com', 'A1/20', '2020-05-30', 'Khách hàng', NULL, NULL),
('phongphu1828', 'Phu123456', 367945523, 'Nguyễn Phong Phú', 'male', 'phongphunguyen7575@gmail.com', 'A1/20', '2020-06-15', 'Khách hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xephangthanhvien`
--

CREATE TABLE `xephangthanhvien` (
  `matv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `malkh` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xephangthanhvien`
--

INSERT INTO `xephangthanhvien` (`matv`, `malkh`) VALUES
('phongphu1826', 'lkh4'),
('hong123', 'lkh1'),
('phongphu1822', 'lkh2'),
('phongphu1828', 'lkh3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbinhluan`),
  ADD KEY `masp` (`masp`),
  ADD KEY `mauser` (`mauser`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_username` (`user_username`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`macv`);

--
-- Chỉ mục cho bảng `ctdathang`
--
ALTER TABLE `ctdathang`
  ADD KEY `madh` (`madh`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `mancc` (`mancc`),
  ADD KEY `manv` (`manv`);

--
-- Chỉ mục cho bảng `dsquyen`
--
ALTER TABLE `dsquyen`
  ADD PRIMARY KEY (`maq`);

--
-- Chỉ mục cho bảng `loaikhachhang`
--
ALTER TABLE `loaikhachhang`
  ADD PRIMARY KEY (`malkh`);

--
-- Chỉ mục cho bảng `nhaccungcap`
--
ALTER TABLE `nhaccungcap`
  ADD PRIMARY KEY (`mancc`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD KEY `macv` (`macv`),
  ADD KEY `maq` (`maq`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_username`);

--
-- Chỉ mục cho bảng `oder_details`
--
ALTER TABLE `oder_details`
  ADD KEY `oder_id` (`oder_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_id` (`catalog_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `chucvu` (`chucvu`) USING BTREE;

--
-- Chỉ mục cho bảng `xephangthanhvien`
--
ALTER TABLE `xephangthanhvien`
  ADD KEY `malkh` (`malkh`),
  ADD KEY `matv` (`matv`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`mauser`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `user_username` FOREIGN KEY (`user_username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `ctdathang`
--
ALTER TABLE `ctdathang`
  ADD CONSTRAINT `ctdathang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `dathang` (`madh`),
  ADD CONSTRAINT `ctdathang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`mancc`) REFERENCES `nhaccungcap` (`mancc`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`manv`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD CONSTRAINT `nhomquyen_ibfk_1` FOREIGN KEY (`macv`) REFERENCES `chucvu` (`macv`),
  ADD CONSTRAINT `nhomquyen_ibfk_2` FOREIGN KEY (`maq`) REFERENCES `dsquyen` (`maq`);

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `user_name` FOREIGN KEY (`user_username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `oder_details`
--
ALTER TABLE `oder_details`
  ADD CONSTRAINT `oder_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `oder_id` FOREIGN KEY (`oder_id`) REFERENCES `oder` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`chucvu`) REFERENCES `chucvu` (`macv`);

--
-- Các ràng buộc cho bảng `xephangthanhvien`
--
ALTER TABLE `xephangthanhvien`
  ADD CONSTRAINT `xephangthanhvien_ibfk_1` FOREIGN KEY (`malkh`) REFERENCES `loaikhachhang` (`malkh`),
  ADD CONSTRAINT `xephangthanhvien_ibfk_2` FOREIGN KEY (`matv`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

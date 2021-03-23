-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 19, 2021 lúc 02:02 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdlwebnoithat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `macv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `chucvu` varchar(20) CHARACTER SET utf8 NOT NULL,
  `luong` int(11) DEFAULT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`macv`, `chucvu`, `luong`, `trangthai`) VALUES
('cv1', 'Admin', 0, 1),
('cv2', 'Quản lý', 0, 1),
('cv3', 'Nhân viên', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `masp` varchar(5) CHARACTER SET utf8 NOT NULL,
  `matk` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cmt` varchar(500) CHARACTER SET utf8 NOT NULL,
  `anh` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `danhgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdathang`
--

CREATE TABLE `ctdathang` (
  `madh` varchar(5) CHARACTER SET utf8 NOT NULL,
  `masp` varchar(5) CHARACTER SET utf8 NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `tonggia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `madh` varchar(5) CHARACTER SET utf8 NOT NULL,
  `masp` varchar(5) CHARACTER SET utf8 NOT NULL,
  `soluong` int(11) NOT NULL,
  `giale` int(11) NOT NULL,
  `giatong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `mahd` varchar(5) CHARACTER SET utf8 NOT NULL,
  `masp` varchar(5) CHARACTER SET utf8 NOT NULL,
  `maid` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `tonggia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadonnhap`
--

CREATE TABLE `cthoadonnhap` (
  `mahdn` varchar(5) CHARACTER SET utf8 NOT NULL,
  `masp` varchar(5) CHARACTER SET utf8 NOT NULL,
  `soluong` int(11) NOT NULL,
  `giale` int(11) NOT NULL,
  `giatong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `madh` varchar(5) CHARACTER SET utf8 NOT NULL,
  `manv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `mancc` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ngaytao` datetime NOT NULL,
  `tongtiennhap` int(11) NOT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` varchar(5) CHARACTER SET utf8 NOT NULL,
  `matv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ngaydat` datetime NOT NULL,
  `tonggia` int(11) NOT NULL,
  `ghichu` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsquyen`
--

CREATE TABLE `dsquyen` (
  `maq` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tenq` varchar(50) CHARACTER SET utf8 NOT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` varchar(5) CHARACTER SET utf8 NOT NULL,
  `matv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `manv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tonggia` int(11) NOT NULL,
  `ngayban` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `mahdn` varchar(5) CHARACTER SET utf8 NOT NULL,
  `manv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `mancc` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ngaynhap` datetime NOT NULL,
  `tongtiennhap` int(11) NOT NULL,
  `ghichu` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhachhang`
--

CREATE TABLE `loaikhachhang` (
  `maloaikh` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tenloaikh` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dieukien` int(11) DEFAULT NULL,
  `sotiengiam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaikhachhang`
--

INSERT INTO `loaikhachhang` (`maloaikh`, `tenloaikh`, `dieukien`, `sotiengiam`) VALUES
('lkh1', 'Khách vãng lai', 0, 0),
('lkh2', 'Khách hàng Bạc', 7000000, 1),
('lkh3', 'Khách hàng Vàng', 15000000, 3),
('lkh4', 'Khách hàng Kim Cương', 25000000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloai` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tenloai` varchar(30) CHARACTER SET utf8 NOT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloai`, `tenloai`, `trangthai`) VALUES
('l1', 'Bàn', 1),
('l2', 'Ghế', 1),
('l3', 'Giường', 1),
('l4', 'Tủ', 1),
('l5', 'Đèn', 1),
('l6', 'Gương', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `mancc` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tenncc` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sdtncc` varchar(15) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gmail` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`mancc`, `tenncc`, `sdtncc`, `diachi`, `gmail`) VALUES
('ncc1', 'Công ty TNHH đồ nội thất phố xuân', '0367945523', '321 Hàm Xuân, Hà Nội', 'phoxuan@dogo.com'),
('ncc2', 'Công ty nội thất An Khang', '0367854224', '234 An Dương Vương', 'dogoankhang@gmail.com'),
('ncc3', 'Công ty đồ gỗ Lộc Phát', '0367854224', '235 Lạc Long Quân', 'phatlocnoithat@gmail.com'),
('ncc4', 'Công ty đồ gỗ Vạn Lộc', '0367854795', '23 Cống Quỳnh', 'vanlocgroup@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `chucvu` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ho` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sodienthoai` varchar(15) CHARACTER SET utf8 NOT NULL,
  `gmail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cmnd` varchar(15) CHARACTER SET utf8 NOT NULL,
  `anh` varchar(500) NOT NULL,
  `ngayvaolam` datetime NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `chucvu`, `ho`, `ten`, `gioitinh`, `ngaysinh`, `diachi`, `sodienthoai`, `gmail`, `cmnd`, `anh`, `ngayvaolam`, `trangthai`) VALUES
('nv1', 'cv1', 'Nguyễn', 'Phong Phú', 1, '2000-02-18 00:00:00', 'A1/20q, ấp 1, xã Vĩnh Lộc A, H.Bình Chánh', '0367945523', 'phongphunguyen7575@gmail.com', '026009854', '', '2021-03-13 00:00:00', 1),
('nv2', 'cv2', 'Nguyễn', 'Phong Phú', 1, '2000-02-18 00:00:00', 'A1/20q, ấp 1, xã Vĩnh Lộc A, H.Bình Chánh', '0367945523', 'phongphunguyen7575@gmail.com', '026009854', '', '2021-03-13 00:00:00', 1),
('nv3', 'cv3', 'Nguyễn', 'Phong Phú', 1, '2000-02-18 00:00:00', 'A1/20q, ấp 1, xã Vĩnh Lộc A, H.Bình Chánh', '0367945523', 'phongphunguyen7575@gmail.com', '026009854', '', '2021-03-13 00:00:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `macv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `maq` varchar(5) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('cv3', 'q8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(5) CHARACTER SET utf8 NOT NULL,
  `maloai` varchar(5) CHARACTER SET utf8 NOT NULL,
  `mancc` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tensp` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `hinhanh` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `mau` varchar(50) NOT NULL,
  `thongtinsanpham` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `danhgia` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `maloai`, `mancc`, `tensp`, `gia`, `hinhanh`, `mau`, `thongtinsanpham`, `soluong`, `danhgia`, `luotxem`, `trangthai`) VALUES
('1', 'l1', 'ncc1', 'Bàn cà phê 1', 2990000, './image/Bàn/1.jpg', 'yellow', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn. ', 30, 0, 0, 1),
('10', 'l1', 'ncc3', 'Bàn cà phê 4', 1190000, './image/Bàn/10.jpg', 'yellow', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('100', 'l4', 'ncc2', 'Tủ kệ tv 1', 5990000, './image/Tủ/24.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('101', 'l4', 'ncc1', 'Tủ kệ tv 2', 3990000, './image/Tủ/25.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('102', 'l4', 'ncc4', 'Tủ kệ tv 3', 7990000, './image/Tủ/26.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('103', 'l4', 'ncc2', 'Tủ kệ tv 4', 3990000, './image/Tủ/27.jpg', 'white', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('104', 'l4', 'ncc2', 'Tủ kệ tv 5', 5490000, './image/Tủ/28.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('105', 'l4', 'ncc2', 'Tủ kệ tv 6', 6490000, './image/Tủ/29.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('106', 'l4', 'ncc4', 'Tủ kệ tv 7', 3990000, './image/Tủ/30.jpg', 'white', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('107', 'l5', 'ncc3', 'Đèn kẹp 1', 179000, './image/Đèn/1.jpg', 'blue', 'Đèn kẹp HECTOR là giải pháp mang đến thêm ánh sáng cho bất kỳ không gian nào bởi tính năng kẹp gọn gàng ở bất cứ đâu. Sản phẩm được làm từ kim loại phủ sơn nhiều màu bắt mắt. Lưu ý, sản phẩm không bao gồm bóng đèn.', 30, 0, 0, 1),
('108', 'l5', 'ncc2', 'Đèn kẹp 2', 159000, './image/Đèn/2.jpg', 'silver', 'Đèn kẹp HECTOR là giải pháp mang đến thêm ánh sáng cho bất kỳ không gian nào bởi tính năng kẹp gọn gàng ở bất cứ đâu. Sản phẩm được làm từ kim loại phủ sơn nhiều màu bắt mắt. Lưu ý, sản phẩm không bao gồm bóng đèn.', 30, 0, 0, 1),
('109', 'l5', 'ncc1', 'Đèn bàn TESTA 1', 1290000, './image/Đèn/3.jpg', 'black', 'Đèn bàn TESTA sở hữu thiết kế đặc biệt gắn được 2 bóng đèn cùng lúc cho bạn tùy thích thay đổi màu sắc và mức độ của ánh sáng đèn. Chao đèn hình trụ bằng vải lụa màu đen mang lại vẻ đẹp sang trọng và ấn tượng. Phần chân đèn hình tròn làm từ chất liệu thép đúc bền chắc và vững chãi', 30, 0, 0, 1),
('11', 'l1', 'ncc1', 'Bàn cà phê 5', 1190000, './image/Bàn/11.jpg', 'brown', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('110', 'l5', 'ncc1', 'Đèn bàn TESTA 2', 1290000, './image/Đèn/4.jpg', 'black', 'Đèn bàn TESTA là lựa chọn hoàn hảo cho không gian nội thất của gia đình bạn. Chân đèn được làm từ cement đúc vững chãi với chi tiết màu vàng kim loại sáng bóng mang lại vẻ đẹp sang trọng và ấm áp. Phần chao đèn hình trụ bằng vải lụa màu đen ấn tượng. Kết hợp đèn cùng các sản phẩm khác trong bộ sưu tập TESTA để hoàn thiện việc bày trí ngôi nhà hiện đại.', 30, 0, 0, 1),
('111', 'l5', 'ncc4', 'Đèn kẹp PUNK', 429000, './image/Đèn/5.jpg', 'white', 'Đèn kẹp PUNK là giải pháp mang đến thêm ánh sáng cho bất kỳ không gian nào bởi tính năng kẹp gọn gàng ở bất cứ đâu. Sản phẩm được làm từ kim loại phủ sơn nhiều màu bắt mắt. Lưu ý, sản phẩm không bao gồm bóng đèn.', 30, 0, 0, 1),
('112', 'l5', 'ncc2', 'Đèn sàn ARENA', 69000, './image/Đèn/6.jpg', 'white', 'Đèn đứng ARENA của BAYA là nét chấm phá cho không gian phòng khách hiện đại. Kiểu dáng đơn giản, chất liệu kim loại sơn xám sang trọng, nổi bật cùng chiều cao 121cm, đem lại ánh sáng tự nhiên ấm áp cho căn phòng.', 30, 0, 0, 1),
('113', 'l5', 'ncc3', 'Đèn bàn PRISCA', 1590000, './image/Đèn/7.jpg', 'black', 'Đèn bàn PRISCA từ nội thất BAYA mang phong cách hiện đại, tối giản. Thân đèn làm từ gỗ cho đèn phom dáng lạ mắt. Phần chụp đèn màu sáng thanh lịch giúp tôn lên vẻ sang trọng, đặc biệt đế làm từ đá mable tinh tế. Đèn mang đến ánh sáng ấm áp lan tỏa không gian phòng khách, phòng ngủ gia đình.', 30, 0, 0, 1),
('114', 'l5', 'ncc2', 'Bóng đèn led OCTO', 179000, './image/Đèn/8.jpg', 'white', 'Bóng đèn Led OCTO không chỉ giúp chiếu sáng cho không gian sống của bạn mà còn tiết kiệm điện năng đáng kể. Chuôi đèn E27 phát ra ánh sáng trắng, công suất 4W. Đèn có tuổi thọ lên đến 15000 giờ', 30, 0, 0, 1),
('115', 'l5', 'ncc3', 'Đèn sàn ELLIOT', 2190000, './image/Đèn/9.jpg', 'white', 'Bóng đèn Led OCTO không chỉ giúp chiếu sáng cho không gian sống của bạn mà còn tiết kiệm điện năng đáng kể. Chuôi đèn E27 phát ra ánh sáng trắng, công suất 4W. Đèn có tuổi thọ lên đến 15000 giờ', 30, 0, 0, 1),
('116', 'l5', 'ncc4', 'Đèn trần PUNK', 499000, './image/Đèn/10.jpg', 'white', 'Là một thiết kế sang trọng từ nội thất BAYA, đèn trần PUNK nổi bật với gam màu trắng sang trọng. Chất liệu kim loại sáng bóng, phủ ánh sáng tự nhiên cho không gian hiện đại. Kết hợp đèn cùng các sản phẩm trong cùng bộ sưu tập PUNK để hoàn thiện nội thất cho căn nhà. Lưu ý, sản phẩm không bao gồm bóng đèn.', 30, 0, 0, 1),
('117', 'l5', 'ncc1', 'Đèn trần PAKKER', 399000, './image/Đèn/11.jpg', 'black', 'Kết hợp giữa vẻ truyền thống và nét chấm phá hiện đại, đèn trần PARKER được làm từ kim loại sơn đen của BAYA sẽ là lựa chọn hoàn hảomảng chiếu sáng không gian gia đình. Đèn có thiết kế đơn giản, tinh tế đầy sang trọng, dễ dàng kết hợp cùng các phong cách nội thất khác nhau. Lưu ý, sản phẩm bán không bao gồm bóng đèn.', 30, 0, 0, 1),
('118', 'l5', 'ncc2', 'Đèn bàn làm việc SCOLARS', 999000, './image/Đèn/12.jpg', 'white', 'Sự lựa chọn hoàn hảo cho không gian học tập và làm việc chính là đèn bàn SCOLARS từ BAYA. Sản phẩm nổi bật với kiểu dáng hiện đại từ kim loại viền gỗ trang nhã, cung cấp ánh sáng tập trung, tốt cho mắt. Đèn thích hợp với các không gian nội thất theo phong cách hiện đại, trẻ trung. Lưu ý, sản phẩm không bao gồm bóng đèn.', 30, 0, 0, 1),
('119', 'l6', 'ncc1', 'Gương treo tường Catch', 250000, './image/Gương/1.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('12', 'l1', 'ncc4', 'Bàn ăn 5', 6490000, './image/Bàn/12.jpg', 'brown', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('120', 'l6', 'ncc4', 'Gương đứng Ali', 1690000, './image/Gương/2.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('121', 'l6', 'ncc2', 'Gương treo tường Bernie', 350000, './image/Gương/3.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('122', 'l6', 'ncc3', 'Gương treo tường Albany', 1590000, './image/Gương/4.jpg', 'brown', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('123', 'l6', 'ncc2', 'Gương treo tường Guardia', 449000, './image/Gương/5.jpg', 'white', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('124', 'l6', 'ncc3', 'Gương đứng Guardia 1', 1590000, './image/Gương/6.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('125', 'l6', 'ncc4', 'Gương đứng Guardia 2', 1590000, './image/Gương/7.jpg', 'white', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('126', 'l6', 'ncc2', 'Gương treo tường Kitka', 900000, './image/Gương/8.jpg', 'brown', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('127', 'l6', 'ncc1', 'Gương bàn trang điểm Ann-Louise', 750000, './image/Gương/9.jpg', 'white', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('128', 'l6', 'ncc2', 'Gương treo tường Mitford', 600000, './image/Gương/10.jpg', 'white', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('129', 'l6', 'ncc3', 'Gương bàn trang điểm Ali', 1190000, './image/Gương/11.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('13', 'l1', 'ncc2', 'Bàn ăn 6', 3990000, './image/Bàn/13.jpg', 'brown', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('130', 'l6', 'ncc2', 'Gương treo tường Rebel', 3500000, './image/Gương/12.jpg', 'white', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('131', 'l6', 'ncc4', 'Gương đứng Akio', 129000, './image/Gương/13.jpg', 'brown', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('14', 'l1', 'ncc2', 'Bàn cà phê 6', 2990000, './image/Bàn/14.jpg', 'yellow', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('15', 'l1', 'ncc3', 'Bàn cao 1', 2690000, './image/Bàn/15.jpg', 'brown', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('16', 'l1', 'ncc4', 'Bàn cà phê 7', 2990000, './image/Bàn/16.jpg', 'yellow', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('17', 'l1', 'ncc1', 'Bàn cà phê 8', 2990000, './image/Bàn/17.jpg', 'brown', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('18', 'l1', 'ncc1', 'Bàn ăn 7', 6990000, './image/Bàn/18.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('19', 'l1', 'ncc2', 'Bàn cà phê 9', 2890000, './image/Bàn/19.jpg', 'yellow', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('2', 'l1', 'ncc1', 'Bàn ăn 1', 2990000, './image/Bàn/2.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('20', 'l1', 'ncc3', 'Bàn ăn 8', 2690000, './image/Bàn/20.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('21', 'l1', 'ncc2', 'Bàn ngoài trrời 2', 1390000, './image/Bàn/21.jpg', 'white', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('22', 'l1', 'ncc1', 'Bàn ăn mở rộng', 3990000, './image/Bàn/22.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('23', 'l1', 'ncc4', 'Bàn trang điểm 1', 2490000, './image/Bàn/23.jpg', 'brown', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('24', 'l1', 'ncc4', 'Bàn trang điểm 2', 1690000, './image/Bàn/24.jpg', 'brown', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('25', 'l1', 'ncc2', 'Bàn cà phê 10', 4790000, './image/Bàn/25.jpg', 'brown', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('26', 'l2', 'ncc3', 'Ghế bành 1', 7490000, './image/Ghế/1.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('27', 'l2', 'ncc2', 'Ghế bành 2', 2990000, './image/Ghế/2.jpg', 'brown', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('28', 'l2', 'ncc1', 'Ghế bành 3', 7490000, './image/Ghế/3.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('29', 'l2', 'ncc1', 'Ghế bành 4', 3990000, './image/Ghế/4.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('3', 'l1', 'ncc2', 'Bàn ăn 2', 1990000, './image/Bàn/3.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('30', 'l2', 'ncc4', 'Ghế bành 5', 4990000, './image/Ghế/5.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('31', 'l2', 'ncc3', 'Ghế bành 6', 4990000, './image/Ghế/6.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('32', 'l2', 'ncc2', 'Ghế bành 7', 4990000, './image/Ghế/7.jpg', 'gray', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('33', 'l2', 'ncc1', 'Ghế bành 8', 3990000, './image/Ghế/8.jpg', 'brown', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('34', 'l2', 'ncc3', 'Ghế bành 9', 9990000, './image/Ghế/9.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('35', 'l2', 'ncc2', 'Ghế bành 10', 7490000, './image/Ghế/10.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('36', 'l2', 'ncc1', 'Ghế bập bênh 1', 1990000, './image/Ghế/11.jpg', 'yellow', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('37', 'l2', 'ncc1', 'Ghế bập bênh 2', 4990000, './image/Ghế/12.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('38', 'l2', 'ncc4', 'Ghế thư giản Rcliner', 7990000, './image/Ghế/13.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('39', 'l2', 'ncc2', 'Ghế bành 11', 3990000, './image/Ghế/14.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('4', 'l1', 'ncc3', 'Bàn ăn 3', 3490000, './image/Bàn/4.jpg', 'brown', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('40', 'l2', 'ncc3', 'Ghế bập bênh 3', 2490000, './image/Ghế/15.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('41', 'l2', 'ncc4', 'Ghế bành 12', 990000, './image/Ghế/16.jpg', 'red', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('42', 'l2', 'ncc2', 'Đệm ngồi', 1190000, './image/Ghế/17.jpg', 'brown', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('43', 'l2', 'ncc1', 'Ghế bành 13', 1490000, './image/Ghế/18.jpg', 'red', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('44', 'l2', 'ncc4', 'Ghế bành 14', 5990000, './image/Ghế/19.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('45', 'l2', 'ncc2', 'Ghế đôn cao', 8990000, './image/Ghế/20.jpg', 'yellow', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('46', 'l2', 'ncc3', 'Ghế đôn 1', 499000, './image/Ghế/21.jpg', 'blue', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('47', 'l2', 'ncc2', 'Ghế đôn 2', 199000, './image/Ghế/22.jpg', 'yellow', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('48', 'l2', 'ncc1', 'Ghế đôn 3', 499000, './image/Ghế/23.jpg', 'white', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('49', 'l2', 'ncc2', 'Ghế đôn 4', 499000, './image/Ghế/24.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('5', 'l1', 'ncc4', 'Bàn ăn 4', 2990000, './image/Bàn/5.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('50', 'l2', 'ncc4', 'Ghế ăn 1', 699000, './image/Ghế/25.jpg', 'yellow', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('51', 'l2', 'ncc2', 'Ghế ăn 2', 1490000, './image/Ghế/26.jpg', 'yellow', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('52', 'l2', 'ncc3', 'Ghế ăn 3', 699000, './image/Ghế/27.jpg', 'white', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('53', 'l2', 'ncc1', 'Ghế ăn 4', 499000, './image/Ghế/28.jpg', 'yellow', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('54', 'l2', 'ncc1', 'Ghế ăn 5', 699000, './image/Ghế/29.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('55', 'l2', 'ncc2', 'Ghế ăn 6', 749000, './image/Ghế/30.jpg', 'white', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('56', 'l2', 'ncc2', 'Ghế ăn 7', 749000, './image/Ghế/31.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('57', 'l2', 'ncc4', 'Ghế ngoài trời', 399000, './image/Ghế/32.jpg', 'brown', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('58', 'l2', 'ncc3', 'Ghế ăn 8', 895000, './image/Ghế/33.jpg', 'white', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('59', 'l2', 'ncc2', 'Ghế ăn 9', 1390000, './image/Ghế/34.jpg', 'brown', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('6', 'l1', 'ncc2', 'Bàn cà phê 2', 3490000, './image/Bàn/6.jpg', 'brown', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('60', 'l2', 'ncc1', 'Ghế ăn 10', 1090000, './image/Ghế/35.jpg', 'black', 'Ghế đẩu MOZART do BAYA thiết kế được làm từ gỗ keo sơn trắng với đệm ngồi bọc PVC, đem đến vẻ đẹp sang trọng cho không gian sống. Hãy kết hợp sử dụng chiếc ghế này với các món nội thất khác trong bộ sưu tập MOZART từ BAYA', 30, 0, 0, 1),
('61', 'l3', 'ncc2', 'Giường Akio', 12900000, './image/Giường/1.jpg', 'brown', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('62', 'l3', 'ncc4', 'Giường Yokohama', 3990000, './image/Giường/2.jpg', 'white', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('63', 'l3', 'ncc3', 'Giường tầng Grafitti', 4490000, './image/Giường/3.jpg', 'black', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('64', 'l3', 'ncc1', 'Giường cơ bản', 3000000, './image/Giường/4.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('65', 'l3', 'ncc3', 'Giường Atila', 7990000, './image/Giường/5.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('66', 'l3', 'ncc2', 'Giường Albany', 6490000, './image/Giường/6.jpg', 'brown', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('67', 'l3', 'ncc2', 'Giường Bernie', 5490000, './image/Giường/8.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('68', 'l3', 'ncc4', 'Giường Rally', 6490000, './image/Giường/9.jpg', 'white', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('69', 'l3', 'ncc1', 'Giường Harris 1', 5990000, './image/Giường/10.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('7', 'l1', 'ncc3', 'Bàn ngoài trời 1', 3490000, './image/Bàn/7.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1),
('70', 'l3', 'ncc2', 'Giường Harris 2', 7990000, './image/Giường/11.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('71', 'l3', 'ncc3', 'Giường Keiko', 9490000, './image/Giường/12.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('72', 'l3', 'ncc4', 'Giường Ali 1', 5500000, './image/Giường/13.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('73', 'l3', 'ncc1', 'Giường Ali 2', 4500000, './image/Giường/14.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('74', 'l3', 'ncc2', 'Giường Ali 3', 3500000, './image/Giường/15.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('75', 'l3', 'ncc3', 'Giường Kitka', 7500000, './image/Giường/17.jpg', 'black', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('76', 'l3', 'ncc1', 'Giường Ali 4', 5500000, './image/Giường/18.jpg', 'yellow', 'Được thiết kế đơn giản và tự nhiên với chất liệu gỗ keo bền chắc, gương treo tường CATCH mang lại nét hiện đại, trang nhã cho không gian sống của bạn. Sản phẩm có thể đặt tại nhiều khu vực như sảnh và lối vào, phòng ngủ, phòng tắm… thuận tiện cho việc nhìn ngắm mình trong gương của chủ nhân và trang trí cho ngôi nhà thêm cảm hứng.', 30, 0, 0, 1),
('77', 'l4', 'ncc2', 'Tủ kính 1', 3990000, './image/Tủ/1.jpg', 'white', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('78', 'l4', 'ncc3', 'Tủ kính 2', 9990000, './image/Tủ/2.jpg', 'black', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('79', 'l4', 'ncc4', 'Tủ kính 3', 7490000, './image/Tủ/3.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('8', 'l1', 'ncc3', 'Bàn cà phê 3', 590000, './image/Bàn/8.jpg', 'yellow', 'Bàn cà phê là món đồ dùng không thể thiếu trong bất kỳ phòng khách nào. Đến BAYA và mang về bàn cà phê GONZALES được làm từ chất liệu gỗ MDF cao cấp, bền chắc, phủ lớp sơn đen sang trọng. Chân bàn vững chắc với kết cấu lạ mắt cùng chất liệu kim loại không gỉ. Kết hợp bàn cùng các sản phẩm khác trong cùng bộ sưu tập để hoàn thiện nội thất gia đình bạn.', 30, 0, 0, 1),
('80', 'l4', 'ncc1', 'Tủ bát đĩa 1', 8490000, './image/Tủ/4.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('81', 'l4', 'ncc2', 'Tủ bát đĩa 2', 7990000, './image/Tủ/5.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('82', 'l4', 'ncc3', 'Tủ bát đĩa 3', 7990000, './image/Tủ/6.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('83', 'l4', 'ncc4', 'Tủ quần áo 1', 6490000, './image/Tủ/7.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('84', 'l4', 'ncc2', 'Tủ quần áo 2', 4990000, './image/Tủ/8.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('85', 'l4', 'ncc3', 'Tủ quần áo 3', 3490000, './image/Tủ/9.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('86', 'l4', 'ncc1', 'Tủ bát đĩa 4', 9990000, './image/Tủ/10.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('87', 'l4', 'ncc1', 'Tủ bát đĩa 5', 3990000, './image/Tủ/11.jpg', 'white', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('88', 'l4', 'ncc2', 'Tủ quần áo 4', 21900000, './image/Tủ/12.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('89', 'l4', 'ncc3', 'Tủ quần áo 5', 3290000, './image/Tủ/13.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('9', 'l1', 'ncc2', 'Bàn góc', 1190000, './image/Bàn/9.jpg', 'yellow', 'Bàn ăn PALERMO là lựa chọn hoàn hảo cho không gian phòng ăn trang nhã và hiện đại. Bàn làm từ gỗ thông bền nhẹ, vững chãi, chống mối mọt tốt. Sản phẩm được thiết kế đơn giản, phối mặt kính cao cấp khó trầy xước và dễ dàng vệ sinh. Kết hợp bàn ăn PALERMO với ghế ăn từ nội thất BAYA để hoàn thiện phòng ăn tiện nghi và đẹp mắt', 30, 0, 0, 1);
INSERT INTO `sanpham` (`masp`, `maloai`, `mancc`, `tensp`, `gia`, `hinhanh`, `mau`, `thongtinsanpham`, `soluong`, `danhgia`, `luotxem`, `trangthai`) VALUES
('90', 'l4', 'ncc4', 'Tủ quần áo 6', 5490000, './image/Tủ/14.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('91', 'l4', 'ncc2', 'Tủ quần áo 7', 6990000, './image/Tủ/15.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('92', 'l4', 'ncc2', 'Tủ quần áo 8', 12900000, './image/Tủ/16.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('93', 'l4', 'ncc1', 'Tủ quần áo 9', 3990000, './image/Tủ/17.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('94', 'l4', 'ncc4', 'Tủ ngăn kéo 1', 3990000, './image/Tủ/18.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('95', 'l4', 'ncc2', 'Tủ ngăn kéo 2', 2990000, './image/Tủ/19.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('96', 'l4', 'ncc1', 'Tủ ngăn kéo 3', 4990000, './image/Tủ/20.jpg', 'yellow', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('97', 'l4', 'ncc3', 'Tủ ngăn kéo 4', 7990000, './image/Tủ/21.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('98', 'l4', 'ncc2', 'Tủ ngăn kéo 5', 6490000, './image/Tủ/22.jpg', 'black', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1),
('99', 'l4', 'ncc4', 'Tủ ngăn kéo 6', 6990000, './image/Tủ/23.jpg', 'brown', 'Tủ kính MOZART được thiết kế bởi BAYA sẽ là nơi trưng bày và lưu trữ lý tưởng cho bộ bát đĩa yêu thích hay những vật lưu niệm của bạn. Sản phẩm có khung gỗ chắc chắn, thiết kế có cửa kính gồm nhiều tầng chứa kèm hai ngăn kéo tiện dụng. Mặt trên cùng được giữ lại màu gỗ tự nhiên kết hợp với thân tủ phủ sơn trắng giúp đem lại vẻ đẹp trang nhã, sang trọng cho căn phòng. Hãy bổ sung thêm các món nội thất khác trong bộ sưu tập MOZART từ BAYA cho tổ ấm của mình.', 30, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan` varchar(20) CHARACTER SET utf8 NOT NULL,
  `matkhau` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ma` varchar(5) CHARACTER SET utf8 NOT NULL,
  `loai` varchar(20) CHARACTER SET utf8 NOT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `matv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `loaikh` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ho` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sodienthoai` varchar(15) CHARACTER SET utf8 NOT NULL,
  `gmail` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ngaytao` datetime NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`matv`, `loaikh`, `ho`, `ten`, `diachi`, `sodienthoai`, `gmail`, `ngaytao`, `trangthai`) VALUES
('tv1', 'lkh2', 'Nguyễn', 'Phong Phú', 'A1/20q, ấp 1, xã Vĩnh Lộc A, H.Bình Chánh', '0367945523', 'phongphunguyen7575@gmail.com', '2021-03-13 00:00:00', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`macv`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD KEY `masp` (`masp`),
  ADD KEY `matk` (`matk`);

--
-- Chỉ mục cho bảng `ctdathang`
--
ALTER TABLE `ctdathang`
  ADD KEY `madh` (`madh`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD KEY `madh` (`madh`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD KEY `mahd` (`mahd`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  ADD KEY `mahdn` (`mahdn`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `manv` (`manv`),
  ADD KEY `mancc` (`mancc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `matv` (`matv`);

--
-- Chỉ mục cho bảng `dsquyen`
--
ALTER TABLE `dsquyen`
  ADD PRIMARY KEY (`maq`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `matv` (`matv`),
  ADD KEY `manv` (`manv`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`mahdn`),
  ADD KEY `manv` (`manv`),
  ADD KEY `mancc` (`mancc`);

--
-- Chỉ mục cho bảng `loaikhachhang`
--
ALTER TABLE `loaikhachhang`
  ADD PRIMARY KEY (`maloaikh`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`mancc`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`),
  ADD KEY `chucvu` (`chucvu`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD KEY `macv` (`macv`),
  ADD KEY `maq` (`maq`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `maloai` (`maloai`),
  ADD KEY `mancc` (`mancc`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`matv`),
  ADD KEY `loaikh` (`loaikh`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`taikhoan`);

--
-- Các ràng buộc cho bảng `ctdathang`
--
ALTER TABLE `ctdathang`
  ADD CONSTRAINT `ctdathang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `dathang` (`madh`),
  ADD CONSTRAINT `ctdathang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`),
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  ADD CONSTRAINT `cthoadonnhap_ibfk_1` FOREIGN KEY (`mahdn`) REFERENCES `hoadonnhap` (`mahdn`),
  ADD CONSTRAINT `cthoadonnhap_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`matv`) REFERENCES `thanhvien` (`matv`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`matv`) REFERENCES `thanhvien` (`matv`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`);

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `hoadonnhap_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`),
  ADD CONSTRAINT `hoadonnhap_ibfk_2` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`chucvu`) REFERENCES `chucvu` (`macv`);

--
-- Các ràng buộc cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD CONSTRAINT `nhomquyen_ibfk_1` FOREIGN KEY (`macv`) REFERENCES `chucvu` (`macv`),
  ADD CONSTRAINT `nhomquyen_ibfk_2` FOREIGN KEY (`maq`) REFERENCES `dsquyen` (`maq`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loaisanpham` (`maloai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`);

--
-- Các ràng buộc cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `thanhvien_ibfk_1` FOREIGN KEY (`loaikh`) REFERENCES `loaikhachhang` (`maloaikh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

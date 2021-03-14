-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2021 lúc 09:03 AM
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloai` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tenloai` varchar(30) CHARACTER SET utf8 NOT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('ncc1', 'Công ty TNHH đồ nội thất phố xuân', '0367945523', '321 Hàm Xuân, Hà Nội', 'phoxuan@dogo.com');

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
  `ngayvaolam` datetime NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `macv` varchar(5) CHARACTER SET utf8 NOT NULL,
  `maq` varchar(5) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `thongtinsanpham` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `danhgia` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

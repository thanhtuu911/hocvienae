-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 11:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hocvienae`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

CREATE TABLE `dangky` (
  `id` int(11) NOT NULL,
  `hocvien_id` int(11) DEFAULT NULL,
  `lophoc_id` int(11) DEFAULT NULL,
  `ngaydangky` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Du Học'),
(2, 'Chứng Chỉ Ngoại Ngữ'),
(3, 'Tiếng Anh Giao Tiếp');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`id`, `hoten`, `email`, `sodienthoai`, `hinhanh`) VALUES
(1, 'Cao Hồng Hoa', NULL, NULL, NULL),
(2, 'Võ Hoàng Anh Đào', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `hocvien_id` int(11) DEFAULT NULL,
  `ngaythanhtoan` date DEFAULT NULL,
  `tongcong` float DEFAULT NULL,
  `nguoidung_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadonct`
--

CREATE TABLE `hoadonct` (
  `id` int(11) NOT NULL,
  `hoadon_id` int(11) DEFAULT NULL,
  `lophoc_id` int(11) DEFAULT NULL,
  `thanhtien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE `hocvien` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `namsinh` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`id`, `hoten`, `namsinh`, `gioitinh`, `email`, `sodienthoai`, `diachi`, `hinhanh`) VALUES
(1, 'Ngô Hoàng Ân', '1/1/2003', 'Nam', 'nha@aea.com', '0123456789', 'An Giang', NULL),
(2, 'Phạm Nhật Cường', '1/2/2004', 'Nam', 'pnc@ae.com', '0122345678', 'Châu Thành', NULL),
(14, 'Tuuu', '', '', '', '', '', 'image/courses/'),
(15, 'Thanhh', '', '', '', '', '', 'image/courses/');

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(11) NOT NULL,
  `hocvien_id` int(11) DEFAULT NULL,
  `lophoc_id` int(11) DEFAULT NULL,
  `ketqua` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id` int(11) NOT NULL,
  `danhmuc_id` int(11) DEFAULT NULL,
  `tenkhoahoc` varchar(255) NOT NULL,
  `chitiet` varchar(5000) NOT NULL,
  `phi` float DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `danhmuc_id`, `tenkhoahoc`, `chitiet`, `phi`, `hinhanh`) VALUES
(1, 1, 'Du Học Mỹ', '<p>Du Học Mỹ</p>', 249900000, 'usa.jpg'),
(2, 1, 'Du Học Đức', '<p>Du Học Đức</p>', 240000000, 'duc.jpg'),
(3, 1, 'Du Học Canada', '<p>Du Học Canada</p>', 280000000, NULL),
(4, 1, 'Du Học Úc', '<p>Du Học Úc</p>', 286800000, 'uc.jpg'),
(5, 2, 'B1', '<p>Chứng Chỉ B1</p>', 15000000, NULL),
(6, 2, 'IELTS ', '<p>Chứng Chỉ IELTS</p>', 20000000, NULL),
(7, 3, 'Nghe Nói Căn Bản', '<p>Nghe nói căn bản</p>', 8000000, NULL),
(11, 2, 'C1', '<p>Căng như dây đàn</p>', 4600000, 'image/courses/');

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `id` int(11) NOT NULL,
  `tenlop` varchar(255) NOT NULL,
  `ngaybatdau` date DEFAULT NULL,
  `ngayketthuc` date DEFAULT NULL,
  `giaovien_id` int(11) DEFAULT NULL,
  `khoahoc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`id`, `tenlop`, `ngaybatdau`, `ngayketthuc`, `giaovien_id`, `khoahoc_id`) VALUES
(1, 'K1', '2024-01-01', '2024-04-01', 1, 6),
(2, 'K2', '2024-01-01', '2024-03-01', 2, 7),
(3, 'K3', '2024-03-18', '2024-03-23', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `loai` tinyint(4) DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'admin@ae.com', NULL, '123', 'Admin', 1, 1, NULL),
(2, 'tu@ae.com', '0398761711', '123', 'Thanh Tus', 2, 1, '2.jpg'),
(3, 'e5@ae.com', '0379111556', '123', 'Hoài Thanh', 2, 1, '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocvien_id` (`hocvien_id`),
  ADD KEY `lophoc_id` (`lophoc_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Indexes for table `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `lophoc_id` (`lophoc_id`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocvien_id` (`hocvien_id`),
  ADD KEY `lophoc_id` (`lophoc_id`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khoahoc_id` (`khoahoc_id`),
  ADD KEY `giaovien_id` (`giaovien_id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadonct`
--
ALTER TABLE `hoadonct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dangky`
--
ALTER TABLE `dangky`
  ADD CONSTRAINT `dangky_ibfk_1` FOREIGN KEY (`hocvien_id`) REFERENCES `hocvien` (`id`),
  ADD CONSTRAINT `dangky_ibfk_2` FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Constraints for table `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD CONSTRAINT `hoadonct_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `hoadonct_ibfk_2` FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

--
-- Constraints for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`hocvien_id`) REFERENCES `hocvien` (`id`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

--
-- Constraints for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`khoahoc_id`) REFERENCES `khoahoc` (`id`),
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`giaovien_id`) REFERENCES `giaovien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

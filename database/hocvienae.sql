-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2024 lúc 05:09 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hocvienae`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangdiem`
--

CREATE TABLE `bangdiem` (
  `id` int(11) NOT NULL,
  `dangkyhoc_id` int(11) DEFAULT NULL,
  `diem` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkyhoc`
--

CREATE TABLE `dangkyhoc` (
  `id` int(11) NOT NULL,
  `hocvien_id` int(11) DEFAULT NULL,
  `lophoc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkyhoc`
--

INSERT INTO `dangkyhoc` (`id`, `hocvien_id`, `lophoc_id`) VALUES
(1, 2, 1),
(2, 17, 1),
(3, 2, 2),
(4, 25, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Du Học'),
(2, 'Chứng Chỉ Ngoại Ngữ'),
(3, 'Tiếng Anh Giao Tiếp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`id`, `hoten`, `email`, `sodienthoai`, `hinhanh`) VALUES
(1, 'Cao Hồng Hoa', NULL, NULL, NULL),
(2, 'Võ Hoàng Anh Đào', NULL, NULL, NULL),
(3, 'MR. LEON NGUYEN', NULL, NULL, NULL),
(4, 'MS. ELIANE', NULL, NULL, NULL),
(5, 'MR. SIMON', NULL, NULL, NULL),
(6, 'MS. KARLIE NGUYEN', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) DEFAULT NULL,
  `ngaythanhtoan` datetime DEFAULT current_timestamp(),
  `tongtien` float DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `nguoidung_id`, `ngaythanhtoan`, `tongtien`, `ghichu`) VALUES
(1, 4, '2024-03-27 14:46:37', 249900000, NULL),
(2, 6, '2024-03-30 16:27:24', 264900000, NULL),
(3, 7, '2024-04-03 16:12:10', 488000000, NULL),
(4, 7, '2024-04-03 16:22:27', 23000000, NULL),
(5, 26, '2024-04-05 10:17:55', 259000000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonct`
--

CREATE TABLE `hoadonct` (
  `id` int(11) NOT NULL,
  `hoadon_id` int(11) DEFAULT NULL,
  `khoahoc_id` int(11) DEFAULT NULL,
  `dongia` float DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `thanhtien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonct`
--

INSERT INTO `hoadonct` (`id`, `hoadon_id`, `khoahoc_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(1, 1, 1, 249900000, 1, 249900000),
(2, 2, 5, 15000000, 1, 15000000),
(3, 2, 1, 249900000, 1, 249900000),
(4, 3, 2, 240000000, 2, 480000000),
(5, 3, 7, 8000000, 1, 8000000),
(6, 4, 5, 15000000, 1, 15000000),
(7, 4, 7, 8000000, 1, 8000000),
(8, 5, 2, 240000000, 1, 240000000),
(9, 5, 12, 10000000, 1, 10000000),
(10, 5, 13, 9000000, 1, 9000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `namsinh` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`id`, `hoten`, `namsinh`, `gioitinh`, `email`, `sodienthoai`, `diachi`, `hinhanh`, `created_at`) VALUES
(1, 'Ngô Hoàng Ân', '1/1/2003', 'Nam', 'nha@aea.com', '0123456789', 'Long Xuyên', 'image/student/st01.jpg', '2024-03-29 10:29:43'),
(2, 'Phạm Nhật Cường', '1/2/2004', 'Nam', 'pnc@ae.com', '0122345678', 'Châu Thành', 'image/student/st02.jpg', '2024-03-29 10:29:43'),
(16, 'Nguyễn Thanh Tú', '2002', 'Nam', 'tu@ae.com', '0398761711', 'Châu Phú, An Giang ', 'image/studenta2.jpg', '2024-03-20 10:29:43'),
(17, 'Nguyễn Hoài Thanh', '2002', 'Nam', 'e5@ae.com', '0379111556', 'Thốt Nốt, Cần Thơ', 'image/studente5.jpg', '2024-03-20 10:29:43'),
(18, 'Nguyễn Sỹ Dân', '3/4/2002', 'Nam', NULL, '083799377', 'Châu Phú, An Giang', 'image/student/st03.jpg', '2024-03-29 10:29:43'),
(19, 'Dương Nguyễn Quốc Dân', '2003', 'Nam', NULL, '0288227873', 'Châu Thành,An Giang', 'image/student/st04.jpg', '2024-03-29 10:29:43'),
(20, 'Phan Tiến Đạt', '2001', 'Nam', NULL, '0276867832', 'Mỹ Hòa, Thoại Sơn, An Giang', 'image/student/st05.jpg', '2024-03-29 10:29:43'),
(21, 'Nguyễn Lập Đông', '2004', 'Nam', NULL, '0987397673', 'Mỹ Thới, Long Xuyên, AG', 'image/student/st06.jpg', '2024-03-29 10:29:43'),
(22, 'Huỳnh Đức Duy', '2005', 'Nam', NULL, '0536735762', 'Đông Xuyên, LX, AG', 'image/student/st07.jpg', '2024-03-29 10:29:43'),
(23, 'Đặng Nhật Lê Huy', '2004', 'Nam', NULL, '0738636782', 'Mỹ Xuyên, LX, AG', 'image/student/st08.jpg', '2024-03-29 10:29:43'),
(24, 'Nguyễn Trí Khanh', '2003', 'Nam', NULL, '0363682763', 'Long Xuyên, An Giang', 'image/student/st09.jpg', '2024-03-29 10:29:43'),
(25, 'Đào Anh Khoa', '2001', 'Nam', NULL, '026628872676', 'Chợ Mới, An Giang', 'image/student/st10.jpg', '2024-03-29 10:29:43'),
(26, 'Hàn Lâm Khởi', '2003', 'Nam', NULL, '05582636822', 'LX, AG', 'image/student/st11.jpg', '2024-03-29 10:29:43'),
(27, 'Nguyễn Thị Phương Nghi', '2005', 'Nữ', NULL, '0251257112', 'Mỹ Long, LX, AG', 'image/student/st12.jpg', '2024-03-29 10:29:43'),
(28, 'Nguyễn Như Ngọc', '2004', 'Nữ', NULL, '02892287287', 'LX, AG', 'image/student/st13.jpg', '2024-03-29 10:29:43'),
(29, 'Nguyễn Thị Ngọc Nhi', '2006', 'Nữ', NULL, '0736863263', 'Chợ Mới, An Giang', 'image/student/st14.jpg', '2024-03-29 10:29:43'),
(30, 'Nguyễn Thị Yến Nhi', '2007', 'Nữ', NULL, '0292287322', 'Mỹ Luông, Chợ Mới , AG', 'image/student/st15.jpg', '2024-03-29 10:29:43'),
(31, 'Lê Nguyễn Quỳnh Như', '2004', 'Nữ', NULL, '02786827816', 'AG', 'image/student/st16.jpg', '2024-03-29 10:29:43'),
(32, 'Trịnh Thị Ngọc Như', '1999', 'Nữ', NULL, '0290278736', 'TN,CT', 'image/student/st17.jpg', '2024-03-29 10:29:43'),
(33, 'Lâm Thành Nhựt', '2002', 'Nam', NULL, '0298265534', 'Mỹ Phước, LX, AG', 'image/student/st18.jpg', '2024-03-29 10:29:43'),
(34, 'Âu Lâm Thành', '2002', 'Nam', NULL, '0898287222', 'Mỹ Thới,LX AG', 'image/student/st19.jpg', '2024-03-29 10:29:43'),
(35, 'Lê Quốc Toàn', '2002', 'Nữ', NULL, '02552415878', 'Cần Đăng, Châu Thành, AG', 'image/student/st20.jpg', '2024-03-29 10:29:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(11) NOT NULL,
  `hocvien_id` int(11) DEFAULT NULL,
  `lophoc_id` int(11) DEFAULT NULL,
  `ketqua` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
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
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `danhmuc_id`, `tenkhoahoc`, `chitiet`, `phi`, `hinhanh`) VALUES
(1, 1, 'Du Học Mỹ', '<p>Du học Mỹ là quá trình học tập tại các trường đại học, cao đẳng hoặc trung học chuyên nghiệp tại Hoa Kỳ. Mỹ được biết đến với hệ thống giáo dục đa dạng và uy tín, với nhiều trường đại học hàng đầu thế giới. Du học sinh tại Mỹ có cơ hội tiếp cận các chương trình học đa dạng và các ngành nghề phong phú, cũng như tham gia vào nghiên cứu và phát triển công nghệ tiên tiến. Ngoài ra, Mỹ cũng cung cấp một môi trường học tập và sinh sống đa văn hóa, đồng thời mở ra cơ hội nghề nghiệp và sự phát triển cá nhân cho du học sinh.</p>', 249900000, 'image/courses/usa.jpg'),
(2, 1, 'Du Học Đức', '<p>Du học Đức là quá trình học tập tại các trường đại học, cao đẳng hoặc trung học chuyên nghiệp tại Đức. Đức nổi tiếng với hệ thống giáo dục đa dạng và chất lượng cao, với nhiều trường đại học hàng đầu thế giới. Du học sinh tại Đức có cơ hội tiếp cận các chương trình học phong phú và các lĩnh vực chuyên ngành đa dạng, cũng như tham gia vào nghiên cứu và phát triển công nghệ tiên tiến. Ngoài ra, Đức cũng cung cấp môi trường học tập và sinh sống đa văn hóa, đồng thời mở ra cơ hội nghề nghiệp và sự phát triển cá nhân cho du học sinh.</p>', 240000000, 'image/courses/duc.jpg'),
(3, 1, 'Du Học Canada', '<p>Du học Canada là quá trình học tập tại các trường đại học, cao đẳng hoặc trung học chuyên nghiệp tại Canada. Canada nổi tiếng với hệ thống giáo dục chất lượng cao, môi trường học tập an toàn và thân thiện, cùng với sự đa dạng văn hóa và ngôn ngữ. Du học sinh tại Canada có cơ hội tiếp cận các chương trình học phong phú và các ngành nghề đa dạng, cũng như tham gia vào các hoạt động ngoại khóa và văn hóa. Ngoài ra, Canada cũng cung cấp cơ hội làm việc sau khi tốt nghiệp và định cư lâu dài cho những người muốn ở lại.</p>', 280000000, 'image/courses/canada.jpg'),
(4, 1, 'Du Học Úc', '<p>Du học Úc là quá trình học tập ở các trường đại học, cao đẳng hoặc trung học chuyên nghiệp tại Úc. Úc được biết đến với hệ thống giáo dục chất lượng cao, với nhiều trường đại học và cao đẳng nằm trong danh sách các trường hàng đầu trên thế giới. Du học sinh tại Úc có cơ hội trải nghiệm một môi trường học tập đa dạng, tiếp cận các chương trình và ngành học đa dạng, cùng với một cộng đồng sinh viên quốc tế đầy màu sắc. Ngoài ra, du học sinh cũng có cơ hội tham gia vào các hoạt động văn hóa, thể thao và xã hội, tạo điều kiện cho trải nghiệm đa chiều và phát triển cá nhân toàn diện.</p>', 286800000, 'image/courses/uc.jpg'),
(5, 2, 'B1', '<p>Chứng chỉ B1 là một trong những cấp độ của Khung Tham chiếu Châu Âu về Ngôn ngữ (CEFR), viết tắt của Common European Framework of Reference for Languages. Đối với tiếng Anh, B1 đại diện cho một trình độ trung bình, cung cấp khả năng giao tiếp cơ bản trong nhiều tình huống hàng ngày. Người học ở cấp độ này có khả năng hiểu và sử dụng các cụm từ cơ bản, diễn đạt ý kiến ​​và đặt câu hỏi đơn giản, cũng như hiểu và phản ứng trong các tình huống thông thường như mua sắm, du lịch, hoặc trò chuyện cơ bản với người bản xứ. Chứng chỉ B1 thường được yêu cầu cho việc xin visa, du học hoặc làm việc tại một số quốc gia.</p>', 15000000, 'image/courses/B1.jpg'),
(6, 2, 'IELTS ', '<p>Chứng chỉ ELITS (English Language International Testing System) là một hệ thống kiểm tra tiếng Anh quốc tế được thiết kế để đánh giá và đánh giá kỹ năng sử dụng tiếng Anh của người học ở mọi cấp độ, từ cơ bản đến nâng cao. ELITS đánh giá các kỹ năng ngôn ngữ cần thiết trong các tình huống thực tế, bao gồm nghe, nói, đọc và viết. Chứng chỉ này thường được sử dụng cho mục đích du học, làm việc và sinh sống ở các quốc gia nói tiếng Anh. ELITS thường được coi là một phần tử quan trọng trong quá trình chứng minh khả năng sử dụng tiếng Anh của cá nhân trong môi trường quốc tế.</p>', 20000000, 'image/courses/ielts.jpg'),
(7, 3, 'Nghe Nói Căn Bản', '<p>Khóa học mang lại cho người học kỹ năng, kinh nghiệm giao tiếp và những chủ đề giao tiếp căn bản.</p>', 8000000, 'image/courses/nghenoicanban.jpg\r\n'),
(8, 2, 'C1', '<p>Căng như dây đàn</p>', 4600000, 'image/courses/C1.jpg'),
(12, 3, 'Tiếng anh cơ bản', 'Khóa học này giúp người học nâng cao kỹ năng giao tiếp trong cuộc sống. ', 10000000, 'image/courses/tienganhcoban.jpg'),
(13, 3, 'Tiếng Anh Giao Tiếp 2023', 'Với khóa học này giúp cải thiện khả năng giao tiếp bằng tiếng anh với những chủ đề quen thuộc trong cuộc sống hằng ngày.', 9000000, 'image/courses/chudegiaotiep2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `tuoi` varchar(4) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `tenkhoahoc` varchar(20) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoten`, `tuoi`, `sdt`, `email`, `diachi`, `tenkhoahoc`, `noidung`, `created_at`) VALUES
(1, 'Tú', 'Chọn', '0398761711', 'tu@ae.com', '', 'B1', '', '2024-03-30 03:10:26'),
(2, 'Lê Minh Thông', '22', '0998445667', 'lmt@gmail.com', 'Long Xuyên', 'B1', 'Tôi muốn liên hệ với trung tâm bạn để đăng ký khóa học B1.', '2024-04-05 03:19:59'),
(3, 'Lê Minh Thông', '22', '0998776555', 'lmt@ae.com', 'Cần Đăng , Châu Thành, An Giang', 'Du học Đức', 'Tôi muốn đăng ký khóa du học Đức', '2024-04-05 03:25:43'),
(4, 'Lê Minh Thông', '22', '0998776555', 'lmt@ae.com', 'Cần Đăng , Châu Thành, An Giang', 'Du học Đức', 'Tôi muốn đăng ký khóa du học Đức', '2024-04-05 03:26:32'),
(5, 'Lê Minh Thông', '22', '0998776555', 'lmt@ae.com', 'Cần Đăng , Châu Thành, An Giang', 'Du học Đức', 'Tôi muốn đăng ký khóa du học Đức', '2024-04-05 03:26:35'),
(6, 'Lê Quốc Tòn', '22', '0987665443', 'lqt@ae.com', 'Cần Đăng', 'Du học Mỹ', 'Tôi muốn đăng ký du học Mỹ', '2024-04-05 03:29:12'),
(7, 'Lê Quốc Tòn', '22', '0987665443', 'lqt@ae.com', 'Cần Đăng', 'Du học Mỹ', 'Tôi muốn đăng ký du học Mỹ', '2024-04-05 03:29:14'),
(8, 'Lê Quốc Tòn', '22', '0987665443', 'lqt@ae.com', 'Cần Đăng', 'Du học Mỹ', 'Tôi muốn đăng ký du học Mỹ', '2024-04-05 03:29:16'),
(9, 'Lê Quốc Tòn', '22', '0987665443', 'lqt@ae.com', 'Cần Đăng', 'Du học Mỹ', 'Tôi muốn đăng ký du học Mỹ', '2024-04-05 03:29:49'),
(23, 'Âu Lâm Thành', '29', '039576473', 'alt@ae.com', 'Thoại Sơn', 'C1', 'Tôi muốn có bằng C1', '2024-04-05 03:34:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
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
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`id`, `tenlop`, `ngaybatdau`, `ngayketthuc`, `giaovien_id`, `khoahoc_id`) VALUES
(1, 'Lớp Du Học Đức', '2024-03-18', '2024-06-18', 1, 2),
(2, 'Lớp Du Học Úc', '2024-03-22', '2024-10-25', 2, 4),
(3, 'Lớp du học Mỹ', '2024-03-22', '2024-10-25', 2, 1),
(4, 'Lớp chứng chỉ B1', '2024-03-27', '2024-07-27', 1, 5),
(5, 'Du học Canada', '2024-04-03', '2024-10-03', 3, 3),
(6, 'Du học Úc', '2024-04-15', '2024-10-15', 3, 4),
(7, 'Nghe nói căn bản', '2024-02-11', '2024-06-03', 4, 7),
(8, 'Lớp chứng chỉ IELTS', '2024-05-05', '2024-10-05', 5, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT 3,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `hinhanh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`, `created_at`) VALUES
(1, 'admin@ae.com', NULL, '202cb962ac59075b964b07152d234b70', 'Admin', 1, 1, NULL, '2024-04-02 07:13:32'),
(2, 'tu@ae.com', '0398761711', '202cb962ac59075b964b07152d234b70', 'Thanh Tus', 1, 1, '2.jpg', '2024-04-02 07:13:32'),
(3, 'e5@ae.com', '0379111556', '202cb962ac59075b964b07152d234b70', 'Hoài Thanh', 1, 1, '1.jpg', '2024-04-02 07:13:32'),
(4, 'stu1@ae.com', '12345678', '202cb962ac59075b964b07152d234b70', 'Ngô Hoàng Ân', 3, 1, NULL, '2024-04-02 07:13:32'),
(5, 'pnc@ae.com', '0365885992', '202cb962ac59075b964b07152d234b70', 'Phạm Nhật Cường', 3, 1, NULL, '2024-04-02 07:13:32'),
(6, 'alt@ae.com', '0345221558', '202cb962ac59075b964b07152d234b70', 'Âu Lâm Thành', 3, 1, NULL, '2024-04-02 07:13:32'),
(7, 'lqt@ae.com', '0399658412', '202cb962ac59075b964b07152d234b70', 'Lê Quốc Toàn', 3, 1, NULL, '2024-04-02 07:13:32'),
(25, 'nsd@ae.com', '0336998445', '202cb962ac59075b964b07152d234b70', 'Nguyễn Sỹ Dân', 3, 1, NULL, '2024-04-02 07:13:32'),
(26, 'lmt@ae.com', '0998776554', '202cb962ac59075b964b07152d234b70', 'Lê Minh Thông', 3, 1, NULL, '2024-04-05 03:15:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieu`
--

CREATE TABLE `tailieu` (
  `id` int(11) NOT NULL,
  `tenkhoahoc` varchar(255) DEFAULT NULL,
  `duongdan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tailieu`
--

INSERT INTO `tailieu` (`id`, `tenkhoahoc`, `duongdan`) VALUES
(1, 'Khóa Học B1', 'https://drive.google.com/drive/folders/1M5cFh3km262MNHoQdwOhyTuulYNTct13?usp=sharing'),
(2, 'Khóa Học B2', 'https://drive.google.com/drive/folders/19_GrQAqyvfZPC8PuIJxvFoEaVx_eS_jy?usp=drive_link'),
(3, 'Khóa Học C1', 'https://drive.google.com/drive/folders/1xzic2PoeV6WpC6s2TthvrApN41nDtFI7?usp=sharing'),
(4, 'Khóa Học IELTS', 'https://drive.google.com/drive/folders/1FZm4r9ax_MuonoF2KP5taLVrNxHYPOTt?usp=sharing'),
(5, 'Tiếng Anh Giao Tiếp', 'https://drive.google.com/drive/folders/1VssyHEcPE4RxtXW4YrGCSVnsUFBG6pa5?usp=sharing');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dangkyhoc_id` (`dangkyhoc_id`);

--
-- Chỉ mục cho bảng `dangkyhoc`
--
ALTER TABLE `dangkyhoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocvien_id` (`hocvien_id`),
  ADD KEY `lophoc_id` (`lophoc_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `khoahoc_id` (`khoahoc_id`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocvien_id` (`hocvien_id`),
  ADD KEY `lophoc_id` (`lophoc_id`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khoahoc_id` (`khoahoc_id`),
  ADD KEY `giaovien_id` (`giaovien_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dangkyhoc`
--
ALTER TABLE `dangkyhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD CONSTRAINT `bangdiem_ibfk_1` FOREIGN KEY (`dangkyhoc_id`) REFERENCES `dangkyhoc` (`id`);

--
-- Các ràng buộc cho bảng `dangkyhoc`
--
ALTER TABLE `dangkyhoc`
  ADD CONSTRAINT `dangkyhoc_ibfk_1` FOREIGN KEY (`hocvien_id`) REFERENCES `hocvien` (`id`),
  ADD CONSTRAINT `dangkyhoc_ibfk_2` FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

--
-- Các ràng buộc cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD CONSTRAINT `hoadonct_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `hoadonct_ibfk_2` FOREIGN KEY (`khoahoc_id`) REFERENCES `khoahoc` (`id`);

--
-- Các ràng buộc cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`hocvien_id`) REFERENCES `hocvien` (`id`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`);

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`khoahoc_id`) REFERENCES `khoahoc` (`id`),
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`giaovien_id`) REFERENCES `giaovien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `hocvien` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hoten` varchar(255) NOT NULL,
  `namsinh` varchar(255),
  `gioitinh` varchar(255),
  `email` varchar(255),
  `sodienthoai` varchar(255),
  `diachi` varchar(255)
);

CREATE TABLE `danhmuc` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `tendanhmuc` varchar(255)
);

CREATE TABLE `khoahoc` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `danhmuc_id` int,
  `tenkhoahoc` varchar(255) NOT NULL,
  `chitiet` varchar(255) NOT NULL,
  `phi` float
);

CREATE TABLE `giaovien` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255),
  `sodienthoai` varchar(255)
);

CREATE TABLE `lophoc` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `tenlop` varchar(255) NOT NULL,
  `ngaybatdau` date,
  `ngayketthuc` date,
  `giaovien_id` int,
  `khoahoc_id` int
);

CREATE TABLE `dangky` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hocvien_id` int,
  `lophoc_id` int,
  `ngaydangky` date
);

CREATE TABLE `ketqua` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hocvien_id` int,
  `lophoc_id` int,
  `ketqua` float
);

CREATE TABLE `nguoidung` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255),
  `sodienthoai` varchar(255),
  `matkhau` varchar(255),
  `hoten` varchar(255),
  `loai` tinyint,
  `trangthai` tinyint,
  `hinhanh` varchar(255)
);

CREATE TABLE `hoadon` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hocvien_id` INT,
  `ngaythanhtoan` DATE,
  `tongcong` float
);

CREATE TABLE `hoadonct` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hoadon_id` INT,
  `lophoc_id` INT,
  `thanhtien` float
);

ALTER TABLE `lophoc` ADD FOREIGN KEY (`khoahoc_id`) REFERENCES `khoahoc` (`id`);

ALTER TABLE `lophoc` ADD FOREIGN KEY (`giaovien_id`) REFERENCES `giaovien` (`id`);

ALTER TABLE `dangky` ADD FOREIGN KEY (`hocvien_id`) REFERENCES `hocvien` (`id`);

ALTER TABLE `dangky` ADD FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

ALTER TABLE `hoadonct` ADD FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`id`);

ALTER TABLE `hoadonct` ADD FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

ALTER TABLE `khoahoc` ADD FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`);

ALTER TABLE `ketqua` ADD FOREIGN KEY (`hocvien_id`) REFERENCES `hocvien` (`id`);

ALTER TABLE `ketqua` ADD FOREIGN KEY (`lophoc_id`) REFERENCES `lophoc` (`id`);

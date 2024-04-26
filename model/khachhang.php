<?php

class KHACHHANG
{

	// Thêm khách hàng mới, trả về khóa của dòng mới thêm
	public function themkhachhang($email, $sodt, $hoten)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,loai,trangthai)
			VALUES(:email,:matkhau,:sodt,:hoten,3,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email', $email);
			$cmd->bindValue(':matkhau', md5($sodt));
			$cmd->bindValue(':sodt', $sodt);
			$cmd->bindValue(':hoten', $hoten);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function themkhachhangdangky($email, $matkhau, $sodt, $hoten, $namsinh, $gioitinh, $diachi, $hinhanh)
	{
		$db = DATABASE::connect();
		try {
			// Mở giao dịch
			$db->beginTransaction();

			// Thêm dữ liệu vào bảng nguoidung và lấy ID của người dùng
			$sql_nguoidung = "INSERT INTO nguoidung(email, matkhau, sodienthoai, hoten, loai, trangthai, hinhanh)
							  VALUES(:email, :matkhau, :sodt, :hoten, 3, 1, :hinhanh)";
			$cmd_nguoidung = $db->prepare($sql_nguoidung);
			$cmd_nguoidung->bindValue(':email', $email);
			$cmd_nguoidung->bindValue(':matkhau', md5($matkhau));
			$cmd_nguoidung->bindValue(':sodt', $sodt);
			$cmd_nguoidung->bindValue(':hoten', $hoten);
			$cmd_nguoidung->bindValue(':hinhanh', $hinhanh); // Thêm giá trị hình ảnh vào truy vấn
			$cmd_nguoidung->execute();
			$id_nguoidung = $db->lastInsertId();

			// Thêm dữ liệu vào bảng hocvien
			$sql_hocvien = "INSERT INTO hocvien(hoten, namsinh, gioitinh, email, sodienthoai, diachi, hinhanh)
							VALUES(:hoten, :namsinh, :gioitinh, :email, :sodt, :diachi, :hinhanh)";
			$cmd_hocvien = $db->prepare($sql_hocvien);
			$cmd_hocvien->bindValue(':hoten', $hoten);
			$cmd_hocvien->bindValue(':namsinh', $namsinh);
			$cmd_hocvien->bindValue(':gioitinh', $gioitinh);
			$cmd_hocvien->bindValue(':email', $email);
			$cmd_hocvien->bindValue(':sodt', $sodt);
			$cmd_hocvien->bindValue(':diachi', $diachi);
			$cmd_hocvien->bindValue(':hinhanh', $hinhanh); // Thêm giá trị hình ảnh vào truy vấn
			$cmd_hocvien->execute();
			$id_hocvien = $db->lastInsertId();

			// Cập nhật cột hocvien_id trong bảng nguoidung
			$sql_update_nguoidung = "UPDATE nguoidung SET hocvien_id = :hocvien_id, namsinh = :namsinh, gioitinh = :gioitinh, diachi = :diachi WHERE id = :id_nguoidung";
			$cmd_update_nguoidung = $db->prepare($sql_update_nguoidung);
			$cmd_update_nguoidung->bindValue(':hocvien_id', $id_hocvien);
			$cmd_update_nguoidung->bindValue(':namsinh', $namsinh);
			$cmd_update_nguoidung->bindValue(':gioitinh', $gioitinh);
			$cmd_update_nguoidung->bindValue(':diachi', $diachi);
			$cmd_update_nguoidung->bindValue(':id_nguoidung', $id_nguoidung);
			$cmd_update_nguoidung->execute();

			// Commit giao dịch
			$db->commit();

			return $id_nguoidung; // Trả về id của người dùng vừa được thêm
		} catch (PDOException $e) {
			// Nếu có lỗi, rollback giao dịch
			$db->rollBack();
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}




	public function kiemtrakhachhanghople($email, $matkhau)
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1 AND loai=3";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":matkhau", md5($matkhau));
			$cmd->execute();
			$valid = ($cmd->rowCount() == 1);
			$cmd->closeCursor();
			return $valid;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// lấy thông tin người dùng có $email
	public function laythongtinkhachhang($email)
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND loai=3";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function layThongTinNguoiDungTheoHocVienID($hocvien_id)
	{
		$dbcon = DATABASE::connect();
		try {
			$sql = "SELECT *, hinhanh FROM nguoidung WHERE hocvien_id = :hocvien_id";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(':hocvien_id', $hocvien_id);
			$cmd->execute();
			$result = $cmd->fetch(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			// Xử lý ngoại lệ nếu có
			echo "Lỗi: " . $e->getMessage();
			return false; // Trả về false nếu không thể lấy được thông tin người dùng
		}
	}
	public function layHocVienID($nguoidung_id)
	{
		$dbcon = DATABASE::connect();
		try {
			$sql = "SELECT hocvien_id FROM nguoidung WHERE id = :nguoidung_id";
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(':nguoidung_id', $nguoidung_id);
			$cmd->execute();
			$result = $cmd->fetch(PDO::FETCH_ASSOC);
			return $result['hocvien_id'];
		} catch (PDOException $e) {
			// Xử lý ngoại lệ nếu có
			echo "Lỗi: " . $e->getMessage();
			return false; // Trả về false nếu không thể lấy được hocvien_id
		}
	}
	public function layDangKyHocTheoIdHocVien($hocvien_id)
	{
		$dbcon = DATABASE::connect();

		try {
			$sql = "SELECT dangkyhoc.*, lophoc.tenlop
        FROM dangkyhoc
        INNER JOIN lophoc ON dangkyhoc.lophoc_id = lophoc.id
        WHERE dangkyhoc.hocvien_id = :hocvien_id";
			$stmt = $dbcon->prepare($sql);
			$stmt->bindValue(':hocvien_id', $hocvien_id, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll();

			// Trả về danh sách đăng ký học của học viên có ID tương ứng
			return $result;
		} catch (PDOException $e) {
			// Xử lý ngoại lệ nếu có
			echo "Lỗi: " . $e->getMessage();
			return null; // Trả về null nếu có lỗi xảy ra
		}
	}
}

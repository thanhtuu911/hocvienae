<?php
class NGUOIDUNG
{
	// ktnguoidung

	public function kiemtranguoidunghople($email, $matkhau)
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
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
	public function laythongtinnguoidung($email)
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM nguoidung WHERE email=:email";
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

	// lấy tất cả ng dùng
	public function laydanhsachnguoidung()
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM nguoidung";
			$cmd = $db->prepare($sql);
			$cmd->execute();
			$ketqua = $cmd->fetchAll();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Thêm ng dùng mới, trả về khóa của dòng mới thêm
	public function themnguoidung($email, $matkhau, $sodt, $hoten, $loai)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,loai) VALUES(:email,:matkhau,:sodt,:hoten,:loai)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email', $email);
			$cmd->bindValue(':matkhau', md5($matkhau));
			$cmd->bindValue(':sodt', $sodt);
			$cmd->bindValue(':hoten', $hoten);
			$cmd->bindValue(':loai', $loai);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
	public function capnhatnguoidung($id, $email, $sodt, $hoten, $hinhanh)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE nguoidung set hoten=:hoten, email=:email, sodienthoai=:sodt, hinhanh=:hinhanh where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id', $id);
			$cmd->bindValue(':email', $email);
			$cmd->bindValue(':sodt', $sodt);
			$cmd->bindValue(':hoten', $hoten);
			$cmd->bindValue(':hinhanh', $hinhanh);
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi mật khẩu
	public function doimatkhau($email, $matkhau)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE nguoidung set matkhau=:matkhau where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email', $email);
			$cmd->bindValue(':matkhau', md5($matkhau));
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3-khách hàng)
	public function doiloainguoidung($email, $loai)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE nguoidung set loai=:loai where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email', $email);
			$cmd->bindValue(':loai', $loai);
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi trạng thái (0 khóa, 1 kích hoạt)
	public function doitrangthai($id, $trangthai)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE nguoidung set trangthai=:trangthai where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id', $id);
			$cmd->bindValue(':trangthai', $trangthai);
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function laynguoidungTheoNgay($date)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hocvien WHERE DATE(created_at) = :created_at";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':created_at', $date);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu không thể lấy được danh sách học viên
        }
    }
}

<?php
//qltailhoan
class NGUOIDUNG{
	private $id;
    private $email;
    private $sodienthoai;
    private $matkhau;
    private $hoten;
    private $trangthai;
    private $loai;
    private $hinhanh;    
    private $hocvien_id;    
    private $namsinh;    
    private $gioitinh;    
    private $diachi;    

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function getemail(){ return $this->email; }
    public function setemail($value){ $this->email = $value; }
    public function getsodienthoai(){ return $this->sodienthoai; }
    public function setsodienthoai($value){ $this->sodienthoai = $value; }
    public function getmatkhau(){ return $this->matkhau; }
    public function setmatkhau($value){ $this->matkhau = $value; }
    public function gethoten(){ return $this->hoten; }
    public function sethoten($value){ $this->hoten = $value; }
    public function gettrangthai(){ return $this->trangthai; }
    public function settrangthai($value){ $this->trangthai = $value; }
    public function getloai(){ return $this->loai; }
    public function setloai($value){ $this->loai = $value; }
    public function gethinhanh(){ return $this->hinhanh; }
    public function sethinhanh($value){ $this->hinhanh = $value; }
	// Getter cho $namsinh
    public function getNamsinh() {
        return $this->namsinh;
    }

    // Setter cho $namsinh
    public function setNamsinh($namsinh) {
        $this->namsinh = $namsinh;
    }

    // Getter cho $gioitinh
    public function getGioitinh() {
        return $this->gioitinh;
    }

    // Setter cho $gioitinh
    public function setGioitinh($gioitinh) {
        $this->gioitinh = $gioitinh;
    }

    // Getter cho $diachi
    public function getDiachi() {
        return $this->diachi;
    }

    // Setter cho $diachi
    public function setDiachi($diachi) {
        $this->diachi = $diachi;
    }
    
    // Getter cho $diachi
    public function getHocvien_id() {
        return $this->hocvien_id;
    }

    // Setter cho $diachi
    public function setHocvien_id($hocvien_id) {
        $this->hocvien_id = $hocvien_id;
    }
    
	
	public function kiemtranguoidunghople($email,$matkhau){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":matkhau", md5($matkhau));
			$cmd->execute();
			$valid = ($cmd->rowCount () == 1);
			$cmd->closeCursor ();
			return $valid;			
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
	// lấy thông tin người dùng có $email
	public function laythongtinnguoidung($email){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	
	// lấy tất cả ng dùng
	public function laydanhsachnguoidung(){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung";
			$cmd = $db->prepare($sql);			
			$cmd->execute();
			$ketqua = $cmd->fetchAll();			
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Thêm nd mới, trả về khóa của dòng mới thêm
	public function themnguoidung($nguoidung){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,loai) VALUES(:email,:matkhau,:sodienthoai,:hoten,:loai)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$nguoidung->email);
			$cmd->bindValue(':matkhau',md5($nguoidung->matkhau));
			$cmd->bindValue(':sodienthoai',$nguoidung->sodienthoai);
			$cmd->bindValue(':hoten',$nguoidung->hoten);
			$cmd->bindValue(':loai',$nguoidung->loai);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	

	// Cập nhật thông tin ng dùng (tham số: id, họ tên, số đt, email, ảnh đại diện )
	public function capnhatnguoidung($nguoidung){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set hoten=:hoten, email=:email, sodienthoai=:sodt, hinhanh=:hinhanh where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$nguoidung->id);
			$cmd->bindValue(':email',$nguoidung->email);
			$cmd->bindValue(':sodt',$nguoidung->sodt);
			$cmd->bindValue(':hoten',$nguoidung->hoten);
			$cmd->bindValue(':hinhanh',$nguoidung->hinhanh);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi mật khẩu (tham số: email, mật khẩu)
	public function doimatkhau($nguoidung){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set matkhau=:matkhau where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$nguoidung->email);
			$cmd->bindValue(':matkhau',md5($nguoidung->matkhau));
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi quyền (tham số: email, loại người dùng)
	// loại người dùng: 1 - quản trị, 2 - nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3 - khách hàng
	public function doiloainguoidung($nguoidung){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set loai=:loai where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$nguoidung->email);
			$cmd->bindValue(':loai',$nguoidung->loai);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi trạng thái (tham số: id, trạng thái)
	// trạng thái: 0 khóa, 1 kích hoạt)
	public function doitrangthai($nguoidung){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set trangthai=:trangthai where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$nguoidung->id);
			$cmd->bindValue(':trangthai',$nguoidung->trangthai);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
// 	public function layThongTinDangKyHocTheoHocVienID($hocvien_id)
// {
//     $dbcon = DATABASE::connect();
//     try {
//         $sql = "SELECT * FROM dangkyhoc WHERE hocvien_id = :hocvien_id";
//         $cmd = $dbcon->prepare($sql);
//         $cmd->bindValue(':hocvien_id', $hocvien_id);
//         $cmd->execute();
//         $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
//         return $result;
//     } catch (PDOException $e) {
//         // Xử lý ngoại lệ nếu có
//         echo "Lỗi: " . $e->getMessage();
//         return false; // Trả về false nếu không thể lấy được thông tin đăng ký học
//     }
// }
// public function layHocVienID($nguoidung_id)
// {
//     $dbcon = DATABASE::connect();
//     try {
//         $sql = "SELECT hocvien_id FROM nguoidung WHERE id = :nguoidung_id";
//         $cmd = $dbcon->prepare($sql);
//         $cmd->bindValue(':nguoidung_id', $nguoidung_id);
//         $cmd->execute();
//         $result = $cmd->fetch(PDO::FETCH_ASSOC);
//         return $result['hocvien_id'];
//     } catch (PDOException $e) {
//         // Xử lý ngoại lệ nếu có
//         echo "Lỗi: " . $e->getMessage();
//         return false; // Trả về false nếu không thể lấy được hocvien_id
//     }
// }

}
?>

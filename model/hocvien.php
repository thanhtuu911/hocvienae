<?php
class HOCVIEN //tên bảng học viên
{
    private $id;
    private $hoten;
    private $email;
    private $namsinh;
    private $sodienthoai;
    private $diachi;
    private $matkhau;
    private $trangthai;
    private $loai;
    private $hinhanh;    



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
  
    public function getnamsinh(){ return $this->namsinh; }
    public function setnamsinh($value){ $this->namsinh = $value; }
  
    public function getdiachi(){ return $this->diachi; }
    public function setdiachi($value){ $this->diachi = $value; }
  
	
//mà chỉnh xog hết đi hả push luôn
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
	// (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
	public function themnguoidung($email,$matkhau,$sodt,$hoten,$namsinh,$loai,$diachi){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,namsinh,loai,diachi) VALUES(:email,:matkhau,:sodt,:hoten,:namsinh,:loai,:diachi)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($matkhau));
			$cmd->bindValue(':sodt',$sodt);
			$cmd->bindValue(':hoten',$hoten);
            $cmd->bindValue(':namsinh',$namsinh);
			$cmd->bindValue(':loai',$loai);
            $cmd->bindValue(':diachi',$diachi);
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

	// Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
	// (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
	public function capnhatnguoidung($id, $email, $sodt, $hoten, $hinhanh,$namsinh,$diachi)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE nguoidung set hoten=:hoten, email=email,namsinh=namsinh, diachi=diachi, sodienthoai=:sodt, hinhanh=:hinhanh where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id', $id);
			$cmd->bindValue('email', $email);
			$cmd->bindValue(':sodienthoai', $sodt);
			$cmd->bindValue(':hoten', $hoten);
			$cmd->bindValue(':hinhanh', $hinhanh);
            $cmd->bindValue(':namsinh',$namsinh);
            $cmd->bindValue(':diachi',$diachi);
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
			$sql = "UPDATE nguoidung set matkhau=matkhau where email=email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue('email', $email);
			$cmd->bindValue('matkhau', md5($matkhau));
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
			$sql = "UPDATE nguoidung set loai=:loai where email=email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue('email', $email);
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
}

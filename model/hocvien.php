<?php
class HOCVIEN
{
    private $id;
    private $hoten;
    private $namsinh;
    private $gioitinh;
    private $email;
    private $sodienthoai;
    private $diachi;
    private $hinhanh;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gethoten()
    {
        return $this->hoten;
    }

    public function sethoten($value)
    {
        $this->hoten = $value;
    }
    public function getnamsinh()
    {
        return $this->namsinh;
    }

    public function setnamsinh($value)
    {
        $this->namsinh = $value;
    }

    public function getgioitinh()
    {
        return $this->gioitinh;
    }

    public function setgioitinh($value)
    {
        $this->gioitinh = $value;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function setemail($value)
    {
        $this->email = $value;
    }

    public function getsodienthoai()
    {
        return $this->sodienthoai;
    }

    public function setsodienthoai($value)
    {
        $this->sodienthoai = $value;
    }

    public function getdiachi()
    {
        return $this->diachi;
    }

    public function setdiachi($value)
    {
        $this->diachi = $value;
    }

    public function gethinhanh()
    {
        return $this->hinhanh;
    }

    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }

    // Hàm hiển thị danh sách học viên
    public  function layhocvien()
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM hocvien ";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Hàm thêm học viên mới
    public function themhocvien($hocvien)
{
    $dbcon = DATABASE::connect();
    try {
        $sql = "INSERT INTO hocvien (hoten, namsinh, gioitinh, email, sodienthoai, diachi, hinhanh) 
                VALUES (:hoten, :namsinh, :gioitinh, :email, :sodienthoai, :diachi, :hinhanh)";
        $cmd = $dbcon->prepare($sql);
        $cmd->bindValue(':hoten', $hocvien->gethoten());
        $cmd->bindValue(':namsinh', $hocvien->getnamsinh());
        $cmd->bindValue(':gioitinh', $hocvien->getgioitinh());
        $cmd->bindValue(':email', $hocvien->getemail());
        $cmd->bindValue(':sodienthoai', $hocvien->getsodienthoai());
        $cmd->bindValue(':diachi', $hocvien->getdiachi());
        $cmd->bindValue(':hinhanh', $hocvien->gethinhanh());
        return $cmd->execute();
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có
        echo "Lỗi: " . $e->getMessage();
        return false; // Trả về false để biểu thị thất bại khi thêm học viên
    }
}


    // Hàm xóa học viên
    public function xoahocvien($hocvien){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM hocvien WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $hocvien->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Hàm sửa thông tin học viên
    public function suahocvien( $hocvien)
{
    $dbcon = DATABASE::connect();
    try {
        $sql = "UPDATE hocvien 
                SET hoten = :hoten, 
                    namsinh = :namsinh, 
                    gioitinh = :gioitinh, 
                    email = :email, 
                    sodienthoai = :sodienthoai, 
                    diachi = :diachi, 
                    hinhanh = :hinhanh 
                WHERE id = :id";
        $cmd = $dbcon->prepare($sql);
        $cmd->bindValue(':hoten', $hocvien->hoten);
        $cmd->bindValue(':namsinh', $hocvien->namsinh);
        $cmd->bindValue(':gioitinh', $hocvien->gioitinh);
        $cmd->bindValue(':email', $hocvien->email);
        $cmd->bindValue(':sodienthoai', $hocvien->sodienthoai);
        $cmd->bindValue(':diachi', $hocvien->diachi);
        $cmd->bindValue(':hinhanh', $hocvien->hinhanh);
        $cmd->bindValue(':id', $hocvien->id);
        $result = $cmd->execute();
        return $result;
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có
        echo "Lỗi: " . $e->getMessage();
        return false; // Trả về false để biểu thị thất bại
    }
}


public  function layhocvientheoid($id)
{
    $dbcon = DATABASE::connect();
    try {
        $sql = "SELECT * FROM hocvien WHERE id = :id";
        $cmd = $dbcon->prepare($sql);
        $cmd->bindValue(':id', $id);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có
        echo "Lỗi: " . $e->getMessage();
        return false; // Trả về false nếu không thể lấy được học viên
    }
}
}


?>
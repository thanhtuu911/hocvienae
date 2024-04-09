<?php

class GIAOVIEN {
    private $id;
    private $hoten;
    private $email;
    private $sodienthoai;
    private $hinhanh;

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getHoten() {
        return $this->hoten;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSodienthoai() {
        return $this->sodienthoai;
    }

    public function getHinhanh() {
        return $this->hinhanh;
    }

    // Setter methods
    public function setId($id) {
        $this->id = $id;
    }

    public function setHoten($hoten) {
        $this->hoten = $hoten;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSodienthoai($sodienthoai) {
        $this->sodienthoai = $sodienthoai;
    }

    public function setHinhanh($hinhanh) {
        $this->hinhanh = $hinhanh;
    }

    // Hàm lấy giáo viên
    public function layGiaoVien() {
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM giaovien ";
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

    // Hàm thêm giáo viên
    public function themGiaoVien($giaovien) {
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO giaovien(hoten,email,sodienthoai,hinhanh) 
                VALUES(:hoten,:email,:sodienthoai,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hoten", $giaovien->hoten);
            $cmd->bindValue(":email", $giaovien->email);
            $cmd->bindValue(":sodienthoai", $giaovien->sodienthoai);
            $cmd->bindValue(":hinhanh", $giaovien->hinhanh);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Hàm xóa giáo viên
    public function xoaGiaoVien($giaovien) {
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM giaovien WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $giaovien->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Hàm sửa giáo viên
    public function suaGiaoVien($giaovien) {
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE giaovien SET
                                        hoten=:hoten,
                                        email=:email,
                                        sodienthoai=:sodienthoai,
                                        hinhanh=:hinhanh
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hoten", $giaovien->hoten);
            $cmd->bindValue(":email", $giaovien->email);
            $cmd->bindValue(":sodienthoai", $giaovien->sodienthoai);
            $cmd->bindValue(":hinhanh", $giaovien->hinhanh);
            $cmd->bindValue(":id", $giaovien->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function layGiaoVientheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM giaovien WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}

?>

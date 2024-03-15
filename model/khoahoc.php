<?php
class KHOAHOC // tên bảng khóa học
{
     private $id;
     private $tenkhoahoc;
     private $chitiet;
     private $phi;



    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettkh()
    {
        return $this->tenkhoahoc;
    }

    public function settenkhoahoc($value)
    {
        $this->tenkhoahoc = $value;
    }
    public function getchitiet()
    {
        return $this->chitiet;
    }

    public function setchitiet($value)
    {
        $this->chitiet = $value;
    }
    public function getphi()
    {
        return $this->phi;
    }

    public function setphi($value)
    {
        $this->phi = $value;
    }

    // Lấy danh sách
    public function laykhoahoc()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM khoahoc";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // Lấy danh mục theo id
    public function laydanhmuctheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM danhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm mới
    public function themdanhmuc($danhmuc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO danhmuc(tenkhoahoc) VALUES(:tenkhoahoc)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenkhoahoc", $danhmuc->tenkhoahoc);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoadanhmuc($danhmuc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM danhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $danhmuc->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suadanhmuc($danhmuc)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE danhmuc SET tenkhoahoc=:tenkhoahoc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenkhoahoc", $danhmuc->tenkhoahoc);
            $cmd->bindValue(":id", $danhmuc->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}

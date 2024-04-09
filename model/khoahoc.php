<?php
//  require_once(__DIR__ . "/../model/database.php");
class KHOAHOC
{
     private $id;
     private $danhmuc_id;
     private $tenkhoahoc;
     private $chitiet;
     private $phi;
     private $hinhanh;



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
    public function gethinhanh()
    {
        return $this->hinhanh;
    }

    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }
    public function getdanhmuc_id()
    {
        return $this->danhmuc_id;
    }

    public function setdanhmuc_id($value)
    {
        $this->danhmuc_id = $value;
    }

    // Lấy danh sách
    public function laykhoahoc(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM khoahoc ORDER BY id DESC";
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
	// Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laykhoahoctheodanhmuc($danhmuc_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM khoahoc WHERE danhmuc_id=:madm" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madm",$danhmuc_id);
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

    // Lấy mặt hàng theo id
    public function laykhoahoctheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM khoahoc WHERE id=:id";
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
    

    // Thêm mới
    public function themkhoahoc($khoahoc){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO khoahoc(danhmuc_id,tenkhoahoc,chitiet,phi,hinhanh) 
                VALUES(:danhmuc_id,:tenkhoahoc,:chitiet,:phi,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":danhmuc_id", $khoahoc->danhmuc_id);
            $cmd->bindValue(":tenkhoahoc", $khoahoc->tenkhoahoc);
            $cmd->bindValue(":chitiet", $khoahoc->chitiet);
            $cmd->bindValue(":phi", $khoahoc->phi);
            $cmd->bindValue(":hinhanh", $khoahoc->hinhanh);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoakhoahoc($khoahoc){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM khoahoc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $khoahoc->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suakhoahoc($khoahoc){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE khoahoc SET danhmuc_id=:danhmuc_id,
                                        tenkhoahoc=:tenkhoahoc,
                                        chitiet=:chitiet,
                                        phi=:phi,
                                        hinhanh=:hinhanh
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":danhmuc_id", $khoahoc->danhmuc_id);
            $cmd->bindValue(":tenkhoahoc", $khoahoc->tenkhoahoc);
            $cmd->bindValue(":chitiet", $khoahoc->chitiet);
            $cmd->bindValue(":phi", $khoahoc->phi);
            $cmd->bindValue(":hinhanh", $khoahoc->hinhanh);
            $cmd->bindValue(":id", $khoahoc->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
    public function timkiemkhoahoc($keyword)
{
    $dbcon = DATABASE::connect();
    try {
        $sql = "SELECT * FROM khoahoc WHERE tenkhoahoc LIKE :keyword";
        $cmd = $dbcon->prepare($sql);
        $cmd->bindValue(":keyword", "%{$keyword}%", PDO::PARAM_STR);
        $cmd->execute();
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle the error if needed
        return null;
    }
}
    // public function capnhatsoluong($id, $soluong){
    //     $dbcon = DATABASE::connect();
    //     try{
    //         $sql = "UPDATE khoahoc SET soluongton=soluongton - :soluong WHERE id=:id";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->bindValue(":soluong", $soluong);
    //         $cmd->bindValue(":id", $id);
    //         $result = $cmd->execute();            
    //         return $result;
    //     }
    //     catch(PDOException $e){
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

}
?>

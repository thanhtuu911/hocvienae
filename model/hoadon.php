<?php
class HOADON{
	
	// Thêm đơn hàng mới, trả về khóa của dòng mới thêm
	public function themdonhang($nguoidung_id,$tongtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO hoadon(nguoidung_id, tongtien) 
					VALUES(:nguoidung_id,:tongtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);			
			$cmd->bindValue(':tongtien',$tongtien);
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
	// Đọc ds đơn hàng của 1 khách
	public function laydonhang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM hoadon";
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

	 // Lấy một danh mục theo id
	 public function laydonhangtheoid($id)
	 {
		 $dbcon = DATABASE::connect();
		 try{
			 $sql = "SELECT * FROM hoadon WHERE id=:id";
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

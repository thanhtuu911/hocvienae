<?php
class DONHANGCT{
	
	// Thêm chi tiết đơn hàng mới, trả về khóa của dòng mới thêm
	public function themchitietdonhang($donhang_id,$mathang_id,$dongia,$soluong,$thanhtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhangct(donhang_id, mathang_id, dongia, soluong, thanhtien) 
					VALUES(:donhang_id, :mathang_id, :dongia, :soluong, :thanhtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':donhang_id',$donhang_id);			
			$cmd->bindValue(':mathang_id',$mathang_id);
			$cmd->bindValue(':dongia',$dongia);
			$cmd->bindValue(':soluong',$soluong);
			$cmd->bindValue(':thanhtien',$thanhtien);
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
	
	public function laydonhangct(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhangct";
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

	public function laydonhangcttheoid($id)
	{
		$dbcon = DATABASE::connect();
		try{
			$sql = "SELECT * FROM donhangct WHERE id=:id";
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

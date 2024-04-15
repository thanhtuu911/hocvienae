<?php
class HOADONCT
{

    // Thêm chi tiết đơn hàng mới, trả về khóa của dòng mới thêm
    public function themchitietdonhang($hoadon_id, $khoahoc_id, $dongia, $soluong, $thanhtien)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO hoadonct(hoadon_id, khoahoc_id, dongia, soluong, thanhtien) 
					VALUES(:hoadon_id, :khoahoc_id, :dongia, :soluong, :thanhtien)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':hoadon_id', $hoadon_id);
            $cmd->bindValue(':khoahoc_id', $khoahoc_id);
            $cmd->bindValue(':dongia', $dongia);
            $cmd->bindValue(':soluong', $soluong);
            $cmd->bindValue(':thanhtien', $thanhtien);
            $cmd->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laydonhangct()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT hoadonct.id, hoadonct.hoadon_id, 
			khoahoc.tenkhoahoc AS khoahoc_id, 
			hoadonct.dongia, hoadonct.soluong, hoadonct.thanhtien 
			FROM hoadonct 
			INNER JOIN khoahoc ON hoadonct.khoahoc_id = khoahoc.id;
			";
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



    public function laydonhangcttheoid($id)
{
    $dbcon = DATABASE::connect();
    try {
        $sql = "SELECT 
        hdc.id,
        hdc.hoadon_id,
        kh.tenkhoahoc AS khoahoc_ten,
        hdc.dongia,
        hdc.soluong,
        hdc.thanhtien,
        nd.hoten AS hoten_nguoidung
    FROM 
        hoadonct hdc
    LEFT JOIN 
        khoahoc kh ON hdc.khoahoc_id = kh.id
    LEFT JOIN 
        hoadon hd ON hdc.hoadon_id = hd.id
    LEFT JOIN 
        nguoidung nd ON hd.nguoidung_id = nd.id
    WHERE 
        hdc.hoadon_id = :id
    "; // Thay đổi từ hdc.id thành hdc.hoadon_id
        $cmd = $dbcon->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $result = $cmd->fetchAll();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Lỗi truy vấn: $error_message</p>";
        exit();
    }
}

}

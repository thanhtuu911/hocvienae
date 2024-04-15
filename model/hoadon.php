<?php
class HOADON
{

	// Thêm đơn hàng mới, trả về khóa của dòng mới thêm
	public function themdonhang($nguoidung_id, $tongtien)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO hoadon(nguoidung_id, tongtien) 
					VALUES(:nguoidung_id,:tongtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id', $nguoidung_id);
			$cmd->bindValue(':tongtien', $tongtien);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	// Đọc ds đơn hàng của 1 khách
	public function laydonhang()
	{
		$dbcon = DATABASE::connect();
		try {
			$sql = "SELECT l.id AS hoadon_id, g.hoten AS nguoidung_id, l.ngaythanhtoan, l.tongtien FROM hoadon l INNER JOIN nguoidung g ON l.nguoidung_id = g.id;";
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

	// Lấy một danh mục theo id
	public function laydonhangtheoid($id)
	{
		$dbcon = DATABASE::connect();
		try {
			$sql = "SELECT * FROM hoadon WHERE id=:id";
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
	public function laydonhangTheoNgay($date)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hoadon WHERE DATE(ngaythanhtoan) = :ngaythanhtoan";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':ngaythanhtoan', $date);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu không thể lấy được danh sách học viên
        }
    }

// 	function generateQRCode($data)
// {
//     $qrCode = new \BaconQrCode\Encoder\QrCode($data);
//     $renderer = new \BaconQrCode\Renderer\Image\Png();
//     $renderer->setHeight(200);
//     $renderer->setWidth(200);
//     $writer = new \BaconQrCode\Writer($renderer);
//     return $writer->writeString($qrCode);
// }


// public function themdonhangFromQR($qr_data)
//     {
//         $dbcon = DATABASE::connect();
//         try {
//             // Giả sử mã QR chứa dữ liệu về người dùng, tổng tiền, hoặc các thông tin khác của đơn hàng
//             // Ở đây bạn cần phân tích dữ liệu từ mã QR để lấy thông tin cần thiết
//             // Ví dụ: $qr_data có thể là một chuỗi JSON chứa thông tin về đơn hàng
//             // Phân tích dữ liệu từ mã QR
//             $qr_data_array = json_decode($qr_data, true);

//             // Sau khi phân tích dữ liệu, bạn có thể lấy thông tin cần thiết
//             $nguoidung_id = $qr_data_array['nguoidung_id']; // Ví dụ: lấy id của người dùng từ mã QR
//             $tongtien = $qr_data_array['tongtien']; // Ví dụ: lấy tổng tiền từ mã QR

//             // Thêm đơn hàng mới vào cơ sở dữ liệu
//             $sql = "INSERT INTO hoadon(nguoidung_id, tongtien) 
//                     VALUES(:nguoidung_id, :tongtien)";
//             $cmd = $dbcon->prepare($sql);
//             $cmd->bindValue(':nguoidung_id', $nguoidung_id);
//             $cmd->bindValue(':tongtien', $tongtien);
//             $cmd->execute();
//             $id = $dbcon->lastInsertId();
//             return $id;
//         } catch (PDOException $e) {
//             // Xử lý ngoại lệ nếu có
//             $error_message = $e->getMessage();
//             echo "<p>Lỗi truy vấn: $error_message</p>";
//             return false; // Trả về false nếu có lỗi xảy ra
//         }
//     }

}

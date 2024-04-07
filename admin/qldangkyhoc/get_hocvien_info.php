<?php
require_once("../../model/hocvien.php"); // Thay đổi path dẫn đến file model của học viên

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Tạo một đối tượng HOCVIEN và sử dụng phương thức layhocvientheoid để lấy thông tin học viên dựa trên ID
    $hocvien_model = new HOCVIEN();
    $hocvien_info = $hocvien_model->layhocvientheoid($id);

    // Kiểm tra xem thông tin học viên có tồn tại không
    if($hocvien_info) {
        // Trả về dữ liệu dưới dạng JSON chứa tên học viên
        echo json_encode(["ten" => $hocvien_info['hoten']]);
    } else {
        // Trường hợp không tìm thấy thông tin học viên
        echo json_encode(["ten" => "Không tìm thấy thông tin học viên"]);
    }
} else {
    // Trường hợp không có ID được cung cấp
    echo json_encode(["ten" => "Vui lòng cung cấp ID"]);
}
?>

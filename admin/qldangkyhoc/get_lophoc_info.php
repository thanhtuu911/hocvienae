<?php
require_once("../../model/lophoc.php"); // Thay đổi path dẫn đến file model của lớp học

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Tạo một đối tượng LOPHOC và sử dụng phương thức layLopTheoID để lấy thông tin lớp học dựa trên ID
    $lop_model = new LOPHOC();
    $lop_info = $lop_model->layLopTheoID($id);

    // Kiểm tra xem thông tin lớp có tồn tại không
    if($lop_info) {
        // Trả về dữ liệu dưới dạng JSON chứa tên lớp học
        echo json_encode(["ten" => $lop_info['tenlop']]);
    } else {
        // Trường hợp không tìm thấy thông tin lớp
        echo json_encode(["ten" => "Không tìm thấy thông tin lớp"]);
    }
} else {
    // Trường hợp không có ID được cung cấp
    echo json_encode(["ten" => "Vui lòng cung cấp ID"]);
}
?>

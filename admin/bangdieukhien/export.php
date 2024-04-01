<?php
// Đảm bảo đã include autoloader của Composer
require_once '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

// Kiểm tra xem người dùng đã nhấn nút xuất Excel hay chưa
if(isset($_POST['export_excel'])) {
    // Lấy dữ liệu từ biến POST
    $json_data = $_POST['data'];

    // Chuyển đổi dữ liệu JSON thành mảng PHP
    $data = json_decode($json_data, true);

    // Tạo một đối tượng Spreadsheet
    $spreadsheet = new Spreadsheet();

    // Tạo một trang tính mới
    $sheet = $spreadsheet->getActiveSheet();

    // Thiết lập tiêu đề
    $sheet->setCellValue('A1', 'Thống kê');
    $sheet->mergeCells('A1:B1');

    // Xuất dữ liệu
    $row = 2;
    foreach($data as $key => $value) {
        $sheet->setCellValue('A'.$row, $key);
        $sheet->setCellValue('B'.$row, $value);
        $row++;
    }

    // Chuẩn bị xuất file Excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="thongkeAE.xls"');
    header('Cache-Control: max-age=0');

    // Tạo một Writer để xuất file Excel
    $objWriter = new Xls($spreadsheet);
    $objWriter->save('php://output');
    exit;
} else {
    // Nếu không có dữ liệu, chuyển hướng về trang chính
    header("Location: index.php");
    exit;
}
?>

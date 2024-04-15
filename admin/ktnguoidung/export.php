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

    // Thiết lập thông tin công ty
    $sheet->setCellValue('A1', 'Tên Công ty: Trung Tâm Tư Vấn Du Học AE - Công ty TNHH Dịch Vụ và Thương Mại HPC');
    $sheet->mergeCells('A1:I1');
    $sheet->setCellValue('A2', 'Ngày bắt đầu thành lập: 22/11/2022');
    $sheet->setCellValue('A3', 'Người đại diện pháp luật: TRẦN NGUYÊN VŨ');
    $sheet->setCellValue('A4', 'Chi cục thuế quản lý: Chi cục thuế TP Long Xuyên.');
    $sheet->setCellValue('A5', 'Địa chỉ: 309/15, Ấp Vĩnh Trung, Xã Vĩnh Trạch, Huyện Thoại Sơn, Tỉnh An Giang.');
    $sheet->setCellValue('A6', 'Địa chỉ VPĐD tại Long Xuyên: 26-27D2 Đinh Trường Sanh, Phường Đông Xuyên, Thành phố Long Xuyên, Tỉnh An Giang.');
    $sheet->setCellValue('A7', 'Điện thoại: 02966.26566');
    $sheet->setCellValue('A8', 'Email: ttnn@americanenglish.edu.vn');
    $sheet->setCellValue('A9', 'Website: dhnnae.americanenglish.edu.vn');
    $sheet->setCellValue('A10', 'Trung tâm ngoại ngữ AE, hoạt động trong lĩnh vực Tư vấn du học-Giáo dục-Thiết bị điện tử.');

    // Thiết lập tiêu đề cho dữ liệu thống kê
    $sheet->setCellValue('A12', 'Thống kê');
    $sheet->mergeCells('A12:B12');

    // Xuất dữ liệu thống kê
    $row = 13;
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

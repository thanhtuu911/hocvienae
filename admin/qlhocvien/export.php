<?php
require_once('../../vendor/autoload.php');
require_once('../../model/hocvien.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

$hocvienModel = new HOCVIEN();
$hocvien = $hocvienModel->layhocvien();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add company name at the beginning of the Excel file
$sheet->setCellValue('A1', 'Tên Công ty: Trung Tâm Tư Vấn Du Học AE - Công ty TNHH Dịch Vụ và Thương Mại HPC');

// Set column headers
$sheet->setCellValue('A2', 'Họ và Tên');
$sheet->setCellValue('B2', 'Năm Sinh');
$sheet->setCellValue('C2', 'Giới Tính');
$sheet->setCellValue('D2', 'Email');
$sheet->setCellValue('E2', 'Số Điện Thoại');
$sheet->setCellValue('F2', 'Địa Chỉ');

// Populate data
$row = 3; // Start from the third row since the first two rows are occupied by the company name and column headers
foreach ($hocvien as $h) {
    $sheet->setCellValue('A'.$row, $h['hoten']);
    $sheet->setCellValue('B'.$row, $h['namsinh']);
    $sheet->setCellValue('C'.$row, $h['gioitinh']);
    $sheet->setCellValue('D'.$row, $h['email']);
    $sheet->setCellValue('E'.$row, $h['sodienthoai']);
    $sheet->setCellValue('F'.$row, $h['diachi']);
    $row++;
}

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="danh_sach_hoc_vien.xls"');
header('Cache-Control: max-age=0');

$objWriter = new Xls($spreadsheet);
$objWriter->save('php://output');
exit;
?>

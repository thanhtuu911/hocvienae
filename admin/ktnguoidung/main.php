<?php include("../inc/top.php"); ?>

<h1>Thống kê</h1>

<!-- Form để chọn ngày hoặc tuần -->
<form method="get">
    <label for="date">Chọn ngày:</label>
    <input type="date" id="date" name="date">
    <button type="submit">Xem thống kê theo ngày</button>
</form>


<?php
// Include các file model.php
require_once(__DIR__ . "/../../model/hocvien.php");
require_once(__DIR__ . "/../../model/hoadon.php");
require_once(__DIR__ . "/../../model/lienhe.php");
require_once(__DIR__ . "/../../model/nguoidung.php");
require_once(__DIR__ . "/../../model/lophoc.php");

// Tạo đối tượng HOCVIEN và HOADON
$hocvien_model = new HOCVIEN();
$hoadon_model = new HOADON();
$lienhe_model = new LIENHE();
$nguoidung_model = new NGUOIDUNG();
$lophoc_model = new LOPHOC();

// Khởi tạo mảng chứa dữ liệu
$data = [];
// Kiểm tra xem người dùng đã chọn ngày hay chưa
if (isset($_GET['date']) && !empty($_GET['date'])) {
    $date = $_GET['date'];

    // Lấy số lượng học viên theo ngày
    $soLuongHocVienTheoNgay = count($hocvien_model->layhocvienTheoNgay($date));

    // Lấy số lượng hóa đơn theo ngày
    $soLuongHoaDonTheoNgay = count($hoadon_model->laydonhangTheoNgay($date));

    // Lấy số lượng liên hệ theo ngày
    $soLuongLienHeTheoNgay = count($lienhe_model->laylienheTheoNgay($date));

    // Lấy số lượng người dùng theo ngày
    $soLuongNguoiDungTheoNgay = count($nguoidung_model->laynguoidungTheoNgay($date));

    // Lấy số lượng lớp học theo ngày
    $soLuongLopHocTheoNgay = count($lophoc_model->laylophoctheongay($date));


    $data['Ngày'] = $date;
    $data['Số lượng học viên'] = $soLuongHocVienTheoNgay;
    $data['Số lượng hóa đơn'] = $soLuongHoaDonTheoNgay;
    $data['Số lượng liên hệ'] = $soLuongLienHeTheoNgay;
    $data['Số lượng người dùng đăng ký'] = $soLuongNguoiDungTheoNgay;
    $data['Số lượng Lớp học đăng ký'] = $soLuongLopHocTheoNgay;
} else {
    // Lấy số lượng học viên và số lượng hóa đơn toàn bộ
    $soLuongHocVien = count($hocvien_model->layhocvien());
    $soLuongHoaDon = count($hoadon_model->laydonhang());
    $soLuongLienHe = count($lienhe_model->laylienhe());
    $soLuongNguoiDung = count($nguoidung_model->laydanhsachnguoidung());
    $soLuongLopHoc = count($lophoc_model->laydanhsachLop());

    $data['Tổng'] = 'Tất cả';
    $data['Số lượng học viên'] = $soLuongHocVien;
    $data['Số lượng hóa đơn'] = $soLuongHoaDon;
    $data['Số lượng liên hệ'] = $soLuongLienHe;
    $data['Số lượng người dùng đăng ký'] = $soLuongNguoiDung;
    $data['Số lượng lớp học'] = $soLuongLopHoc;
}

// Hiển thị biểu đồ
echo "<canvas id='myChart' width='160' height='80'></canvas>";
echo"</br>";
echo "<canvas id='myChart2' width='160' height='80'></canvas>";

// Chuyển đổi dữ liệu thành JSON để sử dụng trong JavaScript
$json_data = json_encode($data);

// Ghi mã JavaScript để vẽ biểu đồ
echo "<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = $json_data;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(data).slice(1), // Bỏ qua label 'Ngày' hoặc 'Tổng'
            datasets: [{
                label: 'American English ',
                data: Object.values(data).slice(1), // Bỏ qua giá trị của label 'Ngày' hoặc 'Tổng'
                backgroundColor: [
                    'rgba(255, 99, 132, 0.85)',
                    'rgba(54, 162, 235, 0.85)',
                    'rgba(75, 192, 192, 0.85)', 
                    'rgba(255, 165, 0, 0.85)',
                    'rgba(255, 204, 0, 0.85)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0
                
                }

            }
        }
    });
</script>";


// Tron
echo "<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var data = $json_data;
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(data).slice(1), // Bỏ qua label 'Ngày' hoặc 'Tổng'
            datasets: [{
                label: 'American English ',
                data: Object.values(data).slice(1), // Bỏ qua giá trị của label 'Ngày' hoặc 'Tổng'
                backgroundColor: [
                    'rgba(255, 99, 132, 0.85)',
                    'rgba(54, 162, 235, 0.85)',
                    'rgba(75, 192, 192, 0.85)', 
                    'rgba(255, 165, 0, 0.85)',
                    'rgba(255, 204, 0, 0.85)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true

                }

            }
        }
    });
</script>";

// excel
echo '<form method="post" action="export.php">';
echo '<input type="hidden" name="data" value="' . htmlentities($json_data) . '">';
echo '<button type="submit" name="export_excel">Xuất Excel</button>';
echo '</form>';
//end excel

//start excel month

//end excel month
?>
<?php include("../inc/bottom.php"); ?>
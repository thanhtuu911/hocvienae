<?php include("inc/top.php"); ?>
<?php
// Tạo đối tượng KHACHHANG
$khachhang = new KHACHHANG();

// Lấy nguoidung_id từ phiên bản đăng nhập
$nguoidung_id = $_SESSION["khachhang"]["id"];

// Sử dụng phương thức layHocVienID để lấy hocvien_id tương ứng
$hocvien_id = $khachhang->layHocVienID($nguoidung_id);

// Lấy thông tin cá nhân của khách hàng từ hocvien_id
$thongTinNguoiDung = $khachhang->layThongTinNguoiDungTheoHocVienID($hocvien_id);

// Lấy thông tin đăng ký học của học viên từ hocvien_id
$thongTinDangKyHoc = $khachhang->layDangKyHocTheoIdHocVien($hocvien_id);

// Kiểm tra xem có thông tin nào được trả về không
if ($thongTinNguoiDung && $thongTinDangKyHoc) {
    // Hiển thị thông tin cá nhân của khách hàng
    echo "<br><br><br><br>";

    echo "<div class='container mt-5'>";
    echo "<div class='row justify-content-center'>";
    echo "<div class='card p-2' style='width: 30rem;'>";
    echo "<div class='card-header'>";
    echo "<h4 class='text-info text-center'>HỒ SƠ NGƯỜI DÙNG</h4>";
    echo "</div>";
    echo "<form method='post' action='index.php'>";
    echo "<input type='hidden' name='txtid' value='" . $_SESSION["khachhang"]["id"] . "'>";
    echo "<input type='hidden' name='action' value='luudonhang'>";
    echo "<div class='my-3'>";
    echo "<label>Email</label>";
    echo "<input type='email' class='form-control' name='txtemail' value='" . $_SESSION["khachhang"]["email"] . "' disabled>";
    echo "</div>";
    echo "<div class='my-3'>";
    echo "<label>Họ tên</label>";
    echo "<input type='text' class='form-control' name='txthoten' value='" . $_SESSION["khachhang"]["hoten"] . "' disabled>";
    echo "</div>";
    echo "<div class='my-3'>";
    echo "<label>Số điện thoại</label>";
    echo "<input type='text' class='form-control' name='txtsodienthoai' value='" . $_SESSION["khachhang"]["sodienthoai"] . "' disabled>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    // Hiển thị thông tin đăng ký học của học viên
    echo "<div class='container mt-5'>";
    echo "<div class='row justify-content-center'>";
    echo "<h4 class='text-info text-md-center'>Thông tin đăng ký học</h4>";
    echo "<table class='table table-bordered'>";
    echo "<tr class='table-info'>";
    echo "<th>STT</th>";
    echo "<th>Tên lớp</th>";
    echo "<th>Điểm</th>";
    echo "<th>Kết Quả</th>";
    echo "</tr>";
    foreach ($thongTinDangKyHoc as $stt => $dangkyhoc) {
        echo "<tr>";
        echo "<td>" . ($stt + 1) . "</td>";
        echo "<td>" . $dangkyhoc['tenlop'] . "</td>";
        echo "<td>" . $dangkyhoc['diem'] . "</td>";
        echo "<td>" . $dangkyhoc['ketqua'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "</div>";
} else {
    echo "Không có thông tin.";
}
?>
<div class="container mt-5  ">
    <div class="row justify-content-center ">
<div class="row justify-content-center mt-5 ">
            <h4 class="text-info text-md-center">Thông tin thanh toán</h4>
            <table class="table table-bordered">
                <tr class="table-info">
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Khoá học</th>
                    <th>Học phí</th>
                    <th>Thành tiền</th>
                </tr>

                <?php 
                 $stt = 1;
                $giohang = laygiohang();
                foreach ($giohang as $id => $mh) : ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><img width="50" height="50" src="../<?php echo $mh["hinhanh"]; ?>"></td>
                    <td><?php echo $mh["tenkhoahoc"]; ?></td>
                    <td><?php echo number_format($mh["phi"]) ."(VNĐ)"; ?></td>
                    <td><?php echo number_format($mh["thanhtien"]) . "(VNĐ)"; ?></td>
                </tr>
                <?php
                $stt++;
            endforeach; ?>
                <tr class="table-info">
                    <td colspan="4" class="text-end"><b>Tổng tiền</b></td>
                    <td><b><?php echo number_format(tinhtiengiohang()); ?> VNĐ</b></td>
                </tr>
            </table>
        </div>
    </div></div>
<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/lophoc.php");
require("../../model/hocvien.php");
require("../../model/dangkyhoc.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}
$hv = new HOCVIEN();
$lh = new LOPHOC();
$dkh = new DANGKYHOC();

switch ($action) {
    case "xem":
        $dangkyhoc = $dkh->layDangKyHoc();
        include("main.php");
        break;
    case "them":
        $hocvien = $hv->layhocvien();
        $lophoc = $lh->laylophoc();
        include("addform.php");
        break;
    case "xulythem":
        // Kiểm tra xem các biến $_POST có tồn tại không
        if (isset($_POST["lophoc_id"]) && isset($_POST["hocvien_id"])) {
            $lophoc_id = $_POST["lophoc_id"];
            $hocvien_id = $_POST["hocvien_id"];

            // Kiểm tra xem học viên đã tồn tại trong lớp học chưa
            if ($dkh->kiemTraTonTai($hocvien_id, $lophoc_id)) {
                // Học viên đã tồn tại trong lớp, hiển thị thông báo lỗi
                echo "<script>alert('Học viên đã tồn tại trong lớp học này.'); window.history.back();</script>";
            } else {
                // Học viên chưa tồn tại trong lớp, thực hiện thêm đăng ký học
                if ($dkh->themDangKyHoc($lophoc_id, $hocvien_id)) {
                    // Nếu thêm thành công, hiển thị lại danh sách
                    $dangkyhocs = $dkh->layDangKyHoc();
                    include("main.php");
                } else {
                    // Nếu có lỗi, xử lý tùy ý (ví dụ: thông báo lỗi)
                    echo "Đã xảy ra lỗi khi thêm đăng ký học.";
                }
            }
        } else {
            // Xử lý trường hợp nếu thiếu thông tin từ form
            echo "Thiếu thông tin cần thiết.";
        }
        break;

    case "sua":
        if (isset($_GET["id"])) {
            $s = $dkh->layDangKyHocTheoId($_GET["id"]);
            include("sua_form.php");
        } else {
            $dangkyhocs = $dkh->layDangKyHoc();
            include("main.php");
        }
        break;
    case "xulysua":
        // Kiểm tra xem các biến $_POST có tồn tại không
        if (isset($_POST["id"]) && isset($_POST["diem"]) && isset($_POST["thilan1"]) && isset($_POST["thilan2"])) {
            // Lấy ID và điểm từ form
            $id = $_POST["id"];
            $thilan1 = $_POST["thilan1"];
            $thilan2 = $_POST["thilan2"];
            $diem = $_POST["diem"];

            // Gọi phương thức suaDiem từ đối tượng $dkh
            if ($dkh->suaDiem($id, $thilan1, $thilan2, $diem)) {
                // Nếu cập nhật thành công, hiển thị lại danh sách
                $dangkyhocs = $dkh->layDangKyHoc();
                include("main.php");
            } else {
                // Nếu có lỗi, xử lý tùy ý (ví dụ: thông báo lỗi)
                echo "Đã xảy ra lỗi khi cập nhật điểm.";
            }
        } else {
            // Xử lý trường hợp nếu thiếu thông tin từ form
            echo "Thiếu thông tin cần thiết.";
        }
        break;
}

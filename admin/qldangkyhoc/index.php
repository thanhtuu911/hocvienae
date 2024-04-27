<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/lophoc.php");
require("../../model/hocvien.php");
require("../../model/dangkyhoc.php");
require("../../model/banghi.php");

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

        // Lấy thông tin học viên
        $hocvien_info = $hv->layhocvientheoid($hocvien_id);
        $ten_hoc_vien = $hocvien_info["hoten"];

        // Lấy thông tin lớp học
        $lophoc_info = $lh->layLopTheoID($lophoc_id);
        $ten_lop_hoc = $lophoc_info["tenlop"];

            // Kiểm tra xem học viên đã tồn tại trong lớp học chưa
            if ($dkh->kiemTraTonTai($hocvien_id, $lophoc_id)) {
                // Học viên đã tồn tại trong lớp, hiển thị thông báo lỗi
                echo "<script>alert('Học viên đã tồn tại trong lớp học này.'); window.history.back();</script>";
            } else {
                // Học viên chưa tồn tại trong lớp, thực hiện thêm đăng ký học
                if ($dkh->themDangKyHoc($lophoc_id, $hocvien_id)) {
                    // Ghi log khi thêm đăng ký học thành công
                    $banghi = new BANGHI();
                    $banghi->logAction($_SESSION["nguoidung"]["id"], 'Thêm đăng ký học cho: '. ' ' . $ten_hoc_vien . ' vào lớp: '. ' ' . $ten_lop_hoc);

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
            // Lấy thông tin học viên từ bảng dangkyhoc
            $hocvien_info = $dkh->layDangKyHocTheoId($id);
            $hocvien_id = $hocvien_info["hocvien_id"];

            // Lấy thông tin chi tiết của học viên từ bảng hocvien
            $hocvien = $hv->layhocvientheoid($hocvien_id);
            $hoten_hocvien = $hocvien["hoten"];
            // Gọi phương thức suaDiem từ đối tượng $dkh
            if ($dkh->suaDiem($id, $thilan1, $thilan2, $diem)) {
                // Ghi log khi thêm đăng ký học thành công
                $banghi = new BANGHI();
                $banghi->logAction($_SESSION["nguoidung"]["id"], 'Sửa điểm đăng ký học cho'.' '.$hoten_hocvien);

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

<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/hocvien.php");
require("../../model/dangkyhoc.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$hv = new HOCVIEN();
$dkh = new DANGKYHOC();


switch ($action) {
    case "xem":
        $hocvien = $hv->layhocvien();
        include("main.php");
        break;
    case "timkiem":
        include("search.php");
        break;
    case "them":
        $hocvien = $hv->layhocvien();
        include("addform.php");
        break;
    case "xulythem":
        // xử lý file upload
        $hinhanh = "image/student/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        // xử lý thêm		
        $hocvienhh = new HOCVIEN();
        $hocvienhh->sethoten($_POST["txthoten"]);
        $hocvienhh->setnamsinh($_POST["txtnamsinh"]);
        $hocvienhh->setgioitinh($_POST["txtgioitinh"]);
        $hocvienhh->setemail($_POST["txtemail"]);
        $hocvienhh->setsodienthoai($_POST["txtsdt"]);
        $hocvienhh->setdiachi($_POST["txtdiachi"]);
        $hocvienhh->sethinhanh($hinhanh);
        $hv->themhocvien($hocvienhh);
        $hocvien = $hv->layhocvien();
        include("main.php");
        break;
    case "xoa":
        if (isset($_GET["id"])) {
            $hocvienhh = new HOCVIEN();
            $hocvienhh->setid($_GET["id"]);
            $hv->xoahocvien($hocvienhh);
        }
        $hocvien = $hv->layhocvien();
        include("main.php");
        break;
    case "chitiet":
        if (isset($_GET["id"])) {
            // $m = $hv->layhocvientheoid($_GET["id"]);
            // $d = $dkh -> layDangKyHocTheoIdHocVien($hocvien_id);            
            include("detail.php");
        } else {
            $hocvien = $hv->layhocvien();
            include("main.php");
        }
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $h = $hv->layhocvientheoid($_GET["id"]);
            $hocvien = $hv->layhocvien();
            include("updateform.php");
        } else {
            $hocvien = $hv->layhocvien();
            include("main.php");
        }
        break;
        // Xử lý case "sửa"
    case "xulysua":
        $hocvienhh = new HOCVIEN();
        $hocvienhh->setid($_POST["id"]);
        $hocvienhh->sethoten($_POST["hoten"]);
        $hocvienhh->setNamsinh($_POST["namsinh"]);
        $hocvienhh->setgioitinh($_POST["gioitinh"]);
        $hocvienhh->setemail($_POST["email"]);
        $hocvienhh->setsodienthoai($_POST["sodienthoai"]);
        $hocvienhh->setdiachi($_POST["diachi"]);
        $hocvienhh->sethinhanh($_POST["txthinhcu"]);
        // upload file mới (nếu có)
        if ($_FILES["filehinhanh"]["name"] != "") {
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "image/student/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn lưu csdl
            $hocvienhh->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        // Gọi hàm suahocvien để cập nhật thông tin học viên
        $hv->suahocvien($hocvienhh);
        // Hiển thị hình ảnh GIF
        $hocvien = $hv->layhocvien();

        include("main.php");
        break;
    case "export":
        include("export.php");
        break;

    default:
        break;
}

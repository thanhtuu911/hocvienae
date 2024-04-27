<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/banghi.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$dm = new DANHMUC();
$idsua = 0;

switch ($action) {
    case "xem":
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;
    case "sua": // hiển thị form
        $idsua = $_GET["id"];
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;
    case "capnhat": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form
        $dmmoi = new DANHMUC();
        $dmmoi->setid($_POST["id"]);
        $dmmoi->settendanhmuc($_POST["ten"]);
        // Lấy tên danh mục trước khi cập nhật
        $id = $_POST["id"];
        $ten_danh_muc_cu = $dm->layTenDanhMuc($id);

        // sửa
        $dm->suadanhmuc($dmmoi);
        // Lấy tên danh mục sau khi cập nhật
        $ten_danh_muc_moi = $dmmoi->gettendanhmuc();

        $banghi = new BANGHI();
        $banghi->logAction($_SESSION["nguoidung"]["id"], 'Sửa danh mục: ' . ' ' . $ten_danh_muc_cu . ' thành ' . ' ' . $ten_danh_muc_moi);
        // load danh sách
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;
    case "them":
        // Gán dữ liệu từ form
        $ten_danh_muc = $_POST["ten"];

        // Tạo một đối tượng DANHMUC và gán tên danh mục
        $dmmoi = new DANHMUC();
        $dmmoi->settendanhmuc($ten_danh_muc);

        // Thêm danh mục vào cơ sở dữ liệu
        $dm->themdanhmuc($dmmoi);

        // Ghi log khi thêm danh mục thành công
        $banghi = new BANGHI();
        $banghi->logAction($_SESSION["nguoidung"]["id"], 'Thêm danh mục:'.' ' . $ten_danh_muc);

        // load danh sách
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;
    case "xoa":
        // lấy dòng muốn xóa
        $dmxoa = new DANHMUC();
        $dmxoa->setid($_GET["id"]);

        // Lấy tên danh mục trước khi xóa
        $id = $_GET["id"];
        $ten_danh_muc = $dm->layTenDanhMuc($id);

        // xóa
        $dm->xoadanhmuc($dmxoa);
        // Ghi log khi thêm đăng ký học thành công
        $banghi = new BANGHI();
        $banghi->logAction($_SESSION["nguoidung"]["id"], 'Xóa danh mục:' . ' ' . $ten_danh_muc);

        // load danh sách
        $danhmuc = $dm->laydanhmuc();
        include("main.php");
        break;
    default:
        break;
}

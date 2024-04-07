<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/hoadon.php");
require("../../model/hoadonct.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$dh = new HOADON();
$dhct = new HOADONCT();

switch ($action) {
    case "xem":
        $donhang = $dh->laydonhang();
        include("main.php");
        break;
    case "chitiet":
        if (isset($_GET["id"])) {
            $dh = $dh->laydonhangtheoid($_GET["id"]);
            $dhct = new HOADONCT();
            $dhctt = $dhct->laydonhangcttheoid($_GET["id"]); // Thêm dòng này để lấy thông tin chi tiết
            include("detail.php");
        } else {
            $donhang = $dh->laydonhang();
            include("main.php");
        }
        break;
    default:
        break;
}

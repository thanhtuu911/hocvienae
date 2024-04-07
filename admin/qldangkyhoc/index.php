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
// $hv = new HOCVIEN();
// $lh = new LOPHOC();
$dkh = new DANGKYHOC();

switch ($action) {
    case "xem":
        $dangkyhoc = $dkh->layDangKyHoc();
        include("main.php");
        break;
    case "them":
        include("addform.php");
        break;
    case "xulythem":
        $dangkyhoc = new DANGKYHOC;
        $dangkyhoc->setLophocId($_POST["lophoc_id"]);
        $dangkyhoc->setHocvienId($_POST["hocvien_id"]);
        $dkh->themDangKyHoc($dangkyhoc->getLophocId(), $dangkyhoc->getHocvienId());
        $dangkyhocs = $dkh->layDangKyHoc();
        include("main.php");
        break;
}

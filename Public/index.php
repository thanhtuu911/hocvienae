<?php
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/khoahoc.php");
require("../model/giohang.php");
require("../model/khachhang.php");
require("../model/donhang.php");
require("../model/donhangct.php");
// require("../model/diachi.php");

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$kh = new KHOAHOC();
// $mathangxemnhieu = $kh->laykhoahocxemnhieu();


if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "null";
}


switch ($action) {
    case "null":
        $khoahoc = $kh->laykhoahoc();
        include("home.php");
        break;
    case "batdau":
        $khoahoc = $kh->laykhoahoc();
        include("start.php");
        break;

    case "group":
        if (isset($_REQUEST["id"])) {
            $madm = $_REQUEST["id"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];
            $khoahoc = $kh->laykhoahoctheodanhmuc($madm);
            include("group.php");
        } else {
            include("start.php");
        }
        break;
    case "detail":
        if (isset($_GET["id"])) {
            $mahang = $_GET["id"];
            // tăng lượt xem lên 1
            // $kh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $khct = $kh->laykhoahoctheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $khct["danhmuc_id"];
            $khoahoc = $kh->laykhoahoctheodanhmuc($madm);
            include("detail.php");
        }
        break;
    case "chovaogio":
        if (isset($_GET["id"]))
            $id = $_GET["id"];
        if (isset($_GET["soluong"]))
            $soluong = $_GET["soluong"];
        else
            $soluong = 1;
        if (isset($_SESSION["giohang"][$id])) {
            $soluong = $soluong + $_SESSION["giohang"][$id];
            $_SESSION["giohang"][$id] = $soluong;
        } else {
            themhangvaogio($id, $soluong);
        }
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "giohang":
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "capnhatgio":
        if (isset($_REQUEST["mh"])) {
            $mh = $_REQUEST["mh"];
            foreach ($mh as $id => $soluong) {
                if ($soluong > 0)
                    capnhatsoluong($id, $soluong);
                else
                    xoamotmathang($id);
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
        break;
        case "xldangnhap":
            $email = $_POST["txtemail"];
            $matkhau = $_POST["txtmatkhau"];
            $kh = new KHACHHANG();
            if($kh->kiemtrakhachhanghople($email,$matkhau)==TRUE){
                $_SESSION["khachhang"] = $kh->laythongtinkhachhang($email);
                // đọc thông tin (đơn hàng) của kh
                include("info.php");
            }
            else{
                //$tb = "Đăng nhập không thành công!";
                include("loginform.php");
            }
            break;

    case "intro":
        include("intro.php");
        break;

    case "home":
        include("home.php");
        break;
    case "dangky":
        include("register.php");
        break;
    case "hoatdong":
        include("hoatdong.php");
        break;
    case "lanhdao":
        include("lanhdao.php");
        break;
    case "my":
        include("detailMy.php");
        break;
    case "duc":
        include("detailDuc.php");
        break;
    case "uc":
        include("detailUc.php");
        break;
<<<<<<< HEAD
    case "canada":
        include("detailCanada.php");
        break;
    case "lienhe":
        include("lienhe.php");
        break;
    // case "dangky":
    //     include("dangky.php");
    //     break;
       
=======
    case "dangnhap":
        include("loginform.php");
        break;
>>>>>>> 128e93d06c67f7264df2b9a6738be2fed8008c03
}

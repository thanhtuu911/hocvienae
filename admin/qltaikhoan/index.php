<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/banghi.php");

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}

$nguoidung = new NGUOIDUNG();

switch ($action) {
    case "macdinh":
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        // sắp xếp
        if (isset($_GET["sort"])) {
            $sort = $_GET["sort"];
            switch ($sort) {
                case 'email':
                    usort($nguoidung, function ($a, $b) {
                        return strcmp($a["email"], $b["email"]);
                    });
                    break;
                case 'sodienthoai':
                    usort($nguoidung, function ($a, $b) {
                        return strcmp($b["sodienthoai"], $a["sodienthoai"]);
                    });
                    break;
                case 'hoten':
                    usort($nguoidung, function ($a, $b) {
                        return strcmp($b["hoten"], $a["hoten"]);
                    });
                    break;
                case 'loai':
                    usort($nguoidung, function ($a, $b) {
                        return $a["loai"] - $b["loai"];
                    });
                    break;
                default:
                    ksort($nguoidung);
                    break;
            }
        }
        include("main.php");
        break;
    case "khoa":
        $mand = $_GET["mand"];
        $trangthai = $_GET["trangthai"];
        $nguoi_dung_info = $nguoidung->laythongtinnguoidungByID($mand);
        $hoten = $nguoi_dung_info['hoten']; // Lấy tên người dùng

        if (!$nguoidung->doitrangthai($mand, $trangthai)) {
            echo "<script>alert('Đã đổi trạng thái!');</script>";

        }
        $banghi = new BANGHI();
        $banghi->logAction($_SESSION["nguoidung"]["id"], 'Thay đổi trạng thái người dùng: ' . $hoten . ' (ID: ' . $mand . ')');

        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;
    case "them":
        include("addform.php");
        break;

    case "xlthem":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $sodt = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $loaind = $_POST["optloaind"];
        if ($nguoidung->laythongtinnguoidung($email)) {   // có thể kiểm tra thêm số đt không trùng
            echo "<script>alert('Email này đã được cấp tài khoản!');</script>";
        } else {
            if (!$nguoidung->themnguoidung($email, $matkhau, $sodt, $hoten, $loaind)) {
                echo "<script>alert('Không thêm được!');</script>";
            } else {
                // Ghi log khi thêm người dùng thành công
                $banghi = new BANGHI();
                $banghi->logAction($_SESSION["nguoidung"]["id"], 'Thêm tài khoản người dùng: ' . ' ' . $hoten . '' . 'và email: ' . ' ' . $email);
            }
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;
    case "doiloai":
        include("updateform.php");
        break;
    case "doiloainguoidung":
        $email = $_POST["email"];
        $loai = $_POST["loai"];
        $nguoi_dung_info = $nguoidung->laythongtinnguoidung($email);
        $hoten = $nguoi_dung_info['hoten']; // Lấy tên người dùng

        if (!$nguoidung->doiloainguoidung($email, $loai)) {
            echo "<script>alert('Không thay đổi được loại người dùng!');</script>";
        } else {
            // Ghi log khi thay đổi loại người dùng thành công
            $banghi = new BANGHI();
            $banghi->logAction($_SESSION["nguoidung"]["id"], 'Thay đổi loại người dùng: ' . ' ' . $hoten . ' (Email: ' . ' ' . $email . ')');
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;


    default:
        break;
}

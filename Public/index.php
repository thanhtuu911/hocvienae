<?php
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/khoahoc.php");
require("../model/giohang.php");
require("../model/khachhang.php");
require("../model/hoadon.php");
require("../model/hoadonct.php");
require("../model/lienhe.php");
require("../model/documents.php");

$tl = new TAILIEU();
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
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $soluong = isset($_GET["soluong"]) ? $_GET["soluong"] : 1;
            if (isset($_SESSION["giohang"][$id])) {
                hienthiThongBao("Khoá học này bạn đã đăng ký rồi!");
            } else {
                themhangvaogio($id, $soluong);
            }
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
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xoakhoahoc":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xoa1khoahoc":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            xoa1khoahoc($id); // Gọi hàm xóa 1 khóa học với id tương ứng
            $giohang = laygiohang(); // Lấy lại giỏ hàng sau khi xóa
            include("cart.php"); // Hiển thị giỏ hàng sau khi xóa
        }
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $kh = new KHACHHANG();
        if ($kh->kiemtrakhachhanghople($email, $matkhau) == TRUE) {
            $_SESSION["khachhang"] = $kh->laythongtinkhachhang($email);
            // đọc thông tin (đơn hàng) của kh
            include("info.php");
        } else {
            //$tb = "Đăng nhập không thành công!";
            include("loginform.php");
        }
        break;
    case "thongtin":
        // đọc thông tin các đơn của khách

        include("info.php"); // trang info.php hiển thị các đơn đã đặt
        break;
    case "dangxuat":
        unset($_SESSION["khachhang"]);
        $khoahoc = $kh->laykhoahoc();
        include("home.php");
        break;
    case "luudonhang":
        if (!isset($_SESSION["khachhang"])) {
            $email = $_POST["txtemail"];
            // $matkhau = $_POST["txtpass"];
            $hoten = $_POST["txthoten"];
            $sodienthoai = $_POST["txtsodienthoai"];

            // lưu thông tin khách nếu chưa có trong db (kiểm tra email có tồn tại chưa)
            // xử lý thêm...
            $kh = new KHACHHANG();
            $khachhang_id = $kh->themkhachhang($email, $sodienthoai, $hoten);
        } else {
            $khachhang_id = $_SESSION["khachhang"]["id"];
        }
        // lưu địa chỉ giao hàng

        // lưu đơn hàng
        $dh = new HOADON();
        $tongtien = tinhtiengiohang();
        $donhang_id = $dh->themdonhang($khachhang_id, $tongtien);

        // lưu chi tiết đơn hàng
        $ct = new HOADONCT();
        $giohang = laygiohang();
        foreach ($giohang as $id => $mh) {
            $dongia = $mh["phi"];
            $soluong = $mh["soluong"];
            $thanhtien = $mh["thanhtien"];
            $ct->themchitietdonhang($donhang_id, $id, $dongia, $soluong, $thanhtien);
        }

        // xóa giỏ hàng
        xoagiohang();
        // chuyển đến trang cảm ơn
        include("message.php");
        break;

    case "tuvan":
        $noidung = $_POST['txtnoidung'];

        if (!isset($_SESSION["lienhe"])) {
            // Lấy dữ liệu từ form
            $hoten = $_POST['txthoten'];
            $tuoi = $_POST['txttuoi'];
            $email = $_POST['txtemail'];
            $diachi = $_POST['txtdiachi'];
            $tenkhoahoc = $_POST['txttenkhoahoc'];
            $sdt = $_POST['txtsdt'];

            $lh = new LIENHE();
            $id = $lh->themlienhe($hoten, $tuoi, $email, $diachi, $tenkhoahoc, $sdt, $noidung);
        } else {
            $id = $_SESSION["lienhe"]["id"];
            echo "đã xảy ra lõi";
            // Nếu một trong các trường dữ liệu không tồn tại, bạn có thể thông báo cho người dùng hoặc xử lý lỗi theo cách khác
        }
        include("thanks.php");
        break;
    case "thanhtoan":
        include("pay.php");
        break;
    case "intro":
        include("intro.php");
        break;
    case "home":
        include("home.php");
        break;

    case "dangky":
        include("dangky.php");
        break;

    case "themdangky":
        if (!isset($_SESSION["khachhang"])) {
            $email = $_POST["txtemail"];
            $matkhau = $_POST["txtpass"];
            $hoten = $_POST["txthoten"];
            $sodienthoai = $_POST["txtsodienthoai"];
            $namsinh = $_POST["txtnamsinh"];
            $gioitinh = $_POST["txtgioitinh"];
            $diachi = $_POST["txtdiachi"];
            // Xác định thư mục lưu trữ ảnh
            $thumuc_luutru = "image/student/";

            // Tạo đường dẫn đầy đủ cho file ảnh
            $duongdan = "../" . $thumuc_luutru . basename($_FILES["txthinhanh"]["name"]);

            // Di chuyển tệp tải lên vào thư mục lưu trữ
            if (move_uploaded_file($_FILES["txthinhanh"]["tmp_name"], $duongdan)) {
                echo "<div id='gifDiv' style='position: fixed;
                                 top: 50%;
                                 left: 50%;
                                 transform: translate(-50%, -50%);
                                 max-width: auto;'>
            <img src='../image/check.gif' alt='Loading...' />
          </div>";

                // Thiết lập hàm đếm ngược
                echo "<script>
            // Hiển thị phần tử
            document.getElementById('gifDiv').style.display = 'block';
            // Thiết lập hàm đếm ngược
            setTimeout(function() {
                // Chuyển hướng sau khi đếm ngược
                window.location.href = 'loginform.php';
            }, 3000); // 3 giây
          </script>";
            } else {
                echo "Có lỗi xảy ra khi tải lên file.";
            }

            // Tiếp theo, bạn có thể sử dụng biến $thumuc_luutru để lưu đường dẫn trong cơ sở dữ liệu.
            // Ví dụ:
            $hinhanh = $thumuc_luutru . basename($_FILES["txthinhanh"]["name"]);

            // lưu thông tin khách nếu chưa có trong db (kiểm tra email có tồn tại chưa)
            // xử lý thêm...
            $kh = new KHACHHANG();
            $khachhang_id = $kh->themkhachhangdangky($email, $matkhau, $sodienthoai, $hoten, $namsinh, $gioitinh, $diachi, $hinhanh);
        } else {
            $khachhang_id = $_SESSION["khachhang"]["id"];
        }

        // include("loginform.php");
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
    case "canada":
        include("detailCanada.php");
        break;
    case "lienhe":
        include("lienhe.php");
        break;
    case "dangnhap":
        include("loginform.php");
        break;
    case "themtailieu":
        if (!isset($_SESSION["tailieu"])) {
            $tenkhoahoc = $_POST["tenkhoahoc"];
            $duongdan = $_POST["duongdan"];
            $tl = new TAILIEU();
            $tl->themtailieu($tenkhoahoc, $duongdan);
            $tailieu = $tl->laytailieu();
        } else {
            $id = $_SESSION["tailieu"]["id"];
            echo "đã xảy ra lõi";
            // Nếu một trong các trường dữ liệu không tồn tại, bạn có thể thông báo cho người dùng hoặc xử lý lỗi theo cách khác
        }
        include("addFile.php");
        break;
    case "tailieu":
        $tl = new TAILIEU();
        $tailieu = $tl->laytailieu();
        include("tailieu.php");
        break;
    case "qr":
        include("qrpay.php");
        break;
    case "like":
        // Xử lý yêu cầu thích khóa học
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            // Gọi hàm để tăng số lượt thích cho khóa học
            $khoahoc = new KHOAHOC();
            $luotThichMoi = $khoahoc->tangLuotThich($id);
            // Trả về số lượt thích mới để cập nhật trên giao diện
            echo $luotThichMoi;
        }
        break;
}

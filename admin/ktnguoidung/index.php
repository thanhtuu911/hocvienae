<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/banghi.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {  // chưa đăng nhập
    $action = "dangnhap";
} else {   // mặc định
    $action = "macdinh";
}

$nd = new NGUOIDUNG();
$bg = new BANGHI();


switch ($action) {
    case "macdinh":
        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xldangnhap":
        $email = $_REQUEST["txtemail"];
        $matkhau = $_REQUEST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email); // đặt biến session
            // Ghi log đăng nhập
            $bg->logLogin($_SESSION["nguoidung"]["id"]);
            include("main.php");
        } else {
            include("login.php");
        }
        break;
    case "dangxuat":
        // Ghi log đăng xuất
        $bg->logLogout($_SESSION["nguoidung"]["id"]);

        unset($_SESSION["nguoidung"]);  // hủy biến session
        //include("login.php");         // hiển thị trang login
        header("location:../../index.php");     // hoặc chuyển hướng ra bên ngoài (trang dành cho khách)
        break;
    case "hoso":
        include("profile.php");
        break;
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodt = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];

        // upload file mới (nếu có)
        if ($_FILES["filehinhanh"]["name"] != "") {
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh_moi = "image/account/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn lưu csdl
            $duongdan_moi = "../../" . $hinhanh_moi; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan_moi);
            // Cập nhật đường dẫn ảnh mới
            $hinhanh = $hinhanh_moi;
        }

        // Chỉ cập nhật ảnh nếu có tập tin ảnh mới
        if ($_FILES["filehinhanh"]["name"] != "") {
            $nd->capnhatnguoidung($mand, $email, $sodt, $hoten, $hinhanh);
        } else {
            // Nếu không có ảnh mới, chỉ cập nhật thông tin khác
            $nd->capnhatnguoidungKhongAnh($mand, $email, $sodt, $hoten);
        }
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("main.php");
        break;


    case "matkhau":
        include("changepass.php");
        break;
    case "doimatkhau":
        if (isset($_POST["txtemail"]) && isset($_POST["txtmatkhaumoi"]))
            $nd->doimatkhau($_POST["txtemail"], $_POST["txtmatkhaumoi"]);
        include("main.php");
        break;
    case "xembanghi":
        include("banghi.php");
        break;
    case "laybanghi":
        $banghiRecords = $bg->getAllLogs(); // Thay đổi lời gọi phương thức thành getAllLogs()
        // Hiển thị các bản ghi
        foreach ($banghiRecords as $banghi) {
            echo "ID: " . $banghi->getId() . "<br>";
            echo "Người dùng: " . $banghi->getNguoidungId() . "<br>";
            echo "Hành động: " . $banghi->getAction() . "<br>";
            echo "Thời gian: " . $banghi->getTimestamp() . "<br>";
            echo "<br>";
        }
        break;



    default:
        break;
}

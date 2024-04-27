<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/lienhe.php");
require("../../model/banghi.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}

$lh = new LIENHE();


switch($action){
    case "xem":
        include("main.php");
        break;
    
        case "xoa":
            // Lấy ID của liên hệ cần xóa từ URL
            $id = $_GET["id"];
            // Xóa liên hệ
            $lh->xoalienhe($id);
            // Sau khi xóa xong, bạn có thể redirect hoặc làm gì đó khác, nhưng không cần load lại danh sách liên hệ
            header("Location: index.php"); // Redirect lại trang index.php sau khi xóa
            exit(); // Kết thúc script để đảm bảo không có mã PHP nào được thực thi sau khi redirect
            break;
        
    default:
        break;
}
?>

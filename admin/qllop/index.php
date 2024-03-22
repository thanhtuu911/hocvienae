<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/lophoc.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$lh = new LOPHOC();

switch($action){
    case "xem":
        $lophoc = $lh->laydanhsachLop();
		include("main.php");
        break;
	case "them":
		$danhmuc = $lh->laydanhsachLop();
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý file upload
		
		// xử lý thêm		
        $lophochh = new LOPHOC;
		$lophochh->setTenLop($_POST["tenlop"]);
        $lophochh->setNgayBatDau($_POST["ngaybatdau"]);
		$lophochh->setNgayKetThuc($_POST["ngayketthuc"]);
		$lophochh->setGiaoVienId($_POST["giaovien_id"]);
		$lophochh->setKhoaHocId($_POST["khoahoc_id"]);
        $lh->themLop($lophochh);
		$lophoc = $lh->laydanhsachLop();
		include("main.php");
        break;
        case "xoa":
            $lophochh = new LOPHOC;
            // $lophochh->setId($_POST["id"]);
            $lh->xoaLopHoc($lophochh->getId()); // Truyền ID của lớp học vào hàm xóa
            // Sau khi xóa xong, làm mới danh sách lớp học
            $lophoc = $lh->laydanhsachLop();
            include("main.php");
            break;
        
        
        
    case "chitiet":
        if(isset($_GET["id"])){ 
            $m = $lh->layLopTheoID($_GET["id"]);            
            include("detail.php");
        }
        else{
            $lophoc = $lh->laydanhsachLop();        
            include("main.php");            
        }
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $lh->layLopTheoID($_GET["id"]);
            $danhmuc = $dm->laydanhmuc(); 
            // include("updateform.php");
        }
        else{
            $lophoc = $lh->laydanhsachLop();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $lophochh = new LOPHOC;
        $lophochh->setid($_POST["id"]);
        $lophochh->setTenLop($_POST["tenlop"]);
        $lophochh->setNgayBatDau($_POST["ngaybatdau"]);
        $lophochh->setngayketthuc($_POST["ngayketthuc"]);
        $lophochh->setGiaoVienId($_POST["giaovien_id"]);
        $lophochh->setKhoaHocId($_POST["khoahoc_id"]);

        // upload file mới (nếu có)
        
        
        // sửa mặt hàng
        $lh->CapnhatLop($lophochh);         
    
        // hiển thị ds mặt hàng
        $lophoc = $lh->laydanhsachLop();    
        include("main.php");
        break;

    default:
        break;
}
?>

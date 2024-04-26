<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/giaovien.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$gv = new GIAOVIEN();

switch($action){
    case "xem":
        $giaovien = $gv->layGiaoVien();
		include("main.php");
        break;
	case "them":
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý file upload
		$hinhanh = "image/lanhdao/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
		// xử lý thêm		
        $giaovienhh = new GIAOVIEN();
		$giaovienhh->setHoten($_POST["txthoten"]);
        $giaovienhh->setEmail($_POST["txtemail"]);
		$giaovienhh->setSodienthoai($_POST["txtsdt"]);
        $giaovienhh->setHinhanh($hinhanh);
        $gv->themGiaoVien($giaovienhh);
		$giaovien = $gv->layGiaoVien();
		include("main.php");
        break;
	case "xoa":
		if(isset($_GET["id"])){
            $giaovienhh = new GIAOVIEN();        
            $giaovienhh->setid($_GET["id"]);
			$gv->xoaGiaoVien($giaovienhh);
        }
		$giaovien = $gv->layGiaoVien();
		include("main.php");
		break;	
    case "chitiet":
        if(isset($_GET["id"])){ 
            $m = $gv->layGiaoVientheoid($_GET["id"]);            
            include("detail.php");
        }
        else{
            $gvoahoc = $gv->layGiaoVien();        
            include("main.php");            
        }
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $gv->layGiaoVientheoid($_GET["id"]);
            include("updateform.php");
        }
        else{
            $gvoahoc = $gv->layGiaoVien();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $giaovienhh = new GIAOVIEN();
		$giaovienhh->setId($_POST["txtid"]);
		$giaovienhh->setHoten($_POST["txthoten"]);
        $giaovienhh->setEmail($_POST["txtemail"]);
		$giaovienhh->setSodienthoai($_POST["txtsdt"]);
        $giaovienhh->sethinhanh($_POST["txthinhcu"]);

        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "image/lanhdao" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $giaovienhh->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $gv->suaGiaoVien($giaovienhh);         
    
        // hiển thị ds mặt hàng
        $giaovien = $gv->layGiaoVien();    
        include("main.php");
        break;

    default:
        break;
}
?>

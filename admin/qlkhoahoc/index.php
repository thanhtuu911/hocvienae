<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/khoahoc.php");
require("../../model/banghi.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$kh = new KHOAHOC();

switch($action){
    case "xem":
        $khoahoc = $kh->laykhoahoc();
		include("main.php");
        break;
	case "them":
		$danhmuc = $dm->laydanhmuc();
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý file upload
		$hinhanh = "image/courses/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
		// xử lý thêm		
        $khoahochh = new KHOAHOC();
		$khoahochh->settenkhoahoc($_POST["txttenkhoahoc"]);
        $khoahochh->setdanhmuc_id($_POST["optdanhmuc"]);
		$khoahochh->setchitiet($_POST["txtmota"]);
		$khoahochh->setphi($_POST["txtphi"]);
        $khoahochh->sethinhanh($hinhanh);
        $kh->themkhoahoc($khoahochh);
        // Ghi log
    $banghi = new BANGHI();
    $banghi->logAction($_SESSION["nguoidung"]["id"], 'Thêm khóa học: '. ' ' . $_POST["txttenkhoahoc"]);

		$khoahoc = $kh->laykhoahoc();
		include("main.php");
        break;
	case "xoa":
		if(isset($_GET["id"])){
            $khoahochh = new khoahoc();        
            $khoahochh->setid($_GET["id"]);
            $ten_khoahoc = $kh->laykhoahoctheoid($_GET["id"])['tenkhoahoc']; 
            // Lấy tên khóa học để ghi log
			$kh->xoakhoahoc($khoahochh);
               // Ghi log
        $banghi = new BANGHI();
        $banghi->logAction($_SESSION["nguoidung"]["id"], 'Xóa khóa học: '. ' ' . $ten_khoahoc);
    
        }
		$khoahoc = $kh->laykhoahoc();
		include("main.php");
		break;	
    case "chitiet":
        if(isset($_GET["id"])){ 
            $m = $kh->laykhoahoctheoid($_GET["id"]);            
            include("detail.php");
        }
        else{
            $khoahoc = $kh->laykhoahoc();        
            include("main.php");            
        }
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $kh->laykhoahoctheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc(); 
            include("updateform.php");
        }
        else{
            $khoahoc = $kh->laykhoahoc();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $khoahochh = new KHOAHOC();
        $khoahochh->setid($_POST["txtid"]);
        $khoahochh->setdanhmuc_id($_POST["optdanhmuc"]);
        $khoahochh->settenkhoahoc($_POST["txttenhang"]);
        $khoahochh->setchitiet($_POST["txtmota"]);
        $khoahochh->setphi($_POST["txtgiagoc"]);
        
        $khoahochh->sethinhanh($_POST["txthinhcu"]);

        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $khoahochh->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $kh->suakhoahoc($khoahochh);         
    // Ghi log
    $ten_khoahoc = $_POST["txttenhang"];
    $banghi = new BANGHI();
    $banghi->logAction($_SESSION["nguoidung"]["id"], 'Sửa thông tin khóa học: '. ' ' . $ten_khoahoc);
    
        // hiển thị ds mặt hàng
        $khoahoc = $kh->laykhoahoc();    
        include("main.php");
        break;

    default:
        break;
}
?>

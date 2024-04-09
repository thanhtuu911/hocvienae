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
    $hocvien_model = new HOCVIEN();
    $lh = new LOPHOC();
  
    $dkh = new DANGKYHOC();

    switch ($action) {
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
            if (isset($_GET["id"])) {
                $lop_id = $_GET["id"]; // Lấy ID của lớp học từ tham số trên URL
                $lh->xoaLop($lop_id); // Truyền ID của lớp học vào hàm xóa
                // Sau khi xóa xong, làm mới danh sách lớp học
                $lophoc = $lh->laydanhsachLop();
                include("main.php");
            } else {
                // Xử lý khi không có ID được truyền vào
                // Ví dụ: hiển thị thông báo lỗi hoặc chuyển hướng người dùng đến trang khác
            }
            break;




        case "chitiet":
            if (isset($_GET["id"])) {
                // Lấy thông tin của lớp học dựa trên ID
                $lop_hoc = $lh->layLopTheoID($_GET["id"]);
                // Lấy danh sách học viên theo lớp học
                $hoc_viens = $dkh->layDanhSachHocvienIdTheoLophocId($_GET["id"]);
                // Tạo mảng để lưu trữ thông tin chi tiết của từng học viên
                $chi_tiet_hoc_viens = array();
                // Lặp qua danh sách học viên để lấy thông tin chi tiết của từng học viên
                foreach ($hoc_viens as $hoc_vien_id) {
                    // Sử dụng model của HOCVIEN để lấy thông tin chi tiết của học viên
                    $hoc_vien = $hocvien_model->layhocvientheoid($hoc_vien_id);
                    // Kiểm tra xem học viên có tồn tại không trước khi thêm vào mảng chi tiết
                    if ($hoc_vien) {
                        // Lấy điểm của học viên trong lớp học hiện tại
                        $diem = $dkh->layDiemHocVienTrongLop($hoc_vien_id, $_GET["id"]);
                        // Kiểm tra và tính toán kết quả dựa trên điểm
                        $ket_qua = ($diem >= 5) ? "Đạt" : "Không đạt";
                        // Thêm điểm và kết quả vào thông tin chi tiết của học viên
                        $hoc_vien['diem'] = $diem;
                        $hoc_vien['ketqua'] = $ket_qua;
                        // Thêm học viên vào mảng chi tiết học viên
                        $chi_tiet_hoc_viens[] = $hoc_vien;
                    }
                }
                // Include file template để hiển thị thông tin chi tiết lớp học và danh sách học viên
                include("detail.php");
            } else {
                // Nếu không có ID được cung cấp, chuyển hướng người dùng đến trang chính
                $lophoc = $lh->laydanhsachLop();
                include("main.php");
            }
            break;


        case "sua":
            if (isset($_GET["id"])) {
                $m = $lh->layLopTheoID($_GET["id"]);
                $danhmuc = $dm->laydanhmuc();
                // include("updateform.php");
            } else {
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

        case "xoahocvien":
            if (isset($_GET["hocvien_id"]) && isset($_GET["lophoc_id"])) {
                $hocvien_id = $_GET["hocvien_id"];
                $lophoc_id = $_GET["lophoc_id"];

                // Xóa học viên khỏi lớp học
                if ($dkh->xoaHocVienKhoiLop($hocvien_id, $lophoc_id)) {
                    // Chuyển hướng người dùng đến trang chính nếu xóa thành công
                    header("Location: index.php?action=chitiet&id=$lophoc_id");
                    exit();
                } else {
                    // Xử lý khi có lỗi xảy ra trong quá trình xóa học viên khỏi lớp học
                    echo "Có lỗi xảy ra khi xóa học viên khỏi lớp học.";
                }
            } else {
                // Xử lý khi thiếu dữ liệu
                echo "Thiếu dữ liệu";
            }
            break;




        default:
            break;
    }

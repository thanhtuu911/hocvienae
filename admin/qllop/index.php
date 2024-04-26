    <?php
    if (!isset($_SESSION["nguoidung"]))
        header("location:../index.php");

    require("../../model/database.php");
    require("../../model/lophoc.php");
    require("../../model/khoahoc.php");
    require("../../model/giaovien.php");
    require("../../model/hocvien.php");
    require("../../model/dangkyhoc.php");

    // Xét xem có thao tác nào được chọn
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "xem";
    }
    $hv = new HOCVIEN();
    $lh = new LOPHOC();
    $gv = new GIAOVIEN();
    $kh = new KHOAHOC();
    $dkh = new DANGKYHOC();

    switch ($action) {
        case "xem":
            $lophoc = $lh->laydanhsachLop();
            include("main.php");
            break;
        case "them":
            $danhmuc = $lh->laydanhsachLop();
            $giaovien = $gv->layGiaoVien();
            $khoahoc = $kh->laykhoahoc();
            include("addform.php");
            break;
        case "xulythem":
            // xử lý file upload

            // xử lý thêm		
            $lophochh = new LOPHOC;
            $lophochh->setTenLop($_POST["tenlop"]);
            $lophochh->setNgayBatDau($_POST["ngaybatdau"]);
            $lophochh->setNgayKetThuc($_POST["ngayketthuc"]);
            $lophochh->setGiaoVienId($_POST["optgiaovien"]);
            $lophochh->setKhoaHocId($_POST["optkhoahoc"]);
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
                    $hoc_vien = $hv->layhocvientheoid($hoc_vien_id);
                    // Kiểm tra xem học viên có tồn tại không trước khi thêm vào mảng chi tiết
                    $diem_hoc_vien = $dkh->layDiemHocVienTrongLop($hoc_vien_id, $_GET["id"]);
                    if ($diem_hoc_vien) {
                        $thilan1 = $diem_hoc_vien['thilan1'];
                        $thilan2 = $diem_hoc_vien['thilan2'];
                        // Tính điểm trung bình của hai lần thi
                        $diem_trung_binh = ($thilan1 + $thilan2) / 2;
                        // Kiểm tra và tính toán kết quả dựa trên điểm trung bình
                        $ket_qua = ($diem_trung_binh >= 5) ? "Đạt" : "Chưa đạt";
                        // Thêm điểm và kết quả vào thông tin chi tiết của học viên
                        $hoc_vien['thilan1'] = $thilan1;
                        $hoc_vien['thilan2'] = $thilan2;
                        $hoc_vien['diem'] = $diem_trung_binh;
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
                $giaovien = $gv->layGiaoVien($_GET["id"]);
                $khoahoc = $kh->laykhoahoc($_GET["id"]);
                include("updateform.php");
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
            $lh->CapnhatLop($lophochh);

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


        case "themhv":
            $hocvien = $hv->layhocvien();
            $lophoc = $lh->laylophoc();
            include("addform.php");
            break;
        case "xulythemhv":
            // Kiểm tra xem các biến $_POST có tồn tại không
            if (isset($_POST["lophoc_id"]) && isset($_POST["hocvien_id"])) {
                $lophoc_id = $_POST["lophoc_id"];
                $hocvien_id = $_POST["hocvien_id"];

                // Kiểm tra xem học viên đã tồn tại trong lớp học chưa
                if ($dkh->kiemTraTonTai($hocvien_id, $lophoc_id)) {
                    // Học viên đã tồn tại trong lớp, hiển thị thông báo lỗi
                    echo "<script>alert('Học viên đã tồn tại trong lớp học này.'); window.history.back();</script>";
                } else {
                    // Học viên chưa tồn tại trong lớp, thực hiện thêm đăng ký học
                    if ($dkh->themDangKyHoc($lophoc_id, $hocvien_id)) {
                        // Nếu thêm thành công, hiển thị lại danh sách
                        $dangkyhocs = $dkh->layDangKyHoc();
                        include("main.php");
                    } else {
                        // Nếu có lỗi, xử lý tùy ý (ví dụ: thông báo lỗi)
                        echo "Đã xảy ra lỗi khi thêm đăng ký học.";
                    }
                }
            } else {
                // Xử lý trường hợp nếu thiếu thông tin từ form
                echo "Thiếu thông tin cần thiết.";
            }
            break;

        default:
            break;
    }

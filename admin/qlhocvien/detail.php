<?php include("../inc/top.php"); ?>
<?php require_once("../../model/hocvien.php"); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Thông tin chi tiết học viên</h2>
            <?php
            // Kiểm tra xem có ID học viên được truyền từ trang tìm kiếm không
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Tạo một đối tượng HOCVIEN để lấy thông tin chi tiết
                $s = new HOCVIEN();
                $hocvien = $s->layhocvientheoid($id);

                // Kiểm tra xem có thông tin học viên hay không
                if ($hocvien) {
            ?>
                    <div class="card">
                        <div class="card-body">
                            <p><strong>Họ và Tên:</strong> <?php echo $hocvien['hoten']; ?></p>
                            <p><strong>Năm Sinh:</strong> <?php echo $hocvien['namsinh']; ?></p>
                            <p><strong>Giới Tính:</strong> <?php echo $hocvien['gioitinh']; ?></p>
                            <p><strong>Email:</strong> <?php echo $hocvien['email']; ?></p>
                            <p><strong>Số Điện Thoại:</strong> <?php echo $hocvien['sodienthoai']; ?></p>
                            <p><strong>Địa Chỉ:</strong> <?php echo $hocvien['diachi']; ?></p>
                            <p><strong>Diem:</strong> <?php echo $hocvien['diem']; ?></p>
                            <p><strong>Ket qua:</strong> <?php echo $hocvien['ketqua']; ?></p>
                            <p><strong>Hình Ảnh:</strong></p>
                            <img src="../../<?php echo $hocvien['hinhanh']; ?>" class="img-thumbnail"   alt="Hình ảnh học viên">

                    <?php
                } else {
                    // Hiển thị thông báo nếu không tìm thấy thông tin học viên
                    echo "<div class='alert alert-danger' role='alert'>Không tìm thấy thông tin học viên!</div>";
                }
            } else {
                // Hiển thị thông báo nếu không có ID học viên được truyền
                echo "<div class='alert alert-danger' role='alert'>Không có ID học viên được truyền!</div>";
            }
                    ?>
                        </div>
                    </div>
                    <div class="col-sm text-center">
                        <td class="text-center">
                            <a href="index.php?action=sua&id=<?php echo $hocvien['id']; ?>" class="btn btn-outline-warning"> <i class="fa-solid fa-wrench fa-bounce fa-lg" style="color: #f1d93b;"></i> </a>
                        </td>
                        <td class="text-center">
                            <a href="index.php?action=xoa&id=<?php echo $hocvien['id']; ?>" class="btn btn-outline-danger"> <i class="fa-solid fa-trash fa-bounce fa-lg" style="color: #de1735;"></i></a>
                        </td>
                    </div>
        </div>
    </div>
</div>


<?php include("../inc/bottom.php"); ?>
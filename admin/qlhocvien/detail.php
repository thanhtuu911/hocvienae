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
                        <div class="card-body text-center">
                            <p><strong>Họ và Tên:</strong> <?php echo $hocvien['hoten']; ?></p>
                            <p><strong>Năm Sinh:</strong> <?php echo $hocvien['namsinh']; ?></p>
                            <p><strong>Giới Tính:</strong> <?php echo $hocvien['gioitinh']; ?></p>
                            <p><strong>Email:</strong> <?php echo $hocvien['email']; ?></p>
                            <p><strong>Số Điện Thoại:</strong> <?php echo $hocvien['sodienthoai']; ?></p>
                            <p><strong>Địa Chỉ:</strong> <?php echo $hocvien['diachi']; ?></p>
                            <!-- <p><strong>Hình Ảnh:</strong></p> -->
                            <img src="../../<?php echo $hocvien['hinhanh']; ?>" width="50%"  class="img-thumbnail"   alt="Hình ảnh học viên">

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
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Thông tin đăng ký học</h5>
        <?php
            // Kiểm tra xem có ID học viên được truyền từ trang tìm kiếm không
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Tạo một đối tượng DANGKYHOC để lấy thông tin đăng ký học
                $s = new DANGKYHOC();
              
                // Kiểm tra xem có thông tin học viên hay không
                if ($hocvien) {
                    // Lấy thông tin đăng ký học của học viên
                    $dangkyhoc = $s->layDangKyHocTheoIdHocVien($id);

                    if ($dangkyhoc) {
                        // Hiển thị thông tin đăng ký học dưới dạng bảng
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-striped">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">Tên lớp</th>';
                        echo '<th scope="col">Thi Lần 1</th>';
                        echo '<th scope="col">Thi Lần 2</th>';
                        echo '<th scope="col">Điểm</th>';
                        echo '<th scope="col">Kết quả</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        foreach ($dangkyhoc as $dkhoc) {
                            echo '<tr>';
                            echo '<td>' . $dkhoc['tenlop'] . '</td>';
                            echo '<td>' . $dkhoc['thilan1'] . '</td>';
                            echo '<td>' . $dkhoc['thilan2'] . '</td>';
                            echo '<td>' . $dkhoc['diem'] . '</td>';
                            echo '<td>' . $dkhoc['ketqua'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo "<p>Học viên này chưa đăng ký học.</p>";
                    }
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



<?php include("../inc/bottom.php"); ?>
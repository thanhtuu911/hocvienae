<?php include("../inc/top.php") ?>
<style>
    .container{
        background-color: #e6e6fa; 
        padding: 20px;
    }
</style>
<?php
// Tạo một đối tượng DANGKYHOC
$dangkyhoc = new DANGKYHOC();

// Gọi phương thức layDangKyHoc để lấy danh sách đăng ký học
$dangkyhocList = $dangkyhoc->layDangKyHoc();

// Kiểm tra nếu có dữ liệu
 if ($dangkyhocList): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4">Danh sách đăng ký học</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên lớp học</th>
                                <th scope="col">Học viên</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dangkyhocList as $dangkyhoc): ?>
                                <tr>
                                    <td><?php echo $dangkyhoc['id']; ?></td>
                                    <td><?php echo $dangkyhoc['tenlop']; ?></td>
                                    <td><?php echo $dangkyhoc['hoten']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="alert alert-warning mt-4" role="alert">
            Không có dữ liệu đăng ký học.
        </div>
    </div>
<?php endif; ?>
<a href="addform.php" class="btn btn-warning" style="margin-top: 10px;">Thêm học viên vào lớp</a>
<?php include("../inc/bottom.php") ?>
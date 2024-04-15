<?php include("../inc/top.php") ?>
<style>
    .container {
        background-color: #e6e6fa;
        padding: 20px;
    }
</style>
<h1>Danh sách đăng ký học</h1>

<!-- Form tìm kiếm -->
<form action="" method="GET">
    <input type="text" name="keyword" placeholder="Nhập tên học viên...">
    <button type="submit" class="btn btn-outline-info" name="search"><i class="fa-brands fa-searchengin fa-shake fa-xl" style="color: #28b4f0;"></i></button>
</form>

<?php
// Tạo một đối tượng DANGKYHOC
$dangkyhoc = new DANGKYHOC();

// Kiểm tra nếu có dữ liệu từ form tìm kiếm
if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    $dangkyhocList = $dangkyhoc->timKiemHocVien($keyword);
    if ($dangkyhocList) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Tên lớp học</th>
                                    <th scope="col">Học viên</th>
                                    <th scope="col">Điểm</th>
                                    <th scope="col">Kết quả</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dangkyhocList as $dangkyhoc) : ?>
                                    <tr>
                                        <td><?php echo $dangkyhoc['tenlop']; ?></td>
                                        <td><?php echo $dangkyhoc['hoten']; ?></td>
                                        <td><?php echo $dangkyhoc['diem']; ?></td>
                                        <td><?php echo $dangkyhoc['ketqua']; ?></td>
                                        <td><a href="index.php?action=sua&id=<?php echo $dangkyhoc['id']; ?>" class="btn btn-outline-warning "><i class="fa-solid fa-edit fa-fade fa-lg" style="color: #f1d93b;"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<div class='container'><div class='alert alert-warning mt-4' role='alert'>Không tìm thấy kết quả.</div></div>";
    }
} else {
    // Nếu không có dữ liệu từ form tìm kiếm, hiển thị danh sách đăng ký học bình thường
    $dangkyhocList = $dangkyhoc->layDangKyHoc();
    if ($dangkyhocList) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Tên lớp học</th>
                                    <th scope="col">Học viên</th>
                                    <th scope="col">Điểm</th>
                                    <th scope="col">Kết quả</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dangkyhocList as $dangkyhoc) : ?>
                                    <tr>
                                        <td><?php echo $dangkyhoc['tenlop']; ?></td>
                                        <td><?php echo $dangkyhoc['hoten']; ?></td>
                                        <td><?php echo $dangkyhoc['diem']; ?></td>
                                        <td><?php echo $dangkyhoc['trang_thai']; ?></td>
                                        <td><a href="index.php?action=sua&id=<?php echo $dangkyhoc['id']; ?>" class="btn btn-outline-warning "><i class="fa-solid fa-edit fa-fade fa-lg" style="color: #f1d93b;"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<div class='container'><div class='alert alert-warning mt-4' role='alert'>Không có dữ liệu đăng ký học.</div></div>";
    }
}
?>

<a href="index.php?action=them" class="btn btn-warning" style="margin-top: 10px;">Thêm học viên vào lớp</a>
<?php include("../inc/bottom.php") ?>

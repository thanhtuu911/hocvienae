<?php include("../inc/top.php") ?>
<style>
    .container {
        background-color: #e6e6fa;
        padding: 20px;
    }
</style>
<div class="input-group justify-content-center">
    <form action="index.php" method="GET">
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="keyword" placeholder="Nhập tên học viên...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-info" name="search"><i class="fa-brands fa-searchengin fa-shake fa-xl" style="color: #28b4f0;"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="mb-2">
<a href="index.php?action=them" class="btn btn-warning" style="margin-top: 10px;">Thêm học viên vào lớp</a>

</div>
<h1>Danh sách đăng ký học</h1>
<!-- Form tìm kiếm -->


<?php
require_once('../../model/dangkyhoc.php');
$classGroups = array();

// Nếu không có dữ liệu từ form tìm kiếm, hiển thị danh sách đăng ký học bình thường
$dangkyhoc = new DANGKYHOC();
$dangkyhocList = $dangkyhoc->layDangKyHoc();
if ($dangkyhocList) {
    // Duyệt qua danh sách các lớp học và nhóm chúng lại dựa trên tên lớp
    foreach ($dangkyhocList as $dangkyhoc) {
        $tenlop = $dangkyhoc['tenlop'];
        if (!isset($classGroups[$tenlop])) {
            // Nếu chưa tồn tại nhóm cho lớp học này, tạo mới
            $classGroups[$tenlop] = array();
        }
        // Thêm thông tin đăng ký học vào nhóm tương ứng
        $classGroups[$tenlop][] = $dangkyhoc;
    }}
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
                                    <th scope="col">Thi lần 1</th>
                                    <th scope="col">Thi lần 2</th>
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
                                        <td><?php echo $dangkyhoc['thilan1']; ?></td>
                                        <td><?php echo $dangkyhoc['thilan2']; ?></td>
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
        <div class='container'>
            <a href='index.php' class='btn btn-primary'><i class="fa-solid fa-rotate-left fa-bounce fa-xl" style="color: #d01b48;"></i></a>
        </div>
    <?php
    } else {
        echo "<div class='container'>
                <div class='alert alert-warning mt-4' role='alert'>Không tìm thấy kết quả.</div>
                <a href='index.php' class='btn btn-outline-success'>Trở Về</a>
            </div>";
    }
} else {
    // Nếu không có dữ liệu từ form tìm kiếm, hiển thị danh sách đăng ký học bình thường
    $dangkyhocList = $dangkyhoc->layDangKyHoc();
    if ($dangkyhocList) {
    ?>
        <div class="container">
        <?php foreach ($classGroups as $tenlop => $classGroup) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo $tenlop; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Học viên</th>
                                            <th scope="col">Thi lần 1</th>
                                            <th scope="col">Thi lần 2</th>
                                            <th scope="col">Điểm</th>
                                            <th scope="col">Kết quả</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($classGroup as $dangkyhoc) : ?>
                                            <tr>
                                                <td><?php echo $dangkyhoc['hoten']; ?></td>
                                                <td><?php echo $dangkyhoc['thilan1']; ?></td>
                                                <td><?php echo $dangkyhoc['thilan2']; ?></td>
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
            </div>
        <?php endforeach; ?>
    </div>
<?php
    } else {
        echo "<div class='container'><div class='alert alert-warning mt-4' role='alert'>Không có dữ liệu đăng ký học.</div></div>";
    }
}
?>

<?php include("../inc/bottom.php") ?>
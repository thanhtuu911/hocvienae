<?php include("../inc/top.php"); ?>

<!-- Phần input và nút tìm kiếm -->
<div class="container mt-3">
    <form method="GET" action="index.php">
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm..." name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-info" type="submit"><i class="fa-brands fa-searchengin fa-shake fa-xl" style="color: #28b4f0;"></i>Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>

<!-- Danh sách lớp học -->
<div class="container mt-5">
    <h2>Danh sách lớp học</h2>
    <table class="table" style="background-color: #e6e6fa; padding: 20px;">
        <!-- Các tiêu đề của bảng -->
        <thead>
            <tr>
                <th></th>
                <th>Tên lớp</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Giáo viên</th>
                <th>Khóa học</th>
                <th colspan="2">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Kiểm tra xem có từ khóa tìm kiếm không
            $searchKeyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

            // Duyệt qua danh sách lớp học
            foreach ($lophoc as $l) :
                // Nếu không có từ khóa hoặc tên lớp học chứa từ khóa thì hiển thị
                if (!$searchKeyword || stripos($l['tenlop'], $searchKeyword) !== false) : ?>
                    <tr>
                        <!-- Hiển thị thông tin của lớp học -->
                        <td>
                        <td>
                            <a href="index.php?action=chitiet&id=<?php echo $l['lop_id']; ?>"> <?php echo $l['tenlop']; ?> </a>
                        </td>
                        </td>
                        <td><?php echo $l['ngaybatdau']; ?></td>
                        <td><?php echo $l['ngayketthuc']; ?></td>
                        <td><?php echo $l['giaovien_hoten']; ?></td>
                        <td><?php echo $l['tenkhoahoc']; ?></td>
                        <td>
                            <!-- Các thao tác -->
                            <a class="btn btn-outline-warning" data-toggle="modal" data-target="#suaLop<?php echo $l['lop_id']; ?>">
                                <i class="fa-solid fa-edit fa-fade fa-lg" style="color: #f1d93b;"></i>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $l['lop_id']; ?>);" class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash fa-fade fa-lg" style="color: #de1735;"></i>
                            </a>
                        </td>
                    </tr>
            <?php 
                endif;
            endforeach; ?>
        </tbody>
    </table>
</div>

<?php
// Duyệt lại danh sách lớp học để đặt modal sửa lớp
foreach ($lophoc as $l) : ?>
    <!-- Modal Sửa Lớp -->
    <div class="modal fade" id="suaLop<?php echo $l['lop_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="suaLopLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="suaLopLabel">Sửa thông tin lớp học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php">
                        <input type="hidden" name="action" value="xulysua">
                        <input type="hidden" name="id" value="<?php echo $l['lop_id']; ?>">
                        <div class="form-group">
                            <label for="tenlop">Tên lớp:</label>
                            <input type="text" class="form-control" id="tenlop" name="tenlop" value="<?php echo $l['tenlop']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ngaybatdau">Ngày bắt đầu:</label>
                            <input type="date" class="form-control" id="ngaybatdau" name="ngaybatdau" value="<?php echo $l['ngaybatdau']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ngayketthuc">Ngày kết thúc:</label>
                            <input type="date" class="form-control" id="ngayketthuc" name="ngayketthuc" value="<?php echo $l['ngayketthuc']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="giaovien_id">Giáo viên ID:</label>
                            <input type="text" class="form-control" id="giaovien_id" name="giaovien_id" value="<?php echo $l['giaovien_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="khoahoc_id">Khóa học ID:</label>
                            <input type="text" class="form-control" id="khoahoc_id" name="khoahoc_id" value="<?php echo $l['khoahoc_id']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="capnhat">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Script xác nhận xóa -->
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
            window.location.href = 'index.php?action=xoa&id=' + id;
        }
    }
</script>

<?php include("../inc/bottom.php"); ?>

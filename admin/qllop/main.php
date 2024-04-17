<?php include("../inc/top.php"); ?>

<!-- Phần input và nút tìm kiếm -->
<div class="input-group justify-content-center" >
<form method="GET" action="index.php">
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm..." name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-info" type="submit" ><i class="fa-brands fa-searchengin fa-shake fa-xl" style="color: #28b4f0;"></i>Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
<br>
<a href="index.php?action=them" class="btn btn-outline-primary">
	<i class="fa-solid fa-plus fa-lg" style="color: #3be8c5;"></i>
	Thêm Lớp Học
</a>
<br>    


<!-- Danh sách lớp học -->
<div class="container mt-2">
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
                            <a class="btn btn-outline-warning" href="index.php?action=sua&id=<?php echo $l['lop_id']; ?>">
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

<!-- Script xác nhận xóa -->
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
            window.location.href = 'index.php?action=xoa&id=' + id;
        }
    }
</script>

<?php include("../inc/bottom.php"); ?>

<?php include("../inc/top.php"); ?>

<!-- Form thêm lớp học -->
<h2>Thêm lớp học</h2>
        <form method="post" action="index.php">
        <input type="hidden" name="action" value="xulythem">
            <div class="form-group">
                <label for="tenlop">Tên lớp:</label>
                <input type="text" class="form-control" id="tenlop" name="tenlop" required>
            </div>
            <div class="form-group">
                <label for="ngaybatdau">Ngày bắt đầu:</label>
                <input type="date" class="form-control" id="ngaybatdau" name="ngaybatdau" required>
            </div>
            <div class="form-group">
                <label for="ngayketthuc">Ngày kết thúc:</label>
                <input type="date" class="form-control" id="ngayketthuc" name="ngayketthuc" required>
            </div>
            <div class="form-group">
                <label for="giaovien_id">Giáo viên ID:</label>
                <input type="text" class="form-control" id="giaovien_id" name="giaovien_id" required>
            </div>
            <div class="form-group">
                <label for="khoahoc_id">Khóa học ID:</label>
                <input type="text" class="form-control" id="khoahoc_id" name="khoahoc_id" required>
            </div>
            <button type="submit" class="btn btn-primary" name="them">Thêm</button>
        </form>
<?php include("../inc/bottom.php"); ?>
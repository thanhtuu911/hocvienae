<?php include("../inc/top.php"); ?>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cập nhật thông tin lớp học</h2>
        <?php if (isset($m)) : ?>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
                <div class="mb-3">
                    <label for="tenlop" class="form-label">Tên Lớp:</label>
                    <input type="text" id="tenlop" name="tenlop" class="form-control" value="<?php echo $m['tenlop']; ?>">
                </div>
                <div class="mb-3">
                    <label for="ngaybatdau" class="form-label">Ngày Bắt Đầu:</label>
                    <input type="date" id="ngaybatdau" name="ngaybatdau" class="form-control" value="<?php echo $m['ngaybatdau']; ?>">
                </div>
                <div class="mb-3">
                    <label for="ngayketthuc" class="form-label">Ngày Kết Thúc:</label>
                    <input type="date" id="ngayketthuc" name="ngayketthuc" class="form-control" value="<?php echo $m['ngayketthuc']; ?>">
                </div>
                <div class="mb-3">
                    <label for="giaovien_id" class="form-label">Giáo Viên:</label>
                    <select id="giaovien_id" name="giaovien_id" class="form-select">
                        <?php foreach ($giaovien as $gv) : ?>
                            <option value="<?php echo $gv['id']; ?>" <?php if ($gv['id'] == $m['giaovien_id']) echo "selected"; ?>><?php echo $gv['hoten']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="khoahoc_id" class="form-label">Khóa Học:</label>
                    <select id="khoahoc_id" name="khoahoc_id" class="form-select">
                        <?php foreach ($khoahoc as $kh) : ?>
                            <option value="<?php echo $kh['id']; ?>" <?php if ($kh['id'] == $m['khoahoc_id']) echo "selected"; ?>><?php echo $kh['tenkhoahoc']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        <?php endif; ?>
    </div>
    
</body>

</html>

<?php include("../inc/bottom.php"); ?>
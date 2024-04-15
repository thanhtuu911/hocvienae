<?php include("../inc/top.php") ?>
<style>
    #addForm {
        width: 50%;
        margin: 0 auto;
    }
    .form-group {
        text-align: center;
    }
</style>
<form action="index.php" Method="POST" id="addForm">
    <input type="hidden" name="action" value="xulythem">
    <div class="form-group">
        <label for="lophoc_id">Lớp học:</label>
        <select class="form-select" name="lophoc_id">
            <?php foreach ($lophoc as $lh) : ?>
                <option value="<?php echo $lh["id"]; ?>"><?php echo $lh["tenlop"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="hocvien_id">Học viên:</label>
        <select class="form-select" name="hocvien_id">
            <?php foreach ($hocvien as $hv) : ?>
                <option value="<?php echo $hv["id"]; ?>"><?php echo $hv["hoten"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input class="btn btn-outline-danger mt-2" type="submit" value="Thêm Đăng ký học">
</form>
<?php include("../inc/bottom.php") ?>

<?php include("../inc/top.php"); ?>

<h3>Thêm khóa học</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="action" value="xulythem">
<div class="mb-3 mt-3">
	<label for="optdanhmuc" class="form-label">Danh Mục</label>
	<select class="form-select" name="optdanhmuc">
	<?php
	foreach($danhmuc as $d):
	?>
		<option value="<?php echo $d["id"]; ?>"><?php echo $d["tendanhmuc"]; ?></option>
	<?php
	endforeach;
	?>
	</select>
</div>
<div class="mb-3 mt-3">
	<label for="txttenkhoahoc" class="form-label">Tên Khóa Học</label>
	<input class="form-control" type="text" name="txttenkhoahoc" placeholder="Nhập tên khóa học" required>
</div>

<div class="mb-3 mt-3">
	<label for="txtgiaban" class="form-label">Phí</label>
	<input class="form-control" type="number" name="txtphi" value="0">
</div>

<div class="mb-3 mt-3">
	<label for="txtmota" class="form-label">Mô tả</label>
	<textarea id="txtmota" rows="5" class="form-control" name="txtmota" placeholder="Nhập mô tả" required></textarea>
</div>
<div class="mb-3 mt-3">
	<label>Hình ảnh</label>
	<input class="form-control" type="file" name="filehinhanh">
</div>
<div class="mb-3 mt-3">
	<input type="submit" value="Lưu" class="btn btn-success">
	<input type="reset" value="Hủy" class="btn btn-warning">
</div>
</form>

<?php include("../inc/bottom.php"); ?>
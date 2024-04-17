<?php include("../inc/top.php"); ?>
<div>
	<h3>Cập Nhật Khóa Học</h3>
	<form method="post" action="index.php" enctype="multipart/form-data">
		<input type="hidden" name="action" value="xulysua">
		<input type="hidden" name="txtid" value="<?php echo $m["id"]; ?>">
		<div class="my-3">
			<label>Danh Mục</label>
			<select class="form-control" name="optdanhmuc">
				<?php foreach ($danhmuc as $dm) { ?>
					<option value="<?php echo $dm["id"]; ?>" <?php if ($dm["id"] == $m["danhmuc_id"]) echo "selected"; ?>><?php echo $dm["tendanhmuc"]; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="my-3">
			<label>Tên Khóa Học</label>
			<input class="form-control" type="text" name="txttenhang" required value="<?php echo $m["tenkhoahoc"]; ?>">
		</div>
		<div class="my-3">
			<label>Mô tả</label>
			<textarea class="form-control" name="txtmota" id="txtmota" required><?php echo $m["chitiet"]; ?></textarea>
		</div>
		<div class="my-3">
			<label>Phí</label>
			<input class="form-control" type="number" name="txtgiagoc" required value="<?php echo ($m["phi"]); ?>">
		</div>

		<div class="my-3">
			<label>Hình ảnh</label><br>
			<input type="hidden" name="txthinhcu" value="<?php echo $m["hinhanh"]; ?>">
			<img src="../../<?php echo $m["hinhanh"]; ?>" width="50" class="img-thumbnail">
			<a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
			<div id="demo" class="collapse m-3">
				<input type="file" class="form-control" name="filehinhanh">
			</div>
		</div>

		<div class="my-3">
			<input class="btn btn-primary" type="submit" value="Lưu">
			<input class="btn btn-warning" type="reset" value="Hủy">
		</div>
	</form>
</div>

<script>
	ClassicEditor
		.create(document.querySelector('#txtmota'))
		.catch(error => {
			console.error(error);
		});
</script>

<?php include("../inc/bottom.php"); ?>
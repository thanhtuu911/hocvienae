<?php include("../inc/top.php"); ?>

<h3>Thêm giáo viên</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="action" value="xulythem">

<div class="mb-3 mt-3">
	<label for="txthoten" class="form-label">Tên giáo viên</label>
	<input class="form-control" type="text" name="txthoten" placeholder="Nhập tên giáo viên" required>
</div>

<div class="mb-3 mt-3">
	<label for="txtemail" class="form-label">Email</label>
	<input class="form-control" type="text" name="txtemail" placeholder="Nhập email" required >
</div>

<div class="mb-3 mt-3">
	<label for="txtsdt" class="form-label">Số điện thoại</label>
	<input id="txtsdt"  class="form-control" name="txtsdt" placeholder="Nhập mô tả" type="text" required>
<div class="mb-3 mt-3">
	<label>Hình ảnh</label>
	<input class="form-control" type="file" name="filehinhanh">
</div>
<div class="mb-3 mt-3">
	<input type="submit" value="Lưu" class="btn btn-outline-success">
	<input type="reset" value="Hủy" class="btn btn-outline-warning">
</div>
</form>

<?php include("../inc/bottom.php"); ?>
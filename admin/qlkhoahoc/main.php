<?php include("../inc/top.php"); ?>

<a href="index.php?action=them" class="btn btn-outline-primary">
	<i class="fa-solid fa-plus fa-lg" style="color: #3be8c5;"></i>
	Thêm Khóa Học
</a>
<br><br>
<?php
// Đếm số lượng khóa học
$soluongkhoahoc = count($khoahoc);
?>

<table class="table table-hover" style="background-color: #e6e6fa; padding: 20px;">
	<h1 class="">Danh sách khóa học: <?php echo $soluongkhoahoc; ?> khóa học</h1>

	<tr>
		<th>STT</th>
		<th>Tên Khóa Học</th>
		<th>Chi Tiết</th>
		<th>Phí</th>
		<th>Hình ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	$stt = 1;
	foreach ($khoahoc as $k) :
	?>
		<tr>
			<td><?php echo $stt; ?></td>
			<td>
				<a href="index.php?action=chitiet&id=<?php echo $k["id"]; ?>">
					<?php echo $k["tenkhoahoc"]; ?>
				</a>
			</td>
			<td><?php echo $k["chitiet"]; ?></td>
			<td><?php echo number_format($k["phi"]); ?></td>
			<td>

				<img src="../../<?php echo $k["hinhanh"]; ?>" width="250" class="img-thumbnail"></a>
			</td>
			<td><a class="btn btn-outline-warning" href="index.php?action=sua&id=<?php echo $k["id"]; ?>"><i class="fa-solid fa-edit fa-fade fa-lg" style="color: #f1d93b;"></i></a></td>
			<td>
				<a href="javascript:void(0);" onclick="confirmDelete(<?php echo $k['id']; ?>);" class="btn btn-outline-danger">
					<i class="fa-solid fa-trash fa-fade fa-lg" style="color: #de1735;"></i>
				</a>
			</td>
		</tr>
	<?php
		$stt++;
	endforeach;
	?>
</table>

<script>
	function confirmDelete(id) {
		if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
			window.location.href = 'index.php?action=xoa&id=' + id;
		}
	}
</script>
<?php include("../inc/bottom.php"); ?>

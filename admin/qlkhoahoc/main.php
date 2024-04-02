<?php include("../inc/top.php"); ?>

<h3>Quản lý khóa học</h3> 
<br>
<a href="index.php?action=them" class="btn btn-outline-primary">
<i class="fa-solid fa-plus fa-xl" style="color: #3be8c5;"></i>
	Thêm Khóa Học
</a>
<br> <br> 
<table class="table table-hover"style="background-color: #e6e6fa; padding: 20px;">
	<tr>
		<th>Tên Khóa Học</th>
		<th>Chi Tiết</th>
		<th>Phí</th>
		<th>Hình ảnh</th>		
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	foreach($khoahoc as $k):
	?>
	<tr>
		<td>
			<a href="index.php?action=chitiet&id=<?php echo $k["id"]; ?>">
			<?php echo $k["tenkhoahoc"]; ?>
			</a>	
		</td>
		<td><?php echo $k["chitiet"]; ?></td>
		<td><?php echo number_format($k["phi"]); ?></td>
		<td>
			
			<img src="../../<?php echo $k["hinhanh"]; ?>" width="80" class="img-thumbnail"></a>
		</td>
		<td><a class="btn btn-outline-warning" href="index.php?action=sua&id=<?php echo $k["id"]; ?>"><i class="fa-solid fa-wrench fa-bounce fa-xl" style="color: #f1d93b;"></i></a></td>
		<td><a class="btn btn-outline-danger" href="index.php?action=xoa&id=<?php echo $k["id"]; ?>"><i class="fa-solid fa-trash fa-bounce fa-xl" style="color: #de1735;"></i></a></td>
	</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>

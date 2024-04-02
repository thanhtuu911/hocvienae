<?php include("../inc/top.php"); ?>

<h3>Quản lý đơn hàng</h3> 
<br>

<br>
<table class="table table-hover" style="background-color: #e6e6fa; padding: 20px;">
	<tr>
		<th>ID đơn hàng</th>
		<th>Tên khách hàng</th>
		<!-- <th>Địa chỉ</th> -->
		<th>Ngày</th>		
		<th>Tổng tiền</th>
		<th>Chi tiết</th>

	</tr>
	<?php 
	foreach ($donhang as $dh): 
	?>
	<tr>
			<td><?php echo $dh["hoadon_id"]; ?></td>
			<td><?php echo $dh["nguoidung_id"]; ?></td>
			<td><?php echo $dh["ngaythanhtoan"]; ?></td>
			<td><?php echo number_format($dh["tongtien"]) ?> VNĐ</td>
			<td><a href="index.php?action=chitiet&id=<?php echo $dh["hoadon_id"]; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-info fa-beat-fade fa-xl" style="color: #3c77dd;"></i></a></td>
		</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>

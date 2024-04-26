<?php include("../inc/top.php"); ?>

<h2>Danh sách hóa đơn</h2>
<br>
<!-- Hiển thị số lượng hóa đơn -->
<h4>Số lượng hóa đơn: <?php echo count($donhang); ?></h4>

<table class="table table-hover" style="background-color: #e6e6fa; padding: 20px;">
	<tr>
		<th>ID hóa đơn</th>
		<th>Tên khách hàng</th>
		<!-- <th>Địa chỉ</th> -->
		<th>Ngày tạo hóa đơn</th>
		<th>Tổng tiền</th>
		<th>Chi tiết</th>

	</tr>
	<?php
	foreach ($donhang as $dh) :
	?>
		<tr>
			<td><?php echo $dh["hoadon_id"]; ?></td>
			<td><?php echo $dh["nguoidung_id"]; ?></td>
			<td><?php echo date('d/m/Y H:i:s', strtotime($dh["ngaythanhtoan"])); ?></td>

			<td><?php echo number_format($dh["tongtien"]) ?> VNĐ</td>
			<td><a href="index.php?action=chitiet&id=<?php echo $dh["hoadon_id"]; ?>" class="btn btn-outline-primary"><i class="fa-solid fa-info fa-beat-fade fa-lg" style="color: #3c77dd;"></i></a></td>		
		</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>
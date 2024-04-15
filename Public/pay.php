<?php
include("inc/top.php");
?>

<style>
	/* Đặt padding-top để tránh bị trang top đè lên */
	body {
		padding-top: 100px;
		/* Điều chỉnh giá trị theo yêu cầu */
		margin-top: 40px;
	}

	/* Đảm bảo trang top nằm phía trên trang cart */
	.row {
		z-index: 1000;
	}
	 /* Đặt kích thước cho cửa sổ modal */
	 .modal-dialog {
        max-width: 35%; /* Đặt kích thước tối đa là 50% */
	
    }
</style>

<div class="container">
	<div class="row">
		<!-- <h3>Vui lòng nhập đầy đủ thông tin</h3> -->
		<div class="col-sm-6">
			<h4 class="text-info">Thông tin khách hàng</h4>
			<?php
			if (isset($_SESSION["khachhang"])) {
			?>
				<form method="post" action="index.php">
					<input type="hidden" name="txtid" value="<?php echo $_SESSION["khachhang"]["id"]; ?>">
					<input type="hidden" name="action" value="luudonhang">
					<div class="my-3">
						<label>Email</label>
						<input type="email" class="form-control" name="txtemail" value="<?php echo $_SESSION["khachhang"]["email"]; ?>" disabled>
					</div>
					<div class="my-3">
						<label>Họ tên</label>
						<input type="text" class="form-control" name="txthoten" value="<?php echo $_SESSION["khachhang"]["hoten"]; ?>" disabled>
					</div>
					<div class="my-3">
						<label>Số điện thoại</label>
						<input type="number" class="form-control" name="txtsodienthoai" value="<?php echo $_SESSION["khachhang"]["sodienthoai"] ?>" disabled>
					</div>

					<div class="my-3">
						<input type="submit" value="Hoàn tất đăng ký" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#thankYouModal">
					</div>
					<div class="my-3">
				</form>
				<a href="qrpay" class="btn btn-danger">QR Pay</a>
		</div>

		</form>
	<?php
			} else {
	?>
		<form method="post" action="index.php">
			<input type="hidden" name="action" value="luudonhang">
			<div class="my-3">
				<label>Email</label>
				<input type="email" class="form-control" name="txtemail" required>
			</div>
			<!-- <div class="my-3">
						<label>Mật khẩu</label>
						<input type="text" class="form-control" name="txtpass" required>
					</div> -->
			<div class="my-3">
				<label>Họ tên</label>
				<input type="text" class="form-control" name="txthoten" required>
			</div>
			<div class="my-3">
				<label>Số điện thoại</label>
				<input type="text" class="form-control" name="txtsodienthoai" placeholder="This is password if you are login " required>
			</div>

			<div class="my-3">
				<input type="submit" value="Hoàn tất đăng ký" class="btn btn-info">
			</div>

		<?php
			}
		?>



	</div>

	<div class="col-sm-6">
		<h4 class="text-info">Thông tin thanh toán</h4>
		<table class="table table-bordered">
			<tr class="table-info">
				<th>STT</th>
				<th>Hình ảnh</th>
				<th>Khoá học</th>
				<th>Học phí</th>
				<th>Thành tiền</th>
			</tr>

			<?php
			$stt = 1;
			$giohang = laygiohang();
			foreach ($giohang as $id => $mh) : ?>
				<tr>
					<td><?php echo $stt; ?></td>
					<td><img width="50" height="50" src="../<?php echo $mh["hinhanh"]; ?>"></td>
					<td><?php echo $mh["tenkhoahoc"]; ?></td>
					<td><?php echo number_format($mh["phi"]) . "(VNĐ)"; ?></td>
					<td><?php echo number_format($mh["thanhtien"]) . "(VNĐ)"; ?></td>
				</tr>
			<?php
				$stt++;
			endforeach; ?>
			<tr class="table-info">
				<td colspan="4" class="text-end"><b>Tổng tiền</b></td>
				<td><b><?php echo number_format(tinhtiengiohang()); ?> VNĐ</b></td>
			</tr>
		</table>
	</div>

</div>

</div>


<!-- Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrModalLabel">Quét mã QR sau để hoàn tất thanh toán</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Ảnh mã QR sẽ được hiển thị ở đây -->
        <img src="../image/pay.jpg" alt="QR Code" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<script>
    // Lắng nghe sự kiện khi nút "QR Pay" được nhấn
    document.querySelector('a[href="qrpay"]').addEventListener('click', function(event) {
        // Ngăn chặn hành động mặc định của nút
        event.preventDefault();

        // Mở cửa sổ modal khi nhấn nút "QR Pay"
        var myModal = new bootstrap.Modal(document.getElementById('qrModal'));
        myModal.show();
    });
</script>




<?php
include("inc/bottom.php");
?>
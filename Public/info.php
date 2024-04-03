<?php include("inc/top.php"); ?>

<br><br>
<br><br>
<div class="container mt-5  ">
    <div class="row justify-content-center ">
        <div class="card p-2" style="width: 30rem;">
            <div class="card-header">
                <h4 class="text-info  text-center">HỒ SƠ NGƯỜI DÙNG</h4>
            </div>
            <?php
			if (isset($_SESSION["khachhang"])) {
			?>
            <form method="post" action="index.php">
                <input type="hidden" name="txtid" value="<?php echo $_SESSION["khachhang"]["id"]; ?>">
                <input type="hidden" name="action" value="luudonhang">
                <div class="my-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="txtemail"
                        value="<?php echo $_SESSION["khachhang"]["email"]; ?>" disabled>
                </div>
                <div class="my-3">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="txthoten"
                        value="<?php echo $_SESSION["khachhang"]["hoten"]; ?>" disabled>
                </div>
                <div class="my-3">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="txtsodienthoai"
                        value="<?php echo $_SESSION["khachhang"]["sodienthoai"] ?>" disabled>
                </div>
            </form>
            <?php	}	?>

        </div>

        <div class="row justify-content-center mt-5 ">
            <h4 class="text-info text-md-center">Thông tin thanh toán</h4>
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
                    <td><?php echo number_format($mh["phi"]) ."(VNĐ)"; ?></td>
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
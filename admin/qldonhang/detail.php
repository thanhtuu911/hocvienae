<?php include("../inc/top.php"); ?>

<h3>Chi tiết hóa đơn</h3>
<a href="index.php"> Trở về danh sách</a>

<table class="table table-hover" style="background-color: #e6e6fa; padding: 20px; margin-top:10px">

    <tr>
        <th>ID hóa đơn chi tiết</th>
        <th>Hóa đơn</th>
        <th>Khóa học</th>
        <th>Học phí</th>
        <th>Thành tiền</th>
    </tr>

    <?php if (isset($dhctt) && !empty($dhctt)) : ?>
        <tr>
            <td><?php echo $dhctt["id"]; ?></td>
            <td><?php echo $dhctt["hoadon_id"]; ?></td>
            <td><?php echo $dhctt["khoahoc_ten"]; ?></td>
            <td><?php echo number_format($dhctt["dongia"]); ?> VNĐ</td>
            <td ><?php echo number_format($dhctt["thanhtien"]); ?> VNĐ</td>
   
        </tr>
    <?php else : ?>
        <tr>
            <td colspan="6">Không tìm thấy đơn hàng chi tiết.</td>
        </tr>
    <?php endif; ?>

</table>

<?php include("../inc/bottom.php"); ?>

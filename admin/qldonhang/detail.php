<?php include("../inc/top.php"); ?>

<h3>Chi tiết hóa đơn</h3>
<a href="index.php">Trở về danh sách</a>

<table class="table table-hover">
    <tr>
        <th>ID hóa đơn chi tiết</th>
        <th>Hóa đơn</th>
        <th>Khóa học</th>
        <th>Học phí</th>
        <th>Thành tiền</th>
    </tr>

    <?php if (isset($dhct) && !empty($dhct)) : ?>
        <tr>
            <td><?php echo $dhct["id"]; ?></td>
            <td><?php echo $dhct["hoadon_id"]; ?></td>
            <td><?php echo $dhct["khoahoc_id"]; ?></td>
            <td><?php echo number_format($dhct["dongia"]); ?> VNĐ</td>
            <td ><?php echo number_format($dhct["thanhtien"]); ?> VNĐ</td>
        </tr>
    <?php else : ?>
        <tr>
            <td colspan="6">Không tìm thấy đơn hàng chi tiết.</td>
        </tr>
    <?php endif; ?>

</table>

<?php include("../inc/bottom.php"); ?>

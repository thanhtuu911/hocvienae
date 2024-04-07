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

    <?php if (!empty($dhctt)) : ?>
        <?php foreach ($dhctt as $dhct) : ?>
            <tr>
                <td><?php echo isset($dhct["id"]) ? $dhct["id"] : ''; ?></td>
                <td><?php echo isset($dhct["hoadon_id"]) ? $dhct["hoadon_id"] : ''; ?></td>
                <td><?php echo isset($dhct["khoahoc_ten"]) ? $dhct["khoahoc_ten"] : ''; ?></td>
                <td><?php echo isset($dhct["dongia"]) ? number_format($dhct["dongia"]) . ' VNĐ' : ''; ?></td>
                <td><?php echo isset($dhct["thanhtien"]) ? number_format($dhct["thanhtien"]) . ' VNĐ' : ''; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">Không tìm thấy đơn hàng chi tiết.</td>
        </tr>
    <?php endif; ?>

</table>

<?php include("../inc/bottom.php"); ?>

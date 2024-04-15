<?php include("../inc/top.php"); ?>

<h3>Chi tiết hóa đơn</h3>
<a href="index.php"> Trở về danh sách</a>

<table class="table table-hover" style="background-color: #e6e6fa; padding: 20px; margin-top:10px">

    <tr>
        <th>ID hóa đơn chi tiết</th>
        <th>Hóa đơn</th>
        <th>Tên khách hàng</th>
        <th>Khóa học</th>
        <th>Học phí</th>
        <th>Thành tiền</th>
    </tr>

    <?php if (!empty($dhctt)) : ?>
        <?php foreach ($dhctt as $dhct) : ?>
            <tr>
                <td><?php echo isset($dhct["id"]) ? $dhct["id"] : ''; ?></td>
                <td><?php echo isset($dhct["hoadon_id"]) ? $dhct["hoadon_id"] : ''; ?></td>
                <td><?php echo isset($dhct["hoten_nguoidung"]) ? $dhct["hoten_nguoidung"] : ''; ?></td>
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
<button class="btn btn-outline-info" id="printButton">In hóa đơn chi tiết</button>

<?php include("../inc/bottom.php"); ?>

<script>
    // Định nghĩa hàm in hóa đơn
    function printInvoice() {
        // Lấy nội dung của bảng chi tiết hóa đơn
        var invoiceTable = document.querySelector('.table');
        // Lấy thời gian hiện tại
        var currentTime = new Date().toLocaleString();
        // Tạo một cửa sổ mới để in
        var printWindow = window.open('export_invoice', '_blank');
        // Thêm nội dung bảng chi tiết hóa đơn và lời cảm ơn vào cửa sổ in
        printWindow.document.write('<html><head><title>Hóa đơn</title>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h1 style="text-align:center;">Chi tiết hóa đơn</h1>');
        printWindow.document.write(invoiceTable.outerHTML);
        // Thêm lời cảm ơn và thông tin thời gian vào dưới hóa đơn
        printWindow.document.write('<p style="text-align:center;">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>');
        printWindow.document.write('<p style="text-align:center;">Hóa đơn được in vào lúc: ' + currentTime + '</p>');
        printWindow.document.write('</body></html>');
        // In cửa sổ mới
        printWindow.print();
        // Đóng cửa sổ in sau khi in xong
        printWindow.close();
    }

    // Gán sự kiện nhấn vào nút in
    document.getElementById('printButton').addEventListener('click', printInvoice);
</script>


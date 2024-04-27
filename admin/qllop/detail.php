<?php include("../inc/top.php"); ?>
<body>
    <div class="container">
        <h2><?php echo $lop_hoc['tenlop']; ?></h2>
        <p>Ngày bắt đầu: <?php echo $lop_hoc['ngaybatdau']; ?></p>
        <p>Ngày kết thúc: <?php echo $lop_hoc['ngayketthuc']; ?></p>
        <?php
        // Tính số lượng học viên
        $soLuongHocVien = count($chi_tiet_hoc_viens);
        ?>

        <h3 class="mt-2">Danh sách học viên: <?php echo $soLuongHocVien; ?> học viên</h3>
        <div class="table-responsive" style="background-color: #e6e6fa;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Thi lần 1</th>
                        <th scope="col">Thi lần 2</th>
                        <th scope="col">Điểm</th>
                        <th scope="col">Kết quả</th>
                        <th scope="col">Thao tác</th> <!-- Thêm cột này để chứa các nút thêm và xóa -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chi_tiet_hoc_viens as $hoc_vien) : ?>
                        <tr>
                            <td><?php echo $hoc_vien['hoten']; ?></td>
                            <td><?php echo $hoc_vien['namsinh']; ?></td>
                            <td><?php echo $hoc_vien['gioitinh']; ?></td>
                            <td><?php echo $hoc_vien['email']; ?></td>
                            <td><?php echo $hoc_vien['sodienthoai']; ?></td>
                            <td><?php echo $hoc_vien['diachi']; ?></td>
                            <td><img src="../../<?php echo $hoc_vien['hinhanh']; ?>" width="100" class="img-thumbnail"></td>
                            <td><?php echo $hoc_vien['thilan1']; ?></td>
                            <td><?php echo $hoc_vien['thilan2']; ?></td>
                            <td><?php echo $hoc_vien['diem']; ?></td>
                            <td><?php echo $hoc_vien['ketqua']; ?></td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $hoc_vien['id']; ?>, <?php echo $lop_hoc['id']; ?>);" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash fa-fade fa-lg" style="color: #de1735;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a style="margin-top: 10px;" href="index.php?action=xem" class="btn btn-secondary">Quay lại</a>
    </div>
    <script>
        function confirmDelete(hocvien_id, lophoc_id) {
            if (confirm("Bạn có chắc chắn muốn xóa học viên ra khỏi lớp không?")) {
                window.location.href = 'index.php?action=xoahocvien&hocvien_id=' + hocvien_id + '&lophoc_id=' + lophoc_id;
            }
        }
    </script>
</body>
<?php include("../inc/bottom.php"); ?>
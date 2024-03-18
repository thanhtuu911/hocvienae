<?php include("../inc/top.php"); ?>
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm Học Viên
</a>
<br> 
<!-- main.php -->
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và Tên</th>
                <th>Năm Sinh</th>
                <th>Giới Tính</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Hình Ảnh</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocvien as $hv) : ?>
                <tr>
                    <td><?php echo $hv['id']; ?></td>
                    <td><?php echo $hv['hoten']; ?></td>
                    <td><?php echo $hv['namsinh']; ?></td>
                    <td><?php echo $hv['gioitinh']; ?></td>
                    <td><?php echo $hv['email']; ?></td>
                    <td><?php echo $hv['sodienthoai']; ?></td>
                    <td><?php echo $hv['diachi']; ?></td>
                    <td><img src="<?php echo $hv['hinhanh']; ?>" alt="Hình ảnh" style="width: 50px;"></td>
                    <td>
                        <a href="index.php?action=sua&id=<?php echo $hv['id']; ?>" class="btn btn-primary">Sửa</a>
                        <a href="index.php?action=xoa&id=<?php echo $hv['id']; ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include("../inc/bottom.php"); ?>

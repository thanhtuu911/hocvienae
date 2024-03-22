<?php include("../inc/top.php"); ?>
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm Học Viên
</a>
<br> 

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
            <?php foreach ($hocvien as $h) : ?>
                <tr>
                    <td><?php echo $h['id']; ?></td>
                    <td><?php echo $h['hoten']; ?></td>
                    <td><?php echo $h['namsinh']; ?></td>
                    <td><?php echo $h['gioitinh']; ?></td>
                    <td><?php echo $h['email']; ?></td>
                    <td><?php echo $h['sodienthoai']; ?></td>
                    <td><?php echo $h['diachi']; ?></td>
                    <td><img src="<?php echo $h['hinhanh']; ?>" alt="Hình ảnh" style="width: 50px;"></td>
                    <td>
                        <a href="index.php?action=sua&id=<?php echo $h['id']; ?>" class="btn btn-primary">Sửa</a>
                        <a href="index.php?action=xoa&id=<?php echo $h['id']; ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include("../inc/bottom.php"); ?>

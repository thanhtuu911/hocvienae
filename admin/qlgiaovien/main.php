<?php include("../inc/top.php"); ?>
<h2>Danh Sách Giáo Viên</h2> 

<a href="index.php?action=them" class="btn btn-outline-primary">
    <i class="fas fa-plus" style="color: #3be8c5;"></i> Thêm giáo viên
</a>
<br>
<div class="table-responsive">
    <table class="table table-hover" style="background-color: #e6e6fa; padding: 20px;">
        <thead class="table-light">
            <tr>
                <th scope="col">Tên giáo viên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($giaovien as $k): ?>
                <tr>
                    <td>
                        <a href="index.php?action=chitiet&id=<?php echo $k["id"]; ?>">
                            <?php echo $k["hoten"]; ?>
                        </a>    
                    </td>
                    <td><?php echo $k["email"]; ?></td>
                    <td><?php echo $k["sodienthoai"]; ?></td>
                    <td>
                        <img src="../../<?php echo $k["hinhanh"]; ?>" width="100" class="img-thumbnail">
                    </td>
                    <td>
                        <a class="btn btn-outline-warning" href="index.php?action=sua&id=<?php echo $k["id"]; ?>">
                            <i class="fas fa-edit fa-lg fa-fade " style="color: #f1d93b;"></i>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $k['id']; ?>);" class="btn btn-outline-danger">
                            <i class="fa-solid fa-trash fa-fade fa-lg" style="color: #de1735;"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
            window.location.href = 'index.php?action=xoa&id=' + id;
        }
    }
</script>
<?php include("../inc/bottom.php"); ?>

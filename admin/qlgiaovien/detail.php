<?php include("../inc/top.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <a href="index.php" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Trở về danh sách</a>
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title"><?php echo $m["hoten"]; ?></h3> 
                    <img src="../../<?php echo $m["hinhanh"]; ?>" width="200" class="img-thumbnail mb-3">
                    <p class="card-text"><strong>Email: </strong><?php echo $m["email"]; ?></p>
                    <p class="card-text"><strong>Số điện thoại: </strong><?php echo $m["sodienthoai"]; ?></p>
                    <div class="actions">
                        <a class="btn btn-outline-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><i class="bi bi-pencil-fill"></i> Sửa</a> 
                        <a class="btn btn-outline-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><i class="bi bi-trash"></i> Xóa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>

<?php include("../inc/top.php"); ?>

<a href="index.php">Trở về danh sách</a>
<h3><?php echo $m["tenkhoahoc"]; ?></h3> 
<img src="../../<?php echo $m["hinhanh"]; ?>" width="400" class="img-thumbnail"></a>
<p><strong>Mô tả: </strong><br><?php echo $m["chitiet"]; ?></p>
<p><strong>Phí: </strong><?php echo number_format($m["phi"]); ?>đ</p>
<p><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="edit"></i> Sửa</a> 
<a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="trash-2"></i> Xóa</a></p>	

<a href="index.php">Trở về danh sách</a>
<?php include("../inc/bottom.php"); ?>

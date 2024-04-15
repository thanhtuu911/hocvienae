<?php include("../inc/top.php"); ?>
<div>
<h3>Cập Nhật Giáo Viên</h3>
<form method="post" action="index.php" enctype="multipart/form-data">
<input type="hidden" name="action" value="xulysua">
<input type="hidden" name="txtid" value="<?php echo $m["id"]; ?>">
<div class="my-3">    

	
</div>
<div class="my-3">    
	<label>Tên Giáo Viên</label>    
	<input class="form-control" type="text" name="txthoten" required value="<?php echo $m["hoten"]; ?>">
</div> 
<div class="my-3">    
	<label>Email</label>    
	<input class="form-control" type="text" name="txtemail"  required value="<?php echo $m["email"]; ?>">
</div> 
<div class="my-3">    
	<label>Số điện thoại</label>    
	<input class="form-control" type="text" name="txtsdt" required value="<?php echo ($m["sodienthoai"]) ; ?>" >
</div> 

<div class="my-3">
	<label>Hình ảnh</label><br>
	<input type="hidden" name="txthinhcu" value="<?php echo $m["hinhanh"]; ?>">
	<img src="../../<?php echo $m["hinhanh"]; ?>" width="50" class="img-thumbnail">	
	<a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
	<div id="demo" class="collapse m-3">
	  <input type="file" class="form-control" name="filehinhanh">
	</div>
</div>

<div class="my-3">
<input class="btn btn-primary"  type="submit" value="Lưu">
<input class="btn btn-warning"  type="reset" value="Hủy">
</div>
</form>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#txtmota' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php include("../inc/bottom.php"); ?>
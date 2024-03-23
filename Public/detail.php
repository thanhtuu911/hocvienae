
<?php
include("inc/top.php");
?>

<div class="container mt-5 m-5 p-5">
    <div class="col-sm-9">      

      <h3 class="text-info mt-5"><?php echo $khct["tenkhoahoc"]; ?></h3>
      
      <div><img width="500px" src="../<?php echo $khct["hinhanh"]; ?>"></div>

      
      <div>
      <h4 class="text-primary">Phí học: 
        <span class="text-danger"><?php echo number_format($khct["phi"]); ?> đ</span>
      </h4>
  		<form method="post" class="form-inline">
    		<input type="hidden" name="action" value="chovaogio">
    		<input type="hidden" name="id" value="<?php echo $khct["id"]; ?>">
        <div class="row">
          <div class="col">
            <input type="number" class="form-control" name="soluong" value="1">
          </div>
          <div class="col">
            <input type="submit" class="btn btn-primary" value="Đăng Ký Ngay">
          </div>
        </div>		
    	</form>  	  
  	  </div>
    </div>
</div>
  
<?php
include("inc/bottom.php");
?>
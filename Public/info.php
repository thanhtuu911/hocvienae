<?php include("inc/top.php"); ?>

<br><br>
<br><br>
<div class="container mt-5  ">  
<div class="row "> 
    <h3>Trang thông tin khách hàng</h3>      
   <?php 
   $kh = new KHACHHANG();
   $_SESSION["nguoidung"] = $kh->laythongtinkhachhang($email);
   ?>
    <tr>
    <td> <a >Email: <?php echo $_SESSION["nguoidung"]["email"]; ?></a></td>
    <td> <a >Tên: <?php echo $_SESSION["nguoidung"]["hoten"]; ?></a></td>
    <td><a >Số điện thoại: <?php echo $_SESSION["nguoidung"]["sodienthoai"]; ?></a></td>
    </tr>
  
  
	<h4>Danh sách khóa học </h4>
    
</div>
</div>


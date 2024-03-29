<?php include("inc/top.php"); ?>



<div class="container mt-5 p-5">    
  <div class="row"> 
    <h3>Vui lòng nhập đầy đủ thông tin</h3>
	<div class="col-sm-6">
	<h4 class="text-info">Thông tin khách hàng</h4>
	
	<style>
        form {
            max-width: 500px;
            margin: auto;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <h2>Đăng ký khóa học</h2>
        <label for="hoten">Họ và tên:</label>
        <input type="text" id="hoten" name="hoten" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" id="namsinh" name="namsinh" required>
        <label for="sodienthoai">Số điện thoại:</label>
        <input type="text" id="sodienthoai" name="sodienthoai" required>
        <label for="diachi">Địa chỉ:</label>
        <input type="text" id="diachi" name="diachi">
        <input type="submit" value="Đăng ký">
    </form>

	<form method="post"  action="index.php">
		<input type="hidden" name="action" value="luudonhang">
		<div class="my-3">
			<label>Email</label>
			<input type="email" class="form-control" name="txtemail" required>
		</div>
		<div class="my-3">
			<label>Họ tên</label>
			<input type="text" class="form-control" name="txthoten" required>
		</div>
		<div class="my-3">
			<label>Số điện thoại</label>
			<input type="text" class="form-control" name="txtdienthoai" required>
		</div>
		<div class="my-3">
			<label>Địa chỉ</label>
			<textarea class="form-control" name="txtdiachi" required></textarea>
		</div>
		<div class="my-3">
			<input type="submit" value="Hoàn tất đơn hàng" class="btn btn-primary">
		</div>
	</form>
	
	</div>
	<!-- <div class="col-sm-6">
	<h4 class="text-info">Thông tin đơn hàng</h4>
		<table class="table table-bordered">
		<tr class="table-info">
		<th>Sản phẩm</th> 
		<th>Đơn giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
		</tr>
		<php foreach($giohang as $id => $mh): ?>
		<tr>
		<td><img width="50" src="../images/product/<php echo $mh["hinhanh"]; ?>"><php echo $mh["tenmathang"]; ?></td>
		<td><php echo number_format($mh["giaban"]) . "đ"; ?></td>
		<td><\?php echo $mh["soluong"]; ?></td>
		<td><php echo number_format($mh["thanhtien"]) . "đ"; ?></td>
		</tr>
		<php endforeach; ?>
		<tr class="table-info">
		<td colspan="3" class="text-end"><b>Tổng tiền</b></td>
		<td><b><php echo number_format( 878); ?>đ</b></td>
		</tr>
		</table>
	</div> -->
    
  </div> 
 
</div>

<?php include("inc/bottom.php"); ?>
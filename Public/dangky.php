<?php
include("inc/top.php");
?>

<div class="container  text-md-center mt-5 p-5">
    <div class="row justify-content-center">
        <h3 class='mt-5' style='color: #225673'>Vui lòng nhập đầy đủ thông tin</h3>
        <div class="col-sm-6">
            <!-- <h4 class="text-info">Thông tin khách hàng</h4> -->

            <style>
            form {
                max-width: 500px;
                margin: auto;
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
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

            <div class="card">
                <div class="card-header text-danger">
                    <h4>Đăng ký tài khoản</h4>
                </div>
                <div class=' card-body'>
                    <form action="index.php" method="post">
						<input type="hidden" name="action" value="themdangky">
                        <label for="hoten">Họ và tên:</label>
                        <input type="text" id="hoten" name="txthoten" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="txtemail" required>
                        <label for="txtpass">Mật khẩu:</label>
                        <input type="text" id="txtpass" name="txtpass" required>
                        <label for="sodienthoai">Số điện thoại:</label>
                        <input type="text" id="sodienthoai" name="txtsodienthoai" required>
                        
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <form method="post"  action="index.php">
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
	</form>-->


<?php
include("inc/bottom.php");
?>
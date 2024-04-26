<?php include("../inc/top.php"); ?>

<div class="container">
    <h2>Thêm Học Viên</h2>
    <form action="index.php?action=xulythem" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="txthoten">Họ và Tên:</label>
            <input type="text" class="form-control" id="txthoten" name="txthoten" placeholder="Nhập họ và tên">
        </div>
        <div class="form-group">
            <label for="txtnamsinh">Năm Sinh:</label>
            <input type="text" class="form-control" id="txtnamsinh" name="txtnamsinh" placeholder="Nhập năm sinh">
        </div>
        <div class="form-group">
            <label for="txtgioitinh">Giới Tính:</label>
            <select class="form-control" id="txtgioitinh" name="txtgioitinh">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label for="txtemail">Email:</label>
            <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Nhập email">
        </div>
        <div class="form-group">
            <label for="txtsdt">Số Điện Thoại:</label>
            <input type="text" class="form-control" id="txtsdt" name="txtsdt" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="txtdiachi">Địa Chỉ:</label>
            <input type="text" class="form-control" id="txtdiachi" name="txtdiachi" placeholder="Nhập địa chỉ">
        </div>
        <div class="form-group">
            <label for="filehinhanh">Hình Ảnh:</label>
            <input type="file" class="form-control-file" id="filehinhanh" name="filehinhanh">
        </div> <br>
        <button type="submit" class="btn btn-primary">Thêm Học Viên</button>
    </form>
</div>

<?php include("../inc/bottom.php"); ?>
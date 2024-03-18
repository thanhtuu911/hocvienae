<?php include("../inc/top.php"); ?>

<div class="container">
        <h2>Sửa Học Viên</h2>
        <form action="index.php?action=xulysua" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="txtid" value="<?php echo $hocvien['id']; ?>">
            <div class="form-group">
                <label for="txthoten">Họ và Tên:</label>
                <input type="text" class="form-control" id="txthoten" name="txthoten" value="<?php echo $hocvien['hoten']; ?>">
            </div>
            <div class="form-group">
                <label for="txtnamsinh">Năm Sinh:</label>
                <input type="text" class="form-control" id="txtnamsinh" name="txtnamsinh" value="<?php echo $hocvien['namsinh']; ?>">
            </div>
            <div class="form-group">
                <label for="txtgioitinh">Giới Tính:</label>
                <input type="text" class="form-control" id="txtgioitinh" name="txtgioitinh" value="<?php echo $hocvien['gioitinh']; ?>">
            </div>
            <div class="form-group">
                <label for="txtemail">Email:</label>
                <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?php echo $hocvien['email']; ?>">
            </div>
            <div class="form-group">
                <label for="txtsdt">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="txtsdt" name="txtsdt" value="<?php echo $hocvien['sodienthoai']; ?>">
            </div>
            <div class="form-group">
                <label for="txtdiachi">Địa Chỉ:</label>
                <input type="text" class="form-control" id="txtdiachi" name="txtdiachi" value="<?php echo $hocvien['diachi']; ?>">
            </div>
            <div class="form-group">
                <label for="filehinhanh">Hình Ảnh:</label>
                <input type="file" class="form-control-file" id="filehinhanh" name="filehinhanh">
            </div>
            <input type="hidden" name="txthinhcu" value="<?php echo $hocvien['hinhanh']; ?>">
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
        </form>
    </div>

    <!-- Bootstrap JS và jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php include("../inc/bottom.php"); ?>
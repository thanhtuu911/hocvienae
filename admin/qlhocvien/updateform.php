<?php include("../inc/top.php"); ?>

<div class="container mt-5">
  <h2 class="mb-4">Sửa thông tin học viên</h2>
  <form action="index.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="xulysua">
    <input type="hidden" name="id" value="<?php echo $h["id"]; ?>">
    <div class="mb-3">
      <label for="txtHoten" class="form-label">Họ và tên:</label>
      <input type="text" class="form-control" id="txtHoten" name="hoten" required value="<?php echo $h["hoten"]; ?>">
    </div>
    <div class="mb-3">
      <label for="txtNamsinh" class="form-label">Năm sinh:</label>
      <input type="text" class="form-control" id="txtNamsinh" name="namsinh" required value="<?php echo $h["namsinh"]; ?>">
    </div>
    <div class="mb-3">
      <label for="txtGioitinh" class="form-label">Giới tính:</label>
      <select class="form-select" id="txtGioitinh" name="gioitinh" required>
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
        <option value="Khác">Khác</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="txtEmail" class="form-label">Email:</label>
      <input type="email" class="form-control" id="txtEmail" name="email" required value="<?php echo $h["email"]; ?>">
    </div>
    <div class="mb-3">
      <label for="txtSodienthoai" class="form-label">Số điện thoại:</label>
      <input type="tel" class="form-control" id="txtSodienthoai" name="sodienthoai" required value="<?php echo $h["sodienthoai"]; ?>">
    </div>
    <div class="mb-3">
      <label for="txtDiachi" class="form-label">Địa chỉ:</label>
      <input type="text" class="form-control" id="txtDiachi" name="diachi" required value="<?php echo $h["diachi"]; ?>">
    </div>
    <div class="mb-3">
      <label>Hình ảnh</label><br>
      <input type="hidden" name="txthinhcu" value="<?php echo $h["hinhanh"]; ?>">
      <img src="../../<?php echo $h["hinhanh"]; ?>" width="100" class="img-thumbnail">
      <a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
      <div id="demo" class="collapse m-3">
        <input type="file" class="form-control" name="filehinhanh">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
  </form>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-Lp7nqTi1Sqz9v4IovBfswM01R00DJqgG12NCgiiB11btq48Hp6KTlgLF0bPSWIqY" crossorigin="anonymous"></script>
<!-- Ảnh GIF thông báo -->
<div id="successMessage" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
  <img src="../../image/check2.gif" alt="Loading...">
</div>
<script>
  function handleSubmit() {
    // Hiển thị ảnh GIF thông báo khi dữ liệu được xử lý
    document.getElementById('successMessage').style.display = 'block';

    // Chờ 1 giây trước khi chuyển hướng người dùng trở lại trang main
    setTimeout(function() {
      window.location.href = "main.php";
    }, 1000);

    // Trả về false để ngăn chặn gửi form một cách thông thường
    return false;
  }
</script>
<?php include("../inc/bottom.php"); ?>
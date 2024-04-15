<?php
include("inc/top.php");
?>
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
    input[type="date"],
    select {
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
    /* .error-message {
        display: none;
        color: red;
    } */
</style>
<div class="container text-md-center mt-2 p-5">
    <div class="row justify-content-center">
        <h3 class='mt-5' style='color: #225673'>Vui lòng nhập đầy đủ thông tin</h3>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header text-danger">
                    <h4>Đăng ký tài khoản</h4>
                </div>
                <div class='card-body'>
                    <form action="index.php" method="post" enctype="multipart/form-data" submit="return validateForm()">
                        <input type="hidden" name="action" value="themdangky">
                        <label for="hoten">Họ và tên:</label>
                        <input type="text" id="hoten" name="txthoten" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="txtemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        <label for="txtpass">Mật khẩu:</label><br>
                        <input type="password" id="txtpass" name="txtpass" required>
                        <br>
                        <label for="sodienthoai">Số điện thoại:</label> <br>
                        <input type="tel" id="sodienthoai" name="txtsodienthoai" pattern="[0-9]{10}" required> <br>
                        <label for="namsinh">Ngày sinh:</label>
                        <input type="date" id="namsinh" name="txtnamsinh" required>
                        <label for="gioitinh">Giới tính:</label>
                        <select id="gioitinh" name="txtgioitinh" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                        <br>
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" id="diachi" name="txtdiachi" required>
                        <label for="hinhanh">Chọn ảnh đại diện của bạn:</label>
                        <input type="file" id="hinhanh" name="txthinhanh">
                        <br>
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function validateForm() {
        var hoten = document.getElementById("hoten").value;
        if (!hoten.trim()) {
            alert("Vui lòng nhập Họ và tên!");
            return false;
        }

        var sodienthoai = document.getElementById("sodienthoai").value;
        if (sodienthoai.length !== 10 || isNaN(sodienthoai)) {
            alert("Số điện thoại phải chứa đúng 10 chữ số và không chứa kí tự đặc biệt!");
            return false;
        }

        var email = document.getElementById("email").value;
        if (!email.match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/)) {
            alert("Email không hợp lệ!");
            return false;
        }

        return true;
    }
</script>

<?php
include("inc/bottom.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/jpg" href="../image/logo/LogoAE2.jpg" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Đăng nhập</h4>
                </div>
                <div class="card-body">
                    <!-- Ảnh trong form -->
                    <div class="text-center mb-3">
                        <img src="../image/logo/LogoAE1.jpg" alt="Logo" class="img-fluid" style="max-height: 100px;">
                    </div>
                    <!-- Form đăng nhập -->
                    <form action="index.php?action=xldangnhap" method="POST">
                        <div class="form-group">
                            <label for="txtemail">Email:</label>
                            <input type="email" class="form-control" id="txtemail" name="txtemail" required>
                        </div>
                        <div class="form-group">
                            <label for="txtmatkhau">Mật khẩu:</label>
                            <input type="password" class="form-control" id="txtmatkhau" name="txtmatkhau" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="chknhomatkhau">
                            <label class="form-check-label" for="chknhomatkhau">Nhớ mật khẩu</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    </form>
                </div>
                <div class="card-footer bg-white">
                    <p class="text-center">Hoặc đăng nhập bằng:</p>
                    <!-- Đăng nhập bằng Facebook và Google -->
                    <div class="text-center">
                        <a href="#" class="btn btn-primary mx-2"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="#" class="btn btn-danger mx-2"><i class="fab fa-google"></i> Google</a>
                    </div>
                    <!-- Link đến trang đăng ký -->
                    <p class="text-center mt-3">Chưa có tài khoản? <a href="index.php?action=dangky">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - AE</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
			background-color:#fce4ec;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2.5rem;
        }
		.text-center img {
            border-radius: 50%;
            overflow: hidden;
            width: 100px; /* Kích thước của ảnh */
            height: 100px; /* Kích thước của ảnh */
            margin-right: 20px; /* Khoảng cách giữa ảnh và các ô input */
            /* display: flex; */
            justify-content: center;
            align-items: center;
        }

        
    </style>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center mt-2">
                        <img src="../../image/logo/LogoAE1.jpg" alt="Logo" class="img-fluid" style="width: 150px; height:150px;" >
                        <!-- <h1 class="h2">Xin chào!</h1> -->
                        <p class="lead">Vui lòng đăng nhập để tiếp tục</p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="index.php" method="post">
                                <div class="form-group">
                                    <label for="txtemail">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="txtemail" name="txtemail" placeholder="Nhập email">
                                </div>
                                <div class="form-group">
                                    <label for="txtmatkhau">Mật khẩu</label>
                                    <input type="password" class="form-control form-control-lg" id="txtmatkhau" name="txtmatkhau" placeholder="Nhập mật khẩu">
                                </div>
                                
                                <input type="hidden" name="action" value="xldangnhap">
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="text-center mt-3">
                        Chưa có tài khoản? <a href="#">Đăng ký</a>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
</body>

</html>

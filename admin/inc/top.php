<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/search.css" />
	<link rel="stylesheet" type="text/css" href="css/search.js" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- AweSome -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Trang quản trị - AE</title>
	<link rel="shortcut icon" type="image/jpg" href="../../image/logo/LogoAE2.jpg" />
	<link href="../inc/css/app.css" rel="stylesheet">
	<script src="../inc/js/app.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar  ">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle"> American English</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-info">
						HỆ THỐNG
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"ktnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../../ktnguoidung/index.php">
						<!-- <i class="fa-solid fa-chart-simple fa-fade fa-xl"style="color: #c51b2c;"></i> -->
						<i class="fa-solid fa-chart-pie fa-fade fa-xl"style="color: #c51b2c;"></i> <span class="align-middle">Bảng điều khiển</span>
						</a>
					</li>

				<?php if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==1){ ?>
					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlnguoidung/index.php">
						<i class="fa-solid fa-users fa-fade fa-xl"style="color: #c51b2c;"></i><span class="align-middle">Quản lý tài khoản</span>
						</a>
					</li>
				<?php } ?>

					<li class="sidebar-header text-info">
						DANH MỤC
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldanhmuc") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldanhmuc/index.php">
						<i class="fa-solid fa-layer-group fa-xl fa-fade"style="color: #c51b2c;"></i> <span class="align-middle">Quản Lý Danh Mục</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlhocvien") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlhocvien/index.php">
						<i class="fa-solid fa-user-graduate fa-fade fa-xl"style="color: #c51b2c;"></i>
						<span class="align-middle">Quản Lý Học Viên</span>
						</a>
					</li>
					
					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlkhoahoc") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlkhoahoc/index.php">
						<i class="fa-solid fa-book-open fa-fade fa-xl"style="color: #c51b2c;"></i> <span class="align-middle">Quản Lý Khóa Học</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qllop") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qllop/index.php">
						<i class="fa-solid fa-house fa-fade fa-xl"style="color: #c51b2c;"></i>
						 <span class="align-middle">Quản Lý Lớp</span>
						</a>
					</li>

					<li class="sidebar-header text-info">
						KINH DOANH
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="../qlkhachhang/index.php">
						<i class="align-middle" data-feather="users"></i> <span class="align-middle">Quản lý khách hàng</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../qldonhang/index.php">
						<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Quản lý đơn hàng</span>
						</a>
					</li>

					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Quản lý doanh thu</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Chương trình khuyến mãi</span>
						</a>
					</li> -->

					
					
					<!-- <li class="sidebar-header text-info">
						CẤU HÌNH WEBSITE
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="book"></i> <span class="align-middle">Thông tin</span>
						</a>
					</li> -->

					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="image"></i> <span class="align-middle">Hình ảnh</span>
						</a>
					</li> -->
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									1 thông báo mới
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Đơn hàng mới</div>
												<div class="text-muted small mt-1">Xem danh sách đơn hàng chờ xác nhận.</div>
												<div class="text-muted small mt-1">5 phút trước</div>
											</div>
										</div>
									</a>
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Tất cả thông báo</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										1 tin nhắn mới
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../../images/users/doraemon.jpg" class="avatar img-fluid rounded-circle" alt="Mèo máy Đô rê mon">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Doraemon</div>
												<div class="text-muted small mt-1">Mail của mèo máy đến từ tương lai nè ^.^</div>
												<div class="text-muted small mt-1">15 phút trước</div>
											</div>
										</div>
									</a>
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Tất cả tin nhắn</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="<?php if ($_SESSION["nguoidung"]["hinhanh"]==NULL) echo "../../image/account/2.jpg"; else echo "../../image/account/". $_SESSION["nguoidung"]["hinhanh"]; ?>" class="avatar img-fluid rounded me-1" /> 
								<span class="text-dark">Chào <?php if(isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["hoten"]; else echo "bạn"; ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
							
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=hoso">
									<i class="align-middle me-1" data-feather="user"></i> Hồ sơ cá nhân
								</a>								
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=matkhau">
									<i class="align-middle me-1" data-feather="key"></i> Đổi mật khẩu
								</a>
								
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=dangxuat"><i class="align-middle me-1" data-feather="log-out"></i> Đăng xuất</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
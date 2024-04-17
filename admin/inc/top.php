<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- bieudo -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<!-- <script src="js/search.js" defer></script> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/search.css" /> -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- AweSome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

	<title>Trang quản trị - AE</title>
	<link rel="shortcut icon" type="image/jpg" href="../../image/logo/LogoAE2.jpg" />
	<link href="../inc/css/app.css" rel="stylesheet">
	<script src="../inc/js/app.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
</head>

<style>
	.sidebar-brand {
		display: inline-block;
		margin-left: 25px;
		/* margin-bottom: 1px;  */
		text-decoration: none;
	}

	.logo-img {
		width: 150px;
		/* Chiều rộng của logo */
		height: auto;
		/* Chiều cao tự động điều chỉnh để giữ tỷ lệ */
		display: block;
		transition: transform 0.3s ease;
		/* Hiệu ứng chuyển động */
		border-radius: 40px;
	}

	/* Hiệu ứng khi di chuột qua */
	.logo-img:hover {
		transform: scale(1.2);
		/* Phóng to 1.05 lần kích thước ban đầu */

	}
	
    
/* Border mặc định cho mỗi mục */


    /* Border khi di chuột vào */
	.sidebar-nav .sidebar-item {
    border-bottom: 1px solid #ccc; /* Màu border mặc định */
    padding-bottom: 3px; /* Độ dài của border-bottom */
    transition: padding-bottom 0.3s; /* Hiệu ứng chuyển đổi khi hover */
	padding: 8px 0;
	color: white;
}

.sidebar-nav .sidebar-item:hover {
    padding-bottom: 0px; /* Đặt padding-bottom về 0 khi hover */
    border-bottom: 4px solid #c51b2c; /* Màu border khi hover */
}

</style>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar  ">
			<div class="sidebar-content js-simplebar" >
				<a class="sidebar-brand" href="#">
					<img src="../../image/logo/LogoAE2.jpg" alt="American English" class="logo-img">
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-info">
						HỆ THỐNG
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "ktnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../ktnguoidung/index.php">
							<i class="fa-solid fa-chart-bar  fa-xl" style="color: #c51b2c;"></i><span class="align-middle">Bảng Thống Kê</span>

						</a>
					</li>

					<?php if (isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"] == 1) { ?>
						<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "qltaikhoan") != false) echo "active"; ?>">
							<a class="sidebar-link" href="../qltaikhoan/index.php">
								<i class="fa-solid fa-users  fa-xl" style="color: #c51b2c;"></i><span class="align-middle">Quản Lý Tài Khoản</span>
							</a>
						</li>
					<?php } ?>

					<li class="sidebar-header text-info">
						DANH MỤC
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "qldanhmuc") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldanhmuc/index.php">
							<i class="fa-solid fa-layer-group fa-xl " style="color: #c51b2c;"></i> <span class="align-middle">Quản Lý Danh Mục</span>
						</a>
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "qlhocvien") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlhocvien/index.php">
							<i class="fa-solid fa-user-graduate  fa-xl" style="color: #c51b2c;"></i>
							<span class="align-middle">Quản Lý Học Viên</span>
						</a>
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "qlkhoahoc") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlkhoahoc/index.php">
							<i class="fa-solid fa-book-open  fa-xl" style="color: #c51b2c;"></i> <span class="align-middle">Quản Lý Khóa Học</span>
						</a>
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "qllop") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qllop/index.php">
							<i class="fa-solid fa-house  fa-xl" style="color: #c51b2c;"></i>
							<span class="align-middle">Quản Lý Lớp</span>
						</a>
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "qlgiaovien") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlgiaovien/index.php">
						<i class="fa-solid fa-chalkboard-user fa-xl"style="color: #c51b2c;"></i>
							<span class="align-middle">Quản Lý Giáo Viên</span>
						</a>
					</li>

					<li class="sidebar-item <?php if (strpos($_SERVER['REQUEST_URI'], "qldangkyhoc") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldangkyhoc/index.php">
						<i class="fa-solid fa-note-sticky fa-xl"style="color: #c51b2c;"></i>
							<span class="align-middle">Quản Lý Đăng Ký Học</span>
						</a>
					</li>

					<li class="sidebar-header text-info">
						KINH DOANH
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../qlkhachhang/index.php">
							<i class="fa-solid fa-user-group fa-xl" style="color: #c51b2c;"></i> <span class="align-middle">Quản Lý Khách Hàng</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../qlhoadon/index.php">
						<i class="fa-solid fa-credit-card fa-xl" style="color: #c51b2c;"></i>
							Quản Lý Hóa Đơn
						</a>
					</li>

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
						<h3 class="align-middle" style="font-weight:bold"> American English</h3>
					</ul>

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
									<a href="../qllienhe/index.php" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../../image/account/0.jpg" class="avatar img-fluid rounded-circle" alt="Mèo máy Đô rê mon">
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
								<img src="<?php if ($_SESSION["nguoidung"]["hinhanh"] == NULL) echo "../../image/account/2.jpg";
											else echo "../../image/account/" . $_SESSION["nguoidung"]["hinhanh"]; ?>" class="avatar img-fluid rounded me-1" />
								<span class="text-dark">Chào <?php if (isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["hoten"];
																else echo "bạn"; ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">

								<a class="dropdown-item" href="../ktnguoidung/index.php?action=hoso">
									<i class="align-middle me-1" data-feather="user"></i> Hồ sơ cá nhân
								</a>
								<a class="dropdown-item" href="../ktnguoidung/index.php?action=matkhau">
									<i class="align-middle me-1" data-feather="key"></i> Đổi mật khẩu
								</a>


								<div class="dropdown-divider"></div>
								<!-- HTML code -->
								<a class="dropdown-item" href="#" onclick="confirmLogout()"><i class="align-middle me-1" data-feather="log-out"></i> Đăng xuất</a>

								<!-- JavaScript code -->
								<script>
									function confirmLogout() {
										if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
											// Nếu người dùng chọn "OK", chuyển hướng đến trang đăng xuất
											window.location.href = '../ktnguoidung/index.php?action=dangxuat';
										} else {
											// Nếu người dùng chọn "Cancel", không làm gì cả
											return false;
										}
									}
								</script>
								
							</div>
						</li>
					</ul>
				</div>
			</nav>

			
			<main class="content">
				<div class="container-fluid p-0">
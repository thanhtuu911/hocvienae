<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="../image/logo/LogoAE2.jpg" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AweSome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!--owl  -->
    <!-- <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- theme -->
    <link rel="stylesheet" type="text/css" href="css/adminlte.min.css">
    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style.css">
    <title>American English</title>
</head>

<body id="top">


    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark  pl-5 fixed-top " style="background-color: #2C3D57 ; ">
        <div class="container px-2 px-lg-3 pl-5">
            <div>
                <a class="navbar-brand" href="index.php"><img src="../image/logo/LogoAE2.jpg" alt="logo" width="160" height="80"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav  custom-nav me-auto mb-2 mb-lg-0 ms-lg-4 ">


                    <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Trang Chủ</a></li>

                    <li class="nav-item custom-nav-item"><a href="index.php?action=batdau" class="nav-link">Khóa Học</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Giới Thiệu</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" class="nav-link" href="index.php?action=lanhdao">Ban Lãnh Đạo
                                    AE </a></li>
                            <li><a class="dropdown-item" class="nav-link" href="index.php?action=hoatdong"> Du Học Sinh
                                </a></li>
                            <li><a class="dropdown-item" class="nav-link" href="index.php?action=intro"> Chương trình
                                    Ngoại Ngữ AE </a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Du Học</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" class="nav-link" href="index.php?action=my">Du Học Mỹ </a></li>
                            <li><a class="dropdown-item" class="nav-link" href="index.php?action=duc">Du Học CHLB Đức
                                </a></li>
                            <li><a class="dropdown-item" class="nav-link" href="index.php?action=uc">Du Học Úc </a></li>
                            <li><a class="dropdown-item" class="nav-link" href="index.php?action=canada">Du Học Canada </a>
                            </li>
                        </ul>
                    </li>

                    <!-- <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Thanh Toán</a></li> -->
                    <li class="nav-item custom-nav-item"><a href="index.php?action=lienhe" class="nav-link">Liên Hệ</a></li>

                    <!-- <li class="nav-item custom-nav-item"><a href="index.php?action=tailieu" class="nav-link">Tài Liệu</a></li> -->
                    <!-- <li class="nav-item custom-nav-item"><a href="index.php?action=dangnhap" class="nav-link">Login</a></li> -->
                    <!-- <li class="nav-item custom-nav-item"><a href="index.php?action=dangky" class="nav-link">Đăng Ký</a></li> -->



                    <?php if (isset($_SESSION["khachhang"])) { ?>
                        <div class="nav_item dropdown">
                            <a class="nav-link active  dropdown-toggle " style="color:wheat; " role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION["khachhang"]["hoten"]; ?>
                            </a>
                            <!-- <img src="" alt="" > -->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="index.php?action=thongtin"><i class="fa-solid fa-circle-info fa-bounce fa-xl" style="color: #ea1a25;"></i> Thông Tin</a></li>
                                <li><a class="dropdown-item" href="index.php?action=giohang"><i class="fa-brands fa-cc-amazon-pay fa-fade fa-xl"style="color: #ea1a25;"></i> Thanh Toán</a></li>
                                <li><a class="dropdown-item" href="index.php?action=tailieu"><i class="fa-solid fa-book fa-fade fa-xl"style="color: #ea1a25;"></i>Tài Liệu</a></li>
                                <li><a class="dropdown-item" href="index.php?action=dangxuat"><i class="fa-solid fa-right-from-bracket fa-flip fa-xl"style="color: #ea1a25;"></i> Đăng Xuất</a></li>
                            </ul>

                        

                    <?php } else { ?>
                        <ul>
                            <a href="index.php?action=dangnhap" class="btn btn-outline-light">
                            <i class="fa-solid fa-right-to-bracket"></i> Đăng nhập
                            </a>
                             </ul>
                             <ul>
                             <a href="index.php?action=dangky" class="btn btn-outline-light"><i class="fa-solid fa-user-plus"></i> Đăng Ký</a>
                             </ul>
                    <?php } ?>

                    


                </ul> <!-- end các thành phần trong container -->
            </div>


        </div>
    </nav>

    <!-- End -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AweSome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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
    <title>AE</title>
</head>
<body id="top">

   
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark  pl-5 fixed-top" style="background-color: #2C3D57;">
   
        <div class="container-fluid  pl-5">
            <div>
                <a class="navbar-brand" href="index.php"><img  src="../image/logo/LogoAE2.jpg" alt="logo" width="160" height="80"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
             aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav  custom-nav pl-5">
                    <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Trang Chủ</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button"
                         data-bs-toggle="dropdown" aria-expanded="false">Trung Tâm AE</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" class="nav-link" href="index.php?action=lanhdao">Ban Lãnh Đạo AE </a></li>
                                <li><a class="dropdown-item"  class="nav-link" href="index.php?action=hoatdong"> Du Học Sinh </a></li>
                                <li><a class="dropdown-item" class="nav-link" href="index.php?action=intro"> Chương trình Ngoại Ngữ AE </a></li>       
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Du Học</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" class="nav-link" href="index.php?action=my">Du Học Mỹ </a></li>
                                    <li><a class="dropdown-item"  class="nav-link" href="index.php?action=duc">Du Học CHLB Đức </a></li>
                                    <li><a class="dropdown-item" class="nav-link" href="index.php?action=uc">Du Học Úc </a></li>       
                            </ul>
                    </li>

                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Thanh Toán</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Liên Hệ</a></li>      
                    <!-- <li class="nav-item custom-nav-item"><a href="index.php?action=hoatdong" class="nav-link">Hoạt Động</a></li> -->
                    
                    <!-- <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Logout</a></li> -->
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">My Profile</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuLoginModalCenter">Login</a></li>
                    <li class="nav-item custom-nav-item"><a href="index.php?action=dangky" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuRegterModalCenter">Singup</a></li>
                </ul>
             
            </div>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </nav>

<!-- End -->


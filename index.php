<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- AweSome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style.css">
    <title>AE</title>
</head>
<body>

    <h1>Home page</h1>
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark  pl-5 fixed-top" style="background-color: #2C3D57;">
        
        <div class="container-fluid  pl-5">
            
            <a class="navbar-brand" href="index.php"><img src="image/logo/LogoAE1.jpg" alt="" width="120" height="62" ></a>
           
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav  custom-nav pl-5">
                    <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Introduct</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Courses</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Payment</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">My Profile</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Logout</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Login</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Sigup</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
                </ul>
                
            </div>
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </nav>

<!-- End -->

<!-- Video -->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <!-- <source src="video/ae.mp4"> -->
            <source src="video/ae2.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">Welcome to America English</h1>
        <small class="my-content"> Lear and Implement</small> <br>
        <a href="#" class="btn btn-danger">Get Started</a>
    </div>
</div>

<!-- end video -->

<!-- start text baner -->
<div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i>Courses</h5>
        </div>

        <div class="col-sm">
            <h5><i class="fa-sharp fa-solid fa-person-chalkboard"></i></i>Expert Instructors</h5>
        </div>

        <div class="col-sm">
            <h5><i class="fa fa-keyboard mr-3"></i>Lifetime Access</h5>
        </div>

        <div class="col-sm">
            <h5><i class="fa-light fa-indian-rupee-sign"></i> Money Back Guarantee</h5>
        </div>
    </div>
</div>
<!-- end text baner -->

<!-- Start Sourses  -->
<div class="card-deck mt-4">
    <a href="#" class="btn" style="text-align: left; padding:0px;">
        <div class="card">
            <img src="image/coursese/B1.jpg" class="card-img-top" alt="B1"/>
            <div class="card-body">
                <h5 class="card-title"> Learn B1</h5>
                <p class="card-text">
                "Khóa học B1 là một chương trình học tiếng ngoại ngữ cấp độ trung cấp, 
                dành cho những người học đã có kiến thức cơ bản và muốn nâng cao khả năng giao tiếp của mình. 
                Trong khóa học này, học viên sẽ được hướng dẫn về ngữ pháp, từ vựng và kỹ năng nghe, nói, đọc, viết, nhằm đạt được trình độ B1 theo khung tham chiếu Châu Âu. 
                Chương trình giúp học viên tự tin giao tiếp trong nhiều tình huống thực tế và mở cánh cửa cho việc tiếp cận nhiều cơ hội học tập và nghề nghiệp mới."
                </p>
            </div>
        </div>
    </a>

</div>



    <script src="js/bootstrap.min.js"> </script>
    <script src="js/jquery.min.cs"> </script>
    <script src="js/popper.min.js"> </script>

    

    </body>
</html>
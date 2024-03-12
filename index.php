<<<<<<< HEAD
<?php
header("Location:Public");
?>
=======
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
<div class="container-fluid bg-danger txt-banner mt-4">
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

<!-- end courses -->
<div class="container mt-2">
    <div class="row">\
        <!-- b1 -->
        <div class="col ">
        <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
            <img src="image/courses/B1.png" class="card-img-top" alt="B1"/>
            
            <div class="card-body">
                <h5 class="card-title"> Learn B1</h5>
                <p class="card-text">
                "Khóa học B1 là một chương trình học tiếng ngoại ngữ cấp độ trung cấp, 
                dành cho những người học đã có kiến thức cơ bản và muốn nâng cao khả năng giao tiếp của mình. 
                Trong khóa học này, học viên sẽ được hướng dẫn về ngữ pháp, từ vựng và kỹ năng nghe, nói, đọc, viết, nhằm đạt được trình độ B1 theo khung tham chiếu Châu Âu. 
                Chương trình giúp học viên tự tin giao tiếp trong nhiều tình huống thực tế và mở cánh cửa cho việc tiếp cận nhiều cơ hội học tập và nghề nghiệp mới."
                </p>
            </div>

            <div class="card-footer">
                <p class="card-text d-inline">
                    Price: 
                    <small>
                        <del>&#8377 3000</del>
                    </small>
                    <span class="font-weight-bolder">&#8377 300 <span>
                    </p>
                    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Tham Gia</a>
            </div>
        </div>
        </a>
        </div>
        <!-- b2 -->
        <div class="col ">
        <a href="#" class="btn" style="text-align: left; padding:0px;">
        <div class="card">
            <img src="image/courses/B2.png" class="card-img-top" alt="B2"/>
            
            <div class="card-body">
                <h5 class="card-title"> Learn B2</h5>
                <p class="card-text">
                "Khóa học B2 là chương trình học tiếng ngoại ngữ cấp độ trung cao, dành cho những học viên muốn phát triển kỹ năng ngôn ngữ của mình đến mức độ trung cao. 
                Trong khóa học này, chú trọng vào việc mở rộng từ vựng, nâng cao kỹ năng nghe và nói, cũng như phát triển khả năng đọc và viết. 
                Học viên sẽ đạt được khả năng sử dụng ngôn ngữ linh hoạt và hiểu rõ hơn về văn hóa ngôn ngữ. 
                Khóa học B2 giúp họ tự tin giao tiếp trong nhiều bối cảnh, từ công việc đến giao tiếp xã hội và du lịch."
                </p>
            </div>

            <div class="card-footer">
                <p class="card-text d-inline">
                    Price: 
                    <small>
                        <del>&#8377 4000</del>
                    </small>
                    <span class="font-weight-bolder">&#8377 400 <span>
                    </p>
                    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Tham Gia</a>
            </div>
        </div>
    </a>
        </div>
        <div class="col ">
        <a href="#" class="btn" style="text-align: left; padding:0px;">
        <div class="card">
            <img src="image/courses/B2.png" class="card-img-top" alt="B2"/>
            
            <div class="card-body">
                <h5 class="card-title"> Learn C1</h5>
                <p class="card-text">
                "Khóa học B2 là chương trình học tiếng ngoại ngữ cấp độ trung cao, dành cho những học viên muốn phát triển kỹ năng ngôn ngữ của mình đến mức độ trung cao. 
                Trong khóa học này, chú trọng vào việc mở rộng từ vựng, nâng cao kỹ năng nghe và nói, cũng như phát triển khả năng đọc và viết. 
                Học viên sẽ đạt được khả năng sử dụng ngôn ngữ linh hoạt và hiểu rõ hơn về văn hóa ngôn ngữ. 
                Khóa học B2 giúp họ tự tin giao tiếp trong nhiều bối cảnh, từ công việc đến giao tiếp xã hội và du lịch."
                </p>
            </div>

            <div class="card-footer ">
                <p class="card-text d-inline">
                    Price: 
                    <small>
                        <del>&#8377 4000</del>
                    </small>
                    <span class="font-weight-bolder">&#8377 400 <span>
                    </p>
                    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Tham Gia</a>
            </div>
        </div>
    </a>
        
    </div>
</div>


    <script src="js/bootstrap.min.js"> </script>
    <script src="js/jquery.min.cs"> </script>
    <script src="js/popper.min.js"> </script>

    

    </body>
</html>
>>>>>>> 8c6622347d4005b8539768e9f3b6171c6ec45f2e

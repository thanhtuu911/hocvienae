<?php
include("inc/top.php");
?>

<div class="container align-items-center mt-5 p-5 "  >  
  <h1 class="text-md-center bg-success  text-warning mt-3 p-3 ">Ban Lãnh Đạo - Trung Tâm Ngoại Ngữ AE</h1>
</div>

<div class="container align-items-center ">
  <h3 class="text-center p-3 ">Các Du Học Sinh Khu Vực An Giang </h3>
  <div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/NTYN.jpg"  /> 
    </div>
    <div class="swiper-slide ">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/DMP.jpg"  />
    </div>
    <div class="swiper-slide ">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/TTKT.bmp" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/08/Dang-Ha-Khanh-Linh.png" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/Nguyen-Thi-Ngoc-Nhi.png" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/Duong-Nguyen-Quoc-Dat_AG.png" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/IMG_7416.jpg" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/KIEN-GIANG-NGUYEN-LAP-DONG.jpg" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/Vinh-Long-Pham-Nhut-Cuong.jpg" />
    </div>
  </div>
  <div class="swiper-pagination"></div>
  </div>

</div>


<div class="container align-items-center mt-5 p-3 ">
  <h3 class="text-center mt-3 p-3 ">Các Du Học Sinh Khu Vực Vĩnh Long </h3>
  <div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/NTYN.jpg"  />
    </div>
    <div class="swiper-slide ">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/DMP.jpg"  />
    </div>
    <div class="swiper-slide ">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/TTKT.bmp" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/08/Dang-Ha-Khanh-Linh.png" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/Nguyen-Thi-Ngoc-Nhi.png" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/Duong-Nguyen-Quoc-Dat_AG.png" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/IMG_7416.jpg" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/KIEN-GIANG-NGUYEN-LAP-DONG.jpg" />
    </div>
    <div class="swiper-slide">
      <img src="https://dhnnae.americanenglish.edu.vn/wp-content/uploads/2023/07/Vinh-Long-Pham-Nhut-Cuong.jpg" />
    </div>
  </div>
  <div class="swiper-pagination"></div>
  </div>

</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
  html,
  body {
    position: relative;
    height: 100%;
  }

  body {
    background: #eee;
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
  }

  .swiper {
    width: 100%;
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 200px;
    height: 180px;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
  }
</style>
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>


<?php
include("inc/bottom.php");
?>
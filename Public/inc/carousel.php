<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../image/carousel/a1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/carousel/a2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/carousel/a3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/carousel/a4.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/carousel/a5.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/carousel/a6.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<!-- <head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->

  <!-- Demo styles -->
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
      width: 300px;
      height: 300px;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
    }
  </style>
<!-- </head> -->

<body>
  <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
      </div>
      <div class="swiper-slide">
        <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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


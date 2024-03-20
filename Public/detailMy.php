<?php 
include("inc/top.php");
?>
<style>
    .h1{
        color: #225470;
    }
    .flex-center {
        display: flex;
        justify-content: center;
        /* Căn giữa theo chiều ngang */
        align-items: center;
        /* Căn giữa theo chiều dọc */

        height: 100px;
        /* Chiều cao của div (có thể thay đổi) */
        color: red;
        font-weight: bolder;
        font-family:'Times New Roman', Times, serif, Helvetica, sans-serif;
    }
</style>

<div class=" container align-items-center mt-3 p-5 ">
    <h1 class="text-md-center  mt-5  p-3">Du Học Mỹ </h1>
    <h1 class="text-md-center">-------- <i class="fa-solid fa-map-location-dot"></i></i> -------- </h1></h3>
</div>

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
<center>
  <div class="carousel-inner"  style="width: 1200px; height: 567px">
    <div class="carousel-item active">
      <img src="../image/duhoc/m0.jpg" class="d-block w-100"  alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/duhoc/m1.jpg" class="d-block w-100"  alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/duhoc/m2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/duhoc/m3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/duhoc/m4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/duhoc/m5.png" class="d-block w-100" alt="...">
    </div>
  </div>
</center>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    
<?php
include("inc/bottom.php");
?>
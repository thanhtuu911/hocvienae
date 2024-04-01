<?php
include("inc/top.php");
?>
<!-- <head> -->
    <!-- Các thẻ meta cho Facebook -->
    <!-- <meta property="og:title" content="<?php echo $khct["tenkhoahoc"]; ?>">
    <meta property="og:description" content="Mô tả ngắn về nội dung của bạn">
    <meta property="og:image" content="<?php echo 'http://https://dhnnae.americanenglish.edu.vn/' . $khct["hinhanh"]; ?>">
    Thẻ meta cho Facebook App ID (nếu có) -->
    <!-- <meta property="fb:app_id" content="Your-Facebook-App-ID"> -->
<!-- </head> -->

<div class="container mt-2 m-5 p-5">
  <div class="col-sm-9">

    <h3 class="text-info mt-5"><?php echo $khct["tenkhoahoc"]; ?></h3>

    <div><img width="500px" src="../<?php echo $khct["hinhanh"]; ?>"></div>


    <div>
      <h4 class="text-primary">Phí học:
        <span class="text-danger"><?php echo number_format($khct["phi"]); ?> đ</span>
      </h4>
      <form method="post" class="form-inline">
        <input type="hidden" name="action" value="chovaogio">
        <input type="hidden" name="id" value="<?php echo $khct["id"]; ?>">
        <div class="row">
          <div class="col">
            <!-- <input type="number" class="form-control" name="soluong" value="1"> -->
          </div>
          <div class="col">
            <input type="submit" class="btn btn-primary" value="Đăng Ký Ngay">
          </div>
          <!-- <div class="col">
            <div class="fb-share-button" data-href="<?php echo 'https://dhnnae.americanenglish.edu.vn/?id=' . $khct["id"]; ?>" data-layout="button_count">
            </div>
          </div> -->
        </div>
      </form>
    </div>
  </div>
</div>
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="tRpxvT4d"></script> -->

<?php
include("inc/bottom.php");
?>
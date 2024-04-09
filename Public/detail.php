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
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-9">
            <div class="card">
                <img class="card-img-top" width="auto" height="400px" style="margin-top: 50px;" src="../<?php echo $khct["hinhanh"]; ?>" alt="<?php echo $khct["tenkhoahoc"]; ?>">
                <div class="card-body">
                    <h3 class="card-title text-info"><?php echo $khct["tenkhoahoc"]; ?></h3>
                    <p class="card-text"><?php echo $khct['chitiet']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-primary">Phí học: <span class="text-danger"><?php echo number_format($khct["phi"]); ?> VNĐ</span></h4>
                        <form method="post" class="form-inline">
                            <input type="hidden" name="action" value="chovaogio">
                            <input type="hidden" name="id" value="<?php echo $khct["id"]; ?>">
                            <button type="submit" class="btn btn-primary">Đăng Ký Ngay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
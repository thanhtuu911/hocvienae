<?php
include("inc/top.php");
?>
<div class="container mt-5 p-3">
    <h1 class="text-md-center mt-5 mb-4">Tài Liệu Học</h1>
</div>

<center>
<?php
        if (count($tailieu) > 0) {
        ?>
<?php foreach($tailieu as $tl): ?>
<tr>
    <!-- <div class=''>
        <div class="card mt-3 text-md-center" style="width: 30rem;">
            <div class="card-header text-md-center">
               <h5> Tài liệu <?php echo $tl["tenkhoahoc"]; ?></h5>
            </div>
            <div class="card-body text-md-center">
                <h3 class="card-title">
                    <?php echo $tl["tenkhoahoc"]; ?>
                </h3>
                <p class="card-text">Chào mừng bạn đến với  <?php echo $tl["tenkhoahoc"]; ?> , nơi bạn sẽ khám phá những kỹ năng mới,
                     mở rộng kiến thức và nâng cao khả năng của chính mình. Với sự hỗ trợ từ đội ngũ giảng viên tận tâm và tài liệu học chất lượng,
                      hãy bắt đầu hành trình của bạn ngay hôm nay để đạt được mục tiêu cá nhân và chuyên môn! </p>           
                <a href="<?php echo $tl["duongdan"]; ?>" target="_blank" class="btn btn-primary">Xem tài liệu</a>
            </div>
        </div> -->

        <div class="col-md-4">
            <div class="card mt-3 text-md-center">
                <div class="card-header text-md-center">
                    <h5>Tài liệu <?php echo $tl["tenkhoahoc"]; ?></h5>
                </div>
                <div class="card-body text-md-center">
                    <h3 class="card-title">
                        <?php echo $tl["tenkhoahoc"]; ?>
                    </h3>
                    <p class="card-text">Chào mừng bạn đến với <?php echo $tl["tenkhoahoc"]; ?>, nơi bạn sẽ khám phá những kỹ năng mới, mở rộng
                     kiến thức và nâng cao khả năng của chính mình. Với sự hỗ trợ từ đội ngũ giảng viên tận tâm và tài liệu học chất lượng, hãy
                      bắt đầu hành trình của bạn ngay hôm nay để đạt được mục tiêu cá nhân và chuyên môn!</p>
                    <a href="<?php echo $tl["duongdan"]; ?>" target="_blank" class="btn btn-primary">Xem tài liệu</a>
                </div>
            </div>
        </div>
    <!-- </div> -->
</tr>
<?php endforeach; ?>
<?php
        } else {
            // Hiển thị thông báo nếu không có tài liệu
            echo "<p>Không có tài liệu nào để hiển thị.</p>";
        }
    ?>

</center>

<!-- 
<div class=' text-md-center mt-4'>
    <a href="index.php?action=themtailieu" class="btn btn-info">
        <h3> <i class="bi bi-patch-plus-fill"></i> Thêm Tài Liệu</h3>
    </a>
</div> -->

<style>
.card h5 {
    color: #372742;
}

.container h1 {
    color: #A0522D;
}

.card h3 {
    color: #EE0000;
}
</style>
<?php
include("inc/bottom.php");
?>
<?php
include("inc/top.php");
?>
<?php include("inc/video.php");
?>
<?php
foreach ($danhmuc as $d) {
    $i = 0;
?>
    <div class="row mt-3 ">
        <h3><a class="text-decoration-none text-info " href="index.php?action=group&id=<?php echo $d["id"]; ?>">
                <?php echo $d["tendanhmuc"]; ?></a></h3>
    </div>
<<<<<<< HEAD
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <!-- <h1>Danh sách khóa học</h1> -->
            </div>
        </div>


        <div class="row mt-3">
            <?php foreach ($khoahoc as $mh) {
                if ($mh["danhmuc_id"] == $d["id"] && $i < 4) {
                    $i++;
            ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?php echo $mh['hinhanh']; ?>" class="card-img-top" alt="<?php echo $mh['tenkhoahoc']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $mh['tenkhoahoc']; ?></h5>
                            <p class="card-text"><?php echo $mh['chitiet']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="index.php?action=detail&id=<?php echo $mh['id']; ?>" class="btn btn-sm btn-outline-secondary">Xem chi tiết</a>
                                </div>
                                <small class="text-muted"><?php echo number_format($mh['phi']); ?> VNĐ</small>
                            </div>
                        </div>
                    </div>
=======
</div>
<!-- end text baner -->

<!-- Start Sourses  -->

<!-- end courses -->
<div class="container mt-5">
    <div class="row">
        <!-- b1 -->
        <div class="col ">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img src="../image/courses/B1.png" class="card-img-top" alt="B1" />

                    <div class="card-body">
                        <h5 class="card-title"> Du Học Mỹ</h5>
                        <p class="card-text">
                            "Mỹ có chất lượng giáo dục cao đi kèm với đó là hàng loạt các trường Đại học đứng đầu bảng
                            xếp hạng thế giới như Đại học Harvard, Đại học Stanford,...
                            Ngoài ra, Mỹ còn đào tạo đa dạng các ngành học với hệ thống kiến thức được kiểm duyệt vô
                            cùng nghiêm ngặt.</p>
                        <p> Hơn nữa, Mỹ có nhiều tiểu bang, cùng với vô số chủng tộc như người bản địa, người da màu,
                            người châu Á định cư - tạo nên một nền văn hoá vô cùng đa dạng và phong phú. Khi sinh sống
                            tại đây, bạn sẽ được tiếp xúc với nhiều nền văn hóa khác nhau,
                            do đó, cải thiện được những kinh nghiệm sống, kiến thức thực tiễn và mở rộng vốn hiểu biết
                            của bản thân"
                        </p>
                    </div>

                    <div class="card-footer">
                        <p class="card-text d-inline"> Price:

                            <small>
                                <del> 3000</del>
                            </small>
                            <span class="font-weight-bolder"><i class="fa-solid fa-hand-holding-dollar"></i> 300<span>
                        </p>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#"> Tham Gia</a>
                    </div>
                </div>
            </a>
        </div>
        <!-- b2 -->
        <div class="col ">
            <a href="#" class="btn" style="text-align: left; padding:0px;">
                <div class="card">
                    <img src="../image/courses/B2.png" class="card-img-top" alt="B2" />

                    <div class="card-body">
                        <h5 class="card-title"> Du học Australia</h5>
                        <p class="card-text">
                            "Du học Úc đã khẳng định vị thế của mình nhờ vào chất lượng giảng dạy, nghiên cứu chuyên
                            sâu, và môi trường sinh sống,
                            học tập lý tưởng. Úc đáp ứng nhu cầu của sinh viên quốc tế từ khắp nơi trên thế giới.</p>
                        <p> Sinh viên du học ở Úc cũng được trải nghiệm các nền văn hóa đa dạng và tiếp cận ý tưởng đổi
                            mới. Hệ thống giáo dục Úc cung cấp tất
                            cả các cấp độ, với chính sách và pháp luật nhằm đảm bảo chất lượng giáo dục và bảo vệ
                            quyền lợi của sinh viên quốc tế. Với danh tiếng quốc tế ấn tượng, sinh viên tốt nghiệp từ
                            các trường Úc được săn đón trên toàn
                            thế giới, do hệ thống giáo dục Úc được quản lý cẩn thận để duy trì các tiêu chuẩn cao và
                            hình ảnh đất nước."
                        </p>
                    </div>

                    <div class="card-footer">
                        <p class="card-text d-inline">
                            Price:
                            <small>
                                <del> 4000</del>
                            </small>
                            <span class="font-weight-bolder"><i class="fa-solid fa-hand-holding-dollar"></i> 400 <span>
                        </p>
                        <a class="btn btn-primary text-white font-weight-bolder " href="#">Tham Gia</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col ">
            <a href="#" class="btn" style="text-align: left; padding:0px;">
                <div class="card">
                    <img src="../image/courses/B2.png" class="card-img-top" alt="B2" />

                    <div class="card-body">
                        <h5 class="card-title"> Du Học Đức</h5>
                        <p class="card-text">
                            "Đức là một thiên đường giáo dục đại học. Không giống như ở bất kỳ quốc gia nào khác, du học
                            Đức, bạn sẽ tìm thấy
                            nhiều trường đại học được xếp hạng trên toàn thế giới, vô số khóa học để lựa chọn trong số
                            đó, các bằng cấp có giá
                            trị toàn cầu hứa hẹn khả năng tuyển dụng cao và chi phí sinh hoạt hợp lý.</p>

                        <p> Với hơn 357.000 sinh viên quốc tế mong muốn lấy bằng đại học ở Đức, không có gì ngạc nhiên
                            khi Đức được
                            xếp hạng là một trong những điểm đến hàng đầu cho du học sinh trên thế giới. Mỗi năm, hàng
                            ngàn học giả
                            từ mọi nơi tin tưởng học tập tại các trường đại học ở Đức, và lý do cho sự tin tưởng này rất
                            rõ ràng."
                        </p>
                    </div>

                    <div class="card-footer ">
                        <p class="card-text d-inline">
                            Price:
                            <small>
                                <del> 4000</del>
                            </small>
                            <span class="font-weight-bolder"><i class="fa-solid fa-hand-holding-dollar"></i> 400 <span>
                        </p>
                        <a class="btn btn-primary text-white font-weight-bolder " href="#">Tham Gia</a>
                    </div>
                </div>
            </a>

        </div>
    </div>


    <!-- Student -->
    <!-- <div class="container-fluid mt-5" style="background-color: #487289;" id="Feedback">
<h1 class="text-center testyheading p-4"> Student Feedback</h1>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                <div class="testimonial">
                    <p class="description">
                        abc
                    </p>
>>>>>>> aea4b5595fa21d2c4a557f2d9e4f4995ea61a274
                </div>


            <?php 
                }  
            } ?>
        </div>
    </div>
<<<<<<< HEAD
<?php

}
?>

=======
</div> -->
    <!-- end Student -->
>>>>>>> aea4b5595fa21d2c4a557f2d9e4f4995ea61a274

    <?php
include("inc/bottom.php");
?>
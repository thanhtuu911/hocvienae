<?php include("../inc/top.php"); ?>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Danh sách liên hệ</h1>

        <div class="row">
            <?php
            // Include model LIENHE
            

            // Tạo một đối tượng LIENHE
            $lienhe_model = new LIENHE();

            // Lấy danh sách liên hệ từ model
            $lienhe_list = $lienhe_model->laylienhe();

            // Lặp qua danh sách liên hệ và hiển thị chúng
            foreach ($lienhe_list as $lienhe) {
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body"style="background-color: #e6e6fa; padding: 20px;">
                            <h5 class="card-title"><?php echo $lienhe['hoten']; ?></h5>
                            <h5 class="card-text"><?php echo $lienhe['tuoi']; ?></h5>
                            <h5 class="card-text"><?php echo $lienhe['sdt']; ?></h5>
                            <h5 class="card-text"><?php echo $lienhe['email']; ?></h5>
                            <h5 class="card-text"><?php echo $lienhe['diachi']; ?></h5>
                            <h5 class="card-text"><?php echo $lienhe['tenkhoahoc']; ?></h5>
                            <h5 class="card-text"><?php echo $lienhe['noidung']; ?></h5>
                            <h5 class="card-text">Ngày tạo: <?php echo $lienhe['created_at']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
<?php include("../inc/bottom.php"); ?>

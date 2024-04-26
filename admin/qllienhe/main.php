<?php include("../inc/top.php"); ?>

<body>
    <div class="container">
        <?php
        // Include model LIENHE
        // Tạo một đối tượng LIENHE
        $lienhe_model = new LIENHE();

        // Lấy danh sách liên hệ từ model
        $lienhe_list = $lienhe_model->laylienhe();

        // Tính số lượng danh sách liên hệ
        $soluonglienhe = count($lienhe_list);
        ?>
        <h1 class="mt-4 mb-4">Danh sách liên hệ: <?php echo $soluonglienhe; ?> liên hệ</h1>

        <div class="row">
            <?php
            // Lặp qua danh sách liên hệ và hiển thị chúng
            foreach ($lienhe_list as $lienhe) {
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body" style="background-color: #e6e6fa; padding: 20px;">
                            <h5 class="card-title ">Họ và tên: <label class="text-primary"><?php echo $lienhe['hoten']; ?></label> </h5>
                            <h5 class="card-text">Tuổi: <?php echo $lienhe['tuoi']; ?></h5>
                            <h5 class="card-text">Số điện thoại: <?php echo $lienhe['sdt']; ?></h5>
                            <h5 class="card-text">Email: <?php echo $lienhe['email']; ?></h5>
                            <h5 class="card-text">Địa chỉ: <?php echo $lienhe['diachi']; ?></h5>
                            <h5 class="card-text">Tên khóa học: <?php echo $lienhe['tenkhoahoc']; ?></h5>
                            <h5 class="card-text ">Nội dung: <br>
                                <h6 class="card-text text-danger"><?php echo $lienhe['noidung']; ?></a></h6>
                                <h5 class="card-text">Ngày tạo: <?php echo date('d/m/Y H:i:s', strtotime($lienhe["created_at"])); ?></h5>
                                <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $lienhe['id']; ?>);" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash fa-fade fa-lg" style="color: #de1735;"></i>
                                </a>
                        </div>


                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
            window.location.href = 'index.php?action=xoa&id=' + id;
        }
    }
</script>
<?php include("../inc/bottom.php"); ?>
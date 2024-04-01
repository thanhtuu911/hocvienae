<?php
include("inc/top.php");
?>
<div class="container mt-5 p-5">
    <h1 class="text-md-center mt-5 mb-4">Tài Liệu Học</h1>
    <div class="row text-md-center">
        <div class="col  ">
            <h2> Tên Khóa Học </h2>
        </div>
        <div class="col ">
            <h2> Xem và tải xuống</h2>
        </div>
        <?php
        if (count($tailieu) > 0) {
        ?>
        <!-- <div class="w-100 mt-2"></div>
            <div class="col">
                <h5>Khóa học B1</h5>
            </div>
             <div class="col">
                <ul><a href="https://drive.google.com/drive/folders/1M5cFh3km262MNHoQdwOhyTuulYNTct13?usp=sharing" target="_blank" class="btn btn-primary btn-sm ms-2">
                        Xem và Download </a></ul>
            </div> -->
        <?php foreach($tailieu as $tl): ?>
        <tr>
            <div class="w-100 mt-2"></div>
            <div class="col">
                <h5><?php echo $tl["tenkhoahoc"]; ?></h5>
            </div>
            <div class="col">
                <ul><a href="<?php echo $tl["duongdan"]; ?>" target="_blank" class="btn btn-primary btn-sm ms-2">
                        Xem và Download </a></ul>
            </div>
        </tr>
        <?php endforeach; ?>
        <?php
        } else {
            // Hiển thị thông báo nếu không có tài liệu
            echo "<p>Không có tài liệu nào để hiển thị.</p>";
        }
        ?>
    </div>
</div>

<!-- 
<div class=' text-md-center mt-4'>
    <a href="index.php?action=themtailieu" class="btn btn-info">
        <h3> <i class="bi bi-patch-plus-fill"></i> Thêm Tài Liệu</h3>
    </a>
</div> -->

<style>
.container h5 {
    color: #372742;
}

.container h1 {
    color: #C71585;
}

.container h2 {
    color: #836FFF;
}
</style>
<?php
include("inc/bottom.php");
?>
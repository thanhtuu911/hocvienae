<?php include("inc/top.php"); ?>
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

<div class="container mt-5">
    <h1 class="text-md-center mt-3 mb-4">Upload Documents</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="themtailieu">
        <div class="form-group text-md-center">
            <label for="tenkhoahoc">
                <h2> Tên Khóa Học: </h2>
            </label><br>
            <?php clearstatcache(); ?>
            <input type="text" id="tenkhoahoc" name="tenkhoahoc" required> <br>
            <label for="duongdan">
                <h2 class="mt-2"> Dán link folder Khóa học:</h2>
            </label>
            <?php clearstatcache(); ?>
            <input type="text" class="form-control-file" id="duongdan" name="duongdan" required>

            <button type="submit" class="btn btn-primary text-md-center">Tải Lên</button>

        </div>
    </form>
</div>
<div class=' text-md-center mt-4'>
    <a href="index.php?action=tailieu" class="btn btn-info">
        <h3> <i class="bi bi-arrow-left-short"></i>  Về Trang Tài Liệu</h3>
    </a>
</div>
<?php
include("inc/bottom.php");
?>
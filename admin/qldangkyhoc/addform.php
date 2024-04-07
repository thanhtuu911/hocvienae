<?php include("../inc/top.php") ?>
<?php require_once("../../model/lophoc.php"); ?>
<?php require_once("../../model/database.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="index.php" method="POST" id="addForm">
                <input type="hidden" name="action" value="xulythem">

                <label for="lophoc_id">ID Lớp học:</label>
                <input type="number" id="lophoc_id" name="lophoc_id" required><br>
                <span id="lophoc_ten"></span><br><br>

                <label for="hocvien_id">ID Học viên:</label>
                <input type="number" id="hocvien_id" name="hocvien_id" required><br>
                <span id="hocvien_ten"></span><br><br>

                <input class="btn btn-outline-danger" type="submit" value="Thêm Đăng ký học">
            </form>
        </div>
        <div class="col-md-6">
            <label for="list_lophoc">Danh sách lớp học:</label>
            <ul id="list_lophoc">
                <?php
                // Lấy danh sách lớp học từ CSDL
                $lop_model = new LOPHOC();
                $danh_sach_lop = $lop_model->laydanhsachLop();

                // Hiển thị danh sách lớp học dưới dạng danh sách
                foreach ($danh_sach_lop as $lop) {
                    echo "<li " . $lop['lop_id'] . "\>" . "ID: " . $lop['lop_id'] . " : " . $lop['tenlop'] . "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<script>
    
    // document.getElementById("lophoc_id").addEventListener("change", function() {
    //     var hocvien_id = this.value;
    //     fetch("get_hocvien_info.php?id=" + hocvien_id)
    //         .then(response => response.json())
    //         .then(data => {
    //             document.getElementById("lophoc_id").innerText = "Tên lớp học: " + data.ten;
    //         });
    // });
    // document.querySelectorAll("#list_lophoc li").forEach(item => {
    // item.addEventListener("click", function() {
    //     var selectedClassId = this.getAttribute("data-lop-id");
        
    //     // Lấy tên lớp học tương ứng với ID đã chọn
    //     fetch("get_lophoc_info.php?id=" + selectedClassId)
    //         .then(response => response.json())
    //         .then(data => {
    //             document.getElementById("lophoc_id").value = selectedClassId;
    //             document.getElementById("lophoc_ten").innerText = "Tên lớp học: " + data.ten;
    //         });
    // });
    // });
    document.getElementById("hocvien_id").addEventListener("change", function() {
        var hocvien_id = this.value;
        fetch("get_hocvien_info.php?id=" + hocvien_id)
            .then(response => response.json())
            .then(data => {
                document.getElementById("hocvien_ten").innerText = "Tên học viên: " + data.ten;
            });
    });
</script>

<?php include("../inc/bottom.php") ?>

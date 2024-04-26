<?php
include("inc/top.php");
?>
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-9">
            <div class="card">
                <img class="card-img-top" width="auto" height="450px" style="margin-top: 50px;" src="../<?php echo $khct["hinhanh"]; ?>" alt="<?php echo $khct["tenkhoahoc"]; ?>">
                <div class="card-body">
                    <h3 class="card-title text-info"><?php echo $khct["tenkhoahoc"]; ?></h3>
                    <p class="card-text"><?php echo $khct['chitiet']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="" onclick="likeCourse(<?php echo $khct['id']; ?>)">
                            <i class="fas fa-heart fa-beat fa-lg" style="color: red;"></i>
                        </a>
                        <a class="btn" style="margin-right: auto;" id="likeCount_<?php echo $khct['id']; ?>"><?php echo $khct['luotthich']; ?></a>

                    </div>
                    <a type="submit" id="hienthiphiButton" class="btn btn-primary">Đăng Ký Ngay</a>

                    <div id="feeFormWrapper" style="display:none;">
                        <h4 class="text-dark"> Học Phí:</h4>
                        <!-- Form thông báo phí -->
                        <form id="feeForm" method="post" class="form-inline">
                            <input type="hidden" name="action" value="chovaogio">
                            <input type="hidden" name="id" value="<?php echo $khct["id"]; ?>">
                            <h4 class="text-danger" ><?php echo number_format($khct["phi"]); ?>  VNĐ</h4><br>
                            <button type="submit" class="btn btn-primary">Hoàn tất Đăng Ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var hienthiphiButton = document.getElementById("hienthiphiButton");
        var feeFormWrapper = document.getElementById("feeFormWrapper");

        // Ẩn form thông báo phí ban đầu
        feeFormWrapper.style.display = "none";

        // Bắt sự kiện khi người dùng nhấp vào nút "Đăng Ký Ngay"
        hienthiphiButton.addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút

            // Hiện form thông báo phí và ẩn nút "Đăng Ký Ngay"
            feeFormWrapper.style.display = "block";
            hienthiphiButton.style.display = "none";
        });
    });
</script>
<script>
    // Xử lý yêu cầu thích khóa học khi người dùng nhấn nút "Thích"
    function likeCourse(courseId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Cập nhật số lượt thích trên giao diện với số lượng mới nhận được từ máy chủ
                var likeCountElement = document.getElementById("likeCount_" + courseId);
                if (likeCountElement) {
                    likeCountElement.textContent = xhr.responseText;
                }
            }
        };
        xhr.send("action=like&id=" + courseId);
    }
</script>

<?php
include("inc/bottom.php");
?>

<?php
// Nơi bạn xử lý case "chovaogio"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "chovaogio") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        // Xử lý logic của bạn ở đây
    }
}
?>
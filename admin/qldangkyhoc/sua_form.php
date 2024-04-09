
<?php include("../inc/top.php") ?>

<?php
// Kiểm tra xem có tham số ID được truyền qua không
if (isset($_GET['id'])) {
    // Lấy ID từ tham số trên URL
    $dangky_id = $_GET['id'];

    // Gọi phương thức layDangKyHocTheoId từ đối tượng $dkh
    $dangkyhoc = $dkh->layDangKyHocTheoId($dangky_id);

    // Kiểm tra xem có dữ liệu được trả về không
    if ($dangkyhoc) {
        // Hiển thị biểu mẫu sửa điểm với thông tin chi tiết của bản ghi
?>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Sửa Điểm</h2>
                    <form method="post" action="index.php?action=xulysua">
                        <input type="hidden" name="id" value="<?php echo $dangkyhoc['id']; ?>">
                        <div class="mb-3">
                            <label for="hocvien" class="form-label">Học Viên:</label>
                            <input type="text" class="form-control" id="hocvien" value="<?php echo $dangkyhoc['hoten']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="lop" class="form-label">Lớp Học:</label>
                            <input type="text" class="form-control" id="lop" value="<?php echo $dangkyhoc['tenlop']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="diem" class="form-label">Điểm:</label>
                            <input type="text" class="form-control" id="diem" name="diem" value="<?php echo $dangkyhoc['diem']; ?>">
                        </div>
                        <!-- Thêm các trường khác cần sửa nếu cần -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    } else {
        // Hiển thị thông báo nếu không tìm thấy thông tin đăng ký học
        echo "Không tìm thấy thông tin đăng ký học";
    }
} else {
    // Hiển thị thông báo nếu không có ID được truyền qua
    echo "Không có ID đăng ký học được cung cấp";
}
?>


<?php include("../inc/bottom.php") ?>

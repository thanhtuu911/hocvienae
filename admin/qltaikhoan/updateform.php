<?php
require("../../model/database.php");
require("../../model/nguoidung.php");

if(isset($_GET["id"])) {
    $userID = $_GET["id"];
    $nguoidung_model = new NGUOIDUNG();
    $user_info = $nguoidung_model->laythongtinnguoidungByID($userID);

    if($user_info) {
        $userEmail = $user_info["email"];
        $userType = $user_info["loai"];
    } else {
        echo "Không tìm thấy người dùng.";
        exit;
    }
} else {
    echo "Không tìm thấy người dùng.";
    exit;
}
?>

<?php include("../inc/top.php"); ?>
<div class="container">
    <h2>Đổi loại người dùng</h2>
    <form method="post" action="index.php">
        <input type="hidden" name="action" value="doiloainguoidung">
        <input type="hidden" name="id" value="<?php echo $userID; ?>">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="loai">Loại người dùng:</label>
            <select class="form-control" id="loai" name="loai">
                <option value="1" <?php if ($userType == 1) echo "selected"; ?>>Quản trị</option>
                <option value="2" <?php if ($userType == 2) echo "selected"; ?>>Nhân viên</option>
                <option value="3" <?php if ($userType == 3) echo "selected"; ?>>Khách hàng</option>
                <!-- Không có option cho khách hàng vì không được phép đổi quyền -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Đổi loại</button>
    </form>
</div>
<?php include("../inc/bottom.php"); ?>

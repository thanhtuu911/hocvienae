<?php
require_once( "../../model/hocvien.php");
// Kiểm tra xem có từ khóa được gửi từ trình duyệt không
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];

    // Tạo một đối tượng HOCVIEN để tìm kiếm học viên
    $s = new HOCVIEN();
    $result = $s->timkiemhocvien($keyword);

    // Kiểm tra xem có kết quả tìm kiếm hay không
    if (!empty($result)) {
        // Hiển thị các gợi ý
        foreach ($result as $item) {
            echo "<div class='search-suggestion'>";
            echo "<a href='index.php?action=chitiet&id={$item['id']}'>{$item['hoten']}</a>";
            echo "</div>";
        }
    } else {
        // Hiển thị thông báo nếu không có kết quả
        echo "<div class='no-result-message'>Không tìm thấy kết quả cho '$keyword'</div>";
    }
}
?>

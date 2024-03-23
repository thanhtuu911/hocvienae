<?php


require("../model/hocvien.php");

$s = new HOCVIEN();
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $result = $s->timkiemhocvien($keyword);

    if (!empty($result)) {
       
        foreach ($result as $item) {
            echo "<div class='mathang-item'>";
            echo "<a href='index.php?action=detail&id={$item['id']}'>{$item['hoten']}</a>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-result-message'>Không tìm thấy kết quả cho '$keyword'</p>";
    }
}
?>





<?php
class LOPHOC_HOCVIEN {
    private $lophoc_id;
    private $hocvien_id;

    public function getlophoc_id() {
        return $this->lophoc_id;
    }

    // Setter cho thuộc tính $lophoc_id
    public function setlophoc_id($lophoc_id) {
        $this->lophoc_id = $lophoc_id;
    }

    public function gethocvien_id() {
        return $this->hocvien_id;
    }

    // Setter cho thuộc tính $hocvien_id
    public function sethocvien_id($hocvien_id) {
        $this->hocvien_id = $hocvien_id;
    }

    // Hàm lấy thông tin sinh viên theo lớp học
    public function layLopTheoID($lophoc_id) {
        // Kết nối CSDL (giả sử biến $conn là kết nối CSDL đã được thiết lập trước đó)
        $dbcon = DATABASE::connect();
        // Chuẩn bị câu truy vấn SQL
        $sql = "SELECT lh.lophoc_id, lh.hocvien_id, l.tenlop, h.hoten
        FROM lophoc_hocvien lh
        LEFT JOIN lophoc l ON lh.lophoc_id = l.id
        LEFT JOIN hocvien h ON lh.hocvien_id = h.id
        WHERE lh.lophoc_id = :lophoc_id";

        // Chuẩn bị và thực thi truy vấn SQL
        $stmt = $dbcon->prepare($sql);
        $stmt->bindParam(":lophoc_id", $lophoc_id);
        $stmt->execute();

        // Lấy kết quả trả về
        $result = $stmt->fetchAll();

        // Trả về kết quả
        return $result;
    }
}
?>



<?php
class DANGKYHOC
{
    private $id;
    private $hocvien_id;
    private $lophoc_id;

    // Getter cho thuộc tính $id
    public function getId()
    {
        return $this->id;
    }

    // Setter cho thuộc tính $id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter cho thuộc tính $hocvien_id
    public function getHocvienId()
    {
        return $this->hocvien_id;
    }

    // Setter cho thuộc tính $hocvien_id
    public function setHocvienId($hocvien_id)
    {
        $this->hocvien_id = $hocvien_id;
    }

    // Getter cho thuộc tính $lophoc_id
    public function getLophocId()
    {
        return $this->lophoc_id;
    }

    // Setter cho thuộc tính $lophoc_id
    public function setLophocId($lophoc_id)
    {
        $this->lophoc_id = $lophoc_id;
    }
    public function layDangKyHoc()
    {
        $dbcon = DATABASE::connect(); // Thay DATABASE::connect() bằng cách kết nối cơ sở dữ liệu của bạn

        try {
            $sql = "SELECT dangkyhoc.id, lophoc.tenlop, hocvien.hoten
            FROM dangkyhoc
            INNER JOIN lophoc ON dangkyhoc.lophoc_id = lophoc.id
            INNER JOIN hocvien ON dangkyhoc.hocvien_id = hocvien.id";

            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi xảy ra
        }
    }


    public function layDanhSachHocvienIdTheoLophocId($lophoc_id)
    {
        $dbcon = DATABASE::connect(); // Thay DATABASE::connect() bằng cách kết nối cơ sở dữ liệu của bạn

        try {
            $sql = "SELECT hocvien_id FROM dangkyhoc WHERE lophoc_id = :lophoc_id";
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':lophoc_id', $lophoc_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return []; // Trả về một mảng trống trong trường hợp xảy ra lỗi
        }
    }

    public function themDangKyHoc($lophoc_id, $hocvien_id)
    {
        $dbcon = DATABASE::connect(); // Kết nối đến cơ sở dữ liệu

        try {
            // Chuẩn bị câu lệnh SQL để thêm bản ghi vào bảng dangkyhoc
            $sql = "INSERT INTO dangkyhoc (hocvien_id, lophoc_id) VALUES (:hocvien_id, :lophoc_id)";

            // Chuẩn bị và thực thi câu lệnh SQL
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':hocvien_id', $hocvien_id);
            $stmt->bindValue(':lophoc_id', $lophoc_id);
            $stmt->execute();

            // Trả về true nếu thêm thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }



    // Xóa học viên khỏi lớp học
    public function xoaHocVienKhoiLop($hocvien_id, $lophoc_id)
    {
        $dbcon = DATABASE::connect(); // Thay DATABASE::connect() bằng cách kết nối cơ sở dữ liệu của bạn

        try {
            $sql = "DELETE FROM dangkyhoc WHERE hocvien_id = :hocvien_id AND lophoc_id = :lophoc_id";
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':hocvien_id', $hocvien_id, PDO::PARAM_INT);
            $stmt->bindValue(':lophoc_id', $lophoc_id, PDO::PARAM_INT);
            $stmt->execute();
            return true; // Trả về true nếu xóa thành công
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function kiemTraTonTai($hocvien_id, $lophoc_id)
    {
        $dbcon = DATABASE::connect(); // Thay DATABASE::connect() bằng cách kết nối cơ sở dữ liệu của bạn

        try {
            $sql = "SELECT COUNT(*) FROM dangkyhoc WHERE hocvien_id = :hocvien_id AND lophoc_id = :lophoc_id";
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':hocvien_id', $hocvien_id, PDO::PARAM_INT);
            $stmt->bindValue(':lophoc_id', $lophoc_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchColumn();

            // Trả về true nếu số lượng bản ghi lớn hơn 0 (học viên đã tồn tại trong lớp học), ngược lại trả về false
            return $result > 0;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }

    public function layDanhSachLopHocTheoHocVienId($hocvien_id)
    {
        $dbcon = DATABASE::connect(); // Thay DATABASE::connect() bằng cách kết nối cơ sở dữ liệu của bạn

        try {
            $sql = "SELECT lophoc.*, dangkyhoc.id AS dangky_id
                FROM lophoc 
                INNER JOIN dangkyhoc ON dangkyhoc.lophoc_id = lophoc.id 
                WHERE dangkyhoc.hocvien_id = :hocvien_id";
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':hocvien_id', $hocvien_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return []; // Trả về một mảng trống trong trường hợp xảy ra lỗi
        }
    }
}

<?php
class DANGKYHOC
{
    private $id;
    private $hocvien_id;
    private $lophoc_id;
    private $diem;
    private $ketqua;

    // Getter cho trường dữ liệu $ketqua
    public function getKetqua()
    {
        return $this->ketqua;
    }

    // Setter cho trường dữ liệu $ketqua
    public function setKetqua($ketqua)
    {
        $this->ketqua = $ketqua;
    }

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

    public function getdiem()
    {
        return $this->diem;
    }

    // Setter cho thuộc tính $lophoc_id
    public function setdiem($diem)
    {
        $this->diem = $diem;
    }

    public function layDangKyHoc()
    {
        $dbcon = DATABASE::connect(); // Thay DATABASE::connect() bằng cách kết nối cơ sở dữ liệu của bạn

        try {
            $sql = "SELECT dangkyhoc.id, lophoc.tenlop, hocvien.hoten, dangkyhoc.diem
            FROM dangkyhoc
            INNER JOIN lophoc ON dangkyhoc.lophoc_id = lophoc.id
            INNER JOIN hocvien ON dangkyhoc.hocvien_id = hocvien.id";

            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            foreach ($result as &$row) {
                $row['trang_thai'] = ($row['diem'] >= 5) ? "Đạt" : "Chưa đạt";
            }
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi xảy ra
        }
    }


    public function layDanhSachHocvienIdTheoLophocId($lophoc_id)
    {
        $dbcon = DATABASE::connect();

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

// hien thi danh sach hoc vien trong trang detail cua qlhocvien
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

    public function suaDiem($dangky_id, $diem)
    {
        $dbcon = DATABASE::connect(); // Kết nối đến cơ sở dữ liệu

        try {
            // Xử lý kiểm tra điểm và gán trạng thái tương ứng
            if ($diem >= 5) {
                $ketqua = "Đạt";
            } else {
                $ketqua = "Không đạt";
            }

            // Chuẩn bị câu lệnh SQL để cập nhật điểm và trạng thái
            $sql = "UPDATE dangkyhoc SET diem = :diem, ketqua = :ketqua WHERE id = :dangky_id";

            // Chuẩn bị và thực thi câu lệnh SQL
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':diem', $diem);
            $stmt->bindValue(':ketqua', $ketqua);
            $stmt->bindValue(':dangky_id', $dangky_id);
            $stmt->execute();

            // Trả về true nếu cập nhật thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }

// su dung o trang detail cua lop hoc
    public function layDiemHocVienTrongLop($hocvien_id, $lophoc_id)
    {
        $dbcon = DATABASE::connect();

        try {
            $sql = "SELECT diem FROM dangkyhoc WHERE hocvien_id = :hocvien_id AND lophoc_id = :lophoc_id";
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':hocvien_id', $hocvien_id, PDO::PARAM_INT);
            $stmt->bindValue(':lophoc_id', $lophoc_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchColumn();

            // Trả về điểm của học viên trong lớp học cụ thể
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi xảy ra
        }
    }
    //su dung trong trang info cua hocvien
    public function layDangKyHocTheoIdHocVien($hocvien_id)
    {
        $dbcon = DATABASE::connect();

        try {
            $sql = "SELECT dangkyhoc.*, lophoc.tenlop
        FROM dangkyhoc
        INNER JOIN lophoc ON dangkyhoc.lophoc_id = lophoc.id
        WHERE dangkyhoc.hocvien_id = :hocvien_id";
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':hocvien_id', $hocvien_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();

            // Trả về danh sách đăng ký học của học viên có ID tương ứng
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi xảy ra
        }
    }
    //lay dang  ky de sua diem hoc vien
    public function layDangKyHocTheoId($dangky_id)
    {
        $dbcon = DATABASE::connect(); // Kết nối đến cơ sở dữ liệu

        try {
            $sql = "SELECT dangkyhoc.*, lophoc.tenlop, hocvien.hoten
            FROM dangkyhoc
            INNER JOIN lophoc ON dangkyhoc.lophoc_id = lophoc.id
            INNER JOIN hocvien ON dangkyhoc.hocvien_id = hocvien.id
            WHERE dangkyhoc.id = :dangky_id";
            $stmt = $dbcon->prepare($sql);
            $stmt->bindValue(':dangky_id', $dangky_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Trả về thông tin đăng ký học nếu có
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi xảy ra
        }
    }
}

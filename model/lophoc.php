<?php
class LOPHOC
{
    private $id;
    private $tenlop;
    private $ngaybatdau;
    private $ngayketthuc;
    private $giaovien_id;
    private $khoahoc_id;

    public function getId()
    {
        return $this->id;
    }
    // Setter cho thuộc tính $id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter cho thuộc tính $tenlop
    public function getTenLop()
    {
        return $this->tenlop;
    }

    // Setter cho thuộc tính $tenlop
    public function setTenLop($tenlop)
    {
        $this->tenlop = $tenlop;
    }
    public function getNgayBatDau()
    {
        return $this->ngaybatdau;
    }

    // Setter cho thuộc tính $ngaybatdau
    public function setNgayBatDau($ngaybatdau)
    {
        $this->ngaybatdau = $ngaybatdau;
    }

    // Getter cho thuộc tính $ngayketqua
    public function getNgayKetThuc()
    {
        return $this->ngayketthuc;
    }

    // Setter cho thuộc tính $ngayketqua
    public function setNgayKetThuc($ngayketthuc)
    {
        $this->ngayketthuc = $ngayketthuc;
    }

    // Getter cho thuộc tính $giaovien_id
    public function getGiaoVienId()
    {
        return $this->giaovien_id;
    }

    // Setter cho thuộc tính $giaovien_id
    public function setGiaoVienId($giaovien_id)
    {
        $this->giaovien_id = $giaovien_id;
    }

    // Getter cho thuộc tính $khoahoc_id
    public function getKhoaHocId()
    {
        return $this->khoahoc_id;
    }

    // Setter cho thuộc tính $khoahoc_id
    public function setKhoaHocId($khoahoc_id)
    {
        $this->khoahoc_id = $khoahoc_id;
    }






    public function laydanhsachLop()
    {
        $dbcon = DATABASE::connect();
        $sql = "SELECT 
        l.id AS lop_id,
        l.tenlop, 
        l.ngaybatdau, 
        l.ngayketthuc, 
        g.id AS giaovien_id,
        g.hoten AS giaovien_hoten, 
        k.id AS khoahoc_id,
        k.tenkhoahoc 
    FROM 
        lophoc l 
    INNER JOIN 
        giaovien g ON l.giaovien_id = g.id 
    INNER JOIN 
        khoahoc k ON l.khoahoc_id = k.id;
    ";
        $stmt = $dbcon->query($sql);

        // Lấy kết quả và trả về dưới dạng mảng kết hợp
        $result = $stmt->fetchAll();
        return $result;
    }



    // Hàm thêm lớp học mới
    public function themLop(LOPHOC $lop)
    {
        $dbcon = DATABASE::connect();
        $sql = "INSERT INTO lophoc (tenlop, ngaybatdau, ngayketthuc, giaovien_id, khoahoc_id)
         VALUES (:tenlop, :ngaybatdau, :ngayketthuc, :giaovien_id, :khoahoc_id)";
        $stmt = $dbcon->prepare($sql);
        $stmt->bindValue(':tenlop', $lop->tenlop);
        $stmt->bindValue(':ngaybatdau', $lop->ngaybatdau);
        $stmt->bindValue(':ngayketthuc', $lop->ngayketthuc);
        $stmt->bindValue(':giaovien_id', $lop->giaovien_id);
        $stmt->bindValue(':khoahoc_id', $lop->khoahoc_id);
        return $stmt->execute();
    }

    //Hàm xóa lớp học
    public function xoaLop($id)
    {
        $dbcon = DATABASE::connect();
        $sql = "DELETE FROM lophoc WHERE id = :id";
        $stmt = $dbcon->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }


    // Hàm cập nhật thông tin lớp học
    public function CapnhatLop(LOPHOC $lop)
    {
        $dbcon = DATABASE::connect();
        $sql = "UPDATE lophoc 
                SET tenlop = :tenlop,
                ngaybatdau = :ngaybatdau, 
                ngayketthuc = :ngayketthuc, 
                giaovien_id = :giaovien_id, 
                khoahoc_id = :khoahoc_id 
                WHERE id = :id";
        $stmt = $dbcon->prepare($sql);
        $stmt->bindValue(':id', $lop->getId());
        $stmt->bindValue(':tenlop', $lop->getTenLop());
        $stmt->bindValue(':ngaybatdau', $lop->getNgayBatDau());
        $stmt->bindValue(':ngayketthuc', $lop->getNgayKetThuc());
        $stmt->bindValue(':giaovien_id', $lop->getGiaoVienId());
        $stmt->bindValue(':khoahoc_id', $lop->getKhoaHocId());
        return $stmt->execute();
    }
    public function layLopTheoID($lop_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM lophoc WHERE id = :id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindParam(':id', $lop_id);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu xảy ra lỗi
        }
    }
    public function laylophoctheongay($date)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM lophoc WHERE DATE(created_at) = :created_at";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(':created_at', $date);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu không thể lấy được danh sách học viên
        }
    }

}

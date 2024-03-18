<?php
class LOP{
    private $id;
    private $tenlop;
    private $ngaybatdau;
    private $ngayketqua;
    private $giaovien_id;
    private $khoahoc_id;

    public function getId() {
        return $this->id;
    }
    // Setter cho thuộc tính $id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter cho thuộc tính $tenlop
    public function getTenLop() {
        return $this->tenlop;
    }

    // Setter cho thuộc tính $tenlop
    public function setTenLop($tenlop) {
        $this->tenlop = $tenlop;
    }
    public function getNgayBatDau() {
        return $this->ngaybatdau;
    }

    // Setter cho thuộc tính $ngaybatdau
    public function setNgayBatDau($ngaybatdau) {
        $this->ngaybatdau = $ngaybatdau;
    }

    // Getter cho thuộc tính $ngayketqua
    public function getNgayKetQua() {
        return $this->ngayketqua;
    }

    // Setter cho thuộc tính $ngayketqua
    public function setNgayKetQua($ngayketqua) {
        $this->ngayketqua = $ngayketqua;
    }

    // Getter cho thuộc tính $giaovien_id
    public function getGiaoVienId() {
        return $this->giaovien_id;
    }

    // Setter cho thuộc tính $giaovien_id
    public function setGiaoVienId($giaovien_id) {
        $this->giaovien_id = $giaovien_id;
    }

    // Getter cho thuộc tính $khoahoc_id
    public function getKhoaHocId() {
        return $this->khoahoc_id;
    }

    // Setter cho thuộc tính $khoahoc_id
    public function setKhoaHocId($khoahoc_id) {
        $this->khoahoc_id = $khoahoc_id;
    }
    

    public function laydanhsachLop() {
        $dbcon = DATABASE::connect();
        $sql = "SELECT * FROM lop";
        $stmt = $this->$dbcon->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Hàm thêm lớp học mới
    public function themLop(LOP $lop) {
        $dbcon = DATABASE::connect();
        $sql = "INSERT INTO lop (tenlop, ngaybatdau, ngayketqua, giaovien_id, khoahoc_id)
         VALUES (:tenlop, :ngaybatdau, :ngayketqua, :giaovien_id, :khoahoc_id)";
        $stmt = $this->$dbcon->prepare($sql);
        $stmt->bindValue(':tenlop', $lop->getTenLop());
        $stmt->bindValue(':ngaybatdau', $lop->getNgayBatDau());
        $stmt->bindValue(':ngayketqua', $lop->getNgayKetQua());
        $stmt->bindValue(':giaovien_id', $lop->getGiaoVienId());
        $stmt->bindValue(':khoahoc_id', $lop->getKhoaHocId());
        return $stmt->execute();
    }

    // Hàm xóa lớp học
    public function xoaLop($id) {
        $dbcon = DATABASE::connect();
        $sql = "DELETE FROM lop WHERE id = :id";
        $stmt = $this->$dbcon->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    // Hàm cập nhật thông tin lớp học
    public function CapnhatLop(LOP $lop)
     {
        $dbcon = DATABASE::connect();
        $sql = "UPDATE lop 
                SET tenlop = :tenlop,
                ngaybatdau = :ngaybatdau, 
                ngayketqua = :ngayketqua, 
                giaovien_id = :giaovien_id, 
                khoahoc_id = :khoahoc_id 
                WHERE id = :id";
        $stmt = $this->$dbcon->prepare($sql);
        $stmt->bindValue(':id', $lop->getId());
        $stmt->bindValue(':tenlop', $lop->getTenLop());
        $stmt->bindValue(':ngaybatdau', $lop->getNgayBatDau());
        $stmt->bindValue(':ngayketqua', $lop->getNgayKetQua());
        $stmt->bindValue(':giaovien_id', $lop->getGiaoVienId());
        $stmt->bindValue(':khoahoc_id', $lop->getKhoaHocId());
        return $stmt->execute();
    }
}
?>
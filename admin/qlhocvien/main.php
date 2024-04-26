<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <!--  button Search  -->
        <div class="col-md-12">
            <form method="get" class="d-flex" action="search.php">
                <input type="search" class="form-control me-5" name="keyword" id="search-input" placeholder="Nhập tên học sinh cần tìm!" aria-label="Search">
                <div id="search-suggestions" class="mt-5"></div>
                <!-- <a class="btn btn-outline-primary" type="submit" id="search-button"><i class="fa-brands fa-searchengin fa-shake fa-xl" style="color: #19a1e6;"></i></a> -->
            </form>
        </div>
    </div>
</div>
<!-- end tim kiem -->

<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="index.php?action=them" class="btn btn-outline-primary">
                <i class="fa-solid fa-plus fa-xl" style="color: #3be8c5;"></i>
                Thêm Học Viên
            </a>
            <a href="export.php" class="btn btn-outline-success">
                <i class="fa-solid fa-file-excel fa-xl" style="color: green;"></i>
                Xuất Excel
            </a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-hover table-responsive" style="background-color: #e6e6fa; padding: 10px;">
                <?php
                $stt = 1;
                $soluonghocvien = count($hocvien);
                ?>
                <h1 class="">Danh sách học viên: <?php echo $soluonghocvien; ?> học viên</h1>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và Tên</th>
                        <th>Năm Sinh</th>
                        <th>Giới Tính</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Lớp Học</th>
                        <th>Hình Ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hocvien as $h) : ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td>
                                <a href="index.php?action=chitiet&id=<?php echo $h['id']; ?>"><?php echo $h['hoten']; ?></a>
                            </td>
                            <td><?php echo $h['namsinh']; ?></td>
                            <td><?php echo $h['gioitinh']; ?></td>
                            <td><?php echo $h['email']; ?></td>
                            <td><?php echo $h['sodienthoai']; ?></td>
                            <td><?php echo $h['diachi']; ?></td>
                            <td>
                                <?php
                                $danhSachLopHoc = $dkh->layDanhSachLopHocTheoHocVienId($h['id']);
                                foreach ($danhSachLopHoc as $lopHoc) {
                                    echo $lopHoc['tenlop'] . "<br>" . "<br>";
                                }
                                ?>
                            </td>
                            <td><img src="../../<?php echo $h['hinhanh']; ?>" width="250" class="img-thumbnail"></td>
                            <td class="text-center">
                                <a href="index.php?action=sua&id=<?php echo $h['id']; ?>" class="btn btn-outline-warning"> <i class="fa-solid fa-edit fa-fade fa-lg" style="color: #f1d93b;"></i> </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $h['id']; ?>);" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash fa-fade fa-lg" style="color: #de1735;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $stt++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
            window.location.href = 'index.php?action=xoa&id=' + id;
        }
    }
</script>

<?php include("../inc/bottom.php"); ?>

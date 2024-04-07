<?php include("../inc/top.php"); ?>
<a href="index.php?action=them" class="btn btn-outline-primary">
    <i class="fa-solid fa-plus fa-xl" style="color: #3be8c5;"></i> Thêm Lớp Học
</a>

<div class="container mt-5">
    <h2>Danh sách lớp học</h2>
    <table class="table" style="background-color: #e6e6fa; padding: 20px;">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Tên lớp</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <!-- <th>IDGV</th> -->
                <th>Giáo viên </th>
                <!-- <th>IDKH</th> -->
                <th>Khóa học </th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lophoc as $l) : ?>
                <tr>
                    <td>
                    <a href="index.php?action=chitiet&id=<?php echo $l['lop_id']; ?>"</a>    
                    <?php echo $l['tenlop']; ?> </td>
                    <td><?php echo $l['ngaybatdau']; ?></td>
                    <td><?php echo $l['ngayketthuc']; ?></td>
                    <td><?php echo $l['giaovien_hoten']; ?></td>
                    <td><?php echo $l['tenkhoahoc']; ?></td>
                    <td>
                        <form action="index.php">
                            <!-- <a href="index.php?action=chitiet&id=<?php echo $l['lop_id']; ?>" class="btn btn-outline-info"><i class="fa-solid fa-info fa-beat-fade fa-xl" style="color: #3c77dd;"></i></a> -->
                            <a class="btn btn-outline-warning" data-toggle="modal" data-target="#suaLop<?php echo $l['lop_id']; ?>"><i class="fa-solid fa-wrench fa-bounce fa-xl" style="color: #f1d93b;"></i></a>
                            <a href="index.php?action=xoa&id=<?php echo $l['lop_id']; ?>" class="btn btn-outline-danger"><i class=" fa-solid fa-trash fa-bounce fa-xl" style="color: #de1735;"></i></a>

                        </form>
                    </td>
                </tr>
                <!-- Modal Sửa Lớp -->
                <div class="modal fade" id="suaLop<?php echo $l['lop_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="suaLopLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="suaLopLabel">Sửa thông tin lớp học</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="index.php">
                                    <input type="hidden" name="action" value="xulysua">
                                    <input type="hidden" name="id" value="<?php echo $l['lop_id']; ?>">
                                    <div class="form-group">
                                        <label for="tenlop">Tên lớp:</label>
                                        <input type="text" class="form-control" id="tenlop" name="tenlop" value="<?php echo $l['tenlop']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ngaybatdau">Ngày bắt đầu:</label>
                                        <input type="date" class="form-control" id="ngaybatdau" name="ngaybatdau" value="<?php echo $l['ngaybatdau']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ngayketthuc">Ngày kết thúc:</label>
                                        <input type="date" class="form-control" id="ngayketthuc" name="ngayketthuc" value="<?php echo $l['ngayketthuc']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="giaovien_id">Giáo viên ID:</label>
                                        <input type="text" class="form-control" id="giaovien_id" name="giaovien_id" value="<?php echo $l['giaovien_id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="khoahoc_id">Khóa học ID:</label>
                                        <input type="text" class="form-control" id="khoahoc_id" name="khoahoc_id" value="<?php echo $l['khoahoc_id']; ?>">
                                    </div>
                                    <a href="index.php?action=xoa&id=<?php echo $l['lop_id']; ?>"> <button type="submit" class="btn btn-primary" name="capnhat">Cập nhật</button> </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- Bootstrap JS và jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<?php include("../inc/bottom.php"); ?>
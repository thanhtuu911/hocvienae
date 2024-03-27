<?php include("inc/top.php") ?>

<style>
    /* Đặt padding-top để tránh bị trang top đè lên */
    body {
        padding-top: 100px;
        /* Điều chỉnh giá trị theo yêu cầu */
    }

    /* Đảm bảo trang top nằm phía trên trang cart */
    .navbar {
        z-index: 1000;
    }
</style>


<section>
    <div>
        <?php
        if (demhangtronggio() == 0) {
        ?>
            <h3 class="tex-info"> Khóa học rỗng</h3>
            <p>Vui lòng chọn sản phẩm</p>
        <?php
        } else {
        ?>
            <h3 class="text-danger">Khóa học của bạn:</h3>
            <form action="index.php">
                <table class="table table-hover">
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên khoá học</th>
                        <th>Học Phí</th>
                    </tr>
                    <?php foreach ($giohang as $id => $mh) :
                    ?>
                        <tr>
                            <td><img width="120" height="70" src="../<?php echo $mh["hinhanh"]; ?>"></td>
                            <td><?php echo $mh["tenkhoahoc"]; ?></td>
                            <td><?php echo number_format($mh["phi"]); ?>VNĐ</td>
                            <td> <a href="index.php?action=xoa1khoahoc&id=<?php echo $id; ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash fa-bounce" style="color: #e51045;"></i></a></td>
                        </tr>
                    <?php endforeach;
                    ?>
                    <tr>
                        <td colspan="2"></td>
                        <td class="fw-bold">Tổng tiền học phí phải đóng:</td>
                        <td class="text-dark fw-bold"><?php echo number_format(tinhtiengiohang()); ?> VNĐ</td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col text-center">
                        <a href="index.php?action=xoakhoahoc" class="btn btn-warning"> Xóa tất cả</a>

                        <a href="index.php?action=thanhtoan" class="btn btn-success">Thanh toán</a>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</section>
<?php
include("inc/bottom.php");
?>
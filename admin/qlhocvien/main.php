<?php include("../inc/top.php"); ?>
<!--  button Search 2222 -->

                        <div class="container-fluid " >
                            <form method="get" class="d-flex" action="timkiem.php">
                            <input type="search" class="form-control me-2" name="keyword" id="search-input" placeholder="Nhập tên học sinh cần tìm!" aria-label="Search" >
                            <div id="search-suggestions" class="mt-5"></div>    
                            <a class="btn btn-outline-primary" type="submit" id="search-button"><i class="fa-brands fa-searchengin fa-shake fa-xl" style="color: #19a1e6;"></i></a>
                            </form>
                        </div>
                    
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm Học Viên
</a>
<br> 


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Họ và Tên</th>
                <th>Năm Sinh</th>
                <th>Giới Tính</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Hình Ảnh</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocvien as $h) : ?>
                <tr>
                    
                    <td><?php echo $h['hoten']; ?></td>
                    <td><?php echo $h['namsinh']; ?></td>
                    <td><?php echo $h['gioitinh']; ?></td>
                    <td><?php echo $h['email']; ?></td>
                    <td><?php echo $h['sodienthoai']; ?></td>
                    <td><?php echo $h['diachi']; ?></td>
                    <td><img src="../../<?php echo $h['hinhanh']; ?>"  width="250" class="img-thumbnail"></td>
                    <div class="col-sm">
                    <td class="text-center">
                        
                    <a href="index.php?action=sua&id=<?php echo $h['id']; ?>" class="btn btn-outline-warning"> <i class="fa-solid fa-wrench fa-bounce fa-xl" style="color: #f1d93b;"></i> </a>
                    </td>
                    <td text-center>
                        <a href="index.php?action=xoa&id=<?php echo $h['id']; ?>" class="btn btn-outline-danger"> <i class="fa-solid fa-trash fa-bounce fa-xl" style="color: #de1735;"></i></a>
                    </td>
                    </div>
                </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include("../inc/bottom.php"); ?>

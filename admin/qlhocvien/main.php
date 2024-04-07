<?php include("../inc/top.php"); ?>

<!--  button Search  -->
<div class="container-fluid">
    <form method="get" class="d-flex" action="search.php">
        <input type="search" class="form-control me-5" name="keyword" id="search-input" placeholder="Nhập tên học sinh cần tìm!" aria-label="Search">
        <div id="search-suggestions" class="mt-5"></div>
        <!-- <a class="btn btn-outline-primary" type="submit" id="search-button"><i class="fa-brands fa-searchengin fa-shake fa-xl" style="color: #19a1e6;"></i></a> -->
    </form>
</div>
<!-- timkiem -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const searchSuggestions = document.getElementById('search-suggestions');

        searchInput.addEventListener('input', function(e) {
            const keyword = e.target.value.trim(); // Lấy từ khoá và loại bỏ khoảng trắng thừa

            // Kiểm tra nếu từ khoá không rỗng
            if (keyword !== '') {
                fetchSuggestions(keyword);
            } else {
                searchSuggestions.innerHTML = ''; // Nếu từ khoá rỗng, xóa gợi ý
            }
        });

        function fetchSuggestions(keyword) {
            // Gửi yêu cầu đến server để lấy gợi ý
            fetch(`search.php?keyword=${keyword}`)
                .then(response => response.text())
                .then(data => {
                    // Hiển thị danh sách gợi ý trong #search-suggestions
                    searchSuggestions.innerHTML = data;
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                });
        }
    });
</script>
<style>
    .form-control {
        height: 50px;
        margin-bottom: 10px;
        width: 400px;
        margin-left: 200px;
        border-color: #de1735;

    }

    #search-suggestions {
        background-color: beige;
        border: 0px solid #1eb299;
        border-radius: 5px;
        max-height: 400px;
        overflow-y: auto;
        position: absolute;
        width: 200px;
        z-index: 1000;
        display: block;
        margin-left: 200px;
        text-align: center;
        color: black;

    }

    /* CSS */
    #search-results {
        margin-top: 20px;
    }

    .search-result-item {
        margin-bottom: 20px;
        color: darkslategray;


    }

    .no-result-message {
        margin-top: 10px;
        color: red;
    }
</style>
<!-- end tim kiem -->





<br>
<a href="index.php?action=them" class="btn btn-outline-primary">
    <i class="fa-solid fa-plus fa-xl" style="color: #3be8c5;"></i>
    Thêm Học Viên
</a>
<br>


<div class="container">
    <table class="table table-hover" style="background-color: #e6e6fa; padding: 20px; margin-top:10px">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Họ và Tên</th>
                <th>Năm Sinh</th>
                <th>Giới Tính</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Lớp Học</th>
                <th>Hình Ảnh</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocvien as $h) : ?>
                <tr>
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
                    <div class="col-sm">
                        <td class="text-center">
                            <a href="index.php?action=sua&id=<?php echo $h['id']; ?>" class="btn btn-outline-warning"> <i class="fa-solid fa-wrench fa-bounce fa-lg" style="color: #f1d93b;"></i> </a>
                        </td>
                        <td class="text-center">
                            <a href="index.php?action=xoa&id=<?php echo $h['id']; ?>" class="btn btn-outline-danger"> <i class="fa-solid fa-trash fa-bounce fa-lg" style="color: #de1735;"></i></a>
                        </td>
                    </div>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include("../inc/bottom.php"); ?>
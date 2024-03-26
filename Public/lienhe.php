<?php include("inc/top.php");?>



<div class="container mt-4 p-5" id="Contact">
    <!-- Start contact us container -->
    <h2 class="text-md-center mb-4 mt-5"> LIÊN HỆ VỚI CHÚNG TÔI</h2>
    <!-- Heading contact -->
    <div class="row">
        <div class="col-md-8">
            <!-- Form liên hệ -->
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="tuvan">
                <div class="mb-3">
                    <input type="text" name="txthoten" class="form-control" placeholder="Họ & Tên" required>
                </div>
                <select type='text' name="txttuoi" class="form-control mb-3" required>
                    <option>Chọn tuổi:</option>
                    <?php
                    for ($i = 10; $i <= 30; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <div class="mb-3">
                    <input type="email" name="txtemail" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="txtsdt" class="form-control" placeholder="Số Điện Thoại" required>
                </div>
                <div class="mb-3">
                    <select type='text' name="txttenkhoahoc" class="form-control mb-3">
                        <option>Chọn Khóa Học: B1 or B2 or C1</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                    </select>

                    <input type="text" name="txtdiachi" class="form-control" placeholder="Địa Chỉ">
                </div>
                <div class="mb-3">
                    <textarea name="txtnoidung" class="form-control" placeholder="Tôi có thể giúp gì cho bạn?"
                        style="height: 150px;"></textarea> <br>
                </div>

                <input type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal" value='Gửi yêu cầu' >
                    
            </form>
            <div class="col-md-4 stripe text-light text-center">
                <h4>American English</h4>
                <p>
                    Đặc biệt với tinh thần lấy chữ “Tâm” đặt lên hàng đầu trong quá trình giảng dạy,<br>
                    trong công tác đào tạo thế hệ trẻ. <br>
                </p>
            </div>
        </div>
    </div>
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-5 p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Đã gửi thành công</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi lại sớm nhất có thể.</p>
                </div>
                <div class="modal-footer">
                    <a type='submit' class="btn btn-secondary text-md-center" data-bs-dismiss="modal" href="index.php?action=tuvan"> Đóng</a>
                </div>
            </div>
        </div>
    </div>
</div>
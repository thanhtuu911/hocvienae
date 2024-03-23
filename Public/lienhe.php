<?php include("inc/top.php");?>




<!-- <div class="container mt-5 p-4">
    <h1 class="text-md-center text-white mt-5 p-3" style="background-color:#225473"> Liên Hệ</h1>
    <h2 class="lead m-4">Cảm ơn bạn đã quan tâm đến chúng tôi. Vui lòng điền thông tin vào biểu mẫu dưới đây và chúng
        tôi sẽ liên hệ lại với bạn sớm nhất có thể.</h2>
    <?php 
	if(isset($_SESSION["khachhang"])){
	?>
    <form action="process_contact.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Họ và Tên:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số Điện Thoại:</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Nội Dung:</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
    <?php
	}
	else
	?>
</div> -->

<!-- <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Thành Công</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Biểu mẫu đã được gửi thành công. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất.</p>
            </div>
        </div>
    </div>
</div> -->



<div class="container mt-5 p-4">
    <h1 class="text-md-center text-white mt-5 p-3" style="background-color:#225473"> Liên Hệ Tư Vấn </h1>
    <p class="lead mb-4">Cảm ơn bạn đã quan tâm đến chúng tôi. Vui lòng điền thông tin vào biểu mẫu dưới đây và nhấn
        "Gửi".</p>
    <form id="contactForm" action="index.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Họ và Tên:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số Điện Thoại:</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Nội Dung:</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">Gửi</button>
    </form>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Thành Công</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi lại sớm nhất có thể.</p>
            </div>
        </div>
    </div>
</div>
<!-- <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Ngăn chặn form submit mặc định

            // Thực hiện xử lý gửi dữ liệu, ở đây là ví dụ sử dụng setTimeout để giả lập việc gửi thành công
            setTimeout(function() {
                $('#successModal').modal('show'); // Hiển thị dialog thông báo thành công
            }, 2000); // Thời gian giả lập 2 giây
        });
    </script> -->
<?php include("inc/bottom.php"); ?>
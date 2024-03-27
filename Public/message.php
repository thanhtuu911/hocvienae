<?php
include("inc/top.php");
?>
<style>
body {
    background-color: #f8f9fa;

}

.thank-you-container {

    max-width: 600px;
    margin: 0 auto;
    padding: 100px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    color: #007bff;
    margin-top: 50px;
}

p {
    font-size: 18px;
    margin-top: 20px;
}

.btn {
    margin-top: 20px;
}
</style>

<div class="thank-you-container mt-5 p-5">
    <h1>Đã gửi thành công!</h1>
    <p>Chúng tôi cảm ơn sự ủng hộ của bạn.</p>
    <p>Bạn sẽ nhận được trải nghiệm tốt nhất trong thời gian sớm nhất.</p>
    <a href="home.php" class="btn btn-outline-primary">Quay lại trang chủ</a>
</div>

<?php
include("inc/bottom.php");
?>
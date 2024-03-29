<?php
include("inc/top.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cảm ơn</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
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
</head>
<body>
  <div class="thank-you-container">
    <h1>Cảm ơn bạn!</h1>
    <p>Chúng tôi cảm ơn sự ủng hộ của bạn.</p>
    <p>Bạn sẽ nhận được trải nghiệm tốt nhất  trong thời gian sớm nhất.</p>
    <a href="home.php" class="btn btn-primary">Quay lại trang chủ</a>
  </div>
</body>
</html>

<?php
include("inc/bottom.php");
?>

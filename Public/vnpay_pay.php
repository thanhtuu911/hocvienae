<?php
// File: index.php

// Khai báo các thông tin cần thiết
$vnp_TmnCode = "W8BRAHQH"; // Mã website tại VNPAY
$vnp_HashSecret = "PHCUWOKOCJQRUAHJJJSQAJTSRXSKYADA"; // Chuỗi bí mật
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // URL của cổng thanh toán VNPAY
$vnp_Returnurl = "http://localhost/hocvienae/Public/message.php"; // URL trang trả về sau khi thanh toán thành công
// $startTime = date("YmdHis");
// $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
// Xử lý khi nhấn nút thanh toán
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vnp_TxnRef = rand(1, 10000); // Mã giao dịch thanh toán tham chiếu của merchant
    $vnp_Amount = $_POST['amount']; // Số tiền thanh toán
    $vnp_Locale = 'vn'; // Ngôn ngữ chuyển hướng thanh toán
    $vnp_BankCode = 'ncb'; // Mã phương thức thanh toán
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // IP Khách hàng thanh toán

    // Tạo dữ liệu thanh toán
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount * 100,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
        "vnp_OrderType" => "other",
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "  vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate" => date('YmdHis', strtotime('+15 minutes')) // Thời điểm hết hạn giao dịch (ví dụ: sau 15 phút)

    
    );

    // Thêm mã phương thức thanh toán nếu có
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    // Sắp xếp dữ liệu theo thứ tự alphabet
    ksort($inputData);

    // Tạo chuỗi hash dữ liệu
    $query = "";
    foreach ($inputData as $key => $value) {
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    // Tạo chuỗi hash bảo mật
    $hashdata = $query . 'vnp_HashSecret=' . $vnp_HashSecret;
    $vnpSecureHash = hash('sha512', $hashdata);

    // Thêm chuỗi hash bảo mật vào URL thanh toán
    $vnp_Url .= "?" . $query . 'vnp_SecureHash=' . $vnpSecureHash;

    // Chuyển hướng đến cổng thanh toán VNPAY
    header('Location: ' . $vnp_Url);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNPAY Payment</title>
</head>

<body>
    <h1>VNPAY Payment</h1>
    <form method="post">
        <label for="amount">Amount:</label>
        <input type="text" name="amount" id="amount" required><br><br>
        <label for="language">Language:</label>
        <select name="language" id="language" required>
            <option value="vn">Vietnamese</option>
            <option value

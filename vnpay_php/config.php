<?php

$vnp_TmnCode = "W8BRAHQH"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "PHCUWOKOCJQRUAHJJJSQAJTSRXSKYADA"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/hocvienae/Public/index.php?action=giohang";

$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

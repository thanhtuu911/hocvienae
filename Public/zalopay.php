<?php
// Include các tệp cần thiết và khởi động session
include("inc/top.php");

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["khachhang"])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit(); // Dừng kịch bản để chuyển hướng được thực hiện
}

// Lấy số tiền cần thanh toán từ giỏ hàng
$amountToPay = tinhtiengiohang(); 

// Xử lý khi người dùng nhấn vào nút thanh toán bằng Zalo Pay
if (isset($_POST['btnZaloPay'])) {
    // Bước 1: Xác định thông tin giao dịch
    $orderID = time(); // Hàm tạo mã đơn hàng
    $description = "Thanh toán đơn hàng "; // Mô tả giao dịch

    // Bước 2: Tạo request để gửi thông tin thanh toán tới Zalo Pay
    // Tạo request data
    $data = array(
        'app_id' => 'YOUR_APP_ID',
        'app_user' => $_SESSION['khachhang']['id'], // ID của người dùng trong ứng dụng của bạn
        'app_time' => time(),
        'app_trans_id' => $orderID, // Mã đơn hàng
        'app_description' => $description, // Mô tả giao dịch
        'amount' => $amountToPay, // Số tiền cần thanh toán
        'embed_data' => '', // Dữ liệu nhúng tùy chọn
        'item' => 'Thanh toán', // Tên sản phẩm hoặc dịch vụ
    );

    // Chuyển đổi dữ liệu sang định dạng JSON
    $postData = json_encode($data);

    // URL endpoint của Zalo Pay
    $url = 'https://sb-openapi.zalopay.vn/v2/create';

    // Khởi tạo một request curl
    $ch = curl_init();

    // Cấu hình các thông số cho request
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postData))
    );

    // Thực hiện request và lấy response
    $response = curl_exec($ch);

    // Đóng kết nối curl
    curl_close($ch);

    // Kiểm tra response từ Zalo Pay
    if ($response) {
        // Chuyển đổi response sang mảng
        $responseData = json_decode($response, true);

        // Kiểm tra xem response có thành công không
        if ($responseData['return_code'] == 1) {
            // Lấy URL thanh toán từ response
            $zaloPayURL = $responseData['order_url'];

            // Chuyển hướng người dùng đến trang thanh toán Zalo Pay
            header("Location: $zaloPayURL");
            exit();
        } else {
            // Hiển thị thông báo lỗi nếu có
            echo "Lỗi: " . $responseData['return_message'];
            exit();
        }
    } else {
        // Hiển thị thông báo lỗi nếu không thể kết nối đến Zalo Pay
        echo "Lỗi: Không thể kết nối đến Zalo Pay";
        exit();
    }
}
?>

<?php
// Include các tệp cần thiết
include("inc/bottom.php");
?>

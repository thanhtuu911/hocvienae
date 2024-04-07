<?php
// Include các tệp cần thiết và khởi động session
include("inc/top.php");
require_once __DIR__.'../../vendor/autoload.php'; // Đường dẫn đến thư mục chứa autoload.php của thư viện QR Code


// Kiểm tra nếu người dùng đã đăng nhập, nếu không, chuyển hướng về trang đăng nhập hoặc trang khác
if (!isset($_SESSION["khachhang"])) {
    header("Location: login.php"); // Thay 'login.php' bằng trang bạn muốn chuyển hướng đến
    exit(); // Dừng kịch bản để chuyển hướng được thực hiện
}

// Lấy dữ liệu cần để tạo mã QR, ví dụ: Số tiền cần thanh toán
$amountToPay = tinhtiengiohang(); // Số tiền cần thanh toán, bạn có thể thay đổi phần này cho phù hợp với dự án của bạn



// Hàm tạo mã QR bằng PHP 3 lớp
function generateQRCode($data, $filename)
{
    // Thư mục lưu trữ QR Code
    $directory = __DIR__.'/path/to/save/qrcode/';

    // Đường dẫn tuyệt đối đến file QR Code
    $absoluteFilePath = $directory . $filename;

    // Tạo hình ảnh mới
    $image = imagecreate(300, 300);

    // Định rõ màu nền trắng
    $white = imagecolorallocate($image, 255, 255, 255);

    // Định rõ màu đen cho mã QR
    $black = imagecolorallocate($image, 0, 0, 0);

    // Vẽ hình vuông đen để chứa mã QR
    imagefilledrectangle($image, 0, 0, 300, 300, $white);

    // Dùng hàm imagestringup để vẽ mã QR
    imagestringup($image, 5, 100, 100, $data, $black);

    // Lưu hình ảnh vào file
    imagepng($image, $absoluteFilePath);

    // Giải phóng bộ nhớ
    imagedestroy($image);

    // Trả về đường dẫn tới file QR Code
    return $absoluteFilePath;
}

// Sử dụng hàm để tạo mã QR
$data = "example_data_to_encode";
$filename = 'qr_code_' . time() . '.png';
$qrCodeImage = generateQRCode($data, $filename);

// Hiển thị mã QR và các thông tin thanh toán
echo '<img src="'.$qrCodeImage.'" alt="QR Code">';
?>

<!-- Hiển thị mã QR và các thông tin thanh toán -->
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>Thanh toán bằng mã QR</h2>
            <p>Quét mã QR để thanh toán</p>
            <img src="<?php echo $qrCodeImage; ?>" alt="QR Code">
            <p>Số tiền cần thanh toán: <?php echo $amountToPay; ?></p>
        </div>
    </div>
</div>

<?php
include("inc/bottom.php");
?>

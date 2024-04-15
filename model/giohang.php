<?php

// Tạo mảng SESSION giohang rỗng nếu nó không tồn tại
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}

// Hàm thêm sản phẩm vào giỏ
// Hàm kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
function kiemtraTonTaiTrongGio($id)
{
    return isset($_SESSION['giohang'][$id]);
}

// Hàm hiển thị thông báo
function hienthiThongBao($message)
{
    echo '<script>alert("' . $message . '");</script>';
}

// Thêm sản phẩm vào giỏ hàng
function themhangvaogio($id, $soluong)
{
    if (!kiemtraTonTaiTrongGio($id)) {
        $_SESSION['giohang'][$id] = round($soluong, 0);
    } else {
        hienthiThongBao("Khoá học này bạn đã đăng ký rồi!");
    }
}


// Cập nhật số lượng của giỏ hàng
function capnhatsoluong($id, $soluong)
{
    if (isset($_SESSION['giohang'][$id])) {
        $_SESSION['giohang'][$id] = round($soluong, 0);
    }
}

// Xóa một sản phẩm trong giỏ hàng
function xoa1khoahoc($id)
{
    if (isset($_SESSION['giohang'][$id])) {
        unset($_SESSION['giohang'][$id]);
    }
}

function laygiohang()
{
    //Tạo mảng rỗng để lưu danh sách sản phẩm trong giỏ
    $mh = array();
    $mh_db = new KHOAHOC();

    // Kiểm tra xem $_SESSION['giohang'] đã được khởi tạo và có giá trị không
    if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
        //Duyệt mảng SESSION giohang và lấy từng id sản phẩm cùng số lượng


        foreach ($_SESSION['giohang'] as $id => $soluong) {
            // Gọi hàm lấy thông tin của sản phẩm theo mã sản phẩm
            $m = $mh_db->laykhoahoctheoid($id);
        
            // Kiểm tra xem $m có dữ liệu hợp lệ không
            if ($m !== false) {
                $dongia = $m['phi'];
                $solg = intval($soluong);
                // Tính tiền
                $thtien = round($dongia * $soluong, 2);
                // Lưu thông tin trong mảng items để hiển thị lên giỏ hàng
                $mh[$id]['tenkhoahoc'] = $m['tenkhoahoc'];
                $mh[$id]['hinhanh'] = $m['hinhanh'];
                $mh[$id]['phi'] = $dongia;
                $mh[$id]['soluong'] = $solg;
                $mh[$id]['thanhtien'] = $thtien;
            }
        }
        return $mh;
    }
}

// Đếm số sản phẩm trong giỏ hàng
function demhangtronggio()
{
    return count($_SESSION['giohang']);
}

// Đếm tổng số lượng các sản phẩm trong giỏ
function demsoluongtronggio()
{
    $tongsl = 0;
    //Lấy mảng các sản phẩm từ trong SESSION
    $giohang = laygiohang();
    foreach ($giohang as $item) {
        $tongsl += $item['soluong'];
    }
    return $tongsl;
}

// Tính tổng thành tiền trong giỏ hàng
function tinhtiengiohang()
{
    $tong = 0;
    $giohang = laygiohang();
    foreach ($giohang as $mh) {
        $tong += $mh['phi'] * $mh['soluong'];
    }
    return $tong;
}

// Xóa tất cả giỏ hàng
function xoagiohang()
{
    $_SESSION['giohang'] = array();
}

<?php
include "../../html_backend/orderClass.php"; 

// Tạo một instance của lớp orderClass
$orderClass = new orderClass();

// Kiểm tra nếu mã đơn hàng được cung cấp
if (isset($_GET['ma_donhang'])) {
    $order_id = $_GET['ma_donhang'];

    // Cập nhật trạng thái đơn hàng thành 'Đã hủy'
    $updateStatus = $orderClass->update_OrderStatus($order_id, 'Đã hủy');

    if ($updateStatus) {
        echo "Đơn hàng đã được hủy thành công!";
        header("Location: quanlydonhang.php"); // Chuyển hướng về trang danh sách đơn hàng
    } else {
        echo "Lỗi trong quá trình hủy đơn hàng.";
    }
}
?>

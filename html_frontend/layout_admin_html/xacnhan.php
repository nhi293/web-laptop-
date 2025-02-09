<?php
include "../../html_backend/orderClass.php"; // Include your orderClass to fetch data

// Create an instance of the orderClass
$orderClass = new orderClass();

// Check if the form is submitted
if (isset($_POST['ma_donhang'])) {
    $order_id = $_POST['ma_donhang'];

    // Update the order status to 'Đã xác nhận'
    $updateStatus = $orderClass->update_OrderStatus($order_id, 'Đã xác nhận');

    if ($updateStatus) {
        echo "Đơn hàng đã được xác nhận thành công!";
        header("Location: quanlydonhang.php"); // Redirect back to the order list page
    } else {
        echo "Lỗi trong quá trình xác nhận đơn hàng.";
    }
}
?>

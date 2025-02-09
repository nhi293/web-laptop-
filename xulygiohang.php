<?php
session_start();
include './html_backend/database.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.";
    exit;
}

// Lấy ID người dùng đăng nhập
$dangnhap_id = $_SESSION['user_id'];

// Lấy ID sản phẩm từ URL
if (isset($_GET['maytinh_id'])) {
    $maytinh_id = $_GET['maytinh_id'];

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $sql = "SELECT * FROM giohang WHERE dangnhap_id = ? AND maytinh_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $dangnhap_id, $maytinh_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        $sql = "UPDATE giohang SET so_luong = so_luong + 1 WHERE dangnhap_id = ? AND maytinh_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $dangnhap_id, $maytinh_id);
        $stmt->execute();
        echo "Sản phẩm đã được thêm vào giỏ hàng.";
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
        $sql = "INSERT INTO giohang (dangnhap_id, maytinh_id, so_luong) VALUES (?, ?, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $dangnhap_id, $maytinh_id);
        $stmt->execute();
        echo "Sản phẩm đã được thêm vào giỏ hàng.";
    }
} else {
    echo "Không có sản phẩm để thêm vào giỏ hàng.";
}

$conn->close();
?>

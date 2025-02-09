<?php
include '../../html_backend/productClass.php';
$productClass = new productClass();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Gọi phương thức xóa sản phẩm từ lớp productClass
    $result = $productClass->delete_product($id);

    // Kiểm tra kết quả trả về và thông báo
    if ($result) {
        // Nếu xóa thành công, chuyển hướng về trang danh sách sản phẩm
        header('Location: products_list.php?message=Xóa sản phẩm thành công');
        exit();
    } else {
        // Nếu có lỗi, chuyển hướng về trang danh sách sản phẩm với thông báo lỗi
        header('Location: products_list.php?message=Lỗi khi xóa sản phẩm');
        exit();
    }
}
?>

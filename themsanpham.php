<?php
include 'config.php';
include 'database.php';

// Khởi tạo đối tượng Database
$Database = new Database;

// Lấy kết nối `mysqli` từ đối tượng Database
$conn = $Database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];                  // Lấy tên sản phẩm
    $category = $_POST['categories'];        // Lấy danh mục
    $stock = (int)$_POST['stock'];           // Lấy số lượng tồn kho
    $price = (float)$_POST['price'];         // Lấy giá sản phẩm
    $man_hinh = $_POST['man_hinh'];          // Lấy thông tin màn hình
    $cpu = $_POST['cpu'];                    // Lấy thông tin CPU
    $ram = $_POST['ram'];                    // Lấy thông tin RAM
    $luu_tru = $_POST['luu_tru'];            // Lấy thông tin lưu trữ
    $pin = $_POST['pin'];                    // Lấy thông tin pin
    $image = 'image';

    // Xử lý upload ảnh
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'upload/'; // Thư mục lưu ảnh
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa tồn tại
        }
        $image = $uploadDir . basename($_FILES['product_image']['name']);
        move_uploaded_file($_FILES['product_image']['tmp_name'], $image); // Lưu ảnh
    }

    // Lưu dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO products (image, name, category, stock, price, man_hinh, cpu, ram, luu_tru, pin) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssdisssss', $image, $name, $category, $stock, $price, $man_hinh, $cpu, $ram, $luu_tru, $pin);

    if ($stmt->execute()) {
        echo "Thêm sản phẩm thành công!";
        header('Location: /html_frontend/layout_admin_html/products_list.php');
        exit; // Đảm bảo dừng xử lý sau khi redirect
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>

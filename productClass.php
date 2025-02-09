<?php 
include "database.php";
class productClass{
    public $Database;


 public function __construct()
 {
    
    $this->Database = new Database;
}
public function insert_product() {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $category = $_POST['categories'];
    $stock = (int)$_POST['stock'];
    $price = (float)$_POST['price'];
    $man_hinh = $_POST['man_hinh']; 
    $cpu = $_POST['cpu'];          
    $ram = $_POST['ram'];          
    $luu_tru = $_POST['luu_tru'];   
    $pin = $_POST['pin'];           
    $image = 'image'; 

    // Xử lý upload ảnh
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Thư mục lưu ảnh
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa tồn tại
        }
        $image = $uploadDir . basename($_FILES['product_image']['name']);
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $image)) {
            // Nếu upload thành công, tiếp tục xử lý
            echo "Ảnh đã được tải lên thành công.<br>";
        } else {
            echo "Không thể tải lên ảnh.<br>";
            return false;
        }
    } else {
        echo "Không có ảnh nào được tải lên hoặc có lỗi xảy ra.<br>";
        return false;
    }

    // Chuẩn bị câu lệnh SQL với các tham số
    $conn = $this->Database->conn;
    $sql = "INSERT INTO products (image, name, category, stock, price, man_hinh, cpu, ram, luu_tru, pin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Kiểm tra nếu chuẩn bị câu lệnh thất bại
    if (!$stmt) {
        echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
        return false;
    }

    // Gán các tham số vào câu lệnh SQL
    $stmt->bind_param('sssdiissss', $image, $name, $category, $stock, $price, $man_hinh, $cpu, $ram, $luu_tru, $pin);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo "Thêm sản phẩm thành công!";
        return true;
    } else {
        echo "Lỗi: " . $stmt->error;
        return false;
    }

    // Đóng câu lệnh chuẩn bị
    $stmt->close();

}
public function select_product_All() {
    $sql = "SELECT * FROM products";
    $result = $this->Database->selectAll($sql); // Giả sử selectAll trả về danh sách kết quả
    return $result;
}
public function select_product($id) {
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $this->Database->select($sql);
    
    // Kiểm tra nếu truy vấn không trả về kết quả
    if (!$result) {
        return null; // Trả về null nếu không tìm thấy sản phẩm
    }

    return $result->fetch_assoc(); // Trả về kết quả dưới dạng mảng
}

public function update_product($id) {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $category = $_POST['categories'];
    $stock = (int)$_POST['stock'];
    $price = (float)$_POST['price'];

    // Kết nối tới cơ sở dữ liệu
    $conn = $this->Database->conn;
    $image = null; // Mặc định không thay đổi ảnh

    // Kiểm tra nếu có ảnh mới tải lên
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Thư mục lưu ảnh
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa tồn tại
        }

        $image_name = basename($_FILES['new_image']['name']);
        $target_path = $uploadDir . $image_name;

        // Di chuyển ảnh mới vào thư mục lưu trữ
        if (move_uploaded_file($_FILES['new_image']['tmp_name'], $target_path)) {
            // Cập nhật ảnh nếu tải lên thành công
            $image = $target_path;
        } else {
            echo "Không thể tải lên ảnh mới.<br>";
            return false;
        }
    } else {
        // Nếu không có ảnh mới, giữ nguyên ảnh cũ
        $query = "SELECT image FROM products WHERE id = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
            return false;
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($image);
        $stmt->fetch();
        $stmt->close();
    }

    // Cập nhật sản phẩm dựa trên ID
    $sql = "UPDATE products SET name = ?, category = ?, stock = ?, price = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Kiểm tra nếu chuẩn bị câu lệnh thất bại
    if (!$stmt) {
        echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
        return false;
    }

    // Gán các tham số vào câu lệnh SQL
    // Nếu không có ảnh mới, dùng giá trị ảnh cũ
    $stmt->bind_param('ssidsi', $name, $category, $stock, $price, $image, $id);

    // Thực hiện câu lệnh cập nhật
    $result = $stmt->execute();

    if ($result) {
        echo "Cập nhật sản phẩm thành công!";
    } else {
        echo "Lỗi khi cập nhật sản phẩm: " . $stmt->error;
    }

    // Đóng prepared statement
    $stmt->close();
    header('Location: /html_frontend/layout_admin_html/products_list.php');
}

public function delete_product($id) {
    // Sử dụng Database->conn thay vì $this->conn
    $conn = $this->Database->conn;
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
public function select_product_Acer() {
    $sql = "SELECT * FROM products WHERE category = 'Acer'";
    $result = $this->Database->selectAll($sql); // Giả sử selectAll trả về danh sách kết quả
    return $result;
}
public function select_product_Apple(){
    $sql = "SELECT * FROM products WHERE category = 'Apple'";
    $result = $this ->Database->selectAll($sql);
    return $result;

}
public function select_product_Asus(){
    $sql = "SELECT * FROM products WHERE category = 'Asus'";
    $result = $this ->Database->selectAll($sql);
    return $result;

}
public function select_product_HP(){
    $sql = "SELECT * FROM products WHERE category = 'Hp'";
    $result = $this ->Database->selectAll($sql);
    return $result;
}
public function select_product_Lenovo(){
    $sql = "SELECT * FROM products WHERE category = 'Lenovo'";
    $result = $this ->Database->selectAll($sql);
    return $result;
}


    }
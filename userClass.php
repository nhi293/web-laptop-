<?php 
include "database.php";
class userClass{
    public $Database;


 public function __construct()
 {
    
    $this->Database = new Database;
}
public function select_user_All() {
    $sql = "SELECT * FROM dangnhap";
    $result = $this->Database->selectAll($sql); // Giả sử selectAll trả về danh sách kết quả
    return $result;
}
public function select_user($id) {
    $sql = "SELECT * FROM dangnhap WHERE id = '$id'";
    $result = $this->Database->select($sql);
    
    // Kiểm tra nếu truy vấn không trả về kết quả
    if (!$result) {
        return null; // Trả về null nếu không tìm thấy sản phẩm
    }

    return $result->fetch_assoc(); // Trả về kết quả dưới dạng mảng
}
public function update_user($id) {
    // Lấy và kiểm tra dữ liệu đầu vào
    $email = trim($_POST['email']);
    $nguoi_dung = trim($_POST['nguoi_dung']);
    $mat_khau = trim($_POST['mat_khau']);
    $vai_tro = (int)$_POST['vai_tro'];

    // Kiểm tra xem các trường bắt buộc đã được điền chưa
    if (empty($email) || empty($nguoi_dung) || empty($mat_khau)) {
        return "Please fill all required fields.";
    }

    // Bỏ qua việc băm mật khẩu và lưu trữ dưới dạng văn bản thuần túy
    $plain_password = $mat_khau;

    // SQL query to update user
    $sql = "UPDATE dangnhap SET 
                email = ?, 
                nguoi_dung = ?, 
                mat_khau = ?, 
                vai_tro = ? 
            WHERE id = ?";

   // Sử dụng các câu lệnh đã chuẩn bị để ngăn chặn SQL injection
    $stmt = $this->Database->conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssii", $email, $nguoi_dung, $plain_password, $vai_tro, $id);

        // Thực hiện và kiểm tra thành công
        if ($stmt->execute()) {
            $stmt->close();
            return "User updated successfully.";
        } else {
            $stmt->close();
            return "Error updating user: " . $this->Database->conn->error;
        }
    } else {
        return "Error preparing statement: " . $this->Database->conn->error;
    }
}
public function delete_user($id) {
    // Sử dụng Database->conn thay vì $this->conn
    $conn = $this->Database->conn;
    $sql = "DELETE FROM dangnhap WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
}
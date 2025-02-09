<?php
function checkuser($username, $password) {
    // Thông tin kết nối cơ sở dữ liệu
    $servername = "localhost";  
    $dbname = "doan_web";  
    $dbuser = "root";      // Tên người dùng MySQL (thay thế với thông tin thực tế)
    $dbpass = "";          // Mật khẩu MySQL (thay thế với thông tin thực tế)
    $port = 3306;          // Sử dụng cổng 3307

    try {
        // Tạo kết nối PDO đến cơ sở dữ liệu với cổng cụ thể
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Truy vấn để tìm tài khoản với tên đăng nhập tương ứng
        $stmt = $conn->prepare("SELECT * FROM dangnhap WHERE nguoi_dung = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Lấy thông tin người dùng nếu tồn tại
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra mật khẩu và trả về thông tin người dùng nếu đúng
        if ($user && $user['mat_khau'] === $password) {
            return $user; // Trả về thông tin người dùng
        } else {
            return null; // Trả về null nếu sai thông tin đăng nhập
        }
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL: " . $e->getMessage();
        return null;
    }
}
?>

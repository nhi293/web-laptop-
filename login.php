
<?php
session_start();
require_once 'user.php'; // Tệp này chứa hàm checkuser()

// Kiểm tra nếu người dùng gửi yêu cầu đăng nhập
if (isset($_POST['dangnhap'])) {
    $username = trim($_POST['user'] ?? ''); // Lấy tên người dùng, loại bỏ khoảng trắng thừa
    $password = trim($_POST['pass'] ?? ''); // Lấy mật khẩu, loại bỏ khoảng trắng thừa

    // Gọi hàm kiểm tra thông tin đăng nhập
    $user = checkuser($username, $password);

    // Kiểm tra kết quả trả về từ hàm checkuser()
    if ($user && is_array($user) && count($user) > 0) {
        // Trích xuất thông tin từ kết quả truy vấn
        $id = $user['id'];
        $nguoi_dung = $user['nguoi_dung'];
        $vai_tro = $user['vai_tro'];

        // Lưu thông tin vào session
        $_SESSION['user_id'] = $id;            // ID người dùng
        $_SESSION['username'] = $nguoi_dung;  // Tên người dùng
        $_SESSION['role'] = $vai_tro;         // Vai trò

        // Chuyển hướng dựa trên vai trò
        if ($vai_tro == 1) { // Vai trò admin
            header('Location: /html_frontend/layout_admin_html/quanlydonhang.php');
            exit;
        } elseif ($vai_tro == 0) { // Vai trò người dùng
            header('Location: /trangchu.php');
            exit;
        }
    } else {
        // Nếu không tìm thấy tài khoản hoặc thông tin đăng nhập sai
        $tb = "Tài khoản này không tồn tại hoặc mật khẩu không đúng!";
    }
}
?>
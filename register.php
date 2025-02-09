<?php
// Kết nối cơ sở dữ liệu
$host = 'localhost';
$db = 'doan_web';
$user = 'root';
$pass = '';
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ form
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $nguoi_dung = isset($_POST['nguoi_dung']) ? trim($_POST['nguoi_dung']) : '';
    $mat_khau = isset($_POST['mat_khau']) ? trim($_POST['mat_khau']) : '';

    // Kiểm tra dữ liệu không được để trống
    if (empty($email) || empty($nguoi_dung) || empty($mat_khau)) {
        echo "Vui lòng điền đầy đủ thông tin!";
        exit;
    }

    // Kiểm tra email có tồn tại trong database hay không
    $stmt = $conn->prepare("SELECT COUNT(*) FROM dangnhap WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $emailExists = $stmt->fetchColumn();

    if ($emailExists) {
        echo "Email đã tồn tại!";
        exit;
    }

    // Lưu thông tin vào database
    $stmt = $conn->prepare("INSERT INTO dangnhap (email, nguoi_dung, mat_khau) VALUES (:email, :nguoi_dung, :mat_khau)");
    try {
        $stmt->execute([
            'email' => $email,
            'nguoi_dung' => $nguoi_dung,
            'mat_khau' => $mat_khau,
        ]);

        echo "Đăng ký thành công!";
        header("Location: /trangchu.php"); // Chuyển hướng tới trang chủ sau khi đăng ký thành công
        exit;
    } catch (PDOException $e) {
        echo "Lỗi khi đăng ký: " . $e->getMessage();
    }
}
?>

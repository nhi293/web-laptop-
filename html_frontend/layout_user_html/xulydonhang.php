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

// Kiểm tra nếu form được gửi bằng phương thức POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $ho_ten = $_POST['hoten'] ?? '';
    $dia_chi = $_POST['diachi'] ?? '';
    $email = $_POST['email'] ?? '';
    $dien_thoai = $_POST['dienthoai'] ?? '';
    $tong_tien = $_POST['tong_tien'] ?? 0; // Tổng tiền đơn hàng
    $trang_thai = 'Chờ xử lý'; // Trạng thái mặc định

    // Lấy danh sách sản phẩm
    $product_ids = $_POST['product_id'] ?? [];
    $product_names = $_POST['product_name'] ?? [];
    $quantities = $_POST['quantity'] ?? [];
    $prices = $_POST['price'] ?? [];



    // Kiểm tra dữ liệu đơn hàng
    if (empty($ho_ten) || empty($dia_chi) || empty($email) || empty($dien_thoai)) {
        die("Vui lòng nhập đầy đủ thông tin!");
    }

    try {
        // Bắt đầu giao dịch
        $conn->beginTransaction();

        // Thêm đơn hàng vào bảng donhang
        $sqlDonHang = "INSERT INTO donhang (ho_ten, dia_chi, email, dien_thoai, tong_tien, trang_thai) 
                       VALUES (:ho_ten, :dia_chi, :email, :dien_thoai, :tong_tien, :trang_thai)";
        $stmtDonHang = $conn->prepare($sqlDonHang);
        $stmtDonHang->execute([
            ':ho_ten' => $ho_ten,
            ':dia_chi' => $dia_chi,
            ':email' => $email,
            ':dien_thoai' => $dien_thoai,
            ':tong_tien' => $tong_tien,
            ':trang_thai' => $trang_thai
        ]);

        // Lấy ID đơn hàng vừa thêm
        $ma_donhang = $conn->lastInsertId();

        // Thêm chi tiết đơn hàng vào bảng chitiet_donhang
        $sqlChiTiet = "INSERT INTO chitiet_donhang (ma_donhang, product_id, ten_san_pham, so_luong, gia, tong) 
                       VALUES (:ma_donhang, :product_id, :ten_san_pham, :so_luong, :gia, :tong)";

        $stmtChiTiet = $conn->prepare($sqlChiTiet);

        foreach ($product_ids as $index => $product_id) {
            $tong = $prices[$index] * $quantities[$index];
            $stmtChiTiet->execute([
                ':ma_donhang' => $ma_donhang,
                ':product_id' => $product_id,
                ':ten_san_pham' => $product_names[$index],
                ':so_luong' => $quantities[$index],
                ':gia' => $prices[$index],
                ':tong' => $tong,
            ]);
            $productid =$product_id;
        }
        // echo $productid;
        // Lấy ID người dùng (giả sử đã có session hoặc xác thực người dùng)
        session_start();
        // $id = $_SESSION['id']; // Lấy ID người dùng từ session
        $id =  $_SESSION['user_id'];
       
        // Xóa sản phẩm khỏi giỏ hàng
        $query = "DELETE FROM giohang WHERE dangnhap_id = ? AND maytinh_id = ?";
        $stmt = $conn->prepare($query);
        
        // Xác định các biến trước khi sử dụng
        $stmt->bindParam(1, $id, PDO::PARAM_INT); // $id là kiểu số nguyên (integer)
        $stmt->bindParam(2, $productid, PDO::PARAM_INT); // $productid là kiểu số nguyên (integer)
        
        // Thực thi câu lệnh SQL
        $stmt->execute();
        
        // Hoàn tất giao dịch
        $conn->commit();

        // Chuyển hướng về trang giohang.php
        header("Location: /giohang.php");
        exit();

        echo "Đơn hàng và chi tiết đơn hàng đã được thêm thành công!";
    } catch (PDOException $e) {
        // Hủy giao dịch nếu xảy ra lỗi
        $conn->rollBack();
        echo "Lỗi khi thêm đơn hàng: " . $e->getMessage();
    }
}
?>

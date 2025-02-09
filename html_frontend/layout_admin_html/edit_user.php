<?php 
include '../../html_backend/userClass.php';
$userClass = new userClass;
$get_user = []; 


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $get_user = $userClass->select_user($id); 
        
        
        if (!$get_user) {
            echo "<p class='text-danger'>Không tìm thấy người dùng với ID: " . htmlspecialchars($id) . "</p>";
        }
    } else {
        echo "<p class='text-danger'>ID người dùng không tồn tại.</p>";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $update_result = $userClass->update_user($id); 
        
        
        header('Location: quanlyuser.php');
        exit(); 
    }
}
?>


<!-- <?php 
$selectAll = $userClass->select_user_All();
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Chỉnh sửa người dùng</title>
</head>
<body>
    <div class="container mt-4">
        <h3 class="title-page">Sửa thông tin người dùng</h3>
        <form class="editUser" action="" method="POST">
            <!-- Nhập email -->
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" 
                    value="<?php echo isset($get_user['email']) ? htmlspecialchars($get_user['email']) : ''; ?>" 
                    id="email" placeholder="Nhập email" required>
            </div>

            <!-- Nhập tên người dùng -->
            <div class="form-group mb-3">
                <label for="nguoi_dung">Tên người dùng:</label>
                <input type="text" class="form-control" name="nguoi_dung" 
                    value="<?php echo isset($get_user['nguoi_dung']) ? htmlspecialchars($get_user['nguoi_dung']) : ''; ?>" 
                    id="nguoi_dung" placeholder="Nhập tên người dùng" required>
            </div>

            <!-- Nhập mật khẩu -->
            <div class="form-group mb-3">
                <label for="mat_khau">Mật khẩu:</label>
                <input type="password" class="form-control" name="mat_khau" 
                    id="mat_khau" placeholder="Nhập mật khẩu mới (để trống nếu không đổi)">
            </div>

            <!-- Chọn vai trò -->
            <div class="form-group mb-3">
                <label for="vai_tro">Vai trò:</label>
                <select name="vai_tro" id="vai_tro" class="form-control">
                    <option value="1" <?php echo isset($get_user['vai_tro']) && $get_user['vai_tro'] == 1 ? 'selected' : ''; ?>>Admin</option>
                    <option value="0" <?php echo isset($get_user['vai_tro']) && $get_user['vai_tro'] == 0 ? 'selected' : ''; ?>>User</option>
                </select>
            </div>

            <!-- Nút submit -->
            <div class="form-group mt-3">
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật người dùng</button>
            </div>
        </form>
    </div>
    <script>
        new DataTable('#example');
    </script>
</body>
</html>

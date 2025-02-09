<?php 
include '../../html_backend/userClass.php';
$userClass = new userClass;
// Fetch data from the database
$result = $userClass->select_user_All(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Quản Lý Thành Viên</title>
</head>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <nav class="sidebar bg-primary">
                <ul>
                   
                    <li><a href="quanlydonhang.php"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản lí đơn hàng</a></li>
                    <li><a href="quanlyuser.php"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí Thành Viên</a></li>
                    <li><a href="products_list.php"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a></li>
                    <li><a href="/login.html"><i class="fa-solid fa-house ico-side"></i>Đăng xuất</a></li>
                </ul>
            </nav>

            <div class="main-content">
                <h3 class="title-page">Quản lí Thành Viên</h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Người Dùng</th>
                            <th>Vai Trò</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-center"><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nguoi_dung']); ?></td>
                                    <td class="text-center"><?php echo $row['vai_tro'] == 1 ? 'Admin' : 'User'; ?></td>
                                    <td class="text-center">
                                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm me-2">
                                            <i class="fa-solid fa-pen-to-square"></i> Sửa
                                        </a>
                                        <!-- Form xử lý xóa người dùng -->
                                        <form action="delete_user.php" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">Không có thành viên nào.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>
</html>

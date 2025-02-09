<?php
session_start();
require_once './html_backend/database.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "Bạn cần đăng nhập để xem giỏ hàng.";
    exit;
}

// Lấy ID người dùng từ session
$dangnhap_id = $_SESSION['user_id'];

// Kết nối cơ sở dữ liệu
$db = new Database();
$conn = $db->getConnection();

// Truy vấn giỏ hàng của người dùng
$sql = "SELECT giohang.*, products.name, products.price, products.image 
        FROM giohang 
        JOIN products ON giohang.maytinh_id = products.id 
        WHERE giohang.dangnhap_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $dangnhap_id);
$stmt->execute();
$result = $stmt->get_result();

// Tính tổng giá trị giỏ hàng
$subtotal = 0;

// Nếu có yêu cầu thêm sản phẩm vào giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['product_id'])) {
    $maytinh_id = $_GET['product_id']; // Lấy ID sản phẩm
    $so_luong = 1; // Mặc định số lượng là 1

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $sql_check = "SELECT * FROM giohang WHERE dangnhap_id = ? AND maytinh_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ii", $dangnhap_id, $maytinh_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
    if ($result_check->num_rows > 0) {
        $sql_update = "UPDATE giohang SET so_luong = so_luong + ? WHERE dangnhap_id = ? AND maytinh_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("iii", $so_luong, $dangnhap_id, $maytinh_id);
        $stmt_update->execute();
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
        $sql_insert = "INSERT INTO giohang (dangnhap_id, maytinh_id, so_luong) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("iii", $dangnhap_id, $maytinh_id, $so_luong);
        $stmt_insert->execute();
    }

    // Chuyển hướng về trang giỏ hàng
    header("Location: giohang.php");
    exit;
}

// Nếu có yêu cầu xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['product_id'])) {
    $maytinh_id = $_GET['product_id']; // Lấy ID sản phẩm

    // Xóa sản phẩm khỏi giỏ hàng
    $sql_remove = "DELETE FROM giohang WHERE dangnhap_id = ? AND maytinh_id = ?";
    $stmt_remove = $conn->prepare($sql_remove);
    $stmt_remove->bind_param("ii", $dangnhap_id, $maytinh_id);
    $stmt_remove->execute();

    // Chuyển hướng lại trang giỏ hàng
    header("Location: giohang.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="css/crat-items-details.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <style>
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: rgb(242, 104, 59);
            padding: 10px 0;
        }

        .cart-container {
            margin-top: -20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .cart-container {
            overflow-x: auto;
            padding: 20px;
        }

        .remove-btn {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }

        .remove-btn:hover {
            text-decoration: underline;
        }

        .checkout-btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: bold;
        }

        .checkout-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .checkout-btn:active {
            background-color: #1e7e34;
            transform: scale(0.95);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <a href="trangchu.php" class="logo"><img src="img/logonew1.png" alt="Logo" /></a>
        <ul class="navmenu">
            <li><a href="trangchu.php">Trang Chủ</a></li>
            <li><a href="#">Danh Mục</a>
                <ul>
                    <li><a href="Acer.php">Acer</a></li>
                    <li><a href="Asus.php">Asus</a></li>
                    <li><a href="Apple.php">Apple</a></li>
                    <li><a href="Lenovo.php">Lenovo</a></li>
                    <li><a href="HP.php">HP</a></li>
                </ul>
            </li>
            <li><a href="contactus.html">Liên Hệ</a></li>
            <li><a href="docs.html">Tài Liệu</a></li>
        </ul>
        <div class="nav-icon">
            <a href=""><i class="bx bx-search"></i></a>
            <a href="login.html"><i class="bx bx-user"></i></a>
            <a href="giohang.php"><i class="bx bx-cart"></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <!-- Giỏ hàng -->
    <div class="cart-container">
        <h2>Giỏ Hàng</h2>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <img src="./html_backend/<?php echo $row['image']; ?>" alt="Product Image" width="50">
                                <?php echo htmlspecialchars($row['name']); ?>
                            </td>
                            <td><?php echo $row['so_luong']; ?></td>
                            <td>$<?php echo number_format($row['price'], 2); ?></td>
                            <td>$<?php echo number_format($row['price'] * $row['so_luong'], 2); ?></td>
                            <td>
                                <a href="giohang.php?action=remove&product_id=<?php echo $row['maytinh_id']; ?>" class="remove-btn">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <!-- Form gửi từng sản phẩm -->
                            <td colspan="5">
                                <form action="./html_frontend/layout_user_html/donhang.php" method="POST">
                                    <input type="hidden" name="product_id[]" value="<?php echo $row['maytinh_id']; ?>">
                                    <input type="hidden" name="product_name[]" value="<?php echo htmlspecialchars($row['name']); ?>">
                                    <input type="hidden" name="quantity[]" value="<?php echo $row['so_luong']; ?>">
                                    <input type="hidden" name="price[]" value="<?php echo $row['price']; ?>">
                                    <input type="hidden" name="image[]" value="<?php echo $row['image'];?>">
                                    <button type="submit" class="checkout-btn">Thanh toán sản phẩm này</button>
                                </form>
                            </td>
                        </tr>
                        <?php $subtotal += $row['price'] * $row['so_luong']; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <p><strong>Tổng cộng: </strong>$<?php echo number_format($subtotal, 2); ?></p>
        <?php else: ?>
            <p>Giỏ hàng của bạn hiện tại đang trống.</p>
        <?php endif; ?>



    </div>

</body>

</html>

<?php
$conn->close();
?>
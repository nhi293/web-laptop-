<?php
include "../../html_backend/orderClass.php"; // Kết nối tệp orderClass để lấy dữ liệu

// Tạo một đối tượng từ lớp orderClass
$orderClass = new orderClass();

// Kiểm tra nếu mã đơn hàng được truyền qua URL
if (isset($_GET['ma_donhang'])) {
    $order_id = $_GET['ma_donhang'];

    // Lấy chi tiết đơn hàng từ cơ sở dữ liệu
    $orderItems = $orderClass->getOrderItems($order_id); // Lấy danh sách sản phẩm trong đơn hàng

    // Kiểm tra xem đơn hàng có tồn tại không
    if ($orderItems) {
        // Danh sách sản phẩm trong đơn hàng được lấy thành công
    } else {
        echo "Không tìm thấy đơn hàng.";
        exit; // Thoát chương trình nếu không tìm thấy đơn hàng
    }
} else {
    echo "Mã đơn hàng không hợp lệ.";
    exit; // Thoát chương trình nếu không có mã đơn hàng hợp lệ
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <style>
        /* Tùy chỉnh lại kiểu chữ và padding cho các phần */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .page-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .table tr td {
            padding: 15px;
        }

        h3, h4 {
            color: #343a40;
        }

        .back-btn {
            margin-top: 20px;
            display: block;
            width: 150px;
            margin: 30px auto;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Chi tiết đơn hàng - Mã: <?php echo $order_id; ?></h3>
        
        <h4>Chi tiết sản phẩm trong đơn hàng</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($orderItems) {
                    foreach ($orderItems as $item) {
                        echo "<tr>";
                        echo "<td>{$item['ten_san_pham']}</td>";
                        echo "<td>{$item['so_luong']}</td>";
                        echo "<td>" . number_format($item['gia'], 0, ',', '.') . " $</td>";
                        echo "<td>" . number_format($item['tong'], 0, ',', '.') . " $</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Không có sản phẩm nào trong đơn hàng này.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="quanlydonhang.php" class="btn btn-primary">Quay lại</a>
    </div>
</body>
</html>

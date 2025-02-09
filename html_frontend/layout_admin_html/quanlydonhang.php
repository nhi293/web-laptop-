<?php
include "../../html_backend/orderClass.php"; // Include your orderClass to fetch data

// Create an instance of the orderClass
$orderClass = new orderClass();

// Fetch all orders from the database
$orders = $orderClass->select_order_All();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Quản lý đơn hàng</title>
</head>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <nav class="sidebar bg-primary">
                <ul>
                    <li>
                        <a href="quanlydonhang.php"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản lí đơn hàng</a>
                    </li>
                    <li>
                        <a href="quanlyuser.php"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí Thành Viên</a>
                    </li>
                    <li>
                        <a href="products_list.php"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
                    </li>
                    <li>
                        <a href="/login.html"><i class="fa-solid fa-house ico-side"></i> Đăng xuất</a>
                    </li>
                </ul>
            </nav>
            <div class="main-content">
                <h3 class="title-page">
                    Quản lí đơn hàng
                </h3>
              
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th> <!-- Thêm cột hành động -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the orders and display them in the table
                        if ($orders) {
                            foreach ($orders as $order) {
                                echo "<tr>";
                                echo "<td>{$order['ma_donhang']}</td>";
                                echo "<td>{$order['ho_ten']}</td>";
                                echo "<td>{$order['dia_chi']}</td>";
                                echo "<td>{$order['dien_thoai']}</td>";
                                echo "<td>{$order['tong_tien']}</td>";
                                echo "<td>{$order['ngay_tao']}</td>";
                                echo "<td>{$order['trang_thai']}</td>";
                                echo "<td>
                                    <button class='btn btn-info btn-sm' onclick='viewOrderDetails({$order['ma_donhang']})'><i class='fa-solid fa-eye'></i> Xem chi tiết</button>
                                    <form action='xacnhan.php' method='POST' class='d-inline'>
                                        <input type='hidden' name='ma_donhang' value='{$order['ma_donhang']}' />
                                        <button type='submit' class='btn btn-warning btn-sm'><i class='fa-solid fa-pen'></i> Xác nhận</button>
                                    </form>
                                    <button class='btn btn-danger btn-sm' onclick='deleteOrder({$order['ma_donhang']})'><i class='fa-solid fa-trash'></i> Hủy</button>
                                  </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>Không có đơn hàng nào.</td></tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th> <!-- Thêm cột hành động -->
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        new DataTable('#example');

        function deleteOrder(orderId) {
            if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')) {
                // Code to delete the order (send to the backend)
                window.location.href = `delete_Order.php?ma_donhang=${orderId}`;
            }
        }

        function viewOrderDetails(orderid) {
            // Code to view order details (open in a modal or new page)
            window.location.href = `chitiet.php?ma_donhang=${orderid}`;
        }
    </script>
</body>

</html>

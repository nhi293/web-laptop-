<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Bảng hiển thị sản phẩm */
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .cart-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .cart-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .cart-table tr:hover {
            background-color: #f1f1f1;
        }

        .cart-table td {
            vertical-align: middle;
        }

        .cart-table img {
            width: 50px;
            margin-right: 10px;
        }

        .total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-submit {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="containerfull padd20">
        <div class="container">
            <div class="menu col8">
                <a href="/trangchu.php">TRANG CHỦ</a>
                <a href="gioithieu.html">GIỚI THIỆU</a>
                <a href="/Acer.php">SẢN PHẨM</a>
                <a href="/contactus.html">LIÊN HỆ</a>
            </div>
        </div>
    </div>
    <div class="containerfull">
        <div class="bgbanner">ĐƠN HÀNG</div>
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="col9 viewcart">
                <div class="ttdathang">
                    <h2>Thông tin người đặt hàng</h2>
                    <form action="/html_frontend/layout_user_html/xulydonhang.php" method="POST">
                        <!-- Họ tên -->
                        <label for="hoten"><b>Họ và tên</b></label>
                        <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" required>

                        <!-- Địa chỉ -->
                        <label for="diachi"><b>Địa chỉ</b></label>
                        <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>

                        <!-- Email -->
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Nhập email" name="email" id="email" required>

                        <!-- Điện thoại -->
                        <label for="dienthoai"><b>Điện thoại</b></label>
                        <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" required>

                        <!-- Danh sách sản phẩm -->
                        <h3>Danh sách sản phẩm</h3>
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php
                                // Lấy dữ liệu từ POST
                                $product_ids = $_POST['product_id'] ?? [];
                                $product_names = $_POST['product_name'] ?? [];
                                $quantities = $_POST['quantity'] ?? [];
                                $prices = $_POST['price'] ?? [];
                                $product_images = $_POST['image'] ?? [];
                                $subtotal = 0;

                                // Hiển thị từng sản phẩm
                                for ($i = 0; $i < count($product_ids); $i++):
                                    $total_price = $prices[$i] * $quantities[$i];
                                    $subtotal += $total_price;
                                ?>
                                    <tr>
                                        <td>
                                            <img src="../../html_backend/<?php echo $product_images[$i]; ?>" alt="Product Image">
                                            <?php echo htmlspecialchars($product_names[$i]); ?>
                                            <input type="hidden" name="product_id[]" value="<?php echo $product_ids[$i]; ?>">
                                            <input type="hidden" name="product_name[]" value="<?php echo htmlspecialchars($product_names[$i]); ?>">
                                        </td>
                                        <td>
                                            <?php echo $quantities[$i]; ?>
                                            <input type="hidden" name="quantity[]" value="<?php echo $quantities[$i]; ?>">
                                        </td>
                                        <td>
                                            $<?php echo number_format($prices[$i], 2); ?>
                                            <input type="hidden" name="price[]" value="<?php echo $prices[$i]; ?>">
                                        </td>
                                        <td>
                                            $<?php echo number_format($total_price, 2); ?>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>

                        </table>

                        <!-- Tổng thanh toán -->
                        <div class="total">
                            Tổng thanh toán: $<?php echo number_format($subtotal, 2); ?>
                            <!-- Truyền giá trị tổng tiền vào input ẩn -->
                            <input type="hidden" name="tong_tien" value="<?php echo $subtotal; ?>">
                        </div>

                        <!-- Nút Thanh toán -->
                        <button type="submit" class="btn-submit">Thanh toán</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="containerfull padd50">
        Copyright&copy;2024.LN
    </footer>
</body>

</html>
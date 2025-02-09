<?php
// Bao gồm file định nghĩa lớp Database
include 'html_backend/database.php';

// Khởi tạo đối tượng Database
$db = new Database();
$conn = $db->getConnection(); // Lấy kết nối cơ sở dữ liệu

// Kiểm tra và lấy ID sản phẩm từ URL
$product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;

if ($product_id > 0) {
    // Truy vấn thông tin sản phẩm bằng Prepared Statement
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id); // "i" đại diện cho kiểu dữ liệu integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $productDetails = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Product Details</title>
            <style>
                /* CSS code */
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                    color: #333;
                }

                h1 {
                    text-align: center;
                    font-size: 36px;
                    font-weight: bold;
                    color: #00FFFF;
                    margin-bottom: 20px;
                }

                #product-details {
                    max-width: 900px;
                    margin: 40px auto;
                    padding: 30px;
                    background: #fff;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    border-radius: 15px;
                }

                img {
                    display: block;
                    margin: 0 auto;
                    max-width: 100%;
                    height: auto;
                    border-radius: 10px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                table th, table td {
                    border: 1px solid #ddd;
                    padding: 8px 12px;
                    text-align: left;
                }

                table th {
                    background-color: #f4f4f4;
                }

                .button-group {
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    margin-top: 20px;
                }

                button {
                    background-color: #00FFFF;
                    color: white;
                    padding: 12px 30px;
                    font-size: 16px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                button:hover {
                    background-color: #0056b3;
                }

                button:active {
                    background-color: #003f7f;
                }

                @media (max-width: 768px) {
                    h1 {
                        font-size: 28px;
                    }

                    button {
                        font-size: 14px;
                        padding: 10px 20px;
                    }
                }
            </style>
        </head>

        <body>
            <div id="product-details">
                <h1><?php echo htmlspecialchars($productDetails['name']); ?></h1>
                <img src="./html_backend/<?php echo htmlspecialchars($productDetails['image']); ?>" alt="<?php echo htmlspecialchars($productDetails['name']); ?>">
                <p><strong>Giá:</strong> <?php echo htmlspecialchars(number_format($productDetails['price'])) . ' $'; ?></p>

                <p><strong>Thông số kỹ thuật:</strong></p>
                <table>
                    <tr>
                        <th>Màn hình</th>
                        <td><?php echo htmlspecialchars($productDetails['man_hinh']); ?></td>
                    </tr>
                    <tr>
                        <th>CPU</th>
                        <td><?php echo htmlspecialchars($productDetails['cpu']); ?></td>
                    </tr>
                    <tr>
                        <th>RAM</th>
                        <td><?php echo htmlspecialchars($productDetails['ram']); ?></td>
                    </tr>
                    <tr>
                        <th>Lưu trữ</th>
                        <td><?php echo htmlspecialchars($productDetails['luu_tru']); ?></td>
                    </tr>
                    <tr>
                        <th>Pin</th>
                        <td><?php echo htmlspecialchars($productDetails['pin']); ?></td>
                    </tr>
                </table>

                <div class="button-group">
                    <form action="giohang.php" method="get">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="<?php echo $productDetails['id']; ?>">
                        <button type="submit">Thêm vào giỏ hàng</button>
                    </form>
                    <button type="button" onclick="window.history.back()">Quay lại</button>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        echo '<p>Không tìm thấy sản phẩm.</p>';
    }
    $stmt->close(); // Đóng statement
} else {
    echo '<p>Không có sản phẩm được chọn.</p>';
}
$conn->close(); // Đóng kết nối cơ sở dữ liệu
?>

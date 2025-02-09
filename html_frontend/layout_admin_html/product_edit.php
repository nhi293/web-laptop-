<?php 
include '../../html_backend/productClass.php';
$productClass = new productClass;
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $get_product = $productClass->select_product($id);
    
        // Kiểm tra nếu không có sản phẩm
        if (!$get_product) {
            echo "Không tìm thấy sản phẩm với ID: " . htmlspecialchars($id);
            $get_product = []; // Khởi tạo mảng rỗng nếu không tìm thấy sản phẩm
        }
    } else {
        echo "ID sản phẩm không tồn tại.";
        $get_product = []; // Khởi tạo mảng rỗng nếu không có ID
    }
}
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $update_product = $productClass->update_product($id); 
    }
}
?>

<?php 
$selectAll = $productClass->select_product_All();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <title>Thêm Sản Phẩm</title>
</head>

<body>
    <div class="main-content">
        <h3 class="title-page">
            Sửa sản phẩm
        </h3>
        <form class="addPro" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <div class="custom-file">
                    <!-- Hiển thị ảnh cũ -->
                    <?php
                    $product_images_array = explode("*", $get_product['image']);
                    foreach ($product_images_array as $item) {
                        if (!empty($item)) {
                            echo "<img src='/html_backend/" . htmlspecialchars($item) . "' alt='Ảnh sản phẩm' style='max-width: 150px; margin-bottom: 10px;'>";
                        }
                    }
                    ?>
                    <!-- Input để chọn ảnh mới -->
                    <label for="new_image" class="btn btn-primary mt-2">Chọn ảnh mới</label>
                    <input type="file" name="new_image" id="new_image" class="custom-file-input" style="display: none;">
                </div>
            </div>

            <!-- Nhập tên sản phẩm -->
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $get_product['name'] ?>" id="name" placeholder="Nhập tên sản phẩm">
            </div>

            <!-- Nhập danh mục -->
            <div class="form-group">
                <label for="categories">Danh mục:</label>
                <input type="text" class="form-control" name="categories" value="<?php echo $get_product['category'] ?>" id="categories" placeholder="Nhập danh mục">
            </div>

            <!-- Nhập số lượng tồn kho -->
            <div class="form-group">
                <label for="stock">Số lượng tồn kho:</label>
                <input type="number" class="form-control" name="stock" value="<?php echo $get_product['stock'] ?>" id="stock" placeholder="Nhập số lượng tồn kho">
            </div>

            <!-- Nhập giá -->
            <div class="form-group">
                <label for="price">Giá:</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="price" value="<?php echo $get_product['price'] ?>" id="price" class="form-control" placeholder="Nhập giá gốc">
                </div>
            </div>

            <!-- Nút submit -->
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            </div>
        </form>
    </div>

    <script>
        new DataTable('#example');
    </script>
</body>

</html>

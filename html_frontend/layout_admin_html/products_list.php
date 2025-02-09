<?php 
include '../../html_backend/productClass.php';
$productClass = new productClass;
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
    <title>Danh Sách Sản Phẩm</title>
  </head>

  <body>
    <div class="container-fluid main-page">
      <div class="app-main">
        <nav class="sidebar bg-primary">
          <ul>
            <li><a href="quanlydonhang.php"><i class="fa-solid fa-cart-shopping ico-side"></i> Quản lí đơn hàng</a></li>
            <li><a href="quanlyuser.php"><i class="fa-solid fa-mug-hot ico-side"></i> Quản lí thành viên</a></li>
            <li><a href="products_list.php"><i class="fa-solid fa-mug-hot ico-side"></i> Quản lí sản phẩm</a></li>
            <li><a href="/login.html"><i class="fa-solid fa-house ico-side"></i> Đăng xuất</a></li>
          </ul>
        </nav>
        <div class="main-content">
          <h3 class="title-page">Sản phẩm</h3>
          <div class="d-flex justify-content-end">
            <a href="product_add.php" class="btn btn-primary mb-2">Thêm sản phẩm</a>
          </div>
          <table id="productTable" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Số Lượng Tồn Kho</th>
                <th>Giá</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $products = $productClass->select_product_All();
              if ($products) {
                  while ($product = $products->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . htmlspecialchars($product['id']) . "</td>";
                      echo "<td><img src='/html_backend/" . htmlspecialchars($product['image']) . "' alt='Ảnh sản phẩm' width='100'></td>";
                      echo "<td>" . htmlspecialchars($product['name']) . "</td>";
                      echo "<td>" . htmlspecialchars($product['category']) . "</td>";
                      echo "<td>" . htmlspecialchars($product['stock']) . "</td>";
                      echo "<td>$" . htmlspecialchars($product['price']) . "</td>";
                      // Sửa lỗi đóng thẻ <td>
                      echo "<td>
                        <a href='product_edit.php?id=" . $product['id'] . "' class='btn btn-warning'>
                          <i class='fa-solid fa-pen-to-square'></i> Sửa
                        </a>
                        
                        <!-- Form xóa sản phẩm -->
                        <form action='product_delete.php' method='POST' style='display:inline;' onsubmit='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này?\");'>
                          <input type='hidden' name='id' value='" . $product['id'] . "' />
                          <button type='submit' class='btn btn-danger'>
                            <i class='fa-solid fa-trash'></i> Xóa
                          </button>
                        </form>
                      </td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='7'>Không có sản phẩm nào</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function () {
        $('#productTable').DataTable();
      });
    </script>
  </body>
</html>

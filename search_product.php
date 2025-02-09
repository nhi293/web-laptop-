<?php
$host = 'localhost';
$db   = 'doan_web';
$user = 'root';  // Thay bằng tên tài khoản MySQL của bạn
$pass = '';      // Thay bằng mật khẩu MySQL của bạn
$port = 3306;

// Kết nối với cơ sở dữ liệu MySQL
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// Kiểm tra kết nối cơ sở dữ liệu
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apple</title>
    <!-- CSS-link -->
    <link rel="stylesheet" href="css/Aplle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@100; 200; 300; 400;500;
    600;700&display=swap"
      rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.
1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBOVD591QIYicR65iaqukzvf/
nwas FonqhPay5w/91JmVM2hMDcnK10nMGCdVK+iQrJ71zPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    |

    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <style>
      .main-home {
        width: 100%;
        height: 50vh;
        background-image: url(img/Lenovo-L340-9.jpg);
        background-position: center;
        background-size: cover;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        align-items: center;
      }
    </style>
  </head>
  <body>
    <header>
      <a href="trangchu.php" class="logo"><img src="img/logonew1.png" alt="" /></a>

      <ul class="navmenu">
        <li><a href="trangchu.php">Trang Chủ</a></li>
        <li><a href="#">Danh Mục</a>
          <ul>
            <li><a href="Acer.php">Acer</a></li>
            <li><a href="Asus.php">Asus</a></li>
            <li><a href="Apple.php">Apple</a></li>
            <li><a href="Lenovo.php">Lenovo</a></li>
            <li><a href="HP.php">Hp</a></li>

          </ul>
        
        </li>
        <li><a href="contactus.html">Liên Hệ</a></li>
        <li><a href="docs.html">Tài Liệu</a></li>
      </ul>

      <div class="nav-icon">
        <a href="#" id="search-icon"><i class="bx bx-search"></i></a>
            <!-- Phần tìm kiếm sản phẩm -->
    <div class="search-bar">
      <form method="GET" action="">
        <input type="text" name="noidung" placeholder="Nhập từ khóa tìm kiếm..." value="<?php echo isset($_GET['noidung']) ? htmlspecialchars($_GET['noidung']) : ''; ?>" />
        <button type="submit">Tìm kiếm</button>
      </form>
    </div>
        <a href="login.html"><i class="bx bx-user"></i></a>
        <a href="crat-items-details.php"><i class="bx bx-cart"></i></a>

        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
    </header>

 

    <section class="main-home">
      <div class="main-text">
      </div>
    </section>

    <!-- Phần sản phẩm tìm kiếm -->
    <section class="product">
      <div class="pro-center">
        <h1>Sản Phẩm Tìm Kiếm</h1>
        <p>Sản phẩm tìm kiếm theo từ khóa</p>
      </div>

      <div class="main-product">
        <?php
        // Khởi tạo biến $noidung
        $noidung = '';

        // Kiểm tra nếu có giá trị từ tham số GET 'noidung'
        if (isset($_GET['noidung'])) {
            $noidung = $_GET['noidung'];
        }

        // Kiểm tra nếu $noidung không rỗng trước khi thực hiện truy vấn SQL
        if (!empty($noidung)) {
            // Tạo câu truy vấn SQL
            $sql = "SELECT * FROM products WHERE name LIKE '%" . mysqli_real_escape_string($conn, $noidung) . "%'";
            
            // Thực hiện truy vấn
            $result = mysqli_query($conn, $sql);

            // Kiểm tra nếu truy vấn được thực hiện thành công
            if ($result) {
                // Hiển thị kết quả nếu có
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        // Đường dẫn hình ảnh sản phẩm
                        $imagePath = "./html_backend/" . htmlspecialchars($row['image']);

                        // Hiển thị sản phẩm
                        echo '
                        <div class="row">
                            <img src="' . $imagePath . '" alt="Product Image">
                            <div class="top-text">
                                <h5>Mới</h5>
                            </div>
                            <div class="hovr-icon">
                                <a href="#"><i class="bx bx-expand"></i></a>
                                <a href="/html_frontend/layout_user_html/layout/donhang.php"><i class="bx bx-cart-alt"></i></a>
                                <a href="#"><i class="bx bx-transfer-alt"></i></a>
                            </div>
                            <div class="btm-text">
                                <h4>' . htmlspecialchars($row['name']) . '</h4>
                                <h5>' . htmlspecialchars($row['price'] + 0) . '$<span>' . (htmlspecialchars($row['price']) + 100) . '$</span></h5>
                            </div>
                            <div class="right-icon">
                                <a href="#"><i class="bx bx-heart"></i></a>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>Không tìm thấy sản phẩm nào.</p>";
                }
            } else {
                // Hiển thị lỗi SQL nếu truy vấn thất bại
                echo "Lỗi khi thực hiện truy vấn: " . mysqli_error($conn);
            }
        } else {
            echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
        }

        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($conn);
        ?>
      </div>
    </section>
  </body>
</html>

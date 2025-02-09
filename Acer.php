\<?php
include "./html_backend/productClass.php"; // Include productClass

// Create productClass object
$productClass = new productClass();

// Get Acer products
$productsAcer = $productClass->select_product_Acer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Acer</title>
 <!-- CSS-link -->
 <link rel="stylesheet" href="css/Acer.css" />
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
      referrerpolicy="no-referrer" >
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
      <style>
      .main-home {
        width: 100%;
        height: 50vh;
        background-image: url(img/Acerlogo.jpg);
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
    <a href="trangchu.php" class="logo"><img src="img/logonew1.png" alt="Logo" /></a>
    <ul class="navmenu">
      <li><a href="trangchu.php">Trang Chủ</a></li>
      <li><a href="#">Danh Mục</a>
        <ul>
          <li><a href="#">Acer</a></li>
          <li><a href="Asus.php">Asus</a></li>
          <li><a href="Aplle.php">Apple</a></li>
          <li><a href="Lenovo.php">Lenovo</a></li>
          <li><a href="HP.php">HP</a></li>
        </ul>
      </li>
      <li><a href="contactus.html">Liên Hệ</a></li>
      <li><a href="docs.html">Tài Liệu</a></li>
    </ul>
    <div class="nav-icon">
      <a href="#" id="search-icon"><i class="bx bx-search"></i></a>
      <form method="get" action="search_product.php">
        <input type="text" name="noidung" placeholder="Search...">
        <button type="submit">Tìm kiếm</button>
      </form>
      <a href="login.html"><i class="bx bx-user"></i></a>
      <a href="giohang.php"><i class="bx bx-cart"></i></a>
      <div class="bx bx-menu" id="menu-icon"></div>
    </div>
  </header>

  <!-- Acer Products Section -->
  <section class="product">
    <div class="pro-center">
      <h1>Sản Phẩm Acer</h1>
      <p>Sản phẩm laptop Acer mới nhất và chất lượng cao nhất</p>
    </div>

    <div class="main-product">
      <?php
      if ($productsAcer && $productsAcer->num_rows > 0) {
        while ($row = $productsAcer->fetch_assoc()) {
          $imagePath = "./html_backend/" . htmlspecialchars($row['image']);
          echo '
            <div class="row">
              <img src="' . $imagePath . '" alt="Product Image">
              <div class="top-text"><h5>Mới</h5></div>
              <div class="hovr-icon">
                <a href="product_details.php?product_id=' . $row['id'] . '"><i class="bx bx-expand"></i></a>
                <a href="giohang.php?action=add&product_id=' . $row['id'] . '"><i class="bx bx-cart-alt"></i></a>
                <a href="#"><i class="bx bx-transfer-alt"></i></a>
              </div>
              <div class="btm-text">
                <h4>' . htmlspecialchars($row['name']) . '</h4>
                <h5>' . htmlspecialchars($row['price']+0) . '$<span></h5>
              </div>
              <div class="right-icon"><a href="#"><i class="bx bx-heart"></i></a></div>
            </div>';
        }
      } else {
        echo "<p>Không có sản phẩm nào thuộc danh mục Acer.</p>";
      }
      ?>
    </div>
  </section>
  
    <!--Contact-section-->

    <section class="contact">
      <div class="contact-info">
        <div class="first-info">
          <img src="img/logo.png" alt="" />
          <p>
           470 Tran Dai Nghia <br />
            Ngu Hanh Son District, Da Nang Province
          </p>
          <p>0385109397</p>
          <p>mailuan345@gmail.com</p>
          <div class="social-icon">
            <a href="#"><i class="bx bxl-facebook"></i></a>
            <a href="#"><i class="bx bxl-instagram"></i></a>
            <a href="#"><i class="bx bxl-youtube"></i></a>
          </div>
        </div>
        <div class="second-info">
          <h4>Support</h4>
          <p>Contact</p>
          <p>About page</p>
          <p>Size Guide</p>
          <p>Shopping & Réturns</p>
          <p>Privacy</p>
        </div>

        <div class="third-info">
          <h4>Shope</h4>
          <p>ASUS</p>
          <p>ACER</p>
          <p>HP</p>
          <p>LENOVO</p>
          <p>MSI</p>
        </div>

        <div class="fourth-info">
          <h4>Company</h4>
          <p>About</p>
          <p>Blog</p>
          <p>Affiliate</p>
          <p>Login</p>
        </div>
        <div class="five">
          <h4>Shipping Companies</h4>
          <img src="img/shipping companies.png" alt="">
          <br><br>
          <h4>Payment Methods</h4>
          <img src="img/payment methods.png" alt="">
        </div>
      </div>
    </section>

    <div class="end-text">
      <p>Copyright</p>
    </div>

    <script src="js/java.js"></script>
</body>
</html>

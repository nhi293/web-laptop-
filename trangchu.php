<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <!-- CSS-link -->
    <link rel="stylesheet" href="css/trangchu.css" />
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
        height: 100vh;
        background-image: url(img/nen.jpg);
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
          <li><a href="#">Trang Chủ</a></li>
          <li><a href="#">Danh Mục</a>
              <ul>
                  <li><a href="Acer.php">Acer</a></li>
                  <li><a href="Asus.php">Asus</a></li>
                  <li><a href="Aplle.php">Aplle</a></li>
                  <li><a href="Lenovo.php">Lenovo</a></li>
                  <li><a href="HP.php">Hp</a></li>
              </ul>
          </li>
          <li><a href="contactus.html">Liên Hệ</a></li>
          <li><a href="docs.html">Tài Liệu</a></li>
      </ul>
  
      <div class="nav-icon">
          <a href="#" id="search-icon"><i class="bx bx-search"></i></a>
         <!-- Chức Năng Tìm Kiếm -->
        
          <form method="get" action="search_product.php">
          <input type="text" name="noidung" placeholder="Search...">
          <button type="submit">Tìm kiếm</button>
          </form>
          <a href="login.html"><i class="bx bx-user"></i></a>
          <a href="giohang.php"><i class="bx bx-cart"></i></a>
  
          <div class="bx bx-menu" id="menu-icon"></div>
      </div>
  </header>
  

    <section class="main-home">
      <div class="main-text">
        <h5>Laptop Type</h5>
        <h1>
          Laptop <br />
          New
        </h1>
        <p>Lap
          top old</p>

        <a href="Acer.php" class="main-btn"
          >Shop Now <i class="bx bx-right-arrow-alt"> </i
        ></a>
      </div>

      <div class="down-arrow">
        <a href="#trending" class="down"
          ><i class="bx bx-down-arrow-alt"></i
        ></a>
      </div>
    </section>
    <!--     trending-products-selection-->
    <section class="trending-product" id="trending">
      <div class="center-text">
        <h2>Big <span>Sale</span></h2>
      </div>
      <div class="products">
        <div class="row">
          <img src="img/laptop_lenovo_legion_s7_8.jpg" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star"></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>LENNOVO LEGION 7</h4>
            <p>1320$</p>
          </div>
        </div>

        <div class="row">
          <img src="img/HP Spectre x360 15.png" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>HP Spectre x360 14</h4>
            <p>1100$</p>
          </div>
        </div>

        <div class="row">
          <img src="img/ASUS Tuf f15.png" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>ASUS Tuf f15</h4>
            <p>17.290.000₫</p>
          </div>
        </div>

        <div class="row">
          <img src="img/Lenovo V14 G4.png" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star"></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>Lenovo V14 G4</h4>
            <p>1220$</p>
          </div>
        </div>

        <div class="row">
          <img src="img/Lenovo LOQ 15IAX9.png" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>Lenovo LOQ 15IAX9</h4>
            <p>1520$</p>
          </div>
        </div>

        <div class="row">
          <img src="img/asus-rog-9.jpg" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>Asus ROG Flow X13</h4>
            <p>1720$</p>
          </div>
        </div>

        <div class="row">
          <img src="img/lenovo legion 5.png" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star"></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>Lenovo Legion 5</h4>
            <p>900$</p>
          </div>
        </div>
        <div class="row">
          <img src="img/Lenovo Legion Slim 5.png" alt="" />
          <div class="product-text">
            <h5>Sale</h5>
          </div>
          <div class="heart-icon">
            <i class="bx bx-heart"></i>
          </div>
          <div class="ratting">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class="bx bx-star"></i>
            <i class="bx bx-star-half"></i>
          </div>

          <div class="price">
            <h4>Lenovo Legion Slim 5</h4>
            <p>1310$</p>
          </div>
        </div>
      </div>
    </section>
    <!--Client-Rwview-selection-->

    <section class="client-reviews">
      <div class="reviews">
        <h3>Client Reviews</h3>
        <img src="img/bl-1.png" alt="" />
        <p> 
         
I have been using this laptop for over six months, and it has exceeded all my expectations. The 4K <br>
display delivers sharp and realistic images, especially when watching movies and working with  <br>
graphics. The powerful performance, featuring an Intel Core i7 processor, allows me to handle all <br>
tasks smoothly, from office work to heavy gaming. The battery life is also impressive, lasting all day <br>
without needing to charge. I am completely satisfied and will recommend this laptop to friends and colleagues.
          
        </p>

        <h2>Customer: Nguyen Thi Hong</h2>
        <p> Rating:</p>
        <class class="ratting">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </class>

      </div>
    </section>
    <section class="client-reviews">
      <div class="reviews">
       
        <img src="img/man-review.png" alt="" />
        <p> 
          I have been using this laptop for over six months, and it has truly surprised me. The Full HD display  <br>
          provides bright colors and excellent contrast, creating a fantastic experience for watching movies  <br>
          and editing photos. With the AMD Ryzen 7 processor, the performance is impressive, allowing me to  <br>
          multitask smoothly and play light games without any lag. The backlit keyboard is very convenient for <br>
          working at night, and the compact design makes it easy to carry around. While the battery life isn't <br>
          exceptional, it still lasts for several hours of continuous work. I am very satisfied with this product <br>
          and would recommend it to anyone looking for a high-performance laptop at an affordable price.
          
        </p>

        <h2>Customer: Nguyen Minh Hoang</h2>
        <p> Rating:</p>
        <class class="ratting">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </class>

      </div>
    </section>

    <section>
      <div class="Update-news">
        <div class="up-center-text">
          <h2>New Updates</h2>
        </div>
        <div class="Update-cart">
          <div class="cart">
            <img src="img/new update 1.jpg" alt="" />
            <h5>22/01/2024</h5>
            <h4>CÁC BƯỚC KIỂM TRA LAPTOP – TRÁNH BỊ LỪA KHI MUA LAPTOP CŨ</h4>
            <p>
              Đừng bỏ qua các bước kiểm tra laptop cũ đơn giản nhưng cực kỳ hiệu
              quả để đảm bảo sở hữu chiếc Laptop chất lượng...
            </p>
            <h6>Continue Reding</h6>
          </div>

          <div class="cart">
            <img src="img/Lenovo LOQ 15IAX9.png" alt="" />
            <h5>23/05/2024</h5>
            <h4>Laptop Lenovo LOQ 15APH8 Ryzen 7- 7840HS</h4>
            <p>
              Mô tả sản phẩm:Một dòng LOQ mới đến từ nhà Lenovo và một trong
              những đó là LOQ 2023 15APH8 cực kỳ mới mẻ với một dòng chip Ryzen
              7 đời mới ...
            </p>
            <h6>Continue Reding</h6>
          </div>

          <div class="cart">
            <img src="img/new update 2.png" alt="" />
            <h5>03/06/2024</h5>
            <h4>
              Nên mua laptop hãng nào 2024? 8 thương hiệu đủ sức để “càn quét”
              thị trường
            </h4>
            <p>
              Câu hỏi "Nên mua laptop hãng nào 2024?" đang được nhiều người quan
              tâm và tìm kiếm câu trả lời. Bởi thị trường ...
            </p>
            <h6>Continue Reding</h6>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="Update-news">
        <div class="up-center-text">
          <h2>New Updates</h2>
        </div>
        <div class="Update-cart">
          <div class="cart">
            <img src="img/new update 1.jpg" alt="" />
            <h5>2024</h5>
            <h4>CÁC BƯỚC KIỂM TRA LAPTOP – TRÁNH BỊ LỪA KHI MUA LAPTOP CŨ</h4>
            <p>
              Đừng bỏ qua các bước kiểm tra laptop cũ đơn giản nhưng cực kỳ hiệu
              quả để đảm bảo sở hữu chiếc Laptop chất lượng...
            </p>
            <h6>Continue Reding</h6>
          </div>

          <div class="cart">
            <img src="img/Lenovo LOQ 15IAX9.png" alt="" />
            <h5>2024</h5>
            <h4>Laptop Lenovo LOQ 15APH8 Ryzen 7- 7840HS</h4>
            <p>
              Mô tả sản phẩm:Một dòng LOQ mới đến từ nhà Lenovo và một trong
              những đó là LOQ 2023 15APH8 cực kỳ mới mẻ với một dòng chip Ryzen
              7 đời mới ...
            </p>
            <h6>Continue Reding</h6>
          </div>

          <div class="cart">
            <img src="img/new update 2.png" alt="" />
            <h52024</h5>
            <h4>
              Nên mua laptop hãng nào 2024? 8 thương hiệu đủ sức để “càn quét”
              thị trường
            </h4>
            <p>
              Câu hỏi "Nên mua laptop hãng nào 2024?" đang được nhiều người quan
              tâm và tìm kiếm câu trả lời. Bởi thị trường ...
            </p>
            <h6>Continue Reding</h6>
          </div>
        </div>
      </div>
    </section>

    <!--Contact-section-->

    <section class="contact">
      <div class="contact-info">
        <div class="first-info">
          <img src="img/logonew1.png" alt="" width="100px" height="100px" />

          <p>
            470 Tran Dai Nghia <br />
            Ngu Hanh Son District, Da Nang Province
          </p>
          <p>0385109397</p>
          <p>mailuan345@gmail.com</p>
          <div class="social-icon">
            <a href="#"><i class="bx bxl-facebook"></i></a>
            <a href="#"><i class="bx bxl-twitter"></i></a>
            <a href="#"><i class="bx bxl-instagram"></i></a>
            <a href="#"><i class="bx bxl-youtube"></i></a>
            <a href="#"><i class="bx bxl-linkedin"></i></a>
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

  

    <script src="js/java.js"></script>
  </body>
</html>

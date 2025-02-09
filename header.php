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
      <a href="#" class="logo"><img src="img/logonew1.png" alt="" /></a>
  
      <ul class="navmenu">
          <li><a href="#">Trang Chủ</a></li>
          <li><a href="#">Danh Mục</a>
              <ul>
                  <li><a href="Acer.html">Acer</a></li>
                  <li><a href="Asus.html">Asus</a></li>
                  <li><a href="Aplle.html">Aplle</a></li>
                  <li><a href="Lenovo.html">Lenovo</a></li>
                  <li><a href="HP.html">HP</a></li>
              </ul>
          </li>
          <li><a href="contactus.html">Liên Hệ</a></li>
          <li><a href="docs.html">Tài Liệu</a></li>
      </ul>
  
      <div class="nav-icon">
          <a href="#" id="search-icon"><i class="bx bx-search"></i></a>
          <input type="text" id="search-bar" class="hidden" placeholder="Search...">
          <a href="login.html"><i class="bx bx-user"></i></a>
          <a href="crat-items-details.html"><i class="bx bx-cart"></i></a>
  
          <div class="bx bx-menu" id="menu-icon"></div>
      </div>
  </header>
  
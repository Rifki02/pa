<?php
// Mulai sesi
session_start();

if (isset($_POST['username'])) {
    // Simpan username pengguna ke dalam sesi
    $_SESSION['username'] = $_POST['username'];
}
?>

<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Toko Handphone </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">
    <!-- ICON -->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- LINK style css nya -->
    <link rel="stylesheet" href="../style/user.css">
  
 
</head>
  
  <body>
    <!-- navbar start  --> <!-- Guna span untuk misahkan untuk ubah warna jdi primary -->
    <nav class="navbar">    
        <a href="#" class="navbar-logo">Toko<span>Handphone</span></a>

      <div class="navbar-nav">
          <a href="index.html">Home</a>
          <a href="#contact">Produk</a>
          <a href="#about">About Us</a>
      </div>
      
      <div class="navbar-user">
          <?php if (isset($_SESSION['username'])): ?>
          <a> <?php echo $_SESSION['username']; ?> </a>
          <?php endif; ?>
          <a href="../php/logout.php" class="box-arrow-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
          </a>
      </div>

      <div class="navbar-extra">
          <a href="#" id="search"><i data-feather="search"></i></a>
          <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
          <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>

    <!-- navbar end -->

    <!-- hero section start-->
    <section class="hero" id="#home">
      <main class="content">
        <h1>Toko Handphone <span>JayaAbadi</span></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, nulla nemo dolor ipsa et quasi ut, illo assumenda tempore, paduka kakang abdi hastala vista</p>
        <a href="#" class="cta">Beli Sekarang</a>
      </main>
    </section>
    <!-- hero section end -->


    <!-- feather icon -->
    <script>
        feather.replace();
    </script>
    <!-- javascript -->
    <script src="../script/script.js"></script>
  </body>
  </html>

  <!-- <li class="navigation__item shortcut__item shortcut__item-user">
    <div class="navigation__link" role="button" tabindex="0">
      <div class="shortcut__item--wrapper">
        <i class="micon micon-account shortcut__icon"></i>
        <span class="shortcut__arrow"></span>
        <aside class="shortcut__view shortcut__view-account view-account">
          <ul class="view-account__list">
            <li class="view-account__item">
              <a class="view-account__link" href="//buy.mi.co.id/id/site/login?redirectUrl=https%3A%2F%2Fwww.mi.co.id%2Fid%2Fstore%2F">Login</a>
            </li>
          </ul>
        </aside>
      </div>
    </div>
  </li> -->

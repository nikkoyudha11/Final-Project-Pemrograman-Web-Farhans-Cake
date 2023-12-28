<?php
  if(isset($_GET['del'])){
    include 'koneksi.php';
    $sql=mysqli_query($connect,"SELECT * FROM tb_user WHERE username ='$_GET[del]'");
    $data=mysqli_fetch_array($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farhan Carry Us</title>
  
    <!-- Style -->
    <link rel="stylesheet" href="csskuebaru.css" />
    <style>
      .menu-card {
        text-align: center;
        padding: 8px 15px;
        border-radius: 8px;
        border: 2px solid rgba(10, 10, 10, 5);
        width: 30rem;
        background: antiquewhite;
        margin-right: 1rem;
        margin-bottom: 1rem;
      }

      .button-detail {
        box-shadow: 1px 1px 1px rgb(5, 5, 5);
        padding: 10px 25px;
        border-radius: 8px;
        border: 2px solid rgba(10, 10, 10, 5);
        background: teal;
      }

      .button-detail:hover {
        color: #14396a !important;
        background: #468ccf;
      }

      .button-detail a {
        font-family: arial;
        color: whitesmoke !important;
        font-size: 14px;
      }

      #user {
        margin-left : 20px;
        font-size: 18px;
      }
      #searchInput {
        font-family: "Poppins", sans-serif;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px 12px;
        margin-right: 10px;
        outline: none;
        transition: border-color 0.2s ease-in-out;
        width: 200px;
      }

      #searchInput::placeholder {
        color: #999;
      }

      #searchInput:focus {
        border-color: #468ccf;
      }

      @media (max-width: 750px) {
        .menu-card {
          height: 42rem;
        }
      }
    </style>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Javascript -->
    <script src="script.js" defer></script>
  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar">
      <a href="#home" class="navbar-logo">Farhan's<span> cake</span>.</a>
      <div class="navbar-navigasi">
        <a href="#home">Home</a>
        <a href="#tentangkami">Tentang kami</a>
        <a href="#menu">Menu</a>
      </div>
      <div class="navbar-search">
        <input type="text" id="searchInput" placeholder="Search cake..." oninput="filterCakes()" />
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="hamburger"><i data-feather="menu"></i></a>
        <?php
        if(isset($data['username'])){
          ?>
          <a href="cart.php?del=<?php echo $data['username']; ?>" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
          <?php
        }
        if(isset($data['username'])){
          ?>
          <a href="profile_user.php?del=<?php echo $data['username']; ?>" id="user"><?php echo $data['username']; ?></a>
          <?php
        }if(!isset($data['username'])){?>
          <a href="registrasi.php" id="user"><?php echo "Registrasi";?></a><?php
        }
        ?>
      </div>
    </nav>
    <!-- Navbar end -->

    <!-- Hero Section Start-->
    <section class="hero" id="home">
      <main class="content">
        <h1>Rasakan Manisnya <span>Kue</span></h1>
        <p>Bagikan Kebahagiaan Dengan Manisnya Kue </p>
        <a href="beli.php?del=DELUXE-RED-VELVET<?php if(isset($data['username'])) { echo '&username=' . urlencode($data['username']); } ?>" class="cta">Pesan Sekarang</a>
      </main>
    </section>
    <!-- Hero Section end-->

    <!-- About Section Start -->
    <section id="tentangkami" class="tentangkami">
      <h2><span>Tentang</span> Kami</h2>
      <div class="row">
        <div class="tentangkami-img">
          <img src="kue/banana_cake.jpg" alt="tentangkami" />
        </div>
        <div class="content">
          <h3>
            Farhan's Cake adalah Website penjualan kue yang manis dan enak dengan tampilan yang elite dan harganya terjangkau :)
          </h3>
          <p>
            Farhan's cake telah berdiri sejak 2 Minggu lalu tepatnya pada tanggal 13 Juli 2023
          </p>
          <p>
            Kisah dibaliknya Farhan's cake berawal dari tugas besar pemrograman web berkelompok yang beranggotakan Nikko Yudha Asmara Adi, M. Khuluqil Karim, dan M. Farhan Siregar selaku pemilik dari website ini.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section End -->

    <!-- Menu Section Start -->
    <section id="menu" class="menu">
      <h2><span>Menu</span> Kami</h2>
      <p>
        Berikut daftar menu yang tersedia <br>di Farhan's cake :
      </p>
      <div class="row">
        <?php
          include 'koneksi.php';
          $query = "SELECT * FROM tb_cake";
          $result = mysqli_query($connect, $query);

          while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="detail.php"></form>
        <div class="menu-card">
          <img
            src="kue/<?php echo $row['gambar'];?>"
            alt="<?php $row['nama'];?>.jpg"
            class="menu-card-img"
          />
          <h3 class="menu-card-title">- <?php echo $row['nama'];?> -</h3>
          <p class="menu-card-price">Rp.<?php echo $row['harga'];?></p>
          <p class="menu-card-deskripsi"> <?php echo $row['deskripsi']; ?></p>
          <button class="button-detail"><a href="detail.php?del=<?php echo $row['nama']; ?><?php if(isset($data['username'])) { echo '&username=' . urlencode($data['username']); } ?>">Detail</a></button>
          <button class="button-beli"><a href="beli.php?del=<?php echo $row['nama']; ?><?php if(isset($data['username'])) { echo '&username=' . urlencode($data['username']); } ?>">Pesan</a></button>

        </div>
        <?php
          }
        ?>
      </div>
    </section>
    <!-- Menu Section End -->
    <script>
    function filterCakes() {
      const searchInput = document.getElementById('searchInput').value.toLowerCase();
      const menuCards = document.querySelectorAll('.menu-card');

      for (const card of menuCards) {
        const cakeName = card.querySelector('.menu-card-title').textContent.toLowerCase();
        if (cakeName.includes(searchInput)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      }
    }

    feather.replace();
  </script>
  </body>
</html>

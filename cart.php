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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="csskuebaru.css" />
    <title>Farhan Carry Us</title>

    <style>
      body {
        font-family: "Poppins", sans-serif;
        background-color: var(--bg);
        color: white;
        min-height: auto;
      }
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
        <a href="kuebaru.php?<?php if (isset($data['username'])){?>del=<?php echo $data['username'];} ?>">Home</a>
        <a href="kuebaru.php?<?php if (isset($data['username'])){?>del=<?php echo $data['username'];} ?>#tentangkami">Tentang kami</a>
        <a href="kuebaru.php?<?php if (isset($data['username'])){?>del=<?php echo $data['username'];} ?>#menu">Menu</a>
      </div>
      <div class="navbar-search">
      <input type="text" id="searchInput" placeholder="Search cake..." oninput="filterCakes()" />
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="hamburger"><i data-feather="menu"></i></a>
        <a href="cart.php?del=<?php echo $data['username']; ?>" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <?php
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
        <h1>Cart <span></span></h1>
      </main>
    </section>
    <!-- Hero Section end-->

    <!-- Menu Section Start -->
    <section id="menu" class="menu">
      <h2><span>Riwayat</span> Order</h2>
      <p>
        Berikut list order cake anda :
      </p>
      <div class="row">
        <?php
          $query = "SELECT * FROM tb_order WHERE id_user = {$data['id_user']};";
          $result = mysqli_query($connect, $query);

          while ($row = mysqli_fetch_assoc($result)) {
              $query_cake = "SELECT * FROM tb_cake WHERE id_cake = {$row['id_cake']};";
              $result_cake = mysqli_query($connect, $query_cake);
              $row_cake = mysqli_fetch_assoc($result_cake);

        ?>
        <div class="menu-card">
          <img
            src="kue/<?php echo $row_cake['gambar'];?>"
            alt="<?php $row_cake['nama'];?>.jpg"
            class="menu-card-img"
          />
          <h3 class="menu-card-title">- <?php echo $row_cake['nama'];?> -</h3>
          <p class="menu-card-price">Rp.<?php 
            $total_harga = $row['jumlah'] * $row_cake['harga']; 
            echo $total_harga;
          ?></p>    
          <p class="menu-card-deskripsi">Jumlah pesan : <?php echo $row['jumlah']; ?></p>
          <button class="button-beli"><a href="beli.php?del=<?php echo $row_cake['nama']; ?>&id_order=<?php echo $row['id_order']; ?><?php if(isset($data['username'] )) { echo '&username=' . urlencode($data['username']); } ?>">Edit</a></button>
          <br>
          <button class="button-beli" style="background-color: red;"><a href="delete.php?del=<?php echo $row['id_order']; ?>"onclick="return confirm('Apakah anda yakin ingin menghapus order ini?');">Hapus</a></button>
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
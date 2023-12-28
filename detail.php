<?php
    include 'koneksi.php';
    $sql=mysqli_query($connect,"SELECT * FROM tb_cake WHERE nama ='$_GET[del]'");
    $data=mysqli_fetch_array($sql);
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
      #user {
        margin-left : 20px;
        font-size: 18px;
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
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="hamburger"><i data-feather="menu"></i></a>
        <?php
        if(isset($_GET['username'])){
          $username = urldecode($_GET['username']);
          ?>
          <a href="profile_user.php?del=<?php echo $username; ?>" id="user"><?php echo $username; ?></a>
          <?php
        }if(!isset($_GET['username'])){?>
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
        <p>Bagikan Kebahagiaan Dengan Manisnya Kue</p>
        <a href="#" class="cta">Beli Sekarang</a>
      </main>
    </section>
    <!-- Hero Section end-->

    <section id="tentangkami" class="tentangkami">
      <h2><span>Detail</span></h2>
      <div class="row">
        <div class="tentangkami-img">
          <img src="kue/<?php echo $data['gambar']?>" alt="<?php echo $data['nama']?>" />
        </div>
        <div class="content">
          <h3>
            <?php echo $data['nama']?>
          </h3>
          <p>
            Jenis : <?php echo $data['jenis']?>
            <br>
            Rasa : <?php echo $data['rasa']?>
          </p>
          <p>
            <?php echo $data['deskripsi'] ?>
          </p>
          <br><br>
          <h4>
            Harga : <?php echo $data['harga']?>
          </h4>
          <br><br><br>
          <button class="button-beli-tumbas"><a href="beli.php?del=<?php echo $data['nama'];?><?php if(isset($username)) { echo '&username=' . urlencode($username); } ?>">Pesan Sekarang</a></button>
        </div>
      </div>
    </section>
    <!-- About Section End -->

</body>
</html>
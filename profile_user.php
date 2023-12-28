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
    <title>Profile <?php echo $data['username']; ?> </title>
    
    <!-- Style -->
    <link rel="stylesheet" href="csskuebaru.css" />

    <style>
      .tentangkami .row .content .input-box label {
            font-size: 1.8rem;
            color: grey;
        }
        .tentangkami .row .content .input-box input{
            font-family: "Poppins", sans-serif;
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1.2rem;
            color: grey;
            margin-top: 8px;
            border: 1px solid grey;
            border-radius: 6px;
            padding: 0 15px;
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
        <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <?php
        if(isset($data['username'])){
          ?>
          <a href="profile_user.php?del=<?php echo $username; ?>" id="user"><?php echo $data['username']; ?></a>
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
        <h1>Profile <span><br><?php echo $data['username']; ?></span></h1>
      </main>
    </section>
    <!-- Hero Section end-->

    <!-- tentangkami Section Start -->
    <section id="tentangkami" class="tentangkami">
      <h2><span>Profile Akun</span></h2>
      <div class="row">
        <div class="content">
          <form action="proses_update_profile.php" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin dengan perubahan ini?');">
            <input type="hidden" name="log_user" value="<?php echo $data['log_user']; ?>">
            <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
              <div class="input-box">
                  <label>NAMA :</label>
                  <br>
                  <input type="text" placeholder="Masukkan nama anda" name="nama" value="<?php echo $data['username']; ?>" required>
              </div>
              <div class="input-box">
                  <label>EMAIL :</label>
                  <br>
                  <input type="text" placeholder="Masukkan email anda" name="email" value="<?php echo $data['email']; ?>" required>
              </div>
              <div class="input-box">
                  <label>Password :</label>
                  <br>
                  <input type="text" placeholder="Masukkan email anda" name="password" value="<?php echo $data['password']; ?>" required>
              </div>
              <div class="input-box">
                  <label>ALAMAT :</label>
                  <br>
                  <input type="text" placeholder="Masukkan alamat anda" name="alamat" value="<?php echo $data['alamat']; ?>" required>
              </div>
              <div class="input-box">
                  <label>No. Telepon :</label>
                  <br>
                  <input type="number" placeholder="Masukkan alamat anda" name="no_telp" value="<?php echo $data['user_number']; ?>" required>
              </div>
            <br><br><br>
            <button class="button-beli-tumbas" type="submit" name="submit"><i data-feather="edit"></i>Update data</button>
          </form>
          <br><br>
          <form action="proses_delete_akun.php" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin ingin menghapus akun ini?');">
            <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
            <button class="button-beli-tumbas" style="background-color: grey;" type="submit" name="submit"><i data-feather="trash"></i>Hapus akun</button>
          </form>
          <br><br>
          <form action="kuebaru.php" onsubmit="return confirm('Apakah anda yakin ingin logout akun ini?');">
            <button class="button-beli-tumbas" style="background-color: red;" type="submit" name="submit"><i data-feather="log-out"></i>Logout akun</button>
          </form>
        </div>
      </div>
    </section>
    <!-- tentangkami Section End -->

</body>
</html>
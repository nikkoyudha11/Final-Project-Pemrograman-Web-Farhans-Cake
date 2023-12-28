<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Farhan's Cake </title>

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
            font-size: 1rem;
            color: grey;
            margin-top: 8px;
            border: 1px solid grey;
            border-radius: 6px;
            padding: 0 15px;
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
      </div>
    </nav>
    <!-- Navbar end -->

    <!-- Hero Section Start-->
    <section class="hero" id="home">
      <main class="content">
        <h1>Login <span>Akun</span></h1>
      </main>
    </section>
    <!-- Hero Section end-->

    <!-- tentangkami Section Start -->
    <section id="tentangkami" class="tentangkami">
      <h2><span>Login</span></h2>
      <div class="row">
        <div class="content">
          <form action="proses_cek_akun.php" method="POST" enctype="multipart/form-data">
              <div class="input-box">
                  <label>Username :</label>
                  <br>
                  <input type="text" placeholder="Masukkan email anda" name="email" required>
              </div>
              <div class="input-box">
                  <label>Password :</label>
                  <br>
                  <input type="text" placeholder="Masukkan alamat anda" name="password" required>
              </div>
            <br><br><br>
            <button class="button-beli-tumbas" type="submit" name="submit">Login</button>
          </form>
        </div>
      </div>
    </section>
    <!-- tentangkami Section End -->
</body>
</html>
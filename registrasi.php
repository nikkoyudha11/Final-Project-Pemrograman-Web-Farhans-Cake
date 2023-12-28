<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | Farhan's Cake</title>

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
        <a href="#home">Home</a>
        <a href="#tentangkami">Tentang kami</a>
        <a href="#menu">Menu</a>
        <a href="#kontact">Kontak</a>
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
        <h1>Registrasi <span>Akun</span></h1>
      </main>
    </section>
    <!-- Hero Section end-->

    <!-- tentangkami Section Start -->
    <section id="tentangkami" class="tentangkami">
      <h2><span>New Account</span></h2>
      <div class="row">
        <div class="content">
          <form action="proses_daftar_akun.php" method="POST" enctype="multipart/form-data">
              <div class="input-box">
                  <label>NAMA :</label>
                  <br>
                  <input type="text" placeholder="Masukkan nama anda" name="nama" required>
              </div>
              <br>
              <div class="input-box">
                  <label>EMAIL :</label>
                  <br>
                  <input type="text" placeholder="Masukkan email anda" name="email" required>
              </div>
              <br>
              <div class="input-box">
                  <label>Password :</label>
                  <br>
                  <input type="text" placeholder="Masukkan password anda" name="password" required>
              </div>
              <br>
              <div class="input-box">
                  <label>ALAMAT :</label>
                  <br>
                  <input type="text" placeholder="Masukkan alamat anda" name="alamat" required>
              </div>
              <br>
              <div class="input-box">
                  <label>No. Telepon :</label>
                  <br>
                  <input type="number" placeholder="Masukkan nomor telepon anda" name="no_telp" required>
              </div>
            <br><br>
            <button class="button-beli-tumbas" type="submit" name="submit">Daftar</button>
          </form>
          <br>
          <form action="login.php">
          <div class="input-box">
            <label>Sudah punya akun? </label>
            <button class="button-beli-tumbas" type="submit" name="submit">Login</button>
          </div>
          </form>
        </div>
      </div>
    </section>
    <!-- tentangkami Section End -->
    <script>
    // Function to store the form inputs in LocalStorage
    function storeFormData() {
      const nama = document.getElementsByName('nama')[0].value;
      const email = document.getElementsByName('email')[0].value;
      const alamat = document.getElementsByName('alamat')[0].value;
      const no_telp = document.getElementsByName('no_telp')[0].value;

      localStorage.setItem('nama', nama);
      localStorage.setItem('email', email);
      localStorage.setItem('alamat', alamat);
      localStorage.setItem('no_telp', no_telp);
    }

    // Function to populate the form inputs from LocalStorage
    function populateFormInputs() {
      document.getElementsByName('nama')[0].value = localStorage.getItem('nama') || '';
      document.getElementsByName('email')[0].value = localStorage.getItem('email') || '';
      document.getElementsByName('alamat')[0].value = localStorage.getItem('alamat') || '';
      document.getElementsByName('no_telp')[0].value = localStorage.getItem('no_telp') || '';
    }

    // Call the populateFormInputs function when the page loads
    window.addEventListener('DOMContentLoaded', populateFormInputs);
  </script>
</body>
</html>
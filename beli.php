<?php
    include 'koneksi.php';
    $sql=mysqli_query($connect,"SELECT * FROM tb_cake WHERE nama ='$_GET[del]'");
    $data=mysqli_fetch_array($sql);

    if(isset($_GET['id_order'])){
      $id_order = $_GET['id_order'];
      $sql_order = mysqli_query($connect,"SELECT * FROM tb_order WHERE id_order ='$id_order'");
      $data_order =mysqli_fetch_array($sql_order);
    }; 
    // SAMPAI SINI ORDER
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="csskuebaru.css" />
    <title><?php echo $data['nama'];?>| Beli</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />

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
        #user {
          margin-left : 20px;
          font-size: 18px;
        }
        .note p {
          font-size: 18px;
        }

        #jumlah {
          font-family: "Poppins", sans-serif;
          border: 1px solid grey;
          border-radius: 6px;
        }
    </style>

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
          $sql_user=mysqli_query($connect,"SELECT * FROM tb_user WHERE username ='$username'");
          $data_user=mysqli_fetch_array($sql_user);
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
        <h1><?php echo $data['nama'] ?><span></span></h1>
        <p><?php echo $data['deskripsi'] ?></p>
      </main>
    </section>
    <!-- Hero Section end-->

    <!-- tentangkami Section Start -->
    <section id="tentangkami" class="tentangkami">
      <h2><span>Pesan</span></h2>
      <div class="row">
        <div class="tentangkami-img">
          <img src="kue/<?php echo $data['gambar']?>" alt="<?php echo $data['nama']?>" />
        </div>
        <div class="content">
          <form action="proses_beli.php" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin ingin memesan?');">
            <input type="hidden" name="cake_name" value="<?php echo $data['nama']; ?>">
            <input type="hidden" name="id_cake" value="<?php echo $data['id_cake']; ?>">
            <?php
              if(isset($data_order['id_order'])){ ?>
                  <input type="hidden" name="id_order" value="<?php echo $data_order['id_order']; ?>">
                  <input type="hidden" name="order_jumlah" value="<?php echo $data_order['jumlah']; ?>">
                <?php
              }
            ?>
              <div class="input-box">
              <?php
              if(isset($data_order['id_order'])){ ?>
                  <label style="float : right;">Id order : <?php echo $data_order['id_order']; ?> </label>
                  <br>
                <?php
              }
            ?>
                  <label>NAMA :</label>
                  <br>
                  <input type="text" placeholder="Masukkan nama anda" name="nama" value="<?php if(isset($data_user['username'])){ echo $data_user['username']; }
                  else {echo "ANDA HARUS REGISTRASI TERLEBIH DAHULU";}?>" readonly>
              </div>
              <br>
              <div class="input-box">
                  <label>EMAIL :</label>
                  <br>
                  <input type="text" placeholder="Masukkan email anda" name="email" value="<?php if(isset($data_user['username'])){ echo $data_user['email'];} 
                  else {echo "ANDA HARUS REGISTRASI TERLEBIH DAHULU";}?>" readonly>
              </div>
              <br>
              <div class="input-box">
                  <label>ALAMAT :</label>
                  <br>
                  <input type="text" placeholder="Masukkan alamat anda" name="alamat" value="<?php if(isset($data_user['username'])){ echo $data_user['alamat']; }
                  else {echo "ANDA HARUS REGISTRASI TERLEBIH DAHULU";} ?>" readonly>
              </div>
              <br>
              <div class="input-box">
                  <label>No. Telepon :</label>
                  <br>
                  <input type="number" placeholder="ANDA HARUS REGISTRASI TERLEBIH DAHULU" name="no_telp" value="<?php if(isset($data_user['username'])){ echo $data_user['user_number']; }
                  else {echo "ANDA HARUS REGISTRASI TERLEBIH DAHULU";} ?>" readonly>
              </div>
              <br>
              <div class="note">
                <?php
                  if(isset($data_user['username'])){ ?>
                    <p>*Jika anda ingin mengubah data, maka anda harus mengubahnya pada profile anda terlebih dahulu</p>
                  <?php
              }
              else {
                ?>
                <p>*ANDA HARUS REGISTRASI TERLEBIH DAHULU</p>
              <?php
              }
            ?>
                
              </div>
              <div class="input-box">
                  <label>Jumlah :</label>
                  <br>
                  <select id="jumlah" name="jumlah" required>
                    <?php
                      $row = '1';
                      while ($row <= $data['jumlah']) {
                        $selected = ($row == $data_order['jumlah']) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $row ?>" <?php echo $selected ?>><?php echo $row ?></option>
                    <?php
                    $row++;
                      }
                    ?>
                  </select>
              </div>
            <br>
            <?php
            if(isset($data_user['username'])){?>
              <button class="button-beli-tumbas" type="submit" name="submit">Pesan Sekarang</button>
            <?php 
            } else {?>
              <button class="button-beli-tumbas" style="background-color: grey;" type="submit" name="submit" disabled >Pesan Sekarang</button>
            <?php } ?>
          </form>
        </div>
      </div>
    </section>
    <!-- tentangkami Section End -->

</body>
</html>
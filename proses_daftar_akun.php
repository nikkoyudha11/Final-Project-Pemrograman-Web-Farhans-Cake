<!-- INSERT INTO `tb_user` (`id_user`, `username`, `user_number`, `log_user`, `alamat`) VALUES (NULL, 'Nikko Yudha', '23232341', current_timestamp(), 'jl. Guardian Tales No. 12'); -->
<?php
    include 'koneksi.php';
    ?>
    <script>
        var yakin = confirm("Apakah semua data benar?");

        if (yakin) {
            <?php
                if(isset($_POST['submit'])){
                    $Nama = $_POST['nama'];
                    $Email = $_POST['email'];
                    $Password = $_POST['password'];
                    $Alamat = $_POST['alamat'];
                    $Telp = $_POST['no_telp'];

                    $sql = "INSERT INTO `tb_user` (`id_user`, `username`, `user_number`, `log_user`, `alamat`, `email`, `password`) VALUES (NULL, '$Nama', '$Telp', current_timestamp(), '$Alamat', '$Email', '$Password')";
                    $query = mysqli_query($connect, $sql);
                    if($query){
                        ?>
                            alert("Pendaftaran berhasil");
                            var nama_user = "<?php echo $Nama; ?>";
                            window.location.href = "kuebaru.php?del="+ nama_user;
                            
                        <?php
                    }else{
                        echo "GAGAL MAS :( ";
                    }
                }else {
                    header('Location: beli.php?status=gagal');
                }
            ?>
        } else {
            window.location.href = "registrasi.php";
            
        }
    </script>
    
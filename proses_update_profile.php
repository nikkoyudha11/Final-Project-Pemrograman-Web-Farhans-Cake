<?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
        $Nama = $_POST['nama'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];
        $Alamat = $_POST['alamat'];
        $Telp = $_POST['no_telp'];
        $id_user = $_POST['id_user'];
        $log_user = $_POST['log_user'];

        $sql = "UPDATE tb_user
                SET username = '$Nama',
                user_number = '$Telp',
                log_user = current_timestamp(),
                alamat = '$Alamat',
                email = '$Email',
                password = '$Password'
                WHERE id_user = '$id_user';";
        $query = mysqli_query($connect, $sql);
        if($query){
            ?>
            <script>
                alert("Update profile berhasil");
                var user_name = "<?php echo $Nama; ?>"
                window.location.href = "kuebaru.php?del="+ user_name;
            </script>
            <?php
        }else{
            echo "GAGAL MAS :( ";
        }
    }else {
        header('Location: beli.php?status=gagal');
    }
?>
    